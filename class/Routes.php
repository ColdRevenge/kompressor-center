<?php

class Routes {

    /**
     * Выводит адрес страницы
     * Используется в пользовательской части, для быстрого вывода адресов страниц (например при генерации меню)
     * 
     * @param type $page_id
     * @param type $category_id
     * @param type $adress
     */
    public function getAdress($adress, $shop_id) {
        $registry = Registry::getInstance();
//        $cache = Cache::getInstance();
//        $get_cache = $cache->get('Routes-getAdress-' . md5($adress . '-' . $shop_id), 'Routes');

        $cacheModule = unserialize(CacheModule::getCacheModule('category-getAdress-' . md5($adress . '-' . $shop_id), false)); //Из-за ограничения мемкеша в 1мб
        if ($cacheModule !== false) {
            return ($cacheModule);
        } else {

//        if (empty($get_cache)) {
            $query1 = $registry->db->prepare("SELECT * FROM `routes` WHERE adress=:adress && shop_id=:shop_id");
            $query1->bindParam(":adress", $adress, PDO::PARAM_STR, 255);
            $query1->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query1->execute();
            $return = $query1->fetch(PDO::FETCH_OBJ);
//            $cache->setTags('Routes-getAdress-' . md5($adress . '-' . $shop_id), serialize($return), 'Routes');
            CacheModule::setCacheModule('category-getAdress-' . md5($adress . '-' . $shop_id), serialize($return), false);
            return $return;
        }
    }

    /**
     * Для карты сайта..
     * @param type $adress
     * @return type
     */
    public function getAllAdress($shop_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Routes-getAllAdress-' . '-' . $shop_id, 'Routes');

        if (empty($get_cache)) {
            $query1 = $registry->db->prepare("SELECT * FROM `routes` WHERE shop_id=:shop_id");
            $query1->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query1->execute();
            $return = $query1->fetchAll(PDO::FETCH_OBJ);
            $cache->setTags('Routes-getAllAdress-' . '-' . $shop_id, $return, 'Routes');
            return $return;
        } else {
            return $get_cache;
        }
    }

    static private $_cache_adress_category = array();

    static private function _cacheAdressCategoryId($category_id) {
        if (!count(Routes::$_cache_adress_category)) {
            $registry = Registry::getInstance();
            $query1 = $registry->db->prepare("SELECT * FROM `routes` WHERE shop_id=:shop_id");
            $query1->bindParam(":shop_id", $registry->shop_type, PDO::PARAM_INT, 11);
//            $query1->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query1->execute();

            $return = $query1->fetchAll(PDO::FETCH_OBJ);
            $result = array();
            foreach ($return as $value) {
                $result[$value->category_id] = $value;
            }
            Routes::$_cache_adress_category = $result;
            if (isset(Routes::$_cache_adress_category[$category_id])) {
                return Routes::$_cache_adress_category[$category_id];
            } else {
                return false;
            }
        } else {
            if (isset(Routes::$_cache_adress_category[$category_id])) {
                return Routes::$_cache_adress_category[$category_id];
            }
            return false;
        }
    }

    public function getAdressCategoryId($category_id) {
        $return = (Routes::_cacheAdressCategoryId($category_id));

        return $return;
        //При большом кол-ве категори данная схема работает не эффективно
//        $registry = Registry::getInstance();
//        $query1 = $registry->db->prepare("SELECT * FROM `routes` WHERE category_id=:category_id");
//        $query1->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
//        $query1->execute();
//        return $query1->fetch(PDO::FETCH_OBJ);
    }

    public function getAdressPageId($page_id) {
        $registry = Registry::getInstance();
        $cacheModule = unserialize(CacheModule::getCacheModule('category-getAdressPageId-' . $page_id, false)); //Из-за ограничения мемкеша в 1мб
        if ($cacheModule !== false) {
            return ($cacheModule);
        } else {
//            $cache = Cache::getInstance();
//            $get_cache = $cache->get('Routes-getAdressPageId-' . $page_id, 'Routes');

//            if (empty($get_cache)) {
                $query1 = $registry->db->prepare("SELECT * FROM `routes` WHERE page_id=:page_id");
                $query1->bindParam(":page_id", $page_id, PDO::PARAM_INT, 11);
                $query1->execute();
                $return = $query1->fetch(PDO::FETCH_OBJ);
//                $cache->setTags('Routes-getAdressPageId-' . $page_id, $return, 'Routes');
              
//            } else {
//                return $get_cache;
//            }
            CacheModule::setCacheModule('category-getAdressPageId-' . $page_id, serialize($return), false);
            return $return;
        }
    }

    public function setAdress($page_id, $category_id, $adress, $arr, $shop_id = 0) {
        $registry = Registry::getInstance();
        //Очищаем кеш маршрутов и категорий
        $cac = Cache::getInstance();
        $cac->deleteTag('Routes');

        $query1 = $registry->db->prepare("DELETE FROM `routes` WHERE category_id=:category_id && page_id=:page_id && shop_id=:shop_id");
        $query1->bindParam(":page_id", $page_id, PDO::PARAM_INT, 11);
        $query1->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query1->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query1->execute();

        $query = $registry->db->prepare("INSERT INTO `routes` (page_id, category_id, adress, `arr`, shop_id) VALUES (:page_id, :category_id, :adress, :arr, :shop_id)");
        $query->bindParam(":page_id", $page_id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":adress", $adress, PDO::PARAM_STR, 255);
        $query->bindParam(":arr", serialize($arr), PDO::PARAM_STR);
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Возвращает 1 если адрес уже есть
     * 0 - если адрес не существует
     * Если редактирование страницы то указать is_edit!!! = 1
     * @param type $adress 
     */
    public function isAdress($adress, $is_edit = 0, $shop_id = 0) {
        $adress = trim($adress, '/ ') . '/';
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Routes-isAdress-' . $adress . $is_edit . '-' . $shop_id, 'Routes');

        if (empty($get_cache)) {
            $query1 = $registry->db->prepare("SELECT COUNT(*) as `count` FROM `routes` WHERE adress LIKE :adress && (shop_id=:shop_id || shop_id = 0)");
            $query1->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query1->bindParam(":adress", $adress, PDO::PARAM_STR, 255);
            $query1->execute();
            $result = $query1->fetch(PDO::FETCH_OBJ)->count;
            $return = $result - $is_edit;
            $cache->setTags('Routes-isAdress-' . $adress . $is_edit . '-' . $shop_id, $return, 'Routes');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     *  Удаляет адреса категорий
     * @param type $category_id
     */
    public function delAdressCategoryId($category_id) {
        $registry = Registry::getInstance();
        //Очищаем кеш маршрутов и категорий
        $cac = Cache::getInstance();
        $cac->deleteTag('Routes');

        $query1 = $registry->db->prepare("DELETE FROM `routes` WHERE category_id = :category_id");
        $query1->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query1->execute();
    }

}

?>
