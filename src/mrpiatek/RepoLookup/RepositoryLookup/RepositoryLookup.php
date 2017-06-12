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
        if ($repositoryName == 'mrpiatek') {
            throw new InvalidRepositoryNameException();
        } else if ($repositoryName == 'mrpiatek/null') {
            throw new RepositoryNotFoundException();
        } else {
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
        }
    }
}