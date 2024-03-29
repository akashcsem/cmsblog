<?php
use App\Http\Controllers\Blog\PostsController;
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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/blog/post/{post}', [PostsController::class, 'show'])->name('blog.show');
Route::get('/blog/category/{category}', 'Blog\PostsController@category')->name('blog.category');
Route::get('/blog/tag/{tag}', 'Blog\PostsController@tag')->name('blog.tag');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){
  Route::resource('categories', 'CategoriesController');
  Route::resource('tags', 'TagsController');
  Route::resource('myposts', 'PostsController');
  Route::get('trashed-posts', 'PostsController@trashed')->name('trashed-posts.index');
  Route::put('restore-post/{post}', 'PostsController@restore')->name('restore-posts');

});


Route::middleware(['auth', 'admin'])->group(function(){
  Route::get('users', 'UsersController@index')->name('users.index');
  Route::post('users/{id}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
  Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');
  Route::put('users/profile', 'UsersController@update')->name('users.update-porfile');

});
