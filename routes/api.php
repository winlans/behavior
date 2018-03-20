<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->post('/user', function (Request $request) {
//    var_dump('fafaf');
//    return $request->user();
//});

Route::prefix('auth')->group(function($router) {
    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');
});

Route::post('user/register', 'UserController@register');

Route::prefix('user')->middleware('refresh.token')->group(function($router) {
    $router->post('profile','UserController@profile');
});
