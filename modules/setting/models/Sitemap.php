<?php

class Sitemap {

    private $_default_url = array();
    private $_access_char = array("<", ">", "'", '"');

    public function __construct() {
        $registry = Registry::getInstance();
        $this->setDefaultUrl($registry->base_url);
        if ($registry->shop == 'lady') {
            $this->setDefaultUrl($registry->base_url . 'odezhda/');
        } elseif ($registry->shop == 'platok') {
            $this->setDefaultUrl($registry->base_url . 'platki-sharfy/');
        } elseif ($registry->shop == 'sumka') {
            $this->setDefaultUrl($registry->base_url . 'kozhgalantereya/');
        } elseif ($registry->shop == 'woman') {
            $this->setDefaultUrl($registry->base_url . 'odezhda/');
        } else {
            $this->setDefaultUrl($registry->base_url . 'bizhuteriya/');
        }
        $this->setDefaultUrl($registry->base_url . 'category/map/');
    }

    public function getCharDesc() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("DescChar", "characteristics");
        $deac_char = new DescChar();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        $characteristics = new Characteristics();

        $get_desc = $deac_char->getCharacteristicDescAll($registry->shop_type);
//        print_r($get_desc);
        foreach ($get_desc as $key => $value) {

            if (!empty($value->desc)) {
                $get_value_id = $characteristics->getValueId($value->characteristic_value_id);
                $get_char_id = $characteristics->getCharacteristicId($get_value_id->characteristic_id);
                if ($value->category_id == 0) {
                    if (!empty($get_value_id->pseudo_dir) && !empty($get_char_id->pseudo_dir)) {
                        if ($registry->shop == 'lady') {
                            $this->setDefaultUrl('https://lady.lalipop.ru/odezhda/char/' . $get_char_id->pseudo_dir . '/' . $get_value_id->pseudo_dir . '/');
                        } elseif ($registry->shop == 'platok') {
                            $this->setDefaultUrl('https://platok.lalipop.ru/platki-sharfy/char/' . $get_char_id->pseudo_dir . '/' . $get_value_id->pseudo_dir . '/');
                        } elseif ($registry->shop == 'sumka') {
                            $this->setDefaultUrl('https://sumka.lalipop.ru/kozhgalantereya/char/' . $get_char_id->pseudo_dir . '/' . $get_value_id->pseudo_dir . '/');
                        } elseif ($registry->shop == 'woman') {
                            $this->setDefaultUrl('https://woman.lalipop.ru/odezhda/char/' . $get_char_id->pseudo_dir . '/' . $get_value_id->pseudo_dir . '/');
                        } else {
                            $this->setDefaultUrl('https://lalipop.ru/bizhuteriya/char/' . $get_char_id->pseudo_dir . '/' . $get_value_id->pseudo_dir . '/');
                        }
                    }
                } else {
                    $this->setDefaultUrl($registry->base_url . $category->getFullAdressCategoryIdRoutes(array('category_id' => $value->category_id, 'is_return' => true)) . 'char/' . $get_char_id->pseudo_dir . '/' . $get_value_id->pseudo_dir . '/');
                }
            }
        }
    }

    public function save($file) {
        if (count($_POST) > 1) {
            $this->getCharDesc();
            $this->_getProductMap();
            $this->_getRoutes();
            $this->_getNews(0);
            $this->_getNews(1);
            $this->_getNews(2);
            $this->_getNews(3);
            $this->_getNews(4);

            $sitemap = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">';
            foreach ($this->_default_url as $value) {
                $sitemap .= '
    <url> 
        <loc>' . $value . '</loc>
    </url>';
            }
            $sitemap .= '
</urlset>
';
            if (is_writeable($file)) {
                $fp = fopen($file, "w");
                fwrite($fp, $sitemap);
                fclose($fp);
            } else {
                throw new Exception('SiteMap не может быть сгенерирован! Нет прав на запись!');
            }
        }
    }

    public function setDefaultUrl($url) {
        foreach ($this->_access_char as $key => $value) {
            if (mb_strpos($url, $value) !== false) {
                return false;
            }
        }
        $this->_default_url[] = $url;
    }

    private function _getNews($type) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("News", "news");
        $news = new News();
        $get_news_result = $news->getNews($type, 10000, 0, $registry->shop_type);
        $get_news = $get_news_result['result'];
        foreach ($get_news as $value) {
            $this->setDefaultUrl($registry->base_url . 'news/look/' . $value->id . '/');
        }
    }

    private function _getRoutes() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass('Routes');
        $routes = new Routes();
        $get_routes = $routes->getAllAdress($registry->shop_type);

        foreach ($get_routes as $value) {
            $this->setDefaultUrl($registry->base_url . $value->adress);
        }
    }

    private function _getProductMap() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels('Products', 'products');
        $products = new Products();
        $product = $products->getProductsAll(0, 0, 0, 1000000, $registry->shop_type);
        foreach ($product as $key => $value) {
            if ($value->pseudo_dir != '') {
                $this->setDefaultUrl($registry->base_url . 'products/' . $value->pseudo_dir . '/');
            }
        }
    }

}
