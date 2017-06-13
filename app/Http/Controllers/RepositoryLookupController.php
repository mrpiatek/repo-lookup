<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use mrpiatek\RepoLookup\RepositoryLookup\Exceptions\InvalidRepositoryNameException;
use mrpiatek\RepoLookup\RepositoryLookup\Exceptions\RepositoryNotFoundException;
use mrpiatek\RepoLookup\RepositoryLookup\RepositoryLookup;

class RepositoryLookupController extends Controller
{
    /** @var  RepositoryLookup */
    protected $repoLookup;

    /**
     * RepositoryLookupController constructor.
     *
     * @param RepositoryLookup $repoLookup
     */
    public function __construct(RepositoryLookup $repoLookup)
    {
        $this->repoLookup = $repoLookup;
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
        $search= '';

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
        }

        $contributors = $this->formatNumbers($contributors);

        $encodedRepoName = urlencode($search);

        return view('lookup', [
            'encodedRepoName' => $encodedRepoName,
            'contributors' => $contributors,
            'dataSource' => $dataSource
        ])
            ->withErrors($errors);
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
