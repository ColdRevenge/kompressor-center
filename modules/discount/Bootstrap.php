<?php

/**
 * Модуль списка разделов меню неограниченной вложености..
 * @version 0.2 beta
 *
 */
class discountBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "discount"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    public function getAccess() {
        $registry = Registry::getInstance();
        $access = Access::getInstance();
        $access->setMenuName($this->_name, 'Маркетинг', 120, $registry->admin_pseudo_dir . 'banners/list/1/');
//        $access->setAccess($this->_name, 'Система скидок', array($registry->admin_pseudo_dir . "discount/0/"), 1, $registry->admin_pseudo_dir . 'discount/0/');
        if ($registry->is_coupon == true) {
//            $access->setAccess($this->_name, 'Купоны', array($registry->admin_pseudo_dir . "discount/coupons/"), 1, $registry->admin_pseudo_dir . 'discount/coupons/');
        }
//        $access->setAccess($this->_name, 'Яндекс маркет', array($registry->admin_pseudo_dir . "sync/yandex_market/"), 1, $registry->admin_pseudo_dir . 'sync/yandex_market/');
//        $access->setAccess($this->_name, 'Google Merchant', array($registry->admin_pseudo_dir . "sync/google_merchant/"), 1, $registry->admin_pseudo_dir . 'sync/google_merchant/');
//        $access->setAccess($this->_name, 'Рассылка', array($registry->admin_pseudo_dir . "send/mail/"), 1, $registry->admin_pseudo_dir . 'send/mail/');
        $access->setAccess($this->_name, 'Баннеры', array($registry->admin_pseudo_dir . "banners/list/1/"), 1, $registry->admin_pseudo_dir . 'banners/list/1/');
        $access->setAccess($this->_name, 'Статистика посещаемости', array($registry->admin_pseudo_dir . "counter/stat/0/"), 1, $registry->admin_pseudo_dir . 'counter/stat/0/');
        $access->setAccess($this->_name, 'Статистика поисковых запросов', array($registry->admin_pseudo_dir . "counter/stat/query/"), 1, $registry->admin_pseudo_dir . 'counter/stat/query/');
    }

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

        $route->addRoutePath($this->_name, $registry->modules_dir . "discount/", "controllers", "templates");


        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "discount/:message_id/:del_id/", "discount", "discount", "discount");
        if ($registry->is_coupon == true) {
            $route->addRoute($this->_name, $registry->admin_pseudo_dir . "discount/coupons/:message_id/", "coupons", "discount", "coupons");
            $route->addRoute($this->_name, $registry->admin_pseudo_dir . "discount/coupons/add/:edit_id/", "coupon_add", "discount", "couponAdd");
            $route->addRoute($this->_name, $registry->admin_pseudo_dir . "discount/coupons/del/:message_id/:del_id/", "coupons", "discount", "coupons");
            $route->addRoute($this->_name, $registry->admin_pseudo_dir . "discount/coupons/active/:message_id/:edit_id/:is_active/", "coupons", "discount", "coupons");
            $route->addRoute($this->_name, $registry->admin_pseudo_dir . "discount/coupons/id/:coupon_id/", "coupon_list_code", "discount", "couponListCode");
        }
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "discount/category/list/:discount_id/", "list_category", "discount", "listCategory");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "discount/brand/list/:discount_id/", "list_brand", "discount", "listBrand");


        $route->addRoute($this->_name, "discount/coupons/", null, "discount", "getCoupons");
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
