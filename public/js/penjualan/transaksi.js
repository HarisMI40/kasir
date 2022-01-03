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
                            tampil_produk_yang_dibeli(detailPenjualan);
							tampil_total(data);
						},
						error: function (data) {
							console.log("Error" + data.responseJSON.message);
                            alert("Kesalahan : " + data.responseJSON.message);
                            // console.log('error : ' + data);
						}
					});
			});
            // tutup ajax jquery
            
        }
    }
});