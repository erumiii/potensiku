<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

Route::get('/questions', function (){
    return view('questions');
});

Route::get('/questions/add', function (){
    return view('addQuestions');
});

Route::get('/questions/edit', function (){
    return view('editQuestions');
});