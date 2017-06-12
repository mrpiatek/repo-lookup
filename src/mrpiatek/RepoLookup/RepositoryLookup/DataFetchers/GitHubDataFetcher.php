<?php
/**
 * PHP version 7
 *
 * Repository lookup class
 *
 * Class used to lookup repository contributors and present the list with avatars
 * and number of contributions.
 *
 * @category Core
 * @package  MrpiatekRepositoryLookup
 * @author   Mariusz Piątek <mariusz.piatek92@gmail.com>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/RepositoryLookup/DataFetchers/GitHubDataFetcher.php
 */

namespace mrpiatek\RepoLookup\RepositoryLookup\DataFetchers;

use GrahamCampbell\GitHub\GitHubManager;
use mrpiatek\RepoLookup\RepositoryLookup\{
    DataFetcherInterface, Exceptions\RepositoryNotFoundException
};

/**
 * Class GitHubDataFetcher
 *
 * @category Core
 * @package  MrpiatekRepositoryLookup
 * @author   Mariusz Piątek <mariusz.piatek92@gmail.com>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/RepositoryLookup/DataFetchers/GitHubDataFetcher.php
 */
class GitHubDataFetcher implements DataFetcherInterface
{
    /**
     * GitHub bridge
     *
     * @var GitHubManager
     */
    protected $gitHubManager;

    /**
     * GitHubDataFetcher constructor.
     *
     * @param GitHubManager $gitHubManager GitHub bridge
     */
    public function __construct(GitHubManager $gitHubManager)
    {
        $this->gitHubManager = $gitHubManager;
    }


    /**
     * Fetches information about GitHub repository contributors and returns it as an
     * array
     *
     * @param string $vendor Vendor name
     * @param string $package Package name
     *
     * @return array
     *
     * @throws RepositoryNotFoundException
     */
    public function fetchRepositoryData(string $vendor, string $package): array
    {
        //TODO: implement
    }
}
