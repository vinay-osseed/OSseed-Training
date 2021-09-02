<?php

/* 5->Find the Starting Date of Next Week.*/

class next_week_date{
    public function __construct(){
        echo "The Next Week Date:-".date('d-m-Y',strtotime('next week'));
    }
}

new next_week_date();  /* instance of next_week_date  */
