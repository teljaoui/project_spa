<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/appointment' , function(){
    return view('appointment');
});
Route::get('/available' , function(){
    return view('available');
});
Route::get('/confirmed' , function(){
    return view('confirmed');
});
Route::get('/done' , function(){
    return view('/done');
});