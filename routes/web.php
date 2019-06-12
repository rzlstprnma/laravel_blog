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

Route::get('/', 'frontController@index');
Route::get('/penulis', 'frontController@penulis');
Route::get('/penulis/{id}', 'frontController@penulisShow');
Route::get('/blog', 'frontController@blog');
Route::get('/blog/category/{slug}', 'frontController@blogCategory');
Route::get('/blog/tag/{slug}', 'frontController@blogTag');

Auth::routes();



Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', 'adminController@index')->name('dashboard');
    Route::get('/user_profile', 'adminController@profile');
    // Route crud Profile
    Route::resource('profile', 'userController');
    Route::get('/profile/delete/{id}', 'userController@profileDestroy');
    // Route CRUD Skill
    Route::post('/skill/store', 'userController@skillStore');
    Route::get('/skill/destroy/{id}', 'userController@skillDestroy');
    // Social Media CRUD
    Route::post('/socialmedia/store', 'userController@socialMediaStore');
    Route::get('/socialmedia/destroy/{id}', 'userController@socialMediaDestroy');
    // Portfolio CRUD
    Route::get('/portfolio/create', 'userController@portfolioCreate');
    Route::post('/portfolio/store', 'userController@portfolioStore');
    Route::get('/portfolio/destroy/{id}', 'userController@portfolioDestroy');

    // Categories Crud
    Route::post('/category/store', 'blogController@categoryStore');
    Route::get('/category/destroy/{id}', 'blogController@categoryDestroy');
    // Tags CRUD
    Route::post('/tag/store', 'blogController@tagStore');
    Route::get('/tag/destroy/{id}', 'blogController@tagDestroy');

    // Post CRUD
    Route::resource('post', 'blogController');
    Route::get('/post/publish/{id}', 'blogController@publish');
    Route::get('/post/destroy/{id}', 'blogController@postDestroy');
});
