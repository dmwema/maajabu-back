<?php

use App\Http\Controllers\EngineerController;

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\FileConotroller;
use App\Http\Controllers\GesWelcomeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LogicielController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PackController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ProjectImageController;
use App\Http\Controllers\PublicController;
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


Route::prefix('admin')->group(function () {
    Route::get('/connexion', [LoginController::class, 'connexion'])->name('login');

    Route::get('/', function () {
        return redirect()->route('login');
    });

    Route::post('login/post', [LoginController::class, 'login'])->name('login.post');
});


Route::post('/reservation/validate', [ReservationController::class, 'paid'])->name('reservation.validate');

// ADMIN ROUTES
Route::middleware('AdminAuth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/home', [GesWelcomeController::class, 'admin'])->name('admin.home');
        Route::get('/logout', [LoginController::class, 'admin_logout'])->name('admin.logout');
        Route::get('/utilisateurs', [UserController::class, 'users'])->name('admin.users');

        Route::get('/studio', [StudioController::class, 'get_infos'])->name('admin.studio');
        Route::put('/studio', [StudioController::class, 'update'])->name('studio.update');

        Route::get('/groupes', [GroupController::class, 'index'])->name('admin.group');
        Route::delete('/group', [GroupController::class, 'destroy'])->name('group.delete');
        Route::post('/group', [GroupController::class, 'store'])->name('group.store');


        Route::get('/engineer', [EngineerController::class, 'get_infos'])->name('admin.engineer');
        Route::post('/user/update', [UserController::class, 'update_client'])->name('user.update');
        Route::post('/user/pass', [UserController::class, 'edit_pass'])->name('user.editpass');

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

        Route::get('/service/pack/{service_id}', [PackController::class, 'index'])->name('admin.pack');
        Route::delete('/service/pack', [PackController::class, 'delete'])->name('pack.delete');
        Route::post('/service/pack/store', [PackController::class, 'store'])->name('pack.store');
        Route::get('/service/pack/edit/{id}', [PackController::class, 'edit'])->name('pack.edit');
        Route::post('/service/pack/update', [PackController::class, 'update'])->name('pack.update');

        //
        Route::get('/image', [ImageController::class, 'get_infos'])->name('admin.image');
        Route::get('/projet_image', [ProjectImageController::class, 'index'])->name('admin.pimg');
        Route::post('/projet_image', [ProjectImageController::class, 'store'])->name('pimg.store');
        Route::delete('/projet_image', [ProjectImageController::class, 'delete'])->name('pimg.delete');
        Route::delete('/image', [ImageController::class, 'delete'])->name('image.delete');
        Route::post('/image/store', [ImageController::class, 'store'])->name('image.store');
        Route::get('/image/edit/{id}', [ImageController::class, 'edit_image'])->name('image.edit');
        Route::post('/image/update', [ImageController::class, 'update'])->name('image.update');
        //

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

        Route::post('/social', [StudioController::class, 'add_social'])->name('social.store');
        Route::delete('/social', [StudioController::class, 'delete_social'])->name('social.delete');

        Route::get('/profile/{id}', [UserController::class, 'profile'])->name('admin.profile');

        Route::get('/logiciel', [LogicielController::class, 'index'])->name('admin.logiciels');
        Route::delete('/logiciel', [LogicielController::class, 'destroy'])->name('logiciel.delete');
        Route::get('/logiciel/{id}', [LogicielController::class, 'edit'])->name('logiciel.edit');
        Route::post('/logiciel', [LogicielController::class, 'store'])->name('logiciel.store');


        Route::post('/pimg_update', [ProjectImageController::class, 'update'])->name('pimg.update');
    });
});


// IRS ROUTES
Route::middleware('IRAuth')->group(function () {
    Route::prefix('ir')->group(function () {
        Route::get('/home', [GesWelcomeController::class, 'ir'])->name('ir.home');
        Route::get('/logout', [LoginController::class, 'ir_logout'])->name('ir.logout');

        Route::get('/ir/profile/{id}', [EngineerController::class, 'profile'])->name('ir.profile');
        Route::get('/artist', [ArtistController::class, 'get_infos_ir'])->name('ir.artist');
        Route::get('/work', [WorkController::class, 'all_ir'])->name('works.ir');
        Route::post('/engineer/pass', [EngineerController::class, 'edit_pass'])->name('ir.editpass');
        Route::post('/engineer', [EngineerController::class, 'update'])->name('ir.update');

        Route::get('/fichier', [FileConotroller::class, 'index'])->name('ir.files');
        Route::delete('/fichier', [FileConotroller::class, 'destroy'])->name('files.delete');
        Route::get('/fichier/{id}', [FileConotroller::class, 'edit'])->name('files.edit');
        Route::post('/fichier', [FileConotroller::class, 'store'])->name('file.store');

        Route::get('/fichier/details/{id}', [FileConotroller::class, 'show_file'])->name('show_file');

        Route::post('/element', [FileConotroller::class, 'store_element'])->name('element.store');

        Route::delete('/element', [FileConotroller::class, 'delete_element'])->name('element.delete');

        Route::delete('/file', [FileConotroller::class, 'delete'])->name('file.delete');
    });
});

// FINACES ROUTES
Route::middleware('FinanceAuth')->group(function () {
    Route::prefix('finance')->group(function () {
        Route::get('/home', [GesWelcomeController::class, 'finance'])->name('finance.home');
        Route::get('/logout', [LoginController::class, 'finance_logout'])->name('finance.logout');
        Route::get('/profile/{id}', [UserController::class, 'profile_fin'])->name('finance.profile');
        Route::get('/paiement', [PaiementController::class, 'index'])->name('finance.paiement');
        Route::get('/new', [PaiementController::class, 'new'])->name('paiement.new');
        Route::post('/paiement', [PaiementController::class, 'store'])->name('paiements.store');
        Route::delete('/paiement', [PaiementController::class, 'destroy'])->name('paiement.delete');
        Route::get('/paiement/edit/{id}', [PaiementController::class, 'edit'])->name('paiement.edit');
        Route::post('/user/pass', [UserController::class, 'edit_pass'])->name('user.editpass');
    });
});

Route::post('/user', [UserController::class, 'store_client'])->name('users.store');
Route::get('/user/edit/{id}', [UserController::class, 'edit_client'])->name('user.edit');

Route::get('/engineer/edit/{id}', [EngineerController::class, 'edit_engineer'])->name('engineer.edit');
Route::get('/pimg/edit/{id}', [ProjectImageController::class, 'edit'])->name('pimg.edit');


// users routes


Route::get('/', [PublicController::class, 'home'])->name('public.home');

Route::get('/apropos', [PublicController::class, 'about'])->name('public.about');

Route::get('/projets', [PublicController::class, 'projects'])->name('public.project');

Route::get('/services', [PublicController::class, 'services'])->name('public.services');

Route::get('/packs/{service_name}/{service_id}', [PublicController::class, 'packs'])->name('public.packs');

Route::get('/facture/{reservation_id}/{pack_id}/{service_id}', [PublicController::class, 'invoice'])->name('public.invoice');

Route::get('/paiement', [PublicController::class, 'paiement'])->name('public.paiement');

Route::get('/gallerie', [PublicController::class, 'galery'])->name('public.galery');

Route::get('/contacts', [PublicController::class, 'contact'])->name('public.contact');

Route::get('/equipements', [PublicController::class, 'equipment'])->name('public.equipment');

Route::post('/reservation/{pack_id}', [PublicController::class, 'reservation'])->name('public.reservation');
Route::get('/reservation/{pack_id}', [PublicController::class, 'reservation_new'])->name('public.new_reservation');
