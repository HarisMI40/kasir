<?php

namespace App\Http\Controllers;

use App\Models\penjualan;
use App\Models\product;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan_terakhir = penjualan::get()->last();
        // return $penjualan_terakhir;
        if(!$penjualan_terakhir){ //jika tidak ada data
            $id = "1";
        }else{
            $id = $penjualan_terakhir->id;
            
            if($penjualan_terakhir->done){
                $id = $penjualan_terakhir->id + 1;
            }
        }
        $penjualan = penjualan::with('DetailPenjualan', 'DetailPenjualan.product')->where('id', $id)->first();


        $products = product::all();
        // return $penjualan->DetailPenjualan;
        // return $penjualan_terakhir;
        return view('penjualan.penjualan', compact('products','penjualan', 'id'));
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
    public function store(Request $request, penjualan $penjualan, product $product)
    {
        $penjualan->DetailPenjualan()->create([
            'id_product' => $product->id,
            'qty' => 1,
            'sub_total' => $product->harga * 1 
        ]);

        $penjualan->update([
            'total_qty' => $penjualan->total_qty + 1,
            'total_harga' => $penjualan->total_harga + (1 * $product->harga)
        ]);

        return redirect()->back();
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
    public function update(Request $request, $id_penjualan)
    {
        $penjualan = Penjualan::find($id_penjualan);
         $data = $penjualan->update(['done' => 1]);

        //  $data_product_yang_dibeli = DetailPenjualan::where("id_penjualan", $id_penjualan)->get();
         $data_product_yang_dibeli = penjualan::with('DetailPenjualan', 'DetailPenjualan.product')->where('id', $id_penjualan)->first();
        //  return $data_product_yang_dibeli;
        //  return redirect()->back();
        // return Response::json("berhasilll");
        $penjualan_terakhir = penjualan::get()->last();
        // return $penjualan_terakhir;
        if(!$penjualan_terakhir){ //jika tidak ada data
            $id = "1";
        }else{
            $id = $penjualan_terakhir->id;
            
            if($penjualan_terakhir->done){
                $id = $penjualan_terakhir->id + 1;
            }
        }

        return response()->json([
            'success' => true,
            'data_product' => $data_product_yang_dibeli,
            'id_penjualan' => $id
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(penjualan $penjualan)
    {

    }
}
