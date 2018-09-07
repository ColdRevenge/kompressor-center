<?php

class cashController extends Controller {

    public function yandexAction() {
        if (isset($this->param['order_id']) && $this->param['order_id'] > 0) {
            $registry = Registry::getInstance();
            Lavra_Loader::LoadModels("Order", "order");
            $order = new Order();
            $check_order = $order->getOrderIdCheckSessionId($this->param['order_id'], $registry->session_id);
            if ($check_order->id > 0) {
                $this->get_order = $order->getOrderId($check_order->id);
            }
        }
    }

    public function checkYandexAction() {
        $registry = Registry::getInstance();

        if (isset($_POST['notification_type'])) {
            $params = $_POST['notification_type'] . '&' . $_POST['operation_id'] . '&' . $_POST['amount'] . '&' . $_POST['currency'] . '&' . $_POST['datetime'] . '&' . $_POST['sender'] . '&' . $_POST['codepro'] . '&OkiTMCD6ZnOU2UZdb96vvS8c&' . $_POST['label'];
            if (hash('sha1', $params) === $_POST['sha1_hash']) { //Сравниваем хеш
                Lavra_Loader::LoadModels("Order", "order");
                $order = new Order();
                $get_order = $order->getOrderId((int) $_POST['label']);
                if (isset($get_order->id)) { //Если заказ найден
                    $order->setIsPayment($get_order->id, 1);
                    $order->setPaymentSum($get_order->id, $_POST['withdraw_amount']);
                    $order->setStatus($get_order->id, 9);
                    $registry->setting_obj->sendOrderStatusSMS($get_order->id, 9);
                }
            }
        }
    }

    public function sberbankAction() {
        if (isset($this->param['order_id']) && $this->param['order_id'] > 0) {
            $registry = Registry::getInstance();
            Lavra_Loader::LoadModels("Order", "order");
            $order = new Order();
            $check_order = $order->getOrderIdCheckSessionId($this->param['order_id'], $registry->session_id);
            if ($check_order->id > 0) {
                $this->get_order = $order->getOrderId($check_order->id);
            }
        }
    }

}
