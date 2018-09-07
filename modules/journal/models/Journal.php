<?php

class Journal {

    public function getList($limit = 100) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM `journal` ORDER BY `published_at` DESC LIMIT :limit");
        $query->bindParam(":limit", $limit, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function findByPk($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM `journal` WHERE id = :id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function add($data) {
        $registry = Registry::getInstance();
        $image = $this->_image();
        $published_at = $data['published_at'] ? date('Y-m-d H:i:s', strtotime($data['published_at'])) : date('Y-m-d H:i:s');

        $query = $registry->db->prepare("INSERT INTO journal (`title`, `image` ,`description`,`text`, `meta_title`, `meta_description`, `meta_keywords`, `published_at`, `user_id`)
            VALUES (:title, :image, :description, :text, :meta_title, :meta_description, :meta_keywords, :published_at, :user_id)");
        $query->bindParam(":title", $data['title'], PDO::PARAM_STR, 255);
        $query->bindParam(":description", $data['description'], PDO::PARAM_STR, 1000);
        $query->bindParam(":text", $data['text'], PDO::PARAM_STR);
        $query->bindParam(":meta_title", $data['meta_title'], PDO::PARAM_STR);
        $query->bindParam(":meta_description", $data['meta_description'], PDO::PARAM_STR);
        $query->bindParam(":meta_keywords", $data['meta_keywords'], PDO::PARAM_STR);
        $query->bindParam(":image", $image, PDO::PARAM_STR, 255);
        $query->bindParam(":published_at", $published_at);
        $query->bindParam(":user_id", $registry->user_id, PDO::PARAM_INT, 11);
        $query->execute();

        return $registry->db->lastInsertId();
    }

    public function edit($data, $id) {
        $registry = Registry::getInstance();
        $image = $this->_image();
        $published_at = $data['published_at'] ? date('Y-m-d H:i:s', strtotime($data['published_at'])) : date('Y-m-d H:i:s');

        $query = $registry->db->prepare("UPDATE journal SET `title` = :title, `image` = :image ,`description` = :description, `text` = :text, `meta_title` = :meta_title, `meta_description` = :meta_description, `meta_keywords` = :meta_keywords, `published_at` = :published_at WHERE `id` = :id");
        $query->bindParam(":title", $data['title'], PDO::PARAM_STR, 255);
        $query->bindParam(":description", $data['description'], PDO::PARAM_STR, 1000);
        $query->bindParam(":text", $data['text'], PDO::PARAM_STR);
        $query->bindParam(":meta_title", $data['meta_title'], PDO::PARAM_STR);
        $query->bindParam(":meta_description", $data['meta_description'], PDO::PARAM_STR);
        $query->bindParam(":meta_keywords", $data['meta_keywords'], PDO::PARAM_STR);
        $query->bindParam(":published_at", $published_at);
        $query->bindParam(":image", $image, PDO::PARAM_STR, 255);
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function delete($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM `journal` WHERE `id` = :id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    private function _image() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Uploader");
        Lavra_Loader::LoadClass("Images");
        if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) { //Если пошел запрос на загрузку
            $upload = new Uploader($registry->news_image_dir);

            $upload->setPrefix("journal_" . time() . "_" . rand(0, 100) . "_");
            $upload->isConvertLatinName(true);
            $upload->setMaxSize(1500);

            $upload->addAllowMimeType("image/jpeg");
            $upload->addAllowMimeType("image/gif");
            $upload->addAllowMimeType("image/png");
            $file_name = $upload->upload();

            //Изменение размера иконки, и масштабирование
            $images = new Images();
            $resourse = $images->open($registry->news_image_dir . $file_name);
            $images->setIsConvas(true);
            $file_s = $this->_setFileNameText($file_name, 'small_');
            $images->save($images->ReSize($resourse, 370, 278), $registry->news_image_dir . $file_s, 100);

            $this->uploaded_image = $file_name;
            return $this->uploaded_image;
        } elseif (isset($_POST['uploaded_image']) && $_POST['uploaded_image'] && !empty($_POST['uploaded_image'])) {
            $this->uploaded_image = $_POST['uploaded_image'];
            return $this->uploaded_image;
        }
        return false;
    }

    private function _setFileNameText($file_name, $prefix) {
        Lavra_Loader::LoadClass("Images");
        $images = new Images();
        $file = $images->getType($file_name);
        return $prefix . $file['file'] . $file['type'];
    }

}