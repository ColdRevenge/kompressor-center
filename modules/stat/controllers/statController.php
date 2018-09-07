<?php

class statController extends Controller {

    /**
     * Отслеживание почтовых посылок
     */
    public function delivery_postAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Reports", "reports");
        $reports = new Reports();
        $registry->head_title = 'Отследить заказ (Почта России)';
        Lavra_Loader::LoadModels('gdePosulka', 'delivery');
        $gdePosulka = new gdePosulka();
        if ($this->user_id > 0) {
            $orders = array_merge($reports->getOrders($this->user_id, 7), $reports->getOrders($this->user_id, 8));
            $get_order = array();
            $i = 0;
            foreach ($orders as $key => $value) {
                if (!empty($value->post_code)) {
                    $get_order[$i]['order'] = $value;
                    $get_order[$i]['delivery'] = $gdePosulka->call('getTrackingInfo', array('tracking' => array(
                            "tracking_number" => $value->post_code,
                            "courier_slug" => "russian-post",
                            "title" => "Номер заказ " . $value->id
                        )), 1);
                    ;
                    $i++;
                }
            }
            $this->get_order = $get_order;
        } else {
            $this->redirect($registry->base_url);
        }
    }

    public function ordersAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Order", "order");
        $order = new Order();
        $registry->head_title = 'Мои заказы';
        Lavra_Loader::LoadModels("Reports", "reports");
        $reports = new Reports();
        $this->orders = $reports->getOrders($this->user_id, 0);

        if ($this->user_id > 0) {
            //Выполненные
            $this->orders = $reports->getOrders($this->user_id, 0);
//            print_r($this->orders);
            ; // $order->getHistoryOrders(0, time(), 0, 1, $this->user_id);
            //Отмененные
            $this->orders_cancel = $order->getHistoryOrders(0, time(), 1, 0, $this->user_id);

            //Текущие
//        $this->orders = $reports->getOrdersCurrent($this->user_id, 3);

            $this->products = $order->getHistoryOrderProducts('', $this->user_id);
        } else {
            $this->redirect($registry->base_url);
            ;
        }
    }

    public function password_changeAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass('Users');
        Lavra_Loader::LoadClass("Defence");

        $registry->head_title = 'Сменить пароль';
        $auth = new Users();
        $get_user = $auth->getUserId($this->user_id);
        if (isset($get_user->id)) {
            if (isset($_POST['change_pass'])) { //Смена пароля
                if ($get_user->password != $_POST['old_password']) {
                    $this->setError("Старый пароль введен не правильно!");
                } elseif (!isset($_POST['is_password']) || !isset($_POST['password']) || $_POST['is_password'] != $_POST['password']) {
                    $this->setError("Пароль и подтвеождение пароля не совподают");
                } elseif (!isset($_POST['password']) || !Defence::isLogin($_POST['password'])) {
                    $this->setError("Пароль введен не корректно");
                } else {
                    $auth->setPassword($this->user_id, $_POST['password']);
                    $this->setMessage("Пароль успешно изменен!");
                }
            }
        } else {
            $this->redirect($registry->base_url);
        }
    }

    public function profileAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Users");
        $auth = new Users();
        Lavra_Loader::LoadClass("Defence");
        Lavra_Loader::LoadClass("Application");

        Lavra_Loader::LoadModels("Metro", "metro");
        $metro = new Metro();
        $this->metro = $metro->getStantions();
        $this->managers = $auth->getUsers(2);
        $registry->head_title = "Профиль пользователя";

        $get_user = $this->get_user = $auth->getUserId($this->user_id);

        if ($this->user_id > 0) {

            $end_date = getdate(mktime(0, 0, 0, 1, 1, 2000));
            if (isset($_POST['birth_day'])) {
                $end_date = getdate(mktime(0, 0, 0, $_POST['birth_month'], $_POST['birth_day'], $_POST['birth_year']));
            } elseif ($get_user->birth_day != 0) {
                $end_date = getdate($get_user->birth_day);
            }
            $_POST['birth_day'] = $end_date['mday'];
            $_POST['birth_month'] = $end_date['mon'];
            $_POST['birth_year'] = $end_date['year'];

            $birth = mktime(0, 0, 0, $end_date['mon'], $end_date['mday'], $end_date['year']);

            $this->birth_date = Lavra_Loader::getLoadModule("application", "/application/date/1/" . $_POST['birth_year'] . "/" . $_POST['birth_month'] . "/" . $_POST['birth_day'] . "/birth_/1/");



            if (isset($_POST['register']) && isset($get_user->login)) {
                if ((!isset($_POST['email']) || empty($_POST['email'])) && isset($_POST['forum_email'])) {
                    $_POST['email'] = $_POST['forum_email'];
                }
                $default_fields = array('login' => $get_user->login, 'password' => $get_user->password, 'name' => $get_user->name, 'last_name' => $get_user->last_name, 'middle_name' => $get_user->middle_name, 'phone' => $get_user->phone, 'email' => $get_user->email, 'email_2' => $get_user->email_2, 'email_3' => $get_user->email_3, 'city' => $get_user->city, 'city_index' => $get_user->city_index, 'adress' => $get_user->adress, 'profession' => $get_user->profession, 'metro_id' => $get_user->metro_id, 'icq' => $get_user->icq, 'birth_day' => $get_user->birth_day, 'info' => $get_user->info, 'company_name' => $get_user->company_name, 'company_fax' => $get_user->company_fax, 'company_inn' => $get_user->company_inn, 'company_ur_adress' => $get_user->company_ur_adress, 'company_bank' => $get_user->company_bank, 'company_bik' => $get_user->company_bik, 'company_rs' => $get_user->company_rs, 'company_ks' => $get_user->company_ks, 'company_kpp' => $get_user->company_kpp, 'company_okpo' => $get_user->company_okpo, 'company_oknx' => $get_user->company_oknx, 'company_fio_director' => $get_user->company_fio_director, 'company_fio_accountant' => $get_user->company_fio_accountant, 'param_str_1' => $get_user->param_str_1, 'param_str_2' => $get_user->param_str_2, 'param_str_3' => $get_user->param_str_3, 'b2b_price' => $get_user->b2b_price, 'is_jur_person' => $get_user->is_jur_person, 'is_mailer' => 0, 'is_mailer_2' => 0, 'user_type' => $get_user->user_type);

                if (empty($_POST['name'])) {
                    $this->setError("Заполните поле \"ФИО\"");
                } elseif (empty($_POST['phone']) && $registry->shop != 'forum') {
                    $this->setError("Заполните поле \"Телефон\"");
                } elseif (!isset($_POST['email']) || !Defence::isMail($_POST['email'])) {
                    $this->setError("E-mail введен не корректно");
                } else { //Если нет ошибок
                    foreach ($default_fields as $key => $value) {
                        if (!isset($_POST[$key])) {
                            $_POST[$key] = $value;
                        } else {
                            $_POST[$key] = trim($_POST[$key]);
                        }
                    }
                    $default_currency_id = 1;
                    $auth->edit($get_user->id, $_POST['login'], $_POST['password'], $_POST['name'], $_POST['last_name'], $_POST['middle_name'], $_POST['phone'], $_POST['email'], $_POST['email_2'], $_POST['email_3'], $_POST['city'], $_POST['city_index'], $_POST['adress'], $_POST['profession'], $_POST['metro_id'], $_POST['icq'], $birth, $_POST['info'], $_POST['company_name'], $_POST['company_fax'], $_POST['company_inn'], $_POST['company_ur_adress'], $_POST['company_bank'], $_POST['company_bik'], $_POST['company_rs'], $_POST['company_ks'], $_POST['company_kpp'], $_POST['company_okpo'], $_POST['company_oknx'], $_POST['company_fio_director'], $_POST['company_fio_accountant'], $_POST['param_str_1'], $_POST['param_str_2'], $_POST['param_str_3'], $_POST['b2b_price'], $default_currency_id, $_POST['is_jur_person'], $_POST['is_mailer'], $_POST['is_mailer_2'], $_POST['user_type']);
                    if (isset($_POST['forum_name'])) {
                        $auth->setUserForum($get_user->id, $_POST['forum_name'], $_POST['forum_email'], isset($_POST['forum_is_email']) ? (int) $_POST['forum_is_email'] : 0);
                    }
                    $this->setMessage("Изменения успешно сохранены!");

                    if ($registry->shop == 'forum') {
                        try {
                            $icon = $this->_icon('icon', 100, 100);

                            $auth->setIcon($get_user->id, $icon);
                        } catch (Exception $e) {
                            $this->setError($e->getMessage());
                        }
                    }



                    if (isset($_POST['manager_id'])) {
                        $auth->setManager($get_user->id, $_POST['manager_id']);
                    }
//                }
//                else $this->setError('При регистрации произошла ошибка. Обратитесь в администрацию!');
                }
            }
            $this->get_user = $auth->getUserId($this->user_id);
            if (isset($this->get_user->coupon_code_id) && $this->get_user->coupon_code_id > 0) {

                Lavra_Loader::LoadModels("Coupons", "discount");
                $coupons = new Coupons();
                $this->get_coupon_code = $coupons->getCouponCodeId($this->get_user->coupon_code_id);
                if (isset($this->get_coupon_code->coupon_id)) {
                    $this->coupon = $coupons->getCouponId($this->get_coupon_code->coupon_id);
                    if (isset($this->coupon->code_next_coupon_id))
                        $this->next_discount = $coupons->getCouponId($this->coupon->code_next_coupon_id);
                }
            }
        }
        else {

            $this->redirect($registry->base_url);
        }
        if (isset($_GET['success'])) {
            $this->setMessage('Регистрация прошла успешно!');
        }
    }

    /**
     * Загрузка иконок при редактировании / Добавлении иконок
     * @return boolean 
     */
    private function _icon($input_name = 'icon', $width = 0, $height = 0) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Uploader");
        if (isset($_FILES[$input_name]['name']) && !empty($_FILES[$input_name]['name'])) { //Если пошел запрос на загрузку
            $upload = new Uploader($registry->base_dir . 'images/forum/avatars/', $input_name);

            $upload->setPrefix("icon_" . time() . "_" . rand(0, 100) . "_");
            $upload->isConvertLatinName(true);
            $upload->setMaxSize(1500);


            $upload->addAllowMimeType("image/jpeg");
            $upload->addAllowMimeType("image/gif");
            $upload->addAllowMimeType("image/png");

            if ($width == 0 && $height == 0) {
                $file_cover = $upload->upload();
            } else {
                $file_cover = $this->_resizeIcon($upload->upload(), $width, $height);
            }

            $this->uploaded_image = $file_cover;
            return $this->uploaded_image;
        } elseif ($input_name == 'icon' && isset($_POST['uploaded_image']) && $_POST['uploaded_image'] && !empty($_POST['uploaded_image'])) {
            $this->uploaded_image = $_POST['uploaded_image'];
            return $this->uploaded_image;
        }
        return false;
    }

    /**
     * Нарезка иконки 
     */
    private function _resizeIcon($icon, $width, $height) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Images");
        $images = new Images();
        $resourse = $images->open($registry->base_dir . 'images/forum/avatars/' . $icon);
        $images->setIsConvas(true);
        $images->setScaling($width, $height, ($width + ($width * 0.35)), ($height + ($height * 0.35)));
//            $images->setWaterImage($registry->gallery_dir."water.png", 0, 0, 0, 0);
        $images->save($images->ReSize($resourse, $width, $height), $registry->base_dir . 'images/forum/avatars/' . $icon, 100);
        return $icon;
    }

}
