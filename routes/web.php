<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MahasiswaController;

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

// Route::get('/', function () {
//     return view('operator.scan');
// });

// Route Mahasiswa Baru
Route::prefix('admin')
    ->middleware('check.admin') // Menggunakan middleware kustom untuk memeriksa hak akses admin
    ->group(function () {
        Route::resource('mahasiswa', MahasiswaController::class);

        Route::get('/export/mahasiswa', [MahasiswaController::class, 'exportMahasiswa'])->name('export.mahasiswa');

        Route::get('/export/mahasiswa/qrcode', [MahasiswaController::class, 'exportMahasiswaQRCode'])->name('export.mahasiswa.qrcode');

        Route::post('/mahasiswa/import', [MahasiswaController::class, 'import'])->name('mahasiswa.import');

        Route::get('/mahasiswa/downloadPdf', [MahasiswaController::class, 'downloadPdf'])->name('mahasiswa.downloadPdf');

        Route::get('/dashboard', [MahasiswaController::class, 'dashboard'])->name('admin.dashboard');

        Route::get('/mahasiswa/all', [MahasiswaController::class, 'getAll'])->name('mahasiswa.getAll');
    });

// Route Validasi dengan QR
// Validasi QR 1 (Hari Pertama)
Route::post('validasi/qr', [\App\Http\Controllers\Admin\MahasiswaController::class, 'validasiQR'])->name('validasiqr');

//Validasi QR 2 (Hari Kedua)
Route::post('validasi/qr2', [\App\Http\Controllers\Admin\MahasiswaController::class, 'validasiQR2'])->name('validasiqr2');

//Validasi QR 3 (Hari Ketiga)
Route::post('validasi/qr3', [\App\Http\Controllers\Admin\MahasiswaController::class, 'validasiQR3'])->name('validasiqr3');
Route::post('validasi/qr4', [\App\Http\Controllers\Admin\MahasiswaController::class, 'validasiQR4'])->name('validasiqr4');
Route::post('validasi/qr5', [\App\Http\Controllers\Admin\MahasiswaController::class, 'validasiQR5'])->name('validasiqr5');
Route::post('validasi/qr6', [\App\Http\Controllers\Admin\MahasiswaController::class, 'validasiQR6'])->name('validasiqr6');
Route::post('validasi/qr7', [\App\Http\Controllers\Admin\MahasiswaController::class, 'validasiQR7'])->name('validasiqr7');
Route::post('validasi/qr8', [\App\Http\Controllers\Admin\MahasiswaController::class, 'validasiQR8'])->name('validasiqr8');
Route::post('validasi/qr9', [\App\Http\Controllers\Admin\MahasiswaController::class, 'validasiQR9'])->name('validasiqr9');
Route::post('validasi/qr10', [\App\Http\Controllers\Admin\MahasiswaController::class, 'validasiQR10'])->name('validasiqr10');
Route::post('validasi/qr11', [\App\Http\Controllers\Admin\MahasiswaController::class, 'validasiQR11'])->name('validasiqr11');
Route::post('validasi/qr12', [\App\Http\Controllers\Admin\MahasiswaController::class, 'validasiQR12'])->name('validasiqr12');
Route::post('validasi/qr13', [\App\Http\Controllers\Admin\MahasiswaController::class, 'validasiQR13'])->name('validasiqr13');
Route::post('validasi/qr14', [\App\Http\Controllers\Admin\MahasiswaController::class, 'validasiQR14'])->name('validasiqr14');
Route::post('validasi/qr15', [\App\Http\Controllers\Admin\MahasiswaController::class, 'validasiQR15'])->name('validasiqr15');
Route::post('validasi/qr16', [\App\Http\Controllers\Admin\MahasiswaController::class, 'validasiQR16'])->name('validasiqr16');

//VIew Validasi QR 1 - 3
Route::prefix('operator')
    ->middleware('can:isAdminOperator')
    ->group(function () {
        Route::get('/scan', [App\Http\Controllers\HomeController::class, 'scan'])->name('scan');
        Route::get('/scan1', [\App\Http\Controllers\Admin\MahasiswaController::class, 'scan1'])->name('scan1');
        Route::get('/scan2', [\App\Http\Controllers\Admin\MahasiswaController::class, 'scan2'])->name('scan2');
        Route::get('/scan3', [\App\Http\Controllers\Admin\MahasiswaController::class, 'scan3'])->name('scan3');
        Route::get('/scan4', [\App\Http\Controllers\Admin\MahasiswaController::class, 'scan4'])->name('scan4');
        Route::get('/scan5', [\App\Http\Controllers\Admin\MahasiswaController::class, 'scan5'])->name('scan5');
        Route::get('/scan6', [\App\Http\Controllers\Admin\MahasiswaController::class, 'scan6'])->name('scan6');
        Route::get('/scan7', [\App\Http\Controllers\Admin\MahasiswaController::class, 'scan7'])->name('scan7');
        Route::get('/scan8', [\App\Http\Controllers\Admin\MahasiswaController::class, 'scan8'])->name('scan8');
        Route::get('/scan9', [\App\Http\Controllers\Admin\MahasiswaController::class, 'scan9'])->name('scan9');
        Route::get('/scan10', [\App\Http\Controllers\Admin\MahasiswaController::class, 'scan10'])->name('scan10');
        Route::get('/scan11', [\App\Http\Controllers\Admin\MahasiswaController::class, 'scan11'])->name('scan11');
        Route::get('/scan12', [\App\Http\Controllers\Admin\MahasiswaController::class, 'scan12'])->name('scan12');
        Route::get('/scan13', [\App\Http\Controllers\Admin\MahasiswaController::class, 'scan13'])->name('scan13');
        Route::get('/scan14', [\App\Http\Controllers\Admin\MahasiswaController::class, 'scan14'])->name('scan14');
        Route::get('/scan15', [\App\Http\Controllers\Admin\MahasiswaController::class, 'scan15'])->name('scan15');
        Route::get('/scan16', [\App\Http\Controllers\Admin\MahasiswaController::class, 'scan16'])->name('scan16');
    });

Auth::routes(['register' => false, 'reset' => false]);

Route::get('/', [App\Http\Controllers\Admin\MahasiswaController::class, 'dashboard'])->name('admin.dashboard');
