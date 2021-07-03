<!DOCTYPE html>
<html>
<head>
	<title></title>
<!-- 
	<link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}"> -->
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
	<div class="container mt-4">
		<div class="row">
			<div class="col-md-8 border p-3">

				<div class="row">
					@foreach($products as $product)
						<div class="col-md-4 mb-3">
							<div class="card">
							  <img src="..." class="card-img-top" alt="...">
							  <div class="card-body">
							    <h5 class="card-title">{{$product->nama_product}}</h5>
							    <p class="card-text">
							    	<table>
							    		<tr>
							    			<td>qty</td>
							    			<td>: {{$product->qty}}</td>
							    		</tr>
							    		<tr>
							    			<td>harga</td>
							    			<td>: {{$product->harga}}</td>
							    		</tr>
							    	</table>
							    </p>
							    <form action="{{route('detailPenjualan.store', [$penjualan->id, $product->id])}}" method="POST">
							    	@csrf
							    	@method('POST')

							    	<input type="submit" class="btn btn-primary" value="add">
								</form>
							  </div>
							</div>	
						</div>
					@endforeach
						
				</div>
				
			</div>


			<div class="col-md-4 border p-3">
				@foreach($penjualan->DetailPenjualan as $detail)
					<div class="col-md-12 mb-3">
						<!-- <div class="card">
						  <img src="..." class="card-img-top" alt="...">
						  <div class="card-body">
						    <h5 class="card-title">{{$detail->product->nama_product}}</h5>
						    <p class="card-text">
						    	<table>
						    		<tr>
						    			<td>harga</td>
						    			<td>: {{$detail->product->harga}}</td>
						    		</tr>
						    		<tr>
						    			<td>qty</td>
						    			<td>: {{$detail->qty}}</td>
						    		</tr>
						    		<tr>
						    			<td>sub total</td>
						    			<td>: {{$detail->product->harga * $detail->qty}}</td>
						    		</tr>
						    	</table>
						    </p>
						    <input type="number" class="form-control" name="">
						  </div>
						</div>	 -->

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
					    				<button type="submit" class="btn btn-danger btn-sm">x</button>
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
					<button class="btn btn-success mt-4">Buy</button>
			</div>



		</div>
	</div>
</body>
</html>