<?php
/**
 * Модуль списка разделов меню неограниченной вложености..
 * @version 0.2 beta
 *
 */
class authBootstrap implements IBootstrap {
    public $version = "0.2";
    private $_name = "auth"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки
    /**
     * Сонфигурирование модуля
     *
     */
    public function config($regexp = array()) {

    }

    /**
     * Маршруты модуля
     *
     */
    public function route() {
        $registry = Registry::getInstance();
        $registry->MyName = $this->_name;
        $route = Router::getInstance();
        $route->addRoutePath($this->_name, $registry->modules_dir."auth/","controllers","templates");
        $route->addRoute($this->_name,"auth/mini_auth/","mini_auth","auth","auth");
        $route->addRoute($this->_name,"auth/auth/","auth","auth","auth");
        $route->addRoute($this->_name,"auth/admin/auth/","admin_auth","auth","auth");
        $route->addRoute($this->_name,"auth/recovery/:login/","recovery","auth","recovery");
        $route->addRoute($this->_name,"auth/exit/",null,"auth","exit");
        $route->addRoute($this->_name,"auth/register/","register","auth","register");
        $route->addRoute($this->_name,"auth/social/:social_type/", null,"auth","social");
        $route->addRoute($this->_name,"auth/register/forum/","register_forum","auth","register");
        
        
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