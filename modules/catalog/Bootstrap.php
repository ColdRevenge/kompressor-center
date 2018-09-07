<?php

/**
 * Модуль работы с публикациями
 * @version 0.1
 *
 */
class catalogBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "catalog"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Конфигурирование модуля
     *
     */

    public function config() {
        
    }

    public function getAccess() {
        $registry = Registry::getInstance();
        $access = Access::getInstance();
        $access->setMenuName($this->_name, 'Каталог товаров', 20, $registry->admin_pseudo_dir . 'products/list/');
        $access->setAccess($this->_name, 'Характеристики товаров', array($registry->admin_pseudo_dir . "characteristics/list/0/0/"), 1, $registry->admin_pseudo_dir . 'characteristics/list/0/0/');
        $access->setAccess($this->_name, 'Импорт цен', array($registry->admin_pseudo_dir . "import/price"), 1, $registry->admin_pseudo_dir . 'import/price');
//        $access->setAccess($this->_name, 'Описания характеристик товаров', array($registry->admin_pseudo_dir . "/characteristics/desc/list/0/"), 1, $registry->admin_pseudo_dir . '/characteristics/desc/list/0/');
        
        $access->setAccess($this->_name, 'Производители', array($registry->admin_pseudo_dir . "brand/list/"), 1, $registry->admin_pseudo_dir . 'brand/list/');
//        $access->setAccess($this->_name, 'Импорт товаров', array($registry->admin_pseudo_dir . "import/0/"), 1, $registry->admin_pseudo_dir . 'import/0/');
//        $access->setAccess($this->_name, 'Загрузка/Обновление YML', array($registry->admin_pseudo_dir . "import/xml/"), 1, $registry->admin_pseudo_dir . 'import/xml/');
//        $access->setAccess($this->_name, 'Комментарии к товарам', array($registry->admin_pseudo_dir . "comments/list/"), 1, $registry->admin_pseudo_dir . "comments/list/");
//        $access->setAccess($this->_name, 'Сортировка акций', array($registry->admin_pseudo_dir . "products/param/sort/1/"), 1, $registry->admin_pseudo_dir . "products/param/sort/1/");
//        
//        $access->setAccess($this->_name, 'Каталог товаров', array($registry->admin_pseudo_dir . "products/list/"), 0);
    }

    /**
     * Маршруты модуля
     */
    public function route() {
        $registry = Registry::getInstance();
        $registry->MyName = $this->_name;
        $route = Router::getInstance();
        $route->addRoutePath($this->_name, $registry->modules_dir . "catalog/", "controllers", "templates");
        $route->addRoute($this->_name, "catalog/:pseudo_dir/:page/:sort_method/:sort_ord/", "catalog", "catalog", "catalog", false); //Список всех страниц
        $route->addRoute($this->_name, "catalog/id/:id/", "catalog", "catalog", "catalog", false); //Список всех страниц

        $route->addRoute($this->_name, "catalog/brand/:brand/:page/:sort_method/:sort_ord/", "catalog", "catalog", "brand", false); //Список всех страниц
        $route->addRoute($this->_name, "catalog/brand/category/:pseudo_dir/:page/:sort_method/:sort_ord/", "catalog", "catalog", "brand", false); //Список всех страниц
        $route->addRoute($this->_name, "catalog/brand-list/", "brand-list", "catalog", "brand_list", false); //Список всех страниц
        $route->addRoute($this->_name, "catalog/news/:category_id/:limit/", "catalog", "catalog", "getNewsProduct", false); //Случайные товары
        $route->addRoute($this->_name, "catalog/top/:category_id/:limit/", "catalog", "catalog", "getTopProduct", false); //Случайные товары
        $route->addRoute($this->_name, "catalog/news/main/:category_id/:limit/", "news_product_main", "catalog", "getNewsProduct", false); //Случайные товары
        $route->addRoute($this->_name, "catalog/top/main/:category_id/:limit/", "news_product_main", "catalog", "getTopProduct", false); //Случайные товары
        $route->addRoute($this->_name, "catalog/random/main/:limit/", "random_products", "catalog", "getRandomProducts", false); //Случайные товары
        $route->addRoute($this->_name, "catalog/find/", "catalog", "find", "find", false); //Список всех страниц
        $route->addRoute($this->_name, "catalog/find/category/:category_pseudo_dir/", "catalog", "find", "findCategory", false); //Список всех страниц
        //Вытаскиваеем характиристику для продукта (используется в каталоге)
        $route->addRoute($this->_name, "catalog/ajax/get_chars/:product_id/", "getCharProduct", "catalog", "getCharProduct");


        $route->addRoute($this->_name, "catalog/podbor/:is_quick/:char_1_id/:char_2_id/:char_3_id/", "podbor", "find", "podbor", false); //Список всех страниц
        //Полный подбор по характеристикам
        $route->addRoute($this->_name, "catalog/podbor/char/:char_type/", "catalog", "find", "char", false); //Список всех страниц
        //Подбор по 1-ой характиристике
        $route->addRoute($this->_name, "catalog/podbor/char/:char_value/", "catalog", "find", "podbor", false); //Список всех страниц
        $route->addRoute($this->_name, "catalog/podbor/find/:category_id/:brand_id/:char_1_id/:char_2_id/:char_3_id/", "catalog", "find", "podbor", false); //Поиск по значению характеристики
        $route->addRoute($this->_name, "catalog/podbor/find/char/:char_1_id/:char_2_id/:char_3_id/", "catalog", "find", "podborChar", false); //Поиск по ид характеристики
        //авто-Подбор 
        $route->addRoute($this->_name, "catalog/selection/", "selection", "find", "char", false); //Список всех страниц
        //Ручной подбор

        $route->addRoute($this->_name, "catalog/find-selection/:is_only_count/", "catalog", "find", "find_selection", false); //Кол-во
        //Сетеры, для настройки каталога
        $route->addRoute($this->_name, "catalog/set/count/:count_product/", null, "catalog", "set", false);

        $route->addRoute($this->_name, "catalog/get-product-param/:param_id/:category_id/:limit/:offset/", "getProductParamMain", "catalog", "getProductParam", false); //Новые товары
        $route->addRoute($this->_name, "catalog/get-product-param-param/:param_id/:category_id/:limit/:offset/", "getProduct", "catalog", "getProductParam", false); //Новые товары
        $route->addRoute($this->_name, "catalog/get-product/:param_id/", "catalog", "catalog", "getProductParam", false); //Новые товары
        
        $route->addRoute($this->_name, "catalog/full_podbor/", "podbor", "catalog", "podbor", false); //Новые товары
        $route->addRoute($this->_name, "catalog/add_to_fav/", null, "catalog", "add_to_fav", false); //Новые товары
        $route->addRoute($this->_name, "catalog/fav/", "fav", "catalog", "fav", false); //Новые товары
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
