<?php

class catalogController extends Controller {
    /* Управление фильтрами */

    public function podborAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Podbor");
        $podbor = new Podbor();
        $podbor->generateForm();
        $this->get_chars_podbor = $registry->get_chars_podbor;
        $this->selection_brands = $registry->selection_brands;
        $this->get_section = $registry->get_section;
        $this->category_price = $registry->category_price;
    }

    public function brand_listAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels('Brand', 'brand');
        $brand = new Brand();
        $this->all_brands = $brand->getBrands($registry->shop_type);
    }

    public function catalogAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
//print_r($this->param);
//exit();

        /**
         * ТОЛЬКО ДЛЯ TO-CONNECT  и Time Street
         */
//        $this->char_values = $char->getValuesAll();
//        $this->char_product_values = $char->getValueIsProduct(); //Чтобы скрывать и показывать определенные значения
//        $this->top_menu_catalog = $category->getCategory(0);

        /* Только для Time Street (вывод пиктограмм к товарам) */
//        $this->pictograms = $char->getPictogramsProductValuesAll(18);

        /**
         * Подгрузка характеристик в список товаров 
         * Для леди-макс
         */
        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        $characteristic = new Characteristics();

        $this->_getTemplateProductsCatalog(); //Шаблон вывода товаров




        $this->setAction(); //Показать по ..
//        Lavra_Loader::LoadModels("Mod", "products");
//        $mod = new Mod();

        /**/
        Lavra_Loader::LoadModels("Products", "products");
        $products = new Products();

        Lavra_Loader::LoadClass('ApplicationDB');
        $app = new ApplicationDB();
        $this->is_main = $registry->is_main;

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
        /* Если в адресе есть уточняющие характеристики */
//        $this->_addFilterChar();
//        print_r($char_in_product_arr);
        if ((isset($this->param['pseudo_dir']) && !empty($this->param['pseudo_dir']) && $this->param['pseudo_dir'] != 'all') || (isset($this->param['id']) && $this->param['id'] > 0)) {
            $this->_sort($products); //Сортировка

            if (isset($this->param['pseudo_dir'])) {
                $this->pseudo_dir = $this->param['pseudo_dir'];
            } else {
                $this->param['pseudo_dir'] = null;
                $this->pseudo_dir = null;
            }

            $this->pseudo_dir = $this->param['pseudo_dir'];

            if (isset($this->param['id']) && $this->param['id'] > 0) { //Открываем категорию по id-шнику
                $category_obj = $category->getCategoryId($this->param['id']);
            } else { //Открываем категорию по адресу
                $category_obj = $category->getCategoryIdPseudoDir($this->param['pseudo_dir']);
            }

            if (isset($category_obj->id)) {
                //Если у открытой характеристики есть эквиваленты, то ищем похожие товары (например с этим же камнем)
//                if ($category_obj->shop_id != $registry->shop_type) {
//                    $this->log404();
//                    header("HTTP/1.0 404 Not Found");
//                    header("Location: " . $registry->base_url . '404/');
//                    exit();
//                }

                $registry->is_open_catalog = 1;

                $this->categoryes = $category->getChildCategoryCountProducts(0, $category_obj->id);
                $this->category = $category_obj;
                $this->category_id = $this->category->id;


//                Lavra_Loader::LoadModels('vsProduct', 'vs_product');
//                $vs = new vsProduct();
//                $this->product_root_category = $vs->getRootCategory($category_obj->id);
                //Вывод всех товаров

                $get_products = $products->getPrpductsCategoryes(array_merge(array($category_obj->id => $category_obj->id), $app->getChildsCategory(0, $category_obj->id)), $registry->is_warehouse, 
                        1, $this->param['page'] * $offset, $offset, 
                        $registry->shop_type
                        );
                
                //Стандартный вывод
//                $this->products = $products->getProducts($category_obj->id, $registry->is_warehouse, 1, $this->param['page'] * $offset, $offset);
                $this->products = $get_products['result'];
                $this->count_all_products = $get_products['count'];

                $this->count_products = ceil($this->count_all_products / $offset);
                $this->select_page = $this->param['page'];
                $this->open_category_id = $registry->open_category_id = $category_obj->id;
                $this->open_category_parent_id = $registry->open_category_parent_id = $category_obj->parent_id;

                /**
                 * 
                 */
                $get_meta_chars = null;
//                if (count($this->_char_title_meta) > 0) {
//                    Lavra_Loader::LoadModels("DescChar", "characteristics");
//                    $deac_char = new DescChar();
//                    $get_meta_chars = $deac_char->getDescCharMeta($category_obj->id, (isset($this->_char_title_meta[0]) ? $this->_char_title_meta[0] : 0), (isset($this->_char_title_meta[1]) ? $this->_char_title_meta[1] : 0), (isset($this->_char_title_meta[2]) ? $this->_char_title_meta[2] : 0), (isset($this->_char_title_meta[3]) ? $this->_char_title_meta[3] : 0));
//                }
//                if (isset($get_meta_chars->id)) {
//                    $registry->head_title = ($get_meta_chars->title ? $get_meta_chars->title : $get_meta_chars->name);
//                    $registry->head_key = ($get_meta_chars->meta_key ? $get_meta_chars->meta_key : $get_meta_chars->name);
//                    $registry->head_desc = ($get_meta_chars->meta_desc ? $get_meta_chars->meta_desc : $get_meta_chars->name);
//                    $this->h1 = ($get_meta_chars->name ? $get_meta_chars->name : $get_meta_chars->name);
//                    $this->bread_desc_char = ($get_meta_chars->name ? $get_meta_chars->name : $get_meta_chars->name);
//                    $category_obj->text_bottom = $get_meta_chars->desc;
//                    $category_obj->text_top = '';
//                } else {
                $registry->head_title = ($category_obj->title ? $category_obj->title : $category_obj->name) . ((isset($this->param['page']) && $this->param['page'] > 0) ? ' - Страница ' . ($this->param['page'] + 1) : '');
                //echo $registry->head_title;
                $registry->head_key = ($category_obj->meta_key ? $category_obj->meta_key : $category_obj->name);
                $registry->head_desc = ($category_obj->meta_desc ? $category_obj->meta_desc : $category_obj->desc);
                $this->h1 = ($category_obj->h1 ? $category_obj->h1 : $category_obj->name);
//                }
                $registry->open_category_obj = $category_obj;


                $this->catalog = $category_obj;

                $category->getFullAdressCategory($category_obj->id, 0, -1);
                $this->bread_page_arr = $category->getFullAdressCategoryArr();

                $this->content_text = CacheModule::getWrapperModule("page-catalog-" . $this->param['pseudo_dir'] . '-' . $registry->shop_type, $this->getFindModule(Lavra_Loader::getLoadModule('page', "/page/catalog/" . $this->param['pseudo_dir'] . "/")));
                $images_products = array();
                $price = 1000000;
                foreach ($this->products as $key => $value) {
//                    echo "$value->price\n";
                    if ($price > $value->price) {
                        $price = $value->price;
                    }
                    $images_products[$key] = $products->getImages($value->id);
                }
//                echo 'dd';
                $this->product_images = $images_products;

                if ($price < 1000000) {
                    $registry->head_title = str_replace('#price_from#', $price, $registry->head_title);
                    $registry->head_desc = str_replace('#price_from#', $price, $registry->head_desc);
                }


                /**
                 * Выводим все товары содержащие характеристику (например)
                 * ГЛЮК!!! Отсеиваются товары только с первой страницы $this->products
                 */
//                print_r($char_in_product_arr);
                if ($registry->isMobile != 1) {
                    
                }
            } else { //Если открыта /catalog/
            }
        } elseif ($registry->isMobile != 1) {
            $this->_sort($products); //Сортировка
//            $get_products = $products->getPrpductsCategoryes(array_merge(array(0 => 0), $app->getChildsCategory(0, 0)), $registry->is_warehouse, 1, $this->param['page'] * $offset, $offset, $registry->shop_type);
//
//            $this->products = $get_products['result'];
//            $this->count_all_products = $get_products['count'];
            $this->products = array();
            $this->count_products = ceil($this->count_all_products / $offset);
            $this->select_page = $this->param['page'];
            $this->open_category_id = $registry->open_category_id = 0; //$category_obj->id;

            $this->open_category_parent_id = $registry->open_category_parent_id = 0; // $category_obj->parent_id;
//            if (count($this->_char_title_meta) > 0) {
//                Lavra_Loader::LoadModels("DescChar", "characteristics");
//                $deac_char = new DescChar();
//                $get_meta_chars = $deac_char->getDescCharMeta(0, (isset($this->_char_title_meta[0]) ? $this->_char_title_meta[0] : 0), (isset($this->_char_title_meta[1]) ? $this->_char_title_meta[1] : 0), (isset($this->_char_title_meta[2]) ? $this->_char_title_meta[2] : 0), (isset($this->_char_title_meta[3]) ? $this->_char_title_meta[3] : 0));
//            }

            Lavra_Loader::LoadModels("Pages", "page");
            $page = new Pages();
            $page_id = 8;

            $get_catalog_page = $page->getPage($page_id, $registry->shop_type);

            $bread_catalog_root = array();
            if (isset($get_catalog_page->id)) {
                $bread_catalog_root[0]['link'] = 'bizhuteriya/';
                $bread_catalog_root[0]['name'] = $get_catalog_page->header;
            }
            if (isset($get_meta_chars->id)) {
                $registry->head_title = ($get_meta_chars->title ? $get_meta_chars->title : $get_meta_chars->name);
                $registry->head_key = ($get_meta_chars->meta_key ? $get_meta_chars->meta_key : $get_meta_chars->name);
                $registry->head_desc = ($get_meta_chars->meta_desc ? $get_meta_chars->meta_desc : $get_meta_chars->name);
                $this->h1 = ($get_meta_chars->name ? $get_meta_chars->name : $get_meta_chars->name);
                $this->category_text = $get_meta_chars->desc;

                $bread_catalog_root[1]['name'] = $get_meta_chars->name;
            } else {
                if ( ! $get_catalog_page) {
                    $get_catalog_page = new stdClass();
                }
                if ( ! isset($get_catalog_page->header)) {
                    $get_catalog_page->header = 'Каталог';
                }
                $registry->head_title = 
                    (isset($get_catalog_page->title) && ($get_catalog_page->title) ? $get_catalog_page->title : $get_catalog_page->header) . 
                    ((isset($this->param['page']) && $this->param['page'] > 0) ? ' - Страница ' . ($this->param['page'] + 1) : '');

                $registry->head_key = (
                    isset($get_catalog_page->meta_keyword) && ($get_catalog_page->meta_keyword) ? $get_catalog_page->meta_keyword : $get_catalog_page->header);

                $registry->head_desc = (isset($get_catalog_page->meta_desc) && $get_catalog_page->meta_desc ? $get_catalog_page->meta_desc : $get_catalog_page->header);
                $this->category_text = isset($get_catalog_page->text) ? $get_catalog_page->text : '';

                $this->bread_catalog_root = $get_catalog_page->header;
//            $registry->open_category_obj = $category_obj;
            }

            $this->bread_catalog_root = $bread_catalog_root;


            $images_products = array();
            $price = 1000000;
            foreach ($this->products as $key => $value) {
                $images_products[$key] = $products->getImages($value->id);
                if ($price > $value->price) {
                    $price = $value->price;
                }
            }
            if ($price < 1000000) {
                $registry->head_title = str_replace('#price_from#', $price, $registry->head_title);
                $registry->head_desc = str_replace('#price_from#', $price, $registry->head_desc);
            }
            $this->product_images = $images_products;
            $this->categoryes = $category->getChildCategoryCountProducts(0, 0);
            $this->category_id = 0;
        } else {
            $this->categoryes = $category->getChildCategoryCountProducts(0, 0);
        }
        $this->allCategories = $category->categoriesGroupedByParent();



        $this->register_object('char_obj', $characteristic);



        //Показ графический подкатегорий

        if ($registry->isMobile == 1) {
//            $this->child_categoryes = $category->getChildCategory($registry->open_category_id, 1, 0, $registry->shop_type);
        } elseif (isset($registry->open_category_id) && $registry->open_category_id > 0) {
//            $this->child_categoryes = $category->getChildCategory($registry->open_category_id, 1, 0);
//            print_r($this->child_categoryes);
//            if (count($this->child_categoryes)) { //Если у категории есть потомки, то выводим спец. предложения потомков
//                //    $this->getProductParamAction(5, $registry->open_category_id, 10, 0, 1);
//            }
        }
        // 
        $this->register_object('category_obj', $category);
        $this->register_object('this', $this);
        $this->_filterWrapper(); //Грузиться из контроллера, т.к. на 2 модуля (catalog/find)
    }

    /*
     * $is_run_catalog != 0 если вызов идет внутри модуля catalog
     * 
     *  Методы заданы чтобы action можно было запускать не только из отдельных модулей
     * но и использовать как функцию
     */

    public function getProductParamAction($param_id = 0, $category_id = 0, $limit = 800, $offset = 0, $is_run_catalog = 0) {

        $registry = Registry::getInstance();
        $this->_getTemplateProductsCatalog();
        Lavra_Loader::LoadModels("Products", "products");
        $products = new Products();
        if (isset($this->param['param_id']) || $param_id > 0) {
            if (!isset($this->param['param_id']))
                $this->param['param_id'] = $param_id;
            if (!isset($this->param['category_id']))
                $this->param['category_id'] = $category_id; //Поиск во всех категориях если = 0
            if (!isset($this->param['limit']))
                $this->param['limit'] = $limit;
            if (!isset($this->param['offset']))
                $this->param['offset'] = $offset;
//            $products->setSort('desc_8*1', 'ASC');
            if ($this->param['param_id'] == '1') {
                $products->setSort('old_price', 'DESC');
            } else {
                $products->setSort('`order`', 'ASC');
            }
            if (isset($this->param['param_id']) && $this->param['param_id'] == 3) { //Если новинки
                $products->setSort('created', 'DESC');
            }
            Lavra_Loader::LoadModels("Characteristics", "characteristics");
            $characteristic = new Characteristics();


//print_r($this->param);
            $get_products = $products->getProductsParam((int) $this->param['param_id'], (int) $this->param['category_id'], (int) $this->param['limit'], (int) $this->param['offset'], $registry->shop_type);

            $get_products = $get_products['result'];
            $images_products = array();
            foreach ($get_products as $key => $value) {
                $images_products[$key] = $products->getImages($value->id);
            }

            /* Обход глюка вызова модуля из модуля */
            if ($is_run_catalog == 0) { //Если запуск был из любого модуляprint_r($get_products);
                $this->products = $get_products;
                $this->product_images = $images_products;
            } else { //Если запуск был из модуля catalog
                $this->products_param = $get_products;
                $this->product_images_param = $images_products;
            }
            $this->register_object('this', $this);
            $this->register_object('char_obj', $characteristic);
        }
    }

    private function _sort(Products $products) {
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

    public function brandAction() {
        $registry = Registry::getInstance();
        /*
         * ТОЛЬКО ДЛЯ TO-CONNECT и Time Street
         */
        $this->_getTemplateProductsCatalog(); //Шаблон вывода товаров
        $this->setAction(); //Показать по ..

        Lavra_Loader::LoadModels('Characteristics', 'characteristics');
        $char = new Characteristics();

        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        $characteristic = new Characteristics();
//        $this->product_characteristic = $characteristic->getProductValuesAll($registry->shop_type);
        $this->register_object('char_obj', $characteristic);

        $this->is_show_count_product = 1;
//        $this->pictograms = $char->getPictogramsProductValuesAll(18);
//        $this->product_characteristic = $char->getProductValuesAll();

        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Products", "products");

        Lavra_Loader::LoadClass("Category");
        $category = new Category();


        Lavra_Loader::LoadModels("Mod", "products");
        $mod = new Mod();

//        $this->product_mod_all = $mod->getModAll($this->product->id);

        Lavra_Loader::LoadModels("Brand", "brand");
        Lavra_Loader::LoadClass("Application");
        $products = new Products();
        $brand = new Brand();
        $this->is_brand = 1;
//        $this->not_sort = 1;
        if (!isset($this->param['brand'])) {
            $this->param['brand'] = 0;
        }

        if (isset($this->param['page'])) {
            if (!is_numeric($this->param['page'])) {
                throw new Exception;
            }
        }

        if (isset($this->param['sort_method'])) {
            switch ($this->param['sort_method']) {
                case 'price':
                    break;
                case 'article':
                    break;
                case 'brand':
                    break;
                case 'name':
                    break;
                case 'order':
                    break;
                default:
                    throw new Exception;
                    break;
            }
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

        $this->_sort($products);
        $this->sort_url = $this->url . $registry->catalog_dir . '/brand/' . $this->param['brand'] . '/';
        $registry->selected_brand_name = ($this->param['brand']);

        $this->product_root_category = 0;

        if (isset($this->param['pseudo_dir'])) { //По ЧПУ
            $brand_category_obj = $brand->getBrandCategoryPseudoDir($this->param['pseudo_dir']);

            if (isset($brand_category_obj->id)) {
//                $registry->open_category_id = 
                $this->open_category_id = $brand_category_obj->category_id;
                $_GET['is_category_brand_id'] = $brand_category_obj->category_id;

                $brand_obj = $brand->getBrandId($brand_category_obj->brand_id);
            } else {
                throw new Exception;
            }
            ///
        } elseif ($this->param['brand'] != '0') { //по id-шнику
            $brand_obj = $brand->getBrandPseudoDir($this->param['brand']);
        }

        if (isset($brand_obj->id)) { //Если выбран определенный производитель
            $this->brand_id = $registry->brand_id = $brand_obj->id;
            $this->brand_pseudo_dir = $brand_obj->pseudo_dir;
            $this->brand_icon = $brand_obj->icon;
            $this->brand_text_top = $brand_obj->desc; // Было :: $this->brand_text_top = $brand_obj->text_top;
            $this->brand_text_bottom = $brand_obj->text_bottom;
            $registry->head_title = ($brand_obj->title ? $brand_obj->title : $brand_obj->name);
            $registry->head_key = ($brand_obj->meta_key ? $brand_obj->meta_key : $brand_obj->name);
            $registry->head_desc = ($brand_obj->meta_desc ? $brand_obj->meta_desc : $brand_obj->name);

            $this->brand_name = ($brand_obj->h1 ? $brand_obj->h1 : $brand_obj->name);

            $this->brands_categoryes = $brand->getBrandCategoryes($brand_obj->id);
            $this->is_brand_id = 1;
            if (isset($_GET['is_category_brand_id'])) {
                $return = $products->getBrandCategoryId($brand_obj->id, $_GET['is_category_brand_id'], $this->param['page'] * $offset, $offset);

                $category = new Category();
                $get_category = $category->getCategoryId($_GET['is_category_brand_id']);

                if (isset($get_category->name)) {
                    $this->brand_name = $brand_obj->name . ' - ' . $get_category->name;
//                    $registry->head_title = $brand_obj->name . ' - ' . $get_category->name;

                    if (isset($brand_category_obj->id)) {

                        $registry->head_title = ($brand_category_obj->title ? $brand_category_obj->title : $brand_obj->name . ' - ' . $get_category->name);
                        $registry->head_key = ($brand_category_obj->meta_key ? $brand_category_obj->meta_key : $brand_obj->name);
                        $registry->head_desc = ($brand_category_obj->meta_desc ? $brand_category_obj->meta_desc : $brand_obj->name);
                        $this->brand_name = ($brand_category_obj->h1 ? $brand_category_obj->h1 : $brand_obj->name . ' - ' . $get_category->name);

                        $this->pseudo_dir = $brand_category_obj->pseudo_dir; // Было :: $this->brand_text_top = $brand_obj->text_top;
                        $this->brand_text_bottom = $brand_category_obj->desc; // Было :: $this->brand_text_top = $brand_obj->text_top;
                    }

                    $this->brand_text_top = '';
                }
            } else {
                $return = $products->getPrpductsBrand($brand_obj->id, $this->param['page'] * $offset, $offset);
            }

            $this->allCategories = $category->categoriesGroupedByParent();
            $this->products = $return['result'];
            $this->count_all_products = $return['count'];
            $this->count_products = ceil($this->count_all_products / $offset);
            $this->select_page = $this->param['page'];
            $this->sort_url = $this->url . $registry->catalog_dir . '/all/' . $this->param['page'] . '/';


            $images_products = array();
            foreach ($this->products as $key => $value) {
                $images_products[$key] = $products->getImages($value->id);
            }
            $this->product_images = $images_products;
        } else { //Если производитель не найден, выводим все бренды
            if (isset($this->param['brand']) && $this->param['brand'] == '0') {
                $this->all_brands = $brand->getBrands($registry->shop_type);
            } else {
                print_r($this->param);
                print_r($_GET);

                throw new Exception;
            }
        }

        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $this->register_object('category_obj', $category);
        $this->register_object('this', $this);
    }

    /**
     * Новинки продукции
     */
    public function getNewsProductAction() {
        $this->not_sort = 1;
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Category");
        Lavra_Loader::LoadModels("Products", "products");
        $products = new Products();
        if (!isset($this->param['limit']))
            $this->param['limit'] = 10;
        if (!isset($this->param['category_id']))
            $this->param['category_id'] = 0;
        if ($this->param['category_id'] > 0) {
            $cat = new Category();
            $category = $cat->getCategoryId($this->param['category_id']);
            if (isset($category->type)) {
                if ($category->type != 0) { //Если открыт не каталог
                    $this->param['category_id'] = 0;
                }
            } else
                $this->param['category_id'] = 0;
        }
        $this->products = $products->getNewsProducts($this->param['category_id'], $this->param['limit']);
        if (count($this->products) == 0) { //Если продуктов нет, то выводим из общего списка
            $this->products = $products->getNewsProducts(0, $this->param['limit']);
        }
        if (count($this->products) > 1) {
            $images_products = array();
            foreach ($this->products as $key => $value) {
                $images_products[$key] = $products->getImages($value->id);
            }
            $this->product_images = $images_products;
        }
    }

    /**
     * ТОП продоваемых продуктов
     */
    public function getTopProductAction() {
        $this->not_sort = 1;
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Category");
        Lavra_Loader::LoadModels("Products", "products");
        $products = new Products();
        if (!isset($this->param['limit']))
            $this->param['limit'] = 10;
        if (!isset($this->param['category_id']))
            $this->param['category_id'] = 0;
        if ($this->param['category_id'] > 0) {
            $cat = new Category();
            $category = $cat->getCategoryId($this->param['category_id']);
            if (isset($category->type)) {
                if ($category->type != 0) { //Если открыт не каталог
                    $this->param['category_id'] = 0;
                }
            } else
                $this->param['category_id'] = 0;
        }

        $this->products = $products->getTopProducts($this->param['category_id'], $this->param['limit']);

        if (count($this->products) == 0) { //Если продуктов нет, то выводим из общего списка
            $this->products = $products->getTopProducts(0, $this->param['limit']);
        }
        if (count($this->products) > 0) {
            $images_products = array();
            foreach ($this->products as $key => $value) {
                $images_products[$key] = $products->getImages($value->id);
            }
            $this->product_images = $images_products;
        }
    }

    public function getRandomProductsAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Products", "products");
        $products = new Products();
        if (!isset($this->param['limit'])) {
            $this->param['limit'] = 5;
        }
        $this->products = $products->getRandomProducts($this->param['limit']);

        $images_products = array();
        foreach ($this->products as $key => $value) {
            $images_products[$value->id] = $products->getImages($value->id);
        }
        $this->product_images = $images_products;
    }

    /**
     * Ajax подгрузка характеристик в каталоге 
     */
    public function getCharProductAction() {
        if (isset($this->param['product_id'])) {
            $registry = Registry::getInstance();
            Lavra_Loader::LoadModels("CharacteristicsTech", 'characteristics_tech');
            $characteristic_tech = new CharacteristicsTech();

            //Технические характеристики
            $this->characteristics_tech = $characteristic_tech->getCharacteristicProduct($this->param['product_id']);
            $this->characteristics_tech_type = $characteristic_tech->getCharacteristicTypeProduct($this->param['product_id']);
            $this->characteristics_tech_product = $characteristic_tech->getCharacteristicValueProduct($this->param['product_id']);
        }
    }

    public function setAction() {
        $registry = Registry::getInstance();
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
        if (isset($_GET['url'])) { //Редирект
            header('Location: ' . $_GET['url']);
        }
    }

    public function add_to_favAction() {
        if (isset($_SESSION['fav']) && isset($_SESSION['fav'][$_POST['id']])) {
            unset($_SESSION['fav'][$_POST['id']]);
            echo 0;
        } else {
            $_SESSION['fav'][$_POST['id']] = 1;
            echo 1;
        }
    }

    public function favAction() {
        Lavra_Loader::LoadModels("Products", "products");
        $productsModel = new Products();

        $products = $productsModel->getFav();
        $this->products = $products['result'];
        $this->count_all_products = $products['count'];
        
        $images_products = array();
        if ($this->products) {
            foreach ($this->products as $key => $value) {
                $images_products[$key] = $productsModel->getImages($value->id);
            }
        }
        $this->product_images = $images_products;

    }

}
