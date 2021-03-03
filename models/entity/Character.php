<?php

//https://web.archive.org/web/20140625191431/https://developers.google.com/speed/articles/optimizing-php
class Character {
    public Int $id;
    public $name;
    public $species;
    public $gender;
    public $originLocId;
    public $lastLocId; 

    public function __construct($id = -1, $name = "", $species = "", $gender = "", $originLocId = -1, $lastLocId = -1) 
    {
        $this->id = $id;
        $this->name = $name;
        $this->species = $species;
        $this->gender = $gender;
        $this->originLocId = $originLocId;
        $this->lastLocId = $lastLocId;
    }

}