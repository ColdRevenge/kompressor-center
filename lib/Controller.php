<?php

abstract class Controller extends Template {

    protected $param = array();
    protected $MyName = null;
    protected $_setting = null;
    protected $_default_currency = null;

    /* Генерация подборов в чекбоксе */

    public function getCharsPodbor($param) {
        $registry = Registry::getInstance();
        $open_category_id = is_null($param['open_category_id']) ? $registry->open_category_id : $param['open_category_id'];
        if (isset($param['id'])) {
            Lavra_Loader::LoadClass("Podbor");
            $podbor = new Podbor();
            if (isset($param['is_desc_char']) && $param['is_desc_char'] == '1') {
                /* Если в адресе есть уточняющие характеристики */
//                $this->_addFilterChar();
                //Фильтруем по ним
                if ($registry->shop == 'lalipop') {
                    foreach ($this->_char_title_meta as $get_char_value_id) {
                        $podbor->setProductsCategoryesCharValue($get_char_value_id);
                    }
                }
            }

            $cacheModule = unserialize(CacheModule::getCacheModule('products-getCharsPodbor-' . md5(serialize($param) . '-' . serialize($this->_char_title_meta)) . '-' . $open_category_id . '-' . $registry->shop_type, false)); //Из-за ограничения мемкеша в 1мб
            if ($cacheModule !== false) {
                $return = ($cacheModule);
                return $return;
            } else {

//                $open_category_id = $registry->open_category_id;
                $id = (int) $param['id'];
//            $category_id = (int) $param['category_id'];
                Lavra_Loader::LoadClass('ApplicationDB');
                $app = new ApplicationDB();
                //С учетом подкатегорий
//            if ($id == 135) {
//                if (isset($param['is_param_2']) && $param['is_param_2'] == 1) {
//                    return $podbor->getCharsArrayParamGroup2(array_merge(array($registry->open_category_id => $registry->open_category_id), $app->getChildsCategory(0, $registry->open_category_id)), $id);
//                }
//                return $podbor->getCharsArrayParamGroup(array_merge(array($registry->open_category_id => $registry->open_category_id), $app->getChildsCategory(0, $registry->open_category_id)), $id);
//            }
                if (isset($param['sort'])) {
                    $podbor->setSortChars($param['sort']);
                }


//                $get_childs = array_merge(array($open_category_id => $open_category_id), $app->getChildsCategory(0, $open_category_id));
//            $cache_id = md5(serialize($get_childs) . $id . serialize($param));
//            $cacheModule = unserialize(CacheModule::getCacheModule('left_podbor' . $cache_id, false));
//            if ($cacheModule !== false) {
//                $return = unserialize(CacheModule::getCacheModule('left_podbor' . $cache_id, false));
//                return $return;
//            } else {
                if (isset($param['is_range']) && $param['is_range'] == 1) {
                    $s = $podbor->getCharsRange(array_merge(array($open_category_id => $open_category_id), $app->getChildsCategory(0, $open_category_id)), $id, 0, 0, 0, 0, 0, $registry->shop_type); //Тип изделия
                    return $s;
                } else {
                    if (isset($this->param['param_id']) && $this->param['param_id'] > 0 && ($registry->shop == 'lady' || $registry->shop == 'woman')) { //Фильтр в распродажи лади лалипоп
                        if ($this->param['param_id'] == 5) {
                            $return = $podbor->getCharsArray(array(0 => 0), $id, 0, 0, 0, 0, 1, $registry->shop_type);
                        } elseif ($this->param['param_id'] == 3) {
                            $return = $podbor->getCharsArray(array(0 => 0), $id, 0, 0, 1, 0, 0, $registry->shop_type);
                        } elseif ($this->param['param_id'] == 1) {
                            $return = $podbor->getCharsArray(array(0 => 0), $id, 1, 0, 0, 0, 0, $registry->shop_type);
                        }
                    } else {
                        $return = $podbor->getCharsArray(array_merge(array($open_category_id => $open_category_id), $app->getChildsCategory(0, $open_category_id)), $id, 0, 0, 0, 0, 0, $registry->shop_type);
                    }
                }
//                CacheModule::setCacheModule('left_podbor' . $cache_id, serialize($return), false);
//            }
                //Для одной категории
//            return $podbor->getChars($registry->open_category_id, $id); //Тип изделия
            }
            CacheModule::setCacheModule('products-getCharsPodbor-' . md5(serialize($param) . '-' . serialize($this->_char_title_meta)) . '-' . $open_category_id . '-' . $registry->shop_type, serialize($return), false);
//            print_r($result_arr);
//            $cache->setTags('Characteristics-getProductValuesAll-' . '-' . $shop_id, serialize($result_arr), 'Characteristics');
            return $return;
//        } else {
//            return unserialize($get_cache);
//        }
        }
    }

    protected function _filterWrapper() {
        $registry = Registry::getInstance();
        $open_category_id = $registry->open_category_id;
//
//        $cache = Cache::getInstance();
        Lavra_Loader::LoadClass("Podbor");
        $podbor = new Podbor();

        /* Если в адресе есть уточняющие характеристики */
//        $this->_addFilterChar();
        //Фильтруем по ним
        if ($registry->shop != 'lady' && $registry->shop != 'woman') {
            foreach ($this->_char_title_meta as $get_char_value_id) {
                $podbor->setProductsCategoryesCharValue($get_char_value_id);
            }
        }
//        }
//        $get_cache = $cache->get('Controller-_filterWrapper-' . $open_category_id . '_' . date('d.m.Y'), 'ControllerFilter');


        $cacheModule = unserialize(CacheModule::getCacheModule('products-Controller-_filterWrapper-' . $open_category_id . '-' . md5(serialize($this->_char_title_meta)) . '_' . date('d.m.Y') . '_' . $registry->shop_type, false)); //Из-за ограничения мемкеша в 1мб
        if ($cacheModule !== false) {
            $get_cache = ($cacheModule);
            $this->selection_brands = $get_cache['selection_brands'];
            $this->category_price = $get_cache['category_price'];
            $this->get_section = $get_cache['get_section'];
            $this->get_chars_podbor = $get_cache['get_chars_podbor'];
            $registry->podbor_open_category_id = $get_cache['podbor_open_category_id'];
        } else {
//        if (empty($get_cache)) {

            Lavra_Loader::LoadModels("Selection", "selection");
            $selection = new Selection();

//        $get_section = $selection->getSettingCategoryId($open_category_id);

            /* Поиск подкатегорий в подборе. Если подбора нет в открытой категории то берет из родителя */



            $is_last = false;
            if ($registry->open_category_parent_id > 0) {
                $category = new Category();
                /**
                 * 1. Узнать последняя это категория или нет
                 * 2. Найти главную категорию
                 */
                if (!$category->isChildCategory($registry->open_category_id)) {
                    $is_last = true;
                }
                if ($is_last == true) {
                    $app = new ApplicationDB();
                    $get_category = $app->getRootCategoryId($registry->open_category_id);
                    $open_category_id = $get_category->id;
                    $get_section = $selection->getSettingCategoryId($open_category_id);
                }
            }
            $registry->podbor_open_category_id = $open_category_id;



            if (!isset($get_section->id) || $get_section->is_active == 0) { //Если для открытого раздела нет активных подборов, берем по-усолчанию
                $get_section = ($selection->getSettingCategoryId(0));
                $this->get_chars_podbor = $selection->getCharSelection(0, $registry->shop_type);
            } else {
                $this->get_chars_podbor = $selection->getCharSelection($open_category_id, $registry->shop_type);
            }
            if (isset($get_section->id)) {
                $this->get_section = $get_section;
                if ($get_section->is_price == '1') {
                    if ($is_last == true) { //Если последняя категория, то берем бренды только из нее
                        $this->category_price = $podbor->getPriceAllCategory($registry->open_category_id, $registry->shop_type);
//                    print_r($this->category_price );
                    } else {
                        $this->category_price = $podbor->getPriceAllCategory($open_category_id, $registry->shop_type);
                    }
                }
                if ($get_section->is_brand == '1') {
                    if ($is_last == true) { //Если последняя категория, то берем бренды только из нее
                        $this->selection_brands = $podbor->getBrandsAllCategory($registry->open_category_id, $registry->shop_type);
                    } else {
                        $this->selection_brands = $podbor->getBrandsAllCategory($open_category_id, $registry->shop_type);
                    }
                }
            }

            $result['selection_brands'] = $this->selection_brands;
            $result['category_price'] = $this->category_price;
            $result['get_section'] = $this->get_section;
            $result['get_chars_podbor'] = $this->get_chars_podbor;
            $result['podbor_open_category_id'] = $registry->podbor_open_category_id;

            CacheModule::setCacheModule('products-Controller-_filterWrapper-' . $open_category_id . '-' . md5(serialize($this->_char_title_meta)) . '_' . date('d.m.Y') . '_' . $registry->shop_type, serialize($result), false);
//            $cache->setTags('Controller-_filterWrapper-' . $open_category_id . '_' . date('d.m.Y'), serialize($result), 'Category');
        }
    }

    public function redirect($url) {
        header("Location: $url");
    }

    final public function __construct() {
        $this->init();
        $this->register_object('price', $this);
        $this->register_object('this', $this);
//        $this->is_hide_sumka = $this->isHideSumka();
        $registry = Registry::getInstance();
        $registry->menu = array();
        $this->shop = $registry->shop;
        $this->catalog_dir = $registry->catalog_dir;
        $this->_default_currency = $registry->currency;
        $this->default_currency = $this->_default_currency; //Передаем в шаблон текущую валюту
        $this->_setting = $registry->setting;
        $this->setting = $this->_setting;
        $this->is_multi_mod = $registry->is_multi_mod;
        $this->is_b2b = $registry->is_b2b;
        $this->is_multi_manager = $registry->is_multi_manager;
        $this->folder = $registry->folder;
        $this->host = $registry->host;
        $this->is_mobile = $registry->isMobile;
        $this->host_url = $registry->base_host_url; //url с правильным host (http или https)
        $this->https_url = $registry->base_https_url; //URL https

        $this->files_products_url = $registry->files_products_url;
        $this->image_url = $registry->image_url;
        $this->preview_url = $registry->preview_url;
        $this->gallery_url = $registry->gallery_url;
        $this->icons_url = $registry->icons_url;
        $this->sys_images_url = $registry->sys_images_url;
        $this->fronted_images_url = $registry->fronted_images_url;
        $this->banners_url = $registry->banners_url;
        $this->news_image_url = $registry->news_image_url;
        $this->news_images_url = $registry->news_image_url;
        $this->is_coupon = $registry->is_coupon;

        $this->MyName = $registry->MyName;
        $this->param = $registry->param;
        $this->param_tpl = $registry->param;
        $this->visual_editor = $registry->lib_url . "tinymce/tinymce.min.js";
        $this->url = $registry->base_url;
        $this->shop_url = $registry->shop_url;
        $this->shop_name = $registry->shop_name;

        $this->base_url = $registry->base_url;
        $this->base_dir = $registry->base_dir;
        $this->lib_url = $registry->lib_url;
        $this->session_id = $registry->session_id;
        $registry->s = array('berr', 'y');
        $this->base_template = $registry->base_template_dir;
        $this->template_message = $registry->template_message;
        $this->admin_url = $registry->admin_url;
        $this->is_ajax = $registry->isAjax; //Если аякс вызов
        $this->current_url = "http://" . rtrim($_SERVER['HTTP_HOST'], '/') . "/" . ltrim($_SERVER['REQUEST_URI'], '/');
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0) {
            $this->is_auth = $_SESSION['is_auth'];
            $registry->user_id = $this->user_id = $_SESSION['user_id'];
            $this->login = $_SESSION['login'];

            Lavra_Loader::LoadClass("Users");
            $users = new Users();
            $users->setLastVisit($registry->user_id); //Меняем дату последнего визита
            $this->get_user = $registry->get_user = $users->getUserId($registry->user_id);
            if (!isset($this->get_user->id)) {
                foreach ($_SESSION as $key => $value) {
                    unset($_SESSION[$key]);
                }
            }
            $this->b2b_price = $_SESSION['b2b_price'] = $this->get_user->b2b_price;
        } else {
            $this->b2b_price = 0;
            $this->user_id = 0;
        }
        if ($this->is_auth == 1 || $this->is_auth == 2) { //Если админ
            $registry->is_admin = 1;
        }
//        pclzipe();
        if (isset($this->MyName)) {
            $this->MyURL = $registry->base_url . ltrim(($registry->admin_pseudo_dir != "") ? $registry->admin_pseudo_dir : null, "/") . $this->MyName . "/"; //URL до себя..
            $this->MyDir = $registry->modules_dir . (($registry->admin_pseudo_dir != "") ? $registry->admin_pseudo_dir : null) . $this->MyName . "/"; //Путь до себя..
        }
        if (isset($_SERVER['HTTP_REFERER']))
            $this->back = $_SERVER['HTTP_REFERER'];
        //$registry->MyName - имя текущего модуля

        $this->select_tree_file = $registry->base_template_dir . "tree_select.tpl";
        $this->fav_count = isset($_SESSION['fav']) ? count($_SESSION['fav']) : 0;

        $this->_autoClearBasket();
    }

    public function __destruct() {
        $registry = Registry::getInstance();
        if (isset($registry->register_error))
            $this->register_error = $registry->register_error; //Зарегистрированные ошибки (например, посланые из подгруженных модулей)
//        if ($this->_is_regexp["$this->MyName"] == 0) { //Если в шаблоне есть regexp
//            if ($this->MyName == 'find') {
//                return $this->getRender($registry->Path["$this->MyName"].$registry->PathView["$this->MyName"].$registry->Template["$this->MyName"],$this->MyName);
//            }
//            else {
//                return $this->render($registry->Path["$this->MyName"].$registry->PathView["$this->MyName"].$registry->Template["$this->MyName"],$this->MyName);
//            }
//        }
    }

    protected function _getTemplateProductsCatalog() {
        if (isset($_GET['template_products_catalog'])) {
            switch ($_GET['template_products_catalog']) {
                case 1:
                    $_SESSION['template_products_catalog'] = $_GET['template_products_catalog'];
                    $this->template_products_catalog = 'getProduct.tpl';
                    break;
                case 2:
                    $_SESSION['template_products_catalog'] = $_GET['template_products_catalog'];
                    $this->template_products_catalog = 'getProductList.tpl';
                    break;
            }
        } elseif (isset($_SESSION['template_products_catalog'])) {
            switch ($_SESSION['template_products_catalog']) {
                case 1:
                    $this->template_products_catalog = 'getProduct.tpl';
                    break;
                case 2:
                    $this->template_products_catalog = 'getProductList.tpl';
                    break;
            }
        } else {
            $this->template_products_catalog = 'getProduct.tpl';
        }
    }

    /**
     * Только для лалипопа, в остальных проектах удалить
     */
    protected function _getTemplateProductsCatalog_Lady() {
        if (isset($_GET['template_products_catalog'])) {
            switch ($_GET['template_products_catalog']) {
                case 1:
                    $_SESSION['template_products_catalog'] = $_GET['template_products_catalog'];
                    $this->template_products_catalog = 'getProductLady.tpl';
                    break;
                case 2:
                    $_SESSION['template_products_catalog'] = $_GET['template_products_catalog'];
                    $this->template_products_catalog = 'getProductListLady.tpl';
                    break;
            }
        } elseif (isset($_SESSION['template_products_catalog'])) {
            switch ($_SESSION['template_products_catalog']) {
                case 1:
                    $this->template_products_catalog = 'getProductLady.tpl';
                    break;
                case 2:
                    $this->template_products_catalog = 'getProductListLady.tpl';
                    break;
            }
        } else {
            $this->template_products_catalog = 'getProductLady.tpl';
        }
    }

    public function get() {
        $registry = Registry::getInstance();
        return $this->getRender($registry->Path["$this->MyName"] . $registry->PathView["$this->MyName"] . $registry->Template["$this->MyName"], $this->MyName);
    }

//    public function setMessage($message) {
//        if (!empty($message)) {
//            $this->message = "<center><div id='message'>$message</div></center>";
//        }
//    }
//
//    public function setError($error) {
//        if (!empty($error)) {
//            $this->error = "<center><div id='error'>$error</div></center>";
//            ;
//        }
//    }

    public function setMessage($message) {
        $registry = Registry::getInstance();
        if ($registry->is_admin == 1) { //Оишибу для админа..
            if (!empty($message)) {
                $this->message = "<center><div id='message'>$message</div></center>";
                ;
            }
        } else {
            if (!empty($message)) {
                $this->message = "$message";
                ;
            }
        }
    }

    public function setError($error) {
        $registry = Registry::getInstance();
        if ($registry->is_admin == 1) { //Оишибу для админа..
            if (!empty($error)) {
                $this->error = "<center><div id='error'>$error</div></center>";
                ;
            }
        } else {
            if (!empty($error)) {
                $this->error = $error;
                ;
            }
        }
    }

    public function setSystemError($error, $module = null, $code = null) {
        // echo "<b>Произошла ошибка $error в модуле</b>";
    }

    /**
     * Ищет в тексте комынды запуска модулей, и на их месте выводит данные модуля
     * Синтаксис: {имя модуля|параметр 1|параметр 2...}
     */
    private $_find_module = null;

    public function getFindModule($text) {
        $registry = Registry::getInstance();
        $cacheModule = unserialize(CacheModule::getCacheModule('Controller-getFindModule-' . md5($text) . '-' . $registry->shop_type, false)); //Из-за ограничения мемкеша в 1мб
        if ($cacheModule !== false) {
            $return = ($cacheModule);
            return $return;
        } else {

            preg_match("/\{([a-zA-Z0-9\|\-\.\_]+)\}/", $text, $matches);
            $this->_find_module = $text;
            try {
                if (isset($matches[1])) {
                    $param = explode("|", $matches[1]);
                    if (count($param) > 1) { //Если модуль запущен с параметрами
                        $module = $param[0];
                        $region_name = null;
                        unset($param[0]);
                        foreach ($param as $key => $value) {
                            if ($param[$key] == 'region') {
                                $region_name = $this->url_region_name;
                                unset($param[$key]);
                            }
                        }

                        $param_module = implode("/", $param) . "/";
                        $this->_find_module = $this->getFindModule(str_replace($matches[0], Lavra_Loader::getLoadModule($module, $region_name . '/' . $module . "/" . $param_module), $text)); //Запускаем модуль
                    } else {
                        $this->_find_module = $this->getFindModule(str_replace($matches[0], Lavra_Loader::getLoadModule($param[0]), $text)); //Запускаем модуль
                    }
                }
            } catch (Exception $e) { //В случае если модуль не найден, или содержит ошибки, возвращаем текст
                echo $e->getMessage();
                $this->_find_module = $text;
            }


            CacheModule::setCacheModule('category-Controller-getFindModule-' . md5($text) . '-' . $registry->shop_type, serialize($this->_find_module), false);
            return $this->_find_module;
        }
    }

    public function getPrice($price) {
        $registry = Registry::getInstance();
// КЕШ выключили Т.к. b2b не правильно отрабатывал при переключении колонки пользователя
//        $cache = Cache::getInstance();
//        $get_cache = $cache->get('Controller-getPrice-' . serialize($price) . '-' . $this->_setting->mark_up, 'Products');
//                $get_cache = null;
//        if (empty($get_cache)) {
        if (isset($price['is_query_price']) && $price['is_query_price'] == 1 && isset($price['product_id'])) { //Если требуется подгрузка цен из базы (для B2B)
            Lavra_Loader::LoadModels("Products", "products");
            $products = new Products();

//            if (isset($_SESSION['b2b_price'])) {
            if (isset($price['mod_id']) && $price['mod_id'] != 0) { //Если открыт определенный продукт
                $return = number_format($this->_getPriceMod($price['mod_id']) * $this->_setting->mark_up, 2, '.', ' ');
//                    $cache->setTags('Controller-getPrice-' . serialize($price) . '-' . $this->_setting->mark_up, $return, 'Products');
                return $return;
            } else { //Если каталог
                $return = number_format($this->_getPriceCatalog($products, $price) * $this->_setting->mark_up, 2, '.', ' ');
//                    $cache->setTags('Controller-getPrice-' . serialize($price) . '-' . $this->_setting->mark_up, $return, 'Products');
                return $return;
            }
//            }
        }

        if (isset($price['currency_id'])) { //Если цена должна меняться, в зависимости от валюты
            $exchange = 1;
            $exchange_product = 0;
            if ($price['currency_id'] != $this->_default_currency->id) {

                if ($price['currency_id'] == $registry->shop_default_currency->id) { //Если валюта товары такая же как в магазине по дефаулту
                    $exchange = $this->_default_currency->exchange;
                } else { //Если товар в неправильно валюте
                    $currency = new Currency();
                    $curr = $currency->getCurrencyId($price['currency_id']);
                    $exchange_product = $curr->exchange;
                }
            }

            if ($exchange_product != 0) { //Конверти валюту товара
                $return = number_format(($price['price'] * $this->_setting->mark_up) * $exchange_product, 2, '.', ' ');

//                    $cache->setTags('Controller-getPrice-' . serialize($price) . '-' . $this->_setting->mark_up, $return, 'Products');
                return $return;
            } else { //Конвертим валюту пользователя
                $return = number_format(($price['price'] * $this->_setting->mark_up) / $exchange, 2, '.', ' ');

//                    $cache->setTags('Controller-getPrice-' . serialize($price) . '-' . $this->_setting->mark_up, $return, 'Products');
                return $return;
            }
        } else {
            $return = number_format($price['price'] * $this->_setting->mark_up, 2, '.', ' ');

//                $cache->setTags('Controller-getPrice-' . serialize($price) . '-' . $this->_setting->mark_up, $return, 'Products');
            return $return;
        }
//        } else {
//            return $get_cache;
//        }
    }

    /**
     * Вывод b2b-цен для определенного мода 
     */
    private function _getPriceMod($mod_id) {

        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Mod", "products");
        $mod = new Mod();

        $get_mod = $mod->getModId($mod_id);
        $exchange = 1;
        $exchange_product = 0;
        if ($get_mod->currency_id != $this->_default_currency->id) {
            if ($get_mod->currency_id == $registry->shop_default_currency->id) { //Если валюта товары такая же как в магазине по дефаулту
                $exchange = $this->_default_currency->exchange;
            } else { //Если товар в неправильно валюте
                $currency = new Currency();
                $curr = $currency->getCurrencyId($get_mod->currency_id);
                $exchange_product = $curr->exchange;
            }
        }

        if (isset($get_mod->price_1)) {
            $return = 0;
            switch ($_SESSION['b2b_price']) {
                case 1:
                    $return = $get_mod->price_1;
                    break;
                case 2:
                    $return = $get_mod->price_2;
                    break;
                case 3:
                    $return = $get_mod->price_3;
                    break;
                default:
                    $return = $get_mod->price;
                    break;
            }
            if ($exchange_product != 0) { //Конверти валюту товара
                return $return * $exchange_product;
            } else { //Конвертим валюту пользователя
                return $return / $exchange;
            }
        }
    }

    /**
     * Вывод b2b-цен для каталога, или в других местах, где требуется минимальная и максимальная цена
     * @return type 
     */
    private function _getPriceCatalog(Products $products, $price) {
        $registry = Registry::getInstance();
        $product_price = $products->getProductPrice($price['product_id']);
        $exchange = 1;
        $exchange_product = 0;

        if ($product_price->currency_id != $this->_default_currency->id) {
            $exchange = $this->_default_currency->exchange;

            if ($product_price->currency_id == $registry->shop_default_currency->id) { //Если валюта товары такая же как в магазине по дефаулту
                $exchange = $this->_default_currency->exchange;
            } else { //Если товар в неправильно валюте
                $currency = new Currency();
                $curr = $currency->getCurrencyId($product_price->currency_id);
                $exchange_product = $curr->exchange;
            }
        }
        if (isset($price['is_max']) && $price['is_max'] == 1) { //Если требуется вывод максимальной цены
            $return = $product_price->price;
            if ($registry->is_b2b == true) {
                $b2b_num = $registry->setting_obj->getB2b();
                if ($b2b_num[$_SESSION['b2b_price']]->is_active == 1) {
                    $return = $product_price->{'max_price_' . $_SESSION['b2b_price']};
                } else {
                    for ($i = $_SESSION['b2b_price']; $i > 0; $i--) {
                        if ($b2b_num[$i]->is_active == 1) {
                            $return = $product_price->{'max_price_' . $i};
                            break;
                        }
                    }
                }
            }
        } else { //Генерация цены для товара в зависимости от настроек B2b
            $return = $product_price->price;
            if ($registry->is_b2b == true) {
                $b2b_num = $registry->setting_obj->getB2b();
                if ($b2b_num[$_SESSION['b2b_price']]->is_active == 1) {
//                    echo '.' . (int)$_SESSION['b2b_price'] . '#' .  . '##';
                    $return = $product_price->{'price_' . (int) $_SESSION['b2b_price']};
                } else {
                    for ($i = $_SESSION['b2b_price']; $i > 0; $i--) {
                        if ($b2b_num[$i]->is_active == 1) {
                            $return = $product_price->{'price_' . (int) $_SESSION['b2b_price']};
                            break;
                        }
                    }
                }
            }
        }
        if ($exchange_product != 0) { //Конверти валюту товара
            return $return * $exchange_product;
        } else { //Конвертим валюту пользователя
            return $return / $exchange;
        }
    }

    /**
     * Авто удаление старых записей в БД
     */
    public function _autoClearBasket() {
        $date = date('H');
        if ($date > 3 && $date < 4) {
            $registry = Registry::getInstance();
            $query = $registry->db->prepare("DELETE FROM basket WHERE created BETWEEN (SELECT DATE_ADD(NOW(),Interval -5 YEAR)) AND (SELECT DATE_ADD(NOW(),Interval -5 DAY))");
            $query->execute();
        }
    }

    /**
     * Метод по id категории возвращает адрес категории
     * Для подбора с адресом
     */
    public function getCategoryAdress($param) {
        $registry = Registry::getInstance();
        if (isset($param['category_id'])) {
            $cacheModule = (CacheModule::getCacheModule('category-getCategoryAdress-' . md5(serialize($param) . '-' . $registry->shop_type), false)); //Из-за ограничения мемкеша в 1мб
            if ($cacheModule !== false) {
                return ($cacheModule);
            } else {
                Lavra_Loader::LoadClass('Routes');
                $routes = new Routes();
                if ($param['category_id'] == '0') { //Если открыт /catalog/
                    if ($registry->shop == 'lady' || $registry->shop == 'woman') {
                        CacheModule::setCacheModule('category-getCategoryAdress-' . md5(serialize($param) . '-' . $registry->shop_type), 'odezhda/', false);
                        return 'odezhda/';
                    } elseif ($registry->shop == 'platok') {
                        CacheModule::setCacheModule('category-getCategoryAdress-' . md5(serialize($param) . '-' . $registry->shop_type), 'platki-sharfy/', false);
                        return 'platki-sharfy/';
                    } elseif ($registry->shop == 'sumka') {
                        CacheModule::setCacheModule('category-getCategoryAdress-' . md5(serialize($param) . '-' . $registry->shop_type), 'kozhgalantereya/', false);
                        return 'kozhgalantereya/';
                    } else {
                        CacheModule::setCacheModule('category-getCategoryAdress-' . md5(serialize($param) . '-' . $registry->shop_type), 'bizhuteriya/', false);
                        return 'bizhuteriya/';
                    }
                } else {
                    $get_adress = $routes->getAdressCategoryId($param['category_id']);
                    if (isset($get_adress->adress)) {
                        CacheModule::setCacheModule('category-getCategoryAdress-' . md5(serialize($param) . '-' . $registry->shop_type), $get_adress->adress, false);
                        return $get_adress->adress;
                    }
                }
            }
        }
    }

    /**
     * Возвращает pseudo_dir по id характеристики
     * @param type $param
     * @return type
     */
    public function getCharacteristicPseudoDir($param) {
        if (isset($param['char_id'])) {
            Lavra_Loader::LoadModels("Characteristics", "characteristics");
            $characteristics = new Characteristics();
            $get_char = $characteristics->getCharacteristicId($param['char_id']);
            if (isset($get_char->pseudo_dir)) {
                return $get_char->pseudo_dir;
            }
        }
    }

    /**
     * Проверяет на заполненость описания характеристик.
     * Используется в шаблоне
     * @param type $param
     * @return type
     */
    public function getCheckerCharDesc($param) {
        if (isset($param['category_id']) && isset($param['char_value_id'])) {
            $param['char_value_2_id'] = isset($param['char_value_2_id']) ? $param['char_value_2_id'] : 0;
            $param['char_value_3_id'] = isset($param['char_value_3_id']) ? $param['char_value_3_id'] : 0;
            $param['char_value_4_id'] = isset($param['char_value_4_id']) ? $param['char_value_4_id'] : 0;

            Lavra_Loader::LoadModels("DescChar", "characteristics");
            $deac_char = new DescChar();
            return $deac_char->getDescCharMeta($param['category_id'], $param['char_value_id'], $param['char_value_2_id'], $param['char_value_3_id'], $param['char_value_4_id']);
        }
    }

    protected $_char_title_meta = array();

    /**
     * Используется в каталоге и в фильтрах
     * Нужен для того чтобы открывать характеристики в разделе с описанием 
     * @param Products $products
     */
    protected function _addFilterChar() {
        $registry = Registry::getInstance();
//        $this->char_adress = $registry->char_adress; //Для навигации
//        if (isset($_GET['char_adress'])) {
//            $registry->char_adress = $_GET['char_adress'];
//        }
//        $char_adress = explode('/', trim($registry->char_adress, ' /'));
//        if (count($char_adress) > 0) {
//            $chars_arr = array();
//            $i = 0;
//            foreach ($char_adress as $key => $value) {
//                if ($key % 2 == 0) { //ЧПУ характеристики
//                    $chars_arr[$i]['char'] = $value;
//                }
//                if ($key % 2 != 0) { //ЧПУ значения характеристики
//                    $chars_arr[$i]['char_value'] = $value;
//                    $i++;
//                }
//            }
//
//            Lavra_Loader::LoadModels("Characteristics", "characteristics");
//            $characteristic = new Characteristics();
//            $selected_char_value_id = array(); //Для выделение симлинков
//            $_desc_char_meta = array(); //Хранит данные для выгрузки мета данных
//            foreach ($chars_arr as $key => $value) {
//                if (isset($value['char_value'])) {
//                    $get_char = $characteristic->getCharPseudoDir($value['char']);
//                    if (isset($get_char->id)) { //Если характеристка найдена, ищем ее значение
//                        $get_char_value = $characteristic->getCharValuePseudoDir($get_char->id, $value['char_value']);
//                        if (isset($get_char_value->id)) {
//                            $selected_char_value_id[$get_char_value->id] = 1;
//                            $this->_char_title_meta[] = $get_char_value->id;
//                        }
//                    }
//                }
//                if (count($selected_char_value_id)) {
//                    $this->selected_char_value_id = $selected_char_value_id;
//                }
////            $characteristic->getBasketValues($session_id);
//            }
//        }
    }

    /**
     * Возвращает true, если необходимо скрыть раздел суммки
     * @param type $ip
     * @return boolean
     */
    public function isHideSumka() {
        $black_ip_sumka[] = '178.154.224.114';
        $black_ip_sumka[] = '109.234.156.66';
        $black_ip_sumka[] = '37.9.118.17';
        $black_ip_sumka[] = '213.180.206.197';
        $black_ip_sumka[] = '95.108.129.207';
        $black_ip_sumka[] = '213.180.206.198';
        $black_ip_sumka[] = '213.180.206.205';
        $black_ip_sumka[] = '92.242.35.54';
        $black_ip_sumka[] = '178.154.205.251';
        $black_ip_sumka[] = '37.9.118.24';
        $black_ip_sumka[] = '141.8.191.2';
        $black_ip_sumka[] = '66.249.78.30';
        $black_ip_sumka[] = '66.249.78.37';
        $black_ip_sumka[] = '66.249.78.44';
        $black_ip_sumka[] = '66.249.78.33';
        $black_ip_sumka[] = '66.249.78.19';
        $black_ip_sumka[] = '66.249.78.26';
        $black_ip_sumka[] = '37.140.141.38';
        $black_ip_sumka[] = '95.108.129.196';
        $black_ip_sumka[] = '5.45.254.227';
        $black_ip_sumka[] = '37.9.118.28';
        $black_ip_sumka[] = '213.180.206.196';
        $black_ip_sumka[] = '5.255.253.131';
        $black_ip_sumka[] = '5.255.253.170';
        $black_ip_sumka[] = '5.255.253.122';
        $black_ip_sumka[] = '66.249.64.49';
        $black_ip_sumka[] = '185.60.133.162';
        $black_ip_sumka[] = '66.249.64.45';
        $black_ip_sumka[] = '5.255.253.235';
        $black_ip_sumka[] = '37.140.141.39';
        $black_ip_sumka[] = '66.249.64.16';
        $black_ip_sumka[] = '66.249.64.53';
        $black_ip_sumka[] = '66.249.64.8';
        $black_ip_sumka[] = '66.249.64.12';
        $black_ip_sumka[] = '178.154.243.98';
        $black_ip_sumka[] = '66.249.69.125';
        $black_ip_sumka[] = '193.169.234.5';
        $black_ip_sumka[] = '66.249.69.64';
        $black_ip_sumka[] = '66.249.69.96';
        $black_ip_sumka[] = '217.69.133.253';
        $black_ip_sumka[] = '66.249.69.80';
        $black_ip_sumka[] = '66.249.69.141';
        $black_ip_sumka[] = '217.69.133.21';
        $black_ip_sumka[] = '66.249.69.157';
        $black_ip_sumka[] = '66.249.64.9';
        $black_ip_sumka[] = '188.165.15.169';
        $black_ip_sumka[] = '94.181.180.194';
        $black_ip_sumka[] = '217.69.133.250';
        $black_ip_sumka[] = '66.249.64.46';
        $black_ip_sumka[] = '217.69.133.252';
        $black_ip_sumka[] = '217.69.133.191';
        $black_ip_sumka[] = '217.69.133.251';
        $black_ip_sumka[] = '66.249.64.17';
        $black_ip_sumka[] = '208.115.113.84';
        $black_ip_sumka[] = '37.140.141.40';
        $black_ip_sumka[] = '66.249.64.54';
        $black_ip_sumka[] = '66.249.64.50';
        $black_ip_sumka[] = '188.165.15.85';
        $black_ip_sumka[] = '66.249.64.13';
        $black_ip_sumka[] = '188.165.15.181';
        $black_ip_sumka[] = '157.55.39.64';
        $black_ip_sumka[] = '217.69.133.248';
        $black_ip_sumka[] = '212.193.117.227';
        $black_ip_sumka[] = '157.55.39.62';
        $black_ip_sumka[] = '37.140.141.26';
        $black_ip_sumka[] = '198.27.82.153';
        $black_ip_sumka[] = '217.69.133.249';
        $black_ip_sumka[] = '157.55.39.58';
        $black_ip_sumka[] = '188.165.15.165';
        $black_ip_sumka[] = '188.165.15.94';
        $black_ip_sumka[] = '148.251.183.105';
        $black_ip_sumka[] = '188.165.15.95';
        $black_ip_sumka[] = '188.165.15.36';
        $black_ip_sumka[] = '37.192.100.158';
        $black_ip_sumka[] = '188.165.15.210';
        $black_ip_sumka[] = '95.108.132.164';
        $black_ip_sumka[] = '188.165.15.152';
        $black_ip_sumka[] = '198.27.82.152';
        $black_ip_sumka[] = '188.165.15.192';
        $black_ip_sumka[] = '157.55.39.209';
        $black_ip_sumka[] = '95.128.242.177';
        $black_ip_sumka[] = '68.180.228.224';
        $black_ip_sumka[] = '77.50.42.24';
        $black_ip_sumka[] = '188.42.240.119';
//        $black_ip_sumka[] = '94.199.111.134';
        $black_ip_sumka[] = '46.161.41.199';
        $black_ip_sumka[] = '66.249.81.206';
        $black_ip_sumka[] = '66.249.81.203';
        $black_ip_sumka[] = '66.249.81.200';
        $black_ip_sumka[] = '91.197.11.251';
        $black_ip_sumka[] = '5.61.38.35';
        $black_ip_sumka[] = '5.255.253.4';
        $black_ip_sumka[] = '31.170.166.10';
        $black_ip_sumka[] = '193.106.108.104';
        $black_ip_sumka[] = '208.115.111.68';
        $black_ip_sumka[] = '62.210.131.36';
        $black_ip_sumka[] = '66.249.78.127';
        $black_ip_sumka[] = '66.249.78.134';
        $black_ip_sumka[] = '188.116.54.12';
        $black_ip_sumka[] = '66.249.78.141';
        $black_ip_sumka[] = '178.212.227.37';
        $black_ip_sumka[] = '188.32.116.106';
        $black_ip_sumka[] = '46.4.26.15';
        $black_ip_sumka[] = '85.25.200.112';
        $black_ip_sumka[] = '94.137.85.25';
        $black_ip_sumka[] = '80.67.220.14';
        $black_ip_sumka[] = '94.79.7.8';
        $black_ip_sumka[] = '94.79.7.6';
        $black_ip_sumka[] = '95.188.113.47';
        $black_ip_sumka[] = '178.216.163.50';
        $black_ip_sumka[] = '31.170.166.1';
        $black_ip_sumka[] = '5.9.151.10';
        $black_ip_sumka[] = '94.79.7.2';
        $black_ip_sumka[] = '85.202.227.47';
        $black_ip_sumka[] = '94.228.207.66';
        $black_ip_sumka[] = '5.61.33.119';
        $black_ip_sumka[] = '87.117.185.5';
        $black_ip_sumka[] = '31.170.166.9';
        $black_ip_sumka[] = '91.200.40.68';
        $black_ip_sumka[] = '65.254.225.148';
        $black_ip_sumka[] = '5.255.253.5';
        $black_ip_sumka[] = '31.170.166.30';
        $black_ip_sumka[] = '91.207.74.74';
        $black_ip_sumka[] = '31.170.166.23';
        $black_ip_sumka[] = '91.105.238.22';
        $black_ip_sumka[] = '31.170.166.31';
        $black_ip_sumka[] = '188.123.245.8';
        $black_ip_sumka[] = '31.170.166.26';
        $black_ip_sumka[] = '5.199.175.181';
        $black_ip_sumka[] = '199.58.86.206';
        $black_ip_sumka[] = '84.54.194.30';
        $black_ip_sumka[] = '31.170.166.25';
        $black_ip_sumka[] = '95.163.107.73';
        $black_ip_sumka[] = '31.220.16.241';
        $black_ip_sumka[] = '91.207.8.46';
        $black_ip_sumka[] = '31.170.166.3';
        $black_ip_sumka[] = '31.170.166.7';
        $black_ip_sumka[] = '188.42.240.11';
        $black_ip_sumka[] = '66.249.64.114';
        $black_ip_sumka[] = '178.255.215.94';
        $black_ip_sumka[] = '94.79.7.31';
        $black_ip_sumka[] = '109.120.157.179';
        $black_ip_sumka[] = '91.107.2.17';
        $black_ip_sumka[] = '66.249.78.8';
        $black_ip_sumka[] = '66.249.78.31';
        $black_ip_sumka[] = '66.249.64.35';
        $black_ip_sumka[] = '66.249.64.39';
        $black_ip_sumka[] = '66.249.78.1';
        $black_ip_sumka[] = '176.118.65.244';
        $black_ip_sumka[] = '66.249.64.31';
        $black_ip_sumka[] = '66.249.78.17';
        $black_ip_sumka[] = '66.249.78.24';
        $black_ip_sumka[] = '176.9.38.197';
        $black_ip_sumka[] = '87.250.241.67';
        $black_ip_sumka[] = '66.249.78.253';
        $black_ip_sumka[] = '62.109.26.168';
        $black_ip_sumka[] = '5.255.253.117';
        $black_ip_sumka[] = '109.206.133.167';
        $black_ip_sumka[] = '178.154.243.101';
        $black_ip_sumka[] = '82.146.62.80';
        $black_ip_sumka[] = '178.140.56.59';
        $black_ip_sumka[] = '46.39.244.6';
        $black_ip_sumka[] = '109.120.183.35';
        $black_ip_sumka[] = '144.76.15.235';
        $black_ip_sumka[] = '66.249.78.251';
        $black_ip_sumka[] = '66.249.78.209';
        $black_ip_sumka[] = '62.109.27.164';
        $black_ip_sumka[] = '66.249.64.101';
        $black_ip_sumka[] = '5.255.253.232';
        $black_ip_sumka[] = '66.249.78.223';
        $black_ip_sumka[] = '148.251.223.21';
        $black_ip_sumka[] = '91.221.109.101';
        $black_ip_sumka[] = '66.249.64.105';
        $black_ip_sumka[] = '95.108.158.215';
        $black_ip_sumka[] = '95.108.132.174';
        $black_ip_sumka[] = '37.140.141.6';
        $black_ip_sumka[] = '157.55.39.90';
        $black_ip_sumka[] = '89.208.147.138';
        $black_ip_sumka[] = '66.249.64.109';
        $black_ip_sumka[] = '66.249.79.223';
        $black_ip_sumka[] = '188.225.33.150';
        $black_ip_sumka[] = '95.108.158.245';
        $black_ip_sumka[] = '66.249.79.211';
        $black_ip_sumka[] = '5.255.253.94';
        $black_ip_sumka[] = '212.46.240.230';
        $black_ip_sumka[] = '95.108.158.146';
        $black_ip_sumka[] = '178.137.162.15';
        $black_ip_sumka[] = '207.46.13.3';
        $black_ip_sumka[] = '94.153.11.69';
        $black_ip_sumka[] = '195.218.182.78';
        $black_ip_sumka[] = '5.255.253.12';
        $black_ip_sumka[] = '178.210.65.38';
        $black_ip_sumka[] = '37.115.191.104';
        $black_ip_sumka[] = '79.104.198.5';
        $black_ip_sumka[] = '91.217.90.38';
        $black_ip_sumka[] = '66.249.64.55';
        $black_ip_sumka[] = '66.249.64.112';
        $black_ip_sumka[] = '5.255.253.173';
        $black_ip_sumka[] = '82.146.63.123';
        $black_ip_sumka[] = '5.255.253.108';
        $black_ip_sumka[] = '109.173.98.23';
        $black_ip_sumka[] = '66.249.79.235';
        $black_ip_sumka[] = '208.115.111.72';
        $black_ip_sumka[] = '208.115.113.88';
        $black_ip_sumka[] = '66.249.78.75';
        $black_ip_sumka[] = '66.249.78.61';
        $black_ip_sumka[] = '66.249.78.68';
        $black_ip_sumka[] = '66.249.64.117';
        $black_ip_sumka[] = '46.39.36.13';
        $black_ip_sumka[] = '66.249.64.113';
        $black_ip_sumka[] = '66.249.78.153';
        $black_ip_sumka[] = '66.249.78.160';
        $black_ip_sumka[] = '66.249.78.167';
        $black_ip_sumka[] = '66.249.64.79';
        $black_ip_sumka[] = '66.249.64.75';
        $black_ip_sumka[] = '66.249.64.83';
        $black_ip_sumka[] = '212.33.255.53';
        $black_ip_sumka[] = '93.158.143.18';
        $black_ip_sumka[] = '66.249.79.144';
        $black_ip_sumka[] = '188.165.234.74';
        $black_ip_sumka[] = '66.249.79.157';
        $black_ip_sumka[] = '157.55.39.204';
        $black_ip_sumka[] = '66.249.64.239';
        $black_ip_sumka[] = '66.249.69.69';
        $black_ip_sumka[] = '207.46.13.95';
        $black_ip_sumka[] = '66.249.79.131';
        $black_ip_sumka[] = '66.249.64.244';
        $black_ip_sumka[] = '157.55.39.42';
        $black_ip_sumka[] = '188.165.15.208';
        $black_ip_sumka[] = '148.251.132.121';
        $black_ip_sumka[] = '66.249.64.184';
        $black_ip_sumka[] = '157.55.39.23';
        $black_ip_sumka[] = '66.249.69.61';
        $black_ip_sumka[] = '178.154.178.248';
        $black_ip_sumka[] = '176.36.52.108';
        $black_ip_sumka[] = '207.46.13.85';
        $black_ip_sumka[] = '157.55.39.24';
        $black_ip_sumka[] = '217.69.133.169';
        $black_ip_sumka[] = '66.249.69.53';
        $black_ip_sumka[] = '208.115.113.92';
        $black_ip_sumka[] = '208.115.113.82';
        $black_ip_sumka[] = '66.249.78.139';
        $black_ip_sumka[] = '66.249.78.146';
        $black_ip_sumka[] = '66.249.78.58';
        $black_ip_sumka[] = '66.249.78.65';
        $black_ip_sumka[] = '66.249.78.72';
        $black_ip_sumka[] = '95.108.189.105';
        $black_ip_sumka[] = '66.249.81.208';
        $black_ip_sumka[] = '80.240.248.248';
        $black_ip_sumka[] = '66.249.81.202';
        $black_ip_sumka[] = '85.233.76.6';
        $black_ip_sumka[] = '5.228.15.222';
        $black_ip_sumka[] = '66.249.81.205';
        $black_ip_sumka[] = '185.57.29.216';
        $black_ip_sumka[] = '85.233.72.196';
        $black_ip_sumka[] = '87.255.2.219';
        $black_ip_sumka[] = '188.143.232.72';
        $black_ip_sumka[] = '66.249.64.7';
        $black_ip_sumka[] = '90.189.208.15';
        $black_ip_sumka[] = '212.75.138.117';
        $black_ip_sumka[] = '66.249.64.11';
        $black_ip_sumka[] = '66.249.64.15';
        $black_ip_sumka[] = '66.249.64.183';
        $black_ip_sumka[] = '199.19.249.196';
        $black_ip_sumka[] = '5.228.2.72';
        $black_ip_sumka[] = '178.162.63.11';
        $black_ip_sumka[] = '89.148.238.5';
        $black_ip_sumka[] = '66.249.64.175';
        $black_ip_sumka[] = '178.140.59.97';
        $black_ip_sumka[] = '66.249.64.179';
        $black_ip_sumka[] = '66.249.64.176';
        $black_ip_sumka[] = '87.228.66.245';
        $black_ip_sumka[] = '66.249.64.180';
        $black_ip_sumka[] = '91.229.5.219';
        $black_ip_sumka[] = '84.53.243.35';
        $black_ip_sumka[] = '195.3.182.98';
        $black_ip_sumka[] = '157.55.39.74';
        $black_ip_sumka[] = '89.200.182.49';
        $black_ip_sumka[] = '157.55.39.87';
        $black_ip_sumka[] = '93.171.202.36';
        $black_ip_sumka[] = '94.153.9.220';
        $black_ip_sumka[] = '178.49.64.85';
        $black_ip_sumka[] = '94.153.10.249';
        if (in_array($_SERVER['REMOTE_ADDR'], $black_ip_sumka)) {
            return true;
        } else {
            return false;
        }
    }

    public function log404() {
        $registry = Registry::getInstance();
        $server = $param = '';

        foreach ($_SERVER as $key => $value) {
            $server .= "$key => $value \n";
        }
        foreach ($this->param as $key => $value) {
            $param .= "$key => $value \n";
        }

        $query = $registry->db->prepare("INSERT INTO `404`(server, param, shop_id) VALUES (:server, :param, :shop_id)");
        $query->bindParam(":server", $server, PDO::PARAM_STR);
        $query->bindParam(":param", $param, PDO::PARAM_STR);
        $query->bindParam(":shop_id", $registry->shop_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

}
