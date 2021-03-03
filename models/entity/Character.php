<?php

class Character
{
    public Int $id;
    public $name;
    public $status;
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
