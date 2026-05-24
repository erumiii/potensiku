<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

Route::get('/questions', function (){
    return view('questions.questions');
});

Route::get('/questions/add', function (){
    return view('questions.create');
});

Route::get('/questions/edit', function (){
    return view('questions.edit');
});

Route::get('/logout', function (){
    return view('signIn');
});

use App\Http\Controllers\SoalController;
Route::get('/questions', [SoalController::class, 'index'])->name('questions.index');
Route::get('/questions/add', [SoalController::class, 'create'])->name('questions.create');
Route::post('/questions/add', [SoalController::class, 'store'])->name('questions.store');
Route::get('/questions/{id}/edit', [SoalController::class, 'edit'])->name('questions.edit');
Route::put('/questions/{id}', [SoalController::class, 'update'])->name('questions.update');
Route::delete('/questions/{id}', [SoalController::class, 'destroy'])->name('questions.destroy');