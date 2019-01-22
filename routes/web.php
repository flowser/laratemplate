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
    return view('public.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/{anypath}', 'HomeController@index')->where('path','.*');


// category
Route::get('category', 'CategoryController@index'); //all categories
Route::post('/category/store', 'CategoryController@store'); //create category
Route::get('/category/edit/{id}', 'CategoryController@edit'); //delete category
Route::post('/category/update/{id}', 'CategoryController@update'); //delete category
Route::get('/category/destroy/{id}', 'CategoryController@destroy'); //delete category

// course
Route::get('course', 'CourseController@index'); //all courses
Route::post('/course/store', 'CourseController@store'); //create course
Route::get('/course/edit/{id}', 'CourseController@edit'); //delete course
Route::post('/course/update/{id}', 'CourseController@update'); //delete course
Route::get('/course/destroy/{id}', 'CourseController@destroy'); //delete course


//front end
//blog
Route::get('blogcourse', 'BlogController@index'); //all blogcourses
Route::post('/blogcourse/store', 'BlogController@store'); //create blogcourse
Route::get('/blogcourse/edit/{id}', 'BlogController@edit'); //delete blogcourse
Route::post('/blogcourse/update/{id}', 'BlogController@update'); //delete blogcourse
Route::get('/blogcourse/destroy/{id}', 'BlogController@destroy'); //delete blogcourse
