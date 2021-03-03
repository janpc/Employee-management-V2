<?php

class Character
{
    public ?int $id;
    public ?string $name;
    public ?string $status;
    public ?string $species;
    public ?string $gender;
    public ?int $originLocId;
    public ?int $lastLocId;

    public function __construct($id = null, $name = null, $species = null, $gender = null, $originLocId = null, $lastLocId = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->species = $species;
        $this->gender = $gender;
        $this->originLocId = $originLocId;
        $this->lastLocId = $lastLocId;
    }
}
