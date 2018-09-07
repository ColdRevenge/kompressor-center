<?php

class ImportParam {

    public function getProductsParam($param_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT products.*, product_mod.article
		FROM products INNER JOIN product_mod
                ON (is_param_$param_id = 1 && product_mod.is_delete=0 && product_mod.product_id = products.id && products.is_delete = 0)");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function clearProductsParam($param_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE products SET is_param_$param_id = 0 WHERE is_param_$param_id = 1");
        $query->execute();
        //Очищаем кеш товаров и картинок товаров, и характеристик
        $cac = Cache::getInstance();
        $cac->deleteTag('Products');
    }

    public function getProductArticle($article) {
        $registry = Registry::getInstance();
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
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function setProductsParam($param_id, $product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE products SET is_param_$param_id = 1 WHERE id = :product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

}

?>
