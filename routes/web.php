<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','HomeController@index');
Route::get('/about','PagesController@about');
Route::get('/mahasiswa','MahasiswaController@index');


//students
// Route::get('/students','StudentsController@index');
// Route::get('/students/create','StudentsController@create');
// Route::post('/students','StudentsController@store');
// Route::get('/students/{student}','StudentsController@show');
// Route::get('/students/{student}/edit','StudentsController@edit');
// Route::patch('/students/{student}','StudentsController@update');
// Route::delete('/students/{student}','StudentsController@destroy');
// make it simply
Route::resource('students','StudentsController')->middleware('role:admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin-page', function() {
    return 'Halaman untuk Admin';
})->middleware('role:admin')->name('admin.page');

Route::get('user-page', function() {
    return 'Halaman untuk User';
})->middleware('role:user')->name('user.page');
