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
    const NO_SORT = 0;
    const NAME_SORT = 1;
    const CONTRIBUTIONS_SORT = 2;

    /**
     * Sorts contributors array by given fields with given order
     *
     * @param array  $data      Input data
     * @param int $sortBy    Field to sort by
     * @param int    $sortOrder Sort order
     *
     * @return array Sorted contributors
     *
     * @throws InvalidSortByException
     * @throws InvalidSortOrderException
     */
    public function sort(array $data, int $sortBy, int $sortOrder)
    {
        if (!in_array($sortBy, [self::NO_SORT, self::NAME_SORT, self::CONTRIBUTIONS_SORT])) {
            throw new InvalidSortByException();
        }

        if (!in_array($sortOrder, [SORT_ASC, SORT_DESC, SORT_REGULAR])) {
            throw new InvalidSortOrderException();
        }

        if ($sortBy === SORT_REGULAR || $sortBy === self::NO_SORT) {
            return $data;
        }

        $sortBy = $this->parseSortBy($sortBy);

        usort($data, function ($a, $b) use ($sortBy, $sortOrder) {
            if ($sortBy == 'name') {
                $a[$sortBy] = strtolower($a[$sortBy]);
                $b[$sortBy] = strtolower($b[$sortBy]);
            }

            if ($sortOrder == SORT_ASC) {
                return $a[$sortBy] >= $b[$sortBy];
            }

            if ($sortOrder == SORT_DESC) {
                return $a[$sortBy] <= $b[$sortBy];
            }
        });

        return $data;
    }

    /**
     * Converts sort by flag into array index
     *
     * @param  int $sortBy
     *
     * @return string
     */
    private function parseSortBy(int $sortBy): string
    {
        $sortBy = strtolower($sortBy);

        switch ($sortBy) {
            case self::NAME_SORT:
                return 'name';
            case self::CONTRIBUTIONS_SORT:
                return 'contributions';
            default:
                return '';
        }
    }
}
