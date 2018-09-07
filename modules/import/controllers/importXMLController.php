<?php

class importXMLController extends Controller {

    public function list_xmlAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("ImportXML", "import");
        $import = new ImportXML();

        if (isset($this->param['del_id'])) {
            $import->delXMLFile($this->param['del_id'], $registry->shop_type);
            $this->redirect($registry->admin_url . 'import/xml/?message=1');
        }

        if (isset($_POST['xml_link'])) {
            $import->delAllXMLFile($registry->shop_type);
            foreach ($_POST['xml_link'] as $key => $value) {
                if (!empty($_POST['xml_link'][$key])) {
                    $import->addXMLFile($_POST['xml_name'][$key], $_POST['xml_link'][$key], $_POST['xml_category'][$key], $_POST['category_id'][$key], $_POST['xml_type'][$key], $registry->shop_type);
                }
            }
            $this->setMessage('Успешно сохранено');
        }



        if (isset($_GET['message'])) {
            switch ($_GET['message']) {
                case 1:
                    $this->setMessage('Файл успешно удален!');

                    break;

                default:
                    break;
            }
        }

        $this->files = $import->getXMLFiles($registry->shop_type);

        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $this->tree = $category->getCategory(0, $registry->shop_type);
    }

    public function upAction() {
        $registry = Registry::getInstance();
        if (isset($this->param['up_id'])) {
            Lavra_Loader::LoadModels("ImportXML", "import");
            Lavra_Loader::LoadModels("ImportParserXML", "import");

            $import = new ImportXML();
            $import_parser = new ImportParserXML();
            $get_file = $import->getXMLFileId($this->param['up_id']);
            if (isset($get_file->link)) {

                $_category_arr = explode(',', $get_file->category);
                $category_arr = array();
                foreach ($_category_arr as $value) {
                    if ((int) $value > 0) {
                        $category_arr[] = (int) trim($value);
                    }
                }
                $get_xml = $import->_getContent($get_file->link);

                if (strlen($get_xml) > 10) {
                    $import->setUpTimeNow($get_file->id);

                    $dom_obj = new DOMDocument();
                    $dom_obj->loadXML($get_xml);

                    if ($get_file->xml_type == 1) {
                        $get_product_type = $import_parser->leoVentoniType($dom_obj, $category_arr);
                    } else {
                        $get_product_type = $import_parser->standartType($dom_obj, $category_arr);
                    }
                    $products = $get_product_type['products'];
                    $products_size_warehouse = $get_product_type['products_size_warehouse'];
//                    print_r($products);
//                    print_r($products_size_warehouse);
//                    exit();
                    Lavra_Loader::LoadModels('Products', 'products');
                    $products_obj = new Products();
                    Lavra_Loader::LoadModels("Characteristics", "characteristics");
                    $characteristic = new Characteristics();

                    $size_warehouse = array();

                    foreach ($products as $key => $value) {
//                        if ($value['article'] == '1030000018') {
                        if (isset($value['categoryId']) && !empty($value['article'])) {

                            $picture_1 = (isset($value['picture'][0])) ? $value['picture'][0] : '';
                            $picture_2 = (isset($value['picture'][1])) ? $value['picture'][1] : '';
                            $picture_3 = (isset($value['picture'][2])) ? $value['picture'][2] : '';
                            $picture_4 = (isset($value['picture'][3])) ? $value['picture'][3] : '';
                            $picture_5 = (isset($value['picture'][4])) ? $value['picture'][4] : '';
                            $category_1_id = $get_file->category_id;
                            $get_product = $products_obj->getProductArticle($value['article']);

                            if (!isset($get_product->id)) { //Если товара не существует, то добавляем его
                                if (isset($value['name'])) {
                                    $name = $value['name'];
                                } else {
                                    $name = $value['typePrefix'] . ' ' . $value['article'];
                                }
                                $import->addProduct((isset($value['mod_name']) ? $value['mod_name'] : ''), $name, trim($value['article']), $value['price'], ceil($value['price'] / 2), $value['vendor'], nl2br(strip_tags($value['description'])), $category_1_id, $picture_1, $picture_2, $picture_3, $picture_4, $picture_5, $value['param']);
                            } else {//Если товар уже добавлен
                                /**
                                 * Если нет картинки, то пытаемся добавить
                                 */
                                $get_images = $products_obj->getImages($get_product->id);
                                if (isset($get_images['empty'])) {
                                    $import->imageImport($get_product->id, $picture_1, $picture_2, $picture_3, $picture_4, $picture_5);
                                }
                            }
                            if ($registry->shop == 'lady') { //Woman Lalipop????
                                if (isset($products_size_warehouse[$value['article']])) {
                                    $get_product = $products_obj->getProductArticle($value['article']);
                                    $char_shop_id = 0;
                                    if ($get_product->shop_id == 2) {
                                        $char_shop_id = 51;
                                    } else {
                                        $char_shop_id = 118;
                                    }
                                    $get_size = $import->getCharProducts($get_product->id, $char_shop_id);

                                    if (count($products_size_warehouse[$value['article']]) == 0) { //Отрубаем товары в которых нет размеров
                                        $products_obj->setActive($get_product->id, 0);
                                    }

                                    /**
                                     * Если кол-во размеров в базе и в реале отличается, то удаляем старые, пишем новые
                                     */
//                                        echo  "\n\n". $value['article'] . ":\n";
//                                        print_r($get_size);
//                                        echo "@#";
//                                        print_r($products_size_warehouse[$value['article']]);
//                                        echo "#";
                                    if (count($get_size) != count($products_size_warehouse[$value['article']])) {
                                        $import->delProductValue($get_product->id, $char_shop_id);
                                        foreach ($products_size_warehouse[$value['article']] as $get_value_size) {
                                            $get_value_size_obj = $characteristic->getValueName($get_value_size, $char_shop_id);
                                            if (isset($get_value_size_obj->id)) {
                                                $characteristic->addValueProduct($get_product->id, $char_shop_id, $get_value_size_obj->id, 0, 0);
                                            }
                                        }
                                    } else { //Если количество одинаковое, то все равно проверяем одинаковые ли размеры
                                        foreach ($get_size as $size_item) {
                                            if (!in_array($size_item, $products_size_warehouse[$value['article']])) { //Если массивы отличаются
                                                $import->delProductValue($get_product->id, $char_shop_id);
                                                foreach ($products_size_warehouse[$value['article']] as $get_value_size) {
                                                    $get_value_size_obj = $characteristic->getValueName($get_value_size, $char_shop_id);
                                                    if (isset($get_value_size_obj->id)) {
                                                        $characteristic->addValueProduct($get_product->id, $char_shop_id, $get_value_size_obj->id, 0, 0);
                                                    }
                                                }
                                                break;
                                            }
                                        }
                                    }
                                }
                                /**
                                 * Переносим маленькие размеры Wisel в отдельную категорию
                                 */
                                if ($get_product->category_1_id == 1015) {
                                    $max_size = $import->getMaxSizeProducts($get_product->id, $char_shop_id);
                                    if ($max_size < 52) {
                                        $products_obj->setCategory1($get_product->id, 1017);
                                    }
                                }
                            }
                        }
//                        }
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
    }

}

/*
 * <offer id="59338" type="vendor.model" available="true" group_id="28351">
<url>
http://wisell.ru/catalog/bolshie_razmery/p4-1691-1/
</url>
<price>3200</price>
<currencyId>RUR</currencyId>
<categoryId>500</categoryId>
<market_category>
Одежда, обувь и аксессуары/Женская одежда/Одежда/Платья
</market_category>
<picture>http://wisell.ru/upload/iblock/bbc/p4-1691-1_1.jpg</picture>
<picture>http://wisell.ru/upload/iblock/658/p4-1691-1_2.jpg</picture>
<picture>http://wisell.ru/upload/iblock/d53/p4-1691-1_3.jpg</picture>
<picture>http://wisell.ru/upload/iblock/505/p4-1691-1_4.jpg</picture>
<typePrefix>Платье</typePrefix>
<vendor>Wisell</vendor>
<model>П4-1691/1</model>
<description>
Яркое платье полуприлегающего силуэта из плотного трикотажного полотна. Укороченная линия плеча и складки по рукаву — самый модный элемент сезона. Перед изделия украшен кружевной кокеткой. Аксессуары в комплект не входят. Длина изделия по спинке от плечевого шва до низа изделия — 105 см
</description>
<country_of_origin>Россия</country_of_origin>
<param name="Размер" unit="RU">54</param>
<param name="Цвет">Черный, синий</param>
<param name="Материал">Вискоза 95%, Эластан 5%</param>
</offer>
 */