<?php

class gdePosulka {

    private $_api = '8114718c615208661f0e743dd394aca18e02ff250e1c2b982ef1ee9d6446d726529ba03ac5d0bdca';

    public function call($method, Array $params, $id = 1) {
//        $body = json_encode(array("jsonrpc" => '2.0', 'method' => $method, 'params' => $params, 'id' => $id));
//
//        $tuCurl = curl_init();
//        curl_setopt($tuCurl, CURLOPT_URL, "http://gdeposylka.ru/api/v3/jsonrpc");
//        curl_setopt($tuCurl, CURLOPT_VERBOSE, 0);
//        curl_setopt($tuCurl, CURLOPT_HEADER, 0);
//        curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($tuCurl, CURLOPT_POST, true);
//        curl_setopt($tuCurl, CURLOPT_TIMEOUT, 1);
//
//        // указываем заголовки для браузера
//        curl_setopt($tuCurl, CURLOPT_HTTPHEADER, array(
//            "X-Authorization-Token: $this->_api",
//            "Content-Type: application/json",
//            "Content-Length: " . strlen($body)
//        ));
//        curl_setopt($tuCurl, CURLOPT_POSTFIELDS, $body);
//
//
//
//        $tuData = curl_exec($tuCurl);
//        if (!curl_errno($tuCurl)) {
//            $info = curl_getinfo($tuCurl);
//        } else {
//            echo 'Curl error: ' . curl_error($tuCurl);
//        }
//        curl_close($tuCurl);
//        return json_decode($tuData, true);
    }

    public function getPosulka($post_code, $order_id) {
        $this->call('addTracking', array('tracking' => array(
                "tracking_number" => $post_code,
                "courier_slug" => "russian-post",
                "title" => "Номер заказ " . $order_id
            )), 1);
        $result = $this->call('getTrackingInfo', array('tracking' => array(
                "tracking_number" => $post_code,
                "courier_slug" => "russian-post",
                "title" => "Номер заказ " . $order_id
            )), 1);
//            print_r($result);


        return $result;
    }

    public function cacheGdePosulka($param) {
        Lavra_Loader::LoadClass('Cache');
        $cache = Cache::getInstance();
        if (date('H') == 0) {
            $cache->deleteTag('gdePosulka');
        }
        $get_cache = $cache->get('gdePosulkaController-' . date('H') . '-' . date('d') . '-' . $param['post_code'] . '-' . $param['order_id'], 'gdePosulka');

        if (!empty($get_cache)) {
//            print_r($get_cache);
            return unserialize($get_cache);
        } else {
            $result = $this->getPosulka($param['post_code'], $param['order_id']);
//            echo 'gdePosulkaController-' . date('H') . '-' . date('d') . '-' . $param['post_code'] . '-' . $param['order_id'];
            if (count($result)) {
                $cache->setTags('gdePosulkaController-' . date('H') . '-' . date('d') . '-' . $param['post_code'] . '-' . $param['order_id'], serialize($result), 'gdePosulka');
            }

//            exit($result);
//            $cache->delete('gdePosulkaController-' . (date('H', strtotime("now-1 hour"))) . '-' . $param['post_code'] . '-' . $param['order_id']);
//            CacheModule::delCacheModule('gdePosulkaController-' . (date('H', strtotime("now-2 hour"))) . '-' . $param['post_code'] . '-' . $param['order_id']);
            return $result;
        }
    }

}
