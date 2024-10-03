<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Alexusmai\LaravelFileManager\Services\ConfigService\ConfigRepository;
use App\Http\TestConfigRepository;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $migrationsPath = database_path('migrations');
        $directories = glob($migrationsPath . '/*', GLOB_ONLYDIR);
        $paths = array_merge([$migrationsPath], $directories);
        $this->loadMigrationsFrom($paths);
        // View::composer('*', function ($view) {
        //     $settings = Setting::with('translations')->first();
        //     $view->with('settings', $settings);
        //     $main_setting = MainSetting::with('translations')->first();
        //     $view->with('main_setting', $main_setting);
        // });

        $this->app->bind(ConfigRepository::class,TestConfigRepository::class);
    }
}
