<?php

class discountController extends Controller {

    public function listCategoryAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Discount", "discount");
        $discount = new Discount();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $this->tree = $category->getCategoryTree(0);
        if (isset($this->param['discount_id'])) {
            if (isset($_POST['is_send'])) {
                $discount->delAllDiscountVisible($this->param['discount_id'], 1);
                if (isset($_POST['category_id'])) {
                    foreach ($_POST['category_id'] as $category_id => $value) {
                        $discount->addDiscountVisible($this->param['discount_id'], $category_id, 1);
                    }
                }
                echo "echo '<script type=\"text/javascript\">window.parent.location.href = parent.location.href;parent.$.fancybox.close();</script>';";
            }
            $get_checked = $discount->getDiscountVisible($this->param['discount_id'], 1);

            $get_checked_arr = array();
            foreach ($get_checked as $key => $value) {
                $get_checked_arr[$value->object_id] = 1;
            }
            $this->get_checked_arr = $get_checked_arr;
        }
    }

    public function couponListCodeAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Coupons", "discount");
        $coupons = new Coupons();
        if (isset($this->param['coupon_id'])) {
            $this->get_coupone = $coupons->getCouponId($this->param['coupon_id']);
            $this->code_list = $coupons->getCouponCodeAll($this->param['coupon_id']);
            $this->user_code = $coupons->getCouponUserAllCode();
        }
        $this->menu = $registry->menu;
    }

    public function listBrandAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Discount", "discount");
        $discount = new Discount();
        Lavra_Loader::LoadModels("Brand", "brand");
        $brand = new Brand();
        $this->get_brands = $brand->getBrands($registry->shop_type);



        if (isset($this->param['discount_id'])) {
            if (isset($_POST['is_send'])) {
                $discount->delAllDiscountVisible($this->param['discount_id'], 2);
                if (isset($_POST['brand_id'])) {
                    foreach ($_POST['brand_id'] as $category_id => $value) {
                        $discount->addDiscountVisible($this->param['discount_id'], $category_id, 2);
                    }
                }
                echo "echo '<script type=\"text/javascript\">window.parent.location.href = parent.location.href;parent.$.fancybox.close();</script>';";
            }
            $get_checked = $discount->getDiscountVisible($this->param['discount_id'], 2);

            $get_checked_arr = array();
            foreach ($get_checked as $key => $value) {
                $get_checked_arr[$value->object_id] = 1;
            }
            $this->get_checked_arr = $get_checked_arr;
        }
    }

    public function listBrand() {
        
    }

    /**
     * Купоны
     */
    public function couponsAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Coupons", "discount");
        $coupons = new Coupons();
        if (isset($this->param['message_id'])) {
            switch ($this->param['message_id']) {
                case 1:
                    $this->setMessage('Купон успешно сохранен');
                    break;
                case 2:
                    $this->setMessage('Купон успешно добавлен');
                    break;
                case 3:
                    if (isset($this->param['del_id'])) {
                        $coupons->delCoupon($this->param['del_id']);
                        $coupons->delCouponsCategoryAll($this->param['del_id']);
                        $coupons->delCouponsCodeAll($this->param['del_id']);
                    }
                    $this->setMessage('Купон успешно удален');
                    break;
                case 4:
                    if (isset($this->param['is_active'])) {
                        $coupons->setActive($this->param['edit_id'], $this->param['is_active']);
                    }
                    $this->setMessage('Статус купона успешно сохранен');
                    break;


                default:
                    break;
            }
        }
        $this->coupons = $coupons->getCoupons();
        $this->menu = $registry->menu;
    }

    public function getCouponsAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Coupons", "discount");
        $coupons = new Coupons();
        if (isset($_GET['number'])) {
            Lavra_Loader::LoadModels("Discount", "discount");
            $discount = new Discount();
            $_GET['number'] = trim(str_replace(' ', '', $_GET['number']));

            if (!empty($_GET['number'])) {
                $_SESSION['coupon_code'] = (int) $_GET['number'];
            } else {
                $_SESSION['coupon_code'] = $_GET['number'] = '';
            }
            $sum = $coupons->getCouponSum(trim($_GET['number']));



//if ($sum > $all_sum) {
            if (isset($_GET['is_html']) && $_GET['is_html'] == 1) {
                if ($sum < $this->_setting->min_price) {
                    echo "<script type='text/javascript'>
 $('#min_order_price_block').show();
 $('#order_button').hide();
 $('#order_form').hide();
</script>";
                } else {
                    echo "<script type='text/javascript'>
 $('#min_order_price_block').hide();
 $('#order_button').show();
</script>";
                }

                /**
                 * Узнаем что в корзине и какая скидка
                 */
                Lavra_Loader::LoadModels("Basket", "basket");
                $basket = new Basket();
                $basket_short = $basket->getBasket($registry->session_id);

                
                if ($this->user_id > 0) {
                    $this->discount = $discount->getDiscountSum($basket_short->sum, 1, $this->user_id);
                } else {
                    $this->discount = $discount->getDiscountSum($basket_short->sum, 0, $this->user_id);
                }
                if (($this->discount)) {
                    $this->discount_sum = ($basket_short->sum - ($basket_short->sum * $this->discount) / 100);
                }
//                echo $this->discount_sum . '###' . $sum;
                if ($this->discount_sum < $sum && $sum > 0 && $this->discount_sum > 0) { //Если сумма со скидкой меньше скидки купона
                    exit('Итого: <b style="font-size: 24px;font-weight: normal">' . number_format($basket_short->sum, 0, '', ' ') . '</b> р. <b style="font-size: 20px; color: #e41b1f">- ' . $this->discount . '%</b> = <b style="font-size: 18px; font-weight: normal">' . $this->discount_sum . ' р. </b>');
                } else {

                    if ($sum != 0 && ($_SESSION['coupon_code'] > 0)) {
                        exit('Итого: <b style="font-size: 24px;font-weight: normal">' . number_format($basket_short->sum, 0, '', ' ') . '</b> р. <b style="font-size: 20px; color: #e41b1f">- ' . (100 - ($sum / $basket_short->sum) * 100) . '%</b> = <b style="font-size: 18px; font-weight: normal">' . $sum . ' р. </b>');
                    } elseif ($basket_short->sum > $this->discount_sum && $this->discount_sum > 0) {  //Если есть скидка
                        exit('Итого: <b style="font-size: 24px;font-weight: normal">' . number_format($basket_short->sum, 0, '', ' ') . '</b> р. <b style="font-size: 20px; color: #e41b1f">- ' . $this->discount . '%</b> = <b style="font-size: 18px; font-weight: normal">' . $this->discount_sum . ' р. </b>');
                    } else { //Если нет скидки
                        exit('Итого: <b style="font-size: 24px;font-weight: normal">' . number_format($basket_short->sum, 0, '', ' ') . '</b> р.');
                    }
                }
            } else {
                exit($sum);
            }
        }
    }

    /**
     * Добавить редактировать купон
     */
    public function couponAddAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Coupons", "discount");
        $coupons = new Coupons();

        if (!isset($_POST['day'])) {
            $date = getdate(time() + 5184000);
            $_POST['day'] = $date['mday'];
            $_POST['month'] = $date['mon'];
            $_POST['year'] = $date['year'];
        }
        if (isset($_POST['name'])) {

            $discount_sum = 0;
            $discount_procent = 0;
            if ($_POST['discount_type'] == 0) { //Проценты
                $discount_procent = $_POST['discount'];
            } else { //Рубли
                $discount_sum = $_POST['discount'];
            }
            $end_date = mktime(0, 0, 0, $_POST['month'], $_POST['day'], $_POST['year']);

            $_POST['is_active'] = (isset($_POST['is_active'])) ? $_POST['is_active'] : 0;


            $code_list = explode("\n", trim($_POST['code_list'])); //Парсим весь список купонов

            if (isset($this->param['edit_id']) && $this->param['edit_id'] > 0) { //Если редактирование
                $get_old_coupon_code_list = $coupons->getCouponCodeAll($this->param['edit_id']);
//              
                $exception_del_code = array(); //Исключения кодов, которые не нужно удалять (старых кодов)
                foreach ($get_old_coupon_code_list as $value) {
                    foreach ($code_list as $code) {
                        if (trim($value->code) == trim($code)) {
                            $exception_del_code[$value->id] = trim($value->code);
                        }
                    }
                }
                //Удаляем коды которые не входят в исключения
                $coupons->delCouponsNotException($this->param['edit_id'], $exception_del_code);

                foreach ($code_list as $code) { //Добавление кодов которые не входят в исключения
                    if (!in_array(trim($code), $exception_del_code)) {
                        $coupons->addCouponsCode(trim($code), $this->param['edit_id']);
                    }
                }

                $coupons->delCouponsCodeAll($this->param['edit_id']);
                $coupons->setCoupons($this->param['edit_id'], $_POST['name'], $_POST['type'], $discount_sum, $discount_procent, $_POST['min_sum'], $end_date);
                $coupons->setNextCoupon($this->param['edit_id'], $_POST['code_next_sum'], $_POST['code_next_coupon_id']); //Следующий купон
                $coupon_id = $this->param['edit_id'];
            } else { //Добавление
                $coupon_id = $coupons->addCoupons($_POST['name'], $_POST['type'], $discount_sum, $discount_procent, $_POST['min_sum'], $end_date);
                $coupons->setNextCoupon($coupon_id, $_POST['code_next_sum'], $_POST['code_next_coupon_id']); //Следующий купон

                foreach ($code_list as $code) { //Добавление кодов
                    $coupons->addCouponsCode(trim($code), $coupon_id);
                }
            }


            foreach ($_POST['category_id'] as $category_id) {
                $coupons->addCouponsCategory($category_id, $coupon_id);
            }

            if (isset($this->param['edit_id']) && $this->param['edit_id'] > 0) {
                exit('<script type="text/javascript">parent.location.href="' . ($this->admin_url . 'discount/coupons/1/') . '";parent.$.fancybox.close();</script>');
            } else {
                exit('<script type="text/javascript">parent.location.href="' . ($this->admin_url . 'discount/coupons/2/') . '";parent.$.fancybox.close();</script>');
            }

///xadmin/discount/coupons/
        }

        $this->date_form = Lavra_Loader::getLoadModule("application", "/application/date/1/" . $_POST['year'] . "/" . $_POST['month'] . "/" . $_POST['day'] . "/");

        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $this->category = $category->getCategory(0, -1);

        if (isset($this->param['edit_id']) && $this->param['edit_id'] > 0) {
            $get_cupon = $coupons->getCouponId($this->param['edit_id']);
            $_POST['name'] = $get_cupon->name;
            $_POST['type'] = $get_cupon->type;
            $_POST['code_next_sum'] = $get_cupon->code_next_sum;
            $_POST['code_next_coupon_id'] = $get_cupon->code_next_coupon_id;
            $_POST['min_sum'] = $get_cupon->min_sum;

            $date = getdate($get_cupon->end_date);
            $_POST['day'] = $date['mday'];
            $_POST['month'] = $date['mon'];
            $_POST['year'] = $date['year'];

            if ($get_cupon->discount_sum > 0) { //руб.
                $_POST['discount_type'] = 1;
                $_POST['discount'] = $get_cupon->discount_sum;
            } else { //%
                $_POST['discount_type'] = 0;
                $_POST['discount'] = $get_cupon->discount_procent;
            }
//Список кодов
            $get_code = $coupons->getCouponCodeAll($this->param['edit_id']);
            $_POST['code_list'] = '';
            foreach ($get_code as $value) {
                $_POST['code_list'] .= $value->code . "\n";
            }
//Список категорий
            $get_category = $coupons->getCouponCategory($this->param['edit_id']);
            $_POST['category_id'] = array();
            foreach ($get_category as $value) {
                $_POST['category_id'][$value->category_id] = $value->category_id;
            }
        }

        $this->coupons_list = $coupons->getCoupons();
    }

    public function discountAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Discount", "discount");
        $discount = new Discount();
        if (!empty($_POST['add_sum_end']) && !empty($_POST['add_discount'])) { //Добавление новых записей
            if (!isset($_POST['add_is_auth']))
                $_POST['add_is_auth'] = 0;
            if ($discount->addDiscount($_POST['add_sum_start'], $_POST['add_sum_end'], $_POST['add_discount'], $_POST['add_is_auth'])) {
                $this->redirect($this->MyURL . '1/');
            } else
                $this->setError("При добавлении скидки возникли ошибки");
        }

        if (isset($_POST['discount'])) {
            foreach ($_POST['discount'] as $id => $value) {
                if (!isset($_POST['is_auth'][$id]))
                    $_POST['is_auth'][$id] = 0;
                $discount->editDiscount($id, $_POST['sum_start'][$id], $_POST['sum_end'][$id], $_POST['discount'][$id], $_POST['is_auth'][$id]);
            }
            $this->redirect($this->MyURL . '2/');
        }

        if (isset($this->param['message_id'])) { //Вывод сообщений
            switch ($this->param['message_id']) {
                case 1:
                    $this->setMessage("Успешно добавлено!");
                    break;
                case 2:
                    $this->setMessage("Успешно изменено!");
                    break;
                case 3:
                    if (isset($this->param['del_id'])) {
                        $discount->delDiscount($this->param['del_id']);
                        $discount->delAllDiscountVisible($this->param['del_id'], -1);
                        $this->setMessage("Успешно удалено!");
                    }
                    break;
                case 4:
                    $this->setError("Не найдено!");
                    break;
                default :
                    break;
            }
        }

        $this->discounts = $discount->getDiscount();
        $this->menu = $registry->menu;
    }

}
