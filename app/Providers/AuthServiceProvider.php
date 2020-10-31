<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
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

        Gate::define('editPost', function (User $user, Post $post)
        {
            if (Auth::id() === $post->user_id){
                return true;
            }
        });

        Gate::define('editUser', function (User $user, User $selectedUser)
        {
            if (Auth::id() === $selectedUser->id){
                return true;
            }
        });

        Gate::define('seeAllUsers', function (User $user)
        {
            if ($user->admin){
                return true;
            }
        });
    }
}
