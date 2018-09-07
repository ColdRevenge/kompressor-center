<?php

class Rating {

    public function add($type, $voice_id, $voice) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO rating (`type`, `voice_id` ,`voice`, `ip`) VALUES (:type, :voice_id, :voice, INET_ATON(:ip))");
        $query->bindParam("ip", $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR, 255);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":voice_id", $voice_id, PDO::PARAM_INT, 11);
        $query->bindParam(":voice", $voice, PDO::PARAM_INT, 11);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function isVoice($type, $voice_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as count FROM rating WHERE `type` = :type &&  voice_id=:voice_id && ip = INET_ATON(:ip)");
        $query->bindParam("ip", $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR, 255);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":voice_id", $voice_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetch(PDO::FETCH_OBJ)->count;
        return $return;
    }

    /**
     * Возвращет рейтинг
     * @param type $type
     * @param type $voice_id
     * @return type 
     */
    public function getRatingVoiceId($type, $voice_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT (SUM(voice) / COUNT(*)) as rating, COUNT(*) as `count` FROM rating WHERE `type` = :type &&  voice_id=:voice_id");
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":voice_id", $voice_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

}