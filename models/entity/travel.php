<?php

class Travel {
    public Int $id;
    //public Int $episodeId;
    //public Int $originLocId;
    //public Int $destinationLocId;
    //public Episode $episode;
    public Location $originLoc;
    public Location $destinationLoc;

    public function __construct($id, $originLoc, $destinationLoc)
    {
        $this->id = $id;
        $this->originLoc = $originLoc;
        $this->destinationLoc = $destinationLoc;
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