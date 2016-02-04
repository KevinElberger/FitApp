<?php

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
Route::get('/', 'PagesController@index');

Route::group(['middleware' => ['web']], function () {
    Route::get('/pages/weight', 'PagesController@weight');
    Route::get('/workouts/index','WorkoutsController@index');
    Route::post('/workouts/create', 'WorkoutsController@store');
    Route::get('/workouts/create', 'WorkoutsController@create');
    Route::get('/workouts/{user}/{name}', 'WorkoutsController@show');
});
