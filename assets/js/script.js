

/* function openPage(url) {

	if(url.indexOf("?") == -1) {
		url = url + "?";
    }
    
	$("#mainContent").load(url);
    $("body").scrollTop(0);
    history.pushState(null, null, url);
}
 */
function updateEmail(emailClass) {
    var emailValue = $("." + emailClass).val();

    emailValue = emailValue.toLowerCase();

    $.post("includes/handlers/updateEmail.php", { email: emailValue })
        .done(function (response) {
            console.log(response);
            if (response == "Actualización Exitosa") {
                swal.fire({
                    icon: 'success',
                    title: 'Actualización exitosa',
                })
            } else if (response == "Email inválido" || response == "Email ya en uso"){
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response
                })
            } else{
                Swal.fire({
                    icon: 'warning',
                    title: response,
                })
            }
        })
}

function updatePassword(oldPasswordClass, newPasswordClass1, newPasswordClass2) {
    var oldPassword = $("." + oldPasswordClass).val();
    var newPassword1 = $("." + newPasswordClass1).val();
    var newPassword2 = $("." + newPasswordClass2).val();

    $.post("includes/handlers/updatePassword.php",
        {
            oldPassword: oldPassword,
            newPassword1: newPassword1,
            newPassword2: newPassword2
        })
        .done(function (response) {
            console.log(response);
            $(".txtb").nextAll(".m2").text(response);
        })
}

function updatePhone(phoneClass) {
    var newPhone = $("." + phoneClass).val();
    console.log(newPhone);
    $.post("includes/handlers/updatePhone.php", { phone: newPhone })
        .done(function (response) {
            console.log(response);
            if (response == "Teléfono Inválido"){
                Swal.fire({
                    icon: 'error',
                    title: response,
                })
            } else if (response == "Debe ingesar un número de teléfono"){
                Swal.fire({
                    icon: 'warning',
                    title: response,
                })
            } else{
                Swal.fire({
                    icon: 'success',
                    title: 'Actualización exitosa',
                    text: response
                })
            }
        })
}

function deletePublication(id) {
    swal.fire({
        title: 'Estás seguro?',
        text: "Este cambio no se puede revertir!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            $.post("includes/handlers/deletePublication.php", { id: id })
                .done(function (error) {
                    if (error != "") {
                        alert(error);
                        return;
                    }
                })
            swal.fire(
                'Eliminado!',
                'Tu publicación ha sido eliminada con éxito',
                'success'
            ).then(() => {
                location.reload();
            })

        }
    })
}