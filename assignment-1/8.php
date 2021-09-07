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
    ->8.Write example for functions<-
      ->array_merge
      ->implode
      ->explode
      ->String functions
*/

class example{

    protected $arrray_1 = array('ONE','TWO','THREE');
    protected $arrray_2 = array(1,2,3);
    protected $str = 'ONE TWO THREE';

    function arrayMergeExample(){
      # ->display formated array of array_merge()<-
        print_r(array_merge($this->arrray_1,$this->arrray_2));
    }

    function implodeExample(){
      # ->Print joined string with ',' using implode()<-
        echo "\n".implode(",",$this->arrray_1)."\n";
    }

    function explodeExample(){
      # ->print formated array of splited string with ' '(whitespace) using explode()<-
        print_r(explode(" ",$this->str));
    }

    function stringFunctions(){
        # ->combine array elements using join() with ' '(whitespace)<-
        echo "\n".join(" ",$this->arrray_1)."\n";

        # ->convert UPPERCASE string to lowercase string using strtolower()<-
        echo "\n".strtolower($this->str)."\n";

        # ->count the number of words in string using str_word_count()<-
        echo "\nWord Count: ".str_word_count($this->str)."\n";

        # ->print formated array of separated each letter of string using str_split()<-
        print_r(str_split($this->str));

        # ->print reverse string using strrev()<-
        echo "\nReverse: ".strrev($this->str)."\n";
    }

}

$example = new example();

$example->arrayMergeExample(); # ->Example Of array_merge function<-

$example->implodeExample(); # ->Example Of implode function<-

$example->explodeExample(); # ->Example Of explode function<-

$example->stringFunctions(); # ->Example Of String functions<-

?>
