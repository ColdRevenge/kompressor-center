<?php

class MainController extends Controller {

    private function _getContent() {
        $registry = Registry::getInstance();
        $return = null;
        /**
         * Кеш НЕЛЬЗЯ включить, т.к. функция возвращает уже сформированный контент, а registry не записываются!
         * ajax особенно (кол-во товара, позиции товара, сортировка по цене..)
         * ПОЧЕМУ-ТО ЭТА ФУНКЦИЯ ПРИБОВЛЯЕТ 15 SQL ЗАПРОСОВ В КАРТОЧКЕ ТОВАРА!!! - if ($this->param[module] != products)...
         * ПРОВЕРИТЬ!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
         */
//        $cache = Cache::getInstance();
//        $get_cache = $cache->get('Routes-_getContent-' . $registry->config->getCurrentUrl(), 'Routes');
        if ($this->param['module'] == 'products') { //Если это продукт то сразу его и открываем
            $return = Lavra_Loader::getLoadModule($this->param['module']);
        } else {

//        if (empty($get_cache)) {
            $page = new Pages();
//            print_r($this->param);
//echo $registry->config->getCurrentUrl() . '<br/>';

            $page_id = CacheModule::getWrapperModule('page-getPageIdAdressValidate-' . md5($registry->isMobile . '-' . $registry->config->getCurrentUrl()) . '-' . $registry->shop_type, $page->getPageIdAdressValidate($registry->config->getCurrentUrl()));

//echo $pseudo_dir;
            if ($page_id != false) { //Если страница была найдена
//            $this->param['pseudo_dir'] = $pseudo_dir;
                $this->param['module'] = 'page';
                $return = $this->getFindModule(Lavra_Loader::getLoadModule('page', '/page/id/' . $page_id));
            } else {


                $category = new Category();
                $category_id = $category->getCategoryIdAdressValidate($registry->config->getCurrentUrl());
                if ($category_id != false) {//CacheModule::getWrapperModule('catalog-id-' .
                    $return = $this->getFindModule(Lavra_Loader::getLoadModule('catalog', '/catalog/id/' . $category_id));
                } elseif ($registry->config->getCurrentUrl() != '/404/') { //Если модуль не каталог
                    try {
                        $return = $this->getFindModule(Lavra_Loader::getLoadModule($this->param['module']));
                    } catch (Exception $e) { //Если модуль не найден и исключаение
                        $page_id = $page->getPageIdAdressValidate($registry->config->getCurrentUrl(), false); //Повторный поиск страницы, если меню скрыто или не существует в клиенской части
                        if ($page_id != false) { //Если страница была найдена
//            $this->param['pseudo_dir'] = $pseudo_dir;
                            $this->param['module'] = 'page';
                            $return = $this->getFindModule(Lavra_Loader::getLoadModule('page', '/page/id/' . $page_id));
                        } else {

                            if ($_SERVER['REMOTE_ADDR'] == '94.199.111.134') {
                                print_r($e->getMessage());
                            } else {
                                $cac = Cache::getInstance(); //Очищаем маршруты на случай если они из кеша беруться
                                $cac->deleteTag('Category');
                                $cac->deleteTag('Routes');
                                $this->log404();
                                header("location: " . $registry->base_url . '404/');
                            }
                        }
                    }
                }
            }
        }

//            $cache->setTags('Routes-_getContent-' . $registry->config->getCurrentUrl(), $return, 'Routes');
        return $return;
//        } else {
//            return $get_cache;
//        }
    }

    public function indexAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        Lavra_Loader::LoadModels("Pages", "page");
        $page = new Pages();
        Lavra_Loader::LoadModels("Products", "products");
        $productsModel = new Products();
        $this->register_object('page_obj', $page);
        if ($registry->shop == 'forum') {
        } else {
            $registry->basket_count = 0;
            $registry->is_open_product = 0;
            $registry->podbor_char_1_id = 0;
            Lavra_Loader::LoadClass("Counter");
            $counter = new Counter();
            $counter->count();
            Lavra_Loader::LoadModels('News', 'news');
            /* Объекты посылаем в шаблон   */
            $this->register_object('page_obj', $page);
            $this->register_object('category_obj', $category);
            $this->register_object('this', $this);
            $registry->is_main = 0;
            $registry->is_open_catalog = 0;
            $registry->open_brand_id = $registry->open_char_1_id = 0;
            $registry->brand_id = 0;
            $registry->open_category_parent_id = 0;
            $registry->open_category_id = 0;
            $registry->open_news_id = 0;
            $registry->products_in_category = array(); //Товары из этой же категории
            $registry->product_in_category_name = null; //Имя категории
            $registry->open_category_obj = null; //Хранит объект открытой категории

            //Новость последняя новость
            if ($this->is_main != 1) {
                $news = new News();
                $get_news = $news->getNews(1, 4, 0, $registry->shop_type);
                $this->last_news = $get_news['result'];

                $get_articles = $news->getNews(3, 4, 0, $registry->shop_type);
                $this->last_articles = $get_articles['result'];
            }

            //last_articles
            $this->register_object('setFile', $this);
            Lavra_Loader::LoadClass("Application");
            $app = new Application();
            $this->months = $app->getMonths();

            /**
             * Настройки по-умолчанию
             */
            Lavra_Loader::LoadModels('Setting', 'setting');
            $setting = new Setting();
            $set = $setting->getGeneral();
            $this->setting = $set;
            $registry->head_title = $registry->shop_name;
            $registry->head_key = $set->meta_key;
            $registry->head_desc = $set->meta_desc;
            $this->footer_left = $set->footer_left;
            $this->footer_right = $set->footer_right;
            $this->set = $set;
            if ($registry->config->getCurrentUrl() != '/404/') {
                if (!isset($this->param['module']) || empty($this->param['module'])) {
                    $this->param['module'] = 'page';
                    $this->param['pseudo_dir'] = 'main';
                    $this->is_main = 1;
                    $registry->is_main = 1;

                    Lavra_Loader::LoadClass("Podbor");
                    $podbor = new Podbor();
                    $podbor->generateForm();
                    $this->get_chars_podbor = $registry->get_chars_podbor;
                    $this->selection_brands = $registry->selection_brands;
                    $this->get_section = $registry->get_section;
                    $this->category_price = $registry->category_price;
                } elseif (isset($this->param['module'])) {
                    $this->content = $this->_getContent();
                }
                if (isset($this->param['pseudo_dir']) && $this->param['pseudo_dir'] == 'main') {
                    $this->content = $this->getFindModule(Lavra_Loader::getLoadModule('page', "/page/main/"));
                    $this->is_main = 1;
                    $registry->is_main = $this->is_main;
                }
            } else {
                header("HTTP/1.0 404 Not Found");
            }

            $this->basket = Lavra_Loader::getLoadModule("basket", 'basket/list/');



//        print_r($this->categoryes)       ;

            $this->is_main = 0;
            if (!isset($this->param['module']) || empty($this->param['module'])) {
                $this->param['module'] = 'page';
                $this->param['pseudo_dir'] = 'main';
                $this->is_main = 1;
                $registry->is_main = 1;
            }

            /**
             * Определение сатегории_id
             */
            if (isset($this->param['pseudo_dir']) && !isset($registry->open_category_id)) {
                $open_category = $category->getCategoryIdPseudoDir($this->param['pseudo_dir']);
                if (isset($open_category->id)) {
                    $registry->open_category_id = $open_category->id;
                    $registry->open_category_parent_id = $open_category->parent_id;
                } else { //Со страниц
                    $open_page = $page->getPageFromPseudoDir($this->param['pseudo_dir'], $registry->shop_type);
                    if (isset($open_page->id)) {
                        $registry->open_category_id = $open_page->category_id;
                        $registry->open_category_parent_id = 0;
                    }
                }
            }
            if (isset($this->param['module']) && (!isset($registry->open_category_id) || (int) $registry->open_category_id == 0)) {
                $open_category = $category->getCategoryIdPseudoDir($this->param['module']);
                if (isset($open_category->id)) {
                    $registry->open_category_id = $open_category->id;
                    $registry->open_category_parent_id = $open_category->parent_id;
                }
            }


            if (isset($this->param['pseudo_dir']) && $this->param['pseudo_dir'] == 'main') {
                $this->content = $this->getFindModule(Lavra_Loader::getLoadModule('page', "/page/main/"));
                $this->is_main = 1;
                $registry->is_main = $this->is_main;
            }

            $this->menu_top = $category->getCategory(1, $registry->shop_type);
            $this->menu_main = $category->getCategory(2, $registry->shop_type);

            $this->menu_footer_1 = $category->getCategory(3, $registry->shop_type);
            $this->menu_footer_2 = $category->getCategory(4, $registry->shop_type);
            $this->menu_footer_3 = $category->getCategory(5, $registry->shop_type);
            $this->menu_footer_4 = $category->getCategory(6, $registry->shop_type);

            Lavra_Loader::LoadModels('Brand', 'brand');
            $brand = new Brand();
            $this->brands = $brand->getBrands($registry->shop_type);

            if (isset($registry->head_title))
                $this->head_title = $registry->head_title;
            if (isset($registry->head_key))
                $this->head_key = $registry->head_key;
            if (isset($registry->head_desc))
                $this->head_desc = $registry->head_desc;

            if (isset($registry->open_category_id)) {
                $this->open_category_id = $registry->open_category_id;
                $this->open_category_parent_id = $registry->open_category_parent_id;
            }

            if (isset($_SESSION['products'])) {
                $this->session_products = array_reverse($_SESSION['products']);
            }

            $this->open_brand_id = $registry->open_brand_id;
            $this->brand_id = $registry->brand_id;

            if ($this->is_main == 1) {
                Lavra_Loader::LoadClass("Files");
                $files = new Files();
                $this->banners_list = $files->getFiles(201, $registry->open_category_id, 0);
                if (!count($this->banners_list)) { //Если в разделе нет баннеров берем с главной
                    $this->banners_list = $files->getFiles(201, 1, 0);
                }
                Lavra_Loader::LoadModels("Banners", "banners");
                $bann = new Banners();
                $this->get_banners = $bann->geBannerDescAll();


                $this->tree = $category->getCategory(0, $registry->shop_type);

                /* Интернет Журнал */
                Lavra_Loader::LoadModels("Journal", "journal");
                $this->journalModel = new Journal();
                $this->main_journal = $this->journalModel->getList(1);

                $this->mainProducts = $productsModel->getMain();
            }

            $this->products_in_category = $registry->products_in_category; //Товары из этой же категории что и открытый товар
            $this->product_in_category_name = $registry->product_in_category_name;
            $this->open_news_id = $registry->open_news_id;
            $this->basket_count = $registry->basket_count;

            $this->is_open_catalog = $registry->is_open_catalog;
            $this->open_category_obj = $registry->open_category_obj;



            if (isset($this->param['module']) && $this->param['module'] == 'sync') { //Для покупки на маркете
                $this->is_only_content = 1;
            }
            $this->podbor_char_1_id = $registry->podbor_char_1_id;
            $this->is_open_product = $registry->is_open_product;
        }
    }

    public function setFile($params) {
        return $this->_setFileNameText($params['file'], "_s");
    }

    private function _setFileNameText($file_name, $end_string) {
        Lavra_Loader::LoadClass("Images");
        $images = new Images();
        $file = $images->getType($file_name);
        return $file['file'] . $end_string . $file['type'];
    }

}
