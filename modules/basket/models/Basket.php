<?php

class Basket {

    /**
     * Подробное содержание корзины
     */
    public function getBasketDetailedShort($session_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT basket.currency_id, basket.image_id, basket.product_id, product_mod.warehouse, COUNT(*) as count, (SUM(basket.price)) as  sum_price,
mod_id, basket.price, basket.b2b_num, product_mod.name as mod_name
FROM basket INNER JOIN products 
ON (products.id = basket.product_id && products.is_delete = 0 && products.is_active = 1 &&   basket.session_id = :session_id) 
INNER JOIN product_mod ON (products.id = product_mod.product_id && product_mod.id = basket.mod_id)
GROUP BY basket.mod_id, char_1_id, char_2_id, char_3_id, char_4_id, char_5_id, is_credit");
        $query->bindParam(":session_id", $session_id, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * Подробное содержание корзины
     */
    public function getBasketDetailed($session_id, $image_type = 1) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT products.*, basket.currency_id, basket.image_id, basket.product_id, product_mod.warehouse, is_credit,
            (SELECT file FROM products_images WHERE product_id = products.id && is_delete = 0 && `type`=:type ORDER BY products_images.`order` ASC, products_images.`id` ASC LIMIT 1) as image, 
            (SELECT file FROM products_images WHERE product_id = products.id && is_delete = 0 && `type`=6 ORDER BY products_images.`order` ASC, products_images.`id` ASC LIMIT 1) as big_image, 
            
(SELECT name FROM characteristic_value WHERE characteristic_value.id = char_1_id) as char_name_1, 
(SELECT name FROM characteristic_value WHERE characteristic_value.id = char_2_id) as char_name_2, 
(SELECT id FROM characteristic_value WHERE characteristic_value.id = char_1_id) as char_id_1, 
(SELECT id FROM characteristic_value WHERE characteristic_value.id = char_2_id) as char_id_2, 
            
            COUNT(*) as count, 
            (SUM(basket.price)
) as  sum_price,
            
mod_id, basket.price, basket.b2b_num, 
            product_mod.name as mod_name
FROM basket INNER JOIN products 
ON (products.id = basket.product_id && products.is_delete = 0 && products.is_active = 1 &&   basket.session_id = :session_id) 
INNER JOIN product_mod ON (products.id = product_mod.product_id && product_mod.id = basket.mod_id)
GROUP BY basket.mod_id, char_1_id, char_2_id, char_3_id, char_4_id, char_5_id, is_credit");
        $query->bindParam(":session_id", $session_id, PDO::PARAM_STR, 255);
        $query->bindParam(":type", $image_type, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Возвращает все что храниться в корзине, без групировок и т.д.
     */
    public function getBasketAll($session_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT basket.*
            FROM basket 
            INNER JOIN product_mod ON (basket.mod_id = product_mod.id)
            INNER JOIN products ON (products.id = basket.product_id && products.is_delete = 0 
            && products.is_active = 1 &&  basket.session_id = :session_id && product_mod.product_id = products.id)");
        $query->bindParam(":session_id", $session_id, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Вывод корзины
     */

    /**
     * (SUM(basket.price) +  
      (SELECT SUM(price) FROM characteristic_products WHERE
      (characteristic_value_id = char_1_id || characteristic_value_id = char_2_id || characteristic_value_id = char_3_id ||
      characteristic_value_id = char_4_id || characteristic_value_id = char_5_id) &&
      product_id = basket.product_id  ) ) as sum
     */
    public function getBasket($session_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as count, 
            SUM(basket.price) as sum
            FROM basket 
            INNER JOIN product_mod ON (product_mod.id = basket.mod_id && product_mod.product_id = basket.product_id &&  basket.session_id = :session_id)");
        $query->bindParam(":session_id", $session_id, PDO::PARAM_STR, 255);
        $query->execute();

        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Если требуется в корзине выводить общий вес, например для служб доставки
     * @param type $session_id
     * @return type
     */
    public function getBasketAndVes($session_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as count, SUM(REPLACE(characteristic_value.name,',','.')) as ves, 
            SUM(basket.price) as sum
            FROM basket 
            INNER JOIN product_mod ON (product_mod.id = basket.mod_id && product_mod.product_id = basket.product_id &&  basket.session_id = :session_id)
INNER JOIN characteristic_products ON (basket.product_id = characteristic_products.product_id && characteristic_id=8)            
INNER JOIN characteristic_value ON (characteristic_value.is_delete = 0 && characteristic_value.id = characteristic_products.characteristic_value_id)            
");
        $query->bindParam(":session_id", $session_id, PDO::PARAM_STR, 255);
        $query->execute();

        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Если требуется в корзине выводить общий вес, например для служб доставки
     * @param type $session_id
     * @return type
     */
    public function getBasketAndVesProduct($session_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT products.name, product_mod.article, COUNT(*) as count, SUM(REPLACE(characteristic_value.name,',','.')) as ves, 
            SUM(basket.price) as sum, char_1_id
            FROM basket 
            INNER JOIN product_mod ON (product_mod.id = basket.mod_id && product_mod.product_id = basket.product_id &&  basket.session_id = :session_id)
            INNER JOIN products ON (product_mod.product_id = products.id &&  products.is_delete = 0)
INNER JOIN characteristic_products ON (basket.product_id = characteristic_products.product_id && characteristic_id=8)            
INNER JOIN characteristic_value ON (characteristic_value.is_delete = 0 && characteristic_value.id = characteristic_products.characteristic_value_id) 
GROUP BY basket.mod_id, char_1_id, char_2_id, char_3_id, char_4_id, char_5_id
");
        $query->bindParam(":session_id", $session_id, PDO::PARAM_STR, 255);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    private function _checkPrice($price) {
        return str_replace("$", null, str_replace(" ", null, str_replace(",", ".", trim(str_replace(" ", null, str_replace(" ", null, $price))))));
    }

    /**
     * Добавление товара
     */
    public function add($mod_id, $product_id, $image_id, $price, $dicount_price, $discount_info, $currency_id, $b2b_num, $char_1_id, $char_2_id, $char_3_id, $is_credit, $session_id) {
        $price = $this->_checkPrice($price);
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO basket (`session_id`,`currency_id`, `mod_id`, `product_id`, `price`, dicount_price, discount_info, b2b_num, `image_id`, char_1_id, char_2_id, char_3_id, is_credit) VALUES (:session_id, :currency_id, :mod_id, :product_id, :price, :dicount_price, :discount_info, :b2b_num, :image_id, :char_1_id, :char_2_id, :char_3_id, :is_credit)");
        $query->bindParam(":session_id", $session_id, PDO::PARAM_STR, 255);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":price", $price, PDO::PARAM_INT, 11);
        $query->bindParam(":dicount_price", $dicount_price, PDO::PARAM_INT, 11);
        $query->bindParam(":discount_info", $discount_info, PDO::PARAM_STR, 255);
        $query->bindParam(":b2b_num", $b2b_num, PDO::PARAM_INT, 4);
        $query->bindParam(":currency_id", $currency_id, PDO::PARAM_INT, 4);
        $query->bindParam(":is_credit", $is_credit, PDO::PARAM_INT, 4);
        $query->bindParam(":mod_id", $mod_id, PDO::PARAM_INT, 11);
        $query->bindParam(":image_id", $image_id, PDO::PARAM_INT, 11);
        $query->bindParam(":char_1_id", $char_1_id, PDO::PARAM_INT, 11);
        $query->bindParam(":char_2_id", $char_2_id, PDO::PARAM_INT, 11);
        $query->bindParam(":char_3_id", $char_3_id, PDO::PARAM_INT, 11);
        $query->execute();
        $basket_id = $registry->db->lastInsertId();
        return $basket_id;
    }

    public function setType($basket_id, $type) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `basket` SET `type`=:type WHERE id=:id");
        $query->bindParam(":id", $basket_id, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Удаление товара
     */
    public function del($mod_id, $product_id, $char_1_id, $session_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM `basket` WHERE mod_id = :mod_id && session_id = :session_id && product_id = :product_id && (char_1_id = :char_1_id || char_1_id = :char_1_id) LIMIT 1");
        $query->bindParam(":session_id", $session_id, PDO::PARAM_STR, 255);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":mod_id", $mod_id, PDO::PARAM_INT, 11);
        $query->bindParam(":char_1_id", $char_1_id, PDO::PARAM_INT, 11);
        return $query->execute();
    }

    /**
     * Удаление всех товаров
     */
    public function delAll($product_id, $session_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM `basket` WHERE session_id = :session_id && product_id = :product_id");
        $query->bindParam(":session_id", $session_id, PDO::PARAM_STR, 255);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        return $query->execute();
    }

    public function delModCharAll($mod_id, $char_1_id, $session_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM `basket` WHERE session_id = :session_id && mod_id = :mod_id && char_1_id=:char_1_id");
        $query->bindParam(":session_id", $session_id, PDO::PARAM_STR, 255);
        $query->bindParam(":mod_id", $mod_id, PDO::PARAM_INT, 11);
        $query->bindParam(":char_1_id", $char_1_id, PDO::PARAM_INT, 11);
        return $query->execute();
    }

    /**
     * Удаление товара
     */
    public function clearAll($session_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM `basket` WHERE session_id = :session_id");
        $query->bindParam(":session_id", $session_id, PDO::PARAM_STR, 255);
        return $query->execute();
    }

    /**
     * Удаление всех старых товаров
     */
    public function delOld($count_days) {
        
    }

    /**
     * Проверка на наличие товара
     */
    public function isWarehouseProduct($product_id, $mod_id, $session_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT 
            product_mod.warehouse FROM product_mod 
            WHERE (product_mod.id = :mod_id && product_mod.product_id = :product_id && product_mod.is_delete = 0) ");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":mod_id", $mod_id, PDO::PARAM_INT, 11);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        ;
        $query = null;

        $query = $registry->db->prepare("SELECT COUNT(*) as count FROM basket 
           WHERE basket.mod_id = :mod_id && basket.product_id = :product_id &&  basket.session_id = :session_id");
        $query->bindParam(":session_id", $session_id, PDO::PARAM_STR, 255);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":mod_id", $mod_id, PDO::PARAM_INT, 11);
        $query->execute();
        $result_basket = $query->fetch(PDO::FETCH_OBJ);

        if (isset($result->warehouse) && isset($result_basket->count)) {
            return array("warehouse" => $result->warehouse, "count" => $result_basket->count);
        } else {
            return false;
        }
    }

}
