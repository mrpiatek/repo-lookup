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
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/RecentSearches/RecentSearches.php
 */

namespace mrpiatek\RepoLookup\RecentSearches;
use mrpiatek\RepoLookup\DataRepositories\RecentSearchItem;

/**
 * Class RecentSearches
 *
 * @category Core
 * @package  MrpiatekRepositoryLookup
 * @author   Mariusz Piątek <mariusz.piatek92@gmail.com>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/RecentSearches/RecentSearches.php
 */
class RecentSearches
{
    /**
     * Adds recent search entry
     *
     * @param string $search Full repository name
     *
     * @return void
     */
    public function addRecentSearch(string $search)
    {
        // TODO: write logic here
    }

    /**
     * Gets recent searches
     *
     * @return RecentSearchItem[] Recent searches
     */
    public function getRecentSearches(): array
    {
        // TODO: write logic here
    }
}
