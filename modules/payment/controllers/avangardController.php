<?php

class avangardController extends Controller {

    private $_shop_id = '8549';
    private $_password = 'GrfRONzhcH';
    private $_av_sign = 'DHwhPdcqwfbAGhHJifFN';
    private $_shop_sign = 'KdOXZRkxTrUkJNvwophD';

    public function successAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Payment", "payment");

        /*
          $_POST['xml'] = Application::cp1251_to_uft8('<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
          <order_info>
          <id>2074157</id>
          <ticket>IIwtRszi000002074157ilaRPVYapUzByefNyQRS</ticket>
          <shop_id>8549</shop_id>
          <order_number>27</order_number>
          <amount>20</amount>
          <refund_amount>0</refund_amount>
          <method_name>D3S</method_name>
          <auth_code>1</auth_code>
          <status_code>3</status_code>
          <status_desc>Исполнен</status_desc>
          <status_date>2014-09-22T17:40:44+04:00</status_date>
          <signature>346D09EB2747C6B111B884EC5D61C07A</signature>
          <card_num>427638******3646</card_num>
          <exp_mm>01</exp_mm>
          <exp_yy>16</exp_yy>
          </order_info>');
         */
        if (isset($_POST['xml'])) {
            $dom = new DOMDocument();
            $dom->loadXML($_POST['xml']);

            $status_code = 0;
            $ticket = 0;
            $order_number = 0;
            foreach ($dom->childNodes as $order) {
                if ($order->nodeType == 1 && $order->nodeName == "order_info") {
                    foreach ($order->childNodes as $child) {
                        if ($child->nodeType == 1 && $child->nodeName == "status_code") {
                            $status_code = ($child->textContent);
                        }
                        if ($child->nodeType == 1 && $child->nodeName == "ticket") {
                            $ticket = ($child->textContent);
                        }
                        if ($child->nodeType == 1 && $child->nodeName == "order_number") {
                            $order_number = ($child->textContent);
                        }
                    }
                }
            }

            if ($order_number > 0) {
                Lavra_Loader::LoadModels("Order", "order");
                $order = new Order();
                $check_order = $order->getOrderId($order_number);
                $this->signature = mb_strtoupper(MD5(mb_strtoupper(MD5($this->_shop_sign) . MD5($this->_shop_id . $check_order->id . ($check_order->sum_total * 100)))));

                $payment = new Payment();
                if ($status_code == 3) { //Если заказ исполнен, то
                    if ($this->_getStatusOrder($ticket) == 3) { //На всякий случай проверяем
                        $payment->add(($check_order->sum_total * 100), 5, $check_order->id, $ticket, '');
                        $order->setIsPayment($check_order->id, 1);
                        $this->setMessage('<span style="color:green;font-size:21px">Оплата прошла успешно.</span>');
                        header("HTTP/1.1 202 Accepted");
                    } else {
                      //  $order->setIsPayment($check_order->id, 0);
                    }
                } else {
                  //  $order->setIsPayment($check_order->id, 0);
                }
            }
        }
        $this->setMessage('<span style="color:green;font-size:21px">Оплата прошла успешно.</span>');
    }

    private function _getStatusOrder($ticket) {
        $data = '<?xml version="1.0" encoding="windows-1251"?><get_order_info>
      <ticket>' . $ticket . '</ticket>
      <SHOP_ID>' . $this->_shop_id . '</SHOP_ID>
      <SHOP_PASSWD>' . $this->_password . '</SHOP_PASSWD>
      </get_order_info>';
        $headers = array
            (
            'Content-type: application/x-www-form-urlencoded;charset=windows-1251',
            'Expect:'
        );

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, 'https://www.avangard.ru/iacq/h2h/get_order_info');
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, "xml=" . $data);

        $result = curl_exec($curl);

        $dom = new DOMDocument();
        $dom->loadXML($result);
        $status = null;
        foreach ($dom->getElementsByTagName('status_code') as $value) {
            $status = $value->nodeValue;
        }
        return $status;
    }

    public function avangardAction() {
        Lavra_Loader::LoadClass("Application");
        Lavra_Loader::LoadModels("Order", "order");

        $order = new Order();
        $registry = Registry::getInstance();
        $this->is_cost = 0;
        if (isset($_GET['is_err'])) {
            $this->setError('<span style="font-size:17px">   Оплата не проведена: <br/>
   Отказ банка – эмитента карты. <br/>
   Ошибка в процессе оплаты, указаны неверные данные карты.
</span>');
        }
        if (isset($this->param['order_id']) && $this->param['order_id'] > 0) {
            $check_order = $order->getOrderIdCheckSessionId($this->param['order_id'], $registry->session_id);
            if ($check_order->id > 0) {
                $this->sum_total = $check_order->sum_total;
                $this->shop_id = $this->_shop_id;
                $this->order_id = $check_order->id;
                $this->get_order = $check_order;
                $this->signature = mb_strtoupper(MD5(mb_strtoupper(MD5($this->_shop_sign) . MD5($this->_shop_id . $check_order->id . ($check_order->sum_total * 100)))));
                $this->desc = $desc = 'Оплата товара в интернет-магазине ' . $registry->setting->name;
            }
        } else {
            echo "Заказ не найден";
        }
    }

}
