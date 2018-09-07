<?php

class NewsProduct {

    public function add($news_id, $product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO news_product (news_id, product_id) VALUES (:news_id, :product_id)");
        $query->bindParam(":news_id", $news_id, PDO::PARAM_INT, 11);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function del($news_id, $product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM news_product WHERE news_id=:news_id && product_id=:product_id");
        $query->bindParam(":news_id", $news_id, PDO::PARAM_INT, 11);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function getNewsProducts($news_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT products.* FROM news_product INNER JOIN products ON (news_id = :news_id && product_id=products.id && products.is_delete=0)");
        $query->bindParam(":news_id", $news_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getNewsTypeProducts($product_id, $news_type, $limit) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT news.* FROM news_product  INNER JOIN news ON (product_id=:product_id && news_id = news.id && news.is_delete=0 && news.`type`=:news_type) LIMIT :limit");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":news_type", $news_type, PDO::PARAM_INT, 11);
        $query->bindParam(":limit", $limit, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function setNewsIdProducts($news_id, $old_news_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `news_product` SET news_id=:news_id WHERE `news_id` = :old_news_id");
        $query->bindParam(":old_news_id", $old_news_id, PDO::PARAM_INT, 11);
        $query->bindParam(":news_id", $news_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Для админки выделение чекбоксов
     * @param type $news_id
     * @return int
     */
    public function getSelectedCheckbox($news_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM news_product WHERE news_id = :news_id");
        $query->bindParam(":news_id", $news_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();
        foreach ($return as $key => $value) {
            $result[$value->product_id] = 1;
        }
        return $result;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

