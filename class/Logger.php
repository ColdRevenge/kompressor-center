<?php

/**
 * Description of Logger
 *
 * @author Kisa
 */
class Logger {

    static public function addLog($user_id, $type, $before, $after) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO log (user_id, type, before, after) VALUES (:user_id, :type, :before, :after)");
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":before", $before, PDO::PARAM_STR);
        $query->bindParam(":after", $after, PDO::PARAM_STR);
        $query->execute();
        return $registry->db->lastInsertId();
    }

}
