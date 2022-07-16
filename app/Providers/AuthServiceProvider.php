<?php

namespace App\Providers;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];


    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-post', function (User $user, BlogPost $post) {
            return $user->id === $post->user_id;
        });

        Gate::define('delete-post', function (User $user, BlogPost $post) {
            return $user->id === $post->user_id;
        });
    }
}
