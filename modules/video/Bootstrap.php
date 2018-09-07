<?php

/**
 * Модуль работы с публикациями
 * @version 0.1
 *
 */
class videoBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "video"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Конфигурирование модуля
     *
     */

    public function config() {
        $registry = Registry::getInstance();
        if (!isset ($registry->xuploader_config) || $registry->xuploader_config = 0) {
            $registry->type = 5;

            $registry->prefix = rand(0,150).'_';
            $registry->max_size = 17000;
        }
    }

    /**
     * Маршруты модуля
     *
     */
    public function route() {
        $registry = Registry::getInstance();
        $registry->MyName = $this->_name;
        $route = Router::getInstance();
        $route->addRoutePath($this->_name, $registry->modules_dir . "video/", "controllers", "templates");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "video/:category_id/", "upload", "video", "xuploader", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "video/upload/", "out", "video", "upload", false); //Список всех страницz
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "video/list/:category_id/:del_id/", 'video', "video", "xuploader", false); //Список всех страниц
        $route->addRoute($this->_name, "/video/list/:category_id/", 'site_video', "video", "site_video", false); //Список всех страниц
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