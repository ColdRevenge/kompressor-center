<?php

class Category {

    /**
     * Добавляет категорию
     * @param <type> $name - имя категории
     * @param <type> $pseudo_dir - папка для чпу
     * @param <type> $file_icon - иконка
     * @param <type> $dir - реальная папка на сервере (используется например в портале)
     * @param <type> $parent_id - родитель
     * @param <type> $order - порядок сортировки
     * @param <type> $is_visible - видима?
     * @param <type> $type  - тип
     */
    public function add($name, $link, $pseudo_dir, $desc, $param_str_1, $param_str_2, $param_str_3, $param_str_4, $param_str_5, $h1, $meta_key, $meta_desc, $title, $file_icon = null, $parent_id = 0, $order = 0, $is_param_1 = 0, $is_visible = 0, $type = 0) {
        $registry = Registry::getInstance();

        //Очищаем кеш маршрутов и категорий
        $cac = Cache::getInstance();
        $cac->deleteTag('Category');
        $cac->deleteTag('Routes');

        $query = $registry->db->prepare("INSERT INTO category (`type`,`name`,`desc`,`h1`, `param_str_1`,  param_str_2,  param_str_3,  param_str_4,  param_str_5, `meta_key`,`meta_desc`,`title`, link, pseudo_dir, icon, is_param_1, `is_visible`, parent_id, `created`, `order`, is_delete) VALUES
            (:type, :name, :desc, :h1, :param_str_1,  :param_str_2,  :param_str_3,  :param_str_4,  :param_str_5, :meta_key,:meta_desc,:title, :link, :pseudo_dir, :icon_path, :is_param_1, :is_visible, :parent_id, NOW(), :order, 0)");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":link", $link, PDO::PARAM_STR, 255);
        $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);
        $query->bindParam(":desc", $desc, PDO::PARAM_STR);
        $query->bindParam(":meta_key", $meta_key, PDO::PARAM_STR, 255);
        $query->bindParam(":meta_desc", $meta_desc, PDO::PARAM_STR, 255);
        $query->bindParam(":title", $title, PDO::PARAM_STR, 255);
        $query->bindParam(":icon_path", $file_icon, PDO::PARAM_STR, 255);
        $query->bindParam(":is_visible", $is_visible, PDO::PARAM_INT, 5);
        $query->bindParam(":is_param_1", $is_param_1, PDO::PARAM_INT, 5);
        $query->bindParam(":icon_path", $file_icon, PDO::PARAM_STR, 255);
        $query->bindParam(":h1", $h1, PDO::PARAM_STR, 255);
        $query->bindParam(":param_str_1", $param_str_1, PDO::PARAM_STR, 255);
        $query->bindParam(":param_str_2", $param_str_2, PDO::PARAM_STR, 255);
        $query->bindParam(":param_str_3", $param_str_3, PDO::PARAM_STR, 255);
        $query->bindParam(":param_str_4", $param_str_4, PDO::PARAM_STR, 255);
        $query->bindParam(":param_str_5", $param_str_5, PDO::PARAM_STR, 255);
        $query->bindParam(":parent_id", $parent_id, PDO::PARAM_INT, 11);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function setShopType($category_id, $shop_id) {
        $registry = Registry::getInstance();

        //Очищаем кеш маршрутов и категорий
        $cac = Cache::getInstance();
        $cac->deleteTag('Category');
        $cac->deleteTag('Routes');

        $query = $registry->db->prepare("UPDATE `category`  SET `shop_id` = :shop_id WHERE `id` = :category_id && `category`.`is_delete` = 0 LIMIT 1");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setIcons($category_id, $icon_2, $icon_3) {
        $registry = Registry::getInstance();

        //Очищаем кеш маршрутов и категорий
        $cac = Cache::getInstance();
        $cac->deleteTag('Category');
        $cac->deleteTag('Routes');

        $query = $registry->db->prepare("UPDATE `category`  SET `icon_2` = :icon_2, `icon_3` = :icon_3 WHERE `id` = :category_id && `category`.`is_delete` = 0 LIMIT 1");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":icon_2", $icon_2, PDO::PARAM_STR, 255);
        $query->bindParam(":icon_3", $icon_3, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function setPseudoDir($category_id, $pseudo_dir) {
        $registry = Registry::getInstance();

        //Очищаем кеш маршрутов и категорий
        $cac = Cache::getInstance();
        $cac->deleteTag('Category');
        $cac->deleteTag('Routes');

        $query = $registry->db->prepare("UPDATE `category`  SET `pseudo_dir` = :pseudo_dir WHERE `id` = :category_id && `category`.`is_delete` = 0 LIMIT 1");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function edit($category_id, $name, $link, $pseudo_dir, $desc, $param_str_1, $param_str_2, $param_str_3, $param_str_4, $param_str_5, $h1, $meta_key, $meta_desc, $title, $file_icon = null, $parent_id = 0, $order = 0, $is_param_1 = 0, $is_visible = 0, $type = 0) {
        $registry = Registry::getInstance();

        //Очищаем кеш маршрутов и категорий
        $cac = Cache::getInstance();
        $cac->deleteTag('Category');
        $cac->deleteTag('Routes');

        $query = $registry->db->prepare("UPDATE category SET `type` = :type, is_param_1=:is_param_1, `title`=:title, param_str_1=:param_str_1, "
                . "param_str_2=:param_str_2, param_str_3=:param_str_3, param_str_4=:param_str_4, param_str_5=:param_str_5, h1=:h1, `meta_desc`=:meta_desc, `meta_key`=:meta_key, `desc`=:desc, link=:link, `name` = :name, icon=:icon_path, pseudo_dir = :pseudo_dir, `is_visible`=:is_visible, parent_id=:parent_id, `order` = :order WHERE id=:category_id && is_delete=0");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":link", $link, PDO::PARAM_STR, 255);
        $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);
        $query->bindParam(":desc", $desc, PDO::PARAM_STR);
        $query->bindParam(":meta_key", $meta_key, PDO::PARAM_STR, 255);
        $query->bindParam(":meta_desc", $meta_desc, PDO::PARAM_STR, 255);
        $query->bindParam(":title", $title, PDO::PARAM_STR, 255);
        $query->bindParam(":icon_path", $file_icon, PDO::PARAM_STR, 255);
        $query->bindParam(":is_visible", $is_visible, PDO::PARAM_INT, 5);
        $query->bindParam(":is_param_1", $is_param_1, PDO::PARAM_INT, 5);
        $query->bindParam(":h1", $h1, PDO::PARAM_STR, 255);
        $query->bindParam(":param_str_1", $param_str_1, PDO::PARAM_STR, 255);
        $query->bindParam(":param_str_2", $param_str_2, PDO::PARAM_STR, 255);
        $query->bindParam(":param_str_3", $param_str_3, PDO::PARAM_STR, 255);
        $query->bindParam(":param_str_4", $param_str_4, PDO::PARAM_STR, 255);
        $query->bindParam(":param_str_5", $param_str_5, PDO::PARAM_STR, 255);
        $query->bindParam(":parent_id", $parent_id, PDO::PARAM_INT, 11);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function addQuick($name, $link, $parent_id = 0, $order = 0, $is_visible = 0, $type = 0) {
        $registry = Registry::getInstance();

        //Очищаем кеш маршрутов и категорий
        $cac = Cache::getInstance();
        $cac->deleteTag('Category');
        $cac->deleteTag('Routes');

        $query = $registry->db->prepare("INSERT INTO category (`type`, `name`,link, `is_visible`, parent_id, `created`, `order`, is_delete) VALUES
            (:type, :name,:link, :is_visible, :parent_id, NOW(), :order, 0)");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":is_visible", $is_visible, PDO::PARAM_INT, 5);
        $query->bindParam(":parent_id", $parent_id, PDO::PARAM_INT, 11);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":link", $link, PDO::PARAM_STR, 255);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function editQuick($category_id, $name, $link, $parent_id = 0, $order = 0, $is_visible = 0, $type = 0) {
        $registry = Registry::getInstance();

        //Очищаем кеш маршрутов и категорий
        $cac = Cache::getInstance();
        $cac->deleteTag('Category');
        $cac->deleteTag('Routes');

        $query = $registry->db->prepare("UPDATE category SET link=:link, `name`=:name, `type` = :type, `is_visible`=:is_visible, parent_id=:parent_id, `order` = :order WHERE id=:category_id && is_delete=0");
        $query->bindParam(":is_visible", $is_visible, PDO::PARAM_INT, 5);
        $query->bindParam(":parent_id", $parent_id, PDO::PARAM_INT, 11);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":link", $link, PDO::PARAM_STR, 255);
        $query->execute();
        return true;
    }

    /**
     * Проверяет, существует псевдо-папка или неь ($edit_id - указ. если редактирвоание, исключает этот id)
     * @param <type> $psevdo_dir
     */
    public function isPseudoDir($pseudo_dir, $type, $edit_id, $parent_id = -1, $shop_id = -1) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as count FROM category WHERE `type` = :type && (shop_id=:shop_id || :shop_id = -1) && is_delete = 0 && TRIM(pseudo_dir) = TRIM(:pseudo_dir) && (id != :edit_id || :edit_id = 0) && "
                . "(:parent_id = parent_id || :parent_id = -1)");
        $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);
        $query->bindParam(":edit_id", $edit_id, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":parent_id", $parent_id, PDO::PARAM_INT, 11);
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ)->count;
    }

    private $_parents_category_id = array();

    /**
     * Возвращает массив всех родителей категории, в том числе и саму категорию
     */
    public function getParentCategoryes($category_id, $tree) {
        foreach ($tree as $key => $value) {
            foreach ($value as $key_child => $value_child) {
                if ($value_child->id == $category_id) {
                    $this->_parents_category_id[$key] = 1;
                    $this->_parents_category_id[$category_id] = 1;
                    $this->getParentCategoryes($key, $tree);
                    ;
                }
            }
        }
        return $this->_parents_category_id;
    }

    /**
     * Хлебная крошка
     */
    private $_breadcrumbs = array();

    public function getBreadcrumbs($category_id) {
        $category = $this->getCategoryId($category_id);
        if (isset($category->parent_id)) {
            $this->_breadcrumbs[$category->parent_id] = array('name' => $category->name, 'id' => $category->id, 'parent_id' => $category->parent_id, 'pseudo_dir' => $category->pseudo_dir);
            $this->getBreadcrumbs($category->parent_id);
        } else
            return false;


        return $this->_breadcrumbs;
    }

    /**
     * Возвращает отсортированный список разделов меню,
     * НАПИСАТЬ ХРАНИМУЮ ПРОЦЕДУРУ для многослойной вложености меню (вычисление псевдо папки)
     * @return array
     */
    public function getCategory($type = 0, $shop_id = 0) {
//        $cache = Cache::getInstance();
//        $get_cache = $cache->get('Category-getCategory-' . $type . '-' . $shop_id, 'Category');
//
//        if (empty($get_cache)) {
        $cacheModule = unserialize(CacheModule::getCacheModule('category-getCategory-' . $type . '-' . $shop_id, false)); //Из-за ограничения мемкеша в 1мб
        if ($cacheModule !== false) {
            return ($cacheModule);
        } else {
            $registry = Registry::getInstance();
            $query = $registry->db->prepare("SELECT category.*, category.pseudo_dir as category_pseudo_dir,
(SELECT COUNT(*) as count FROM category as child_category WHERE child_category.is_delete = 0 && child_category.is_visible = 1 && child_category.parent_id=category.id) as is_child,
(SELECT pages.id FROM pages WHERE pages.is_delete = 0 && pages.category_id = category.id  ORDER BY `pages`.order ASC  LIMIT 1) as page_id 
FROM `category` WHERE category.is_delete = 0  && `type`=:type
ORDER BY category.parent_id,category.`order` ASC");
            $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            $category_arr = array();
            foreach ($result as $category) { //Сортируем под вывод меню в шаблонизатор
                if (!isset($category_arr[$category->parent_id]))
                    $category_arr[$category->parent_id] = array();
                $category_arr[$category->parent_id][] = $category;
            }

            foreach ($category_arr as $value_1) { //Сортируем под вывод меню в шаблонизатор
                foreach ($value_1 as $category) { //Сортируем под вывод меню в шаблонизатор
                    if ($category->pseudo_dir == "") {
                        $category->pseudo_dir = $this->_findPseudoDir($category, $category_arr);
                    }
                }
            }
            CacheModule::setCacheModule('category-getCategory-' . $type . '-' . $shop_id, serialize($category_arr), false);
//            $cache->setTags('Category-getCategory-' . $type . '-' . $shop_id, serialize($category_arr), 'Category');
            return $category_arr;
//        } else {
//            return unserialize($get_cache);
//        }
        }
    }

    /**
     * Без кеша, для импорта
     */
    public function isCategoryName($name, $parent_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as count FROM category WHERE `type` = 0 && TRIM(name) LIKE TRIM(:name) && is_delete = 0 && parent_id=:parent_id");
        $query->bindParam(":name", trim($name), PDO::PARAM_STR, 255);
        $query->bindParam(":parent_id", $parent_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ)->count;
    }

    /**
     * Без кеша, для импорта
     */
    public function getCategoryName($name, $parent_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM category WHERE `type` = 0 && TRIM(name)=:name && is_delete = 0 && parent_id=:parent_id");
        $query->bindParam(":name", trim($name), PDO::PARAM_STR, 255);
        $query->bindParam(":parent_id", $parent_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getChildCategoryCountProducts($type = 0, $parent_id = 0) {
        $registry = Registry::getInstance();
//        $cache = Cache::getInstance();
//        $get_cache = $cache->get('Category-getChildCategoryCountProducts-' . $type . '-' . $parent_id, 'Category');
//
//        if (empty($get_cache)) {
        $cacheModule = unserialize(CacheModule::getCacheModule('category-getChildCategoryCountProducts-' . $type . '-' . $parent_id, false)); //Из-за ограничения мемкеша в 1мб
        if ($cacheModule !== false) {
            $return = ($cacheModule);
            return $return;
        } else {
            $query = $registry->db->prepare("SELECT category.*, category.pseudo_dir as category_pseudo_dir,
(SELECT COUNT(*) FROM products WHERE products.is_delete = 0 && products.is_active = 1 && 
(products.category_1_id = category.id || products.category_2_id = category.id || products.category_3_id = category.id || products.category_4_id = category.id || products.category_5_id = category.id)) as is_child,

(SELECT pseudo_dir FROM pages WHERE pages.is_delete = 0 && pages.category_id = category.id  LIMIT 1) as pseudo_dir FROM `category`
WHERE category.is_delete = 0 && `type`=:type && `parent_id` = :parent_id 
ORDER BY category.parent_id,category.`order` ASC");
            $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
            $query->bindParam(":parent_id", $parent_id, PDO::PARAM_INT, 11);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            $category_arr = array();
            foreach ($result as $category) { //Сортируем под вывод меню в шаблонизатор
                if (!isset($category_arr[$category->parent_id]))
                    $category_arr[$category->parent_id] = array();
                $category_arr[$category->parent_id][] = $category;
            }

            foreach ($category_arr as $value_1) { //Сортируем под вывод меню в шаблонизатор
                foreach ($value_1 as $category) { //Сортируем под вывод меню в шаблонизатор
                    if ($category->pseudo_dir == "") {
                        $category->pseudo_dir = $this->_findPseudoDir($category, $category_arr);
                    }
                }
            }

            CacheModule::setCacheModule('category-getChildCategoryCountProducts-' . $type . '-' . $parent_id, serialize($category_arr), false);
//            $cache->setTags('Category-getChildCategoryCountProducts-' . $type . '-' . $parent_id, $category_arr, 'Category');
            return $category_arr;
        }
//        } else {
//            return $get_cache;
//        }
    }

    /**
     * Ищет псевдопапки для getCategory
     * @param <type> $category
     * @param array $category_arr
     * @return <type>
     */
    private function _findPseudoDir(&$category, Array $category_arr) {
        if (isset($category_arr[$category->id]) && $category_arr[$category->id][0]->pseudo_dir != "") {
            return $category_arr[$category->id][0]->pseudo_dir;
        }
    }

    /**
     * Специально для раздела banner, и схожих разделов
     * @param <type> $type
     * @return <type>
     */
    public function getCategoryTree($type = 0, $shop_id = 0) {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Category-getCategoryTree-' . $type . '-' . $shop_id, 'Category');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM category
                WHERE is_delete = 0  && (`type` = :type) && (shop_id = :shop_id || shop_id = 0) ORDER BY parent_id,`order` ASC");
            $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
            $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            $category_arr = array();
            foreach ($result as $category) { //Сортируем под вывод меню в шаблонизатор
                if (!isset($category_arr[$category->parent_id]))
                    $category_arr[$category->parent_id] = array();
                $category_arr[$category->parent_id][] = $category;
            }

            $cache->setTags('Category-getCategoryTree-' . $type . '-' . $shop_id, $category_arr, 'Category');
            return $category_arr;
        } else {
            return $get_cache;
        }
    }

    public function getCategoryAll($type = 0, $shop_id = -1) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM category
                WHERE is_delete = 0  && (`type` = :type) && (shop_id = :shop_id || :shop_id = -1)");
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    /**
     * Специально для раздела page, с подсчетом кол-ва страниц в каждом разделе
     * @param <type> $type
     * @return <type>
     */
    public function getPageCategory($type = 0, $shop_id = 0) {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Category-getPageCategory-' . $type . '-' . $shop_id, 'Category');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT *,
               (SELECT COUNT(*) FROM pages WHERE pages.category_id = category.id && pages.is_delete = 0 && category.is_delete = 0) as count
                FROM category
                WHERE is_delete = 0  && (`type` = :type) && (shop_id=:shop_id || shop_id=0) ORDER BY parent_id,`order` ASC");
            $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
            $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            $category_arr = array();
            foreach ($result as $category) { //Сортируем под вывод меню в шаблонизатор
                if (!isset($category_arr[$category->parent_id]))
                    $category_arr[$category->parent_id] = array();
                $category_arr[$category->parent_id][] = $category;
            }

            $cache->setTags('Category-getPageCategory-' . $type . '-' . $shop_id, $category_arr, 'Category');
            return $category_arr;
        } else {
            return $get_cache;
        }
    }

    /**
     * Специально для раздела prosucts, с подсчетом кол-ва страниц в каждом разделе
     * @param <type> $type
     * @return <type>
     */
    public function getProductCategory($type, $shop_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Category-getProductCategory-' . $type . '-' . $shop_id, 'Category');
// || products.category_2_id = category.id || products.category_3_id = category.id || products.category_4_id = category.id || products.category_5_id = category.id
        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT *,
            (SELECT pseudo_dir FROM pages WHERE pages.is_delete = 0 && pages.category_id = category.id  LIMIT 1) as page_pseudo_dir,
           (SELECT COUNT(*) FROM products WHERE (products.category_1_id = category.id) && products.is_delete = 0 && category.is_delete = 0) as count
            FROM category
            WHERE is_delete = 0 && (`type` = :type) && (shop_id = :shop_id || shop_id = 0) ORDER BY parent_id,`order` ASC");
            $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
            $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            $category_arr = array();
            foreach ($result as $category) { //Сортируем под вывод меню в шаблонизатор
                if (!isset($category_arr[$category->parent_id]))
                    $category_arr[$category->parent_id] = array();
                $category_arr[$category->parent_id][] = $category;
            }

            $cache->setTags('Category-getProductCategory-' . $type . '-' . $shop_id, $category_arr, 'Category');
            return $category_arr;
        } else {
            return $get_cache;
        }
    }

    /**
     * Аналог метода getProductCategory, только бещ подсчета, что ускоряет в разы запрос
     * @param <type> $type
     * @return <type> 
     */
    public function getProductCategoryQuick($type, $shop_id = 0) {
        $registry = Registry::getInstance();

        $cacheModule = unserialize(CacheModule::getCacheModule('category-getProductCategoryQuick-' . $type . '-' . $shop_id, false)); //Из-за ограничения мемкеша в 1мб
        if ($cacheModule !== false) {
            return ($cacheModule);
        } else {
            $query = $registry->db->prepare("SELECT *,
            (SELECT pseudo_dir FROM pages WHERE pages.is_delete = 0 && pages.category_id = category.id  LIMIT 1) as page_pseudo_dir
            FROM category
            WHERE is_delete = 0 && (`type` = :type) && (shop_id = :shop_id || shop_id = 0) ORDER BY parent_id,`order` ASC");
            $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
            $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            $category_arr = array();
            foreach ($result as $category) { //Сортируем под вывод меню в шаблонизатор
                if (!isset($category_arr[$category->parent_id]))
                    $category_arr[$category->parent_id] = array();
                $category_arr[$category->parent_id][] = $category;
            }

            CacheModule::setCacheModule('category-getProductCategoryQuick-' . $type . '-' . $shop_id, serialize($category_arr), false);
            return $category_arr;
        }
    }

    /**
     * Читает раздел меню
     *
     * @param arary $category_id
     */
    public function getCategoryId($category_id) {
        if ($category_id != 0) {
            $registry = Registry::getInstance();
            $cache = Cache::getInstance();

            $get_cache = $cache->get('Category-getCategoryId-' . $category_id, 'Category');

            if (empty($get_cache)) {
                $query = $registry->db->prepare("SELECT * FROM category WHERE is_delete = 0 && id=:category_id");
                $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
                $query->execute();
                $return = $query->fetch(PDO::FETCH_OBJ);
                $cache->setTags('Category-getCategoryId-' . $category_id, $return, 'Category');
                return $return;
            } else {
                return $get_cache;
            }
        }
    }

    public function getCategoryIdPseudoDir($pseudo_dir) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();

        $get_cache = $cache->get('Category-getCategoryIdPseudoDir-' . $pseudo_dir, 'Category');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM category WHERE is_delete = 0 && pseudo_dir=:pseudo_dir");
            $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);
            // print_r($return);
            $cache->setTags('Category-getCategoryIdPseudoDir-' . $pseudo_dir, $return, 'Category');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Возвращает список потомков
     * @param <type> $category_id - id-категории
     * @param <type> $is_visible - если = 1, то возвращает только видимые, 0 - все
     * @return <type>
     */
    public function getChildCategory($category_id, $is_visible, $type = -1, $shop_id = -1) {
        $registry = Registry::getInstance();
        $cacheModule = unserialize(CacheModule::getCacheModule('category-getChildCategory-' . $category_id . '-' . $is_visible . '-' . $type . '-' . $shop_id, false)); //Из-за ограничения мемкеша в 1мб
        if ($cacheModule !== false) {
            return ($cacheModule);
        } else {
//        $cache = Cache::getInstance();
//        $get_cache = $cache->get('Category-getChildCategory-' . $category_id . '-' . $is_visible . '-' . $type . '-' . $shop_id, 'Category');
//        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT *, pseudo_dir as category_pseudo_dir,
            (SELECT pseudo_dir FROM pages WHERE pages.is_delete = 0 && pages.category_id = category.id LIMIT 1) as pseudo_dir,
			(SELECT COUNT(id) FROM files WHERE category_id = category.id && resize_type = 1 LIMIT 1) as count_images
            FROM category WHERE is_delete = 0  && (shop_id = :shop_id || :shop_id = -1) && (`type` = :type || :type = -1) && (is_visible = :is_visible || :is_visible = 0) && parent_id=:category_id ORDER BY param_str_2 DESC, `order` ASC");
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->bindParam(":is_visible", $is_visible, PDO::PARAM_INT, 11);
            $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
            $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);
            CacheModule::setCacheModule('category-getChildCategory-' . $category_id . '-' . $is_visible . '-' . $type . '-' . $shop_id, serialize($return), false);
//            $cache->setTags('Category-getChildCategory-' . $category_id . '-' . $is_visible . '-' . $type . '-' . $shop_id, $return, 'Category');
            return $return;
        }
//        else {
//            return $get_cache;
//        }
    }

    public function getMaxCount($parent_id = 0, $type = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT MAX(`order`) as `max` FROM category WHERE is_delete = 0 &&  (parent_id = :parent_id) && `type`=:type ORDER BY `order` ASC");
        $query->bindParam(":parent_id", $parent_id, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ)->max + 1;
    }

    public function setTextTop($category_id, $text) {
        $registry = Registry::getInstance();

        //Очищаем кеш маршрутов и категорий
        $cac = Cache::getInstance();
        $cac->deleteTag('Category');
        $cac->deleteTag('Routes');

        $query = $registry->db->prepare("UPDATE `category`  SET text_top = :text WHERE `id` = :category_id && `category`.`is_delete` = 0");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":text", $text, PDO::PARAM_STR);
        $query->execute();
    }

    public function setTextBottom($category_id, $text) {
        $registry = Registry::getInstance();

        //Очищаем кеш маршрутов и категорий
        $cac = Cache::getInstance();
        $cac->deleteTag('Category');
        $cac->deleteTag('Routes');

        $query = $registry->db->prepare("UPDATE `category`  SET text_bottom = :text WHERE `id` = :category_id && `category`.`is_delete` = 0");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":text", $text, PDO::PARAM_STR);
        $query->execute();
    }

    public function setName($category_id, $name) {
        $registry = Registry::getInstance();

        //Очищаем кеш маршрутов и категорий
        $cac = Cache::getInstance();
        $cac->deleteTag('Category');

        $query = $registry->db->prepare("UPDATE `category`  SET `name` = :name WHERE `id` = :category_id && `category`.`is_delete` = 0 LIMIT 1");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function setParamStr_1($category_id, $param_str_1) {
        $registry = Registry::getInstance();

        //Очищаем кеш маршрутов и категорий
        $cac = Cache::getInstance();
        $cac->deleteTag('Category');

        $query = $registry->db->prepare("UPDATE `category`  SET `param_str_1` = :param_str_1 WHERE `id` = :category_id && `category`.`is_delete` = 0 LIMIT 1");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":param_str_1", $param_str_1, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function set1cId($category_id, $id_1c) {
        $registry = Registry::getInstance();

        //Очищаем кеш маршрутов и категорий
        $cac = Cache::getInstance();
        $cac->deleteTag('Category');

        $query = $registry->db->prepare("UPDATE `category`  SET `1c_id` = :1c_id WHERE `id` = :category_id && `category`.`is_delete` = 0 LIMIT 1");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":1c_id", $id_1c, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function getCategory1cId($id_ic) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM category WHERE 1c_id=:1c_id && is_delete = 0");
        $query->bindParam(":1c_id", $id_ic, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Изменяет порядок сортировки
     * @param <type> $category_id
     * @param <type> $text
     */
    public function setOrder($category_id, $order) {
        $registry = Registry::getInstance();

        //Очищаем кеш маршрутов и категорий
        $cac = Cache::getInstance();
        $cac->deleteTag('Category');

        $query = $registry->db->prepare("UPDATE `category`  SET `order` = :order WHERE `id` = :category_id && `category`.`is_delete` = 0 LIMIT 1");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setParentId($category_id, $parent_id) {
        $registry = Registry::getInstance();

        //Очищаем кеш маршрутов и категорий
        $cac = Cache::getInstance();
        $cac->deleteTag('Category');
        $cac->deleteTag('Routes');

        $query = $registry->db->prepare("UPDATE `category`  SET `parent_id` = :parent_id WHERE `id` = :category_id && `category`.`is_delete` = 0 LIMIT 1");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":parent_id", $parent_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setVisible($category_id, $is_visible) {
        $registry = Registry::getInstance();

        //Очищаем кеш маршрутов и категорий
        $cac = Cache::getInstance();
        $cac->deleteTag('Category');
        $cac->deleteTag('Routes');

        $query = $registry->db->prepare("UPDATE `category`  SET `is_visible` = :is_visible WHERE `id` = :category_id && `category`.`is_delete` = 0 LIMIT 1");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":is_visible", $is_visible, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /* Очищает категории из маршрутов (табличка routes) */

    public function clearCategoryRoutesCache() {
        $registry = Registry::getInstance();

        //Очищаем кеш маршрутов и категорий
        $cac = Cache::getInstance();
        $cac->deleteTag('Category');
        $cac->deleteTag('Routes');

        $query = $registry->db->query("DELETE FROM `routes` WHERE `category_id` != 0");
//        print_r($registry->db->errorInfo());
    }

    /**
     * Проверяет, если потомки у категории
     * @param <type> $category_id - id категории
     * @return bool
     */
    public function isChildCategory($category_id) {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Category-isChildCategory-' . $category_id, 'Category');
        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT COUNT(*) as count FROM category WHERE is_delete = 0 && is_visible = 1 && parent_id=:id ");
            $query->bindParam(":id", $category_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ)->count;
            $cache->setTags('Category-isChildCategory-' . $category_id, $return, 'Category');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Ищет детей категории 
     * @param type $category_id
     * @return type
     */
    public function getChildCategoryId($category_id) {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Category-getChildCategoryId-' . $category_id, 'Category');
        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM category WHERE is_delete = 0 && parent_id=:id ");
            $query->bindParam(":id", $category_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);
            $cache->setTags('Category-getChildCategoryId-' . $category_id, $return, 'Category');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function delCategory($category_id) {
        $registry = Registry::getInstance();

        //Очищаем кеш маршрутов и категорий
        $cac = Cache::getInstance();
        $cac->deleteTag('Category');
        $cac->deleteTag('Routes');

        $query = $registry->db->prepare("UPDATE `pages` SET is_delete = 1 WHERE `category_id` = :category_id");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->execute();
        //Удаление разделов меню
        $query = $registry->db->prepare("UPDATE `category`  SET is_delete = 1 WHERE `id` = :category_id && `category`.`is_delete` = 0");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->execute();
        $query = $registry->db->prepare("UPDATE `category`  SET is_delete = 1 WHERE `parent_id` = :category_id && `category`.`is_delete` = 0");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->execute();
        $query = $registry->db->prepare("UPDATE `products`  SET category_1_id = 0 WHERE `category_1_id` = :category_id");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->execute();
        $query = $registry->db->prepare("UPDATE `products`  SET category_2_id = 0 WHERE `category_2_id` = :category_id");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->execute();
        $query = $registry->db->prepare("UPDATE `products`  SET category_3_id = 0 WHERE `category_3_id` = :category_id");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->execute();
        $query = $registry->db->prepare("UPDATE `products`  SET category_4_id = 0 WHERE `category_4_id` = :category_id");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->execute();
        $query = $registry->db->prepare("UPDATE `products`  SET category_5_id = 0 WHERE `category_5_id` = :category_id");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     *  Проверяет, если по данному адресу статья, или нет. 
     * 
     * Не удалось сделать уникальные pseudo_dir только для своей категориий, 
     * т.к. на первом уровне нельзя будет отследдить уникальность адреса
     * 
     * @param type $url 
     */
    public function getCategoryIdAdressValidate($adress) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Routes"); //Кэш адресов
        $routes = new Routes();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Category-getCategoryIdAdressValidate-' . $adress, 'Category');
        if (empty($get_cache)) {
            $get_adress = $routes->getAdress(trim($adress, '/') . '/', $registry->shop_type);

            if ($get_adress) {
                $return = $get_adress->category_id;
                $cache->setTags('Category-getCategoryIdAdressValidate-' . $adress, $return, 'Category');
                return $return;
            }
        } else {
            return $get_cache;
        }
        return false;
    }

    /**
     * Возвращает полный адрес по id страницы
     * Используется для вывода меню в шаблоне
     * @param type $page_id
     */
    public function getFullAdressCategoryIdRoutes($param) {
        $registry = Registry::getInstance();
        if (isset($param['category_id'])) {
            $category_id = $param['category_id'];
        } else {
            return false;
        }
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Category-getFullAdressCategoryIdRoutes-' . $category_id, 'Category');
        if (empty($get_cache)) {
            Lavra_Loader::LoadClass('Routes');
            $cache2 = new Routes();
            $get_cache = $cache2->getAdressCategoryId($category_id);
            if (!isset($get_cache->adress)) { //Если кэша нет, то ищем..
                $return = $this->getFullAdressCategory($category_id, 0, -1);

                $cache2->setAdress(0, $category_id, $return, $this->_full_pseudo_dir_arr, $registry->shop_type); //И найденое заносим в кеш
                $cache->setTags('Category-getFullAdressCategoryIdRoutes-' . $category_id, $return, 'Category');

                if (!isset($param['hide'])) {
                    if (isset($param['is_return']) && $param['is_return'] == true) {
                        return $return;
                    } else {
                        echo $return;
                    }
                }
            } else {
                if (!isset($param['hide'])) {
                    if (isset($param['is_return']) && $param['is_return'] == true) {
                        return $get_cache->adress;
                    } else {
                        echo $get_cache->adress;
                    }
                }
            }
        } else {
            if (!isset($param['hide'])) {
                if (isset($param['is_return']) && $param['is_return'] == true) {
                    return $get_cache;
                } else {
                    echo $get_cache;
                }
            }
        }
    }

    public function categoriesGroupedByParent()
    {
        $registry = Registry::getInstance();

        $query = $registry->db->prepare("SELECT * FROM `category` WHERE `type` = 0 AND `is_delete` = 0 ORDER BY `order` ASC");
        $query->execute();

        $list = array();
        foreach ($query->fetchAll(PDO::FETCH_OBJ) as $category) {
            $list[$category->parent_id][] = $category;
        }

        return $list;
    }

    /**
     * Возвращает не обработанный массив полного адреса
     * используется для записи в кеш
     * @return type
     */
    public function getFullAdressCategoryArr() {
        return $this->_full_pseudo_dir_arr;
    }

    /**
     * Ищет и возвращает полный адрес для страницы
     * со всеми вложениями и подвлажениямит
     * @param int $page_id
     * @param type $type
     * @return type 
     */
    public function getFullAdressCategory($category_id, $parent_category_id, $type = -1) {
        $registry = Registry::getInstance();
        $this->_full_pseudo_dir_arr = array();

        if ($category_id > 0) { //Поиск путя по категории
//         echo $category_id;
            //Узнаем родителя категории
            $query = $registry->db->prepare("SELECT category.id FROM  category WHERE (category.is_delete = 0 && category.id = :category_id) ORDER BY parent_id");
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);
            if (isset($return->id)) {
                $this->getParentAdress($return->id, $type);
            } else
                return false;;
        }
        elseif ($parent_category_id > 0) {
            $this->getParentAdress($parent_category_id, $type);
        }
        $this->_full_pseudo_dir_arr = $this->_sortAdress($this->_full_pseudo_dir_arr);

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
                $this->_sortAdressHeplper($adress, $value->id);
                return true;
            }
        }
    }

    /**
     *  Ищет и возвращает полный адрес для страницы
     * Используется в шаблонах
     */
    public function getFullAdressPageTemplate($param) {
        if (!isset($param['category_id']))
            $param['category_id'] = 0;
        if (!isset($param['type']))
            $param['type'] = -1;
        if (!isset($param['parent_category_id']))
            $param['parent_category_id'] = 0;
        if (!isset($param['page_id']))
            $param['page_id'] = 0;
        echo $this->getFullAdressPage($param['page_id'], $param['category_id'], $param['parent_category_id'], $param['type']);
    }

    /**
     * Функция рекурсивно ищет родителей страницы 
     * напрямую зависит от getFullAdressPage
     */
    private $_full_pseudo_dir_arr = array();

    public function getParentAdress($category_id, $type) {


        $registry = Registry::getInstance();
        if ($category_id) { //Если есть id-категории
            $cache = Cache::getInstance();
            $get_cache = $cache->get('Category-getParentAdress-' . $category_id . $type, 'Category');
            if (empty($get_cache)) {
                $query = $registry->db->prepare("SELECT parent_id, 
                       id , parent_id, pseudo_dir, name
FROM  category WHERE (category.is_delete = 0 && (`type`=:type || :type=-1) && category.id = :category_id)
");
                $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
                $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
                $query->execute();
                $return = $query->fetch(PDO::FETCH_OBJ);
                $cache->setTags('Category-getParentAdress-' . $category_id . $type, $return, 'Category');
            } else {
                $return = $get_cache;
            }
//            print_r($return);
        }
        if (isset($return->id)) {
            $this->_full_pseudo_dir_arr[] = $return;
            if ($return->parent_id != 0) { //Если категория не корневая
                $this->getParentAdress($return->parent_id, $type);
            }
        } else {
            return false;
        }

//        $query = $registry->db->prepare("SELECT category_id, category.parent_id, pages.pseudo_dir,  category.pseudo_dir as category_pseudo_dir
//FROM pages RIGHT JOIN category ON (category.is_delete = 0 && category.id = pages.category_id && pages.is_delete = 0 && (pages.`type` = :type || :type = -1))
//ORDER BY pages.`order` ASC, pages.`created` DESC");
//        $query->bindParam(":page_id", $page_id, PDO::PARAM_INT, 11);
//        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
//        $query->execute();
    }

}
