<?php

class Discount {

    public function addDiscount($sum_start, $sum_end, $discount, $is_auth) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO discount (`sum_start`, sum_end, `discount`, is_auth) VALUES (:sum_start, :sum_end, :discount, :is_auth)");
        $query->bindParam(":sum_start", $sum_start, PDO::PARAM_INT, 11);
        $query->bindParam(":sum_end", $sum_end, PDO::PARAM_INT, 11);
        $query->bindParam(":discount", $discount, PDO::PARAM_INT, 11);
        $query->bindParam(":is_auth", $is_auth, PDO::PARAM_BOOL);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function editDiscount($id, $sum_start, $sum_end, $discount, $is_auth) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE  discount SET `sum_start`=:sum_start, sum_end = :sum_end, `discount`=:discount, is_auth=:is_auth WHERE id=:id");
        $query->bindParam(":sum_start", $sum_start, PDO::PARAM_INT, 11);
        $query->bindParam(":sum_end", $sum_end, PDO::PARAM_INT, 11);
        $query->bindParam(":discount", $discount, PDO::PARAM_INT, 11);
        $query->bindParam(":is_auth", $is_auth, PDO::PARAM_BOOL);
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function delDiscount($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE  discount SET is_delete=1 WHERE id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function getDiscount() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT *, !(!(SELECT COUNT(*) FROM discount_visible WHERE discount.id = discount_visible.`discount_id`)) as is_discount_object FROM discount WHERE is_delete = 0 ORDER BY `sum_start` ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Бесплатная доставка, сумма
     * @return type
     */
    public function getNextDiscount($price, $is_auth, $user_id) {
        $registry = Registry::getInstance();
        if ($is_auth == 1) { //Накопительная скидка
            $query = $registry->db->prepare("SELECT SUM(price) as `sum_price` FROM `order_products` WHERE `user_id`=:user_id && is_delete = 0");
            $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
            if (isset($result->sum_price)) {
                $price = $price + $result->sum_price;
            }
        }

        $query1 = $registry->db->prepare("SELECT discount, sum_start FROM `discount` WHERE `is_auth`=:is_auth && is_delete = 0 && sum_start > :price ORDER BY sum_start ASC");
        $query1->bindParam(":price", $price, PDO::PARAM_INT, 11);
        $query1->bindParam(":is_auth", $is_auth, PDO::PARAM_INT, 11);
        $query1->execute();
        return $query1->fetch(PDO::FETCH_OBJ);
        
    }

    /**
     * В зависимости от стоимости возвращает скидку
     * @param <type> $price
     * @return <type> 
     */
    public function getDiscountSum($price, $is_auth, $user_id) {
        $registry = Registry::getInstance();
        if ($is_auth == 1) { //Накопительная скидка
            $query = $registry->db->prepare("SELECT SUM(price) as `sum_price` FROM `order_products` WHERE `user_id`=:user_id && is_delete = 0");
            $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
            if (isset($result->sum_price)) {
                $price = $price + $result->sum_price;
            }
        }


        $query1 = $registry->db->prepare("SELECT `discount` FROM `discount` WHERE `is_auth`=:is_auth && is_delete = 0 && :price >= sum_start && :price < sum_end");
        $query1->bindParam(":price", $price, PDO::PARAM_INT, 11);
        $query1->bindParam(":is_auth", $is_auth, PDO::PARAM_INT, 11);
        $query1->execute();
        $return = $query1->fetch(PDO::FETCH_OBJ);
        if (isset($return->discount)) {
            return $return->discount;
        } else {
            return false;
        }
    }

    public function getDiscountVisible($discount_id, $type) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM `discount_visible` WHERE `discount_id`=:discount_id && `type` = :type");
        $query->bindParam(":discount_id", $discount_id, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param type $object_id
     * @param type $type - 1 категория, 2 - бренд
     * @param type $is_auth
     * @return type
     */
    public function getDiscountVisibleObject($object_id, $type) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT discount.* FROM discount INNER JOIN discount_visible"
                . " ON (discount.id = discount_visible.`discount_id` && object_id = :object_id && `type`=:type && discount.is_delete=0) ORDER BY discount DESC");
        $query->bindParam(":object_id", $object_id, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->execute();

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function addDiscountVisible($discount_id, $object_id, $type) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO discount_visible (`discount_id`, object_id, `type`) VALUES (:discount_id, :object_id, :type)");
        $query->bindParam(":discount_id", $discount_id, PDO::PARAM_INT, 11);
        $query->bindParam(":object_id", $object_id, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function delAllDiscountVisible($discount_id, $type) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM discount_visible WHERE discount_id=:discount_id && (`type`=:type || :type = -1)");
        $query->bindParam(":discount_id", $discount_id, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->execute();
    }

}
