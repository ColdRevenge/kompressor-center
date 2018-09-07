<?php

/**
 * Оформление заказа
 * @version 0.1
 *
 */
class orderBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "order"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Конфигурирование модуля
     *
     */

    public function config() {
        
    }

    public function getAccess() {
        $registry = Registry::getInstance();
        $access = Access::getInstance();
        $access->setMenuName($this->_name, 'Заказы', 70, $registry->admin_pseudo_dir . 'order/list/');
        $access->setAccess($this->_name, 'Статистика заказов', array($registry->admin_pseudo_dir . "reports/completed/"), 1, $registry->admin_pseudo_dir . 'reports/completed/');
        
//        $access->setAccess($this->_name, 'Отмененные заказы', array($registry->admin_pseudo_dir . "reports/history/2/"), 1, $registry->admin_pseudo_dir . 'reports/history/2/');
//        $access->setAccess($this->_name, 'Самые продоваемые', array($registry->admin_pseudo_dir . "reports/products_top/3/"), 1, $registry->admin_pseudo_dir . 'reports/products_top/3/');
//        $access->setAccess($this->_name, 'Отсутствуют на складе', array($registry->admin_pseudo_dir . "reports/products/4/"), 1, $registry->admin_pseudo_dir . 'reports/products/4/');
//        $access->setAccess($this->_name, 'Статистика по менеджерам', array($registry->admin_pseudo_dir . "reports/manager/"), 1, $registry->admin_pseudo_dir . 'reports/manager/');
//        $access->setAccess($this->_name, 'Статистика по заполнению', array($registry->admin_pseudo_dir . "reports/products/"), 1, $registry->admin_pseudo_dir . 'reports/products/');
//        $access->setAccess($this->_name, 'Черный список', array($registry->admin_pseudo_dir . "order/black-list/list/"), 1, $registry->admin_pseudo_dir . 'order/black-list/list/');
//        $access->setAccess($this->_name, 'Каталог товаров', array($registry->admin_pseudo_dir . "products/list/"), 0);
    }

    /**
     * Маршруты модуля
     *
     */
    public function route() {
        $registry = Registry::getInstance();
        $registry->MyName = $this->_name;
        $route = Router::getInstance();
        $route->addRoutePath($this->_name, $registry->modules_dir . "order/", "controllers", "templates");
        $route->addRoute($this->_name, "order/:order_id/", "add", "order", "add", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "order/list/:message_id/:del_id/", "orders_list", "order", "orders_list", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "order/set/status/:order_id/:status_id/", "order_list_ajax", "order", "setStatus", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "order/get/:order_id/", "getOrder", "order", "getOrder", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "order/del/:order_id/:product_id/", "getOrderProducts", "order", "delOrderProduct", false); //Список всех страниц


        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "order/add/product/:order_id/", 'getOrderProducts', "order", "addOrderProduct", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "order/set/product/:order_id/", 'getOrderProducts', "order", "setProduct", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "order/set/options/:order_id/", 'getOrderProducts', "order", "setOptionsProduct", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "order/set/comment/:order_id/", null, "order", "setCommentAdmin", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "order/black-list/:order_id/", 'black_list_add', "black_list", "addBlackList", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "order/black-list/list/", 'black_list', "black_list", "BlackList", false); //Список всех страниц


        $route->addRoute($this->_name, "order/check/", "check", "order", "check", false); //Список всех страниц
        $route->addRoute($this->_name, "order/after/", "after", null, null, false); //Список всех страниц
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
