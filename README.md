# Repository Contributors Lookup
A tool to lookup repository contributors

# Installation

Run the following commands:
```
git clone https://github.com/mrpiatek/repo-lookup.git ~/mrpiatek-repo-lookup
cd ~/mrpiatek-repo-lookup
composer install
php artisan key:generate
```

Now fill the `.env` file with your database credentials, [obtain GitHub personal access token](https://github.com/blog/1509-personal-api-tokens) and paste it in the `.env` file
after `GITHUB_TOKEN=` .

You may run `php artisan serve`.

## Setting up testing environment

This project uses [laracasts/behat-laravel-extension](https://github.com/laracasts/Behat-Laravel-Extension) so that the application
is bootstrapped within Behat process. It loads `.env.behat` file as configuration therefore
you will need to copy your app key from your `.env` file and paste it in the `.env.behat` file. The app key is stored
after `APP_KEY=` value.

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

# Known issues

* Unit tests only cover `src/` but do not cover the framework code of the application (but acceptance tests do),
* `mrpiatek\RepoLookup\RepositoryLookup\DataFetchers\MockDataFetcher` mock class should be in tests domain.