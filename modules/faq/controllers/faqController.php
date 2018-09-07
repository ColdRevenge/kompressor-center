<?php

class faqController extends Controller {

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

    public function addAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("FAQ", "faq");
        $faq = new FAQ();

        if (isset($_POST['submit'])) {
            if (!isset($_POST['question'])) {
                $_POST['question'] = null;
            }
            if (!isset($_POST['subject'])) {
                $_POST['subject'] = null;
            }

            if (!isset($this->param['edit_id'])) { //Если добавление
                $faq->add($_POST['subject'], $_POST['question'], $_POST['answer'], 1, $_POST['order']);
                $this->redirect($registry->admin_url . "faq/1/");
            } else { //Если редактирование
                $faq->edit($this->param['edit_id'], $_POST['subject'], $_POST['question'], $_POST['answer'], $_POST['order']);
                $this->redirect($registry->admin_url . "faq/2/");
            }
        }
        if (isset($this->param['edit_id'])) { //Если редактирование
            $faq->setIsRead($this->param['edit_id']); //Помечаем сообщение как прочтенное
            $edit = $faq->getQuestion($this->param['edit_id']);
            $_POST['question'] = $edit->question;
            $_POST['answer'] = $edit->answer;
            $_POST['order'] = $edit->order;
            $_POST['subject'] = $edit->subject;
            $this->edit_id = $this->param['edit_id'];
        } else {
            $_POST['order'] = $faq->getMaxOrder() + 1;
        }
    }

    public function admin_faqAction() {
        $registry = Registry::getInstance();

        Lavra_Loader::LoadModels("FAQ", "faq");
        $faq = new FAQ();

        if (isset($this->param['message_id'])) {
            switch ($this->param['message_id']) {
                case 1:
                    $this->setMessage("Страница успешно добавленна!");
                    break;
                case 2:
                    $this->setMessage("Успешно сохранено");
                    break;
                case 3:
                    if ($this->param['del_id']) { // Удаление страницы
                        $this->setMessage("Страница успешно удалена");
                        $faq->del($this->param['del_id']);
                    }
                    break;
            }
        }
        $this->questions = $faq->getQuestions();
        $faq->setAllIsRead(); //Помечаем как все сообщения прочитанные
    }

    public function site_faqAction() {
        Lavra_Loader::LoadClass("Defence");
        Lavra_Loader::LoadClass('Application');
        if (isset($_POST['send'])) {
            if (!isset($_POST['question'])) {
                $_POST['question'] = null;
            }
            if (!isset($_POST['subject'])) {
                $_POST['subject'] = null;
            }
            $post = $_POST;
            foreach ($post as $key => $value) {
                $_POST[$key] = ($value);
            }

            Lavra_Loader::LoadModels("FAQ", "faq");
            $faq = new FAQ();

//            if (!Defence::isMail($_POST['mail'])) {
//                $this->setError("Поле E-Mail заполнено не корректно!!!");
//            } else
//            if (!Defence::isName($_POST['fio'])) {
//                $this->setError("Поле ФИО заполнено не корректно");
//            } else {
            if (!empty($_POST['subject'])) {
                if ($this->_addFilter($_POST['subject'])) {
                    if ($faq->add($_POST['subject'], $_POST['question'], null, 1, 0, $_POST['fio'], $_POST['mail'])) {
                        $this->setMessage('Вопрос успешно отправлен! В ближайшее время вы получите на него ответ!');
                        $this->_mailsend();
                    } else {
                        $this->setError('При отправке вопроса возникли ошибки. Попробуйте отправить сообщение чуть позже. Если ошибка будет повторяться, сообщите пожалуйста на <a href="info@ox2.ru">info@ox2.ru</a>');
                    }
                } else {
                    $this->setError(" Ваш комментарий попал под фильтр. Исправьте текст комментария, и отправьте его еще раз. <br/><br/>
        1. В комментариях должны присутствовать русские буквы. 
        <br/><br/>
        Приносим свои извинения за неудобства.");
                }
            } else {
                $this->setError('Заполните поле вопрос');
            }
//            }
        }
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("FAQ", "faq");
        $faq = new FAQ();
        $this->questions = $faq->getQuestions();
    }

    private function _mailsend() {
        Lavra_Loader::LoadModels('Send', 'send');
        Lavra_Loader::LoadClass("SendMail");
        $registry = Registry::getInstance();
        $mail = new SendMail(); //Создаем класс Mail
        $mail->isTypeHtml(true); //Ставим тип сообщения как обычный текст
        Lavra_Loader::LoadClass("Application");
        Lavra_Loader::LoadModels('Setting', 'setting');
        $setting = new Setting();
        $set = $setting->getGeneral();


        $title = "Вопрос с сайта";
        $message = preg_replace(array('/\n/i', '/\r/i', '/\t/i', '/>\s+/i', '/\s+</i'), array('', '', '', '>', '<'), $this->fetchTemplate($registry->modules_dir . 'faq/templates/mail_faq.tpl'));

        if (mb_strpos($registry->default_send_mail_adress, '@') !== false) {
            $from = $registry->default_send_mail_adress;
        } else {
            $from = $set->email;
        }

        if ($mail->send(array($set->email, $set->email_2, $set->email_3), $title, $message)) {
            
        }
    }

}
