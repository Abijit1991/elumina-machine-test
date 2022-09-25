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

        /* defining admin role */
        Gate::define('isAdmin', function ($user) {
            return $user->userrole_id === 1;
        });

        /* defining customer role */
        Gate::define('isCustomer', function ($user) {
            return $user->userrole_id === 2;
        });
    }
}
