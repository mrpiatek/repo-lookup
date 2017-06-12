<?php
/**
 * PHP version 7
 *
 * Data Fetcher Interface
 *
 * Interface used as a contract between Repository Lookup class and Data Fetchers
 *
 * @category Core
 * @package  MrpiatekRepositoryLookup
 * @author   Mariusz Piątek <mariusz.piatek92@gmail.com>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/RepositoryLookup/DataFetcherInterface.php
 */

namespace mrpiatek\RepoLookup\RepositoryLookup;
use mrpiatek\RepoLookup\RepositoryLookup\Exceptions\RepositoryNotFoundException;

/**
 * Class DataFetcherInterface
 *
 * @category Core
 * @package  MrpiatekRepositoryLookup
 * @author   Mariusz Piątek <mariusz.piatek92@gmail.com>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/RepositoryLookup/DataFetcherInterface.php
 */
interface DataFetcherInterface
{
    /**
     * Fetches information about repository contributors and returns it as an array
     *
     * @param string $vendor  Vendor name
     * @param string $package Package name
     *
     * @return array
     *
     * @throws RepositoryNotFoundException
     */
    public function fetchRepositoryData(string $vendor, string $package): array;
}