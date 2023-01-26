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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/blog', function () {
//     return view('blog');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('blog', 'PostController')->parameters(['blog' => 'post']);
Route::resource('tag', 'TagController');
Route::resource('user', 'UserController');

Route::get('/blog/tag/{tag_id}', 'postTagController@getFilteredPosts')->name('blog_tag');
Route::get('/blog/{post_id}/{tag_id}/attach', 'postTagController@attachTag')->name('attach_tag');
Route::get('/blog/{post_id}/{tag_id}/detach', 'postTagController@detachTag')->name('detach_tag');
