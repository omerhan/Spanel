<?php
/**
 * Created by PhpStorm.
 * User: 303729
 * Date: 06.10.2017
 * Time: 10:36
 */
Route::group(['prefix' => 'spanel','middleware' => ['web', 'auth', 'roles','langs']], function(){

    Route::get('profile', config('spanel.controllersBath').'\UsersController@profile')->name('profile');
    Route::put('profile', config('spanel.controllersBath').'\UsersController@postprofile');
    Route::get('password', config('spanel.controllersBath').'\UsersController@password');
    Route::put('password', config('spanel.controllersBath').'\UsersController@postpassword');
    Route::resource('users', config('spanel.controllersBath').'\UsersController');
    Route::put('users/active/{id}/{deger}', config('spanel.controllersBath').'\UsersController@postactive');

    if(config('spanel.multipleLang')==true) {
        Route::resource('langs', config('spanel.controllersBath').'\LangsController');
        Route::put('langs/active/{id}/{deger}', config('spanel.controllersBath').'\LangsController@postactive');
        Route::get('langs/setLocale/{kisaltma}',config('spanel.controllersBath').'\LangsController@setlocale');
        Route::get('langs/trans/{id}', config('spanel.controllersBath').'\LangsController@gettrans');
        Route::put('langs/trans/{id}', config('spanel.controllersBath').'\LangsController@posttrans');
    }

    Route::get('/', ['as' => 'spanel', function () {
        return view('spanel::layouts.master');
    }]);

});
