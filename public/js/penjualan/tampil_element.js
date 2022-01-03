function tampil_produk_yang_dibeli(detailPenjualan){
    $("#table_nota").html("");
                            
    // menampilkan produk yang dibeli
    detailPenjualan.forEach(detail => {
        $("#table_nota").append(`
            <tr data-id="${detail.id}">
                <td width="40%">${detail.product.nama_product}</td>
                <td width="10%">${detail.qty}</td>
                <td width="25%">${formatRupiah(detail.product.harga)}</td>
                <td width="20%">${formatRupiah(detail.product.harga * detail.qty)}</td>
                <td width="5%">
                        <button type="submit" class="btn btn-danger btn-sm" data-id="${detail.id}"
                        ><i class="bi bi-trash" style="color:white" data-id="${detail.id}"></i></button>
                </td>
            </tr>
        `);

        // update quantity di table produk
        $("td[data-id='"+detail.product.kode_barang+"']#qtyProduct").text(detail.product.qty)

    });
}

// menampilkan table total
function tampil_total(data){
    $("#div_table_total").removeClass('d-none');
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
    
    // menampilkan button buy
    $("#div_button_buy").removeClass("d-none");
}
