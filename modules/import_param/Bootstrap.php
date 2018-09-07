<?php

/**
 * Модуль настройки
 *
 */
class import_paramBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "import_param"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Сонфигурирование модуля
     *
     */

    public function config() {
        
    }

    public function getAccess() {
        $registry = Registry::getInstance();
        $access = Access::getInstance();
//        $access->setAccess('setting', 'Импорт новинок', array($registry->admin_pseudo_dir . "import_param/list/"), 1, $registry->admin_pseudo_dir . 'import_param/list/');
    }

    /**
     * Маршруты модуля
     *
     */
    public function route() {
        $registry = Registry::getInstance();
        $registry->MyName = $this->_name;

        $route = Router::getInstance();
        $route->addRoutePath($this->_name, $registry->modules_dir . "import_param/", "controllers", "templates");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "import_param/list/", "import_param", "import_param", "import_param", false); //Список всех страниц
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
