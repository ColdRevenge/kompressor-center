<?php

class Files {

    public function add($file, $size, $name, $desc, $is_image, $resize_type, $type, $upload_dir_type, $width, $height, $category_id, $page_id, $file_id, $order) {
        $registry = Registry::getInstance();

        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("INSERT INTO files (`file`,`resize_type`,`size`, `name`, `desc`, `is_image`, `type`, upload_dir_type, `created`, category_id, width, height, page_id, file_id, `order`)
		VALUES (:file,:resize_type, :size, :name, :desc, :is_image, :type, :upload_dir_type, NOW(), :category_id, :width, :height,  :page_id, :file_id, :order)");
        $query->bindParam(":file", $file, PDO::PARAM_STR, 255);
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":desc", $desc, PDO::PARAM_STR);
        $query->bindParam(":size", $size, PDO::PARAM_INT, 11);
        $query->bindParam(":width", $width, PDO::PARAM_INT, 11);
        $query->bindParam(":height", $height, PDO::PARAM_INT, 11);
        $query->bindParam(":is_image", $is_image, PDO::PARAM_BOOL, 1);
        $query->bindParam(":resize_type", $resize_type, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 5);
        $query->bindParam(":upload_dir_type", $upload_dir_type, PDO::PARAM_INT, 5);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":page_id", $page_id, PDO::PARAM_INT, 11);
        $query->bindParam(":file_id", $file_id, PDO::PARAM_INT, 11);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    private function _setSortOrder($current_order, $file_id, $next_order, $next_id) {

        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Files');

        /* Меняем сортировку */
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `files` SET `order`=:order WHERE is_delete=0 && (id=:id || file_id=:id)");
        $query->bindParam(":order", $current_order, PDO::PARAM_INT, 11);
        $query->bindParam(":id", $next_id, PDO::PARAM_INT, 11);
        $query->execute();
        $query = $registry->db->prepare("UPDATE `files` SET `order`=:order WHERE is_delete=0 && (id=:id || file_id=:id)");
        $query->bindParam(":order", $next_order, PDO::PARAM_INT, 11);
        $query->bindParam(":id", $file_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setRightOrder($page_id, $type, $file_id) {
        $files = $this->_getFilesOrder($type, $page_id);
        $current_i = 0;
        $i = 0;
        $sort_files = array();
        foreach ($files as $key => $value) {
            $i++;
            $sort_files[$i] = $key;
            if ($file_id == $key)
                $current_i = $i;
        }
        $next_id = (isset($sort_files[$current_i + 1])) ? $sort_files[$current_i + 1] : -1;

        if ($next_id >= 0) {
            $current_order = $files[$file_id];
            $next_order = $files[$next_id];
            $this->_setSortOrder($current_order, $file_id, $next_order, $next_id);
        }
    }

    public function setLeftOrder($page_id, $type, $file_id) {
        $files = $this->_getFilesOrder($type, $page_id);
        $current_i = 0;
        $i = 0;
        $sort_files = array();
        foreach ($files as $key => $value) {
            $i++;
            $sort_files[$i] = $key;
            if ($file_id == $key)
                $current_i = $i;
        }
        $next_id = (isset($sort_files[$current_i - 1])) ? $sort_files[$current_i - 1] : -1;

        if ($next_id >= 0) {
            $current_order = $files[$file_id];
            $next_order = $files[$next_id];
            $this->_setSortOrder($current_order, $file_id, $next_order, $next_id);
        }
    }

    private function _getFilesOrder($type, $page_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Files-_getFilesOrder-' . $type . '-' . $page_id, 'Files');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM files  WHERE is_delete = 0 && file_id = 0 && `type` = :type && page_id = :page_id ORDER BY `order` ASC");
            $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
            $query->bindParam(":page_id", $page_id, PDO::PARAM_INT, 11);
            $query->execute();
            $result = array();
            $return = $query->fetchAll(PDO::FETCH_OBJ);
            foreach ($return as $key => $value) {
                $result[$value->id] = $value->order;
            }
            $cache->setTags('Files-_getFilesOrder-' . $type . '-' . $page_id, $result, 'Files');
            return $result;
        } else {
            return $get_cache;
        }
    }

    public function setOrder($id, $order) {
        $registry = Registry::getInstance();
        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE `files` SET `order`=:order WHERE is_delete=0 && id=:id LIMIT 1");
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function getFiles($type = 0, $category_id = 0) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Files-getFiles-' . $type . '-' . $category_id, 'Files');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM files  WHERE is_delete = 0 && `type` = :type && category_id = :category_id ORDER BY `order` ASC");
            $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
//        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            $cache->setTags('Files-getFiles-' . $type . '-' . $category_id, $return, 'Files');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getFilesCategoryId($type, $category_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Files-getFilesCategoryId-' . $type . '-' . $category_id, 'Files');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM files  WHERE is_delete = 0 && `type` = :type && category_id = :category_id ORDER BY `order` ASC");
            $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);
            $result = array();
            foreach ($return as $value) {
                $result[$value->resize_type][] = $value;
            }

            $cache->setTags('Files-getFilesCategoryId-' . $type . '-' . $category_id, $result, 'Files');
            return $result;
        } else {
            return $get_cache;
        }
    }

    public function getFilesPageId($type, $page_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Files-getFilesPageId-' . $type . '-' . $page_id, 'Files');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM files  WHERE is_delete = 0 && `type` = :type && page_id = :page_id ORDER BY `order` ASC, id ASC");
            $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
            $query->bindParam(":page_id", $page_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);
            $result = array();
            foreach ($return as $value) {
                $result[$value->resize_type][] = $value;
            }

            $cache->setTags('Files-getFilesPageId-' . $type . '-' . $page_id, $result, 'Files');
            return $result;
        } else {
            return $get_cache;
        }
    }

    /**
     * Возвращает сам файл и все файлы которые к нему относяться
     * @param type $id
     * @return type 
     */
    public function getFilesGroupId($file_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Files-getFilesGroupId-' . $file_id, 'Files');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM files WHERE is_delete = 0 && (`id` = :id || file_id = :id)");
            $query->bindParam(":id", $file_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            $cache->setTags('Files-getFilesGroupId-' . $file_id, $return, 'Files');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getFileId($id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Files-getFileId-' . $id, 'Files');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM files WHERE is_delete = 0 && `id` = :id");
            $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);

            $cache->setTags('Files-getFileId-' . $id, $return, 'Files');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getMaxOrder($type, $page_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT (MAX(`order`)+1) as max FROM files  WHERE is_delete = 0 && `type` = :type && page_id = :page_id ORDER BY `order` ASC");
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":page_id", $page_id, PDO::PARAM_INT, 11);
        $query->execute();
        return (int) $query->fetch(PDO::FETCH_OBJ)->max;
    }

    /**
     * Удаление по типу только из базы .
     * Физически файлы остаются
     * @param type $id
     * @param type $up_dir 
     */
    public function quickTypeDel($type) {
        $registry = Registry::getInstance();
        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("DELETE FROM `files` WHERE `type`=:type ");
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function del($id, $up_dir) {
        $registry = Registry::getInstance();
        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Files');


        $files = $this->getFilesGroupId($id);
        foreach ($files as $value) {
            if ($value->resize_type == 100) { //Превьюшка для картинок
                if (file_exists($registry->preview_dir . $value->file)) {
                    unlink($registry->preview_dir . $value->file);
                }
            } elseif (file_exists($up_dir . $value->file)) {
                unlink($up_dir . $value->file);
            }
        }

        $query = $registry->db->prepare("DELETE FROM `files` WHERE `id`=:id || file_id = :id ");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }

}
