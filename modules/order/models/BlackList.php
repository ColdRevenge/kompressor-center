<?php

class BlackList {

    public function addBlackList($user_id, $fio, $email, $phone, $comment) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare(" INSERT INTO black_list (user_id, fio, email, phone, comment) VALUES (:user_id, :fio, :email, :phone, :comment)");
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":fio", $fio, PDO::PARAM_STR, 255);
        $query->bindParam(":email", $email, PDO::PARAM_STR, 255);
        $query->bindParam(":phone", $phone, PDO::PARAM_STR, 255);
        $query->bindParam(":comment", $comment, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function setBlackList($id, $fio, $email, $phone, $comment) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare(" UPDATE black_list SET fio = :fio, email = :email, phone = :phone, comment = :comment WHERE id=:id");
        $query->bindParam(":fio", $fio, PDO::PARAM_STR, 255);
        $query->bindParam(":email", $email, PDO::PARAM_INT, 11);
        $query->bindParam(":phone", $phone, PDO::PARAM_INT, 11);
        $query->bindParam(":comment", $comment, PDO::PARAM_INT, 11);
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function getBlackListId($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM `black_list` WHERE id = :id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getBlackListAll($is_format = 1) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM `black_list`");
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        if ($is_format == 0) {
            return $return;
            ;
        }
        $result = array();
        foreach ($return as $value) {
            if (!empty($value->phone)) {
                $result[] = trim(ltrim($value->phone, ' 8'));
            }
            if (!empty($value->email)) {
                $result[] = trim(($value->email));
            }
        }
        return $result;
        ;
    }

    public function delBlackListId($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM `black_list`  WHERE id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function delBlackList($email, $phone) {
        $phone = "%$phone%";
        $email = "%$email%";
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM `black_list`  WHERE phone LIKE :phone || TRIM(email) LIKE :email");
        $query->bindParam(":email", $email, PDO::PARAM_STR, 255);
        $query->bindParam(":phone", $phone, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ)->count;
    }

    public function getBlackList($email, $phone) {
        $phone = "%$phone%";
        $email = "%$email%";
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM `black_list`  WHERE phone LIKE :phone || TRIM(email) LIKE :email");
        $query->bindParam(":email", $email, PDO::PARAM_STR, 255);
        $query->bindParam(":phone", $phone, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

}
