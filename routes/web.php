<?php
use App\Http\Controllers\ParticipantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoalController;

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
     * Soal
     */
    Route::get('/questions', [SoalController::class, 'index'])->name('questions.index');
    Route::get('/questions/add', [SoalController::class, 'create'])->name('questions.create');
    Route::post('/questions/add', [SoalController::class, 'store'])->name('questions.store');
    Route::get('/questions/{id}/edit', [SoalController::class, 'edit'])->name('questions.edit');
    Route::put('/questions/{id}', [SoalController::class, 'update'])->name('questions.update');
    Route::delete('/questions/{id}', [SoalController::class, 'destroy'])->name('questions.destroy');

    /**
     * Participants
     */
    Route::prefix('participants')->group(function () {

        Route::get('/', [ParticipantController::class, 'index'])->name('participants.index');

        Route::get('/create', [ParticipantController::class, 'create'])->name('participants.create');

        Route::post('/', [ParticipantController::class, 'store'])->name('participants.store');

        Route::get('/{participant}/edit', [ParticipantController::class, 'edit'])->name('participants.edit');

        Route::put('/{participant}', [ParticipantController::class, 'update'])->name('participants.update');

        Route::delete('/{participant}', [ParticipantController::class, 'destroy'])->name('participants.destroy');
    });

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