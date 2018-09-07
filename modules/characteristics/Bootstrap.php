<?php

/**
 * Модуль списка разделов меню неограниченной вложености..
 * @version 0.2 beta
 *
 */
class characteristicsBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "characteristics"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

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

        $route->addRoutePath($this->_name, $registry->modules_dir . "characteristics/", "controllers", "templates");


        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "characteristics/list/:type/:category_id/:message_id/:del_id/", "list", "characteristics", "list");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "characteristics/list/:type/:category_id/:message_id/:del_id/", "list", "characteristics", "list");
//		$route->addRoute($this->_name,$registry->admin_pseudo_dir."characteristics/edit/:edit_id/","add_characteristics","characteristics", "add");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "characteristics/add/:category_id/", null, "characteristics", "add");

        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "characteristics/value/list/:category_id/:id/:message_id/:del_id/", "list_value", "characteristics", "listValue");

        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "characteristics/product_quick/:characteristic_id/:value_id/", "product_quick", "characteristics", "product_quick");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "characteristics/product_quick/del/:is_del/:characteristic_id/:value_id/", "product_quick", "characteristics", "product_quick");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "characteristics/product_quick/select/:characteristic_id/:value_id/", "product_quick_select", "characteristics", "product_quick_select");

        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "characteristics/pseudo_dir/", null, "characteristics", "getPseudoDir");



        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "characteristics/desc/list/:type/:category_id/:message_id/:del_id/", "desc_char_list", "desc_char_list", "list");
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
