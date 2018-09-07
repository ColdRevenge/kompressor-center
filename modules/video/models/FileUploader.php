<?php



class FileUploader {
    public function add($file = null, $size = 0,  $name = null, $desc = null, $is_image   = null, $type = null, $category_id = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO files (`file`,`size`, `name`, `desc`, `is_image`, `type`, `created`, `category_id`)
		VALUES (:file, :size, :name, :desc, :is_image, :type, NOW(), :category_id)");
        $query->bindParam(":file", $file, PDO::PARAM_STR, 255);
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":desc", $desc, PDO::PARAM_STR);
        $query->bindParam(":size", $size, PDO::PARAM_INT, 11);
        $query->bindParam(":is_image", $is_image, PDO::PARAM_BOOL,1);
        $query->bindParam(":type", $type, PDO::PARAM_INT,11);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function edit($page_id, $header = null, $text = null, $keyword = null, $desc = null, $pseudo_dir = null) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `pages` SET `header`=:header, `text`=:text, `keyword`=:keyword, `desc`=:desc,
		`pseudo_dir`=:pseudo_dir WHERE is_delete=0 && id=:page_id");
        $query->bindParam(":header", $header, PDO::PARAM_STR, 255);
        $query->bindParam(":text", $text, PDO::PARAM_STR);
        $query->bindParam(":keyword", $keyword, PDO::PARAM_STR, 100);
        $query->bindParam(":desc", $desc, PDO::PARAM_STR, 180);
        $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);
//        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":page_id", $page_id, PDO::PARAM_INT, 11);
        $query->execute();
        print_r($query->errorInfo());
    }

    public function getFiles($type = 0, $category_id = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT id,created, file, name, `desc`, size, is_image FROM files WHERE is_delete = 0 && `type` = :type && (category_id = :category_id || :category_id = 0)");
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

     public function getFileId($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT id,created, file, name, `desc`, size, is_image FROM files WHERE is_delete = 0 && `id` = :id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function del($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `files` SET is_delete = 1 WHERE `id`=:id LIMIT 1");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }
}