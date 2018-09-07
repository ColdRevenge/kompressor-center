<?php

class PaymentFactory {
    static public function factory($payment_system) {
        $registry = Registry::getInstance();
        switch ($payment_system) {
            case 'robokassa':
                include_once $registry->interface_dir.'IPayment.php';
                Lavra_Loader::LoadModels('Robokassa', 'payment');
                return new Robokassa();
                break;

            default:
                break;
        }
    }
}

?>
