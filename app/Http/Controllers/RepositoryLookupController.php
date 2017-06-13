<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use mrpiatek\RepoLookup\ContributorsSorter\ContributorsSorter;
use mrpiatek\RepoLookup\DataRepositories\RecentSearchesRepositoryInterface;
use mrpiatek\RepoLookup\DataRepositories\RecentSearchItem;
use mrpiatek\RepoLookup\RepositoryLookup\Exceptions\InvalidRepositoryNameException;
use mrpiatek\RepoLookup\RepositoryLookup\Exceptions\RepositoryNotFoundException;
use mrpiatek\RepoLookup\RepositoryLookup\RepositoryLookup;

class RepositoryLookupController extends Controller
{
    /** @var  RepositoryLookup */
    protected $repoLookup;

    /** @var  RecentSearchesRepositoryInterface */
    protected $recentSearchesRepository;

    /** @var  ContributorsSorter */
    protected $contributorsSorter;

    /**
     * RepositoryLookupController constructor.
     *
     * @param RepositoryLookup $repoLookup
     * @param RecentSearchesRepositoryInterface $recentSearchesRepository
     * @param ContributorsSorter $contributorsSorter
     */
    public function __construct(
        RepositoryLookup $repoLookup,
        RecentSearchesRepositoryInterface $recentSearchesRepository,
        ContributorsSorter $contributorsSorter
    )
    {
        $this->repoLookup = $repoLookup;
        $this->recentSearchesRepository = $recentSearchesRepository;
        $this->contributorsSorter = $contributorsSorter;
    }

    /**
     * Controller action to lookup repositories
     *
     * @param Request $request
     * @return View
     */
    public function lookup(Request $request)
    {
        $contributors = [];
        $errors = [];
        $dataSource = '';
        $searchTerm = '';
        $sortBy = ContributorsSorter::NO_SORT;
        $sortOrder = SORT_REGULAR;

        if ($request->has('search')) {
            $searchTerm = $request->input('search');

            if (Cache::has($searchTerm)) {
                $contributors = Cache::get($searchTerm);
                $dataSource = 'cache';
            } else {
                $contributors = $this->getLiveContributorsData($searchTerm, $errors);
                if (!$errors) {
                    Cache::put($searchTerm, $contributors, 60 /* minutes */);
                    $dataSource = 'live';
                }
            }

            if ($request->has('sort_by') && $request->has('sort_order')) {
                $sortBy = $this->parseSortBy($request->input('sort_by'));
                $sortOrder = $this->parseSortOrder($request->input('sort_order'));
                $contributors = $this->sortContributors($contributors, $sortBy, $sortOrder);
            }

            if (!$errors && $request->method() == 'POST') {
                // register recent searches only on first hit (POST request)
                $this->recentSearchesRepository->insert(
                    new RecentSearchItem(
                        $searchTerm,
                        new \DateTime('now', new \DateTimeZone(config('app.timezone')))
                    )
                );
            }
        }

        $contributors = $this->formatNumberOfContributions($contributors);

        $view = view('lookup', [
            'repoName' => $searchTerm,
            'contributors' => $contributors,
            'dataSource' => $dataSource,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder,
            'nameNextSort' => $this->getNextSortOrderFor(ContributorsSorter::NAME_SORT, $sortBy, $sortOrder),
            'contributionsNextSort' => $this->getNextSortOrderFor(ContributorsSorter::CONTRIBUTIONS_SORT, $sortBy, $sortOrder),
        ]);

        if($errors){
            $view = $view->withErrors($errors);
        }

        return $view;
    }

    protected function sortContributors(array $contributors, string $sortBy, string $sortOrder)
    {
        $contributors = $this->contributorsSorter->sort(
            $contributors,
            $sortBy,
            $sortOrder
        );

        return $contributors;
    }

    /**
     * Gets what sort order for given field should be next when cycling trough sort orders
     *
     * @param int $sortOrderFor
     * @param int $currentSortBy
     * @param int $currentSortOrder
     * @return int|null|string
     * @internal param string $currentSort
     */
    private function getNextSortOrderFor(int $sortOrderFor, int $currentSortBy, int $currentSortOrder): int
    {
        if ($sortOrderFor !== $currentSortBy || $currentSortOrder === SORT_REGULAR) {
            return SORT_ASC;
        } else if ($currentSortOrder === SORT_ASC) {
            return SORT_DESC;
        } else {
            return SORT_REGULAR;
        }
    }

    /**
     * Parses text representation of the field to sort by and converts it into flag
     *
     * @param string $sortBy
     * @return int
     */
    private function parseSortBy(string $sortBy): int
    {
        $sortBy = strtolower($sortBy);

        switch ($sortBy) {
            case 'name':
                return ContributorsSorter::NAME_SORT;
            case 'contributions':
                return ContributorsSorter::CONTRIBUTIONS_SORT;
            default:
                return ContributorsSorter::NO_SORT;
        }
    }

    /**
     * Parses text representation of the sort order and converts it into flag
     *
     * @param string $sortOrder
     * @return int
     */
    private function parseSortOrder(string $sortOrder): int
    {
        $sortOrder = strtolower($sortOrder);

        switch ($sortOrder) {
            case 'asc':
                return SORT_ASC;
            case 'desc':
                return SORT_DESC;
            default:
                return SORT_REGULAR;
        }
    }

    /**
     * Formats number of contributions to a readable format by adding thousand commas
     *
     * @param $contributors
     * @return array
     */
    private function formatNumberOfContributions($contributors)
    {
        return array_map(function ($row) {
            $row['contributions'] = number_format($row['contributions']);
            return $row;
        }, $contributors);
    }

    /**
     * Fetches live data from the external resource
     *
     * @param string $searchTerm
     * @param array $errors
     * @return array
     */
    private function getLiveContributorsData(string $searchTerm, array &$errors): array
    {
        $contributors = [];
        try {
            $contributors = $this->repoLookup->lookupRepository($searchTerm);
        } catch (InvalidRepositoryNameException $e) {
            $errors[] = 'invalid_repo_name';
        } catch (RepositoryNotFoundException $e) {
            $errors[] = 'repo_not_exists';
        } finally {
            return $contributors;
        }
    }
}
