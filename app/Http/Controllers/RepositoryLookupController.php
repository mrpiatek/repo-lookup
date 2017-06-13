<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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

        if ($request->has('search')) {
            try {
                $contributors = $this->repoLookup->lookupRepository($request->input('search'));
            } catch (InvalidRepositoryNameException $e) {
                $errors[] = 'invalid_repo_name';
            } catch (RepositoryNotFoundException $e) {
                $errors[] = 'repo_not_exists';
            }
        }

        $contributors = $this->formatNumbers($contributors);

        return view('lookup', compact('contributors'))
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
