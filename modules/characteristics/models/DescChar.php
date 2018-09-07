<?php

class DescChar {

    public function addCharacteristics($category_id, $characteristic_value_id, $characteristic_value_2_id, $characteristic_value_3_id, $characteristic_value_4_id, $name, $desc, $title, $meta_key, $meta_desc) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO characteristic_desc (`category_id`, `characteristic_value_id`, `characteristic_value_2_id`, `characteristic_value_3_id`, `characteristic_value_4_id`, `name`, `desc`, `title`, `meta_key`, `meta_desc`) "
                . "VALUES (:category_id, :characteristic_value_id, :characteristic_value_2_id, :characteristic_value_3_id, :characteristic_value_4_id, :name, :desc, :title, :meta_key, :meta_desc)");

        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":characteristic_value_id", $characteristic_value_id, PDO::PARAM_INT, 11);
        $query->bindParam(":characteristic_value_2_id", $characteristic_value_2_id, PDO::PARAM_INT, 11);
        $query->bindParam(":characteristic_value_3_id", $characteristic_value_3_id, PDO::PARAM_INT, 11);
        $query->bindParam(":characteristic_value_4_id", $characteristic_value_4_id, PDO::PARAM_INT, 11);
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":desc", $desc, PDO::PARAM_STR, 255);
        $query->bindParam(":title", $title, PDO::PARAM_STR, 255);
        $query->bindParam(":meta_key", $meta_key, PDO::PARAM_STR, 255);
        $query->bindParam(":meta_desc", $meta_desc, PDO::PARAM_STR, 255);
        $query->execute();
        $cac = Cache::getInstance();
        $cac->deleteTag('Characteristics');
        return $registry->db->lastInsertId();
    }

    public function editCharacteristic($id, $category_id, $characteristic_value_id, $characteristic_value_2_id, $characteristic_value_3_id, $characteristic_value_4_id, $name, $desc, $title, $meta_key, $meta_desc) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE characteristic_desc SET category_id=:category_id, characteristic_value_id=:characteristic_value_id, characteristic_value_2_id=:characteristic_value_2_id, characteristic_value_3_id=:characteristic_value_3_id, characteristic_value_4_id=:characteristic_value_4_id, name=:name, `desc`=:desc, title=:title, meta_key=:meta_key, meta_desc=:meta_desc WHERE id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":characteristic_value_id", $characteristic_value_id, PDO::PARAM_INT, 11);
        $query->bindParam(":characteristic_value_2_id", $characteristic_value_2_id, PDO::PARAM_INT, 11);
        $query->bindParam(":characteristic_value_3_id", $characteristic_value_3_id, PDO::PARAM_INT, 11);
        $query->bindParam(":characteristic_value_4_id", $characteristic_value_4_id, PDO::PARAM_INT, 11);
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":desc", $desc, PDO::PARAM_STR, 255);
        $query->bindParam(":title", $title, PDO::PARAM_STR, 255);
        $query->bindParam(":meta_key", $meta_key, PDO::PARAM_STR, 255);
        $query->bindParam(":meta_desc", $meta_desc, PDO::PARAM_STR, 255);
        $query->execute();

        $cac = Cache::getInstance();
        $cac->deleteTag('Characteristics');
    }

    public function delDescChar($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE  characteristic_desc SET is_delete=1 WHERE id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();

        $cac = Cache::getInstance();
        $cac->deleteTag('Characteristics');
    }

    public function getDescCharMeta($category_id, $characteristic_value_id, $characteristic_value_2_id, $characteristic_value_3_id, $characteristic_value_4_id) {
//        echo "$category_id, $characteristic_value_id, $characteristic_value_2_id, $characteristic_value_3_id, $characteristic_value_4_id<br/>";
        $registry = Registry::getInstance();

        $cacheModule = unserialize(CacheModule::getCacheModule('products-getDescCharMeta-' . $category_id . '-'. $characteristic_value_id  . '-'.  $characteristic_value_2_id . '-'.  $characteristic_value_3_id . '-'.  $characteristic_value_4_id, false)); //Из-за ограничения мемкеша в 1мб
        if ($cacheModule !== false) {
            return ($cacheModule);
        } else {

            $query = $registry->db->prepare("SELECT *
            FROM characteristic_desc WHERE is_delete = 0 && category_id = :category_id && characteristic_value_id=:characteristic_value_id && "
                    . "characteristic_value_2_id = :characteristic_value_2_id && characteristic_value_3_id = :characteristic_value_3_id  && characteristic_value_4_id = :characteristic_value_4_id ORDER BY id ASC");
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->bindParam(":characteristic_value_id", $characteristic_value_id, PDO::PARAM_INT, 11);
            $query->bindParam(":characteristic_value_2_id", $characteristic_value_2_id, PDO::PARAM_INT, 11);
            $query->bindParam(":characteristic_value_3_id", $characteristic_value_3_id, PDO::PARAM_INT, 11);
            $query->bindParam(":characteristic_value_4_id", $characteristic_value_4_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);
            CacheModule::setCacheModule('products-getDescCharMeta-' . $category_id . '-'. $characteristic_value_id  . '-'.  $characteristic_value_2_id . '-'.  $characteristic_value_3_id . '-'.  $characteristic_value_4_id, serialize($return), false);
            return $return;
        }
    }

    public function getCharacteristics($category_id, $shop_id = 0) {


        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT *, 
            (SELECT name FROM characteristic_value WHERE characteristic_value.id=characteristic_desc.characteristic_value_id && characteristic_value.is_delete = 0) as characteristic_name, 
            (SELECT name FROM characteristic_value WHERE characteristic_value.id=characteristic_desc.characteristic_value_2_id && characteristic_value.is_delete = 0) as characteristic_2_name, 
            (SELECT name FROM characteristic_value WHERE characteristic_value.id=characteristic_desc.characteristic_value_3_id && characteristic_value.is_delete = 0) as characteristic_3_name, 
            (SELECT name FROM characteristic_value WHERE characteristic_value.id=characteristic_desc.characteristic_value_4_id && characteristic_value.is_delete = 0) as characteristic_4_name
            
            FROM characteristic_desc WHERE is_delete = 0 && category_id = :category_id ORDER BY id ASC");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
//        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        return $return;
    }

    public function getCharacteristicDescAll($shop_id) {

        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT characteristic_desc.* FROM characteristic_desc "
                . "INNER JOIN category ON (characteristic_desc.category_id = category.id && category.is_delete = 0 && characteristic_desc.is_delete = 0 && category.shop_id = :shop_id)"
                . "   ORDER BY characteristic_desc.id ASC");
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCharacteristicDescId($id) {

        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT *, 
            (SELECT name FROM characteristic_value WHERE characteristic_value.id=characteristic_desc.characteristic_value_id && characteristic_value.is_delete = 0) as characteristic_name, 
            (SELECT name FROM characteristic_value WHERE characteristic_value.id=characteristic_desc.characteristic_value_2_id && characteristic_value.is_delete = 0) as characteristic_2_name, 
            (SELECT name FROM characteristic_value WHERE characteristic_value.id=characteristic_desc.characteristic_value_3_id && characteristic_value.is_delete = 0) as characteristic_3_name, 
            (SELECT name FROM characteristic_value WHERE characteristic_value.id=characteristic_desc.characteristic_value_4_id && characteristic_value.is_delete = 0) as characteristic_4_name
            
            FROM characteristic_desc WHERE is_delete = 0 && id = :id ORDER BY id ASC");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getCharacteristicId($id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Characteristics-getCharacteristicId-' . $id, 'Characteristics');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM characteristic WHERE is_delete = 0   && `type`=0 && id=:id");
            $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);

            $cache->setTags('Characteristics-getCharacteristicId-' . $id, $return, 'Characteristics');
            return $return;
        } else {
            return $get_cache;
        }
    }

}
