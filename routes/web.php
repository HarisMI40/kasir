<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailPenjualanController;
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

Route::get('penjualan/{id}', [PenjualanController::class, 'index']);
Route::post('penjualan/add/{penjualan:id}/{product}', [detailPenjualanController::class, 'store'])->name('detailPenjualan.store');
Route::delete('penjualan/{DetailPenjualan:id}', [DetailPenjualanController::class, 'destroy'])->name('detailPenjualan.destroy');