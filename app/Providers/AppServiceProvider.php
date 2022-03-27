<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Gate::define('admin', function (User $user) {
            return $user->role->id == 1;
        });

        Gate::define('manajer', function (User $user) {
            return $user->role->id == 2;
        });

        Gate::define('kasir', function (User $user) {
            return $user->role->id == 3;
        });

        Gate::define('pelanggan', function (User $user) {
            return $user->role->id == 4;
        });
    }
}
