<?php

class Banners {

    public function edit($img_id, $link, $short_desc = null) {
        $registry = Registry::getInstance();
        //
        $query1 = $registry->db->prepare("DELETE FROM `banners_desc` WHERE file_id = :img_id LIMIT 1");
        $query1->bindParam(":img_id", $img_id, PDO::PARAM_INT, 11);
        $query1->execute();
        
        $query = $registry->db->prepare("INSERT INTO `banners_desc` (link, short_desc, file_id) VALUES (:link, :short_desc, :img_id)");
        $query->bindParam(":link", $link, PDO::PARAM_STR, 255);
        $query->bindParam(":short_desc", $short_desc, PDO::PARAM_STR, 255);
        $query->bindParam(":img_id", $img_id, PDO::PARAM_INT, 11);
        $query->execute();
    } 
    
    public function geBannerDesc($img_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM banners_desc  WHERE file_id = :img_id LIMIT 1");
        $query->bindParam(":img_id", $img_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function geBannerDescAll() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM banners_desc "); 
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();
        foreach ($return as  $value) {
            $result[$value->file_id] = $value;
        }
        return $result;
    }
}