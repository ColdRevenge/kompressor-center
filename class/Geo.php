<?php

/*

  Lavra_Loader::LoadClass('Geo');
  $geo = new Geo();
  $geo->getCity();
 */

/**
 * Description of Geo
 *
 * @author Komp
 */
class Geo {

    private function _setGeo($city, $region, $ip) {
        if (!empty($city)) {
            $registry = Registry::getInstance();
            $query = $registry->db->prepare("INSERT INTO geo (city, region, ip) VALUES (:city, :region, :ip)");
            $query->bindParam(":city", $city, PDO::PARAM_STR, 255);
            $query->bindParam(":region", $region, PDO::PARAM_STR, 255);
            $query->bindParam(":ip", $ip, PDO::PARAM_STR, 255);
            $query->execute();
        }
    }

    private function _getIp($ip) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM geo WHERE ip=:ip");
        $query->bindParam(":ip", trim($ip), PDO::PARAM_STR, 255);
        $query->execute();
        $return = $query->fetch(PDO::FETCH_OBJ);
        if (isset($return->city) && !empty($return->city)) {
            return array('city' => $return->city, 'region' => $return->region);
        }
        return false;
    }

    private function _getCityIpGeoBase($ip) {
        $dom = new DOMDocument();
        $dom->load('http://ipgeobase.ru:7020/geo?ip=' . $ip);
        $city_arr = array();
        foreach ($dom->documentElement->childNodes as $adress) {
            if ($adress->nodeType == 1 && ($adress->nodeName) == "ip") { //Обход товаров
                foreach ($adress->childNodes as $city) {
                    if ($city->nodeType == 1 && ($city->nodeName) == "city") { //Обход товаров
                        $_city = $city->textContent;
                        if (!empty($_city)) {
                            $city_arr['city'] = trim($_city);
                        }
                    }
                    if ($city->nodeType == 1 && ($city->nodeName) == "region") { //Обход товаров
                        $region = $city->textContent;
                        if (!empty($region)) {
                            $city_arr['region'] = trim($region);
                        }
                    }
                }
            }
        }
        if (isset($city_arr['city']) && isset($city_arr['region'])) {
            return $city_arr;
        } else {
            return false;
        }
    }

    private function _getCirySypexGeo($ip) {
        $dom = new DOMDocument();
        $dom->load('http://api.sypexgeo.net/xml/' . $ip);
        $city_arr = array();
        foreach ($dom->documentElement->childNodes as $adress) {
            if ($adress->nodeType == 1 && ($adress->nodeName) == "ip") { //Обход товаров
                foreach ($adress->childNodes as $city) {
                    if ($city->nodeType == 1 && ($city->nodeName) == "city") { //Обход товаров
                        foreach ($city->childNodes as $name) {
                            if ($name->nodeType == 1 && ($name->nodeName) == "name_ru") { //Обход товаров
                                $_city = $name->textContent;
                                if (!empty($_city)) {
                                    $city_arr['city'] = trim($_city);
                                }
                            }
                        }
                    }
                    if ($city->nodeType == 1 && ($city->nodeName) == "region") { //Обход товаров
                        foreach ($city->childNodes as $name) {
                            if ($name->nodeType == 1 && ($name->nodeName) == "name_ru") { //Обход товаров
                                $region = $name->textContent;
                                if (!empty($region)) {
                                    $city_arr['region'] = trim($region);
                                }
                            }
                        }
                    }
                }
            }
        }
        if (isset($city_arr['city']) && isset($city_arr['region'])) {
            return $city_arr;
        } else {
            return false;
        }
    }

    public function getCity() {
        $city = array();
        $get_ip = $this->_getIp($_SERVER['REMOTE_ADDR']);
        if ($get_ip === false) { //Если не найден город
            $city = $this->_getCityIpGeoBase($_SERVER['REMOTE_ADDR']);
          
            if ($city === false) {
                $city = $this->_getCirySypexGeo($_SERVER['REMOTE_ADDR']);
                if ($city === false) {
                    sleep(1);
                    $city = $this->getCity();
                } else {
                    $this->_setGeo($city['city'], $city['region'], $_SERVER['REMOTE_ADDR']);
                }
            } else {
                $this->_setGeo($city['city'], $city['region'], $_SERVER['REMOTE_ADDR']);
            }
        }
        else {
            return $get_ip;
        }
        return $city;
    }

}
