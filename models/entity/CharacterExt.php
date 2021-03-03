<?php

class CharacterExt
{
    public Int $id;
    public String $name;
    public String $species;
    public String $gender;
    public Location $originLoc;
    public Location $lastLoc;

    public function __construct($id = -1, $name = "", $species = "", $gender = "", $originLoc = "", $lastLoc = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->species = $species;
        $this->gender = $gender;
        $this->originLoc = $originLoc;
        $this->lastLoc = $lastLoc;
    }
}
