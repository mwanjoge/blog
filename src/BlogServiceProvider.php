<?php

namespace Nisimpo\Blog;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

class BlogServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallationCommand::class
            ]);
        }
        $this->mergeConfigFrom(__DIR__.'/../config/livewire.php','blog');
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'blog');

        $this->publishAll();
    }

    private function publishAll(): void
    {
        $this->publishes([
            __DIR__.'/resources/views/categories' => base_path('resources/views/blog'),
            __DIR__.'/resources/views/posts' => base_path('resources/views/blog'),
            __DIR__.'/resources/views/settings' => base_path('resources/views/blog'),
        ],'blog');
    }

}