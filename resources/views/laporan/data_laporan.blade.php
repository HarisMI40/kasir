@extends('layouts.index')

@section('content')
<div class="row">
    <div class="col-md-12">
     <table class="table table-bordered table-hover table-sm">
             <thead>
                 <tr>
                     <th scope="col">No</th>
                     <th scope="col">Kode Produk</th>
                     <th scope="col">Nama Produk</th>
                     <th scope="col">Qty</th>
                     <th scope="col">Harga</th>
                     <th scope="col">Tanggal Masuk</th>
                     <th scope="col">#</th>
                 </tr>
             </thead>
             <tbody>
             <?php $i=1?>
             @foreach($products as $product)
                 <tr>
                     {{-- <form data-id="{{$product->kode_barang}}" action="{{route('detailPenjualan.store', [$id, $product->kode_barang])}}" method="POST">
                         @csrf
                         @method('POST')
                     </form> --}}
                     <td scope="row" data-id="{{$product->id}}">{{$i++}}</th>
                     <td data-id="{{$product->kode_barang}}">{{$product->kode_barang}}</td>
                     <td data-id="{{$product->kode_barang}}">{{$product->nama_product}}</td>
                     <td data-id="{{$product->kode_barang}}">{{$product->qty}}</td>
                     <td data-id="{{$product->kode_barang}}">{{$product->harga}}</td>
                     <td data-id="{{$product->kode_barang}}">{{$product->created_at->format('d M Y')}}</td>
                     <td class="d-flex justify-content-rigth">
                         <form class="me-3" action="{{route('produk.delete', $product->id)}}" method="post">
                             @method("DELETE")
                             @csrf
                             <button class="btn btn-danger btn-sm" onClick="confirm('Apakah anda yakin ingin menghapus produk ?')">Hapus</button>
                         </form>

                     <a class="btn btn-success btn-sm" href="{{route('produk.edit', $product)}}" role="button">
                         Edit
                     </a>
                 </td>
                 </tr>
             @endforeach
             </tbody>
         </table>
    </div>
</div>
@endsection