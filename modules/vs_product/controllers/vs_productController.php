<?php

class vs_productController extends Controller {

    public function vs_productAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        $characteristic = new Characteristics();
        Lavra_Loader::LoadModels('vsProduct', 'vs_product');
        $vs = new vsProduct();
        $get_products = array();
        $characteristics_product = array();
        // var_dump($_SESSION['vs_product'], $this->param['category_id']);
        $is_characteristics_product = array(); //Ключи - это id доступных для сравнения характеристик
        if (isset($this->param['category_id']) && isset($_SESSION['vs_product'])) { //Если вывод нужен по категориям
            $categoryId = $vs->getRootCategory($this->param['category_id']);

            foreach ($_SESSION['vs_product'] as $product_id => $value) {

                if (isset($value[$categoryId])) { //Только продукты открытой рутовой категории
                    $get_products[$product_id] = $vs->getPrpductId($product_id);
                    $characteristics_product[$product_id] = $characteristic->getCharacteristicValueProduct($product_id);

                    //Для проверки доступности характеристик
                    if (count($characteristics_product[$product_id])) {
                        foreach ($characteristics_product[$product_id] as $is_char_value) {
                            $is_characteristics_product[$is_char_value->characteristic_id] = 1;
                        }
                    }
                }
            }
            //Отличающиеся характеристики
            $diff = array();
            $_tmp_diff = array();
            $diff_characteristic = array(); //Массив с характеристиками и продуктами которые их содержат
            foreach ($characteristics_product as $product_id => $value) {
                foreach ($value as $value_2) {
                    if (isset($_tmp_diff[$value_2->characteristic_id])) {
                        if ($_tmp_diff[$value_2->characteristic_id] != $value_2->value_name) {
                            $diff[$value_2->characteristic_id] = 1;
                        }
                    } else {
                        $_tmp_diff[$value_2->characteristic_id] = $value_2->value_name;
                    }
                    $diff_characteristic[$value_2->characteristic_id][$product_id] = 1;
                }
            }
            $this->diff_characteristic = $diff_characteristic;
            $this->diff = $diff;
        } elseif (isset($_SESSION['vs_product'])) { //Вывод всех товаров к сравнению
            foreach ($_SESSION['vs_product'] as $product_id => $value) {


                $get_products[$product_id] = $vs->getPrpductId($product_id);
                $characteristics_product[$product_id] = $characteristic->getCharacteristicValueProduct($product_id);

                //Для проверки доступности характеристик
                if (count($characteristics_product[$product_id])) {
                    foreach ($characteristics_product[$product_id] as $is_char_value) {
                        $is_characteristics_product[$is_char_value->characteristic_id] = 1;
                    }
                }
            }
        }
        //Спиок всех характеристик
        $char_all = $characteristic->getCharacteristics($this->param['category_id']);
        //Очищаем не используемые характеристики
        $char_all_copy = $char_all;
        foreach ($char_all_copy as $key => $value) {
            if (!isset($is_characteristics_product[$value->id])) {
                unset($char_all[$key]);
            }
        }
        $this->char_all = $char_all;
        $this->get_products = $get_products;
        $this->characteristics_product = $characteristics_product;
    }

    public function addAction() {

        $result = 0;
        if (isset($this->param['product_id'])) { //Если передан продукт
            $this->param['product_id'] = (int) $this->param['product_id'];
            Lavra_Loader::LoadModels('vsProduct', 'vs_product');
            $vs = new vsProduct();
            $category_id_1 = $vs->isProduct($this->param['product_id']);
            if ($category_id_1) { //Если продукт существует
                if (isset($_SESSION['vs_product'])) {
                    if (isset($_SESSION['vs_product'][$this->param['product_id']])) { //Если Продукт уже добавлен
                        $result = - 1;
                    } else { //Если продукт не добавлен, и его нужно добавить
                        $_SESSION['vs_product'][$this->param['product_id']][$vs->getRootCategory($category_id_1)] = $this->param['product_id']; //Добавляем продукт
                        $result = 1;
                    }
                } else { //Если продукт не добавлен, то добавляем
                    $_SESSION['vs_product'][$this->param['product_id']][$vs->getRootCategory($category_id_1)] = $this->param['product_id']; //Добавляем продукт
                    $result = 1;
                }
            } else
                $result = -1;
        } else
            $result = -1; //Ошибка

        echo json_encode(array('answer' => $result));
    }

    public function delAction() {
        $result = 0;
        if (isset($this->param['product_id'])) { //Если передан продукт
            if (isset($_SESSION['vs_product'][$this->param['product_id']])) {
                unset($_SESSION['vs_product'][$this->param['product_id']]);
                
                $result = 1;
            }
        } else {
            $result = -1; //Ошибка
        }
        if (isset($_GET['is_modal']) && isset($_GET['category_id'])) {
            $this->redirect($this->url . 'vs_product/' .$_GET['category_id']. '/?is_modal=1&is_blue_bg=1');
        } else {
            echo json_encode(array('answer' => $result));
        }
    }

}
