<?php

/**
 * Модуль списка разделов меню неограниченной вложености..
 * @version 0.2 beta
 *
 */
class categoryBootstrap implements IBootstrap {

    public $version = "0.3";
    private $_name = "category"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Сонфигурирование модуля
     *
     */

    public function config() {
        
    }

    public function getAccess() {
        $registry = Registry::getInstance();
        $access = Access::getInstance();
        $access->setMenuName($this->_name, 'Меню', 10, $registry->admin_pseudo_dir . 'category/list/0/');
        $access->setAccess($this->_name, 'Каталог', array($registry->admin_pseudo_dir . "category/list/0/"), 1, $registry->admin_pseudo_dir . 'category/list/0/');
        $access->setAccess($this->_name, 'Верхнее меню', array($registry->admin_pseudo_dir . "category/list/1/"), 1, $registry->admin_pseudo_dir . 'category/list/1/');
       $access->setAccess($this->_name, 'Главное меню', array($registry->admin_pseudo_dir . "category/list/2/"), 1, $registry->admin_pseudo_dir . 'category/list/2/');
       $access->setAccess($this->_name, 'Нижнее меню 1', array($registry->admin_pseudo_dir . "category/list/3/"), 1, $registry->admin_pseudo_dir . 'category/list/3/');
       $access->setAccess($this->_name, 'Нижнее меню 2', array($registry->admin_pseudo_dir . "category/list/4/"), 1, $registry->admin_pseudo_dir . 'category/list/4/');
       $access->setAccess($this->_name, 'Нижнее меню 3', array($registry->admin_pseudo_dir . "category/list/5/"), 1, $registry->admin_pseudo_dir . 'category/list/5/');
       $access->setAccess($this->_name, 'Нижнее меню 4', array($registry->admin_pseudo_dir . "category/list/6/"), 1, $registry->admin_pseudo_dir . 'category/list/6/');
//        if ($registry->shop == 'forum') {
//            $access->setAccess($this->_name, 'Верхнее меню форума', array($registry->admin_pseudo_dir . "category/list/101/"), 1, $registry->admin_pseudo_dir . 'category/list/101/');
//            $access->setAccess($this->_name, 'Разделы форума', array($registry->admin_pseudo_dir . "category/list/100/"), 1, $registry->admin_pseudo_dir . 'category/list/100/');
//        }
    }

    /**
     * Маршруты модуля
     *
     */
    public function route() {
        $registry = Registry::getInstance();
        $registry->MyName = $this->_name;
        $route = Router::getInstance();

        $route->addRoutePath($this->_name, $registry->modules_dir . "category/", "controllers", "templates");
        /**
         * Разделы меню для раздела
         */
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "category/add/:type/:parent_id/", "add", "category", "add");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "category/list/:type/:message_id/:del_id/", "list", "category", "list");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "category/list/edit/:type/:category_id/", "list", "category", "list_edit");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "category/list/add/:type/:parent_category_id/", "list", "category", "list_edit");


        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "category/edit/:type/:edit_id/", "add", "category", "add");

        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "category/tree_list/:type/:template/:param_1/", 'tree_list', "category", "tree_list");

        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "category/page_list/:type/:offset/", "page_tree_list", "category", "page_tree_list");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "category/product_list/:type/:offset/", "product_tree_list", "category", "product_tree_list");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "category/admin_related_list/:type/:product_id/:offset/", "admin_related_tree", "category", "admin_related_tree");

        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "category/is_pseudo_dir/:pseudo_dir/:type/:edit_id/", "is_pseudo_dir", "category", "isPseudoDir");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "category/ajax/auto_pseudo_dir/", null, "category", "auto_pseudo_dir");

        $route->addRoute($this->_name, "category/product_list/:parent_id/", "menu_catalog", "category", "catalog_tree_list");
        $route->addRoute($this->_name, "category/product_list/horizontal/", "menu_horizontal_catalog", "category", "catalog_tree_list");
        $route->addRoute($this->_name, "category/map/", "map_site", "category", "map_site");
    }

    /**
     * Запуск модуля
     *
     */
    public function run($default_url = null) {
        $route = Router::getInstance();
//        $cacheModule = CacheModule::getCacheModule($this->_name, true);
//        if ($cacheModule !== false) {
//            return CacheModule::getCacheModule($this->_name, true);
//        } else {
        $return = $route->delegate($this->_name, $default_url);
//            CacheModule::setCacheModule($this->_name, $return, true);
        return $return;
//        }
    }

}
