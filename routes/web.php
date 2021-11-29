<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Auth::routes([
    'register' => false,
    'reset' => false,
]);

Route::get('/', 'HomeController@index');

Route::get('/about', 'AboutController@index');

Route::get('/github', 'GithubController@index');

Route::get('/contact', 'ContactController@index');

Route::get('/buku', 'BukuController@index');

Route::get('/detail-buku/{judul}', 'BukuController@galbuku')->name('galeri.buku');

Route::get('/buku/list_buku', 'BukuController@list')->name('buku.list');

Route::get('/buku/create', 'BukuController@create')->name('buku.create');

Route::post('/buku', 'BukuController@store')->name('buku.store');

Route::post('/buku/delete/{id}', 'BukuController@destroy')->name('buku.destroy');

Route::get('/buku/edit/{id}', 'BukuController@edit')->name('buku.edit');

Route::post('buku/{id}', 'BukuController@update')->name('buku.update');

Route::get('/buku/search','BukuController@search')->name('buku.search');

Route::get('/buku/like/{id}', 'BukuController@likefoto')->name('buku.like');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'UsersController@index');

Route::get('/users/user_create', 'UsersController@create')->name('user.create');

Route::post('/users', 'UsersController@store')->name('user.store');

Route::post('/users/delete/{id}', 'UsersController@destroy')->name('user.destroy');

Route::get('/users/edit/{id}', 'UsersController@edit')->name('user.edit');

Route::post('users/{id}', 'UsersController@update')->name('user.update');

Route::get('/galeri', 'GaleriController@index');


Route::get('/galeri/create', 'GaleriController@create')->name('galeri.create');

Route::post('/galeri', 'GaleriController@store')->name('galeri.store');

Route::get('/galeri/edit/{id}', 'GaleriController@edit')->name('galeri.edit');

Route::post('/galeri/update/{id}', 'GaleriController@update')->name('galeri.update');

Route::post('/galeri/delete/{id}', 'GaleriController@destroy')->name('galeri.destroy');

Route::post('/detail-buku/{id}', 'KomentarController@store')->name('komentar.store');


