<?php
/* 6->Print the following Output
    ---> Second Saturday of December, 2007: 12-08-2007
    ---> Last Friday of November, 2007: 11-30-2007
*/

class str_to_date
{
    public function __construct(){
        $date1='Second Saturday of December, 2007';
        $date2='Last Friday of November, 2007';
        echo "{$date1} :".date("m-d-Y",strtotime(str_replace(',','',$date1)))."\n";
        echo "{$date2} :".date("m-d-Y",strtotime(str_replace(',','',$date2)))."\n";
    }
}

new str_to_date();  /* instance of str_to_date  */
