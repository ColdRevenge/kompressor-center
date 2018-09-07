<?php

class Metro {

    public function addStantion($name) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare(" INSERT INTO metro (name, parent_id, is_delete) VALUES (:name, 0, 0) ");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function updateStantion($name, $stantion_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare(" UPDATE metro SET name = :name WHERE id = :stantion_id ");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":stantion_id", $stantion_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function getStantions() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare(" SELECT * FROM metro WHERE is_delete = '0' ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getStantionId($stantion_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare(" SELECT * FROM metro WHERE id = :stantion_id && is_delete = '0' ");
        $query->bindParam(":stantion_id", $stantion_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getStantionsName($name) {
        $registry = Registry::getInstance();
        if ($name) {
            $name = "%$name%";
        }
        $query = $registry->db->prepare(" SELECT * FROM metro WHERE name LIKE :name && is_delete = '0' ");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function isStantions($name) {
        $registry = Registry::getInstance();
        if ($name)
            $name = "%$name%";
        $query = $registry->db->prepare(" SELECT COUNT(*) AS `count` FROM metro WHERE name LIKE :name && is_delete = '0' ");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->execute();
        $return = $query->fetch(PDO::FETCH_OBJ)->count;

        if ($return) {
            return true;
        } else {
            return false;
        }
    }

    public function delStantion($stantion_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare(" UPDATE metro SET is_delete = '1' WHERE id = :stantion_id ");
        $query->bindParam(":stantion_id", $stantion_id, PDO::PARAM_INT, 1);
        $query->execute();
    }

}
