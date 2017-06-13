<?php

namespace spec\mrpiatek\RepoLookup\RecentSearches;

use mrpiatek\RepoLookup\DataRepositories\RecentSearchesRepositoryInterface;
use mrpiatek\RepoLookup\DataRepositories\RecentSearchItem;
use mrpiatek\RepoLookup\RecentSearches\RecentSearches;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RecentSearchesSpec extends ObjectBehavior
{
    function it_is_initializable(RecentSearchesRepositoryInterface $recentSearchesRepository)
    {
        $this->beConstructedWith($recentSearchesRepository);
        $this->shouldHaveType(RecentSearches::class);
    }

    function it_should_return_recently_searched_repositories_if_user_searched_for_any(RecentSearchesRepositoryInterface $recentSearchesRepository)
    {
        $nowDate = new \DateTime();

        $this->beConstructedWith($recentSearchesRepository);

        $recentSearchesRepository->insert(new RecentSearchItem(
            'mrpiatek/repo-lookup',
            $nowDate
        ))->shouldBeCalled();
        $this->addRecentSearch('mrpiatek/repo-lookup', $nowDate);

        $recentSearchesRepository->insert(new RecentSearchItem(
            'laravel/laravel',
            $nowDate
        ))->shouldBeCalled();
        $this->addRecentSearch('laravel/laravel', $nowDate);

        $recentSearchesRepository->findAll()->willReturn([
            new RecentSearchItem('mrpiatek/repo-lookup', $nowDate),
            new RecentSearchItem('laravel/laravel', $nowDate),
        ]);

        $recentSearchesRepository->findAll()->shouldBeCalled();
        /** @var RecentSearchItem[] $recentSearches */
        $recentSearches = $this->getRecentSearches()->getWrappedObject();

        \PHPUnit_Framework_Assert::assertCount(2, $recentSearches);
        \PHPUnit_Framework_Assert::assertEquals('mrpiatek/repo-lookup', $recentSearches[0]->getSearchTerm());
        \PHPUnit_Framework_Assert::assertEquals($nowDate, $recentSearches[0]->getSearchDate());


        \PHPUnit_Framework_Assert::assertEquals('laravel/laravel', $recentSearches[1]->getSearchTerm());
        \PHPUnit_Framework_Assert::assertEquals($nowDate, $recentSearches[1]->getSearchDate());
    }

    function it_should_return_empty_array_if_there_are_no_recent_searches(RecentSearchesRepositoryInterface $recentSearchesRepository)
    {
        $recentSearchesRepository->findAll()->willReturn([]);
        $this->beConstructedWith($recentSearchesRepository);

        $this->getRecentSearches()->shouldHaveCount(0);
    }
}
