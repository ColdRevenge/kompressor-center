<?php

Lavra_Loader::LoadClass('Application');

error_reporting(E_ALL);

class Import {

    private function _cleanCache() {
        //Очищаем кеш маршрутов и категорий
        $cac = Cache::getInstance();
        $cac->deleteTag('Category');
        $cac->deleteTag('Routes');
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');
        $cac->flush();
    }

    public function fullImport($file) {
        $registry = Registry::getInstance();
//        setlocale(LC_ALL, 'ru_RU.CP1251');
        setlocale(LC_ALL, 'nl_NL');
        Lavra_Loader::LoadClass("Category");
        Lavra_Loader::LoadModels("Products", "products");
        Lavra_Loader::LoadModels("Mod", "products");
        $this->_cleanCache();
        Lavra_Loader::LoadClass('ApplicationDB');
        $app = new ApplicationDB();
        $mod = new Mod();
        $category = new Category();
        $products = new Products();
        $handle = fopen($file, "r");



        $parent_category_id = 0;
        $i = 0;
        $order = array();
        $o = 0;
//        $query = $registry->db->prepare("DELETE FROM category WHERE `type` = 0 && parent_id != 0");
//        $query->execute();
        $query = $registry->db->prepare("TRUNCATE TABLE  `routes`");
        $query->execute();
        //routes
        $category_id = 0;
        $root_category_id = 0;
        $root_tmp_name = null;  //Для вывода ошибки если главная категория не была найдена
        $last_order_0 = 0;
        while (($line = fgetcsv($handle, 0, ";")) !== FALSE) {
            $level = mb_substr_count($line[0], '.');
            $name = Application::replaceExcelSymbol($line[2]);

            if (empty($line[0]) && empty($line[1]) && empty($line[2]) && !empty($line[3])) { //Поиск главной категории, для которой загружается прайс
                $root_tmp_name = Application::replaceExcelSymbol($line[3]);
//                print_r($line);
//echo $root_tmp_name . '/' . $line[3];
//exit();
                $get_category = $category->getCategoryName($root_tmp_name, 0);
                if (isset($get_category->id)) { //Если рутовая категория найдена, то тогда можно продолжить остальные условия
                    $root_category_id = $get_category->id;

                    $category_arr_id = $app->getChildsCategory(0, $root_category_id);
//                        print_r($category_arr_id);
                    foreach ($category_arr_id as $value) {
//                        $category->setVisible($value, 0);
                        $this->clearCategory1($value); //Удаляем текущую структуру, и переносим товары в товары без категории
                        //Для товаров можно по аналогии использовать функцию setProductActiveCategory
                    }
                    /**
                     * Скрываем все разделы меню, чтобы потом показать те, которые остались 
                     */
//                        exit();
                }
            } elseif ($root_category_id > 0 && !empty($line[0]) && empty($line[1]) && !empty($line[2]) && empty($line[3])) { //Если категория
                //   $o = 0;
                if ($level == 0) { //Для первого уровня 
                    unset($parent_category_id);
                    $parent_category_id[0] = $root_category_id;
                    $parent_category_id[1] = $root_category_id;
                    $i = 0;
                    //Сортировка категорий
                    if (isset($order[0])) {
                        $last_order_0 = ($order[0]);
                    } else {
                        $order[0] = 0;
                    }
                    unset($order);
                    $order[0] = $last_order_0;
                }
                if (!isset($order[$level])) {
                    $order[$level] = 0;
                }
                $order[$level] ++;

                if (!$category->isCategoryName($name, $parent_category_id[$level])) { //Если категория существует
//                    echo "#$name, $parent_category_id[$level]<br/>--<br/>";
                    $category_id = $parent_category_id[$level + 1] = $category->add($name, null, $this->_getPseudoDirCategory($name, null), null, null, null, null, null, null, null, null, null, null, null, $parent_category_id[$level], $order[$level], 0, 1);
//                    echo "$level - $name [" . $line[0] . "][" . (int) $line[0] . "]<br/>";
                } else {
//                    echo "@$name, $parent_category_id[$level]<br/>--<br/>";
                    $get_category = $category->getCategoryName($name, $parent_category_id[$level]);
                    $category_id = $parent_category_id[$level + 1] = $get_category->id;
                    $category->edit($get_category->id, $name, $get_category->link, $get_category->pseudo_dir, $get_category->desc, $get_category->param_str_1, $get_category->param_str_2, $get_category->param_str_3, $get_category->param_str_4, $get_category->param_str_5, $get_category->h1, $get_category->meta_key, $get_category->meta_desc, $get_category->title, $get_category->icon, $get_category->parent_id, $order[$level], $get_category->is_param_1, 1, $get_category->type);
                }
            } elseif ($root_category_id > 0) { //Товар
                $brand_id = 0;
                $article = Application::replaceExcelSymbol($line[1], '');
                $pseudo_dir = $this->_auto_pseudo_dir(Application::replaceExcelSymbol($line[2] . '-' . $article), 0); //Если псевдопапка не заполненна, например, при импорте товаров

                $get_product = $products->getProductArticle($article);
                $warehouse = 100;
                if (!empty($article)) {
                    if (isset($get_product->id)) {
                        $products->setName($get_product->id, Application::replaceExcelSymbol($line[2]));
                        $products->setCategory1($get_product->id, $category_id);
                        $products->setDesc4($get_product->id, Application::replaceExcelSymbol($line[3]));
                        $products->setOrder($get_product->id, $o);
                        $mod->setModShortPrice($article, $this->_checkPrice($line[5]), $this->_checkPrice($line[6]), $this->_checkPrice($line[7]), $warehouse);
                    } else {
//                        if ($o < 100) {
                        $product_id = $products->add(Application::replaceExcelSymbol($line[2]), '', '', '', '', '', '', '', $category_id, 0, 0, 0, 0, $pseudo_dir, $brand_id, 0, 1, null, null, null, Application::replaceExcelSymbol($line[3]));
                        $mod->addMod($product_id, 0, '', $article, 0, $this->_checkPrice($line[5]), $this->_checkPrice($line[6]), $this->_checkPrice($line[7]), 0, 0, 0, 0, 0, 0, 0, 0, 0, $warehouse, 1);

                        $products->setOrder($product_id, $o);
                        if ($product_id) {
                            $this->imageImport($product_id, str_replace(' ', null, trim($article)) . '.jpg', $registry->image_dir . 'B/');
                        }
//                        }
                    }
                }
                $o++;
            }
        }

        fclose($handle);
        if ($root_category_id == 0) { //Если главная категория не была найдена
            throw new Exception('Главная категория прайс листа <b>"' . $root_tmp_name . '"</b> не найдена. Переименуйте на сайте название главной категории так, чтобы оно совподало с названием в прайс листе! ');
        }
        $query2 = $registry->db->prepare("TRUNCATE TABLE  `routes`");
        $query2->execute();
        $this->_cleanCache();
    }

    private function _getPseudoDirCategory($name, $prefix = null) {
        Lavra_Loader::LoadClass("Application");

        $app = new Application();
        return str_replace('--', '-', str_replace('--', '-', mb_strtolower(Application::getPseudoDir($app->convertToLatin(trim((trim($name)))))))) . $prefix;
    }

    private function _checkPrice($price) {
        return str_replace("$", null, str_replace(" ", null, str_replace(",", ".", trim(str_replace(" ", null, str_replace(" ", null, $price))))));
    }

    public function updateSetting(Array $setting, $category_id) {
        $registry = Registry::getInstance();
        $query1 = $registry->db->prepare("DELETE FROM setting_import WHERE category_id=:category_id");
        $query1->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query1->execute();

        foreach ($setting as $key => $value) {
            $query = $registry->db->prepare("INSERT INTO setting_import (`field`, `num`, category_id) VALUES (:field, :num, :category_id)");
            $query->bindParam(":field", $value, PDO::PARAM_STR, 255);
            $query->bindParam(":num", $key, PDO::PARAM_INT, 11);
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->execute();
        }
    }

    /**
     * Используется при импорте структуры
     * @param type $category_1_id
     */
    public function clearCategory1($category_1_id) {
        $registry = Registry::getInstance();

        $query1 = $registry->db->prepare("DELETE FROM `category` WHERE is_delete=0 && `id`=:category_1_id");
        $query1->bindParam(":category_1_id", $category_1_id, PDO::PARAM_INT, 11);
        $query1->execute();

        $query = $registry->db->prepare("UPDATE `products` SET `category_1_id`=0 WHERE is_delete=0 && `category_1_id`=:category_1_id");
        $query->bindParam(":category_1_id", $category_1_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function addImportFile($file, $category_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO imports (file, category_id) VALUES (:file, :category_id)");
        $query->bindParam(":file", $file, PDO::PARAM_STR, 255);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function getFilesId($file_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM imports WHERE id=:file_id");
        $query->bindParam(":file_id", $file_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function delFileId($file_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM imports WHERE id=:file_id");
        $query->bindParam(":file_id", $file_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function getFiles($category_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM imports WHERE category_id=:category_id || category_id=0");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSetting($category_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM setting_import WHERE category_id=:category_id ");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);

        $result = array();
        foreach ($return as $key => $value) {
            $result[$value->num] = $value->field;
        }
        return $result;
    }

    /**
     * Обновляет / Записывает продукты 
     */
    public function setProducts(Array $fields_arr, Array $csv_arr, $category_id, $is_update_images = 0) {
        $this->_cleanCache();
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels('Products', 'products');
        Lavra_Loader::LoadModels('Mod', 'products');
        Lavra_Loader::LoadModels("Brand", "brand");
        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $characteristic = new Characteristics();
        $brand = new Brand();
        $products = new Products();
        $mods = new Mod();
        $products_all = $this->_getProductsForImport();

        $curs_dollar = 1;
        $curs_euro = 1;
        $curs = 1;
        try {
            if (isset($_POST['curs_dollar'])) {
                $curs_dollar = $_POST['curs_dollar'];
                $setting = new Setting();
                $setting->setParam1($_POST['curs_dollar']);
            }
            if (isset($_POST['curs_euro'])) {
                $curs_euro = $_POST['curs_euro'];
                $setting->setParam2($_POST['curs_euro']);
            }


            foreach ($fields_arr as $key => $value) { //Проходим по всем столбцам, очищаем пропущенные
                if (empty($value)) {
                    unset($fields_arr[$key]);
                }
            }


            foreach ($csv_arr as $key => $value) {
                $set_fielnd = array(
                    'name' => null,
                    'article' => null,
                    'mod_name' => '',
                    'code' => 0,
                    'old_price' => 0,
                    'price' => 0,
                    'price_1' => 0,
                    'price_2' => 0,
                    'price_3' => 0,
                    'price_4' => 0,
                    'valuta' => 0,
                    'cost_price' => 0,
                    'price_5' => 0,
                    'price_6' => 0,
                    'price_7' => 0,
                    'price_8' => 0,
                    'price_9' => 0,
                    'price_10' => 0,
                    'image_1' => null,
                    'image_2' => null,
                    'image_3' => null,
                    'image_4' => null,
                    'image_5' => null,
                    'unit' => null,
                    'short_desc' => null,
                    'desc' => null,
                    'desc_1' => null,
                    'title' => null,
                    'meta_keyword' => null,
                    'meta_desc' => null,
                    'category_1_id' => $category_id,
                    'category_2_id' => 0,
                    'category_3_id' => 0,
                    'category_4_id' => 0,
                    'category_5_id' => 0,
                    'pseudo_dir' => null,
                    'brand_id' => 0,
                    'warehouse' => $registry->default_warehouse,
                    'marker' => 0,
                    'is_active' => 1
                );
                $chars_arr = array(); //Характеристики
//                print_r($set_fielnd);
                $article = null;
                $brand_id = 0;
                foreach ($fields_arr as $key_2 => $value_2) {
                    if (is_numeric($value_2)) { //Если характеристика
                    } elseif ($value_2 == 'brand') { //Если бренд
                        $is_brand = $brand->getBrandName($value[$key_2]);
                        if (!isset($is_brand->id)) { //Если бренд не существует, то добавляем его
                            $brand_id = $brand->add(trim($value[$key_2]), '', '', null, 0, 0, 1);
                        } else { //Если существует получаем его id
                            $brand_id = $is_brand->id;
                        }
                    } elseif ($value_2 == 'category_name') { //Если бренд
                        $category_obj = $category->getCategoryName(trim($value[$key_2]), 781);
                        if (isset($category_obj->id)) {
                            $set_fielnd['category_1_id'] = $category_id = $category_obj->id;
                        }
                    } else { //Если обычное поле
                        $set_fielnd[$value_2] = $value[$key_2];
                        if ($value_2 == 'article' && !empty($value[$key_2])) { //Если поле артикл заполненно и не пустое
                            $article = Application::replaceExcelSymbol($value[$key_2], '');
                        }
                    }
                }
                if ($article) {
                    if (trim($set_fielnd['warehouse']) == 'много') {
                        $set_fielnd['warehouse'] = 250000;
                    }
                    if ((int) trim($set_fielnd['valuta']) == 2) { //Если доллар
                        $curs = $curs_dollar;
                    } elseif ((int) trim($set_fielnd['valuta']) == 3) { //Если евро
                        $curs = $curs_euro;
                    } else {
                        $curs = 1;
                    }
                    if (isset($products_all[$article])) {
                        $product_id = $products_all[$article];
                        if ($brand_id > 0) {
//                            $products->setBrandId($product_id, $brand_id);
                        }
//                         if ($article == 10033) {
//                        print_r($set_fielnd);
//                         }
                        //  $products->edit($products_all[$article], trim($set_fielnd['name'],"' "), $set_fielnd['article'], $set_fielnd['code'], $set_fielnd['old_price'], $set_fielnd['price'], 0, 0, 0 ,0 ,0, null, $set_fielnd['short_desc'], $set_fielnd['desc'], $set_fielnd['title'], $set_fielnd['meta_keyword'], $set_fielnd['meta_desc'], $set_fielnd['category_1_id'], $set_fielnd['category_2_id'], $set_fielnd['category_3_id'], $set_fielnd['category_4_id'], $set_fielnd['category_5_id'], $set_fielnd['pseudo_dir'], $set_fielnd['brand_id'], $set_fielnd['warehouse'], $set_fielnd['marker'], $set_fielnd['is_active']);
//                        if ($set_fielnd['price'] !== 0) {
//                            $mods->setModPrice(Application::replaceExcelSymbol($set_fielnd['article'], ''), $set_fielnd['price'], $set_fielnd['price_1'], $set_fielnd['price_2'], $set_fielnd['price_3'], $set_fielnd['price_4'], $set_fielnd['price_5'], $set_fielnd['price_6'], $set_fielnd['price_7'], $set_fielnd['price_8'], $set_fielnd['price_9'], $set_fielnd['price_10'], $set_fielnd['old_price'], $set_fielnd['warehouse'], $curs);
//                        } elseif ($set_fielnd['warehouse'] !== 250000) {
//                            $mods->setModWarehouse(Application::replaceExcelSymbol($set_fielnd['article'], ''), $set_fielnd['warehouse']);
//                        }
//                        $products->setDesc1($product_id, $set_fielnd['desc_1']);
                    } else {
                        $pseudo_dir = $this->_auto_pseudo_dir($this->_stripWhitespaces(trim($set_fielnd['name'], "' ")), 0); //Если псевдопапка не заполненна, например, при импорте товаров
//                        $product_id = $products->add(trim($set_fielnd['name'], "' "), $set_fielnd['article'], $set_fielnd['code'], $set_fielnd['old_price'], $set_fielnd['price'], 0, 0, 0, 0, 0, $set_fielnd['unit'], $set_fielnd['short_desc'], $set_fielnd['desc'], $set_fielnd['title'], $set_fielnd['meta_keyword'], $set_fielnd['meta_desc'], $set_fielnd['category_1_id'], $set_fielnd['category_2_id'], $set_fielnd['category_3_id'], $set_fielnd['category_4_id'], $set_fielnd['category_5_id'], $pseudo_dir, $brand_id, $set_fielnd['warehouse'], $set_fielnd['marker'], $set_fielnd['is_active']);
                        $product_id = $products->add(trim($set_fielnd['name'], "' "), $set_fielnd['code'], $set_fielnd['unit'], $set_fielnd['short_desc'], $set_fielnd['desc'], $set_fielnd['title'], $set_fielnd['meta_keyword'], $set_fielnd['meta_desc'], $set_fielnd['category_1_id'], $set_fielnd['category_2_id'], $set_fielnd['category_3_id'], $set_fielnd['category_4_id'], $set_fielnd['category_5_id'], $pseudo_dir, $brand_id, $set_fielnd['marker'], $set_fielnd['is_active'], null, null, null, null, null, null, null, null);
                        $products->setShopType($product_id, $registry->shop_type);

                        $mods->addMod($product_id, 1, ($set_fielnd['mod_name']), Application::replaceExcelSymbol($set_fielnd['article'], ''), $set_fielnd['cost_price'], $set_fielnd['price'], $set_fielnd['price_1'], $set_fielnd['price_2'], $set_fielnd['price_3'], $set_fielnd['price_4'], $set_fielnd['price_5'], $set_fielnd['price_6'], $set_fielnd['price_7'], $set_fielnd['price_8'], $set_fielnd['price_9'], $set_fielnd['price_10'], $set_fielnd['old_price'], $set_fielnd['warehouse'], $_POST['currency_id'], null, null, null, null, null, null, null, null, null, null);

                        $products->setDesc1($product_id, $set_fielnd['desc_1']);
                        //

                        $query = $registry->db->prepare("UPDATE products SET pseudo_dir=(SELECT article FROM product_mod WHERE product_id = products.id LIMIT 1) WHERE pseudo_dir=''");
                        $query->execute();


                        /* Добавление характеристик к товарам 
                          ТОЛЬКО ПРИ ДОБАВЛЕНИИ ТОВАРА!!!
                         */
//                    $characteristic->delValueAllProduct($product_id);
                        /**
                         * ТОЛЬКО ДЛЯ БОЛЬШИХ РАЗМЕРОВ - РАЗМЕРЫ ПАРСИМ
                         */
                        foreach ($fields_arr as $key_2 => $characteristic_id) {
                            $value[$key_2] = $this->_stripWhitespaces(trim($value[$key_2]));
                            if (is_numeric($characteristic_id) && !empty($value[$key_2])) { //Если характеристика
                                if ($characteristic_id == 51) { //
                                    $chars_values = explode('#', $value[$key_2]);

                                    foreach ($chars_values as $value_size) {
                                        $get_char_value = $characteristic->getValueName(trim($value_size), $characteristic_id);
                                        if (!empty($value_size)) {
                                            if (isset($get_char_value->id)) { //Если значение характеристики существует
                                                if (!$characteristic->isValueProduct($product_id, $get_char_value->id)) { //Если характеристика не привязана к товару
                                                    $characteristic->addValueProduct($product_id, $characteristic_id, $get_char_value->id);
                                                }
                                            } else { //Если значение характеристики не существует, добавляем
                                                $value_id = $characteristic->addValue($characteristic_id, trim($value_size), '', '', 0, 0, 0, 0, 0, '', '', '');
                                                $characteristic->addValueProduct($product_id, $characteristic_id, $value_id);
                                            }
                                        }
                                    }
                                } else {
//                            if ($characteristic_id == 13 || $characteristic_id == 14 || $characteristic_id == 15 || $characteristic_id == 19) {
//                                $characteristic_id = 34;
//                            }
//                            if ($characteristic_id == 16 || $characteristic_id == 17 || $characteristic_id == 18 || $characteristic_id == 20) {
//                                $characteristic_id = 33;
//                            }
//
//                            if ($characteristic_id == 37 || $characteristic_id == 38) {
//                                $characteristic_id = 36;
//                            }
                                    $get_char_value = $characteristic->getValueName(trim($value[$key_2]), $characteristic_id);
                                    if (!empty($value[$key_2])) {
                                        if (isset($get_char_value->id)) { //Если значение характеристики существует
                                            if (!$characteristic->isValueProduct($product_id, $get_char_value->id)) { //Если характеристика не привязана к товару
                                                $characteristic->addValueProduct($product_id, $characteristic_id, $get_char_value->id);
                                            }
                                        } else { //Если значение характеристики не существует, добавляем
                                            $value_id = $characteristic->addValue($characteristic_id, trim($value[$key_2]), '', '', 0, 0, 0, 0, 0, '', '', '');
                                            $characteristic->addValueProduct($product_id, $characteristic_id, $value_id);
                                        }
                                    }
                                }
                            }
                        }
                    }
                    //!!ТОЛЬКО ПРИ ДОБАВЛЕНИИ ТОВАРА ЗАЛИВАЮТСЯ ФОТКИ
//                    if ($is_update_images == 1) { //Если требуется загрузка изображений
                    if ($product_id && !empty($set_fielnd['image_1'])) {
                        $this->imageImport($product_id, $set_fielnd['image_1'], $set_fielnd['image_2'], $set_fielnd['image_3'], $set_fielnd['image_4'], $set_fielnd['image_5']);
                    }
//                    }
                }
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
        $this->_cleanCache();
    }

    private function _stripWhitespaces($string) {
        return ($string);
    }

    public function _auto_pseudo_dir($name, $edit_id) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Products", "products");
        $products = new Products();

        if (isset($name)) {
            for ($i = 1; $i <= 100; $i++) {
                if ($i > 1) {
                    $prefix = "-$i";
                } else
                    $prefix = null;

                $pseudo_dir = $this->_getPseudoDir($name, $prefix);
                if (!empty($pseudo_dir)) {
                    if (!$products->isPseudoDir($pseudo_dir, 0, $edit_id)) {
                        return $pseudo_dir;
                        break;
                    } else
                        continue; //Если псевда папка уже есть, то след. итерация
                }
            }
        }
    }

    private function _getPseudoDir($name, $prefix = null) {
        Lavra_Loader::LoadClass("Application");

        $app = new Application();
        return str_replace('--', '-', str_replace('--', '-', mb_strtolower(Application::getPseudoDir($app->convertToLatin(trim(($name))))))) . $prefix;
    }

    /**
     * Возвращает все продукты (в т.ч. и удаленные), в ключе массива артикул, в значении 1-ка
     * Нужен для проверки существует товар или нет
     * @return type 
     */
    private function _getProductsForImport() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT product_id , article FROM product_mod WHERE is_delete=0");
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();
        foreach ($return as $value) {
            if (!empty($value->article)) {
                $result[$value->article] = $value->product_id;
            }
        }
        return $result;
    }

    /**
     * Обновление картинок каталога
     */
    public function initImport() {
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

            $registry->prefix = mktime() . '_';
            $registry->max_size = 17000;
            $registry->dinst_dir = $registry->gallery_dir;
            $registry->dinst_url = $registry->gallery_url;
        }
    }

    public function imageImport($product_id, $file_link_1, $file_link_2, $file_link_3, $file_link_4, $file_link_5) {
        $this->initImport();

        Lavra_Loader::LoadClass("Images");
//        if (@fopen($file_link_1, "r")) { //Проверяем картинку на существование
        $img = new Images();
        $get_type_1 = (!empty($file_link_1) && @fopen($file_link_1, "r")) ? $img->getType($file_link_1) : '';
        $get_type_2 = (!empty($file_link_2) && @fopen($file_link_2, "r")) ? $img->getType($file_link_2) : '';
        $get_type_3 = (!empty($file_link_3) && @fopen($file_link_3, "r")) ? $img->getType($file_link_3) : '';
        $get_type_4 = (!empty($file_link_4) && @fopen($file_link_4, "r")) ? $img->getType($file_link_4) : '';
        $get_type_5 = (!empty($file_link_5) && @fopen($file_link_5, "r")) ? $img->getType($file_link_5) : '';

        $file_name_1 = (!empty($get_type_1)) ? $product_id . '_1_' . time() . '.' . $get_type_1['type'] : '';
        $file_name_2 = (!empty($get_type_2)) ? $product_id . '_2_' . time() . '.' . $get_type_2['type'] : '';
        $file_name_3 = (!empty($get_type_3)) ? $product_id . '_3_' . time() . '.' . $get_type_3['type'] : '';
        $file_name_4 = (!empty($get_type_4)) ? $product_id . '_4_' . time() . '.' . $get_type_4['type'] : '';
        $file_name_5 = (!empty($get_type_5)) ? $product_id . '_5_' . time() . '.' . $get_type_5['type'] : '';

        $registry = Registry::getInstance();
        $source_img_dir = $registry->base_dir . 'images/source/';

        Lavra_Loader::LoadModels("ImagesUploader", "uploader_products");
        $file = new ImagesUploader();
        $file->delImagesGroup($product_id, $product_id, $registry->gallery_dir);

        if (!empty($file_name_1)) {
            try {
                $fp = fopen($registry->base_dir . 'images/source/' . $file_name_1, 'w');
                fwrite($fp, file_get_contents($file_link_1));
                fclose($fp);
                $this->_uploadAction($file_name_1, $product_id, $source_img_dir, 0);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        if (!empty($file_name_2)) {
            try {
                $fp = fopen($registry->base_dir . 'images/source/' . $file_name_2, 'w');
                fwrite($fp, file_get_contents($file_link_2));
                fclose($fp);
                $this->_uploadAction($file_name_2, $product_id, $source_img_dir, 1);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        if (!empty($file_name_3)) {
            try {
                $fp = fopen($registry->base_dir . 'images/source/' . $file_name_3, 'w');
                fwrite($fp, file_get_contents($file_link_3));
                fclose($fp);
                $this->_uploadAction($file_name_3, $product_id, $source_img_dir, 2);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        if (!empty($file_name_4)) {
            try {
                $fp = fopen($registry->base_dir . 'images/source/' . $file_name_4, 'w');
                fwrite($fp, file_get_contents($file_link_4));
                fclose($fp);
                $this->_uploadAction($file_name_4, $product_id, $source_img_dir, 3);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        if (!empty($file_name_5)) {
            try {
                $fp = fopen($registry->base_dir . 'images/source/' . $file_name_5, 'w');
                fwrite($fp, file_get_contents($file_name_5));
                fclose($fp);
                $this->_uploadAction($file_name_5, $product_id, $source_img_dir, 4);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
//        }
    }

    /**
     * Функция создает превьюшки
     * @param type $uploader 
     * @param type $type
     * @param type $product_id
     */
    private function _uploadPreview($source_file_name, $product_id, $group_id) {
        $type = 333777;
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Files");
        $file = new Files();
        $max_order = $file->getMaxOrder($type, $product_id);

//        $file_id = $file->add($uploader->getUploadName(), filesize($registry->gallery_dir . $uploader->getUploadName()), $uploader->getName(), null, $is_image, $resize_type, $type, $upload_dir_type, $width, $height, $category_id, $product_id, 0, $max_order);
        //Если картинка, то создаем превьюшку и нарезаем
        $output_file = time() - rand(100, 10000000) . '_prev.jpg';
        $output_dir = $registry->preview_dir . $output_file;
        $this->_setResize($registry->gallery_dir . $source_file_name, $output_dir, 100, 100, 0.1, 0.1);
        $file->add($output_file, filesize($output_dir), $output_file, null, 1, 100, $type, 0, 100, 100, 0, $product_id, $group_id, $max_order);
    }

    private function _setResize($source_file, $output_file, $width, $height, $scallign, $is_convas, $water_file = null, $pos_top = 0, $pos_bottom = 0, $pos_left = 0, $pos_right = 0) {
        $registry = Registry::getInstance();
        $images = new Images();
        $resourse = $images->open($source_file);
        $images->setIsConvas($is_convas);
        $images->setScaling($width, $height, ($width + ($width * $scallign)), ($height + ($height * $scallign)));
        $images->save($images->ReSize($resourse, $width, $height), $output_file, 100);
        return $output_file;
    }

    private function _uploadAction($file_name, $product_id, $source_img_dir, $order = 0) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Images");
        Lavra_Loader::LoadModels("ImagesUploader", "uploader_products");
        $file = new ImagesUploader();
        $images = new Images();

//        $file->delImagesGroup($product_id, $product_id, $registry->gallery_dir);
        $group_id = time() - rand(0, 1040000);
        foreach ($registry->resizes as $value) {
            $resize_file_name = $this->_ReSize($value, $images, $file_name, $value['type'], $source_img_dir);
            if ($resize_file_name) {
                $size = getimagesize($registry->gallery_dir . $resize_file_name);
                $file_size = filesize($registry->gallery_dir . $resize_file_name) / 1024;

                $file->add($resize_file_name, null, null, $file_size, $size[0], $size[1], $value['type'], $product_id, $group_id, $order, 333777);
            }
        }
        $this->_uploadPreview($resize_file_name, $product_id, $group_id);
    }

    private function _ReSize($img_arr, Images $images, $file_name, $type, $source_img_dir) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("ImagesUploader", "uploader_products");
        $file = new ImagesUploader();

        if (!isset($img_arr['prefix']))
            $img_arr['prefix'] = null;
        if (!isset($img_arr['width']))
            $img_arr['width'] = 0;
        if (!isset($img_arr['height']))
            $img_arr['height'] = 0;
        if (!isset($img_arr['scaling_width']))
            $img_arr['scaling_width'] = 0;
        if (!isset($img_arr['scaling_height']))
            $img_arr['scaling_height'] = 0;

        if (!($img_arr['width'] == 0 && $img_arr['height'] == 0)) {
            Lavra_Loader::LoadClass("ProductSetting");
            $setting = new ProductSetting();
            $resisize = $setting->getImageSettingId($type);
            $resourse = $images->open($source_img_dir . $file_name);
            if (!empty($resisize->water_file)) {
                $images->setWaterImage($registry->fronted_images_dir . '' . $resisize->water_file, $resisize->pos_top, $resisize->pos_bottom, $resisize->pos_right, $resisize->pos_left);
            } else
                $images->setWaterImage(null, 0, 0, 0, 0);

            $file_name = $images->getImageName($file_name) . $img_arr['prefix'] . "." . $images->getTypeImage($file_name);
            $old_file_name = $file_name;

            $check_all_name = true;

            //Проходим по цифрам, без букв
            if (isset($registry->scaling['height'])) {
                for ($i = 1; $i <= count($registry->scaling['height']); $i++) {
                    $file_name = $this->_getSubFileName($file_name) . $img_arr['prefix'] . "." . $images->getTypeImage($file_name);
                    if ($file->isImageName($file_name)) { //Если файл уже существует, то пропускаем
                        $check_all_name = false;
                        break;
                    }
                }
            }

            if ($check_all_name == false) { //Если файл без букв существует
                for ($char = 'A'; $char < 'Z'; $char++) {
                    $check_all_name = true;
                    for ($i = 1; $i <= count($registry->scaling['height']); $i++) {
                        $file_name = $this->_getSubFileName($file_name) . "_" . $char . $img_arr['prefix'] . "." . $images->getTypeImage($file_name);
                        if ($file->isImageName($file_name)) {
                            $check_all_name = false;
                            break;
                        }
                    }
                    if ($check_all_name == true) {
                        break;
                        ;
                    }
                }
            } else {
                $file_name = $old_file_name;
            }

            if ($check_all_name == true) {
                if (isset($char)) {
                    $this->_first_images_char = $char;
                }
            }


            $images->setIsConvas($img_arr['is_convas']);
            $images->setScaling($img_arr['width'], $img_arr['height'], $img_arr['scaling_width'], $img_arr['scaling_height']);
            $images->save($images->ReSize($resourse, $img_arr['width'], $img_arr['height']), $registry->gallery_dir . $file_name, 90);
            return $file_name;
        }
        return false;
    }

    /**
     * Обрезает системные обозначения на конце файла
     * @param <type> $name
     * @return <type>
     */
    private function _getSubFileName($name) {
        preg_match("/(.+)_[A-Z]{1}_\d{1}\./", $name, $match);
        if (!isset($match[1])) { //Если не найдено двух символов в конце
            preg_match("/(.+)_\d{1}\./", $name, $match);
            if (isset($match[1])) { //Если не найдено двух символов в конце
                return $match[1];
            } else
                return false;
        } else
            return $match[1];
    }

}
