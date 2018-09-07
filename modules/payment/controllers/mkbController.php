<?php

function hex2bin($h) {
    if (!is_string($h))
        return null;
    $r = '';
    for ($a = 0; $a < mb_strlen($h); $a += 2) {
        $r .= chr(hexdec($h{$a} . $h{($a + 1)}));
    }
    return $r;
}

class mkbController extends Controller {

    public function successAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Payment", "payment");
        Lavra_Loader::LoadModels('PaymentFactory', 'payment');
        Lavra_Loader::LoadModels("Order", "order");
        $payment_factory = PaymentFactory::factory($registry->payment_system);
        $payment = new Payment();
        $order = new Order();


//Array
//(
//    [MerID] => 600000000000562
//    [AcqID] => 443222
//    [OrderID] => 777131
//    [ResponseCode] => 1
//    [ReasonCode] => 1
//    [ReasonCodeDesc] => Transaction is approved.
//    [ReferenceNo] => 423276497805
//    [PaddedCardNo] => XXXXXXXXXXXX0022
//    [AuthCode] => 063037
//    [BillToToFirstName] => TEST
//    [BillToMiddleName] => 
//    [BillToLastName] => CARD3003
//    [Signature] => NdmZL/fIpbBc4X0LhcDvkJ6MMDg=
//    [SignatureMethod] => SHA1
//)        
//
        //Password & MerchantID & AcquirerID & OrderID & ResponseCode & ReasonCode
        if (isset($_POST['ResponseCode'])) {
            if ($_POST['ResponseCode'] == 1) { //Одобрено
                $signature = base64_encode(hex2bin(sha1('00000000000000000000000000022' . $_POST['OrderID'] . $_POST['ResponseCode'] . $_POST['ReasonCode'])));

//                $signature = mb_strtoupper(md5($_POST['OutSum'] . ":" . $_POST['InvId'] . ":" . $payment_factory->getPassword()));
                if ($signature == ($_POST['Signature'])) {
                    $payment->setPaid(1, $_POST['OutSum'], $_POST['OrderID'], $signature);
                    $order->setIsPayment($_POST['OrderID'], 1);

                    $payment->add($_POST['OutSum'], 3,$_POST['OrderID'], $signature, '');
                    $this->setMessage("Оплата прошла успешно!");
                } else {
                    $this->setError("Возникли ошибки. Пожалуйста, обратитесь к администрации#2");
                }
            } elseif ($_POST['ResponseCode'] == 2) { //Отклонено
                $this->setMessage("Запрос отклонен");
            } elseif ($_POST['ResponseCode'] == 3) { //Ошибка
                $this->setError("Возникли ошибки. Пожалуйста, обратитесь к администрации");
            }
        }
    }

    public function mkbAction() {
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

                $this->PurchaseAmt = str_repeat('0', 10 - mb_strlen($get_order->sum_total)) . $get_order->sum_total . '00';
                $this->OrderID = $get_order->id;
                $this->Signature = base64_encode(hex2bin(sha1('G0000000000000000000000000002' . $get_order->id . $this->PurchaseAmt . '000')));

//                if (!isset($_POST['method'])) $_POST['method'] = 'auto';

                $set = $setting->getGeneral();
                $this->Desc = 'Оплата товара в интернет-магазине ' . $set->name;

                if ($get_order->payment_method_id == 3) { //Если метод платежа МКБ
                    $this->is_cost = 1;
                }

//                echo $this->SignatureValue; 



                $this->IncCurrLabel = $get_order->payment_method_id;
//                $pay->delPaymentNotPaid($get_order->id); //Удаляем задвоившиеся платежи (если много раз обновляли страницу)
//                $order_id = $pay->add($get_order->sum, $get_order->payment_method_id, $get_order->id, $this->SignatureValue, $this->Desc);
            }
        } else
            echo "Заказ не найден";
    }

}
