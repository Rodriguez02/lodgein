function updateEmail(emailClass, formGroup){
    var emailValue = $("." + emailClass).val();

    emailValue = emailValue.toLowerCase();

    $.post("includes/handlers/updateEmail.php",{email: emailValue})
    .done(function(response){
        console.log(response);
        $(".txtb" ).nextAll(".message").text(response);
    })
}