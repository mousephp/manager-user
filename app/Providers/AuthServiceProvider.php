<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Auth;
use App\User;
use App\Models\Post;
use App\Policies\PostPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    //bật phần này để thực hiện Policy
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('is-admin', function ($user) {
            return Auth::user()->name == 'admin';
        });

        Gate::define('user-create', function () {
            if(Auth::user()->name == 'admin'){
                return true;
            }
            return false;
        });

        Gate::define('user-view', function ($user) {
            if(Auth::user()->name == 'admin'){
                return true;
            }
            return Auth::user()->name == $user->name;
        });

        Gate::define('user-edit', function ($user) {
            if(Auth::user()->name == 'admin'){
                return true;
            }
            return Auth::user()->name == $user->name;
        });

        Gate::define('user-delete', function ($user) {
            if(Auth::user()->name == 'admin'){
                return true;
            }
            return Auth::user()->name == $user->name;
        });

        Gate::define('user-delete-all', function ($user) {
            if(Auth::user()->name == 'admin'){
                return true;
            }
            return false;
        });

    }
}
