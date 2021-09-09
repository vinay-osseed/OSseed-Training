
$(document).ready(function() { // ->When page Load is done execute following methods as per events occures<-

  $('#signInBtn').on('click',function(){
    // ->This Method for sign in page when sign in button is pressed method get called<-
    	$.ajax({
    		url: "./includes/do.php",
    		type: "POST",
        data:$("#signInForm").serialize(),
    		cache: false,
    		success: function(dataResult){
          if (getMsg(dataResult)=='') {
            window.location=getRedirectPath(dataResult);
          }else{
            alert(getMsg(dataResult));
          }
    		}
      });
  });

    $('#signOutBtn').on('click',function(){
      // ->This Method for sign out button when it pressed method get called<-
      	$.ajax({
      		url: "./includes/do.php",
      		type: "POST",
          data:$("#signOutForm").serialize(),
      		cache: false,
      		success: function(dataResult){
            if (getMsg(dataResult)=="") {
              window.location=getRedirectPath(dataResult);
            }else{
              alert(getMsg(dataResult));
            }
      		}
        });
    });

    $('#signUpBtn').on('click',function(){
      // ->This Method for sign up page when sign up button is pressed method get called <-
      	$.ajax({
      		url: "./includes/do.php",
      		type: "POST",
          data:$("#signUpForm").serialize(),
      		cache: false,
      		success: function(dataResult){
            if (getMsg(dataResult)=='Account Created Sign In Now.') {
              alert(getMsg(dataResult));
              window.location=getRedirectPath(dataResult);
            }else{
              alert(getMsg(dataResult));
            }
      		}
        });
    });

    $('#UpdatePasswordBtn').on('click',function(){
      // ->This Method for update current password when button is pressed method get called<-
      	$.ajax({
      		url: "./includes/do.php",
      		type: "POST",
          data:$("#UpdatePasswordForm").serialize(),
      		cache: false,
      		success: function(dataResult){
            if (getMsg(dataResult)=='Account Password Updated.') {
              alert(getMsg(dataResult));
              window.location=getRedirectPath(dataResult);
            }else{
              alert(getMsg(dataResult));
            }
      		}
        });
    });

    $('#updateNameEmailBtn').on('click',function(){
      // ->This Method for update eamil & full name when button is pressed method get called<- 
      	$.ajax({
      		url: "./includes/do.php",
      		type: "POST",
          data:$("#UpdateNameEmailForm").serialize(),
      		cache: false,
      		success: function(dataResult){
            if (getMsg(dataResult)=='Account Full Name & Email Updated.') {
              alert(getMsg(dataResult));
              window.location=getRedirectPath(dataResult);
            }else{
              alert(getMsg(dataResult));
            }
      		}
        });
    });

});

/* VinayGawade: 10-09-2021 -> Extract message from response JSON<- */
function getMsg(msg) {
  return msg.split(",")[1].split(":")[1].replace(/[\}\"\"\\]/ig,"");
}

/* VinayGawade: 10-09-2021 -> Extract Redirect Path from response JSON<- */
function getRedirectPath(path){
  return path.split(",")[0].split(":")[1].replace(/[\}\"\"\\]/ig,"");
}
