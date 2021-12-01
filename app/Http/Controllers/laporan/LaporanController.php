<?php

namespace App\Http\Controllers\laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        // $products = DB::table('penjualans')
        //         ->selectRaw('tanggal , sum(total_qty) as total_barang_terjual , sum(total_harga) as total_pemasukan')
        //         ->groupBy('tanggal')
        //         ->get();

        //  $products = DB::table('penjualans')
        //         ->selectRaw('MONTH(created_at) as tanggal_data')
        //         ->groupBy('tanggal_data')
        //         ->get();

        $products = DB::table('penjualans')
        ->selectRaw('sum(total_qty) as total_qty')
        ->selectRaw('sum(total_harga) as total_pendapatan')
        ->selectRaw('DATE_FORMAT(created_at, "%Y - %M") as tanggal_data')
        ->groupBy('tanggal_data')
        ->get();

        // return $products;
        return view('laporan.data_laporan', compact('products'));
    }
}
