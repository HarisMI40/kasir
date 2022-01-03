$("#table_nota").click(function(event){
    let hapus = confirm("Peringatan : Ini akan menghapus semua kuantitas produk yang dipilih dalam keranjang !");
    if(!hapus){
        return false;
    }
    if (event.target.tagName === "BUTTON" || event.target.tagName === "I" ) {
        var id = event.target.getAttribute("data-id");
        console.log("id dari button trash : " + id);
        jQuery(document).ready(function($){

            // CREATE
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                event.preventDefault();
                var id_penjualan_terakhir = jQuery("#id_penjualan").val();
                var type = "delete";
                var ajaxurl = 'penjualan/'+id;
                $.ajax({
                    type: type,
                    url: ajaxurl,
                    dataType: 'json',
                    success: function (data) {
                        let produk_terhapus = data.produk_terhapus;
                        console.log(data);
                        $("#table_nota tr[data-id='"+id+"']").remove();

                        $("#table_total").html(`
								<tr>
									<td><strong>qty</strong></td>
									<td>: ${data.data.total_qty}</td>
								</tr>
								<tr>
									<td><strong>total</strong></td>
									<td>: ${formatRupiah(data.data.total_harga)}</td>
								</tr> 
						`);

                        // update quantity di table produk
						$("td[data-id='"+produk_terhapus.kode_barang+"']#qtyProduct").text(produk_terhapus.qty)
                    },
                    error: function (data) {
                        console.log("Error" + data.responseJSON.message);
                        alert("Kesalahan : " + data.responseJSON.message);
                        // console.log('error : ' + data);
                    }
                });
        });
      }
});