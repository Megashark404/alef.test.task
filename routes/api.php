<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Роуты, отвечающие за студентов
Route::get('/students', 'App\Http\Controllers\StudentsController@getAll');
Route::get('/student/get/{student}', 'App\Http\Controllers\StudentsController@getOne');
Route::post('/student/create', 'App\Http\Controllers\StudentsController@create');
Route::put('/student/update/{student}', 'App\Http\Controllers\StudentsController@update');
Route::delete('/student/delete/{student}', 'App\Http\Controllers\StudentsController@delete');


// Роуты, отвечающие за классы
Route::get('/classes', 'App\Http\Controllers\ClassesController@getAll');
Route::post('/class/create', 'App\Http\Controllers\ClassesController@create');
Route::get('/class/get/{class}', 'App\Http\Controllers\ClassesController@getOne');
Route::get('/class/lections/{class}', 'App\Http\Controllers\ClassesController@getLections');
Route::post('/class/lections/create/{class}', 'App\Http\Controllers\ClassesController@createLections');
Route::put('/class/lections/update/{class}', 'App\Http\Controllers\ClassesController@updateLections');
Route::put('/class/update/{class}', 'App\Http\Controllers\ClassesController@update');
Route::delete('/class/delete/{class}', 'App\Http\Controllers\ClassesController@delete');
Route::put('/class/update-study-plan/{class}', 'App\Http\Controllers\ClassesController@updateStudyPlan');


// Роуты, отвечающие за лекции
Route::get('/lections', 'App\Http\Controllers\LectionsController@getAll');
Route::get('/lection/get/{lection}', 'App\Http\Controllers\LectionsController@getOne');
Route::post('/lection/create', 'App\Http\Controllers\LectionsController@create');
Route::put('/lection/update/{lection}', 'App\Http\Controllers\LectionsController@update');
Route::delete('/lection/delete/{lection}', 'App\Http\Controllers\LectionsController@delete');