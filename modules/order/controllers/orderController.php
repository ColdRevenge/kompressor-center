<?php

class orderController extends Controller {

    private $_buy_market_status_arr = array('PROCESSING' => array('DELIVERY', 'CANCELLED'), 'DELIVERY' => array('DELIVERED', 'CANCELLED'), 'PICKUP' => array('DELIVERED', 'CANCELLED'));

    /**
     * Уведомление на яндекс маркет
     * @param type $order_id
     * @param type $status_id
     */
    private function _sendSuccessMessage($order_id, $status_id) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Order", "order");
        $orders = new Order();
        Lavra_Loader::LoadClass("SendMail");
        $mail = new SendMail();
        if ($status_id == 12) {
            $order = $orders->getOrderId($order_id);
            if (!empty($order->email)) {
                $message_mail = preg_replace(array('/\n/i', '/\r/i', '/\t/i', '/>\s+/i', '/\s+</i'), array('', '', '', '>', '<'), $this->fetchTemplate($registry->modules_dir . 'order/templates/mail_user_market.tpl', 'order'));
                $mail->send(array($order->email), "Уважаемый клиент, спасибо за Ваш заказ! ", $message_mail);
            }
        }
    }

    /**
     * Отправляет письмо пользователю и админу
     * @param  $is_only_manager - если true то письмо отправляется только менеджерам
     */
    private function _mail_order($order_id, $is_only_manager = false) {
        $registry = Registry::getInstance();

        Lavra_Loader::LoadClass("SendMail");
        Lavra_Loader::LoadClass("Application");
        $order = new Order();
        $mail = new SendMail(); //Создаем класс Mail

        $this->mail_products = $order->geProductsOrderId($order_id);
        $this->mail_order = $order->getOrderId($order_id);

        $metro = '';
        if ($this->mail_order->metro_id > 0) { //Станция метро в уведомление
            Lavra_Loader::LoadModels("Metro", "metro");
            $metro = new Metro();
            $get_metro = $metro->getStantionId($this->mail_order->metro_id);

            if (isset($get_metro->id)) {
                $metro = " метро " . stripslashes($get_metro->name);
            }
        }
        $this->metro = $metro;

        $delivery_child = null;
        if ($this->mail_order->delivery_child_id > 0) { //Если указана точка самовывоза
            Lavra_Loader::LoadModels("Delivery", "delivery");
            $delivery_obj = new Delivery();
            $get_delivery = $delivery_obj->getDeliveryId($this->mail_order->delivery_child_id);
            if (isset($get_delivery->id)) {
                $delivery_child = 'Самовывоз по адресу: ' . (stripslashes($get_delivery->name));
            }
        }
        $this->delivery_child = $delivery_child;
        $this->mail_order->phone = Application::transPhoneString($this->mail_order->phone);

        $message_user = preg_replace(array('/\n/i', '/\r/i', '/\t/i', '/>\s+/i', '/\s+</i'), array('', '', '', '>', '<'), $this->fetchTemplate($registry->modules_dir . 'order/templates/mail_user.tpl'));
        $message_admin = preg_replace(array('/\n/i', '/\r/i', '/\t/i', '/>\s+/i', '/\s+</i'), array('', '', '', '>', '<'), $this->fetchTemplate($registry->modules_dir . 'order/templates/mail_admin.tpl', 'order'));


        if (mb_strpos($registry->default_send_mail_adress, '@') !== false) {
            $from = $registry->default_send_mail_adress;
        } else {
            $from = $this->_setting->email;
        }

        Lavra_Loader::LoadClass('Users');
        $user = new Users();

        if (count($this->mail_products)) { //Если хоть что-то заказали
            if ($is_only_manager == false) { //Если письмо нужно отправить всем
                if (mb_strpos($this->mail_order->email, '@')) {
                    if (isset($this->mail_order->email) && !empty($this->mail_order->email)) { //Если почта есть
                        $mail->send(array($this->mail_order->email), "Ваш заказ №$order_id - магазин «" . $registry->shop_name . '»', $message_user);

                        if ($registry->user_id == 0) {
                            $get_user = $user->getEmailUser($this->mail_order->email);
                            if (!isset($get_user->id)) {
                                $this->new_login = $this->mail_order->email;
                                $this->new_pass = $user_pass = 'la' . rand(100, 1000) . 's';
                                $message_mail = preg_replace(array('/\n/i', '/\r/i', '/\t/i', '/>\s+/i', '/\s+</i'), array('', '', '', '>', '<'), $this->fetchTemplate($registry->modules_dir . 'order/templates/mail_user_register.tpl'));
                                $mail->send(array($this->mail_order->email), "Регистрация прошла успешно! - «" . trim($this->_setting->name) . '»', $message_mail);
                                $user_id = $user->add($this->mail_order->email, $user_pass, $this->mail_order->fio, '', '', $this->mail_order->phone, $this->mail_order->email, '', '', $this->mail_order->city, $this->mail_order->city_index, $this->mail_order->adress, '', $this->mail_order->metro_id, '', 0, '', $this->mail_order->company_name, $this->mail_order->company_fax, $this->mail_order->company_inn, $this->mail_order->company_ur_adress, $this->mail_order->company_bank, $this->mail_order->company_bik, $this->mail_order->company_rs, $this->mail_order->company_ks, $this->mail_order->company_kpp, $this->mail_order->company_okpo, $this->mail_order->company_oknx, $this->mail_order->company_fio_director, $this->mail_order->company_fio_accountant, '', '', '', 0, $_SERVER['REMOTE_ADDR'], 1, $this->mail_order->is_jur_person, 1, 0, 0);
                                $order->setOrderUserId($order_id, $user_id);

                                $_SESSION['is_auth'] = 0;
                                $_SESSION['user_id'] = $user_id;
                                $_SESSION['login'] = $this->new_login;
                                $_SESSION['b2b_price'] = $this->new_pass;
                            } else { //Если пользователь есть, напоминаем пароль от личного кабинета
                                $this->new_login = $get_user->login;
                                $this->new_pass = $get_user->password;
                                $message_mail = preg_replace(array('/\n/i', '/\r/i', '/\t/i', '/>\s+/i', '/\s+</i'), array('', '', '', '>', '<'), $this->fetchTemplate($registry->modules_dir . 'order/templates/mail_user_register_recovery.tpl'));
                                $mail->send(array($this->mail_order->email), "Напоминание пароля от личного кабинета - «" . trim($this->_setting->name) . '»', $message_mail);
                                $order->setOrderUserId($order_id, $get_user->id);
                            }
                        }
                    }
                }

//            Уведомление администраторов
                $mail->send(array($this->_setting->email, $this->_setting->email_2, $this->_setting->email_3), "Уведомление о новом заказе (№$order_id)", $message_admin);
            }

//            if (isset($this->mail_order->manager_id) && $this->mail_order->manager_id > 0) {
//
//                $manager = $user->getUserId($this->mail_order->manager_id);
//                if (isset($manager->email)) { //Если у манагера есть почта
//                    $mail->send(array($manager->email), "Уведомление о новом заказе (№$order_id)", $message_admin);
//                }
//            } else { //Если менеджер не присвоен, то ищем главного менеджера чтобы отправить сообщение ему
//                $managers = $user->getMainManager();
//                foreach ($managers as $key => $manager) {
//                    if (isset($manager->email)) { //Если у манагера есть почта
//                        $mail->send(array($manager->email), "Уведомление о новом заказе (№$order_id)", $message_admin);
//                    }
//                }
//            }
//           
        }
    }

    /**
     * Подробное содержание корзины
     */
    public function addAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Order", "order");
        Lavra_Loader::LoadClass("Application");
        Lavra_Loader::LoadModels("Discount", "discount");
        Lavra_Loader::LoadModels("Basket", "basket");
        Lavra_Loader::LoadModels('Payment', 'payment');

        Lavra_Loader::LoadModels("Delivery", "delivery");
        $delivery_obj = new Delivery();
        include_once $registry->interface_dir . 'IPayment.php';
        $pay = new Payment();
        $basket = new Basket();
        $discount = new Discount();
        $order = new Order();
        $this->is_lady_shop = $registry->is_lady_shop;

//        $this->delivery_service = Lavra_Loader::getLoadModule('delivery', 'delivery/checkout/get/');
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_POST, 1);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
//        $output = curl_exec($ch);
//        curl_close($ch);
//
//        echo $output;

        if (isset($this->param['order_id'])) { //Если заказ оформлен
            $get_order = $order->getOrderIdCheckSessionId($this->param['order_id'], $registry->session_id);

            if (isset($get_order->id)) {
                $this->is_order_complete = 1;
                $this->order = $order->getOrderId($get_order->id);

                $this->products = $order->geProductsOrderId($get_order->id);

                $metrika_arr = array(
                    'order_id' => $get_order->id,
                    'order_price' => $get_order->sum_total,
                    'currency' => 'RUR',
                    'exchange_rate' => '1',
                );
                foreach ($this->products as $product_item) {
                    $metrika_arr['goods'][] = array(
                        'id' => $product_item->id,
                        'name' => (stripslashes($product_item->name)),
                        'price' => $product_item->price,
                        'quantity' => $product_item->count,
                    );
                }
                $this->metrika_order = (json_encode($metrika_arr));








//                $products_credit = $order->geProductsOrderIdCredit($get_order->id);
//                if (count($products_credit)) {
//                    $order_arr = array();
//                    $i = 0;
//                    $all_sum_credit = 0;
//                    foreach ($products_credit as $key => $value) {
//                        $order_arr['items'][$i]['title'] = (stripslashes($value->name));
//                        $order_arr['items'][$i]['category'] = (stripslashes($value->category_name));
//                        $order_arr['items'][$i]['qty'] = $value->count;
//                        $order_arr['items'][$i]['price'] = stripslashes($value->price);
//                        $all_sum_credit += $value->price * $value->count;
//                        $i++;
//                    }
//                    $this->all_sum_credit = $all_sum_credit;
//                    $partnerId = ''; /* Тестовый - 1-178YO4Z */
//                    $secretPhrase = '-secret-3W1ELbbb'; /* Тестовая 321ewq */
//                    $order_arr['partnerId'] = $partnerId;
//                    $order_arr['partnerOrderId'] = $get_order->id;
//                    $order_arr['partnerName'] = ('Lady-Max');
//                    $order_arr['deliveryType'] = '';
//
//
//                    $order_arr['details']['firstname'] = (''); //$this->fio
//                    $order_arr['details']['lastname'] = ('');
//                    $order_arr['details']['middlename'] = ('');
//                    $order_arr['details']['email'] = ($this->email) ? $this->email : '';
//                    $order_arr['details']['cellphone'] = ($this->phone) ? $this->phone : '';
//
//
//                    /* Получение base64-строки из массива заказа */
//                    $json = json_encode($order_arr);
//                    $this->base64 = $base64 = base64_encode($json);
//
//                    /* Получение подписи сообщения */
//                    $this->sig = signMessage($base64, $secretPhrase);
//                }




                if ($get_order->payment_method_id != 0) { //Если требуется оплата платежными средствами
                    $this->is_payment = 1;
                }
                if ($get_order->payment_method_id > 0) {
                    $get_method = $pay->getPaymentMethodId($get_order->payment_method_id);
                    if (isset($get_method->id)) {
                        $this->method_name = $get_method->name;
                        Lavra_Loader::LoadModels('PaymentFactory', 'payment');
//                        $payment = PaymentFactory::factory($registry->payment_system);
                        if ($get_order->payment_method_id == 3) { //МКБ
                            $this->payment_form = Lavra_Loader::getLoadModule('payment', 'payment/mkb/' . $get_order->id . '/');
                        } elseif ($get_order->payment_method_id == 4) { //Яндекс Касса
                            $this->payment_form = Lavra_Loader::getLoadModule('payment', 'payment/yandex/' . $get_order->id . '/');
                        } elseif ($get_order->payment_method_id == 7) {
                            $this->payment_form = Lavra_Loader::getLoadModule('payment', 'payment/cash/yandex/' . $get_order->id . '/');
                        } elseif ($get_order->payment_method_id == 8) {
                            $this->payment_form = Lavra_Loader::getLoadModule('payment', 'payment/cash/sberbank/' . $get_order->id . '/');
                        } elseif ($get_order->payment_method_id == 5) {
                            $this->payment_form = Lavra_Loader::getLoadModule('payment', 'payment/avangard/' . $get_order->id . '/');
                        } elseif ($get_order->payment_method_id == 6) {
                            $this->payment_form = Lavra_Loader::getLoadModule('payment', 'payment/robokassa/' . $get_order->id . '/');
                        }
                    } else {
                        $this->setError('Оплата платежными средствами не доступна');
                    }


                    $registry->open_category_id = 0;

//                    switch ($registry->payment_system) {
//                        case 'robokassa':
//                            $this->payment_form = Lavra_Loader::getLoadModule('payment', 'payment/robokassa/' . $get_order->id . '/');
//                            break;
//                    }
                }
            }
        } else {
            $this->delivery = $delivery_obj->getDelivery();

            Lavra_Loader::LoadModels("Metro", "metro");
            $metro = new Metro();
            $this->metro = $metro->getStantions();

            if (isset($_POST['send'])) { //Добавление нового заказа
                $_post = array();
                foreach ($_POST as $key => $value) {
                    $_post[$key] = strip_tags($value);
                }
                $_POST = $_post;

//                $_POST['fio'] = $_POST['surname'] . ' ' . $_POST['name'];
                if (trim($_POST['fio']) == "") {
                    $this->setError("Заполните поле \"ФИО\"");
                } elseif (trim($_POST['phone']) == "") {
                    $this->setError("Заполните поле \"Телефон\"");
                } elseif ($_POST['is_jur_person'] == '1' && empty($_POST['email'])) {
                    $this->setError("Заполните поле \"E-mail\"");
                } elseif ($_POST['is_jur_person'] == '1' && empty($_POST['company_name'])) {
                    $this->setError("Заполните поле \"Название\"");
                } elseif ($_POST['is_jur_person'] == '1' && empty($_POST['company_inn'])) {
                    $this->setError("Заполните поле \"ИНН\"");
                } elseif ($_POST['is_jur_person'] == '1' && empty($_POST['company_ur_adress'])) {
                    $this->setError("Заполните поле \"Юридический адрес\"");
                } elseif ($_POST['is_jur_person'] == '1' && empty($_POST['company_bank'])) {
                    $this->setError("Заполните поле \"Банк\"");
                } elseif ($_POST['is_jur_person'] == '1' && empty($_POST['company_bik'])) {
                    $this->setError("Заполните поле \"БИК\"");
                } elseif ($_POST['is_jur_person'] == '1' && empty($_POST['company_rs'])) {
                    $this->setError("Заполните поле \"P/c\"");
                } elseif ($_POST['is_jur_person'] == '1' && empty($_POST['company_kpp'])) {
                    $this->setError("Заполните поле \"КПП\"");
                } else { //Если все проверки пройдены
                    if (count($this->basket_list) > 0) { //Если корзина не пуста (не работает)
//Необязательные поля для заполнения
                        if (!isset($_POST['delivery_id'])) {
                            $_POST['delivery_id'] = 0;
                        }
                        if (!isset($_POST['delivery_child_id'])) {
                            $_POST['delivery_child_id'] = 0;
                        }
                        if (!isset($_POST['metro_id'])) {
                            $_POST['metro_id'] = 0;
                        }
                        if (!isset($_POST['payment_method_id'])) {
                            $_POST['payment_method_id'] = 0;
                        }
                        $_POST['house'] = (isset($_POST['house']) ? $_POST['house'] : '');
                        $_POST['housing'] = (isset($_POST['housing']) ? $_POST['housing'] : '');
                        $_POST['building'] = (isset($_POST['building']) ? $_POST['building'] : '');
                        $_POST['appartment'] = (isset($_POST['appartment']) ? $_POST['appartment'] : '');
                        $_POST['street'] = (isset($_POST['street']) ? $_POST['street'] : '');

                        if (isset($_POST['adress']) && !empty($_POST['adress']) && empty($_POST['street'])) {
                            $_POST['adress'] = trim($_POST['adress']);
                        } else {
                            $_POST['adress'] = (isset($_POST['street']) && !empty($_POST['street']) ? '' . $_POST['street'] . ' ' : null)
                                    . (isset($_POST['house']) && !empty($_POST['house']) ? ' д.' . $_POST['house'] : null)
                                    . (isset($_POST['housing']) && !empty($_POST['housing']) ? ' корп.' . $_POST['housing'] : null)
                                    . (isset($_POST['building']) && !empty($_POST['building']) ? ' стр.' . $_POST['building'] : null)
                                    . (isset($_POST['appartment']) && !empty($_POST['appartment']) ? ' кв.' . $_POST['appartment'] : null);
                        }
                        $_POST['city'] = (isset($_POST['city']) ? $_POST['city'] : '');
                        $_POST['city_index'] = (isset($_POST['city_index']) ? $_POST['city_index'] : '');

                        /**
                         * Подсчет скидки, если она имеется
                         */
                        $get_basket = $basket->getBasketAll($registry->session_id);
                        $sum = 0;
                        $discount_procent = 0;
                        foreach ($get_basket as $value) {
                            $sum += $value->price;
                        }

                        if ($this->user_id > 0) {
                            $discount_procent = (int) $discount->getDiscountSum($sum, 1, $this->user_id);
                        } else {
                            $discount_procent = (int) $discount->getDiscountSum($sum, 0, $this->user_id);
                        }

                        if (isset($_POST['last_name'])) {
                            $fio = $_POST['last_name'] . ' ' . $_POST['fio'] . ' ' . $_POST['middle_name'];
                        } else {
                            $fio = $_POST['fio'];
                        }
                        $delivery = $order->getDeliveryId($_POST['delivery_id']);

                        $sum_order = $sum; //Сумма без учета скидки и доставки

                        if ($delivery->free_sum > 0 && $sum_order >= $delivery->free_sum) { //Бесплатная доставка
                            $sum_delivery = 0;
                        } else {
                            $sum_delivery = (isset($delivery->price) ? $delivery->price : 0); //Стоимость доставки
                        }
                        $sum_discount = $sum_order - ($sum_order * $discount_procent) / 100; //Стоимость с учетом скидки
                        $discount_sum = 0;

                        /**
                         * Купоны
                         */
                        $coupon_discount = 0;
                        if (isset($_POST['coupon_code']) && !empty($_POST['coupon_code'])) {
                            $coupon = trim($_POST['coupon_code']);

                            Lavra_Loader::LoadModels("Coupons", "discount");
                            $coupons = new Coupons();

                            $get_coupun = $coupons->getCouponSum($coupon);
                            if ($get_coupun > 0) {
                                if ($get_coupun < $sum_discount) { //Если сумма купона меньше чем сумма скидки, то отменяем систему скидок и смотрим скидку купона
                                    $discount_sum = $sum_order - $get_coupun; //Скидка в рублях
                                    $coupon_discount = $discount_sum; //Скидка купона
                                    $sum_discount = $sum_order - $discount_sum; //Меняем стоимость заказа
                                    $_get_coupon = $coupons->getCouponOnCode($coupon_code);

                                    if ($_get_coupon->discount_sum > 0) {
                                        $discount_procent = 0; //Обнуляем информацию о скидке, если подключена система скидок
                                    } else {
                                        $discount_sum = 0;
                                        $discount_procent = $_get_coupon->discount_procent; //Обнуляем информацию о скидке, если подключена система скидок
                                    }
                                }
                            }
                        } else {
                            $coupon = null;
                        }

                        $sum_total = $sum_discount + $sum_delivery; //Общая стоимость (sum_discount + sum_delivery)
//                        if ($_SERVER['REMOTE_ADDR'] == '94.199.111.134') {
//                            print_r($_POST);
//
//                            exit();
//                        }
                        $order_id = $order->add($basket, $get_basket, $this->_default_currency->id, $this->_default_currency->exchange, $fio, Application::transPhoneNumb($_POST['phone']), $_POST['email'], $_POST['city'], $_POST['city_index'], $_POST['adress'], $_POST['metro_id'], $_POST['delivery_id'], $_POST['delivery_child_id'], $_POST['payment_method_id'], $_POST['comment'], $this->user_id, $sum_order, $sum_delivery, $sum_discount, $sum_total, $coupon, $coupon_discount, $discount_sum, $discount_procent, $registry->session_id);
                        $order->setOrderShopType($order_id, $registry->shop_type);
                        if (!isset($_POST['comment_admin'])) {
                            $_POST['comment_admin'] = '';
                        }
                        if (isset($_POST['is_look']) && $_POST['is_look'] == '1') { //Примерка заказа
                            $_POST['comment_admin'] = $_POST['comment_admin'] . "Примерка заказа!!!!\n";
                        }
                        if (isset($_POST['bust']) && $_POST['bust'] > 0) { //Примерка заказа
                            $_POST['comment_admin'] = $_POST['comment_admin'] . "Объем груди: " . $_POST['bust'] . "\n";
                        }
                        if (isset($_POST['hips']) && $_POST['hips'] > 0) { //Примерка заказа
                            $_POST['comment_admin'] = $_POST['comment_admin'] . "Объем бедер: " . $_POST['hips'] . "\n";
                        }

                        if (isset($_POST['comment_admin'])) {
                            $order->setCommentAdmin($order_id, $_POST['comment_admin']);
                        }
                        if (isset($registry->get_user) && isset($registry->get_user->manager_id) && $registry->get_user->manager_id > 0) {
                            $order->setOrderManager($order_id, $registry->get_user->manager_id);
                        }
//Для юр. лиц обработка и обновление заказа
                        $default_fields = array('company_name' => '', 'company_fax' => '', 'company_inn' => '', 'company_ur_adress' => '', 'company_bank' => '', 'company_bik' => '', 'company_rs' => '', 'company_ks' => '', 'company_kpp' => '', 'company_okpo' => '', 'company_oknx' => '', 'company_fio_director' => '', 'company_fio_accountant' => '', 'is_jur_person' => 0);
                        foreach ($default_fields as $key => $value) {
                            if (!isset($_POST[$key])) {
                                $_POST[$key] = $value;
                            } else {
                                $_POST[$key] = trim($_POST[$key]);
                            }
                        }
                        if ($_POST['is_jur_person'] == 1) { //Если юр. лицо
                            $order->setRequisitesOrder($order_id, $_POST['company_name'], $_POST['company_fax'], $_POST['company_inn'], $_POST['company_ur_adress'], $_POST['company_bank'], $_POST['company_bik'], $_POST['company_rs'], $_POST['company_ks'], $_POST['company_kpp'], $_POST['company_okpo'], $_POST['company_oknx'], $_POST['company_fio_director'], $_POST['company_fio_accountant'], $_POST['is_jur_person']);
                        }

                        if ($order_id) {
                            $order->setOrderUserId($order_id, $this->user_id); //Привязываем заказы к пользователю, если товары кидали не от авторизированного пользователя
                            
                            $this->_mail_order($order_id); //Отправка письма
                            $registry->setting_obj->sendOrderStatusSMS($order_id, 0);

                            Lavra_Loader::LoadModels("Send", "send");
                            $send = new Send();
                            $_POST['email'] = mb_strtolower(trim($_POST['email']));
                            $is_email = $send->stopMails(trim($_POST['email']));
                            $send->setMails(trim($_POST['email']), '', ((isset($_POST['is_send_email']) && $_POST['is_send_email'] == '1') ? 1 : 0), ((isset($_POST['is_send_email']) && $_POST['is_send_email'] == '1') ? 1 : 0));
                            if (!$is_email) {
                                $send->insertMails(trim($_POST['email']), '', ((isset($_POST['is_send_email']) && $_POST['is_send_email'] == '1') ? 1 : 0), ((isset($_POST['is_send_email']) && $_POST['is_send_email'] == '1') ? 1 : 0));
                            }

                            header("Location: " . $registry->base_host_url . 'order/' . $order_id . '/');
                            exit();
//                            $this->setMessage("<br/>Заказ успешно оформлен! В ближайшее время с вами свяжутся наши менеджеры");
                        } else {
                            $this->setError("Произошла ошибка при добавлении товара");
                            $this->setSystemError("Произошла ошибка при добавлении товара", 'order');
                        }
                    } else {
                        $this->setError("Ваша корзина пуста");
                    }
                }
            } else {
                Lavra_Loader::LoadClass('Users');
                $auth = new Users();
                $get_user = $auth->getUserId($this->user_id);
                if (isset($get_user->id)) {
                    $_POST['fio'] = $get_user->name;
                    $_POST['login'] = $get_user->login;
                    $_POST['phone'] = Application::transPhoneString($get_user->phone);
                    $_POST['email'] = $get_user->email;
                    $_POST['adress'] = $get_user->adress;
                    $_POST['metro_id'] = $get_user->metro_id;
                    $_POST['city'] = $get_user->city;
                    $_POST['city_index'] = $get_user->city_index;
                    $_POST['is_jur_person'] = $get_user->is_jur_person;
                    $_POST['company_name'] = $get_user->company_name;
                    $_POST['company_fax'] = $get_user->company_fax;
                    $_POST['company_inn'] = $get_user->company_inn;
                    $_POST['company_ur_adress'] = $get_user->company_ur_adress;
                    $_POST['company_bank'] = $get_user->company_bank;
                    $_POST['company_bik'] = $get_user->company_bik;
                    $_POST['company_rs'] = $get_user->company_rs;
                    $_POST['company_ks'] = $get_user->company_ks;
                    $_POST['company_kpp'] = $get_user->company_kpp;
                    $_POST['company_okpo'] = $get_user->company_okpo;
                    $_POST['company_oknx'] = $get_user->company_oknx;
                    $_POST['company_fio_director'] = $get_user->company_fio_director;
                    $_POST['company_fio_accountant'] = $get_user->company_fio_accountant;
                }
            }


            $this->payment_methods = $pay->getPaymentMethods();



            /**
             * Расчет товаров для доставки
             */
            Lavra_Loader::LoadModels('Setting', 'setting');
            $setting = new Setting();
            $set = $setting->getGeneral();
            $this->setting = $set;



            $registry = Registry::getInstance();
            Lavra_Loader::LoadModels("Basket", "basket");
            $basket = new Basket();

//print_r($baskets);
            /**
             * Скидки
             */
            Lavra_Loader::LoadModels("Discount", "discount");
            $discount = new Discount();
            $basket_short = $basket->getBasket($registry->session_id);
            if (isset($basket_short->count)) {
                $this->sum_basket = $sum = $basket_short->sum;

                if (isset($basket_short->sum)) {
                    if ($this->user_id > 0) {
                        $this->discount = $discount->getDiscountSum($basket_short->sum, 1, $this->user_id);
                    } else {
                        $this->discount = $discount->getDiscountSum($basket_short->sum, 0, $this->user_id);
                    }
                    if (($this->discount)) {
                        $sum = ($basket_short->sum - ($basket_short->sum * $this->discount) / 100);
                    }
                }
                $this->sum = $sum;
                $this->count = $basket_short->count;
//                $this->ves = $basket_short->ves;



                $url = "https://multiship.ru/openAPI_v3";
                $post_data = array(
                    "order_date" => date('d.m.Y'),
                    "order_weight" => $this->ves,
                    //order_height
                    //order_width
                    //order_length
                    "order_payment_method" => 1,
                    //"order_delivery_cost" => 
                    "order_assessed_value" => $this->sum,
                    "delivery_is_ms_insurance" => 0,
                    //order_items
                    "order_sender" => $this->sum,
                    "order_assessed_value" => $this->sum,
                    "order_assessed_value" => $this->sum,
                    "order_assessed_value" => $this->sum,
                );


//order_payment_method
//1 (наличный расчет)
//3 (предоплата)
            }
            $this->baskets_order = $basket->getBasketDetailed($registry->session_id);

//            $this->basket = Lavra_Loader::getLoadModule("basket", "basket/1/");

            /* Подгрузка платежных методов */
//            include_once $registry->interface_dir . 'IPayment.php';
//            Lavra_Loader::LoadModels("Robokassa", "payment");
//            $payment = new Robokassa();
//            $this->methods = $payment->getCurrencies();
        }
    }

    public function orders_listAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Order", "order");
        Lavra_Loader::LoadModels("Basket", "basket");
        $order = new Order();

        Lavra_Loader::LoadModels("BlackList", "order");
        $black_list = new BlackList();

        $this->getBlackList = $black_list->getBlackListAll(1);


        $_POST['manager_id'] = isset($_POST['manager_id']) ? $_POST['manager_id'] : 0;
        $_POST['search_status_id'] = isset($_POST['search_status_id']) ? $_POST['search_status_id'] : 0;
        Lavra_Loader::LoadClass('Users');
        $users = new Users();
        $this->managers = $users->getUsers(2);

        $start_time = 7776000; //дата начала на 90 дней меньше текущей
        $date = getdate(time() - $start_time);
        if (!isset($_POST['start_day'])) {
            $_POST['start_day'] = $date['mday'];
            $_POST['start_month'] = $date['mon'];
            $_POST['start_year'] = $date['year'];
        }

        $end_date = getdate();
        if (!isset($_POST['end_day'])) {
            $_POST['end_day'] = $end_date['mday'];
            $_POST['end_month'] = $end_date['mon'];
            $_POST['end_year'] = $end_date['year'];
        }
        $this->start_date_form = Lavra_Loader::getLoadModule("application", "/application/date/1/" . $_POST['start_year'] . "/" . $_POST['start_month'] . "/" . $_POST['start_day'] . "/start_");
        $this->end_date_form = Lavra_Loader::getLoadModule("application", "/application/date/1/" . $_POST['end_year'] . "/" . $_POST['end_month'] . "/" . $_POST['end_day'] . "/end_");

        $start_date = mktime(0, 0, 0, $_POST['start_month'], $_POST['start_day'], $_POST['start_year']);
        $end_date = mktime(23, 59, 59, $_POST['end_month'], $_POST['end_day'], $_POST['end_year']);


        if (isset($this->param['message_id'])) {
            switch ($this->param['message_id']) {
                case 3:
                    if (isset($this->param['del_id'])) {
                        $order->delOrder($this->param['del_id']);
                        $this->redirect($this->MyURL . 'list/3/');
                    }
                    $this->setMessage("Заказ успешно удален!");
                    break;

                default:
                    break;
            }
        }

        if (isset($_POST['orders_id']) && is_array($_POST['orders_id'])) {
            foreach ($_POST['orders_id'] as $order_id) {
                $order->completed($order_id);
            }
        }
        $this->status = $order->getStatus();

        if (isset($_POST['find'])) {
            $this->orders = $order->getSearchOrder(0, (int) $_POST['number'], trim($_POST['find']), $_POST['manager_id'], $_POST['search_status_id'], $start_date, $end_date);
        } else {
            $this->orders = $order->getOrderStatusAction(0, ((isset($registry->get_user) && isset($registry->get_user->id) && isset($registry->get_user->user_type) && $registry->get_user->user_type == 2) ? $registry->get_user->id : '0'), $registry->get_user->is_visible_unassigned_order);
        }




        if (isset($_POST['export_date_type'])) {
            $date = getdate();

            Lavra_Loader::LoadClass("ExcelWriter");
            $excel = new ExcelWriter($registry->base_dir . "files/report.xls");
            if ($excel == false)
                echo $excel->error;
            if ($_POST['export_date_type'] == 1) {
                $orders = $order->getOrderStatusActionDate(0, mktime(0, 0, 0, $date['mon'], 1, $date['year']), time());
            } else {
                $orders = $order->getOrderStatusAction(0);
            }

            $myArr = array("<b>№</b>", "<b>Дата</b>", "<b>ФИО</b>", "<b>Контактная информация</b>", "<b>Способ доставки</b>", "<b>Сумма заказа</b>", "<b>Доставка</b>", "<b>К оплате</b>", "<b>Статус</b>");
            $excel->writeLine($myArr);
            foreach ($orders as $hstr) {
                $contacts = $hstr->phone . " <br/>" . $hstr->email;
                $excel->writeRow();
                $excel->writeCol($hstr->id);
                $excel->writeCol($hstr->created);
                $excel->writeCol($hstr->fio);
                $excel->writeCol($contacts);
                $excel->writeCol($hstr->delivery_name);
                $excel->writeCol($hstr->sum);
                $excel->writeCol($hstr->delivery_price);
                $excel->writeCol($hstr->delivery_price + $hstr->sum);
                $excel->writeCol($hstr->status_name);
            }
            $excel->close();
            $this->redirect($registry->base_url . 'files/report.xls');
        }
        $this->_getStatusBuyMarket();

        Lavra_Loader::LoadModels("gdePosulka", "delivery");
        $gdePosulka = new gdePosulka();
        $this->register_object('gdePosulka_obj', $gdePosulka);
    }

    /**
     * Меняет у пользователя B2B колонку на ту которую он заслужил при накопительной в общих настройках
     */
    private function _changeUserB2B() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Order", "order");
        $order = new Order();
        if ($registry->is_b2b == true) { //Если включен режим B2B
            $get_order = $order->getOrderId($this->param['order_id']);
            if (isset($get_order->user_id) && $get_order->user_id > 0) { //Если заказ сделал авторизованный пользователь
                Lavra_Loader::LoadClass("Users");
                $users = new Users();
                $get_user = $users->getUserId($get_order->user_id);
                $user_real_b2b = $registry->setting_obj->switchAutoUserB2B($get_order->user_id);

                if ($user_real_b2b > $get_user->b2b_price) { //Если накопительная колонка больше чем установленная, то переключаем
                    $users->setB2B($get_user->id, $user_real_b2b);
                }
            }
        }
    }

    /**
     * Изменение статуса заказа - аякс
     */
    public function setStatusAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Order", "order");
        $order = new Order();
        if (isset($this->param['order_id']) && isset($this->param['status_id'])) {
            $registry->setting_obj->setOrderStatusSMSTemplate($this);
            $order->setStatus($this->param['order_id'], $this->param['status_id']);
            $this->_sendSuccessMessage($this->param['order_id'], $this->param['status_id']);
            $this->_changeUserB2B(); //Меняем у пользователя B2B колонку
            $this->setMessage('Статус успешно изменен!');
        }
        $this->orders_listAction();
    }

    public function setCommentAdminAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Order", "order");
        $order = new Order();
        if (isset($this->param['order_id'])) {
            $_GET['comment'] = str_replace('"', '&quot;', $_GET['comment']);
            $order->setCommentAdmin($this->param['order_id'], $_GET['comment']);
        }
    }

    /**
     * Подробное описание заказа
     */
    public function getOrderAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Application");
        if (isset($this->param['order_id'])) {
            Lavra_Loader::LoadModels("Order", "order");
            $orders = new Order();
            Lavra_Loader::LoadModels("Characteristics", "characteristics");
            $characteristic = new Characteristics();
            $this->get_sizes = $characteristic->getValues(2);
            if (isset($_POST['status_id'])) { //Изменение статуса и матода доставки
                $registry->setting_obj->setOrderStatusSMSTemplate($this);
                $orders->setStatus($this->param['order_id'], $_POST['status_id']);
                $this->_sendSuccessMessage($this->param['order_id'], $_POST['status_id']);
                $this->_changeUserB2B(); //Меняем у пользователя B2B колонку
            }
            if (isset($_POST['delivery_id'])) {
                $orders->setDelivery($this->param['order_id'], $_POST['delivery_id']);
            }
            if (isset($_POST['post_code'])) {
                $orders->setPostCode($this->param['order_id'], $_POST['post_code']);
            }
            if (isset($_POST['manager_id'])) {
                $orders->setOrderManager($this->param['order_id'], $_POST['manager_id']);
                $this->_mail_order($this->param['order_id'], true); //Отправляем уведомление менеджерам
            }
            if (isset($_POST['fio'])) {
                $orders->setOrderContactInfo($this->param['order_id'], $_POST['fio'], Application::transPhoneNumb($_POST['phone']), $_POST['email'], $_POST['city'], $_POST['city_index'], $_POST['adress'], $_POST['comment'], $_POST['metro_id']);

                if ($_POST['is_jur_person'] == 1) { //Если юр. лицо
                    $orders->setRequisitesOrder($this->param['order_id'], $_POST['company_name'], $_POST['company_fax'], $_POST['company_inn'], $_POST['company_ur_adress'], $_POST['company_bank'], $_POST['company_bik'], $_POST['company_rs'], $_POST['company_ks'], $_POST['company_kpp'], $_POST['company_okpo'], $_POST['company_oknx'], $_POST['company_fio_director'], $_POST['company_fio_accountant'], $_POST['is_jur_person']);
                } else {
                    $orders->setRequisitesOrder($this->param['order_id'], "", "", "", "", "", "", "", "", "", "", "", "", "", 0);
                }
                if (isset($_POST['comment_admin'])) {
                    $orders->setCommentAdmin($this->param['order_id'], $_POST['comment_admin']);
                }
                if (isset($_POST['payment_method_id'])) {
                    $orders->setPaymentMethodId($this->param['order_id'], $_POST['payment_method_id']);
                }
            }

            $order = $orders->getOrderId($this->param['order_id']);
            if (isset($order->id)) {
//                $this->check_out_info = Lavra_Loader::getLoadModule("delivery", "delivery/checkout/get-order/" . $this->param['order_id'] . "/");
                if ($order->user_id > 0) {
                    Lavra_Loader::LoadClass("Users");
                    $users = new Users();
                    $get_user = $users->getUserId($order->user_id);
                    if (isset($get_user->id)) {
                        Lavra_Loader::LoadModels("Coupons", "discount");
                        $coupon = new Coupons();
                        $coupon_code = $coupon->getCouponCodeId($get_user->coupon_code_id);

                        if (isset($coupon_code->id)) {
                            $this->coupon_code = $coupon_code->code;
                        }
                        $this->order_user_id = $order->user_id; //Для привязки купонов
                    }
                }
                $this->order = $order; //Информация о заказе

                Lavra_Loader::LoadModels("Metro", "metro");
                $metro = new Metro();
                $this->metro = $metro->getStantions();

                Lavra_Loader::LoadClass('Users');
                $users = new Users();
                $this->managers = $users->getUsers(2);

                $this->status = $orders->getStatus();
                $get_delivery = $orders->getDelivery();
                $delivery_arr = array();
                foreach ($get_delivery as $key => $value) {
                    $delivery_arr[$value->parent_id][] = $value;
                }
                $this->delivery = $delivery_arr;

                Lavra_Loader::LoadModels('Payment', 'payment');
                include_once $registry->interface_dir . 'IPayment.php';
                $pay = new Payment();
                $this->payment_methods = $pay->getPaymentMethods();
                if ($order->is_delete == 1) {
                    $this->products = $orders->geProductsOrderIdDelete($order->id);
                } else {
                    $this->products = $orders->geProductsOrderId($order->id);
//                    print_r($this->products);
                }
            } else {
                $this->setError("Заказ не найден");
            }
        } else {
            $this->setError("Заказ не найден");
        }
        $this->_getStatusBuyMarket();
    }

    /**
     * Добавить товар к заказу (в админке)
     */
    public function addOrderProductAction() {
        Lavra_Loader::LoadClass("Application");
        Lavra_Loader::LoadModels("Mod", "products");
        $mod = new Mod();
        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        $characteristic = new Characteristics();
        $this->get_sizes = $characteristic->getValues(2);

        if (isset($_GET['query'])) { //Подсказка артикула
            $articles = $mod->getModArticles(($_GET['query']) . '%');
            $article_arr = array();
            foreach ($articles as $value) {
                $article_arr[] = str_replace("&quot;", '"', stripslashes($value->article));
            }
            $arr = array('query' => 'Li',
                'suggestions' => $article_arr);
            exit(json_encode($arr));
        } elseif (isset($_POST['name']) && isset($this->param['order_id'])) { //Добавление товара
            Lavra_Loader::LoadModels("Order", "order");
            Lavra_Loader::LoadClass('Users');
            $users = new Users();
            $orders = new Order();
            $order = $orders->getOrderId($this->param['order_id']);
            if (isset($order->id)) {
                /* При необходимости сделать в подсказке групировку артикулов по характеристикам */
                $char_1_id = 0;
                $char_2_id = 0;
                $char_3_id = 0;
                if (isset($_POST['char_1_id'])) {
                    $char_1_id = $_POST['char_1_id'];
                }
                $_POST['name'] = str_replace('"', "&quot;", ($_POST['name']));
                $get_product = $mod->getModProductArticle(trim($_POST['name']));

                if (isset($get_product->id)) { //Если товар найден
                    $get_user = $users->getUserId($order->user_id);
//                    print_r($get_user);
//                    if (isset($get_user->id)) { //Если пользователь найдет
//                        switch ($get_user->b2b_price) {
//                            case 1: $price = $get_product->price_1;
//                                break;
//                            case 2: $price = $get_product->price_2;
//                                break;
//                            case 3: $price = $get_product->price_3;
//                                break;
//                            case 4: $price = $get_product->price_4;
//                                break;
//                            case 5: $price = $get_product->price_5;
//                                break;
//                            case 6: $price = $get_product->price_6;
//                                break;
//                            case 7: $price = $get_product->price_7;
//                                break;
//                            case 8: $price = $get_product->price_8;
//                                break;
//                            case 9: $price = $get_product->price_9;
//                                break;
//                            case 10: $price = $get_product->price_10;
//                                break;
//                            default: $price = $get_product->price;
//                                break;
//                        }
                    $get_order_product = $orders->getOrderProductId($order->id, $get_product->product_id);
                    if (isset($get_order_product->product_id)) { //Если товар уже есть в заказе, и у него изменена цена, то ставим такую-же
                        $price = $get_order_product->price;
                    } else {
                        
                    }

                    $orders->addProductOrder($get_product->price, $get_product->product_id, $get_product->id, 0, 0, $order->id, $char_1_id, $char_2_id, $char_3_id, $order->user_id);
                    $this->_upOrderPrice($order->id, $order->discount_sum, $order->discount_procent, $order->sum_delivery, $order->sum_expense); //Перерасчет стоимости заказа
//                    }
                } else {
                    $this->setError('Товар не найден');
                }

                $this->order = $orders->getOrderId($this->param['order_id']);
//Обновляем инфу о заказе
                $this->products = $orders->geProductsOrderId($order->id);
                $get_delivery = $orders->getDelivery();
                $delivery_arr = array();
                foreach ($get_delivery as $key => $value) {
                    $delivery_arr[$value->parent_id][] = $value;
                }
                $this->delivery = $delivery_arr;
            }
        }
    }

    /**
     * Изменение скидки и стоимости доставки
     */
    public function setOptionsProductAction() {
        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        $characteristic = new Characteristics();
        $this->get_sizes = $characteristic->getValues(2);
        if (isset($this->param['order_id'])) {
            Lavra_Loader::LoadModels("Order", "order");
            $orders = new Order();
            $order = $orders->getOrderId($this->param['order_id']);
            if (isset($order->id)) {
                Lavra_Loader::LoadModels("Delivery", "delivery");
                $delivery_obj = new Delivery();
                $get_delivery = $delivery_obj->getDeliveryId($_POST['delivery_id']);
                if (isset($get_delivery->id)) {
                    if ($get_delivery->parent_id > 0) { //Если выбрана точка самовывоза
                        $orders->setDelivery($order->id, $get_delivery->parent_id, $get_delivery->id); //Метод доставки
                    } else {
                        $orders->setDelivery($order->id, $_POST['delivery_id']); //Метод доставки
                    }
                }
                $orders->setOrderDeliverySum($order->id, $_POST['delivery_price']); //Сумма доставки

                if ($_POST['discount_type'] == 1) { //Скидка %
                    $orders->setOrderDiscount($order->id, $_POST['discount'], 0);
                } else { //Скидка руб. 
                    $orders->setOrderDiscount($order->id, 0, $_POST['discount']);
                }

                $order = $orders->getOrderId($this->param['order_id']);
                $this->_upOrderPrice($order->id, $order->discount_sum, $order->discount_procent, $order->sum_delivery, $order->sum_expense);


                if (isset($_POST['sum_total'])) {
                    $orders->setOrderTotalSum($order->id, $_POST['sum_total'], $_POST['sum_expense']);  //Сумма с учетом скидки и доставки
                }
//Обновляем инфу о заказе
                $this->order = $orders->getOrderId($order->id);
                $this->products = $orders->geProductsOrderId($order->id);
                $get_delivery = $orders->getDelivery();
                $delivery_arr = array();
                foreach ($get_delivery as $key => $value) {
                    $delivery_arr[$value->parent_id][] = $value;
                }
                $this->delivery = $delivery_arr;
            }
        }
    }

    /**
     * Изменяет кол-во и цену товара в заказе
     */
    public function setProductAction() {
        if (isset($this->param['order_id'])) {
            Lavra_Loader::LoadModels("Order", "order");
            $orders = new Order();
            $order = $orders->getOrderId($this->param['order_id']);
            if (isset($order->id)) {
                if (isset($_POST['product_price'])) {
                    foreach ($_POST['product_price'] as $product_id => $price) {
                        $orders->setOrderPriceProduct($order->id, $product_id, $price); //Меняем цену

                        if (isset($_POST['product_count'][$product_id])) { //Если необходимо изменить кол-во
                            $get_order_product = $orders->getOrderProductId($order->id, $product_id);
                            if (isset($get_order_product->product_id)) { //Если товар существует, то удаляем его и вставляем столько сколько есть в кол-ве
                                $orders->delOrderProductAll($get_order_product->order_id, $get_order_product->product_id); //Удаляем все товары из заказа с id
                                for ($i = 0; $i < $_POST['product_count'][$product_id]; $i++) {
                                    $orders->addProductOrder($get_order_product->price, $get_order_product->product_id, $get_order_product->mod_id, $get_order_product->b2b_num, $get_order_product->image_id, $get_order_product->order_id, $get_order_product->char_1_id, $get_order_product->char_2_id, $get_order_product->char_3_id, $get_order_product->user_id);
                                }
                            }
                        }
                    }
                }

                $this->_upOrderPrice($order->id, $order->discount_sum, $order->discount_procent, $order->sum_delivery, $order->sum_expense);

//Обновляем инфу о заказе
                $this->order = $orders->getOrderId($order->id);
                $this->products = $orders->geProductsOrderId($order->id);
                $get_delivery = $orders->getDelivery();
                $delivery_arr = array();
                foreach ($get_delivery as $key => $value) {
                    $delivery_arr[$value->parent_id][] = $value;
                }
                $this->delivery = $delivery_arr;
            }
        }
    }

    /**
     * Перерасчет цены в заказе в 
     */
    private function _upOrderPrice($order_id, $discount_sum, $discount_procent, $sum_delivery, $sum_expense) {
        $orders = new Order();
        $get_products = $orders->geProductsOrderId($order_id);
        $sum = 0;
        foreach ($get_products as $value) {
            $sum += $value->sum;
        }
        $orders->setOrderSum($order_id, $sum);

        if ($discount_procent > 0) { //Если скидка в %-ах установлена
            $sum = $sum - (($sum * $discount_procent) / 100);
        } elseif ($discount_sum > 0) { //Если скидка в рублях
            $sum = $sum - $discount_sum;
        }

        $orders->setOrderDiscountSum($order_id, $sum); //Сумма с учетом скидки
        $orders->setOrderTotalSum($order_id, $sum + $sum_delivery, $sum_expense);  //Сумма с учетом скидки и доставки
    }

    public function delOrderProductAction() {
        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        $characteristic = new Characteristics();
        $this->get_sizes = $characteristic->getValues(2);
        Lavra_Loader::LoadModels("Order", "order");
        $orders = new Order();
        $order = $orders->getOrderId($this->param['order_id']);
        if (isset($order->id)) {
            $orders->delOrderProduct($this->param['order_id'], $this->param['product_id']);
            $this->products = $orders->geProductsOrderId($this->param['order_id']);
            $this->_upOrderPrice($order->id, $order->discount_sum, $order->discount_procent, $order->sum_delivery, $order->sum_expense); //Перерасчет стоимости заказа
            $this->order = $orders->getOrderId($this->param['order_id']); //Информация о заказе
            $get_delivery = $orders->getDelivery();
            $delivery_arr = array();
            foreach ($get_delivery as $key => $value) {
                $delivery_arr[$value->parent_id][] = $value;
            }
            $this->delivery = $delivery_arr;
        }
    }

    public function checkAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Order", "order");
        $orders = new Order();
        if (isset($_POST['order_id'])) {
            $this->order = $orders->getOrderId($_POST['order_id']);

//Отложенный платеж
            Lavra_Loader::LoadModels('PaymentFactory', 'payment');
            $payment = PaymentFactory::factory($registry->payment_system);
            $registry->open_category_id = 0;
            $this->method_name = $payment->getPaymentMethodId($this->order->payment_method_id);

            switch ($registry->payment_system) {
                case 'robokassa':
                    $this->payment_form = Lavra_Loader::getLoadModule('payment', 'payment/robokassa/' . $_POST['order_id'] . '/');
                    break;
            }
        }
    }

    private function _getStatusBuyMarket() {
        Lavra_Loader::LoadModels("BuyMarket", "sync");
        $buy_market = new BuyMarket();
        Lavra_Loader::LoadModels("Delivery", "delivery");
        $delivery_obj = new Delivery();

        $this->buy_market_outlets = $delivery_obj->getDeliveryAll();
        $this->buy_market_status = $buy_market->getStatuses();

        $this->buy_market_status_name = $buy_market->getStatusesNameCode();
        $this->buy_market_status_arr = $this->_buy_market_status_arr;
    }

}
