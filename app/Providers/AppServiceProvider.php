<?php

namespace App\Providers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

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
        Model::preventLazyLoading();

        Gate::define('admin', function (User $user) {
            return $user->is_admin;
        });
        Gate::define('owner', function (User $user) {
            return $user->is_owner;
        });
        Gate::define('owner-admin', function (User $user) {
            return $user->is_owner || $user->is_admin;
        });
    }
}
