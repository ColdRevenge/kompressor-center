<?php

/**
 * Модуль настройки
 *
 */
class settingBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "setting"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Сонфигурирование модуля
     *
     */

    public function config() {
        
    }

    public function getAccess() {
        $registry = Registry::getInstance();
        $access = Access::getInstance();
        $access->setMenuName($this->_name, 'Настройки', 210, $registry->admin_pseudo_dir . 'setting/general/');
        $access->setAccess($this->_name, 'Общие настройки', array($registry->admin_pseudo_dir . "setting/general/"), 1, $registry->admin_pseudo_dir . 'setting/general/');
        $access->setAccess($this->_name, 'Доставка', array($registry->admin_pseudo_dir . "delivery/list/"), 1, $registry->admin_pseudo_dir . 'delivery/list/');
        $access->setAccess($this->_name, 'Подборы', array($registry->admin_pseudo_dir . "selection/list/"), 1, $registry->admin_pseudo_dir . 'selection/list/');
//        $access->setAccess($this->_name, 'B2B', array($registry->admin_pseudo_dir . "setting/users/"), 1, $registry->admin_pseudo_dir . 'setting/users/');

//        $access->setAccess($this->_name, 'Метро', array($registry->admin_pseudo_dir . "metro/"), 1, $registry->admin_pseudo_dir . 'metro/');
        $access->setAccess($this->_name, 'Администраторы', array($registry->admin_pseudo_dir .  "users/admin/1/"), 1, $registry->admin_pseudo_dir . 'users/admin/1/');
//        $access->setAccess($this->_name, 'Менеджеры', array($registry->admin_pseudo_dir .  "users/admin/2/"), 1, $registry->admin_pseudo_dir . 'users/admin/2/');
//        $access->setAccess($this->_name, 'Пользователи', array($registry->admin_pseudo_dir .  "users/admin/0/"), 1, $registry->admin_pseudo_dir . 'users/admin/0/');
        
//        $access->setAccess($this->_name, 'Резервные копии', array($registry->admin_pseudo_dir . "setting/backup/"), 1, $registry->admin_pseudo_dir . 'setting/backup/');
//        $access->setAccess($this->_name, 'Импорт структуры', array($registry->admin_pseudo_dir . "import/import-full/"), 1, $registry->admin_pseudo_dir . 'import/import-full/');
//        $access->setAccess($this->_name, 'СМС уведомления', array($registry->admin_pseudo_dir . "setting/sms/"), 1, $registry->admin_pseudo_dir . 'setting/sms/');
//        $access->setAccess($this->_name, 'Статусы', array($registry->admin_pseudo_dir . "setting/status/"), 1, $registry->admin_pseudo_dir . 'setting/status/');
//        $access->setAccess($this->_name, 'Синхронизация с 1C', array($registry->admin_pseudo_dir . "sync/1c/setting/"), 1, $registry->admin_pseudo_dir . 'sync/1c/setting/');
//        $access->setAccess($this->_name, 'Администраторы', array($registry->admin_pseudo_dir . "import/0/"), 1, $registry->admin_pseudo_dir . 'import/0/');

    }

    /**
     * Маршруты модуля
     *
     */
    public function route() {
        $registry = Registry::getInstance();
        $registry->MyName = $this->_name;

        $route = Router::getInstance();
        $route->addRoutePath($this->_name, $registry->modules_dir . "setting/", "controllers", "templates");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "setting/products/:message_id/:del_id", "products", "setting_products", "products", false);
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "setting/general/", "general", "setting", "general", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "setting/password/", "password", "setting", "password", false); //Список всех страниц
        /* Пользователи */
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "setting/users/", "users", "setting", "users", false);
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "setting/users/get/:user_id/", "get_user", "setting", "get_user", false);
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "setting/users/del/:del_id/", "users", "setting", "users", false);

        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "setting/sms/", "sms", "setting", "sms", false);
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "setting/status/", "status", "setting", "status", false);
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "setting/status/del/:del_id/", "status", "setting", "status", false);

        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "setting/backup/:message_id/:del_id/", "backup", "setting", "backup", false); //Список всех страниц
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
