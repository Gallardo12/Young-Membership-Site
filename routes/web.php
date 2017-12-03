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

/*
use App\Mail\ContactUS;

Route::get('/contact-us', function () {

Mail::to('contacto@youngmentorship.com')->send(new ContactUS);

return view('emails.contactus');

});
 */

Route::get('/blog/bin', 'BlogController@bin');
Route::get('/blog/bin/{id}/restore', 'BlogController@restore');
Route::get('/blog/bin/{id}/destroyblog', 'BlogController@destroyBlog');

Route::get('/', function () {
	return view('welcome');
});

Route::get('/services', function () {
	return view('services');
});

Route::get('/contact', function () {
	return view('contact');
});

Route::get('/contact-us', 'ContactUSController@contactUS');

Route::post('/contact-us', ['as' => 'contact-us.store', 'uses' => 'ContactUSController@contactUSPost']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index');

Route::get('/blog', 'BlogController@index');
Route::get('/blog/create', 'BlogController@create');
Route::post('/blog/store', 'BlogController@store');
Route::get('/blog/{id}', 'BlogController@show');
Route::get('/blog/{id}/edit', 'BlogController@edit');
Route::patch('/blog/{id}', 'BlogController@update');
Route::delete('/blog/{id}', 'BlogController@destroy');