/* VinayGawade: 09-09-2021 ->Script for Passwords match.<- */
function checkPasswordMatch() {
    var password = $("#userPassword").val();
    var confirmPassword = $("#userConfirmPassword").val();

    if (password != confirmPassword){
      // ->if passwords not mathed sho warning<-
        $("#notice").removeClass("alert-light");
        $("#notice").addClass("alert-danger");
        $("#notice").text("Passwords Not Match.");
        $('#signup').find('#signUpBtn').prop('disabled', true);
        $('#dashboard').find(':button[type="button"]').prop('disabled', true);
      }else {
        $("#notice").removeClass("alert-danger");
        $("#notice").addClass("alert-light");
        $("#notice").empty();
        $('#signup').find('#signUpBtn').prop('disabled', false);
        $('#dashboard').find(':button[type="button"]').prop('disabled', false);
      }
}

function validEmailId(){
  var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,3})?$/; // ->REGEX for validate Email Id<-

      if (!regex.test($("#userEmailId").val())){

        // ->if REGEX not matched then show warning<-
          $("#emailNotice").removeClass("alert-light");
          $("#emailNotice").addClass("alert-danger");
          $("#emailNotice").text("Enter Valid Email Id.");
          $('#signin').find('#signInBtn').prop('disabled', true);
          $('#signup').find('#signUpBtn').prop('disabled', true);
          $('#dashboardEmail').find('#updateNameEmailBtn').prop('disabled', true);
        }else {
          $("#emailNotice").removeClass("alert-danger");
          $("#emailNotice").addClass("alert-light");
          $("#emailNotice").empty();
          $('#signin').find('#signInBtn').prop('disabled', false);
          $('#signup').find('#signUpBtn').prop('disabled', false);
          $('#dashboardEmail').find('#updateNameEmailBtn').prop('disabled', false);
        }
}

$(document).ready(function () {
  
  // ->checking validation while typing <-
  $("#userConfirmPassword").keyup(checkPasswordMatch);
  $("#userEmailId").keyup(validEmailId);
});
