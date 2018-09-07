<?php

class vsProduct {

    public function add($type, $voice_id, $voice) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO rating (`type`, `voice_id` ,`voice`, `ip`) VALUES (:type, :voice_id, :voice, INET_ATON(:ip))");
        $query->bindParam("ip", $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR, 255);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":voice_id", $voice_id, PDO::PARAM_INT, 11);
        $query->bindParam(":voice", $voice, PDO::PARAM_INT, 11);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    /**
     * Проверяет существование продукта
     * @param type $type
     * @param type $voice_id
     * @return type 
     */
    public function isProduct($product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT category_1_id FROM products WHERE is_delete=0 && is_active=1 && id=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetch(PDO::FETCH_OBJ);
        if (isset($return->category_1_id)) {
            return $return->category_1_id;
        } else
            false;
    }

    /**
     * Возвращет рейтинг
     * @param type $type
     * @param type $voice_id
     * @return type 
     */
    public function getRootCategory($category_id_1) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('vsProduct-getRootCategory-' . $category_id_1, 'Category');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT parent_id FROM category WHERE `id` = :category_id &&  `type`=0 && is_delete=0");
            $query->bindParam(":category_id", $category_id_1, PDO::PARAM_INT, 11);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
            if (isset($result->parent_id)) {
                if ($result->parent_id == 0) {

                    $cache->setTags('vsProduct-getRootCategory-' . $category_id_1, $category_id_1, 'Category');
                    return $category_id_1;
                } else {
                    $return = $this->getRootCategory($result->parent_id);
                    $cache->setTags('vsProduct-getRootCategory-' . $return, $return, 'Category');
                    return $return;
                }
            } else
                return false;
        } else {
            return $get_cache;
        }
    }

    public function getPrpductId($product_id = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT products.*, product_mod.price, 
            (SELECT file FROM products_images WHERE product_id = products.id && `type`=3 && is_delete = 0 LIMIT 1) as file  FROM products 
            INNER JOIN product_mod ON 
            (product_mod.product_id = products.id && 
            product_mod.is_delete = 0 && 
            products.is_delete = 0  && products.id=:product_id) LIMIT 1");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

}
