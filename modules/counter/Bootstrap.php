<?php

/**
 * Модуль Вывода календаря
 * @version 0.1
 *
 */
class counterBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "counter"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Конфигурирование модуля
     *
     */

    public function config() {
        
    }

    public function getAccess() {
        $registry = Registry::getInstance();
        $access = Access::getInstance();
//        $access->setMenuName($this->_name, 'Статистика', 110, $registry->admin_pseudo_dir . 'counter/stat/');
//        $access->setAccess($this->_name, 'Статистика посещаемости', array($registry->admin_pseudo_dir . "counter/stat/"), 1, $registry->admin_pseudo_dir . 'counter/stat/');
//        $access->setAccess($this->_name, 'Статистика поисковых запросов', array($registry->admin_pseudo_dir . "counter/stat/query/"), 1, $registry->admin_pseudo_dir . 'counter/stat/query/');
//        $access->setAccess($this->_name, 'Статистика заходов', array($registry->admin_pseudo_dir . "counter/stat/other/"), 1, $registry->admin_pseudo_dir . 'counter/stat/other/');
    }

    /**
     * Маршруты модуля
     *
     */
    public function route() {
        $registry = Registry::getInstance();
        $registry->MyName = $this->_name;
        $route = Router::getInstance();
        $route->addRoutePath($this->_name, $registry->modules_dir . "counter/", "controllers", "templates");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "counter/stat/", "statistic", "counter", "stat", null); //По категориям
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "counter/stat/full/:date/", "statistic_full", "counter", "stat", null); //По категориям
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "counter/stat/hits/:counter_id/", "counter_hits", "counter", "counter_hits", null); //По категориям

        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "counter/stat/other/:date/", "other_stat", "counter", "other", null); //По категориям
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "counter/stat/other/referer/:domain/", "other_referer", "counter", "other_referer", null); //По категориям
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "counter/stat/other/self/", "other_self", "counter", "other_self", null); //По категориям

        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "counter/stat/query/:date/", "query_stat", "counter", "query", null); //По категориям
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "counter/stat/draw/", null, "counter", "drawStat", null); //По категориям
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
