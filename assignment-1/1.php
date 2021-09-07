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

  /* VinayGawade: 07-09-2021 ->1.Write program with oops like class objects inheritance abstract class.<- */

  abstract class games{
       # ->abstract class<-
      abstract public function getType();
  }
  class chess extends games{
      # ->normal class accessing 1 method from abstract class games<-
      protected $type;
      public function __construct($type){
          $this->type = $type;
      }

      public function getType(){
          echo "Game Type is {$this->type}.\n";
      }
  }

  $chess = new chess("indoor");  # ->instance of chess class<-
  $chess->getType();
?>
