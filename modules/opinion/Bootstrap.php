<?php

/**
 * Модуль работы "Счетчик подсчета холодной воды", для управляющих компаниях
 * @version 0.1
 *
 */
class opinionBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "opinion"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Конфигурирование модуля
     *
     */

    public function config() {
        
    }

    public function getAccess() {
        $registry = Registry::getInstance();
        $access = Access::getInstance();
    //    $access->setMenuName($this->_name, 'Отзывы', 60, $registry->admin_pseudo_dir . 'opinion/');
    }

    /**
     * Маршруты модуля
     *
     */
    public function route() {
        $registry = Registry::getInstance();
        $registry->MyName = $this->_name;
        $route = Router::getInstance();
        $route->addRoutePath($this->_name, $registry->modules_dir . "opinion/", "controllers", "templates");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "opinion/:message_id/:del_id/", "admin_opinion", "opinion", "admin_opinion", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "opinion/add", "add", "opinion", "add", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "opinion/edit/:edit_id/", "add", "opinion", "add", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "opinion/set/:id/:is_active/", null, "opinion", "setIsActive", false); //Список всех страниц

        $route->addRoute($this->_name, "/opinion/site/", "site_opinion", "opinion", "site_opinion", false); //Список всех страниц
        $route->addRoute($this->_name, "/opinion/add/", "site_opinion", "opinion", "site_opinion", false); //Список всех страниц
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
