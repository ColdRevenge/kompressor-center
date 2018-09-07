<?php

class Order {

    /**
     * Подробное содержание корзины
     */
    public function add(Basket $basket, $get_basket, $currency_id, $exchange, $fio, $phone, $email, $city, $city_index, $adress, $metro_id, $delivery_id, $delivery_child_id, $payment_method_id, $comment, $user_id, $sum_order, $sum_delivery, $sum_discount, $sum_total, $coupon, $coupon_discount_sum, $discount_sum, $discount_procent, $session_id) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Products", "products");

        $products = new Products();

//        if (!empty($_POST['delivery_type'])) {
//            $delivery_id = 8;
//        }

        $registry->db->query("START TRANSACTION");
        $order_id = $this->addOrder($currency_id, $exchange, $fio, $phone, $email, $city, $city_index, $adress, $metro_id, $delivery_id, $delivery_child_id, $payment_method_id, $comment, $user_id, $sum_order, $sum_delivery, $sum_discount, $sum_total, $coupon, $coupon_discount_sum, $discount_sum, $discount_procent, $session_id);

        foreach ($get_basket as $value) { //Уменьшаем кол-во продуктов на складе
            $products->WarehouseMinus($value->mod_id);
            $this->addProductOrder($value->price, $value->product_id, $value->mod_id, $value->b2b_num, $value->image_id, $order_id, $value->char_1_id, $value->char_2_id, $value->char_3_id, $user_id, $value->is_credit);
        }



//        Lavra_Loader::LoadModels("CheckOut", "delivery");
//        $checkout = new CheckOut();
//        $checkout->sendOrder($order_id, $_POST['delivery_id'], $_POST['fias_id'], ($_POST['city_index']), $_POST['fias_street_id'], ($_POST['street']), ($_POST['house']), ($_POST['housing']), ($_POST['building']), ($_POST['appartment']), $_POST['delivery_type'], $_POST['delivery_addressPvz'], $_POST['delivery_cost'], $_POST['delivery_minTerm'], $_POST['delivery_maxTerm'], ($fio), ($_POST['email']), (Application::transPhoneNumb($_POST['phone'])), ($_POST['comment']));


        $basket->clearAll($registry->session_id); //Очищаем корзину

        $registry->db->query("COMMIT");
        return $order_id;
    }

    public function addOrder($currency_id, $exchange, $fio, $phone, $email, $city, $city_index, $adress, $metro_id, $delivery_id, $delivery_child_id, $payment_method_id, $comment, $user_id, $sum_order, $sum_delivery, $sum_discount, $sum_total, $coupon, $coupon_discount_sum, $discount_sum, $discount_procent, $session_id) {
        $registry = Registry::getInstance();
        $registry->db->query("START TRANSACTION");
        $query = $registry->db->prepare("INSERT INTO `order` (`created`, change_status, session_id, `fio`, `phone`, `email`, city, city_index, `adress`, `metro_id`, `delivery_id`, delivery_child_id, `comment`, `user_id`, sum_order, sum_delivery, sum_discount, sum_total, coupon, coupon_discount_sum, discount_sum, discount_procent, currency_id, payment_method_id, exchange) VALUES (NOW(), NOW(), :session_id, :fio, :phone, :email, :city, :city_index, :adress, :metro_id, :delivery_id, :delivery_child_id, :comment, :user_id, :sum_order, :sum_delivery, :sum_discount, :sum_total, :coupon, :coupon_discount_sum, :discount_sum, :discount_procent, :currency_id, :payment_method_id, :exchange)");
        $query->bindParam(":fio", $fio, PDO::PARAM_STR, 255);
        $query->bindParam(":phone", $phone, PDO::PARAM_STR, 255);
        $query->bindParam(":email", $email, PDO::PARAM_STR, 255);
        $query->bindParam(":session_id", $session_id, PDO::PARAM_STR, 255);
        $query->bindParam(":city", $city, PDO::PARAM_STR, 255);
        $query->bindParam(":city_index", $city_index, PDO::PARAM_STR, 255);
        $query->bindParam(":adress", $adress, PDO::PARAM_STR);


        $query->bindParam(":metro_id", $metro_id, PDO::PARAM_INT, 11);
        $query->bindParam(":exchange", $exchange, PDO::PARAM_INT, 11);
        $query->bindParam(":currency_id", $currency_id, PDO::PARAM_INT, 11);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":delivery_id", $delivery_id, PDO::PARAM_INT, 11);
        $query->bindParam(":delivery_child_id", $delivery_child_id, PDO::PARAM_INT, 11);
        $query->bindParam(":discount_sum", Application::checkPrice($discount_sum), PDO::PARAM_INT, 11);
        $query->bindParam(":discount_procent", Application::checkPrice($discount_procent), PDO::PARAM_INT, 11);
        $query->bindParam(":payment_method_id", $payment_method_id, PDO::PARAM_INT, 11);
        $query->bindParam(":comment", $comment, PDO::PARAM_STR);
        $query->bindParam(":sum_order", Application::checkPrice($sum_order), PDO::PARAM_INT, 11);
        $query->bindParam(":sum_delivery", Application::checkPrice($sum_delivery), PDO::PARAM_INT, 11);
        $query->bindParam(":sum_discount", Application::checkPrice($sum_discount), PDO::PARAM_INT, 11);
        $query->bindParam(":sum_total", Application::checkPrice($sum_total), PDO::PARAM_INT, 11);
        $query->bindParam(":coupon", $coupon, PDO::PARAM_STR);
        $query->bindParam(":coupon_discount_sum", Application::checkPrice($coupon_discount_sum), PDO::PARAM_INT, 11);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    /**
     * Устанавливает id-шник 1С для заказа
     * id_1c - внутренний номер заказа
     * order_id_1c - номер заказа в 1С
     */
    public function setId1COrder($order_id, $id_1c, $order_id_1c = '') {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order` SET `id_1c` = :id_1c, order_id_1c=:order_id_1c WHERE `order`.id = :order_id && is_delete=0 LIMIT 1");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":id_1c", $id_1c, PDO::PARAM_STR, 255);
        $query->bindParam(":order_id_1c", $order_id_1c, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function setOrderCreated($order_id, $created) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order` SET `created` = :created WHERE `order`.id = :order_id && is_delete=0 LIMIT 1");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":created", $created, PDO::PARAM_STR, 255);
        $query->execute();
    }

    /**
     * Возвращает заказ по id-шнику
     */
    public function getOrderId1c($id_1c) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT *  FROM `order`  WHERE id_1c = :id_1c");
        $query->bindParam(":id_1c", $id_1c, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Устанавливает реквизиты для заказа
     */
    public function setRequisitesOrder($order_id, $company_name, $company_fax, $company_inn, $company_ur_adress, $company_bank, $company_bik, $company_rs, $company_ks, $company_kpp, $company_okpo, $company_oknx, $company_fio_director, $company_fio_accountant, $is_jur_person) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order` SET  company_name=:company_name, company_fax=:company_fax, company_inn=:company_inn, company_ur_adress=:company_ur_adress, company_bank=:company_bank, company_bik=:company_bik, company_rs=:company_rs, company_ks=:company_ks, company_kpp=:company_kpp, company_okpo=:company_okpo, company_oknx=:company_oknx, company_fio_director=:company_fio_director, company_fio_accountant=:company_fio_accountant, is_jur_person=:is_jur_person WHERE id=:order_id LIMIT 1");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam("company_name", $company_name, PDO::PARAM_STR, 255);
        $query->bindParam("company_fax", $company_fax, PDO::PARAM_STR, 255);
        $query->bindParam("company_inn", $company_inn, PDO::PARAM_STR, 255);
        $query->bindParam("company_ur_adress", $company_ur_adress, PDO::PARAM_STR, 255);
        $query->bindParam("company_bank", $company_bank, PDO::PARAM_STR, 255);
        $query->bindParam("company_bik", $company_bik, PDO::PARAM_STR, 255);
        $query->bindParam("company_rs", $company_rs, PDO::PARAM_STR, 255);
        $query->bindParam("company_ks", $company_ks, PDO::PARAM_STR, 255);
        $query->bindParam("company_kpp", $company_kpp, PDO::PARAM_STR, 255);
        $query->bindParam("company_okpo", $company_okpo, PDO::PARAM_STR, 255);
        $query->bindParam("company_oknx", $company_oknx, PDO::PARAM_STR, 255);
        $query->bindParam("company_fio_director", $company_fio_director, PDO::PARAM_STR, 255);
        $query->bindParam("company_fio_accountant", $company_fio_accountant, PDO::PARAM_STR, 255);
        $query->bindParam("is_jur_person", $is_jur_person, PDO::PARAM_INT, 5);
        $query->execute();
    }

    /**
     * Добавляет к заказу продукты (для вывода админимтратором)
     */
    public function addProductOrder($price, $product_id, $mod_id, $b2b_num, $image_id, $order_id, $char_1_id, $char_2_id, $char_3_id, $user_id, $is_credit = 0) {
        $registry = Registry::getInstance();
        
        Lavra_Loader::LoadClass("Application");
        $query = $registry->db->prepare("INSERT INTO `order_products` 
              (price, b2b_num, product_id, image_id, order_id, user_id, mod_id, char_1_id, char_2_id, char_3_id, is_credit) VALUES (:price, :b2b_num, :product_id, :image_id, :order_id, :user_id, :mod_id, :char_1_id, :char_2_id, :char_3_id, :is_credit)");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":mod_id", $mod_id, PDO::PARAM_INT, 11);
        $query->bindParam(":image_id", $image_id, PDO::PARAM_INT, 11);
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":b2b_num", $b2b_num, PDO::PARAM_INT, 11);
        $query->bindParam(":price", Application::checkPrice($price), PDO::PARAM_INT, 11);
        $query->bindParam(":char_1_id", $char_1_id, PDO::PARAM_INT, 11);
        $query->bindParam(":char_2_id", $char_2_id, PDO::PARAM_INT, 11);
        $query->bindParam(":char_3_id", $char_3_id, PDO::PARAM_INT, 11);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":is_credit", $is_credit, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Изменяет стоимость заказа без учета скидки
     * @param type $order_id
     * @param type $sum
     */
    public function setOrderSum($order_id, $sum_order) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order` SET `sum_order` = :sum_order WHERE `order`.id = :order_id && is_delete=0 LIMIT 1");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":sum_order", $sum_order, PDO::PARAM_INT, 11);
        $query->execute();
    }
    public function setOrderShopType($order_id, $shop_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order` SET `shop_id` = :shop_id WHERE `order`.id = :order_id && is_delete=0 LIMIT 1");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->execute();
    }
    
    /**
     * Прикрепляет заказ к пользователю
     * @param type $order_id
     * @param type $user_id
     */
    public function setOrderUserId($order_id, $user_id) {
        $registry = Registry::getInstance();
        
        // $registry->setting_obj->sendOrderStatusSMS($order_id, $status_id);
        
        $query = $registry->db->prepare("UPDATE `order` SET user_id=:user_id WHERE `order`.id = :order_id && is_delete=0 LIMIT 1");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->execute();
        $query1 = $registry->db->prepare("UPDATE `order_products` SET user_id=:user_id WHERE order_id = :order_id && is_delete=0 LIMIT 1");
        $query1->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query1->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query1->execute();
    }
    /**
     * Изменяет стоимость заказа c учетом скидки
     * @param type $order_id
     * @param type $sum_discount
     */
    public function setOrderDiscountSum($order_id, $sum_discount) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order` SET `sum_discount` = :sum_discount WHERE `order`.id = :order_id && is_delete=0 LIMIT 1");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":sum_discount", $sum_discount, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Изменяет итоговую стоимость доставки
     * @param type $order_id
     * @param type $sum_discount
     */
    public function setOrderTotalSum($order_id, $sum_total, $sum_expense) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order` SET `sum_total` = :sum_total, sum_expense = :sum_expense WHERE `order`.id = :order_id && is_delete=0 LIMIT 1");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":sum_total", $sum_total, PDO::PARAM_INT, 11);
        $query->bindParam(":sum_expense", $sum_expense, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Изменяет скидку заказа
     * @param type $order_id
     * @param type $sum
     */
    public function setOrderDiscount($order_id, $discount_procent, $discount_sum) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order` SET `discount_procent` = :discount_procent, discount_sum = :discount_sum WHERE `order`.id = :order_id && is_delete=0 LIMIT 1");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":discount_procent", $discount_procent, PDO::PARAM_INT, 11);
        $query->bindParam(":discount_sum", $discount_sum, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Изменяет стоимость доставки заказа
     * @param type $order_id
     * @param type $sum
     */
    public function setOrderDeliverySum($order_id, $sum_delivery) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order` SET `sum_delivery` = :sum_delivery WHERE `order`.id = :order_id && is_delete=0 LIMIT 1");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":sum_delivery", $sum_delivery, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Изменяет стоимость товаров в заказе
     * @param type $order_id
     * @param type $product_id
     * @param type $price
     */
    public function setOrderPriceProduct($order_id, $product_id, $price) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order_products` SET `price` = :price WHERE order_id = :order_id && product_id = :product_id && is_delete=0 ");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":price", $price, PDO::PARAM_INT, 11);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Устанавливает оплачен заказ или нет
     */
    public function setIsPayment($order_id, $is_payment) {
        $registry = Registry::getInstance();
        if ($is_payment == 1) {
            $query = $registry->db->prepare("UPDATE `order` SET `is_payment` = 1 WHERE `order`.id = :order_id && is_delete=0 LIMIT 1");
            $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
            $query->execute();
        } else {
            $query = $registry->db->prepare("UPDATE `order` SET `is_payment` = 0 WHERE `order`.id = :order_id && is_delete=0 LIMIT 1");
            $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
            $query->execute();
        }
    }
        public function setPaymentSum($order_id, $payment_sum) {
        $registry = Registry::getInstance();
            $query = $registry->db->prepare("UPDATE `order` SET `payment_sum` = :payment_sum WHERE `order`.id = :order_id && is_delete=0 LIMIT 1");
            $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
            $query->bindParam(":payment_sum", $payment_sum, PDO::PARAM_INT, 11);
            $query->execute();
        
    }

    /**
     * Устанавливает статус заказа
     */
    public function setStatus($order_id, $status_id) {
        $registry = Registry::getInstance();

        $query = $registry->db->prepare("UPDATE `order` SET status_id=:status_id, change_status = NOW() WHERE `order`.id = :order_id && is_delete=0 LIMIT 1");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":status_id", $status_id, PDO::PARAM_INT, 11);
        $query->execute();

        if ($status_id == 12) { //Пересчитываем купоны
            Lavra_Loader::LoadModels("Coupons", "discount");
            $coupons = new Coupons();
            $order = $this->getOrderId($order_id);
            if (!empty($order->coupon)) {
                $get_coupon = $coupons->getCouponOnCode(trim($order->coupon));
                if (isset($get_coupon->id)) {
                    if ($order->sum_order > 0) {
                        $coupons->setCouponUserSum($order->sum_order, $get_coupon->id);
                    }
                }
            }
            if (!empty($order->post_code)) {
                Lavra_Loader::getLoadModule('delivery', '/xadmin/delivery/gdeposulka/archive/' . $order->id . '/' . $order->post_code . '/');
            }
        }
        if (isset($registry->get_user->id) && $status_id == 12) { //Ставим манагера того кто выполнил заказ
            $this->setOrderManager($order_id, $registry->get_user->id);
        }
        $registry->setting_obj->sendOrderStatusSMS($order_id, $status_id);
    }

    public function setCommentAdmin($order_id, $comment_admin) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order` SET comment_admin=:comment_admin WHERE `order`.id = :order_id  LIMIT 1");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":comment_admin", $comment_admin, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setPaymentMethodId($order_id, $payment_method_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order` SET payment_method_id=:payment_method_id WHERE `order`.id = :order_id  LIMIT 1");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":payment_method_id", $payment_method_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setOrderManager($order_id, $manager_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order` SET manager_id=:manager_id WHERE `order`.id = :order_id LIMIT 1");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":manager_id", $manager_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setPostCode($order_id, $post_code) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order` SET `post_code`=:post_code WHERE `order`.id = :order_id  LIMIT 1");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":post_code", $post_code, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setDelivery($order_id, $delivery_id, $delivery_child_id = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order` SET delivery_id=:delivery_id, delivery_child_id=:delivery_child_id WHERE `order`.id = :order_id  LIMIT 1");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":delivery_id", $delivery_id, PDO::PARAM_INT, 11);
        $query->bindParam(":delivery_child_id", $delivery_child_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setOrderContactInfo($order_id, $fio, $phone, $email, $city, $city_index, $adress, $comment, $metro_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order` SET `fio` = :fio, `phone` = :phone, `email` = :email, city=:city, city_index=:city_index, `adress` = :adress, `comment` = :comment, metro_id=:metro_id
WHERE `order`.id = :order_id  LIMIT 1");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":metro_id", $metro_id, PDO::PARAM_INT, 11);
        $query->bindParam(":fio", $fio, PDO::PARAM_STR, 255);
        $query->bindParam(":phone", $phone, PDO::PARAM_STR, 255);
        $query->bindParam(":email", $email, PDO::PARAM_STR, 255);
        $query->bindParam(":city", $city, PDO::PARAM_STR, 255);
        $query->bindParam(":city_index", $city_index, PDO::PARAM_STR, 255);
        $query->bindParam(":adress", $adress, PDO::PARAM_STR, 255);
        $query->bindParam(":comment", $comment, PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * Возвращает существующие все статусы
     */
    public function getStatus() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM order_status WHERE is_delete = 0 ORDER BY `order` ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Возвращает все заказы в краце, для детального просмотра в заказах
     * По акшену
     */
    public function getOrderStatusAction($action_id, $manager_id = 0, $is_visible_unassigned_order = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT `order`.*, order_status.name AS status_name, order_status.id AS status_id,
            SUM(order_products.price) as `sum`,
            (SELECT login FROM users WHERE users.id = order.user_id && order.user_id != 0 LIMIT 1) as login,

`delivery`.name AS delivery_name, `delivery`.price AS delivery_price
            FROM `order`
        INNER JOIN `order_products` ON (order_id = `order`.id && `order`.is_delete = 0 && ((manager_id = :manager_id || :manager_id = 0) || (manager_id = 0 && :is_visible_unassigned_order = 1)))
        INNER JOIN `order_status` ON (status_id = order_status.id && `action` = :action_id)
        LEFT JOIN `delivery` ON (`order`.delivery_id = `delivery`.id)
        GROUP BY order_id ORDER BY `order`.created DESC");
        $query->bindParam(":action_id", $action_id, PDO::PARAM_INT, 11);
        $query->bindParam(":manager_id", $manager_id, PDO::PARAM_INT, 11);
        $query->bindParam(":is_visible_unassigned_order", $is_visible_unassigned_order, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getOrderUsers($user_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT `order`.*, order_status.name AS status_name, order_status.id AS status_id,
            SUM(order_products.price) as `sum`,
            (SELECT login FROM users WHERE users.id = order.user_id && order.user_id != 0 LIMIT 1) as login,

`delivery`.name AS delivery_name, `delivery`.price AS delivery_price
            FROM `order`
        INNER JOIN `order_products` ON (order_id = `order`.id && `order`.is_delete = 0 && (order.user_id = :user_id || :user_id = 0))
        INNER JOIN `order_status` ON (status_id = order_status.id)
        LEFT JOIN `delivery` ON (`order`.delivery_id = `delivery`.id)
        GROUP BY order_id ORDER BY `order`.created DESC");
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Возвращает заказ, с дополнительной проверкой сессии
     * Используется при оформлении заказа
     * @param type $order_id
     * @param type $session_id
     * @return type 
     */
    public function getOrderIdCheckSessionId($order_id, $session_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT `order`.*
            FROM `order`
        WHERE id=:order_id && session_id=:session_id");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":session_id", $session_id, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * То же самое что и getOrderStatusAction только с датами
     * По акшену
     */
    public function getOrderStatusActionDate($action_id, $start_date, $end_date) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT `order`.*, order_status.name AS status_name, order_status.id AS status_id,
            SUM(order_products.price) as `sum`, `delivery`.name AS delivery_name, `delivery`.price AS delivery_price
            FROM `order`
        INNER JOIN `order_products` ON (order_id = `order`.id && `order`.is_delete = 0)
        INNER JOIN `order_status` ON (status_id = order_status.id && `action` = :action_id)
        LEFT JOIN `delivery` ON (`order`.delivery_id = `delivery`.id)
        WHERE UNIX_TIMESTAMP(`order`.created) BETWEEN :start_date AND :end_date
        GROUP BY order_id ORDER BY `order`.created DESC");
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->bindParam(":action_id", $action_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Поиск заказа
     */
    public function getSearchOrder($action_id, $numebr_id, $find, $manager_id, $status_id, $start_date, $end_date) {
        if (!empty($find))
            $find = "%$find%";
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT `order`.*, order_status.name AS status_name, order_status.id AS status_id,
            SUM(order_products.price) as `sum`, `delivery`.name AS delivery_name, `delivery`.id AS delivery_id, `delivery`.price AS delivery_price, 
            (SELECT login FROM users WHERE users.id = order.user_id && order.user_id != 0 LIMIT 1) as login
            FROM `order`
        INNER JOIN `order_products` ON (order_id = `order`.id 
        && (:id = 0 || `order`.id = :id)
        && (`order`.fio LIKE :find || :find = '') && (manager_id=:manager_id || :manager_id=-1)
        && `order`.is_delete = 0)
        INNER JOIN `order_status` ON (status_id = order_status.id && `action` = :action_id && (order_status.id = :status_id || :status_id = -1))
        LEFT JOIN `delivery` ON (`order`.delivery_id = `delivery`.id)
        WHERE UNIX_TIMESTAMP(`order`.created) BETWEEN :start_date AND :end_date
        GROUP BY order_id ORDER BY `order`.created DESC");
        $query->bindParam(":status_id", $status_id, PDO::PARAM_INT, 11);
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->bindParam(":action_id", $action_id, PDO::PARAM_INT, 11);
        $query->bindParam(":manager_id", $manager_id, PDO::PARAM_INT, 11);
        $query->bindParam(":id", $numebr_id, PDO::PARAM_INT, 11);
        $query->bindParam(":find", $find, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getOrderStatusId($status_id = -1) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM `order` WHERE `order`.is_delete=0 && (`order`.status_id=:status_id || :status_id = -1) ORDER BY `order`.`created` DESC");
        $query->bindParam(":status_id", $status_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Возвращает все заказы в краце, для детального просмотра в заказах
     * По акшену
     */
    public function getOrderId($order_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT `order`.*, order_status.name AS status_name, order_status.id AS status_id,
            SUM(order_products.price) as `sum`, `delivery`.name AS delivery_name, `delivery`.price AS delivery_price,discount_procent,
            `delivery`.id AS delivery_id
            FROM `order`
        INNER JOIN `order_products` ON (order_id = `order`.id && `order`.id = :order_id)
        INNER JOIN `order_status` ON (status_id = order_status.id)
        LEFT JOIN `delivery` ON (`order`.delivery_id = `delivery`.id)
        GROUP BY order_id ORDER BY `order`.created DESC");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Возвращает продукты определенного заказа
     * @return <type>
     */
    public function geProductsOrderId($order_id) { 
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT products.*, COUNT(*) as `count`, SUM(order_products.price) as `sum`,
            
1c_id as id_1c, product_mod.cost_price, 

(SELECT name FROM characteristic_value WHERE characteristic_value.id = char_1_id) as char_name_1, 
(SELECT name FROM characteristic_value WHERE characteristic_value.id = char_2_id) as char_name_2, 
            
            (SUM(order_products.price)  
            
) as  sum,


            (SELECT file FROM products_images WHERE product_id = products.id && is_delete = 0 && `type`=1 ORDER BY `order` ASC LIMIT 1) as file, 
            product_mod.name as mod_name, product_mod.warehouse, order_products.is_credit,
            order_products.price, 
            product_mod.article,
                 product_mod.id as mod_id, 
            order_products.char_1_id, order_products.char_2_id, order_products.char_3_id, 
            (SELECT name FROM characteristic_value WHERE characteristic_value.id = order_products.char_1_id) as char_1_name
            FROM order_products
            INNER JOIN products ON (products.id = order_products.product_id && order_products.order_id = :order_id && order_products.is_delete = 0)
            INNER JOIN product_mod ON (order_products.mod_id =  product_mod.id)
            
            GROUP BY product_mod.id, order_products.char_1_id, order_products.char_2_id, order_products.char_3_id, order_products.char_4_id, order_products.char_5_id
        ");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function geProductsOrderIdDelete($order_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT products.*, COUNT(*) as `count`, SUM(order_products.price) as `sum`,
            
1c_id as id_1c, product_mod.cost_price, 

(SELECT name FROM characteristic_value WHERE characteristic_value.id = char_1_id) as char_name_1, 
(SELECT name FROM characteristic_value WHERE characteristic_value.id = char_2_id) as char_name_2, 
            
            (SUM(order_products.price)  
            
) as  sum,


            (SELECT file FROM products_images WHERE product_id = products.id && is_delete = 0 && `type`=1 ORDER BY `order` ASC  LIMIT 1) as file, 
            product_mod.name as mod_name, product_mod.warehouse, order_products.is_credit,
            order_products.price, 
            product_mod.article,
                 product_mod.id as mod_id, 
            order_products.char_1_id, order_products.char_2_id, order_products.char_3_id, 
            (SELECT name FROM characteristic_value WHERE characteristic_value.id = order_products.char_1_id) as char_1_name
            FROM order_products
            INNER JOIN products ON (products.id = order_products.product_id && order_products.order_id = :order_id)
            INNER JOIN product_mod ON (order_products.mod_id =  product_mod.id)
            
            GROUP BY product_mod.id, order_products.char_1_id, order_products.char_2_id, order_products.char_3_id, order_products.char_4_id, order_products.char_5_id
        ");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function geProductsOrderIdCredit($order_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT products.*, COUNT(*) as `count`, SUM(order_products.price) as `sum`,
            
(SELECT name FROM category WHERE category.id = category_1_id) as category_name, 
(SELECT name FROM characteristic_value WHERE characteristic_value.id = char_1_id) as char_name_1, 
(SELECT name FROM characteristic_value WHERE characteristic_value.id = char_2_id) as char_name_2, 
            
            (SUM(order_products.price)  
            
) as  sum,


            (SELECT file FROM products_images WHERE product_id = products.id && is_delete = 0 && `type`=1 ORDER BY `order` ASC  LIMIT 1) as file, 
            product_mod.name as mod_name, product_mod.warehouse, order_products.is_credit,
            order_products.price, 
            product_mod.article,
            order_products.char_1_id, order_products.char_2_id, order_products.char_3_id, 
            (SELECT name FROM characteristic_value WHERE characteristic_value.id = order_products.char_1_id) as char_1_name
            FROM order_products
            INNER JOIN products ON (products.id = order_products.product_id && order_products.order_id = :order_id && order_products.is_delete = 0 && order_products.is_credit = 1)
            INNER JOIN product_mod ON (order_products.mod_id =  product_mod.id)
            
            GROUP BY product_mod.id, order_products.char_1_id, order_products.char_2_id, order_products.char_3_id, order_products.char_4_id, order_products.char_5_id
        ");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Возвращает продукты определенного заказа
     * @return <type>
     */
    public function getOrderProductId($order_id, $product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM order_products WHERE is_delete=0 && product_id=:product_id && order_id = :order_id");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Возвращает заказы
     * @return <type>
     */
    public function getHistoryOrders($start_date, $end_date, $is_delete = 0, $status_id = 0, $user_id = 0) {

        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT *, 
            (SELECT login FROM users WHERE users.id = order.user_id && order.user_id != 0 LIMIT 1) as login FROM `order`
           WHERE
            (:user_id = 0 || :user_id = `order`.user_id) && `order`.is_delete=:is_delete &&
            (`order`.status_id=:status_id || :status_id = -1) && (UNIX_TIMESTAMP(`order`.created) BETWEEN :start_date AND :end_date)
            
            ORDER BY `order`.`created` DESC");
//        $query = $registry->db->prepare("SELECT * FROM `order`
//
//            WHERE (:user_id = 0 || :user_id = `order`.user_id) && is_delete=:is_delete && is_completed=:is_completed
//            && (UNIX_TIMESTAMP(created) BETWEEN :start_date AND :end_date)
//            ORDER BY `created` DESC");
        $query->bindParam(":is_delete", $is_delete, PDO::PARAM_BOOL, 1);
        $query->bindParam(":status_id", $status_id, PDO::PARAM_INT, 11);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Методы доставки
     * @return <type>
     */
    public function getHistoryOrderProducts($find, $user_id = 0) {
        $registry = Registry::getInstance();
        if (!empty($find))
            $find = "%$find%";
        $query = $registry->db->prepare("SELECT  order_products.price, order_id, products.*, 
            product_mod.id as mod_id,
            product_mod.name as mod_name
            FROM `order_products` 
            INNER JOIN products ON 
            ((:user_id = 0 || :user_id = `order_products`.user_id)  && order_products.product_id = products.id )
           
            INNER JOIN product_mod ON 
            (order_products.mod_id = product_mod.id && products.id = product_mod.product_id && ((product_mod.article LIKE :find || products.name LIKE :find )   || :find = ''))
          
            ");
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":find", $find, PDO::PARAM_STR, 255);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
//        print_r($return);
        $return_arr = array();
        $count = array();
        $count_price = array();
        foreach ($return as $product) {
            if (isset($return_arr[$product->order_id][$product->mod_id])) {
                $count[$product->order_id][$product->mod_id] ++;
                $count_price[$product->order_id][$product->mod_id] ++;
                $count_price[$product->order_id][$product->mod_id] = $count_price[$product->order_id][$product->mod_id] + $product->price;
            } else {
                $count[$product->order_id][$product->mod_id] = 1;
                $count_price[$product->order_id][$product->mod_id] = $product->price;
            }

            $return_arr[$product->order_id][$product->mod_id] = $product;
        }
        return array('product' => $return_arr, 'count_price' => $count_price, 'count' => $count);
    }

    /**
     * Методы доставки
     * @return <type>
     */
    public function getDelivery() {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Delivery-getDelivery-Order', 'Delivery');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM `delivery` WHERE is_delete = 0 ORDER BY `order` ASC");
            $query->execute();

            $return = $query->fetchAll(PDO::FETCH_OBJ);

            $cache->setTags('Delivery-getDelivery-Order', $return, 'Delivery');
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
            $query = $registry->db->prepare("SELECT * FROM delivery WHERE id=:id && is_delete=0 ORDER BY `order` ASC");
            $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);

            $cache->setTags('Delivery-getDeliveryId-' . $id, $return, 'Delivery');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Полное удаление заказа
     */
    public function delOrder($order_id) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Products", "products");
        $products = new Products();
        $get_products = $this->geProductsOrderId($order_id);
        foreach ($get_products as $value) {
            for ($i = 0; $i < $value->count; $i++) {
                $products->WarehousePlus($value->mod_id);
            }
        }

        $query = $registry->db->prepare("UPDATE `order` SET is_delete=1 WHERE `order`.id = :order_id && is_delete=0 LIMIT 1");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->execute();

        $query = $registry->db->prepare("UPDATE `order_products` SET is_delete=1 WHERE `order_products`.order_id = :order_id && is_delete=0");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Удаление продукта из заказа
     * @param <type> $order_id
     */
    public function delOrderProduct($order_id, $product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order_products` SET is_delete=1
            WHERE `order_products`.order_id = :order_id &&
            `order_products`.product_id = :product_id
            && is_delete=0 LIMIT 1");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();

        Lavra_Loader::LoadModels("Products", "products");
        $products = new Products();
        $get_product = $products->getPrpductIdAll($product_id);
        $products->WarehousePlus($get_product->mod_id);
    }

    /**
     * Удаление продукта из заказа
     * @param <type> $order_id
     */
    public function delOrderProductAll($order_id, $product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order_products` SET is_delete=1
            WHERE `order_products`.order_id = :order_id &&
            `order_products`.product_id = :product_id
            && is_delete=0");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function completed($order_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order` SET is_completed=1 WHERE `order`.id = :order_id && is_delete=0 LIMIT 1");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function getEmailProductId($product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT email FROM products INNER JOIN users
            ON (products.id = :id) LIMIT 1");
        $query->bindParam(":id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetch(PDO::FETCH_OBJ);
        if (isset($return->email)) {
            return $return->email;
        } else
            return false;
    }

}
