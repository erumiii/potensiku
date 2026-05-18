<?php

namespace App\Http\Middleware;

// Import Closure
use Closure;

// Import Request Laravel
use Illuminate\Http\Request;

// Import Auth Laravel
use Illuminate\Support\Facades\Auth;

// Import Response
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware Guest
 *
 * Fungsi:
 * Jika user sudah login,
 * maka tidak boleh membuka:
 * - login
 * - register
 *
 * Akan diarahkan ke dashboard.
 */
class RedirectIfAuthenticated
{
    /**
     * Handle request middleware
     */
    public function handle(
        Request $request,
        Closure $next,
        string ...$guards
    ): Response {

        /**
         * Jika tidak ada guard
         * gunakan default guard Laravel
         */
        $guards = empty($guards)
            ? [null]
            : $guards;

        /**
         * Loop semua guard
         */
        foreach ($guards as $guard) {

            /**
             * Jika user sudah login
             */
            if (Auth::guard($guard)->check()) {

                /**
                 * Redirect ke dashboard
                 */
                return redirect()
                    ->route('dashboard');
            }
        }

        /**
         * Jika belum login
         * lanjut ke halaman berikutnya
         */
        return $next($request);
    }
}