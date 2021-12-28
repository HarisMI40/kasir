jQuery(document).ready(function($){

    // CREATE
    $("#buy").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        // var formData = {
        //     title: jQuery('#title').val(),
        //     description: jQuery('#description').val(),
        // };
        var id_penjualan = jQuery("#id_penjualan").val();
        // var state = jQuery('#btn-save').val();
        var type = "PUT";
        // var todo_id = jQuery('#todo_id').val();
        var ajaxurl = 'penjualan/'+id_penjualan;
        $.ajax({
            type: type,
            url: ajaxurl,
            // data: formData,
            dataType: 'json',
            success: function (data) {
                // var todo = '<tr id="todo' + data.id + '"><td>' + data.id + '</td><td>' + data.title + '</td><td>' + data.description + '</td>';
                // if (state == "add") {
                //     jQuery('#todo-list').append(todo);
                // } else {
                //     jQuery("#todo" + todo_id).replaceWith(todo);
                // }
                // jQuery('#myForm').trigger("reset");
                // jQuery('#formModal').modal('hide')

                console.log("successs");
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});