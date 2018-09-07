<?php

class tendersController extends Controller {

    public function tendersAction() {
        $registry = Registry::getInstance();
        if (isset($registry->user_id) && $registry->user_id > 0) { //Если пользователь авторизован
            Lavra_Loader::LoadModels("Tenders", "tenders");
            $tenders = new Tenders();

            Lavra_Loader::LoadClass("Users");
            $users = new Users();
            $user = $users->getUserId($registry->user_id);
            if (isset($user->id)) {
                if (isset($_POST['is_send_email'])) {
                    $users->setUserEmailTender($user->id, (isset($_POST['is_email']) && $_POST['is_email'] == 1 ? 1 : 0));
                    $user = $users->getUserId($registry->user_id);
                }
                if (isset($_POST['tender_id'])) { //Если идет обновления кол-ва и цен 
                    foreach ($_POST['count'] as $product_id => $value) {

//Сохранение тендора в любом случае (сохранение, отмена, отправка)
                        if (!$tenders->isTenderProductUserOffer($_POST['tender_id'], $user->id, $product_id)) { // Если продукт тендера не добавлен у пользователя
                            $tenders->addTenderProductOffer($_POST['tender_id'], $user->id, $product_id, $_POST['count'][$product_id], $_POST['price'][$product_id], $_POST['comment'][$product_id]);
                        } else { //Если редактирование
                            $tenders->setTenderProductOffer($_POST['tender_id'], $user->id, $product_id, $_POST['count'][$product_id], $_POST['price'][$product_id], $_POST['comment'][$product_id]);
                        }
                        if (isset($_POST['save_x'])) {
                            $this->setMessage("Тендер успешно сохранен");
                        }

                        if (isset($_POST['send_x'])) { //Отправка 
                            $tenders->setStatusTenderProductOffer($_POST['tender_id'], $user->id, $product_id, 1);
                        } elseif (isset($_POST['cancel_x'])) { //Отмена
                            $tenders->setStatusTenderProductOffer($_POST['tender_id'], $user->id, $product_id, 2);
                        }
                    }
                }

                $this->user = $user;


                $tenders_active = $tenders->getTenders(1);
                if (count($tenders_active)) { //Если есть хоть 1 тендер
                    $this->tender_active = $tenders_active[0]; //Берем первый тендер в шаблон

                    $this->user_offer_product = $tenders->getOfferTenderUser($user->id, $tenders_active[0]->id); //Для заполнения полей
                    $this->tender_products = $tenders->getTenderIdProducts($tenders_active[0]->id);


                    $status_id = $tenders->getStatusTenderProductOffer($tenders_active[0]->id, $user->id);
                    $this->status_id = $status_id; //Статус тендера
                }
            }
            else $this->error_auth = 1;
        }
        else {            //Если не авторизован
            Lavra_Loader::LoadModels("Pages", "page");
            $pages = new Pages();
            $this->page = $pages->getPage(12, $registry->shop_type);
            $this->error_auth = 1;
        }
    }

    /**
     * Подтверждение тендера 
     */
    public function user_acceptAction() {
        if (isset($this->param['accept_id'])) {
            preg_match('/ssd(\d+)x(\d+)v.+/', $this->param['accept_id'], $match);
            if (isset($match[1]) && isset($match[2])) {
                Lavra_Loader::LoadModels("Tenders", "tenders");
                $tenders = new Tenders();
                $tender_id = (int) $match[1] / 5;
                $user_id = (int) $match[2] / 5;
                $get_tender = $tenders->getTenderId($tender_id);
                if ($get_tender->close_offer_user_id == $user_id) { //Проверка для защиты
                    if ($get_tender->close_accept_user == 0) { //Если тендер еще не подтвержден
                        $tenders->setStatusUserAccept($tender_id, $user_id); //Подтверждаем
                        $this->_sendMailTenderAcceptAdmin($tender_id, $user_id);
                        $this->_sendMailTenderAcceptUser($tender_id, $user_id);
                    }
                }
                else $this->setError("Произошла ошибка. Пожалуйста свяжитесь с менеджерами компании.");
            }
            else $this->setError("Произошла ошибка. Пожалуйста свяжитесь с менеджерами компании.");
        }
    }

    /**
     * Ajax для продуктов 
     */
    public function add_product_tenderAction() {
        Lavra_Loader::LoadModels("Tenders", "tenders");
        $tenders = new Tenders();

        if (isset($this->param['del_product_id'])) { //Удаление продукта из тендера
            $tenders->delProductTender($this->param['del_product_id'], $this->param['tender_id']);
            $this->tender_id = $this->param['tender_id'];
            $this->product_id = $this->param['del_product_id'];
        } elseif (isset($this->param['tender_id']) && isset($this->param['product_id'])) {
            $this->tender_id = $this->param['tender_id'];
            $this->product_id = $this->param['product_id'];

            if ($this->param['tender_id'] > 0) {
                if ($this->param['product_id'] > 0) {
                    $tenders->addProduct($this->param['tender_id'], $this->param['product_id']);
                }
            } else {
                $this->error = 'Выберите тендер, в котором будет участвовать товар.';
            }
            $this->is_product_tender = $tenders->getProductTender($this->param['tender_id'], $this->param['product_id']);
        }


        /**
         * Вывод тендоров 
         */
        $this->tenders = $tenders->getTenders(0);
    }

    public function getTenderAction() {
        if (isset($this->param['tender_id']) && $this->param['tender_id'] > 0) {
            Lavra_Loader::LoadModels("Tenders", "tenders");
            $tenders = new Tenders();
            Lavra_Loader::LoadClass("Users");
            $users = new Users();
            $registry = Registry::getInstance();

            if (isset($_POST['is_start'])) {
                $tenders->setStatusTender($this->param['tender_id'], $_POST['status'], 0);
                if (isset($_POST['status']) && $_POST['status'] == 1) { //Если тендер открыт
                    /**
                     * Уведомляем всех об открытии тендера 
                     */
                    $this->_sendMailTenderOpen($this->param['tender_id']);
                    $this->redirect($registry->admin_url . "tenders/products/" . $this->param['tender_id'] . "/");
                }
            }

            if (isset($this->param['del_product_id'])) { //Удаление товара из тендера 
                $tenders->delProductTender($this->param['del_product_id'], $this->param['tender_id']);
                $this->setMessage("Продукт успешно удален!");
            }


            if (isset($_POST['count'])) { //Сохранение цены для мгновенной победы
                foreach ($_POST['count'] as $product_id => $price) {
//                    $tenders->setPriceFinishProduct($this->param['tender_id'], $product_id, $price);
                    $tenders->setCountProduct($this->param['tender_id'], $product_id, $_POST['count'][$product_id]);
                }
                $this->setMessage("Успешно сохранено!");
            }

            if (isset($_POST['accept_x'])) {
                $tenders->setStatusTender($this->param['tender_id'], 2, $_POST['user_accept_id']); //Закрываем тендер

                $this->_sendMailTenderAcceptClose($this->param['tender_id'], $_POST['user_accept_id']); //Победителю
                $this->_sendMailTenderCancelClose($this->param['tender_id'], $_POST['user_accept_id']); //Проигравшим
                /**
                 * Уведомляем пользователя о том что он выграл тендер
                 * Остальных о том что проиграли
                 * 
                 * ИЛИ 
                 * ССЫЛКУ С ПОДТВЕРЖДЕНИЕ, ПОСЛЕ ЧЕГО ВСЕХ ОСТАЛЬНЫХ
                 *  
                 */
            }


            $this->tender = $tenders->getTenderId($this->param['tender_id']);
            if (isset($this->tender->id)) {
                $this->tender_products = $tenders->getTenderIdProducts($this->param['tender_id']);
                $this->tender_products_offer_user = $tenders->getOfferTenderAllUser($this->param['tender_id'], 1);
                $this->users_list = $users->getUsersKeyId();

                if ($this->tender->status == 2 && $this->tender->close_offer_user_id > 0) { //Если тендер закрыт пользователем
                    $this->close_user_info = $users->getUserId($this->tender->close_offer_user_id); //Информация о пользователе закрывшим тендер
                    $this->close_tender_product = $tenders->getOfferTenderUser($this->tender->close_offer_user_id, $this->tender->id);
                }
            }
            else $this->setError("Тендер не найден. Обратитесь к разработчикам");
        }
        else $this->setError("Ошибка при открытии тендера");
    }

    public function listAction() {
        Lavra_Loader::LoadClass("Users");
        $users = new Users();
        Lavra_Loader::LoadModels("Tenders", "tenders");
        $tenders = new Tenders();

        if (isset($_POST['name'])) {
            $tenders->add($_POST['name'], $_POST['manager'], $_POST['close_time']);
            unset($_POST);
            $this->setMessage("Тендер успешно добавлен!");
        }

        if (isset($this->param['message_id'])) {
            switch ($this->param['message_id']) {
                case 3:
                    if ($this->param['del_id']) { // Удаление страницы
                        $this->setMessage("Тендер успешно удален");
                        $tenders->del($this->param['del_id']);
                    }
                    break;
            }
        }
        $this->tenders = $tenders->getTenders(0);
        $this->tenders_active = $tenders->getTenders(1);
        $this->tenders_closed = $tenders->getTenders(2);

        $this->users_mail = $users->getUsersMailTender();
    }

    /**
     * Отправляет письмо пользователям о закрытии тендора с подтверждением 
     */
    private function _sendMailTenderAcceptClose($tender_id, $user_id) {

        Lavra_Loader::LoadClass("SendMail");
        Lavra_Loader::LoadClass("Application");
        Lavra_Loader::LoadModels('Setting', 'setting');
        Lavra_Loader::LoadClass("Users");
        $users = new Users();
        $setting = new Setting();
        $set = $setting->getGeneral();
        $registry = Registry::getInstance();
        $tenders = new Tenders();

        $get_tenders = $tenders->getTenderId($tender_id);
        if ($get_tenders->id) {
            $tender_products = $tenders->getOfferTenderUser($user_id, $tender_id); //Для заполнения полей
            $mail = new SendMail(); //Создаем класс Mail
            $mail->isTypeHtml(true); //Ставим тип сообщения как обычный текст
            $message = file_get_contents($registry->lib_url . '_mail_template_header.php') . '
                <div style="margin-left:5px;">
<h1>В тендере <b>«' . stripslashes($get_tenders->name) . '»</b>  ваша заявка победила.</h2>
<p>Для подтверждения заявки перейдите по ссылке: <a href="' . $registry->base_url . 'tenders/accept/ssd' . ($tender_id * 5) . 'x' . ($user_id * 5) . 'v' . rand(1000, 8000) . 'x' . rand(0, 10) . '/" target="__blank">' . $registry->base_url . 'tenders/accept/ssd' . ($tender_id * 5) . 'x' . ($user_id * 5) . 'v' . rand(1000, 8000) . 'x' . rand(0, 10) . '/</a> </p>
<br/>
<h2>Информация о тендере:</h2>
<p>Номер тендера: <strong>«' . $get_tenders->id . '»</strong></p>
<p>Ответственный менеджер: <strong>«' . stripslashes($get_tenders->manager) . '»</strong></p>
<p>Состояние: <strong>«Завершен»</strong></p>
<br/>
<h1>Состав лота:</h1><br/>
<p>
  <table cellpadding="4" border="0" cellspacing="0">
    <tr><th>Наименование</th><th>Необходимое кол-во:</th><th>Предложенная цена:</th><th>Предложенное кол-во:</th><th>Комментарий:</th></tr>';
            foreach ($tender_products as $value) {
                $message .= '<tr>
      <td style="border-bottom: 1px dashed black;" align="left" valign="middle"> ' . stripslashes($value->product_name) . ' </td>
      <td style="border-bottom: 1px dashed black;" align="center" valign="middle"> ' . $value->product_count . ' </td>
      <td style="border-bottom: 1px dashed black;" align="center" valign="middle"> ' . $value->price . ' </td>
      <td style="border-bottom: 1px dashed black;" align="center" valign="middle"> ' . $value->count . ' </td>
      <td style="border-bottom: 1px dashed black;" align="center" valign="middle"> ' . $value->comment . '&nbsp; </td>
    </tr>';
            }

            $message .= '
  </table>
</p>

<p>--<br/>
С уважением,<br/>
магазин "' . $set->name . '"<br/>
<a href="' . $registry->base_url . '" target="_blank">' . $registry->base_url . '</a></p>
    </div>
</body>
</html>
';

            $users_mail = $users->getUsersMailTender();
            foreach ($users_mail as $value) {

                if ($value->id == $user_id) { //Если это победивший юзер
                    if ($mail->send($value->email, stripcslashes($value->name), $set->email, $set->name, "Ваша заявка победила в конкурсе «" . stripslashes($get_tenders->name) . "»", $message)) { //Отправляем сообщение
                    }
                }
            }
//            
        }
        else return false;
    }

    /**
     * Отправляет письмо пользователям о закрытии тендора с сообщением о поражении 
     */
    private function _sendMailTenderCancelClose($tender_id, $user_id) {

        Lavra_Loader::LoadClass("SendMail");
        Lavra_Loader::LoadClass("Application");
        Lavra_Loader::LoadModels('Setting', 'setting');
        Lavra_Loader::LoadClass("Users");
        $users = new Users();
        $setting = new Setting();
        $set = $setting->getGeneral();
        $registry = Registry::getInstance();
        $tenders = new Tenders();

        $get_tenders = $tenders->getTenderId($tender_id);
        if ($get_tenders->id) {
            $tender_products = $tenders->getOfferTenderUser($user_id, $tender_id); //Для заполнения полей
            $mail = new SendMail(); //Создаем класс Mail
            $mail->isTypeHtml(true); //Ставим тип сообщения как обычный текст
            $message = file_get_contents($registry->lib_url . '_mail_template_header.php') . '
                <div style="margin-left:5px;">
<h1>В тендере <b>«' . stripslashes($get_tenders->name) . '»</b>  ваша заявка проиграла.</h2>
<br/>
<h2>Информация о тендере:</h2>
<p>Номер тендера: <strong>«' . $get_tenders->id . '»</strong></p>
<p>Состояние: <strong>«Завершен»</strong></p>
<br/>
<h1>Состав победившего лота:</h1><br/>
<p>
  <table cellpadding="4" border="0" cellspacing="0">
    <tr><th>Наименование</th><th>Необходимое кол-во:</th><th>Предложенная цена:</th><th>Предложенное кол-во:</th></tr>';
            foreach ($tender_products as $value) {
                $message .= '<tr>
      <td style="border-bottom: 1px dashed black;" align="left" valign="middle"> ' . stripslashes($value->product_name) . ' </td>
      <td style="border-bottom: 1px dashed black;" align="center" valign="middle"> ' . $value->product_count . ' </td>
      <td style="border-bottom: 1px dashed black;" align="center" valign="middle"> ' . $value->price . ' </td>
      <td style="border-bottom: 1px dashed black;" align="center" valign="middle"> ' . $value->count . ' </td>
    </tr>';
            }

            $message .= '
  </table>
</p>

<p>--<br/>
С уважением,<br/>
магазин "' . $set->name . '"<br/>
<a href="' . $registry->base_url . '" target="_blank">' . $registry->base_url . '</a></p>
    </div>
</body>
</html>
';

            $users_mail = $users->getUsersMailTender();
            foreach ($users_mail as $value) {
                if ($value->id != $user_id) { //Если это не победивший юзер
                    if ($mail->send($value->email, stripcslashes($value->name), $set->email, $set->name, "Ваша заявка проиграла в конкурсе «" . stripslashes($get_tenders->name) . "»", $message)) { //Отправляем сообщение
                    }
                }
            }
//            
        } else return false;
    }

    /**
     * Отправляет письмо пользователям о открытие тендора
     */
    private function _sendMailTenderOpen($tender_id) {
        Lavra_Loader::LoadClass("SendMail");
        Lavra_Loader::LoadClass("Application");
        Lavra_Loader::LoadModels('Setting', 'setting');
        Lavra_Loader::LoadClass("Users");
        $users = new Users();
        $setting = new Setting();
        $set = $setting->getGeneral();
        $registry = Registry::getInstance();
        $tenders = new Tenders();

        $get_tenders = $tenders->getTenderId($tender_id);
        if ($get_tenders->id) {
            $tender_products = $tenders->getTenderIdProducts($tender_id); //Ищем продукты которые участвуют в тендере

            $mail = new SendMail(); //Создаем класс Mail
            $mail->isTypeHtml(true); //Ставим тип сообщения как обычный текст
            $message = file_get_contents($registry->lib_url . '_mail_template_header.php') . '
                <div style="margin-left:5px;">
<h2>Компания <b>«' . $set->name . '»</b> приглашает Вас принять участие в конкурсе по закупке расходных материалов</h2>
<p>Номер тендера: <strong>«' . $get_tenders->id . '»</strong></p>
<p>Название тендера: <strong>«' . stripslashes($get_tenders->name) . '»</strong></p>
<p>Ответственный менеджер: <strong>«' . stripslashes($get_tenders->manager) . '»</strong></p>
<p>Состояние: <strong>«Открыт»</strong></p>
<p>Плановое время закрытия торгов: <strong>«' . $get_tenders->close_time . '»</strong></p>
<br/>
<h1>Состав лота:</h1><br/>
<p>
  <table cellpadding="4" border="0" cellspacing="0">
    <tr><th>Наименование</th><th>Необходимое кол-во:</th></tr>';
            foreach ($tender_products as $value) {
                $message .= '<tr>
      <td style="border-bottom: 1px dashed black;" align="left" valign="middle"> ' . stripslashes($value->name) . ' </td><td style="border-bottom: 1px dashed black;" align="center" valign="middle"> ' . $value->count . ' </td>
    </tr>';
            }

            $message .= '
  </table>
</p>

<p><br/>Мы будем Вам благодарны за участие в данном конкурсе!</p>
<p>--<br/>
С уважением,<br/>
магазин "' . $set->name . '"<br/>
<a href="' . $registry->base_url . '" target="_blank">' . $registry->base_url . '</a></p>
    </div>
</body>
</html>
';

            $users_mail = $users->getUsersMailTender();
            foreach ($users_mail as $value) {
                if ($mail->send($value->email, stripcslashes($value->name), $set->email, $set->name, "Компания «" . $set->name . "» приглашает Вас принять участие в конкурсе", $message)) { //Отправляем сообщение
                }
            }
//            
        }
        else return false;
    }

    /**
     * Отправляет письмо пользователю о подтверждении тендера
     */
    private function _sendMailTenderAcceptAdmin($tender_id, $user_id) {

        Lavra_Loader::LoadClass("SendMail");
        Lavra_Loader::LoadClass("Application");
        Lavra_Loader::LoadModels('Setting', 'setting');
        Lavra_Loader::LoadClass("Users");
        $users = new Users();
        $setting = new Setting();
        $set = $setting->getGeneral();
        $registry = Registry::getInstance();
        $tenders = new Tenders();

        $get_tenders = $tenders->getTenderId($tender_id);
        $get_user = $users->getUserId($user_id);
        if ($get_tenders->id) {
            $mail = new SendMail(); //Создаем класс Mail
            $mail->isTypeHtml(true); //Ставим тип сообщения как обычный текст
            $message = file_get_contents($registry->lib_url . '_mail_template_header.php') . '
                <div style="margin-left:5px;">
<h1>Тендер  <b>«' . stripslashes($get_tenders->name) . '»</b>  успешно подтвержден.</h1>
<h2>Информация о пользователе</h2>    
<p>Имя пользователя: <b>' . $get_user->name . '</b></p>
<p>Логин: <b>' . $get_user->login . '</b></p>
<p>Телефон: <b>' . $get_user->phone . '</b> </p>
<p>E-mail: <b>' . $get_user->email . '</b></p>

<p>--<br/>
С уважением,<br/>
магазин "' . $set->name . '"<br/>
<a href="' . $registry->base_url . '" target="_blank">' . $registry->base_url . '</a></p>
    </div>
</body>
</html>
';

            if ($mail->send($set->email, $set->name, $set->email, $set->name, "Тендер «" . stripslashes($get_tenders->name) . "» успешно подтвержден! ", $message)) { //Отправляем сообщение
            }

            if (mb_strpos($set->email_2, '@')) { //Отправляем письма на доп. почтовые ящики
                $mail->send($set->email_2, $set->name, $set->email_2, $set->name, "Тендер «" . stripslashes($get_tenders->name) . "» успешно подтвержден! ", $message);
            }
            if (mb_strpos($set->email_3, '@')) { //Отправляем письма на доп. почтовые ящики
                $mail->send($set->email_3, $set->name, $set->email_3, $set->name, "Тендер «" . stripslashes($get_tenders->name) . "» успешно подтвержден! ", $message);
            }
//            
        }
    }

    /**
     * Отправляет письмо пользователю о подтверждении тендера
     */
    private function _sendMailTenderAcceptUser($tender_id, $user_id) {

        Lavra_Loader::LoadClass("SendMail");
        Lavra_Loader::LoadClass("Application");
        Lavra_Loader::LoadModels('Setting', 'setting');
        Lavra_Loader::LoadClass("Users");
        $users = new Users();
        $setting = new Setting();
        $set = $setting->getGeneral();
        $registry = Registry::getInstance();
        $tenders = new Tenders();

        $get_tenders = $tenders->getTenderId($tender_id);
        if ($get_tenders->id) {
            $mail = new SendMail(); //Создаем класс Mail
            $mail->isTypeHtml(true); //Ставим тип сообщения как обычный текст
            $message = file_get_contents($registry->lib_url . '_mail_template_header.php') . '
                <div style="margin-left:5px;">
<h1>Тендер  <b>«' . stripslashes($get_tenders->name) . '»</b>  успешно подтвержден. В ближайшее время с Вами свяжутся менеджеры компании.</h1>

<p>--<br/>
С уважением,<br/>
магазин "' . $set->name . '"<br/>
<a href="' . $registry->base_url . '" target="_blank">' . $registry->base_url . '</a></p>
    </div>
</body>
</html>
';

            $users_mail = $users->getUserId($get_tenders->close_offer_user_id);

            if ($mail->send($users_mail->email, stripcslashes($users_mail->name), $set->email, $set->name, "Тендер «" . stripslashes($get_tenders->name) . "» успешно подтвержден! ", $message)) { //Отправляем сообщение
            }
//            
        } else return false;
    }

}

