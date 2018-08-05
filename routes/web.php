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

Auth::routes();

/** Only auth users can access the application */
Route::group(['middleware' => 'auth'], function (){
    // Registration routers
    $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    $this->post('register', 'Auth\RegisterController@register');

    /** General Application */
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    /** Periodontics */
    Route::get('/periodontics', 'PeriodonticController@index')->name('periodontics');
    Route::get('/periodontics/card', 'PeriodonticController@card')->name('card');
    /** Pacients */
    Route::get('/pacients/new', 'PacientController@newPacient');
    Route::get('/pacients/create', 'PacientController@createPacient');
    Route::get('/pacients/seach-pacient-ajax', 'PacientController@searchPacientAjax');
});
