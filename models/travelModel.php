<?php

require MODELS . 'entity/Travel.php';
require MODELS . 'entity/Location.php';
require MODELS . 'entity/Episode.php';
require MODELS . 'entity/CharacterExt.php';

class TravelModel extends Model
{

    public function __construct()
    {
        parent::__construct('travel', 'Travel');
    }
    function getAllTravelExt()
    {
        $stmt = $this->database->prepare("SELECT t.id as travel_no, c.id as charecter_id, c.name, c.species, c.gender, o_l.id as origin_loc_id,
            o_l.dimension as origin_loc_dimension, o_l.loc_type as origin_loc_type,
            o_l.name as origin_loc_name,  d_l.id as des_loc_id,
            d_l.dimension as des_loc_dimension, d_l.loc_type as des_loc_type,
            d_l.name as des_loc_name
            FROM character_ c
            INNER JOIN character_travel ch_t ON ch_t.character_id = c.id
            INNER JOIN travel t ON ch_t.travel_id  = t.id
            INNER JOIN location o_l ON o_l.id = t.origin_loc_id
            INNER JOIN location d_l ON d_l.id = t.target_loc_id"
            );
        try {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $data = $stmt->fetchAll();
            $travels = array();
            foreach ($data as $travel) {
                $originLoc = new Location($travel['origin_loc_id'], $travel['origin_loc_name'], $travel['origin_loc_type'], $travel['origin_loc_dimension']);
                $destinationLoc = new Location($travel['des_loc_id'], $travel['des_loc_name'], $travel['des_loc_type'], $travel['des_loc_dimension']);
                $travel = new Travel ($travel['travel_no'], $originLoc, $destinationLoc);

                /* $character = new CharacterExt(
                $data['id'], $data['name'], $data['status'], $data['species'], $data['gender'], $originLoc, $lastLoc 
            );*/

                array_push($travels, $travel);
            }
            echo "<pre>";
        print_r($travels);
        echo "</pre>";

        } catch (PDOException $e) {
            return false;
        }
        return $travels;
    }

    function getCharactersOnTravel($id)
    {
        $stmt = $this->database->prepare("SELECT t.id as travel_no, c.id as charecter_id, c.name, c.species, c.gender, o_l.id as origin_loc_id,
            o_l.dimension, o_l.loc_type,
            o_l.name,  d_l.id as des_loc_id,
            d_l.dimension, d_l.loc_type,
            d_l.name
            FROM character_ c
            INNER JOIN character_travel ch_t ON ch_t.character_id = c.id
            INNER JOIN travel t ON ch_t.travel_id  = t.id
            INNER JOIN location o_l ON o_l.id = t.origin_loc_id
            INNER JOIN location d_l ON d_l.id = t.target_loc_id"
            );
        try {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $data = $stmt->fetchAll();
            $classData = array();
            foreach ($data as $register) {
                $registerClass = new $this->DTO;
                foreach ($register as $key=>$value) {
                    $camelKey = Converter::snakeToCamelCase($key);
                    $registerClass->$camelKey = $value;    
                }
                array_push($classData, $registerClass);
            }

        } catch (PDOException $e) {
            return false;
        }
        return $classData;
    }

    function getLocationTravelInfo ($loc_id)
    {
        $stmt = $this->database->prepare("SELECT l.id, l.name, l.loc_type, l.dimension
            FROM location l
            INNER JOIN travel t ON l.id = $loc_id");
        try {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $data = $stmt->fetch();

        } catch (PDOException $e) {
            return false;
        }
        $location = new location ($data['id'], $data['name'], $data['loc_type'], $data['dimension']);
        return $location;
    }
    function getEpisodeTravelInfo ($e_id)
    {
        $stmt = $this->database->prepare("SELECT e.id, e.name, e.air_date, e.season_no, e.episode_no
            FROM episode e
            INNER JOIN travel t ON e.id = $e_id");
        try {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $data = $stmt->fetch();

        } catch (PDOException $e) {
            return false;
        }
        $episode = new location ($data['id'], $data['name'], $data['air_date'], $data['season_no'], $data['episode_no']);
        return $episode;
    }
}