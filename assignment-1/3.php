<?php

/*
3->Write string functions to compare two string :
    1. Without case.
    2. With case
*/

class compare{
    public function __construct($str_fst,$str_snd,$case=false){
        if($case){

            echo (strcmp($str_fst,$str_snd)===0)? "{$str_fst} And {$str_snd} Both Are Equal.(CASE-SENSITIVE)\n":"{$str_fst} And {$str_snd} Both Are Not Equal.(CASE-SENSITIVE)\n";

        }else{

            echo (strcasecmp($str_fst,$str_snd)===0)? "{$str_fst} And {$str_snd} Both Are Equal.(CASE-INSENSITIVE)\n":"{$str_fst} And {$str_snd} Both Are Not Equal.(CASE-INSENSITIVE)\n";

        }
    }
}
new compare("Vinay Gawade","vinay gawade");  /* 3rd parameter $case is Options (Default=false) */
new compare("Vinay Gawade","Vinay Gawade",true);
?>
