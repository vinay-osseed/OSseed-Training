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

class runQuery{

  function selectAllQuery($tableName = 'users', $colName = '*',$email){
    if($tableName == 'users'){
      $result = dbConnect()->prepare("SELECT {$colName} FROM {$tableName} WHERE userEmailId='{$email}';");
      $result->execute();
      $data = $result->fetchAll(PDO::FETCH_ASSOC);
    }else{
      $result = dbConnect()->prepare("SELECT {$colName} FROM {$tableName} WHERE loggedUserName='{$email}';");
      $result->execute();
      $data = $result->fetchAll(PDO::FETCH_ASSOC);
    }
    return $data;
  }

  function insertQuery($tableName = 'users', $data){
      $result = dbConnect()->exec("INSERT INTO {$tableName} VALUES (NULL, '{$data['userFullName']}', '{$data['userEmailId']}', '" . md5($data['userPassword']) . "', CURRENT_TIMESTAMP);");
    return ($result === 1) ? true : false;
  }

  function insertLogQuery($tableName = 'userLogs', $data){
      $result = dbConnect()->exec("INSERT INTO {$tableName} VALUES (NULL, '{$data['userEmailId']}', DEFAULT, CURRENT_TIMESTAMP);");
    return ($result === 1) ? true : false;
  }

  function userExist($tableName = 'users', $data){
      $statement = dbConnect()->prepare("SELECT * FROM {$tableName} WHERE userFullName='{$data['userFullName']}' AND userEmailId='{$data['userEmailId']}';");
      $statement->execute();
    return ($statement->rowCount() === 1) ? true : false;
  }

  function loginVerify($tableName = 'users', $data){
      $statement = dbConnect()->prepare("SELECT * FROM {$tableName} WHERE userEmailId='{$data['userEmailId']}' AND userPassword='" . md5($data['userPassword']) . "';");
      $statement->execute();
    return ($statement->rowCount() === 1) ? true : false;
  }

  function updateNameAndEmailQuery($tableName = 'users', $data){
      $statement = dbConnect()->prepare("UPDATE {$tableName} SET userFullName = '{$data['userFullName']}', userEmailId = '{$data['userEmailId']}' WHERE id = {$_COOKIE['signInUserId']};");
      $statement->execute();
    return ($statement->rowCount() > 0) ? true : false;
  }

  function updatePasswordQuery($tableName = 'users', $data){
      $statement = dbConnect()->prepare("UPDATE {$tableName} SET userPassword = '".md5($data['newConfirmPassword'])."' WHERE id = {$_COOKIE['signInUserId']} AND userPassword = '".md5($data['currentPassword'])."';");
      $statement->execute();
    return ($statement->rowCount() > 0) ? true : false;
  }
}

?>
