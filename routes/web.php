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

Route::delete('quizzes/{id}', function ($id){
    return json_encode(['message'=>'ID:'.$id.'が削除されるIDです']);
});
