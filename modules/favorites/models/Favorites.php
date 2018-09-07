<?php

class Favorites {

    public function add($object_id, $type) {
        $registry = Registry::getInstance();
        if (!$this->isFavorite($object_id, $type)) {
            $query = $registry->db->prepare("INSERT INTO favorites (object_id, `type`) VALUES (:object_id, :type)");
            $query->bindParam(":object_id", $object_id, PDO::PARAM_INT, 11);
            $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
            $query->execute();
        }
    }

    public function delFavorite($object_id, $type) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM favorites WHERE (`type`=:type && object_id=:object_id)");
        $query->bindParam(":object_id", $object_id, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function isFavorite($object_id, $type) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as `count` FROM favorites WHERE (`type`=:type && object_id=:object_id)");
        $query->bindParam(":object_id", $object_id, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ)->count;
    }

    public function isFavorites($type) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as `count` FROM favorites WHERE (`type`=:type)");
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ)->count;
    }

    public function getFavoritesProducts($type) {
        $registry = Registry::getInstance();

        $query = $registry->db->prepare("SELECT
		SQL_CALC_FOUND_ROWS products.*, products.*, 
                 MIN(product_mod.price) as price, 
                 MAX(product_mod.price) as max_price,
                 product_mod.price_1, 
                 product_mod.price_2, 
                 product_mod.price_3, 
                 product_mod.price_4, 
                 product_mod.price_5, 
                 product_mod.price_6, 
                 product_mod.price_7, 
                 product_mod.price_8, 
                 product_mod.price_9, 
                 product_mod.price_10, 
                product_mod.warehouse,
                product_mod.id as mod_id, 
                (SELECT name FROM brands WHERE id = products.brand_id && is_delete=0 LIMIT 1) as brand_name
		FROM products INNER JOIN product_mod
                
                ON (product_mod.is_delete=0 && product_mod.product_id = products.id && 
                 is_active = 1 && products.is_delete = 0)
                INNER JOIN favorites ON (favorites.`type`=:type && object_id=products.id)
                GROUP BY products.id ORDER BY products.category_1_id ASC
                ");
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

}
