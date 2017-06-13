<?php

namespace spec\mrpiatek\RepoLookup\ContributorsSorter;

use mrpiatek\RepoLookup\ContributorsSorter\ContributorsSorter;
use PhpSpec\Exception\Example\PendingException;
use PhpSpec\ObjectBehavior;
use PhpSpec\Wrapper\Subject;
use Prophecy\Argument;

class ContributorsSorterSpec extends ObjectBehavior
{
    const INITIAL_DATA = [
        [
            'name' => 'aaa',
            'contributions' => 1
        ],
        [
            'name' => 'zzz',
            'contributions' => 3
        ],
        [
            'name' => 'bbb',
            'contributions' => 2
        ]
    ];

    function it_is_initializable()
    {
        $this->shouldHaveType(ContributorsSorter::class);
    }

    function it_should_sort_by_ascending_user_name()
    {
        /** @var Subject $sorted */
        $sorted = $this->sort(
            self::INITIAL_DATA,
            'name',
            ContributorsSorter::ORDER_ASCENDING
        );

        $sorted->shouldBeArray();
        $sorted->shouldHaveCount(count(self::INITIAL_DATA));

        $this->assert_correct_order($sorted->getWrappedObject(), 'name', 'ascending');
    }

    function it_should_sort_by_descending_user_name()
    {
        /** @var Subject $sorted */
        $sorted = $this->sort(
            self::INITIAL_DATA,
            'name',
            ContributorsSorter::ORDER_DESCENDING
        );

        $sorted->shouldBeArray();
        $sorted->shouldHaveCount(count(self::INITIAL_DATA));

        $this->assert_correct_order($sorted->getWrappedObject(), 'name', 'descending');
    }

    function it_should_sort_by_ascending_number_of_contributions()
    {
        /** @var Subject $sorted */
        $sorted = $this->sort(
            self::INITIAL_DATA,
            'contributions',
            ContributorsSorter::ORDER_ASCENDING
        );

        $sorted->shouldBeArray();
        $sorted->shouldHaveCount(count(self::INITIAL_DATA));

        $this->assert_correct_order($sorted->getWrappedObject(), 'contributions', 'ascending');
    }

    function it_should_sort_by_descending_number_of_contributions()
    {
        /** @var Subject $sorted */
        $sorted = $this->sort(
            self::INITIAL_DATA,
            'contributions',
            ContributorsSorter::ORDER_DESCENDING
        );

        $sorted->shouldBeArray();
        $sorted->shouldHaveCount(count(self::INITIAL_DATA));

        $this->assert_correct_order($sorted->getWrappedObject(), 'contributions', 'descending');
    }

    function assert_correct_order(array $data, string $sortBy, string $sortOrder)
    {
        if (!in_array($sortBy, ['name', 'contributions']) || !in_array($sortOrder, ['ascending', 'descending'])) {
            throw new PendingException();
        }

        foreach ($data as $item) {
            if (isset($lastItem)) {
                if ($sortOrder == 'ascending') {
                    \PHPUnit_Framework_Assert::assertGreaterThanOrEqual($item[$sortBy], $lastItem[$sortBy]);
                } else if ($sortOrder == 'descending') {
                    \PHPUnit_Framework_Assert::assertLessThanOrEqual($item[$sortBy], $lastItem[$sortBy]);
                }
            }
            $lastItem = $item;
        }
    }
}
