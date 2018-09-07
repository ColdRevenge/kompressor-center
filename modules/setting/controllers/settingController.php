<?php

class settingController extends Controller {

    public function generalAction() {
        $this->is_general = 1;
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Setting", "setting");
        $setting = new Setting();

        if (isset($_POST['submit'])) {
            if (!isset($_POST['footer_left']))
                $_POST['footer_left'] = null;
            if (!isset($_POST['email_2']))
                $_POST['email_2'] = null;
            if (!isset($_POST['email_3']))
                $_POST['email_3'] = null;
            if (!isset($_POST['phone_1']))
                $_POST['phone_1'] = null;
            if (!isset($_POST['phone_2']))
                $_POST['phone_2'] = null;
            if (!isset($_POST['phone_3']))
                $_POST['phone_3'] = null;
            if (!isset($_POST['phone_4']))
                $_POST['phone_4'] = null;
            if (!isset($_POST['footer_right']))
                $_POST['footer_right'] = null;
            if (!isset($_POST['min_price']))
                $_POST['min_price'] = 0;
            if (isset($_POST['min_price']))
                $_POST['min_price'] = str_replace(",", ".", $_POST['min_price']);
            if (isset($_POST['mark_up']))
                $_POST['mark_up'] = str_replace(",", ".", $_POST['mark_up']);

            $setting->setIsExpense((isset($_POST['is_expense']) && $_POST['is_expense'] == 1) ? 1 : 0);
            
            if (!$setting->setGeneral($_POST['name'], $_POST['email'], $_POST['email_2'], $_POST['email_3'], $_POST['phone_1'], $_POST['phone_2'], $_POST['phone_3'], $_POST['phone_4'], $_POST['title'], $_POST['meta_key'], $_POST['meta_desc'], $_POST['footer_left'], $_POST['footer_right'], $_POST['min_price'], (isset($_POST['hide_prices']) ? $_POST['hide_prices'] : '0' ), $_POST['mark_up'])) {
                $this->setError("Во время сохранения настроек, произошла ошибка");
            } else {
                $this->setMessage("Успешно сохранено!");
            }
            
        } elseif (isset($_POST['submit_b2b'])) {
            foreach ($_POST['b2b'] as $b2b_num => $price) {
                $is_active = (isset($_POST['is_active'][$b2b_num])) ? $_POST['is_active'][$b2b_num] : 0;
                $setting->setB2b($b2b_num, $price, $is_active);
            }
        }
        $this->b2b_setting = $setting->getB2b();

        if (isset($_POST['submit_pass'])) {
            $password = $setting->getPassword($this->user_id);
            if ($password == $_POST['old_password']) {
                if ($_POST['password'] != $_POST['confirm_password']) {
                    $this->setError("Пароль и подтвержение не совподают");
                } elseif (!$setting->setPassword($this->user_id, $_POST['password'])) {
                    $this->setError("Во время сохранения настроек, произошла ошибка");
                } else {
                    $this->setMessage("Успешно сохранено!");
                }
            } else
                $this->setError("Старый пароль введен не верно");
        }

        if (isset($_POST['submit_currency'])) {
            if ($_POST['usd']) {
                $setting->setUsdCurrency($_POST['usd']);
            }
            if ($_POST['eur']) {
                $setting->setEurCurrency($_POST['eur']);
            }
        }

        $this->setting = $setting->getGeneral();



//        if (isset ($_POST['name_mu'])) {
////            $fp = fopen($registry->base_dir  . "banner_options.txt", 'w');
////            fwrite($fp, "trainingName=".$_POST['name_mu']."&trainingDate=".$_POST['desc_mu']);
////            fclose($fp);
//        }
//        $file = file_get_contents($this->url . "banner_options.txt");
//
//        preg_match('/trainingName\=(.*)\&trainingDate\=(.*)/', $file, $matches);
//        if (isset ($matches[1]) && isset ($matches[2])) {
//            $this->name_mu = $matches[1];
//            $this->desc_mu = $matches[2];
//        }
        //trainingName=Акция!&trainingDate=Подарок за смартфон! Ура Товарищи!
        $this->menu = $registry->menu;
    }

    public function passwordAction() {
        Lavra_Loader::LoadModels("Setting", "setting");
        $setting = new Setting();
        $password = $setting->getPassword($this->user_id);

        if (isset($_POST['submit'])) {
            if ($password === false) {
                $this->setError("Вы не авторизованы");
            } else {
                if ($password == $_POST['old_password']) {
                    if ($_POST['password'] != $_POST['confirm_password']) {
                        $this->setError("Пароль и подтвержение не совподают");
                    } elseif (!$setting->setPassword($this->user_id, $_POST['password'])) {
                        $this->setError("Во время сохранения настроек, произошла ошибка");
                    } else {
                        $this->setMessage("Успешно сохранено!");
                    }
                } else
                    $this->setError("Старый пароль введен не верно");
            }
        }
        $this->menu = $registry->menu;
    }

    public function backupAction() {
        $registry = Registry::getInstance();
        $this->is_menu_recovery = 1;
        Lavra_Loader::LoadModels("Backup", "setting");
        $backup = new Backup();
        //     echo $backup->getDampSQL();

        $time = date('d_m_Y_h_i_s');


        if (isset($_POST['dump'])) {
            if ($registry->is_backup_files == false) {
                $file_name = '';
            } else {
                $backup->backupFiles("backup_files_" . $time . ".zip");
                $file_name = "backup_files_" . $time . ".zip";
            }
            $backup->addBackup("backup_sql_" . $time . '.sql', $file_name);
            $backup->backupSQL("backup_sql_" . $time . '.sql');
            $this->redirect($this->MyURL . 'backup/1/');
        }

        if (isset($this->param['message_id'])) {
            switch ($this->param['message_id']) {
                case 1:
                    $this->setMessage('Резервная копия успешно создана!!!');
                    break;
                case 2:
                    $this->setMessage("Сайт успешно восстановлен!!!!!");
                    break;
                default:
                    break;
            }
        }

        if (isset($_POST['dump_id'])) {
            $getBackup = $backup->getBackupId($_POST['dump_id']);
//            print_r($getBackup);
            if (isset($getBackup->sql)) {
                //Files
                if ($registry->is_backup_files == true) {
                    $backup->recoveryFiles($registry->base_dir . "backups/" . $getBackup->files);
                }
                //SQL
                $backup->execSQL($registry->base_dir . "backups/" . $getBackup->sql);
                $this->redirect($this->MyURL . 'backup/2/');
            }
            //$backup->getDampSQL(file_get_contents($filename));;
        }

        $this->backups = $backup->getBackups();
        $this->menu = $registry->menu;
    }


    public function usersAction() {
        $registry = Registry::getInstance();

        Lavra_Loader::LoadClass("Users");
        $users = new Users();

        if (isset($this->param['del_id'])) {
            $users->delUser($this->param['del_id']);
            $this->setMessage("Пользователь успешно удален!!!");
        }

        if (isset($_POST['price'])) {
            foreach ($_POST['price'] as $user_id => $b2b_price) {
                $users->setIsMailer($user_id, (isset($_POST['is_mailer'][$user_id]) && $_POST['is_mailer'][$user_id] == 1 ? 1 : 0));
                $users->setB2B($user_id, $b2b_price);
            }
            $this->setMessage("Успешно сохранено!");
        }

        $this->users = $users->getUsers(-1);
        $this->menu = $registry->menu;
    }

    public function get_userAction() {
        Lavra_Loader::LoadClass("Users");
        $users = new Users();
        if (isset($this->param['user_id'])) {
            $this->user = $users->getUserId($this->param['user_id']);
        }
    }

    
    public function smsAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Order", "order");
        $order = new Order();
        Lavra_Loader::LoadModels("Setting", "setting");
        $setting = new Setting();

        $this->status = $order->getStatus();



        if (isset($_POST['text'])) {
            foreach ($_POST['text'] as $status_id => $text) {
                if ($setting->getSmsStatusId($status_id)) {
                    $setting->setSmsStatusid($status_id, $text, (isset($_POST['is_active'][$status_id]) ? $_POST['is_active'][$status_id] : 0), (isset($_POST['is_email'][$status_id]) ? $_POST['is_email'][$status_id] : 0));
                } else {
                    $setting->addSmsStatusid($status_id, $text, (isset($_POST['is_active'][$status_id]) ? $_POST['is_active'][$status_id] : 0), (isset($_POST['is_email'][$status_id]) ? $_POST['is_email'][$status_id] : 0));
                }
            }
            $this->setMessage('Успешно сохранено!');
        }


        $get_sms_result = $setting->getSms();
        $get_sms = array();
        foreach ($get_sms_result as $value) {
            $get_sms[$value->status_id] = $value;
        }
        $this->get_sms = $get_sms;
        $this->menu = $registry->menu;
    }

    public function statusAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Order", "order");
        $order = new Order();
        Lavra_Loader::LoadModels("Setting", "setting");
        $setting = new Setting();
        if (isset($this->param['del_id']) && $this->param['del_id'] != 0) {
            $setting->delStatus($this->param['del_id']);
            $this->setMessage('Статус успешно удален!');
        }
        if (isset($_POST['is_add'])) {
            $setting->addStatus($_POST['status'], $_POST['order']);
            $this->setMessage('Статус успешно добавлен!');
        }
        if (isset($_POST['is_edit'])) {
            foreach ($_POST['status'] as $id => $value) {
                $setting->setStatus($id, $_POST['status'][$id], $_POST['order'][$id]);
                $this->setMessage('Статус успешно изменен!');
            }
        }
        $this->status = $order->getStatus();
        $this->menu = $registry->menu;
    }
}
