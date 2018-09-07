<?php

/**
 * Навая версия загрузчика файлов
 * Расчитана на работу в разных модулях
 * @version 0.1
 *
 */
class uploader_articleBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "uploader_article"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Конфигурирование модуля
     *
     */

    public function config() {
        $registry = Registry::getInstance();
        if (!isset($registry->uploader_config) || $registry->uploader_config = 0) {
            $registry->template = 'images'; //Загрузка фотографий, так же возможен тип "files"
            $registry->type = 0;

            $registry->resizes = array();
            $registry->resizes[0] = array("prefix" => "smoll_", "width" => 50, "height" => 0);
            $registry->resizes[1] = array("prefix" => "medium_", "width" => 150, "height" => 0);
            $registry->resizes[2] = array("prefix" => "big_", "width" => 0, "height" => 0); //Не меняем размер

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
        $route->addRoutePath($this->_name, $registry->modules_dir . "uploader_article/", "controllers", "templates");
        $route->addRoute($this->_name,  "/uploader_article/upload/", null, "uploader_article", "upload", false); //Загрузка файлов
        $route->addRoute($this->_name,  "/uploader_article/list/", 'uploader', "uploader_article", "uploader", false); //Список всех страниц
        $route->addRoute($this->_name,  "/uploader_article/get/:type/:category_id/:page_id/:act_id/:image_id/:action_id/", 'getFiles', "uploader_article", "getFiles", false); //Список всех страниц
        
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