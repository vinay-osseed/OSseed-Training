<?php

/* 8->. Write example for functions
        array_merge
        implode
        explode
        String functions
*/

class example {

    protected $a=array('ONE','TWO','THREE');
    protected $b=array(1,2,3);
    protected $str='ONE TWO THREE';

    function am(){
        print_r(array_merge($this->a,$this->b));
    }

    function imp(){
        echo "\n".implode(",",$this->a)."\n";
    }

    function exp(){
        print_r(explode(" ",$this->str));
    }

    function str_fun(){
        echo "\n".join(" ",$this->a)."\n";
        echo "\n".strtolower($this->str)."\n";
        echo "\nWord Count: ".str_word_count($this->str)."\n";
        print_r(str_split($this->str));
        echo "\nReverse: ".strrev($this->str)."\n";
    }
}

$example =new example();

$example->am(); /* Example Of array_merge function */
$example->imp(); /* Example Of implode function */
$example->exp(); /* Example Of explode function */
$example->str_fun(); /* Example Of String function */