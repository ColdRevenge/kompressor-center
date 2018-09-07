<?php

class commentsController extends Controller {

    public function listAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Comments", "comments");
        $pages = new Comments();

        if (isset($this->param['del_id'])) {
            $pages->del($this->param['del_id']);
            $this->setMessage("Коммент успешно удален!");
        }
        $this->_date_form();
        $this->comments = $pages->getLastProductComments(mktime(0, 0, 0, $_POST['start_month'], $_POST['start_day'], $_POST['start_year']), mktime(23, 59, 59, $_POST['end_month'], $_POST['end_day'], $_POST['end_year']));

        $this->menu = $registry->menu;
    }

    public function lookAction() {
        Lavra_Loader::LoadModels("Comments", "comments");
        if (isset($this->param['comment_id'])) {
            $comment = new Comments();
            $this->comment = $comment->getCommentId($this->param['comment_id']);

            if (isset($_POST['comment'])) {
                $comment->setComment($_POST['name'], $_POST['comment'], $this->param['comment_id']);
                header("Location: /xadmin/comments/list/");
            }

            if (isset($this->param['is_active'])) {
                $comment->setActiveComment($this->param['is_active'], $this->param['comment_id']);
                header("Location: /xadmin/comments/list/");
            }
        } else
            $this->setError("Комментарий не найден");
    }

    /* Фильтр для добавления комментов */

    private function _addFilter($string) {
        $return = true;

        $string = mb_strtolower($string);

//        if (mb_strpos($string, 'univerhoz.ru') !== false) { //Если в комменте присутствует ссылка на сайт vbbook, то норм
//        } elseif (mb_strpos($string, 'http://') !== false) { //Если на стороний сайт
//            $return = false;
//        }
        if (mb_strpos($string, '<a href') !== false) { //Если на стороний сайт
            $return = false;
        }
        if (preg_match("/[А-Яа-я]+/", $string)) {
            
        } else
            $return = false;

        return $return;
    }

    public function commentsAction() {
        Lavra_Loader::LoadModels("Comments", "comments");
        Lavra_Loader::LoadClass("Application");
        $comments = new Comments();

        if (isset($this->param['parent_id']) && isset($this->param['type'])) {
            if (isset($_POST['comment'])) {
                foreach ($_POST as $key => $value) {
                    $_POST[$key] = ($value);
                }
                if (!isset($_POST['recommend']))
                    $_POST['recommend'] = null;
                if (!isset($_POST['defect']))
                    $_POST['defect'] = null;
                //Запись комментов
                if (isset($_POST['comment']) || isset($_POST['name']) || isset($_POST['recommend'])) {
                    if ((!empty($_POST['comment']) || !empty($_POST['recommend']) || !empty($_POST['defect']))) {
                        if ($this->_addFilter($_POST['comment']) || $this->_addFilter($_POST['defect']) || $this->_addFilter($_POST['recommend'])) {
//                        if (mb_strtoupper($_SESSION['code']) == mb_strtoupper($_POST['code'])) {
                            $comments->addComment($this->param['type'], $_POST['name'], $_POST['comment'], $_POST['recommend'], $_POST['defect'], $this->param['parent_id'], 0);
                            $this->is_message = 1;
                            $_SESSION['comment_name'] = $_POST['name'];
                            $this->_sendMailAdmin();
                            $_POST['comment'] = '';
                            $_POST['defect'] = '';
                            $_POST['recommend'] = '';
//                        } else {
//                            $this->is_error = 5;
//                        }
                        } else
                            $this->is_error = 3;
                    } else {
                        $this->is_error = 1;
                    }
                }
            }

            //Чтение комментов
            $this->comments = $comments->getComments($this->param['parent_id'], $this->param['type']);
            $this->parent_id = (int) $this->param['parent_id'];
            $this->type_id = (int) $this->param['type'];
        } else
            throw new Exception("Не все поля заданы");
    }

    private function _date_form($start_time = 7776000) {
        $date = getdate(time() - $start_time); //дата начала на 90 дней меньше текущей
        if (!isset($_POST['start_day']))
            $_POST['start_day'] = $date['mday'];
        if (!isset($_POST['start_month']))
            $_POST['start_month'] = $date['mon'];
        if (!isset($_POST['start_year']))
            $_POST['start_year'] = $date['year'];

        $end_date = getdate();
        if (!isset($_POST['end_day']))
            $_POST['end_day'] = $end_date['mday'];
        if (!isset($_POST['end_month']))
            $_POST['end_month'] = $end_date['mon'];
        if (!isset($_POST['end_year']))
            $_POST['end_year'] = $end_date['year'];

        $this->start_date_form = Lavra_Loader::getLoadModule("application", "/application/date/1/" . $_POST['start_year'] . "/" . $_POST['start_month'] . "/" . $_POST['start_day'] . "/start_");
        $this->end_date_form = Lavra_Loader::getLoadModule("application", "/application/date/1/" . $_POST['end_year'] . "/" . $_POST['end_month'] . "/" . $_POST['end_day'] . "/end_");
    }

    /**
     * Отправляет письмо пользователю
     */
    private function _sendMailAdmin() {
        Lavra_Loader::LoadModels('Send', 'send');
        Lavra_Loader::LoadClass("SendMail");
        $registry = Registry::getInstance();
        $mail = new SendMail(); //Создаем класс Mail
        $mail->isTypeHtml(true); //Ставим тип сообщения как обычный текст
        Lavra_Loader::LoadClass("Application");
        Lavra_Loader::LoadModels('Setting', 'setting');
        $setting = new Setting();
        $set = $setting->getGeneral();


        $title = "На сайт добавлен новый комментарий";
        $message = preg_replace(array('/\n/i', '/\r/i', '/\t/i', '/>\s+/i', '/\s+</i'), array('', '', '', '>', '<'), $this->fetchTemplate($registry->modules_dir . 'comments/templates/mail_comments.tpl'));

        if (mb_strpos($registry->default_send_mail_adress, '@') !== false) {
            $from = $registry->default_send_mail_adress;
        } else {
            $from = $set->email;
        }

        if ($mail->send(array($set->email, $set->email_2, $set->email_3), $title, $message)) {
            
        }
    }

}
