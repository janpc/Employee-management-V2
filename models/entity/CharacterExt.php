<?php

class CharacterExt
{
    public ?int $id;
    public ?string $name;
    public ?string $status;
    public ?string $species;
    public ?string $gender;
    public ?Location $originLoc;
    public ?Location $lastLoc;
    public ?Array $episodes;
    public ?Array $travels;

    public function __construct(
        $id = null, 
        $name = null, 
        $status = null, 
        $species = null, 
        $gender = null, 
        $originLoc = null, 
        $lastLoc = null,
        $episodes = null,
        $travels = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
        $this->species = $species;
        $this->gender = $gender;
        $this->originLoc = $originLoc;
        $this->lastLoc = $lastLoc;
        $this->episodes = $episodes;
        $this->travels = $travels;
    }
}
