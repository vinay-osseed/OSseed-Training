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

/* VinayGawade: 07-09-2021
    ->3.Write string functions to compare two string :
        1. Without case.
        2. With case
*/

class compareStrings{

    public function __construct($firstString,$secondString,$case=false){ # ->2 parameters are required 1 is optional<-

        if($case):
            # ->Ternary operator used ((condition)? exp1 : exp2;)<-
            echo (strcmp($firstString,$secondString) === 0) ? "{$firstString} And {$secondString} Both Are Equal.(CASE-SENSITIVE)\n" : "{$firstString} And {$secondString} Both Are Not Equal.(CASE-SENSITIVE)\n";
        else:

            echo (strcasecmp($firstString,$secondString) === 0) ? "{$firstString} And {$secondString} Both Are Equal.(CASE-INSENSITIVE)\n" : "{$firstString} And {$secondString} Both Are Not Equal.(CASE-INSENSITIVE)\n";
        endif;

    }

}

$newObj1 = new compareStrings("Vinay Gawade","Vinay Gawade",true);
$newObj2 = new compareStrings("Vinay Gawade","vinay gawade");  # ->3rd parameter $case is optional (Default=false)<-

?>
