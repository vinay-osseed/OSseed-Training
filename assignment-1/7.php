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

  /* VinayGawade: 07-09-2021 ->7.Find next Leap Year<- */


class year{
    protected $current_year;

    public function __construct(){
      # ->intiate $current_year using date()<-
        $this->current_year = date('Y');
    }

    private function isLeap($yr) : bool{
      # ->Check Year is Leap or Not<-
      return ($yr % 4 === 0 && $yr % 100 !== 0 | $yr % 400 === 0) ? true : false;
    }

    public function nxtLeapYear(){

        foreach (range($this->current_year,$this->current_year+3) as $yr) {
          # ->fetch current and next 3 year for check.(incase current year in not leap year)<-

          if ($this->isLeap($yr)): # ->called isLeap() to check year<-
              echo "{$yr} it's LEAP year."; break;
          endif;

        }

    }

}

$year = new year(); # ->instance of year<-
$year->nxtLeapYear();  # ->called nxtLeapYear() for find next leap year<-

?>
