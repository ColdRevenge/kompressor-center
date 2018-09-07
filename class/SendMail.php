<?php

/**
 * Класс отправки почтовых сообщений функций mail()
 * @author дизайн студия ox2.ru
 */
class SendMail {

    private $_host = null;
    private $_port = null;
    private $_user = null;
    private $_password = null;
    private $_from = null;
    private $_files = array();
    private $_is_html = true;
    private $_error_email = array();

    public function __construct() {
        require_once 'libmail.php';

        $registry = Registry::getInstance();
        if ($registry->is_send_mail === true) { //Отправка sendmail
            $this->_from = $registry->default_send_mail_adress;
        } else { //Отправка по сокетам
            $this->_host = $registry->mail_host;
            $this->_port = $registry->mail_host;
            $this->_user = $registry->mail_login;
            $this->_password = $registry->mail_password;
            $this->_from = $registry->default_send_mail_adress;
        }
    }

    public function isTypeHtml($is_html = true) {
        $this->_is_html = $is_html;
    }

    /**
     * Добавляет файл к письму
     * Если вызвать несколько раз добавиться несколько файлов
     * 
     * @param type $file_path - полный путь до файла
     */
    public function addFile($file_path, $file_name = '') {
        $i = count($this->_files) + 1;
        $this->_files[$i]['path'] = $file_path;
    }

    /**
     * Отправка письма
     * @param array $to - массив отправителей
     * @param type $subject
     * @param type $message
     */
    public function send($to, $subject, $message) {
        $registry = Registry::getInstance();
        $m= new Mail();
        $m->From( $this->_from );

        $to = is_array($to) ? $to : array($to);
        foreach ($to as $item) {
            if ($item) {
                $m->To( trim($item) );
            }
        }
        $m->Subject( $subject );
        $m->Body( $message, $this->_is_html ? 'html' : 'text' );

        foreach ($this->_files as $file) {
            if (file_exists($file['path'])) {
                $m->Attach($file['path']);
            }
        }
        if ( ! $registry->is_send_mail === true) {
            $m->smtp_on( $this->_host, $this->_user, $this->_password );
        }
        $m->Send();
        return $m->status_mail;
    }

    /**
     * Возвращает список почтовых адресов
     * на которые не удалось отправить сообщение в последней рассылке
     */
    public function getErrorAdress() {
        return $this->_error_email;
    }

}
