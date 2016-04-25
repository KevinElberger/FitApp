<?php
Route::get('/', 'PagesController@index');
Route::get('/pages/employee', 'PagesController@employee');

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/login', function() {
        return view('/auth/login');
    });
    Route::get('/register', function() {
        return view('/auth/register');
    });

    Route::get('/pages/weight', 'PagesController@weight');
    Route::post('/pages/weight', 'PagesController@store');
    Route::get('/workouts/index','WorkoutsController@index');
    Route::post('/workouts/create', 'WorkoutsController@store');
    Route::get('/workouts/create', 'WorkoutsController@create');
    Route::get('/workouts/{user}/{name}', 'WorkoutsController@show');
    Route::get('/pages/home', 'PagesController@index');
});