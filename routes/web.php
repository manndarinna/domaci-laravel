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

Route::get('/', 'PageController@pocetna');
Route::get('/termini', 'PageController@termini');
Route::get('/korisnici', 'PageController@korisnici');

Route::get('/korisnici/delete', 'KorisnikController@izbrisiKorisnika');
Route::get('/korisnici/get', 'KorisnikController@getKorisnici');

Route::get('/termini/get', 'TerminController@getTermine');
Route::get('/termini/getKreirao', 'TerminController@getTermineByKorisnikKreirao');
Route::post('/termini/create', 'TerminController@dodajTermin');
Route::put('/termini/update', 'TerminController@zavrsenTermin');
Route::get('/termini/delete', 'TerminController@izbrisiTermin');
