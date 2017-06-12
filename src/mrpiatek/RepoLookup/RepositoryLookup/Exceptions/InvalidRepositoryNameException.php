<?php
/**
 * PHP version 7
 *
 * Invalid Repository Name Exception
 *
 * Exception that is thrown when searching for a invalid repository
 *
 * @category Core
 * @package  MrpiatekRepositoryLookup
 * @author   Mariusz Piątek <mariusz.piatek92@gmail.com>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/RepositoryLookup/Exceptions/InvalidRepositoryNameException.php
 */

namespace mrpiatek\RepoLookup\RepositoryLookup\Exceptions;
use Throwable;

/**
 * Class InvalidRepositoryNameException
 *
 * @category Core
 * @package  MrpiatekRepositoryLookup
 * @author   Mariusz Piątek <mariusz.piatek92@gmail.com>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/RepositoryLookup/Exceptions/InvalidRepositoryNameException.php
 */
class InvalidRepositoryNameException extends \Exception
{
    /**
     * InvalidRepositoryNameException constructor.
     *
     * @param string         $message  Message
     * @param int            $code     Code
     * @param Throwable|null $previous Previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct("Invalid repository name", $code, $previous);
    }
}