<?php

/**
 * Модуль работы с публикациями
 * @version 0.1
 *
 */
class basketBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "basket"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Конфигурирование модуля
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
        $route->addRoutePath($this->_name, $registry->modules_dir . "basket/", "controllers", "templates");
        $route->addRoute($this->_name, "basket/:not_detailed/", "basket_detailed", "basket", "basket_detailed", false); //Список всех страниц
        $route->addRoute($this->_name, "basket/add/:product_id/:mod_id/:image_id/:char_1_id/:char_2_id/:char_3_id/:char_4_id/:char_5_id/:count/:not_delete/", "basket", "basket", "add", false); //Список всех страниц
        $route->addRoute($this->_name, "basket/del/:product_id/:mod_id/", "basket", "basket", "del", false); //Список всех страниц
        $route->addRoute($this->_name, "basket/list/", "basket", "basket", "basket", false); //Список всех страниц
        $route->addRoute($this->_name, "basket/add/info/:product_id/:count/", "basket_add_info", "basket", "basketAddInfo", false); //Список всех страниц
        $route->addRoute($this->_name, "basket/add/order/info/", "basket_add_order_info", "basket", "basketAddOrderInfo", false); //Список всех страниц
        
        
        //Временные аакщены
        $route->addRoute($this->_name, "basket/get-count-product/", "getCountProduct", "basket", "basket", false); //Список всех страниц
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