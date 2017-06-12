<?php

namespace spec\mrpiatek\RepoLookup\RepositoryLookup\DataFetchers;

use mrpiatek\RepoLookup\RepositoryLookup\DataFetchers\GitHubDataFetcher;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use mrpiatek\RepoLookup\RepositoryLookup\Exceptions\RepositoryNotFoundException;

class GitHubDataFetcherSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(GitHubDataFetcher::class);
    }

    function it_looks_up_repository_contributors()
    {
        $this->fetchRepositoryData('laravel/laravel')->shouldContain(
            [
                'name' => 'taylorotwell',
                'avatar_url' => 'https://avatars3.githubusercontent.com/u/463230',
                'contributions' => 2953
            ]
        );

        $this->fetchRepositoryData('laravel/laravel')->shouldContain(
            [
                'name' => 'GrahamCampbell',
                'avatar_url' => 'https://avatars0.githubusercontent.com/u/2829600',
                'contributions' => 40
            ]
        );
    }

    function it_fails_with_not_existing_repository()
    {
        $this->shouldThrow(RepositoryNotFoundException::class)
            ->duringFetchRepositoryData('mrpiatek/null');
    }
}
