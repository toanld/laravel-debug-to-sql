<?php
namespace Toanld\DebugToSql;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;

class DebugSqlServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->setupConfig();
    }

    protected function setupConfig(): void
    {
        $source = realpath($raw = __DIR__ . '/../config/sqldebug.php') ?: $raw;
        $this->publishes([$source => config_path('sqldebug.php')]);
        $this->mergeConfigFrom($source, 'sqldebug');
    }

    protected function registerMigrations()
    {
        if (config('sqldebug.enabled_log_table')) {
            return $this->loadMigrationsFrom(__DIR__.'/../migrations');
        }
    }
}
