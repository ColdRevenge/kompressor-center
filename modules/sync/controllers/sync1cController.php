<?php

class sync1CController extends Controller {

    public function setting_1cAction() {
        $registry = Registry::getInstance();
        if (isset($_POST['send'])) {
            file_get_contents($registry->base_url . 'sync/1c/products/price/');
            $this->setMessage('Успешно обновлено!');
        }
        $this->menu = $registry->menu;
    }

    /**
     * Обновление товаров из 1с выгрузки
     */
    public function productAction() {
        try {
            Lavra_Loader::LoadClass('Application');
            $registry = Registry::getInstance();
            Lavra_Loader::LoadClass('Sync1C');
            Lavra_Loader::LoadModels("Products", "products");
            Lavra_Loader::LoadModels("Mod", "products");
            $mod = new Mod();

            $sync = new Sync1C($registry->files_dir . 'bitrix/import.xml', $registry->files_dir . 'bitrix/offers.xml');

            $sync->syncCategoryes(); //Синхронизируем категории
            //Синхронизируем характеристики и производителей
//            $registry->import_1c = $registry->base_dir . 'files/bitrix/';
//            $this->priceAction();
            $sync->syncCharacteristicsAndBrand('Торговая марка', array('Менеджер', 'Последняя цена', 'ВЭД Предоплата', 'Список', 'Список3', 'Основной поставщик'));
            $sync->syncProducts();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
        /**
     * Обновление цен и остатков на складе
     */
    public function priceAction() {
        try {
            Lavra_Loader::LoadClass('Application');
            $registry = Registry::getInstance();
            Lavra_Loader::LoadClass('Sync1C');
            Lavra_Loader::LoadModels("Products", "products");
            Lavra_Loader::LoadModels("Mod", "products");
            $mod = new Mod();

            $sync = new Sync1C($registry->import_1c . 'import.xml', $registry->import_1c . 'offers.xml');
            $products = $sync->getProducts();
            $products_price = $sync->getProductsPrice();

            foreach ($products as $product_id => $value) {
                if (isset($products_price[$product_id])) { //Если товар с ценой
                    if (!empty($value['article'])) { //Если артикул не пустой
                        $products = new Products();
                        $get_product = $products->getProductArticle(trim($value['article']));
                        if (isset($get_product->id)) { //Если продукт существует
                            $price = (isset($products_price[$product_id]['price'][0]) && isset($products_price[$product_id]['price'][0]['price'])) ? $products_price[$product_id]['price'][0]['price'] : 0;
                            $price_1 = (isset($products_price[$product_id]['price'][1]) && isset($products_price[$product_id]['price'][1]['price'])) ? $products_price[$product_id]['price'][1]['price'] : 0;
                            $price_2 = (isset($products_price[$product_id]['price'][2]) && isset($products_price[$product_id]['price'][2]['price'])) ? $products_price[$product_id]['price'][2]['price'] : 0;
                            $price_3 = (isset($products_price[$product_id]['price'][3]) && isset($products_price[$product_id]['price'][3]['price'])) ? $products_price[$product_id]['price'][3]['price'] : 0;
                            $price_4 = (isset($products_price[$product_id]['price'][4]) && isset($products_price[$product_id]['price'][4]['price'])) ? $products_price[$product_id]['price'][4]['price'] : 0;
                            $price_5 = (isset($products_price[$product_id]['price'][5]) && isset($products_price[$product_id]['price'][5]['price'])) ? $products_price[$product_id]['price'][5]['price'] : 0;
                            $price_6 = (isset($products_price[$product_id]['price'][6]) && isset($products_price[$product_id]['price'][6]['price'])) ? $products_price[$product_id]['price'][6]['price'] : 0;
                            $price_7 = (isset($products_price[$product_id]['price'][7]) && isset($products_price[$product_id]['price'][7]['price'])) ? $products_price[$product_id]['price'][7]['price'] : 0;
                            $price_8 = (isset($products_price[$product_id]['price'][8]) && isset($products_price[$product_id]['price'][8]['price'])) ? $products_price[$product_id]['price'][8]['price'] : 0;
                            $price_9 = (isset($products_price[$product_id]['price'][9]) && isset($products_price[$product_id]['price'][9]['price'])) ? $products_price[$product_id]['price'][9]['price'] : 0;
                            $price_10 = (isset($products_price[$product_id]['price'][10]) && isset($products_price[$product_id]['price'][10]['price'])) ? $products_price[$product_id]['price'][10]['price'] : 0;

                            $mod->setModPrice(trim($value['article']), $price, $price_1, $price_2, $price_3, $price_4, $price_5, $price_6, $price_7, $price_8, $price_9, $price_10, 0, $products_price[$product_id]['warehouse']);
                        }
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    /**
      [cbcf4972-55bc-11d9-848a-00112f43529a] => Array
      (
      [article] => Арт-33344555
      [name] => Ассорти (конфеты)
      [price] => Array
      (
      [0] => Array
      (
      [price] => 3.11
      [currency] => USD
      )

      [1] => Array
      (
      [price] => 3.42
      [currency] => USD
      )

      [2] => Array
      (
      [price] => 111.00
      [currency] => руб
      )

      [3] => Array
      (
      [price] => 3.40
      [currency] => USD
      )

      [4] => Array
      (
      [price] => 3.73
      [currency] => USD
      )

      )

      [warehouse] => 537.00
      )
     */
}
