<?php

class Delivery {

    /**
     * Бесплатная доставка, сумма
     * @return type
     */
    public function getDeliverySumFree() {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Delivery-getDeliverySumFree-', 'Delivery');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT MAX(free_sum) as max_free_sum FROM `delivery` WHERE 1 GROUP BY id ORDER BY max_free_sum DESC");
            $query->execute();

            $return = $query->fetch(PDO::FETCH_OBJ);
            $cache->setTags('Delivery-getDeliverySumFree-', $return->max_free_sum, 'Delivery');
            return $return->max_free_sum;
        } else {
            return $get_cache;
        }
    }
    
    public function getDeliveryAll() {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Delivery-getDeliveryAll-', 'Delivery');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM `delivery` WHERE is_delete = 0 ORDER BY `order` ASC");
            $query->execute();

            $return = $query->fetchAll(PDO::FETCH_OBJ);
  
            $cache->setTags('Delivery-getDeliveryAll-', $return, 'Delivery');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getDelivery() {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Delivery-getDelivery-', 'Delivery');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM `delivery` WHERE is_delete = 0 ORDER BY `order` ASC");
            $query->execute();

            $return = $query->fetchAll(PDO::FETCH_OBJ);
            $result_arr = array();
            foreach ($return as $key => $value) {
                $result_arr[$value->parent_id][] = $value;
            }
            $cache->setTags('Delivery-getDelivery-', $result_arr, 'Delivery');
            return $result_arr;
        } else {
            return $get_cache;
        }
    }

    public function getDeliveryChild($delivery_id) {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Delivery-getDeliveryChild-' . $delivery_id, 'Delivery');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM `delivery` WHERE is_delete = 0 && parent_id=:delivery_id ORDER BY `order` ASC");
            $query->bindParam(":delivery_id", $delivery_id, PDO::PARAM_INT, 11);
            $query->execute();

            $return = $query->fetchAll(PDO::FETCH_OBJ);
            $cache->setTags('Delivery-getDeliveryChild-' . $delivery_id, $return, 'Delivery');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getDeliveryId($id) {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Delivery-getDeliveryId-' . $id, 'Delivery');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM `delivery` WHERE is_delete = 0 && id=:id");
            $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);
            $cache->setTags('Delivery-getDeliveryId-' . $id, $return, 'Delivery');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function setIcon($id, $icon) {
        $registry = Registry::getInstance();

        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Delivery');

        $query = $registry->db->prepare("UPDATE `delivery` SET icon=:icon  WHERE id=:id");
        $query->bindParam(":icon", $icon, PDO::PARAM_STR, 255);
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
        return true;
    }

    public function setDelivery($id, $name, $order, $price, $free_sum, $from_day, $to_day, $info) {
        $registry = Registry::getInstance();

        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Delivery');

        $query = $registry->db->prepare("UPDATE `delivery` SET free_sum=:free_sum, name=:name, from_day=:from_day, to_day=:to_day, info=:info, `order`=:order, price=:price  WHERE id=:id");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":price", $price, PDO::PARAM_INT, 11);
        $query->bindParam(":from_day", $from_day, PDO::PARAM_INT, 11);
        $query->bindParam(":to_day", $to_day, PDO::PARAM_INT, 11);
        $query->bindParam(":free_sum", $free_sum, PDO::PARAM_INT, 11);
        $query->bindParam(":info", $info, PDO::PARAM_STR);
        $query->execute();
        return true;
    }

    public function delDelivery($id) {
        $registry = Registry::getInstance();

        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Delivery');

        $query = $registry->db->prepare("UPDATE `delivery` SET is_delete=1  WHERE id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();

        return true;
    }

    public function delIcon($id) {
        $registry = Registry::getInstance();

        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Delivery');

        $query = $registry->db->prepare("UPDATE `delivery` SET icon=''  WHERE id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();

        return true;
    }

    public function addDelivery($name, $order, $price, $from_day, $to_day, $info, $parent_id) {

        $registry = Registry::getInstance();

        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Delivery');

        $query = $registry->db->prepare("INSERT INTO `delivery` (name, `order`, price, from_day, to_day, info, parent_id) 
            VALUES (:name, :order, :price, :from_day, :to_day, :info, :parent_id)");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":price", $price, PDO::PARAM_INT, 11);
        $query->bindParam(":from_day", $from_day, PDO::PARAM_INT, 11);
        $query->bindParam(":parent_id", $parent_id, PDO::PARAM_INT, 11);
        $query->bindParam(":to_day", $to_day, PDO::PARAM_INT, 11);
        $query->bindParam(":info", $info, PDO::PARAM_STR);
        $query->execute();
        return $registry->db->lastInsertId();
    }

}
