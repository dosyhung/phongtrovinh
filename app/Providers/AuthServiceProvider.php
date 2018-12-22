<?php

namespace App\Providers;

use App\Policies\AdminPolicy;
use App\Policies\NewPolicy;
use App\User;
use App\Room;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Room::class => NewPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('show-profile',function ($user){
            return $user->level==1 && $user->active ==1;
        });
        Gate::define('getindex',function ($user){
           return false;
        });
    }
}
