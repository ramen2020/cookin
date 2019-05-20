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
//Deliveries@indexを経由してトップページへ
Route::get('/', 'DeliveriesController@index');


// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');




Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'edit', 'update','destroy']]);
    Route::resource('deliveries', 'DeliveriesController');
    Route::resource('messages', 'MessagesController', ['only' => ['store','destroy']]);

/*    
    Route::group(['prefix' => 'messages/{id}'], function () {
        Route::post('store', 'MessagesController@store')->name('messages.store');
  
    });
*/    
    
    
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('favorite', 'FavoritesController@store')->name('user.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('user.unfavorite');
        Route::get('favorites', 'FavoritesController@favorites')->name('users.favorites');
        Route::get('followers', 'FavoritesController@followers')->name('users.followers');
    });
    
   

});
