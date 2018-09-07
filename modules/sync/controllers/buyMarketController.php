<?php

class buyMarketController extends Controller {

    //get token https://oauth.yandex.ru/authorize?response_type=token&client_id=35ca88fb8d8f4101a87e668dbc13a2e1
    private $_OAUTH_CLIENT = '65bd0fdb4a25437ea6004d4bc2ea41c6';
    private $_OAUTH_TOKEN = '4b33c8a5e96b4d88845152acc3f5bd25';
    private $_OAUTH_LOGIN = 'padre02';
    private $_CAMPAIGN_ID = '21230541';

    /**
     * Изменяет статус заказа
     */
    public function setStatusAction() {
        $registry = Registry::getInstance();
        $registry->is_only_content = 1;

        if ($registry->shop_type == 2) {
            $this->_OAUTH_CLIENT = '2f7a32d1afc04332ae68721c496f8552';
            $this->_OAUTH_TOKEN = '578d4e0fb2d84e02acf3e426b789bb44';
            $this->_CAMPAIGN_ID = '21264784';
        }

        header("Content-Type: application/json; charset=utf-8");
        Lavra_Loader::LoadModels("BuyMarket", "sync");
        $buy_market = new BuyMarket();
        //https://api.partner.market.yandex.ru/v2/campaigns/21070207/orders/8262/status.xml
        if (isset($_POST['status_buy_market']) && $_POST['status_buy_market'] != '0' && isset($_POST['order_id_buy_market']) && (int) $_POST['order_id_buy_market'] > 0) {
            $url = "https://api.partner.market.yandex.ru/v2/campaigns/" . $this->_CAMPAIGN_ID . "/orders/" . (int) $_POST['order_id_buy_market'] . "/status.xml?oauth_token=" . $this->_OAUTH_TOKEN . "&oauth_client_id=" . $this->_OAUTH_CLIENT . "&oauth_login=" . $this->_OAUTH_LOGIN;
            //sub_status_buy_market
            if (isset($_POST['sub_status_buy_market']) && $_POST['sub_status_buy_market'] != '0') {
                $content = '<?xml version="1.0" encoding="UTF-8"?><order status="' . $_POST['status_buy_market'] . '" substatus="' . $_POST['sub_status_buy_market'] . '" />';
            } else {
                $content = '<?xml version="1.0" encoding="UTF-8"?><order status="' . $_POST['status_buy_market'] . '" />';
            }

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/xml"));
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($curl, CURLOPT_POSTFIELDS, ($content));
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            $request = curl_exec($curl);
            curl_close($curl);
//  ob_start();
//        print_r($request);
//        $fp = fopen($registry->files_dir . 'import/1.xml', 'w');
//        fwrite($fp, ob_get_contents());
//        fclose($fp);

            $dom = new DOMDocument();
            $dom->loadXML($request);
            $is_ok = 0;
            $status = null;
            foreach ($dom->childNodes as $response) {
                if ($response->nodeType == 1 && $response->nodeName == "response") {
                    foreach ($response->childNodes as $order) {
                        if ($order->nodeType == 1 && $order->nodeName == "order") {
                            if ($order->getAttribute('status')) {
                                $is_ok = 1; //Если все нормально помечаем
                                $status = $order->getAttribute('status');
                                $substatus = $order->getAttribute('substatus');
                                $order_id_buy_market = $order->getAttribute('id');
                                $buy_market->setStatusOrder($order_id_buy_market, $status, $substatus);
                            }
                        }
                    }
                }
            }


//            foreach ($_POST as $key => $value) {
//                echo json_encode($_POST);
//            }
//            exit();
//            $status = 'PICKUP';
            $get_name = $buy_market->getStatusesNameCode();
            if (empty($status)) {
                echo json_encode(array('is_error' => 1));
            } else {
                echo json_encode(array('is_ok' => $is_ok, 'status' => $get_name[trim($status)]));
            }
        }
    }

    /**
     * Изменение статуса заказа и заполнение доп. полей (тел. квартира и т.д.)
     */
    public function buy_market_order_statusAction() {
        $registry = Registry::getInstance();
        $registry->is_only_content = 1;
        $request = file_get_contents("php://input");

        ini_set("display_errors", 'off');
        error_reporting(0);

//        ob_start();
//        print_r($request);
//        $fp = fopen($registry->files_dir . 'import/test1387041515.xml', 'w');
//        fwrite($fp, ob_get_contents());
//        fclose($fp);
//        $fp = fopen($registry->files_dir . 'import/test1387041515.xml', 'r');
//        $request = fread($fp, filesize($registry->files_dir . 'import/test1387041515.xml'));
//        fclose($fp);


        Lavra_Loader::LoadModels("BuyMarket", "sync");
        $buy_market = new BuyMarket();
        Lavra_Loader::LoadModels("Order", "order");
        $order_obj = new Order();

        $dom = new DOMDocument();
        $dom->loadXML($request);
        $outlet_id = 0;
        $order_id_buy_market = 0;
        foreach ($dom->childNodes as $order) {
            $order_id_buy_market = $order->getAttribute('id');
            $total = $order->getAttribute('total');
            $items_total = $order->getAttribute('items-total');
            $payment_type = $order->getAttribute('payment-type');
            $payment_method = $order->getAttribute('payment-method');
            $status = $order->getAttribute('status');
            $substatus = $order->getAttribute('substatus');
            if (empty($status)) {
                $status = 'PROCESSING';
            }
            $fio = null;
            $phone = null;
            $email = null;
            $adress = null;
            $outlet_id = 0;
            $notes = null;
            $delivery_child_id = 0;

            foreach ($order->childNodes as $order_items) {
                if ($order_items->nodeType == 1 && $order_items->nodeName == "buyer") { //Инфа о человеке
                    $phone = (Application::transPhoneNumb($order_items->getAttribute('phone')));
                    $email = ($order_items->getAttribute('email'));
                    $fio = ($order_items->getAttribute('first-name') . ' ' . $order_items->getAttribute('last-name'));
                }
                if ($order_items->nodeType == 1 && $order_items->nodeName == "delivery") { //Доставка
                    foreach ($order_items->childNodes as $delivery) {
                        if ($delivery->nodeType == 1 && $delivery->nodeName == "address") { //Инфа о человеке
                            $phone = (Application::transPhoneNumb($delivery->getAttribute('phone')));
                            $email = ($delivery->getAttribute('email'));
                            $fio = ($delivery->getAttribute('recipient'));

                            $adress = (($delivery->getAttribute('country')) ? "Страна: " . ($delivery->getAttribute('country')) : '') .
                                    (($delivery->getAttribute('city')) ? ", город: " . ($delivery->getAttribute('city')) : '') .
                                    (($delivery->getAttribute('street')) ? ", ул. " . ($delivery->getAttribute('street')) : '') .
                                    (($delivery->getAttribute('house')) ? ", дом " . ($delivery->getAttribute('house')) : '') .
                                    (($delivery->getAttribute('block')) ? ", корпус " . ($delivery->getAttribute('block')) : '') .
                                    (($delivery->getAttribute('floor')) ? ", этаж " . ($delivery->getAttribute('floor')) : '') .
                                    (($delivery->getAttribute('entryphone')) ? ", домофон " . ($delivery->getAttribute('entryphone')) : '') .
                                    (($delivery->getAttribute('apartment')) ? ", квартира " . ($delivery->getAttribute('apartment')) : '') .
                                    (($delivery->getAttribute('subway')) ? ", метро " . ($delivery->getAttribute('subway')) : '');
                        }
                    }
                    if ($delivery->nodeType == 1 && $delivery->nodeName == "outlet") { //Инфа о человеке
                        $outlet_id = $delivery->getAttribute('id');
                        $get_delivery = $buy_market->getDeliveryOutletId($outlet_id);
                        if (isset($get_delivery->id)) {
                            $delivery_child_id = $get_delivery->id;
                        }
                    }
                    if ($delivery->nodeType == 1 && $delivery->nodeName == "notes") { //Инфа о человеке
                        $notes = ($order_items->textContent);
                    }
                }
            }
        }
//        echo $order_id . '#';
        if ($order_id_buy_market > 0) {
//            echo $adress.'#';
            $buy_market->setOrderContactInfo($order_id_buy_market, $fio, Application::transPhoneNumb($phone), $email, $adress, $notes);

            if ($delivery_child_id) { //Если точка самовывоза, то указываем какая
                $buy_market->setOutletId($order_id_buy_market, $delivery_child_id);
            }
            $buy_market->setStatusOrder($order_id_buy_market, $status, $substatus);
            /**
             * Посылаем уведомление
             */
            $get_order = $buy_market->getOrderBuyMarketOrderId($order_id_buy_market);
            if (isset($get_order->id)) {
                $this->_mail_order($get_order->id);
                $registry->setting_obj->sendOrderStatusSMS($get_order->id, 0);
            }
        }
    }

    /**
     * Оформление заказа
     */
    public function buy_market_order_acceptAction() {
        header("Content-Type: application/xml; charset=utf-8");
        $registry = Registry::getInstance();
        $request = (file_get_contents("php://input"));
//        $registry->is_only_content = 1;


        ini_set("display_errors", 'on');
        error_reporting(E_ALL);
//        ob_start();
//        print_r($request);
//        $fp = fopen($registry->files_dir . 'import/test1387041515.xml', 'w');
//        fwrite($fp, ob_get_contents());
//        fclose($fp);
//        $fp = fopen($registry->files_dir . 'import/test1387041515.xml', 'r');
//        $request = fread($fp, filesize($registry->files_dir . 'import/test1387041515.xml'));
//        fclose($fp);

        Lavra_Loader::LoadModels("Order", "order");
        $order_obj = new Order();
        Lavra_Loader::LoadModels("Products", "products");
        $product_obj = new Products();
        Lavra_Loader::LoadModels("BuyMarket", "sync");
        $buy_market = new BuyMarket();
        Lavra_Loader::LoadModels("Metro", "metro");
        $metro = new Metro();


        $dom = new DOMDocument();
        $dom->loadXML($request);
        foreach ($dom->childNodes as $order) {
            $payment_method = $order->getAttribute('payment-method'); //Метод оплаты
            $products = array();
            $notes = null;
            $delivery_id = 0;
            $delivery_price = 0;
            $outlet_id = 0;
            $adress = "";
            $order_id_buy_market = $order->getAttribute('id');
            $i = 0;
            foreach ($order->childNodes as $order_items) { //Заказанные 
                if ($order_items->nodeType == 1 && $order_items->nodeName == "items") {
                    foreach ($order_items->childNodes as $item) {
                        $get_product = $product_obj->getPrpductId($item->getAttribute('offer-id'));
//                        print_r($item->getAttribute('offer-id'));
                        if (isset($get_product->id)) {
                            $products[$i]['offer_id'] = $item->getAttribute('offer-id');
                            $products[$i]['feed_id'] = $item->getAttribute('feed-id');
                            $products[$i]['count'] = $item->getAttribute('count');
                            $products[$i]['price'] = $get_product->price;
                            $products[$i]['mod_id'] = $get_product->mod_id;
                            $i++;
                        }
                    }
                }
                if ($order_items->nodeType == 1 && $order_items->nodeName == "notes") { //Комментарий к заказу
                    $notes = $order_items->textContent;
                }
                if ($order_items->nodeType == 1 && $order_items->nodeName == "delivery") { //Доставка
//id="{string}" type="{string}" price="{number}" service-name="{string}" outlet-id="{number}"
                    $_sum_order = 0;
                    if (count($products) && $order_id_buy_market > 0) {
                        foreach ($products as $value) { //Считаем сумму заказа
                            $_sum_order += $value['price'] * $value['count'];
                        }
                    }
                    $delivery_id = $order_items->getAttribute('id');
                    $delivery_price = $this->_getPriceDelivery($delivery_id, $order_items->getAttribute('price'), $_sum_order);
                    $outlet_id = $order_items->getAttribute('outlet-id');

                    $get_delivery = $buy_market->getDeliveryOutletId($outlet_id);
                    $delivery_child_id = 0;
                    if (isset($get_delivery->id)) {
                        $delivery_child_id = $get_delivery->id;
                    }

                    $city = $city_index = '';
                    $metro_id = 0;
                    foreach ($order_items->childNodes as $delivery_item) {
                        if ($delivery_item->nodeType == 1 && $delivery_item->nodeName == "address") { //Доставка
                            $city_index = $delivery_item->getAttribute('postcode');
                            $city = $delivery_item->getAttribute('city');

                            if (($delivery_item->getAttribute('subway'))) { //Узнаем метро
                                $get_metro = $metro->getStantionsName($delivery_item->getAttribute('subway'));
                                if (isset($get_metro->name)) {
                                    $metro_id = $get_metro->id;
                                }
                            }

                            $adress = (($delivery_item->getAttribute('country')) ? "Страна: " . ($delivery_item->getAttribute('country')) : '') .
                                    (($delivery_item->getAttribute('city')) ? ", город: " . ($delivery_item->getAttribute('city')) : '') .
                                    (($delivery_item->getAttribute('street')) ? ", ул. " . ($delivery_item->getAttribute('street')) : '') .
                                    (($delivery_item->getAttribute('house')) ? ", дом " . ($delivery_item->getAttribute('house')) : '') .
                                    (($delivery_item->getAttribute('block')) ? ", корпус " . ($delivery_item->getAttribute('block')) : '') .
                                    (($delivery_item->getAttribute('floor')) ? ", этаж " . ($delivery_item->getAttribute('floor')) : '') .
                                    (($delivery_item->getAttribute('entryphone')) ? ", домофон " . ($delivery_item->getAttribute('entryphone')) : '') .
                                    (($delivery_item->getAttribute('apartment')) ? ", квартира " . ($delivery_item->getAttribute('apartment')) : '') .
                                    (($delivery_item->getAttribute('subway')) ? ", метро " . ($delivery_item->getAttribute('subway')) : '');
                        }
                    }
                }
            }
        }
        if (count($products) && $order_id_buy_market > 0) {
            $currency_id = 1;
            $exchange = 1;
//Добавляем заказ

            $sum_order = 0;
            foreach ($products as $value) { //Считаем сумму заказа
                $sum_order += $value['price'] * $value['count'];
            }

            $order_id = $order_obj->addOrder($currency_id, $exchange, 'Покупка на маркете', '', '', $city, $city_index, $adress, $metro_id, $delivery_id, $delivery_child_id, 1, $notes, 0, $sum_order, $delivery_price, 0, $sum_order + $delivery_price, '', 0, 0, 0, '');
            $buy_market->setOrderIdBuyMarket($order_id, $order_id_buy_market);

            //Добавляем товары к заказу
            foreach ($products as $value) {
                for ($i = 0; $i < $value['count']; $i++) { //Несколько товаров с одним кол-вом
                    $product_obj->WarehouseMinus($value['mod_id']); //Уменьшаем кол-во продуктов на складе
//                    $buy_market->addOrderProduct($value['price'], $value['offer_id'], $value['mod_id'], 0, 0, $order_id, $order_id_buy_market);
                    $order_obj->addProductOrder($value['price'], $value['offer_id'], $value['mod_id'], 0, 0, $order_id, 0, 0, 0, 0, 0);
                }
            }

            echo '<?xml version="1.0" encoding="UTF-8"?><order accepted="true" id="' . $order_id . '" />';
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
            if (isset($get_delivery->id) && $get_delivery->outlet_id > 0) {
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

        if (count($this->mail_products)) { //Если хоть что-то заказали
            if ($is_only_manager == false) { //Если письмо нужно отправить всем
                if (mb_strpos($this->mail_order->email, '@')) {
                    if (isset($this->mail_order->email) && !empty($this->mail_order->email)) { //Если почта есть
                        $mail->send(array($this->mail_order->email), "Ваш заказ №$order_id - магазин «" . $registry->shop_name . '»', $message_user);
                    }
                }

//            Уведомление администраторов
                $mail->send(array($this->_setting->email, $this->_setting->email_2, $this->_setting->email_3), "Уведомление о новом заказе (№$order_id)", $message_admin);
            }

            Lavra_Loader::LoadClass('Users');
            $user = new Users();
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
     * Проверка наличия товара
     */
    public function buy_market_cartAction() {
        ini_set("display_errors", 'off');
        error_reporting(0);
        header("Content-Type: application/xml; charset=utf-8");

        $registry = Registry::getInstance();
//        $registry->is_only_content = 1;

        $request = (file_get_contents("php://input"));
//        ob_start();
//        print_r($request);
//        $fp = fopen($registry->files_dir . 'import/test123.xml', 'w');
//        fwrite($fp, $request);
//        fclose($fp);
//        $fp = fopen($registry->files_dir . 'import/test123.xml', 'r');
//        $request = fread($fp, filesize($registry->files_dir . 'import/test123.xml'));
//        fclose($fp);

        $dom = new DOMDocument();
        $dom->loadXML($request);
        $products = array();
        $i = 0;
        Lavra_Loader::LoadModels("Products", "products");
        $product_obj = new Products();
        $_order_sum = 0;
        foreach ($dom->documentElement->childNodes as $cart) { //Обходим корневой узел root
            if ($cart->nodeType == 1 && $cart->nodeName == "items") { //Обходим все товары которые заказал клиент
                foreach ($cart->childNodes as $item) {
                    $get_product = $product_obj->getPrpductId($item->getAttribute('offer-id'));

                    if (isset($get_product->id)) {
                        $products[$i]['offer_id'] = $item->getAttribute('offer-id');
                        $products[$i]['feed_id'] = $item->getAttribute('feed-id');
                        $products[$i]['count'] = $item->getAttribute('count');
                        $products[$i]['price'] = $get_product->price;
                        $products[$i]['delivery'] = 'true';
                        $_order_sum += $get_product->price * $item->getAttribute('count');
                        $i++;
                    }
                }
            }
        }
        if (count($products)) {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>
                <cart currency="RUR">
    <items>';
            foreach ($products as $value) {
                $xml .= '<item feed-id="' . $value['feed_id'] . '" offer-id="' . $value['offer_id'] . '" price="' . $value['price'] . '" count="' . $value['count'] . '" delivery="' . $value['delivery'] . '"/>';
            }
            $xml .= '</items>
    <delivery-options>
    ';

            Lavra_Loader::LoadModels("Delivery", "delivery");
            $delivery_obj = new Delivery();
            $delivery = $delivery_obj->getDelivery();
            if (isset($delivery[0])) {
                foreach ($delivery[0] as $value) { //Служба доставки
                    if (!empty($value->buy_market_name)) {
                        $xml .= ' <delivery id="' . $value->id . '" service-name="' . ($value->buy_market_desc) . '" type="' . $value->buy_market_name . '" price="' . $this->_getPriceDelivery($value->id, $value->price, $_order_sum) . '">';
                        $xml .= '
                        <dates from-date="' . date('d-m-Y', time() + ($value->from_day * 86400)) . '" to-date="' . date('d-m-Y', time() + ($value->to_day * 86400)) . '"/>';
                        if ($value->buy_market_name == 'PICKUP') { //Настраивается в ручную
                            $xml .= '
                    <outlets>';
                            $get_outlet = $delivery_obj->getDeliveryChild($value->id);
                            foreach ($get_outlet as $value) {
                                if ($value->outlet_id != 0) {
                                    $xml .= '<outlet id="' . $value->outlet_id . '"/>';
                                }
                            }
                            $xml .= '</outlets>';
                        }
                        $xml .= '
    </delivery> 
';
                    }
                }
            }

            $xml .= '
    </delivery-options>
    <payment-methods>
      <payment-method>CASH_ON_DELIVERY</payment-method>
    </payment-methods>
</cart>';
            echo $xml;

            $fp = fopen($registry->files_dir . 'import/test123.xml', 'w');
            fwrite($fp, $xml);
            fclose($fp);
            /*
              Способ оплаты заказа.
              Возможные значения для предоплаты:
              YANDEX — оплата при оформлении (только для России);
              SHOP_PREPAID — предоплата напрямую магазину (только для Украины).
              Возможные значения для постоплаты:
              CASH_ON_DELIVERY — наличный расчет при получении заказа;
              CARD_ON_DELIVERY — оплата банковской картой при получении заказа.
             */
        }
    }

    /**
     * Считает ебанутые условия почты России, и нестандартные условия других компаний
      //        до 1 000 руб. включительно	40 руб. + 5% от суммы
      //свыше 1 000 до 5 000 руб. включительно	50 руб. + 4% от суммы
      //свыше 5 000 руб. до 20 000 руб. включительно	150 руб. + 2% от суммы
      //свыше 20 000 руб. до 500 000 руб. включительно	250 руб. + 1,5% от суммы
     */
    private function _getPriceDelivery($delivery_id, $delivery_price, $sum_order) {
        if ($delivery_id == 11) { //Почта России ёпта
            if ($sum_order < 1000) {
                $delivery_price = ceil($delivery_price + 40 + ($sum_order * 0.05));
            } elseif ($sum_order < 5000) {
                $delivery_price = ceil($delivery_price + 50 + ($sum_order * 0.04));
            } elseif ($sum_order < 20000) {
                $delivery_price = ceil($delivery_price + 150 + ($sum_order * 0.02));
            } elseif ($sum_order >= 20000) {
                $delivery_price = ceil($delivery_price + 250 + ($sum_order * 0.015));
            }
        }
        return $delivery_price;
    }

}

/**

      private function _getToken() {
      ini_set("display_errors", 'on');
      error_reporting(E_ALL);
      $client_id = "35ca88fb8d8f4101a87e668dbc13a2e1";
      $client_secret = "c4bd0e38e5094f5eba6510106b101586";

      // Если мы еще не получили разрешения от пользователя, отправляем его на страницу для его получения
      // В урл мы также можем вставить переменную state, которую можем использовать для собственных нужд, я не стал
      if (!isset($_GET["code"])) {
      Header("Location: https://oauth.yandex.ru/authorize?response_type=code&client_id=" . $client_id);
      die();
      }

      // Если пользователь нажимает "Разрешить" на странице подтверждения, он приходит обратно к нам
      // $_Get["code"] будет содержать код для получения токена. Код действителен в течении часа.
      // Теперь у нас есть разрешение и его код, можем отправлять запрос на токен.

      $result = $this->_postKeys("https://oauth.yandex.ru/token", array(
      'grant_type' => 'authorization_code', // тип авторизации
      'code' => $_GET["code"], // наш полученный код
      'client_id' => $client_id,
      'client_secret' => $client_secret
      ), array('Content-type: application/x-www-form-urlencoded')
      );

      // отправляем запрос курлом
      // после получения ответа, проверяем на код 200, и если все хорошо, то у нас есть токен

      if ($result["code"] == 200) {
      $result["response"] = json_decode($result["response"], true);
      return $result["response"]["access_token"];
      } else {
      echo "Какая-то фигня! Код: " . $result["code"];
      }

      // Токен можно кинуть в базу, связав с пользователем, например, а за пару дней до конца токена напомнить, чтобы обновил
      }

      private function _postKeys($url, $peremen, $headers) {
      $post_arr = array();
      foreach ($peremen as $key => $value) {
      $post_arr[] = $key . "=" . $value;
      }
      $data = implode('&', $post_arr);

      $handle = curl_init();
      curl_setopt($handle, CURLOPT_URL, $url);
      curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($handle, CURLOPT_POST, true);
      curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
      $response = curl_exec($handle);
      $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
      return array("code" => $code, "response" => $response);
      }
     */
    