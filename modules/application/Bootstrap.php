<?php
/**
 * Модуль включает множество часто повторяющихся задач
 *
 */
class applicationBootstrap implements IBootstrap {
    public $version = "0.1";
    private $_name = "applicaton"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки
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
        $route->addRoutePath($this->_name, $registry->modules_dir."application/","controllers","templates");
        //Даты
        $route->addRoute($this->_name,"/application/date/:type/:year/:month/:day/:name_prefix/:is_profile/","time_get_date","time", "get_date"); //Показывает форму даты, с именами месяц - month, год - year, день - day
        $route->addRoute($this->_name,"/application/fields/meta/","meta",null, null); //Показывает форму даты, с именами месяц - month, год - year, день - day
    }

    /**
     * Запуск модуля
     *
     */
    public function run($default_regexp = null) {
        $route = Router::getInstance();
        ;
        return $route->delegate($this->_name, $default_regexp);
    }
}