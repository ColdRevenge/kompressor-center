<?php

class CheckOut {

    private $_api = 'WMnOfO5VXrv0LNqmtm2oisWx';

    /**
     * Отправляет заказ в чек аут
     * @param type $order_id
     */
    public function sendOrder($order_id, $delivery_id, $fias_id, $city_index, $fias_street_id, $street, $house, $housing, $building, $appartment, $delivery_type, $delivery_addressPvz, $delivery_cost, $delivery_minTerm, $delivery_maxTerm, $fio, $email, $phone, $comment) {
        if (!empty($delivery_type)) {
            Lavra_Loader::LoadClass("Application");
            $registry = Registry::getInstance();



            Lavra_Loader::LoadModels("Basket", "basket");
            $basket = new Basket();
            $basket_short = $basket->getBasketAndVesProduct($registry->session_id);
//        print_r($basket_short);

            $goods = array();
            foreach ($basket_short as $key => $value) {
                $goods[$key]['name'] = Application::cp1251_to_uft8(str_replace('', '', stripslashes($value->name)));
                $goods[$key]['code'] = Application::cp1251_to_uft8(str_replace('', '', stripslashes($value->article)));
                $goods[$key]['variantCode'] =  Application::cp1251_to_uft8(str_replace('', '', 'Размер: ' . $value->char_1_id));
                $goods[$key]['quantity'] = $value->count;
                $goods[$key]['payCost'] = $value->sum;
                $goods[$key]['assessedCost'] = $value->sum;
                $goods[$key]['weight'] = number_format($value->ves, 2);
            }
            $order = array();
            $order['apiKey'] = $this->_api;
            $order['order'] = array(
                'goods' => $goods
                ,
                'delivery' => array(
                    'deliveryId' => $delivery_id, //(isset($_POST['deliveryId']) ? $_POST['deliveryId'] : 0),
                    'placeFiasId' => $fias_id,
                    'addressExpress' => array(
                        'postindex' => Application::cp1251_to_uft8($city_index),
                        'streetFiasId' => $fias_street_id,
                        'street' => Application::cp1251_to_uft8($street),
                        'house' => Application::cp1251_to_uft8($house),
                        'housing' => Application::cp1251_to_uft8($housing),
                        'building' => Application::cp1251_to_uft8($building),
                        'appartment' => Application::cp1251_to_uft8($appartment),
                    ),
                    'type' => $delivery_type,
                    'addressPvz' => Application::cp1251_to_uft8($delivery_addressPvz),
                    "cost" => $delivery_cost,
                    "minTerm" => $delivery_minTerm,
                    "maxTerm" => $delivery_maxTerm),
                "user" => array(
                    "fullname" => Application::cp1251_to_uft8($fio),
                    "email" => Application::cp1251_to_uft8($email),
                    "phone" => $phone
                ),
                "comment" => Application::cp1251_to_uft8($comment),
                "shopOrderId" => $order_id,
                "paymentMethod" => 'cash'
            );



            $this->add($order_id, $delivery_id, $fias_id, $city_index, $fias_street_id, $street, $house, $housing, $building, $appartment, $delivery_type, $delivery_addressPvz, $delivery_cost, $delivery_minTerm, $delivery_maxTerm);
//7801-016
            $errror = null;
            $tuCurl = curl_init();
            curl_setopt($tuCurl, CURLOPT_URL, "http://platform.checkout.ru/service/order/create/");
            curl_setopt($tuCurl, CURLOPT_HEADER, false);
            curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($tuCurl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
            curl_setopt($tuCurl, CURLOPT_POST, 1); // указываем, что данные надо передать именно методом POST
            curl_setopt($tuCurl, CURLOPT_POSTFIELDS, ((json_encode($order)))); // добавляем данные
            curl_setopt($tuCurl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($tuCurl, CURLOPT_SSL_VERIFYHOST, false);
            $tuData = curl_exec($tuCurl);
            if (!curl_errno($tuCurl)) {
                $info = curl_getinfo($tuCurl);

                print_r($info);
            } else {
                $errror = curl_error($tuCurl);
                echo 'Curl error: ' . curl_error($tuCurl);
            }
            curl_close($tuCurl);

            ob_start();
            print_r($info);
            echo '---';
            echo $errror;
            echo json_encode($order);
            echo "\n\n\n";
            print_r($tuData);
            $fp = fopen($registry->files_dir . '11155335chek.txt.html', 'w');
            fwrite($fp, ob_get_clean());
            fclose($fp);
            $response = json_decode($tuData, true);
        }
    }

    public function add($order_id, $delivery_id, $fias_id, $city_index, $fias_street_id, $street, $house, $housing, $building, $appartment, $delivery_type, $delivery_addressPvz, $delivery_cost, $delivery_minTerm, $delivery_maxTerm) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO `delivery_checkout` (`created`, `delivery_id`, `fias_id`, `city_index`, `fias_street_id`, `street`, `house`, `housing`, `building`, `appartment`, `delivery_type`, `delivery_addressPvz`, `delivery_cost`, `delivery_minTerm`, `delivery_maxTerm`, `order_id`) VALUES (NOW(), :delivery_id, :fias_id, :city_index, :fias_street_id, :street, :house, :housing, :building, :appartment, :delivery_type, :delivery_addressPvz, :delivery_cost, :delivery_minTerm, :delivery_maxTerm, :order_id)");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->bindParam(":delivery_id", $delivery_id, PDO::PARAM_STR, 255);
        $query->bindParam(":fias_id", $fias_id, PDO::PARAM_STR, 255);
        $query->bindParam(":city_index", $city_index, PDO::PARAM_STR, 255);
        $query->bindParam(":fias_street_id", $fias_street_id, PDO::PARAM_STR, 255);
        $query->bindParam(":street", $street, PDO::PARAM_STR, 255);
        $query->bindParam(":house", $house, PDO::PARAM_STR, 255);
        $query->bindParam(":housing", $housing, PDO::PARAM_STR, 255);
        $query->bindParam(":building", $building, PDO::PARAM_STR, 255);
        $query->bindParam(":appartment", $appartment, PDO::PARAM_STR, 255);
        $query->bindParam(":delivery_type", $delivery_type, PDO::PARAM_STR, 255);
        $query->bindParam(":delivery_addressPvz", $delivery_addressPvz, PDO::PARAM_STR, 255);
        $query->bindParam(":delivery_cost", $delivery_cost, PDO::PARAM_STR, 255);
        $query->bindParam(":delivery_minTerm", $delivery_minTerm, PDO::PARAM_STR, 255);
        $query->bindParam(":delivery_maxTerm", $delivery_maxTerm, PDO::PARAM_STR, 255);
        $query->execute();
        ob_start();
        print_r($query->errorInfo());
        $fp = fopen($registry->files_dir . 'err11155335chek.txt', 'w');
        fwrite($fp, ob_get_clean());
        fclose($fp);

        return $registry->db->lastInsertId();
    }

    /**
     * Возвращает заказ, с дополнительной проверкой сессии
     * Используется при оформлении заказа
     * @param type $order_id
     * @param type $session_id
     * @return type 
     */
    public function getDeliveryOrder($order_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM `delivery_checkout` WHERE order_id = :order_id");
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

}
