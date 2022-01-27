<?php

use App\Http\Controllers\GesWelcomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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
        Route::get('/home', [GesWelcomeController::class, 'index'])->name('admin.home');
        Route::get('/logout', [LoginController::class, 'admin_logout'])->name('admin.logout');
    });
});


Route::get('ges_clients', function () {
    return view('ges_clients');
});
