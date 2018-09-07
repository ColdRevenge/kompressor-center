<?php

class Podbor {

    public function getCharsRange(Array $categoryes_id, $char_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();

        $where = null;
        foreach ($categoryes_id as $key => $category_id) {
            $where .= "products.category_1_id=$category_id || ";
        }
        if (!empty($where)) {
            $where = "(" . trim($where, "| ") . " || $category_id=0)";
        } else {
            return false;
        }

        $get_cache = $cache->get('Podbor-getCharsRange-' . $where . '-' . $char_id, 'Characteristics');

        if (empty($get_cache)) {


            $query = $registry->db->prepare("SELECT 
                MIN(characteristic_value.name*1) as min_name, 
                MAX(characteristic_value.name*1) as max_name
FROM products INNER JOIN characteristic_products
                ON (products.is_delete = 0 && products.id = characteristic_products.product_id && characteristic_products.is_delete = 0 && 
                characteristic_products.characteristic_id = :char_id && 
                ($where || :category_id = 0))
                INNER JOIN characteristic_value ON (characteristic_value.id = characteristic_products.characteristic_value_id && characteristic_value.is_delete = 0)
                GROUP BY characteristic_value.characteristic_id ORDER BY characteristic_value.`name`*1 ASC, characteristic_value.`order` ASC
                ");

            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->bindParam(":char_id", $char_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);
            $cache->setTags('Podbor-getCharsRange-' . $category_id . '-' . $char_id, $return, 'Characteristics');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Возвращает характеристики которые есть в категории
     * @param type $category_id
     * @param type $char_id 
     */
    public function getChars($category_id, $char_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Podbor-getChars-' . $category_id . '-' . $char_id, 'Products');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT 
		characteristic_value.*, COUNT(*) as `count`
                FROM products INNER JOIN characteristic_products
                ON (products.is_delete = 0 && products.id = characteristic_products.product_id && characteristic_products.is_delete = 0 && 
                characteristic_products.characteristic_id = :char_id && 
                (products.category_1_id = :category_id || :category_id = 0))
                INNER JOIN characteristic_value ON (characteristic_value.id = characteristic_products.characteristic_value_id && characteristic_value.is_delete = 0)
                GROUP BY characteristic_value.id ORDER BY characteristic_value.`name`*1 ASC,characteristic_value.`name` ASC, characteristic_value.`order` ASC
                ");
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->bindParam(":char_id", $char_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            $cache->setTags('Podbor-getChars-' . $category_id . '-' . $char_id, $return, 'Products');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Возвращает характеристики которые есть в массиве категорий
     * @param type $category_id
     * @param type $char_id 
     */
    public function getCharsArrayParamGroup(Array $categoryes_id, $char_id, $is_param_1 = 0, $is_param_2 = 0, $is_param_3 = 0, $is_param_4 = 0, $is_param_5 = 0) {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Podbor-getCharsArrayParamGroup-' . md5(serialize($categoryes_id)) . '-' . $char_id . '-' . $is_param_1 . '-' . $is_param_2 . '-' . $is_param_3 . '-' . $is_param_4 . '-' . $is_param_5, 'Products');

        if (empty($get_cache)) {
            $where = null;
            foreach ($categoryes_id as $key => $category_id) {
                $where .= "products.category_1_id=$category_id || ";
            }
            if (!empty($where)) {
                $where = "(" . trim($where, "| ") . ")";
            } else {
                return false;
            }

            $query = $registry->db->prepare("SELECT  MIN(characteristic_value.is_param_1) as is_param_1, MAX(characteristic_value.is_param_2) as is_param_2
                FROM products INNER JOIN characteristic_products
                ON (products.is_delete = 0 && products.id = characteristic_products.product_id && characteristic_products.is_delete = 0 && 
                (products.is_param_1 = :is_param_1 || :is_param_1 = 0) && (products.is_param_2 = :is_param_2 || :is_param_2 = 0) && 
                (products.is_param_3 = :is_param_3 || :is_param_3 = 0) && (products.is_param_4 = :is_param_4 || :is_param_4 = 0) && (products.is_param_5 = :is_param_5 || :is_param_5 = 0) && 
                characteristic_products.characteristic_id = :char_id && 
                $where)
                INNER JOIN characteristic_value ON (characteristic_value.id = characteristic_products.characteristic_value_id && characteristic_value.is_delete = 0)
      
                ");
//        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->bindParam(":char_id", $char_id, PDO::PARAM_INT, 11);
            $query->bindParam(":is_param_1", $is_param_1, PDO::PARAM_INT, 1);
            $query->bindParam(":is_param_2", $is_param_2, PDO::PARAM_INT, 1);
            $query->bindParam(":is_param_3", $is_param_3, PDO::PARAM_INT, 1);
            $query->bindParam(":is_param_4", $is_param_4, PDO::PARAM_INT, 1);
            $query->bindParam(":is_param_5", $is_param_5, PDO::PARAM_INT, 1);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);

            $cache->setTags('Podbor-getCharsArrayParamGroup-' . md5(serialize($categoryes_id)) . '-' . $char_id . '-' . $is_param_1 . '-' . $is_param_2 . '-' . $is_param_3 . '-' . $is_param_4 . '-' . $is_param_5, $return, 'Products');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getCharsArrayParamGroup2(Array $categoryes_id, $char_id, $is_param_1 = 0, $is_param_2 = 0, $is_param_3 = 0, $is_param_4 = 0, $is_param_5 = 0) {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Podbor-getCharsArrayParamGroup2-' . md5(serialize($categoryes_id)) . '-' . $char_id . '-' . $is_param_1 . '-' . $is_param_2 . '-' . $is_param_3 . '-' . $is_param_4 . '-' . $is_param_5, 'Products');

        if (empty($get_cache)) {
            $where = null;
            foreach ($categoryes_id as $key => $category_id) {
                $where .= "products.category_1_id=$category_id || ";
            }
            if (!empty($where)) {
                $where = "(" . trim($where, "| ") . ")";
            } else {
                return false;
            }

            $query = $registry->db->prepare("SELECT 
                MAX(characteristic_value.is_param_1) as is_max_param_1, MIN(characteristic_value.is_param_2) as is_max_param_2
                FROM products INNER JOIN characteristic_products
                ON (products.is_delete = 0 && products.id = characteristic_products.product_id && characteristic_products.is_delete = 0 && 
                (products.is_param_1 = :is_param_1 || :is_param_1 = 0) && (products.is_param_2 = :is_param_2 || :is_param_2 = 0) && 
                (products.is_param_3 = :is_param_3 || :is_param_3 = 0) && (products.is_param_4 = :is_param_4 || :is_param_4 = 0) && (products.is_param_5 = :is_param_5 || :is_param_5 = 0) && 
                characteristic_products.characteristic_id = :char_id && 
                $where)
                INNER JOIN characteristic_value ON (characteristic_value.id = characteristic_products.characteristic_value_id && characteristic_value.is_delete = 0)
         
                ");
//        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->bindParam(":char_id", $char_id, PDO::PARAM_INT, 11);
            $query->bindParam(":is_param_1", $is_param_1, PDO::PARAM_INT, 1);
            $query->bindParam(":is_param_2", $is_param_2, PDO::PARAM_INT, 1);
            $query->bindParam(":is_param_3", $is_param_3, PDO::PARAM_INT, 1);
            $query->bindParam(":is_param_4", $is_param_4, PDO::PARAM_INT, 1);
            $query->bindParam(":is_param_5", $is_param_5, PDO::PARAM_INT, 1);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);

            $cache->setTags('Podbor-getCharsArrayParamGroup2-' . md5(serialize($categoryes_id)) . '-' . $char_id . '-' . $is_param_1 . '-' . $is_param_2 . '-' . $is_param_3 . '-' . $is_param_4 . '-' . $is_param_5, $return, 'Products');
            return $return;
        } else {
            return $get_cache;
        }
    }

    private $_sort = 'characteristic_value.`order` ASC, characteristic_value.`name`*1 ASC,characteristic_value.`name` ASC, characteristic_value.`order` ASC';

    public function setSortChars($sort) {
        switch ($sort) {
            case 0:
                $this->_sort = 'characteristic_value.`order` ASC, characteristic_value.`name`*1 ASC,characteristic_value.`name` ASC';
                break;
            case 1:
                $this->_sort = 'characteristic_value.`name`*1 ASC,characteristic_value.`name` ASC, characteristic_value.`order` ASC';
                break;

            default:
                break;
        }
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

    /**
     * Возвращает характеристики которые есть в массиве категорий
     * @param type $category_id
     * @param type $char_id 
     */
    public function getCharsArray(Array $categoryes_id, $char_id, $is_param_1 = 0, $is_param_2 = 0, $is_param_3 = 0, $is_param_4 = 0, $is_param_5 = 0, $shop_id = 0) {
        $registry = Registry::getInstance();

        $where_char = $this->_getProductsCategoryesCharValue();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Podbor-getCharsArray-' . md5($where_char) . '-' . md5(serialize($categoryes_id)) . '-' . $char_id . '-' . $is_param_1 . '-' . $is_param_2 . '-' . $is_param_3 . '-' . $is_param_4 . '-' . $is_param_5 . '-' . $shop_id, 'Products');

        if (empty($get_cache)) {
            $where = null;
            foreach ($categoryes_id as $key => $category_id) {
                $where .= "products.category_1_id=$category_id || products.category_2_id=$category_id || products.category_3_id=$category_id || ";
            }
            if (!empty($where)) {
                $where = "(" . trim($where, "| ") . ")";
            } else {
                return false;
            }

            $query = $registry->db->prepare("SELECT 
		characteristic_value.*, COUNT(*) as `count`,
                CONCAT(upper(left(characteristic_value.name,1)),SUBSTR(characteristic_value.name,2)) as name
                FROM products INNER JOIN characteristic_products
                ON ((products.shop_id = :shop_id || products.shop_id=0) && products.is_delete = 0 && products.id = characteristic_products.product_id && characteristic_products.is_delete = 0 && products.is_active = 1 && 
                (products.is_param_1 = :is_param_1 || :is_param_1 = 0) && (products.is_param_2 = :is_param_2 || :is_param_2 = 0) && 
                (products.is_param_3 = :is_param_3 || :is_param_3 = 0) && (products.is_param_4 = :is_param_4 || :is_param_4 = 0) && (products.is_param_5 = :is_param_5 || :is_param_5 = 0) && 
                characteristic_products.characteristic_id = :char_id && 
                $where)
                INNER JOIN characteristic_value ON (characteristic_value.id = characteristic_products.characteristic_value_id && characteristic_value.is_delete = 0 $where_char)
                GROUP BY characteristic_value.id ORDER BY $this->_sort
                ");
//        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->bindParam(":char_id", $char_id, PDO::PARAM_INT, 11);
            $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query->bindParam(":is_param_1", $is_param_1, PDO::PARAM_INT, 1);
            $query->bindParam(":is_param_2", $is_param_2, PDO::PARAM_INT, 1);
            $query->bindParam(":is_param_3", $is_param_3, PDO::PARAM_INT, 1);
            $query->bindParam(":is_param_4", $is_param_4, PDO::PARAM_INT, 1);
            $query->bindParam(":is_param_5", $is_param_5, PDO::PARAM_INT, 1);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            $cache->setTags('Podbor-getCharsArray-' . md5($where_char) . '-' . md5(serialize($categoryes_id)) . '-' . $char_id . '-' . $is_param_1 . '-' . $is_param_2 . '-' . $is_param_3 . '-' . $is_param_4 . '-' . $is_param_5 . '-' . $shop_id, $return, 'Products');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Возвращает значение характеристики, в т.ч. и min max (например для слайдера мин. и макс. ширина)
     * @param type $category_id
     * @return type
     */
    public function getCharsValue($char_value_id) {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Podbor-getCharsValue-' . $char_value_id, 'Products');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT *, 
		MIN(name*1) as min_name,
                MAX(name*1) as max_name
                FROM characteristic_value WHERE characteristic_id = :char_value_id && is_delete=0
                
                ");
            $query->bindParam(":char_value_id", $char_value_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);

            $cache->setTags('Podbor-getCharsValue-' . $char_value_id, $return, 'Products');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getCharsAllCategory($category_id, $char_id) {
        Lavra_Loader::LoadClass("ApplicationDB");
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Podbor-getCharsAllCategory-' . $category_id . '-' . $char_id, 'Products');

        if (empty($get_cache)) {
            $app = new ApplicationDB();

            $cat_arr = ($app->getChildsCategory(0, $category_id));
            $where = null;
            if (count($cat_arr)) {
                foreach ($cat_arr as $key => $value) {
                    $where .= ' || products.category_1_id=' . $key;
                }
                $where = trim($where, ' |') . ' || ';
            }
            $query = $registry->db->prepare("SELECT 
		characteristic_value.*
                FROM products INNER JOIN characteristic_products
                ON (products.is_delete = 0 && products.id = characteristic_products.product_id && characteristic_products.is_delete = 0 && 
                characteristic_products.characteristic_id = :char_id && 
                ($where products.category_1_id = :category_id))
                INNER JOIN characteristic_value ON (characteristic_value.id = characteristic_products.characteristic_value_id && characteristic_value.is_delete = 0)
                GROUP BY characteristic_value.id ORDER BY characteristic_value.`order` ASC
                ");
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->bindParam(":char_id", $char_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            $cache->setTags('Podbor-getCharsAllCategory-' . $category_id . '-' . $char_id, $return, 'Products');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Возвращает минимальную и максимальную цену в категории
     * @param type $category_id 
     */
    public function getPrice($category_id) {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Podbor-getPrice-' . $category_id, 'Products');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT 
		MIN(product_mod.price) as min_price,
                MAX(product_mod.price) as max_price
                FROM products INNER JOIN product_mod
                ON (products.is_delete = 0 && products.id = product_mod.product_id && product_mod.is_delete = 0  && 
                (:category_id = 0 || products.category_1_id = :category_id || products.category_2_id = :category_id || products.category_3_id = :category_id || :category_id = 0))
                
                ");
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);

            $cache->setTags('Podbor-getPrice-' . $category_id, $return, 'Products');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getPriceAllCategory($category_id, $shop_id = -1) {

        $where_char = $this->_getProductsCategoryesCharValue();
        $cacheModule = unserialize(CacheModule::getCacheModule('products-getPriceAllCategory-' . md5(serialize($where_char)) . '-' . $category_id . '-' . $shop_id, false)); //Из-за ограничения мемкеша в 1мб
        if ($cacheModule !== false) {
            $return = ($cacheModule);
            return $return;
        } else {
            Lavra_Loader::LoadClass("ApplicationDB");
            $registry = Registry::getInstance();

            $cache = Cache::getInstance();
            $app = new ApplicationDB();

            $cat_arr = ($app->getChildsCategory(0, $category_id));
            $get_cache = $cache->get('Podbor-getPriceAllCategory-' . $category_id . '-' . md5(serialize($cat_arr)) . '-' . $shop_id, 'Products');

            if (empty($get_cache)) {
                $where = null;
                if (!isset($cat_arr['empty'])) { //Если категория не пуста
                    if (count($cat_arr)) {
                        foreach ($cat_arr as $key => $value) {
                            $where .= ' || products.category_1_id=' . $key;
                        }
                        $where = trim($where, ' |') . ' || ';
                    }
                }
                $query = $registry->db->prepare("SELECT 
		MIN(product_mod.price) as min_price,
                MAX(product_mod.price) as max_price
                FROM products INNER JOIN product_mod
                ON (products.is_delete = 0 && (shop_id=:shop_id || :shop_id = -1) && products.id = product_mod.product_id && product_mod.is_delete = 0  && products.is_active = 1 && 
                ($where products.category_1_id = :category_id || products.category_2_id = :category_id || products.category_3_id = :category_id) $where_char)
                
                ");
                $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
                $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
                $query->execute();
                $return = $query->fetch(PDO::FETCH_OBJ);

                CacheModule::setCacheModule('products-getPriceAllCategory-' . md5(serialize($where_char)) . '-' . $category_id . '-' . $shop_id, serialize($return), false);
//                $cache->setTags('Podbor-getPriceAllCategory-' . $category_id . '-' . md5(serialize($cat_arr)) . '-' . $shop_id, $return, 'Products');
                return $return;
            } else {
                return $get_cache;
            }
        }
    }

    public function getBrands($category_id) {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Podbor-getBrands-' . $category_id, 'Products');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT brands.*
                FROM products INNER JOIN brands
                ON (products.is_delete = 0 && products.brand_id = brands.id && brands.is_delete = 0  && 
                (products.category_1_id = :category_id || products.category_2_id = :category_id || products.category_3_id = :category_id))
                GROUP BY brands.id
                ");
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            $cache->setTags('Podbor-getBrands-' . $category_id, $return, 'Products');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getBrandsAllCategory($category_id, $shop_id = -1) {
        Lavra_Loader::LoadClass("ApplicationDB");
        $registry = Registry::getInstance();

//        $cache = Cache::getInstance();
//        $get_cache = $cache->get('Podbor-getBrandsAllCategory-' . $category_id . '-' . $shop_id, 'Products');
//        if (empty($get_cache)) {
        $cacheModule = unserialize(CacheModule::getCacheModule('products-getBrandsAllCategory-' . $category_id . '-' . $shop_id, false)); //Из-за ограничения мемкеша в 1мб
        if ($cacheModule !== false) {
            $return = ($cacheModule);
            return $return;
        } else {
            $app = new ApplicationDB();

            $cat_arr = ($app->getChildsCategory(0, $category_id));

            $where = null;
            if (!isset($cat_arr['empty'])) { //Если категория не пуста
                if (count($cat_arr)) {
                    foreach ($cat_arr as $key => $value) {
                        $where .= ' || products.category_1_id=' . $key;
                    }
                    $where = trim($where, ' |') . ' || ';
                }
            }
            $query = $registry->db->prepare("SELECT brands.*
                FROM products INNER JOIN brands
                ON (products.is_delete = 0  && (brands.shop_id=:shop_id || :shop_id = -1) && products.brand_id = brands.id && brands.is_delete = 0  && 
                ($where products.category_1_id = :category_id || products.category_2_id = :category_id || products.category_3_id = :category_id))
               GROUP BY brands.id ORDER BY brands.name
                ");
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            CacheModule::setCacheModule('products-getBrandsAllCategory-' . $category_id . '-' . $shop_id, serialize($return), false);
//            $cache->setTags('Podbor-getBrandsAllCategory-' . $category_id . '-' . $shop_id, $return, 'Products');
            return $return;
        }
//        } else {
//            return $get_cache;
//        }
    }

    public function generateForm()
    {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Selection", "selection");
        $this->_templatePodbor(8); //Компрессоры
        $this->_templatePodbor(9); //Пневмо
        $this->_templatePodbor(43); //Осушители
        $this->_templatePodbor(10); //Ресивер
        $this->_templatePodbor(21); //Фильтры
        $this->_templatePodbor(16); //Шланги
    }

    private function _templatePodbor($category_id) {
        $registry = Registry::getInstance();
        $selection = new Selection();
        $podbor = new Podbor();
        $get_section = $selection->getSettingCategoryId($category_id);
        if (isset($get_section->id) && $get_section->is_active == 1) { //Если для открытого раздела нет активных подборов, берем по-усолчанию
            $registry->get_chars_podbor[$category_id] = $selection->getCharSelection($category_id, $registry->shop_type);

            $registry->get_section[$category_id] = $get_section;
            if ($get_section->is_price == '1') {
                $registry->category_price[$category_id] = $podbor->getPriceAllCategory($category_id, $registry->shop_type);
            }
            if ($get_section->is_brand == '1') {
                $registry->selection_brands[$category_id] = $podbor->getBrandsAllCategory($category_id, $registry->shop_type);
            }
        }
    }

}
