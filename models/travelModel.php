<?php

require MODELS . 'entity/Travel.php';

class TravelModel extends Model
{

    public function __construct()
    {
        parent::__construct('travel', 'Travel');
    }

    function getCharactersOnTravel($id)
    {
        $stmt = $this->database->prepare("SELECT c.id, c.name, c.species, c.gender
            FROM character_ c
            INNER JOIN character_travel ch_t ON ch_t.character_id = c.id
            INNER JOIN travel t ON ch_t.travel_id  = t.id
            WHERE t.id = $id");
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
        return $data;
    }
    function getEpisodeTravelInfo ($loc_id)
    {
        $stmt = $this->database->prepare("SELECT e.id, e.name, e.air_date, e.season_no, e.episode_no
            FROM episode e
            INNER JOIN travel t ON e.id = $loc_id");
        try {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $data = $stmt->fetch();

        } catch (PDOException $e) {
            return false;
        }
        return $data;
    }
}