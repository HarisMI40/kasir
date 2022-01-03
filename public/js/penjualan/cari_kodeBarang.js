$("#form_cariBarang").on('submit', function(event) {
    event.preventDefault();

    jQuery(document).ready(function($){
        // CREATE
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            var id_penjualan_terakhir = jQuery("#id_penjualan").val();
            var cariBarang = jQuery("#cariBarang").val();
            var type = "POST";
            var ajaxurl = 'cariBarang/add/'+id_penjualan_terakhir;
            $.ajax({
                type: type,
                url: ajaxurl,
                dataType: 'json',
                data: {
                    "kodeBarcode" : cariBarang
                },
                success: function (data) {
                    let detailPenjualan = data.data.detail_penjualan;
                    // alert('success');
                    console.log('success');
                    console.log(data);
                    console.log(detailPenjualan);
                    tampil_produk_yang_dibeli(detailPenjualan);
                    tampil_total(data);
                    jQuery("#cariBarang").val(""); //kosongkan input cari
                },
                error: function (data) {
                    console.log(data);
                    alert("Kesalahan : " + data.responseJSON.message);
                }
            });
    });
});