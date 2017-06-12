<?php
/**
 * PHP version 7
 *
 * Repository Not Found Exception
 *
 * Exception that is thrown when searching for a non existing repository
 *
 * @category Core
 * @package  MrpiatekRepositoryLookup
 * @author   Mariusz Piątek <mariusz.piatek92@gmail.com>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/RepositoryLookup/Exceptions/RepositoryNotFoundException.php
 */

namespace mrpiatek\RepoLookup\RepositoryLookup\Exceptions;
use Throwable;

/**
 * Class RepositoryNotFoundException
 *
 * @category Core
 * @package  MrpiatekRepositoryLookup
 * @author   Mariusz Piątek <mariusz.piatek92@gmail.com>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://github.com/mrpiatek/repo-lookup/src/mrpiatek/RepoLookup/RepositoryLookup/Exceptions/RepositoryNotFoundException.php
 */
class RepositoryNotFoundException extends \Exception
{
    /**
     * RepositoryNotFoundException constructor.
     *
     * @param string         $message  Message
     * @param int            $code     Code
     * @param Throwable|null $previous Previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct("Repository not found", $code, $previous);
    }
}