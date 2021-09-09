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
# ->Get Connected to Database Here. one Configuration File<-
function dbConnect(){
    try {
          $serverName = "localhost";
          $userName = "admin";
          $passWord = "Admin@123";
          $dataBase = "systemDB";
              $conn = new PDO("mysql:host=$serverName;dbname=$dataBase;charset=UTF8", $userName, $passWord);
              # ->set the PDO error mode to exception<-
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              return $conn;
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }
?>
