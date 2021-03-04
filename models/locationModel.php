<?php

require MODELS . 'entity/Location.php';

class LocationModel extends Model
{
    public function __construct()
    {
        parent::__construct('location', 'Location');
    }
}
