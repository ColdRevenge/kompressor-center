<?php

class Comments {

    public function getComments($parent_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * 
            FROM comments WHERE is_delete=0 && parent_id = :parent_id && is_active = 1 ORDER BY comments.created DESC");
        $query->bindParam(":parent_id", $parent_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function setActiveComment($param, $comment_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare(" UPDATE comments SET is_active = :param WHERE id = :comment_id ");
        $query->bindParam(":param", $param, PDO::PARAM_INT, 1);
        $query->bindParam(":comment_id", $comment_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setComment($name, $comment, $comment_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare(" UPDATE comments SET comment=:comment, name=:name WHERE id = :comment_id ");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":comment", $comment, PDO::PARAM_STR, 255);
        $query->bindParam(":comment_id", $comment_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function getCommentId($comment_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM comments WHERE id = :comment_id && is_delete=0");
        $query->bindParam(":comment_id", $comment_id, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function addComment($type, $name, $comment, $recommend, $defect, $parent_id) {
        $registry = Registry::getInstance();
        $ip = ip2long($_SERVER['REMOTE_ADDR']);
        $query = $registry->db->prepare("INSERT INTO comments (`type`, `name`, parent_id, created, comment, recommend, defect, ip)
            VALUE (:type, :name, :parent_id, NOW(), :comment, :recommend, :defect, :ip)");
        $query->bindParam(":parent_id", $parent_id, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":comment", $comment, PDO::PARAM_STR);
        $query->bindParam(":recommend", $recommend, PDO::PARAM_STR);
        $query->bindParam(":name", $name, PDO::PARAM_STR);
        $query->bindParam(":defect", $defect, PDO::PARAM_STR);
        $query->bindParam(":ip", $ip, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Возвращает комменты для продуктов
     * @param type $limit
     * @return type 
     */
    public function getLastProductComments($start_date, $end_date) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT products.name as product_name, products.pseudo_dir, comments.*
                 FROM
            comments INNER JOIN products
            ON (products.is_delete = 0 && products.id = comments.parent_id && comments.is_delete=0 && 
            (UNIX_TIMESTAMP(`comments`.created) BETWEEN :start_date AND :end_date)
)
                ORDER BY `comments`.`created` DESC");
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function del($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE comments SET is_delete=1 WHERE id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }

}