<?php

namespace spec;

use RepositoryLookup;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RepositoryLookupSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(RepositoryLookup::class);
    }
}
