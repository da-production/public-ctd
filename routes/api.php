<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'commune', 'as' => 'commune.', 'namespace' => 'Api'], function () {
    Route::get('/bywilaya/{code}', 'CommuneController@bywilaya')->name('bywilaya');
});

Route::group(['prefix' => 'demande', 'as' => 'demande.', 'namespace' => 'Api'], function () {
    Route::get('/show/{id}/{nom}', 'DemandeController@show')->name('show');
    Route::put('/avis/{identifiant}', 'DemandeController@avis')->name('avis');
});

Route::group(['prefix' => 'users', 'as' => 'users.', 'namespace' => 'Api'], function () {
    Route::get('/show/{id}/{username}', 'UserController@show')->name('show');
    Route::put('/changestat/{id}/{username}', 'UserController@changestat')->name('changestat');
    Route::post('/ajouter', 'UserController@store')->name('ajouter');
});