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

  /* VinayGawade: 07-09-2021 ->2.Write a Program to replace, (comma) with * 'This,is,training'. Use array/string functions.<- */

  class replaceString {

      public function __construct($that,$withThis,$sentence,$method=1){ # ->constructor takes 3 required parameters $ 1 optional<-

          if($method === 1):
              echo "By Method-1:-\n".str_replace($that,$withThis,$sentence)."\n";
          endif;

          if($method === 2):
              echo "By Method-2:-\n".implode($withThis,explode($that,$sentence))."\n";
          endif;

          if($method > 2):
              echo "\nInvalid 4th Parameter Please Input 1 or 2 only.\n";
          endif;

      }

  }

  $newObj = new replaceString(",","*","This,is,training");  # ->4rth parameter $method is Optional (default=1)<-
