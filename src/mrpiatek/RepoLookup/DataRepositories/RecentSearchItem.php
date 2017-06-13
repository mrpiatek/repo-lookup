<?php
/**
 * PHP version 7
 *
 * Recent searches class
 *
 * Class used to keep track of recent searches
 *
 * @category Core
 * @package  MrpiatekRepositoryLookup
 * @author   Mariusz Piątek <mariusz.piatek92@gmail.com>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/DataRepositories/RecentSearchItem.php
 */

namespace mrpiatek\RepoLookup\DataRepositories;

/**
 * Class RecentSearchItem
 *
 * @category Core
 * @package  MrpiatekRepositoryLookup
 * @author   Mariusz Piątek <mariusz.piatek92@gmail.com>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/DataRepositories/RecentSearchItem.php
 */
class RecentSearchItem
{
    protected $searchTerm;
    protected $searchDate;

    /**
     * RecentSearchItem constructor.
     *
     * @param string             $searchTerm Full repository name
     * @param \DateTimeInterface $searchDate Time when search was conducted
     */
    public function __construct(string $searchTerm, \DateTimeInterface $searchDate)
    {
        $this->searchTerm = $searchTerm;
        $this->searchDate = $searchDate;
    }

    /**
     * Gets the full repository name
     *
     * @return string Full Repository name
     */
    public function getSearchTerm(): string
    {
        return $this->searchTerm;
    }

    /**
     * Gets the time when search was conducted
     *
     * @return \DateTimeInterface Time when search was conducted
     */
    public function getSearchDate(): \DateTimeInterface
    {
        return $this->searchDate;
    }


}
