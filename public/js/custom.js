$(document).ready(function() {
    var table = $('#data-tables').DataTable({
        lengthChange: false,
        buttons: ['excel', 'pdf']
    });

    table.buttons().container()
        .appendTo('#data-tables_wrapper .col-md-6:eq(0)');
});

$(document).ready(function() { //Thêm ý kiến theo loại ý kiến
    $("#id_ykien").change(function() {
        $(this).find("option:selected").each(function() {
            var optionValue = $(this).attr("value");
            if (optionValue) {
                $(".y-kien").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else {
                $(".y-kien").hide();
            }
        });
    }).change();
});

$(document).ready(function() {
    $("#phong_ban").change(function() {
        var id_phongban = $(this).val();
        $.get("ajax/chucvu/" + id_phongban, function(data) {
            $("#chuc_vu").html(data);
        });
    });
});