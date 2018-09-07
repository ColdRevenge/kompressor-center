<?php

/**
 * Навая версия загрузчика файлов
 * Расчитана на работу в разных модулях
 * @version 0.1
 *
 */
class uploader_productsBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "uploader_products"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Конфигурирование модуля
     *
     */

    public function config() {
        $registry = Registry::getInstance();
        if (!isset($registry->xuploader_config) || $registry->xuploader_config = 0) {
            $registry->template = 'full_images'; //Загрузка фотографий, так же возможен тип "files"
            $registry->type = 0;

            Lavra_Loader::LoadClass("ProductSetting");
            $setting = new ProductSetting();
            if ($registry->shop == 'lady' || $registry->shop == 'woman') {
                Lavra_Loader::LoadClass("MultiLalipop");
                $setting = new MultiLalipop();
                $size_1 = $setting->getImageLadySettingId(1);
                $size_2 = $setting->getImageLadySettingId(2);
                $size_3 = $setting->getImageLadySettingId(3);
                $size_4 = $setting->getImageLadySettingId(4);
                $size_5 = $setting->getImageLadySettingId(5);
                $size_6 = $setting->getImageLadySettingId(6);
            } else {
                $size_1 = $setting->getImageSettingId(1);
                $size_2 = $setting->getImageSettingId(2);
                $size_3 = $setting->getImageSettingId(3);
                $size_4 = $setting->getImageSettingId(4);
                $size_5 = $setting->getImageSettingId(5);
                $size_6 = $setting->getImageSettingId(6);
            }

            $registry->resizes = array();
            $registry->resizes[0] = array("prefix" => "_1", "width" => $size_1->width, "height" => $size_1->height, "scaling_width" => $size_1->scaling_width, "scaling_height" => $size_1->scaling_height, "is_convas" => $size_1->is_convas, "type" => 1);
            $registry->resizes[1] = array("prefix" => "_2", "width" => $size_2->width, "height" => $size_2->height, "scaling_width" => $size_2->scaling_width, "scaling_height" => $size_2->scaling_height, "is_convas" => $size_2->is_convas, "type" => 2);
            $registry->resizes[2] = array("prefix" => "_3", "width" => $size_3->width, "height" => $size_3->height, "scaling_width" => $size_3->scaling_width, "scaling_height" => $size_3->scaling_height, "is_convas" => $size_3->is_convas, "type" => 3);
            $registry->resizes[3] = array("prefix" => "_4", "width" => $size_4->width, "height" => $size_4->height, "scaling_width" => $size_4->scaling_width, "scaling_height" => $size_4->scaling_height, "is_convas" => $size_4->is_convas, "type" => 4);
            $registry->resizes[4] = array("prefix" => "_5", "width" => $size_5->width, "height" => $size_5->height, "scaling_width" => $size_5->scaling_width, "scaling_height" => $size_5->scaling_height, "is_convas" => $size_5->is_convas, "type" => 5);
            $registry->resizes[5] = array("prefix" => "_6", "width" => $size_6->width, "height" => $size_6->height, "scaling_width" => $size_6->scaling_width, "scaling_height" => $size_6->scaling_height, "is_convas" => $size_6->is_convas, "type" => 6);
//            $registry->resizes[5] = array("prefix"=>"", "width" => $size_6->width, "height"=>$size_6->height, "type" => 6);
            $registry->is_desc = 0; //Показываем поле описание
            $registry->is_name = 0; //Показываем поле название

            $registry->prefix = time() . '_';
            $registry->max_size = 17000;
            $registry->dinst_dir = $registry->gallery_dir;
            $registry->dinst_url = $registry->gallery_url;
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
        $route->addRoutePath($this->_name, $registry->modules_dir . "uploader_products/", "controllers", "templates");
        $route->addRoute($this->_name, "/uploader_products/upload/", null, "uploader_products", "upload", false); //Загрузка файлов
        $route->addRoute($this->_name, "/uploader_products/list/", 'uploader', "uploader_products", "uploader", false); //Список всех страниц
        $route->addRoute($this->_name, "/uploader_products/get/:type/:product_id/:act_id/:image_id/", 'getFiles', "uploader_products", "getFiles", false); //Список всех страниц
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
