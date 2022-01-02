@extends('layouts.index')

@section('content')
<div class="row">
    <div class="col-md-12">
     <table class="table table-bordered table-hover table-sm">
             <thead>
                 <tr>
                     <th scope="col">No</th>
                     <th scope="col">Bulan</th>
                     <th scope="col">Total produk Terjual</th>
                     <th scope="col">Total Pendapatan</th>
                 </tr>
             </thead>
             <tbody>
             <?php $i=1?>
             @foreach($products as $product)
                 <tr>
                     <td scope="row">{{$i++}}</th>
                     <td>{{$product->tanggal_data}}</td>
                     <td>{{$product->total_qty}}</td>
                     <td>{{number_format($product->total_pendapatan,2,",",".")}}</td>
                    
                 </tr>
             @endforeach
             </tbody>
         </table>
    </div>
</div>
@endsection