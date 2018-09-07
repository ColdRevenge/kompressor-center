<?php

class _clear_categoryController extends Controller {

    
    public function category_2_3Action() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT products.*,
                
                (SELECT file FROM products_images WHERE product_id = products.id && `type`=3 && is_delete = 0 LIMIT 1) as file, (SELECT article FROM product_mod WHERE product_id = products.id && product_mod.is_delete=0) as article FROM products WHERE 
                 (is_active = 1 && products.is_delete = 0 && products.category_1_id != 0 && (category_2_id = 0 && category_3_id = 0))");
        $query->execute();
        $not_char = $query->fetchAll(PDO::FETCH_OBJ);
        $products_not_char = array();
        foreach ($not_char as $key => $value) {
            $products_not_char[$value->category_1_id][] = $value;
        }
        $this->products_not_char = $products_not_char;

        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $category_arr = array();
        foreach ($products_not_char as $category_id => $value) {
            $category_arr[$category_id] = $category->getCategoryId($category_id);
        }
        $this->category_arr = $category_arr;

        $this->menu = $registry->menu;
    }

    public function category_4_5Action() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT products.*,
                
                (SELECT file FROM products_images WHERE product_id = products.id && `type`=3 && is_delete = 0 LIMIT 1) as file, (SELECT article FROM product_mod WHERE product_id = products.id && product_mod.is_delete=0) as article FROM products WHERE 
                 (is_active = 1 && products.is_delete = 0 && products.category_1_id != 0 && (category_4_id = 0 && category_5_id = 0))");
        $query->execute();
        $not_char = $query->fetchAll(PDO::FETCH_OBJ);
        $products_not_char = array();
        foreach ($not_char as $key => $value) {
            $products_not_char[$value->category_1_id][] = $value;
        }
        $this->products_not_char = $products_not_char;

        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $category_arr = array();
        foreach ($products_not_char as $category_id => $value) {
            $category_arr[$category_id] = $category->getCategoryId($category_id);
        }
        $this->category_arr = $category_arr;

        $this->menu = $registry->menu;
    }

    public function descAction() {
        $registry = Registry::getInstance();

        Lavra_Loader::LoadModels("Products", "products");
        $products = new Products();

        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        $characteristic = new Characteristics();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();

        /**
         * Добавляем к названиям товаров камни
         */
        if (isset($_POST['is_send'])) {

            $get_products = $products->getProductsAll(0, 1, 0, 10000000000);
            foreach ($get_products as $key => $value) {
                if (mb_strpos($value->name, '(') === false) {
                    $get_chars = $characteristic->getProductValues($value->id, 5);
                    if (count($get_chars)) {
                        $name = null;
                        foreach ($get_chars as $char) {
                            if ($char->is_param_1 == 1) {
                                $name .= $char->name . ', ';
                            }
                        }
                        if (!empty($name)) {
                            $products->setName($value->id, trim($value->name) . ' (' . trim($name, ', ') . ')');
                        }
                    }
//                    echo trim($value->name) . ' (' . trim($name, ', ') . ')' . '<br/>';
                }
            }
        }

        /**
         * Раскидать товары по камням
         */
        if (isset($_POST['is_send_kamen'])) {

            $get_products = $products->getProductsAll(0, 1, 0, 10000000000);
            foreach ($get_products as $key => $value) {
                if ($value->category_1_id != 0) {
                    $get_chars = $characteristic->getProductValues($value->id, 5);
                    $name_arr = array();
                    foreach ($get_chars as $char) {
                        if ($char->is_param_1 == 1) {
                            $get_category = $category->getCategoryName($char->name, 790);
                            if (isset($get_category->id)) {
                                $name_arr[] = $get_category->id;
                            }
                        }
                    }
                    if (count($name_arr) > 0) {
                        if (isset($name_arr[0])) {
                            $query = $registry->db->prepare("UPDATE `products`  SET category_3_id = :category_id WHERE `id` = :product_id");
                            $query->bindParam(":category_id", $name_arr[0], PDO::PARAM_INT, 11);
                            $query->bindParam(":product_id", $value->id, PDO::PARAM_INT, 11);
                            $query->execute();
                        }
                        if (isset($name_arr[1])) {
                            $query = $registry->db->prepare("UPDATE `products`  SET category_4_id = :category_id WHERE `id` = :product_id");
                            $query->bindParam(":category_id", $name_arr[1], PDO::PARAM_INT, 11);
                            $query->bindParam(":product_id", $value->id, PDO::PARAM_INT, 11);
                            $query->execute();
                        }
                    }
                }
//                    echo trim($value->name) . ' (' . trim($name, ', ') . ')' . '<br/>';
            }
        }


        /**
         * Раскидать товары по знакам зодиака
         */
        if (isset($_POST['is_send_news'])) {
            $query = $registry->db->prepare("SELECT * FROM products WHERE 
                 (SELECT COUNT(*) FROM product_mod WHERE products.id = product_mod.product_id && product_mod.is_delete=0 && price > 0 && product_mod.warehouse > 0)  && 
                 (SELECT COUNT(*) FROM products_images WHERE products.id = products_images.product_id && products_images.is_delete=0)  && 
                
                 is_active = 1 && products.category_1_id > 0 && products.is_delete = 0 && shop_id=:shop_id  ORDER BY created DESC LIMIT 109");
            $query->bindParam(":shop_id", $registry->shop_type, PDO::PARAM_INT, 11);
            $query->execute();
            $fetch = $query->fetchAll(PDO::FETCH_OBJ);

            $registry->db->query("UPDATE products SET is_param_3 = 0 WHERE shop_id = " . $registry->shop_type);

            foreach ($fetch as $key => $value) {
                $query1 = $registry->db->query("UPDATE products SET is_param_3 = 1 WHERE id=" . $value->id);
            }
        }
        /**
         * Раскидать товары по знакам зодиака
         */
        if (isset($_POST['is_send_zodiak'])) {

            $get_products = $products->getProductsAll(0, 1, 0, 10000000000);
            foreach ($get_products as $key => $value) {

                if ($value->category_1_id != 0) {
                    $get_chars = $characteristic->getProductValues($value->id, 5);
                    $zodiak_arr = array();
                    $_category_count = 5; //Начинать с category_5_id
                    foreach ($get_chars as $char) {
                        //1034
                        if ($char->id == 583) { //Горный хрусталь
                            $zodiak_arr[1034] = 1034; //Овен
                            $zodiak_arr[1038] = 1038; //Дева
                            $zodiak_arr[1039] = 1039; //Лев
                        }
                        if ($char->id == 524) { //Циркон
                            $zodiak_arr[1034] = 1034; //Овен
                            $zodiak_arr[1044] = 1044; //Водолей
                        }
                        if ($char->id == 9) { //Кварц
                            $zodiak_arr[1034] = 1034; //Овен
                        }
                        if ($char->id == 106) { //Авантюрин
                            $zodiak_arr[1035] = 1035; //Телец
                            $zodiak_arr[1037] = 1037; //Рак
                            $zodiak_arr[1038] = 1038; //Дева
                        }
                        if ($char->id == 7) { //Агат
                            $zodiak_arr[1035] = 1035; //Телец
                            $zodiak_arr[1036] = 1036; //Близнецы
                            $zodiak_arr[1041] = 1041; //Скорпион
                            $zodiak_arr[1043] = 1043; //Козерог
                            $zodiak_arr[1045] = 1045; //Рыбы
                        }
                        if ($char->id == 1046) { //Амазонит
                            $zodiak_arr[1035] = 1035; //Телец
                        }
                        if ($char->id == 638) { //Малахит
                            $zodiak_arr[1035] = 1035; //Телец
                            $zodiak_arr[1040] = 1040; //Весы
                        }
                        if ($char->id == 166) { //Бирюза
                            $zodiak_arr[1035] = 1035; //Телец
                            $zodiak_arr[1040] = 1040; //Весы
                            $zodiak_arr[1042] = 1042; //Стрелец
                        }
                        if ($char->id == 1047) { //Кахолонг
                            $zodiak_arr[1035] = 1035; //Телец
                        }
                        if ($char->id == 34) { //Аметист
                            $zodiak_arr[1036] = 1036; //Близнецы
                        }
                        if ($char->id == 557) { //Цитрин
                            $zodiak_arr[1036] = 1036; //Близнецы
                        }
                        if ($char->id == 1048) { //Гематит
                            $zodiak_arr[1037] = 1037; //Рак
                            $zodiak_arr[1041] = 1041; //Скорпион
                        }
                        if ($char->id == 637) { //Лунный камень
                            $zodiak_arr[1037] = 1037; //Рак
                        }
                        if ($char->id == 1049) { //Жадеит
                            $zodiak_arr[1038] = 1038; //Дева
                        }
                        if ($char->id == 1050) { //Змеевик
                            $zodiak_arr[1038] = 1038; //Дева
                        }
                        if ($char->id == 134) { //Кошачий глаз
                            $zodiak_arr[1038] = 1038; //Дева
                        }
                        if ($char->id == 31) { //Нефрит
                            $zodiak_arr[1038] = 1038; //Дева
                            $zodiak_arr[1040] = 1040; //Весы
                        }
                        if ($char->id == 1051) { //Обсидиан
                            $zodiak_arr[1039] = 1039; //Лев
                            $zodiak_arr[1042] = 1042; //Стрелец
                            $zodiak_arr[1043] = 1043; //Козерог
                        }
                        if ($char->id == 1052) { //Рубин
                            $zodiak_arr[1039] = 1039; //Лев
                        }
                        if ($char->id == 660) { //Турмалин
                            $zodiak_arr[1039] = 1039; //Лев
                            $zodiak_arr[1042] = 1042; //Стрелец
                            $zodiak_arr[1043] = 1043; //Козерог
                        }
                        if ($char->id == 101) { //Янтарь
                            $zodiak_arr[1039] = 1039; //Лев
                        }
                        if ($char->id == 973) { //Родонит 
                            $zodiak_arr[1040] = 1040; //Весы
                        }
                        if ($char->id == 85) { //Гранат 
                            $zodiak_arr[1041] = 1041; //Скорпион
                            $zodiak_arr[1044] = 1044; //Водолей
                        }
                        if ($char->id == 81) { //Топаз 
                            $zodiak_arr[1041] = 1041; //Скорпион
                        }
                        if ($char->id == 89) { //Лазурит 
                            $zodiak_arr[1042] = 1042; //Стрелец
                        }
                        if ($char->id == 1053) { //Раухтопаз 
                            $zodiak_arr[1043] = 1043; //Козерог
                        }
                        if ($char->id == 1054) { //Азурит 
                            $zodiak_arr[1044] = 1044; //Водолей
                        }
                        if ($char->id == 1055) { //Аквамарин 
                            $zodiak_arr[1044] = 1044; //Водолей
                            $zodiak_arr[1045] = 1045; //Рыбы
                        }
                        if ($char->id == 159) { //Перламутр 
                            $zodiak_arr[1044] = 1044; //Водолей
                            $zodiak_arr[1045] = 1045; //Рыбы
                        }
                        if ($char->id == 154) { //Коралл 
                            $zodiak_arr[1045] = 1045; //Рыбы
                        }
                        if ($char->id == 1056) { //Опал 
                            $zodiak_arr[1045] = 1045; //Рыбы
                        }
                        if ($char->id == 1057) { //Хризолит 
                            $zodiak_arr[1045] = 1045; //Рыбы
                        }

                        if ($char->id == 11) { //Яшма 
                            $zodiak_arr[1042] = 1042; //Стрелец
                            $zodiak_arr[1043] = 1043; //Козерог
                            $zodiak_arr[1038] = 1038; //Дева
                            $zodiak_arr[1035] = 1035; //Телец
                        }
                    }
                    foreach ($zodiak_arr as $key => $value_id) {
                        //Добавляем характеристику
                        if (!$characteristic->isValueProduct($value->id, $value_id)) { //Если у товара нет знака зодиака
                            $characteristic->addValueProduct($value->id, 47, $value_id, 0, 0); //Добавляем характеристику
                        }

                        //Добавляем в категорию
                        $get_zodiak_id = $characteristic->getValueId($value_id);
                        if (isset($get_zodiak_id->name)) {
                            $get_category = $category->getCategoryName($get_zodiak_id->name, 823);
                            if (isset($get_category->id)) {
                                $query = $registry->db->prepare("UPDATE `products`  SET category_" . $_category_count . "_id = :category_id WHERE `id` = :product_id");
                                $query->bindParam(":category_id", $get_category->id, PDO::PARAM_INT, 11);
                                $query->bindParam(":product_id", $value->id, PDO::PARAM_INT, 11);
                                $query->execute();
                                $_category_count++;
                            }
                        }
                    }
                }


//                    echo trim($value->name) . ' (' . trim($name, ', ') . ')' . '<br/>';
            }
        }

        $query = $registry->db->prepare("SELECT products.*,
                
                (SELECT file FROM products_images WHERE product_id = products.id && `type`=3 && is_delete = 0 LIMIT 1) as file, (SELECT article FROM product_mod WHERE product_id = products.id && product_mod.is_delete=0) as article FROM products WHERE 
                 (is_active = 1 && products.is_delete = 0 && products.category_1_id != 0 && (`desc` = '' || `desc` IS NULL))");
        $query->execute();
        $not_char = $query->fetchAll(PDO::FETCH_OBJ);
        $products_not_char = array();
        foreach ($not_char as $key => $value) {
            $products_not_char[$value->category_1_id][] = $value;
        }
        $this->products_not_char = $products_not_char;

        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $category_arr = array();
        foreach ($products_not_char as $category_id => $value) {
            $category_arr[$category_id] = $category->getCategoryId($category_id);
        }
        $this->category_arr = $category_arr;
        if (count($_POST) > 0) {
            CacheModule::delCacheModule('products');
            CacheModule::delCacheModule('category');
            CacheModule::delCacheModule('page');
            CacheModule::delCacheModule('left_podbor');
            $cac = Cache::getInstance();
            $cac->deleteTag('Products');
            $cac->deleteTag('Characteristics');
            $cac->deleteTag('Category');
            $cac->deleteTag('Files');
            $this->menu = $registry->menu;
        }
    }

    public function charAction() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT products.*,
                
                (SELECT file FROM products_images WHERE product_id = products.id && `type`=3 && is_delete = 0 LIMIT 1) as file, (SELECT article FROM product_mod WHERE product_id = products.id && product_mod.is_delete=0) as article FROM products WHERE 
                 (is_active = 1 && products.is_delete = 0 && products.category_1_id != 0 && products.id NOT IN (SELECT product_id FROM characteristic_products WHERE product_id = products.id))");
        $query->execute();
        $not_char = $query->fetchAll(PDO::FETCH_OBJ);
        $products_not_char = array();
        foreach ($not_char as $key => $value) {
            $products_not_char[$value->category_1_id][] = $value;
        }
        $this->products_not_char = $products_not_char;

        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $category_arr = array();
        foreach ($products_not_char as $category_id => $value) {
            $category_arr[$category_id] = $category->getCategoryId($category_id);
        }
        $this->category_arr = $category_arr;

        $this->menu = $registry->menu;
    }

    public function photoAction() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT products.*,
                
                (SELECT file FROM products_images WHERE product_id = products.id && `type`=3 && is_delete = 0 LIMIT 1) as file, (SELECT article FROM product_mod WHERE product_id = products.id && product_mod.is_delete=0) as article FROM products WHERE 
                 (is_active = 1 && products.is_delete = 0 && products.category_1_id != 0 && products.id NOT IN (SELECT product_id FROM products_images WHERE product_id = products.id && `type`=1 && is_delete = 0))");
        $query->execute();




        $not_char = $query->fetchAll(PDO::FETCH_OBJ);
        $products_not_char = array();
        foreach ($not_char as $key => $value) {
            $products_not_char[$value->category_1_id][] = $value;
        }
        $this->products_not_images = $products_not_char;

        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $category_arr = array();
        foreach ($products_not_char as $category_id => $value) {
            $category_arr[$category_id] = $category->getCategoryId($category_id);
        }
        $this->category_arr = $category_arr;

        $this->menu = $registry->menu;
    }

}
