const table = document.querySelector("table");

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
					var id_penjualan_terakhir = jQuery("#penjualanTerakhir").val();
					var type = "POST";
					var ajaxurl = 'penjualan/add/'+id_penjualan_terakhir+'/'+id;
					$.ajax({
						type: type,
						url: ajaxurl,
						dataType: 'json',
						success: function (data) {
							// alert('success');
                            console.log('success');
                            console.log(data);
                            $("#table_nota").html("");
                            
                            data.detail_penjualan.forEach(detail => {
                                $("#table_nota").append(`
                                <td width="40%">${detail.product.nama_product}</td>
                                <td width="10%">${detail.qty}</td>
                                <td width="25%">${detail.sub_total}</td>
                                <td width="20%">${detail.product.harga * detail.qty}</td>
                                <td width="5%">
                                        <button type="submit" class="btn btn-danger btn-sm"
                                        ><i class="bi bi-trash" style="color:white"></i></button>
                                </td>
                            `);
                            });
                            
						},
						error: function (data) {
							console.log(data);
                            console.log('error');
						}
					});
			});
            // tutup ajax jquery
            
        }
    }
});