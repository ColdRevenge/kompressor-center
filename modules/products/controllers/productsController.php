<?php

class productsController extends Controller {

    public function findAjaxProductsAction() {
        Lavra_Loader::LoadClass("Application");
        if (isset($_GET['query'])) { //Подсказка артикула
            Lavra_Loader::LoadModels("Mod", "products");
            $mod = new Mod();
            $articles = $mod->getModNames(($_GET['query']) . '%');
            $article_arr = array();
            foreach ($articles as $value) {
                $article_arr[] = str_replace("&quot;", '"', Application::cp1251_to_uft8($value->article));
            }
            $arr = array('query' => 'Li',
                'suggestions' => $article_arr);
            exit(json_encode($arr));
        }
    }

    public function getProductAction() {
        $registry = Registry::getInstance();
        $registry->is_open_catalog = 1;
        $registry->is_open_product = 1;
//        $currency = new Currency();
//        $this->currencies = $currency->getCurrencies();
//        if (isset($_GET['currency']) && (int) $_GET['currency'] > 0) { //Устанавливаем валюту по-умолчанию
//            $curr = $currency->getCurrencyId((int) $_GET['currency']);
//            if (isset($curr->id)) {
//                $currency->setDefaultCurrencyUser((int) $_GET['currency'], $this->user_id);
//                $this->_default_currency = $curr;
//                $this->default_currency = $this->_default_currency; //Передаем в шаблон текущую валюту
//            }
//        }
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        if (isset($this->param['product_id']) || isset($this->param['pseudo_dir'])) {
            Lavra_Loader::LoadModels("Products", "products");
            Lavra_Loader::LoadModels("Mod", "products");
            Lavra_Loader::LoadModels("Brand", "brand");
            Lavra_Loader::LoadModels("Characteristics", "characteristics");
            $characteristic = new Characteristics();
            $brand = new Brand();

            Lavra_Loader::LoadModels("CharacteristicsTech", "characteristics_tech");
            $characteristic_tech = new CharacteristicsTech();
            $products = new Products();
            $mod = new Mod();

            if (isset($this->param['test']) && $this->param['test']) {
                $this->log404();
                header("HTTP/1.0 404 Not Found");
                header("location: " . $registry->base_url . '404/');
                exit();
            }
            if (isset($this->param['pseudo_dir'])) {
                $this->product = $products->getPrpductDir($this->param['pseudo_dir']);
            } elseif (isset($this->param['product_id'])) {
                $this->product = $products->getPrpductId($this->param['product_id']);
            }
            if (isset($this->product->id)) {  //Вывод изображений
//                if ($this->product->shop_id != $registry->shop_type) {
//                    $this->log404();
//                    header("HTTP/1.0 404 Not Found");
//                    header("Location: " . $registry->base_url . '404/');
//                    exit();
//                }
                Lavra_Loader::LoadModels('vsProduct', 'vs_product');
                $vs = new vsProduct();
                $this->product_root_category = $vs->getRootCategory($this->product->category_1_id);
                $this->product_mods = $mod->getMod($this->product->id);
                //Голосовалка
//                $this->rating = Lavra_Loader::getLoadModule("rating", "/rating/voice/1/" . $this->product->id . "/");
                //Комменты к товару
                $this->comment = Lavra_Loader::getLoadModule("comments", "/comments/list/1/" . $this->product->id . "/");

                if ($this->product->brand_id > 0) { //Смотрим производителя
                    $this->brand = $brand->getBrandId($this->product->brand_id);
                    //Для калькулятора
                    if ($this->product->brand_id == 1 || $this->product->brand_id == 30 || $this->product->brand_id = 4) {
                        $registry->get_product_calc = $this->product;
                    }
                }

                /**
                 * Сопутствующие товары
                 */
                Lavra_Loader::LoadModels("Related", "related");
                $related = new Related();
                $this->related_products = $related->getRelatedProducts($this->product->id, 0);
                //характеристики
//                $this->characteristics_related_product = $characteristic->getCharacteristicValueRelatedProduct($this->product->id);
                $this->characteristics_product = $characteristic->getCharacteristicValueProduct($this->product->id);
//                if (isset($_GET['test'])) {
                /**
                 * Скидка на определенный размер только для Lady Lalipop
                 */
                $size_price = array();
                $size_old_price = array();
//                foreach ($this->characteristics_product as $char_size) {
//                    if ($char_size->characteristic_id == 62) {
//                        $size_price[(int) $char_size->value_name] = $this->product->price;
//                        $size_old_price[(int) $char_size->value_name] = $this->product->old_price;
//                    }
//                }
//                if (count($size_old_price) > 0) {
//                    $this->size_price = $size_price;
//                    $this->size_old_price = $size_old_price;
//
//                    $this->product->price = $this->product->old_price;
//                    $this->product->old_price = 0;
//                }
//                }
//                print_r($this->characteristics_product);
//                $this->characteristics_product_price = $characteristic->getCharacteristicValuePriceProduct($this->product->id);
                if (!count($this->related_products)) { //Если нет объедененных товаров, берем те которые объеденены с ним
                    unset($this->related_products);
                    $this->related_products = $related->getRelatedProductRelated($this->product->id, 0);
                }
                $images_products = array();
                $_related_products = $this->related_products;
                if (count($_related_products) > 0 && isset($_related_products[0])) {
                    foreach ($this->related_products as $key => $value) {
                        $images_products[$key] = $products->getImages($value->id);
                    }
                }
                $this->related_product_images = $images_products;
//                $this->pictograms = $characteristic->getPictogramsProductValuesAll(17);

                /**
                 * 2-ой размер только для Сноубордистов 
                 */
//                $this->characteristics_size_value = $characteristic->getProductValues($this->product->id, 2);
                /**
                 * Технические характеристики
                 */
//                $this->characteristics_tech = $characteristic_tech->getCharacteristicProduct($this->product->id);
//                $this->characteristics_tech_type = $characteristic_tech->getCharacteristicTypeProduct($this->product->id);
//                $this->characteristics_tech_product = $characteristic_tech->getCharacteristicValueProduct($this->product->id);
                //-----------------------------
//                print_r($this->characteristics_tech_type);
                $registry->open_category_id = $this->product->category_1_id;
                $parent_id = $category->getCategoryId($registry->open_category_id);
                if (isset($parent_id->parent_id))
                    $registry->open_category_parent_id = $parent_id->parent_id;
                $this->product_images = $products->getImages($this->product->id, 333777);

                if (isset($this->product_images['empty']) && $this->product_images['empty'] == 1) { //Только для Тинко!!
                    $this->product_images = $products->getImages($this->product->id, -1);
                }

                $registry->head_title = ($this->product->title ? $this->product->title : $this->product->name);
                $registry->head_key = ($this->product->meta_keyword ? $this->product->meta_keyword : $this->product->name);
                $registry->head_desc = ($this->product->meta_desc ? $this->product->meta_desc : $this->product->desc);


               


//                Lavra_Loader::LoadClass("Files");
//                $file = new Files();
//                $this->serf_files = $products->getImages($this->product->id, 333731); //Файлы
//                $this->tech_files = $file->getFilesPageId(333771, $this->product->id); //Файлы




                /*
                 * Товары из этой категории 
                 */
//                $level_up = 1; //Уровень категорий с которого нужно брать товары
                $category_id = $this->product->category_1_id;
//                for ($i = 0; $i < $level_up; $i++) { //Ищем категорию которая на n-уровней выше той в которой товар
                $this->category_obj = $category_obj = $category->getCategoryId($category_id);
//                    if (isset($category_obj->id)) {
//                        $category_id = $category_obj->parent_id;
//                    }
//                }
                if (isset($category_obj->name)) {
                    Lavra_Loader::LoadClass('ApplicationDB');
                    $app = new ApplicationDB();
//                    $category_arr_id = $app->getChildsCategory(0, $category_id);
                    $category_arr_id[] = $category_id;
                    $this->product_in_category_name = $registry->product_in_category_name = $category_obj->name;

                    /**
                     * Товары из этой категории
                     */
                    $get_products = $products->getPrpductsCategoryes($category_arr_id, 1, 1, 0, 30);
                    $registry->products_in_category = $this->products_in_category = $get_products['result'];


                    /**
                     * Товары схожие по характеристикам
                     */
                    /**
                     * Только для Тинько, в остальных убрать
                     * -------------------------------------------------------------
                     */
//                    Lavra_Loader::LoadModels("Selection", "selection");
//                    $selection = new Selection();
//                    $this->_filterWrapper();
//                    $get_podbor_chars = $selection->getCharSelection($registry->podbor_open_category_id);
//                    $char_1_id = 640;
//                    $char_2_id = $char_3_id = $char_4_id = $char_5_id = 0;
//                    $char_value_1 = $char_value_2 = $char_value_3 = $char_value_4 = $char_value_5 = 0;
//                    if (count($get_podbor_chars)) {
//                        foreach ($get_podbor_chars as $key => $value) {
//                            ${'char_' . ($key + 1) . '_id'} = $value->char_id;
//                        }
//                    }
//
//                    foreach ($this->characteristics_product as $key => $value) {
//                        if ($value->characteristic_id == $char_1_id) { //Если это тип изделия
//                            $char_value_1 = $value->value_id;
//                        }
//                        if ($value->characteristic_id == $char_2_id) {
//                            $char_value_2 = $value->value_id;
//                        }
//                        if ($value->characteristic_id == $char_3_id) { //Если это тип изделия
//                            $char_value_3 = $value->value_id;
//                        }
//                        if ($value->characteristic_id == $char_4_id) { //Если это тип изделия
//                            $char_value_4 = $value->value_id;
//                        }
//                        if ($value->characteristic_id == $char_5_id) { //Если это тип изделия
//                            $char_value_5 = $value->value_id;
//                        }
//                    }
//
//
//                    if ($char_1_id > 0) { //Если тип изделия найден
//                        $get_products = $this->products_in_category = $products->getProductsLikeCharacteristic($char_value_1, $char_value_2, $char_value_3, $char_value_4, $char_value_5, 20);
//                    }
//                    $registry->products_in_category = $get_products;
                    /**
                     * -------------------------------------------------------------
                     */
                }

//                $this->collection = $products->getProductCharValue(0, 12, $this->product->id);
                if (isset($_GET['test'])) {
//                    print_r($this->collection);
                }

                /**
                 * Пред. след. товар
                 */
                if (isset($_SESSION['sort_method'])) {
                    $sort_method = $_SESSION['sort_method'];
                } else
                    $sort_method = 'order';

                if (isset($_SESSION['sort_ord'])) {
                    $sort_order = $_SESSION['sort_ord'];
                } else
                    $sort_order = 'asc';

                $products->setSort($sort_method, $sort_order);
//                if (isset($category_obj->id)) {
//                    $this->nav_products = $products->getPrpductsCategoryes(array_merge(array($category_obj->id => $category_obj->id), $app->getChildsCategory(0, $category_obj->id)), 1, 1, 0, 1000000000, $registry->shop_type);
////                print_r($this->nav_products);
//                    if (isset($this->nav_products['result'])) {
//                        $this->nav_product_key = 0;
//                        foreach ($this->nav_products['result'] as $key => $value) {
//                            if ($value->id == $this->product->id) {
//                                $this->nav_product_key = $key;
//                                break;
//                            }
//                        }
//                        if (isset($_SESSION['count_product'])) {
//                            $page = ceil(($key + 1) / $_SESSION['count_product']);
//
//                            $this->back_url = $registry->base_url . ($this->getCategoryAdress(array('category_id' => $category_obj->id)));
//                            if ($page > 1) {
//                                $this->back_url = $this->back_url . '?page=' . ($page - 1);
//                            }
//                            $this->page_id = $page;
//                        }
//                    }
//                }

//              print_r($get_products);

                /**
                 * Вы смотрели
                 */
                unset($_SESSION['products'][$this->product->id]); //Если вы смотрели в товаре, то разкоментить
                $_SESSION['products'][$this->product->id]['id'] = $this->product->id;
                $_SESSION['products'][$this->product->id]['pseudo_dir'] = $this->product->pseudo_dir;
                $_SESSION['products'][$this->product->id]['name'] = $this->product->name;
                $_SESSION['products'][$this->product->id]['price'] = $this->product->price;
                $_SESSION['products'][$this->product->id]['shop_id'] = $this->product->shop_id;
                if (isset($this->product_images[3][0]->file)) {
                    $_SESSION['products'][$this->product->id]['file'] = $this->product_images[3][0]->file;
                    $_SESSION['products'][$this->product->id]['big_file'] = $this->product_images[5][0]->file;
                }


                Lavra_Loader::LoadModels("NewsProduct", "news");
                $news_product = new NewsProduct();
                $this->news_product = $news_product->getNewsTypeProducts($this->product->id, 1, 1000);
            } else {
                $this->log404();
                header("HTTP/1.0 404 Not Found");
                header("Location: " . $registry->base_url . '404/');
                exit();
            }
        }



        /**
         * Вы смотрели
         */
        if (isset($_SESSION['products'])) {
            $this->session_products = array_reverse($_SESSION['products']);
        }

        if (isset($registry->open_category_id)) {

            $category->getFullAdressCategory($registry->open_category_id, 0, -1);
            $this->bread_page_arr = $category->getFullAdressCategoryArr();
//                $this->breadcrumbs = @array_reverse($category->getBreadcrumbs($registry->open_category_id));
        }
        $this->register_object('category_obj', $category);
        $this->register_object('this', $this);
    }

    /**
     * Пока не используется, в main контролере прописано напрямую
     * Доработать по мере необходимости, когда нужно будет сделать
     * вывод с логикой
     */
    public function getRandomProductAction() {
        if (!isset($this->param['limit']))
            $this->param['limit'] = 10;
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Products", "products");
        $products = new Products();
        $this->products = $products->getRandomProducts($this->param['limit']);

        $images_products = array();
        foreach ($this->products as $key => $value) {
            $images_products[$value->id] = $products->getImages($value->id);
        }
        $this->product_images = $images_products;
    }

    private function _getPseudoDir($name, $prefix = null) {
        Lavra_Loader::LoadClass("Application");

        $app = new Application();
        return str_replace('--', '-', str_replace('--', '-', mb_strtolower(Application::getPseudoDir($app->convertToLatin(trim(($name))))))) . $prefix;
    }

    /**
     * Вывод модификаций 
     */
    private function _getListMod($product_id) {
        Lavra_Loader::LoadModels("Mod", "products");
        $mod = new Mod();
        $this->mod_list = $mod->getMod($product_id);
    }

    /**
     * Добавление модификаций 
     */
    private function _addMod($product_id, $type) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Mod", "products");
        $mod = new Mod();

        if (isset($_POST['mod_article'])) {
            if ($registry->is_multi_mod == true) { //Если включен режим мульти модификаций, то удалем чтобы потом создать новые
                $mod->delAllMod($product_id);
            }

            $default_fields = array('mod_name' => null, 'mod_article' => null, 'mod_param_1' => null, 'mod_param_2' => null, 'mod_param_3' => null, 'mod_param_4' => null,
                'mod_param_5' => null, 'mod_param_6' => null, 'mod_param_7' => null, 'mod_param_8' => null, 'mod_param_9' => null, 'mod_param_10' => null,
                'mod_cost_price' => 0, 'mod_price' => 0, 'mod_price_1' => 0, 'mod_price_2' => 0, 'mod_price_3' => 0, 'mod_price_4' => 0, 'mod_price_5' => 0, 'mod_price_6' => 0,
                'mod_price_7' => 0, 'mod_price_8' => 0, 'mod_price_9' => 0, 'mod_price_10' => 0, 'mod_old_price' => 0, 'mod_warehouse' => 250000, 'mod_currency_id' => $registry->shop_default_currency
            );

            foreach ($_POST['mod_article'] as $key => $value) {
                foreach ($default_fields as $field_name => $field_value) {
                    if (!isset($_POST[$field_name][$key])) {
                        $_POST[$field_name][$key] = $field_value;
                    }
                }

                $autoFormat = 0;
                if (isset($_POST['auto_format'])) {
                    $autoFormat = $_POST['auto_format'][$key];
                }

                if ($registry->is_multi_mod == true) { //Если включен режим мульти модификаций, на место удаленных ставим новые
                    $mod->addMod($product_id, $type, $_POST['mod_name'][$key], $_POST['mod_article'][$key],
                        $_POST['mod_cost_price'][$key], $_POST['mod_price'][$key], $_POST['mod_price_1'][$key],
                        $_POST['mod_price_2'][$key], $_POST['mod_price_3'][$key], $_POST['mod_price_4'][$key],
                        $_POST['mod_price_5'][$key], $_POST['mod_price_6'][$key], $_POST['mod_price_7'][$key],
                        $_POST['mod_price_8'][$key], $_POST['mod_price_9'][$key], $_POST['mod_price_10'][$key],
                        $_POST['mod_old_price'][$key], $_POST['mod_warehouse'][$key], $_POST['mod_currency_id'][$key],
                        $_POST['mod_param_1'][$key], $_POST['mod_param_2'][$key], $_POST['mod_param_3'][$key],
                        $_POST['mod_param_4'][$key], $_POST['mod_param_5'][$key], $_POST['mod_param_6'][$key],
                        $_POST['mod_param_7'][$key], $_POST['mod_param_8'][$key], $_POST['mod_param_9'][$key],
                        $_POST['mod_param_10'][$key],
                        $autoFormat,
                        $_POST['auto_format_currency'][$key]
                    );
                } else {
                    if ($mod->isModProduct($product_id)) { //Если мод существует у товара
                        $mod->setMod($product_id, $type, $_POST['mod_name'][$key], $_POST['mod_article'][$key],
                            $_POST['mod_cost_price'][$key], $_POST['mod_price'][$key], $_POST['mod_price_1'][$key],
                            $_POST['mod_price_2'][$key], $_POST['mod_price_3'][$key], $_POST['mod_price_4'][$key],
                            $_POST['mod_price_5'][$key], $_POST['mod_price_6'][$key], $_POST['mod_price_7'][$key],
                            $_POST['mod_price_8'][$key], $_POST['mod_price_9'][$key], $_POST['mod_price_10'][$key],
                            $_POST['mod_old_price'][$key], $_POST['mod_warehouse'][$key], $_POST['mod_currency_id'][$key],
                            $_POST['mod_param_1'][$key], $_POST['mod_param_2'][$key], $_POST['mod_param_3'][$key],
                            $_POST['mod_param_4'][$key], $_POST['mod_param_5'][$key], $_POST['mod_param_6'][$key],
                            $_POST['mod_param_7'][$key], $_POST['mod_param_8'][$key], $_POST['mod_param_9'][$key],
                            $_POST['mod_param_10'][$key],
                            $autoFormat,
                            $_POST['auto_format_currency'][$key]
                        );
                    } else {
                        $mod->addMod($product_id, $type, $_POST['mod_name'][$key], $_POST['mod_article'][$key],
                            $_POST['mod_cost_price'][$key], $_POST['mod_price'][$key], $_POST['mod_price_1'][$key],
                            $_POST['mod_price_2'][$key], $_POST['mod_price_3'][$key], $_POST['mod_price_4'][$key],
                            $_POST['mod_price_5'][$key], $_POST['mod_price_6'][$key], $_POST['mod_price_7'][$key],
                            $_POST['mod_price_8'][$key], $_POST['mod_price_9'][$key], $_POST['mod_price_10'][$key],
                            $_POST['mod_old_price'][$key], $_POST['mod_warehouse'][$key],
                            $_POST['mod_currency_id'][$key], $_POST['mod_param_1'][$key], $_POST['mod_param_2'][$key],
                            $_POST['mod_param_3'][$key], $_POST['mod_param_4'][$key], $_POST['mod_param_5'][$key],
                            $_POST['mod_param_6'][$key], $_POST['mod_param_7'][$key], $_POST['mod_param_8'][$key],
                            $_POST['mod_param_9'][$key], $_POST['mod_param_10'][$key],
                            $autoFormat,
                            $_POST['auto_format_currency'][$key]
                        );
                    }
                }
            }
        }
    }

    public function auto_pseudo_dirAction() {
        if (!isset($_GET['edit_id'])) {
            $_GET['edit_id'] = 0;
        }
        echo $this->_auto_pseudo_dir($_GET['name'], $_GET['edit_id']);
    }

    private function _auto_pseudo_dir($name, $edit_id) {
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

    public function isPseudoDirAction() {
        $registry = Registry::getInstance();

        Lavra_Loader::LoadModels("Products", "products");
        $products = new Products();
        //:pseudo_dir/:type/:edit_id
        if (isset($this->param['pseudo_dir'])) {
            if (!isset($this->param['edit_id']))
                $this->param['edit_id'] = 0;
            if (!isset($this->param['type']))
                $this->param['type'] = 0;
            if (!$products->isPseudoDir($this->param['pseudo_dir'], $this->param['type'], $this->param['edit_id'])) {
                $this->is_dir = 0;
            } else
                $this->is_dir = 1;
        }
    }

    /**
     * Добавляет продукты в сопутствующие
     */
    private function _relatedProduct($product_id) {
//        if (isset($_POST['related_send']) && $_POST['related_send'] == 1) {
//            $related = new Related();
//            $related->delRelated($product_id);
//            if (isset($_POST['related_product_id'])) {
//                foreach ($_POST['related_product_id'] as $key => $related_id) {
//                    $related->addRelatedProduct($product_id, $related_id);
//                }
//            }
//        }
    }

    public function addAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Currency");
        Lavra_Loader::LoadModels("Brand", "brand");
        Lavra_Loader::LoadModels("Related", "related");
        Lavra_Loader::LoadClass("Category");
        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        Lavra_Loader::LoadModels("CharacteristicsTech", "characteristics_tech");
        $characteristic = new Characteristics();
        $characteristic_tech = new CharacteristicsTech();

        if (isset($this->param['category_id'])) {
            $this->characteristics_tech = $characteristic_tech->getCharacteristics();
            $this->values_tech = $characteristic_tech->getValuesAll();

            $this->characteristics = $characteristic->getCharacteristics($this->param['category_id'], 1, $sort = '`order` ASC', $registry->shop_type);
            $this->values = $characteristic->getValuesAll();

            $currency = new Currency();
            $this->currency = $currency->getCurrencies();
            //Добавление сопутствующих товаров
            $related = new Related();
            $this->_relatedProduct($this->param['temp_image_id']);

            $brand = new Brand();
            $this->brands = $brand->getBrands($registry->shop_type);

            $category = new Category();
            $this->category = $category->getCategory(0, $registry->shop_type);
            if (isset($this->param['temp_image_id'])) {
                $this->temp_image_id = $this->param['temp_image_id'];
            } else {
                throw new Exception("Ошибка недостаточности данных");
            }

            Lavra_Loader::LoadModels("Products", "products");
            $products = new Products();


            if (isset($_POST['submit'])) {
                if ($_POST['category_1_id'] > 0) {
                    /* Заполнение полей по-умолчанию */

                    $_POST['category_2_id'] = (!isset($_POST['category_2_id'])) ? 0 : $_POST['category_2_id'];
                    $_POST['category_3_id'] = (!isset($_POST['category_3_id'])) ? 0 : $_POST['category_3_id'];
                    $_POST['category_4_id'] = (!isset($_POST['category_4_id'])) ? 0 : $_POST['category_4_id'];
                    $_POST['category_5_id'] = (!isset($_POST['category_5_id'])) ? 0 : $_POST['category_5_id'];

                    $default_fields = array('is_active' => 0, 'pseudo_dir' => null, 'title' => null, 'meta_keyword' => null, 'meta_desc' => null, 'brand_id' => 0, 'code' => null,
                        'desc_1' => null, 'desc_2' => null, 'desc_3' => null, 'desc_4' => null, 'desc_5' => null, 'desc_6' => null, 'desc_7' => null, 'desc_8' => null,
                        'unit' => null, 'marker' => 0, 'short_desc' => null, 'name' => trim(str_replace('"', "&quot;", $_POST['name'])));

                    foreach ($default_fields as $field_key => $field_value) {
                        if (!isset($_POST[$field_key])) {
                            $_POST[$field_key] = $field_value;
                        }
                    }
                    if ($registry->shop == 'sumka') {
                        $_POST['desc_1'] = str_replace(' ', '', $_POST['desc_1']);
                        $_POST['desc_1'] = str_replace('см*', 'x', $_POST['desc_1']);
                        $_POST['desc_1'] = str_replace('*', 'x', $_POST['desc_1']);
                        $_POST['desc_1'] = str_replace('см.', '', $_POST['desc_1']);
                        $_POST['desc_1'] = str_replace('см', '', $_POST['desc_1']);
                    }

                    if (!$products->isPseudoDir($_POST['pseudo_dir'], 0, (isset($this->param['edit_id']) ? $this->param['edit_id'] : 0)) || empty($_POST['pseudo_dir'])) {
                        if (empty($_POST['pseudo_dir'])) {
                            $_POST['pseudo_dir'] = $this->_auto_pseudo_dir(trim($_POST['name']), (isset($this->param['edit_id']) ? $this->param['edit_id'] : 0)); //Если псевдопапка не заполненна, например, при импорте товаров
                        }

                        if (isset($this->param['edit_id'])) { //Редактирование товара
                            if (!$products->edit($this->param['edit_id'], trim(str_replace('"', '&quot;', $_POST['name'])), $_POST['code'], $_POST['unit'], $_POST['short_desc'], $_POST['desc'], $_POST['title'], $_POST['meta_keyword'], $_POST['meta_desc'], $_POST['category_1_id'], $_POST['category_2_id'], $_POST['category_3_id'], $_POST['category_4_id'], $_POST['category_5_id'], $_POST['pseudo_dir'], $_POST['brand_id'], $_POST['marker'], $_POST['is_active'], $_POST['desc_1'], $_POST['desc_2'], $_POST['desc_3'], str_replace('"', '&quot;', $_POST['desc_4']), $_POST['desc_5'], $_POST['desc_6'], $_POST['desc_7'], $_POST['desc_8'])) {
                                $this->setError("Во время редактирования продукта, произошли ошибки");
                            } else {

                                $this->_addMod($this->param['edit_id'], 0); //Изменения модификаций 

                                if (isset($_POST['characteristic'])) { //Добавляем характиристики
                                    $characteristic->delValueAllProduct($this->param['edit_id']);

                                    foreach ((array) $_POST['characteristic'] as $characteristic_id => $characteristics_value) {
                                        foreach ($characteristics_value as $key => $value) {
                                            if (!isset($_POST['price_char'][$value])) {
                                                $_POST['price_char'][$value] = 0;
                                            }
                                            if ($value != 0) {
                                                $characteristic->addValueProduct($this->param['edit_id'], $characteristic_id, $value, $_POST['price_char'][$value], 0);
                                            }
                                        }
                                    }
                                }
                                if (isset($_POST['characteristic_tech'])) { //Добавляем характиристики
                                    $characteristic_tech->delValueAllProduct($this->param['edit_id']);
                                    foreach ((array) $_POST['characteristic_tech'] as $key => $value_arr) {
                                        foreach ($value_arr as $value_id => $value) {
                                            if ($value != 0) {
                                                $characteristic_tech->addValueProduct($this->param['edit_id'], $key, $value, 0);
                                            }
                                        }
                                    }
                                }

                                if (!(isset($_POST['save_and']) && $_POST['save_and'])) {
                                    if (isset($_GET['is_modal'])) {
                                        echo '<script type="text/javascript" src="' . $registry->base_url . 'js/jquery-1.7.2.min.js"></script>';
                                        echo '<script type="text/javascript">
                                                  jQuery.ajax({
        url: parent.document.location.href.replace("products/list/","products/list/up-product/"),
        dataType: "text",
        type: "POST",
        async: false,
        cache: false,
        error: function() {
        }, 
        success: function(response) {
            window.parent.document.getElementById("product_list").innerHTML = response;
        }
    });
         parent.$.fancybox.close();                               
</script>';
                                        exit();
                                    } else {
                                        $this->redirect($this->MyURL . "list/3/" . $_POST['category_1_id']);
                                    }
                                } else {
                                    $this->setMessage('Успешно сохранено');
                                }
                            }
                        } else { //Добавление товара
                            $add_product_id = $products->add(trim(str_replace('"', '&quot;', $_POST['name'])), $_POST['code'], $_POST['unit'], $_POST['short_desc'], $_POST['desc'], $_POST['title'], $_POST['meta_keyword'], $_POST['meta_desc'], $_POST['category_1_id'], $_POST['category_2_id'], $_POST['category_3_id'], $_POST['category_4_id'], $_POST['category_5_id'], $_POST['pseudo_dir'], $_POST['brand_id'], $_POST['marker'], $_POST['is_active'], $_POST['desc_1'], $_POST['desc_2'], $_POST['desc_3'], $_POST['desc_4'], $_POST['desc_5'], $_POST['desc_6'], $_POST['desc_7'], $_POST['desc_8']);
                            $products->setAdminId($add_product_id, $registry->user_id);

                            if ($add_product_id > 0) {

                                $this->_addMod($add_product_id, 0); //Изменения модификаций
                                $products->setShopType($add_product_id, $registry->shop_type);

                                if (isset($_POST['characteristic'])) { //Добавляем характиристики
                                    $characteristic->delValueAllProduct($add_product_id);

                                    foreach ((array) $_POST['characteristic'] as $characteristic_id => $characteristics_value) {
                                        foreach ($characteristics_value as $key => $value) {
                                            $characteristic->addValueProduct($add_product_id, $characteristic_id, $value, 0);
                                        }
                                    }
                                }
                                $characteristic->setTempCharProductImageId($this->param['temp_image_id'], $add_product_id); //Если в изображенияъ используются характиристики характиристиках

                                if (isset($_POST['characteristic_tech'])) { //Добавляем характиристики
                                    $characteristic_tech->delValueAllProduct($add_product_id);
                                    foreach ((array) $_POST['characteristic_tech'] as $key => $value_arr) {
                                        foreach ($value_arr as $value_id => $value) {
                                            if ($value != 0) {
                                                $characteristic_tech->addValueProduct($add_product_id, $key, $value, 0);
                                            }
                                        }
                                    }
                                }
                                $characteristic_tech->setTempCharProductImageId($this->param['temp_image_id'], $add_product_id); //Если в изображенияъ используются характиристики характиристиках
                                $products->setTempProductImageId($this->param['temp_image_id'], $add_product_id); //Меняем временный id-продукта, на новый
                                $products->setTempProductFileImageId($this->param['temp_image_id'], $add_product_id, 333777);
                                $related->setRelatedProductId($this->param['temp_image_id'], $add_product_id); //Изменяем сопутствующие товары

                                if (!(isset($_POST['add_and']) && $_POST['add_and'])) {
                                    $this->redirect($this->MyURL . "list/2/" . $_POST['category_1_id'] . "/" . ((isset($_GET['is_modal'])) ? '?is_modal=1' : null));
                                } else {
                                    $this->redirect($this->admin_url . "products/edit/" . $this->param['type'] . "/" . $this->param['category_id'] . "/$add_product_id/$add_product_id/?success=1");
                                    $this->setMessage('Успешно сохранено');
                                }
                            } else {
                                $this->setError("Во время добавления товара возникли ошибки. Если проблема будет повторяться обратитесь к администратору.");
                            }
                        }
                    } else {
                        $this->setError("Адрес <b>" . $this->url . "catalog/" . $_POST['pseudo_dir'] . "/</b> занят");
                    }
                } else {
                    $this->setError("Выберите категорию");
                }
            }

            //Заполнение полей
            if (!isset($this->param['edit_id'])) {
                $_POST['category_1_id'] = $this->param['category_id'];
                $_POST['is_active'] = 1;



                /**
                 * Технические Характиристики 
                 * Если установленно показ характеристик для определенной категории
                 */
                $get_tech_chars = $characteristic_tech->getCharacteristicsOnlyCategory($this->param['category_id']);
                if (count($get_tech_chars)) {
                    $this->characteristics_tech = $get_tech_chars;
                }
            } else { //Если редактирование
                $this->edit_id = (int) $this->param['edit_id'];

                $this->_getListMod($this->edit_id); //Вывод модификаций при редактировании

                $product = $products->getPrpductId($this->param['edit_id']);
                if (isset($product->name)) {
                    $this->images = $products->getImages($this->param['edit_id']);
                    $_POST['name'] = $product->name;
                    $_POST['code'] = $product->code;
                    $_POST['short_desc'] = $product->short_desc;
                    $_POST['desc'] = $product->desc;
                    $_POST['desc_1'] = $product->desc_1;
                    $_POST['desc_2'] = $product->desc_2;
                    $_POST['desc_3'] = $product->desc_3;
                    $_POST['desc_4'] = $product->desc_4;
                    $_POST['desc_5'] = $product->desc_5;
                    $_POST['desc_6'] = $product->desc_6;
                    $_POST['desc_7'] = $product->desc_7;
                    $_POST['desc_8'] = $product->desc_8;
                    $_POST['title'] = $product->title;
                    $_POST['meta_keyword'] = $product->meta_keyword;
                    $_POST['pseudo_dir'] = $product->pseudo_dir;
                    $_POST['meta_desc'] = $product->meta_desc;
                    $_POST['unit'] = $product->unit;
                    $_POST['marker'] = $product->marker;
                    $_POST['category_1_id'] = $product->category_1_id;
                    $_POST['category_2_id'] = $product->category_2_id;
                    $_POST['category_3_id'] = $product->category_3_id;
                    $_POST['category_4_id'] = $product->category_4_id;
                    $_POST['category_5_id'] = $product->category_5_id;
                    $_POST['brand_id'] = $product->brand_id;
                    $_POST['is_active'] = $product->is_active;

                    $this->selected_values = $characteristic->getValueProduct($this->param['edit_id']);
                    $count_selected = array();
                    foreach ($this->selected_values as $key => $value) {
                        if (!isset($count_selected[$value->characteristic_id])) {
                            $count_selected[$value->characteristic_id] = 0;
                        }
                        $count_selected[$value->characteristic_id] ++;
                    }
                    $this->count_selected = $count_selected;


                    $this->selected_values_tech = $characteristic_tech->getSelectedValueProduct($this->param['edit_id']);

                    $this->related_products = Lavra_Loader::getLoadModule('related', '/xadmin/related/get/product/0/' . $this->param['category_id'] . '/' . $this->param['edit_id'] . '/');
                    $this->related_products_1 = Lavra_Loader::getLoadModule('related', '/xadmin/related/get/product/1/' . $this->param['category_id'] . '/' . $this->param['edit_id'] . '/');

                    $this->is_related_products = Lavra_Loader::getLoadModule('related', '/xadmin/related/get/related/0/' . $this->param['category_id'] . '/' . $this->param['edit_id'] . '/');


                    /**
                     * Технические Характиристики 
                     * Если установленно показ характеристик для определенной категории
                     */
                    $get_tech_chars = $characteristic_tech->getCharacteristicsOnlyCategory($product->category_1_id);
                    if (count($get_tech_chars)) {
                        $this->characteristics_tech = $get_tech_chars;
                    }
                } else {
                    $this->setError("Продукт не найден");
                }
            }

            //Форма вывода загрузки изображений
            try {
                if (!isset($this->param['category_id'])) {
                    $this->setError("Выберите категорию");
                } else {
                    $this->category_id = (int) $this->param['category_id'];
                    if ($this->category_id > 0) { //Хлебная крошка
                        $getCategory = $category->getCategoryId($this->category_id);
                        if (isset($getCategory->name)) {
                            $this->category_name = $getCategory->name;
                        }
                    }
                }
            } catch (Exception $e) {
                echo $e->getMessage() . '!!!!!!';
            }
        } else {
            $this->setError('Выберете категорию');
        }




        $registry->up_category_id = 0; // $this->param['category_id']; //id-категории
        if (isset($this->param['temp_image_id'])) {
            $registry->up_product_id = $this->param['temp_image_id'];
        } elseif (isset($this->param['edit_id'])) {
            $registry->up_product_id = $this->param['edit_id'];
        }

        $registry->up_type = 333777;
        $registry->up_formats = ''; //Разрешенные форматы
        $this->upload_photo = Lavra_Loader::getLoadModule('uploader_products', '/uploader_products/list/');


        $registry->up_formats = ''; //Разрешенные форматы
        $registry->up_type = 333731;
        $this->upload_serf = Lavra_Loader::getLoadModule('uploader_products', '/uploader_products/list/');
        $registry->up_type = 333771;
        $registry->up_formats = ''; //Разрешенные форматы
        $this->upload_tech = Lavra_Loader::getLoadModule('uploader_products', '/uploader_products/list/');
    }

    public function listAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Products", "products");
        $products = new Products();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        //Постраничный вывод
        if (!isset($_GET['count_page']) && !isset($_SESSION['admin_count_product'])) {
            $offset = 100;
        } elseif (isset($_GET['count_page'])) {
            $offset = $_SESSION['admin_count_product'] = (int) $_GET['count_page'];
        } elseif (isset($_SESSION['admin_count_product'])) {
            $offset = $_SESSION['admin_count_product'];
        }
        //Только активные товары
        if (!isset($_GET['product_is_active']) && !isset($_SESSION['product_is_active'])) {
            $_SESSION['product_is_active'] = $product_is_active = -1;
        } elseif (isset($_GET['product_is_active'])) {
            $product_is_active = $_SESSION['product_is_active'] = (int) $_GET['product_is_active'];
        } elseif (isset($_SESSION['product_is_active'])) {
            $product_is_active = $_SESSION['product_is_active'];
        }
        //Наличие на складе
        if (!isset($_GET['product_is_warehouse']) && !isset($_SESSION['product_is_warehouse'])) {
            $_SESSION['product_is_warehouse'] = $product_is_warehouse = -1;
        } elseif (isset($_GET['product_is_warehouse'])) {
            $product_is_warehouse = $_SESSION['product_is_warehouse'] = (int) $_GET['product_is_warehouse'];
        } elseif (isset($_SESSION['product_is_warehouse'])) {
            $product_is_warehouse = $_SESSION['product_is_warehouse'];
        }

        if (isset($_GET['product_is_active']))
            if (!isset($this->param['page_num'])) {
                $this->param['page_num'] = 0;
            }
        if (!isset($this->param['category_id'])) {

            $category_list = $category->getCategory(0, $registry->shop_type);
            if (isset($category_list[0]) && isset($category_list[0][0]) && isset($category_list[0][0]->id)) {
                $this->param['category_id'] = $category_list[0][0]->id;
            } else {
                $this->param['category_id'] = 0;
            }
        }

        if (isset($this->param['page_num'])) {
            $_SESSION['product_page'][$this->param['category_id']] = $this->param['page_num'];
        }
        if (!isset($this->param['page_num'])) {
            if (isset($this->param['category_id'])) {
                if (isset($_SESSION['product_page']) && isset($_SESSION['product_page']) && isset($_SESSION['product_page'][$this->param['category_id']])) {
                    $this->param['page_num'] = $_SESSION['product_page'][$this->param['category_id']];
                } else {
                    $this->param['page_num'] = 0;
                }
            }
        }

        if (isset($this->param['is_active'])) {

            $products->setActive((int) $this->param['product_id'], (int) $this->param['is_active']);
        }

        if (isset($this->param['field']) && isset($this->param['order'])) {
            $this->_setSort($this->param['field'], $this->param['order']);
        }

        if (isset($_POST['price'])) {
            Lavra_Loader::LoadModels("Mod", "products");
            $mods = new Mod();
            foreach ($_POST['price'] as $product_id => $price) {
                $mods->setModPriceProductId($product_id, $price);
            }
        }
        if (isset($_POST['order'])) {
            foreach ($_POST['order'] as $product_id => $order) {
                $products->setOrder($product_id, $order);
            }



            if (isset($_POST['action_product'])) {
                if (isset($_POST['selected_products'])) {
                    if ($_POST['action_product'] == -2) { //Удаление
                        foreach ($_POST['selected_products'] as $product_id => $value) {
                            $products->delFullProductId($product_id);
                            $products->delProductImages($product_id);
                        }
                        CacheModule::delCacheModule('products');
                    }if ($_POST['action_product'] == -3) { //Активными
                        foreach ($_POST['selected_products'] as $product_id => $value) {
                            $products->setActive($product_id, 1);
                        }
                        CacheModule::delCacheModule('products');
                    } if ($_POST['action_product'] == -4) { //Не активными
                        foreach ($_POST['selected_products'] as $product_id => $value) {
                            $products->setActive($product_id, 0);
                        }
                        CacheModule::delCacheModule('products');
                    }
                    if ($_POST['action_product'] == -5) { //Перенос товара с lady.lalipop на woman.lalipop
                        foreach ($_POST['selected_products'] as $product_id => $value) {
                            $this->_moveProductShop($product_id, $registry->shop_type);
                        }
                        CacheModule::delCacheModule('products');
                    } elseif ($_POST['action_product'] > 0) { //Изменение категории
                        foreach ($_POST['selected_products'] as $product_id => $value) {
                            $products->setCategory1($product_id, $_POST['action_product']);
                        }
                        CacheModule::delCacheModule('products');
                    }

                    CacheModule::delCacheModule('products');
                    CacheModule::delCacheModule('Controller');
                    CacheModule::delCacheModule('category');
                    CacheModule::delCacheModule('left_podbor');
                    $cac = Cache::getInstance();
                    $cac->flush();
                }
            }
        }

        if (isset($_POST['is_param_send'])) {

            if (isset($_POST['product_action']) && $_POST['product_action'] != 0) {
                foreach ($_POST['product_action'] as $product_id => $order) {
                    $products->setAction($product_id, $_POST['product_action'][$product_id]);
                }
            }

            foreach ($_POST['is_param_send'] as $product_id => $order) {
                if (!isset($_POST['is_param_1'][$product_id])) {
                    $_POST['is_param_1'][$product_id] = 0;
                }
                $products->setIsParam1($product_id, $_POST['is_param_1'][$product_id]);
            }
            foreach ($_POST['is_param_send'] as $product_id => $order) {
                if (!isset($_POST['is_param_2'][$product_id])) {
                    $_POST['is_param_2'][$product_id] = 0;
                }
                $products->setIsParam2($product_id, $_POST['is_param_2'][$product_id]);
            }
            foreach ($_POST['is_param_send'] as $product_id => $order) {
                if (!isset($_POST['is_param_3'][$product_id])) {
                    $_POST['is_param_3'][$product_id] = 0;
                }
                $products->setIsParam3($product_id, $_POST['is_param_3'][$product_id]);
            }
            foreach ($_POST['is_param_send'] as $product_id => $order) {
                if (!isset($_POST['is_param_4'][$product_id])) {
                    $_POST['is_param_4'][$product_id] = 0;
                }
                $products->setIsParam4($product_id, $_POST['is_param_4'][$product_id]);
            }
            foreach ($_POST['is_param_send'] as $product_id => $order) {
                if (!isset($_POST['is_param_5'][$product_id])) {
                    $_POST['is_param_5'][$product_id] = 0;
                }
                $products->setIsParam5($product_id, $_POST['is_param_5'][$product_id]);
            }
        }
        if (isset($this->param['message_id'])) {
            switch ($this->param['message_id']) {
                case 1:

                    break;
                case 2:
                    $this->setMessage("Продукт успешно добавлен!");
                    break;
                case 3:
                    $this->setMessage("Продукт успешно изменен!");
                    break;
                case 4:
                    if (isset($this->param['del_id'])) {
                        Lavra_Loader::LoadModels("Mod", "products");
                        $mods = new Mod();
                        if ($products->delProduct($this->param['del_id'])) {
                            $products->delFullProductId($this->param['del_id']);
                            $products->delProductImages($this->param['del_id']);
                            $mods->delAllMod($this->param['del_id']);
                            $this->setMessage("Продукт успешно удален!");
                        } else {
                            $this->setError("Возникла ошибка при удалении продукта");
                        }
                    }
                    break;
                case 7:
                    if (isset($_GET['copy'])) {
                        $products->copyProduct($_GET['copy']);
                        $this->redirect($registry->base_url . trim($_SERVER['PATH_INFO'], '/') . '/?message_id=8');
                        $this->setMessage("Раздел успешно копирован!");
                    }
                    break;
                case 5:
                    $this->setMessage("Раздел успешно добавлен!");
                    break;
                case 6:
                    $this->setMessage("Раздел успешно изменен!");
                    break;

                case 8:
                    $this->setMessage("Раздел успешно копирован!");
                    break;
                case 100: //Удаление всех товаров без категории
                    if (isset($this->param['category_id']) && $this->param['category_id'] == 0) {
                        $get_products_not_category = $products->getProductNotCategory($registry->shop_type);
                        foreach ($get_products_not_category['result'] as $value) {
                            $products->delFullProductId($value->id);
                            $products->delProductImages($value->id);
                        }
//                        
                    }
                    $this->setMessage("Все товары без категории успешно удалены!");
                    break;
                case 7:
                    $this->setMessage("Раздел успешно удален!");
                    break;
            }
        }
        if (isset($_GET['search'])) { //Если используется поиск
            if (isset($_GET['is_all']) && $_GET['is_all'] == '1') {
                $_SESSION['search_is_all'] = 1;
                $products->setAdminSearchIsAllCategory(1);
            } else {
                $_SESSION['search_is_all'] = 0;
            }
            $products->setAdminSearchProduct($_GET['search']); //Поиск
        }

        /**
         * Проверка на товары без категорий
         */
        $get_products = $products->getProductNotCategory($registry->shop_type, $product_is_warehouse, $product_is_active, $this->param['page_num'] * $offset, $offset);
        $this->count_product_not_category = $get_products['count']; //count($not_category_products);

        if (isset($this->param['category_id']) && $this->param['category_id'] != 0 || isset($_GET['search'])) {
            $this->_sort($products);


            $get_products = $products->getAdminProducts($this->param['category_id'], $product_is_warehouse, $product_is_active, $this->param['page_num'] * $offset, $offset, $registry->shop_type);

            if ($this->param['category_id'] > 0) {
                /**
                 * Подгрузка характеристик в список товаров 
                 */
//            Lavra_Loader::LoadModels("Characteristics", "characteristics");
//            $characteristic = new Characteristics();
//            $this->product_characteristic = $characteristic->getProductValuesAll();


                if (isset($_POST['text_top'])) {
                    $category->setTextTop($this->param['category_id'], $_POST['text_top']);
                }
                if (isset($_POST['text_bottom'])) {
                    $category->setTextBottom($this->param['category_id'], $_POST['text_bottom']);
                }

                $this->category = $category->getCategoryId($this->param['category_id']);
            }

            $this->tree = $category->getCategory(0, $registry->shop_type);
        } elseif ($this->param['category_id'] == 0) {
            $this->category_id = 0;
            if ($get_products) {
                $this->products = $get_products;
                $this->tree = $category->getCategory(0, $registry->shop_type);
            }
        }


        $this->products = $get_products['result'];
        $this->count_all_products = $get_products['count'];
        $this->count_products = ceil($this->count_all_products / $offset);
        $this->select_page = $this->param['page_num'];
        $this->offset = $offset;
        /**
         * Проверка на товары без категорий
         */
        /*
         *
         */

        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Pages", "page");
        $page = new Pages();
        $this->content = $page->getPagesContent(968);


        /**
         * Вывод тендоров 
         */
//        Lavra_Loader::LoadModels("Tenders", "tenders");
//        $tenders = new Tenders();
//        $this->tenders = $tenders->getTenders(0);
//        $this->products_tender = $tenders->getProductTenderAll(); //Выводим все продукты которые оносяться к тендерам
//        if (isset ($this->param['category_id'])) {
//            $this->category_id = $this->param['category_id'];
//        }
//        else $this->setError("Выберите категорию");
        /* Меню в разделе страницы */

        $this->_loadMenu(); //Подгружаем меню
    }

    private function _setSort($field, $order) {
        if ($order == 'asc' || $order == 'desc') {
            switch ($field) {
                case 'name':
                case 'article':
                case 'code':
                case 'price':
                case 'short_desc':
                case 'desc':
                case 'title':
                case 'meta_keyword':
                case 'meta_desc':
                case 'category_1_id':
                case 'brand_id':
                case 'warehouse':
                case 'order':
                case 'is_active':
                    $_SESSION['sort_product_field'] = "$field";
                    $_SESSION['sort_product_order'] = $order;
                    break;

                default:
                    break;
            }
        }
    }

    /**
     * Сортирует продукты
     * @param Products $products
     */
    private function _sort(Products $products) {
        if (!(isset($_SESSION['sort_product_field']) && isset($_SESSION['sort_product_order']))) {
            $this->_setSort('order', 'asc');
        }
        $products->setSort($_SESSION['sort_product_field'], $_SESSION['sort_product_order']);
        $this->sort_field = $_SESSION['sort_product_field'];
        $this->sort_order = $_SESSION['sort_product_order'];
    }

    /*
     * Меню в разделе страницы
     * Сделать подгрузку меню не только для подразделов, но и для разделов, в зависимости от типа сайта
     */

    private function _loadMenu() {
        $registry = Registry::getInstance();

        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        if (!isset($this->param['type']))
            $this->param['type'] = 0; //Тип по умолчанию
        if (!isset($this->param['category_id'])) { //Категория по умолчанию
            $category_list = $category->getCategory($this->param['type'], $registry->shop_type);

            if (isset($category_list[0]) && isset($category_list[0][0]) && isset($category_list[0][0]->id)) {
                $this->root_category_id = $category_list[0][0]->id;
                $this->category_name = $category_list[0][0]->name;
                if (isset($category_list[$this->root_category_id]) && isset($category_list[$this->root_category_id][0]) && isset($category_list[$this->root_category_id][0]->id)) {
                    $this->category_id = $category_list[$this->root_category_id][0]->id;
                } else
                    $this->category_id = $this->root_category_id; //Если нет подкатегорий, выбираем главную
                $this->param['category_id'] = $this->category_id;
//                else $this->setError("Подразделы меню не заполнены. Для заполнения перейдите в <a href='".$this->admin_rul."category/list/'>раздел меню</a>");
            }
//            else $this->setError("Разделы меню не заполнены. Для заполнения перейдите в <a href='".$this->admin_rul."category/list/'>раздел меню</a>");
        }
        else { //Выделяем рутовую категорию
            $category_list = $category->getCategoryId($this->param['category_id']);

            if (isset($category_list->id)) {
                $this->category_name = $category_list->name;
                $this->root_category_id = $category_list->parent_id;
                $this->category_id = $category_list->id;
            } else
                $this->setError("Раздел не найден");
        }
        $registry->root_category_id = $this->root_category_id; //Выделяем разделы меню
        $registry->category_id = $this->category_id; //Выделяем разделы меню
        //Подгрузка модуля выбора категорий
        $this->category_tree_list = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/product_list/0/16/");
    }

    public function minimizeAction() {
        if (isset($this->param['type'])) {
            if ($this->param['type'] == '2') {
                if (isset($_SESSION['admin_category_minimize']) && isset($_SESSION['admin_category_minimize'][$this->param['category_id']])) {
                    unset($_SESSION['admin_category_minimize'][$this->param['category_id']]);
                }
            } else {
                $_SESSION['admin_category_minimize'][$this->param['category_id']] = 1;
            }
        }
    }

    /**
     * Сортировка спец. предложений и новинок
     */
    public function product_param_sortAction() {
        Lavra_Loader::LoadModels("Products", "products");
        $products = new Products();

        if (isset($this->param['type'])) {
            $registry = Registry::getInstance();
            if (isset($_POST['sort'])) {
                $products->delSortParam($this->param['type'], $registry->shop_type);

                $i = 0;
                foreach ($_POST['sort'] as $product_id => $value) {
                    $products->addSortParam($product_id, $this->param['type'], $i, $registry->shop_type);
                    $i++;
                }

                CacheModule::delCacheModule('products');
                CacheModule::delCacheModule('Controller');
            }
            $this->get_products = $products->getProductsParam($this->param['type'], 0, 1000, 0, $registry->shop_type);
//            print_r($this->get_products);
        }
    }

    /**
     * Перемещает товар в другой магазин
     */
    private function _moveProductShop($product_id, $shop_id) {
        Lavra_Loader::LoadModels("MoveShopProduct", "products");

        $move = new MoveShopProduct();
        if ($shop_id == 2) {
            $move->moveLadyProductWoman($product_id);
        }
    }

}
