<?php

namespace Laratree\LaravelLink;

use Illuminate\Support\ServiceProvider;

class LaravelLinkServiceProvider extends ServiceProvider
{
    public function register()
    {
        //$this->mergeConfigFrom(__DIR__.'../config/config.php', 'bookmark');
    }

    public function boot()
    {
        $this->publishing();
    }

    protected function publishing(): void
    {
        $this->publishes([
            __DIR__ . '/database/migrations/create_links_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_links_table.php'),
        ], 'laravel-links-migrations');

    }
}