<?php

class Characteristics {

    public function addCharacteristics($name, $pseudo_dir, $is_param_1, $is_param_2, $param_str_1, $param_str_2, $order, $category_id, $category_2_id, $category_3_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO characteristic (pseudo_dir, category_id, category_2_id, category_3_id, param_str_1, param_str_2, is_param_1, is_param_2, `name`, `order`) VALUES (:pseudo_dir, :category_id, :category_2_id, :category_3_id, :param_str_1, :param_str_2, :is_param_1, :is_param_2, :name, :order)");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":is_param_1", $is_param_1, PDO::PARAM_INT, 11);
        $query->bindParam(":is_param_2", $is_param_2, PDO::PARAM_INT, 11);
        $query->bindParam(":param_str_1", $param_str_1, PDO::PARAM_STR, 255);
        $query->bindParam(":param_str_2", $param_str_2, PDO::PARAM_STR, 255);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_2_id", $category_2_id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_3_id", $category_3_id, PDO::PARAM_INT, 11);
        $query->execute();

        $cac = Cache::getInstance();
        $cac->deleteTag('Characteristics');
        return $registry->db->lastInsertId();
    }

    public function setShopType($char_id, $shop_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE characteristic SET shop_id=:shop_id WHERE id=:id LIMIT 1");
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->bindParam(":id", $char_id, PDO::PARAM_INT, 11);
        $query->execute();

        $cac = Cache::getInstance();
        $cac->deleteTag('Characteristics');
    }

    /**
     * Возвращает все значения характеристики, при условии что они 
     * установленны у продукта в корзине
     * @param type $characteristic_id
     * @param type $language_id
     * @param type $shop_id
     * @return type 
     */
    public function getBasketValues($session_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT characteristic_value.*, characteristic_products.product_id 
            FROM characteristic_value INNER JOIN characteristic 
            ON (characteristic.is_delete = 0 && characteristic.`type` = 0 && characteristic.id = characteristic_value.characteristic_id &&
characteristic_value.is_delete = 0)   
        INNER JOIN characteristic_products 
            ON (characteristic_products.is_delete = 0 && characteristic_products.characteristic_value_id = characteristic_value.id 
&& (SELECT COUNT(*) FROM basket WHERE basket.char_1_id = characteristic_value.id || 
            basket.char_2_id = characteristic_value.id || 
            basket.char_3_id = characteristic_value.id)          
) 
INNER JOIN basket 
ON (basket.product_id = characteristic_products.product_id  &&   basket.session_id = :session_id && (basket.char_1_id = characteristic_value.id || 
            basket.char_2_id = characteristic_value.id || 
            basket.char_3_id = characteristic_value.id))
GROUP BY basket.product_id, characteristic_value.id
ORDER BY characteristic_value.`order` ASC, id ASC");
        $query->bindParam(":session_id", $session_id, PDO::PARAM_STR, 255);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result_arr = array();
        foreach ($return as $key => $value) {
            $result_arr[$value->product_id][$value->characteristic_id][] = $value;
        }
        return $result_arr;
    }

    public function setValueName($value_id, $name, $unit = '') {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE characteristic_value SET name=:name, unit=:unit WHERE id=:value_id LIMIT 1");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":unit", $unit, PDO::PARAM_STR, 255);
        $query->bindParam(":value_id", $value_id, PDO::PARAM_INT, 11);
        $query->execute();

        $cac = Cache::getInstance();
        $cac->deleteTag('Characteristics');
    }

    public function setIconCharacteristic($id, $icon) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE characteristic SET icon=:icon WHERE id=:id");
        $query->bindParam(":icon", $icon, PDO::PARAM_STR, 255);
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();

        $cac = Cache::getInstance();
        $cac->deleteTag('Characteristics');
    }

    public function setIconCharacteristicValue($id, $icon) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE characteristic_value SET icon=:icon WHERE id=:id");
        $query->bindParam(":icon", $icon, PDO::PARAM_STR, 255);
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();

        $cac = Cache::getInstance();
        $cac->deleteTag('Characteristics');
    }

    public function editCharacteristic($id, $name, $pseudo_dir, $is_param_1, $is_param_2, $param_str_1, $param_str_2, $order, $category_id, $category_2_id, $category_3_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE  characteristic SET pseudo_dir=:pseudo_dir, category_id=:category_id, category_2_id=:category_2_id, category_3_id=:category_3_id, param_str_1 = :param_str_1, param_str_2 = :param_str_2, is_param_1 = :is_param_1, is_param_2 = :is_param_2,`name`=:name, `order`=:order WHERE id=:id");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->bindParam(":is_param_1", $is_param_1, PDO::PARAM_INT, 11);
        $query->bindParam(":is_param_2", $is_param_2, PDO::PARAM_INT, 11);
        $query->bindParam(":param_str_1", $param_str_1, PDO::PARAM_STR, 255);
        $query->bindParam(":param_str_2", $param_str_2, PDO::PARAM_STR, 255);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_2_id", $category_2_id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_3_id", $category_3_id, PDO::PARAM_INT, 11);
        $query->execute();

        $cac = Cache::getInstance();
        $cac->deleteTag('Characteristics');
    }

    public function delCharacteristic($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE  characteristic SET is_delete=1 WHERE id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();

        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
    }

    public function getCharacteristics($category_id, $is_access_child = 1, $sort = '`order` ASC', $shop_id = 0) {
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Characteristics-getCharacteristics-' . $category_id . '-' . $is_access_child . '-' . $sort . '-' . $shop_id, 'Characteristics');

        if (empty($get_cache)) {
            $where = null;
            if ($is_access_child == 1) { //Если 1 то видимость в потомках категории
                Lavra_Loader::LoadClass('ApplicationDB');
                $app = new ApplicationDB();
                $parent_category_arr = $app->getParentsCategory($category_id);
                foreach ($parent_category_arr as $value) {
                    $where .= " || category_id=" . $value->id;
                }
                if (!is_null($where)) {
                    $where = trim($where);
                }
            }

            $registry = Registry::getInstance();
            $query = $registry->db->prepare("SELECT *, 
            (SELECT COUNT(*) FROM characteristic_value WHERE characteristic_id=characteristic.id && characteristic_value.is_delete = 0) as `count`
            FROM characteristic WHERE is_delete = 0 && (shop_id=:shop_id || shop_id = 0) && `type`=0 && (:category_id = -1 || category_id = :category_id || category_id = 0 $where) ORDER BY $sort, id ASC");
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            $cache->setTags('Characteristics-getCharacteristics-' . $category_id . '-' . $is_access_child . '-' . $sort . '-' . $shop_id, $return, 'Characteristics');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getMaxCharacteristic() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT `order`  FROM characteristic WHERE is_delete = 0  && `type`=0  ORDER BY `order` DESC LIMIT 1");
        $query->execute();
        $return = $query->fetch(PDO::FETCH_OBJ);

        if (isset($return->order)) {
            return $return->order + 1;
        } else {
            return 0;
        }
    }

    public function getCharacteristicId($id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Characteristics-getCharacteristicId-' . $id, 'Characteristics');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM characteristic WHERE is_delete = 0   && `type`=0 && id=:id");
            $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);

            $cache->setTags('Characteristics-getCharacteristicId-' . $id, $return, 'Characteristics');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getCharacteristicName($name, $shop_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM characteristic WHERE is_delete = 0 && TRIM(name)=TRIM(:name) && shop_id=:shop_id");
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getCharacteristicValueProduct($product_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Characteristics-getCharacteristicValueProduct-' . $product_id, 'Characteristics');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT characteristic_value.id as value_id, characteristic.id as characteristic_id, characteristic.pseudo_dir as char_pseudo_dir, characteristic_value.pseudo_dir as char_value_pseudo_dir, characteristic.icon, characteristic.id as characteristic_id, characteristic_value.unit, characteristic_value.name as value_name, characteristic_value.id as value_id, characteristic.name as characteristic_name, characteristic.`order` 
                ,CONCAT(upper(left(characteristic_value.name,1)), substr(characteristic_value.name,2))  as value_name  FROM characteristic_products
INNER JOIN characteristic ON (characteristic.id = characteristic_id   && `type`=0 && characteristic.is_delete= 0 && product_id = :product_id)
INNER JOIN characteristic_value ON (characteristic_value.id = characteristic_value_id && characteristic_value.is_delete= 0) ORDER BY characteristic.`order` ASC, characteristic_value.name ASC
");
            $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            $cache->setTags('Characteristics-getCharacteristicValueProduct-' . $product_id, $return, 'Characteristics');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Возвращает характеристики сопутствующим товарам
     * @param <type> $product_id
     * @return <type> 
     */
    public function getCharacteristicValueRelatedProduct($product_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Characteristics-getCharacteristicValueRelatedProduct-' . $product_id, 'Characteristics');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT characteristic_value.name as value_name, characteristic.name as characteristic_name, related.related_id  FROM characteristic_products
INNER JOIN characteristic ON (characteristic.id = characteristic_id   && `type`=0 && characteristic.is_delete= 0 )
INNER JOIN characteristic_value ON (characteristic_value.id = characteristic_value_id && characteristic.is_delete= 0)
INNER JOIN related ON (characteristic_products.product_id = related.related_id &&  related.product_id = :product_id)
");
            $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
            $query->execute();

            $return = $query->fetchAll(PDO::FETCH_OBJ);
            $result = array();
            foreach ($return as $value) {
                $result[$value->related_id][] = $value;
            }

            $cache->setTags('Characteristics-getCharacteristicValueRelatedProduct-' . $product_id, $result, 'Characteristics');
            return $result;
        } else {
            return $get_cache;
        }
    }

    /**
     * $warehouse - не работает, сделано на будующее
     * @param <type> $product_id
     * @param <type> $characteristic_id
     * @param <type> $characteristic_value_id
     * @param <type> $warehouse
     * @return <type>
     */
    public function addValueProduct($product_id, $characteristic_id, $characteristic_value_id, $price = 0, $warehouse = 0) {

        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO characteristic_products (price, `product_id`,`characteristic_id`,`characteristic_value_id`, warehouse, `is_delete`) VALUES (:price, :product_id, :characteristic_id, :characteristic_value_id, :warehouse,  0)");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":characteristic_id", $characteristic_id, PDO::PARAM_INT, 11);
        $query->bindParam(":characteristic_value_id", $characteristic_value_id, PDO::PARAM_INT, 11);
        $query->bindParam(":warehouse", $warehouse, PDO::PARAM_INT, 11);
        $query->bindParam(":price", $price, PDO::PARAM_INT, 11);
        $query->execute();

        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        return $registry->db->lastInsertId();
    }

    /**
     * Удаляем значение
     * @param <type> $product_id
     */
    public function delValueAllProduct($product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM characteristic_products WHERE (SELECT `type` FROM characteristic WHERE characteristic.id = characteristic_id) = 0 && is_delete = 0 && product_id = :product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();

        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
    }

    public function delValueIdProduct($product_id, $characteristic_value_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM characteristic_products WHERE characteristic_value_id = :characteristic_value_id && product_id = :product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":characteristic_value_id", $characteristic_value_id, PDO::PARAM_INT, 11);
        $query->execute();

        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
    }

    public function getValueProduct($product_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Characteristics-getValueProduct-' . $product_id, 'Characteristics');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM characteristic_products WHERE `product_id` = :product_id &&  `is_delete` = 0");
            $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);
            $result_arr = array();

            foreach ($return as $value) {
                $result_arr[$value->characteristic_value_id] = $value;
            }

            $cache->setTags('Characteristics-getValueProduct-' . $product_id, $result_arr, 'Characteristics');
            return $result_arr;
        } else {
            return $get_cache;
        }
    }

    /**
     * Меняет временный id-продукта на постоянный в характиристиках
     * @param <type> $temp_product_id
     * @param <type> $product_id
     */
    public function setTempCharProductImageId($temp_product_id, $product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `characteristic_images` SET product_id=:product_id WHERE  `type`=0 && is_delete=0 && product_id=:temp_product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":temp_product_id", $temp_product_id, PDO::PARAM_INT, 11);
        $query->execute();

        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
    }

    public function addValue($characteristic_id, $name, $pseudo_dir, $unit, $price, $is_select, $is_param_1, $is_param_2, $is_param_3, $param_str_1, $param_str_2, $param_str_3, $order = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO characteristic_value (`characteristic_id`, `name`, `pseudo_dir`, `unit`, price, `is_select`, param_str_1, param_str_2, param_str_3, is_param_1, is_param_2,is_param_3,`order`) VALUES (:characteristic_id, :name, :pseudo_dir, :unit, :price, :is_select,:param_str_1,:param_str_2,:param_str_3, :is_param_1, :is_param_2,:is_param_3, :order)");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);
        $query->bindParam(":unit", $unit, PDO::PARAM_STR, 255);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":price", $price, PDO::PARAM_INT, 11);
        $query->bindParam(":characteristic_id", $characteristic_id, PDO::PARAM_INT, 11);
        $query->bindParam(":is_select", $is_select, PDO::PARAM_INT, 11);
        $query->bindParam(":is_param_1", $is_param_1, PDO::PARAM_INT, 11);
        $query->bindParam(":is_param_2", $is_param_2, PDO::PARAM_INT, 11);
        $query->bindParam(":is_param_3", $is_param_3, PDO::PARAM_INT, 11);
        $query->bindParam(":param_str_1", $param_str_1, PDO::PARAM_STR, 255);
        $query->bindParam(":param_str_2", $param_str_2, PDO::PARAM_STR, 255);
        $query->bindParam(":param_str_3", $param_str_3, PDO::PARAM_STR, 255);
        $query->execute();
        $cac = Cache::getInstance();
        $cac->deleteTag('Characteristics');
        return $registry->db->lastInsertId();
    }

    public function editValue($id, $name, $pseudo_dir, $unit, $price, $is_select, $is_param_1, $is_param_2, $is_param_3, $param_str_1, $param_str_2, $param_str_3, $order = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE  characteristic_value SET pseudo_dir = :pseudo_dir, param_str_1 = :param_str_1, param_str_2 = :param_str_2, param_str_3 = :param_str_3, is_param_1 = :is_param_1, is_param_2 = :is_param_2,is_param_3 = :is_param_3, `price`=:price, `name`=:name, `unit`=:unit, `is_select`=:is_select, `order`=:order WHERE id=:id");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);
        $query->bindParam(":unit", $unit, PDO::PARAM_STR, 255);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":price", $price, PDO::PARAM_INT, 11);
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->bindParam(":is_select", $is_select, PDO::PARAM_INT, 11);
        $query->bindParam(":is_param_1", $is_param_1, PDO::PARAM_INT, 11);
        $query->bindParam(":is_param_2", $is_param_2, PDO::PARAM_INT, 11);
        $query->bindParam(":is_param_3", $is_param_3, PDO::PARAM_INT, 11);
        $query->bindParam(":param_str_1", $param_str_1, PDO::PARAM_STR, 255);
        $query->bindParam(":param_str_2", $param_str_2, PDO::PARAM_STR, 255);
        $query->bindParam(":param_str_3", $param_str_3, PDO::PARAM_STR, 255);
        $query->execute();
        $cac = Cache::getInstance();
        $cac->deleteTag('Characteristics');
    }

    public function getCharPseudoDir($pseudo_dir) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM characteristic WHERE pseudo_dir=:pseudo_dir && is_delete = 0");
        $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getCharValuePseudoDir($char_id, $pseudo_dir) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM characteristic_value WHERE pseudo_dir=:pseudo_dir && is_delete = 0 && characteristic_id = :characteristic_id");
        $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);
        $query->bindParam(":characteristic_id", $char_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Используется в импорте, кеш не нужен
     * @param type $value_name
     * @param type $characteristic_id
     * @return type
     */
    public function getValueName($value_name, $characteristic_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM characteristic_value WHERE characteristic_id=:characteristic_id && LOWER(TRIM(name)) = LOWER(TRIM(:value_name)) && is_delete = 0");
        $query->bindParam(":value_name", $value_name, PDO::PARAM_STR, 255);
        $query->bindParam(":characteristic_id", $characteristic_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getValueId($value_id) {
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Characteristics-getValueId-' . $value_id, 'Characteristics');

        if (empty($get_cache)) {
            $registry = Registry::getInstance();
            $query = $registry->db->prepare("SELECT * FROM characteristic_value WHERE id=:value_id && is_delete = 0");
            $query->bindParam(":value_id", $value_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);

            $cache->setTags('Characteristics-getValueId-' . $value_id, $return, 'Characteristics');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Проверяет если определенное значение характеристики у товара
     * Используется в импорте, кеш не нужен
     * @param type $product_id
     * @param type $value_id
     * @return type
     */
    public function isValueProduct($product_id, $value_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as `count` FROM characteristic_products WHERE characteristic_value_id=:value_id && is_delete = 0 && product_id = :product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":value_id", $value_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ)->count;
    }

    /**
     * Возвращает значения характеристики
     * @param type $characteristic_id
     * @return type 
     */
    public function getValues($characteristic_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Characteristics-getValues-' . $characteristic_id, 'Characteristics');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM characteristic_value WHERE characteristic_id=:characteristic_id && is_delete = 0  ORDER BY `order` ASC, id ASC");

            $query->bindParam(":characteristic_id", $characteristic_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);
            $cache->setTags('Characteristics-getValues-' . $characteristic_id, $return, 'Characteristics');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getValuesIsProduct($characteristic_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Characteristics-getValuesIsProduct-' . $characteristic_id, 'Characteristics');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM characteristic_value WHERE characteristic_id=:characteristic_id && is_delete = 0 && characteristic_value.id "
                    . "IN (SELECT characteristic_value_id FROM characteristic_products WHERE characteristic_products.characteristic_id=characteristic_value.characteristic_id)  ORDER BY `order` ASC, id ASC");

            $query->bindParam(":characteristic_id", $characteristic_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);
            $cache->setTags('Characteristics-getValuesIsProduct-' . $characteristic_id, $return, 'Characteristics');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Возвращает все значения характеристики, при условии что они 
     * установленны у продукта
     * @param type $characteristic_id
     * @return type 
     */
    public function getProductValues($product_id, $characteristic_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Characteristics-getProductValues-' . $product_id . '-' . $characteristic_id, 'Characteristics');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT characteristic_value.* FROM characteristic_value
            INNER JOIN characteristic_products ON (
            characteristic_products.product_id = :product_id && 
            characteristic_products.is_delete = 0 &&
            characteristic_products.characteristic_id = characteristic_value.characteristic_id && 
            characteristic_products.characteristic_value_id = characteristic_value.id && 
            characteristic_value.characteristic_id = :characteristic_id && 
            characteristic_value.is_delete = 0)
            ORDER BY characteristic_value.`order` ASC, characteristic_value.id ASC");
            $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
            $query->bindParam(":characteristic_id", $characteristic_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);
            $cache->setTags('Characteristics-getProductValues-' . $product_id . '-' . $characteristic_id, $return, 'Characteristics');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getValuesAll() {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Characteristics-getValuesAll-', 'Characteristics');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT characteristic_value.* FROM characteristic_value 
INNER JOIN characteristic ON (characteristic.is_delete = 0 && characteristic.`type` = 0 && characteristic.id = characteristic_value.characteristic_id &&
characteristic_value.is_delete = 0 )   
 ORDER BY characteristic_value.`name` ASC,  characteristic_value.`order` ASC, id ASC");
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);
            $result_arr = array();
            foreach ($return as $value) {
                $result_arr[$value->characteristic_id][] = $value;
            }

            $cache->setTags('Characteristics-getValuesAll-', $result_arr, 'Characteristics');
            return $result_arr;
        } else {
            return $get_cache;
        }
    }

    /**
     * МЕТОД УСТАРЕЛ, ОЧЕНЬ ТОРМОЗНУТЫЙ
     * Желательно не использовать
     */
    public function getProductValuesAll($shop_id = -1, $category_id = -1) {
        $registry = Registry::getInstance();

//        $cache = Cache::getInstance();
//        $get_cache = $cache->get('Characteristics-getProductValuesAll-' . '-' . $shop_id, 'Characteristics');
//
//        if (empty($get_cache)) {

        $cacheModule = unserialize(CacheModule::getCacheModule('products-getProductValuesAll-' . $shop_id . '-' . $category_id, false)); //Из-за ограничения мемкеша в 1мб

        if ($cacheModule !== false) {
            $return = ($cacheModule);
            return $return;
        } else {
            $where = null;
            if ($category_id != -1) {
                $where = '&& (SELECT COUNT(*) FROM products WHERE id=characteristic_products.product_id && category_1_id=' . $category_id . ' && is_delete=0 && is_active=1 && shop_id=' . $shop_id . ')';
            }
            //characteristic_value.pseudo_dir, 
            $query = $registry->db->prepare("SELECT 
characteristic_value.id, 
characteristic_value.name, 
characteristic_value.characteristic_id,
characteristic_products.product_id, 
                characteristic.icon, characteristic.name as characteristic_name
            FROM characteristic_value INNER JOIN characteristic 
            ON (characteristic.is_delete = 0 && characteristic.`type` = 0 && characteristic.id = characteristic_value.characteristic_id &&
characteristic_value.is_delete = 0 && (characteristic.shop_id = :shop_id || :shop_id = -1))   
        INNER JOIN characteristic_products 
            ON (characteristic_products.is_delete = 0 && characteristic_products.characteristic_value_id = characteristic_value.id $where)
 ORDER BY characteristic_value.`order` ASC, id ASC");
            $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);
            $result_arr = array();
            foreach ($return as $value) {
                $result_arr[$value->product_id][$value->characteristic_id][] = $value;
            }

            CacheModule::setCacheModule('products-getProductValuesAll-' . $shop_id . '-' . $category_id, serialize($result_arr), false);
//            print_r($result_arr);
//            $cache->setTags('Characteristics-getProductValuesAll-' . '-' . $shop_id, serialize($result_arr), 'Characteristics');
            return $result_arr;
//        } else {
//            return unserialize($get_cache);
//        }
        }
    }

    public function getProductValuesCharAllTemplate($param) {
// 
        
        $return = $this->getProductValuesCharAll($param['characteristic_id'], $param['product_id'], $param['shop_id']);
//print_r($return);
        if (isset($param['key_type']) && $param['key_type'] == 'discount') {
            $result = array();
            foreach ($return as $key => $value) {
                foreach ($value as $key_child => $value_child) {
                    $result[$key][$value_child->name] = $value_child->name;
                }
            }
            return $result;
        } elseif (isset($param['key_type']) && $param['key_type'] == 'list') {
            $result = array();
            foreach ($return as $key => $value) {
                foreach ($value as $key_child => $value_child) {
                    $result[$key][$value_child->characteristic_id][] = $value_child;
                }
            }
            return $result;
        } else {
            return $return;
        }
    }

    /**
     * аналог getProductValuesAll только для определенной характеристики
     * @param type $characteristic_id
     * @return type
     */
    public function getProductValuesCharAll($characteristic_id = -1, $product_id = 0, $shop_id = -1) {
        $registry = Registry::getInstance();
        $cacheModule = unserialize(CacheModule::getCacheModule('products-getProductValuesCharAll-' . $characteristic_id . '-' . $product_id . '-' . $shop_id, false)); //Из-за ограничения мемкеша в 1мб
        if ($cacheModule !== false) {
            $return = ($cacheModule);
            return $return;
        } else {
//        $cache = Cache::getInstance();
//        $get_cache = $cache->get('Characteristics-getProductValuesCharAll-' . $characteristic_id . '-' . $product_id . '-' . $shop_id, 'Characteristics');
//
//        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT 
characteristic_value.id, 
characteristic_value.name, 
characteristic_value.pseudo_dir, 
characteristic_value.characteristic_id,
characteristic_products.product_id, characteristic_products.product_id , 
                characteristic.icon, characteristic.name as characteristic_name
            FROM characteristic_value INNER JOIN characteristic 
            ON (characteristic.is_delete = 0  && (characteristic.shop_id = :shop_id || :shop_id = -1) && characteristic.`type` = 0 && (:characteristic_id = characteristic.id || :characteristic_id = -1) && characteristic.id = characteristic_value.characteristic_id &&
characteristic_value.is_delete = 0)   
        INNER JOIN characteristic_products 
            ON (characteristic_products.is_delete = 0 && (characteristic_products.product_id = :product_id || :product_id = 0) && characteristic_products.characteristic_value_id = characteristic_value.id)
 ORDER BY characteristic_value.`order` ASC, id ASC");
            $query->bindParam(":characteristic_id", $characteristic_id, PDO::PARAM_INT, 11);
            $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
            $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);
            $result_arr = array();
            foreach ($return as $value) {
                $result_arr[$value->product_id][] = $value;
            }

            CacheModule::setCacheModule('products-getProductValuesCharAll-' . $characteristic_id . '-' . $product_id . '-' . $shop_id, serialize($result_arr), false);
//            $cache->setTags('Characteristics-getProductValuesCharAll-' . $characteristic_id . '-' . $product_id . '-' . $shop_id, $result_arr, 'Characteristics');
            return $result_arr;
//        } else {
//            return $get_cache;
//        }
        }
    }

    /**
     * Используется для вывода пиктограмм к продуктам.
     * Делали для time street, возможно в других проектах тоже пригодится
     * @param type $category_id
     * @return type 
     */
    public function getPictogramsProductValuesAll($char_pic_id) {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Characteristics-getPictogramsProductValuesAll-' . $char_pic_id, 'Characteristics');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT characteristic_value.`id`,characteristic_value.`order`, characteristic_value.name, characteristic_products.product_id 
            FROM characteristic_value 
        INNER JOIN characteristic_products 
            ON (characteristic_products.is_delete = 0 && characteristic_value.is_delete = 0 && 
            characteristic_products.characteristic_value_id = characteristic_value.id && characteristic_value.characteristic_id	= :char_pic_id 

)
            
 ORDER BY characteristic_value.`order` ASC");
            //       $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->bindParam(":char_pic_id", $char_pic_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);
            $result_arr = array();
            foreach ($return as $value) {
                $result_arr[$value->product_id][] = $value;
            }

            $cache->setTags('Characteristics-getPictogramsProductValuesAll-' . $char_pic_id, $result_arr, 'Characteristics');
            return $result_arr;
        } else {
            return $get_cache;
        }
    }

    public function getMaxValue($characteristic_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT `order`  FROM characteristic_value WHERE characteristic_id=:characteristic_id && is_delete = 0 ORDER BY `order` DESC LIMIT 1");
        $query->bindParam(":characteristic_id", $characteristic_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetch(PDO::FETCH_OBJ);

        if (isset($return->order)) {
            return $return->order + 1;
        } else {
            return 0;
        }
    }

    public function delValue($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE  characteristic_value SET is_delete=1 WHERE id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();

        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
    }

}
