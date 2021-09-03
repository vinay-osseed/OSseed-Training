<?php

/* 7->Find next Leap Year */

class year
{
    protected $current_year;
    public function __construct()
    {
        $this->current_year = date('Y');
    }
    public function nxt_leap_yr()
    {
        if ($this->current_year % 4 === 0) {
            echo "{$this->current_year} it's LEAP year.";
        }
        for ($i = 1; $i < 5; $i++) {
            $yr = date('Y', strtotime('+' . $i . ' year'));
            if ($yr % 4 === 0) {
                echo "{$yr} it's LEAP year.";
                break;
            }
        }
    }
}

$year = new year();
$year->nxt_leap_yr();  /* instance of year  */
?>
