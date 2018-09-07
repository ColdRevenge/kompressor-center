<?php

/**
 * Класс для записи и редактирования цен, артиклов, модификаций 
 */
class Mod {

    public function addMod($product_id, $type, $name, $article, $cost_price, $price, $price_1, $price_2,
        $price_3, $price_4, $price_5, $price_6, $price_7, $price_8, $price_9, $price_10, $old_price, $warehouse,
        $currency_id, $param_1 = null, $param_2 = null, $param_3 = null, $param_4 = null, $param_5 = null,
        $param_6 = null, $param_7 = null, $param_8 = null, $param_9 = null, $param_10 = null,
        $auto_format = null, $auto_format_currency = null) {
        $registry = Registry::getInstance();
        $currency_id = 1;
        $query = $registry->db->prepare("INSERT INTO product_mod (param_1, param_2, param_3, param_4, param_5, param_6, 
param_7, param_8, param_9, param_10, `product_id`, `type`, `name`, article, cost_price, price, price_1, price_2,
 price_3, price_4, price_5, price_6, price_7, price_8, price_9, price_10, currency_id, old_price, warehouse, auto_format,
  auto_format_currency)
		VALUES (:param_1, :param_2, :param_3, :param_4, :param_5, :param_6, :param_7, :param_8, :param_9, :param_10,
		 :product_id, :type, :name, :article, :cost_price, :price, :price_1, :price_2, :price_3, :price_4, :price_5, 
		 :price_6, :price_7, :price_8, :price_9, :price_10, :currency_id, :old_price, :warehouse, :auto_format,
		  :auto_format_currency)");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":article", $article, PDO::PARAM_STR, 255);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":cost_price", $this->_checkPrice($cost_price), PDO::PARAM_INT, 11);
        $query->bindParam(":price", $this->_checkPrice($price), PDO::PARAM_INT, 11);
        $query->bindParam(":price_1", $this->_checkPrice($price_1), PDO::PARAM_INT, 11);
        $query->bindParam(":price_2", $this->_checkPrice($price_2), PDO::PARAM_INT, 11);
        $query->bindParam(":price_3", $this->_checkPrice($price_3), PDO::PARAM_INT, 11);
        $query->bindParam(":price_4", $this->_checkPrice($price_4), PDO::PARAM_INT, 11);
        $query->bindParam(":price_5", $this->_checkPrice($price_5), PDO::PARAM_INT, 11);
        $query->bindParam(":price_6", $this->_checkPrice($price_6), PDO::PARAM_INT, 11);
        $query->bindParam(":price_7", $this->_checkPrice($price_7), PDO::PARAM_INT, 11);
        $query->bindParam(":price_8", $this->_checkPrice($price_8), PDO::PARAM_INT, 11);
        $query->bindParam(":price_9", $this->_checkPrice($price_9), PDO::PARAM_INT, 11);
        $query->bindParam(":price_10", $this->_checkPrice($price_10), PDO::PARAM_INT, 11);
        $query->bindParam(":warehouse", $warehouse, PDO::PARAM_INT, 11);
        $query->bindParam(":old_price", $this->_checkPrice($old_price), PDO::PARAM_INT, 11);
        $query->bindParam(":currency_id", $this->_checkPrice($currency_id), PDO::PARAM_INT, 11);
        $query->bindParam(":param_1", $param_1, PDO::PARAM_STR, 255);
        $query->bindParam(":param_2", $param_2, PDO::PARAM_STR, 255);
        $query->bindParam(":param_3", $param_3, PDO::PARAM_STR, 255);
        $query->bindParam(":param_4", $param_4, PDO::PARAM_STR, 255);
        $query->bindParam(":param_5", $param_5, PDO::PARAM_STR, 255);
        $query->bindParam(":param_6", $param_6, PDO::PARAM_STR, 255);
        $query->bindParam(":param_7", $param_7, PDO::PARAM_STR, 255);
        $query->bindParam(":param_8", $param_8, PDO::PARAM_STR, 255);
        $query->bindParam(":param_9", $param_9, PDO::PARAM_STR, 255);
        $query->bindParam(":param_10", $param_10, PDO::PARAM_STR, 255);
        $query->bindParam(":auto_format", $auto_format, PDO::PARAM_INT, 11);
        $query->bindParam(":auto_format_currency", $auto_format_currency, PDO::PARAM_STR, 255);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function setMod($product_id, $type, $name, $article, $cost_price,  $price, $price_1, $price_2,
        $price_3, $price_4, $price_5, $price_6, $price_7, $price_8, $price_9, $price_10, $old_price, $warehouse,
        $currency_id, $param_1 = null, $param_2 = null, $param_3 = null, $param_4 = null, $param_5 = null,
        $param_6 = null, $param_7 = null, $param_8 = null, $param_9 = null, $param_10 = null,
        $auto_format = null, $auto_format_currency = null) {
        $registry = Registry::getInstance();
        $currency_id = 1;
        $query = $registry->db->prepare("UPDATE product_mod SET 
            param_1 = :param_1, param_2 = :param_2, param_3 = :param_3, param_4 = :param_4, param_5 = :param_5, 
            param_6 = :param_6, param_7 = :param_7, param_8 = :param_8, param_9 = :param_9, param_10 = :param_10, 
             `type` = :type, `name` = :name, article = :article, cost_price = :cost_price, price = :price, price_1 = :price_1, 
            price_2 = :price_2, price_3 = :price_3, price_4 = :price_4, price_5 = :price_5, price_6 = :price_6, price_7 = :price_7, 
            price_8 = :price_8, price_9 = :price_9, price_10 = :price_10, currency_id = :currency_id, old_price = :old_price, warehouse = :warehouse
            , auto_format = :auto_format
            , auto_format_currency = :auto_format_currency
             WHERE is_delete=0 && product_id=:product_id");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":article", $article, PDO::PARAM_STR, 255);
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":cost_price", $this->_checkPrice($cost_price), PDO::PARAM_INT, 11);
        $query->bindParam(":price", $this->_checkPrice($price), PDO::PARAM_INT, 11);
        $query->bindParam(":price_1", $this->_checkPrice($price_1), PDO::PARAM_INT, 11);
        $query->bindParam(":price_2", $this->_checkPrice($price_2), PDO::PARAM_INT, 11);
        $query->bindParam(":price_3", $this->_checkPrice($price_3), PDO::PARAM_INT, 11);
        $query->bindParam(":price_4", $this->_checkPrice($price_4), PDO::PARAM_INT, 11);
        $query->bindParam(":price_5", $this->_checkPrice($price_5), PDO::PARAM_INT, 11);
        $query->bindParam(":price_6", $this->_checkPrice($price_6), PDO::PARAM_INT, 11);
        $query->bindParam(":price_7", $this->_checkPrice($price_7), PDO::PARAM_INT, 11);
        $query->bindParam(":price_8", $this->_checkPrice($price_8), PDO::PARAM_INT, 11);
        $query->bindParam(":price_9", $this->_checkPrice($price_9), PDO::PARAM_INT, 11);
        $query->bindParam(":price_10", $this->_checkPrice($price_10), PDO::PARAM_INT, 11);
        $query->bindParam(":warehouse", $warehouse, PDO::PARAM_INT, 11);
        $query->bindParam(":old_price", $this->_checkPrice($old_price), PDO::PARAM_INT, 11);
        $query->bindParam(":currency_id", $this->_checkPrice($currency_id), PDO::PARAM_INT, 11);
        $query->bindParam(":param_1", $param_1, PDO::PARAM_STR, 255);
        $query->bindParam(":param_2", $param_2, PDO::PARAM_STR, 255);
        $query->bindParam(":param_3", $param_3, PDO::PARAM_STR, 255);
        $query->bindParam(":param_4", $param_4, PDO::PARAM_STR, 255);
        $query->bindParam(":param_5", $param_5, PDO::PARAM_STR, 255);
        $query->bindParam(":param_6", $param_6, PDO::PARAM_STR, 255);
        $query->bindParam(":param_7", $param_7, PDO::PARAM_STR, 255);
        $query->bindParam(":param_8", $param_8, PDO::PARAM_STR, 255);
        $query->bindParam(":param_9", $param_9, PDO::PARAM_STR, 255);
        $query->bindParam(":param_10", $param_10, PDO::PARAM_STR, 255);
        $query->bindParam(":auto_format", $auto_format, PDO::PARAM_INT, 11);
        $query->bindParam(":auto_format_currency", $auto_format_currency, PDO::PARAM_STR, 255);
        $query->execute();
    }

    /**
     * Проверяет есть ли модификация у продукта (если нет то товар только добавляеься, или полетели правки)
     * @param type $product_id
     */
    public function isModProduct($product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as `count` FROM product_mod WHERE is_delete = 0 && product_id=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ)->count;
    }

    public function getModArticles($article) {
        $article = "$article%";
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT
		product_mod.*
		FROM product_mod
                WHERE article LIKE :article && is_delete = 0 ORDER BY `article` DESC");
        $query->bindParam(":article", $article, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    
    public function getModNames($article) {
        $article = "%$article%";
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT
		product_mod.*, products.*
		FROM product_mod INNER JOIN products ON (products.id=product_mod.product_id && products.name LIKE :article && products.is_delete=0 && product_mod.is_delete = 0 )
               ORDER BY products.name DESC");
        $query->bindParam(":article", $article, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getModArticle($article) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT
		product_mod.*
		FROM product_mod
                WHERE article LIKE :article && is_delete = 0 ORDER BY `article` DESC");
        $query->bindParam(":article", $article, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getModProductArticle($article) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT
		product_mod.*
		FROM product_mod INNER JOIN products ON (products.id=product_mod.product_id && TRIM(product_mod.article) LIKE TRIM(:article) && products.is_delete=0 && product_mod.is_delete = 0 )
                ORDER BY products.name DESC");
        $query->bindParam(":article", $article, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function getModProductName($name) {
        echo "#$name#";
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT
		product_mod.*
		FROM product_mod INNER JOIN products ON (products.id=product_mod.product_id && TRIM(products.name) LIKE TRIM(:name) && products.is_delete=0 && product_mod.is_delete = 0 )
                ORDER BY products.name DESC");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function getModName($name) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT
		product_mod.*
		FROM product_mod
                WHERE article LIKE :name && is_delete = 0 ORDER BY `article` DESC");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function getModId($mod_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT product_mod.* FROM product_mod WHERE id = :mod_id && is_delete = 0");
        $query->bindParam(":mod_id", $mod_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getMod($product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT
		product_mod.*
		FROM product_mod
                WHERE product_id = :product_id && is_delete = 0 ORDER BY product_mod.price, `name` DESC");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getModAll() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT
		product_mod.*
		FROM product_mod
                WHERE is_delete = 0 ORDER BY product_mod.price, `name` DESC");
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();
        foreach ($return as $key => $value) {
            $result[$value->product_id][$key] = $value;
        }
        return $result;
    }

    /**
     * Проверяет и исправляет неправильные цены 
     */
    private function _checkPrice($price) {
//        print_r($price);
//        echo str_replace("$",null, str_replace(",",".", trim(str_replace(" ", null, $price)))).'';; 
        $return = str_replace("$", null, str_replace(" ", null, str_replace(",", ".", trim(str_replace(" ", null, str_replace(" ", null, $price))))));

        return $return;
    }

    private function _float_format($float) {
        if (mb_strpos($float, ',') !== false) {
            $float = str_replace(',', '.', mb_substr($float, 0, mb_strpos($float, ',') + 3));
        }
        return $float;
    }

    public function setModPrice($article, $price, $price_1, $price_2, $price_3, $price_4, $price_5, $price_6, $price_7, $price_8, $price_9, $price_10, $old_price, $warehouse, $curs = 1) {
//        if ($article == 10033) {

        $curs = $this->_checkPrice($curs);
//            echo "$price / $price_1 # $curs<br/>---<br/>";
        $price = $this->_float_format($this->_checkPrice($price) * $curs);
        $price_1 = $this->_float_format($this->_checkPrice($price_1) * $curs);
        $price_2 = $this->_float_format($this->_checkPrice($price_2) * $curs);
        $price_3 = $this->_float_format($this->_checkPrice($price_3) * $curs);
        $price_4 = $this->_float_format($this->_checkPrice($price_4) * $curs);
        $price_5 = $this->_float_format($this->_checkPrice($price_5) * $curs);
        $price_6 = $this->_float_format($this->_checkPrice($price_6) * $curs);
        $price_7 = $this->_float_format($this->_checkPrice($price_7) * $curs);
        $price_8 = $this->_float_format($this->_checkPrice($price_8) * $curs);
        $price_9 = $this->_float_format($this->_checkPrice($price_9) * $curs);
        $price_10 = $this->_float_format($this->_checkPrice($price_10) * $curs);
        $old_price = $this->_float_format($this->_checkPrice($old_price) * $curs);
//            echo "$price / $price_1 # $curs";
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE 
		product_mod SET price=:price,	
                price_1=:price_1,
                price_2=:price_2,
                price_3=:price_3,
                price_4=:price_4,
                price_5=:price_5,
                price_6=:price_6,
                price_7=:price_7,
                price_8=:price_8,
                price_9=:price_9,
                price_10=:price_10,
                old_price=:old_price, warehouse=:warehouse
                WHERE article = :article");
        $query->bindParam(":article", $article, PDO::PARAM_INT, 11);
        $query->bindParam(":price", $price, PDO::PARAM_STR, 11);
        $query->bindParam(":price_1", $price_1, PDO::PARAM_INT, 11);
        $query->bindParam(":price_2", $price_2, PDO::PARAM_INT, 11);
        $query->bindParam(":price_3", $price_3, PDO::PARAM_INT, 11);
        $query->bindParam(":price_4", $price_4, PDO::PARAM_INT, 11);
        $query->bindParam(":price_5", $price_5, PDO::PARAM_INT, 11);
        $query->bindParam(":price_6", $price_6, PDO::PARAM_INT, 11);
        $query->bindParam(":price_7", $price_7, PDO::PARAM_INT, 11);
        $query->bindParam(":price_8", $price_8, PDO::PARAM_INT, 11);
        $query->bindParam(":price_9", $price_9, PDO::PARAM_INT, 11);
        $query->bindParam(":price_10", $price_10, PDO::PARAM_INT, 11);
        $query->bindParam(":old_price", $old_price, PDO::PARAM_INT, 11);
        $query->bindParam(":warehouse", $warehouse, PDO::PARAM_INT, 11);
        $query->execute();
//            print_r($query->errorInfo());
//        }
    }

    
    public function setModWarehouse($article, $warehouse) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE product_mod SET warehouse=:warehouse WHERE article = :article");
        $query->bindParam(":article", $article, PDO::PARAM_INT, 11);
        $query->bindParam(":warehouse", $warehouse, PDO::PARAM_INT, 11);
        $query->execute();
    }
    public function setModShortPrice($article, $price, $price_1, $price_2, $warehouse) {

        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE product_mod SET price=:price,  price_1=:price_1,  price_2=:price_2,  warehouse=:warehouse
                WHERE article = :article");
        $query->bindParam(":article", $article, PDO::PARAM_INT, 11);
        $query->bindParam(":price", $this->_checkPrice($price), PDO::PARAM_INT, 11);
        $query->bindParam(":price_1", $this->_checkPrice($price_1), PDO::PARAM_INT, 11);
        $query->bindParam(":price_2", $this->_checkPrice($price_2), PDO::PARAM_INT, 11);
        $query->bindParam(":warehouse", $warehouse, PDO::PARAM_INT, 11);
        $query->execute();
    }
    
    
    
    public function setModPriceProductId($product_id, $price) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE product_mod SET price = :price WHERE is_delete=0 && product_id=:product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":price", $this->_checkPrice($price), PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function delAllMod($product_id) {

        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE 
		product_mod SET is_delete = 1 
                WHERE product_id = :product_id");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Меняет временный id на id-продукта
     * @param <type> $temp_id
     * @param <type> $product_id 
     */
    public function setTemProductMod($temp_product_id, $product_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `product_mod` SET product_id=:product_id WHERE product_id=:temp_product_id ");
        $query->bindParam(":product_id", $product_id, PDO::PARAM_INT, 11);
        $query->bindParam(":temp_product_id", $temp_product_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

}
