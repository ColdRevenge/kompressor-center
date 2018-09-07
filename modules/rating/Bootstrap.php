<?php

/**
 * Модуль опроса.
 *
 */
class ratingBootstrap implements IBootstrap {

    public $version = "0.2";
    private $_name = "rating"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

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
        $route->addRoutePath("rating", $registry->modules_dir . "rating/", "controllers", "templates");
        $route->addRoute("rating", "rating/voice/:type/:id/:voice/", "rating", "rating", "rating");

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