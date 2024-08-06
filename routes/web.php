<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/quizzes', function () {
    return view('quizzes.index');
});

Route::get('/quizzes/show', function () {
    return view('quizzes.show');
});

Route::get('/quizzes/create', function () {
    return view('quizzes.create');
});
