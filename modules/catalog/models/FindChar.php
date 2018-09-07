<?php

/**
 * Поиск по характеристикам 
 */
class FindChar {

    private $_char = array();
    private $_char_value = array();
    private $_char_range_value = array(); //от и до
    private $_category = array();
    private $_min_price = 0;
    private $_max_price = 1000000;
    private $_mod_name = null;
    private $_set_brand_id = 0;
    private $_is_discount = 0;
    private $_brands = array();
    private $_is_param_1 = 0;
    private $_is_param_2 = 0;
    private $_is_param_3 = 0;
    private $_is_param_4 = 0;
    private $_is_param_5 = 0;

    public function __construct() {
        Lavra_Loader::LoadClass("ApplicationDB");
    }

    /**
     * Добавляет характиристику к поиску 
     */
    public function addCharId($char_id) {
        $this->_char[] = $char_id;
    }

    public function setIsParam($is_param_1, $is_param_2, $is_param_3, $is_param_4, $is_param_5) {
        $this->_is_param_1 = $is_param_1;
        $this->_is_param_2 = $is_param_2;
        $this->_is_param_3 = $is_param_3;
        $this->_is_param_4 = $is_param_4;
        $this->_is_param_5 = $is_param_5;
    }

    public function setIsDiscount($is_discount) {
        $this->_is_discount = $is_discount;
    }

    private $_tmp_range = array();
    private $_is_filter_range = false; //Хранит инфу о том используется фильтр или нет

    public function addCharRangeValueId($min, $max, $char_value_id) {
        $registry = Registry::getInstance();
        $this->_is_filter_range = true;

        $where = null;
        if (count($this->_tmp_range)) {
            $where = " && product_id  IN (" . implode(',', $this->_tmp_range) . ")";
        }
        $query = $registry->db->prepare("SELECT characteristic_value.id, product_id FROM  characteristic_value
            
INNER JOIN  characteristic_products ON (characteristic_products.is_delete = 0 && 
            characteristic_value_id = characteristic_value.id && 
characteristic_value.characteristic_id = $char_value_id && name*1 >= ($min * 1) && name*1 <= ($max * 1) $where)");

//        echo $char_value_id . ': '. "
//            
//
//";


        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();

        foreach ($return as $key => $value) {
            $result[$value->product_id] = $value->product_id;
        }
        $this->_tmp_range = array_merge($this->_tmp_range, $result);
        $this->_tmp_range = $this->_char_range_value = $result;
    }

    /*
     * Добавляет значение характеристики к поиску
     */

    public function addCharValueId($char_value_id, $parent_id) {
        $this->_char_value[$parent_id][] = $char_value_id;
    }

    public function setMinPrice($min_price) {
        $this->_min_price = $min_price;
    }

    public function setMaxPrice($max_price) {
        $this->_max_price = $max_price;
    }

    public function setBrandId($brand_id) {
        $this->_set_brand_id = $brand_id;
    }

    public function addBrandId($brand_id) {
        $this->_brands[] = $brand_id;
    }

    public function setModName($mod_name) {
        $this->_mod_name = $mod_name;
    }

    private function getModWhere() {
        if ($this->_mod_name != '') {
            return "(SELECT COUNT(*) FROM product_mod WHERE product_mod.name LIKE '$this->_mod_name' && product_mod.is_delete=0 && product_mod.product_id = products.id) && ";
        }
    }

    private function getBrandsWhere() {
        $where = null; //'(products.brand_id = :brand_id || :brand_id = 0)';
        foreach ($this->_brands as $key => $value) {
            $where .= '&& products.brand_id = ' . $value;
        }
        return $where;
    }

    /*
     * Добавляет категорию к поиску
     */

    public function addCategoryId($category_id) {
        $this->_category[] = $category_id;
    }

    /**
     * Добавляет root-категорию для поиска
     * Поик будет в ней и во всех ее потомках
     * @param type $root_category_id 
     */
    public function addRootCategory($root_category_id) {
        $this->_root_category[] = $root_category_id;

        $app = new ApplicationDB();
        $category = ($app->getChildsCategory(0, $root_category_id));

        $this->addCategoryId($root_category_id);
        foreach ($category as $value) {
            $this->addCategoryId($value);
        }
    }

    /**
     * Поиск по диапозону имен характеристик
     */
    private function _getCharRangeValueQuery() {

        $where = null;
        if (count($this->_char_range_value)) {
            $where = " && products.id IN (" . implode(',', $this->_char_range_value) . ")";
        }
//        foreach ($this->_char_range_value as $char_value_id => $value) {
//            echo $char_value_id . '<Br/>';
//            
//            
//         //   $where .= '&& characteristic_value_id IN (SELECT characteristic_value.id FROM  characteristic_value WHERE  characteristic_value.characteristic_id = ' . $char_value_id . ' && name*1 >= ' . ($value * 1) . ' && name*1 <= ' . ($this->_char_range_value['max'][$char_value_id] * 1) . ')';
//        }
        return $where;
    }

    public function setSort($field, $order) {
        switch (trim($field)) {
            case 'name':
                $this->_sort_field = 'products.`name`';
                break;
            case 'price':
                $this->_sort_field = 'product_mod.`price`';
                break;
            case 'article':
                $this->_sort_field = 'product_mod.`article`';
                break;
            case 'order':
                $this->_sort_field = 'products.`order`';
                break;

            default:
                $this->_sort_field = $field;
                break;
        }
        $this->_sort_order = $order;
    }

    public function getLastCountQuery() {
        $registry = Registry::getInstance();
        $count = $registry->db->query("SELECT FOUND_ROWS() as count");
        $return = $count->fetch(PDO::FETCH_OBJ);
        return $return->count;
    }

    private $_char_value_id = array();

    public function setProductsCategoryesCharValue($char_value_id) {
        $this->_char_value_id[] = $char_value_id;
    }

    private function _getProductsCategoryesCharValue() {
        $where = null;
        foreach ($this->_char_value_id as $char_value_id) {
            $where .= "characteristic_products.characteristic_value_id = $char_value_id && ";
        }
        if (!empty($where)) {
            $where = "&& (SELECT COUNT(*) FROM characteristic_products WHERE characteristic_products.product_id = products.id && (" . trim($where, "& ") . "))";
        } else {
            return false;
        }
        return $where;
    }

    public function find($offset = 0, $limit = 1000, $min_param_1 = 0, $max_param_2 = 0, $shop_id = 0) {
        /**
          !!!!!!!!!  Удалить все что связано с $min_param_1, $max_param_2
         */
        if ($min_param_1 != 0 || $max_param_2 != 0) {
            $where_param = ' && (SELECT COUNT(*) FROM characteristic_value WHERE characteristic_value.characteristic_id = 135 && characteristic_products.characteristic_value_id = characteristic_value.id && ((characteristic_value.is_param_1 = 0 && characteristic_value.is_param_2 = 0) ||  (characteristic_value.is_param_1 <= ' . $min_param_1 . ' && characteristic_value.is_param_2 >= ' . $max_param_2 . '))) ';
        } else {
            $where_param = null;
        }

        $where_char = $this->_getProductsCategoryesCharValue();
        
        $query_range = $this->_getCharRangeValueQuery();
       
        if ($query_range == null && $this->_is_filter_range == true) { //Если фильтр используется но результата нет то ни чено не найдено
         //   return array();
        }

        if (!empty($this->_sort_field) && !empty($this->_sort_order)) {
            $order = " ORDER BY $this->_sort_field $this->_sort_order";
        } else {
            $order = null;
        }
        $category_query = $this->_getCategoryQuery();

        $query_cv = $this->_getCharValueQuery();
        $query_name = $this->getModWhere();
        $brend_where = $this->getBrandsWhere();
        $registry = Registry::getInstance(); 
        $query = $registry->db->prepare("SELECT SQL_CALC_FOUND_ROWS *, products.*,product_mod.id as mod_id,
                 product_mod.old_price, 
                (SELECT name FROM brands WHERE id = products.brand_id && is_delete=0 LIMIT 1) as brand_name,
                 MIN(product_mod.price) as price, 
                 MAX(product_mod.price) as max_price  FROM characteristic_products
INNER JOIN products ON ($category_query $query_cv  products.id = characteristic_products.product_id $query_range && (products.shop_id = :shop_id || products.shop_id = 0) && (products.brand_id = :brand_id || :brand_id = 0) $brend_where  && products.is_delete = 0 && characteristic_products.is_delete = 0)
INNER JOIN product_mod ON ($query_name product_mod.price >= :min_price && product_mod.price <= :max_price && 
    (product_mod.price>0 && is_param_1 = 1 || :is_param_1 = 0) && (is_param_2 = 1 || :is_param_2 = 0) && (is_param_3 = 1 || :is_param_3 = 0) && (is_param_4 = 1 || :is_param_4 = 0) && (is_param_5 = 1 || :is_param_5 = 0) && 
    (product_mod.old_price > 0 || :is_discount = 0) && products.is_active = 1 && products.id = product_mod.product_id && product_mod.is_delete = 0 $where_param $where_char)                
                GROUP BY products.id $order  LIMIT :limit OFFSET :offset");

        $query->bindParam(":max_price", $this->_max_price, PDO::PARAM_INT, 11);
        $query->bindParam(":min_price", $this->_min_price, PDO::PARAM_INT, 11);
        $query->bindParam(":brand_id", $this->_set_brand_id, PDO::PARAM_INT, 11);
        $query->bindParam(":is_discount", $this->_is_discount, PDO::PARAM_INT, 11);
        $query->bindParam(":is_param_1", $this->_is_param_1, PDO::PARAM_INT, 11);
        $query->bindParam(":is_param_2", $this->_is_param_2, PDO::PARAM_INT, 11);
        $query->bindParam(":is_param_3", $this->_is_param_3, PDO::PARAM_INT, 11);
        $query->bindParam(":is_param_4", $this->_is_param_4, PDO::PARAM_INT, 11);
        $query->bindParam(":is_param_5", $this->_is_param_5, PDO::PARAM_INT, 11);
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->bindParam(":limit", $limit, PDO::PARAM_INT, 11);
        $query->bindParam(":offset", $offset, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    private function _getCategoryQuery() {
        $category_query = null;
        foreach ($this->_category as $category_id) {
            $category_query .= " ," . (int) $category_id;
        }
        $category_query = trim($category_query, ', ');
        if (!empty($category_query)) {
            $category_query = "(products.category_5_id IN ($category_query) || products.category_4_id IN ($category_query) || products.category_3_id IN ($category_query) ||  products.category_2_id IN ($category_query) || products.category_1_id IN ($category_query)) && ";
            return $category_query;
        }
        return null;
    }

    /**
     * Формирование запроса по поиску характеристик
     * @return type 
     * if (count($value) > 0) {  - БЫЛО  > 1, сделали для Тинько 0. Возможно в друГИХ ПРОЕКТАХ НУЖНО БУДЕТ ВЕРНУТЬ
     * 
     */
    private function _getCharValueQuery() {
        $query_cv = null;
        $query_or = array();
        foreach ($this->_char_value as $parent_id => $value) { //Готовим запрос
            foreach ($value as $key => $char_value_id) { //Готовим запрос    
                if (count($value) > 0) { //Если нужен блок характеристик (несколько на выбор)
                    if (!isset($query_or[$parent_id])) {
                        $query_or[$parent_id] = null;
                    }
                    $query_or[$parent_id] .= " ," . (int) $char_value_id;
                } else {
                    $query_cv .= " && `characteristic_value_id` = " . (int) $char_value_id;
                }
            }
        }
        $query_cv_or = null;
        foreach ($query_or as $key => $value) {
            $query_cv_or .= "(SELECT COUNT(*) FROM characteristic_products WHERE characteristic_products.product_id = products.id && characteristic_products.is_delete = 0 && characteristic_products.characteristic_value_id IN (" . trim($value, ' |,') . ")) && ";
        }
        $query_cv_or = trim($query_cv_or, ' &');
        $query_cv = trim($query_cv, ' &');
        if (!empty($query_cv_or)) {
            $query_cv_or = "$query_cv_or && ";
        }

        if (!empty($query_cv)) {
            $query_cv = "$query_cv && ";
        }
        return $query_cv_or . $query_cv;
    }

}

?>