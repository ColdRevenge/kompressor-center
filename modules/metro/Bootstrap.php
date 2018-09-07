<?php

/**
 * Метро
 */
class metroBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "metro"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Конфигурирование модуля
     *
     */

    public function config() {
        
    }

    /**
     * Маршруты модуля
     */
    public function route() {
        $registry = Registry::getInstance();
        $registry->MyName = $this->_name;
        $route = Router::getInstance();
        $route->addRoutePath($this->_name, $registry->modules_dir . "metro/", "controllers", "templates");

        $route->addRoute($this->_name, "metro/", "list", "metro", "list");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "metro/:message/", "list", "metro", "list");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "metro/del/:del_stantion_id/", null, "metro", "list");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "metro/add/:add/:edit_stantion_id", "list", "metro", "list");
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
