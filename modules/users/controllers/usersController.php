<?php

class usersController extends Controller {

    /**
     * История заказов
     */
    public function ordersAction() {
        Lavra_Loader::LoadModels("Order", "order");
        $order = new Order();
        if (isset($this->param['user_id'])) {
            Lavra_Loader::LoadClass('Users');
            $users = new Users();
            $this->users = $users->getUserId($this->param['user_id']);
            $get_orders = $order->getOrderUsers($this->param['user_id']);
            $products = array();
            foreach ($get_orders as $key => $value) {
                $products[$value->id] = $order->geProductsOrderId($value->id);
            }
            $this->orders = $get_orders;
            $this->products = $products;
        }
    }

    public function adminAction() {
        $this->get_user = null;
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Users");
        $users = new Users();
        if (!isset($this->param['user_type'])) { //Если user_type не задан, то редиректим
            $this->redirect($this->admin_url . 'users/admin/0/');
        }
        $this->user_type = $this->param['user_type'] = (int) $this->param['user_type'];

        if (isset($this->param['del_id'])) {
            $users->delUser($this->param['del_id']);
            $this->redirect($this->admin_url . 'users/admin/' . $this->param['user_type'] . '/?success=3');
        }

        if (isset($_GET['success'])) {
            switch ($_GET['success']) {
                case 1:
                    $this->setMessage('Успешно добавлен!');
                    break;
                case 2:
                    $this->setMessage('Успешно сохранен!');
                    break;
                case 3:
                    $this->setMessage('Успешно удален!');
                    break;
                default:
                    break;
            }
        }
        if (isset($this->param['is_add']) || isset($this->param['user_id'])) {
            $this->list_edit = 1;

            Lavra_Loader::LoadModels("Metro", "metro");
            $metro = new Metro();
            $this->metro = $metro->getStantions();

            $this->access = $registry->all_access;

            if (isset($this->param['user_id'])) {
                $get_user = $users->getUserId($this->param['user_id']);

                if (isset($get_user->id)) { //Если пользователь найден
                    Lavra_Loader::LoadModels("Coupons", "discount");
                    $coupon = new Coupons();
                    $coupon_code = $coupon->getCouponCodeId($get_user->coupon_code_id);

                    if (isset($coupon_code->id)) {
                        $this->coupon_code = $coupon_code->code;
                    }
                    if (!isset($_POST['day'])) { //Подгрузка даты
                        $date = getdate($get_user->birth_day);
                        $_POST['day'] = $date['mday'];
                        $_POST['month'] = $date['mon'];
                        $_POST['year'] = $date['year'];
                    }
                    $this->get_user = $get_user;
                    $this->my_access = unserialize($get_user->access);
                    $this->user_type = $get_user->user_type;
                } else {
                    throw new Exception('Пользователь не найден');
                }
            } else { //Подгрузка даты
                if (!isset($_POST['day'])) {
                    $date = getdate();
                    $_POST['day'] = $date['mday'];
                    $_POST['month'] = $date['mon'];
                    $_POST['year'] = $date['year'];
                }
            }


            $this->date_form = Lavra_Loader::getLoadModule("application", "/application/date/1/" . $_POST['year'] . "/" . $_POST['month'] . "/" . $_POST['day'] . "/");

            if (isset($_POST['name'])) { //Редактирование / добавление
                $default_currency_id = 1;

                if (!isset($get_user->id)) { //Если пользователь не найден
                    $default_fields = array('is_visible_unassigned_order' => 0, 'login' => '', 'password' => '', 'name' => '', 'last_name' => '', 'middle_name' => '', 'phone' => '', 'email' => '', 'email_2' => '', 'email_3' => '', 'city' => '', 'city_index' => '', 'adress' => '', 'profession' => '', 'metro_id' => 0, 'icq' => '', 'birth_day' => 0, 'info' => '', 'company_name' => '', 'company_fax' => '', 'company_inn' => '', 'company_ur_adress' => '', 'company_bank' => '', 'company_bik' => '', 'company_rs' => '', 'company_ks' => '', 'company_kpp' => '', 'company_okpo' => '', 'company_oknx' => '', 'company_fio_director' => '', 'company_fio_accountant' => '', 'param_str_1' => '', 'param_str_2' => '', 'param_str_3' => '', 'b2b_price' => 0, 'is_jur_person' => 0, 'is_mailer' => 0, 'is_mailer_2' => 0, 'user_type' => 0);
                } else {
                    $default_fields = array('is_visible_unassigned_order' => 0, 'login' => $get_user->login, 'password' => $get_user->password, 'name' => $get_user->name, 'last_name' => $get_user->last_name, 'middle_name' => $get_user->middle_name, 'phone' => $get_user->phone, 'email' => $get_user->email, 'email_2' => $get_user->email_2, 'email_3' => $get_user->email_3, 'city' => $get_user->city, 'city_index' => $get_user->city_index, 'adress' => $get_user->adress, 'profession' => $get_user->profession, 'metro_id' => $get_user->metro_id, 'icq' => $get_user->icq, 'birth_day' => $get_user->birth_day, 'info' => $get_user->info, 'company_name' => $get_user->company_name, 'company_fax' => $get_user->company_fax, 'company_inn' => $get_user->company_inn, 'company_ur_adress' => $get_user->company_ur_adress, 'company_bank' => $get_user->company_bank, 'company_bik' => $get_user->company_bik, 'company_rs' => $get_user->company_rs, 'company_ks' => $get_user->company_ks, 'company_kpp' => $get_user->company_kpp, 'company_okpo' => $get_user->company_okpo, 'company_oknx' => $get_user->company_oknx, 'company_fio_director' => $get_user->company_fio_director, 'company_fio_accountant' => $get_user->company_fio_accountant, 'param_str_1' => $get_user->param_str_1, 'param_str_2' => $get_user->param_str_2, 'param_str_3' => $get_user->param_str_3, 'b2b_price' => $get_user->b2b_price, 'is_jur_person' => $get_user->is_jur_person, 'is_mailer' => 0, 'is_mailer_2' => 0, 'user_type' => $get_user->user_type);
                }

                foreach ($default_fields as $key => $value) {
                    if (!isset($_POST[$key])) {
                        $_POST[$key] = $value;
                    } else {
                        $_POST[$key] = trim($_POST[$key]);
                    }
                }
                if (!$users->isLogin($_POST['login'], (isset($get_user->id)) ? $get_user->id : 0)) { //Проверка на существование логина
                    if (isset($get_user->id)) {
                        $users->edit($get_user->id, $_POST['login'], $_POST['password'], $_POST['name'], $_POST['last_name'], $_POST['middle_name'], $_POST['phone'], $_POST['email'], $_POST['email_2'], $_POST['email_3'], $_POST['city'], $_POST['city_index'], $_POST['adress'], $_POST['profession'], $_POST['metro_id'], $_POST['icq'], mktime(0, 0, 0, $_POST['month'], $_POST['day'], $_POST['year']), $_POST['info'], $_POST['company_name'], $_POST['company_fax'], $_POST['company_inn'], $_POST['company_ur_adress'], $_POST['company_bank'], $_POST['company_bik'], $_POST['company_rs'], $_POST['company_ks'], $_POST['company_kpp'], $_POST['company_okpo'], $_POST['company_oknx'], $_POST['company_fio_director'], $_POST['company_fio_accountant'], $_POST['param_str_1'], $_POST['param_str_2'], $_POST['param_str_3'], $_POST['b2b_price'], $default_currency_id, $_POST['is_jur_person'], $_POST['is_mailer'], $_POST['is_mailer_2'], $_POST['user_type']);
                        //$this->get_user = $users->getUserId($this->param['user_id']); //Обновляем данные пользователя
                        if ($_POST['user_type'] == 1 || $_POST['user_type'] == 2) { //Если админ или манагер
                            if (isset($_POST['start_access_link'])) {
                                $users->setStartAccessLink($get_user->id, $_POST['start_access_link']);
                            }
                            $users->setAccess($get_user->id, serialize($this->_getNewAccessPost()));
                            $users->setVisibleUnassignedOrder($get_user->id, $_POST['is_visible_unassigned_order']); //Устанавливаем видит пользователь не назначенные заказы или нет
                        } else { //Если редактирование и тип не админ и манагер то обнуляем права
                            $users->setAccess($get_user->id, "");
                        }


                        if (isset($_POST['manager_id'])) {
                            $users->setManager($get_user->id, $_POST['manager_id']);
                        }

                        if (isset($_GET['is_modal']) && $_GET['is_modal'] == 1) {
                            exit('<script type="text/javascript">parent.location.href=parent.location.href;parent.$.fancybox.close();</script>');
                        } else {
                            header("Location: " . $this->admin_url . 'users/admin/' . $_POST['user_type'] . '/?success=2');
                        }
                    } else {
                        $user_id = $users->add($_POST['login'], $_POST['password'], $_POST['name'], $_POST['last_name'], $_POST['middle_name'], $_POST['phone'], $_POST['email'], $_POST['email_2'], $_POST['email_3'], $_POST['city'], $_POST['city_index'], $_POST['adress'], $_POST['profession'], $_POST['metro_id'], $_POST['icq'], mktime(0, 0, 0, $_POST['month'], $_POST['day'], $_POST['year']), $_POST['info'], $_POST['company_name'], $_POST['company_fax'], $_POST['company_inn'], $_POST['company_ur_adress'], $_POST['company_bank'], $_POST['company_bik'], $_POST['company_rs'], $_POST['company_ks'], $_POST['company_kpp'], $_POST['company_okpo'], $_POST['company_oknx'], $_POST['company_fio_director'], $_POST['company_fio_accountant'], $_POST['param_str_1'], $_POST['param_str_2'], $_POST['param_str_3'], $_POST['b2b_price'], $_SERVER['REMOTE_ADDR'], $default_currency_id, $_POST['is_jur_person'], $_POST['is_mailer'], $_POST['is_mailer_2'], $_POST['user_type']);
                        if (isset($_POST['start_access_link'])) {
                            $users->setStartAccessLink($user_id, $_POST['start_access_link']);
                        }
//                        header("Location: ".$this->admin_url . 'users/admin/edit/'.$user_id.'/?success=1');
                        if ($_POST['user_type'] == 1 || $_POST['user_type'] == 2) { //Если админ или манагер
                            $users->setAccess($user_id, serialize($this->_getNewAccessPost()));
                            $users->setVisibleUnassignedOrder($user_id, $_POST['is_visible_unassigned_order']); //Устанавливаем видит пользователь не назначенные заказы или нет
                        }
                        if (isset($_POST['manager_id'])) {
                            $users->setManager($user_id, $_POST['manager_id']);
                        }

                        header("Location: " . $this->admin_url . 'users/admin/' . $_POST['user_type'] . '/?success=1');
                    }
                } else {
                    $this->setError('Логин <b>' . $_POST['login'] . '</b> занят');
                }
            }
        } elseif (isset($_POST['price'])) { //B2B
            foreach ($_POST['price'] as $user_id => $b2b_price) {
//                $users->setIsMailer($user_id, (isset($_POST['is_mailer'][$user_id]) && $_POST['is_mailer'][$user_id] == 1 ? 1 : 0));
                $users->setB2B($user_id, $b2b_price);

                if (isset($_POST['manager_id'][$user_id])) { //Если выбран менеджер
                    $users->setManager($user_id, $_POST['manager_id'][$user_id]);
                }
            }
            $this->setMessage("Успешно сохранено!");
        }

        if (isset($_POST['find'])) { //Поиск 
            $this->users = $users->getSearchUsers($_POST['find'], $_POST['manager_id']);
        } else {
            $this->users = $users->getUsers($this->param['user_type']);
        }
        $this->managers = $users->getUsers(2);



        $this->menu = $registry->menu;
    }

    public function user_couponAction() {
        Lavra_Loader::LoadModels("Coupons", "discount");
        $coupon = new Coupons();

        if (isset($_GET['coupon_add'])) { //Если запрос на добавление купона
            $min_precent_coupon = $coupon->getCouponPercentMin();
            if (isset($min_precent_coupon->id)) {
                $_GET['coupon_add'] = trim(str_replace(' ', '', $_GET['coupon_add']));
                if (!empty($_GET['coupon_add'])) { //Если код не пустой
                    $is_added_coupon = $coupon->getCouponOnCode($_GET['coupon_add']);
                    if (!isset($is_added_coupon->id)) {
                        $coupon->addCouponsCode($_GET['coupon_add'], $min_precent_coupon->id);
                        $_GET['coupon'] = $_GET['coupon_add'];
                    } else {
                        exit('empty_code_added');
                    }
                } else {
                    exit('empty_code');
                }
            }
        }

        if (isset($_GET['del_coupon_id'])) { //Отвзяка купона от пользователя
            $coupon->setCouponUser($this->param['user_id'], 0);

            if (isset($this->param['is_coupon_sum']) && $this->param['is_coupon_sum'] == 1) {
                Lavra_Loader::LoadClass("Users");
                $users = new Users();

                $get_coupon_code = $coupon->getCouponOnCode($_GET['del_coupon_id']);
                if (isset($get_coupon_code->id)) { //Если купон существует
                    if (isset($this->param['is_coupon_sum']) && $this->param['is_coupon_sum'] == 1) {
                        $coupon->setCouponUserSumMinus($users->getUsersOrderSum($this->param['user_id']), $get_coupon_code->id);
                    }
                }
            }
        }

        if (isset($_GET['coupon'])) {
            $_GET['coupon'] = trim(str_replace(' ', '', $_GET['coupon']));
            $get_coupon_code = $coupon->getCouponOnCode($_GET['coupon']);
            if (isset($get_coupon_code->id)) { //Если купон существует
                $coupon->setCouponUser($this->param['user_id'], $get_coupon_code->id);

                if (isset($this->param['is_coupon_sum']) && $this->param['is_coupon_sum'] == 1) {
                    Lavra_Loader::LoadClass("Users");
                    $users = new Users();
                    $coupon->setCouponUserSum($users->getUsersOrderSum($this->param['user_id']), $get_coupon_code->id);
                }
                $this->coupon_code = $_GET['coupon'];
            } else { //Если нет, предлагаем его создать
                exit('not_coupon');
            }
        }
    }

    /**
     * Обрабатывает post запрос и готовить права для записи в бд
     */
    private function _getNewAccessPost() {
        $new_access = new Access();
        foreach ($this->access as $order => $value_order) { //Обход всех прав доступов 
            if ($order != 'accesses') {
                foreach ($value_order as $access_id => $value) {
                    if (isset($_POST['access'])) {
                        if (isset($_POST['access']['name'])) { //Добавление верхних уровней меню
                            if (isset($_POST['access']['name'][$access_id])) {
                                if ($_POST['access']['name'][$access_id] == $value['title']) { //Если галка стоит на разделе
                                    $new_access->setMenuName($access_id, $value['title'], $value['order'], $value['menu_link']);
                                }
                            }
                        }
                        if (isset($_POST['access']['access'])) { //Добавление подразделов
                            if (isset($_POST['access']['access'][$access_id])) {
                                foreach ($value['access'] as $access_value) { //Проходим все подразделы
                                    foreach ($_POST['access']['access'][$access_id] as $sub_menu_title) { //Проходим подразделы с поставленными галками
                                        if ($access_value['title'] == $sub_menu_title) { //Если найден подраздел
                                            $new_access->setAccess($access_id, $access_value['title'], $access_value['routes'], $access_value['is_menu'], $access_value['menu_link']);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return $new_access->getAccess();
    }

}
