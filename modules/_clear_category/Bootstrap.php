<?php

/**
 * Модуль списка разделов меню неограниченной вложености..
 * @version 0.2 beta
 *
 */
class _clear_categoryBootstrap implements IBootstrap {

    public $version = "0.3";
    private $_name = "_clear_category"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Сонфигурирование модуля
     *
     */

    public function config() {
        
    }

    public function getAccess() {
        $registry = Registry::getInstance();
        $access = Access::getInstance();
//        $access->setAccess('catalog', 'Товары с ошибками', array($registry->admin_pseudo_dir . "_clear_category/empty/desc/"), 1, $registry->admin_pseudo_dir . '_clear_category/empty/desc/');
//        $access->setAccess('catalog', 'Проверка наличия', array($registry->admin_pseudo_dir . "_clear_category/available/vita/"), 1, $registry->admin_pseudo_dir . '_clear_category/available/vita/');
    }

    /**
     * Маршруты модуля
     *
     */
    public function route() {
        $registry = Registry::getInstance();
        $registry->MyName = $this->_name;
        $route = Router::getInstance();

        $route->addRoutePath($this->_name, $registry->modules_dir . "_clear_category/", "controllers", "templates");
        /**
         * Разделы меню для раздела
         */ 
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "_clear_category/empty/desc/", "desc", "_clear_category", "desc");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "_clear_category/empty/photo/", "photo", "_clear_category", "photo");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "_clear_category/empty/char/", "char", "_clear_category", "char");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "_clear_category/empty/category_2_3/", "category_2_3", "_clear_category", "category_2_3");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "_clear_category/empty/category_4_5/", "category_4_5", "_clear_category", "category_4_5");
        
        
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "_clear_category/available/:type/", "available", "available", "available");
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
