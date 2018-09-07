<?php

class checkoutController extends Controller {

    private $_api = 'WMnOfO5VXrv0LNqmtm2oisWx';

    /**
     * Для админа
     */
    public function getAdminDeliveryAction() {
        if (isset($this->param['order_id'])) {

            Lavra_Loader::LoadModels("CheckOut", "delivery");
            $checkout = new CheckOut();
            $this->order_info = $checkout->getDeliveryOrder($this->param['order_id']);
        }
    }

    private function _getTicket() {
        $tuCurl = curl_init();
        curl_setopt($tuCurl, CURLOPT_URL, "http://platform.checkout.ru/service/login/ticket/" . $this->_api);
        curl_setopt($tuCurl, CURLOPT_VERBOSE, 0);
        curl_setopt($tuCurl, CURLOPT_HEADER, 0);
        curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1);
        $tuData = curl_exec($tuCurl);
        if (!curl_errno($tuCurl)) {
            $info = curl_getinfo($tuCurl);
        } else {
            echo 'Curl error: ' . curl_error($tuCurl);
        } curl_close($tuCurl);
        $response = json_decode($tuData, true);
        return $response["ticket"];
    }

    public function getPlaceAction() {
        $registry = Registry::getInstance();
//        ob_start();
//        print_r($_POST);
//        print_r($_GET);
//        $fp = fopen($registry->files_dir . '555chek.txt', 'w');
//        fwrite($fp, ob_get_clean());
//        fclose($fp);


        Lavra_Loader::LoadClass("Application");
        if (isset($_GET['query'])) {
            $tuCurl = curl_init();
            curl_setopt($tuCurl, CURLOPT_URL, "http://platform.checkout.ru/service/checkout/getPlacesByQuery/?ticket=" . $this->_getTicket() . '&place=' . ($_GET['query']));
            curl_setopt($tuCurl, CURLOPT_VERBOSE, 0);
            curl_setopt($tuCurl, CURLOPT_HEADER, 0);
            curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1);
            $tuData = curl_exec($tuCurl);

            if (!curl_errno($tuCurl)) {
                $info = curl_getinfo($tuCurl);
            } else {
                //      echo 'Curl error: ' . curl_error($tuCurl);
            } curl_close($tuCurl);
            $response = json_decode($tuData, true);

            $suggestions = array();
            if (isset($response['suggestions'])) {
                foreach ($response['suggestions'] as $key => $value) {
                    $suggestions[] = array('value' => $value['fullName'], 'id' => $value['id']);
                }
            }
            $result = array("query" => "Unit", 'suggestions' => $suggestions);
            exit(json_encode($result));
        }
        exit();
    }

    public function getStreetAction() {
        $registry = Registry::getInstance();


        Lavra_Loader::LoadClass("Application");
        if (isset($_GET['query']) && isset($_GET['placeId'])) {
            $tuCurl = curl_init();
            curl_setopt($tuCurl, CURLOPT_URL, "http://platform.checkout.ru/service/checkout/getStreetsByQuery/?ticket=" . $this->_getTicket() . '&street=' . ($_GET['query']) . '&placeId=' . ($_GET['placeId']));
            curl_setopt($tuCurl, CURLOPT_VERBOSE, 0);
            curl_setopt($tuCurl, CURLOPT_HEADER, 0);
            curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1);
            $tuData = curl_exec($tuCurl);

            if (!curl_errno($tuCurl)) {
                $info = curl_getinfo($tuCurl);
            } else {
                //      echo 'Curl error: ' . curl_error($tuCurl);
            } curl_close($tuCurl);
            $response = json_decode($tuData, true);

            ob_start();
            print_r($response);
            $fp = fopen($registry->files_dir . '111555chek.txt', 'w');
            fwrite($fp, ob_get_clean());
            fclose($fp);
            $suggestions = array();
            if (isset($response['suggestions'])) {
                foreach ($response['suggestions'] as $key => $value) {
                    $suggestions[] = array('type' => $value['type'], 'value' => $value['name'] . ' ' . $value['type'], 'id' => $value['id']);
                }
            }
            $result = array("query" => "Unit", 'suggestions' => $suggestions);
            exit(json_encode($result));
        }
        exit();
    }

    public function calculateAction() {
        $registry = Registry::getInstance();

        Lavra_Loader::LoadClass("Application");
        if (isset($_GET['fias'])) {

            Lavra_Loader::LoadModels("Basket", "basket");
            $basket = new Basket();
            $basket_short = $basket->getBasketAndVes($registry->session_id);

            $tuCurl = curl_init();
            curl_setopt($tuCurl, CURLOPT_URL, "http://platform.checkout.ru/service/checkout/calculation/?ticket=" . $this->_getTicket() . '&placeId=' . $_GET['fias'] .
                    '&totalSum=' . $basket_short->sum . '&assessedSum=' . $basket_short->sum . '&totalWeight=' . $basket_short->ves . '&itemsCount=' . $basket_short->count);
            curl_setopt($tuCurl, CURLOPT_VERBOSE, 0);
            curl_setopt($tuCurl, CURLOPT_HEADER, 0);
            curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1);
            $tuData = curl_exec($tuCurl);

            if (!curl_errno($tuCurl)) {
                $info = curl_getinfo($tuCurl);
            } else {
                //      echo 'Curl error: ' . curl_error($tuCurl);
            } curl_close($tuCurl);
            $response = json_decode(($tuData), true);

            $this->response = $response;

            $this->register_object('obj', $this);
        }
    }

    public function utf8Convert($param) {
        if (isset($param['convert'])) {
            return ($param['convert']);
        }
    }

    public function checkoutGetAction() {
        
    }

}
