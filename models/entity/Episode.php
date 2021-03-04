<?php

class Episode
{
    public ?int $id;
    public ?string $airDate;
    public ?int $seasonNo;
    public ?int $episodeNo;

    public function __construct($id = null, $airDate = null, $seasonNo = null, $episodeNo = null)
    {
        $this->id = $id;
        $this->airDate = $airDate;
        $this->seasonNo = $seasonNo;
        $this->episodeNo = $episodeNo;
    }
}
