<?php

class ImagesUploader {

public function add($file = null, $name = null, $desc = null, $size = 0, $width = 0, $height = 0, $type = 0, $product_id = 0, $group_id = 0, $order = 0, $file_type = 0) {
        $registry = Registry::getInstance();
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Files');
        $size = str_replace(',', '.', $size);
        $query = $registry->db->prepare("INSERT INTO products_images (`order`, `desc`,`name`,`file`, size, width, height, `type`, created,  product_id, group_id, file_type)
		                                               VALUES(:order,  :desc, :name, :file, :size, :width, :height, :type, NOW(),      :product_id, :group_id, :file_type)");
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":desc", $desc, PDO::PARAM_STR);
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":file", $file, PDO::PARAM_STR, 255);
        $query->bindParam(":size", $size, PDO::PARAM_INT, 11);
        $query->bindParam(":width", $width, PDO::PARAM_INT, 11);
        $query->bindParam(":height", $height, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":group_id", $group_id, PDO::PARAM_INT, 11);
        $query->bindParam(":file_type", $file_type, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setOrder($group_id, $order = 0, $desc = null, $name = null) {
        $registry = Registry::getInstance();
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Files');
        $query = $registry->db->prepare("UPDATE  products_images SET `name`=:name,`desc`=:desc,`order`=:order WHERE group_id=:group_id");
        $query->bindParam(":group_id", $group_id, PDO::PARAM_INT, 11);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":desc", $desc, PDO::PARAM_STR);
        $query->execute();
    }

    
    
    private function _getFilesOrder($type, $page_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM files  WHERE is_delete = 0 && resize_type = 100 && `type` = :type && page_id = :page_id ORDER BY `order` ASC");
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":page_id", $page_id, PDO::PARAM_INT, 11);
        $query->execute();
        $result = array();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        foreach ($return as  $value) {
            $result[$value->file_id] = $value->order;
        }
        return $result;
    }
    
    private function _setSortOrder($current_order, $file_id, $next_order, $next_id) {
        /* Меняем сортировку */
        
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Files');
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `files` SET `order`=:order WHERE is_delete=0 && (file_id=:id)");
        $query->bindParam(":order", $current_order, PDO::PARAM_INT, 11);
        $query->bindParam(":id", $next_id, PDO::PARAM_INT, 11);
        $query->execute();
        $query = $registry->db->prepare("UPDATE `files` SET `order`=:order WHERE is_delete=0 && (file_id=:id)");
        $query->bindParam(":order", $next_order, PDO::PARAM_INT, 11);
        $query->bindParam(":id", $file_id, PDO::PARAM_INT, 11);
        $query->execute();
        
        $query = $registry->db->prepare("UPDATE `products_images` SET `order`=:order WHERE is_delete=0 && (group_id=:id)");
        $query->bindParam(":order", $current_order, PDO::PARAM_INT, 11);
        $query->bindParam(":id", $next_id, PDO::PARAM_INT, 11);
        $query->execute();
        $query = $registry->db->prepare("UPDATE `products_images` SET `order`=:order WHERE is_delete=0 && (group_id=:id)");
        $query->bindParam(":order", $next_order, PDO::PARAM_INT, 11);
        $query->bindParam(":id", $file_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setRightOrder($product_id, $type, $file_id) {
   
        $files = $this->_getFilesOrder($type, $product_id);
  
        $current_i = 0;
        $i = 0;
        $sort_files = array();
        foreach ($files as $key => $value) {
            $i++;
            $sort_files[$i] = $key;
            if ($file_id == $key) $current_i = $i;
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
            if ($file_id == $key) $current_i = $i;
        }
        $next_id = (isset($sort_files[$current_i - 1])) ? $sort_files[$current_i - 1] : -1;

        if ($next_id >= 0) {
            $current_order = $files[$file_id];
            $next_order = $files[$next_id];
            $this->_setSortOrder($current_order, $file_id, $next_order, $next_id);
        }
    }
    

    public function getMaxOrder($type, $product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT (MAX(`order`)+1) as max FROM products_images  WHERE is_delete = 0 && `file_type` = :type && product_id = :product_id");
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
        return (int) $query->fetch(PDO::FETCH_OBJ)->max;
    }



    public function getImages($product_id = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT id,`article`,created,width,name,is_delete,`desc`,(`order`*1) as `order`,product_id,height, file,`type`,  size,group_id FROM products_images WHERE product_id = :product_id ORDER BY `order` ASC,`type` ASC,`created` ASC");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        $return = array();
        foreach ($result as $key => $value) {
            $return[$value->group_id][] = $value;
        }
        return $return;
    }

    public function getProductId($product_id = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM SS_products WHERE productID = :product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getImageId($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT id,created,width,height,(`order`*1) as `order`,`type`, file, name, `desc`, size FROM products_images WHERE `id` = :id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();

        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * @param <type> $product_name
     * @return <type>
     */
    public function isImageName($product_name) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as count FROM products_images WHERE file=:product_name");
        $query->bindParam(":product_name", $product_name, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ)->count;
    }

    public function getImagesGroup($product_id, $group_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT id,created,width,height,`type`, file, name, `desc`, size FROM products_images WHERE is_delete = 0 && group_id=:group_id &&`product_id`=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":group_id", $group_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getImages100Group($product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT id,created,width,height,`type`, file, name, `desc`, size, group_id FROM products_images WHERE is_delete = 0 &&`product_id`=:product_id && type=2  ORDER BY `order` ASC,`created` ASC");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        $return = array();
        foreach ($result as $value) {
            $return[$value->group_id] = $value->file;
        }
        return $return;
    }

    public function delImage($del_id, $path) {
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Files');
        $registry = Registry::getInstance();
        $del_image = $this->getImageId($del_id);
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM `products_images` WHERE id=:del_id LIMIT 1");
        $query->bindParam(":del_id", $del_id, PDO::PARAM_INT, 11);
        $query->execute();

        if (file_exists($path . $del_image->file)) {
            unlink($path . $del_image->file);
        }
    }

    public function delImagesGroup($product_id, $group_id, $path) {
        
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Files');
        
        $registry = Registry::getInstance();
        $images = $this->getImagesGroup($product_id, $group_id);

        $query = $registry->db->prepare("DELETE FROM `products_images` WHERE group_id=:group_id &&`product_id`=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":group_id", $group_id, PDO::PARAM_INT, 11);
        $query->execute();
        
        foreach ($images as $image) {
           
            if (file_exists($path . $image->file)) {
                unlink($path . $image->file);
            }
        }
    }

}