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

Route::get('/', ['as' => 'admin.index', function () {
    return view('welcome');
}]);

/*Route::get('/', ['as' => 'admin.welcome', function () {
    return Redirect::to('admin/auth/login');
}]);*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

	Route::get('/', ['as' => 'admin.index', function () {
	    return view('welcome');
	}]);

	/*
	*	Users
	*/
	Route::resource('users', 'UsersController');
	Route::get('users/{id}/destroy', [
		'uses' 	=> 'UsersController@destroy',
		'as'	=> 'admin.users.destroy'
	]);

	/*
	*	Playlists
	*/
	Route::resource('playlists', 'PlaylistsController');

	/*Route::get('playlists/all', [
		'uses' 	=> 'PlaylistsController@all',
		'as'	=> 'admin.playlists.all'
	]);*/

	/*Route::get('playlists/all', function(){
		return "hola mundo";
	});*/

	
	//Route::get('playlists/all', 'PlaylistsController@all');

	Route::get('playlists/follow/{id}', [
		'uses' 	=> 'PlaylistsController@follow',
		'as'	=> 'admin.playlists.follow'
	]);

	Route::get('playlists/unfollow/{id}', [
		'uses' 	=> 'PlaylistsController@unfollow',
		'as'	=> 'admin.playlists.unfollow'
	]);

	/*
	*	YouTube Videos
	*/
	Route::get('playlists/{id}/youtubevideos/index', [
		'uses' 	=> 'YoutubevideosController@index',
		'as'	=> 'admin.youtubevideos.index'
	]);

	Route::get('playlists/{id}/youtubevideos/showvideos', [
		'uses' 	=> 'YoutubevideosController@showvideos',
		'as'	=> 'admin.youtubevideos.showvideos'
	]);

	Route::get('playlists/{id}/youtubevideos/create', [
		'uses' 	=> 'YoutubevideosController@create',
		'as'	=> 'admin.youtubevideos.create'
	]);

	Route::post('playlists/{id}/youtubevideos/store', [
		'uses' 	=> 'YoutubevideosController@store',
		'as'	=> 'admin.youtubevideos.store'
	]);

	Route::get('playlists/{id}/youtubevideos/destroy', [
		'uses' 	=> 'YoutubevideosController@destroy',
		'as'	=> 'admin.youtubevideos.destroy'
	]);

});

Route::get('users/addnew', [
	'uses' 	=> 'UsersController@addnew',
	'as'	=> 'users.addnew'
]);

Route::post('users/', [
	'uses' 	=> 'UsersController@storenew',
	'as'	=> 'users.storenew'
]);

// Authentication routes...
Route::get('admin/auth/login', [
	'uses'	=> 'Auth\AuthController@getLogin',
	'as'	=> 'admin.auth.login'
]);

Route::post('admin/auth/login', [
	'uses'	=> 'Auth\AuthController@postLogin',
	'as'	=> 'admin.auth.login'
]);

Route::get('admin/auth/logout', [
	'uses'	=> 'Auth\AuthController@getLogout',
	'as'	=> 'admin.auth.logout'
]);