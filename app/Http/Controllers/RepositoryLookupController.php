<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use mrpiatek\RepoLookup\RepositoryLookup\Exceptions\InvalidRepositoryNameException;
use mrpiatek\RepoLookup\RepositoryLookup\Exceptions\RepositoryNotFoundException;
use mrpiatek\RepoLookup\RepositoryLookup\RepositoryLookup;

class RepositoryLookupController extends Controller
{
    /** @var  RepositoryLookup */
    protected $repoLookup;

    /**
     * RepositoryLookupController constructor.
     * @param RepositoryLookup $repoLookup
     */
    public function __construct(RepositoryLookup $repoLookup)
    {
        $this->repoLookup = $repoLookup;
    }


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

        //format numbers for display
        $contributors = array_map(function ($row) {
            $row['contributions'] = number_format($row['contributions']);
            return $row;
        }, $contributors);

        return view('lookup', compact('contributors'))
            ->withErrors($errors);
    }
}
