<?php

/**
 * Модуль оплаты для робокассы 
 */
class Robokassa implements IPayment {

    private $_login = 'Lalipop';
    private $_password = 'sdx44aaa';
    private $_password_check = 'sdx44abc';
    private $_server = 'ssl://roboxchange.com';
    private $_url = 'merchant.roboxchange.com';

    public function getLogin() {
        return $this->_login;
    }

    public function getPassword() {
        return $this->_password;
    }

    public function getPassword_check() {
        return $this->_password_check;
    }

    /**
     * Возвращает методы платежей, 
     * при оплате и вообще не используется
     * @return type 
     */
    public function getPaymentMethods() {
        $socket = fsockopen($this->_server, 443, $errno, $errstr, 30);
        if (!$socket) die("$errstr($errno)");
        $data = "MerchantLogin=" . urlencode($this->_login) . "&Language=ru";
        fwrite($socket, "POST /Webservice/Service.asmx/GetPaymentMethods HTTP/1.1\r\n");
        fwrite($socket, "Host: $this->_url\r\n");
        fwrite($socket, "Content-type: application/x-www-form-urlencoded\r\n");
        fwrite($socket, "Content-length:" . mb_strlen($data) . "\r\n");
        fwrite($socket, "Accept:*/*\r\n");
        fwrite($socket, "User-agent:Opera 10.00\r\n");
        fwrite($socket, "Connection:Close\r\n");
        fwrite($socket, "\r\n");
        fwrite($socket, "$data\r\n");
        fwrite($socket, "\r\n");
        $answer = '';
        while (!feof($socket)) {
            $answer.= fgets($socket, 4096);
        }
        $answer = mb_substr($answer, mb_strpos($answer, '<?xml'));
        fclose($socket);

        $dom = new DOMDocument();
        $dom->loadXML($answer); //Открываем xml-файл 

        $return = array();
        foreach ($dom->documentElement->childNodes as $methods) {
            if ($methods->nodeType == 1 && $methods->nodeName == "Methods") {
                foreach ($methods->childNodes as $method) {
                    if ($method->nodeType == 1 && $method->nodeName == "Method") {
                        $return[$method->getAttribute("Code")] = $method->getAttribute("Description");
                    }
                }
            }
        }

//        $return = $this->getCurrencies();
        return $return;
    }

    public function getPaymentMethodId($method_id) {
        $return = $this->getCurrencies();
        foreach ($return as $key => $value) {
            foreach ($return[$key] as $key_2 => $value_2) {
                if ($key_2 === $method_id) {
                    return $value_2;
                }
            }
        }
        return false;
    }

    /**
     * Возвращает список валют
     */
    public function getCurrencies() {
//        echo 'https://merchant.roboxchange.com/WebService/Service.asmx/GetCurrencies?MerchantLogin='. urlencode($this->_login) . '&Language=ru';
        $answer = file_get_contents('https://merchant.roboxchange.com/WebService/Service.asmx/GetCurrencies?MerchantLogin='. urlencode($this->_login) . '&Language=ru');
//        $socket = fsockopen($this->_server, 443, $errno, $errstr, 30);
//        if (!$socket) die("$errstr($errno)");
//        $data = "MerchantLogin=" . urlencode($this->_login) . "&Language=ru";
//        fwrite($socket, "POST /WebService/Service.asmx/GetCurrencies HTTP/1.1\r\n");
//        fwrite($socket, "Host: $this->_url\r\n");
//        fwrite($socket, "Content-type: application/x-www-form-urlencoded\r\n");
//        fwrite($socket, "Content-length:" . mb_strlen($data) . "\r\n");
//        fwrite($socket, "Connection:Close\r\n");
//        fwrite($socket, "\r\n");
//        fwrite($socket, "$data\r\n");
//        fwrite($socket, "\r\n");
//        $answer = '';
//        echo "Host: $this->_url\r\n";
//        while (!feof($socket)) {
//            $answer.= fgets($socket, 4096);
//        }
//        echo $answer . '#';
        if (mb_strpos($answer, '<?xml') === false) return false;
        $answer = mb_substr($answer, mb_strpos($answer, '<?xml'));
//        fclose($socket);
        /*
        $answer = '<?xml version="1.0" encoding="UTF-8"?>
<CurrenciesList xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://merchant.roboxchange.com/WebService/">
  <Result>
    <Code>0</Code>
  </Result>
  <Groups>
    <Group Code="EMoney" Description="Электронные валюты">
      <Items>
        <Currency Label="MoneyMailR" Name="RUR MoneyMail"/>
        <Currency Label="RuPayR" Name="RUR RBK Money"/>
        <Currency Label="W1R" Name="RUR Единый Кошелек"/>
        <Currency Label="EasyPayB" Name="EasyPay"/>
        <Currency Label="LiqPayZ" Name="USD LiqPay"/>
        <Currency Label="MailRuR" Name="Деньги@Mail.Ru"/>
        <Currency Label="ZPaymentR" Name="RUR Z-Payment"/>
        <Currency Label="TeleMoneyR" Name="RUR TeleMoney"/>
      </Items>
    </Group>
    <Group Code="EBank" Description="Интернет-Банк">
      <Items>
        <Currency Label="AlfaBankR" Name="Альфа-Клик"/>
        <Currency Label="PSKBR" Name="Промсвязьбанк"/>
        <Currency Label="HandyBankMerchantR" Name="HandyBank"/>
        <Currency Label="BSSMezhtopenergobankR" Name="Межтопэнергобанк"/>
      </Items>
    </Group>
    <Group Code="MobileRetailers" Description="Салоны сотовой связи">
      <Items>
        <Currency Label="RapidaOceanSvyaznoyR" Name="Через Связной"/>
        <Currency Label="RapidaOceanEurosetR" Name="Через Евросеть"/>
      </Items>
    </Group>
    <Group Code="Other" Description="Другие способы оплаты">
      <Items>
        <Currency Label="ContactR" Name="Переводом по системе Контакт"/>
      </Items>
    </Group>
  </Groups>
</CurrenciesList>';*/
//        $answer = Application::cp1251_to_uft8($answer);
        $dom = new DOMDocument();
        if ($dom->loadXML($answer)) { //Открываем xml-файл 
            $return = array();
            foreach ($dom->documentElement->childNodes as $methods) {
                if ($methods->nodeType == 1 && $methods->nodeName == "Groups") {
                    foreach ($methods->childNodes as $method) {
                        if ($method->nodeType == 1 && $method->nodeName == "Group") {
                            $return[$method->getAttribute("Code")][0] = ($method->getAttribute("Description"));

                            foreach ($method->childNodes as $сurrencies) { //Обходим валюты
                                if ($сurrencies->nodeType == 1 && $сurrencies->nodeName == "Items") {
                                    foreach ($сurrencies->childNodes as $сurrence) {
                                        if ($сurrence->nodeType == 1 && $сurrence->nodeName == "Currency") {
                                            $return[$method->getAttribute("Code")][$сurrence->getAttribute("Label")] = ($сurrence->getAttribute("Name"));
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            return $return;
        } else {
            return false;
        }
    }

    /**
     * Оплата 
     */
    public function pay($cost, $method, $order_id, $desc) {
        $cost = (float) $cost;




        $socket = fsockopen($this->_server, 443, $errno, $errstr, 30);
        if (!$socket) die("$errstr($errno)");
        $data = "MrchLogin=" . urlencode($this->_login) . "&OutSum=" . urlencode($cost) . "&InvId=$order_id&Desc=" . urlencode($desc) . "&SignatureValue=" . urlencode(md5("$this->_login:$cost:$order_id:$this->_password")) . "&IncCurrLabel=" . urlencode($method);
        fwrite($socket, "POST /Index.aspx HTTP/1.1\r\n");
        fwrite($socket, "Host: $this->_url\r\n");
        fwrite($socket, "Content-type: application/x-www-form-urlencoded\r\n");
        fwrite($socket, "Content-length:" . mb_strlen($data) . "\r\n");
        fwrite($socket, "Accept:*/*\r\n");
        fwrite($socket, "User-agent:Opera 10.00\r\n");
        fwrite($socket, "Connection:Close\r\n");
        fwrite($socket, "\r\n");
        fwrite($socket, "$data\r\n");
        fwrite($socket, "\r\n");
        $answer = '';
        while (!feof($socket)) {
            $answer.= fgets($socket, 4096);
        }
        $answer = mb_substr($answer, mb_strpos($answer, '<?xml'));
        fclose($socket);
    }

}