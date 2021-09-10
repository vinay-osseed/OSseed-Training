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
include "config.php";
/* VinayGawade: 09-09-2021 ->this class for executes quries for specific tables on database.<- */

/* VinayGawade: 09-09-2021 ->md5() used for password insertion and selection during queries.<- */
class runQuery{

# ->Here's the Select query method<-
  function selectAllQuery($tableName = 'users', $colName = '*',$email){

    if($tableName == 'users'){

      $result = dbConnect()->prepare("SELECT {$colName} FROM {$tableName} WHERE userEmailId='{$email}';");
      $result->execute();
      # ->Fetch The Assoicate Data from the 'users' table and return results.<-
      $data = $result->fetchAll(PDO::FETCH_ASSOC);
    }else{

      $result = dbConnect()->prepare("SELECT {$colName} FROM {$tableName} WHERE loggedUserName='{$email}';");
      $result->execute();
      # ->Fetch The Assoicate Data from the 'userLogs' table and return results.<-
      $data = $result->fetchAll(PDO::FETCH_ASSOC);
    }

    return $data; # ->Return Data in associative array<-
  }

# ->Here's the Insert query method for 'users' table<-
  function insertQuery($tableName = 'users', $data){

      $result = dbConnect()->exec("INSERT INTO {$tableName} VALUES (NULL, '{$data['userFullName']}', '{$data['userEmailId']}', '" . md5($data['userPassword']) . "', CURRENT_TIMESTAMP);");
    return ($result === 1) ? true : false; # ->if exec() returns 1 then data inserted in 'users' table successfully done<-
  }

# ->Here's the Insert query method 'userLogs' table<-
  function insertLogQuery($tableName = 'userLogs', $data){

      $result = dbConnect()->exec("INSERT INTO {$tableName} VALUES (NULL, '{$data['userEmailId']}', DEFAULT, CURRENT_TIMESTAMP);");
    return ($result === 1) ? true : false; # ->if exec() returns 1 then data inserted in 'usesLogs' table successfully done<-
  }

# ->Here's the User checking method in 'users' table<-
  function userExist($tableName = 'users', $data){

    # ->here check the user is wxist or not the basis of Email & user full name<-
      $statement = dbConnect()->prepare("SELECT * FROM {$tableName} WHERE userFullName='{$data['userFullName']}' AND userEmailId='{$data['userEmailId']}';");
      $statement->execute();
    return ($statement->rowCount() === 1) ? true : false; # ->by checking Row Value if it's equals to 1 then user found in 'users' table<-
  }

# ->Here's the method which is similar to userExist() but for Signin purpose<-
  function loginVerify($tableName = 'users', $data){

      $statement = dbConnect()->prepare("SELECT * FROM {$tableName} WHERE userEmailId='{$data['userEmailId']}' AND userPassword='" . md5($data['userPassword']) . "';");
      $statement->execute();
    return ($statement->rowCount() === 1) ? true : false;
  }

# ->Here's the Update query method for Email & full name in 'users' table<-
  function updateNameAndEmailQuery($tableName = 'users', $data){

    # ->update the existing value with the help of user's id from table<-
      $statement = dbConnect()->prepare("UPDATE {$tableName} SET userFullName = '{$data['userFullName']}', userEmailId = '{$data['userEmailId']}' WHERE id = {$_COOKIE['signInUserId']};");
      $statement->execute();
    return ($statement->rowCount() > 0) ? true : false; # ->if query effects more than 0 rows then execution get successfully<-
  }

# ->Here's the Update query method for Password in 'users' table<-
  function updatePasswordQuery($tableName = 'users', $data){

    # ->update the existing value with the help of user's id and current password from table<-
      $statement = dbConnect()->prepare("UPDATE {$tableName} SET userPassword = '".md5($data['newConfirmPassword'])."' WHERE id = {$_COOKIE['signInUserId']} AND userPassword = '".md5($data['currentPassword'])."';");
      $statement->execute();
    return ($statement->rowCount() > 0) ? true : false;
  }

}

?>
