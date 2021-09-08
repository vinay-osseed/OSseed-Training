function checkPasswordMatch() {
    var password = $("#userPassword").val();
    var confirmPassword = $("#userConfirmPassword").val();

    if (password != confirmPassword){
        $("#notice").removeClass("alert-light");
        $("#notice").addClass("alert-danger");
        $("#notice").text("Passwords Not Match.");
        $('#signup').find(':input[type="submit"]').prop('disabled', true);
        $('#dashboard').find(':input[type="submit"]').prop('disabled', true);
      }else {
        $("#notice").removeClass("alert-danger");
        $("#notice").addClass("alert-light");
        $("#notice").empty();
        $('#signup').find(':input[type="submit"]').prop('disabled', false);
        $('#dashboard').find(':input[type="submit"]').prop('disabled', false);
      }
}

$(document).ready(function () {
   $("#userConfirmPassword").keyup(checkPasswordMatch);
});
