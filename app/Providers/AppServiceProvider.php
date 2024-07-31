<?php

namespace App\Providers;

use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CategoryServiceInterface;
use App\Interfaces\ColorRepositoryInterface;
use App\Interfaces\SizeRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\ColorRepository;
use App\Repositories\SizeRepository;
use App\Services\CategoryService;
use App\Services\ColorService;
use App\Services\SizeService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public $serviceBindings = [
        'App\Services\Interfaces\CategoryServiceInterface' => 
        'App\Services\UserService',
    ];


    public function register(): void
    {
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ColorRepositoryInterface::class, ColorRepository::class);
        $this->app->singleton(ColorService::class, function ($app) {
            return new ColorService($app->make(ColorRepositoryInterface::class));
        });
        $this->app->bind(SizeRepositoryInterface::class, SizeRepository::class);
        $this->app->singleton(SizeService::class, function ($app) {
            return new SizeService($app->make(SizeRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
