# Repository Contributors Lookup
A tool to lookup repository contributors

# Installation

Run the following commands:
```
git clone https://github.com/mrpiatek/repo-lookup.git ~/mrpiatek-repo-lookup
cd ~/mrpiatek-repo-lookup
composer install
cp .env.example .env
cp .env.behat.example .env.behat
php artisan key:generate
```

Now fill the `.env` file with your database credentials, [obtain GitHub personal access token](https://github.com/blog/1509-personal-api-tokens) and paste it in the `.env` file
under `GITHUB_TOKEN` setting.

You may provide your local timezone in `.env` file under `DEFAULT_TIMEZONE` setting.

You may now run `php artisan serve`.

## Setting up testing environment

This project uses [laracasts/behat-laravel-extension](https://github.com/laracasts/Behat-Laravel-Extension) so that the application
is bootstrapped within Behat process. It loads `.env.behat` file as configuration therefore
you will need to copy your app key from your `.env` file and paste it in the `.env.behat` file. The app key is stored
under `APP_KEY` value (or you may copy it directly form console after calling `php artisan key:generate`).

# Troubleshooting

If you get _repository does not exist_ error after searching for a valid repository you are probably missing a GitHub token.

If you get _QueryException_ error they you are probably missing database configuration, or it is invalid.

# Testing

This projects uses [PHPSpec](http://www.phpspec.net) for unit testing and [Behat](http://behat.org/) for acceptance tests.

Running integration tests:
```
./vendor/bin/behat
```

Running unit tests:
```
./vendor/bin/phpspec run
```

# Code quality

This project uses [PHP Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer) and [PHP Mess Detector](https://phpmd.org/)
to assure good code quality within `src/` folder (framework related code aims to follow framework specific standards).

Run the following to validate code quality:
```
./vendor/bin/phpmd src text cleancode, codesize, controversial, design, naming, unusedcode
./vendor/bin/phpcs src
```

 # Caching
 
 This application uses cache to store repository contributors for 60 minuts after live hit. If you wish to clear
 cache before that you may use `php artisan cache:clear` command.

# Known issues

* Unit tests only cover `src/` but do not cover the framework code of the application (but acceptance tests do),
* `mrpiatek\RepoLookup\RepositoryLookup\DataFetchers\MockDataFetcher` mock class should be in tests domain,
* Full repository name should be parsed using regular expression rather than `explode()`.

# Fetching data from other sources than GitHub

If you wish to fetch data from other sources you will need to write your own Data Fetcher. It must implement the
`mrpiatek\RepoLookup\RepositoryLookup\DataFetcherInterface` and be bound to that interface abstract in the App Service Provider.
The `fetchRepositoryData` function should accept 2 parameters: vendor name and package name. It should return an array
of contributors. The data needs to fit format used by the `mrpiatek\RepoLookup\RepositoryLookup\RepositoryLookup` class
meaning that each element of the array should contain at least those fields with given data types:
* _string_ name - the contributor name,
* _url_ avatar_url - a valid url to the user's avatar,
* _integer_ contributions - number of contributions by user.

If you wish to have many sources available at the same time and allow user to choose data source, then you will need to completely unbind
concrete Data Fetcher from the abstract and inject proper concrete implementation to the `RepositoryLookup` while the request is
being processed.

New Data Fetchers should be in `mrpiatek\RepoLookup\RepositoryLookup\DataFetchers` namespace and be located
in `src/mrpiatek/RepoLookup/RepositoryLookup/DataFetchers`.
