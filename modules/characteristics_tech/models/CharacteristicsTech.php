<?php

class CharacteristicsTech {

    public function addCharacteristics($name, $is_catalog, $is_selection, $order = 0) {
        $registry = Registry::getInstance();
        
        $cac = Cache::getInstance();
        $cac->deleteTag('Characteristics');
        
        $query = $registry->db->prepare("INSERT INTO characteristic (`name`,is_selection,is_catalog, `type`, `order`) VALUES (:name,:is_selection, :is_catalog, 1, :order)");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":is_catalog", $is_catalog, PDO::PARAM_INT, 1);
        $query->bindParam(":is_selection", $is_selection, PDO::PARAM_INT, 1);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function editCharacteristic($id, $name, $is_catalog, $is_selection, $order = 0) {
        $registry = Registry::getInstance();
        $cac = Cache::getInstance();
        $cac->deleteTag('Characteristics');
        
        $query = $registry->db->prepare("UPDATE  characteristic SET is_selection=:is_selection, is_catalog=:is_catalog, `name`=:name, `order`=:order WHERE id=:id");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->bindParam(":is_catalog", $is_catalog, PDO::PARAM_INT, 1);
        $query->bindParam(":is_selection", $is_selection, PDO::PARAM_INT, 1);
        $query->execute();
    }

    public function delCharacteristic($id) {
        $registry = Registry::getInstance();
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        
        $query = $registry->db->prepare("UPDATE  characteristic SET is_delete=1 WHERE id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function getCharacteristics() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT *, 
            (SELECT COUNT(*) FROM characteristic_value WHERE characteristic_id=characteristic.id && parent_id = 0 && characteristic_value.is_delete = 0) as `count`
            FROM characteristic WHERE `type`=1 && is_delete = 0  ORDER BY `order` ASC, id ASC");
  
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Характиристики только для установленных категорий 
     * @param type $category_id
     * @return type 
     */
    public function getCharacteristicsOnlyCategory($category_id) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("ApplicationDB");
        $app = new ApplicationDB();

        $query = $registry->db->prepare("SELECT *, 
            (SELECT COUNT(*) FROM characteristic_value WHERE characteristic_id=characteristic.id && parent_id = 0 && characteristic_value.is_delete = 0) as `count`
            FROM characteristic WHERE (category_id > 0 || category_2_id > 0 || category_3_id > 0) && `type`=1 && is_delete = 0 ORDER BY `order` ASC, id ASC");
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();
        foreach ($return as $value) {
            if ($value->category_id > 0) {
                $child_category_arr = $app->getChildsCategory(0, $value->category_id);
                $child_category_arr[$value->category_id] = $value->category_id;
            }
            if ($value->category_2_id > 0) {
                $child_category_arr = $app->getChildsCategory(0, $value->category_2_id);
                $child_category_arr[$value->category_2_id] = $value->category_2_id;
            }
            if ($value->category_3_id > 0) {
                $child_category_arr = $app->getChildsCategory(0, $value->category_3_id);
                $child_category_arr[$value->category_3_id] = $value->category_3_id;
            }

            if (isset($child_category_arr[$category_id])) {

                $value->category_id = 0;
                $value->category_2_id = 0;
                $value->category_3_id = 0;
                $result[] = $value;
            }
            unset($child_category_arr);
        }
        return $result;
    }

    public function getMaxCharacteristic() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT `order`  FROM characteristic WHERE `type`=1 && is_delete = 0 ORDER BY `order` DESC LIMIT 1");
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
        $query = $registry->db->prepare("SELECT * FROM characteristic WHERE `type`=1 && is_delete = 0 && id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Вывод характиристик
     * @param <type> $product_id
     * @return <type>
     */
    public function getCharacteristicProduct($product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT characteristic.*  FROM characteristic_products
INNER JOIN characteristic ON (characteristic.`type`=1 && characteristic.id = characteristic_id && characteristic.is_delete= 0 && product_id = :product_id) ORDER BY `order`");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();

        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();
        foreach ($return as $key => $value) {
            $result[$value->id] = $value;
        }

        return $result;
    }

    /**
     * Типы характиристик
     * @param <type> $product_id
     * @return <type> 
     */
    public function getCharacteristicTypeProduct($product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT characteristic_value.*  FROM characteristic_products
INNER JOIN characteristic ON (characteristic.`type`=1 && characteristic.id = characteristic_products.characteristic_id && characteristic.is_delete= 0 && product_id = :product_id)
INNER JOIN characteristic_value ON (characteristic.`type`=1 && `parent_id` = 0 && characteristic.id = characteristic_value.characteristic_id && characteristic.is_delete= 0 && product_id = :product_id)

");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();

        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();
        foreach ($return as $key => $value) {
            $result[$value->characteristic_id][$value->id] = $value;
        }
        return $result;
    }

    /**
     * Значения характиристик
     * @param <type> $product_id
     * @return <type>
     */
    public function getCharacteristicValueProduct($product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT *  FROM characteristic_products
INNER JOIN characteristic ON (characteristic.`type`=1 && characteristic.id = characteristic_id && characteristic.is_delete= 0 && product_id = :product_id)
INNER JOIN characteristic_value ON (characteristic_value.id = characteristic_value_id && characteristic.is_delete= 0)
");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();

        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();
        foreach ($return as $key => $value) {
            $result[$value->parent_id][] = $value;
        }

        return $result;
    }

    /**
     * Возвращает характеристики сопутствующим товарам
     * @param <type> $product_id
     * @return <type> 
     */
    public function getCharacteristicValueRelatedProduct($product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT characteristic_value.name as value_name, characteristic.name as characteristic_name, related.related_id  FROM characteristic_products
INNER JOIN characteristic ON (characteristic.`type`=1 && characteristic.id = characteristic_id && characteristic.is_delete= 0)
INNER JOIN characteristic_value ON (characteristic_value.id = characteristic_value_id && characteristic.is_delete= 0)
INNER JOIN related ON (characteristic_products.product_id = related.related_id &&  related.product_id = :product_id)
");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();

        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();
        foreach ($return as $key => $value) {
            $result[$value->related_id][] = $value;
        }
        return $result;
    }

    /**
     * $warehouse - не работает, сделано на будующее
     * @param <type> $product_id
     * @param <type> $characteristic_id
     * @param <type> $characteristic_value_id
     * @param <type> $warehouse
     * @return <type>
     */
    public function addValueProduct($product_id, $characteristic_id, $characteristic_value_id,  $warehouse = 0) {
        $registry = Registry::getInstance();
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        
        $query = $registry->db->prepare("INSERT INTO characteristic_products (`product_id`,`characteristic_id`,`characteristic_value_id`,`warehouse`, `is_delete`) VALUES (:product_id, :characteristic_id, :characteristic_value_id, :warehouse,  0)");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":characteristic_id", $characteristic_id, PDO::PARAM_INT, 11);
        $query->bindParam(":characteristic_value_id", $characteristic_value_id, PDO::PARAM_INT, 11);
        $query->bindParam(":warehouse", $warehouse, PDO::PARAM_INT, 11);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    /**
     * Удаляем значение
     * @param <type> $product_id
     */
    public function delValueAllProduct($product_id) {
        $registry = Registry::getInstance();
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        
        $query = $registry->db->prepare("DELETE FROM characteristic_products WHERE (SELECT `type` FROM characteristic WHERE characteristic.id = characteristic_id) = 1 && is_delete = 0 && product_id = :product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function getSelectedValueProduct($product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM characteristic_products WHERE `product_id` = :product_id && `is_delete` = 0");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result_arr = array();

        foreach ($return as $key => $value) {
            $result_arr[$value->characteristic_value_id] = 1;
        }
        return $result_arr;
    }

    /**
     * Меняет временный id-продукта на постоянный в характиристиках
     * @param <type> $temp_product_id
     * @param <type> $product_id
     */
    public function setTempCharProductImageId($temp_product_id, $product_id) {
        $registry = Registry::getInstance();
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        
        $query = $registry->db->prepare("UPDATE `characteristic_images` SET product_id=:product_id WHERE `type`=1 && is_delete=0 && product_id=:temp_product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":temp_product_id", $temp_product_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Меняет временный id-продукта на постоянный в характиристиках
     * @param <type> $temp_product_id
     * @param <type> $product_id
     */
    public function setCharCategory($id, $category_id, $category_2_id, $category_3_id) {
        $registry = Registry::getInstance();
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        
        $query = $registry->db->prepare("UPDATE `characteristic` SET category_id=:category_id, category_2_id = :category_2_id,
            category_3_id = :category_3_id WHERE is_delete=0 && id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_2_id", $category_2_id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_3_id", $category_3_id, PDO::PARAM_INT, 11);
        $query->execute();
    }



    public function addValue($characteristic_id, $parent_id, $name, $unit, $order, $is_select, $is_selection, $is_catalog) {
        $registry = Registry::getInstance();
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        
        $query = $registry->db->prepare("INSERT INTO characteristic_value (parent_id, `characteristic_id`, `unit`, is_select, is_selection, is_catalog, `name`, `order`) VALUES (:parent_id, :characteristic_id, :unit, :is_select, :is_selection, :is_catalog, :name, :order)");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":unit", $unit, PDO::PARAM_STR, 255);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":characteristic_id", $characteristic_id, PDO::PARAM_INT, 11);
        $query->bindParam(":is_select", $is_select, PDO::PARAM_INT, 1);
        $query->bindParam(":is_selection", $is_selection, PDO::PARAM_INT, 1);
        $query->bindParam(":is_catalog", $is_catalog, PDO::PARAM_INT, 1);
        $query->bindParam(":parent_id", $parent_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function editValue($id, $name, $unit, $order, $is_select, $is_selection, $is_catalog) {
        $registry = Registry::getInstance();
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        
        $query = $registry->db->prepare("UPDATE  characteristic_value SET `unit`=:unit, is_catalog=:is_catalog, is_select=:is_select, is_selection=:is_selection, `name`=:name, `order`=:order WHERE id=:id");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":unit", $unit, PDO::PARAM_STR, 255);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->bindParam(":is_select", $is_select, PDO::PARAM_INT, 1);
        $query->bindParam(":is_selection", $is_selection, PDO::PARAM_INT, 1);
        $query->bindParam(":is_catalog", $is_catalog, PDO::PARAM_INT, 1);
        $query->execute();
    }

    public function getValueId($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM characteristic_value WHERE id = :id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Используется только в админке
     * Вывод типов и характиристик товара
     * @param <type> $characteristic_id
     * @param <type> $parent_id
     * @return <type>
     */
    public function getValues($characteristic_id, $parent_id = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT *,
            (SELECT COUNT(*) FROM characteristic_value as c_v WHERE c_v.parent_id = characteristic_value.id && characteristic_value.is_delete = 0 && c_v.is_delete = 0) as `count`
            FROM characteristic_value WHERE
            parent_id = :parent_id && characteristic_id=:characteristic_id && is_delete = 0  ORDER BY `order` ASC, id ASC");
        $query->bindParam(":characteristic_id", $characteristic_id, PDO::PARAM_INT, 11);
        $query->bindParam(":parent_id", $parent_id, PDO::PARAM_INT, 11);

        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getValuesAll() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM characteristic_value WHERE is_delete = 0 ORDER BY `order` ASC, id ASC");
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result_arr = array();
        foreach ($return as $key => $value) {
            $result_arr[$value->characteristic_id][$value->parent_id][] = $value;
        }
        return $result_arr;
    }

    public function getMaxValue($characteristic_id, $parent_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT `order`  FROM characteristic_value WHERE characteristic_id=:characteristic_id && parent_id = :parent_id && is_delete = 0  ORDER BY `order` DESC LIMIT 1");
        $query->bindParam(":parent_id", $parent_id, PDO::PARAM_INT, 11);
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
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        
        $query = $registry->db->prepare("UPDATE  characteristic_value SET is_delete=1 WHERE id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
    }

}