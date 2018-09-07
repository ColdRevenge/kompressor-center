<?php

class paymentController extends Controller {

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
