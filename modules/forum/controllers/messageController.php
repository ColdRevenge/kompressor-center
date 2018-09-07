<?php

class messageController extends Controller {

    public function message_addAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Forum", "forum");
        $forum = new Forum();
        if (!empty($_POST['message'])) {
            $_POST['name'] = (isset($_POST['name'])) ? $_POST['name'] : '';

            if (!empty($_POST['name']) || isset($_POST['parent_id']) && $_POST['parent_id'] > 0) {
                if (isset($this->param['user_id']) && $this->param['user_id'] > 0 && $this->user_id > 0) {
                    $message_id = $forum->addMessageUser($_POST['name'], $_POST['message'], $this->param['user_id'], $this->user_id, (isset($_POST['parent_id']) && $_POST['parent_id'] > 0 ? (int) $_POST['parent_id'] : 0), 0);
                    $this->_sendMessage($this->param['user_id'], (isset($_POST['parent_id']) && $_POST['parent_id'] > 0 ? (int) $_POST['parent_id'] : $message_id));
                    $this->is_message = 1;
                }
            } else {
                $this->is_message = -1;
            }
        } else {
            $this->is_message = -2;
        }
    }

    public function message_listAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Forum", "forum");
        $forum = new Forum();
        $registry->head_title = 'Личные сообщения - Forum.Lalipop.ru';
        if ($this->user_id > 0) {
            $this->get_message = $forum->getMessageRoot($this->user_id);
        }

        $this->register_object('forum_obj', $forum);
    }

    public function message_readAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Forum", "forum");
        $forum = new Forum();
        $registry->head_title = 'Личные сообщения - Forum.Lalipop.ru';
        if ($this->user_id > 0) {
            if (isset($this->param['message_id']) && $this->param['message_id'] > 0) {
                $forum->setMessageReady($this->param['message_id'], $this->user_id);
                $this->get_message = $forum->getMessage($this->user_id, $this->param['message_id']);
            }
        }

        $this->register_object('forum_obj', $forum);
    }

    private function _sendMessage($user_id, $message_id) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Forum", "forum");
        $forum = new Forum();
        Lavra_Loader::LoadClass("Users");
        $users = new Users();
        Lavra_Loader::LoadClass("SendMail");
        $mail = new SendMail();
        $this->message_id = $message_id;
        $this->get_user = $users->getUserId($user_id);
        $this->get_send_user = $_get_user = $users->getUserId($this->user_id);
        if (isset($_get_user->id)) {
            if (isset($this->get_user->id) && $this->get_user->id > 0 && !empty($this->get_user->forum_email)) {
                

                $message_mail = preg_replace(array('/\n/i', '/\r/i', '/\t/i', '/>\s+/i', '/\s+</i'), array('', '', '', '>', '<'), $this->fetchTemplate($registry->modules_dir . 'forum/templates/mail_new_private_message.tpl', 'forum'));

//        if (isset($get_user->id) && !empty($get_user->email) && $get_user->id != $this->user_id) {
                $mail->send(array($this->get_user->forum_email), "Новое личное сообщение от пользователя " . stripslashes($_get_user->name), $message_mail);
            }
        }
    }

}
