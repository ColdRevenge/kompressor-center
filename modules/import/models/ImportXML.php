<?php

class ImportXML {

    public function addXMLFile($name, $link, $category, $category_id, $xml_type, $shop_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO imports_xml (name, link, category, category_id, xml_type, shop_id) VALUES (:name, :link, :category, :category_id, :xml_type, :shop_id)");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":link", $link, PDO::PARAM_STR, 255);
        $query->bindParam(":category", $category, PDO::PARAM_STR, 255);
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->bindParam(":xml_type", $xml_type, PDO::PARAM_INT, 11);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function getXMLFiles($shop_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM imports_xml WHERE is_delete=0 && shop_id=:shop_id");
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getXMLFileId($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM imports_xml WHERE is_delete=0 && id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
    
    public function setUpTimeNow($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE imports_xml SET uptime=NOW() WHERE id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function delXMLFile($file_id, $shop_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM imports_xml WHERE id=:file_id && shop_id = :shop_id");
        $query->bindParam(":file_id", $file_id, PDO::PARAM_INT, 11);
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function delAllXMLFile($shop_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM imports_xml WHERE shop_id = :shop_id");
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function getCharProducts($product_id, $characteristic_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT (SELECT name FROM characteristic_value WHERE id=characteristic_products.characteristic_value_id) as name FROM  characteristic_products WHERE product_id=:product_id && characteristic_id = :characteristic_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":characteristic_id", $characteristic_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();
        foreach ($return as $value) {
            $result[] = $value->name;
        }
        return $result;
    }

    public function getMinSizeProducts($product_id, $characteristic_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT MIN(name*1) as min_size "
                . "FROM characteristic_value WHERE characteristic_value.id IN "
                . "(SELECT characteristic_products.characteristic_value_id FROM characteristic_products WHERE "
                . " (product_id=:product_id && characteristic_products.characteristic_id = :characteristic_id))");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":characteristic_id", $characteristic_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetch(PDO::FETCH_OBJ);
        if (isset($return->min_size)) {
            return $return->min_size;
        }
        return false;
    }

    public function getMaxSizeProducts($product_id, $characteristic_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT MAX(name*1) as max_size "
                . "FROM characteristic_value WHERE characteristic_value.id IN "
                . "(SELECT characteristic_products.characteristic_value_id FROM characteristic_products WHERE "
                . " (product_id=:product_id && characteristic_products.characteristic_id = :characteristic_id))");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":characteristic_id", $characteristic_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetch(PDO::FETCH_OBJ);
        if (isset($return->max_size)) {
            return $return->max_size;
        }
        return false;
    }
    public function delProductValue($product_id, $characteristic_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM characteristic_products WHERE product_id=:product_id && characteristic_id=:characteristic_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":characteristic_id", $characteristic_id, PDO::PARAM_INT, 11);
        $query->execute();

        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
    }

    public function _getContent($link) {
        $registry = Registry::getInstance();
        if (file_exists($registry->import_dir . md5($link) . '_' . date('dmY'))) {
            $fp = fopen($registry->import_dir . md5($link) . '_' . date('dmY'), 'r');
            $get = fread($fp, filesize($registry->import_dir . md5($link) . '_' . date('dmY')));
            fclose($fp);
//            echo 'cache@@@@';
        } else {
            $get = file_get_contents($link);
            if (strlen($get) > 10) { //Если страница доступна
                $fp = fopen($registry->import_dir . md5($link) . '_' . date('dmY'), 'w');
                fwrite($fp, $get);
                fclose($fp);
            } else {
                echo 'Битая ссылка: ' . $link . "\n<Br/>";
            }
        }
        return $get;
    }

    /**
     * Обновляет / Записывает продукты 
     */
    public function addProduct($mod_name, $name, $article, $price, $cost_price, $brand, $description, $category_1_id, $picture_1, $picture_2, $picture_3, $picture_4, $picture_5, Array $params) {
        $this->_cleanCache();
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels('Products', 'products');
        Lavra_Loader::LoadModels('Mod', 'products');
        Lavra_Loader::LoadModels("Brand", "brand");
        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $characteristic = new Characteristics();
        $brand_obj = new Brand();
        $products = new Products();
        $mods = new Mod();
        $products_all = $this->_getProductsForImport();

        try {
            /**
             * Импорт бренда
             */
            if (!empty($brand)) {
                $is_brand = $brand_obj->getBrandName($brand);
                if (!isset($is_brand->id)) { //Если бренд не существует, то добавляем его
                    $brand_id = $brand_obj->add(trim($brand), '', '', '', '', '', '', '', '', '', 0, 0, 1);
                    $brand_obj->setShopType($brand_id, $registry->shop_type);
                } else { //Если существует получаем его id
                    $brand_id = $is_brand->id;
                }
            } else {
                $brand_id = 0;
            }

            if (!isset($products_all[$article])) {
                $pseudo_dir = $this->_auto_pseudo_dir(trim($name, "' "), 0); //Если псевдопапка не заполненна, например, при импорте товаров
                $product_id = $products->add(trim($name, "' "), '', '', '', $description, '', '', '', $category_1_id, 0, 0, 0, 0, $pseudo_dir, $brand_id, 0, 1, null, null, null, null, null, null, null, null);
                $products->setShopType($product_id, $registry->shop_type);
                $mods->addMod($product_id, 1, $mod_name, $article, $cost_price, $price, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 1, null, null, null, null, null, null, null, null, null, null);

                $query = $registry->db->prepare("UPDATE products SET pseudo_dir=(SELECT article FROM product_mod WHERE product_id = products.id LIMIT 1) WHERE pseudo_dir=''");
                $query->execute();


                /* Добавление характеристик к товарам 
                  ТОЛЬКО ПРИ ДОБАВЛЕНИИ ТОВАРА!!!
                 */
//                    $characteristic->delValueAllProduct($product_id);
                foreach ($params as $char_name => $value) {
                    $get_char = $characteristic->getCharacteristicName($char_name, $registry->shop_type);
                    /*
                     * Создаем х-ку
                     */
                    if (!isset($get_char->id)) {
                        $characteristic_id = $characteristic->addCharacteristics(trim($char_name), '', 0, 0, '', '', 0, 0, 0, 0);
                        $characteristic->setShopType($characteristic_id, $registry->shop_type);
                    } else {
                        $characteristic_id = $get_char->id;
                    }

                    /*
                     * Создаем значение х-ки
                     */
                    if (is_array($value)) { //Если х-ка массивом
                        foreach ($value as $value_child) {
                            $get_char_value = $characteristic->getValueName(trim($value_child), $characteristic_id);

                            if (isset($get_char_value->id)) { //Если значение характеристики существует
                                if (!$characteristic->isValueProduct($product_id, $get_char_value->id)) { //Если характеристика не привязана к товару
                                    $characteristic->addValueProduct($product_id, $characteristic_id, $get_char_value->id);
                                }
                            } else { //Если значение характеристики не существует, добавляем
                                $value_id = $characteristic->addValue($characteristic_id, trim($value_child), '', '', 0, 0, 0, 0, 0, '', '', '');
                                $characteristic->addValueProduct($product_id, $characteristic_id, $value_id);
                            }
                        }
                    } else {
                        $get_char_value = $characteristic->getValueName(trim($value), $characteristic_id);

                        if (isset($get_char_value->id)) { //Если значение характеристики существует
                            if (!$characteristic->isValueProduct($product_id, $get_char_value->id)) { //Если характеристика не привязана к товару
                                $characteristic->addValueProduct($product_id, $characteristic_id, $get_char_value->id);
                            }
                        } else { //Если значение характеристики не существует, добавляем
                            $value_id = $characteristic->addValue($characteristic_id, trim($value), '', '', 0, 0, 0, 0, 0, '', '', '');
                            $characteristic->addValueProduct($product_id, $characteristic_id, $value_id);
                        }
                    }
                }

                $this->imageImport($product_id, $picture_1, $picture_2, $picture_3, $picture_4, $picture_5);
            }
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        $this->_cleanCache();
    }

    private function _getPseudoDir($name, $prefix = null) {
        Lavra_Loader::LoadClass("Application");

        $app = new Application();
        return str_replace('--', '-', str_replace('--', '-', mb_strtolower(Application::getPseudoDir($app->convertToLatin(trim(($name))))))) . $prefix;
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

        $get_file_1 = file_get_contents($file_link_1);

        if (strlen($get_file_1) > 200) {
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

}
