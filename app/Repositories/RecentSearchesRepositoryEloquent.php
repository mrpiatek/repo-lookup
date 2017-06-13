<?php

namespace App\Repositories;


use mrpiatek\RepoLookup\DataRepositories\RecentSearchesRepositoryInterface;
use mrpiatek\RepoLookup\DataRepositories\RecentSearchItem;

class RecentSearchesRepositoryEloquent implements RecentSearchesRepositoryInterface
{

    /**
     * Retrieves all recent searches
     *
     * @return RecentSearchItem[] Array with recent search terms
     */
    public function findAll(): array
    {
        $results = [];
        \App\RecentSearchItem::all()->each(function (\App\RecentSearchItem $item) use (&$results) {
            $results[] = new RecentSearchItem(
                $item->search_term,
                $item->search_date
            );
        });

        return $results;
    }

    /**
     * Stores recent search
     *
     * @param RecentSearchItem $item Data
     *
     * @return void
     */
    public function insert(RecentSearchItem $item)
    {
        \App\RecentSearchItem::create([
            'search_term' => $item->getSearchTerm(),
            'search_date' => $item->getSearchDate()
        ]);
    }
}