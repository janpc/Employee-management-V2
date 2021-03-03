<?php
require MODELS . 'entity/Character.php';
require MODELS . 'entity/CharacterExt.php';
require MODELS . 'entity/Location.php';

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
            INNER JOIN location o_l ON o_l.id = c.origin_loc_id 
            WHERE c.id = $id");

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $data = $stmt->fetch();

            $originLoc = new Location($data['origin_id'], $data['origin_name'], $data['origin_loc_type'], $data['origin_dimension']);
            $lastLoc = new Location($data['resid_id'], $data['resid_name'], $data['resid_loc_type'], $data['resid_dimension']);

            $character = new CharacterExt(
                $data['id'],
                $data['name'],
                $data['species'],
                $data['gender'],
                $originLoc,
                $lastLoc
            );
        } catch (PDOException $e) {
            return false;
        }
        return $character;
    }
}
