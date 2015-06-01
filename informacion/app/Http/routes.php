<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/inicio', 'WelcomeController@index');
Route::get('info', 'InfoController@index');
Route::get('info/form_certificado_pagos_profesionales', 'InfoController@form_certificado_pagos_profesionales');
Route::post('info/certificado_pagos_profesionales', 'InfoController@certificado_pagos_profesionales');
Route::get('info/pdf', 'InfoController@generatePdf');
Route::get('auth/register', ['middleware' => 'manager', function(){
    return view('auth.register');
}]);
Route::post('register', 'UserController@register');
Route::get('censo/{p}', 'CensoController@censo');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
