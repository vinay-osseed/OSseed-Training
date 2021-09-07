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

/* VinayGawade: 07-09-2021 ->4.Write a Program to check whether key value exists in the array or not?<- */

class keyCheck{

    public function __construct($arr,$key){ # ->Both parameters are required<-

        if(array_key_exists($key,$arr)):# ->array_key_exists() used for checking key in array<-

            echo "This '{$key}' Key Exist In Array.\n";
        else:

            echo "This '{$key}' Key Not Exist In Array.\n";
        endif;

    }
}

$newArray=array('one' => 1,'two' => 2,'three' => 3,'four' => 4);

new keyCheck($newArray,"four");  # ->pass array & key as parameter that you want to check<-
new keyCheck($newArray,"five");

?>
