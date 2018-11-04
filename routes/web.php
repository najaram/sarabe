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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['web', 'auth'])->group(function () {

    // Activity...
    Route::get('activities', 'ActivityController@index')->name('activities');
    Route::get('activities/{activity}', 'ActivityController@show')->name('activities.show');
    Route::post('activities', 'ActivityController@store')->name('activities.store');
    Route::put('activities/{activity}', 'ActivityController@update')->name('activities.update');
    Route::delete('activities/{activity}', 'ActivityController@destroy')->name('activities.destroy');

    // Dashboard...
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    // Members...
    Route::get('members', 'MembersController@index')->name('members');
    Route::get('members/{member}', 'MembersController@show')->name('members.show');
    Route::post('members', 'MembersController@store')->name('members.store');
    Route::put('members/{member}', 'MembersController@update')->name('members.update');
    Route::delete('members/{member}', 'MembersController@destroy')->name('members.destroy');

    // Members Profile...
    Route::get('members/{member}/profile', 'MemberProfilesController@show')->name('members.profiles.show');
    Route::post('members/{member}/profile', 'MemberProfilesController@store')->name('members.profiles.store');
    Route::put('members/{member}/profile/{profile}', 'MemberProfilesController@update')->name('members.profiles.update');
    Route::delete('members/{member}/profile/{profile}', 'MemberProfilesController@destroy')->name('members.profiles.destroy');

    // News...
    Route::get('news-api', 'NewsController@newsApi')->name('news.api');

    // Services...
    Route::get('services', 'ServicesController@index')->name('services.index');
    Route::post('services', 'ServicesController@store')->name('services.store');
    Route::get('services/{service}', 'ServicesController@show')->name('services.show');
    Route::get('services/{service}/edit', 'ServicesController@edit')->name('services.edit');
    Route::put('services/{service}', 'ServicesController@update')->name('services.update');
    Route::delete('services/{service}', 'ServicesController@destroy')->name('services.destroy');

    // Weather...
    Route::get('weather', 'WeatherController@forecast')->name('weather.index');
});
