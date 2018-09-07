<?php

/**
 * Модуль работы с публикациями
 * @version 0.1
 *
 */
class importBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "import"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки

    /**
     * Конфигурирование модуля
     *
     */

    public function config() {
        $registry = Registry::getInstance();

        $registry->default_warehouse = 250000;
        $fields = array("article" => "Артикул",
            "name" => "Название",
            "brand" => "Производитель", //Поле с проверкой на бренд и в случ. необходимости добавление бренда
//            "warehouse" => "Кол-во",
//            "category_name" => "Категория",
            "mod_name" => "Состав",
            "price" => "Розничная цена",
            "cost_price" => "Закупочная цена",
            "image_1" => "Изображение 1",
            "image_2" => "Изображение 2",
            "image_3" => "Изображение 3",
            "image_4" => "Изображение 4",
            "image_5" => "Изображение 5",
//            "price_1" => "Цена 2",
//            "price_2" => "Цена 3",
//            "price_3" => "Цена 4",
//            "price_4" => "Цена 5",
//            "price_5" => "Цена 6",
//            "price_6" => "Цена 7",
//            "price_7" => "Цена 8",
//            "price_8" => "Цена 9",
//            "price_9" => "Цена 10",
            "desc_1" => "Размер",
            "desc" => "Описание",
            
//            "valuta" => "Валюта"
        );
//            "unit" => "Ед. измерения",

        $registry->fields = $fields; //Обновляемые поля

        $registry->count_show_line = 30; //Кол-во показываемых строк
    }

    /**
     * Маршруты модуля
     *
     */
    public function route() {
        $registry = Registry::getInstance();
        $registry->MyName = $this->_name;
        $route = Router::getInstance();
        $route->addRoutePath($this->_name, $registry->modules_dir . "import/", "controllers", "templates");
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "import/:category_id/:message_id/", "list", "import", "list", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "import/import/:category_id/:file_id/", "import", "import", "import", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "import/import-full/", 'full', "import", "full", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "import/price/", 'price', "import", "price", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "import/xml/", 'list_xml', "importXML", "list_xml", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "import/xml/del/:del_id/", 'list_xml', "importXML", "list_xml", false); //Список всех страниц
        $route->addRoute($this->_name, $registry->admin_pseudo_dir . "import/xml/up/:up_id/", null, "importXML", "up", false); //Список всех страниц
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
