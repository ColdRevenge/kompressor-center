<?php

class Price {
    public function getPrpducts() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT
		products.*
		FROM products
                WHERE (is_active = 1 && 
                (SELECT COUNT(*) FROM related WHERE products.id = related_id) = 0 &&
                products.is_delete = 0)");
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $return_arr = array();
        foreach ($return as $value) {
            $return_arr[$value->category_1_id][] = $value;
        }

        return $return_arr;
    }
}