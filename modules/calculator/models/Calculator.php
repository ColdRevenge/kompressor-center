<?php

class Calculator {

    public function getModels($brand_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("
			SELECT 	* 
			FROM 	products 
			WHERE 	category_1_id = 933 && brand_id = :brand_id GROUP BY products.name");
        $query->bindParam(":brand_id", $brand_id, PDO::PARAM_STR, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSizeModelId($model_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("
			SELECT 		product_mod.* 
			FROM 		products 
			INNER JOIN 	product_mod ON (product_mod.product_id = products.id && product_mod.is_delete = 0 && products.is_delete = 0 && products.id = :model_id) 
ORDER BY name DESC                        
");
        $query->bindParam(":model_id", $model_id, PDO::PARAM_STR, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Выдает модель по размеру
     * @param type $model_id
     * @return type
     */
    public function getModelSize($size, $model_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("
			SELECT 		product_mod.* , products.brand_id
			FROM 		products 
			INNER JOIN 	product_mod ON (
TRIM(product_mod.name) = TRIM(:size) && 
product_mod.product_id = products.id && product_mod.is_delete = 0 && products.is_delete = 0 && products.id = :model_id) 
ORDER BY name DESC                        
");
        $query->bindParam(":model_id", $model_id, PDO::PARAM_STR, 11);
        $query->bindParam(":size", $size, PDO::PARAM_STR, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
}

?>