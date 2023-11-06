<?php

namespace Laratree\LaravelLink;

use Illuminate\Support\ServiceProvider;

class LaravelLinkServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../src/config/laravel-link.php', 'laravel-link');
        $this->loadMigrationsFrom(__DIR__.'/../src/database/migrations/');
    }

    public function boot()
    {
        $this->publishing();
    }

    protected function publishing(): void
    {
        $this->publishes([
            __DIR__ . '/database/migrations/create_links_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_links_table.php'),
        ], 'laravel-link-migrations');

        $this->publishes([
            __DIR__ . '/config/laravel-link.php' => config_path('laravel-link')
        ], 'laravel-link');
    }
}
