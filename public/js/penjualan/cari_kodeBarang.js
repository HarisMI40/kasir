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
                    $("#table_nota").html("");
                    
                    // menampilkan produk yang dibelis
                    detailPenjualan.forEach(detail => {
                        $("#table_nota").append(`
                            <tr>
                                <td width="40%">${detail.product.nama_product}</td>
                                <td width="10%">${detail.qty}</td>
                                <td width="25%">${detail.product.harga}</td>
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

                    //kosongkan input cari
                    jQuery("#cariBarang").val("");
                },
                error: function (data) {
                    console.log(data);
                    alert("Kesalahan : " + data.responseJSON.message);
                }
            });
    });
});