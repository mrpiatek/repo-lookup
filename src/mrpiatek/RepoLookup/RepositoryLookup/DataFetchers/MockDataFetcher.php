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

use Github\Exception\RuntimeException;
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
class MockDataFetcher implements DataFetcherInterface
{
    /**
     * Fetches information about GitHub repository contributors and returns it as an
     * array
     *
     * @param string $vendor  Vendor name
     * @param string $package Package name
     *
     * @return array
     *
     * @throws RepositoryNotFoundException
     */
    public function fetchRepositoryData(string $vendor, string $package): array
    {
        return [
            [
                'login' => 'taylorotwell',
                'avatar_url' => 'https://avatars3.githubusercontent.com/u/463230',
                'contributions' => 2953
            ],
            [
                'login' => 'GrahamCampbell',
                'avatar_url' => 'https://avatars0.githubusercontent.com/u/2829600',
                'contributions' => 40
            ]
        ];
    }
}
