<?php

/**
 * Модуль отчетов
 * @version 0.1
 *
 */
class reportsBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "reports"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Конфигурирование модуля
     *
     */

    public function config() {
        
    }

    public function getAccess() {
        $registry = Registry::getInstance();
        $access = Access::getInstance();
//        $access->setMenuName($this->_name, 'Отчеты', 80, $registry->admin_pseudo_dir . 'reports/history/1/');
    }

    /**
     * Маршруты модуля
     *
     */
    public function route() {
        $registry = Registry::getInstance();
        $registry->MyName = $this->_name;
        $route = Router::getInstance();
        $route->addRoutePath($this->_name, $registry->modules_dir . "reports/", "controllers", "templates");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "reports/history/:type/", "history_orders", "reports", "history_orders", false); //Список всех страниц

        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "reports/completed/", "report_completed", "reports", "completed", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "reports/completed/detailed/:year/:month/:day/", "report_completed_detailed", "reports", "completedDetailed", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "reports/completed/brand/:year/:month/:day/", "report_completed_brand", "reports", "completedBrand", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "reports/completed/brand/detailed/:brand_id/:start_date/:end_date/", "report_completed_brand_detailed", "reports", "completedBrandDetailed", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "reports/completed/category/:year/:month/:day/", "report_completed_category", "reports", "completedCategory", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "reports/completed/category/detailed/:category_id/:start_date/:end_date/", "report_completed_category_detailed", "reports", "completedCategoryDetailed", false); //Список всех страниц

        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "reports/completed/chars/:char_id/", "report_completed_chars", "reports", "getOrderChar", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "reports/completed/chars/detailed/:char_id/:start_date/:end_date/", "report_completed_chars_detailed", "reports", "getOrderCharDetailed", false); //Список всех страниц
   


        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "reports/products/:type/", "history_products", "reports", "history_orders", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "reports/products_top/:type/", "history_top_products", "reports", "history_orders", false); //Список всех страниц
//        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "reports/order/", "getOrderStat", "reports", "getOrderStat", false); //Список всех страниц

        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "reports/manager/", "manager", "reports", "manager", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "reports/products/", "products", "reports", "products", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "reports/products/detailed/:manager_id/:start_date/:end_date/", "products_detailed", "reports", "productsDetailed", false); //Список всех страниц
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
