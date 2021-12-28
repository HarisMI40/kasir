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

			<div class="col-md-4 border p-3 shadow" id="nota">
			  @if($penjualan)
				@foreach($penjualan->DetailPenjualan as $detail)
					<div class="col-md-12 mb-3">
						<table width="100%" id="table_nota">
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
					<table width="50%" id="table_total">
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
					{{-- <form method="post" action="{{route('penjualan.update', $penjualan->id)}}">
						@csrf
						 @method('PUT') --}}
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
		{{-- <script src="{{asset('js/penjualan/buy.js')}}"></script> --}}
		<script>
			jQuery(document).ready(function($){

			// CREATE
			$("#buy").click(function (e) {
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
					}
				});
				e.preventDefault();
				var id_penjualan = jQuery("#id_penjualan").val();
				var type = "PUT";
				var ajaxurl = 'penjualan/'+id_penjualan;
				$.ajax({
					type: type,
					url: ajaxurl,
					dataType: 'json',
					success: function (data) {
					let data_product = data.data_product.detail_penjualan;
					console.log(data);


						// ==== Print =====
						let printer = "POS58 Printer(2)"; // setting nama printer
						let impresora = new Impresora(); // inisiasi

						impresora.feed(1);
						impresora.setAlign("center");
						impresora.setFontSize(2, 2);
						impresora.write("TOKO Serba Ada \n");
						impresora.setFontSize(1, 1);
						impresora.write("Jl garnet, permata regency \n Cikampek Utara \n");
						impresora.write("--------------------------- \n");
						impresora.setAlign("left");
						let no = 1;

					data_product.forEach(dataProduct => {
						//   console.log(dataProduct.product.nama_product);
						//   console.log(dataProduct.product.harga + " x " + dataProduct.qty + " " + dataProduct.sub_total);
						impresora.write(no + ". "+dataProduct.product.nama_product+" \n");
						impresora.write("   "+dataProduct.product.harga+" x "+dataProduct.qty+" "+dataProduct.sub_total+" \n");
					});
							// impresora.write("1. Abc Sambal  12 ML  Sachet \n");
							// impresora.write("   500 x 100 500000 \n");
							// impresora.write("2. Ultra Milk coklat \n");
							// impresora.write("   5000 x 10 50000 \n");
							impresora.setAlign("center");
							impresora.write("--------------------------- \n");
							impresora.setAlign("right");
							impresora.write("Total : "+data.data_product.total_harga+" \n");
							// impresora.write("Bayar : 6000000 \n");
							// impresora.write("Total : 15000 \n");
							impresora.feed(1);
							impresora.setAlign("center");
							impresora.setFontSize(1, 1);
							impresora.write("Terimakasih Telah Berbelanja \n");
							// impresora.setFontSize(0, 0);
							// impresora.cut();
							// impresora.cutPartial(); 
							impresora.imprimirEnImpresora(printer)
								.then(valor => {
									// document.querySelector("#nota").innerHTML="";
								});

							document.querySelector("#nota").innerHTML="";
							window.location="{{route('penjualan')}}"
					},
					error: function (data) {
						console.log(data);
					}
				});
			});
		});
		</script>

		<script src="{{asset('js/penjualan/impresora.js')}}"></script>
		<script src="{{asset('js/penjualan/script.js')}}"></script>
	@endsection
