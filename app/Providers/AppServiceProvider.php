<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Models\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;

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
        //String length for SQL
        Schema::defaultStringLength(191);

        Paginator::useBootstrap();
        //$this->registerPolicies();
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
        Gate::define('isAdmin','App\Gates\UserRole@isAdmin');
        Gate::define('notAdmin','App\Gates\UserRole@notAdmin');
        Gate::define('isStandard','App\Gates\UserRole@isStandard');
        Gate::define('isVendor','App\Gates\UserRole@isVendor');
    }
}
