<?php

class Coupons {

    /**
     * Возвращает по номеру кона новую цену
     * @param type $coupon_code
     */
    public function getCouponSum($coupon_code) {
        $registry = Registry::getInstance();
        $get_basket = $this->getBasketAll($registry->session_id);

 

        $sum = 0;
        $all_sum = 0;
        foreach ($get_basket as $value) { //Ищем общую сумму заказа, для прохождения поля мин.стоимость заказа
            $all_sum += $value->price;
            //Показать в обычном магазине
            $sum += $this->getPriceCouponProduct(trim($coupon_code), $value->price, $value->category_id);
//         
        }

//echo $sum . '#';
        if ($sum < $all_sum) {
            return $sum;
        } else {
            return false;
        }
    }

    public function getBasketAll($session_id) {
        $registry = Registry::getInstance();

        $query = $registry->db->prepare("SELECT basket.*, 
            (SELECT id FROM  category WHERE products.category_1_id = category.id) as category_id
            
            FROM basket 
            INNER JOIN product_mod ON (basket.mod_id = product_mod.id)
            INNER JOIN products ON (products.id = basket.product_id && products.is_delete = 0 
            && products.is_active = 1 &&  basket.session_id = :session_id && product_mod.product_id = products.id)");
        $query->bindParam(":session_id", $session_id, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Возвращает новую стоимость товара по купону
     * @param type $code
     * @param type $all_sum
     * @param type $category_id
     */
    public function getPriceCouponProduct($code, $sum, $category_id) {
        $registry = Registry::getInstance();
        /**
         * Поиск по коду наёдишника купона
         */
        $query_code = $registry->db->prepare("SELECT coupon_id FROM coupons_code WHERE code = :code && 
                        ((SELECT COUNT(*) FROM coupons_category WHERE coupons_category.coupon_id=coupons_code.coupon_id && category_id = :category_id))");
        $query_code->bindParam(":code", $code, PDO::PARAM_STR, 255);
        $query_code->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query_code->execute();
        $return_code = $query_code->fetch(PDO::FETCH_OBJ);
        if (isset($return_code->coupon_id)) { //Если купон найден
            /**
             * Проверка товаров
             */
            /**
             * Проверка условий купона
             */
            $query = $registry->db->prepare("SELECT * FROM coupons WHERE UNIX_TIMESTAMP(NOW()) <= end_date && min_sum <= :all_sum && is_active = 1 && is_delete = 0 && (coupons.id=:coupon_id)");
            $query->bindParam(":coupon_id", $return_code->coupon_id, PDO::PARAM_INT, 11);
            $query->bindParam(":all_sum", $sum, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);
            if (isset($return->id)) { //Если купон подходит для товара
                if ($return->discount_sum > 0) { //Если купон по руб.
                    return ($sum - $return->discount_sum);
                } elseif ($return->discount_procent > 0) { //Если купон %
                    return ($sum * ((100 - $return->discount_procent) / 100));
                } else {
                    return $sum;
                }
            } else {
                return $sum;
            }
        } else { //Если купон не найден
            return $sum;
        }
    }

    public function getCoupons() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM coupons WHERE is_delete = 0 ORDER BY  `created` ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCouponCategory($coupon_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM  coupons_category WHERE coupon_id=:coupon_id");
        $query->bindParam(":coupon_id", $coupon_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCouponOnCode($coupon_code) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM coupons_code WHERE code=:coupon_code");
        $query->bindParam(":coupon_code", $coupon_code, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function setCouponUser($user_id, $coupon_code_id) {
        $registry = Registry::getInstance();
        $cac = Cache::getInstance();
        $cac->deleteTag('Users');

        $query = $registry->db->prepare("UPDATE users SET coupon_code_id = :coupon_code_id WHERE id = :user_id");
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":coupon_code_id", $coupon_code_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Прибавляет к купону сумму всех заказов пользователя
     * @param type $sum
     * @param type $coupon_code_id
     */
    public function setCouponUserSum($sum, $coupon_code_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE coupons_code SET `sum` = `sum` + :sum WHERE id = :coupon_code_id");
        $query->bindParam(":sum", $sum, PDO::PARAM_INT, 11);
        $query->bindParam(":coupon_code_id", $coupon_code_id, PDO::PARAM_INT, 11);
        $query->execute();
        $this->changeCouponIdSum($coupon_code_id);
    }

    /**
     * Меняет купон у кода если достигнута определенная сумма
     */
    public function changeCouponIdSum($coupon_code_id) {
        $get_coupon = $this->getCouponCodeId($coupon_code_id);
        if (isset($get_coupon->id)) {
            $registry = Registry::getInstance();
            $query = $registry->db->prepare("SELECT * FROM coupons WHERE :sum >= code_next_sum && code_next_coupon_id != 0 ORDER BY code_next_sum DESC");
            $query->bindParam(":sum", $get_coupon->sum, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);
            if (isset($return->code_next_coupon_id)) {
                $registry = Registry::getInstance();
                $query1 = $registry->db->prepare("UPDATE coupons_code SET coupon_id=:coupon_id WHERE id = :coupon_code_id");
                $query1->bindParam(":coupon_code_id", $coupon_code_id, PDO::PARAM_INT, 11);
                $query1->bindParam(":coupon_id", $return->code_next_coupon_id, PDO::PARAM_INT, 11);
                $query1->execute();
            }
        }
    }

    public function setCouponUserSumMinus($sum, $coupon_code_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE coupons_code SET `sum` = `sum` - :sum WHERE id = :coupon_code_id");
        $query->bindParam(":sum", $sum, PDO::PARAM_INT, 11);
        $query->bindParam(":coupon_code_id", $coupon_code_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Возвращает самый низкий купон (по %-там)
     * @return type
     */
    public function getCouponPercentMin() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM coupons WHERE is_active=1 && is_delete=0 ORDER BY discount_procent ASC");
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getCouponCodeId($coupon_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM coupons_code WHERE id=:coupon_id");
        $query->bindParam(":coupon_id", $coupon_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getCouponUserAllCode() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM users WHERE coupon_code_id != 0 ORDER BY `login` ASC");
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();
        foreach ($return as $key => $value) {
            $result[$value->coupon_code_id][] = $value;
        }
        return $result;
    }

    public function getCouponCodeAll($coupon_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM coupons_code WHERE coupon_id=:coupon_id ORDER BY `code` ASC");
        $query->bindParam(":coupon_id", $coupon_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCouponId($coupon_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM coupons WHERE is_delete = 0 && id=:coupon_id");
        $query->bindParam(":coupon_id", $coupon_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function addCoupons($name, $type, $discount_sum, $discount_procent, $min_sum, $end_date) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO coupons (created, name, `type`, discount_sum, discount_procent, min_sum, end_date) "
                . "VALUES(NOW(), :name, :type, :discount_sum, :discount_procent, :min_sum, :end_date)");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":discount_sum", $discount_sum, PDO::PARAM_INT, 11);
        $query->bindParam(":discount_procent", $discount_procent, PDO::PARAM_INT, 11);
        $query->bindParam(":min_sum", $min_sum, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function setCoupons($coupon_id, $name, $type, $discount_sum, $discount_procent, $min_sum, $end_date) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE coupons SET name = :name, `type` = :type, discount_sum = :discount_sum, discount_procent = :discount_procent, "
                . "min_sum = :min_sum, end_date = :end_date WHERE id = :coupon_id");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":discount_sum", $discount_sum, PDO::PARAM_INT, 11);
        $query->bindParam(":discount_procent", $discount_procent, PDO::PARAM_INT, 11);
        $query->bindParam(":min_sum", $min_sum, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->bindParam(":coupon_id", $coupon_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setNextCoupon($coupon_id, $code_next_sum, $code_next_coupon_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE coupons SET code_next_sum=:code_next_sum, code_next_coupon_id=:code_next_coupon_id WHERE is_delete = 0 && id=:coupon_id");
        $query->bindParam(":coupon_id", $coupon_id, PDO::PARAM_INT, 11);
        $query->bindParam(":code_next_sum", $code_next_sum, PDO::PARAM_INT, 11);
        $query->bindParam(":code_next_coupon_id", $code_next_coupon_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setActive($coupon_id, $is_active) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE coupons SET is_active=:is_active WHERE is_delete = 0 && id=:coupon_id");
        $query->bindParam(":coupon_id", $coupon_id, PDO::PARAM_INT, 11);
        $query->bindParam(":is_active", $is_active, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function addCouponsCode($code, $coupon_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO coupons_code(`code`, coupon_id) VALUES(:code, :coupon_id)");
        $query->bindParam(":code", $code, PDO::PARAM_INT, 11);
        $query->bindParam(":coupon_id", $coupon_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function addCouponsCategory($category_id, $coupon_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO coupons_category(category_id, coupon_id) VALUES(:category_id, :coupon_id)");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":coupon_id", $coupon_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function delCouponsCategoryAll($coupon_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM coupons_code WHERE coupon_id = :coupon_id");
        $query->bindParam(":coupon_id", $coupon_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Удаление кодов с исключением
     * @param type $coupon_id
     * @param type $exception
     */
    public function delCouponsNotException($coupon_id, Array $exception_id_arr = array()) {
        $registry = Registry::getInstance();
        $exception_where = null;
        foreach ($exception_id_arr as $code_id => $value) {
            $exception_where .= "id != $code_id && ";
        }
        if (!is_null($exception_where)) {
            $exception_where = "&& (" . trim($exception_where, ' &') . ")";
        }

        $query = $registry->db->prepare("DELETE FROM coupons_code WHERE coupon_id = :coupon_id $exception_where");
        $query->bindParam(":coupon_id", $coupon_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function delCouponsCodeAll($coupon_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM coupons_category WHERE coupon_id = :coupon_id");
        $query->bindParam(":coupon_id", $coupon_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function delCoupon($coupon_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM coupons WHERE id = :coupon_id");
        $query->bindParam(":coupon_id", $coupon_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    //coupons_category
}
