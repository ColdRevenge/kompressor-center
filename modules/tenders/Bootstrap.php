<?php

/**
 * Модуль работы "Счетчик подсчета холодной воды", для управляющих компаниях
 * @version 0.1
 *
 */
class tendersBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "tenders"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

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
        $route->addRoutePath($this->_name, $registry->modules_dir . "tenders/", "controllers", "templates");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "tenders/:message_id/:del_id/", "list", "tenders", "list", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "tenders/products/:tender_id/:del_product_id/", "getTender", "tenders", "getTender", false); //Список всех страниц
        //Ajax-из продуктов
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "tenders/add/:tender_id/:product_id/", "add_product_tender", "tenders", "add_product_tender", false); //Список всех страниц        
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "tenders/del/:del_product_id/:tender_id/", "add_product_tender", "tenders", "add_product_tender", false); //Список всех страниц

        //Клиенкская часть
        $route->addRoute($this->_name, "tenders/", "tenders", "tenders", "tenders", false); //Список всех страниц
        $route->addRoute($this->_name, "tenders/accept/:accept_id/", "user_accept", "tenders", "user_accept", false); //Подтверждение тендера
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