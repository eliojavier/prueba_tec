<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();



//Pages
Route::get('/', ['as' => 'welcome', 'uses' => 'PagesController@welcome']);
Route::get('galleries/{gallery?}', ['as' => 'gallery', 'uses' => 'GalleryController@gallery']);

Route::get('articles', ['as' => 'articles', 'uses' => 'ArticleController@all']);
Route::get('articles/{article}', ['as' => 'articles.detail', 'uses' => 'ArticleController@detail']);

Route::get('about', ['as' => 'about', 'uses' => 'PagesController@about']);
Route::get('story', ['as' => 'story', 'uses' => 'PagesController@story']);
Route::get('team', ['as' => 'team', 'uses' => 'PagesController@team']);

Route::get('contact', ['as' => 'contact.index', 'uses' => 'PagesController@contact']);
Route::post('contact', ['as' => 'contact.send', 'uses' => 'PagesController@sendContactEmail']);

Route::get('profile', ['as' => 'profile', 'uses' => 'PagesController@profile']);
Route::post('avatar', [
    'as'   => 'add.avatar',
    'uses' => 'PagesController@addAvatar'
]);
Route::get('/home', 'PagesController@home');
Route::get('level/{id}', 'PagesController@level');
Route::get('family/{name}', 'PagesController@family');


/**
 * Dashboard/Admin panel routes.
 */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index');
    Route::post('users/{user}/change/{status}', ['as' => 'admin.users.status', 'uses' => 'UserController@changeStatus']);
    Route::get('users/active', ['as' => 'admin.users.active.data', 'uses' => 'UserController@activeParentsData']);
    Route::get('users/inactive', ['as' => 'admin.users.inactive.data', 'uses' => 'UserController@inactiveParentsData']);
    Route::resource('users', 'UserController');

    Route::get('articles/data', ['as' => 'admin.articles.data', 'uses' => 'ArticleController@articlesData']);
    Route::resource('articles', 'ArticleController');

    Route::resource('files', 'FileController');
    Route::post('galleries/{gallery}/photo', ['as' => 'admin.galleries.photo', 'uses' => 'GalleryController@addPhoto']);
    Route::resource('galleries', 'GalleryController');
    
    //
    Route::post('albums/{album}/photo', ['as' => 'admin.albums.photo', 'uses' => 'AlbumController@addPhoto']);
    Route::resource('albums', 'AlbumController');

});