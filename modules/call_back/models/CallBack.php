<?php

class CallBack {
    public function add($name, $phone, $email, $number, $subject, $message) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO call_back (`created`, name, phone, email, `number`, subject, message)
		VALUES (NOW(), :name, :phone, :email, :number, :subject, :message)");

        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":phone", $phone, PDO::PARAM_STR, 255);
        $query->bindParam(":email", $email, PDO::PARAM_STR, 255);
        $query->bindParam(":number", $number, PDO::PARAM_STR, 255);
        $query->bindParam(":subject", $subject, PDO::PARAM_STR, 255);
        $query->bindParam(":message", $message, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function getRequests($start_date, $end_date) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM call_back
                WHERE is_delete = 0 && UNIX_TIMESTAMP(created) >= :start_date && UNIX_TIMESTAMP(created) <= :end_date ORDER BY  created DESC");
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function del($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `call_back` SET is_delete = 1 WHERE is_delete=0 && id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }
}