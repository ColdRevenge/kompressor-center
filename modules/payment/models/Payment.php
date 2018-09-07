<?php

class Payment {

    public function add($sum, $method, $order_id, $signature, $desc) {
        $registry = Registry::getInstance();
        $ip = ip2long($_SERVER['REMOTE_ADDR']);
        $query = $registry->db->prepare("INSERT INTO payment (created, `method`, `sum`, order_id, signature, `desc`, ip, is_paid)
		VALUES (NOW(), :method, :sum, :order_id, :signature, :desc, :ip, 0)");
        $query->bindParam(":sum", $sum, PDO::PARAM_INT);
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":signature", $signature, PDO::PARAM_STR, 255);
        $query->bindParam(":method", $method, PDO::PARAM_STR, 255);
        $query->bindParam(":desc", $desc, PDO::PARAM_STR);
        $query->bindParam(":ip", $ip, PDO::PARAM_INT, 11);
        $query->execute();
        
        return $registry->db->lastInsertId();
    }

    /**
     * Удаляет все лишние  
     */
    public function delPaymentNotPaid($order_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM payment WHERE order_id=:order_id && is_paid=0");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setSignature($id, $signature) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE payment SET signature=:signature WHERE  id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->bindParam(":signature", $signature, PDO::PARAM_STR, 255);
        $query->execute();
    }

    /**
     * Устанавливает статус платежа 
     * @param type $is_paid - 1 - успешно, 2 - отказ
     * @param type $sum
     * @param type $order_id
     * @param type $signature 
     */
    public function setPaid($is_paid, $sum, $order_id, $signature_close) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE payment SET is_paid=:is_paid, 
            signature_close = :signature_close WHERE 
            ROUND(`sum`, 2) = ROUND(:sum, 2)&& order_id=:order_id");
        $query->bindParam(":is_paid", $is_paid, PDO::PARAM_INT, 11);
        $query->bindParam(":sum", $sum, PDO::PARAM_INT);
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":signature_close", $signature_close, PDO::PARAM_STR, 255);
        $query->execute();
    }

    /**
     * Выставляет что платеж проведен
     * @param type $sum
     * @param type $order_id 
     */
    public function setIsResultPay($sum, $order_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE payment SET is_result_pay=1 WHERE 
            ROUND(`sum`, 2) = ROUND(:sum, 2)&& id=:order_id");
        $query->bindParam(":sum", $sum, PDO::PARAM_INT);
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function getPaymentMethods() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM payment_method WHERE  is_active=1 && is_delete = 0");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getPaymentMethodId($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM payment_method WHERE id=:id && is_active=1 && is_delete = 0");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
    
        /**
     * 
     * @param type $order_id
     * @param type $is_paid - если 1 - то оплачено, 2 - отказ
     * @return type
     */
    public function getOrderPaid($order_id,  $is_paid) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM `payment` WHERE order_id=:order_id  && is_paid=:is_paid");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":is_paid", $is_paid, PDO::PARAM_BOOL);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

}
