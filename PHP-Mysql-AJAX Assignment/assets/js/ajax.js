
$(document).ready(function() {

  $('#signInBtn').on('click',function(){
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

});

function getMsg(msg) {
  msgs = msg.split(",")[1].split(":")[1].replace(/[\}\"\"\\]/ig,"");
  return msgs;
}

function getRedirectPath(path){
  return path.split(",")[0].split(":")[1].replace(/[\}\"\"\\]/ig,"");

}
