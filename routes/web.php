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

// resource routes
Route::resource('users', 'UsersController');
Route::resource('admin', 'AdminController');
Route::resource('books', 'BooksController');
Route::resource('genres', 'GenresController');
Route::resource('borrowbooks', 'BorrowbooksController');
