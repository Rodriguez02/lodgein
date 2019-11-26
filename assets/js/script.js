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