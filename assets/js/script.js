/* function openPage(url) {

	if(url.indexOf("?") == -1) {
		url = url + "?";
    }
    
	$("#mainContent").load(url);
    $("body").scrollTop(0);
    history.pushState(null, null, url);
}
 */
function updateEmail(emailClass){
    var emailValue = $("." + emailClass).val();

    emailValue = emailValue.toLowerCase();

    $.post("includes/handlers/updateEmail.php",{email: emailValue})
    .done(function(response){
        console.log(response);
        $(".txtb" ).nextAll(".m1").text(response);
    })
}

function updatePassword(oldPasswordClass, newPasswordClass1, newPasswordClass2){
    var oldPassword = $("." + oldPasswordClass).val();
    var newPassword1 = $("." + newPasswordClass1).val();
    var newPassword2 = $("." + newPasswordClass2).val();

    $.post("includes/handlers/updatePassword.php",
        {
            oldPassword: oldPassword,
            newPassword1: newPassword1,
            newPassword2: newPassword2
        })
    .done(function(response){
        console.log(response);
        $(".txtb" ).nextAll(".m2").text(response);
    })
}

function updatePhone (phoneClass){
    var newPhone = $("."+phoneClass).val();
    console.log(newPhone);
    $.post("includes/handlers/updatePhone.php",{phone:newPhone})
    .done(function(response){
        console.log(response);
        $(".txtb").nextAll(".m3").text(response);
    })
}

function deletePublication(id){
    var prompt = confirm("¿Estás seguro que quieres eliminar esta publicación?");
    if (prompt){
        $.post("includes/handlers/deletePublication.php",{id:id})
        .done(function(error){
            if (error != ""){
                alert(error);
                return;
            }
            location.reload();
        })
    }
}