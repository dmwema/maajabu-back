<?php

use App\Http\Controllers\EngineerController;

use App\Http\Controllers\ArtistController;

use App\Http\Controllers\GesWelcomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkController;
use TCG\Voyager\Facades\Voyager;
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

//voyager route
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::get('/connexion', [LoginController::class, 'connexion'])->name('login');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::post('login/post', [LoginController::class, 'login'])->name('login.post');



// ADMIN ROUTES
Route::middleware('AdminAuth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/home', [GesWelcomeController::class, 'admin'])->name('admin.home');
        Route::get('/logout', [LoginController::class, 'admin_logout'])->name('admin.logout');
        Route::get('/clients', [UserController::class, 'clients'])->name('admin.clients');
        Route::get('/studio', [StudioController::class, 'get_infos'])->name('admin.studio');
        Route::get('/engineer', [EngineerController::class, 'get_infos'])->name('admin.engineer');
        Route::post('/client/update', [UserController::class, 'update_client'])->name('client.update');

        Route::post('/engineer', [EngineerController::class, 'store'])->name('engineer.store');
        Route::delete('/engineer', [EngineerController::class, 'delete'])->name('engineer.delete');

        Route::get('/engineer/edit/{id}', [EngineerController::class, 'edit_engineer'])->name('engineer.edit');

        Route::get('/work', [WorkController::class, 'all'])->name('works');
        Route::get('/work/new', [WorkController::class, 'new'])->name('works.new');
        Route::get('/work/edit/{id}', [WorkController::class, 'edit'])->name('work.edit');
        Route::post('/work/update', [WorkController::class, 'update'])->name('work.update');

        Route::post('/artist/store', [ArtistController::class, 'store'])->name('artist.store');

        Route::post('/work/store', [WorkController::class, 'store'])->name('work.store');

        Route::get('/reservation', [ReservationController::class, 'index'])->name('reservations');
        Route::get('/reservation/edit/{id}', [ReservationController::class, 'edit'])->name('reservation.edit');
        Route::get('/reservation/new', [ReservationController::class, 'new'])->name('reservation.new');

        Route::delete('/user', [UserController::class, 'delete'])->name('user.delete');

        Route::delete('/work', [WorkController::class, 'destroy'])->name('work.delete');
    });
});


// IRS ROUTES
Route::middleware('IRAuth')->group(function () {
    Route::prefix('ir')->group(function () {
        Route::get('/home', [GesWelcomeController::class, 'ir'])->name('ir.home');
        Route::get('/logout', [LoginController::class, 'ir_logout'])->name('ir.logout');
    });
});


// FINACES ROUTES
Route::middleware('FinanceAuth')->group(function () {
    Route::prefix('finance')->group(function () {
        Route::get('/home', [GesWelcomeController::class, 'finance'])->name('finance.home');
        Route::get('/logout', [LoginController::class, 'finance_logout'])->name('finance.logout');
    });
});

Route::post('/client', [UserController::class, 'store_client'])->name('clients.store');
Route::get('/client/edit/{id}', [UserController::class, 'edit_client'])->name('client.edit');
