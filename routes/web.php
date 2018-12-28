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



//Route::get('/adminLogin', 'AdminController@login')->name('admin.login');
Route::match(['get', 'post'], '/adminLogin', 'AdminController@login')->name('admin.login');

Route::group(['middleware' => 'auth'], function(){
  Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
  Route::get('/admin/profile/{id}', 'AdminController@profile')->name('profile');
  Route::post('/admin/profile/update/{id}', 'AdminController@update_profile')->name('update.profile');
});


Route::get('/logout', 'AdminController@logout')->name('admin.logout');
