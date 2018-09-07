<?php

class Reports {

    public function getOrderCompletedGroup($group_type, $start_date, $end_date) {
        switch ($group_type) {
            case 0:
                $sql = 'GROUP BY DAYOFMONTH(change_status)';
                break;
            case 1:
                $sql = 'GROUP BY MONTH(change_status), YEAR(change_status)';
                break;
            case 2:
                $sql = 'GROUP BY YEAR(change_status)';
                break;
        }
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as `count`, DAYOFMONTH(change_status) as `day`, MONTH(change_status) as `month`, YEAR(change_status) as `year`, SUM(sum_total) as sum_total, SUM(sum_expense) as sum_expense FROM `order` "
                . "WHERE status_id = 3 && (UNIX_TIMESTAMP(`order`.change_status) BETWEEN :start_date AND :end_date) && is_delete = 0 $sql");
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        return $return;
    }
    
    
    public function getOrderCompletedCategoryGroup($start_date, $end_date) {
     
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as `count`,  SUM(order_products.price) as sum_total, SUM(product_mod.cost_price) as sum_expense, products.category_1_id"
                . " FROM `order_products` INNER JOIN products ON (order_products.is_delete = 0 && order_products.product_id = products.id) INNER JOIN product_mod ON "
                . "(product_mod.id = order_products.mod_id)"
                . "WHERE  "
                . "(SELECT COUNT(*) FROM `order` WHERE order_products.order_id = id && status_id = 3 && (UNIX_TIMESTAMP(`order`.change_status) BETWEEN :start_date AND :end_date) && `order`.is_delete = 0) "
                . "GROUP BY category_1_id*1 ORDER BY `count` DESC ");
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        return $return;
    }
    
    public function getOrderCompletedCategory($category_id, $start_date, $end_date) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as `count`, products.shop_id, products.name, products.pseudo_dir, product_mod.article,  SUM(order_products.price) as sum_total, SUM(product_mod.cost_price) as sum_expense "
                . " FROM `order_products` INNER JOIN products ON (order_products.is_delete = 0 && order_products.product_id = products.id) INNER JOIN product_mod ON "
                . "(product_mod.id = order_products.mod_id && products.category_1_id = :category_id)"
                . "WHERE  "
                . "(SELECT COUNT(*) FROM `order` WHERE order_products.order_id = id && status_id = 3 && (UNIX_TIMESTAMP(`order`.change_status) BETWEEN :start_date AND :end_date) && `order`.is_delete = 0) "
                . "GROUP BY products.id ORDER BY `count` DESC ");
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        return $return;
    }
    
    public function getOrderCompletedBrandGroup($start_date, $end_date) {
     
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as `count`,  SUM(order_products.price) as sum_total, SUM(product_mod.cost_price) as sum_expense, products.brand_id"
                . " FROM `order_products` INNER JOIN products ON (order_products.is_delete = 0 && order_products.product_id = products.id) INNER JOIN product_mod ON "
                . "(product_mod.id = order_products.mod_id)"
                . "WHERE  "
                . "(SELECT COUNT(*) FROM `order` WHERE order_products.order_id = id && status_id = 3 && (UNIX_TIMESTAMP(`order`.change_status) BETWEEN :start_date AND :end_date) && `order`.is_delete = 0) "
                . "GROUP BY brand_id*1 ORDER BY `count` DESC ");
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        return $return;
    }
    
    public function getOrderCompletedBrand($brand_id, $start_date, $end_date) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as `count`, products.shop_id, products.name, products.pseudo_dir, product_mod.article,  SUM(order_products.price) as sum_total, SUM(product_mod.cost_price) as sum_expense "
                . " FROM `order_products` INNER JOIN products ON (order_products.is_delete = 0 && order_products.product_id = products.id) INNER JOIN product_mod ON "
                . "(product_mod.id = order_products.mod_id && products.brand_id = :brand_id)"
                . "WHERE  "
                . "(SELECT COUNT(*) FROM `order` WHERE order_products.order_id = id && status_id = 3 && (UNIX_TIMESTAMP(`order`.change_status) BETWEEN :start_date AND :end_date) && `order`.is_delete = 0) "
                . "GROUP BY products.id ORDER BY `count` DESC ");
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->bindParam(":brand_id", $brand_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        return $return;
    }
    
    
    
    public function getHistoryOrders($start_date, $end_date, $is_delete = 0, $status_id = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT *, 
            (SELECT login FROM users WHERE users.id = order.user_id && order.user_id != 0 LIMIT 1) as login FROM `order`
           WHERE
           `order`.is_delete=:is_delete &&
            (`order`.status_id=:status_id || :status_id = -1) && (UNIX_TIMESTAMP(`order`.change_status) BETWEEN :start_date AND :end_date)
            
            ORDER BY `order`.`change_status` ASC");
        $query->bindParam(":is_delete", $is_delete, PDO::PARAM_BOOL, 1);
        $query->bindParam(":status_id", $status_id, PDO::PARAM_INT, 11);
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getReportProducts($start_date, $end_date) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT *,  COUNT(products.id) as `count`,
            (SELECT users.name FROM users WHERE id = products.admin_id) as manager_name
FROM `products` WHERE  is_delete=0 && admin_id != 0

 && (UNIX_TIMESTAMP(`products`.created) BETWEEN :start_date AND :end_date) GROUP BY admin_id
ORDER BY `manager_name` DESC");
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getReportProductsDetailed($admin_id, $start_date, $end_date) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * 
FROM `products` WHERE  is_delete=0 && admin_id = :admin_id

 && (UNIX_TIMESTAMP(`products`.created) BETWEEN :start_date AND :end_date) 
ORDER BY `created` ASC");
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->bindParam(":admin_id", $admin_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getPrpducts() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT
		SQL_CALC_FOUND_ROWS *, products.*, 
                 MIN(product_mod.price) as price, 
                 MAX(product_mod.price) as max_price
                
		FROM products INNER JOIN product_mod
                
                ON (product_mod.is_delete=0 && product_mod.is_delete=0 && (is_active = 1) && product_mod.product_id = products.id && product_mod.warehouse <= 0 &&
                
                
                 products.is_delete = 0) GROUP BY products.id ");
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);

        return $return;
    }

    public function getTopPrpducts($start_date, $end_date) { 
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT
		products.*, product_mod.article, COUNT(*) as product_count, SUM(order_products.price) as product_sum,
                product_mod.name as mod_name FROM 
                products INNER JOIN order_products
                ON (products.id = order_products.product_id  && order_products.is_delete = 0)
                INNER JOIN product_mod
                ON (product_mod.id = order_products.mod_id)
                INNER JOIN `order` ON (`order`.id = order_products.order_id && `order`.status_id = 3  && (UNIX_TIMESTAMP(`order`.change_status) BETWEEN :start_date AND :end_date))
                GROUP BY order_products.mod_id ORDER BY product_count DESC LIMIT 30");
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);

        return $return;
    }

    public function getFullReportOrderPrpducts() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT order_products.product_id, products.pseudo_dir,
		article, products.name, MIN(order_products.price) as min_price, MAX(order_products.price) as max_price,
                COUNT(DISTINCT `order`.id) as count_order,
                COUNT(order_products.product_id) as count_product,
                product_mod.name as mod_name
		FROM order_products
                INNER JOIN `order` ON (order_products.order_id = `order`.id) 
                INNER JOIN product_mod ON (product_mod.id = order_products.mod_id)
                INNER JOIN products ON (order_products.product_id = products.id && products.is_delete = 0)
                GROUP BY product_mod.id
                ");
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        return $return;
    }

    public function getOrderCompleted() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT order_products.product_id,
            COUNT(DISTINCT `order`.id) as count_order,
            COUNT(`order`.id) as count_product_order,
            SUM(order_products.price) as sum_product_price
		FROM order_products
                INNER JOIN `order` ON (order_products.order_id = `order`.id && `order`.status_id = 3
                && `order`.is_delete = 0 && order_products.is_delete = 0)
                GROUP BY order_products.product_id");
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);

        $result = array();
        foreach ($return as $key => $value) {
            $result[$value->product_id] = $value;
        }

        return $result;
    }

    public function getProductCompleted() {
        
    }

    /**
     * Возвращает заказы
     * @return <type>
     */
    public function getOrders($user_id, $status_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT *, (SELECT order_status.name FROM order_status WHERE status_id = order_status.id) as status_name FROM `order` WHERE (:user_id = 0 || :user_id = `order`.user_id) && (status_id = :status_id || :status_id = 0) && is_delete=0 && is_completed=0 ORDER BY `created` DESC");
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":status_id", $status_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getOrdersCurrent($user_id = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT *, 
            (SELECT order_status.name FROM order_status WHERE status_id = order_status.id) as status_name
FROM `order` WHERE (:user_id = 0 || :user_id = `order`.user_id) && status_id != 3 && is_delete=0 && is_completed=0 ORDER BY `created` DESC");
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":status_id", $status_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getReportManager($start_date, $end_date) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT *, SUM(sum_total) as `sum`, COUNT(order.id) as `count`,
            (SELECT users.name FROM users WHERE id = order.manager_id) as manager_name
FROM `order` WHERE status_id = 3 && is_delete=0 && manager_id != 0

 && (UNIX_TIMESTAMP(`order`.change_status) BETWEEN :start_date AND :end_date) GROUP BY manager_id
ORDER BY `manager_name` DESC");
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Историю характеристик (например, самые продоваемые размеры)
     * @return <type>
     */
    public function getHistoryOrdersChar($start_date, $end_date, $char_id, $status_id = -1) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT characteristic_value.id, characteristic_value.name, COUNT(characteristic_value.id) as `count`, SUM(order_products.price) as sum_total FROM `order`
            INNER JOIN order_products ON 
            (`order`.status_id=:status_id || :status_id = -1) && (UNIX_TIMESTAMP(`order`.change_status) BETWEEN :start_date AND :end_date && order_products.order_id = `order`.id) 
            INNER JOIN characteristic_value ON (
            characteristic_value.characteristic_id = :char_id && characteristic_value.is_delete = 0 && 
            characteristic_value.id = order_products.char_1_id
)
GROUP BY characteristic_value.id
            
            ORDER BY `characteristic_value`.`order` ASC");
        $query->bindParam(":status_id", $status_id, PDO::PARAM_INT, 11);
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":char_id", $char_id, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
            
        return $return;
    }
    
    
    public function getHistoryOrdersCharDetailed($char_id, $start_date, $end_date) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as `count`, products.shop_id, products.name, products.pseudo_dir, product_mod.article,  SUM(order_products.price) as sum_total, SUM(product_mod.cost_price) as sum_expense "
                . " FROM `order_products` INNER JOIN products ON (order_products.is_delete = 0 && order_products.product_id = products.id) INNER JOIN product_mod ON "
                . "(product_mod.id = order_products.mod_id && order_products.char_1_id = :char_id)"
                . "WHERE  "
                . "(SELECT COUNT(*) FROM `order` WHERE order_products.order_id = id && status_id = 3 && (UNIX_TIMESTAMP(`order`.change_status) BETWEEN :start_date AND :end_date) && `order`.is_delete = 0) "
                . "GROUP BY products.id ORDER BY `count` DESC ");
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->bindParam(":char_id", $char_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        return $return;
    }

}
