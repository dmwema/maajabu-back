<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HoraireController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EngineerController;
use App\Http\Controllers\LogicielController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\EmailVerificationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Routes access private
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('logout', [AuthController::class, 'logout']);
    Route::apiResource('user', UserController::class);
    Route::apiResource('reservation', ReservationController::class);
    Route::apiResource('engineer', EngineerController::class)->except('index', 'show');
    Route::apiResource('service', ServiceController::class)->except('index', 'show');
    Route::apiResource('tarif', TarifController::class)->except('index', 'show');
    Route::apiResource('studio', StudioController::class)->except('index', 'show');
    Route::apiResource('work', WorkController::class)->except('index', 'show');
    Route::apiResource('image', ImageController::class)->except('index', 'show','update');
    Route::apiResource('contact', ContactController::class)->except('store');
    Route::apiResource('artist', ArtistController::class)->except('index', 'show');;
    Route::apiResource('horaire', HoraireController::class)->except('index');
    Route::apiResource('logiciel', LogicielController::class)->except('index', 'show');
    Route::apiResource('category', CategoryController::class)->except('index', 'show');

    Route::post('update-image/{id}', [ImageController::class,'update_image'])->name('image.update');

});

// Route::middleware('auth:sanctum','verified')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Routes access public
Route::apiResource('artist', ArtistController::class)->only('index', 'show');
Route::apiResource('category', CategoryController::class)->only('index', 'show');
Route::apiResource('engineer', EngineerController::class)->only('index', 'show');
Route::apiResource('service', ServiceController::class)->only('index', 'show');
Route::apiResource('studio', StudioController::class)->only('index', 'show');
Route::apiResource('tarif', TarifController::class)->only('index', 'show');
Route::apiResource('work', WorkController::class)->only('index', 'show');
Route::apiResource('image', ImageController::class)->only('index', 'show');
Route::apiResource('contact', ContactController::class)->only('store');
Route::apiResource('horaire', HoraireController::class)->only('index');
Route::apiResource('logiciel', LogicielController::class)->only('index', 'show');


//Reset Password

// Route::post('email/verification-notification', [EmailVerificationController::class, 'sendVerificationEmail']);
// Route::get('verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');

Route::post('forgot-password', [ResetPasswordController::class, 'forgot_password'])->middleware('guest')->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset_password'])->middleware('guest')->name('password.update');

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
