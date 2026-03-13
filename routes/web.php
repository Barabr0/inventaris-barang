<?php

use App\Exports\BarangsExport;
use App\Http\Controllers\admin\AdminbarangController;
use App\Http\Controllers\Admin\AdminbarangkeluarController;
use App\Http\Controllers\Admin\AdminbarangmasukController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminpeminjamanController;
use App\Http\Controllers\Admin\AdminuserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/forgot-password', function () {
    return view('auth.passwords.email');
})->middleware('guest')->name('password.request');


Route::post('/forgot-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->middleware('guest')
    ->name('password.email');


Route::get('/reset-password/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])
    ->middleware('guest')
    ->name('password.update');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');


Route::resource('kategori', KategoriController::class)
->middleware('auth');
Route::get('/barang/export', [BarangController::class, 'export'])->name('barang.export');
Route::get('/barang/pdf', [BarangController::class, 'exportPdf'])->name('barang.pdf');

Route::resource('barang', BarangController::class)
->middleware('auth');
Route::get('/barangmasuk/export', [BarangMasukController::class, 'export'])->name('barangmasuk.export');
Route::get('/barangmasuk/pdf', [BarangMasukController::class, 'exportPdf'])->name('barangmasuk.pdf');
Route::resource('barangmasuk', BarangMasukController::class)
->middleware('auth');
Route::get('/barangkeluar/export', [BarangKeluarController::class, 'export'])->name('barangkeluar.export');
Route::get('/barangkeluar/pdf', [BarangKeluarController::class, 'exportPdf'])->name('barangkeluar.pdf');
Route::resource('barangkeluar', BarangKeluarController::class)
->middleware('auth');
Route::get('/peminjaman/export', [PeminjamanController::class, 'export'])->name('peminjaman.export');
Route::get('/peminjaman/pdf', [PeminjamanController::class, 'exportPdf'])->name('peminjaman.pdf');
Route::resource('peminjaman', PeminjamanController::class)
->middleware('auth');
Route::get('/admin/dashboard', [AdminDashboardController::class,'index'])
    ->name('admin.dashboard')
    ->middleware('auth');
Route::get('/admin/barang', [AdminbarangController::class,'index'])
    ->name('admin.barangadmin')
    ->middleware('auth');
Route::get('/admin/barangmasuk', [AdminbarangmasukController::class,'index'])
    ->name('admin.barangmasukadmin')
    ->middleware('auth');
Route::get('/admin/barangkeluar', [AdminbarangkeluarController::class,'index'])
    ->name('admin.barangkeluaradmin')
    ->middleware('auth');
Route::get('/admin/peminjaman', [AdminpeminjamanController::class,'index'])
    ->name('admin.peminjamanadmin')
    ->middleware('auth');
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('user', AdminuserController::class);
});
