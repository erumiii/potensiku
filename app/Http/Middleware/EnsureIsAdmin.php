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
 * Middleware Admin
 *
 * Fungsi:
 * Memastikan hanya user dengan role admin
 * yang boleh mengakses halaman tertentu.
 *
 * Contoh:
 * - dashboard admin
 * - halaman CRUD soal
 * - halaman peserta
 */
class EnsureIsAdmin
{
    /**
     * Handle request middleware
     */
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        /**
         * Jika user belum login
         */
        if (!Auth::check()) {

            /**
             * Redirect ke login
             */
            return redirect()
                ->route('login')
                ->with(
                    'error',
                    'Silakan login terlebih dahulu.'
                );
        }

        /**
         * Jika role bukan admin
         */
        if (Auth::user()->role !== 'admin') {

            /**
             * Logout user
             */
            Auth::logout();

            /**
             * Hapus session lama
             */
            $request->session()->invalidate();

            /**
             * Generate token baru
             */
            $request->session()->regenerateToken();

            /**
             * Redirect ke login
             */
            return redirect()
                ->route('login')
                ->with(
                    'error',
                    'Akses ditolak. Hanya admin yang diizinkan.'
                );
        }

        /**
         * Jika lolos semua pengecekan
         * lanjut ke halaman berikutnya
         */
        return $next($request);
    }
}