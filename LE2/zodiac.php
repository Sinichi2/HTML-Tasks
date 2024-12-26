<?php

class Zodiac{
    public $sign; 
    public $symbol; 
    public $startDate; 
    public $endDate;
    

    public function __construct($sign, $symbol, $startDate, $endDate){

        $zodiacData = this->loadZodiacData(); 
        $monthDay = date()
        $this->sign = $sign;
        $this->symbol = $symbol;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
}

?> 