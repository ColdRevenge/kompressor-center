<?php

class authController extends Controller {

    public function authAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Users");
        $auth = new Users();
        if (isset($_POST['auth'])) {
            if (isset($_POST['login']) && isset($_POST['password'])) { //Регистрация и авторизация
                $is_auth = $auth->isAuth(mb_strtoupper($_POST['login']), $_POST['password']);
                if (isset($is_auth->id)) {
                    $_SESSION['is_auth'] = $is_auth->user_type;
                    $_SESSION['user_id'] = $is_auth->id;
                    $_SESSION['login'] = $is_auth->login;
                    $_SESSION['b2b_price'] = $is_auth->b2b_price;
//                if (isset($_SESSION['login']) && $_SESSION['login'] == 'tender') {
//                    $this->redirect($registry->admin_url . 'tenders/');
//                } else
                    if (!empty($is_auth->start_access_link)) {
                        $this->redirect($is_auth->start_access_link);
                    } elseif (isset($_GET['back_url'])) {
                        if (isset($_GET['is_modal']) && $_GET['is_modal'] == 1) {
                            exit('<script type="text/javascript">parent.location.href="' . ($_GET['back_url']) . '";parent.$.fancybox.close();</script>');
                        }
                    } elseif (isset($_POST['redirect'])) {
                        $this->redirect($_POST['redirect']);
                    } elseif ($is_auth->user_type == 1 || $is_auth->user_type == 2) { //Админы
                        if (isset($_GET['is_modal']) && $_GET['is_modal'] == 1) {
                            exit('<script type="text/javascript">parent.location.href="' . ($this->admin_url . 'order/list/') . '";parent.$.fancybox.close();</script>');
                        } else {
                            $this->redirect($this->admin_url . 'order/list/');
                        }
                    }

//                 else $this->redirect($registry->base_url);
                    $this->setMessage('Вы успешно авторизованы!');
                } else {
                    $this->setError("Логин или пароль введен неправильно ");
                }
            }
        }
        if (isset($_SESSION['is_auth']) && is_numeric($_SESSION['is_auth'])) {
            $this->is_auth = $_SESSION['user_id'];

            Lavra_Loader::LoadModels("Forum", "forum");
            $forum = new Forum();
            $this->count_new_message = $forum->getCountNewMessage($_SESSION['user_id']);
        } else {
            $this->is_auth = 0;
        }

        /**
         * Ссылки на соц. сети
         * @param type $params
         * @return type
         */
        Lavra_Loader::LoadClass('SocialAuth');
        $soc = new SocialAuth('vk');
        $this->vk_links = $soc->getLinks();
        $soc = new SocialAuth('yandex');
        $this->ya_links = $soc->getLinks();
        $soc = new SocialAuth('google');
        $this->google_links = $soc->getLinks();
        $soc = new SocialAuth('mail');
        $this->mail_links = $soc->getLinks();
        $soc = new SocialAuth('odnoklassniki');
        $this->odnoklassniki_links = $soc->getLinks();
        $soc = new SocialAuth('facebook');
        $this->facebook_links = $soc->getLinks();
    }

    /**
     * Авторизация через социальные сети
     */
    public function socialAction() {
        if (isset($this->param['social_type'])) {
            $registry = Registry::getInstance();
            Lavra_Loader::LoadClass('SocialAuth');
            //vk
            //yandex

            $registry->social_reg_login = '';
            $registry->social_reg_password = '';
            $registry->social_reg_email = '';

            $soc = new SocialAuth($this->param['social_type']);

            if ($soc->auth()) {
                if (!empty($registry->social_reg_email)) {
                    $this->_sendRegisterMessage($registry->social_reg_login, $registry->social_reg_password);
                }
                $this->redirect($registry->base_url);
            }
        }
    }

    private function _sendRegisterMessage($email, $password) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("SendMail");
        $mail = new SendMail();
        $this->email = $email;
        $this->password = $password;
        $message_mail = preg_replace(array('/\n/i', '/\r/i', '/\t/i', '/>\s+/i', '/\s+</i'), array('', '', '', '>', '<'), $this->fetchTemplate($registry->modules_dir . 'auth/templates/mail_register.tpl', 'order'));
        $mail->send(array($email), "Спасибо за регистрацию на сайте $this->shop_name!! ", $message_mail);
    }

    public function registerAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass('Users');
        $users = new Users();
        $this->managers = $users->getUsers(2);
        Lavra_Loader::LoadClass("Defence");

        Lavra_Loader::LoadModels("Metro", "metro");
        $metro = new Metro();
        $this->metro = $metro->getStantions();

        if (isset($_POST['email'])) {
            $_POST['login'] = $_POST['email'];
            $default_fields = array('login' => '', 'password' => '', 'icon' => '', 'info' => '', 'name' => '', 'last_name' => '', 'middle_name' => '', 'phone' => '', 'email' => '', 'email_2' => '', 'email_3' => '', 'city' => '', 'city_index' => '', 'adress' => '', 'profession' => '', 'metro_id' => 0, 'icq' => '', 'birth_day' => 0, 'info' => '', 'company_name' => '', 'company_fax' => '', 'company_inn' => '', 'company_ur_adress' => '', 'company_bank' => '', 'company_bik' => '', 'company_rs' => '', 'company_ks' => '', 'company_kpp' => '', 'company_okpo' => '', 'company_oknx' => '', 'company_fio_director' => '', 'company_fio_accountant' => '', 'param_str_1' => '', 'param_str_2' => '', 'param_str_3' => '', 'b2b_price' => 0, 'is_jur_person' => 0, 'is_mailer' => 0, 'is_mailer_2' => 0, 'user_type' => 0);

            if (!isset($_POST['email']) || !Defence::isMail($_POST['email'])) {
                $this->setError("E-mail введен не корректно");
//            } 
//            elseif ($users->isLogin(trim($_POST['login']))) {
//                $this->setError("Логин " . htmlspecialchars($_POST['login']) . ' занят');
            } elseif ($users->isEmailUser(trim($_POST['email']))) {
                $this->setError("Пользователь с почтовым адресом <b>" . htmlspecialchars($_POST['email']) . '</b> уже зарегистрирован');
//            } elseif (!isset($_POST['login']) || !Defence::isLogin($_POST['login'])) {
//                $this->setError("Логин введен не корректно");
            } elseif (!isset($_POST['is_password']) || !isset($_POST['password']) || $_POST['is_password'] != $_POST['password']) {
                $this->setError("Пароль и подтвеождение пароля не совподают");
            } elseif (!isset($_POST['password']) || !Defence::isLogin($_POST['password'])) {
                $this->setError("Пароль введен не корректно");
            } elseif ((isset($_POST['captcha']) && (mb_strtolower($_POST['captcha']) != $_SESSION['code'] || mb_strlen($_POST['captcha']) <= 1)) && $registry->isMobile != 1) {
                $this->setError('Код с картинки введен неверно');
            } else { //Если нет ошибок
                foreach ($default_fields as $key => $value) {
                    if (!isset($_POST[$key])) {
                        $_POST[$key] = $value;
                    } else {
                        $_POST[$key] = trim($_POST[$key]);
                    }
                }
                $default_currency_id = 1;
                $_POST['info'] = strip_tags($_POST['info'], '<p><a><div><ul><li><ol><strong><span><em><blockquote><img><video><a><b><big><blink><blockquote><br><canvas><caption><center><cite><code><col><colgroup><comment><dd><details><dfn><dir><div><dl><dt><em><font><h1><h2><h3><h4><h5><h6><hr><i><img><label><legend><li><link><listing><main><map><mark><marquee><nav><ol><optgroup><option><output><p><param><plaintext><q><rp><rt><ruby><s><samp><section><small><source><spacer><span><strike><strong><sub><summary><sup><table><tbody><td><textarea><tfoot><th><thead><time><title><tr><track><tt><u><ul><var><video><wbr><xmp>');


                $user_id = $users->add($_POST['login'], $_POST['password'], $_POST['name'], $_POST['last_name'], $_POST['middle_name'], $_POST['phone'], $_POST['email'], $_POST['email_2'], $_POST['email_3'], $_POST['city'], $_POST['city_index'], $_POST['adress'], $_POST['profession'], $_POST['metro_id'], $_POST['icq'], 0, $_POST['info'], $_POST['company_name'], $_POST['company_fax'], $_POST['company_inn'], $_POST['company_ur_adress'], $_POST['company_bank'], $_POST['company_bik'], $_POST['company_rs'], $_POST['company_ks'], $_POST['company_kpp'], $_POST['company_okpo'], $_POST['company_oknx'], $_POST['company_fio_director'], $_POST['company_fio_accountant'], $_POST['param_str_1'], $_POST['param_str_2'], $_POST['param_str_3'], $_POST['b2b_price'], $_SERVER['REMOTE_ADDR'], $default_currency_id, $_POST['is_jur_person'], $_POST['is_mailer'], $_POST['is_mailer_2'], $_POST['user_type']);
                
                $users->setUserForum($user_id, $_POST['name'], $_POST['email'], 1);
                
                if (isset($_POST['manager_id'])) {
                    $users->setManager($user_id, $_POST['manager_id']);
                }

                if ($user_id) {
                    $this->_sendRegisterMessage($_POST['email'], $_POST['password']);

                    if ($registry->shop == 'forum') {
                        $icon = $this->_icon('icon', 100, 100);
                        $users->setIcon($user_id, $icon);

                        $get_user = $users->getUserId($user_id);
                        if (isset($get_user->id)) {
                            $_SESSION['is_auth'] = $get_user->user_type;
                            $_SESSION['user_id'] = $get_user->id;
                            $_SESSION['login'] = $get_user->login;
                            $_SESSION['b2b_price'] = $get_user->b2b_price;

                            header('Location: https://forum.lalipop.ru/stat/profile/forum/?success=1');
                            exit();
                        }
                    }

                    $this->setMessage("Регистрация прошла успешо!");
                } else {
                    $this->setError('При регистрации произошла ошибка. Обратитесь в администрацию!');
                }
            }
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

    /**
     * Восстановление пароля 
     */
    private function _sendRecovery($usermail, $fio, $login, $password) {
        Lavra_Loader::LoadClass("SendMail");
        Lavra_Loader::LoadClass("Application");
        Lavra_Loader::LoadModels('Setting', 'setting');
        $setting = new Setting();
        $set = $setting->getGeneral();
        $registry = Registry::getInstance();

        $mail = new SendMail(); //Создаем класс Mail
        $mail->isTypeHtml(true); //Ставим тип сообщения как обычный текст
        $this->set_name = stripslashes($set->name);
        $this->login = $login;
        $this->password = $password;
        $this->fio = $fio;

        $message = preg_replace(array('/\n/i', '/\r/i', '/\t/i', '/>\s+/i', '/\s+</i'), array('', '', '', '>', '<'), $this->fetchTemplate($registry->modules_dir . 'auth/templates/mail_recovery.tpl'));

        if ($mail->send((array) $usermail, "Восстановление доступа к магазину $set->name", $message)) { //Отправляем сообщение
        }
    }

    public function recoveryAction() {
        if (isset($this->param['login']) && !isset($_POST['login']))
            $_POST['login'] = $this->param['login'];

        if (isset($_POST['email'])) {
            $_POST['email'] = trim($_POST['email']);
            Lavra_Loader::LoadClass("Users");
            $users = new Users();
            if ($users->isEmailUser($_POST['email'])) {
                $user = $users->getUserEmail($_POST['email']);
                $this->_sendRecovery($_POST['email'], $user->name, $user->login, $user->password);
                $this->message = 'На ваш почтовый ящик высланы пароли!';
            } else {
                $this->setError("Пользователь с почтовым адресом <b>" . htmlspecialchars($_POST['email']) . "</b> не найден ");
            }
        }
    }

    public function exitAction() {
        $registry = Registry::getInstance();
        foreach ($_SESSION as $key => $value) {
            unset($_SESSION[$key]);
        }
        print_r($_SESSION);
        if (isset($_GET['back_url']) && mb_strpos($_GET['back_url'], 'auth/mini_auth/') === false) {
            $this->redirect($_GET['back_url']);
        } else {
            $this->redirect($registry->base_url);
        }
    }

}
