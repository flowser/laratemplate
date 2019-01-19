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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/{anypath}', 'HomeController@index')->where('path','.*');


// category
Route::get('category', 'CategoryController@index'); //all categories
Route::post('/add-category', 'CategoryController@create'); //create category
Route::get('category/edit/{id}', 'CategoryController@edit'); //delete category
Route::post('category/update/{id}', 'CategoryController@update'); //delete category
Route::get('category/destroy/{id}', 'CategoryController@destroy'); //delete category
