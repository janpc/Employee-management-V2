<?php

class EpisodeModel extends Model
{
    function getAll()
    {
        try {
            $database = $this->db->connect();
            $stmt = $database->prepare("SELECT * FROM episode");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return false;
        }
    }

    function getById($id)
    {
        $database = $this->db->connect();
        try {
            $stmt = $database->prepare("SELECT * FROM episode WHERE id=$id");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            $data = $stmt->fetch();
        } catch (PDOException $e) {
            return false;
        }

        return $data;
    }

    function insert($params)
    {
        $database = $this->db->connect();
        $stmt = $database->prepare("INSERT INTO episode (`name`, `air_date`, `season_no`, `episode_no`) VALUES (:n, :a_d , :s_n, :e_n)");

        try {
            $stmt->bindParam(':n', $params['name']);
            $stmt->bindParam(':a_d', $params['air_date']);
            $stmt->bindParam(':s_n', $params['season_no']);
            $stmt->bindParam(':e_n', $params['episode_no']);
            $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    function update($params)
    {
        $database = $this->db->connect();
        $stmt = $database->prepare("UPDATE episode SET `name` = :n, `air_date` = :a_d,`season_no` = :s_n, `episode_no` = :e_n WHERE id=:id");

        try {
            $stmt->bindParam(':n', $params['name']);
            $stmt->bindParam(':a_d', $params['air_date']);
            $stmt->bindParam(':s_n', $params['season_no']);
            $stmt->bindParam(':e_n', $params['episode_no']);
            $stmt->bindParam(':id', $params['id']);
            $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    function delete($id)
    {
        $database = $this->db->connect();
        $stmt = $database->prepare("DELETE FROM episode WHERE id=$id");
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
}
