<?php

/**
 * Модуль опроса.
 *
 */
class vs_productBootstrap implements IBootstrap {

    public $version = "0.2";
    private $_name = "vs_product"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

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
        $route->addRoutePath("vs_product", $registry->modules_dir . "vs_product/", "controllers", "templates");
        $route->addRoute("vs_product", "vs_product/:category_id/", "vs_product", "vs_product", "vs_product");
        $route->addRoute("vs_product", "vs_product/add/:product_id/", null, "vs_product", "add");
        $route->addRoute("vs_product", "vs_product/del/:product_id/", null, "vs_product", "del");
        $route->addRoute("vs_product", "vs_product/site/:category_id/", 'block_site', "vs_product", "vs_product");

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