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
->6.Print the following Output<-
    ->Second Saturday of December, 2007: 12-08-2007
    ->Last Friday of November, 2007: 11-30-2007
*/

class stringsToDate{
    private $date_1, $date_2;

    public function __construct(){
        # ->initiate variable with String<-
          $this->date_1 = 'Second Saturday of December, 2007';
          $this->date_2 = 'Last Friday of November, 2007';

          # ->Here we just print that variable<-
          # ->Then remove ',' using str_replace() to avoid wrong output<-
          # ->Finally convert that string to date/time using strtotime() in m-d-Y format of date()<-
        echo "{$this->date_1} :".date("m-d-Y",strtotime(str_replace(',','',$this->date_1)))."\n";
        echo "{$this->date_2} :".date("m-d-Y",strtotime(str_replace(',','',$this->date_2)))."\n";

    }

}

$newObj = new stringsToDate();  /* instance of stringsToDate  */

?>
