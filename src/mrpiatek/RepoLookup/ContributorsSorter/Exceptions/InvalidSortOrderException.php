<?php
/**
 * PHP version 7
 *
 * Invalid sort order Exception
 *
 * Exception that is thrown when trying to sort order invalid field
 *
 * @category Core
 * @package  MrpiatekRepositoryLookup
 * @author   Mariusz Piątek <mariusz.piatek92@gmail.com>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/ContributorsSorter/Exceptions/InvalidSortOrderException.php
 */

namespace mrpiatek\RepoLookup\ContributorsSorter\Exceptions;
use Throwable;

/**
 * Class InvalidSortOrderException
 *
 * @category Core
 * @package  MrpiatekRepositoryLookup
 * @author   Mariusz Piątek <mariusz.piatek92@gmail.com>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/ContributorsSorter/Exceptions/InvalidSortOrderException.php
 */
class InvalidSortOrderException extends \Exception
{
    /**
     * InvalidSortOrderException constructor.
     *
     * @param string         $message  Message
     * @param int            $code     Code
     * @param Throwable|null $previous Previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct("Invalid sort order", $code, $previous);
    }
}