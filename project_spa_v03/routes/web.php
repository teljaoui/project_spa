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
Route::get('/', function () {
    return view('home');
});
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');
Route::view('/appointment', 'appointment')->name('appointment');
//Route::view('/available', 'available')->name('available');
//Route::view('/confirmed', 'confirmed')->name('confirmed');
//Route::view('/done', 'done')->name('done');


/*Reservation user*/

Route::post('/add_appointment', [SpaController::class, 'add_appointment']);

/*Reservation user ends*/

Route::middleware([Authmidlleware::class])->group(function () {

    Route::prefix('/admin')->group(function () {
        Route::get('/index', [SpaController::class, 'index'])->name('admin.index');
        Route::view('/updatepassword', 'admin.updatepassword')->name('admin.updatepassword');
        Route::get('/reservation/{id}', [SpaController::class, 'reservation'])->name('admin.reservation');
        Route::get('/deletereservation/{id}', [SpaController::class, 'deletereservation']);
        Route::get('/delete', [SpaController::class, 'deleteAll']);
        Route::get('/past' , [SpaController::class , 'past']);
        Route::view('/add' , 'admin/add')->name('add');
        Route::post('/add_appointment_admin', [SpaController::class, 'add_appointment_admin']);
        Route::get('/services' , [SpaController::class, 'services']);
        Route::get('/servicedelete/{id}' , [SpaController::class , 'servicedelete']);

    });
});

Route::post('/admin/loginPost', [SpaController::class, 'loginPost']);
Route::get('/admin/logout', [SpaController::class, 'logout']);
Route::post('/admin/updatePost', [SpaController::class, 'updatePost']);
Route::post('/admin/searchphone', [SpaController::class, 'searchphone']);
Route::post('/admin/searchdate', [SpaController::class, 'searchdate']);
Route::post('admin/addservicepost' , [SpaController::class  , 'addservicepost']);