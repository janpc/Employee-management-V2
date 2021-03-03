<?php

class Location
{
    public Int $id;
    public String $name;
    public String $locType;
    public String $dimension;

    public function __construct($id = -1, $name = "", $locType = "", $dimension = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->locType = $locType;
        $this->dimension = $dimension;
    }
}
