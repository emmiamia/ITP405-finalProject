<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('create-comment', function ($user) {
            // Logic to determine if the user can create a comment
            return true; // For demonstration, allow all authenticated users to create comments
        });
    
        Gate::define('update-comment', function ($user, $comment) {
            // Logic to determine if the user can update the comment
            return $user->id === $comment->user_id; // For demonstration, only allow the comment owner to update
        });
    
        Gate::define('delete-comment', function ($user, $comment) {
            // Logic to determine if the user can delete the comment
            return $user->id === $comment->user_id; // For demonstration, only allow the comment owner to delete
        });
    }
}
