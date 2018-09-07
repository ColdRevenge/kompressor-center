<?php

class Find {

    public function findNews($find, $type = 0, $offset = 0, $limit = 10, $shop_id = 0) {
        $registry = Registry::getInstance();
        $find = "%$find%";
        $query = $registry->db->prepare("SELECT * FROM news WHERE name LIKE :find && `type`=:type && is_delete=0 && (shop_id = :shop_id || :shop_id = 0) LIMIT :limit OFFSET :offset");
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":find", $find, PDO::PARAM_STR, 255);
        $query->bindParam(":limit", $limit, PDO::PARAM_INT, 11);
        $query->bindParam(":offset", $offset, PDO::PARAM_INT, 11);
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

	public function quickFindHits($category_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT SQL_CALC_FOUND_ROWS *,
		products.*
		FROM products INNER JOIN product_mod 
                ON (product_mod.product_id = products.id && product_mod.is_delete = 0 && 
                
products.is_delete = 0 && (category_1_id = :category_id && is_param_2 = 1 && (products.shop_id = :shop_id || :shop_id = 0))
) GROUP BY products.id 
		");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Поиск категорий в которых есть продукты
     * @param type $find
     * @param type $offset
     * @param type $limit
     * @return type 
     */
    public function quickFindCategory($find, $shop_id = 0) {
        $find = mb_strtoupper($find);
        $find = "%$find%";
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT 
		COUNT(DISTINCT products.id) as `count`, 
                category.name as category_name, 
                category.icon as category_icon,
                category.pseudo_dir as category_pseudo_dir
		FROM products 
                INNER JOIN category ON (category.id = category_1_id && category.is_delete = 0 && category.is_visible = 1)
                INNER JOIN product_mod 
                ON (product_mod.product_id = products.id && product_mod.is_delete = 0   && (products.shop_id = :shop_id || :shop_id = 0) && 
                
(UPPER(product_mod.article) LIKE :find || UPPER(products.name) LIKE :find || UPPER(products.short_desc) LIKE :find || UPPER(products.`desc`) LIKE :find) && is_active = 1 &&
products.is_delete = 0 
)

                
                GROUP BY category_1_id");
        $query->bindParam(":find", $find, PDO::PARAM_STR, 255);
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    
    
    /**
     * поиск товара в категории 
     * @param type $find
     * @param type $offset
     * @param type $limit
     * @return type 
     */
    public function quickFindCategoryProducts($category_id, $find, $offset = 0, $limit = 10) {
        $find = mb_strtoupper($find);
        $find = "%$find%";
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT SQL_CALC_FOUND_ROWS *,product_mod.id as mod_id,
		products.*
		FROM products INNER JOIN product_mod 
                ON (product_mod.product_id = products.id && product_mod.is_delete = 0 && 
                (UPPER(product_mod.article) LIKE :find || UPPER(products.name) LIKE :find || UPPER(products.short_desc) LIKE :find || UPPER(products.`desc`) LIKE :find) && is_active = 1 &&
products.is_delete = 0 && (products.category_1_id=:category_id || products.category_1_id=:category_id || products.category_2_id=:category_id || products.category_3_id=:category_id || products.category_4_id=:category_id || products.category_5_id=:category_id)
) GROUP BY products.id LIMIT :limit OFFSET :offset");
        $query->bindParam(":find", $find, PDO::PARAM_STR, 255);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":limit", $limit, PDO::PARAM_INT, 11);
        $query->bindParam(":offset", $offset, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    /**
     * поиск товара в категории по характеристикам
     * @param type $find
     * @param type $offset
     * @param type $limit
     * @return type 
     */
    public function quickFindCategoryCharProducts($category_id, $brand_id, $char_1, $char_2, $char_3, $char_4, $char_5, $min_price, $max_price, $find, $offset = 0, $limit = 10) {
        $find = "%$find%";
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT SQL_CALC_FOUND_ROWS *,
		products.*, product_mod.id as mod_id
		FROM products INNER JOIN product_mod 
                ON (product_mod.product_id = products.id && product_mod.is_delete = 0 && 
(:char_1 = 0 || 
                (SELECT COUNT(*) FROM characteristic_products WHERE characteristic_products.product_id=products.id && 
                characteristic_products.is_delete=0 && characteristic_products.characteristic_value_id=:char_1)) && 

(:char_2 = 0 || 
                (SELECT COUNT(*) FROM characteristic_products WHERE characteristic_products.product_id=products.id && 
                characteristic_products.is_delete=0 && characteristic_products.characteristic_value_id=:char_2)) && 
                
(:char_3 = 0 || 
                (SELECT COUNT(*) FROM characteristic_products WHERE characteristic_products.product_id=products.id && 
                characteristic_products.is_delete=0 && characteristic_products.characteristic_value_id=:char_3)) && 
                
(:char_4 = 0 || 
                (SELECT COUNT(*) FROM characteristic_products WHERE characteristic_products.product_id=products.id && 
                characteristic_products.is_delete=0 && characteristic_products.characteristic_value_id=:char_4)) && 
                
(:char_5 = 0 || 
                (SELECT COUNT(*) FROM characteristic_products WHERE characteristic_products.product_id=products.id && 
                characteristic_products.is_delete=0 && characteristic_products.characteristic_value_id=:char_5)) && 

                (brand_id = :brand_id || :brand_id = 0) && 
(:find = '%%' || (product_mod.article LIKE :find || products.name LIKE :find || products.short_desc LIKE :find || products.`desc` LIKE :find)) && is_active = 1 &&
products.is_delete = 0 && (:category_id = 0 || (products.category_1_id=:category_id || products.category_1_id=:category_id || products.category_2_id=:category_id || products.category_3_id=:category_id || products.category_4_id=:category_id || products.category_5_id=:category_id))
&& price >= :min_price && price <= :max_price
) GROUP BY products.id ");
        
        $query->bindParam(":find", $find, PDO::PARAM_STR, 255);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":char_1", $char_1, PDO::PARAM_INT, 11);
        $query->bindParam(":char_2", $char_2, PDO::PARAM_INT, 11);
        $query->bindParam(":char_3", $char_3, PDO::PARAM_INT, 11);
        $query->bindParam(":char_4", $char_4, PDO::PARAM_INT, 11);
        $query->bindParam(":char_5", $char_5, PDO::PARAM_INT, 11);
        $query->bindParam(":brand_id", $brand_id, PDO::PARAM_INT, 11);
        $query->bindParam(":min_price", $min_price, PDO::PARAM_INT, 11);
        $query->bindParam(":max_price", $max_price, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function quickFind($find, $offset = 0, $limit = 10, $shop_id = 0) {
        $find_full = "%$find%";
        $find = str_replace(' ', '', str_replace('-', '', $find_full)) ;
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT SQL_CALC_FOUND_ROWS *,
		products.*, 
              product_mod.id as  mod_id FROM products INNER JOIN product_mod
                
                ON (product_mod.is_delete=0 && product_mod.product_id = products.id &&   products.category_1_id > 0 &&          

                (REPLACE(REPLACE(product_mod.article,'-',''),' ','') LIKE :find || REPLACE(REPLACE(products.name,'-',''),' ','') LIKE :find || short_desc LIKE :find_full || `desc` LIKE :find_full) && is_active = 1 &&
                products.is_delete = 0 && (products.shop_id = :shop_id || :shop_id = 0)) ORDER BY products.name ASC LIMIT :limit OFFSET :offset");
        $query->bindParam(":find", $find, PDO::PARAM_STR, 255);
        $query->bindParam(":find_full", $find_full, PDO::PARAM_STR, 255);
        $query->bindParam(":limit", $limit, PDO::PARAM_INT, 11);
        $query->bindParam(":offset", $offset, PDO::PARAM_INT, 11);
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Подбор по самой характеристике 
     */
    public function podborChar($char_1_id, $char_2_id, $char_3_id) {
        Lavra_Loader::LoadClass("ApplicationDB");
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT SQL_CALC_FOUND_ROWS *, product_mod.id as mod_id,
		products.*, 
                (SELECT category.parent_id FROM category WHERE products.category_1_id = category.id) as category_parent_id
		FROM products INNER JOIN product_mod
                
                ON (product_mod.is_delete=0 && product_mod.product_id = products.id && product_mod.warehouse > 0 && 
                (SELECT COUNT(*) FROM related WHERE products.id = related_id) = 0 && 
                (SELECT COUNT(*) FROM characteristic_products WHERE characteristic_products.product_id = products.id && (characteristic_products.characteristic_id = :char_1_id || :char_1_id = 0)) && 
                (SELECT COUNT(*) FROM characteristic_products WHERE characteristic_products.product_id = products.id && (characteristic_products.characteristic_id = :char_2_id || :char_2_id = 0)) && 
                (SELECT COUNT(*) FROM characteristic_products WHERE characteristic_products.product_id = products.id && (characteristic_products.characteristic_id = :char_3_id || :char_3_id = 0))
                
                
                
                && is_active = 1 && products.is_delete = 0)");
        $query->bindParam(":char_1_id", $char_1_id, PDO::PARAM_INT, 11);
        $query->bindParam(":char_2_id", $char_2_id, PDO::PARAM_INT, 11);
        $query->bindParam(":char_3_id", $char_3_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
       public function podborCharValue($char_1_id, $char_2_id, $char_3_id) {
        Lavra_Loader::LoadClass("ApplicationDB");
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT SQL_CALC_FOUND_ROWS *, product_mod.id as mod_id,
		products.*, 
                (SELECT category.parent_id FROM category WHERE products.category_1_id = category.id) as category_parent_id
		FROM products INNER JOIN product_mod
                
                ON (product_mod.is_delete=0 && product_mod.product_id = products.id && product_mod.warehouse > 0 && 
                (SELECT COUNT(*) FROM related WHERE products.id = related_id) = 0 && 
                (SELECT COUNT(*) FROM characteristic_products WHERE characteristic_products.product_id = products.id && (characteristic_products.characteristic_value_id = :char_1_id || :char_1_id = 0)) && 
                (SELECT COUNT(*) FROM characteristic_products WHERE characteristic_products.product_id = products.id && (characteristic_products.characteristic_value_id = :char_2_id || :char_2_id = 0)) && 
                (SELECT COUNT(*) FROM characteristic_products WHERE characteristic_products.product_id = products.id && (characteristic_products.characteristic_value_id = :char_3_id || :char_3_id = 0))
                
                
                
                && is_active = 1 && products.is_delete = 0)");
        $query->bindParam(":char_1_id", $char_1_id, PDO::PARAM_INT, 11);
        $query->bindParam(":char_2_id", $char_2_id, PDO::PARAM_INT, 11);
        $query->bindParam(":char_3_id", $char_3_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    /**
     * Подбор по категории и значению характеристикам 
     */
    public function podbor($category_id, $brand_id, $char_1_id, $char_2_id, $char_3_id) {
        Lavra_Loader::LoadClass("ApplicationDB");
        $registry = Registry::getInstance();
        $app = new ApplicationDB();
            
        $cat_arr = ($app->getChildsCategory(0, $category_id));
        $where = null;
        if (count($cat_arr)) {
            foreach ($cat_arr as $key => $value) {
                $where .= ' || products.category_1_id=' . $key;
            }
            $where = trim($where, ' |') . ' || ';
        }
        $query = $registry->db->prepare("SELECT SQL_CALC_FOUND_ROWS *,
		products.*, 
                (SELECT category.parent_id FROM category WHERE products.category_1_id = category.id) as category_parent_id,
                (SELECT product_mod.price FROM product_mod WHERE products.id = product_mod.product_id && product_mod.is_delete =0 ORDER BY price ASC LIMIT 1) as price,
                (SELECT product_mod.old_price FROM product_mod WHERE products.id = product_mod.product_id && product_mod.is_delete =0 ORDER BY price ASC LIMIT 1) as old_price
		FROM products WHERE 
                (SELECT COUNT(*) FROM characteristic_products WHERE product_id = products.id && (characteristic_products.characteristic_value_id = :char_1_id || :char_1_id = 0)) && 
                (SELECT COUNT(*) FROM characteristic_products WHERE product_id = products.id && (characteristic_products.characteristic_value_id = :char_2_id || :char_2_id = 0)) && 
                (SELECT COUNT(*) FROM characteristic_products WHERE product_id = products.id && (characteristic_products.characteristic_value_id = :char_3_id || :char_3_id = 0))
                
                && 
                ( 
                $where products.category_1_id = :category_id || products.category_2_id = :category_id || products.category_3_id = :category_id)
                && (products.brand_id = :brand_id || :brand_id = 0)
                && is_active = 1 && products.is_delete = 0");
        $query->bindParam(":brand_id", $brand_id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":char_1_id", $char_1_id, PDO::PARAM_INT, 11);
        $query->bindParam(":char_2_id", $char_2_id, PDO::PARAM_INT, 11);
        $query->bindParam(":char_3_id", $char_3_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Выводит характиристики определенных товаров
     * @param type $category_obj
     * @param type $category_id
     * @param type $char_value_id
     * @return type 
     */
    public function getProductCharValue(Array $products, $characteristic_id) {

        $registry = Registry::getInstance();
        $query_str = null;
        foreach ($products as $key => $value) {
            $query_str .= ' || characteristic_products.product_id = ' . $value;
        }
        $query_str = trim($query_str, '| ');
        if (!empty($query_str)) {
            $query_str = "&& ($query_str)";
        }
        $query = $registry->db->prepare("SELECT characteristic_value.* FROM characteristic_value 
        INNER JOIN characteristic_products ON 
        (characteristic_products.characteristic_id = :characteristic_id &&  characteristic_products.is_delete = 0 && 
        characteristic_products.characteristic_value_id = characteristic_value.id $query_str 
        
        ) GROUP BY characteristic_value.id
          ORDER BY `order` ASC, id ASC");



        $query->bindParam(":characteristic_id", $characteristic_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

}