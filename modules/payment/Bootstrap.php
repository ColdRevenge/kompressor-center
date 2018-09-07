<?php

/**
 * Модуль опроса.
 *
 */
class paymentBootstrap implements IBootstrap {

    public $version = "0.2";
    private $_name = "payment"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Сонфигурирование модуля
     *
     */

    public function config() {

    }

    /**
     * Маршруты модуля
     *
     */
    public function route() {
        $registry = Registry::getInstance();
        $registry->MyName = $this->_name;

        $route = Router::getInstance();
        $route->addRoutePath("payment", $registry->modules_dir . "payment/", "controllers", "templates");
        $route->addRoute("payment", "payment/robokassa/:order_id/", "robokassa", "robokassa", "robokassa"); //Оплата робокасой
        $route->addRoute("payment", "payment/robokassa/success/", null, "robokassa", "success"); //Success Url
        $route->addRoute("payment", "payment/robokassa/fail/", null, "robokassa", "fail"); //Fail Url
        $route->addRoute("payment", "payment/robokassa/result/", null, "robokassa", "ok"); //Result URL
        
        $route->addRoute("payment", "payment/cash/yandex/:order_id/", "cash_yandex", "cash", "yandex"); //Яндекс деньгами
        $route->addRoute("payment", "payment/cash/yandex/check/", null, "cash", "checkYandex"); //Яндекс деньгами
        $route->addRoute("payment", "payment/cash/sberbank/:order_id/", "cash_sberbank", "cash", "sberbank"); //Яндекс деньгами
        /**
         * Московский кредитный банк
         */
        $route->addRoute("payment", "payment/mkb/:order_id/", "mkb", "mkb", "mkb"); //Оплата Московским Кредитным Банком(Форма)
        $route->addRoute("payment", "payment/mkb/success/", "success", "mkb", "success");
        /**
         * Авангард
         */
        $route->addRoute("payment", "payment/avangard/:order_id/", "avangard", "avangard", "avangard"); //Оплата робокасой
        $route->addRoute("payment", "payment/avangard/success/", "success", "avangard", "success"); //Оплата робокасой
        
        /**
         * Яндекс деньги
         */
        $route->addRoute("payment", "payment/yandex/:order_id/", "yandex", "yandex", "yandex"); //Оплата ЯНдекс деньгами (Форма)
        
        $route->addRoute("payment", "payment/yandex/check/", null, "yandex", "check"); //«Проверка заказа». 
        $route->addRoute("payment", "payment/yandex/check/test/", null, "yandex", "check"); //«Проверка заказа». для тестирования
        
        $route->addRoute("payment", "payment/yandex/payment/", null, "yandex", "payment"); //«Уведомление о переводе». 
        $route->addRoute("payment", "payment/yandex/payment/test/", null, "yandex", "payment"); //«Уведомление о переводе».   для тестирования
        
        $route->addRoute("payment", "payment/yandex/success/", "success", "yandex", "success");//завершения платежа
        $route->addRoute("payment", "payment/yandex/success/test/", "success", "yandex", "success"); //завершения платежа  для тестирования
        
        $route->addRoute("payment", "payment/yandex/fail/", "success", "yandex", "fail");//завершения платежа
        $route->addRoute("payment", "payment/yandex/fail/test/", "success", "yandex", "fail");  //завершения платежа  для тестирования
        
        /**
         * Общее, обычно для робокассы
         * НЕ ИСПОЛЬЗУЕТСЯ
         */
//        $route->addRoute("payment", "payment/success/", "success", "payment", "success");
//        $route->addRoute("payment", "payment/fail/", "fail", "payment", "fail");
//        $route->addRoute("payment", "payment/ok/", null, "payment", "ok");

    }

    /**
     * Запуск модуля
     *
     */
    public function run($default_url = null) {
        $route = Router::getInstance();
        return $route->delegate($this->_name, $default_url);
    }

}