<?php

require MODELS . 'entity/Episode.php';

class EpisodeModel extends Model
{
    public function __construct()
    {
        parent::__construct('episode', 'Episode');

    }
}
