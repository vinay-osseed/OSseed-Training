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

  case 'SignUp':
    if (!$query->userExist('users', $_POST)):
      if ($query->insertQuery('users', $_POST)):
        echo "<script>alert('Account Created Login Now.');window.location='../';</script>";
      endif;
    else:
      echo "<script>alert('Account Already Exist.');window.location='../';</script>";
    endif;
  break;

  case 'SignIn':
    if ($query->loginVerify('users', $_POST)):
        if(setcookie('signInUser', $_POST['userEmailId'], time() + 600, "/") && $query->insertLogQuery('userLogs',$_POST)):
          # ->SetCookie For 10Min From Login Only also Add entry in logs<-
          echo "<script>window.location='../dashboard.php';</script>";
        endif;
    else:
      echo "<script>alert('Wrong Email / Password');window.location='../';</script>";
    endif;
  break;

  case 'SignOut':
    if(setcookie('signInUser', '', time() - 600, "/") && setcookie('signInUserId', '', time() - 600, "/")):
      # ->Delete Saved Cookie<-
      echo "<script>window.location='../';</script>";
    endif;
  break;

  case 'UpdateName':
    if($query->updateNameAndEmailQuery('users',$_POST) && setcookie('signInUser', $_POST['userEmailId'], time() + 600, "/")):
      echo "<script>alert('Account\'s Full Name & Email Updated.');window.location='../dashboard.php';</script>";
    else:
      echo "<script>alert('Invalid Input.');window.location='../dashboard.php';</script>";
    endif;
  break;

  case 'UpdatePassword':
    if($query->updatePasswordQuery('users',$_POST)):
      echo "<script>alert('Account\'s Password Updated.');window.location='../dashboard.php';</script>";
    else:
      echo "<script>alert('Wrong Current Password.');window.location='../dashboard.php';</script>";
    endif;
  break;

  default:
    echo "<script>alert('Invalid Request Please Try Again.');window.location='../';</script>";
  break;
}
