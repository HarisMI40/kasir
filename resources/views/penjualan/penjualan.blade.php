@extends('layouts.index')

@section('content')
		
		
		<div class="row">
			<div class="col-md-8 p-3" id="konten">

				<div class="row">
				    <form action="{{route('scanBarcode.store', [$id])}}" method="post" autocomplete="off">
						@method("POST")
						@CSRF
						<div class="mb-3">
							<label for="cariBarang" class="form-label">Scan Barcode / Cari Barang</label>
							<input type="text" class="form-control" id="cariBarang" name="kodeBarcode" >
						</div>
					</form>
					<table class="table table-bordered table-hover table-sm table-striped">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Product</th>
								<th scope="col">Qty</th>
								<th scope="col">Harga</th>
							</tr>
						</thead>
						<tbody>
						<?php $i=1?>
						@foreach($products as $product)
							<tr>
								<form data-id="{{$product->kode_barang}}" action="{{route('detailPenjualan.store', [$id, $product->kode_barang])}}" method="POST">
							    	@csrf
							    	@method('POST')
								</form>
								<td scope="row" data-id="{{$product->id}}">{{$i++}}</th>
								<td data-id="{{$product->kode_barang}}">{{$product->nama_product}}</td>
								<td data-id="{{$product->kode_barang}}">{{$product->qty}}</td>
								<td data-id="{{$product->kode_barang}}">{{$product->harga}}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					
					
						
				</div>
				
			</div>

			<div class="col-md-4 border p-3 shadow">
			  @if($penjualan)
				@foreach($penjualan->DetailPenjualan as $detail)
					<div class="col-md-12 mb-3">
						<table width="100%">
				    		<tr>
				    			<td width="40%">{{$detail->product->nama_product}}</td>
				    			<td width="10%">{{$detail->qty}}</td>
				    			<td width="25%">{{$detail->product->harga}}</td>
				    			<td width="20%">{{$detail->product->harga * $detail->qty}}</td>
				    			<td width="5%">
				    				<form method="post" action="{{route('detailPenjualan.destroy', $detail->id)}}">
					    				@csrf
					    				@method('DELETE')
					    				<button type="submit" class="btn btn-danger btn-sm"
										><i class="bi bi-trash" style="color:white"></i></button>
					    			</form>	

				    			</td>
				    		</tr>
				    	</table>
					</div>
				@endforeach
					<p>---------------------------------------</p>
					<table width="50%">
						<tr>
							<td><strong>qty</strong></td>
							<td>: {{$penjualan->total_qty}}</td>
						</tr>
						<tr>
							<td><strong>total</strong></td>
							<td>: {{$penjualan->total_harga}}</td>
						</tr>
					</table>
					<p>---------------------------------------</p>
					{{-- <form method="post" action="{{route('penjualan.update', $penjualan->id)}}"> --}}
						{{-- @csrf --}}
						{{-- @method('PUT') --}}
						<input type="hidden" name="id_penjualan" id="id_penjualan" value="{{$penjualan->id}}">
						<div class="d-grid gap-2">
							<button type="submit" class="btn btn-success mt-4" id="buy">Buy</button>
						</div>
					{{-- </form> --}}
			  @endif
			</div>



		</div>

	@endsection
	
	@section('script')
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
		<script src="{{asset('js/penjualan/transaksi.js')}}"></script>
		<script src="{{asset('js/penjualan/buy.js')}}"></script>
		<script src="{{asset('js/penjualan/impresora.js')}}"></script>
		<script src="{{asset('js/penjualan/script.js')}}"></script>
	@endsection
