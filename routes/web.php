<?php

use Illuminate\Support\Facades\Route;

// Import AuthController
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
| Route untuk:
| - login
| - register
| Hanya bisa diakses user yang belum login
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    /**
     * Halaman login
     */
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    /**
     * Proses login
     */
    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.post');

    /**
     * Halaman register
     */
    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    /**
     * Proses register
     */
    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.post');
});

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
| Logout hanya bisa dilakukan user yang sudah login
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
| Route yang:
| - wajib login
| - wajib role admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    /**
     * Dashboard utama
     */
    Route::get('/', function () {
        return view('index');
    })->name('dashboard');

    /**
     * Halaman questions
     */
    Route::get('/questions', function () {
        return view('questions');
    })->name('questions');

    /**
     * Tambah soal
     */
    Route::get('/questions/add', function () {
        return view('addQuestions');
    })->name('questions.add');

    /**
     * Edit soal
     */
    Route::get('/questions/edit', function () {
        return view('editQuestions');
    })->name('questions.edit');

    /**
     * Participants
     */
    Route::get('/participants', function () {
        return view('participants');
    })->name('participants');

    /**
     * Test Results
     */
    Route::get('/test-results', function () {
        return view('test-results');
    })->name('test-results');
});

Route::middleware('auth')->group(function () {

    Route::get('/user', function () {
        return view('user');
    })->name('user.dashboard');

});