<?php

/**
 * Модуль работы с публикациями
 * @version 0.1
 *
 */
class pageBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "page"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Конфигурирование модуля
     *
     */

    public function config() {
        
    }

    public function getAccess() {
        $registry = Registry::getInstance();
        $access = Access::getInstance();
        $access->setMenuName($this->_name, 'Страницы', 30, $registry->admin_pseudo_dir . 'page/list/1/');
        $access->setAccess($this->_name, 'Страницы', array($registry->admin_pseudo_dir . "page/list/1/"), 1, $registry->admin_pseudo_dir . 'page/list/1/');
//        $access->setAccess($this->_name, 'Вопросы', array($registry->admin_pseudo_dir . "faq/"), 1, $registry->admin_pseudo_dir . 'faq/');
//        $access->setAccess($this->_name, 'Добавить/Редактировать страницу', array($registry->admin_pseudo_dir . "page/add/", $registry->admin_pseudo_dir . "page/edit/"), 0);
//        $access->setAccess($this->_name, 'Удалить страницу', array($registry->admin_pseudo_dir . "page/list/1/:category_id/:message_id/:del_id/"), 0);
    }

    /**
     * Маршруты модуля
     *
     */
    public function route() {
        $registry = Registry::getInstance();
        $registry->MyName = $this->_name;
        $route = Router::getInstance();
        $route->addRoutePath($this->_name, $registry->modules_dir . "page/", "controllers", "templates");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "page/list/:type/:category_id/:message_id/:del_id/", "list", "page", "list", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "page/add/:type/:category_id/:temp_page_id/", "add", "page", "add", false); //Добавить страницу
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "page/edit/:type/:category_id/:page_id/", "add", "page", "add", false); //Добавить страницу
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "page/is_pseudo_dir/:pseudo_dir/", "is_pseudo_dir", "page", "isPseudoDir", false); //Проверить псевдо папку страницу
        $route->addRoute($this->_name, "page/:pseudo_dir/:not_header/", "page", "page", "getPage", false); //Список всех страниц
        $route->addRoute($this->_name, "page/id/:page_id/:only_text/", "page", "page", "getPage", false); //Список всех страниц

        $route->addRoute($this->_name, "page/catalog/:pseudo_dir/", "page_catalog", "page", "getPage", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "page/ajax/auto_pseudo_dir/", 'auto_pseudo_dir', "page", "auto_pseudo_dir");

        $route->addRoute($this->_name, "page/find/", "content", "page", "find", false); //Содержание
        $route->addRoute($this->_name, "page/content/", "content", "page", "content", false); //Содержание
        $route->addRoute($this->_name, "page/gallery/", "gallery", "page", "gallery", false); //Содержание
        $route->addRoute($this->_name, "page/add/:message_id/", "page_user_add", "page", "page_user_add", false); //Содержание
        $route->addRoute($this->_name, "page/edit/:edit_id/:message_id/", "page_user_add", "page", "page_user_add", false); //Содержание



        $route->addRoute($this->_name, "page/get/:type/:message/", "my-article", "page", "my_article", false); //Содержание
        $route->addRoute($this->_name, "page/photogalereya/:category_id/:is_photos_cat_id/", "photogalereya", "page", "photogalereya", false); //Содержание

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
