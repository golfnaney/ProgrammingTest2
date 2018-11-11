<?php

 

Route::get('/', function () {
    return view('manage');
});
Route::get('add', function () {
    return view('add');
});
Route::get('detail/{id}', function () {
   return view('detail');
});

Route::get('/getList', 'LoansController@index' );
Route::post('/addLoan', 'LoansController@store' );
Route::get('/getDetail/{id}', 'LoansController@show' );
Route::get('delete/{id}',  'LoansController@destroy' );