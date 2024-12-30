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
Route::get('/admin/login' , function(){
    return view('admin/login');
});
Route::get('/admin/index' , function(){
    return view('admin/index');
});
Route::get('/admin/updatepassword' , function(){
    return view('admin/updatepassword');
});
Route::get('/admin/add', function(){
    return view('/admin/add');
});
Route::get('/admin/past', function(){
    return view('/admin/past');
});
Route::get('/admin/details' , function(){
    return view('/admin/details');
});
Route::get('/admin/management' , function(){
    return view('/admin/management');
});