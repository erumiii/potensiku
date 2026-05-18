<?php

use Illuminate\Foundation\Application;

// Import konfigurasi exception Laravel
use Illuminate\Foundation\Configuration\Exceptions;

// Import konfigurasi middleware Laravel
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(
    basePath: dirname(__DIR__)
)

    /**
     * Routing Laravel
     */
    ->withRouting(

        // Route web
        web: __DIR__ . '/../routes/web.php',

        // Route artisan / console
        commands: __DIR__ . '/../routes/console.php',

        // Health check Laravel
        health: '/up',
    )

    /**
     * Register middleware custom
     */
    ->withMiddleware(function (Middleware $middleware) {

        /**
         * Alias middleware
         */
        $middleware->alias([

            /**
             * Middleware guest
             * Jika sudah login → redirect dashboard
             */
            'guest' =>
            \App\Http\Middleware\RedirectIfAuthenticated::class,

            /**
             * Middleware admin
             * Hanya admin yang boleh akses
             */
            'admin' =>
            \App\Http\Middleware\EnsureIsAdmin::class,
        ]);
    })

    /**
     * Konfigurasi exception Laravel
     */
    ->withExceptions(function (Exceptions $exceptions) {

        //
    })

    /**
     * Membuat aplikasi Laravel
     */
    ->create();