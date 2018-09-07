<?php

class findController extends Controller {

    public function findAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Find", "catalog");
        Lavra_Loader::LoadModels("Products", "products");
        $find = new Find();

//        Lavra_Loader::LoadModels("Characteristics", "characteristics");
//        $characteristic = new Characteristics();
//        $this->product_characteristic = $characteristic->getProductValuesAll();
//        $offset = $registry->page_count_product;
//        if (!isset($this->param['page'])) {
//            $this->param['page'] = 0;
//        } else
//            $this->param['page'] = (int) $this->param['page'];
//        $offset = 1000;
        $this->not_sort = 1;
        $this->is_find = 1;

        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        $characteristic = new Characteristics();
//        $this->product_characteristic = $characteristic->getProductValuesAll($registry->shop_type);
        $this->register_object('char_obj', $characteristic);
        $this->_getTemplateProductsCatalog(); //Шаблон вывода товаров

        if (isset($_GET['find'])) {
            $_POST['find'] = $_GET['find'];
        }
        if (isset($_POST['find'])) {
//            $_GET['not_detailed_catalog'] = 1;
//            $registry->open_category_id = $_POST['category_id'];
//            Lavra_Loader::LoadClass("Category");
//            $cat = new Category();
//            $get_category = $cat->getCategoryId($registry->open_category_id);
//            if (isset($get_category->parent_id)) {
//                $registry->open_category_parent_id = $get_category->parent_id;

            $products = new Products();

            $this->products = $find->quickFind($_POST['find'], 0, 100);
//            $this->count_all_products = $products->getLastCountQuery();
//            $this->count_products = ceil($this->count_all_products / $offset);
//            $this->select_page = $this->param['page'];

            $this->not_sort = 1;
            $images_products = array();
            foreach ($this->products as $key => $value) {
                $images_products[$key] = $products->getImages($value->id);
            }
            $this->product_images = $images_products;

//            if (count($this->dop_products)) {
//                $images_products = array();
//                foreach ($this->dop_products as $key => $value) {
//                    $images_products[$key] = $products->getImages($value->id);
//                }
//                $this->dop_product_images = $images_products;
//            }
//            }
        }
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $this->allCategories = $category->categoriesGroupedByParent();
        $this->register_object('category_obj', $category);
        $this->register_object('this', $this);
        $this->_filterWrapper(); //Грузиться из контроллера, т.к. на 2 модуля (catalog/find)
    }

    public function findCategoryAction() {
        /*
         * ТОЛЬКО ДЛЯ TO-CONNECT и Time Street
         */
        Lavra_Loader::LoadModels('Characteristics', 'characteristics');
        $char = new Characteristics();

        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Find", "catalog");
        Lavra_Loader::LoadModels("Products", "products");
        $price = new Find();
        $products = new Products();


        Lavra_Loader::LoadModels("Mod", "products");
        $mod = new Mod();

//        $this->product_mod_all = $mod->getModAll($this->product->id);

        $offset = $registry->page_count_product = 1000;
        if (!isset($this->param['page'])) {
            $this->param['page'] = 0;
        } else
            $this->param['page'] = (int) $this->param['page'];

        if (isset($_GET['find'])) {
            $_POST['find'] = $_GET['find'];
        }
        $this->is_category = 1;
        $this->not_sort = 1;
        $this->is_find = 1;
        if (isset($_GET['find'])) {
            $this->category_find = $price->quickFindCategory(trim($_GET['find']), (isset($_GET['shop_type']) ? $_GET['shop_type'] : $registry->shop_type));


            if (isset($this->param['category_pseudo_dir']) && !empty($this->param['category_pseudo_dir'])) {

                Lavra_Loader::LoadClass("Category");
                $category_obj = new Category();
                $category = $category_obj->getCategoryIdPseudoDir($this->param['category_pseudo_dir']);

//echo $category_id.'#';
                if (isset($category->id) && $category->id > 0) {

                    $this->products = $price->quickFindCategoryProducts($category->id, trim($_POST['find']), $this->param['page'] * $offset, $offset);

                    Lavra_Loader::LoadModels("Mod", "products");
                    $mod = new Mod();

                    $this->product_mod_all = $mod->getModAll();
                    $this->count_all_products = $products->getLastCountQuery();
                    $this->count_products = ceil($this->count_all_products / $offset);
                    $this->select_page = $this->param['page'];

                    $images_products = array();
                    foreach ($this->products as $key => $value) {
                        $images_products[$key] = $products->getImages($value->id);
                    }
                    $this->product_images = $images_products;
                }
            }
        }
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $this->register_object('category_obj', $category);
        $this->register_object('this', $this);
//        $this->_filterWrapper(); //Грузиться из контроллера, т.к. на 2 модуля (catalog/find)
    }

    /**
     * Подбор по характеристики! 
     *  В отличие от podborAction поиск идет по ид характеристики, а не ее значению
     */
    public function podborCharAction() {
        /*
         * ТОЛЬКО ДЛЯ TO-CONNECT и Time Street
         */
        Lavra_Loader::LoadModels('Characteristics', 'characteristics');
        $char = new Characteristics();
        $this->pictograms = $char->getPictogramsProductValuesAll(18);

        $registry = Registry::getInstance();
        if (isset($this->param['char_1_id'])) {
            $this->is_ajax = 1;
            Lavra_Loader::LoadModels("Products", "products");
            $products = new Products();
            if (!isset($this->param['char_1_id']))
                $this->param['char_1_id'] = 0;
            if (!isset($this->param['char_2_id']))
                $this->param['char_2_id'] = 0;
            if (!isset($this->param['char_3_id']))
                $this->param['char_3_id'] = 0;

            Lavra_Loader::LoadModels("Find", "catalog");
            $price = new Find();
            $products_arr = ($price->podborCharValue($this->param['char_1_id'], $this->param['char_2_id'], $this->param['char_3_id']));
            Lavra_Loader::LoadModels("Mod", "products");
            $mod = new Mod();
            $this->product_mod_all = $mod->getModAll();

            $this->products = $products_arr;

            $registry->podbor_char_1_id = $this->param['char_1_id'];

            $images_products = array();
            foreach ($this->products as $key => $value) {
                $images_products[$key] = $products->getImages($value->id);
            }
            $this->product_images = $images_products;
        }


        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        $characteristic = new Characteristics();
//        $this->product_characteristic = $characteristic->getProductValuesAll($registry->shop_type);
        $this->register_object('char_obj', $characteristic);
        $this->not_sort = 1;
        $this->not_podbor = 1;
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $this->register_object('category_obj', $category);
        $this->register_object('this', $this);
//        $this->_filterWrapper(); //Грузиться из контроллера, т.к. на 2 модуля (catalog/find)
    }

    /**
     * Подбор по значениям характеристик 
     * В отличии от podborCharAction поиск идет по значению характеристики
     */
    public function podborAction() {
        /*
         * ТОЛЬКО ДЛЯ TO-CONNECT и Time Street
         */
        Lavra_Loader::LoadModels('Characteristics', 'characteristics');
        $char = new Characteristics();
        Lavra_Loader::LoadClass("ApplicationDB");
        $registry = Registry::getInstance();
        /**
         * Только для to-conntect 
         */
        if (isset($this->param['category_id'])) {
            $this->open_category_id = $registry->open_category_id = $this->param['category_id'];
            $this->open_category_parent_id = $registry->open_category_parent_id = 0;

//            $this->char_values = $char->getValuesAll();
//            $this->char_product_values = $char->getValueIsProduct(); //Чтобы скрывать и показывать определенные значения
//            $this->top_menu_catalog = $category->getCategory(0);

            $this->podbor_category_id = $this->param['category_id'];

            /**/
            Lavra_Loader::LoadModels("Products", "products");
            $products = new Products();

            Lavra_Loader::LoadModels("Find", "catalog");
            $price = new Find();
            $char_2_id = $char_3_id = 0;
            if (!isset($this->param['brand_id']))
                $this->param['brand_id'] = 0;
            if (!isset($this->param['char_1_id']))
                $this->param['char_1_id'] = 0;
            $registry->open_char_1_id = $this->param['char_1_id'];
            $registry->open_brand_id = $this->param['brand_id'];



            $products_arr = $price->podbor($this->param['category_id'], $this->param['brand_id'], $this->param['char_1_id'], $char_2_id, $char_3_id);

            $this->products = $products_arr;


            Lavra_Loader::LoadModels("Mod", "products");
            $mod = new Mod();

            $this->product_mod_all = $mod->getModAll();
            $images_products = array();
            foreach ($this->products as $key => $value) {
                $images_products[$key] = $products->getImages($value->id);
            }
            $this->product_images = $images_products;
        }
        $this->not_sort = 1;




        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        $characteristic = new Characteristics();
//        $this->product_characteristic = $characteristic->getProductValuesAll($registry->shop_type);
        $this->register_object('char_obj', $characteristic);

        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $this->register_object('category_obj', $category);
        $this->register_object('this', $this);
        $this->_filterWrapper(); //Грузиться из контроллера, т.к. на 2 модуля (catalog/find)
    }

    protected function _sort(FindChar $products) {
        if (isset($_GET['sort'])) {
            $this->param['sort_method'] = $_GET['sort'];
        }
        if (isset($_GET['order'])) {
            $this->param['sort_ord'] = $_GET['order'];
        }
        if (isset($this->param['sort_method'])) {
            $this->sort_method = $this->param['sort_method'];
            switch ($this->param['sort_method']) {
                case 'price':
                case 'article':
                case 'name':
                case 'order':
                    $this->sort_method = $this->param['sort_method'];
                    $_SESSION['sort_method'] = $this->param['sort_method'];
                    break;
                default:
                    $this->sort_method = 'name';
            }
        } else {
            if (isset($_SESSION['sort_method'])) {
                $this->sort_method = $_SESSION['sort_method'];
            } else
                $this->sort_method = 'order';
        }

        if (isset($this->param['sort_ord'])) { //Метод сортировки
            switch ($this->param['sort_ord']) {
                case "asc":
                case "desc":
                    $this->sort_order = $this->param['sort_ord'];
                    $_SESSION['sort_ord'] = $this->param['sort_ord'];
                    break;
                default:
                    $this->sort_order = 'desc';
                    break;
            }
        } else {
            if (isset($_SESSION['sort_ord'])) {
                $this->sort_order = $_SESSION['sort_ord'];
            } else
                $this->sort_order = 'asc';
        }

        $products->setSort($this->sort_method, $this->sort_order);
    }

    public function find_selectionAction() {
        $registry = Registry::getInstance();
        $this->is_selection_find = 1;
        Lavra_Loader::LoadModels("Products", "products");
        Lavra_Loader::LoadModels("FindChar", "catalog");
        Lavra_Loader::LoadClass("Category");
        $products = new Products();
        $category = new Category();
        $find = new FindChar();


        if (!count($_POST) && isset($_GET['find-selection']) && $_GET['find-selection'] == '1') {
            $_POST = $_GET;
        }
        if (!count($_POST) && isset($_GET['find-selection']) && $_GET['find-selection'] == '1') {
            $_POST = $_GET;
        }

        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        $characteristic = new Characteristics();
//        $this->product_characteristic = $characteristic->getProductValuesAll($registry->shop_type);
        $this->register_object('char_obj', $characteristic);
        $this->_getTemplateProductsCatalog();

        $this->_sort($find);
        Lavra_Loader::LoadClass("Category");
        $category = new Category();

        if (isset($_GET['set_count'])) {
            $this->param['count_product'] = $_GET['set_count'];
        }
        if (isset($this->param['count_product'])) {
            $this->param['count_product'] = (int) $this->param['count_product'];
            if ($this->param['count_product'] >= 0) {
                $_SESSION['count_product'] = (int) $this->param['count_product'];
                $registry->page_count_product = $_SESSION['count_product'];
            }
        }

        if (isset($_GET['params'])) { //Серилизованный пост
            $_POST = unserialize(str_replace('@@@@', '"', stripslashes(urldecode($_GET['params']))));
        }
        $offset = $registry->page_count_product;
        if (!isset($_GET['page'])) {
            $this->param['page'] = 0;
        } elseif (isset($_GET['page']) && $_GET['page'] == 'all') {
            $this->param['page'] = 0;
            $this->not_page = 1;
            $offset = 1000;
        } elseif (isset($_GET['page'])) {
            $this->param['page'] = (int) $_GET['page'];
        }

//        Lavra_Loader::LoadModels("Mod", "products");
//        $mod = new Mod();
//        $this->product_mod_all = $mod->getModAll($this->product->id);
        if (isset($_POST['category_id'])) {
            $this->open_category_id = $registry->open_category_id = $_POST['category_id'];
            if (isset($_POST['char_value'])) {
                foreach ($_POST['char_value'] as $parent_value_id => $char_value_id) {
                    if (is_array($char_value_id)) {
                        foreach ($char_value_id as $key => $value) {
                            $find->addCharValueId($key, $parent_value_id); //Добавляем значения для поиска
                        }
                    } elseif ($char_value_id != 0) {
                        $find->addCharValueId($char_value_id, $parent_value_id); //Добавляем значения для поиска
                    }
                }
            }
            /* Диапозон характеристик (от и до) */
            if (isset($_POST['char_min_range']) && isset($_POST['char_max_range'])) {
                foreach ($_POST['char_min_range'] as $char_value_id => $value) {
                    $find->addCharRangeValueId($_POST['char_min_range'][$char_value_id], $_POST['char_max_range'][$char_value_id], $char_value_id);
                }
            }

//            if (isset($_POST['size_left']) && $_POST['size_left'] != '0') {
//                $find->setModName($_POST['size_left']);
//            }
            //Установка param-ов
            $find->setIsParam((isset($_POST['is_param_1']) ? $_POST['is_param_1'] : 0), (isset($_POST['is_param_2']) ? $_POST['is_param_2'] : 0), (isset($_POST['is_param_3']) ? $_POST['is_param_3'] : 0), (isset($_POST['is_param_4']) ? $_POST['is_param_4'] : 0), (isset($_POST['is_param_5']) ? $_POST['is_param_5'] : 0));
//            if (isset($_POST['is_discount']) && $_POST['is_discount'] == 1) {
//                $find->setIsDiscount(1);
//            }
//print_r($_POST);
            if (isset($_POST['category_id'])) {
                $find->addRootCategory($_POST['category_id']);
            }
            if (isset($_POST['max_price'])) {
                $find->setMaxPrice($_POST['max_price'][$_POST['category_id']]);
                $find->setMinPrice($_POST['min_price'][$_POST['category_id']]);
            }

            if (isset($_POST['brand_id'])) {
                $find->setBrandId($_POST['brand_id'][$_POST['category_id']]);
            }
            if (isset($_POST['brand_list'])) {
                foreach ($_POST['brand_list'] as $key => $value) {
                    $find->addBrandId($key);
                }
            }
            /* Если в адресе есть уточняющие характеристики */
            //Фильтруем по ним
            $selected_char_value_id = array();
            if (isset($_POST['desc_char'])) {
                foreach ($_POST['desc_char'] as $get_char_value_id) {
                    $find->setProductsCategoryesCharValue($get_char_value_id);
                    $selected_char_value_id[$get_char_value_id] = 1;
                }
                $this->selected_char_value_id = $selected_char_value_id;
            }
            if (isset($this->param['is_only_count']) && $this->param['is_only_count'] == 1) { //Если требуется показать только кол-во
                
                $count_find = count($find->find(0, 100000, (isset($_POST['min_is_param_1']) ? $_POST['min_is_param_1'] : 0), (isset($_POST['max_is_param_2']) ? $_POST['max_is_param_2'] : 0)));
                echo "Найдено: <b>" . ($count_find) . "</b>" . (($count_find > 0) ? "<a href=''>Показать</a>" : '<span>Показать</span>');
                exit();
            } else {
                $this->products = $find->find($this->param['page'] * $offset, $offset, (isset($_POST['min_is_param_1']) ? $_POST['min_is_param_1'] : 0), (isset($_POST['max_is_param_2']) ? $_POST['max_is_param_2'] : 0), $registry->shop_type);

                $this->count_all_products = $find->getLastCountQuery();
                $this->count_products = ceil($this->count_all_products / $offset);
                $this->select_page = $this->param['page'];

                $images_products = array();
                foreach ($this->products as $key => $value) {
                    $images_products[$key] = $products->getImages($value->id);
                    $value->chars = $characteristic->getCharacteristicValueProduct($value->id);
                }
                $this->product_images = $images_products;
                $this->is_show_count_product = 1;
            }
        }
        
        $this->allCategories = $category->categoriesGroupedByParent();
//        $_POST['pokrutie'];
//        $_POST['pol'];
//        $_POST['korpus'];
//        $_POST['braslet'];
//        $_POST['mex'];
//        $_POST['color-braslet'];
//        $_POST['min_price'];
//        $_POST['max_price'];
        $this->register_object('category_obj', $category);
        $this->register_object('this', $this);
        $this->_filterWrapper(); //Грузиться из контроллера, т.к. на 2 модуля (catalog/find)
    }

    public function charAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("CharacteristicsTech", "characteristics_tech");
        $characteristic_tech = new CharacteristicsTech();

        //Все категории
        $this->characteristics_tech = $characteristic_tech->getCharacteristics();

        $this->characteristics_tech_type = $characteristic_tech->getValuesAll();


        Lavra_Loader::LoadModels("Mod", "products");
        $mod = new Mod();

        $this->product_mod_all = $mod->getModAll();

        Lavra_Loader::LoadModels("Products", "products");
        $products = new Products();
        if (isset($_POST['max_price'])) {
            Lavra_Loader::LoadModels("FindChar", "catalog");
            $find = new FindChar();
            if (isset($_POST['char_value'])) {
                foreach ($_POST['char_value'] as $char_value_id => $parent_value_id) {
                    $find->addCharValueId($char_value_id, $parent_value_id); //Добавляем значения для поиска
                }
            }

            if (isset($_POST['category'])) { //Если стоит фильтр по категориям
                foreach ($_POST['category'] as $category_id => $value) {
                    $find->addRootCategory($category_id);
                }
            } else {
                $find->addRootCategory(684);
                $find->addRootCategory(685);
//            $find->addRootCategory(686);
//            $find->addRootCategory(687);
            }


            $find->setMaxPrice($_POST['max_price']);
            $find->setMinPrice($_POST['min_price']);
            $this->products = $find->find();

            $images_products = array();
            foreach ($this->products as $key => $value) {
                $images_products[$key] = $products->getImages($value->id);
            }
            $this->product_images = $images_products;
        }
    }

}
