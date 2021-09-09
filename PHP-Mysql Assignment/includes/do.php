<?php
/*
 Standards:
 ->  Naming Conventions : * beDescriptive * (varName,fncName,clsName,flName) (SQL:*_UPPERCASE*)
 ->  Case Types         : * camelCase     * (CONST:*_UPPERCASE*)
 ->  Do Comments        : * Good & Bad    * (Snipppets:['/':'single comment','/*':'block comment'])
 ->  Consistency        : * beConsistant  * (Comments,Code,Values)
 ->  Indentation        : * TAB = 4space  *
 ->  Readability        : * useSpaces     *
 ->  Indentation        : * TAB = 4space  *
 */
include "helper.php";
$query = new runQuery();

switch ($_POST['task']) {
# ->if request for SignUp<-
  case 'SignUp':

    if (!$query->userExist('users', $_POST)):

        if ($query->insertQuery('users', $_POST)):

          echo "<script>alert('Account Created Login Now.');window.location='../';</script>";
        endif;

    else:
        echo "<script>alert('Account Already Exist.');window.location='../';</script>";
    endif;

  break;

# ->if request for SignIn<-
  case 'SignIn':

      if ($query->loginVerify('users', $_POST)):

          if(setcookie('signInUser', $_POST['userEmailId'], time() + 600, "/") && $query->insertLogQuery('userLogs',$_POST)):
            # ->SetCookie For 10-Min From Login Only also Add entry in logs<-
            echo "<script>window.location='../dashboard.php';</script>";
          endif;

      else:

        echo "<script>alert('Wrong Email / Password');window.location='../';</script>";
      endif;

  break;

# ->if request for Signout<-
  case 'SignOut':

    if(setcookie('signInUser', '', time() - 600, "/") && setcookie('signInUserId', '', time() - 600, "/")):
      # ->Delete Saved Cookies<-
      echo "<script>window.location='../';</script>";
    endif;

  break;

# ->if request for Update Name & Email<-
  case 'UpdateName':

    if($query->updateNameAndEmailQuery('users',$_POST) && setcookie('signInUser', $_POST['userEmailId'], time() + 600, "/")):

      echo "<script>alert('Account\'s Full Name & Email Updated.');window.location='../dashboard.php';</script>";
    else:

      echo "<script>alert('Invalid Input.');window.location='../dashboard.php';</script>";
    endif;

  break;

# ->if request for UpdatePassworde<-
  case 'UpdatePassword':

    if($query->updatePasswordQuery('users',$_POST)):

      echo "<script>alert('Account\'s Password Updated.');window.location='../dashboard.php';</script>";
    else:

      echo "<script>alert('Wrong Current Password.');window.location='../dashboard.php';</script>";
    endif;

  break;

  default:

# ->if none of above request happens<-
    echo "<script>alert('Invalid Request Please Try Again.');window.location='../';</script>";
  break;
}
