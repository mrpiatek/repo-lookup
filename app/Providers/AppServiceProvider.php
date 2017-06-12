<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Mockery\Mock;
use mrpiatek\RepoLookup\RepositoryLookup\DataFetcherInterface;
use mrpiatek\RepoLookup\RepositoryLookup\DataFetchers\GitHubDataFetcher;
use mrpiatek\RepoLookup\RepositoryLookup\DataFetchers\MockDataFetcher;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (App::environment() === 'testing') {
            $this->app->bind(DataFetcherInterface::class, MockDataFetcher::class);
        } else {
            $this->app->bind(DataFetcherInterface::class, GitHubDataFetcher::class);
        }
    }
}
