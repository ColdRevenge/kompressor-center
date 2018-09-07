<?php

class Currency {

    public function getDefaultCurrency() {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Currency-getDefaultCurrency-', 'Currency');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM currency WHERE is_default = 1 && is_delete=0");
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);

            $cache->setTags('Currency-getDefaultCurrency-', $return, 'Currency');
        } else {
            $return = $get_cache;
        }

        if (isset($return->id)) { //Если валюта по-умолчанию указана
            return $return;
        } else {
            $return = $this->getCurrencies();
            foreach ($return as $value) {
                return $value;
            }
        }
    }

    /**
     * Устанавливает валюту по-умолчанию для пользователя
     * @param type $currency_id
     * @param type $user_id 
     */
    public function setDefaultCurrencyUser($currency_id, $user_id) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Currency');

        $query = $registry->db->prepare("UPDATE users SET `default_currency_id`=:currency_id  WHERE id=:user_id");
        $query->bindParam(":currency_id", $currency_id, PDO::PARAM_INT, 11);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function getCurrencyId($id) {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Currency-getCurrencyId-' . $id, 'Currency');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM currency WHERE id=:id && is_delete=0");
            $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);

            $cache->setTags('Currency-getCurrencyId-' . $id, $return, 'Currency');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getCurrencies() {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Currency-getCurrencies-', 'Currency');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM currency WHERE is_delete=0 ORDER BY `order` ASC");
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            $cache->setTags('Currency-getCurrencies-', $return, 'Currency');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function addCurrency($name, $code, $exchange, $order, $is_default) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Currency');

        $query = $registry->db->prepare("INSERT INTO currency (`name`, `code`, exchange, `order`, is_default) VALUES (:name, :code, :exchange, :order, :is_default)");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":code", $code, PDO::PARAM_STR, 255);
        $query->bindParam(":exchange", $exchange, PDO::PARAM_INT, 11);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":is_default", $is_default, PDO::PARAM_INT, 11);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function getMaxOrder() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT `order`  FROM currency WHERE is_delete = 0 ORDER BY `order` DESC LIMIT 1");

        $query->execute();
        $return = $query->fetch(PDO::FETCH_OBJ);

        if (isset($return->order)) {
            return $return->order + 1;
        } else {
            return 0;
        }
    }

    public function setCurrency($id, $name, $code, $exchange, $order, $is_default) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Currency');

        $query = $registry->db->prepare("UPDATE currency SET 
            `name`=:name, `code`=:code, exchange=:exchange, `order`=:order, is_default=:is_default
            WHERE id=:id");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":code", $code, PDO::PARAM_STR, 255);
        $query->bindParam(":exchange", $exchange, PDO::PARAM_INT, 11);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":is_default", $is_default, PDO::PARAM_INT, 11);
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function delCurrency($id) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Currency');

        $query = $registry->db->prepare("UPDATE currency SET is_delete=1 WHERE id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }

}

?>
