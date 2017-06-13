<?php
/**
 * PHP version 7
 *
 * Recent searches repository interface class
 *
 * Contract between Recent searches class and framework's data layer
 *
 * @category Core
 * @package  MrpiatekRepositoryLookup
 * @author   Mariusz Piątek <mariusz.piatek92@gmail.com>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/DataRepositories/RecentSearchesRepositoryInterface.php
 */

namespace mrpiatek\RepoLookup\DataRepositories;

/**
 * Class RecentSearches
 *
 * @category Core
 * @package  MrpiatekRepositoryLookup
 * @author   Mariusz Piątek <mariusz.piatek92@gmail.com>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/DataRepositories/RecentSearchesRepositoryInterface.php
 */
interface RecentSearchesRepositoryInterface
{
    /**
     * Retrieves all recent searches
     *
     * @return array Array with recent search terms
     */
    public function findAll(): array;

    /**
     * Stores recent search
     *
     * @param RecentSearchItem $item Data
     *
     * @return void
     */
    public function insert(RecentSearchItem $item);
}
