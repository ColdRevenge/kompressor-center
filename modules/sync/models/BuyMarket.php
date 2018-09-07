<?php

class BuyMarket {

//    public function addOrder($currency_id, $exchange, $fio, $phone, $email, $adress, $metro_id, $delivery_id, $payment_method_id, $comment, $order_id_buy_market) {
//
//        $registry = Registry::getInstance();
//
//        $registry->db->query("START TRANSACTION");
//        $query = $registry->db->prepare("INSERT INTO `order` (`created`,  `fio`, `phone`, `email`, `adress`, `metro_id`, `delivery_id`, `comment`, `order_id_buy_market`, currency_id, payment_method_id, exchange) VALUES (NOW(), :fio, :phone, :email, :adress, :metro_id, :delivery_id, :comment, :order_id_buy_market, :currency_id, :payment_method_id, :exchange)");
//        $query->bindParam(":fio", $fio, PDO::PARAM_STR, 255);
//        $query->bindParam(":phone", $phone, PDO::PARAM_STR, 255);
//        $query->bindParam(":email", $email, PDO::PARAM_STR, 255);
//        $query->bindParam(":adress", $adress, PDO::PARAM_STR);
//        $query->bindParam(":metro_id", $metro_id, PDO::PARAM_INT, 11);
//        $query->bindParam(":exchange", $exchange, PDO::PARAM_INT, 11);
//        $query->bindParam(":currency_id", $currency_id, PDO::PARAM_INT, 11);
//        $query->bindParam(":order_id_buy_market", $order_id_buy_market, PDO::PARAM_INT, 11);
//        $query->bindParam(":delivery_id", $delivery_id, PDO::PARAM_INT, 11);
//        $query->bindParam(":payment_method_id", $payment_method_id, PDO::PARAM_INT, 11);
//        $query->bindParam(":comment", $comment, PDO::PARAM_STR);
//        $query->execute();
//        $order_id = $registry->db->lastInsertId();
//
//        return $order_id;
//    }

    public function setOrderIdBuyMarket($order_id, $order_id_buy_market) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order` SET `order_id_buy_market` = :order_id_buy_market WHERE `order`.id = :order_id && is_delete=0 LIMIT 1");
        $query->bindParam(":order_id_buy_market", $order_id_buy_market, PDO::PARAM_INT, 11);
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Добавляет к заказу продукты (для вывода админимтратором)
     */
//    public function addOrderProduct($price, $product_id, $mod_id, $b2b_num, $image_id, $order_id) {
//        $registry = Registry::getInstance();
//        $query = $registry->db->prepare("INSERT INTO `order_products` 
//              (price, b2b_num, product_id, image_id, order_id, mod_id) VALUES (:price, :b2b_num, :product_id, :image_id, :order_id, :mod_id)");
//        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
//        $query->bindParam(":mod_id", $mod_id, PDO::PARAM_INT, 11);
//        $query->bindParam(":image_id", $image_id, PDO::PARAM_INT, 11);
//        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
//        $query->bindParam(":b2b_num", $b2b_num, PDO::PARAM_INT, 11);
//        $query->bindParam(":price", $price, PDO::PARAM_INT, 11);
//        $query->execute();
//    }

    public function setOrderContactInfo($order_id_buy_market, $fio, $phone, $email, $adress, $comment) {
        $query = "";
        if (!empty($comment)) { //Если поле коммент пустое, то не обновляем его
            $query = ", `comment` = :comment";
        }
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order` SET
`fio` = :fio,
`phone` = :phone,
`email` = :email,
`adress` = :adress $query
WHERE `order`.order_id_buy_market = :order_id_buy_market && is_delete=0 LIMIT 1");
        $query->bindParam(":order_id_buy_market", $order_id_buy_market, PDO::PARAM_INT, 11);
        $query->bindParam(":fio", $fio, PDO::PARAM_STR, 255);
        $query->bindParam(":phone", $phone, PDO::PARAM_STR, 255);
        $query->bindParam(":email", $email, PDO::PARAM_STR, 255);
        $query->bindParam(":adress", $adress, PDO::PARAM_STR, 255);
        if (!empty($comment)) {
            $query->bindParam(":comment", $comment, PDO::PARAM_STR);
        }
        $query->execute();
    }

    public function setStatusOrder($order_id_buy_market, $status, $sub_status_buy_market) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order` SET status_buy_market = :status_buy_market, sub_status_buy_market=:sub_status_buy_market WHERE order_id_buy_market = :order_id_buy_market LIMIT 1");
        $query->bindParam(":order_id_buy_market", $order_id_buy_market, PDO::PARAM_INT, 11);
        $query->bindParam(":status_buy_market", $status, PDO::PARAM_STR, 255);
        $query->bindParam(":sub_status_buy_market", $sub_status_buy_market, PDO::PARAM_STR, 255);

        $query->execute();
    }

    public function getStatuses() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT *, (SELECT name FROM buy_market_status as sub_status_table WHERE sub_status_table.id = buy_market_status.parent_id) as sub_status FROM `buy_market_status`");
        $query->execute();

        return $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();
        foreach ($return as $key => $value) {
            $result[$value->parent_id][] = $value;
        }
        return $result;
    }

    /**
     * Имя по коду
     * @return type
     */
    public function getStatusesNameCode() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM `buy_market_status`");
        $query->execute();

        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();
        foreach ($return as $key => $value) {
            $result[$value->code] = $value->name;
        }
        return $result;
    }
    
    
    public function getOrderBuyMarketOrderId($order_id_buy_market) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM `order` WHERE order_id_buy_market=:order_id_buy_market && is_delete=0");
        $query->bindParam(":order_id_buy_market", $order_id_buy_market, PDO::PARAM_INT, 11);
        $query->execute();

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function setOutletId($order_id_buy_market, $delivery_child_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order` SET delivery_child_id = :delivery_child_id WHERE order_id_buy_market = :order_id_buy_market LIMIT 1");
        $query->bindParam(":order_id_buy_market", $order_id_buy_market, PDO::PARAM_INT, 11);
        $query->bindParam(":delivery_child_id", $delivery_child_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

//    public function getOutletOrderId($order_id) {
//        $registry = Registry::getInstance();
//        $query = $registry->db->prepare("SELECT outlet_id_buy_market FROM `order` WHERE id = :order_id LIMIT 1");
//        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
//        $query->execute();
//        $return = $query->fetch(PDO::FETCH_OBJ);
//        if (isset($return->outlet_id_buy_market)) {
//            return $return->outlet_id_buy_market;
//        }
//        return false;
//    }

    public function getDeliveryOutletId($outlet_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM `delivery` WHERE outlet_id = :outlet_id LIMIT 1");
        $query->bindParam(":outlet_id", $outlet_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

}
