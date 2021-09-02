<?php

// 2-> Write a Program to replace, (comma) with * 'This,is,training'. Use array/string functions.

class replace {
    public function __construct($that,$withthis,$sentence,$method=1)
    {
        if($method===1){
           echo "By Method-1:-\n".str_replace($that,$withthis,$sentence)."\n";
        }
        if($method===2){
            echo "By Method-2:-\n".implode($withthis,explode($that,$sentence))."\n";
        }
        if($method>2){
            echo "\nInvalid 4th Parameter Please Input 1 or 2 only.\n";
        }
    }
}
new replace(",","*","This,is,training",2);  /*4rth parameter $method is Options (default=1) */