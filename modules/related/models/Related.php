<?php

class Related {

    public function addRelatedProduct($product_id, $related_id, $type) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Related');

        $query = $registry->db->prepare("INSERT INTO related (product_id, related_id, `type`) VALUES (:product_id, :related_id, :type)");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":related_id", $related_id, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    /**
     * Изменяет временный id, на постоянный
     */
    public function setRelatedProductId($temp_product_id, $product_id, $type = 0) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Related');

        $query = $registry->db->prepare("UPDATE related SET product_id = :product_id WHERE `type`=:type && product_id = :temp_product_id");
        $query->bindParam(":temp_product_id", $temp_product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function isRelated($product_id) {
        
    }

    /**
     * Возвращет сопутствующие товары в категории
     * 
     * @param <type> $product_id 
     */
    public function getRelatedCategory($category_id, $product_id, $type) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Related-getRelatedCategory-' . $category_id . '-' . $product_id . '-' . $type, 'Related');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM related INNER JOIN products
ON (related.`type`=:type && related.is_delete = 0 && :product_id = related.product_id && products.id = related.related_id && products.is_delete = 0 && products.is_active = 1 &&
(category_1_id = :category_id || category_2_id = :category_id || category_3_id = :category_id || category_4_id = :category_id || category_5_id = :category_id))");
            $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
            $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
            $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            $cache->setTags('Related-getRelatedCategory-' . $category_id . '-' . $product_id . '-' . $type, $return, 'Related');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Возвращает продукты которые входят в группу совмещенных
     * (либо related_id, либо product_id)
     * Используется если нужно вывести совмещенные товары, в тех продуктах, которые сами
     * являются совмещенными
     */
    public function getRelatedProductRelated($product_id, $type) {

        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Related-getRelatedProductRelated-' . $product_id . '-' . $type, 'Related');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT product_id FROM related WHERE 
            related.is_delete = 0 && related.related_id = :product_id LIMIT 1");
            $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);
            if (isset($return->product_id) && $return->product_id > 0) {


                $query = $registry->db->prepare("SELECT products.*, MIN(product_mod.price) as price, MAX(product_mod.price) as max_price,
(SELECT file FROM products_images WHERE product_id = products.id && `type`=3 && is_delete = 0 LIMIT 1) as file, related.product_id, 
related.related_id, product_mod.id as mod_id, product_mod.article
FROM related INNER JOIN products
ON (related.`type`=:type && related.is_delete = 0 && related.product_id = :related_product_id && products.id != :product_id 
&& (products.id = related.related_id || products.id = :related_product_id) && products.is_delete = 0 && products.is_active = 1)
INNER JOIN product_mod
                ON (product_mod.product_id = products.id && related.is_delete = 0 && (product_mod.warehouse > 0 ))
GROUP BY products.id
");
                
                $query->bindParam(":related_product_id", $return->product_id, PDO::PARAM_INT, 11);
                $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
                $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
                $query->execute();

                $return = $query->fetchAll(PDO::FETCH_OBJ);
                $cache->setTags('Related-getRelatedProductRelated-' . $product_id . '-' . $type, $return, 'Related');
                return $return;
            } else {
                return $get_cache;
            }
        }


        return array();
    }

    /**
     * Возвращает сопутствующие товара
     * @param <type> $product_id
     * @return <type>
     */
    public function getRelatedProducts($product_id, $type) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Related-getRelatedProducts-' . $product_id . '-' . $type, 'Related');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT products.*, (product_mod.price) as price, MAX(product_mod.price) as max_price, product_mod.old_price,
(SELECT file FROM products_images WHERE product_id = products.id && `type`=3 && is_delete = 0 LIMIT 1) as file, related.product_id, 
related.related_id, product_mod.id as mod_id, product_mod.article
FROM related INNER JOIN products 
ON (related.is_delete = 0 && related.`type`=:type && related.product_id = :product_id && products.id = related.related_id && products.is_delete = 0 && products.is_active = 1)
INNER JOIN product_mod
                
                ON (product_mod.is_delete=0 && product_mod.product_id = products.id && related.is_delete = 0 && (product_mod.warehouse > 0 ))
                GROUP BY products.id
");
            $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
            $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            $cache->setTags('Related-getRelatedProducts-' . $product_id . '-' . $type, $return, 'Related');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Возвращает товары, к которым товар является сопутствующим
     * @param <type> $product_id
     * @return <type> 
     */
    public function getProductRelated($related_id) {
        $registry = Registry::getInstance();

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Related-getProductRelated-' . $related_id, 'Related');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT products.*, product_mod.price, related.related_id, related.product_id  FROM related INNER JOIN products
ON (related.is_delete = 0 && related.related_id = :related_id && products.id = related.product_id && products.is_delete = 0 && products.is_active = 1)
INNER JOIN product_mod ON (product_mod.is_delete=0 && product_mod.product_id = products.id )
");
            $query->bindParam(":related_id", $related_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            $cache->setTags('Related-getProductRelated-' . $related_id, $return, 'Related');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function delRelated($product_id, $category_id, $type) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Related');

        $query = $registry->db->prepare("DELETE FROM related WHERE product_id=:product_id && `type`=:type && 
            related_id IN (SELECT id FROM products WHERE (category_1_id = :category_id || category_2_id = :category_id || category_3_id = :category_id || category_4_id = :category_id || category_5_id = :category_id))");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function delRelatedId($product_id, $related_id) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Related');

        $query = $registry->db->prepare("DELETE FROM related WHERE product_id=:product_id && related_id=:related_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":related_id", $related_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

}
