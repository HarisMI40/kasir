@extends('layouts.index')

@section('content')

	<div class="row mb-5">
		<div class="col-md-12 mb-3">
			<button class="btn btn-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
				Tambah Produk 
			  </button>
		</div>
		<div class="col-md-12 collapse" id="collapseExample">
			<h3>Tambah Barang / Produk </h3>
			<form action="{{ route('produk.create') }}" method="post" autocomplete="off">
				@method("POST")
				@CSRF
				<div class="mb-3">
					<label for="" class="form-label">Kode Produk</label>
					<input type="text" name="kode_product" id="kode_barang" class="form-control" placeholder="Kode Produk" aria-describedby="kode Produk">
					{{-- <small id="helpId" class="text-muted">Help text</small> --}}
				</div>

				<div class="mb-3">
					<label for="" class="form-label">Nama Produk</label>
					<input type="text" name="nama_product" id="nama_produk" class="form-control" placeholder="Nama Produk" aria-describedby="Nama Produk">
					{{-- <small id="helpId" class="text-muted">Help text</small> --}}
				</div>

				<div class="mb-3">
					<label for="" class="form-label">QTY</label>
					<input type="number" name="qty" id="qty" class="form-control" placeholder="qty" aria-describedby="qty">
					{{-- <small id="helpId" class="text-muted">Help text</small> --}}
				</div>

				<div class="mb-3">
					<label for="" class="form-label">Harga</label>
					<input type="number" name="harga" id="harga" class="form-control" placeholder="harga" aria-describedby="harga">
					{{-- <small id="helpId" class="text-muted">Help text</small> --}}
				</div>

				<button type="submit" name="button_simpan" class="btn btn-primary btn-block">
					Simpan
				</button>
			</form>
			
		</div>
	</div>
   <div class="row">
       <div class="col-md-12">
		<table class="table table-bordered table-hover table-sm table-striped">
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
						<td data-id="{{$product->kode_barang}}">{{angka::titikPemisah($product->harga)}}</td>
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