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
    Route::get('/main', 'MainController@index')->name('main');
    /** Tratamientos */
    Route::post('/cuadrante/add', 'CuadranteController@add')->name('cuadrante');
    Route::post('/revision/add', 'RevisionController@add')->name('revision');
    Route::post('/limpieza/add', 'LimpiezaController@add')->name('limpieza');
    Route::post('/mantenimiento/add', 'MantenimientoController@add')->name('mantenimiento');
    Route::post('/treatments/update-ajax', 'TreatmentController@updateTreatmentAjax')->name('update-treatment-ajax');
    /** Fechas citas */
    Route::post('/nextdate/addTreatment', 'DateController@addTreatment')->name('nextdate');
    /** Periodontics */
    Route::get('/periodontics', 'PeriodonticController@index')->name('periodontics');
    Route::get('/periodontics/card', 'PeriodonticController@card')->name('card');
    Route::get('/periodontics/update-card', 'PeriodonticController@update')->name('updatecard');
    /** Pacients */
    Route::get('/pacients/new', 'PacientController@newPacient')->name('newpacient');
    Route::get('/pacients/create', 'PacientController@createPacient');
    Route::get('/pacients/edit', 'PacientController@editPacient')->name('editpacient');
    Route::get('/pacients/edit-page', 'PacientController@editPagePacient')->name('editpage');
    Route::get('/pacients/seach-pacient-ajax', 'PacientController@searchPacientAjax');
    /** Reminder */
    Route::get('/reminder/get-dates', 'ReminderController@getDates')->name('reminder');
    Route::get('/reminder/close-date', 'ReminderController@closeDate')->name('close-reminder');
});
