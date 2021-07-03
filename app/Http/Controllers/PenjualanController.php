<?php

namespace App\Http\Controllers;

use App\Models\penjualan;
use App\Models\product;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $products = product::all();

        // if($id == null){
            $penjualan = penjualan::with('DetailPenjualan', 'DetailPenjualan.product')->where('id', $id)->first();
        // }
        

        return view('home', compact('products','penjualan'));
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
    public function destroy(penjualan $penjualan)
    {
        dd($penjualan);
    }
}
