<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {

        // Gate pour vérifier si l'utilisateur est un professeur
        Gate::define('is-professeur', function ($user) {
            return $user->role === 'Professeur';
        });

        // Gate pour vérifier si l'utilisateur est un élève
        Gate::define('is-eleve', function ($user) {
            return $user->role === 'Eleve';
        });
    }
}
