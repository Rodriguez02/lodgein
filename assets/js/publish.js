$(document).ready(function () {
    $("#cities").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "includes/handlers/actionCities.php",
                type: 'post',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return item;
                    }));
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#cities').val(ui.item.label); // display the selected text
            $('#selectuser_id').val(ui.item.value); // save selected id to input
            return false;
        }
    });
});

function validate() {
    let resp = true;
    if (document.form.titulo.value == "") {
        $("#error-title").text("Complete el campo Titulo").addClass("error");
        resp = false;
    } else {
        $("#error-title").text("").removeClass("error");
    }
    if (document.form.desc.value == "") {
        $("#error-desc").text("Complete el campo Descripcion").addClass("error");
        resp = false;
    } else {
        $("#error-desc").text("").removeClass("error");
    }
    if (document.form.tipo_alojamiento.value == "") {
        $("#error-tipo").text("Complete el campo Tipo Alojamiento").addClass("error");
        resp = false;
    } else {
        $("#error-tipo").text("").removeClass("error");
    }
    if (document.form.tipo_ciudad.value == "") {
        $("#error-cities").text("Complete el campo Ciudad").addClass("error");
        resp = false;
    } else {
        $("#error-cities").text("").removeClass("error");
    }
    if (document.form.images.value == "") {
        console.log("Debe cargar una imagen");
        $("#error-images-1").text("Debe cargar una imagen").addClass("error");
        resp = false;
    } else {
        $("#error-images-1").text("").removeClass("error");
        let ruta = (document.form.images.value).split('.');
        let allowedExtensions = ["png", "jpg", "jpeg"];
        let ext = ruta[ruta.length - 1];
        let size = document.form.images.files[0].size;
        if (!allowedExtensions.includes(ext)) {
            $("#error-images-1").text("Formato no permitido").addClass("error");
            resp = false;
        } else {
            $("#error-images-1").text("").removeClass("error");
        }
        if (size > 15000000) {
            $("#error-images-2").text("Tamaño demasiado grande").addClass("error");
            resp = false;
        } else {
            $("#error-images-2").text("").removeClass("error");
        }
    }

    return resp;
}

function publishSuccess() {
    swal.fire(
        'Publicado!',
        'Tu publicación ha sido cargada con exito',
        'success'
    ).then(() => {
        location.href = 'index.php';
    })
}

function eventInput(id) {
    $(".txtc #" + id).addClass("focus");
}

function blurEvent(id) {
    if ($(".txtc #" + id).val() == "" || $(".txtc #" + id).val() == null) {
        $(".txtc #" + id).removeClass("focus");
    }
}


cont = 0;
function blurEventFile(id) {
    cont++;
    if ($(".txtc #" + id).val() == "" && cont % 2 == 0) {
        $(".txtc #" + id).removeClass("focus");
    }
}