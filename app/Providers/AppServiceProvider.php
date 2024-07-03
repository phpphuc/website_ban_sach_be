<?php

namespace App\Providers;

use App\Models\Account;
use App\Services\OrderService;
use App\Services\AuthorService;
use App\Services\AccountService;
use App\Services\ProductService;
use App\Factories\ProductFactory;
use App\Services\CategoryService;
use App\Services\CartDetailService;
use App\Repositories\OrderRepository;
use App\Repositories\AuthorRepository;
use App\Repositories\AccountRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Factories\ProductFactoryInterface;
use App\Repositories\CartDetailRepository;
use App\Services\Interfaces\OrderServiceInterface;
use App\Services\Interfaces\AuthorServiceInterface;
use App\Services\Interfaces\AccountServiceInterface;
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Services\Interfaces\CartDetailServiceInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Interfaces\AuthorRepositoryInterface;
use App\Repositories\Interfaces\AccountRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\CartDetailRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);

        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);

        $this->app->bind(AuthorRepositoryInterface::class, AuthorRepository::class);
        $this->app->bind(AuthorServiceInterface::class, AuthorService::class);

        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(OrderServiceInterface::class, OrderService::class);

        $this->app->bind(AccountRepositoryInterface::class, AccountRepository::class);
        $this->app->bind(AccountServiceInterface::class, AccountService::class);

        $this->app->bind(CartDetailServiceInterface::class, CartDetailService::class);
        $this->app->bind(CartDetailRepositoryInterface::class, CartDetailRepository::class);

        $this->app->bind(ProductFactoryInterface::class, ProductFactory::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
