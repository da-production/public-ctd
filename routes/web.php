<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('user.profile');
})->middleware('auth');

/** CommuneGroup */
Route::group(['prefix' => 'commune', 'as' => 'commune.', 'middleware' => 'auth'], function () {
    Route::get('/','CommuneController@index')->name('list');
});

/** DemandeGroup */
Route::group(['prefix' => 'demande', 'as' => 'demande.', 'middleware' => 'auth'], function () {
    Route::get('/', 'DemandeController@index')->name('list');
    Route::get('/ajouter','DemandeController@create')->name('ajouter');
    Route::get('/show/{prenom}/{nom}','DemandeController@show')->name('show');
    Route::get('/notifications','DemandeController@notifications')->name('notifications');
    Route::get('/notification/{identifiant}/{id}/{notification}','DemandeController@notification')->name('notification');
    Route::post('/ajouter', 'DemandeController@store')->name('store');
    Route::get('/modifier/{identifiant}/{prenom}/{nom}','DemandeController@modifier')->name('modifier');
    Route::put('/update/{nom}','DemandeController@update')->name('update');
    Route::get('/print/{nom}','DemandeController@print')->name('print');
});

/** MemberGroup */
Route::group(['prefix' => 'users', 'as'=>'users.', 'middleware' => 'auth'], function () {
    Route::get('/','UserController@index')->name('list');
    Route::get('/profile',function(){
        return view('user.profile');
    })->name('profile');
    Route::get('/profile/edit/{user}/{id}','UserController@edit')->name('edit');
    Route::put('/profile','UserController@update')->name('update');
    Route::put('/profile/password','UserController@password')->name('password');
    Route::post('/ajouter', 'UserController@store')->name('store');
});

/** WilayaGroup */
Route::group(['prefix' => 'wilaya', 'as' => 'wilaya.', 'middleware' => 'auth'], function () {
   Route::get('/','WilayaController@index')->name('list');
   Route::get('/ajouter','WilayaController@create')->name('ajouter');
   Route::post('/ajouter','WilayaController@store')->name('store');
});

Route::group(['prefix' => 'previlage','as'=>'previlage.','middleware'=>['auth']], function () {
    Route::get('/','Previlagecontroller@index')->name('list');
});

/** AuthRoutes */
Auth::routes();
