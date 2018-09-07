<?php

/**
 * Новостей
 */
class journalBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "journal"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

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
        $route->addRoutePath($this->_name, $registry->modules_dir . "journal/", "controllers", "templates");

        $route->addRoute($this->_name, "/journal/", "journal", "journal", "journal");
        $route->addRoute($this->_name, "/journal/look/:id/", "look", "journal", "look");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "journal/list/:message/", "list", "journal", "list");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "journal/add/:id/", "form", "journal", "add");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "journal/edit/:id/", "form", "journal", "edit");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "journal/delete/:id/", null, "journal", "delete");
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