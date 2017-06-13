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

use mrpiatek\RepoLookup\DataRepositories\RecentSearchesRepositoryInterface;
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

    /** @var  RecentSearchesRepositoryInterface */
    protected $recentSearchesRepository;

    /**
     * RecentSearches constructor.
     *
     * @param RecentSearchesRepositoryInterface $recentSearchesRepository
     */
    public function __construct(RecentSearchesRepositoryInterface $recentSearchesRepository)
    {
        $this->recentSearchesRepository = $recentSearchesRepository;
    }


    /**
     * Adds recent search entry
     *
     * @param string $search Full repository name
     * @param \DateTimeInterface $searchDate
     *
     * @return void
     */
    public function addRecentSearch(string $search, \DateTimeInterface $searchDate)
    {
        $this->recentSearchesRepository->insert(
            new RecentSearchItem($search, $searchDate)
        );
    }

    /**
     * Gets recent searches
     *
     * @return RecentSearchItem[] Recent searches
     */
    public function getRecentSearches(): array
    {
        $s = $this->recentSearchesRepository->findAll();
        return $s;
    }
}
