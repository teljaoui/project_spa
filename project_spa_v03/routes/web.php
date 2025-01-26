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

Route::post('/appointmentpost', [SpaController::class, 'appointmentpost']);
Route::get('/backappontment', [SpaController::class, 'backappontment']);
Route::post('/availablepost', [SpaController::class, 'availablepost']);
Route::get('/backconfirmed', [SpaController::class, 'backconfirmed']);
Route::post('/confirmedpost', [SpaController::class, 'confirmedpost']);
Route::get('/backdone', [SpaController::class, 'backdone']);
Route::post('/donepost', [SpaController::class, 'donepost']);
/*Reservation user ends*/

Route::middleware([Authmidlleware::class])->group(function () {

    Route::prefix('/admin')->group(function () {
        Route::get('/index', [SpaController::class, 'index'])->name('admin.index');
        Route::view('/updatepassword', 'admin.updatepassword')->name('admin.updatepassword');
        Route::view('/add', 'admin.add')->name('admin.add');
        Route::get('/past', [SpaController::class, 'past'])->name('admin.past');
        Route::get('/management', [SpaController::class, 'management'])->name('admin.management');
        Route::get('/reservation/{id}', [SpaController::class, 'reservation'])->name('admin.reservation');
        Route::get('/deletereservation/{id}', [SpaController::class, 'deletereservation']);
        Route::get('/delete', [SpaController::class, 'deleteAll']);
        Route::get('/backtime', [SpaController::class, 'backtime']);
        Route::get('/backuser', [SpaController::class, 'backuser']);
        Route::get('/backfinal', [SpaController::class, 'backfinal']);
        Route::view('/services' , 'services')->name('services');

    });
});

Route::post('/admin/loginPost', [SpaController::class, 'loginPost']);
Route::get('/admin/logout', [SpaController::class, 'logout']);
Route::post('/admin/updatePost', [SpaController::class, 'updatePost']);
Route::post('/admin/timePost', [SpaController::class, 'timePost']);
Route::post('/admin/timdelete', [SpaController::class, 'timdelete']);
Route::post('/admin/addPost', [SpaController::class, 'addPost']);
Route::post('/admin/addtime', [SpaController::class, 'addtime']);
Route::post('/admin/adduser', [SpaController::class, 'adduser']);
Route::post('/admin/confirmed_admin', [SpaController::class, 'confirmed_admin']);
Route::post('/admin/searchphone', [SpaController::class, 'searchphone']);
Route::post('/admin/searchdate', [SpaController::class, 'searchdate']);
