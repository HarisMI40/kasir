
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
							
							$("#table_nota").html("");
							$("#table_total").html("");
							$("#div_table_total").addClass("d-none");
							$("#div_button_buy ").addClass("d-none");
							
							$("#id_penjualan").val(data.id_penjualan);
							
							// // ==== Print =====
							// let printer = "POS58 Printer(2)"; // setting nama printer
							// let impresora = new Impresora(); // inisiasi

							// impresora.feed(1);
							// impresora.setAlign("center");
							// impresora.setFontSize(2, 2);
							// impresora.write("TOKO Serba Ada \n");
							// impresora.setFontSize(1, 1);
							// impresora.write("Jl garnet, permata regency \n Cikampek Utara \n");
							// impresora.write("--------------------------- \n");
							// impresora.setAlign("left");
							let no = 1;

							// data_product.forEach(dataProduct => {
							// 	impresora.write(no + ". "+dataProduct.product.nama_product+" \n");
							// 	impresora.write("   "+formatRupiah(dataProduct.product.harga)+" x "+dataProduct.qty+" "+formatRupiah(dataProduct.sub_total)+" \n");
							// 	// console.log(formatRupiah(dataProduct.product.harga));
							// 	// console.log(formatRupiah(dataProduct.sub_total));
							// });
							
								// impresora.setAlign("center");
								// impresora.write("--------------------------- \n");
								// impresora.setAlign("right");
								// impresora.write("Total : "+formatRupiah(data.data_product.total_harga)+" \n");

								// impresora.feed(1);
								// impresora.setAlign("center");
								// impresora.setFontSize(1, 1);
								// impresora.write("Terimakasih Telah Berbelanja \n");

								// impresora.imprimirEnImpresora(printer)
								// 	.then(valor => {
										
								// 	});

								// document.querySelector("#nota").innerHTML="";
								// window.location="{{route('penjualan')}}"
						},
						error: function (data) {
							console.log(data);
						}
					});
				});
			});