<?php

/**
 * Модуль работы с публикациями
 * @version 0.1
 *
 */
class productsBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "products"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Конфигурирование модуля
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
        $route->addRoutePath($this->_name, $registry->modules_dir . "products/", "controllers", "templates");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "products/list/:type/:category_id/:message_id/:del_id/", "list", "products", "list", false);
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "products/list/up-product/:type/:category_id/:message_id/:del_id/", "list_products", "products", "list", false); //Автообновление продуктов
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "products/list/set-status/:type/:category_id/:product_id/:is_active/", "list", "products", "list", false);
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "products/list/set-page/:type/:category_id/:page_num/", "list", "products", "list", false);
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "products/list/sort/:type/:category_id/:field/:order/", "list", "products", "list", false);
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "products/add/:type/:category_id/:temp_image_id/", "add", "products", "add", false);
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "products/edit/:type/:category_id/:temp_image_id/:edit_id/", "add", "products", "add", false);
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "products/is_pseudo_dir/:pseudo_dir/", "is_pseudo_dir", "products", "isPseudoDir", false); //Проверить псевдо папку страницу
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "products/is_pseudo_dir/:pseudo_dir/:type/:edit_id/", "is_pseudo_dir", "products", "isPseudoDir");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "products/ajax/auto_pseudo_dir/", null, "products", "auto_pseudo_dir");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "products/ajax/minimize/:category_id/:type/", null, "products", "minimize");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "products/param/sort/:type/", 'product_param_sort', "products", "product_param_sort");


        $route->addRoute($this->_name, "products/:pseudo_dir/:test", "product", "products", "getProduct", false);
        $route->addRoute($this->_name, "products/id/:product_id/", "product", "products", "getProduct", false);

        $route->addRoute($this->_name, "products/random/:category_id/:limit/", "random", "products", "getRandomProduct", false); //Случайные товары

        /* Модификации */
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "products/mod/add/", 'mod_add', 'mod', 'mod_add');
////         $route->addRoute($this->_name, $registry->admin_pseudo_dir . "products/mod/del/:type/:product_id/", null, "mod", "auto_pseudo_dir");
//         $route->addRoute($this->_name, $registry->admin_pseudo_dir . "products/mod/list/:type/:product_id/", 'mod_list', "mod", "listMod");
    }

    /**
     * Запуск модуля
     *
     */
    public function run($default_url = null) {
        $route = Router::getInstance();
        //ПЕРОДИСЕЧКИ В КЕШ ЗАГОНЯЕТ НЕ ПОЛНОСТЬЮ 
        //ТО НЕ РАБОТАЕТ УВИЛИЧЕНИЕ ТО ЗУМ ТО В КОРЗИНУ НЕ КИДАЕТ
//        $cacheModule = CacheModule::getCacheModule($this->_name . '#', true);
//        if ($cacheModule !== false) {
//            return CacheModule::getCacheModule($this->_name, true);
//        } else {
            $return = $route->delegate($this->_name, $default_url);
//            CacheModule::setCacheModule($this->_name, $return, true);
            return $return;
//        }
    }

}
