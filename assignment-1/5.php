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

/* VinayGawade: 07-09-2021 ->5.Find the Starting Date of Next Week.<- */

class nxtWeekDate{

    public function __construct(){

        # ->strtotime() used to convert String to Date/Time & later print it in d-m-Y format using date()<-
        echo "The Next Week Date:- ".date('d-m-Y',strtotime('next week'))."\n";

    }

}

$newObj = new nxtWeekDate();  # ->instance of nxtWeekDate class<-

?>
