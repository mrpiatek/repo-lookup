<?php
/**
 * PHP version 7
 *
 * Mocked Repository lookup class
 *
 * Class used to mock repository contributors lookup
 *
 * @category Core
 * @package  MrpiatekRepositoryLookup
 * @author   Mariusz Piątek <mariusz.piatek92@gmail.com>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/RepositoryLookup/DataFetchers/MockDataFetcher.php
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
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/RepositoryLookup/DataFetchers/MockDataFetcher.php
 */
class MockDataFetcher implements DataFetcherInterface
{
    /**
     * Fetches fake information about GitHub repository contributors and returns it
     * as an array
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
        if ($vendor == 'laravel' && $package == 'laravel') {
            return [
                [
                    'name' => 'taylorotwell',
                    'avatar_url' =>
                        'https://avatars3.githubusercontent.com/u/463230',
                    'contributions' => 2953
                ],
                [
                    'name' => 'GrahamCampbell',
                    'avatar_url' =>
                        'https://avatars0.githubusercontent.com/u/2829600',
                    'contributions' => 40
                ]
            ];
        } else if ($vendor == 'mrpiatek' && $package == 'repo-lookup') {
            return [
                [
                    'name' => 'mrpiatek',
                    'avatar_url' =>
                        'https://avatars1.githubusercontent.com/u/12552488',
                    'contributions' => 6
                ]
            ];
        } else {
            throw new RepositoryNotFoundException();
        }
    }
}
