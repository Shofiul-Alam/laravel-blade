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

Route::get('/401', function () { return view('errors.401'); });
Route::get('/403', function () { return view('errors.403'); });
Route::get('/404', function () { return view('errors.404'); });
Route::get('/419', function () { return view('errors.419'); });
Route::get('/500', function () { return view('errors.500'); });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function() {
    return view('admin.index');
});

Route::group(['middleware' => 'admin'], function() {
    
    Route::resource('admin/users', 'AdminUsersController');

    Route::resource('admin/posts', 'AdminPostsController');

    Route::resource('admin/categories', 'AdminCategoriesController');
});


