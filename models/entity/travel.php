<?php

class Travel {
    public ?Int $id;
    //public Int $episodeId;
    //public Int $originLocId;
    //public Int $destinationLocId;
    public ?Episode $episode;
    public ?Location $originLoc;
    public ?Location $destinationLoc;
    public ?array $charactersTraveling = array();

    public function __construct($id = null, $originLoc = null, $destinationLoc = null, $episode = null)
    {
        $this->id = $id;
        $this->originLoc = $originLoc;
        $this->destinationLoc = $destinationLoc;
        $this->episode = $episode;
    }

    public function setCharacterOnTravel ($character) {
        array_push($this->charactersTraveling, $character);
    }
/* 
    public function getOriginLoc($id_loc)
    {
        $this->id = $id;
        $this->episodeId = $episodeId;
        $this->originLoc = $originLoc;
        $this->destinationLoc = $destinationLoc;
    } */
}