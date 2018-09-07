<?php

class Aviable {

    /**
     * Стоит заплатка для girl-shop, не выводит сопутствующие товары
     * Возвращает все продукты определенной категории
     * @param <type> $category_id
     * @param <type> $is_warehouse
     * @param <type> $is_active
     * @return <type>
     */
    //(SELECT COUNT(*) FROM related WHERE products.id = related_id) = 0 &&
    public function getPrpductsBrand($brand_id = 0, $is_active = -1) {
        $registry = Registry::getInstance();

        $query = $registry->db->prepare("SELECT SQL_CALC_FOUND_ROWS *, product_mod.*, products.*, product_mod.id as mod_id, product_mod.warehouse,
		products.id, product_mod.article
		FROM products 
                INNER JOIN product_mod ON 
            (product_mod.product_id = products.id && (products.is_active = :is_active || :is_active = -1) &&
            product_mod.is_delete = 0 && 
            products.brand_id = :brand_id &&  products.is_delete = 0 )");
        $query->bindParam(":brand_id", $brand_id, PDO::PARAM_INT, 11);
        $query->bindParam(":is_active", $is_active, PDO::PARAM_INT, 11);
        $query->execute();
//            $return = $query->fetchAll(PDO::FETCH_OBJ);
////        $return = array('result' => $query->fetchAll(PDO::FETCH_OBJ), 'count' => $this->getLastCountQuery());
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

}
