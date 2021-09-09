/* VinayGawade: 09-09-2021 ->Script for Passwords match.<- */
function checkPasswordMatch() {
    var password = $("#userPassword").val();
    var confirmPassword = $("#userConfirmPassword").val();

    if (password != confirmPassword){
        $("#notice").removeClass("alert-light");
        $("#notice").addClass("alert-danger");
        $("#notice").text("Passwords Not Match.");
        $('#signup').find('#signUpBtn').prop('disabled', true);
        $('#dashboard').find(':input[type="submit"]').prop('disabled', true);
      }else {
        $("#notice").removeClass("alert-danger");
        $("#notice").addClass("alert-light");
        $("#notice").empty();
        $('#signup').find('#signUpBtn').prop('disabled', false);
        $('#dashboard').find(':input[type="submit"]').prop('disabled', false);
      }
}

function validEmailId(){
  var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,3})?$/;
      if (!regex.test($("#userEmailId").val())){
          $("#emailNotice").removeClass("alert-light");
          $("#emailNotice").addClass("alert-danger");
          $("#emailNotice").text("Enter Valid Email Id.");
          $('#signin').find('#signInBtn').prop('disabled', true);
          $('#signup').find('#signUpBtn').prop('disabled', true);
          $('#dashboard').find(':input[type="submit"]').prop('disabled', true);
        }else {
          $("#emailNotice").removeClass("alert-danger");
          $("#emailNotice").addClass("alert-light");
          $("#emailNotice").empty();
          $('#signin').find('#signInBtn').prop('disabled', false);
          $('#signup').find('#signUpBtn').prop('disabled', false);
          $('#dashboard').find(':input[type="submit"]').prop('disabled', false);
        }
}

$(document).ready(function () {
  $("#userConfirmPassword").keyup(checkPasswordMatch);
  $("#userEmailId").keyup(validEmailId);
});
