<?php

/**
 * Модуль Вывода календаря
 * @version 0.1
 *
 */
class calendarBootstrap implements IBootstrap {
    public $version = "0.1";
    private $_name = "calendar"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки
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
        $route->addRoutePath($this->_name, $registry->modules_dir."calendar/","controllers","templates");
        $route->addRoute($this->_name,"/calendar/:year/:month/:day/","calendar","calendar", "calendar",null); //По категориям
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