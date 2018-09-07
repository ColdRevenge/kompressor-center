<?php

/**
 * Новостей
 */
class newsBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "news"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Конфигурирование модуля
     *
     */

    public function config() {
        
    }

    public function getAccess() {
        $registry = Registry::getInstance();
        $access = Access::getInstance();
        $access->setMenuName($this->_name, 'Новости', 40, $registry->admin_pseudo_dir . 'news/list/1/');
        $access->setAccess($this->_name, 'Список новостей', array($registry->admin_pseudo_dir . "news/list/1/"), 1, $registry->admin_pseudo_dir . 'news/list/1/');
        $access->setAccess($this->_name, 'Список статей', array($registry->admin_pseudo_dir . "news/list/3/"), 1, $registry->admin_pseudo_dir . 'news/list/3/');
        $access->setAccess($this->_name, 'Интернет журнал', array($registry->admin_pseudo_dir . "journal/list/"), 1, $registry->admin_pseudo_dir . 'journal/list/');
		
		
//        $access->setAccess($this->_name, 'Список новостей', array($registry->admin_pseudo_dir . "news/list/1/"), 1, $registry->admin_pseudo_dir . 'news/list/1/');
//        $access->setAccess($this->_name, 'Добавить/Редактировать новость', array($registry->admin_pseudo_dir . "news/add/1/", $registry->admin_pseudo_dir . "news/edit/"), 0);
//        $access->setAccess($this->_name, 'Удалить новость', array($registry->admin_pseudo_dir . "news/list/1/:message/:del_id/"), 0);
    }

    /**
     * Маршруты модуля
     */
    public function route() {
        $registry = Registry::getInstance();
        $registry->MyName = $this->_name;
        $route = Router::getInstance();
        $route->addRoutePath($this->_name, $registry->modules_dir . "news/", "controllers", "templates");

        //Для главной, или других страниц. Вставляется так: {news|1|4|0|1}
        $route->addRoute($this->_name, "/news/:type/:limit/:offset/:is_strip/", "news", "news", "getNews");
        $route->addRoute($this->_name, "/page/news/:type/:limit/:offset/:is_strip/", "news", "news", "getNews");
        //Для раздела новости:
        $route->addRoute($this->_name, "/news/all/:page/:type/:is_strip/", "page_news", "news", "getNews");
//        $route->addRoute($this->_name,"page/news/:page/","news_ulan","news", "getNews"); ???
        $route->addRoute($this->_name, "/news/look/:news_id/", "look", "news", "getLook");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "news/add/:type/:news_tmp_id/", "add", "news", "add");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "news/edit/:news_id/", "add", "news", "add");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "news/list/:type/:message/:del_id/", "list", "news", "list");

        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "news/product_menu/:news_id/", 'news_product_menu', "news", "getNewsProduct");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "news/product/:news_id/:category_id/", 'news_product', "news_product", "list");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "news/product_list/:news_id/:category_id/", 'news_product_list', "news_product", "list");
        
        
        $route->addRoute($this->_name, "/news/rss/:type/", null, "news", "rss");
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
