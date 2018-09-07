<?php

class google_merchantController extends Controller {

    public function getProductsAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels('Products', 'products');
        $products = new Products();

        $this->category_id = $this->param['category_id'];
    }

    private $_url = null;
    //https://support.google.com/merchants/answer/188494?hl=ru
    public function google_merchantAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Category");



        $this->_url = $registry->base_url;
        if ($registry->shop == 'lady') {
            $this->xml_file = $file = 'GM_lady.xml';
        } elseif ($registry->shop == 'platok') {
            $this->xml_file = $file = 'GM_platok.xml';
        } elseif ($registry->shop == 'sumka') {
            $this->xml_file = $file = 'GM_sumka.xml';
        } else {
            $this->xml_file = $file = 'GM.xml';
            $this->_url = $registry->base_https_url;
        }

        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        $characteristic = new Characteristics();
        Lavra_Loader::LoadClass("ApplicationDB");
        $app = new ApplicationDB();
        Lavra_Loader::LoadModels('Products', 'products');
        $products = new Products();
        $category = new Category();
        $this->category = $category->getCategory(0, $registry->shop_type);
        $this->products = $products->getProductsCatgoryIndex((isset($_POST['is_warehouse']) && $_POST['is_warehouse'] == '1') ? 1 : 0, $registry->shop_type);
        if (count($this->products)) {
            $images_products = array();
//            foreach ($this->products as $category_id => $value) {
//                foreach ($value as $key => $products_value) {
//                    $images_products[$category_id][$key] = $products->getImages($products_value->id);
//                }
//            }
            $this->product_images = $images_products;
        }

        Lavra_Loader::LoadModels('Setting', 'setting');
        $setting = new Setting();

        if (isset($_POST['delivery_yandex_market'])) { //Обновляем стоимость доставки
            $setting->setDeliveryYandexMarket($_POST['delivery_yandex_market']);
        }

        $set = $setting->getGeneral();
        $this->set = $set;
        if (isset($_POST['products_id'])) {

            $xml = '<?xml version="1.0"?>
<rss version="2.0" xmlns:g="http://base.google.com/ns/1.0">
<channel>
<title>' . $this->_replace($set->name) . '</title>
<link>' . $this->_url . '</link>
<description>' . $this->_replace($set->meta_desc) . '</description>
';

            Lavra_Loader::LoadClass('Application');
            if (!isset($_POST['is_warehouse'])) {
                $_POST['is_warehouse'] = 0;
            }
            $xml_products = null;

            foreach ($_POST['products_id'] as $category_id => $value) {
                foreach ($value as $key => $product_id) {
                    $get_product = $products->getPrpductId($product_id);
                    if ($get_product->price > 0) {
                        if ($this->_replace($get_product->name) != "") {
                            if ($get_product->file != "" && mb_strpos($get_product->file, '{') === false && mb_strpos($get_product->file, ']') === false && mb_strpos($get_product->file, '[') === false && mb_strpos($get_product->file, '}') === false && mb_strpos($get_product->file, '`') === false) {
                                if (mb_strpos($get_product->pseudo_dir, '<div') === false) {
                                    $xml_products .= $this->_standartModel($get_product, $category_id);
                                }
                            }
                        }
                    }
                }
            }
            $xml .= $xml_products . '
</channel>
</rss>';

            $fp = fopen($registry->base_dir . "market/$file", "w");
            fwrite($fp, $xml);
            fclose($fp);
            $this->setMessage('Файл успешно обновлен!');
        }

        if (file_exists($registry->base_dir . "market/$file")) {
            $this->is_yandex = 1;

            $this->products_in_xml = $this->_getXMLProducts(); //Продукты в XML

            $this->is_change = filemtime($registry->base_dir . "market/$file");
        } else
            $this->is_yandex = 1;



        $this->menu = $registry->menu;
    }

    private function _standartModel($get_product, $category_id) {
        $registry = Registry::getInstance();
        return '<item>
<g:id>' . $get_product->id . '</g:id>
<title>' . $this->_replace(mb_substr($get_product->name, 0, 150)) . '</title>
<link>' . $this->_url . 'products/' . $get_product->pseudo_dir . '/</link>
<description>' . $this->_replace(mb_substr($get_product->desc, 0, 4900)) . '</description>
<g:image_link>' . $this->_url . 'images/gallery/' . $get_product->file . '</g:image_link>
<g:availability>' . (($get_product->warehouse > 0) ? 'in stock' : 'out of stock') . '</g:availability>    
<g:price>' . $get_product->price . ' RUB</g:price>' .
                ($get_product->old_price > 0 ? '<g:sale_price>' . $get_product->old_price . ' RUB</g:sale_price>' : null )
                . '<g:condition>new</g:condition>' .
                (!empty($get_product->brand_name) ? '<g:brand>' . $this->_replace(stripslashes($get_product->brand_name)) . '</g:brand>' : null)
                . '</item>';
    }

    private function _getXMLProducts() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Application");
        $dom = new DOMDocument();

        if ($registry->shop == 'lady') {
            $this->xml_file = $file = 'GM_lady.xml';
        } elseif ($registry->shop == 'platok') {
            $this->xml_file = $file = 'GM_platok.xml';
        } elseif ($registry->shop == 'sumka') {
            $this->xml_file = $file = 'GM_sumka.xml';
        } else {
            $this->xml_file = $file = 'GM.xml';
        }

        $dom->load($registry->base_dir . "market/$file"); //Открываем xml-файл


        $xpath = new DOMXpath($dom);

        $count = $xpath->query('/rss/channel/item/* ');

        $return = array();
        foreach ($count as $key => $value) {
            if ($value->nodeName == 'link') {
                $return['url'][] = $value->nodeValue;
            }
            if ($value->nodeName == 'title') {
                $return['name'][] = ($value->nodeValue);
            }
        }
        return $return;
    }

    private
            function _replace($string) {
        return (str_replace('&', '&amp;', str_replace('>', '&gt;', str_replace('<', '&lt;', str_replace("'", '&apos;', strip_tags(stripslashes($string)))))));
    }

}
