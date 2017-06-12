<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use mrpiatek\RepoLookup\RepositoryLookup\DataFetcherInterface;
use mrpiatek\RepoLookup\RepositoryLookup\DataFetchers\GitHubDataFetcher;

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
        $this->app->bind(DataFetcherInterface::class, GitHubDataFetcher::class);
    }
}
