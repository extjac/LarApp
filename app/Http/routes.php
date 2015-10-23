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

Route::get('/', function () {
    return view('home');
});
 Route::get('/home', function () {
    return view('home');
});


 
/** 
* patterns
*/
Route::pattern('id', '[0-9]+');


/** 
* AUTH
*/
Route::get('/auth/register' , 'Auth\AuthController@getRegister');
Route::get('/auth/login' 	, 'Auth\AuthController@getLogin');
Route::get('/auth/logout' 	, 'Auth\AuthController@getLogout');
Route::post('/auth/register', 'Auth\AuthController@postRegister');
Route::post('/auth/login' 	, 'Auth\AuthController@postLogin');


//if Logged in
Route::group( ['middleware' => 'auth'] , function () 
{	 
	/*
	* USERS *
	*/
	Route::get('/user', 'UserController@index' );
	Route::get('/user/{id}/{name}', 'UserController@show');	
	//API
	Route::get('/api/v1/user', 'UserController@index' );
	Route::post('/api/v1/user', 'UserController@store');
	Route::put('/api/v1/user/{id}', 'UserController@update');
	Route::delete('/api/v1/user/{id}', 'UserController@destroy');

	/*
	* CATEGORIES
	*/
	Route::get('/category', 'CategoryController@index' );
	//ajax
	Route::get('/api/v1/category', 'CategoryController@getList' );
	Route::get('/api/v1/category/{id}', 'CategoryController@show' );
	Route::post('/api/v1/category', 'CategoryController@store' ); 
	Route::put('/api/v1/category', 'CategoryController@update' ); 
	Route::delete('/api/v1/category/{id}', 'CategoryController@destroy' );

	/*
	* ITEMS
	*/
	Route::get('/product', 'ItemController@index' );
	//API
	Route::get('/api/v1/item', 'ItemController@getList' );
	Route::get('/api/v1/item/{id}', 'ItemController@show' );
	Route::post('/api/v1/item', 'ItemController@store' ); 
	Route::put('/api/v1/item', 'ItemController@update' ); 
	Route::delete('/api/v1/item/{id}', 'ItemController@destroy' );




});

