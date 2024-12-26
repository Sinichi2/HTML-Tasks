<?php
include_once 'zodiac.php';

class Person{
    public $firstName; 
    public $lastName;
    public $birthday;
    public $zodiac;

    public function __construct($firstName, $lastName, $birthday){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthday = $birthday; 
        $this->zodiac = new zodiac($birthday);
    }

    public function getFullName(){
        return "{$this->lastName}, {$this->firstName}";
    }
 }
?>