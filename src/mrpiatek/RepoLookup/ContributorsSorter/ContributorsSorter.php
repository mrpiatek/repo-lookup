<?php
/**
 * PHP version 7
 *
 * Contributor sorter class
 *
 * Class used to sort contributors
 *
 * @category Core
 * @package  MrpiatekRepositoryLookup
 * @author   Mariusz Piątek <mariusz.piatek92@gmail.com>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/ContributorsSorter/ContributorsSorter.php
 */

namespace mrpiatek\RepoLookup\ContributorsSorter;

use mrpiatek\RepoLookup\ContributorsSorter\Exceptions\{
    InvalidSortByException, InvalidSortOrderException
};

/**
 * Class ContributorsSorter
 *
 * @category Core
 * @package  MrpiatekRepositoryLookup
 * @author   Mariusz Piątek <mariusz.piatek92@gmail.com>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/ContributorsSorter/ContributorsSorter.php
 */
class ContributorsSorter
{
    const ORDER_ASCENDING = 1;
    const ORDER_DESCENDING = 2;

    const ALLOWED_SORT_BY = ['name', 'contributions'];

    /**
     * Sorts contributors array by given fields with given order
     *
     * @param array $data Input data
     * @param string $sortBy Field to sort by
     * @param int $sortOrder Sort order
     *
     * @return array Sorted contributors
     *
     * @throws InvalidSortByException
     * @throws InvalidSortOrderException
     */
    public function sort(array $data, string $sortBy, int $sortOrder)
    {
        if (!in_array($sortBy, self::ALLOWED_SORT_BY)) {
            throw new InvalidSortByException();
        }

        if (!in_array($sortOrder, [self::ORDER_DESCENDING, self::ORDER_ASCENDING])) {
            throw new InvalidSortOrderException();
        }

        usort($data, function ($a, $b) use ($sortBy, $sortOrder) {
            if ($sortOrder == self::ORDER_ASCENDING) {
                return $a[$sortBy] <= $b[$sortBy];
            }

            if ($sortOrder == self::ORDER_DESCENDING) {
                return $a[$sortBy] >= $b[$sortBy];
            }
        });

        return $data;
    }
}
