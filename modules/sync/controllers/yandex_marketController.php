<?php

class yandex_marketController extends Controller {

    public function getProductsAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels('Products', 'products');
        $products = new Products();

        $this->category_id = $this->param['category_id'];
    }

    public function yandex_marketAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Category");

        if ($registry->shop == 'lady') {
            $file = 'yandex_lady.xml';
        } elseif ($registry->shop == 'platok') {
            $file = 'yandex_platok.xml';
        } elseif ($registry->shop == 'sumka') {
            $file = 'yandex_sumka.xml';
        } else {
            $file = 'yandex.xml';
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
            foreach ($this->products as $category_id => $value) {
                foreach ($value as $key => $products_value) {
                    $images_products[$category_id][$key] = $products->getImages($products_value->id);
                }
            }
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
            $xml = '<?xml version="1.0" encoding="UTF-8"?>
	<!DOCTYPE yml_catalog SYSTEM "shops.dtd">
<yml_catalog date="' . date('Y-m-d H:i') . '">
    <shop>
        <name>' . $this->_replace($registry->shop_name) . '</name>
        <company>' . $this->_replace($set->name) . '</company>
        <url>' . $registry->base_url . '</url>
        <platform>OX2 CMS</platform>
        <version>1.2.8</version>
        <agency>OX2</agency>
        <email>info@ox2.ru</email>
        <currencies>
            <currency id="RUR" rate="1"/>
            <currency id="USD" rate="CBRF"/>
            <currency id="EUR" rate="CBRF"/>
            <currency id="UAH" rate="CBRF"/>
        </currencies>
        ';



            $xml_products = '<offers>
                ';
            Lavra_Loader::LoadClass('Application');
            $category_arr = array();
            if (!isset($_POST['is_warehouse']))
                $_POST['is_warehouse'] = 0;
            foreach ($_POST['products_id'] as $category_id => $value) {
                foreach ($value as $key => $product_id) {
                    $get_product = $products->getPrpductId($product_id);
                    $category_arr[$get_product->category_1_id] = $get_product->category_1_id;
                    if ($get_product->price > 0) {
                        if ($this->_replace($get_product->name) != "") {
                            if ($get_product->file != "" && mb_strpos($get_product->file, '{') === false && mb_strpos($get_product->file, ']') === false && mb_strpos($get_product->file, '[') === false && mb_strpos($get_product->file, '}') === false && mb_strpos($get_product->file, '`') === false) {
                                if (mb_strpos($get_product->pseudo_dir, '<div') === false) {
                                    if ($registry->shop == 'lady') {
                                        $xml_products .= $this->_DressModel($characteristic, $get_product, $get_product->id, $category_id);
                                    } elseif ($registry->shop == 'platok') {
                                        $xml_products .= $this->_PlatokModel($characteristic, $get_product, $get_product->id, $category_id);
                                    } elseif ($registry->shop == 'sumka') {
                                        $xml_products .= $this->_SumkaModel($characteristic, $get_product, $get_product->id, $category_id);
                                    } else {
                                        $xml_products .= $this->_standartModel($get_product, $category_id);
                                    }
                                }
                            }
                        }
                    }
                }
            }
            $xml_products .= '
            </offers>';

            $tmp_category_parents_id = array(); //Хранит все катгории, чтобы они не повторялись (если у 2-ух категорий 1 потомок, чтобы он 1 раз и писался)
            $xml .= '<categories>
                ';
            foreach ($category_arr as $key => $category_id) {
                if (isset($_POST['products_id'][$category_id]) && count($_POST['products_id'][$category_id])) { //Если есть продукты в этой категории
                    $get_category = $category->getCategoryId($category_id);

                    $category_parent_arr = $app->getParentsCategory($get_category->id); //Ищем всех потомков категории
                    if (count($category_parent_arr)) {
                        foreach ($category_parent_arr as $category_parent_id => $category_value_id) { //Обходим всех потомков, и выстраиваем дерево
                            if (!isset($tmp_category_parents_id[$category_value_id->id])) {
                                $tmp_category_parents_id[$category_value_id->id] = 1;
                                $xml .= '<category id="' . $category_value_id->id . '" parentId="' . $category_parent_id . '">' . $this->_replace($category_value_id->name) . '</category>
                ';
                            }
                        }
                    } else {
                        $xml .= '<category id="' . $get_category->id . '" parentId="0">' . $this->_replace($get_category->name) . '</category>
                ';
                    }
                }
            }
            $xml .= '</categories>
                <local_delivery_cost>' . $set->delivery_yandex_market . '</local_delivery_cost>
                ';

            $xml .= $xml_products;

            $xml .= '
        </shop>
</yml_catalog>';


            $fp = fopen($registry->base_dir . "market/$file", "w");
            fwrite($fp, $xml);
            fclose($fp);
            $this->setMessage('Файл успешно обновлен!');
        }

        if (file_exists($registry->base_dir . "market/$file")) {
            $this->is_yandex = 1;

            $this->products_in_xml = $this->_getXMLProducts($file); //Продукты в XML

            $this->is_change = filemtime($registry->base_dir . "market/$file");
        } else
            $this->is_yandex = 1;



        $this->menu = $registry->menu;
    }

    private function _DressModel(Characteristics $characteristic, $get_product, $product_id, $category_id) {
//        if ($product_id == 2213) {
        $registry = Registry::getInstance();

        if (!empty($get_product->brand_name)) {
            $get_color = $characteristic->getProductValues($product_id, 55);
            $get_color_all = null;
            foreach ($get_color as $value_color) {
                $get_color_all = strtolower($value_color->name);
                break;
            }

            $get_sezon = $characteristic->getProductValues($product_id, 57);
            $get_size = $characteristic->getProductValues($product_id, 51);
            $xml_products = '';
            foreach ($get_size as $value_size) {
                $price = $get_product->price;
                $old_price = $get_product->old_price;

                $is_change_old_price = true;
                if ($value_size->name > 0) {
                    Lavra_Loader::LoadModels("Characteristics", "characteristics");
                    $product_characteristic_size = $characteristic->getProductValuesCharAll(62, $get_product->id, $registry->shop_type);
                    if (isset($product_characteristic_size[$get_product->id]) && count($product_characteristic_size[$get_product->id])) {

                        $is_change_old_price = false;
                        foreach ($product_characteristic_size[$get_product->id] as $value_size_discount) {
                            if ((int) $value_size->name == (int) $value_size_discount->name) {
                                $is_change_old_price = true;
                            }
                        }
                        if ($is_change_old_price == false && $old_price > 0) {
                            $price = $old_price;
                            $old_price = 0;
                        }
                    }
                }

                $xml_products .= '<offer available="' . (($get_product->warehouse == 0) ? 'false' : 'true') . '"  type="vendor.model"  id="' . $get_product->id . 's' . $this->_replace(stripslashes($value_size->name)) . '">
                        <url>' . $registry->base_url . 'products/' . $get_product->pseudo_dir . '/</url>
                        <price>' . $price . '</price>';


                if ($old_price > $price) {
                    $xml_products .= '<oldprice>' . $old_price . '</oldprice>';
                }

                $xml_products .= '<currencyId>RUR</currencyId>
                        <categoryId>' . $category_id . '</categoryId>';
                $products = new Products();
                $_get_product_images = $products->getImages($product_id, -1);
                if (isset($_get_product_images[6])) {
                    $i = 0;
                    foreach ($_get_product_images[6] as $value_img) {
                        $i++;
                        if ($i < 10) {
                            $xml_products .= "\n                        <picture>" . $registry->gallery_url . $value_img->file . "</picture>";
                        }
                    }
                } else {
                    $xml_products .= "\n                        <picture>" . $registry->gallery_url . $get_product->file . "</picture>";
                }
                $xml_products .= '
                        <store>false</store>
                        <pickup>false</pickup>
                        <delivery>true</delivery>
                        <typePrefix>' . $this->_replace(stripslashes($get_product->category_name)) . '</typePrefix>
                        <vendor>' . $this->_replace(stripslashes($get_product->brand_name)) . '</vendor>
                        <model>' . $this->_replace(stripslashes($get_product->name)) . '</model>
                        <description>' . $this->_replace(substr($get_product->desc, 0, strrpos(substr($get_product->desc, 0, 240), ' '))) . '</description>
                        <downloadable>false</downloadable>
                        <param name="Размер" unit="RU">' . $this->_replace(stripslashes($value_size->name)) . '</param>
                        ' . ((!empty($get_color_all)) ? '<param name="Цвет">' . $this->_replace(stripslashes($get_color_all)) . '</param>' : '') . '
                        <param name="Пол">Женский</param>
                        <param name="Возраст">Взрослый</param>
                        ' . (!empty($get_product->mod_name) ? '<param name="Материал">' . $this->_replace(stripslashes($get_product->mod_name)) . '</param>' : '') . '
                        ' . ((isset($get_sezon[0])) && isset($get_sezon[0]->name) ? '<param name="Сезон">' . $this->_replace(stripslashes($get_sezon[0]->name)) . '</param>' : '') . '
                    </offer>
                    ';
            }
            return $xml_products;
        }
//        }
    }

    private function _PlatokModel(Characteristics $characteristic, $get_product, $product_id, $category_id) {
        $registry = Registry::getInstance();

        $get_color = $characteristic->getProductValues($product_id, 63);
        $get_color_all = null;
        foreach ($get_color as $value_color) {
            $get_color_all = strtolower($value_color->name);
            break;
        }
        $get_material = $characteristic->getProductValues($product_id, 66);
        $get_material_all = null;
        foreach ($get_material as $value_material) {
            $get_material_all = strtolower($value_material->name);
            break;
        }
        $get_type = $characteristic->getProductValues($product_id, 66);
        $get_type_all = null;
        foreach ($get_type as $value_type) {
            $get_type_all = strtolower($value_type->name);
            break;
        }

//            $get_sezon = $characteristic->getProductValues($product_id, 57);
//            $get_size = $characteristic->getProductValues($product_id, 51);
        $xml_products = '';
        $xml_products .= '<offer available="' . (($get_product->warehouse == 0) ? 'false' : 'true') . '"  type="vendor.model"  id="' . $get_product->id . '">
                        <url>' . $registry->base_url . 'products/' . $get_product->pseudo_dir . '/</url>
                        <price>' . $get_product->price . '</price>';

        if ($get_product->old_price > $get_product->price) {
            $xml_products .= '<oldprice>' . $get_product->old_price . '</oldprice>';
        }

        $xml_products .= '<currencyId>RUR</currencyId>
                        <categoryId>' . $category_id . '</categoryId>';
        $products = new Products();
        $_get_product_images = $products->getImages($product_id, -1);
        if (isset($_get_product_images[6])) {
            $i = 0;
            foreach ($_get_product_images[6] as $value_img) {
                $i++;
                if ($i < 10) {
                    $xml_products .= "\n                        <picture>" . $registry->gallery_url . $value_img->file . "</picture>";
                }
            }
        } else {
            $xml_products .= "\n                        <picture>" . $registry->gallery_url . $get_product->file . "</picture>";
        }
        $xml_products .= '
                        <store>false</store>
                        <pickup>false</pickup>
                        <delivery>true</delivery>
                        <vendor>Lalipop</vendor>
                        <typePrefix>' . $this->_replace(stripslashes($get_product->category_name)) . '</typePrefix>
                        <model>' . $this->_replace(stripslashes($get_product->name)) . '</model>
                        <description>' . $this->_replace(substr($get_product->desc, 0, strrpos(substr($get_product->desc, 0, 240), ' '))) . '</description>
                        <downloadable>false</downloadable>
                        ' . ((!empty($get_color_all)) ? '<param name="Цвет">' . $this->_replace(stripslashes($get_color_all)) . '</param>' : '') . '
                        ' . ((!empty($get_material_all)) ? '<param name="Материал">' . $this->_replace(stripslashes($get_material_all)) . '</param>' : '') . '
                        ' . ((!empty($get_type_all)) ? '<param name="Тип">' . $this->_replace(stripslashes($get_type_all)) . '</param>' : '') . '
                        <param name="Пол">Женский</param>
                        <param name="Возраст">Взрослый</param>
                    </offer>
                    ';
        return $xml_products;
    }

    private function _SumkaModel(Characteristics $characteristic, $get_product, $product_id, $category_id) {
        $registry = Registry::getInstance();

        $get_color = $characteristic->getProductValues($product_id, 73);
        $get_color_all = null;
        foreach ($get_color as $value_color) {
            $get_color_all = strtolower($value_color->name);
            break;
        }
        $get_material = $characteristic->getProductValues($product_id, 71);
        $get_material_all = null;
        foreach ($get_material as $value_material) {
            $get_material_all = strtolower($value_material->name);
            break;
        }
        $get_country = $characteristic->getProductValues($product_id, 74);
        $get_country_all = null;
        foreach ($get_country as $value_type) {
            $get_country_all = strtolower($value_type->name);
            break;
        }


//            $get_sezon = $characteristic->getProductValues($product_id, 57);
//            $get_size = $characteristic->getProductValues($product_id, 51);
        $xml_products = '';
        $xml_products .= '<offer available="' . (($get_product->warehouse == 0) ? 'false' : 'true') . '"  type="vendor.model"  id="' . $get_product->id . '">
                        <url>' . $registry->base_url . 'products/' . $get_product->pseudo_dir . '/</url>
                        <price>' . $get_product->price . '</price>';

        if ($get_product->old_price > $get_product->price) {
            $xml_products .= '<oldprice>' . $get_product->old_price . '</oldprice>';
        }

        $xml_products .= '<currencyId>RUR</currencyId>
                        <categoryId>' . $category_id . '</categoryId>';
        $products = new Products();
        $_get_product_images = $products->getImages($product_id, -1);
        if (isset($_get_product_images[6])) {
            $i = 0;
            foreach ($_get_product_images[6] as $value_img) {
                $i++;
                if ($i < 10) {
                    $xml_products .= "\n                        <picture>" . $registry->gallery_url . $value_img->file . "</picture>";
                }
            }
        } else {
            $xml_products .= "\n                        <picture>" . $registry->gallery_url . $get_product->file . "</picture>";
        }
        $xml_products .= '
                        <store>false</store>
                        <pickup>false</pickup>
                        <delivery>true</delivery>
                        <vendor>' . $this->_replace(stripslashes($get_product->brand_name)) . '</vendor>
                        <typePrefix>' . $this->_replace(stripslashes($get_product->category_name)) . '</typePrefix>
                        <model>' . $this->_replace(stripslashes($get_product->name)) . '</model>
                        <description>' . $this->_replace(substr($get_product->desc, 0, strrpos(substr($get_product->desc, 0, 240), ' '))) . '</description>
                        <country_of_origin>' . $get_country_all . '</country_of_origin>    
                        <downloadable>false</downloadable>
                        ' . ((!empty($get_color_all)) ? '<param name="Цвет">' . $this->_replace(stripslashes($get_color_all)) . '</param>' : '') . '
                        ' . ((!empty($get_material_all)) ? '<param name="Материал">' . $this->_replace(stripslashes($get_material_all)) . '</param>' : '') . '
                        <param name="Пол">Женский</param>
                        <param name="Возраст">Взрослый</param>
                    </offer>
                    ';
        return $xml_products;
    }

    private function _VendorModel(Characteristics $characteristic, $get_product, $product_id, $category_id) {
        $registry = Registry::getInstance();

        if (!empty($get_product->brand_name)) {
            $get_sezon = $characteristic->getProductValues($product_id, 4);
            $get_kamen = $characteristic->getProductValues($product_id, 5);
            $get_dlina = $characteristic->getProductValues($product_id, 6);
            $get_ves = $characteristic->getProductValues($product_id, 4);

//                                        $get_size = $characteristic->getProductValues($product_id, 9);
//                                        foreach ($get_size as $value_size) {
            $get_color = $characteristic->getProductValues($product_id, 2);
            $get_color_all = null;
            foreach ($get_color as $value_color) {
                $get_color_all = $get_color_all . ', ' . ($value_color->name);
            }
            $get_color_all = trim(Application::lower($get_color_all), ' ,');

            $get_sezon = $characteristic->getProductValues($product_id, 4);
            $get_type = $characteristic->getProductValues($product_id, 5);
            $get_dlina = $characteristic->getProductValues($product_id, 6);
            $get_ves = $characteristic->getProductValues($product_id, 8);

            $get_size = $characteristic->getProductValues($product_id, 9);
            foreach ($get_size as $value_size) {
                $get_color = $characteristic->getProductValues($product_id, 7);
                foreach ($get_color as $value_color) {

                    $xml_products .= '<offer available="' . (($get_product->warehouse == 0) ? 'false' : 'true') . '"  type="vendor.model">
                        <url>' . $registry->base_url . 'products/' . $get_product->pseudo_dir . '/</url>
                        <price>' . $get_product->price . '</price>'
                            . (($get_product->old_price > 0) ? '<oldprice>' . $get_product->old_price . '</oldprice>' : '') .
                            '<currencyId>RUR</currencyId>
                        <categoryId>' . $category_id . '</categoryId>';
                    $products = new Products();
                    $_get_product_images = $products->getImages($product_id, -1);
                    if (isset($_get_product_images[6])) {
                        $i = 0;
                        foreach ($_get_product_images[6] as $value_img) {
                            $i++;
                            if ($i < 10) {
                                $xml_products .= "\n                        <picture>" . $registry->gallery_url . $value_img->file . "</picture>";
                            }
                        }
                    } else {
                        $xml_products .= "\n                        <picture>" . $registry->gallery_url . $get_product->file . "</picture>";
                    }
                    $xml_products .= '
                        <store>false</store>
                        <pickup>false</pickup>
                        <delivery>true</delivery>
                        <vendor>' . $this->_replace(stripslashes($get_product->brand_name)) . '</vendor>
                        <model>' . $this->_replace(stripslashes($get_product->name)) . '</model>
                        <description>' . $this->_replace(substr($get_product->desc, 0, strrpos(substr($get_product->desc, 0, 240), ' '))) . '</description>
                        <downloadable>false</downloadable>
                        <param name="Размер" unit="RU">' . $this->_replace(stripslashes($value_size->name)) . '</param>
                        <param name="Цвет">' . $this->_replace(stripslashes($value_color->name)) . '</param>
                        <param name="Пол">Женский</param>
                        <param name="Возраст">Взрослый</param>
                        ' . ((isset($get_sezon[0])) && isset($get_sezon[0]->name) ? '<param name="Сезон">' . $this->_replace(stripslashes($get_sezon[0]->name)) . '</param>' : '') . '
                        ' . ((isset($get_type[0])) && isset($get_type[0]->name) ? '<param name="Тип">' . $this->_replace(stripslashes($get_type[0]->name)) . '</param>' : '') . '
                        ' . ((isset($get_dlina[0])) && isset($get_dlina[0]->name) ? '<param name="Длина">' . $this->_replace(stripslashes($get_dlina[0]->name)) . '</param>' : '') . '
                    </offer>
                    ';
                }
            }
            return $xml_products;
        }
    }

    private function _standartModel($get_product, $category_id) {
        $registry = Registry::getInstance();
        $xml_products = '<offer id="' . $get_product->id . '" available="true">
    <url>' . $registry->base_url . 'products/' . $get_product->pseudo_dir . '/</url>
    <price>' . $get_product->price . '</price>'
                . (($get_product->old_price > $get_product->price) ? '<oldprice>' . $get_product->old_price . '</oldprice>' : '') .
                '<currencyId>RUR</currencyId>
    <categoryId>' . $category_id . '</categoryId>';
        $products = new Products();
        $_get_product_images = $products->getImages($get_product->id, -1);
        if (isset($_get_product_images[6])) {
            $i = 0;
            foreach ($_get_product_images[6] as $value_img) {
                $i++;
                if ($i < 10) {
                    $xml_products .= "\n    <picture>" . $registry->gallery_url . $value_img->file . "</picture>";
                }
            }
        } else {
            $xml_products .= "\n    <picture>" . $registry->gallery_url . $get_product->file . "</picture>";
        }
        $xml_products .= '
                            <pickup>true</pickup>
    <delivery>true</delivery>
    <local_delivery_cost>300</local_delivery_cost>
    <name>' . $this->_replace($get_product->name) . '</name>
    <vendor>' . $this->_replace(stripslashes($get_product->brand_name)) . '</vendor>
    <description>' . $this->_replace(substr($get_product->desc, 0, strrpos(substr($get_product->desc, 0, 240), ' '))) . '</description>
</offer>';
        return $xml_products;
    }

    private function _getXMLProducts($file) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Application");
        $dom = new DOMDocument();
        $dom->load($registry->base_dir . "market/$file"); //Открываем xml-файл


        $xpath = new DOMXpath($dom);

        $count = $xpath->query('/yml_catalog/shop/offers/offer/* ');

        $return = array();
        foreach ($count as $key => $value) {
            if ($value->nodeName == 'url') {
                $return['url'][] = $value->nodeValue;
            }
            if ($value->nodeName == 'name') {
                $return['name'][] = ($value->nodeValue);
            }
        }
        return $return;
    }

    private
            function _replace($string) {
        return str_replace('>', '&gt;', (str_replace('&', '&amp;', str_replace('>', '&gt;', str_replace('<', '&lt;', str_replace("'", '&apos;', strip_tags(stripslashes($string))))))));
    }

}

function fix_latin1_mangled_with_utf8_maybe_hopefully_most_of_the_time($str) {
    return preg_replace_callback('#[\\xA1-\\xFF](?![\\x80-\\xBF]{2,})#', 'utf8_encode_callback', $str);
}

function utf8_encode_callback($m) {
    return utf8_encode($m[0]);
}
