<?php

class Pages {

    /**
     *  Проверяет, если по данному адресу статья, или нет. 
     * 
     * Не удалось сделать уникальные pseudo_dir только для своей категориий, 
     * т.к. на первом уровне нельзя будет отследдить уникальность адреса
     * @param $is_full_find - полнаяя проверка адреса. Требуется только если адрес вообще ни где не нашелся
     * @param type $url 
     */
    public function getPageIdAdressValidate($adress, $is_full_find = false) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Routes"); //Кэш адресов
        $routes = new Routes();
        $get_adress = $routes->getAdress(trim($adress, '/ ') . '/', $registry->shop_type);

        if ($get_adress) {
            return $get_adress->page_id;
        } elseif ($is_full_find === true) { /* Полный поиск адреса, требуется если например меню не выводиться на сайте или скрыто */
            $adress = trim($adress, ' /');
            $adress_arr = explode("/", $adress);
            krsort($adress_arr);
            $get_page = $this->getPageFromPseudoDir($adress_arr[key($adress_arr)], $registry->shop_type);
//            
            if (isset($get_page->id)) {
                return $get_page->id;
            }
            return false;
        }
        return false;
    }

    /**
     * Возвращает полный адрес по id страницы
     * Используется для вывода меню в шаблоне
     * @param type $page_id
     */
    public function getFullAdressPageIdRoutes($param) {
        $registry = Registry::getInstance();
        if (isset($param['page_id'])) {
            $page_id = $param['page_id'];
        } else {
            return false;
        }
        if ($page_id > 0) {
            Lavra_Loader::LoadClass('Routes');
            $cache = new Routes();
            $get_cache = $cache->getAdressPageId($page_id);
            if (!isset($get_cache->adress)) { //Если кэша нет, то ищем..
                $return = $this->getFullAdressPage($page_id, 0, 0, -1, $registry->shop_type);
                $cache->setAdress($page_id, 0, $return, $this->_full_pseudo_dir_arr, $registry->shop_type); //И найденое заносим в кеш
                echo $return;
            } else
                echo $get_cache->adress;
        }
        return false;
    }

    /**
     * Возвращает не обработанный массив полного адреса
     * используется для записи в кеш
     * @return type
     */
    public function getFullAdressPageArr() {
        return $this->_full_pseudo_dir_arr;
    }

    /**
     * Ищет и возвращает полный адрес для страницы
     * со всеми вложениями и подвлажениямит
     * @param int $page_id
     * @param type $type
     * @return type 
     */
    public function getFullAdressPage($page_id, $category_id, $parent_category_id, $type = -1, $shop_id = 0) {
        $registry = Registry::getInstance();
        $this->_full_pseudo_dir_arr = array();

        if ($category_id > 0) { //Поиск путя по категории (при добавлении, когда id не исзвестен)
            //Узнаем родителя категории
            $query = $registry->db->prepare("SELECT category.parent_id FROM  category WHERE (category.is_delete = 0 && category.id = :category_id) && (shop_id = :shop_id || shop_id = 0)");
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);
            if (isset($return->parent_id)) {
                $this->getParentAdress($return->parent_id, 0, $type);
            } else
                return false;;
        }
        elseif ($parent_category_id > 0) {
            $this->getParentAdress($parent_category_id, 0, $type);
        } else { //Поиск путя по странице (при редактировании, когда известен id страницы)
            $this->getParentAdress(0, $page_id, $type);
        }
//        sort($this->_full_pseudo_dir_arr);

        $this->_full_pseudo_dir_arr = $this->_sortAdress($this->_full_pseudo_dir_arr);
//            print_r($this->_full_pseudo_dir_arr);
        $url = null;
        foreach ($this->_full_pseudo_dir_arr as $value) {
            if ($value->pseudo_dir != 'main')
                $url .= $value->pseudo_dir . '/';
        }
        return trim($url, '/') . '/';
    }

    /* Правильно сортирует массив дерево адресов */

    private function _sortAdress($adress) {
        $this->_sort_adress = array();
        $tmp_sort = array();
        foreach ($adress as $key => $value) {
            $tmp_sort[$value->parent_id] = $value;
        }
        $adress = $tmp_sort;
        $this->_sortAdressHeplper($adress, 0);
        return $this->_sort_adress;
    }

    private $_sort_adress = array();

    /* Работает только для _sortAdressHeplper */

    private function _sortAdressHeplper($adress, $parent_id) {
        foreach ($adress as $value) {
            if ($value->parent_id == $parent_id) {
                $this->_sort_adress[] = $value;
                $this->_sortAdressHeplper($adress, $value->category_id);
                return true;
            }
        }
    }

    /**
     *  Ищет и возвращает полный адрес для страницы
     * Используется в шаблонах
     */
    public function getFullAdressPageTemplate($param) {
        $registry = Registry::getInstance();
        if (!isset($param['category_id']))
            $param['category_id'] = 0;
        if (!isset($param['type']))
            $param['type'] = -1;
        if (!isset($param['parent_category_id']))
            $param['parent_category_id'] = 0;
        if (!isset($param['page_id']))
            $param['page_id'] = 0;
        $return = $this->getFullAdressPage($param['page_id'], $param['category_id'], $param['parent_category_id'], $param['type'], $registry->shop_type);
        if ($return != '/') {
            echo $return;
        }
    }

    /**
     * Функция рекурсивно ищет родителей страницы 
     * напрямую зависит от getFullAdressPage
     */
    private $_full_pseudo_dir_arr = array();

    public function getParentAdress($category_id, $page_id, $type) {
        $registry = Registry::getInstance();
        if ($page_id) { //Если есть id-страницы (первый запуск)
            $query = $registry->db->prepare("SELECT category_id, category.parent_id, pages.pseudo_dir,  category.pseudo_dir as category_pseudo_dir, pages.header, pages.bread_name, pages.id as page_id
FROM pages INNER JOIN category ON (category.is_delete = 0 && category.id = pages.category_id && pages.id = :page_id && pages.is_delete = 0 && (pages.`type` = :type || :type = -1))
ORDER BY pages.`order` ASC, pages.`created` DESC");
            $query->bindParam(":page_id", $page_id, PDO::PARAM_INT, 11);
            $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);
        } elseif ($category_id) { //Если есть id-категории
            $query = $registry->db->prepare("SELECT 
                       category.id as category_id, category.parent_id,
                       (SELECT pages.bread_name FROM pages WHERE pages.is_delete=0 && pages.category_id = category.id ORDER BY pages.`order` ASC, pages.`created` DESC LIMIT 1) as bread_name,
                       (SELECT pages.pseudo_dir FROM pages WHERE pages.is_delete=0 && pages.category_id = category.id ORDER BY pages.`order` ASC, pages.`created` DESC LIMIT 1) as pseudo_dir,
                       (SELECT pages.id FROM pages WHERE pages.is_delete=0 && pages.category_id = category.id ORDER BY pages.`order` ASC, pages.`created` DESC LIMIT 1) as page_id,
                       (SELECT pages.header FROM pages WHERE pages.is_delete=0 && pages.category_id = category.id ORDER BY pages.`order` ASC, pages.`created` DESC LIMIT 1) as header,
                       category.pseudo_dir as category_pseudo_dir
FROM  category WHERE (category.is_delete = 0 && category.id = :category_id)
");
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);
        }
        if (isset($return->category_id)) {
            $this->_full_pseudo_dir_arr[] = $return;
            if ($return->parent_id != 0) { //Если категория не корневая
                $this->getParentAdress($return->parent_id, 0, $type);
            }
        } else {
            return false;
        }
    }

    public function add($header, $text, $title, $bread_name, $meta_keyword, $meta_desc, $pseudo_dir, $category_id, $type, $order, $user_id, $region_id) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Pages');
        CacheModule::delCacheModule('page');
        

        $query = $registry->db->prepare("INSERT INTO pages (bread_name, `header`, `text`, `title`, `meta_keyword`, `meta_desc`, `pseudo_dir`, `created`, `category_id`, `is_delete`, `type`, `order`, `user_id`, `region_id`)
		VALUES (:bread_name, :header, :text, :title, :meta_keyword, :meta_desc, :pseudo_dir, NOW(), :category_id, 0, :type, :order, :user_id, :region_id)");
        $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":region_id", $region_id, PDO::PARAM_INT, 11);
        $query->bindParam(":header", $header, PDO::PARAM_STR, 255);
        $query->bindParam(":text", $text, PDO::PARAM_STR);
        $query->bindParam(":title", $title, PDO::PARAM_STR, 255);
        $query->bindParam(":bread_name", $bread_name, PDO::PARAM_STR, 255);
        $query->bindParam(":meta_keyword", $meta_keyword, PDO::PARAM_STR, 100);
        $query->bindParam(":meta_desc", $meta_desc, PDO::PARAM_STR, 180);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function setMobileText($page_id, $text) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `pages` SET text_mobile=:text WHERE `id` = :id");
        $query->bindParam(":id", $page_id, PDO::PARAM_INT, 11);
        $query->bindParam(":text", $text, PDO::PARAM_STR);
        $query->execute();
    }
    public function setShopType($page_id, $shop_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `pages` SET shop_id=:shop_id WHERE `id` = :id");
        $query->bindParam(":id", $page_id, PDO::PARAM_INT, 11);
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setPageIdFiles($new_page_id, $old_page_id) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE `files` SET page_id=:new_page_id WHERE `files`.`page_id` = :old_page_id");
        $query->bindParam(":old_page_id", $old_page_id, PDO::PARAM_INT, 11);
        $query->bindParam(":new_page_id", $new_page_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function edit($page_id, $header, $text, $title, $bread_name, $meta_keyword, $meta_desc, $pseudo_dir, $order) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Pages');
        CacheModule::delCacheModule('page');
        

        $query = $registry->db->prepare("UPDATE `pages` SET `bread_name`=:bread_name,`order` = :order, 
		`pseudo_dir`=:pseudo_dir,
                `header` = :header, `text` = :text, `title` = :title, `meta_keyword` = :meta_keyword, `meta_desc` = :meta_desc
                WHERE is_delete=0 && id=:page_id");
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);
        $query->bindParam(":bread_name", $bread_name, PDO::PARAM_STR, 255);
        $query->bindParam(":page_id", $page_id, PDO::PARAM_INT, 11);
        $query->bindParam(":header", $header, PDO::PARAM_STR, 255);
        $query->bindParam(":text", $text, PDO::PARAM_STR);
        $query->bindParam(":title", $title, PDO::PARAM_STR, 255);
        $query->bindParam(":meta_keyword", $meta_keyword, PDO::PARAM_STR, 100);
        $query->bindParam(":meta_desc", $meta_desc, PDO::PARAM_STR, 180);
        $query->execute();
    }

    public function getPages($category_id, $type) {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Pages-getPages-' . $category_id . '-' . $type, 'Pages');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT *,
		DATE_FORMAT(pages.created, '%d.%m.%Y %H:%i:%s') as created
		FROM pages
                
WHERE  pages.is_delete = 0 &&    pages.category_id=:category_id && pages.`type` = :type  ORDER BY `order` ASC, `created` DESC");
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
//        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            $cache->setTags('Pages-getPages-' . $category_id . '-' . $type, $return, 'Pages');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getFindPage($find) {
        $registry = Registry::getInstance();
        $find = "%$find%";

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Pages-getFindPage-' . $find, 'Pages');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT  pages.* FROM pages
            WHERE (pages.header LIKE :find || pages.text LIKE :find) GROUP BY id");
            $query->bindParam(":find", $find, PDO::PARAM_STR, 255);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            $cache->setTags('Pages-getFindPage-' . $find, $return, 'Pages');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function isPseudoDir($dir) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as count FROM pages WHERE (pages.is_delete = 0 && pages.pseudo_dir = :dir)");
        $query->bindParam(":dir", $dir, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ)->count;
    }

    public function getPageId($page_id, $shop_id) {
        return $this->getPage($page_id, $shop_id);
    }

    /**
     * Читает страницу по id или псевдопапке
     * @param <type> $page_id
     * @param <type> $user_id - редактировать можно только свои страницы, или если user_id = 0
     * @return <type>
     */
    public function getPage($page_id, $shop_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Pages-getPage-' . $page_id . '-' . $shop_id, 'Pages');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT pages.* FROM pages WHERE pages.id=:page_id && (shop_id=:shop_id || shop_id = 0)  && pages.is_delete = 0 ");
            $query->bindParam(":page_id", $page_id, PDO::PARAM_INT, 11);
            $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);

            $cache->setTags('Pages-getPage-' . $page_id . '-' . $shop_id, $return, 'Pages');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Читает страницу по id или псевдопапке
     * @param <type> $page_id
     * @param <type> $user_id - редактировать можно только свои страницы, или если user_id = 0
     * @return <type>
     */
    public function getPageFromPseudoDir($pseudo_dir, $shop_id) {

        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Pages-getPageFromPseudoDir-' . $pseudo_dir . '-' . $shop_id, 'Pages');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT  pages.* FROM pages
            WHERE ( pages.pseudo_dir=:pseudo_dir && pages.is_delete = 0 && (shop_id=:shop_id || shop_id = 0))");
            $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);
            $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);

            $cache->setTags('Pages-getPageFromPseudoDir-' . $pseudo_dir . '-' . $shop_id, $return, 'Pages');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function del($page_id) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Pages');
        $cac->deleteTag('Routes');
        CacheModule::delCacheModule('page');
        

        $query = $registry->db->prepare("UPDATE `pages` SET is_delete=1 WHERE `pages`.`id` = :page_id LIMIT 1");
        $query->bindParam(":page_id", $page_id, PDO::PARAM_INT, 11);
        $query->execute();

        $query1 = $registry->db->prepare("DELETE FROM `routes` WHERE page_id = :page_id LIMIT 1");
        $query1->bindParam(":page_id", $page_id, PDO::PARAM_INT, 11);
        $query1->execute();
    }

    public function setSortOrder($page_id, $order) {
        $registry = Registry::getInstance();
        $cac = Cache::getInstance();
        $cac->deleteTag('Pages');

        $query = $registry->db->prepare("UPDATE `pages` SET `order`=:order WHERE `id` = :page_id");
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":page_id", $page_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function getMaxOrder($category_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT MAX(`order`) as `max` FROM pages WHERE is_delete = 0 && category_id = :category_id");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ)->max + 1;
    }

    /**
     * Содержание
     * @param <type> $category_id
     * @param <type> $type
     * @param <type> $user_id
     * @param <type> $region_id
     * @return <type>
     */
    public function getPagesContent($category_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Pages-getPagesContent-' . $category_id, 'Pages');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT *,
		DATE_FORMAT(pages.created, '%d.%m.%Y %H:%i:%s') as created
		FROM pages
            WHERE pages.is_delete = 0 &&  pages.category_id=:category_id  ORDER BY `order` ASC, `created` DESC");
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            $cache->setTags('Pages-getPagesContent-' . $category_id, $return, 'Pages');
            return $return;
        } else {
            return $get_cache;
        }
    }

}
