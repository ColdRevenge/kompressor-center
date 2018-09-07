<?php

class Opinion {

    public function add($date, $name, $profession, $text, $page_id, $product_id, $is_active) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO opinion (created, `date`, name, profession, text, page_id, product_id, is_active) VALUES (NOW(), :date, :name, :profession, :text, :page_id, :product_id, :is_active)");


        $query->bindParam(":date", $date, PDO::PARAM_INT, 11);
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":profession", $profession, PDO::PARAM_STR, 255);
        $query->bindParam(":text", $text, PDO::PARAM_STR);
        $query->bindParam(":page_id", $page_id, PDO::PARAM_INT, 11);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":is_active", $is_active, PDO::PARAM_INT, 11);
        return $query->execute();
    }

    public function getActiveLastOpinion() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM opinion WHERE opinion.is_active = 1 && opinion.is_delete = 0 ORDER BY `date` DESC, created DESC");
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
	
	public function getActiveLastOpinion_toSite() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM opinion WHERE opinion.is_active = 1 && opinion.is_delete = 0 ORDER BY `date` DESC, created DESC LIMIT 1");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
	
    public function edit($id, $date, $name, $profession, $text, $page_id, $product_id, $is_active) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `opinion` SET `date` = :date, name = :name, profession = :profession, `text` = :text, page_id = :page_id, product_id = :product_id, is_active = :is_active WHERE is_delete=0 && id=:id");
        $query->bindParam(":date", $date, PDO::PARAM_INT, 11);
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":profession", $profession, PDO::PARAM_STR, 255);
        $query->bindParam(":text", $text, PDO::PARAM_STR);
        $query->bindParam(":page_id", $page_id, PDO::PARAM_INT, 11);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":is_active", $is_active, PDO::PARAM_INT, 11);
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }



    public function setActive($id, $is_active) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `opinion` SET is_active = :is_active WHERE is_delete=0 && id=:id");
        $query->bindParam(":is_active", $is_active, PDO::PARAM_INT, 11);
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function getActiveOpinion() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM opinion WHERE opinion.is_active = 1 && opinion.is_delete = 0 ORDER BY `date` DESC, created DESC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getQuestions() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM opinion WHERE opinion.is_delete = 0 ORDER BY `date` DESC, created DESC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Читает страницу по id или псевдопапке
     * @param <type> $page_id
     * @param <type> $pseudo_dir
     * @return <type>
     */
    public function getQuestion($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM opinion WHERE opinion.is_delete = 0 && id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function del($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `opinion` SET is_delete=1 WHERE `opinion`.`id` = :id LIMIT 1");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }

}