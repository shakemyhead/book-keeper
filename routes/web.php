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
    return view('index');
});

Route::get('/getBooks', 'BookController@read');

Route::get('/search/{text}', 'BookController@search');

Route::get('/sortByTitle', 'BookController@sortByTitle');

Route::get('/sortByAuthor', 'BookController@sortByAuthor');

Route::get('/exportBooks/{format}/{content}', 'BookController@exportBooks');

Route::post('/addBook', 'BookController@create');

Route::patch('/updateAuthor/{id}/{author}', 'BookController@updateAuthor');

Route::delete('/removeBook', 'BookController@remove');
