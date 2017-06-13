<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
        $search = '';
        $sortOrder = null;
        $sortBy = null;
        $contributionsNextSort = 'asc';
        $nameNextSort = 'asc';

        if ($request->has('search')) {
            $search = $request->input('search');

            if (Cache::has($search)) {
                $contributors = Cache::get($search);
                $dataSource = 'cache';
            } else {
                try {
                    $contributors = $this->repoLookup->lookupRepository($search);
                    $dataSource = 'live';
                    Cache::put($search, $contributors, 60 /* minutes */);
                } catch (InvalidRepositoryNameException $e) {
                    $errors[] = 'invalid_repo_name';
                } catch (RepositoryNotFoundException $e) {
                    $errors[] = 'repo_not_exists';
                }
            }

            //sort
            if ($request->has('sort_by') && $request->has('sort_order')) {

                $sortOrder = $request->input('sort_order');
                $sortBy = $request->input('sort_by');

                $contributors = $this->contributorsSorter->sort(
                    $contributors,
                    $sortBy,
                    $sortOrder == 'asc' ? ContributorsSorter::ORDER_ASCENDING : ContributorsSorter::ORDER_DESCENDING
                );

                if ($sortBy == 'name') {
                    $contributionsNextSort = 'asc';
                    $nameNextSort = $this->getNextSortValue($sortOrder);
                } elseif ($sortBy == 'contributions') {
                    $nameNextSort = 'asc';
                    $contributionsNextSort = $this->getNextSortValue($sortOrder);
                }
            }

            if (count($errors) == 0) {
                $this->recentSearchesRepository->insert(
                    new RecentSearchItem(
                        $search,
                        new \DateTime('now', new \DateTimeZone(config('app.timezone')))
                    )
                );
            }
        }

        $contributors = $this->formatNumbers($contributors);

        $encodedRepoName = urlencode($search);

        return view('lookup', [
            'encodedRepoName' => $encodedRepoName,
            'contributors' => $contributors,
            'dataSource' => $dataSource,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder,
            'nameNextSort' => $nameNextSort,
            'contributionsNextSort' => $contributionsNextSort,
        ])
            ->withErrors($errors);
    }

    /**
     * Gets what sort order should be next when cycling trough sort orders
     *
     * @param string $currentSort
     * @return null|string
     */
    private function getNextSortValue(string $currentSort)
    {
        if ($currentSort == 'asc') {
            return 'desc';
        } else {
            return null;
        }
    }

    /**
     * Formats number of contributions to a readable format by adding thousand commas
     *
     * @param $contributors
     * @return array
     */
    private function formatNumbers($contributors)
    {
        return array_map(function ($row) {
            $row['contributions'] = number_format($row['contributions']);
            return $row;
        }, $contributors);
    }
}
