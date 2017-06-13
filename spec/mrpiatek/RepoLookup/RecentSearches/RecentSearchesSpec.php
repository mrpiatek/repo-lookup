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
        $this->addRecentSearch('mrpiatek/repo-lookup');

        $this->addRecentSearch('laravel/laravel');

        $recentSearches = $this->getRecentSearches();

        \PHPUnit_Framework_Assert::assertCount(2, $recentSearches);
        \PHPUnit_Framework_Assert::assertSame(['mrpiatek/repo-lookup', 'laravel/laravel'], $recentSearches);
    }

    function it_should_return_empty_array_if_there_are_no_recent_searches()
    {
        $recentSearches = $this->getRecentSearches();

        \PHPUnit_Framework_Assert::assertCount(0, $recentSearches);
    }
}
