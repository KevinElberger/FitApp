<?php

Route::get('/', 'PagesController@index');


Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/login', function() {
        return view('/auth/login');
    });

    Route::get('/pages/weight', 'PagesController@weight');
    Route::get('/workouts/index','WorkoutsController@index');
    Route::post('/workouts/create', 'WorkoutsController@store');
    Route::get('/workouts/create', 'WorkoutsController@create');
    Route::get('/workouts/{user}/{name}', 'WorkoutsController@show');
    Route::get('/pages/home', 'PagesController@index');
});