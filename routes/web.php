<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'auth', 'as' => 'auth.', 'namespace' => 'Auth'], function ($router) {
    $router->get('/login', [
        'as'   => 'login',
        'uses' => 'LoginController@showLoginForm',
    ]);

    $router->post('/login', [
        'as'   => 'login.post',
        'uses' => 'LoginController@login',
    ]);

    $router->get('/logout', [
        'as'   => 'logout',
        'uses' => 'LoginController@logout',
    ]);
});


Route::get('{view}', 'HomeController@index')
    ->where('view', '(.*)')
    ->name('index');