<?php

class basketController extends Controller {

    /**
     * Возвращает цену с пересчетом на b2b
     * Возможен конфликт с системой скидок! Проверить!
     */
    private function _getB2bConversion($baskets) {
        $registry = Registry::getInstance();
        if ($registry->is_b2b == true) { //Если включен режим B2B
            $all_price = 0;
            foreach ($baskets as $value) { //Проходим по всей корзине и счетаем общую сумму
                $all_price += $value->sum_price;
            }

            $b2b_num = $registry->setting_obj->getB2bNum($all_price);
            if (isset($b2b_num->b2b_num)) {
                $get_b2b_num = $b2b_num->b2b_num;
            } else {
                $get_b2b_num = $this->b2b_price;
            }
            $return_price = 0;
            if ($this->b2b_price < $get_b2b_num) { //Если пользователь перешел на след. колонку
                Lavra_Loader::LoadModels("Mod", "products");
                $mod = new Mod();
                foreach ($baskets as $key => $value) {
                    $get_mod = $mod->getModId($value->mod_id);
                    $price = $baskets[$key]->price;
                    switch ($get_b2b_num) {
                        case 0: $price = $get_mod->price;
                            break;
                        case 1: $price = $get_mod->price_1;
                            break;
                        case 2: $price = $get_mod->price_2;
                            break;
                        case 3: $price = $get_mod->price_3;
                            break;
                        case 4: $price = $get_mod->price_4;
                            break;
                        case 5: $price = $get_mod->price_5;
                            break;
                        case 6: $price = $get_mod->price_6;
                            break;
                        case 7: $price = $get_mod->price_7;
                            break;
                        case 8: $price = $get_mod->price_8;
                            break;
                        case 9: $price = $get_mod->price_9;
                            break;
                        case 10: $price = $get_mod->price_10;
                            break;
                    }
                    $return_price += $price * $value->count;
                }
            }
            return $return_price;
        }
    }

    function checkHidePrices() {
        $registry = Registry::getInstance();
        if ($this->setting->hide_prices) {
            header("location: " . $registry->base_url . '404/');
            // header("HTTP/1.0 404 Not Found");
            exit;
        }
    }

    /**
     * Подробное содержание корзины
     */
    public function basket_detailedAction() {
        define('hideBasketWidget', true);
        $this->checkHidePrices();
        $registry = Registry::getInstance();

        Lavra_Loader::LoadModels('Setting', 'setting');
        $setting = new Setting();
        $set = $setting->getGeneral();
        $this->setting = $set;

        $registry = Registry::getInstance();
        $registry->head_title = 'Корзина товаров - интернет магазин "' . $registry->shop_name . '"';


        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Basket", "basket");
        $basket = new Basket();

        $baskets = $basket->getBasketDetailed($registry->session_id);



        if (isset($registry->get_user->coupon_code_id) && $registry->get_user->coupon_code_id > 0) {
            Lavra_Loader::LoadModels("Coupons", "discount");
            $coupons = new Coupons();
            $get_coupon = $coupons->getCouponCodeId($registry->get_user->coupon_code_id);
            if (isset($get_coupon->code)) {
                $this->user_coupon_code = $get_coupon->code;
            }
        }

        $registry->is_lady_shop = 0;
        $is_size_model_repeat = array(); //Если покупатель заказывает одну вещь разных размеров


        foreach ($baskets as $key => $value) { //Конвертим в нужную валюту
            if ($value->currency_id != $this->_default_currency->id) {
                $baskets[$key]->price = $value->price / $this->_default_currency->exchange;
                $baskets[$key]->sum_price = $value->sum_price / $this->_default_currency->exchange;
            }
            if ($value->shop_id == 2 || $value->shop_id == 5) {
                $registry->is_lady_shop = 1;
                $is_size_model_repeat[$value->product_id][$value->char_name_1] = 1;
            }
        }
        $this->is_size_model_repeat = $is_size_model_repeat;
        $this->basket = $baskets;
        if (isset($this->param['not_detailed'])) {
            $notDetailed = $this->param['not_detailed'];
            if (strlen($notDetailed) > 1){
                header("location: " . $registry->base_url . '404/');
            }
            $this->not_detailed = $notDetailed;
        } else {
            $this->not_detailed = 0;
        }
        $this->order_form = Lavra_Loader::getLoadModule('order', '/order/');
        /**
         * Скидки
         */
        Lavra_Loader::LoadModels("Discount", "discount");
        $discount = new Discount();
        $basket_short = $basket->getBasket($registry->session_id);
        if (isset($basket_short->sum)) {
            $this->sum_basket = $basket_short->sum;

            if ($this->user_id > 0) {
                $this->discount = $discount->getDiscountSum($basket_short->sum, 1, $this->user_id);
            } else {
                $this->discount = $discount->getDiscountSum($basket_short->sum, 0, $this->user_id);
            }
            if (($this->discount)) {
                $this->discount_sum = ($basket_short->sum - ($basket_short->sum * $this->discount) / 100);
            }
            //До след. скидки осталось
            $this->lacking_discount = $discount->getNextDiscount($basket_short->sum, 0, $this->user_id);
        }

        //Бесплатная доставка от:
        Lavra_Loader::LoadModels("Delivery", "delivery");
        $delivery = new Delivery();
        $this->lacking = $delivery->getDeliverySumFree();
//        Lavra_Loader::LoadModels("Characteristics", "characteristics");
//        $characteristic = new Characteristics();
//        $this->sizes = $characteristic->getBasketValues($registry->session_id);
//        print_r($this->sizes);
//
    }

    /**
     * Вывод корзины
     */
    public function basketAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Basket", "basket");
        $basket = new Basket();
//        $baskets = $basket->getBasket($registry->session_id);
//
//        if ($registry->shop_default_currency->id != $this->_default_currency->id) {
//            $baskets->sum =
//                    $baskets->sum / $this->_default_currency->exchange;
//        }
//        $this->basket = $baskets;
//        $get_det_basket = $basket->getBasketDetailed($registry->session_id);
        $get_det_basket = $basket->getBasketDetailedShort($registry->session_id);

        $count = 0;
        $price = 0;
        foreach ($get_det_basket as $value) {
            $count = $count + $value->count;
            $price = $price + $value->sum_price;
        }

        $registry->basket_count = $this->basket_count = $count;
        $this->basket_price = ceil($price);

        Lavra_Loader::LoadModels("Discount", "discount");
        $discount = new Discount();
        if ($this->user_id > 0) {
            $this->discount = $discount->getDiscountSum($price, 1, $this->user_id);
        } else {
            $this->discount = $discount->getDiscountSum($price, 0, 0);
        }

        if ($this->discount) {
            $this->discount_sum = (int) ($price - ($price * $this->discount) / 100);
        }
    }

    /**
     * Информация о товарах в корзине
     */
    public function basketAddInfoAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Products", "products");
        Lavra_Loader::LoadModels("Basket", "basket");

        $products = new Products();
        $basket = new Basket();
        $baskets = $basket->getBasket($registry->session_id);
        if ($registry->shop_default_currency->id != $this->_default_currency->id) {
            $baskets->sum = $baskets->sum / $this->_default_currency->exchange;
        }
        $this->basket = $baskets;

        $this->error_info = 0;
        if (!isset($this->param['count']))
            $this->error_info = 1;
        if (isset($this->param['product_id'])) { //Проверка, если товар в наличии, или нет
            if (!$products->isProduct($this->param['product_id'], $this->param['count'])) {
                $this->error_info = 1;
            }
        }
        Lavra_Loader::LoadModels("Discount", "discount");
        $discount = new Discount();
        if ($this->user_id > 0) {
            $this->discount = $discount->getDiscountSum($this->basket->sum, 1, $this->user_id);
        } else {
            $this->discount = $discount->getDiscountSum($this->basket->sum, 0, $this->user_id);
        }
        // $this->discount = $discount->getDiscountSum($this->basket->sum, 0);
        if ($this->discount) {
            $this->discount_sum = ($this->basket->sum - ($this->basket->sum * $this->discount) / 100);
        }
    }

    /**
     * Информация о нехватке средств
     */
    public function basketAddOrderInfoAction() {


        Lavra_Loader::LoadModels('Setting', 'setting');
        $setting = new Setting();
        $set = $setting->getGeneral();
        $this->setting = $set;
    }

    /**
     * Добавление товара
     */
    public function addAction() {
        $registry = Registry::getInstance();

        if (isset($this->param['product_id'])) {

            Lavra_Loader::LoadModels("Products", "products");
            Lavra_Loader::LoadModels("Basket", "basket");
            Lavra_Loader::LoadModels("Mod", "products");
            $products = new Products();
            $basket = new Basket();
            if (!isset($this->param['image_id'])) {
                $this->param['image_id'] = 0;
            }
            if ($products->isProduct($this->param['mod_id'], $this->param['count']) && $this->param['count'] > 0 || 0 == 0) { //Если товар в наличии
                $mod = new Mod();




                $get_mod = $mod->getModId($this->param['mod_id']);
                if (isset($get_mod->id)) {
                    $price = $get_mod->price;
                    $b2b_price_num = 0;
                    if (isset($_SESSION['b2b_price'])) { //Если есть b2b цены
                        $b2b_price_num = $_SESSION['b2b_price'];
//                        switch ($b2b_price_num) {
//                            case 1:
//                                $price = $get_mod->price_1;
//                                break;
//                            case 2:
//                                $price = $get_mod->price_2;
//                                break;
//                            case 3:
//                                $price = $get_mod->price_3;
//                                break;
//                            case 4:
//                                $price = $get_mod->price_4;
//                                break;
//                            case 5:
//                                $price = $get_mod->price_5;
//                                break;
//                            case 6:
//                                $price = $get_mod->price_6;
//                                break;
//                            case 7:
//                                $price = $get_mod->price_7;
//                                break;
//                            case 8:
//                                $price = $get_mod->price_8;
//                                break;
//                            case 9:
//                                $price = $get_mod->price_9;
//                                break;
//                            case 10:
//                                $price = $get_mod->price_10;
//                                break;
//                        }
                    }
                    //Если валюта товара не равна установленной по-умолчанию в магазине, конвертируем
                    $default_currency_id = $registry->shop_default_currency->id;
                    if ($get_mod->currency_id != $registry->shop_default_currency->id) {
                        /* Схема будет работать только если требуется 2 валюты, и по умолчанию рубль */
                        /* Если нужно 3 и больше, то дописать (перевод в валюту по-умолчанию) */
                        $currency = new Currency();
                        $curr = $currency->getCurrencyId($get_mod->currency_id);


                        $price = $price * $curr->exchange;
                    }

                    /**
                     * Ищем скидку для категории или скидку для бренда
                     */
                    $discount = $this->_discountObject($products, $this->param['product_id']);
                    $discount_price = 0; //Сумма скидки
                    $discount_info = null;
                    if ($discount > 0) {
                        $discount_price = $price - $price * (1 - ($discount / 100));
                        $price = $price * (1 - ($discount / 100));
                        $discount_info = $discount;
                    }
                    if ($registry->shop == 'lady' || $registry->shop == 'woman') {
                        $is_change_old_price = false;
                        if ($this->param['char_1_id'] > 0) {
                            Lavra_Loader::LoadModels("Characteristics", "characteristics");
                            $characteristic = new Characteristics();
                            $product_characteristic_size = $characteristic->getProductValuesCharAll(62, $this->param['product_id'], $registry->shop_type);
                            $get_char_1 = $characteristic->getValueId($this->param['char_1_id']);
                            if (isset($get_char_1->name) && $get_char_1->name > 0) {
                                if (isset($product_characteristic_size[$this->param['product_id']]) && count($product_characteristic_size[$this->param['product_id']])) {
                                    $is_change_old_price = true;
                                    foreach ($product_characteristic_size[$this->param['product_id']] as $value_size) {
                                        if ((int) $get_char_1->name == (int) $value_size->name) {
                                            $is_change_old_price = false;
                                        }
                                    }
                                }
                            }
                        }
                        if ($is_change_old_price == true) {
                            $get_product = $products->getPrpductId($this->param['product_id']);
                            if (isset($get_product->id)) {
                                if ($get_product->old_price > 0) {
                                    $price = $get_product->old_price;
                                }
                            }
                        }
                    }

                    $price = $price * $this->_setting->mark_up;
                    if ($registry->is_rounding == 1) {
                        $price = $price - $price%10;
                    }
                    if (isset($this->param['count']) && $this->param['count'] > 0) {
                        if (isset($this->param['not_delete']) && $this->param['not_delete'] == 1) {
                            
                        } else {
                            $basket->delModCharAll($this->param['mod_id'], $this->param['char_1_id'], $registry->session_id);
                        }
                        for ($i = 0; $i < $this->param['count']; $i++) {
                            $basket->add($this->param['mod_id'], $this->param['product_id'], $this->param['image_id'], $price, $discount_price, $discount_info, $default_currency_id, $b2b_price_num, $this->param['char_1_id'], $this->param['char_2_id'], $this->param['char_3_id'], (isset($_GET['is_credit']) ? (int) $_GET['is_credit'] : 0), $registry->session_id);
                        }
                    } else {
                        $basket->add($this->param['mod_id'], $this->param['product_id'], $this->param['image_id'], $price, $discount_price, $discount_info, $default_currency_id, $b2b_price_num, $this->param['char_1_id'], $this->param['char_2_id'], $this->param['char_3_id'], (isset($_GET['is_credit']) ? (int) $_GET['is_credit'] : 0), $registry->session_id);
                    }
                } else
                    $this->setError("Товар битый, нет модов");
            } else
                $this->setError("Товара нет в наличии");
            $this->basketAction(); //Обновляем корзину
        }
    }

    private function _discountObject(Products $products, $product_id) {
        Lavra_Loader::LoadModels("Discount", "discount");
        $discount = new Discount();
        $get_products = $products->getPrpductId($product_id);

        /**
         * Подсчет скидки для всей категории товара
         */
        $is_discount_category = $discount->getDiscountVisibleObject($get_products->category_1_id, 1);
        $discount_cateogry = 0;
        if (isset($is_discount_category->id)) {
            $discount_cateogry = $is_discount_category->discount;
        }
        /**
         * Подсчет скидки для всего производителя товара
         */
        $discount_brand = 0;
        if ($get_products->brand_id > 0) {
            $is_discount_category = $discount->getDiscountVisibleObject($get_products->brand_id, 2);
            if (isset($is_discount_category->id)) {
                $discount_brand = $is_discount_category->discount;
            }
        }
        /**
         * Ищем большУю скидку
         */
        $discount_procent = 0;
        if ($discount_cateogry != 0 || $discount_brand != 0) {
            if ($discount_cateogry > $discount_brand) {
                $discount_procent = $discount_cateogry;
            } else {
                $discount_procent = $discount_brand;
            }
        }
        return $discount_procent;
    }

    /**
     * Удаление товара
     */
    public function delAction() {
        $registry = Registry::getInstance();

        if (isset($this->param['product_id'])) {
            Lavra_Loader::LoadModels("Basket", "basket");
            $basket = new Basket();
            $registry->db->beginTransaction();
            if (isset($_GET['is_one']) && $_GET['is_one'] == 1) { //Удаление 1 позиции
                if (isset($_GET['char_1_id'])) {
                    $this->param['char_1_id'] = $_GET['char_1_id'];
                }
                $basket->del($this->param['mod_id'], $this->param['product_id'], (isset($this->param['char_1_id']) ? $this->param['char_1_id'] : 0),$registry->session_id); //По щтучно
            } else { //Удаление всех позиций
                if (isset($_GET['char_1_id'])) {
                    $this->param['char_1_id'] = $_GET['char_1_id'];
                }
                $basket->delModCharAll($this->param['mod_id'], $this->param['char_1_id'], $registry->session_id);
            }
            $registry->db->commit();
            $this->basketAction(); //Обновляем корзину
        }
    }

    /**
     * Смотрим есть ли товар в наличии 
     */
    public function isWarehouseProductAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Basket", "basket");
        $basket = new Basket();
        $result = $basket->isWarehouseProduct($this->param['product_id'], $this->param['mod_id'], $registry->session_id);

        if (isset($result['count'])) {
            if ($result['count'] <= $result['warehouse']) {
                //Warning: json_decode() expects parameter 1 to be string, array given in /var/www/padre03/data/www/to-connect.ru/modules/basket/controllers/basketController.php on line 201
                echo json_encode($result);
                exit();
            }
            exit();
        }
        exit();
    }

}
