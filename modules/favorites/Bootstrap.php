<?php

/**
 * Модуль настройки
 *
 */
class favoritesBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "favorites"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Сонфигурирование модуля
     *
     */

    public function config() {
        
    }

    public function getAccess() {
        
    }

    /**
     * Маршруты модуля
     *
     */
    public function route() {
        $registry = Registry::getInstance();
        $registry->MyName = $this->_name;

        $route = Router::getInstance();
        $route->addRoutePath($this->_name, $registry->modules_dir . "favorites/", "controllers", "templates");
        $route->addRoute($this->_name, "favorites/:type/", "favorites_list", "favorites", "list", false);
        $route->addRoute($this->_name, "favorites/get/:type/:object_id/", "favorites_block", "favorites", "get", false);
        $route->addRoute($this->_name, "favorites/add/:type/:object_id/", "favorites", "favorites", "add", false);
        $route->addRoute($this->_name, "favorites/del/:type/:object_id/", "favorites", "favorites", "del", false);
        $route->addRoute($this->_name, "favorites/count/:type/", null, "favorites", "getCount", false);
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
