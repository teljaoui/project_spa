<?php

use App\Http\Controllers\SpaController;
use App\Http\Middleware\Authmidlleware;
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

Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');
Route::view('/', 'home')->name('home');
Route::view('/appointment', 'appointment')->name('appointment');
Route::view('/available', 'available')->name('available');
Route::view('/confirmed', 'confirmed')->name('confirmed');
Route::view('/done', 'done')->name('done');

Route::middleware([Authmidlleware::class])->group(function () {

    Route::prefix('/admin')->group(function () {
        Route::view('/index', 'admin.index')->name('admin.index');
        Route::view('/updatepassword', 'admin.updatepassword')->name('admin.updatepassword');
        Route::view('/add', 'admin.add')->name('admin.add');
        Route::view('/past', 'admin.past')->name('admin.past');
        Route::view('/details', 'admin.details')->name('admin.details');
        Route::view('/management', 'admin.management')->name('admin.management');
    });
});

Route::post('/admin/loginPost', [SpaController::class, 'loginPost']);
Route::get('/admin/logout', [SpaController::class, 'logout']);
Route::post('/admin/updatePost', [SpaController::class, 'updatePost']);