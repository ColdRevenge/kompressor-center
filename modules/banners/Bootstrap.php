<?php


/**
 * Модуль работы с публикациями
 * @version 0.1
 *
 */
class bannersBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "banners"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Конфигурирование модуля
     *
     */

    public function config() {
        
    }

    public function getAccess() {
        $registry = Registry::getInstance();
        $access = Access::getInstance();
//        $access->setMenuName($this->_name, 'Баннеры', 90, $registry->admin_pseudo_dir . 'banners/list/1/762/');
//        $access->setAccess($this->_name, 'Баннеры', array($registry->admin_pseudo_dir . "banners/list/1/762/"), 1, $registry->admin_pseudo_dir . 'banners/list/0/768/');
//        $access->setAccess($this->_name, 'Фотогалерея', array($registry->admin_pseudo_dir . "banners/list/5/"), 1, $registry->admin_pseudo_dir . 'banners/list/5/');
    }

    /**
     * Маршруты модуля
     *
     */
    public function route() {
        $registry = Registry::getInstance();
        $registry->MyName = $this->_name;
        $route = Router::getInstance();
        $route->addRoutePath($this->_name, $registry->modules_dir . "banners/", "controllers", "templates");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "banners/list/:type/:category_id/:message_id/:del_id/", "list", "banners", "list", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "banners/edit/:img_id/", "edit", "banners", "edit", false); //Список всех страниц
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
