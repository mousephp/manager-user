<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder;

use App\Repositories\Eloquents\UserRepository;
use App\Repositories\Contracts\UserRepositoryInterface;

use App\Repositories\Eloquents\RoleRepository;
// use App\Repositories\Eloquents\roleRepository;
use App\Repositories\Contracts\RoleRepositoryInterface;

use App\Repositories\Eloquents\PermissionRepository;
use App\Repositories\Contracts\PermissionRepositoryInterface;

use App\Repositories\Eloquents\PostRepository;
use App\Repositories\Contracts\PostRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);   
        $this->app->bind(PermissionRepositoryInterface::class,PermissionRepository::class);   
        $this->app->bind(PostRepositoryInterface::class,PostRepository::class);  
        $this->app->bind(RoleRepositoryInterface::class,RoleRepository::class);   
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::defaultStringLength(191); 
    }
}
