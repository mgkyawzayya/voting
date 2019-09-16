<?php


Route::get('/', function () {
    return view('index');
});

Auth::routes();
Route::get('/kings', 'KingController@king');
Route::get('/queens', 'QueenController@queen');
Route::get('/dashboard', 'VoteController@result');



Route::get('/king', 'KingController@index');
Route::get('/king/show/{id}', 'KingController@show');
Route::get('/king/create', 'KingController@create');
Route::post('/king/store', 'KingController@store');
Route::get('/king/edit/{id}', 'KingController@edit');
Route::post('/king/update', 'KingController@update');
Route::delete('/king/destroy/{id}', 'KingController@destroy');


Route::get('/queen', 'QueenController@index');
Route::get('/queen/show/{id}', 'QueenController@show');
Route::get('/queen/create', 'QueenController@create');
Route::post('/queen/store', 'QueenController@store');
Route::get('/queen/edit/{id}', 'QueenController@edit');
Route::post('/queen/update', 'QueenController@update');
Route::delete('/queen/destroy/{id}', 'QueenController@destroy');


Route::post('/kingvote', 'VoteController@kingvote');
Route::post('/queenvote', 'VoteController@queenvote');

Route::get('/voteuser', 'VoteController@list');
Route::get('/vote/create', 'VoteController@create');
Route::get('/vote/delete', 'VoteController@delete');
Route::get('/vote/show', 'VoteController@show');

Route::get('export', 'VoteController@export')->name('export');
Route::get('importExportView', 'VoteController@importExportView');
Route::post('import', 'VoteController@import')->name('import');