<?php

class Location
{
    public ?int $id;
    public ?string $name;
    public ?string $locType;
    public ?string $dimension;

    public function __construct($id = null, $name = null, $locType = null, $dimension = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->locType = $locType;
        $this->dimension = $dimension;
    }
}
