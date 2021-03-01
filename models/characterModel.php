<?php

class CharacterModel extends Model
{
    function getAll()
    {
        try {
            $database = $this->db->connect();
            $stmt = $database->prepare("SELECT * FROM `character_`");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            $database = null;

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            //toDo
        }
    }

    function getById($id)
    {
        $database = $this->db->connect();
        try {
            $stmt = $database->prepare("SELECT * FROM `character_` WHERE id=" . $id);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            $data = $stmt->fetch();
        } catch (PDOException $e) {
            //toDo
        }

        try {
            $stmt = $database->prepare("SELECT * FROM `location` WHERE id=" . $data['origin_loc_id']);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $data['origin_loc'] = $stmt->fetch();
        } catch (PDOException $e) {
            //toDo
        }

        try {
            $stmt = $database->prepare("SELECT * FROM `location` WHERE id=" . $data['last_loc_id']);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $data['last_loc'] = $stmt->fetch();
        } catch (PDOException $e) {
            //toDo
        }

        $database = null;

        return $data;
    }

    function insert($params)
    {
        $database = $this->db->connect();
        $stmt = $database->prepare("INSERT INTO character_ (`name`, `status`, `species`, `gender`, `origin_loc_id`, `last_loc_id`) VALUES (:n, :s , :species, :gender, :origin_loc_id, :last_loc_id)");

        try {
            $stmt->bindParam(':n', $params[0]);
            $stmt->bindParam(':s', $params[1]);
            $stmt->bindParam(':species', $params[2]);
            $stmt->bindParam(':gender', $params[3]);
            $stmt->bindParam(':origin_loc_id', $params[4]);
            $stmt->bindParam(':last_loc_id', $params[5]);
            $stmt->execute();
            $database = null;
        } catch (PDOException $e) {
            //toDo
        }
    }

    function update($params)
    {
        $database = $this->db->connect();
        $stmt = $database->prepare("UPDATE character_ SET `name` = :n, `status` = :s,`species` = :species, `gender` = :gender, `origin_loc_id` = :origin_loc_id, `last_loc_id` = :last_loc_id WHERE id=:id");

        try {
            $stmt->bindParam(':n', $params[1]);
            $stmt->bindParam(':s', $params[2]);
            $stmt->bindParam(':species', $params[3]);
            $stmt->bindParam(':gender', $params[4]);
            $stmt->bindParam(':origin_loc_id', $params[5]);
            $stmt->bindParam(':last_loc_id', $params[6]);
            $stmt->bindParam(':id', $params[0]);
            $stmt->execute();
            $database = null;
        } catch (PDOException $e) {
            //toDo
        }
    }

    function delete($id)
    {
        $database = $this->db->connect();
        $stmt = $database->prepare("DELETE FROM character_ WHERE id=" . $id);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            //toDo
        }

        $database = null;
    }
}
