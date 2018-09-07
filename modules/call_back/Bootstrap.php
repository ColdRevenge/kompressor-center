<?php

/**
 * Модуль работы "Счетчик подсчета холодной воды", для управляющих компаниях
 * @version 0.1
 *
 */
class call_backBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "call_back"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

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
        $route->addRoutePath($this->_name, $registry->modules_dir . "call_back/", "controllers", "templates");
        $route->addRoute($this->_name, "call_back/:call/", "call_back", "call_back", "call_back", false); //Обратная связь       
        
        
        $route->addRoute($this->_name, "call_back/1/:call/", "call_back", "call_back", "call_back", false); //Обратная связь  
        $route->addRoute($this->_name, "call_back/2/:call/", "call_back_call", "call_back", "call_back_call", false); //Обратная связь  
        
        $route->addRoute($this->_name, "call_back/call/", "call", "call_back", "call", false); //Обратная связь     
        $route->addRoute($this->_name, "call_back/file/", null, "call_back", "call_back_file", false); //Отправлка всех файлов скрыто
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "call_back/", "call_back_list", "call_back", "request", false);
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
