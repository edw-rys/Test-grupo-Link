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

Route::get('categories', 'CategoryController@index')->name('book.categories.index');
Route::get('books', 'BookController@index')->name('book.books.index');
Route::get('books/{id}', 'BookController@show')->name('book.books.show');
Route::get('books/find/by-category/{category_id}', 'BookController@getBooksByCategory')->name('book.books.by_category');



