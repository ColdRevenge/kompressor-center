<?php

class Tenders {

    public function add($name, $manager, $close_time) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO tenders (`name`, `manager`, close_time, created) VALUES 
            (:name, :manager, :close_time,  NOW())");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":manager", $manager, PDO::PARAM_STR, 255);
        $query->bindParam(":close_time", $close_time, PDO::PARAM_STR, 255);
        return $query->execute();
    }

    public function addProduct($tender_id, $product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO tender_products 
            (`tender_id`, `product_id`, created) VALUES (:tender_id, :product_id,  NOW())");
        $query->bindParam(":tender_id", $tender_id, PDO::PARAM_INT, 11);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Проверяет участие продукта в тендере 
     * Возврощяет id тендера, или false
     */
    public function getProductTender($tender_id, $product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT tender_id FROM tender_products WHERE 
         tender_id=:tender_id &&  product_id = :product_id && is_delete = 0");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":tender_id", $tender_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetch(PDO::FETCH_OBJ);
        if (isset($return->tender_id)) {
            return $return->tender_id;
        } else {
            return false;
        }
    }

    /**
     * Выводит все продукты (id-продукта - ключ массива), и тендоры в которых он участвует
     * Возврощяет id тендера, или false
     */
    public function getProductTenderAll() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT product_id, tenders.* FROM tender_products INNER JOIN tenders
            
WHERE status=0 && tender_id = tenders.id && tenders.is_delete = 0 && tender_products.is_delete = 0");
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();
        foreach ($return as $value) {
            $result[$value->product_id] = $value;
        }
        return $result;
    }

    /**
     * Возвращает продукты тендера
     * @param type $tender_id
     * @return type 
     */
    public function getTenderIdProducts($tender_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT products.*, tender_products.* FROM tender_products
INNER JOIN products ON (tender_products.tender_id = :tender_id && tender_products.is_delete = 0 && 
tender_products.product_id = products.id && products.is_delete = 0) ORDER BY products.name ASC
");
        $query->bindParam(":tender_id", $tender_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Возвращает все тендоры со статусом status_id
     * @param type $status_id
     * @return type 
     */
    public function getTenders($status_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT *,
            (SELECT COUNT(*) FROM tender_products WHERE tender_products.tender_id = tenders.id && tender_products.is_delete = 0) as `count`
            FROM tenders WHERE status = :status_id && is_delete = 0 ORDER BY created DESC");
        $query->bindParam(":status_id", $status_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getTenderId($tender_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM tenders WHERE id = :tender_id && is_delete = 0");
        $query->bindParam(":tender_id", $tender_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function setPriceFinishProduct($tender_id, $product_id, $price) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `tender_products` SET price_finish_product=:price WHERE tender_id=:tender_id && `product_id` = :product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":tender_id", $tender_id, PDO::PARAM_INT, 11);
        $query->bindParam(":price", $price, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setCountProduct($tender_id, $product_id, $count) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `tender_products` SET `count`=:count WHERE tender_id=:tender_id && `product_id` = :product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":tender_id", $tender_id, PDO::PARAM_INT, 11);
        $query->bindParam(":count", $count, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Изменение статуса тендера 
     */
    public function setStatusTender($tender_id, $status_id, $user_id = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `tenders` SET close_offer_user_id=:user_id, change_status=NOW(), status=:status_id WHERE id=:tender_id && is_delete=0");
        $query->bindParam(":status_id", $status_id, PDO::PARAM_INT, 11);
        $query->bindParam(":tender_id", $tender_id, PDO::PARAM_INT, 11);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->execute();
    }
    
    /**
     * Изменение статуса подтверждения пользователя для тендера 
     */
    public function setStatusUserAccept($tender_id, $user_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `tenders` SET close_accept_user=1 WHERE id=:tender_id && close_offer_user_id=:user_id &&  is_delete=0");
        $query->bindParam(":tender_id", $tender_id, PDO::PARAM_INT, 11);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Удаляет продукт из тендера
     * @param type $product_id 
     */
    public function delProductTender($product_id, $tender_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `tender_products` SET is_delete=1 WHERE tender_id=:tender_id && `product_id` = :product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":tender_id", $tender_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Удаляет тендер
     * @param type $id 
     */
    public function del($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `tenders` SET is_delete=1 WHERE `id` = :id LIMIT 1");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Проверяет, участие пользователя в тендере на продукт
     */
    public function isTenderProductUserOffer($tender_id, $user_id, $product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as `count` FROM tender_offer WHERE 
            tender_id = :tender_id && user_id = :user_id && product_id = :product_id && is_delete = 0");
        $query->bindParam(":tender_id", $tender_id, PDO::PARAM_INT, 11);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ)->count;
    }
    
    /**
     * Возвращает все предложения пользователей
     * @param type $user_id
     * @param type $tender_id
     * @return type 
     */
    public function getOfferTenderAllUser($tender_id, $status_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT products.name as product_name, tender_offer.* FROM tender_offer
            INNER JOIN products ON (products.id = tender_offer.product_id && tender_offer.is_delete = 0 && products.is_delete = 0 && 
 tender_offer.tender_id = :tender_id && tender_offer.status = :status_id)  ORDER BY products.name ASC");
        $query->bindParam(":tender_id", $tender_id, PDO::PARAM_INT, 11);
        $query->bindParam(":status_id", $status_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();
        foreach ($return as $key => $value) {
            $result[$value->user_id][$key] = $value;
        }
        return $result;
        ;
    }

    /**
     * Возвращает предложение пользователя
     * @param type $user_id
     * @param type $tender_id
     * @return type 
     */
    public function getOfferTenderUser($user_id, $tender_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT tender_products.`count` as product_count, products.name as product_name, tender_offer.* FROM tender_offer 
INNER JOIN products ON (products.id = tender_offer.product_id && tender_offer.is_delete = 0 && products.is_delete = 0 && 
 tender_offer.tender_id = :tender_id && tender_offer.user_id = :user_id) 
INNER JOIN tender_products ON (tender_products.tender_id = tender_offer.tender_id && 
tender_products.product_id = products.id && tender_products.is_delete=0)  
ORDER BY products.name ASC
");
        $query->bindParam(":tender_id", $tender_id, PDO::PARAM_INT, 11);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();
        foreach ($return as $value) {
            $result[$value->product_id] = $value;
        }
        return $result;
        ;
    }

    /**
     * Добавлет продукт к предложению 
     */
    public function addTenderProductOffer($tender_id, $user_id, $product_id, $count, $price, $comment) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO tender_offer 
            (`tender_id`, user_id, `product_id`, `count`, price, comment, created) VALUES 
            (:tender_id, :user_id, :product_id, :count, :price, :comment,  NOW())");
        $query->bindParam(":tender_id", $tender_id, PDO::PARAM_INT, 11);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":count", $count, PDO::PARAM_INT, 11);
        $query->bindParam(":price", $price, PDO::PARAM_INT, 11);
        $query->bindParam(":comment", $comment, PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * Изменяет продукт в предложении
     */
    public function setTenderProductOffer($tender_id, $user_id, $product_id, $count, $price, $comment) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `tender_offer` SET `count`=:count, price=:price, comment=:comment WHERE 
            `tender_id` = :tender_id && `user_id` = :user_id && `product_id` = :product_id LIMIT 1");

        $query->bindParam(":tender_id", $tender_id, PDO::PARAM_INT, 11);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":count", $count, PDO::PARAM_INT, 11);
        $query->bindParam(":price", $price, PDO::PARAM_INT, 11);
        $query->bindParam(":comment", $comment, PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * СОхраняет статус продуктов тендера
     * @param type $tender_id
     * @param type $user_id
     * @param type $product_id
     * @param type $status 
     */
    public function setStatusTenderProductOffer($tender_id, $user_id, $product_id, $status) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `tender_offer` SET status=:status WHERE 
             `tender_id` = :tender_id && `user_id` = :user_id && `product_id` = :product_id && is_delete=0");

        $query->bindParam(":status", $status, PDO::PARAM_INT, 11);
        $query->bindParam(":tender_id", $tender_id, PDO::PARAM_INT, 11);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Возвращает статус продуктов тендера
     * @param type $tender_id
     * @param type $user_id
     * @param type $product_id
     * @param type $status 
     */
    public function getStatusTenderProductOffer($tender_id, $user_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT status FROM `tender_offer` WHERE 
             `tender_id` = :tender_id && `user_id` = :user_id && is_delete=0 LIMIT 1");

        $query->bindParam(":tender_id", $tender_id, PDO::PARAM_INT, 11);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetch(PDO::FETCH_OBJ);
        if (isset($return->status)) {
            return $return->status;
        }
        else {
            return false;
        }
    }

    /**
     * Изменяет продукт в предложении
     */
    public function delTenderProductOffer($tender_id, $user_id, $product_id) {

        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `tender_offer` SET is_delete=1 WHERE 
             `tender_id` = :tender_id && `user_id` = :user_id && `product_id` = :product_id LIMIT 1");

        $query->bindParam(":tender_id", $tender_id, PDO::PARAM_INT, 11);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

}