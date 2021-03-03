<?php

class Travel {
    public Int $id;
    public Array $charactersId;
    public Int $episodeId;
    public Location $originLoc;
    public Location $destinationLoc;

    public function __construct($id, $charactersId, $episodeId, $originLoc, $destinationLoc)
    {
        $this->id = $id;
        $this->charactersId = $charactersId;
        $this->episodeId = $episodeId;
        $this->gender = $gender;
        $this->originLoc = $originLoc;
        $this->destinationLoc = $destinationLoc;
    }
}