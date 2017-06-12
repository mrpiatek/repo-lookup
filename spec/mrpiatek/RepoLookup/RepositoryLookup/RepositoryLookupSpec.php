<?php

namespace spec\mrpiatek\RepoLookup\RepositoryLookup;

use mrpiatek\RepoLookup\RepositoryLookup\Exceptions\{
    InvalidRepositoryNameException, RepositoryNotFoundException
};
use mrpiatek\RepoLookup\RepositoryLookup\RepositoryLookup;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RepositoryLookupSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(RepositoryLookup::class);
    }

    function it_looks_up_repository_contributors()
    {
        $this->lookupRepository('laravel/laravel')->shouldContain(
            [
                'name' => 'taylorotwell',
                'avatar_url' => 'https://avatars3.githubusercontent.com/u/463230',
                'contributions' => 2953
            ]
        );

        $this->lookupRepository('laravel/laravel')->shouldContain(
            [
                'name' => 'GrahamCampbell',
                'avatar_url' => 'https://avatars0.githubusercontent.com/u/2829600',
                'contributions' => 40
            ]
        );
    }

    function it_fails_with_invalid_repository_name()
    {
        $this->shouldThrow(InvalidRepositoryNameException::class)
            ->duringLookupRepository('mrpiatek');
    }

    function it_fails_with_not_existing_repository()
    {
        $this->shouldThrow(RepositoryNotFoundException::class)
            ->duringLookupRepository('mrpiatek/null');
    }
}
