<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MoveProducts
 *
 * @author Komp
 */
class MoveShopProduct {

    /**
     * Копирует товар из lady.lalipop в woman.lalipop
     */
    public function moveLadyProductWoman($product_id) {
        $registry = Registry::getInstance();
        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Category');
        $cac->deleteTag('Files');
        CacheModule::delCacheModule('products');
        CacheModule::delCacheModule('Controller');

        Lavra_Loader::LoadModels("Brand", "brand");
        $brand_obj = new Brand();
        $products = new Products();
        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        $characteristic = new Characteristics();

        $get_lady_chars = $this->_getCharProducts($product_id);
        $products->setShopType($product_id, 5);
        $products->setCategory1($product_id, 0);

        /**
         * Импорт брендов
         */
        $get_product = $products->getPrpductId($product_id);
        if (isset($get_product->id) && !empty($get_product->brand_name)) {
            $is_brand = $brand_obj->getBrandName($get_product->brand_name, 5);
            if (!isset($is_brand->id)) { //Если бренд не существует, то добавляем его
                $brand_id = $brand_obj->add($get_product->brand_name, '', '', null, '', $get_product->pseudo_dir, '', '', '', '', 0, 0, 1);
                $brand_obj->setShopType($brand_id, 5);
            } else { //Если существует получаем его id
                $brand_id = $is_brand->id;
            }
            $products->setBrandId($product_id, $brand_id);
        }


        /**
         * Ищем характеристики на woman.lalipop аналогичные lady.lalipop
         */
        foreach ($get_lady_chars as $value) {
            $get_char = $characteristic->getCharacteristicName($value->name, 5);
            if (!isset($get_char->id)) { //Если х-ка не найдена, то создаем ее
                $characteristic_id = $characteristic->addCharacteristics($value->name, '', 0, 0, '', '', 0, 0, 0, 0);
                $characteristic->setShopType($characteristic_id, 5);
            } else {
                $characteristic_id = $get_char->id;
            }

            $get_product_char_value = $characteristic->getValueProduct($product_id);
            foreach ($get_product_char_value as $char_value) {
                if ($char_value->characteristic_id == $value->id) {
                    //characteristic_id
                    $get_char_value = $characteristic->getValueId($char_value->characteristic_value_id); //Читаем старую х-ку
                    $characteristic->delValueIdProduct($product_id, $get_char_value->id); //Удаляем х-ку из товара на Lady

                    /**
                     * Добавляем х-ки к товару
                     */
                    $get_woman_char_value = $characteristic->getValueName($get_char_value->name, $characteristic_id);
                    if (!isset($get_woman_char_value->id)) {
                        $value_id = $characteristic->addValue($characteristic_id, $get_char_value->name, $get_char_value->pseudo_dir, $get_char_value->unit, $get_char_value->price, $get_char_value->is_select, $get_char_value->is_param_1, $get_char_value->is_param_2, $get_char_value->is_param_3, $get_char_value->param_str_1, $get_char_value->param_str_2, $get_char_value->param_str_3, $get_char_value->order);
                    } else {
                        $value_id = $get_woman_char_value->id;
                    }

                    $is_value = $characteristic->isValueProduct($product_id, $value_id);

                    if (!$is_value) {
                        $characteristic->addValueProduct($product_id, $characteristic_id, $value_id, 0, 0);
                    }
                }
            }
        }
    }

    /**
     * Возвращает список всех х-к которые 
     */
    private function _getCharProducts($product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM characteristic WHERE is_delete = 0 && id IN (SELECT characteristic_id FROM characteristic_products WHERE product_id = :product_id)");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

}
