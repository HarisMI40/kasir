const table = document.querySelector("table");
    console.log(formatRupiah('1000'));
	table.addEventListener('click', function(event){
    // console.log(event.target.tagName);
    if (event.target.tagName === "TD"){
        let id = event.target.getAttribute("data-id");
        let form = document.querySelector(`form[data-id="${id}"]`);

        let tambahkanProduk = confirm("Tambahkan Produk ? ");
        if(tambahkanProduk){
            // form.submit();
            // ajax jquery
            jQuery(document).ready(function($){

				// CREATE
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
						}
					});
					event.preventDefault();
					var id_penjualan_terakhir = jQuery("#id_penjualan").val();
					var type = "POST";
					var ajaxurl = 'penjualan/add/'+id_penjualan_terakhir+'/'+id;
					$.ajax({
						type: type,
						url: ajaxurl,
						dataType: 'json',
						success: function (data) {
							let detailPenjualan = data.data.detail_penjualan;
							// alert('success');
                            console.log('success');
                            console.log(data);
							console.log(detailPenjualan);
                            $("#table_nota").html("");
                            
							// menampilkan produk yang dibelis
                            detailPenjualan.forEach(detail => {
                                $("#table_nota").append(`
									<tr>
										<td width="40%">${detail.product.nama_product}</td>
										<td width="10%">${detail.qty}</td>
										<td width="25%">${detail.sub_total}</td>
										<td width="20%">${detail.product.harga * detail.qty}</td>
										<td width="5%">
												<button type="submit" class="btn btn-danger btn-sm"
												><i class="bi bi-trash" style="color:white"></i></button>
										</td>
									</tr>
								`);

								// update quantity di table produk
								$("td[data-id='"+detail.product.kode_barang+"']#qtyProduct").text(detail.product.qty)
							
                            });

							// menampilkan table total
							$("#div_table_total").removeClass('d-none');
							$("#table_total").html(`
								<tr>
									<td><strong>qty</strong></td>
									<td>: ${data.data.total_qty}</td>
								</tr>
								<tr>
									<td><strong>total</strong></td>
									<td>: ${data.data.total_harga}</td>
								</tr> 
							`);
							
							// menampilkan button buy
							$("#div_button_buy").removeClass("d-none");
							// $("#div_button_buy").html(`
							// 		<button type="submit" class="btn btn-success mt-4" id="buy">Buy</button>
							// `);

							

						},
						error: function (data) {
							console.log(data);
                            console.log('error : ' + data.message);
						}
					});
			});
            // tutup ajax jquery
            
        }
    }
});