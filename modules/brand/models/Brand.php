<?php

class Brand {

    public function isBrand1C($id_1c) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM brands WHERE 1c_id=:1c_id ");
        $query->bindParam(":1c_id", $id_1c, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function addBrand1C($name, $id_1c) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO brands (`name`, `created`, 1c_id) VALUES (:name,  NOW(), :1c_id)");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":1c_id", $id_1c, PDO::PARAM_STR, 255);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function setBrand1C($name, $id_1c) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE brands SET `name`=:name WHERE 1c_id=:1c_id");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":1c_id", $id_1c, PDO::PARAM_STR, 255);
        $query->execute();
    }
    
    
    public function setParam($id, $param_str_1, $param_str_2, $param_str_3, $param_1, $param_2, $param_3) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE brands SET param_str_1 = :param_str_1, param_str_2 = :param_str_2, param_str_3 = :param_str_3, param_1 = :param_1, param_2 = :param_2, param_3 = :param_3 WHERE id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->bindParam(":param_str_1", $param_str_1, PDO::PARAM_STR, 255);
        $query->bindParam(":param_str_2", $param_str_2, PDO::PARAM_STR, 255);
        $query->bindParam(":param_str_3", $param_str_3, PDO::PARAM_STR, 255);
        $query->bindParam(":param_1", $param_1, PDO::PARAM_INT, 11);
        $query->bindParam(":param_2", $param_2, PDO::PARAM_INT, 11);
        $query->bindParam(":param_3", $param_3, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function add($name, $title, $h1, $meta_key, $meta_desc, $pseudo_dir, $desc, $text_top, $text_bottom, $icon = null, $order = 0, $category_id = 0, $is_visible = 1) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Brand');

        $query = $registry->db->prepare("INSERT INTO brands (`name`, title, h1, meta_key, meta_desc, pseudo_dir, `desc`, text_top, text_bottom, `icon`, `order`, `is_visible`, `created`, category_id)
		VALUES (:name, :title, :h1, :meta_key, :meta_desc, :pseudo_dir, :desc, :text_top, :text_bottom, :icon, :order,  :is_visible, NOW(), :category_id)");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);

        $query->bindParam(":title", $title, PDO::PARAM_STR, 255);
        $query->bindParam(":h1", $h1, PDO::PARAM_STR, 255);
        $query->bindParam(":meta_key", $meta_key, PDO::PARAM_STR, 255);
        $query->bindParam(":meta_desc", $meta_desc, PDO::PARAM_STR, 255);
        $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);

        $query->bindParam(":desc", $desc, PDO::PARAM_STR);
        $query->bindParam(":text_top", $text_top, PDO::PARAM_STR);
        $query->bindParam(":text_bottom", $text_bottom, PDO::PARAM_STR);
        $query->bindParam(":icon", $icon, PDO::PARAM_STR, 255);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":is_visible", $is_visible, PDO::PARAM_BOOL);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function setShopType($brand_id, $shop_id) {
        $registry = Registry::getInstance();
        $cac = Cache::getInstance();
        $cac->deleteTag('Brand');

        $query = $registry->db->prepare("UPDATE `brands`  SET `shop_id` = :shop_id WHERE `id` = :brand_id && `is_delete` = 0 LIMIT 1");
        $query->bindParam(":brand_id", $brand_id, PDO::PARAM_INT, 11);
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function edit($brand_id, $name, $title, $h1, $meta_key, $meta_desc, $pseudo_dir, $desc, $text_top, $text_bottom, $icon = null, $order = 0, $category_id = 0, $is_visible = 1) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Brand');

        $query = $registry->db->prepare("UPDATE `brands` SET title=:title, h1=:h1, meta_key=:meta_key, meta_desc=:meta_desc, pseudo_dir=:pseudo_dir,
            name = :name, `desc` = :desc, text_top=:text_top, text_bottom=:text_bottom, icon = :icon, category_id = :category_id, `order` = :order, is_visible = :is_visible
            WHERE is_delete=0 && id=:brand_id");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);


        $query->bindParam(":title", $title, PDO::PARAM_STR, 255);
        $query->bindParam(":h1", $h1, PDO::PARAM_STR, 255);
        $query->bindParam(":meta_key", $meta_key, PDO::PARAM_STR, 255);
        $query->bindParam(":meta_desc", $meta_desc, PDO::PARAM_STR, 255);
        $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);

        $query->bindParam(":desc", $desc, PDO::PARAM_STR);
        $query->bindParam(":text_top", $text_top, PDO::PARAM_STR);
        $query->bindParam(":text_bottom", $text_bottom, PDO::PARAM_STR);
        $query->bindParam(":icon", $icon, PDO::PARAM_STR, 255);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":is_visible", $is_visible, PDO::PARAM_BOOL);
        $query->bindParam(":brand_id", $brand_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /*
     * Выводит id и название категорий, в которых встречается бренд
     */

    public function getBrandCategoryes($brand_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Brand-getBrandCategoryes-' . $brand_id, 'Brand');

        if (empty($get_cache)) {
            $query = $registry->db->prepare(" 
			SELECT brand_category.pseudo_dir, category.name, category.id,category.icon, COUNT(products.id) as `count_products`, brands.name as brand_name FROM `brands`
				INNER JOIN products ON (brands.id = :brand_id && brands.is_delete=0 && products.is_delete=0 && products.is_active = 1 && products.brand_id=brands.id)
				INNER JOIN brand_category ON (brand_category.brand_id = brands.id && brand_category.category_id=products.category_1_id)
				INNER JOIN category ON (products.category_1_id = category.id && category.is_delete=0) GROUP BY category.id ORDER BY category.`order` ASC ");
            $query->bindParam(":brand_id", $brand_id, PDO::PARAM_STR, 255);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            $cache->setTags('Brand-getBrandCategoryes-' . $brand_id, $return, 'Brand');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getBrandCategoryesAll($brand_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Brand-getBrandCategoryes-' . $brand_id, 'Brand');

        if (empty($get_cache)) {
            $query = $registry->db->prepare(" 
			SELECT brand_category.*, category.name, category.id,category.icon FROM `brands`
				INNER JOIN products ON (brands.id = :brand_id && brands.is_delete=0 && products.is_delete=0 && products.is_active = 1 && products.brand_id=brands.id)
				INNER JOIN category ON (products.category_1_id = category.id && category.is_delete=0)
                                
				LEFT JOIN brand_category ON (brand_category.brand_id = brands.id && brand_category.category_id=products.category_1_id) GROUP BY category.id
                                ");
            $query->bindParam(":brand_id", $brand_id, PDO::PARAM_STR, 255);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            $cache->setTags('Brand-getBrandCategoryes-' . $brand_id, $return, 'Brand');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /*
     * Возвращает все товары определенного бренда и категории
     * @param type $brand_id
     * @param type $category_id
     */

    function getBrandCategoryId($brand_id, $category_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $order = null;
        if (!empty($this->_sort_field) && !empty($this->_sort_order)) {
            $order = " ORDER BY $this->_sort_field $this->_sort_order";
        }
        $get_cache = $cache->get('Brand-getBrandCategoryId-' . $brand_id . '-' . $category_id . '-', 'Brand');
        if (empty($get_cache)) {
            $query = $registry->db->prepare(" 
                
			SELECT product_mod.*, products.*, products.pseudo_dir, products.name, products.id, product_mod.id as mod_id, COUNT(products.id) as `count_products` FROM `brands`
				INNER JOIN products ON (brands.id = :brand_id && brands.is_delete=0 && products.is_delete=0 && products.is_active = 1 && products.brand_id=brands.id && products.category_1_id=:category_id)
                                INNER JOIN product_mod ON (product_mod.is_delete=0 && product_mod.product_id = products.id && warehouse > 0)
				 GROUP BY products.id $order ");
            $query->bindParam(":brand_id", $brand_id, PDO::PARAM_INT, 11);
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = array('result' => $query->fetchAll(PDO::FETCH_OBJ), 'count' => $this->getLastCountQuery());
            $cache->setTags('Brand-getBrandCategoryId-' . $brand_id . '-' . $category_id . '-', $return, 'Brand');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Возвращает кол-во выбраныз строк из последнего запроса
     */
    public function getLastCountQuery() {
        $registry = Registry::getInstance();
        $count = $registry->db->query("SELECT FOUND_ROWS() as count");
        $return = $count->fetch(PDO::FETCH_OBJ);
        return $return->count;
    }

    public function setSortOrder($page_id, $order) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Brand');

        $query = $registry->db->prepare("UPDATE `brands` SET `order`=:order WHERE `id` = :page_id");
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":page_id", $page_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function getBrandsCategoryId($category_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Brand-getBrandCategoryId-' . $category_id, 'Brand');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT brands.*, category.name as category_name FROM brands LEFT JOIN category
            ON (category.is_delete = 0 && category.id = brands.category_id)
            WHERE brands.is_delete = 0 && brands.category_id = :category_id ORDER BY brands.`order` ASC, brands.`category_id` ASC");
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            $cache->setTags('Brand-getBrandCategoryId-' . $category_id, $return, 'Brand');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getBrands($shop_id = -1) {
        $registry = Registry::getInstance();
//        $cache = Cache::getInstance();
//        $get_cache = $cache->get('Brand-getBrands-' . '-' . $shop_id, 'Brand');
//
//        if (empty($get_cache)) {
        $cacheModule = unserialize(CacheModule::getCacheModule('category-getBrands-' . $shop_id, false)); //Из-за ограничения мемкеша в 1мб
        if ($cacheModule !== false) {
            return ($cacheModule);
        } else {
            $query = $registry->db->prepare("SELECT brands.*, category.name as category_name FROM brands LEFT JOIN category
            ON (category.is_delete = 0 && category.id = brands.category_id) WHERE 
             brands.is_delete = 0 && (brands.shop_id = :shop_id || :shop_id = -1)
             ORDER BY brands.`order` ASC, brands.name ASC, brands.`category_id` ASC");
            $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            CacheModule::setCacheModule('category-getBrands-' . $shop_id, serialize($return), false);
//            $cache->setTags('Brand-getBrands-' . '-' . $shop_id, $return, 'Brand');
            return $return;
        }
//        else {
//            return $get_cache;
//        }
    }

    public function getBrandsCategoryAll() {
        $registry = Registry::getInstance();

        $query = $registry->db->prepare("SELECT pseudo_dir FROM brand_category WHERE pseudo_dir != ''");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getBrandPseudoDir($pseudo_dir) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Brand-getBrandPseudoDir-' . $pseudo_dir, 'Brand');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM brands WHERE brands.is_delete = 0 && pseudo_dir=:pseudo_dir  ORDER BY `order` ASC, `category_id` ASC");
            $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);

            $cache->setTags('Brand-getBrandPseudoDir-' . $pseudo_dir, $return, 'Brand');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getBrandId($brand_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Brand-getBrandId-' . $brand_id, 'Brand');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM brands WHERE brands.is_delete = 0 && id=:brand_id  ORDER BY `order` ASC, `category_id` ASC");
            $query->bindParam(":brand_id", $brand_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);

            $cache->setTags('Brand-getBrandId-' . $brand_id, $return, 'Brand');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Удаляет 
     */
    public function delCategoryBrandAll($category_id, $brand_id) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Brand');
        $query = $registry->db->prepare("DELETE FROM `brand_category` WHERE category_id=:category_id && brand_id=:brand_id");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":brand_id", $brand_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function addCategoryBrand($desc, $title, $h1, $meta_key, $meta_desc, $pseudo_dir, $category_id, $brand_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO brand_category (`desc`, h1, `title`, meta_key, meta_desc, pseudo_dir, category_id, brand_id) "
                . "VALUES (:desc, :h1, :title, :meta_key, :meta_desc, :pseudo_dir, :category_id, :brand_id)");
        $query->bindParam(":desc", $desc, PDO::PARAM_STR);
        $query->bindParam(":title", $title, PDO::PARAM_STR, 255);
        $query->bindParam(":h1", $h1, PDO::PARAM_STR, 255);
        $query->bindParam(":meta_key", $meta_key, PDO::PARAM_STR, 255);
        $query->bindParam(":meta_desc", $meta_desc, PDO::PARAM_STR, 255);
        $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":brand_id", $brand_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function getBrandCategory($brand_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Brand-getBrandCategory-' . $brand_id, 'Brand');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM brand_category WHERE  brand_id=:brand_id");
            $query->bindParam(":brand_id", $brand_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);
            $result = array();
            foreach ($return as $value) {
                $result[$value->category_id] = $value;
            }
            $cache->setTags('Brand-getBrandCategory-' . $brand_id, $result, 'Brand');
            return $result;
        } else {
            return $get_cache;
        }
    }

    public function getBrandIdCategoryId($brand_id, $category_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Brand-getBrandIdCategoryId-' . $category_id . '-' . $brand_id, 'Brand');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM brand_category WHERE  brand_id=:brand_id && category_id=:category_id");
            $query->bindParam(":brand_id", $brand_id, PDO::PARAM_INT, 11);
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);
            $cache->setTags('Brand-getBrandIdCategoryId-' . $category_id . '-' . $brand_id, $return, 'Brand');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getBrandCategoryPseudoDir($pseudo_dir) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Brand-getBrandCategoryPseudoDir-' . $pseudo_dir, 'Brand');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM brand_category WHERE  pseudo_dir=:pseudo_dir	");
            $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);

            $cache->setTags('Brand-getBrandCategoryPseudoDir-' . $pseudo_dir, $return, 'Brand');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getBrandName($brand_name, $shop_id = -1) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Brand-getBrandName-' . $brand_name . '-' . $shop_id, 'Brand');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM brands WHERE brands.is_delete = 0 && name=:name && (shop_id=:shop_id || :shop_id = -1)");
            $query->bindParam(":name", $brand_name, PDO::PARAM_STR, 255);
            $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);

            $cache->setTags('Brand-getBrandName-' . $brand_name . '-' . $shop_id, $return, 'Brand');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Возвращает рутовые разделы
     */
    public function getMaxCount() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT MAX(`order`) as `max` FROM brands WHERE is_delete = 0  ORDER BY `order` ASC");
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ)->max + 1;
    }

    public function delBrand($brand_id) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Brand');

        $query = $registry->db->prepare("UPDATE `brands` SET is_delete=1 WHERE `brands`.`id` = :brand_id  LIMIT 1");
        $query->bindParam(":brand_id", $brand_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

}
