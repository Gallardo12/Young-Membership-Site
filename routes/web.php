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

View::share('service', App\Service::latest()->get());
View::share('user', App\User::all());
View::share('categories', App\Category::latest()->get());
View::share('blog', App\Blog::all());

Route::get('/contact', 'MailController@contact');
Route::post('/contact/send', 'MailController@send');

Route::patch('/services/{id}', 'ServiceController@publish');

Auth::routes();

Route::get('/blog/bin', 'BlogController@bin');
Route::get('/blog/bin/{id}/restore', 'BlogController@restore');
Route::get('/blog/bin/{id}/destroyblog', 'BlogController@destroyBlog');

Route::get('/services/bin', 'ServiceController@bin');
Route::get('/services/bin/{id}/restore', 'ServiceController@restore');
Route::get('/services/bin/{id}/destroyservice', 'ServiceController@destroyService');

Route::get('/', function () {
	return view('welcome');
});

Route::get('/admin', 'AdminController@index');

Route::get('/blog', 'BlogController@index');
Route::get('/blog/create', 'BlogController@create');
Route::post('/blog/store', 'BlogController@store');
Route::get('/blog/{id}', 'BlogController@show');
Route::get('/blog/{id}/edit', 'BlogController@edit');
Route::patch('/blog/{id}', 'BlogController@update');
Route::delete('/blog/{id}', 'BlogController@destroy');

Route::get('/services', 'ServiceController@index')->name('services');
Route::get('/services/create', 'ServiceController@create');
Route::post('/services/store', 'ServiceController@store');
Route::get('/services/{slug}', 'ServiceController@show')->name('services.show');
Route::get('/services/{id}/edit', 'ServiceController@edit');
Route::put('/services/{id}', 'ServiceController@update');
Route::delete('/services/{id}', 'ServiceController@destroy');
Route::patch('/services', 'ServiceController@postService')->name('services.post');

Route::get('/categories', 'CategoryController@index');
Route::get('/categories/create', 'CategoryController@create');
Route::post('/categories/store', 'CategoryController@store');
Route::get('/categories/{id}', 'CategoryController@show');
Route::get('/categories/{id}/edit', 'CategoryController@edit');
Route::patch('/categories/{id}', 'CategoryController@update');
Route::delete('/categories/{id}', 'CategoryController@destroy');

Route::resource('blog', 'BlogController');
Route::resource('services', 'ServiceController');
Route::resource('categories', 'CategoryController');
Route::resource('media', 'PhotosController');
Route::resource('media2', 'PhotobsController');

Route::get('userslist', 'UserController@userslist');
Route::resource('users', 'UserController');

Route::group(['prefix' => 'messages'], function () {
	Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
	Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
	Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
	Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
	Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});