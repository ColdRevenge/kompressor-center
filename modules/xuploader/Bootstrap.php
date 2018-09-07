<?php

/**
 * Модуль работы с публикациями
 * @version 0.1
 *
 */
class xuploaderBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "xuploader"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Конфигурирование модуля
     *
     */

    public function getAccess() {
        $registry = Registry::getInstance();
        $access = Access::getInstance();
//        $access->setAccess('setting', 'Прайс лист', array($registry->admin_pseudo_dir . "xuploader/"), 1, $registry->admin_pseudo_dir . 'xuploader/');
    }
    
    public function config() {
        $registry = Registry::getInstance();
        if (!isset ($registry->xuploader_config) || $registry->xuploader_config = 0) {
            $registry->template = 'images'; //Загрузка фотографий, так же возможен тип "files"
            $registry->type = 55430;

            $registry->resizes = array();
            $registry->resizes[0] = array("prefix"=>"smoll_", "width" => 50, "height"=>0);
            $registry->resizes[1] = array("prefix"=>"medium_", "width" => 150, "height"=>0);
            $registry->resizes[2] = array("prefix"=>"big_", "width" => 0, "height"=>0); //Не меняем размер

            $registry->is_desc = 0; //Показываем поле описание
            $registry->is_name = 0; //Показываем поле название

            //$registry->prefix = mktime().'_';
            $registry->max_size = 17000;
            $registry->dinst_dir = $registry->files_dir;
            $registry->dinst_url = $registry->files_url;
        }
    }

    /**
     * Маршруты модуля
     *
     */
    public function route() {
        $registry = Registry::getInstance();
        $registry->MyName = $this->_name;
        $route = Router::getInstance();
        $route->addRoutePath($this->_name, $registry->modules_dir . "xuploader/", "controllers", "templates");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "xuploader/", "upload", "xuploader", "xuploader", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "xuploader/upload/", "out", "xuploader", "upload", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "xuploader/list/:del_id/", $registry->template, "xuploader", "xuploader", false); //Список всех страниц
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