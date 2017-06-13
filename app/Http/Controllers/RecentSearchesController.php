<?php

namespace App\Http\Controllers;


use mrpiatek\RepoLookup\DataRepositories\RecentSearchesRepositoryInterface;

class RecentSearchesController extends Controller
{
    /** @var  RecentSearchesRepositoryInterface */
    protected $recentSearchesRepository;

    /**
     * RecentSearchesController constructor.
     *
     * @param RecentSearchesRepositoryInterface $recentSearchesRepository
     */
    public function __construct(RecentSearchesRepositoryInterface $recentSearchesRepository)
    {
        $this->recentSearchesRepository = $recentSearchesRepository;
    }


    public function index()
    {
        $recentSearches = $this->recentSearchesRepository->findAll();
        return view('recent_searches', compact('recentSearches'));
    }
}
