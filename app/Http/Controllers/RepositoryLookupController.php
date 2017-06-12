<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        if ($request->has('search')) {
            $contributors = $this->repoLookup->lookupRepository($request->input('search'));
        }

        return view('lookup', compact('contributors'));
    }
}
