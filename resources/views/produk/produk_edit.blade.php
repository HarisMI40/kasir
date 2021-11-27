@extends('layouts.index')

@section('content')
    <div class="row">
        <div class="col-md-12">
			<h3>Edit Barang / Produk </h3>
			<form action="{{ route('produk.update', $product) }}" method="post" autocomplete="off">
				@method("PUT")
				@CSRF
				<div class="mb-3">
					<label for="" class="form-label">Kode Produk</label>
					<input type="text" name="kode_product" id="kode_barang" class="form-control" placeholder="Kode Produk" aria-describedby="kode Produk" value="{{$product->kode_barang}}">
					{{-- <small id="helpId" class="text-muted">Help text</small> --}}
				</div>

				<div class="mb-3">
					<label for="" class="form-label">Nama Produk</label>
					<input type="text" name="nama_product" id="nama_produk" class="form-control" placeholder="Nama Produk" aria-describedby="Nama Produk"  value="{{$product->nama_product}}">
					{{-- <small id="helpId" class="text-muted">Help text</small> --}}
				</div>

				<div class="mb-3">
					<label for="" class="form-label">QTY</label>
					<input type="number" name="qty" id="qty" class="form-control" placeholder="qty" aria-describedby="qty"  value="{{$product->qty}}">
					{{-- <small id="helpId" class="text-muted">Help text</small> --}}
				</div>

				<div class="mb-3">
					<label for="" class="form-label">Harga</label>
					<input type="number" name="harga" id="harga" class="form-control" placeholder="harga" aria-describedby="harga"  value="{{$product->harga}}">
					{{-- <small id="helpId" class="text-muted">Help text</small> --}}
				</div>

				<button type="submit" name="button_simpan" class="btn btn-success btn-block">
					Edit
				</button>
			</form>
			
		</div>
    </div>
@endsection