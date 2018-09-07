<?php

class yandexController extends Controller {

    private $_shopPassword = 'Pnevmo731magazin002';

    /**
     * Проверка заказа
     */
    public function checkAction() {
        header('Content-Type: application/xml; charset=utf-8');
        if (!count($_GET)) {
            $_GET = $_POST;
        }
        $registry = Registry::getInstance();
        if (isset($_GET['md5'])) {
            $md5 = md5($_GET['action'] . ';' . $_GET['orderSumAmount'] . ';' . $_GET['orderSumCurrencyPaycash'] . ';' . $_GET['orderSumBankPaycash'] . ';' . $_GET['shopId'] . ';' . $_GET['invoiceId'] . ';' . $_GET['customerNumber'] . ';' . $this->_shopPassword);

            if (mb_strtoupper($md5) == mb_strtoupper($_GET['md5'])) {//Если хеш одинаковый
                /*
                  ob_start();
                  echo '<?xml version="1.0" encoding="UTF-8"?>
                  <checkOrderResponse performedDatetime="' . date('c') . '" code="0" invoiceId="' . $_GET['invoiceId'] . '" shopId="' . $_GET['shopId'] . '"/>
                  ';
                  print_r($_GET);
                  $fp = fopen($registry->files_dir . '555chek.txt', 'w');
                  fwrite($fp, ob_get_clean());
                  fclose($fp);
                 */
                exit('<?xml version="1.0" encoding="UTF-8"?>
<checkOrderResponse performedDatetime="' . date('c') . '" code="0" invoiceId="' . $_GET['invoiceId'] . '" shopId="' . $_GET['shopId'] . '"/>
');
            } else {
                exit('<?xml version="1.0" encoding="UTF-8"?>
<checkOrderResponse performedDatetime="' . date('c') . '" code="200" invoiceId="' . $_GET['invoiceId'] . '" shopId="' . $_GET['shopId'] . '"/>
');
            }
        }
    }

    /**
     * «Уведомление о переводе»
     */
    public function paymentAction() {
        header('Content-Type: application/xml; charset=utf-8');

        if (!count($_GET)) {
            $_GET = $_POST;
        }

        Lavra_Loader::LoadModels("Payment", "payment");
        Lavra_Loader::LoadModels("Order", "order");
        $payment = new Payment();
        $order = new Order();

//        $registry = Registry::getInstance();
//        ob_start();
//        print_r($_GET);
//        print_r($_POST);
//
//        $fp = fopen($registry->files_dir . '444pay.txt', 'w');
//        fwrite($fp, ob_get_clean());
//        fclose($fp);

        if (isset($_GET['md5'])) {
            $md5 = md5($_GET['action'] . ';' . $_GET['orderSumAmount'] . ';' . $_GET['orderSumCurrencyPaycash'] . ';' . $_GET['orderSumBankPaycash'] . ';' . $_GET['shopId'] . ';' . $_GET['invoiceId'] . ';' . $_GET['customerNumber'] . ';' . $this->_shopPassword);
            if (mb_strtoupper($md5) == mb_strtoupper($_GET['md5'])) {//Если хеш одинаковый
                $payment->setPaid(1, $_GET['orderSumAmount'], $_GET['customerNumber'], $md5);
                $order->setIsPayment($_GET['customerNumber'], 1);
                $payment->add($_GET['orderSumAmount'], 4, $_GET['customerNumber'], $md5, '');
                exit
                        ('<?xml version="1.0" encoding="UTF-8"?>
<paymentAvisoResponse performedDatetime ="' . date('c') . '" code="0" invoiceId="' . $_GET['invoiceId'] . '" shopId="' . $_GET['shopId'] . '"/>
');
            } else {
                exit
                        ('<?xml version="1.0" encoding="UTF-8"?>
<paymentAvisoResponse performedDatetime ="' . date('c') . '" code="200" invoiceId="' . $_GET['invoiceId'] . '" shopId="' . $_GET['shopId'] . '"/>
');
            }
        }
    }

    public function failAction() {
        $registry = Registry::getInstance();

        $this->setError('Произошла ошибка при оплате через Яндекс.Деньги. Повторите оплату позже. <br/><br/><button class="open_order" onclick="location.href=\'' . $registry->base_url . 'order/777197/\'">&nbsp;</button>');
//        Lavra_Loader::LoadModels("Payment", "payment");
//        Lavra_Loader::LoadModels('PaymentFactory', 'payment');
//        Lavra_Loader::LoadModels("Order", "order");
//        $payment = new Payment(); 
//        $order = new Order();
////        $md5  md5('checkOrder;702.00;10643;1003;18915;2000000215473;777139;' . $this->_shopPassword) . '<br/><br/>';
//
//       if (isset($_GET['777138'])) {
//            $get_order = $order->getOrderId($_GET['777138']);
//            if (isset($get_order->id)) { //Если заказ существует
//            }
//
//        }
    }

    public function successAction() {
//        $registry = Registry::getInstance();
//        ob_start();
//        print_r($_GET);
//        print_r($_POST);
//
//        $fp = fopen($registry->files_dir . '333suc.txt', 'w');
//        fwrite($fp, ob_get_clean());
//        fclose($fp);
//        echo 'yandex-hello';
//        $registry = Registry::getInstance();
//        Lavra_Loader::LoadModels("Payment", "payment");
//        Lavra_Loader::LoadModels('PaymentFactory', 'payment');
//        Lavra_Loader::LoadModels("Order", "order");
////        $payment_factory = PaymentFactory::factory($registry->payment_system);
//        $payment = new Payment();
//        $order = new Order();
//

        $this->setMessage("Оплата прошла успешно!");
//
////Password & MerchantID & AcquirerID & OrderID & ResponseCode & ReasonCode
//        if (isset($_POST['ResponseCode'])) {
//            if ($_POST['ResponseCode'] == 1) { //Одобрено
//                $signature = base64_encode(hex2bin(sha1('3G7Kgu3N500000000003285443222' . $_POST['OrderID'] . $_POST['ResponseCode'] . $_POST['ReasonCode'])));
//
////                $signature = mb_strtoupper(md5($_POST['OutSum'] . ":" . $_POST['InvId'] . ":" . $payment_factory->getPassword()));
//                if ($signature == ($_POST['Signature'])) {
//                    $payment->setPaid(1, $_POST['OutSum'], $_POST['OrderID'], $signature);
//                    $order->setIsPayment($_POST['OrderID'], 1);
//                    $this->setMessage("Оплата прошла успешно!");
//                } else {
//                    $this->setError("Возникли ошибки. Пожалуйста, обратитесь к администрации#2");
//                }
//            } elseif ($_POST['ResponseCode'] == 2) { //Отклонено
//                $this->setMessage("Запрос отклонен");
//            } elseif ($_POST['ResponseCode'] == 3) { //Ошибка
//                $this->setError("Возникли ошибки. Пожалуйста, обратитесь к администрации");
//            }
//        }
    }

    public function yandexAction() {
        Lavra_Loader::LoadClass("Application");
        Lavra_Loader::LoadModels("Payment", "payment");
        Lavra_Loader::LoadModels("Order", "order");
        Lavra_Loader::LoadModels('Setting', 'setting');
        $setting = new Setting();
        $order = new Order();
        $pay = new Payment();
        $registry = Registry::getInstance();
        $this->is_cost = 0;
        if (isset($this->param['order_id']) && $this->param['order_id'] > 0) {
            $check_order = $order->getOrderIdCheckSessionId($this->param['order_id'], $registry->session_id);
            if ($check_order->id > 0) {
                $get_order = $order->getOrderId($check_order->id);
                $this->OrderID = $get_order->id;
                $this->is_cost = 1;
                $this->sum = $get_order->sum_total;
            }
        } else
            echo "Заказ не найден";
    }

}
