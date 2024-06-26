<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\Produk\ProdukController;
use App\Http\Controllers\laporan\LaporanController;
use App\Http\Controllers\akun\akunController;
use App\Models\penjualan;
use App\Models\product;



Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        // system(start );  
        //  $app = base_path()."/aplikasi/plugin_impresora_termica_64_bits"; 
        // system("start $app"); 
        return view('home.home');
    })->name('home');

    route::get('/tutorial/mematikan-windows-smartscreen', function(){
        return view('home.mematikan_win_smartscreen');
    })->name('tutorial.mematikan_smartscreen');
});


//  ====== Penjualan ========
Route::middleware(['auth'])->group(function () {
    Route::get('penjualan', [PenjualanController::class, 'index'])->name('penjualan');

    Route::put('penjualan/{id}', [PenjualanController::class, 'update'])->name('penjualan.update');

    Route::post('penjualan/add/{id}/{kodeBarcode}', [DetailPenjualanController::class, 'store'])->name('detailPenjualan.store');

    Route::delete('penjualan/{DetailPenjualan:id}', [DetailPenjualanController::class, 'destroy'])->name('detailPenjualan.destroy');

    Route::post('cariBarang/add/{penjualan:id}', [DetailPenjualanController::class, 'scanBarcode'])->name('scanBarcode.store');
});


//  ====== Data Produk ========

Route::middleware(['auth'])->group(function () {
    Route::get('produk', [ProdukController::class, 'index'])->name('produk');
    Route::delete('produk/{product}', [ProdukController::class, 'destroy'])->name('produk.delete');
    Route::post('produk', [ProdukController::class, 'create'])->name('produk.create');
    Route::get('produk/{product}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('produk/{product}', [ProdukController::class, 'update'])->name('produk.update');
});

//  ====== Data Laporan ========
Route::middleware(['auth'])->group(function () {
    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan');
});

//  ====== Data Akun ========
Route::middleware(['auth'])->group(function () {
    Route::get('akun', [akunController::class, 'index'])->name('akun');
    Route::post('akun/update', [akunController::class, 'update'])->name('akun.update');
    Route::post('akun/update-password', [akunController::class, 'update_password'])->name('akun.update.password');
});


Auth::routes();
route::get('register', function(){
    $user = App\Models\User::count();
    if($user > 0){
        return abort(404);
    }

    return view('auth.register');
})->name('register');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
