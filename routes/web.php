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
Route::get('/', function () {
    return view('dpt.login');
});
Route::get('admin/index', 'Admin@adminindex');
Route::get('admin/datart', 'Admin@index');
Route::post('/create/datart','Admin@store');
Route::post('/create/datarw','Admin@storerw');
Route::get('/delete/{id}/rt', 'Admin@delete_rt');
Route::get('/delete/{id}/rw', 'Admin@delete_rw');
Route::get('/admin/{id}/editrt', 'Admin@edit');
Route::get('/admin/{id}/editrw', 'Admin@editrw');
Route::post('/update/{id}/datart','Admin@update_rt');
Route::post('/update/{id}/datarw','Admin@update_rw');
Route::get('dpt/berhasil','Admin@berhasil');
Route::get('dpt/gagal','Admin@gagal');
Route::get('admin/kandidat', 'Admin@kandidat');
Route::post('/create/kandidatrt','Admin@create_paslon_rt');
Route::post('/create/kandidatrw','Admin@create_paslon_rw');
Route::get('/delete/{id}/paslonrw', 'Admin@delete_paslonrw');
Route::get('/delete/{id}/paslonrt', 'Admin@delete_paslonrt');

Route::get('admin/dpt', 'Admin@dptindex');
Route::post('/create/datadpt','Admin@storedpt');
Route::get('/delete/{id}/dpt', 'Admin@delete_dpt');
Route::get('/admin/{id}/editdpt', 'Admin@editdpt');
Route::post('/update/{id}/datadpt','Admin@update_dpt');


Route::get('admin/hasil', 'Admin@hasil');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dpt/login ', 'LoginDPT@auth');
Route::post('/dpt/login', 'LoginDPT@login');
Route::get('/dpt/logout', 'LoginDPT@logout');
Route::get('/dpt/index', 'LoginDPT@index');
Route::get('/dpt/index', 'LoginDPT@data');
Route::get('/dpt/pemilihan', 'DptController@pemilihan');
Route::post('/dpt/voterw', 'DptController@voterw');
Route::get('/dpt/pemilihanrt', 'DptController@pemilihanrt');
Route::post('/dpt/votert', 'DptController@votert');
