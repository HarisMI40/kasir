<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\Produk\ProdukController;
use App\Http\Controllers\laporan\LaporanController;
use App\Models\penjualan;
use App\Models\product;

Route::get('/home', function () {
	// $detail = penjualan::with('DetailPenjualan', 'DetailPenjualan.product')->where('id', 1)->first();
    // return $detail;	
    
   return view('home.home');
})->name('home');

Route::get('/', function () { return redirect()->route('login'); });

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
Auth::routes();
route::get('register', function(){
    return abort(404);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
