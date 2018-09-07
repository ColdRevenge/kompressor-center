<?php

class Setting {

    /**
     * Общие настройки
     * @param <type> $name
     * @param <type> $email
     * @param <type> $title
     * @param <type> $meta_key
     * @param <type> $meta_desc
     * @return <type>
     */
    public function setGeneral($name, $email, $email_2, $email_3, $phone_1, $phone_2, $phone_3, $phone_4, $title, $meta_key, $meta_desc, $footer_left, $footer_right, $min_price, $hide_prices, $mark_up) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Setting');

        $query = $registry->db->prepare("UPDATE  `setting_general` SET phone_1=:phone_1, phone_2=:phone_2, phone_3=:phone_3, phone_4=:phone_4, email_2=:email_2, email_3=:email_3, `mark_up`=:mark_up, `min_price`=:min_price, `footer_left`=:footer_left, `footer_right`=:footer_right,name = :name, email = :email, title = :title, meta_key = :meta_key, meta_desc = :meta_desc, hide_prices = :hide_prices");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":email", $email, PDO::PARAM_STR, 255);
        $query->bindParam(":email_2", $email_2, PDO::PARAM_STR, 255);
        $query->bindParam(":email_3", $email_3, PDO::PARAM_STR, 255);
        $query->bindParam(":phone_1", $phone_1, PDO::PARAM_STR, 255);
        $query->bindParam(":phone_2", $phone_2, PDO::PARAM_STR, 255);
        $query->bindParam(":phone_3", $phone_3, PDO::PARAM_STR, 255);
        $query->bindParam(":phone_4", $phone_4, PDO::PARAM_STR, 255);
        $query->bindParam(":title", $title, PDO::PARAM_STR, 255);
        $query->bindParam(":meta_key", $meta_key, PDO::PARAM_STR, 255);
        $query->bindParam(":meta_desc", $meta_desc, PDO::PARAM_STR);
        $query->bindParam(":footer_left", $footer_left, PDO::PARAM_STR);
        $query->bindParam(":footer_right", $footer_right, PDO::PARAM_STR);
        $query->bindParam(":min_price", $min_price, PDO::PARAM_INT, 11);
        $query->bindParam(":mark_up", $mark_up, PDO::PARAM_INT, 11);
        $query->bindParam(":hide_prices", $hide_prices, PDO::PARAM_INT, 11);
        $query->execute();
        return true;
    }

    public function setB2b($b2b_num, $price, $is_active) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Setting');

        $query = $registry->db->prepare("UPDATE `setting_auto_b2b` SET `price`=:price, is_active = :is_active WHERE b2b_num = :b2b_num");
        $query->bindParam(":b2b_num", $b2b_num, PDO::PARAM_INT, 11);
        $query->bindParam(":price", $price, PDO::PARAM_INT, 11);
        $query->bindParam(":is_active", $is_active, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function getB2b() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM `setting_auto_b2b` ");
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();
        foreach ($return as $value) {
            $result[$value->b2b_num] = $value;
        }
        return $result;
    }

    /**
     * Функция переключает автоматически B2B колонку 
     * в зависимости от кол-ва покупок пользователя и настроек в setting_b2b
     */
    public function switchAutoUserB2B($user_id) {
        $registry = Registry::getInstance();
        /**
         * Находим общую стоимость всех оплаченых товаров
         */
        $query = $registry->db->prepare("SELECT SUM(`order`.sum_total) as `all_sum` FROM `order` INNER JOIN order_status 
ON (user_id = :user_id && order_status.action = 1 && order_status.is_delete = 0 && status_id = order_status.id && `order`.user_id = :user_id && `order`.is_delete = 0)");
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetch(PDO::FETCH_OBJ);
        if (isset($return->all_sum)) {
            $return = $this->getB2bNum($return->all_sum);
            if (isset($return->b2b_num)) {
                return $return->b2b_num;
            } else {
                return 0; //Первую колонку
            }
        } else {
            return 0; //Первую колонку
        }
    }

    /**
     * По сумме возвращает B2B колонку пользователя
     * @param type $sum
     */
    public function getB2bNum($sum) {
        $registry = Registry::getInstance();
        $query1 = $registry->db->prepare("SELECT b2b_num FROM  setting_auto_b2b WHERE is_active=1 && :all_sum >= price ORDER BY price DESC");
        $query1->bindParam(":all_sum", $sum, PDO::PARAM_INT, 11);
        $query1->execute();
        return $query1->fetch(PDO::FETCH_OBJ);
    }

    public function setParam1($param_str_1) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Setting');

        $query = $registry->db->prepare("UPDATE  `setting_general` SET `param_str_1`=:param_str_1");
        $query->bindParam(":param_str_1", $param_str_1, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function setParam2($param_str_2) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Setting');

        $query = $registry->db->prepare("UPDATE  `setting_general` SET `param_str_2`=:param_str_2");
        $query->bindParam(":param_str_2", $param_str_2, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function setParam3($param_str_3) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Setting');

        $query = $registry->db->prepare("UPDATE  `setting_general` SET `param_str_3`=:param_str_3");
        $query->bindParam(":param_str_3", $param_str_3, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function setParam4($param_str_4) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Setting');

        $query = $registry->db->prepare("UPDATE  `setting_general` SET `param_str_4`=:param_str_4");
        $query->bindParam(":param_str_4", $param_str_4, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function setParam5($param_str_5) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Setting');

        $query = $registry->db->prepare("UPDATE  `setting_general` SET `param_str_5`=:param_str_5");
        $query->bindParam(":param_str_5", $param_str_5, PDO::PARAM_STR, 255);
        $query->execute();
    }


    public function setIsExpense($is_expense) {
        $registry = Registry::getInstance();
        $cac = Cache::getInstance();
        $cac->deleteTag('Setting');

        $query = $registry->db->prepare("UPDATE  `setting_general` SET `is_expense`=:is_expense");
        $query->bindParam(":is_expense", $is_expense, PDO::PARAM_STR, 255);
        $query->execute();
    }
    
    
    public function setDeliveryYandexMarket($delivery_yandex_market) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Setting');

        $query = $registry->db->prepare("UPDATE  `setting_general` SET `delivery_yandex_market`=:delivery_yandex_market");
        $query->bindParam(":delivery_yandex_market", $delivery_yandex_market, PDO::PARAM_INT, 11);
        $query->execute();
        return true;
    }

    public function getGeneral() {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Setting-getGeneral-', 'Setting');

        if (empty($get_cache)) {
            $query = $registry->db->query("SELECT * FROM `setting_general`");
            $return = $query->fetch(PDO::FETCH_OBJ);

            $cache->setTags('Setting-getGeneral-', $return, 'Setting');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Изменения пароля
     * @param <type> $user_id
     * @param <type> $password
     * @return <type>
     */
    public function setPassword($user_id, $password) {
        $registry = Registry::getInstance();

        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Users');

        $query = $registry->db->prepare("UPDATE `users` SET password=:password WHERE id=:user_id");
        $query->bindParam(":password", $password, PDO::PARAM_STR, 255);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->execute();
        return true;
    }

    public function getPassword($user_id) {
        $registry = Registry::getInstance();

        $query = $registry->db->prepare("SELECT * FROM `users` WHERE id=:user_id");
        $query->bindParam(":user_id", $user_id, PDO::PARAM_STR, 255);
        $query->execute();

        $return = $query->fetch(PDO::FETCH_OBJ);
        if (isset($return->password)) {
            return $return->password;
        } else
            return false;
    }

    /**
     * Возвращает смс по статус_id
     */
    public function getSmsStatusId($status_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM `sms` WHERE status_id=:status_id");
        $query->bindParam(":status_id", $status_id, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getSms() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM `sms`");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function addSmsStatusid($status_id, $text, $is_active, $is_email) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO `sms` (`text`, status_id, is_active, is_email) VALUES (:text, :status_id, :is_active, :is_email)");
        $query->bindParam(":text", $text, PDO::PARAM_STR);
        $query->bindParam(":status_id", $status_id, PDO::PARAM_INT, 11);
        $query->bindParam(":is_active", $is_active, PDO::PARAM_INT, 11);
        $query->bindParam(":is_email", $is_email, PDO::PARAM_INT, 11);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function setSmsStatusid($status_id, $text, $is_active, $is_email) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `sms` SET `text`=:text, is_active=:is_active, is_email=:is_email  WHERE status_id=:status_id");
        $query->bindParam(":text", $text, PDO::PARAM_STR);
        $query->bindParam(":status_id", $status_id, PDO::PARAM_INT, 11);
        $query->bindParam(":is_active", $is_active, PDO::PARAM_INT, 11);
        $query->bindParam(":is_email", $is_email, PDO::PARAM_INT, 11);
        $query->execute();
    }

    private $_template_obj = null;

    /**
     * Передаем объект шаблонизатора, чтобы скомпилировать шаблон письма о статусах
     * @param Template $obj
     */
    public function setOrderStatusSMSTemplate(Template $obj) {
        $this->_template_obj = $obj;
    }

    /**
     * Отправляет смс-ку в зависимости от статуса заказа
     * $is_sms_only_admin - если true то смс о новом заказе приходит только админу
     */
    public function sendOrderStatusSMS($order_id, $status_id, $is_sms_only_admin = false) {
        $get_sms = $this->getSmsStatusId($status_id);
        if (isset($get_sms->id) && $get_sms->is_active == 1) {
            Lavra_Loader::LoadModels("Order", "order");
            $order = new Order();
            $get_order = $order->getOrderId($order_id);
            if (isset($get_order->id)) {
                Lavra_Loader::LoadClass('SMS');
                $sms = new SMS('++__a34e291e-3415-f9a4-8dbc-aad958b7243d', '++__9253911070', '++__700041');
                $text = $get_sms->text;
                $text = str_replace('#NUMBER#', $order_id, stripslashes($text));


                $text = str_replace('#SUM#', number_format($get_order->sum_total, 0, '', ' '), $text);
                $text = str_replace('#PAYMENT_SUM#', number_format($get_order->payment_sum, 0, '', ' '), $text); //Если заказ оплачен карточкой, сумму берем из payment_sum


                if (!empty($get_order->post_code)) {
                    $text = str_replace('#POST_CODE_TEXT#', "Почтовый идентификатор: " . $get_order->post_code, $text);
                } else {
                    $text = str_replace('#POST_CODE_TEXT#', '', $text);
                }
                //
//                if ($is_sms_only_admin == true) { 
                if ($status_id == 0) {
//                    $check_sms = $sms->sms_send('9264360684', $text, 'Lalipop', time(), false, false, null);
                    //$check_sms = $sms->sms_send('9162579684', $text, 'Lalipop', time(), false, false, null);
                    //$check_sms = $sms->sms_send('9265795902', $text, 'Lalipop', time(), false, false, null);
                    //8-926-436-06-84
                }
//                } 
//                else {
                $check_sms = $sms->sms_send($get_order->phone, $text, 'Lalipop', time(), false, false, null);

                if ($status_id == 0) {
//                    $check_sms = $sms->sms_send('9262761132', $text, 'Lalipop', time(), false, false, null);
                }

                if (!is_null($this->_template_obj)) {
                    if ($get_sms->is_email == 1 && !empty($get_order->email)) { //Если требуется дополнительное почтовое уведомление
                        $registry = Registry::getInstance();
                        Lavra_Loader::LoadClass("SendMail");
                        $mail = new SendMail();
                        $_GET['fio'] = $get_order->fio;
                        $_GET['status_name'] = $get_order->status_name;
                        $_GET['text'] = $text;
                        $message_user = preg_replace(array('/\n/i', '/\r/i', '/\t/i', '/>\s+/i', '/\s+</i'), array('', '', '', '>', '<'), $this->_template_obj->fetchTemplate($registry->modules_dir . 'setting/templates/mail_sms_status.tpl'));
                        if (mb_strpos($get_order->email, '@')) {
                            if (isset($get_order->email) && !empty($get_order->email)) { //Если почта есть
                                $mail->send(array($get_order->email), "Изменение статуса заказа - магазин «" . $registry->shop_name . '»', $message_user);
                            }
                        }
                    }
                }
            }
        }
    }

    public function addStatus($name, $order) {
        $registry = Registry::getInstance();
        $qu = $registry->db->prepare('(SELECT id+1 as id FROM order_status ORDER BY id DESC LIMIT 1)');
        $qu->execute();
        $result = $qu->fetch(PDO::FETCH_OBJ);
        //-----
        $query = $registry->db->prepare("INSERT INTO `order_status` (id, `name`, `order`) VALUES (:id, :name, :order)");
        $query->bindParam(":id", $result->id, PDO::PARAM_STR, 255);
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function setStatus($id, $name, $order) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order_status` SET `name`=:name, `order`=:order WHERE id=:id");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function delStatus($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `order_status` SET `is_delete`=1 WHERE id=:id && id!=0 && action!=1");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * @param $usd
     */
    public function setUsdCurrency($usd) {
        $registry = Registry::getInstance();

        $query = $registry->db->prepare("UPDATE  `setting_general` SET `usd`=:usd");
        $query->bindParam(":usd", $usd, PDO::PARAM_INT, 11);
        $query->execute();

        $cac = Cache::getInstance();
        $cac->deleteTag('Setting');
    }

    /**
     * @param $eur
     */
    public function setEurCurrency($eur) {
        $registry = Registry::getInstance();

        $query = $registry->db->prepare("UPDATE  `setting_general` SET `eur`=:eur");
        $query->bindParam(":eur", $eur, PDO::PARAM_INT, 11);
        $query->execute();

        $cac = Cache::getInstance();
        $cac->deleteTag('Setting');
    }

}

?>
