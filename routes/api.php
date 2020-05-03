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

// Route::middleware('auth:api')->get('/v1', function (Request $request) {
//    return $request->user();
// });

Route::group(['prefix' => '/', 'namespace' => 'Api', 'middleware' => []], function () {

    Route::group(['prefix' => '/v{version}', 'middleware' => []], function () {

        Route::group(['prefix' => 'subdomain', 'namespace' => 'Subdomain'], function () {

            Route::post('/list', ['as' => 'Api-SubdomainPostList', 'uses' => 'SubdomainController@postList']);
            Route::post('/create', ['as' => 'Api-SubdomainPostCreate', 'uses' => 'SubdomainController@postCreate']);
            Route::post('/delete', ['as' => 'Api-SubdomainPostDelete', 'uses' => 'SubdomainController@postDelete']);
        });
    });
});
