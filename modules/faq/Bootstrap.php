<?php

/**
 * Модуль работы "Счетчик подсчета холодной воды", для управляющих компаниях
 * @version 0.1
 *
 */
class faqBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "faq"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Конфигурирование модуля
     *
     */

    public function config() {

    }

    public function getAccess() {
        $registry = Registry::getInstance();
        $access = Access::getInstance();
//        $access->setMenuName('page', 'Вопросы', 100, $registry->admin_pseudo_dir . 'faq/');
    }
    /**
     * Маршруты модуля
     *
     */
    public function route() {
        $registry = Registry::getInstance();
        $registry->MyName = $this->_name;
        $route = Router::getInstance();
        $route->addRoutePath($this->_name, $registry->modules_dir . "faq/", "controllers", "templates");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "faq/:message_id/:del_id/", "admin_faq", "faq", "admin_faq", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "faq/add", "add", "faq", "add", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "faq/edit/:edit_id/", "add", "faq", "add", false); //Список всех страниц
        $route->addRoute($this->_name, "/faq/site/", "site_faq", "faq", "site_faq", false); //Список всех страниц
        $route->addRoute($this->_name, "/faq/add/", "site_faq", "faq", "site_faq", false); //Список всех страниц
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