<?php
/**
 * PHP version 7
 *
 * Invalid sort by Exception
 *
 * Exception that is thrown when trying to sort by invalid field
 *
 * @category Core
 * @package  MrpiatekRepositoryLookup
 * @author   Mariusz Piątek <mariusz.piatek92@gmail.com>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/ContributorsSorter/Exceptions/InvalidSortByException.php
 */

namespace mrpiatek\RepoLookup\ContributorsSorter\Exceptions;
use Throwable;

/**
 * Class InvalidSortByException
 *
 * @category Core
 * @package  MrpiatekRepositoryLookup
 * @author   Mariusz Piątek <mariusz.piatek92@gmail.com>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/ContributorsSorter/Exceptions/InvalidSortByException.php
 */
class InvalidSortByException extends \Exception
{
    /**
     * InvalidSortByException constructor.
     *
     * @param string         $message  Message
     * @param int            $code     Code
     * @param Throwable|null $previous Previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct("Invalid sort by field", $code, $previous);
    }
}