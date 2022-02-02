<?php

use App\Http\Controllers\EngineerController;

use App\Http\Controllers\ArtistController;

use App\Http\Controllers\GesWelcomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
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
// Route::group(['prefix' => 'admin'], function () {
//     Voyager::routes();
// });


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
        Route::get('/utilisateurs', [UserController::class, 'users'])->name('admin.users');

        Route::get('/studio', [StudioController::class, 'get_infos'])->name('admin.studio');
        Route::put('/studio', [StudioController::class, 'update'])->name('studio.update');


        Route::get('/engineer', [EngineerController::class, 'get_infos'])->name('admin.engineer');
        Route::post('/user/update', [UserController::class, 'update_client'])->name('user.update');

        Route::post('/engineer/update', [EngineerController::class, 'update'])->name('engineer.update');
        Route::post('/engineer', [EngineerController::class, 'store'])->name('engineer.store');
        Route::delete('/engineer', [EngineerController::class, 'delete'])->name('engineer.delete');

        Route::get('/engineer/edit/{id}', [EngineerController::class, 'edit_engineer'])->name('engineer.edit');

        Route::get('/work', [WorkController::class, 'all'])->name('works');
        Route::get('/work/new', [WorkController::class, 'new'])->name('works.new');
        Route::get('/work/edit/{id}', [WorkController::class, 'edit'])->name('work.edit');
        Route::post('/work/update', [WorkController::class, 'update'])->name('work.update');
        Route::post('/work/store', [WorkController::class, 'store'])->name('work.store');

        Route::get('/artist', [ArtistController::class, 'get_infos'])->name('admin.artist');
        Route::post('/artist/store', [ArtistController::class, 'store'])->name('artist.store');
        Route::delete('/artist', [ArtistController::class, 'delete'])->name('artist.delete');
        Route::get('/artist/edit/{id}', [ArtistController::class, 'edit'])->name('artist.edit');
        Route::post('/artist/update', [ArtistController::class, 'update'])->name('artist.update');

        Route::get('/service', [ServiceController::class, 'get_infos'])->name('admin.service');
        Route::delete('/service', [ServiceController::class, 'delete'])->name('service.delete');
        Route::post('/service/store', [ServiceController::class, 'store'])->name('service.store');
        Route::get('/service/edit/{id}', [ServiceController::class, 'edit_service'])->name('service.edit');
        Route::post('/service/update', [ServiceController::class, 'update'])->name('service.update');


        Route::get('/reservation', [ReservationController::class, 'index'])->name('reservations');
        Route::get('/reservation/edit/{id}', [ReservationController::class, 'edit'])->name('reservation.edit');
        Route::get('/reservation/new', [ReservationController::class, 'new'])->name('reservation.new');
        Route::post('/reservation', [ReservationController::class, 'store'])->name('reservations.store');
        Route::delete('/reservation', [ReservationController::class, 'destroy'])->name('reservation.delete');
        Route::post('/reservation/update', [ReservationController::class, 'update_reservation'])->name('reservation.update');

        Route::delete('/user', [UserController::class, 'delete'])->name('user.delete');

        Route::delete('/work', [WorkController::class, 'destroy'])->name('work.delete');

        Route::post('/phone', [StudioController::class, 'add_phone'])->name('phone.store');
        Route::delete('/phone', [StudioController::class, 'delete_phone'])->name('phone.delete');

        Route::get('/admin/profile/{id}', [UserController::class, 'profile'])->name('admin.profile');
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

Route::post('/user', [UserController::class, 'store_client'])->name('users.store');
Route::get('/user/edit/{id}', [UserController::class, 'edit_client'])->name('user.edit');

Route::get('/engineer/edit/{id}', [EngineerController::class, 'edit_engineer'])->name('engineer.edit');
