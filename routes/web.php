<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\Produk\ProdukController;
use App\Models\penjualan;
use App\Models\product;

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

Route::get('/', function () {
	$detail = penjualan::with('DetailPenjualan', 'DetailPenjualan.product')->where('id', 1)->first();
    return $detail;									
});

//  ====== Penjualan ========
Route::get('penjualan', [PenjualanController::class, 'index'])->name('penjualan');

Route::put('penjualan/{penjualan:id}', [PenjualanController::class, 'update'])->name('penjualan.update');

Route::post('penjualan/add/{id}/{kodeBarcode}', [DetailPenjualanController::class, 'store'])->name('detailPenjualan.store');

Route::delete('penjualan/{DetailPenjualan:id}', [DetailPenjualanController::class, 'destroy'])->name('detailPenjualan.destroy');

Route::post('cariBarang/add/{penjualan:id}', [DetailPenjualanController::class, 'scanBarcode'])->name('scanBarcode.store');


//  ====== Data Produk ========
Route::get('produk', [ProdukController::class, 'index'])->name('produk');
Route::delete('produk/{product}', [ProdukController::class, 'destroy'])->name('produk.delete');