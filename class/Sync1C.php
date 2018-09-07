<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of 1С
 *
 * @author Kisa
 */
class Sync1C {

    /**
     * Читает продукты из файла
     */
    private $_dom = null;
    private $_dom_offer = null;

    public function __construct($import_file, $offer_file) {
        $this->_dom = new DOMDocument();
        $this->_dom_offer = new DOMDocument();
        if (file_exists($import_file) && file_exists($offer_file)) {
            $fp = fopen($import_file, 'r');
            $xml_product = fread($fp, filesize($import_file));
            fclose($fp);

            $fp_mod = fopen($offer_file, 'r');
            $xml_product_mod = fread($fp_mod, filesize($offer_file));
            fclose($fp_mod);

            $this->_dom->loadXML($xml_product);
            $this->_dom_offer->loadXML($xml_product_mod);
        } else {
            throw new Exception('Файла не существует');
        }
    }

    /**
     * Возвращает цены и остатки на складе
     */
    public function getProductsPrice() {
        $products_arr = array();
        foreach ($this->_dom_offer->documentElement->childNodes as $dom) {
            echo ($dom->nodeName);
            if ($dom->nodeType == 1 && ($dom->nodeName) == "ПакетПредложений") {
                foreach ($dom->childNodes as $catalog) {
                    if ($catalog->nodeType == 1 && ($catalog->nodeName) == "Предложения") {
                        foreach ($catalog->childNodes as $products) {
                            if ($products->nodeType == 1 && ($products->nodeName) == "Предложение") {
                                $id = null;
                                $name = null;
                                $warehouse = null;
                                foreach ($products->childNodes as $product) {
                                    if ($product->nodeType == 1 && ($product->nodeName) == "Ид") {
                                        $id = ($product->textContent);
                                    }
                                    if ($product->nodeType == 1 && ($product->nodeName) == "Наименование") {
                                        $name = ($product->textContent);
                                    }
                                    if ($product->nodeType == 1 && ($product->nodeName) == "Количество") {
                                        $warehouse = ($product->textContent);
                                    }
                                    if ($product->nodeType == 1 && ($product->nodeName) == "Цены") {
                                        $prices_arr = array();
                                        foreach ($product->childNodes as $prices) {
                                            if ($prices->nodeType == 1 && ($prices->nodeName) == "Цена") {
                                                foreach ($prices->childNodes as $price) {
                                                    if ($price->nodeType == 1 && ($price->nodeName) == "ЦенаЗаЕдиницу") {
                                                        $get_price = ($price->textContent);
                                                    }
                                                    if ($price->nodeType == 1 && ($price->nodeName) == "Валюта") {
                                                        $get_currency = ($price->textContent);
                                                    }
                                                }
                                                $prices_arr[] = array('price' => $get_price, 'currency' => $get_currency);
                                            }
                                        }
                                    }
                                }
                                $products_arr[$id]['name'] = $name;
                                $products_arr[$id]['price'] = $prices_arr;
                                $products_arr[$id]['warehouse'] = $warehouse;
                            }
                        }
                    }
                }
            }
        }
        return $products_arr;
    }

  
    /**
     * Характеристики
     */
    public function getOptions() {
        
    }

    private $_categoryes = array(); //Хранит массив всех категорий 

    /**
     * Обходит все категории и заполняет массив $_categoryes в виде:
     * $_categoryes [ид родителя][номер позиции][name]
     * @param type $dom
     * @param type $parent_id
     */

    private function _getTreeCategory($dom, $parent_id, Category $category_obj, $real_parent_id) {
        $registry = Registry::getInstance();
        $app = new Application();
        $i = 0;
        foreach ($dom->childNodes as $catalog) {
            if ($catalog->nodeType == 1 && ($catalog->nodeName) == "Группа") {
                foreach ($catalog->childNodes as $category) {
                    if ($category->nodeType == 1 && ($category->nodeName) == "Ид") {
                        $this->_categoryes[$parent_id][$i]['id'] = ($category->textContent);
                    }
                    if ($category->nodeType == 1 && ($category->nodeName) == "Наименование") {
                        $this->_categoryes[$parent_id][$i]['name'] = ($category->textContent);
                    }
                    if ($category->nodeType == 1 && ($category->nodeName) == "Группы" && $this->_categoryes[$parent_id][$i]['id']) {

                        $is_category = $this->getCategory1cId($this->_categoryes[$parent_id][$i]['id']); //Смотрим в базе есть этот раздел
                        if (!isset($is_category->id)) { //Если нет добавляем
                            $new_real_parent_id = $category_obj->addQuick($this->_categoryes[$parent_id][$i]['name'], '', $real_parent_id, $i, 0, $registry->language_id, 0, $registry->shop_id);
                            $this->set1cId($new_real_parent_id, $this->_categoryes[$parent_id][$i]['id']);
                            $category_obj->setPseudoDir($new_real_parent_id, mb_strtolower($app->convertToLatin($this->_categoryes[$parent_id][$i]['name'])));
                        } else { //Если есть
                            if (trim($this->_categoryes[$parent_id][$i]['name']) != stripslashes(trim($is_category->name))) {
                                $category_obj->setName($is_category->id, trim($this->_categoryes[$parent_id][$i]['name']));
                            }
                            $new_real_parent_id = $is_category->id;
                        }
                        $this->_getTreeCategory($category, $this->_categoryes[$parent_id][$i]['id'], $category_obj, $new_real_parent_id);
                        $i++;
                    }
                }
            }
        }
    }

    /**
     * Синхронизирует категории. Добавляет недостающие. Меняет название в уже добавленных
     */
    public function syncCategoryes() {
        Lavra_Loader::LoadClass("Category");
        $category = new Category();

        foreach ($this->_dom->documentElement->childNodes as $dom) {
            if ($dom->nodeType == 1 && ($dom->nodeName) == "Классификатор") {
                foreach ($dom->childNodes as $dom_obj) {
                    if ($dom_obj->nodeType == 1 && ($dom_obj->nodeName) == "Группы") {
                        $this->_getTreeCategory($dom_obj, 0, $category, 0);
                    }
                }
            }
        }
        return $this->_categoryes;
    }

    /**
     * Синхронизирует характеристики и бренды (т.к. в дебильной логике битрикса бренд это тоже характеристика)
     * $brand_char_name - Название характеристики которая считается брендом
     * $exception_char_name_list - Список названий характеристик которые нужно исключить (например Последняя цена, Список3)
     * @return type
     */
    public function syncCharacteristicsAndBrand($brand_char_name, $exception_char_name_list = array()) {
        $char_value_arr = array();
        $i = 0;
        foreach ($this->_dom->documentElement->childNodes as $dom) {
            if ($dom->nodeType == 1 && ($dom->nodeName) == "Классификатор") {
                foreach ($dom->childNodes as $dom_obj) {
                    if ($dom_obj->nodeType == 1 && ($dom_obj->nodeName) == "Свойства") {
                        foreach ($dom_obj->childNodes as $dom_obj_child) {
                            if ($dom_obj_child->nodeType == 1 && ($dom_obj_child->nodeName) == "Свойство") {
                                $char_id = 0; //id характеристики
                                $char_name = ''; //Имя характеристики
                                foreach ($dom_obj_child->childNodes as $dom_obj_child_2) {
                                    if ($dom_obj_child_2->nodeType == 1 && ($dom_obj_child_2->nodeName) == "Ид") {
                                        $char_id = ($dom_obj_child_2->textContent);
                                    }
                                    if ($dom_obj_child_2->nodeType == 1 && ($dom_obj_child_2->nodeName) == "Наименование") {
                                        $char_name = ($dom_obj_child_2->textContent);
                                    }

                                    if ($dom_obj_child_2->nodeType == 1 && ($dom_obj_child_2->nodeName) == "ТипыЗначений" && $char_id > 0 && !empty($char_name)) {
                                        if (!isset($char_value_arr[$char_id])) {
                                            $char_value_arr[$char_id]['name'] = $char_name;
                                            $char_value_arr[$char_id]['values'] = array();
                                            $i = 0;
                                        }
                                        $char_name = ($dom_obj_child_2->textContent);

                                        foreach ($dom_obj_child_2->childNodes as $dom_obj_child_value) {
                                            if ($dom_obj_child_value->nodeType == 1 && ($dom_obj_child_value->nodeName) == "ТипЗначений") {

                                                foreach ($dom_obj_child_value->childNodes as $dom_obj_child_value_2) {
                                                    if ($dom_obj_child_value_2->nodeType == 1 && ($dom_obj_child_value_2->nodeName) == "ВариантыЗначений") {


                                                        foreach ($dom_obj_child_value_2->childNodes as $dom_obj_child_value_3) {
                                                            if ($dom_obj_child_value_3->nodeType == 1 && ($dom_obj_child_value_3->nodeName) == "ВариантЗначения") {

                                                                foreach ($dom_obj_child_value_3->childNodes as $dom_obj_child_value_4) {
                                                                    if ($dom_obj_child_value_4->nodeType == 1 && ($dom_obj_child_value_4->nodeName) == "Ид") {
                                                                        $char_value_arr[$char_id]['values'][$i]['id'] = ($dom_obj_child_value_4->textContent);
                                                                    }
                                                                    if ($dom_obj_child_value_4->nodeType == 1 && ($dom_obj_child_value_4->nodeName) == "Значение") {
                                                                        $char_value_arr[$char_id]['values'][$i]['value'] = ($dom_obj_child_value_4->textContent);
                                                                    }
                                                                }
                                                                $i++;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }


        if (count($char_value_arr)) {
            foreach ($char_value_arr as $char_1c_id => $value) {
                if (isset($value['name'])) {
                    if (trim($value['name']) == $brand_char_name) { //Если бренды
                        /**
                         * Добавление брендов
                         */
                        foreach ($value['values'] as $brands) {
                            if (isset($brands['value'])) {
                                $get_brand = $this->isBrand1C($brands['id']);
                                if (isset($get_brand->id)) {
                                    $this->setBrand1C(trim($brands['value']), trim($brands['id']));
                                } else {
                                    $this->addBrand1C(trim($brands['value']), trim($brands['id']));
                                }
                            }
                        }
                    } else { //Если характеристики
                        if (!in_array(trim($value['name']), $exception_char_name_list)) { //Если характеристика не записана в исключение
                            if (count($value['values'])) {
                                /**
                                 * Добавление характеристики
                                 */
                                $get_char = $this->isCharacteristic1cId(trim($char_1c_id));
                                $char_id = 0;
                                if (!isset($get_char->id)) { //Добавление характеристики
                                    $char_id = $this->addCharacteristics1C(trim($value['name']), trim($char_1c_id));
                                } else { //Редактирование характеристики
                                    $this->setCharacteristics1C(trim($value['name']), trim($char_1c_id));
                                    $char_id = $get_char->id;
                                }
                                /**
                                 * Добавление значений характеристик
                                 */
                                if ($char_id > 0) {
                                    foreach ($value['values'] as $char_value) {
                                        if (isset($char_value['value'])) {
                                            $is_char_value = $this->isCharacteristicValue1cId(trim($char_value['id']));
                                            if (!isset($is_char_value->id)) { //Если значение характеристики существует
                                                $this->addCharacteristicValue1C($char_id, trim($char_value['value']), trim($char_value['id']));
                                            } else { //Если значение характеристики не существует
                                                $this->setCharacteristicValue1C(trim($char_value['value']), trim($char_value['id']));
                                            }
                                        }
                                    }
                                    //$char_value = $characteristic->isCharacteristicValue1cId($id_1c);;
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    /**
     * Синхронизирует категории. Добавляет недостающие. Меняет название в уже добавленных
     */
    public function syncProducts() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Characteristics", "characteristics");

        Lavra_Loader::LoadModels("Mod", "products");
        $mod = new Mod();
        Lavra_Loader::LoadModels("Products", "products");
        $products_obj = new Products();
        Lavra_Loader::LoadModels("Import", "import");
        $import = new Import();

        $characteristic = new Characteristics();
        $all_brands = $this->getBrandAll1C();

        foreach ($this->_dom->documentElement->childNodes as $dom) {
            if ($dom->nodeType == 1 && ($dom->nodeName) == "Каталог") {
                foreach ($dom->childNodes as $catalog) {
                    if ($catalog->nodeType == 1 && ($catalog->nodeName) == "Товары") {
                        foreach ($catalog->childNodes as $products) {
                            if ($products->nodeType == 1 && ($products->nodeName) == "Товар") {

                                $id = $article = $name = $desc = $file = null;
                                $category_1_id = $category_2_id = $category_3_id = 0;
                                $brand_id = 0;
                                $get_char = $get_char_value = array();
                                foreach ($products->childNodes as $product) {
                                    if ($product->nodeType == 1 && ($product->nodeName) == "Ид") {
                                        $id = ($product->textContent);
                                    }
                                    if ($product->nodeType == 1 && ($product->nodeName) == "Артикул") {
                                        $article = ($product->textContent);
                                    }
                                    if ($product->nodeType == 1 && ($product->nodeName) == "Наименование") {
                                        $name = ($product->textContent);
                                    }
                                    if ($product->nodeType == 1 && ($product->nodeName) == "Описание") {
                                        $desc = ($product->textContent);
                                    }
                                    if ($product->nodeType == 1 && ($product->nodeName) == "Картинка") {
                                        $file = ($product->textContent);
                                    }
                                    if ($product->nodeType == 1 && ($product->nodeName) == "Группы") {
                                        foreach ($product->childNodes as $groups) {
                                            if ($groups->nodeType == 1 && ($groups->nodeName) == "Ид") {
                                                if ($category_1_id == 0) {
                                                    $get_category = $this->getCategory1cId(trim(($groups->textContent)));
                                                    if (isset($get_category->id)) {
                                                        $category_1_id = $get_category->id;
                                                    }
                                                } elseif ($category_2_id == 0) {
                                                    $get_category = $this->getCategory1cId(trim(($groups->textContent)));
                                                    if (isset($get_category->id)) {
                                                        $category_2_id = $get_category->id;
                                                    }
                                                } elseif ($category_3_id == 0) {
                                                    $get_category = $this->getCategory1cId(trim(($groups->textContent)));
                                                    if (isset($get_category->id)) {
                                                        $category_3_id = $get_category->id;
                                                    }
                                                }
                                            }
                                        }
                                    }

                                    if ($product->nodeType == 1 && ($product->nodeName) == "ЗначенияСвойств") {
                                        $i = 0;
                                        foreach ($product->childNodes as $options) {
                                            if ($options->nodeType == 1 && ($options->nodeName) == "ЗначенияСвойства") {

                                                foreach ($options->childNodes as $option) {
                                                    if ($option->nodeType == 1 && ($option->nodeName) == "Ид") {
                                                        $get_char[$i] = $this->getChar1cId(trim(($option->textContent)));
                                                    }
                                                    if ($option->nodeType == 1 && ($option->nodeName) == "ИдЗначения") {
                                                        $get_char_value[$i] = $this->getCharValue1cId(trim(($option->textContent)));

                                                        if (isset($all_brands[trim(($option->textContent))])) {
                                                            $get_brand = $this->isBrand1C(trim(($option->textContent)));

                                                            if (isset($get_brand->id)) {
                                                                $brand_id = $get_brand->id;
                                                                $get_char_value[$i] = 0;
                                                                $get_char[$i] = 0;
                                                            }
                                                        }
                                                    }
                                                }
                                                $i++;
                                            }
                                        }
                                    }
                                }
                                $is_product = $this->isProducts1cId($id);
                                if (!isset($is_product->id)) { //Если товара не существует, то добавляем
                                    $pseudo_dir = $import->_auto_pseudo_dir(Application::replaceExcelSymbol($name . '-' . $article), 0); //Если псевдопапка не заполненна, например, при импорте товаров

                                    $product_id = $products_obj->add($name, $article, '', '', 0, 0, 0, 0, 0, 0, '', '', $desc, '', '', '', $category_1_id, $category_2_id, $category_3_id, 0, 0, $pseudo_dir, $brand_id, 100, 0, 1, $registry->language_id, $registry->shop_id, '', '', '', '', '', '', '', '');
                                    try {
                                        $import->imageImport($product_id, mb_substr($file, mb_strrpos($file, '/') + 1), $registry->base_dir . 'files/bitrix/' . trim(mb_substr($file, 0, mb_strrpos($file, '/')), '/') . '/');
                                    } catch (Exception $e) {
                                        
                                    }
                                    $mod->addMod($product_id, 0, $name, $article, 0, 0, 0, 0, 0, 0, 0, 0, 100, 1, 0, 0, 0);

                                    $this->setProducts1C($product_id, $id);
                                    foreach ($get_char_value as $key => $value) {
                                        if (isset($get_char_value[$key]->id) && isset($value->id)) {
                                            $characteristic->addValueProduct($product_id, $get_char[$key]->id, $value->id);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function getProducts() {
        $products_arr = array();
        foreach ($this->_dom->documentElement->childNodes as $dom) {
            if ($dom->nodeType == 1 && ($dom->nodeName) == "Каталог") {
                foreach ($dom->childNodes as $catalog) {
                    if ($catalog->nodeType == 1 && ($catalog->nodeName) == "Товары") {
                        foreach ($catalog->childNodes as $products) {
                            if ($products->nodeType == 1 && ($products->nodeName) == "Товар") {
                                $id = null;
                                $article = null;
                                $name = null;

                                foreach ($products->childNodes as $product) {
                                    if ($product->nodeType == 1 && ($product->nodeName) == "Ид") {
                                        $id = ($product->textContent);
                                    }
                                    if ($product->nodeType == 1 && ($product->nodeName) == "Артикул") {
                                        $article = ($product->textContent);
                                    }
                                    if ($product->nodeType == 1 && ($product->nodeName) == "Наименование") {
                                        $name = ($product->textContent);
                                    }
                                }

                                $products_arr[$id]['article'] = $article;
                                $products_arr[$id]['name'] = $name;
                            }
                        }
                    }
                }
            }
        }
        return $products_arr;
    }

    
    /**
     * Возвращает хакрактеристику по id 1c
     */
    public function getChar1cId($id_1c) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM characteristic WHERE 1c_id=:1c_id");
        $query->bindParam(":1c_id", $id_1c, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Возвращает хакрактеристику по id 1c
     */
    public function getCharValue1cId($id_1c) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM characteristic_value WHERE 1c_id=:1c_id");
        $query->bindParam(":1c_id", $id_1c, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
    
    public function isProducts1cId($id_1c) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM products WHERE 1c_id=:1c_id");
        $query->bindParam(":1c_id", $id_1c, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function addCharacteristics1C($name, $id_1c) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO characteristic (`name`, `1c_id`) VALUES (:name, :1c_id)");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":1c_id", $id_1c, PDO::PARAM_STR, 255);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function isCharacteristic1cId($id_1c) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM characteristic WHERE 1c_id=:1c_id");
        $query->bindParam(":1c_id", $id_1c, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function setCharacteristics1C($name, $id_1c) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE characteristic SET name=:name WHERE 1c_id=:1c_id");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":1c_id", $id_1c, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function addCharacteristicValue1C($characteristic_id, $name, $id_1c) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO characteristic_value (`name`, `1c_id`, characteristic_id) VALUES (:name, :1c_id, :characteristic_id)");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":1c_id", $id_1c, PDO::PARAM_STR, 255);
        $query->bindParam(":characteristic_id", $characteristic_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function isCharacteristicValue1cId($id_1c) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM characteristic_value WHERE 1c_id=:1c_id");
        $query->bindParam(":1c_id", $id_1c, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function setCharacteristicValue1C($name, $id_1c) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE characteristic_value SET name=:name WHERE 1c_id=:1c_id");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":1c_id", $id_1c, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function getBrandAll1C() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT *, 1c_id as id_1c FROM brands WHERE 1c_id != ''");
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();
        foreach ($return as $key => $value) {
            $result[$value->id_1c] = $value;
        }
        return $result;
    }

    public function isBrand1C($id_1c) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM brands WHERE 1c_id=:1c_id ");
        $query->bindParam(":1c_id", $id_1c, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function addBrand1C($name, $id_1c) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO brands (`name`, `created`, 1c_id) VALUES (:name,  NOW(), :1c_id)");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":1c_id", $id_1c, PDO::PARAM_STR, 255);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function setProducts1C($id, $id_1c) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE products SET `1c_id`=:1c_id WHERE id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->bindParam(":1c_id", $id_1c, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function setBrand1C($name, $id_1c) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE brands SET `name`=:name WHERE 1c_id=:1c_id");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":1c_id", $id_1c, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function set1cId($category_id, $id_1c) {
        $registry = Registry::getInstance();

        $query = $registry->db->prepare("UPDATE `category`  SET `1c_id` = :1c_id WHERE `id` = :category_id && `category`.`is_delete` = 0 LIMIT 1");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":1c_id", $id_1c, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function getCategory1cId($id_ic) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM category WHERE 1c_id=:1c_id && is_delete = 0");
        $query->bindParam(":1c_id", $id_ic, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

}
