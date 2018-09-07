<?php

/**
 * Модуль Комментарии
 * @version 0.1
 *
 */
class commentsBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "comments"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Конфигурирование модуля
     *
     */
    public function getAccess() {
        $registry = Registry::getInstance();
        $access = Access::getInstance();
//        $access->setMenuName($this->_name, 'Комментарии', 210, $registry->admin_pseudo_dir . 'comments/list/1/');
//        $access->setAccess($this->_name, 'Комментарии', array($registry->admin_pseudo_dir . "comments/list/1/"), 1, $registry->admin_pseudo_dir . 'comments/list/1/');
    }
    
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
        $route->addRoutePath($this->_name, $registry->modules_dir . "comments/", "controllers", "templates");
        $route->addRoute($this->_name, "/comments/list/:type/:parent_id/", "comments", "comments", "comments", false); //Вывод комментариев
        $route->addRoute($this->_name, "/xadmin/comments/list/:del_id/", "list", "comments", "list", false); //Вывод комментариев
        $route->addRoute($this->_name, "/xadmin/comments/look/:comment_id/", "look", "comments", "look", false); //Вывод комментариев
        $route->addRoute($this->_name, "/xadmin/comments/look/is_active/:comment_id/:is_active/", false, "comments", "look", false); //Активность
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