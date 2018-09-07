<?php

/**
 * Модуль списка разделов меню неограниченной вложености..
 * @version 0.2 beta
 *
 */
class usersBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "users"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Сонфигурирование модуля
     *
     */

    public function config() {
        
    }

    public function getAccess() {
        //В модуле setting
    }

    /**
     * Маршруты модуля
     *
     */
    public function route() {
        $registry = Registry::getInstance();
        $registry->MyName = $this->_name;
        $route = Router::getInstance();
        $route->addRoutePath($this->_name, $registry->modules_dir . "users/", "controllers", "templates");

        //Список пользователей
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "users/admin/:user_type/", "admin", "users", "admin", false);
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "users/admin/:user_type/edit/:user_id/", "admin", "users", "admin", false);
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "users/admin/:user_type/add/:is_add/", "admin", "users", "admin", false);
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "users/admin/:user_type/del/:del_id/", "admin", "users", "admin", false);
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "users/admin/:user_type/history/:user_id/", "orders", "users", "orders", false);


        if ($registry->is_coupon == true) {
            $route->addRoute($this->_name, $registry->admin_pseudo_dir . "users/admin/coupon/:user_id/:is_coupon_sum/", "user_coupon", "users", "user_coupon", false);
        }
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
