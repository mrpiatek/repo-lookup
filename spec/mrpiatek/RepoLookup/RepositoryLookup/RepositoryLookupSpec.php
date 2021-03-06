<?php

namespace spec\mrpiatek\RepoLookup\RepositoryLookup;

use mrpiatek\RepoLookup\RepositoryLookup\DataFetcherInterface;
use mrpiatek\RepoLookup\RepositoryLookup\Exceptions\InvalidRepositoryNameException;
use mrpiatek\RepoLookup\RepositoryLookup\RepositoryLookup;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RepositoryLookupSpec extends ObjectBehavior
{
    public function let(DataFetcherInterface $dataFetcher)
    {
        $dataFetcher->fetchRepositoryData('mrpiatek', 'repo-lookup')
            ->willReturn([
                [
                    'name' => 'mrpiatek'
                ]
            ]);

        $this->beConstructedWith($dataFetcher);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(RepositoryLookup::class);
    }

    function it_fails_with_invalid_repository_name()
    {
        $this->shouldThrow(InvalidRepositoryNameException::class)
            ->duringLookupRepository('mrpiatek');
    }

    function it_lookups_repositories()
    {
        $this->lookupRepository('mrpiatek/repo-lookup')
            ->shouldContain(['name' => 'mrpiatek']);
    }
}
