<?php

/**
 * Модуль опроса.
 *
 */
class deliveryBootstrap implements IBootstrap {

    public $version = "0.2";
    private $_name = "delivery"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

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
        $route->addRoutePath("delivery", $registry->modules_dir . "delivery/", "controllers", "templates");
        
        /**
         * CheckOut
         */
        $route->addRoute("delivery", "delivery/checkout/place/", null, "checkout", "getPlace");
        $route->addRoute("delivery", "delivery/checkout/street/", null, "checkout", "getStreet");
        $route->addRoute("delivery", "delivery/checkout/index/", null, "checkout", "getIndex");
        $route->addRoute("delivery", "delivery/checkout/get/", 'checkout_checkoutGet', "checkout", "checkoutGet");
        $route->addRoute("delivery", "delivery/checkout/calculate/", 'checkout_calculate', "checkout", "calculate");
        $route->addRoute("delivery", "delivery/checkout/get-order/:order_id/", 'getAdminDelivery', "checkout", "checkout_getAdminDelivery");
        
        
        $route->addRoute("delivery", $registry->admin_pseudo_dir . "delivery/gdeposulka/get/:order_id/:post_code/", 'gdePosulkaList', "gdePosulka", "get");
        $route->addRoute("delivery", $registry->admin_pseudo_dir . "delivery/gdeposulka/archive/:order_id/:post_code/", null, "gdePosulka", "archive");
        
        /**
         * Стандартная доставка
         */
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "delivery/list/:message_id/", "list_delivery", "delivery", "list_delivery", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "delivery/list/del/:del_id/", "list_delivery", "delivery", "list_delivery", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "delivery/list/add/child/:parent_id/", "add_delivery_child", "delivery", "list_delivery", false); //Список всех страниц
        
        /**
         * Сервисы
         */
        $route->addRoute("delivery", "delivery/service/adress/:delivery_id/", 'service_adress', "delivery", "service_adress");
        $route->addRoute("delivery", "delivery/service/city/:delivery_id/", 'service_city', "delivery", "service_adress");
        $route->addRoute("delivery", "delivery/service/post/:delivery_id/", 'service_post', "delivery", "service_adress");
        $route->addRoute("delivery", "delivery/service/metro/:delivery_id/", 'service_metro', "delivery", "service_adress");
        $route->addRoute("delivery", "delivery/service/edost_russianpost/", 'service_edost_russianpost', "delivery", "service_edost_russianpost");

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