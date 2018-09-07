<?php

class robokassaController extends Controller {

    public function robokassaAction() {
        Lavra_Loader::LoadClass("Application");
        Lavra_Loader::LoadModels("Robokassa", "payment");
        Lavra_Loader::LoadModels("Payment", "payment");
        Lavra_Loader::LoadModels("Order", "order");
        Lavra_Loader::LoadModels('Setting', 'setting');
        $setting = new Setting();
        $order = new Order();
        $pay = new Payment();
        $payment = new Robokassa();
        $registry = Registry::getInstance();
        $this->is_cost = 0;
        if (isset($this->param['order_id']) && $this->param['order_id'] > 0) {


            $check_order = $order->getOrderIdCheckSessionId($this->param['order_id'], $registry->session_id);

            if ($check_order->id > 0) {
                $get_order = $order->getOrderId($check_order->id);

//                if (!isset($_POST['method'])) $_POST['method'] = 'auto';

                $set = $setting->getGeneral();
                $this->Desc = 'Оплата товара в интернет-магазине ' . $set->name;

                $order_id = $check_order->id;

                $this->is_cost = 1;
                $this->MrchLogin = $payment->getLogin();
                $this->OutSum = $get_order->sum_total;
                $this->InvId = $order_id;

//                "sMerchantLogin:nOutSum:nInvId:sMerchantPass1";
//                echo $payment->getLogin() . ":" . $get_order->sum . ":" . $order_id . ":" . $payment->getPassword().'<br/>';
                $this->SignatureValue = md5($payment->getLogin() . ":" . $get_order->sum_total . ":" . $order_id . ":" . $payment->getPassword());

//                echo $this->SignatureValue;



                $this->IncCurrLabel = $get_order->payment_method_id;
                $pay->delPaymentNotPaid($order_id); //Удаляем задвоившиеся платежи (если много раз обновляли страницу)
                $order_id = $pay->add($get_order->sum, $get_order->payment_method_id, $order_id, $this->SignatureValue, $this->Desc);
            }
        } else
            echo "Заказ не найден";


        $this->methods = $payment->getCurrencies();
    }

    public function successAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Payment", "payment");
        Lavra_Loader::LoadModels('PaymentFactory', 'payment');
        Lavra_Loader::LoadModels("Order", "order");
        $payment_factory = PaymentFactory::factory($registry->payment_system);
        $payment = new Payment();
        $order = new Order();

        if (isset($_POST['OutSum']) && isset($_POST['InvId']) && isset($_POST['SignatureValue'])) {
            $signature = mb_strtoupper(md5($_POST['OutSum'] . ":" . $_POST['InvId'] . ":" . $payment_factory->getPassword()));
            if ($signature == mb_strtoupper($_POST['SignatureValue'])) {
                $payment->setPaid(1, $_POST['OutSum'], $_POST['InvId'], $signature);
                $order->setIsPayment($_POST['InvId'], 1);
                $this->redirect($registry->base_url . 'order/' . $_POST['InvId'] . '/?pay_success=1');
                exit();
                $this->setMessage("Оплата прошла успешно!");
            } else
                $this->setError("Возникли ошибки. Пожалуйста, обратитесь к администрации");
        } else
            $this->setError("Возникли ошибки. Пожалуйста, обратитесь к администрации");
    }

    public function failAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Payment", "payment");
        Lavra_Loader::LoadModels("Order", "order");
        $payment = new Payment();
        $order = new Order();
        if (isset($_POST['OutSum']) && isset($_POST['InvId'])) {
            $payment->setPaid(2, $_POST['OutSum'], $_POST['InvId'], null);
            $order->setIsPayment($_POST['InvId'], 0);
            $this->redirect($registry->base_url . 'order/' . $_POST['InvId'] . '/?pay_error=1');
            exit();
            $this->setMessage("Платеж успешно отменен!");
        } else
            $this->setError("Возникли ошибки. Пожалуйста, обратитесь к администрации");
    }

    public function okAction() {
        Lavra_Loader::LoadModels("Payment", "payment");
        $payment = new Payment();
        if (isset($_POST['OutSum']) && isset($_POST['InvId']) && isset($_POST['SignatureValue'])) {
            Lavra_Loader::LoadModels("Robokassa", "payment");
            $robokassa = new Robokassa();
            $signature = mb_strtoupper(md5($_POST['OutSum'] . ":" . $_POST['InvId'] . ":" . $robokassa->getPassword_check()));
            if ($signature == mb_strtoupper($_POST['SignatureValue'])) {
                $payment->setIsResultPay($_POST['OutSum'], $_POST['InvId']);
                echo "OK" . $_POST['InvId'];
            }
        }
    }

}
