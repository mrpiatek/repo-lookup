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
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/RepositoryLookup/RepositoryLookup.php
 */

namespace mrpiatek\RepoLookup\RepositoryLookup;

use mrpiatek\RepoLookup\RepositoryLookup\Exceptions\{
    InvalidRepositoryNameException, RepositoryNotFoundException
};

/**
 * Class RepositoryLookup
 *
 * @category Core
 * @package  MrpiatekRepositoryLookup
 * @author   Mariusz Piątek <mariusz.piatek92@gmail.com>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/RepositoryLookup/RepositoryLookup.php
 */
class RepositoryLookup
{
    /**
     * Fetches information about repository contributors and returns it as an array
     *
     * @param string $repositoryName Full name of the repository
     *
     * @return array
     *
     * @throws InvalidRepositoryNameException
     * @throws RepositoryNotFoundException
     */
    public function lookupRepository(string $repositoryName): array
    {
        preg_match('/(?P<vendor>\w+)\/(?P<package>\w+)/', $repositoryName, $matches);
        if (count($matches) === 0) {
            throw new InvalidRepositoryNameException();
        }

        //TODO: fetch the actual data
    }
}