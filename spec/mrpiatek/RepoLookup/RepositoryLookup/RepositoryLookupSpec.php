<?php

namespace spec\mrpiatek\RepoLookup\RepositoryLookup;

use mrpiatek\RepoLookup\RepositoryLookup\Exceptions\InvalidRepositoryNameException;
use mrpiatek\RepoLookup\RepositoryLookup\RepositoryLookup;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RepositoryLookupSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(RepositoryLookup::class);
    }

    function it_fails_with_invalid_repository_name()
    {
        $this->shouldThrow(InvalidRepositoryNameException::class)
            ->duringLookupRepository('mrpiatek');
    }
}
