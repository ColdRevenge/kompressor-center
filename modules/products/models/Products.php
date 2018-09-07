<?php

class Products {

    private $_sort_field = null, $_sort_order = null;

    function getBrandCategoryId($brand_id, $category_id, $offset = 0, $limit = 100) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        if (!empty($this->_sort_field) && !empty($this->_sort_order)) {
            $order = " ORDER BY $this->_sort_field $this->_sort_order";
        }
        $get_cache = $cache->get('Brand-getBrandCategoryId-' . $brand_id . '-' . $category_id . '-' . $order, 'Brand');
        if (empty($get_cache)) {
            $query = $registry->db->prepare(" 
                
			SELECT product_mod.*, products.*, products.pseudo_dir, products.name, products.id, product_mod.id as mod_id, COUNT(products.id) as `count_products` FROM `brands`
				INNER JOIN products ON (brands.id = :brand_id && brands.is_delete=0 && products.is_delete=0 && products.is_active = 1 && products.brand_id=brands.id && products.category_1_id=:category_id)
                                INNER JOIN product_mod ON (product_mod.is_delete=0 && product_mod.product_id = products.id && warehouse > 0)
				 GROUP BY products.id $order  LIMIT :limit OFFSET :offset");
            $query->bindParam(":brand_id", $brand_id, PDO::PARAM_INT, 11);
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->bindParam(":limit", $limit, PDO::PARAM_INT, 11);
            $query->bindParam(":offset", $offset, PDO::PARAM_INT, 11);
            $query->execute();
            $return = array('result' => $this->withChars($query->fetchAll(PDO::FETCH_OBJ)), 'count' => $this->getLastCountQuery());
            $cache->setTags('Brand-getBrandCategoryId-' . $brand_id . '-' . $category_id . '-' . $order, $return, 'Brand');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * С этим товаром покупают
     * Поиск последних 50 заказов купивших с этим товаром
     * @param type $product_id
     * @return type
     */
    public function getPrpductBuyOrderId($product_id, $limit = 50) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("
SELECT products.*, product_mod.price,  product_mod.article,  product_mod.id as mod_id, 
            (SELECT file FROM products_images WHERE product_id = products.id && `type`=5 && is_delete = 0 LIMIT 1) as file  FROM products 
            INNER JOIN product_mod ON 
            (product_mod.product_id = products.id && 
            product_mod.is_delete = 0 && 
            products.is_delete = 0)            
INNER JOIN order_products
ON (products.id = order_products.product_id && order_products.is_delete = 0 && 
order_products.order_id IN (SELECT o.order_id FROM order_products as o WHERE o.product_id = :product_id) &&
            order_products.product_id != :product_id) GROUP BY products.id ORDER BY order_products.order_id DESC 
LIMIT :limit OFFSET 0");
        $query->bindParam(":limit", $limit, PDO::PARAM_INT, 11);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Добавление продукта
     * @param <type> $warehouse - наличие на складе
     * @return <type>
     */
    public function add($name, $code, $unit, $short_desc, $desc, $title, $meta_keyword, $meta_desc, $category_1_id, $category_2_id, $category_3_id, $category_4_id, $category_5_id, $pseudo_dir, $brand_id, $marker, $is_active, $desc_1 = null, $desc_2 = null, $desc_3 = null, $desc_4 = null, $desc_5 = null, $desc_6 = null, $desc_7 = null, $desc_8 = null) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Category');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("INSERT INTO products (`created`,pseudo_dir, `name`, `code`,  `unit`, `short_desc`, `desc`, `desc_1`, `desc_2`, `desc_3`, `desc_4`, `desc_5`, `desc_6`, `desc_7`, `desc_8`, `title`, `meta_keyword`, `meta_desc`, `category_1_id`, `category_2_id`, `category_3_id`, `category_4_id`, `category_5_id`, `brand_id`,  `marker`, `is_active`, `is_delete`)
		VALUES (NOW(), TRIM(:pseudo_dir), :name,  :code,  :unit, :short_desc, :desc, :desc_1, :desc_2, :desc_3, :desc_4, :desc_5, :desc_6, :desc_7, :desc_8, :title, :meta_keyword, :meta_desc, :category_1_id, :category_2_id, :category_3_id, :category_4_id, :category_5_id, :brand_id, :marker, :is_active, 0)");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":unit", $unit, PDO::PARAM_STR, 255);
        $query->bindParam(":code", $code, PDO::PARAM_INT, 11);
        $query->bindParam(":short_desc", $short_desc, PDO::PARAM_STR);
        $query->bindParam(":desc_1", $desc_1, PDO::PARAM_STR);
        $query->bindParam(":desc_2", $desc_2, PDO::PARAM_STR);
        $query->bindParam(":desc_3", $desc_3, PDO::PARAM_STR);
        $query->bindParam(":desc_4", $desc_4, PDO::PARAM_STR);
        $query->bindParam(":desc_5", $desc_5, PDO::PARAM_STR);
        $query->bindParam(":desc_6", $desc_6, PDO::PARAM_STR);
        $query->bindParam(":desc_7", $desc_7, PDO::PARAM_STR);
        $query->bindParam(":desc_8", $desc_8, PDO::PARAM_STR);
        $query->bindParam(":desc", $desc, PDO::PARAM_STR);
        $query->bindParam(":title", $title, PDO::PARAM_STR, 255);
        $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);
        $query->bindParam(":meta_keyword", $meta_keyword, PDO::PARAM_STR);
        $query->bindParam(":meta_desc", $meta_desc, PDO::PARAM_STR);
        $query->bindParam(":category_1_id", $category_1_id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_2_id", $category_2_id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_3_id", $category_3_id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_4_id", $category_4_id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_5_id", $category_5_id, PDO::PARAM_INT, 11);
        $query->bindParam(":brand_id", $brand_id, PDO::PARAM_INT, 11);
        $query->bindParam(":marker", $marker, PDO::PARAM_INT, 11);
        $query->bindParam(":is_active", $is_active, PDO::PARAM_BOOL);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    /**
     * Меняет временный id на id-продукта
     * @param <type> $temp_id
     * @param <type> $product_id 
     */
    public function setShopType($product_id, $shop_id) {
        $registry = Registry::getInstance();
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $query = $registry->db->prepare("UPDATE `products` SET shop_id=:shop_id WHERE id=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Админ который добавил товар
     * @param type $product_id
     * @param type $shop_id
     */
    public function setAdminId($product_id, $user_id) {
        $registry = Registry::getInstance();
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $query = $registry->db->prepare("UPDATE `products` SET admin_id=:user_id WHERE id=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Меняет временный id на id-продукта
     * @param <type> $temp_id
     * @param <type> $product_id 
     */
    public function setTempProductImageId($temp_product_id, $product_id) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE `products_images` SET product_id=:product_id WHERE is_delete=0 && product_id=:temp_product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":temp_product_id", $temp_product_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setTempProductFileImageId($temp_product_id, $product_id, $type) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE `files` SET page_id=:product_id WHERE is_delete=0 && page_id=:temp_product_id && `type`=:type");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":temp_product_id", $temp_product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Устанавливает статус, активен или нет для продукта
     * @param <type> $product_id
     * @param <type> $is_active
     */
    public function setActive($product_id, $is_active) {
        $registry = Registry::getInstance();
        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE `products` SET is_active=:is_active WHERE is_delete=0 && id=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":is_active", $is_active, PDO::PARAM_BOOL);
        $query->execute();
    }

    public function setProductActiveCategory($category_1_id, $is_active) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE `products` SET is_active=:is_active WHERE is_delete=0 && category_1_id=:category_1_id");
        $query->bindParam(":category_1_id", $category_1_id, PDO::PARAM_INT, 11);
        $query->bindParam(":is_active", $is_active, PDO::PARAM_BOOL);
        $query->execute();
    }

    /**
     * Устанавливает сортировку
     * @param <type> $product_id
     * @param <type> $is_active
     */
    public function setOrder($product_id, $order) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE `products` SET `order`=:order WHERE is_delete=0 && id=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setCategory1($product_id, $category_1_id) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE `products` SET `category_1_id`=:category_1_id WHERE is_delete=0 && id=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_1_id", $category_1_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setCategory2($product_id, $category_2_id) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE `products` SET `category_2_id`=:category_2_id WHERE is_delete=0 && id=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_2_id", $category_2_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setCategory3($product_id, $category_3_id) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE `products` SET `category_3_id`=:category_3_id WHERE is_delete=0 && id=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_3_id", $category_3_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setDesc1($product_id, $desc1) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE `products` SET `desc_1`=:desc_1 WHERE is_delete=0 && id=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":desc_1", $desc1, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function setDesc4($product_id, $desc4) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE `products` SET `desc_4`=:desc_4 WHERE is_delete=0 && id=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":desc_4", $desc4, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function setDesc8($product_id, $desc8) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE `products` SET `desc_8`=:desc_8 WHERE is_delete=0 && id=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":desc_8", $desc8, PDO::PARAM_STR, 255);
        $query->execute();
    }

    /**
     * Устанавливает товар в акцию
     * @param type $product_id
     */
    public function setAction($product_id, $value) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE `products` SET `is_page_action`=:value WHERE is_delete=0 && id=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":value", $value, PDO::PARAM_INT, 1);
        $query->execute();
    }

    public function setName($product_id, $value) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE `products` SET `name`=:name WHERE is_delete=0 && id=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":name", $value, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function setBrandId($product_id, $brand_id) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE `products` SET `brand_id`=:brand_id WHERE is_delete=0 && id=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":brand_id", $brand_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Устанавливает свободный параметр 1
     * @param type $product_id
     */
    public function setIsParam1($product_id, $value) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE `products` SET `is_param_1`=:value WHERE is_delete=0 && id=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":value", $value, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Устанавливает свободный параметр 2
     * @param type $product_id
     */
    public function setIsParam2($product_id, $value) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE `products` SET `is_param_2`=:value WHERE is_delete=0 && id=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":value", $value, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Устанавливает свободный параметр 3
     * @param type $product_id
     */
    public function setIsParam3($product_id, $value) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE `products` SET `is_param_3`=:value WHERE is_delete=0 && id=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":value", $value, PDO::PARAM_INT, 1);
        $query->execute();
    }

    public function setIsParam4($product_id, $value) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE `products` SET `is_param_4`=:value WHERE is_delete=0 && id=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":value", $value, PDO::PARAM_INT, 1);
        $query->execute();
    }

    public function setIsParam5($product_id, $value) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE `products` SET `is_param_5`=:value WHERE is_delete=0 && id=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":value", $value, PDO::PARAM_INT, 1);
        $query->execute();
    }

    /**
     * Уменьшает кол-во продуктов на складе на 1-ку
     * @param <type> $product_id
     * @return <type>
     */
    public function WarehouseMinus($mod_id) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE product_mod SET `warehouse` = warehouse-1 WHERE id=:id LIMIT 1");
        $query->bindParam(":id", $mod_id, PDO::PARAM_INT, 11);
        return $query->execute();
    }

    /**
     * Уменьшает кол-во продуктов на складе на 1-ку
     * @param <type> $product_id
     * @return <type>
     */
    public function WarehousePlus($mod_id) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("UPDATE product_mod SET `warehouse` = warehouse+1 WHERE id=:id LIMIT 1");
        $query->bindParam(":id", $mod_id, PDO::PARAM_INT, 11);
        return $query->execute();
    }

    public function edit($product_id, $name, $code, $unit, $short_desc, $desc, $title, $meta_keyword, $meta_desc, $category_1_id, $category_2_id, $category_3_id, $category_4_id, $category_5_id, $pseudo_dir, $brand_id, $marker, $is_active, $desc_1 = null, $desc_2 = null, $desc_3 = null, $desc_4 = null, $desc_5 = null, $desc_6 = null, $desc_7 = null, $desc_8 = null) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');
        $cac->deleteTag('Category');

        $query = $registry->db->prepare("UPDATE products SET `change`=NOW(), `desc_6`=:desc_6, `desc_7`=:desc_7, `desc_8`=:desc_8, `unit`=:unit, `marker` =:marker, `name`=:name, `pseudo_dir` = TRIM(:pseudo_dir), `code`=:code, `short_desc`=:short_desc, `desc`=:desc, `desc_1`=:desc_1, `desc_2`=:desc_2, `desc_3`=:desc_3, `desc_4`=:desc_4, `desc_5`=:desc_5, `title`=:title, `meta_keyword`=:meta_keyword, `meta_desc`=:meta_desc, `category_1_id`=:category_1_id, `category_2_id`=:category_2_id, `category_3_id`=:category_3_id, `category_4_id`=:category_4_id, `category_5_id`=:category_5_id, `brand_id`=:brand_id,  `is_active`=:is_active WHERE id=:product_id && products.is_delete = 0  LIMIT 1");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":code", $code, PDO::PARAM_INT, 11);
        $query->bindParam(":unit", $unit, PDO::PARAM_STR, 255);
        $query->bindParam(":short_desc", $short_desc, PDO::PARAM_STR);
        $query->bindParam(":desc", $desc, PDO::PARAM_STR);
        $query->bindParam(":desc_1", $desc_1, PDO::PARAM_STR);
        $query->bindParam(":desc_2", $desc_2, PDO::PARAM_STR);
        $query->bindParam(":desc_3", $desc_3, PDO::PARAM_STR);
        $query->bindParam(":desc_4", $desc_4, PDO::PARAM_STR);
        $query->bindParam(":desc_5", $desc_5, PDO::PARAM_STR);
        $query->bindParam(":desc_6", $desc_6, PDO::PARAM_STR);
        $query->bindParam(":desc_7", $desc_7, PDO::PARAM_STR);
        $query->bindParam(":desc_8", $desc_8, PDO::PARAM_STR);
        $query->bindParam(":title", $title, PDO::PARAM_STR, 255);
        $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);
        $query->bindParam(":meta_keyword", $meta_keyword, PDO::PARAM_STR);
        $query->bindParam(":meta_desc", $meta_desc, PDO::PARAM_STR);
        $query->bindParam(":category_1_id", $category_1_id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_2_id", $category_2_id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_3_id", $category_3_id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_4_id", $category_4_id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_5_id", $category_5_id, PDO::PARAM_INT, 11);
        $query->bindParam(":brand_id", $brand_id, PDO::PARAM_INT, 11);
        $query->bindParam(":marker", $marker, PDO::PARAM_INT, 11);
        $query->bindParam(":is_active", $is_active, PDO::PARAM_BOOL);
        $return = $query->execute();
        return $return;
    }

    public function setSort($field, $order) {
        switch (trim($field)) {
            case 'name':
                $this->_sort_field = 'products.`name`';
                break;
            case 'created':
                $this->_sort_field = 'products.`created`';
                break;
            case 'price':
                $this->_sort_field = 'product_mod.`price`';
                break;
            case 'old_price': //По проценту скидки
                $this->_sort_field = '(100 - (product_mod.`price`*100)/product_mod.`old_price`)/100';
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

    /**
     * Возвращает кол-во выбраныз строк из последнего запроса
     */
    public function getLastCountQuery() {
        $registry = Registry::getInstance();
        $count = $registry->db->query("SELECT FOUND_ROWS() as count");
        $return = $count->fetch(PDO::FETCH_OBJ);
        return $return->count;
    }

    /**
     * Возвращает все продукты независимо от категории
     * @param <type> $category_id
     * @param <type> $is_warehouse
     * @param <type> $is_active
     * @return <type>
     */
    public function getProductsAll($is_warehouse, $is_active, $offset = 0, $limit = 10, $shop_id = -1) {
        if (!empty($this->_sort_field) && !empty($this->_sort_order)) {
            $order = " ORDER BY $this->_sort_field $this->_sort_order";
        } else
            $order = null;
//(SELECT COUNT(*) FROM related WHERE products.id = related_id) = 0 && (is_active = 1 || :is_active = 0) &&
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Products-getProductsAll-' . $is_warehouse . '-' . $is_active . '-' . $offset . '-' . $limit . $order, 'Products');

        if (empty($get_cache)) {

            $query = $registry->db->prepare("SELECT products.*, 
                 MIN(product_mod.price) as price, 
                 MAX(product_mod.price) as max_price
                
		FROM products INNER JOIN product_mod
                
                ON (product_mod.is_delete=0 && product_mod.is_delete=0 && (is_active = 1 || :is_active = 0) && product_mod.product_id = products.id && (product_mod.warehouse > 0 || :is_warehouse = 0) &&
                
                
                 products.is_delete = 0 && (products.shop_id=:shop_id || :shop_id = -1)) GROUP BY products.id 
                $order LIMIT :limit OFFSET :offset");
            $query->bindParam(":is_warehouse", $is_warehouse, PDO::PARAM_BOOL);
            $query->bindParam(":is_active", $is_active, PDO::PARAM_BOOL);
            $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query->bindParam(":limit", $limit, PDO::PARAM_INT, 11);
            $query->bindParam(":offset", $offset, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            $cache->setTags('Products-getProductsAll-' . $is_warehouse . '-' . $is_active . '-' . $offset . '-' . $limit . $order, $return, 'Products');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Возвращает все продукты категории, где индекс это и есть id-категории
     * Используется в яндекс маркете
     * @return <type>
     */
    public function getProductsCatgoryIndex($is_warehouse, $shop_id = -1) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT
		products.* 
		FROM products INNER JOIN product_mod ON 
                (product_mod.product_id = products.id && product_mod.is_delete = 0 && (products.shop_id = :shop_id || :shop_id = -1) && 
            (is_active = 1) && (warehouse > 0 || :is_warehouse = 0) &&  products.is_delete = 0)");
        $query->bindParam(":is_warehouse", $is_warehouse, PDO::PARAM_BOOL);
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();
        foreach ($return as $value) {
            $result[$value->category_1_id][] = $value;
        }
        return $result;
    }

    /**
     * Стоит заплатка для girl-shop, не выводит сопутствующие товары
     * Возвращает все продукты определенной категории
     * @param <type> $category_id
     * @param <type> $is_warehouse
     * @param <type> $is_active
     * @return <type>
     */
    //(SELECT COUNT(*) FROM related WHERE products.id = related_id) = 0 &&
    public function getProducts($category_id, $is_warehouse, $is_active, $offset = 0, $limit = 10) {
        $order = null;
        if (!empty($this->_sort_field) && !empty($this->_sort_order)) {
            $order = " ORDER BY $this->_sort_field $this->_sort_order, products.id ASC";
        }
        $registry = Registry::getInstance();


        $cache = Cache::getInstance();
        $get_cache = $cache->get('Products-getProducts-' . $category_id . '-' . $is_warehouse . '-' . $is_active . '-' . $offset . '-' . $limit . $order, 'Products');

        if (empty($get_cache)) {

            $query = $registry->db->prepare("SELECT
		SQL_CALC_FOUND_ROWS products.*, products.*, 
                 MIN(product_mod.price) as price, 
                 MAX(product_mod.price) as max_price,
                 product_mod.price_1, 
                 product_mod.price_2, 
                 product_mod.price_3, 
                 product_mod.price_4, 
                 product_mod.price_5, 
                 product_mod.price_6, 
                 product_mod.price_7, 
                 product_mod.price_8, 
                 product_mod.price_9, 
                 product_mod.price_10, 
                product_mod.warehouse,
                product_mod.id as mod_id, 
                (SELECT name FROM brands WHERE id = products.brand_id && is_delete=0 LIMIT 1) as brand_name
		FROM products INNER JOIN product_mod
                
                ON (product_mod.is_delete=0 && product_mod.product_id = products.id && (product_mod.warehouse > 0 || :is_warehouse = 0) &&
                 (is_active = 1 || :is_active = 0) &&
                (products.category_1_id=:category_id || products.category_2_id=:category_id || products.category_3_id=:category_id || products.category_4_id=:category_id || products.category_5_id=:category_id) && products.is_delete = 0)
                GROUP BY products.id $order LIMIT :limit OFFSET :offset
                ");
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->bindParam(":is_warehouse", $is_warehouse, PDO::PARAM_BOOL);
            $query->bindParam(":is_active", $is_active, PDO::PARAM_BOOL);
            $query->bindParam(":limit", $limit, PDO::PARAM_INT, 11);
            $query->bindParam(":offset", $offset, PDO::PARAM_INT, 11);
            $query->execute();

            $return = array('result' => $query->fetchAll(PDO::FETCH_OBJ), 'count' => $this->getLastCountQuery());

            $cache->setTags('Products-getProducts-' . $category_id . '-' . $is_warehouse . '-' . $is_active . '-' . $offset . '-' . $limit . $order, $return, 'Products');
            return $return;
        } else {
            return $get_cache;
        }
    }

    private $_param_char_value_id = 0;

    public function setProductsParamCharValueId($char_value_id) {
        $this->_param_char_value_id = $char_value_id;
    }

    public function getProductsParam($param_id, $category_id = 0, $limit = 20, $offset = 0, $shop_id = 0) {
        //Тут не актуально, сортировка делается админом
//        if (!empty($this->_sort_field) && !empty($this->_sort_order)) {
//            $order = " ORDER BY $this->_sort_field $this->_sort_order, products.id ASC";
//        } else
//            $order = null;
        $registry = Registry::getInstance();
        $order = null;
        $cacheModule = unserialize(CacheModule::getCacheModule('products-getProductsParam-' . md5($order . '-' . $this->_param_char_value_id . $param_id . '-' . $category_id . '-' . $limit . '-' . $offset . '-' . $shop_id), false)); //Из-за ограничения мемкеша в 1мб
        if ($cacheModule !== false) {
            $return = ($cacheModule);
            return $return;
        } else {

            $where = '1';
            if ($category_id > 0) {
                $where = null;
                Lavra_Loader::LoadClass('ApplicationDB');
                $app = new ApplicationDB();
                $cat_arr = ($app->getChildsCategory(0, $category_id));

                if (count($cat_arr)) {
                    foreach ($cat_arr as $key => $value) {
                        $where .= ' || products.category_1_id=' . $key;
                    }
                    $where = trim($where, ' |');
                }
            }
            $where_char = null;
            if ($this->_param_char_value_id > 0) {
                $where_char = '&& (SELECT COUNT(*) FROM characteristic_products WHERE product_id = products.id && characteristic_value_id=' . (int) $this->_param_char_value_id . ') ';
            }

//            $cache = Cache::getInstance();
//            $get_cache = $cache->get('Products-getProductsParam-' . md5($where . $param_id . '-' . $category_id . '-' . $limit . '-' . $offset . '-' . $shop_id), 'Products');
//
//            if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT
		SQL_CALC_FOUND_ROWS *, products.*, 
                 MIN(product_mod.price) as price, 
                 MAX(product_mod.price) as max_price,
                product_mod.warehouse,
                product_mod.id as mod_id, 
                (SELECT name FROM brands WHERE id = products.brand_id && is_delete=0 LIMIT 1) as brand_name,
                
                (SELECT file FROM products_images WHERE product_id = products.id && `type`=3 && is_delete = 0 ORDER BY `order` ASC LIMIT 1) as file
		FROM products INNER JOIN product_mod
                
                ON (is_param_$param_id = 1 && product_mod.is_delete=0 && product_mod.product_id = products.id && (product_mod.warehouse > 0) &&
                 (is_active = 1) &&
               (products.shop_id=:shop_id || products.shop_id=0) && 
                (:category_id = 0 || ($where)) && products.is_delete = 0 $where_char)
                GROUP BY products.id 
                ORDER BY (SELECT `order` FROM product_param_sort WHERE product_param_sort.product_id = products.id && param_type=$param_id ) ASC LIMIT :limit OFFSET :offset
                ");

            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->bindParam(":limit", $limit, PDO::PARAM_INT, 11);
            $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query->bindParam(":offset", $offset, PDO::PARAM_INT, 11);
            $query->execute();

            $return = array('result' => $query->fetchAll(PDO::FETCH_OBJ), 'count' => $this->getLastCountQuery());
//print_r($return);

            CacheModule::setCacheModule('products-getProductsParam-' . md5($order . '-' . $this->_param_char_value_id . $param_id . '-' . $category_id . '-' . $limit . '-' . $offset . '-' . $shop_id), serialize($return), false);
//                $cache->setTags('Products-getProductsParam-' . md5($where . $param_id . '-' . $category_id . '-' . $limit . '-' . $offset . '-' . $shop_id), serialize($return), 'Products');
            return $return;
//            } else {
//                return unserialize($get_cache);
//            }
        }
    }

    /**
     * Подгрузка 5 цен для продукта (мин. и макс), используется в B2B
     * 
     */
    public function getProductPrice($product_id) {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Products-getProductPrice-' . $product_id, 'Products');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT
                 MIN(product_mod.price) as price, 
                 MAX(product_mod.price) as max_price, 
                 MIN(product_mod.price_1) as price_1, 
                 MAX(product_mod.price_1) as max_price_1, 
                 MIN(product_mod.price_2) as price_2, 
                 MAX(product_mod.price_2) as max_price_2, 
                 MIN(product_mod.price_3) as price_3, 
                 MAX(product_mod.price_3) as max_price_3, 
                 MIN(product_mod.price_4) as price_4, 
                 MAX(product_mod.price_4) as max_price_4,  
                 MIN(product_mod.price_5) as price_5, 
                 MAX(product_mod.price_5) as max_price_5,  
                 MIN(product_mod.price_6) as price_6, 
                 MAX(product_mod.price_6) as max_price_6,  
                 MIN(product_mod.price_7) as price_7, 
                 MAX(product_mod.price_7) as max_price_7,  
                 MIN(product_mod.price_8) as price_8, 
                 MAX(product_mod.price_8) as max_price_8,  
                 MIN(product_mod.price_9) as price_9, 
                 MAX(product_mod.price_9) as max_price_9,  
                 MIN(product_mod.price_10) as price_10, 
                 MAX(product_mod.price_10) as max_price_10,  
                 currency_id
		FROM products INNER JOIN product_mod
                
                ON (product_mod.is_delete=0 && product_mod.is_delete = 0 && product_mod.product_id = products.id &&  products.id=:product_id && products.is_delete = 0)
                GROUP BY products.id  
                ");
            $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);

            $cache->setTags('Products-getProductPrice-' . $product_id, $return, 'Products');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getPrpductIdAll($product_id) {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Products-getPrpductId-' . $product_id, 'Products');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT products.*, product_mod.price, 
                 product_mod.article, 
                 product_mod.id as mod_id, 
            (SELECT file FROM products_images WHERE product_id = products.id && `type`=5 && is_delete = 0 LIMIT 1) as file  FROM products 
            INNER JOIN product_mod ON 
            (product_mod.product_id = products.id && 
            product_mod.is_delete = 0  && 
            products.is_delete = 0  && products.id=:product_id) LIMIT 1");
            $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);
            $cache->setTags('Products-getPrpductId-' . $product_id, $return, 'Products');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Подбор по категории и значению характеристикам 
     */
    public function getProductCharValue($category_id, $char_id, $product_id) {
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
                product_mod.price, product_mod.id  as mod_id, 
                (SELECT file FROM products_images WHERE product_id = products.id && `type`=2 && is_delete = 0 LIMIT 1) as file
                
		FROM products INNER JOIN product_mod ON 
                
(product_mod.product_id = products.id && product_mod.is_delete = 0 && product_mod.warehouse > 0 && products.id != :product_id && products.is_active = 1 && products.is_delete = 0 && 
($where products.category_1_id = :category_id || products.category_2_id = :category_id || products.category_3_id = :category_id || :category_id = 0))
          INNER JOIN  characteristic_products 
          ON (characteristic_products.product_id = products.id && characteristic_value_id IN (SELECT characteristic_value_id FROM characteristic_products WHERE product_id=:product_id && characteristic_id=:char_id)) 
GROUP BY products.id
                
                 ");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":char_id", $char_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
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
     * Возвращает все продукты множества категорий
     * @param <type> $category_id
     * @param <type> $is_warehouse
     * @param <type> $is_active
     * @return <type>
     */
    public function getPrpductsCategoryes(Array $categoryes_id, $is_warehouse, $is_active, $offset = 0, $limit = 10, $shop_id = 0) {
        $order = null;

        $where_char = $this->_getProductsCategoryesCharValue();
        if (!empty($this->_sort_field) && !empty($this->_sort_order)) {
            $order = " ORDER BY $this->_sort_field $this->_sort_order";
        }
        $cacheModule = unserialize(CacheModule::getCacheModule('products-getPrpductsCategoryes-' . md5(serialize($categoryes_id) . '-' . ($where_char) . '-' . $order . '-' . $is_warehouse . '-' . $is_active . '-' . $offset . '-' . $limit . '-' . $shop_id), false)); //Из-за ограничения мемкеша в 1мб
        if ($cacheModule !== false) {
            $return = ($cacheModule);
            return $return;
        } else {


            $where = null;
            foreach ($categoryes_id as $key => $category_id) {
                $where .= "(products.category_1_id=$category_id || products.category_2_id=$category_id || products.category_3_id=$category_id || products.category_4_id=$category_id || products.category_5_id=$category_id || products.category_6_id=$category_id || products.category_7_id=$category_id || products.category_8_id=$category_id || products.category_9_id=$category_id) || ";
            }
            if (!empty($where)) {
                $where = "(" . trim($where, "| ") . ")";
            } else
                return false;

            $registry = Registry::getInstance();

//        $cache = Cache::getInstance();
//        $get_cache = $cache->get('Products-getPrpductsCategoryes-' . $where_char . '-' . $where . $order . '-' . $is_warehouse . '-' . $is_active . '-' . $offset . '-' . $limit . '-' . $shop_id, 'Products');
//        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT
		SQL_CALC_FOUND_ROWS *, product_mod.*, products.* , 
                 MIN(product_mod.price) as price, 
                 MAX(product_mod.price) as max_price,
                product_mod.warehouse,
                product_mod.id as mod_id, 
                (SELECT file FROM products_images WHERE product_id = products.id && `type`=3 && is_delete = 0 LIMIT 1) as file, 
                (SELECT name FROM brands WHERE id = products.brand_id && is_delete=0 LIMIT 1) as brand_name
                
		FROM products INNER JOIN product_mod
                
                ON (price>0 && product_mod.is_delete=0 && product_mod.product_id = products.id && (product_mod.warehouse > 0 || :is_warehouse = 0) && product_mod.price > 0 && 
                 (is_active = 1 || :is_active = 0) && products.category_1_id != 0 &&
                 
                 
                $where && products.is_delete = 0 $where_char )
                GROUP BY products.id $order LIMIT :limit OFFSET :offset
                ");
//        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->bindParam(":is_warehouse", $is_warehouse, PDO::PARAM_BOOL);
            $query->bindParam(":is_active", $is_active, PDO::PARAM_BOOL);
            $query->bindParam(":limit", $limit, PDO::PARAM_INT, 11);
            $query->bindParam(":offset", $offset, PDO::PARAM_INT, 11);
            $query->execute();
            $return = array('result' => $this->withChars($query->fetchAll(PDO::FETCH_OBJ)), 'count' => $this->getLastCountQuery());

//            $cache->setTags('Products-getPrpductsCategoryes-' . $where_char . '-' . $where . $order . '-' . $is_warehouse . '-' . $is_active . '-' . $offset . '-' . $limit . '-' . $shop_id, $return, 'Products');

            CacheModule::setCacheModule('products-getPrpductsCategoryes-' . md5(serialize($categoryes_id) . '-' . ($where_char) . '-' . $order . '-' . $is_warehouse . '-' . $is_active . '-' . $offset . '-' . $limit . '-' . $shop_id), serialize($return), false);
            return $return;
//        } else {
//            return $get_cache;
//        }
        }
    }

    /**
     * Возвращает товары с определенными характеристиками
     * @param array $categoryes_id
     * @param type $is_warehouse
     * @param type $is_active
     * @param type $offset
     * @param type $limit
     * @return boolean
     */
    private $_productsLikeCharacteristicCategoryId = array();
    private $_productsLikeCharacteristicNotCategoryId = array();

    /**
     * getProductsLikeCharacteristic - будет искать товар в этой категории
     */
    public function addProductsLikeCharacteristicCategoryId($category_id) {
        if (is_array($category_id)) {
            foreach ($category_id as $key => $value) {
                $this->_productsLikeCharacteristicCategoryId[] = $value;
            }
        } else {
            $this->_productsLikeCharacteristicCategoryId[] = $category_id;
        }
    }

    /**
     * Не будет учитывать эту категорию при поиске
     */
    public function addProductsLikeCharacteristicNotCategoryId($category_id) {
        if (is_array($category_id)) {
            foreach ($category_id as $key => $value) {
                $this->_productsLikeCharacteristicNotCategoryId[] = $value;
            }
        } else {
            $this->_productsLikeCharacteristicNotCategoryId[] = $category_id;
        }
    }

    /**
     * Ищет товары по категории и char_value
     */
    public function getProductsCategoryChar($categoryes_id, $char_1 = 0, $char_2 = 0, $char_3 = 0, $char_4 = 0, $char_5 = 0, $limit = 20) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();

        $where = null;
        foreach ($categoryes_id as $key => $category_id) {
            $where .= "(products.category_1_id=$category_id || products.category_2_id=$category_id || products.category_3_id=$category_id || products.category_4_id=$category_id || products.category_5_id=$category_id) || ";
        }
        if (!empty($where)) {
            $where = "(" . trim($where, "| ") . ")";
        } else
            return false;

        $get_cache = $cache->get('Products-getProductsCategoryChar-' . $category_id . '-' . $char_1 . '-' . $char_2 . '-' . $char_3 . '-' . $char_4 . '-' . $char_5 . '-' . $limit, 'Products');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT
		 products.*, MIN(product_mod.price) as price, MAX(product_mod.price) as max_price, product_mod.warehouse, product_mod.id as mod_id, product_mod.article, 
                (SELECT file FROM products_images WHERE product_id = products.id && `type`=3 && is_delete = 0 LIMIT 1) as file
		FROM products INNER JOIN product_mod
                ON (product_mod.is_delete=0 && product_mod.product_id = products.id && (product_mod.warehouse > 0) && (is_active = 1) && products.is_delete = 0 
&& ((SELECT COUNT(*) FROM characteristic_products WHERE characteristic_value_id = :char_1 && product_id = products.id)  || :char_1 = 0)
&& ((SELECT COUNT(*) FROM characteristic_products WHERE characteristic_value_id = :char_2 && product_id = products.id)  || :char_2 = 0)
&& ((SELECT COUNT(*) FROM characteristic_products WHERE characteristic_value_id = :char_3 && product_id = products.id)  || :char_3 = 0)
&& ((SELECT COUNT(*) FROM characteristic_products WHERE characteristic_value_id = :char_4 && product_id = products.id)  || :char_4 = 0)
&& ((SELECT COUNT(*) FROM characteristic_products WHERE characteristic_value_id = :char_5 && product_id = products.id)  || :char_5 = 0) && 
$where
)
                GROUP BY products.id  LIMIT :limit
                ");
            $query->bindParam(":char_1", $char_1, PDO::PARAM_INT, 11);
            $query->bindParam(":char_2", $char_2, PDO::PARAM_INT, 11);
            $query->bindParam(":char_3", $char_3, PDO::PARAM_INT, 11);
            $query->bindParam(":char_4", $char_4, PDO::PARAM_INT, 11);
            $query->bindParam(":char_5", $char_5, PDO::PARAM_INT, 11);
            $query->bindParam(":limit", $limit, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);
            $cache->setTags('Products-getProductsCategoryChar-' . $category_id . '-' . $char_1 . '-' . $char_2 . '-' . $char_3 . '-' . $char_4 . '-' . $char_5 . '-' . $limit, $return, 'Products');
//            if (count($return) < 5) { //Если найдено мало товаров, упрощаем условия поиска
//                if ($char_5 > 0) {
//                    $char_5 = 0;
//                    $return = $this->getProductsLikeCharacteristic((int) $char_1, (int) $char_2, (int) $char_3, (int) $char_4, (int) $char_5, (int) $limit);
//                } elseif ($char_4 > 0) {
//                    $char_4 = 0;
//                    $return = $this->getProductsLikeCharacteristic((int) $char_1, (int) $char_2, (int) $char_3, (int) $char_4, (int) $char_5, (int) $limit);
//                } elseif ($char_3 > 0) {
//                    $char_3 = 0;
//                    $return = $this->getProductsLikeCharacteristic((int) $char_1, (int) $char_2, (int) $char_3, (int) $char_4, (int) $char_5, (int) $limit);
//                } elseif ($char_2 > 0) {
//                    $char_2 = 0;
//                    $return = $this->getProductsLikeCharacteristic((int) $char_1, (int) $char_2, (int) $char_3, (int) $char_4, (int) $char_5, (int) $limit);
//                }
//            }
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getProductsLikeCharacteristic($char_1 = 0, $char_2 = 0, $char_3 = 0, $char_4 = 0, $char_5 = 0, $limit = 20) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Products-getProductsLikeCharacteristic-' . serialize($this->_productsLikeCharacteristicNotCategoryId) . '-' . serialize($this->_productsLikeCharacteristicCategoryId) . '-' . $char_1 . '-' . $char_2 . '-' . $char_3 . '-' . $char_4 . '-' . $char_5 . '-' . $limit, 'Products');

        /**
         * Товары из этой категории
         */
        $where_category = null;
        foreach ($this->_productsLikeCharacteristicCategoryId as $category_id) {
            $where_category .= "products.category_1_id = $category_id || ";
        }
        if (!is_null($where_category)) {
            $where_category = " && (" . trim($where_category, '| ') . ")";
            $this->_productsLikeCharacteristicCategoryId = array();
        }
        /**
         * Исключить категории
         */
        $where_not_category = null;
        foreach ($this->_productsLikeCharacteristicNotCategoryId as $category_id) {
            $where_not_category .= "products.category_1_id != $category_id && ";
            $this->_productsLikeCharacteristicNotCategoryId = array();
        }
        if (!is_null($where_not_category)) {
            $where_not_category = " && (" . trim($where_not_category, '& ') . ")";
        }

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT
		 products.*, MIN(product_mod.price) as price, MAX(product_mod.price) as max_price, product_mod.warehouse, product_mod.id as mod_id, 
                (SELECT file FROM products_images WHERE product_id = products.id && `type`=3 && is_delete = 0 ORDER BY `order` ASC, id ASC LIMIT 1) as file
		FROM products INNER JOIN product_mod
                ON (product_mod.is_delete=0 && product_mod.product_id = products.id && (product_mod.warehouse > 0) && (is_active = 1) && products.is_delete = 0 $where_category $where_not_category 
&& ((SELECT COUNT(*) FROM characteristic_products WHERE characteristic_value_id = :char_1 && product_id = products.id)  || :char_1 = 0)
&& ((SELECT COUNT(*) FROM characteristic_products WHERE characteristic_value_id = :char_2 && product_id = products.id)  || :char_2 = 0)
&& ((SELECT COUNT(*) FROM characteristic_products WHERE characteristic_value_id = :char_3 && product_id = products.id)  || :char_3 = 0)
&& ((SELECT COUNT(*) FROM characteristic_products WHERE characteristic_value_id = :char_4 && product_id = products.id)  || :char_4 = 0)
&& ((SELECT COUNT(*) FROM characteristic_products WHERE characteristic_value_id = :char_5 && product_id = products.id)  || :char_5 = 0)
)

                
                GROUP BY products.id  LIMIT :limit
                ");
            $query->bindParam(":char_1", $char_1, PDO::PARAM_INT, 11);
            $query->bindParam(":char_2", $char_2, PDO::PARAM_INT, 11);
            $query->bindParam(":char_3", $char_3, PDO::PARAM_INT, 11);
            $query->bindParam(":char_4", $char_4, PDO::PARAM_INT, 11);
            $query->bindParam(":char_5", $char_5, PDO::PARAM_INT, 11);
            $query->bindParam(":limit", $limit, PDO::PARAM_INT, 11);
            $query->execute();

            $return = $query->fetchAll(PDO::FETCH_OBJ);
            $cache->setTags('Products-getProductsLikeCharacteristic-' . serialize($this->_productsLikeCharacteristicNotCategoryId) . '-' . serialize($this->_productsLikeCharacteristicCategoryId) . '-' . $char_1 . '-' . $char_2 . '-' . $char_3 . '-' . $char_4 . '-' . $char_5 . '-' . $limit, $return, 'Products');
//            if (count($return) < 5) { //Если найдено мало товаров, упрощаем условия поиска
//                if ($char_5 > 0) {
//                    $char_5 = 0;
//                    $return = $this->getProductsLikeCharacteristic((int) $char_1, (int) $char_2, (int) $char_3, (int) $char_4, (int) $char_5, (int) $limit);
//                } elseif ($char_4 > 0) {
//                    $char_4 = 0;
//                    $return = $this->getProductsLikeCharacteristic((int) $char_1, (int) $char_2, (int) $char_3, (int) $char_4, (int) $char_5, (int) $limit);
//                } elseif ($char_3 > 0) {
//                    $char_3 = 0;
//                    $return = $this->getProductsLikeCharacteristic((int) $char_1, (int) $char_2, (int) $char_3, (int) $char_4, (int) $char_5, (int) $limit);
//                } elseif ($char_2 > 0) {
//                    $char_2 = 0;
//                    $return = $this->getProductsLikeCharacteristic((int) $char_1, (int) $char_2, (int) $char_3, (int) $char_4, (int) $char_5, (int) $limit);
//                }
//            }
            return $return;
        } else {
            return $get_cache;
        }
    }

    private $_admin_search_product = null;

    public function getAdminProducts($category_id = -1, $is_warehouse = -1, $is_active = -1, $offset = 0, $limit = 500000, $shop_id = 0) {
        $order = null;
        if ($this->_search_is_all_category == 1) {
            $category_id = -1;
        }
        if (!empty($this->_sort_field) && !empty($this->_sort_order)) {
            $order = " ORDER BY $this->_sort_field $this->_sort_order, id ASC";
        }
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Products-getAdminProducts-' . $category_id . $this->_admin_search_product . '-' . $order . '-' . $is_warehouse . '-' . $is_active . '-' . $offset . '-' . $limit . '-' . $shop_id, 'Products');

        if (empty($get_cache)) {
//|| products.category_2_id=:category_id || products.category_3_id=:category_id || products.category_4_id=:category_id || products.category_5_id=:category_id
            $query = $registry->db->prepare("SELECT SQL_CALC_FOUND_ROWS products.*, products.*, 
                (SELECT file FROM products_images WHERE product_id = products.id && `type`=1 && is_delete = 0  ORDER BY `order` ASC, `id` ASC LIMIT 1) as file,
                (SELECT COUNT(*) FROM products_images WHERE product_id = products.id && `type`=1 && is_delete = 0 LIMIT 1) as count_file, 
                (SELECT id FROM related WHERE related_id = products.id LIMIT 1) as is_related,
                (SELECT id FROM related WHERE product_id = products.id LIMIT 1) as is_related_product, 
                 MIN(product_mod.price) as price, 
                 MAX(product_mod.price) as max_price,
                 product_mod.old_price,
                 MIN(product_mod.warehouse) as warehouse,
                 (product_mod.article) as article
                
		FROM products INNER JOIN product_mod                
                ON (product_mod.is_delete=0 $this->_admin_search_product && product_mod.product_id = products.id && (shop_id=:shop_id || shop_id=0) && (product_mod.warehouse = :is_warehouse && :is_warehouse = 0 || product_mod.warehouse >= :is_warehouse && :is_warehouse != 0 || :is_warehouse = -1) && 
                
                
                 (is_active = :is_active || :is_active = -1) && (products.category_1_id=:category_id || :category_id = -1) && products.is_delete = 0)  GROUP BY products.id  $order  LIMIT :limit OFFSET :offset");
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->bindParam(":is_warehouse", $is_warehouse, PDO::PARAM_INT, 11);
            $query->bindParam(":is_active", $is_active, PDO::PARAM_INT, 11);
            $query->bindParam(":limit", $limit, PDO::PARAM_INT, 11);
            $query->bindParam(":offset", $offset, PDO::PARAM_INT, 11);
            $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = array('result' => $query->fetchAll(PDO::FETCH_OBJ), 'count' => $this->getLastCountQuery());
            $cache->setTags('Products-getAdminProducts-' . $category_id . $this->_admin_search_product . '-' . $order . '-' . $is_warehouse . '-' . $is_active . '-' . $offset . '-' . $limit . '-' . $shop_id, $return, 'Products');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Устанавливает поиск продукты
     */
    public function setAdminSearchProduct($search) {
        $search = addslashes($search);
        $this->_admin_search_product = "&& (products.name LIKE '%$search%' || product_mod.article LIKE '%$search%')";
    }

    private $_search_is_all_category = 0;

    /**
     * Поиск во всех категориях?
     * @param type $is_all
     */
    public function setAdminSearchIsAllCategory($is_all) {
        $this->_search_is_all_category = $is_all;
    }

    /**
     * Стоит заплатка для girl-shop, не выводит сопутствующие товары
     * Возвращает все продукты определенной категории
     * @param <type> $category_id
     * @param <type> $is_warehouse
     * @param <type> $is_active
     * @return <type>
     */
    //(SELECT COUNT(*) FROM related WHERE products.id = related_id) = 0 &&
    public function getPrpductsBrand($brand_id = 0, $offset = 0, $limit = 10) {
        if (!empty($this->_sort_field) && !empty($this->_sort_order)) {
            $order = " ORDER BY $this->_sort_field $this->_sort_order";
        } else {
            $order = null;
        }
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Products-getPrpductsBrand-' . $brand_id . $offset . $limit . $order, 'Products');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT SQL_CALC_FOUND_ROWS *, product_mod.*, products.*, product_mod.id as mod_id, product_mod.warehouse,
		products.id, brands.name as brand_name, product_mod.article
		FROM products 
                INNER JOIN product_mod ON 
            (product_mod.product_id = products.id && product_mod.price > 0 && 
            product_mod.is_delete = 0 && 
            products.is_delete = 0)
                
                INNER JOIN brands ON
                (products.category_1_id != 0 && 
                products.brand_id = brands.id && brands.id = :brand_id && products.is_active = 1 && products.is_delete = 0 && brands.is_delete = 0 && brands.is_visible = 1) GROUP BY products.id $order  LIMIT :limit OFFSET :offset");
            $query->bindParam(":brand_id", $brand_id, PDO::PARAM_INT, 11);
            $query->bindParam(":limit", $limit, PDO::PARAM_INT, 11);
            $query->bindParam(":offset", $offset, PDO::PARAM_INT, 11);
            $query->execute();
//            $return = $query->fetchAll(PDO::FETCH_OBJ);
            $return = array('result' => $this->withChars($query->fetchAll(PDO::FETCH_OBJ)), 'count' => $this->getLastCountQuery());
            $cache->setTags('Products-getPrpductsBrand-' . $brand_id . $offset . $limit . $order, $return, 'Products');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getPrpductId($product_id) {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Products-getPrpductId-' . $product_id, 'Products');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT products.*, product_mod.price, product_mod.old_price, 
                 product_mod.article, 
                 product_mod.id as mod_id, product_mod.warehouse,
                 product_mod.name as mod_name,
                (SELECT name FROM brands WHERE id = products.brand_id && is_delete=0 LIMIT 1) as brand_name,
                (SELECT name FROM category WHERE category_1_id = category.id && is_delete=0 LIMIT 1) as category_name,
            (SELECT file FROM products_images WHERE product_id = products.id && `type`=5 && is_delete = 0 ORDER BY `order` ASC LIMIT 1) as file  FROM products 
            INNER JOIN product_mod ON 
            (product_mod.product_id = products.id && 
            product_mod.is_delete = 0 && 
            products.is_delete = 0  && products.id=:product_id) LIMIT 1");
            $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);
            $cache->setTags('Products-getPrpductId-' . $product_id, $return, 'Products');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getProductArticle($article) {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Products-getProductArticle-' . $article, 'Products');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT products.*, product_mod.price, 
                 product_mod.article, 
                 product_mod.id as mod_id, 
            (SELECT file FROM products_images WHERE product_id = products.id && `type`=5 && is_delete = 0 LIMIT 1) as file  FROM products 
            INNER JOIN product_mod ON 
            (product_mod.product_id = products.id && 
            product_mod.is_delete = 0 && 
            products.is_delete = 0  && product_mod.article=:article) LIMIT 1");
            $query->bindParam(":article", $article, PDO::PARAM_STR, 255);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);
            $cache->setTags('Products-getProductArticle-' . $article, $return, 'Products');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /*
     * Получение продукта по псевдо папке
     */

    public function getPrpductDir($pseudo_dir) {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Products-getPrpductDir-' . $pseudo_dir, 'Products');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT products.*, 
                 MIN(product_mod.price) as price, 
                 MAX(product_mod.price) as max_price,
                 MIN(product_mod.warehouse) as warehouse,
                 product_mod.article, 
                 product_mod.id as mod_id, 
                (SELECT name FROM brands WHERE id = products.brand_id && is_delete=0 LIMIT 1) as brand_name,
                (SELECT name FROM category WHERE id = products.category_1_id && is_delete=0 LIMIT 1) as category_name,
                 
                (SELECT product_mod.price FROM product_mod WHERE products.id = product_mod.product_id && product_mod.is_delete =0 ORDER BY price ASC LIMIT 1) as price,
                (SELECT product_mod.old_price FROM product_mod WHERE products.id = product_mod.product_id && product_mod.is_delete =0 ORDER BY price ASC LIMIT 1) as old_price
                
		FROM products INNER JOIN product_mod                
                ON (product_mod.is_delete=0 && product_mod.product_id = products.id && 
                 (products.is_delete = 0  && products.pseudo_dir=:pseudo_dir)) GROUP BY products.id LIMIT 1");
            $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);
            $cache->setTags('Products-getPrpductDir-' . $pseudo_dir, $return, 'Products');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Возвращает случайные товары
     * @param <type> $limit
     * @return <type>
     * Нельзя кешировать случайные товары!!!
     */
    public function getRandomProducts($limit) {
        $limit = (int) $limit;
        if ($limit !== 0) {
            $registry = Registry::getInstance();
            $query = $registry->db->prepare("SELECT products.*,
                    (SELECT file FROM products_images WHERE product_id = products.id && `type`=1 && is_delete = 0 LIMIT 1) as file
                    FROM
            (SELECT id FROM products ORDER BY RAND() LIMIT $limit)
            AS product_rand INNER JOIN products
                ON (is_active = 1 && warehouse > 0 && products.is_delete = 0 && products.id = product_rand.id) LIMIT $limit");
            $query->execute();

            $return = $query->fetchAll(PDO::FETCH_OBJ);
            return $return;
        }
    }

//(SELECT COUNT(*) FROM related WHERE products.id = related_id) = 0 &&
    public function getNewsProducts($category_id, $limit = 10) {
        $limit = (int) $limit;
        if ($limit !== 0) {
            $registry = Registry::getInstance();
            $cache = Cache::getInstance();
            $get_cache = $cache->get('Products-getNewsProducts-' . $category_id . $limit, 'Products');

            if (empty($get_cache)) {
                $query = $registry->db->prepare("SELECT products.*,
                (SELECT id FROM products_images WHERE product_id = products.id && `type`=1 && is_delete = 0 ORDER BY `order` ASC LIMIT 1) as small_file_id,
                (SELECT file FROM products_images WHERE product_id = products.id && `type`=3 && is_delete = 0 ORDER BY `order` ASC LIMIT 1) as file
                FROM products
                WHERE 
                    
                    (((category_1_id = :category_id || category_2_id = :category_id || category_3_id = :category_id || category_4_id = :category_id || category_5_id = :category_id) || :category_id = 0) && is_active = 1 &&  products.is_delete = 0) ORDER BY created DESC LIMIT $limit");
                $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
                $query->execute();

                $return = $query->fetchAll(PDO::FETCH_OBJ);
                $cache->setTags('Products-getNewsProducts-' . $category_id . $limit, $return, 'Products');
                return $return;
            } else {
                return $get_cache;
            }
        }
    }

    /**
     * Топ продукции
     * @param <type> $category_id
     * @param <type> $limit
     * @return <type>
     */
    public function getTopProducts($category_id, $limit = 10) {

        $limit = (int) $limit;
        if ($limit !== 0) {
            $registry = Registry::getInstance();
            $cache = Cache::getInstance();
            $get_cache = $cache->get('Products-getTopProducts-' . $category_id . $limit, 'Products');

            if (empty($get_cache)) {
                $query = $registry->db->prepare("SELECT products.*, COUNT(*) as product_count,
                (SELECT id FROM products_images WHERE product_id = products.id && `type`=1 && is_delete = 0 LIMIT 1) as small_file_id,
                (SELECT file FROM products_images WHERE product_id = products.id && `type`=2 && is_delete = 0 LIMIT 1) as file,
                (SELECT file FROM products_images WHERE product_id = products.id && `type`=5 && is_delete = 0 LIMIT 1) as big_file
                FROM products
                 INNER JOIN order_products
                ON (
                    ((products.category_1_id = :category_id || products.category_2_id = :category_id || products.category_3_id = :category_id || products.category_4_id = :category_id || products.category_5_id = :category_id) || :category_id = 0) && products.is_active = 1 &&
                    products.id = order_products.product_id  && order_products.is_delete = 0 && products.is_delete = 0)
                INNER JOIN `order` ON (`order`.id = order_products.order_id && `order`.status_id = 3)
                GROUP BY order_products.product_id ORDER BY product_count DESC
                 LIMIT $limit");
                $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
                $query->execute();
                $return = $query->fetchAll(PDO::FETCH_OBJ);
                $cache->setTags('Products-getTopProducts-' . $category_id . $limit, $return, 'Products');
                return $return;
            } else {
                return $get_cache;
            }
        }
    }

    /**
     * Проверяет есть ли продукты без категорий
     */
    public function getProductNotCategory($shop_id = 0, $is_warehouse = -1, $is_active = -1, $offset = 0, $limit = 500000) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Prsoducts-getProductNotCategory-' . $offset . '-' . $limit . '-' . $shop_id, 'Products');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT SQL_CALC_FOUND_ROWS products.*, products.*,
                (SELECT file FROM products_images WHERE product_id = products.id && `type`=1 && is_delete = 0 ORDER BY `order` ASC, `id` ASC LIMIT 1) as file, 
                (SELECT COUNT(*) FROM products_images WHERE product_id = products.id && `type`=1 && is_delete = 0 LIMIT 1) as count_file, 
                 MIN(product_mod.price) as price, 
                 MAX(product_mod.price) as max_price,
                 (product_mod.article) as article,
                 MIN(product_mod.warehouse) as warehouse
                FROM products INNER JOIN product_mod  ON
                (product_mod.is_delete=0  && (product_mod.warehouse = :is_warehouse && :is_warehouse = 0 || product_mod.warehouse >= :is_warehouse && :is_warehouse != 0 || :is_warehouse = -1) && 
                
                
                 (is_active = :is_active || :is_active = -1) && 
                product_mod.product_id = products.id && (category_1_id = 0) && (shop_id = :shop_id || shop_id = 0) && product_mod.is_delete = 0 && products.is_delete = 0)  GROUP BY products.id LIMIT :limit OFFSET :offset");
//        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
            $query->bindParam(":limit", $limit, PDO::PARAM_INT, 11);
            $query->bindParam(":offset", $offset, PDO::PARAM_INT, 11);
            $query->bindParam(":is_warehouse", $is_warehouse, PDO::PARAM_INT, 11);
            $query->bindParam(":is_active", $is_active, PDO::PARAM_INT, 11);
            $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = array('result' => $query->fetchAll(PDO::FETCH_OBJ), 'count' => $this->getLastCountQuery());
            $cache->setTags('Prsoducts-getProductNotCategory-' . $offset . '-' . $limit . '-' . $shop_id, $return, 'Products');
            return $return;
        } else {
            return $get_cache;
        }
    }

//    SELECT products.*, offer.`id` as is_offer,
//                (SELECT file FROM products_images WHERE product_id = products.id && `type`=1 && is_delete = 0 LIMIT 1) as file,
//                (SELECT id FROM related WHERE related_id = products.id LIMIT 1) as is_related,
//                (SELECT id FROM related WHERE product_id = products.id LIMIT 1) as is_related_product, 
//                 MIN(product_mod.price) as price, 
//                 MAX(product_mod.price) as max_price,
//                 MIN(product_mod.warehouse) as warehouse
//                
//		FROM products INNER JOIN product_mod                
//                ON (product_mod.product_id = products.id && (product_mod.warehouse > 0 || :is_warehouse = 0) )

    /**
     * Проверяет активен товар или нет (например, возможно добавить товар в корзину, или нет)
     * @param <type> $product_id
     */
    public function isProduct($mod_id, $count) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Products-isProduct-' . $mod_id . $count, 'Products');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT COUNT(*) as count 
                
		FROM products INNER JOIN product_mod                
                ON (product_mod.is_delete=0 && product_mod.product_id = products.id && (product_mod.warehouse >= :count) && 
                
                products.is_delete = 0 && product_mod.id = :mod_id  && is_active = 1 )");
            $query->bindParam(":mod_id", $mod_id, PDO::PARAM_INT, 11);
            $query->bindParam(":count", $count, PDO::PARAM_INT, 11);
            $query->execute();
            if ($query->fetch(PDO::FETCH_OBJ)->count > 0) {
                $return = true;
            } else {
                $return = false;
            }
            $cache->setTags('Products-isProduct-' . $mod_id . $count, $return, 'Products');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getImages($product_id, $file_type = -1) {
        $registry = Registry::getInstance();


        $cacheModule = unserialize(CacheModule::getCacheModule('products-Products-getImages-' . (int) $product_id . '-' . $file_type, false)); //Из-за ограничения мемкеша в 1мб
        if ($cacheModule !== false) {
            $return = ($cacheModule);
            return $return;
        } else {

//        $cache = Cache::getInstance();
//        $get_cache = $cache->get('Products-getImages-' . (int) $product_id . '-' . $file_type, 'Products');
//        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT products_images.* FROM products_images WHERE product_id = :product_id && is_delete=0 && (:file_type=-1 || `file_type`=:file_type) ORDER BY `order` ASC, group_id,`type` ASC, id ASC");
            $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
            $query->bindParam(":file_type", $file_type, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            $return_type = array();
            foreach ($return as $key => $value) {
                $return_type[$value->type][] = $value;
            }

            if (empty($return_type)) {
                $return_type = array('empty' => '1');
            }

            CacheModule::setCacheModule('products-Products-getImages-' . (int) $product_id . '-' . $file_type, serialize($return_type), false);
//            $cache->setTags('Products-getImages-' . (int) $product_id . '-' . $file_type, $return_type, 'Products');
            return $return_type;
//        } else {
//            return $get_cache;
//        }
        }
    }

    public function isPseudoDir($pseudo_dir, $type, $edit_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as count FROM products WHERE  is_delete = 0 && TRIM(pseudo_dir) = TRIM(:pseudo_dir) && (id != :edit_id || :edit_id = 0)");
        $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);
        $query->bindParam(":edit_id", $edit_id, PDO::PARAM_INT, 11);
//        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ)->count;
    }

    public function copyProduct($product_id) {
        $registry = Registry::getInstance();
        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Category');
        $cac->deleteTag('Files');

//        $query = $registry->db->query('SHOW COLUMNS products');
        $query = $registry->db->prepare("SELECT * FROM `products` WHERE `id` = :product_id && is_delete = 0 LIMIT 1");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetch(PDO::FETCH_OBJ);
        $field = null;
        $values = null;
        foreach ($return as $key => $value) {
            $field .= "`$key`, ";
            if ($key == 'pseudo_dir') {
                $values .= "'" . addslashes($value) . '-' . rand(0, 1000) . "', ";
            } elseif ($key == 'created') {
                $values .= "NOW(), ";
            } elseif ($key != 'id') {
                $values .= "'" . addslashes($value) . "', ";
            } else {
                $values .= "NULL, ";
            }
        }
        $query_q = $registry->db->prepare("INSERT INTO `products` (" . trim($field, ' ,') . ") VALUES (" . trim($values, ' ,') . ")");
        $query_q->execute();
        $new_product_id = $registry->db->lastInsertId();
        $this->setAdminId($new_product_id, $registry->user_id);

        $query1 = $registry->db->prepare("SELECT * FROM `product_mod` WHERE `product_id` = :product_id && is_delete=0");
        $query1->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query1->execute();
        $return = $query1->fetchAll(PDO::FETCH_OBJ);
        foreach ($return as $query_mod) {
            $field = null;
            $values = null;
            foreach ($query_mod as $key => $value) {
                $field .= "`$key`, ";
                if ($key == 'product_id') {
                    $values .= "'$new_product_id', ";
                } elseif ($key != 'id') {
                    $values .= "'" . addslashes($value) . "', ";
                } else {
                    $values .= "NULL, ";
                }
            }
            $query_q1 = $registry->db->prepare("INSERT INTO `product_mod` (" . trim($field, ' ,') . ") VALUES (" . trim($values, ' ,') . ")");
            $query_q1->execute();
        }

        $query2 = $registry->db->prepare("SELECT * FROM `characteristic_products` WHERE `product_id` = :product_id && is_delete=0");
        $query2->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query2->execute();
        $return = $query2->fetchAll(PDO::FETCH_OBJ);
        foreach ($return as $query_mod) {
            $field = null;
            $values = null;
            foreach ($query_mod as $key => $value) {
                $field .= "`$key`, ";
                if ($key == 'product_id') {
                    $values .= "'$new_product_id', ";
                } elseif ($key != 'id') {
                    $values .= "'" . addslashes($value) . "', ";
                } else {
                    $values .= "NULL, ";
                }
            }
            $query_q2 = $registry->db->prepare("INSERT INTO `characteristic_products` (" . trim($field, ' ,') . ") VALUES (" . trim($values, ' ,') . ")");
            $query_q2->execute();
        }

        $query3 = $registry->db->prepare("SELECT * FROM `products_images` WHERE `product_id` = :product_id && is_delete=0");
        $query3->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query3->execute();
        $return = $query3->fetchAll(PDO::FETCH_OBJ);

        $group_id = 0;
        $group_arr = array();
        foreach ($return as $query_mod) {
            $field = null;
            $values = null;
            foreach ($query_mod as $key => $value) {

                $field .= "`$key`, ";
                if ($key == 'group_id') {
                    if (!isset($group_arr[$value])) {
                        $group_arr[$value] = time() + rand(0, 100000);
                    }
                    $values .= "'" . $group_arr[$value] . "', ";
                } elseif ($key == 'product_id') {
                    $values .= "'$new_product_id', ";
                } elseif ($key == 'file') {
                    $new_file = time() . rand(0, 10000) . '_' . addslashes($value);
                    copy($registry->gallery_dir . $value, $registry->gallery_dir . $new_file); //Копируем файл
                    $values .= "'$new_file', ";
                } elseif ($key != 'id') {
                    $values .= "'" . addslashes($value) . "', ";
                } else {
                    $values .= "NULL, ";
                }
            }
            $query_q2 = $registry->db->prepare("INSERT INTO `products_images` (" . trim($field, ' ,') . ") VALUES (" . trim($values, ' ,') . ")");
            $query_q2->execute();
        }

        foreach ($group_arr as $group_id => $new_group_id) {
            $this->_copyPreview($product_id, $new_product_id, $group_id, $new_group_id);
        }
//        
    }

    private function _copyPreview($product_id, $new_product_id, $file_id, $new_file_id) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Files");
        $file = new Files();
        $query3 = $registry->db->prepare("SELECT * FROM `files` WHERE `page_id` = :product_id && file_id=:file_id && is_delete=0");
        $query3->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query3->bindParam(":file_id", $file_id, PDO::PARAM_INT, 11);
        $query3->execute();
        $return = $query3->fetch(PDO::FETCH_OBJ);

        if (isset($return->id)) {
            $new_file = time() . rand(0, 10000) . '_' . addslashes($return->file);
            copy($registry->preview_dir . addslashes($return->file), $registry->preview_dir . $new_file); //Копируем файл
            $file->add($new_file, $return->size, $return->name, $return->desc, $return->is_image, $return->resize_type, $return->type, $return->upload_dir_type, $return->width, $return->height, $return->category_id, $new_product_id, $new_file_id, $return->order);
        }
    }

    public function delProduct($product_id) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Files');
        $cac->deleteTag('Category');

        $query = $registry->db->prepare("UPDATE `products` SET is_delete=1 WHERE `id` = :product_id LIMIT 1");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        return $query->execute();
    }

    public function delProductImages($product_id) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Files');

//        $query = $registry->db->prepare("UPDATE `products_images` SET is_delete=1 WHERE `products_images`.product_id = :product_id");
        //Полное удаление картинки.. не храним мусор
        $query = $registry->db->prepare("DELETE FROM `products_images` WHERE `product_id` = :product_id LIMIT 1");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        return $query->execute();
    }

    /**
     * ПОЛНОЕ удаление всех товаров в категории
     * товар удаляется из всез возможных таблиц
     * @param type $product_id
     * @return type
     */
    public function delFullProductId($product_id) {
        $registry = Registry::getInstance();

        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
        $cac->deleteTag('Characteristics');
        $cac->deleteTag('Category');
        $cac->deleteTag('Files');

        $query = $registry->db->prepare("DELETE FROM `products` WHERE `id` = :product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
        $query1 = $registry->db->prepare("DELETE FROM `product_mod` WHERE `product_id` = :product_id");
        $query1->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query1->execute();
        $query2 = $registry->db->prepare("DELETE FROM `products_images` WHERE `product_id` = :product_id");
        $query2->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query2->execute();
        $query3 = $registry->db->prepare("DELETE FROM `characteristic_products` WHERE `product_id` = :product_id");
        $query3->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query3->execute();
    }

    public function addSortParam($product_id, $param_type, $order, $shop_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO `product_param_sort` (product_id, param_type, `order`,shop_id ) VALUES (:product_id, :param_type, :order, :shop_id)");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":param_type", $param_type, PDO::PARAM_INT, 11);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function delSortParam($param_type, $shop_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM `product_param_sort` WHERE `param_type` = :param_type && shop_id=:shop_id");
        $query->bindParam(":param_type", $param_type, PDO::PARAM_INT, 11);
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function getFav($limit = 100, $offset = 0) {
        $registry = Registry::getInstance();
        $order = '';
        if (!empty($this->_sort_field) && !empty($this->_sort_order)) {
            $order = " ORDER BY $this->_sort_field $this->_sort_order";
        }
        if ( ! isset($_SESSION['fav']) || ! count($_SESSION['fav'])) { 
            return false; 
        }
        $list = array();
        foreach ($_SESSION['fav'] as $id => $item) {
            if ($val = intval($id)) {
                $list[] = $val;
            }
        }
        $ids = implode(', ', $list);
        $sql = "SELECT
            SQL_CALC_FOUND_ROWS products.*, products.*, 
                product_mod.price as price,
                product_mod.warehouse,
                product_mod.id as mod_id,
                product_mod.article
            FROM products 
            INNER JOIN product_mod ON (product_mod.product_id = products.id)
            WHERE
                product_mod.is_delete=0 &&
                 (is_active = 1) &&
                (products.id IN ($ids) && products.is_delete = 0)
                $order LIMIT :limit OFFSET :offset
        ";
        $query = $registry->db->prepare($sql);
        $query->bindParam(":limit", $limit, PDO::PARAM_INT, 11);
        $query->bindParam(":offset", $offset, PDO::PARAM_INT, 11);
        $query->execute();
        $return = array('result' => $query->fetchAll(PDO::FETCH_OBJ), 'count' => $this->getLastCountQuery());
        return $return;
    }

    public function withChars($products) 
    {
        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        $characteristic = new Characteristics();
        foreach ($products as $product) {
            $product->chars = $characteristic->getCharacteristicValueProduct($product->id);
        }
        return $products;
    }

    public function getByParam($param, $limit, $offset = 0)
    {
        $registry = Registry::getInstance();
        if ( ! in_array($param, array(1, 2, 3, 5))) {
            return array();
        }
        $query = $registry->db->prepare("SELECT products.*, 
            MIN(product_mod.price) as price, 
            MAX(product_mod.price) as max_price
            
            FROM products INNER JOIN product_mod
            
            ON (
                product_mod.is_delete=0 && 
                product_mod.is_delete=0 && 
                is_active = 1 && 
                product_mod.product_id = products.id && 
                (product_mod.warehouse != 0) &&
                products.is_delete = 0 &&
                products.is_param_$param = 1
            ) GROUP BY products.id ORDER BY `products`.`id` DESC LIMIT :limit OFFSET :offset"
        );

        $query->bindParam(":limit", $limit, PDO::PARAM_INT, 11);
        $query->bindParam(":offset", $offset, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getMain()
    {
        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        $characteristic = new Characteristics();

        $list = array();
        $params = array(1, 2, 3, 5);
        foreach ($params as $param) {
            $products = $this->getByParam($param, 8);
            $images = array();
            foreach ($products as $ind => $product) {
                $images[$ind] = $this->getImages($product->id);
                $product->chars = $characteristic->getCharacteristicValueProduct($product->id);
            }
            $list[$param] = array('products' => $products, 'images' => $images);
        }

        return $list;
    }

}
