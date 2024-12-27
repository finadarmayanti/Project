<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\AdminSuratController;



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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'login'])->name('login');

Route::controller(AuthController::class)->group(function() {
    Route::get('register','register')->name('register');
    Route::post('register','registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login','loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');


    Route::get('/surat/create', [SuratController::class, 'create'])->name('surat.create');
    Route::post('/surat', [SuratController::class, 'store'])->name('surat.store');
    Route::get('/surat', [SuratController::class, 'index'])->name('surat.index');
});


//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    Route::get('/admin/profile', [AdminController::class, 'profilepage'])->name('admin.profile');

    Route::get('/admin/penduduk',[PendudukController::class, 'index'])->name('admin.penduduk');
    Route::get('/admin/penduduk/create',[PendudukController::class, 'create'])->name('admin.penduduk.create');
    Route::post('/admin/penduduk/store',[PendudukController::class, 'store'])->name('admin.penduduk.store');

    Route::get('/admin/penduduk/show/{id}', [PendudukController::class, 'show'])->name('admin.penduduk.show');

    Route::get('/admin/penduduk/edit/{id}', [PendudukController::class, 'edit'])->name('admin.penduduk.edit');
    Route::put('/admin/penduduk/edit/{id}', [PendudukController::class, 'update'])->name('admin.penduduk.update');

    Route::delete('/admin/penduduk/destroy/{id}', [PendudukController::class, 'destroy'])->name('admin.penduduk.destroy');

    Route::get('/admin/surat', [AdminSuratController::class, 'index'])->name('admin.surat.index');
    Route::get('/admin/surat/{id}', [AdminSuratController::class, 'show'])->name('admin.surat.show');
    Route::post('/admin/surat/{id}/process', [AdminSuratController::class, 'process'])->name('admin.surat.process');
    Route::post('/admin/surat/{id}/reject', [AdminSuratController::class, 'reject'])->name('admin.surat.reject');

});


