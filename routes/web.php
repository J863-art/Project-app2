<?php

use App\Models\User;
use App\Models\Category;
use App\Models\Artikelku;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RapatController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HimbauanController;
use App\Http\Controllers\LogadminController;
use App\Http\Controllers\DashboarDController;
use App\Http\Controllers\EventadminController;
use App\Http\Controllers\RapatAdminController;
use App\Http\Controllers\ArtikeladminController;
use App\Http\Controllers\LoginTagihanController;
use App\Http\Controllers\ProfileadminController;
use App\Http\Controllers\TagihanadminController;
use App\Http\Controllers\HimbauanadminController;

Route::get('/', function () {
    return view('dashboard.index', [
        "title" => "Dashboard"
    ]);
});

Route::get('/artikel', [ArtikelController::class, 'index']);
Route::get('artikel/{artik:slug}', [ArtikelController::class, 'show']);

Route::get('/authors/{author:username}', function(User $author){
    return view('artikel', [
        'title' => 'User Artikel',
        'artikel' => $author->artikel
    ]);
});


Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category:slug}', [CategoryController::class, 'show']);

Route::get('/events', [EventController::class, 'index']);
Route::get('/rapat', [RapatController::class, 'index'])->name('rapat.index');
Route::get('/rapat/{id}/download', [RapatController::class, 'download'])->name('rapat.download');
Route::get('/himbauan', [HimbauanController::class, 'index']);
Route::get('/rapat/{id}', [RapatController::class, 'show'])->name('rapat.show');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');





Route::get('/dashboard', function(){
    return view('dashboard.index');
});

Route::get('/logadmin', [LogadminController::class, 'index'])->name('logadmin')->middleware('guest');
Route::post('/logadmin', [LogadminController::class, 'authenticate']);

// Route tagihan
Route::get('/tagihan', [TagihanController::class, 'index'])->middleware('auth');
Route::get('/tagihan/{id}', [TagihanController::class, 'show'])->name('tagihan.show')->middleware('auth');
Route::get('/tagihan/download/{id}', [TagihanController::class, 'download'])->name('tagihan.download')->middleware('auth');
Route::post('/tagihan/{id}/upload', [TagihanController::class, 'uploadBuktiPembayaran'])->name('tagihan.upload')->middleware('auth');


// Route untuk tagihan yang hanya bisa diakses oleh guest
Route::get('/tagihan/guest', [TagihanController::class, 'guest'])->name('tagihan.default');

// Dashboard admin
Route::get('dashmin', function(){
    return view('dashmin.index');
})->middleware('auth');

// Eventadmin
Route::middleware(['auth'])->group(function () {
    Route::resource('eventadmin', EventadminController::class);
})->middleware('auth');;

// Himbauan admin
Route::resource('/himbauanadmin', HimbauanadminController::class)->middleware('auth');;


//Tagihan admin
Route::get('/tagihan/create', [TagihanController::class, 'create'])->name('tagihan.create')->middleware('auth');
Route::post('/tagihan', [TagihanController::class, 'store'])->name('tagihan.store')->middleware('auth');
Route::resource('users', UserController::class);

//Artikel admin
Route::resource('Artikeladmin', ArtikeladminController::class);
// Route::get('/Artikeladmin', [ArtikeladminController::class, 'index']);
// Route::get('/Artikeladmin/{slug}', [ArtikeladminController::class, 'show']);
// Route::get('/Artikeladmin/{artik:slug}', [ArtikeladminController::class, 'show']);
Route::get('/admin/authors/{author:username}', function(User $author){
    return view('Artikeladmin.index', [
        'title' => 'Admin Artikel',
        'artikel' => $author->artikel // pastikan variabel $artikel diambil dari model yang benar
    ]);
})->middleware('auth');
Route::get('/Artikeladmin/create', [ArtikeladminController::class, 'create']);



// Rapat admin
Route::resource('/rapatadmin', RapatAdminController::class);
Route::get('/rapatadmin/download/{id}', [RapatAdminController::class, 'download'])->name('rapatadmin.download');
// Route untuk update rapat jika dibutuhkan di masa depan
// Route::put('/rapat/{rapat}', [RapatAdminController::class, 'update'])->name('rapatadmin.update');

// Tagihan admin
Route::resource('tagihanadmin', TagihanadminController::class);
Route::get('/tagihanadmin/{id}/download', [TagihanadminController::class, 'download'])->name('tagihanadmin.download');
Route::post('/tagihanadmin/{id}/upload', [TagihanadminController::class, 'uploadBuktiPembayaran'])->name('tagihanadmin.upload');





//Update profile


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/profile/edit', [ProfileController::class, 'edit'])->name('dashboard.profile.edit');
    Route::post('/dashboard/profile/update', [ProfileController::class, 'update'])->name('dashboard.profile.update');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileadminController::class, 'edit'])->name('dashmin.profile.edit');
    Route::post('/profile/update', [ProfileadminController::class, 'update'])->name('dashmin.profile.update');
});


