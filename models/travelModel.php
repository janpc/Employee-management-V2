<?php

require MODELS . 'entity/Travel.php';

class TravelModel extends Model
{

    public function __construct()
    {
        parent::__construct('travel', 'Travel');
    }

}