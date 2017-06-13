<?php

namespace spec\mrpiatek\RepoLookup\RecentSearches;

use mrpiatek\RepoLookup\RecentSearches\RecentSearches;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RecentSearchesSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(RecentSearches::class);
    }

    function it_should_return_recently_searched_repositories_if_user_searched_for_any()
    {
        $this->addRecentSearch('mrpiatek', 'repo-lookup', [
            [
                'name' => 'mrpiatek',
                'avatar_url' => 'https://avatars1.githubusercontent.com/u/12552488',
                'contributions' => 6
            ]
        ]);

        $this->addRecentSearch('laravel', 'laravel', [
            [
                'name' => 'taylorotwell',
                'avatar_url' =>
                    'https://avatars3.githubusercontent.com/u/463230',
                'contributions' => 2953
            ],
            [
                'name' => 'GrahamCampbell',
                'avatar_url' =>
                    'https://avatars0.githubusercontent.com/u/2829600',
                'contributions' => 40
            ]
        ]);


        $recentSearches = $this->getRecentSearches();
    }

    function it_should_return_empty_array_if_there_are_no_recent_searches()
    {

    }
}
