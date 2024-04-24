<?php

use App\Http\Route;

Route::get('/',               'CryptographyController@index');
Route::get('/fetch',          'CryptographyController@fetch');
Route::post('/',              'CryptographyController@cryptography');
Route::get('/{id}',           'CryptographyController@findById');
Route::put('/update',         'CryptographyController@update');
Route::delete('/{id}/delete', 'CryptographyController@remove');
