<?php

class Send {

    public function getMails() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT
		*
		FROM xsend_mailer
                GROUP BY email");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function delMailId($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE  FROM xsend_mailer WHERE id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function delMail($email) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE  FROM xsend_mailer WHERE email=:email");
        $query->bindParam(":email", $email, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function addMessageHistiry($subject, $message) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO xsend_history(subject, message) VALUES(:subject, :message) ");
        $query->bindParam(":subject", $subject, PDO::PARAM_STR, 255);
        $query->bindParam(":message", $message, PDO::PARAM_STR);
        $query->execute();
    }

    public function getMessageHistory() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare(" SELECT * FROM xsend_history ORDER BY created DESC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getMessageHistoryId($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM xsend_history WHERE id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    //Запись в базу E-Mail рассылок
    public function insertMails($email, $name, $mail_news, $mail_new_cat) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO xsend_mailer(email, `name`, is_mailer, is_mailer_2) VALUES(:email, :name, :mail_news, :mail_new_cat) ");
        $query->bindParam(":email", $email, PDO::PARAM_STR, 255);
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":mail_news", $mail_news, PDO::PARAM_INT, 1);
        $query->bindParam(":mail_new_cat", $mail_new_cat, PDO::PARAM_INT, 1);
        $query->execute();
    }

    //Запись в базу E-Mail рассылок
    public function setMails($email, $name, $mail_news, $mail_new_cat) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE xsend_mailer SET `name` = :name, is_mailer=:mail_news, is_mailer_2=:mail_new_cat WHERE TRIM(LOWER(email))=TRIM(LOWER(:email)) LIMIT 1");
        $query->bindParam(":email", $email, PDO::PARAM_STR, 255);
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":mail_news", $mail_news, PDO::PARAM_INT, 1);
        $query->bindParam(":mail_new_cat", $mail_new_cat, PDO::PARAM_INT, 1);
        $query->execute();
//        echo "$email, $name, $mail_news, $mail_new_cat";
    }
    public function setActive($id, $name, $mail_news, $mail_new_cat) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE xsend_mailer SET `name` = :name, is_mailer=:mail_news, is_mailer_2=:mail_new_cat WHERE "
                . "id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":mail_news", $mail_news, PDO::PARAM_INT, 1);
        $query->bindParam(":mail_new_cat", $mail_new_cat, PDO::PARAM_INT, 1);
        $query->execute();
    }

    //Проверка в базе на совпадение E-Mail рассылок
    public function stopMails($email) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare(" SELECT COUNT(*) as `count` FROM xsend_mailer WHERE TRIM(UPPER(email)) = TRIM(UPPER(:email)) ");
        $query->bindParam(":email", $email, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ)->count;
    }

}
