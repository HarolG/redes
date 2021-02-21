$(document).ready(function () {

    const BtnAdd = $('#btn_agregar')

    $(BtnAdd).click(function (e) { 
        e.preventDefault();

        const postData = new FormData($('#formAdd')[0])

        $.ajax({
            type: "POST",
            url: "../php/agregarTarea.php",
            data: postData,
            contentType: false,
            processData: false,
            success: function (response) {
                alert(response)
                $('#formAdd').trigger('reset');
            }
        });
    });


});