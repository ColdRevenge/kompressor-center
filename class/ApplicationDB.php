<?php

/**
 * Выполняет различные действия для баз данных
 * Используется только в модулях
 */
class ApplicationDB {

    /**
     * Возвращает строку условия, для базы publ
     *
     * @return string "&& (category_id_1 = 40 || category_id_2 = 40 || category_id_3 = 40|| category_id_1 = 41 || category_id_2 = 41 || category_id_3 = 41)"
     */
    static public function getCategoryWhere(Category $category, $category_id) {
        $where_category = null;

        $cacheModule = unserialize(CacheModule::getCacheModule('category-getCategoryWhere' . $category_id, false)); //Из-за ограничения мемкеша в 1мб
        if ($cacheModule !== false) {
            return ($cacheModule);
        } else {

            if ($category->isChildCategory($category_id)) { //Смотрим, есть ли потомки у открытого раздела
                $child = $category->getChildCategory($category_id, 1);
                foreach ($child as $value) { //Смотрим всех потомков открытой категории
                    $where_category .= "|| category_1_id = $value->id || category_2_id = $value->id || category_3_id = $value->id";
                }
            } else
                $where_category = "|| category_1_id = $category_id || category_2_id = $category_id || category_3_id = $category_id";
            if (!empty($where_category)) {
                return "&& (" . trim($where_category, "| ") . ")";
            } else
                return false;
        }
        CacheModule::setCacheModule('category-getCategoryWhere' . $category_id, serialize($this->_category_arr), false);
        return $this->_category_arr;
    }

    /**
     * Возвращает массив из всех детей категории 
     */
    private $_category_arr = array();
    private $_temp_category_obj = null;

    public function getChildsCategory($type, $category_id, $is_clear = 1) {
        $registry = Registry::getInstance();
//        $cacheModule = unserialize(CacheModule::getCacheModule('category-getChildsCategory' . $type . '-' . $category_id . '-' . $is_clear . '-' . $registry->shop_type, false)); //Из-за ограничения мемкеша в 1мб
//        if ($cacheModule !== false) {
////            print_r($cacheModule);
//            return ($cacheModule);
//        } else {

        if ($is_clear == 1) {
            $this->_category_arr = array();
            $this->_temp_category_obj = array();
        }
        if ($this->_temp_category_obj == null) {
            Lavra_Loader::LoadClass("Category");
            $category = new Category();
            $this->_temp_category_obj = $category->getCategory($type, $registry->shop_type);
        }

        //Получаем все категории
        $result = array();
        $result[$category_id] = $category_id;
        if (isset($this->_temp_category_obj[$category_id])) { //Если у категории есть потомки
            foreach ($this->_temp_category_obj[$category_id] as $value) {
                if ($value->id > 0) {
                    $this->_category_arr[$value->id] = $value->id;
                    $this->getChildsCategory($type, $value->id, 0);
                }
            }
        }
        if ($is_clear == 1) {
            if (empty($get_cache)) {
                if (empty($this->_category_arr)) {
                    $this->_category_arr = array('empty' => '1');
                }
//                    $cache->setTags('ApplicationDB-getChildsCategory-' . $category_id, $this->_category_arr, 'Category');
            }
        }
//        }
//        CacheModule::setCacheModule('category-getChildsCategory' . $type . '-' . $category_id . '-' . $is_clear . '-' . $registry->shop_type, serialize($this->_category_arr), false);
        return $this->_category_arr;
    }

    /**
     * Возвращает массив из всех родителей категории 
     * Ключ массива - id - родителя
     * Значение - объект категории
     */
    private $_parent_category = array();

    public function getParentsCategory($category_id) {
        $registry = Registry::getInstance();

        $cacheModule = unserialize(CacheModule::getCacheModule('category-getParentsCategory' . $category_id . '-' . $registry->shop_type, false)); //Из-за ограничения мемкеша в 1мб
        if ($cacheModule !== false) {
//            print_r($cacheModule);
            return ($cacheModule);
        } else {

            Lavra_Loader::LoadClass("Category");
            $category = new Category();

            $categoryes = $category->getCategoryId($category_id);
            if (isset($categoryes->id)) {
                $this->_parent_category[$categoryes->parent_id] = $categoryes;
//            if ($categoryes->parent_id != 0) { //Если не рутовая категория
                $this->getParentsCategory($categoryes->parent_id);
//            } 
            }
            ksort($this->_parent_category);
        }
        CacheModule::setCacheModule('category-getParentsCategory' . $category_id . '-' . $registry->shop_type, serialize($this->_parent_category), false);
        return $this->_parent_category;
    }

    /**
     * Ищет главную категорию
     */
    public function getRootCategoryId($category_id) {
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $get_category = $category->getCategoryId($category_id);
        if (isset($get_category->parent_id)) {

            $return = $this->getRootCategoryId($get_category->parent_id);
            ;
            if (isset($return->id)) {
                return $return;
            } else {
                return $get_category;
            }
        } else {
            return $category_id;
        }
    }

}
