<?php
require MODELS . 'entity/Character.php';
require MODELS . 'entity/CharacterExt.php';
require MODELS . 'entity/Location.php';
require MODELS . 'entity/Episode.php';

class CharacterModel extends Model
{

    public function __construct()
    {
        parent::__construct('character_', 'Character');
    }

    function getExtendedById($id)
    {
        try {
            $stmt = $this->database->prepare("SELECT c.name, c.status, c.species, c.gender, c.id, 
            l_l.dimension as resid_dimension, l_l.loc_type as resid_loc_type,
            l_l.name as resid_name, l_l.id as resid_id,
            o_l.dimension as origin_dimension, o_l.loc_type as origin_loc_type,
            o_l.name as origin_name, o_l.id as origin_id
            FROM character_ c
            INNER JOIN location l_l ON l_l.id = c.last_loc_id
            LEFT OUTER JOIN location o_l ON o_l.id = c.origin_loc_id 
            WHERE c.id = $id");

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $data = $stmt->fetch();

            if(!$data) {
                return false;
            }

            $episodesIn = $this->getEpisodesForCharacter($id);

            $originLoc = new Location($data['origin_id'], $data['origin_name'], $data['origin_loc_type'], $data['origin_dimension']);
            $lastLoc = new Location($data['resid_id'], $data['resid_name'], $data['resid_loc_type'], $data['resid_dimension']);

            $character = new CharacterExt(
                $data['id'], $data['name'], $data['status'], $data['species'], $data['gender'], $originLoc, $lastLoc, $episodesIn
            );
        } catch (PDOException $e) {
            return false;
        }
        return $character;
    }

    function getEpisodesForCharacter($id) {
        $stmt = $this->database->prepare("SELECT e.*
        FROM character_ c
        INNER JOIN character_episode ce ON ce.character_id = c.id 
        INNER JOIN episode e ON e.id = ce.episode_id 
        WHERE c.id = $id");

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $episodesIn = $stmt->fetchAll();

        return array_map(function($episode) {
            return new Episode($episode['id'], $episode['air_date'], $episode['season_no'], $episode['episode_no']);
        }, $episodesIn);

    }

    function getTravelsForCharacter($id) {

        $stmt = $this->database->prepare("SELECT t.*
        FROM character_ c
        INNER JOIN character_travel ct ON ct.character_id = c.id 
        INNER JOIN travel t ON t.id = ct.travel_id 
        WHERE c.id = $id");

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $travelsIn = $stmt->fetchAll();

        return array_map(function($travel) {
            return array();
        }, $travelsIn);
    }
}
