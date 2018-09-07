<?php

/**
 * Модуль списка разделов меню неограниченной вложености..
 * @version 0.2 beta
 *
 */
class forumBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "forum"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Сонфигурирование модуля
     *
     */

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

        $route->addRoutePath($this->_name, $registry->modules_dir . "forum/", "controllers", "templates");
        /**
         * Разделы меню для раздела
         */
        $route->addRoute($this->_name, ":pseudo_dir/", "index", "forum", "index");
        $route->addRoute($this->_name, ":pseudo_dir/read/:topic_id/", "index", "forum", "index");
        $route->addRoute($this->_name, "like/:topic_id/:answer_id/:user_id/", null, "forum", "like");
        $route->addRoute($this->_name, "my-post/", "my_post", "forum", "my_post");
        $route->addRoute($this->_name, "forum/get_users/", "get_users", "forum", "get_users");
        $route->addRoute($this->_name, "forum/last_post/", "last_post", "forum", "last_post");
        $route->addRoute($this->_name, "forum/user/:user_id/", "forum_user", "forum", "forum_user");

        $route->addRoute($this->_name, "forum/link/:link/", null, "forum", "link");


        $route->addRoute($this->_name, "admin/edit/topic/:topic_id/", "admin_edit_topic", "forum", "admin_edit_topic");
        $route->addRoute($this->_name, "admin/del/topic/:topic_id/:is_del/", null, "forum", "admin_edit_topic");

        $route->addRoute($this->_name, "admin/edit/answer/:answer_id/", "admin_edit_answer", "forum", "admin_edit_answer");
        $route->addRoute($this->_name, "admin/del/answer/:answer_id/:is_del/", null, "forum", "admin_edit_answer");
        $route->addRoute($this->_name, "forum/edit/answer/:answer_id/", "admin_edit_answer", "forum", "user_edit_answer");
        
        $route->addRoute($this->_name, "forum/answer/like/:user_id/:answer_id/", "like_answer_user", "forum", "like_answer_user");
       
        $route->addRoute($this->_name, "forum/notice/:topic_id/:user_id/:action/", "notice", "forum", "notice");
        $route->addRoute($this->_name, "forum/post/add/:user_id/", "message_add", "message", "message_add");
        $route->addRoute($this->_name, "forum/post/read/:message_id/", "message_list_read", "message", "message_read");
        $route->addRoute($this->_name, "forum/post/list/:user_id/", "message_list", "message", "message_list");
        
        
        
        
        $route->addRoute($this->_name, "forum/search/", "search", "forum", "search");
//https://forum.lalipop.ru/forum/notice/109//1/
//        $route->addRoute($this->_name, "add/:pseudo_dir/", "main", "forum", "addTopic");
//                $route->addRoute($this->_name, "forum/catalog/","catalog","forum", "catalog");
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
