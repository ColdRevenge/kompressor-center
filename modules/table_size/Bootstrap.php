<?php

/**
 * Модуль работы с публикациями
 * @version 0.1
 *
 */
class table_sizeBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "table_size"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

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
        $route->addRoutePath($this->_name, $registry->modules_dir . "table_size/", "controllers", "templates");
        $route->addRoute($this->_name,  "table_size/", "table_size", null, null, false); //Добавить страницу
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