<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
* Index
* (Explicit routing)
*/

Route::get('/', 'HomeController@getIndex' );



/**
* User
* (Explicit Routing)
*/

Route::get('/signup','UserController@getSignup' );
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', 'UserController@postSignup' );
Route::post('/login', 'UserController@postLogin' );
Route::get('/logout', 'UserController@getLogout' );

/**
* Orders
* (Explicit Routing)
*/
//Route::get('/orders','OrderController@getOrders' );
//Route::get('/orders/create', 'OrderController@getCreate');
//Route::post('/orders/create', 'OrderController@postCreate');
//Route::get('/orders/edit/{id}', 'OrderController@getEdit');
//Route::post('/orders/edit', 'OrderController@postEdit');
//Route::post('/orders/delete', 'OrderController@postDelete');



