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

Route::resource('/', 'FrontendController');
Route::resource('frontend', 'FrontendController');

Auth::routes();
Route::get('home', 'HomeController@index');
Route::get('/create', 'UsersController@createguru')->name('users.createguru');
Route::get('/all-artikel', 'AllController@artikel')->name('all.artikel');
Route::get('/all-review', 'AllController@review')->name('all.review');
Route::resource('users', 'UsersController');
Route::resource('artikel', 'ArtikelController');
Route::resource('siswa', 'SiswaController');
Route::resource('guru', 'GuruController');
Route::resource('tugas', 'TugasController');
Route::resource('home', 'HomeController');
Route::resource('profile', 'ProfileController');
Route::resource('review', 'ReviewController');
Route::resource('kelas', 'KelasController');
Route::resource('kategori', 'KategoriController');
Route::get('download/{file}', 'TugasController@download');
Route::get('export/tugas', 'TugasController@export');
Route::get('export/artikel','ArtikelController@export');
Route::get('export/users','UsersController@export');
Route::get('export/siswa','SiswaController@export');
Route::get('export/guru','GuruController@export');
Route::get('export/review','ReviewController@export');
Route::get('tugas/kirim/{id}','TugasController@kirim')->name('tugas.kirim');
