<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            return $user->hasRole('admin');
        });
        Gate::define('kepala kelurahan', function ($user) {
            return $user->hasRole('kepala kelurahan');
        });
        Gate::define('staff kelurahan', function ($user) {
            return $user->hasRole('staff kelurahan');
        });
        Gate::define('staff pkk', function ($user) {
            return $user->hasRole('staff pkk');
        });
    }
}
