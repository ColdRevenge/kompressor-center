<?php

/**
 * Модуль настройки
 *
 */
class syncBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "sync"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

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
        $route->addRoutePath($this->_name, $registry->modules_dir . "sync/", "controllers", "templates");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "sync/yandex_market/", "yandex_market", "yandex_market", "yandex_market", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "sync/google_merchant/", "google_merchant", "google_merchant", "google_merchant", false); //Список всех страниц

        /**
         * URL API: https://lalipop.ru/sync/buy/market/
         * SHA1 fingerprint f5 cd d5 3c 08 50 f9 6a 4f 3a b7 97 da 56 83 e6 69 d2 68 f7 (Смотриться в google chrome)
         * Авторизационный токен EF000001924D3457
         * 
         * 1. Зарегистрировать новое приложение на https://oauth.yandex.ru/client/new
         * Права:
          API Яндекс.Маркета для партнеров
          ID: 6c3471da9684426c85af75bd9b353f7f
          Пароль: 33a849a922c645768bec84c7538db579
          Callback URL: https://oauth.yandex.ru/verification_code
         * 
         * 2. Получение токена: https://oauth.yandex.ru/authorize?response_type=token&client_id=35ca88fb8d8f4101a87e668dbc13a2e1 (по ID приложения)
         */
        $route->addRoute($this->_name, "sync/buy/market/cart", "buy_market_cart", "sync", "buy_market_cart", false);
        $route->addRoute($this->_name, "sync/buy/market/cart", null, "buyMarket", "buy_market_cart", false);
        $route->addRoute($this->_name, "sync/buy/market/order/accept", null, "buyMarket", "buy_market_order_accept", false);
        $route->addRoute($this->_name, "sync/buy/market/order/status", null, "buyMarket", "buy_market_order_status", false);
        $route->addRoute($this->_name, "sync/buy/market/set/status", null, "buyMarket", "setStatus", false);


        $route->addRoute($this->_name, "sync/1c/products/price/", null, "sync1C", "price", false); //Обновление цен и остатка на складе
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "sync/1c/setting/", '1c_setting', "sync1C", "setting_1c", false); //Обновление цен и остатка на складе
        // $route->addRoute($this->_name, $registry->admin_pseudo_dir . "sync/yandex_market/get/products/:category_id/", "ynadex_market_get_products", "sync", "getProducts", false); //Список всех страниц
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
