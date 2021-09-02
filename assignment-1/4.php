<?php

/* 4->Write a Program to check whether key value exists in the array or not? */

class key_check{
    public function __construct($a,$key){
        if(array_key_exists($key,$a)){

            echo "This '{$key}' Key Exist In Array.\n";

        }else{

            echo "This '{$key}' Key Not Exist In Array.\n";

        }
    }
}
$new=array('one'=>1,'two'=>2,'three'=>3,'four'=>4);
new key_check($new,"four");  /* pass array and key that you want to check as parameter */
new key_check($new,"five");
