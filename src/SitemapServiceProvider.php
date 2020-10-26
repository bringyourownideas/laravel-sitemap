<?php

namespace BringYourOwnIdeas\LaravelSitemap;

use Illuminate\Support\ServiceProvider;
use BringYourOwnIdeas\LaravelSitemap\Helpers\ConsoleOutput;
use BringYourOwnIdeas\LaravelSitemap\Commands\SitemapCommand;

class SitemapServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'command.sitemap:generate',
            SitemapCommand::class
        );

        $this->commands([
            'command.sitemap:generate',
        ]);
    }
}
