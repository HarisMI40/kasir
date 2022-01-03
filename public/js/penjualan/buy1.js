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
                            document.querySelector("#nota").innerHTML="";
                        });

                
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});