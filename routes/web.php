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

    // Members...
    Route::get('members', 'MembersController@index')->name('members');
    Route::get('members/{member}', 'MembersController@show')->name('members.show');
    Route::post('members', 'MembersController@store')->name('members.store');
    Route::put('members/{member}', 'MembersController@update')->name('members.update');

    // Members Profile...
    Route::get('members/{member}/profile', 'MemberProfilesController@show')->name('members.profiles.show');
    Route::post('members/{member}/profile', 'MemberProfilesController@store')->name('members.profiles.store');
    Route::put('members/{member}/profile/{profile}', 'MemberProfilesController@update')->name('members.profiles.update');

});
