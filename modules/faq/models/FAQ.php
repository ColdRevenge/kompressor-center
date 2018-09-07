<?php

class FAQ {

    public function add($subject, $question = null, $answer = null, $is_read = 0, $order = 0, $fio = null, $mail = null) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO faq (`question`, `answer`, created, is_read, `order`, fio, mail, `subject`) VALUES (:question, :answer, NOW(), :is_read, :order, :fio, :mail, :subject)");
        $query->bindParam(":question", $question, PDO::PARAM_STR);
        $query->bindParam(":answer", $answer, PDO::PARAM_STR);
        $query->bindParam(":fio", $fio, PDO::PARAM_STR, 255);
        $query->bindParam(":mail", $mail, PDO::PARAM_STR, 255);
        $query->bindParam(":subject", $subject, PDO::PARAM_STR, 255);
        $query->bindParam(":is_read", $is_read, PDO::PARAM_INT, 11);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        return $query->execute();
    }

    /**
     * Помечает сообщение как прочтенное
     * @param <type> $id
     * @param <type> $question
     * @param <type> $answer
     */
    public function setIsRead($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `faq` SET is_read = 1 WHERE is_delete=0 && id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Помечает все сообщения как прочтенные
     * @param <type> $id
     * @param <type> $question
     * @param <type> $answer
     */
    public function setAllIsRead() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `faq` SET is_read = 1 WHERE is_delete=0 && is_read = 0");
        $query->execute();
    }

    public function edit($id, $subject, $question = null, $answer = null, $order = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `faq` SET `subject`=:subject, `order`=:order, `question`=:question, `answer`=:answer WHERE is_delete=0 && id=:id");
        $query->bindParam(":question", $question, PDO::PARAM_STR);
        $query->bindParam(":answer", $answer, PDO::PARAM_STR);
        $query->bindParam(":subject", $subject, PDO::PARAM_STR, 255);
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function getQuestions() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT fio,subject,mail,id,question,`order`,answer,DATE_FORMAT(faq.created, '%d.%m.%Y %H:%i:%s') as created FROM faq WHERE faq.is_delete = 0 ORDER BY `order` ASC, created DESC");
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
        $query = $registry->db->prepare("SELECT id,`subject`,question,answer,`order`,DATE_FORMAT(faq.created, '%d.%m.%Y %H:%i:%s') as created FROM faq WHERE faq.is_delete = 0 && id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getMaxOrder() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT MAX(`order`) as max FROM faq WHERE faq.is_delete = 0 LIMIT 1");
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ)->max;
    }

    public function del($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `faq` SET is_delete=1 WHERE `faq`.`id` = :id LIMIT 1");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }

}