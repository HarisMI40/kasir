<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penjualan;
use App\Models\product;

use App\Models\DetailPenjualan;

class detailPenjualanController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id, $kodeBarcode)
    {
        $this->tambahProduct($id, $kodeBarcode);
        return redirect()->back();
    }

    public function scanBarcode(Request $request, $id)
    {
        // return $id. " ". $request->kodeBarcode ;
        $product = product::where('kode_barang', $request->kodeBarcode)->first();
        
        $this->tambahProduct($id, $product->kode_barang);
        return redirect()->back();
    }


    private function tambahProduct($id, $kodeBarcode){
        // echo "id : ". $id . "product : "."$product";
         // dd('hiiiii');
        //  return date('dd-mm-yy');
         $penjualan = penjualan::find($id);
         $product = product::where('kode_barang', $kodeBarcode)->first();

         if(!$penjualan){
             /*
                 jika data penjualan belum ada,
                 yang artinya belum bertransaksi / ini melakukan transaksi baru
 
             */
             $penjualan = penjualan::create([
                 'id' => $id,
                 'total_qty' => 1,
                 'total_harga' => $product->harga * 1,
                 'tanggal' => now()
             ]);
 
             $penjualan->DetailPenjualan()->create([
                 'id_product' => $product->id,
                 'qty' => 1,
                 'sub_total' => $product->harga * 1 
             ]);
 
         }else{ // jika sudah data penjualan ( tinggal memasukan data detail penjualan )
 
             $detailPenjualan = DetailPenjualan::where(['id_product' => $product->id, 'id_penjualan' => $id])->first();
             // dd($detailPenjualan);
 
 
             if($detailPenjualan){ // apakah data produk sudah ada pada detail penjualan
 
                 /*
                     jika product sudah ada pada detail penjualan
                     maka tinggal update saja
 
                     jika tidak / belum ada pada detail penjualan
                     maka buat data / row baru
                 */
 
                 $detailPenjualan->update([
                     'qty' => $detailPenjualan->qty + 1,
                     'sub_total' => $detailPenjualan->sub_total + ($product->harga * 1)
                 ]);
 
 
             }else{
                
                // tambah data pada detail penjualan
                 $penjualan->DetailPenjualan()->create([
                     'id_product' => $product->id,
                     'qty' => 1,
                     'sub_total' => $product->harga * 1 
                 ]);
 
             }
 
                // update total qty dan total harga pada tabel penjualan
                $penjualan->update([
                    'total_qty' => $penjualan->total_qty + 1,
                    'total_harga' => $penjualan->total_harga + (1 * $product->harga)
                ]);   
            } 
 
             // dd($product->qty);
             if($product->qty > 0 ){
                 $product->update(['qty' => $product->qty - 1]);
             }else{
                 echo "tidak bisa di ambil lagi";
                 die();
             }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailPenjualan $DetailPenjualan)
    {
        // $product = product::find($DetailPenjualan->id_product);
        // echo "qty produk = ". $product->qty."<br/>";
        // echo "penjualan qty = ". $DetailPenjualan->qty."<br/>";
        // echo $total = $product->qty + $DetailPenjualan->qty;
        // die();

    	$penjualan = penjualan::find($DetailPenjualan->id_penjualan);

    	$penjualan->update([
    		'total_qty' => $penjualan->total_qty - $DetailPenjualan->qty,
    		'total_harga' => $penjualan->total_harga - $DetailPenjualan->sub_total
    	]);
        $DetailPenjualan->delete();


        $product = product::find($DetailPenjualan->id_product);
        $total = $product->qty + $DetailPenjualan->qty;
        $product->update(['qty' => $total]);



        return redirect()->back();
    }
}
