<?php
/**
 * Класс отправки почты
 * @version 0.1
 */
class Mail {
    private $_server, $_to, $_from, $_subject, $_text, $_resourse, $_login, $_password,$_to_name = null, $_from_name = null;
    private $_plain = 'text/html';

    /**
     * Устанавливает тип сообщения
     * Если $is_html = true, то text/html, иначе text/plain
     * @param <type> $is_html
     */
    public function setPlainMessage ($is_html = true) {
        if ($is_html == true) {
            $this->_plain = 'text/html';
        }
        else {
            $this->_plain = 'text/plain';
        }
    }
    /**
     *
     * @param <type> $server
     * @param <type> $from - адрес отправителя
     * @param <type> $from_name - имя отправителя
     * @param <type> $login - логин отправителя
     * @param <type> $password - пароль лотправителя
     * @param <type> $to - адрес получателя
     * @param <type> $to_name - имя получателя
     * @param <type> $subject - тема
     * @param <type> $text - сообщение
     */
    public function __construct($server, $from, $from_name, $login,  $password, $to, $to_name, $subject, $text) {
        $this->_server = $server;
        $this->_to = $to;
        $this->_from = $from;
        $this->_subject = $subject;
        $this->_text = $text;
        $this->_login = $login;
        $this->_to_name = $to_name;
        $this->_password = $password;
        $this->_from_name = $from_name;
        if (!empty($server)) {
            $this->_resourse = fsockopen($server,25,$errno,$error,5);
        }
    }

    public function send() {
        if ($this->_server == null) {
            return $this->_sendMail();
        }
        else return $this->_sendSocket();
    }

    private function _sendSocket() {
        $header ="From: =?windows-1251?Q?".str_replace("+","_",str_replace("%","=",urlencode($this->_from_name)))."?= <$this->_from>\r\n";
        $header.="X-Mailer: http://ox2.ru/ create site studio \r\n";
        $header.="Reply-To: =?windows-1251?Q?".str_replace("+","_",str_replace("%","=",urlencode($this->_to_name)))."?= <".$this->_to.">\r\n";
        $header.="X-Priority: 3 (Normal)\r\n";
        $header.="Message-ID: <172562218.".date("YmjHis")."@mail.ru>\r\n";
        $header.="To: =?windows-1251?Q?".str_replace("+","_",str_replace("%","=",urlencode($this->_to_name)))."?= <".$this->_to.">\r\n";

        $header.="Subject: =?windows-1251?Q?".str_replace("+","_",str_replace("%","=",urlencode("$this->_subject")))."?=\r\n";
        $header.="MIME-Version: 1.0\r\n";
        $header.="Content-Type: $this->_plain; charset=windows-1251\r\n";
        $header.="Content-Transfer-Encoding: 8bit\r\n";

        fputs($this->_resourse,"EHLO $this->_server.ru\n");
        $data = $this->getAnswerSockets();

        fputs($this->_resourse,"AUTH LOGIN\r\n");
        $data = $this->getAnswerSockets();

        fputs($this->_resourse,base64_encode($this->_login)."\r\n");
        $data = $this->getAnswerSockets();

        fputs($this->_resourse,base64_encode($this->_password)."\r\n");
        $data = $this->getAnswerSockets();

        fputs($this->_resourse,"MAIL FROM:".$this->_from."\r\n");

        $data = $this->getAnswerSockets();

        fputs($this->_resourse,"RCPT TO:$this->_to\r\n");

        $data = $this->getAnswerSockets();

        fputs($this->_resourse,"DATA\r\n");
        $data = $this->getAnswerSockets();
        fputs($this->_resourse,"Content-Type: $this->_plain;\r\n");

        fputs($this->_resourse,$header."\r\n".$this->_text."\r\n.\r\n");
        $data = $this->getAnswerSockets();

        fputs($this->_resourse,"QUIT\r\n");
        $data = $this->getAnswerSockets();
        return true;
    }

    private function getAnswerSockets() {
        $log = fread($this->_resourse,100000);
    }


    public function __destruct() {
        if (!is_null($this->_resourse)) fclose($this->_resourse);
    }

    /**
     * Отправляет письмо стандартной функцией mail
     *
     * @param <type> $from
     * @param <type> $to
     * @param <type> $subject
     * @param <type> $message
     * @param <type> $from_name
     * @param <type> $to_name
     * @return <type>
     */
    public function _sendMail() {
        $subject = "=?windows-1251?b?" . base64_encode($this->_subject) . "?=";
        $to = "=?windows-1251?B?" . base64_encode($this->_to_name) . "?= <$this->_to>";
        $from = "=?windows-1251?B?" . base64_encode($this->_from_name) . "?= <$this->_from>";
        $headers = "From: $this->_from\r\n";
        $headers .= "Content-type: $this->_plain; charset=\"windows-1251\"\r\n";
        if (mail($this->_to, $this->_subject, $this->_text, $headers)) {
            return true;
        }
        else return false;
    }
}