<?php

    ini_set("display_errors", "on");
    error_reporting(E_ALL);
if ($_SERVER['REMOTE_ADDR'] == '94.199.111.134') {

} else {
}
ini_set('memory_limit', '128M');
header("Content-type: text/html; charset=utf-8");
mb_internal_encoding('UTF-8');
setlocale(LC_ALL, "ru_RU.UTF-8");
session_start();

//session_destroy();

class Config {

    private $_php_self = null;
    private $_document_root = null;
    private $_http_host = null;
    private $_file_name = null;

    public function __construct() {
        $this->_php_self = $_SERVER['PHP_SELF'];
        $this->_document_root = rtrim($_SERVER['DOCUMENT_ROOT'], "/") . "/";
        if (isset($_SERVER['HTTP_HOST_2'])) {
            $_SERVER['HTTP_HOST'] = $_SERVER['HTTP_HOST_2'];
        }

        $this->_http_host = $_SERVER['HTTP_HOST'];

        $this->_file_name = $_SERVER['SCRIPT_NAME'];
    }

    public function getCurrentUrl() {
        if (mb_strpos($this->_php_self, '/index.php') !== false) {
            return mb_substr($this->_php_self, 10);
        } else {
            return $this->_php_self;
        }
    }

    public function getFolder($file = null) {
        if (is_null($file))
            $file = $this->_getCurrentFile();
        return trim(mb_substr($this->_php_self, 0, mb_strpos($this->_php_self, $file)), '/');
    }

    public function connectDB($dbname, $host, $login, $password, $is_debug = false) {
        if ($is_debug == true) {
            include_once $this->_document_root . 'lib/DebugPDO.php';
            $db = new DebugPDO("mysql:dbname=$dbname;host=$host", $login, $password);
        } else {
            $db = new PDO("mysql:dbname=$dbname;host=$host", $login, $password);
        }
        $db->query("SET NAMES UTF8");
        return $db;
    }

    public function isAjax() {
        if ($_SERVER['REMOTE_ADDR'] == '94.199.111.134') {
//            print_r($_SERVER);
        }
//        
        if ((isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
            return true;
        } else
            return false;
    }

    public function getDocumentRoot() {
        return $this->_document_root;
    }

    public function getHttpHost() {
        return $this->_http_host;
    }

    /**
     * Возвращает имя открытого файла (index.php, admin_style.php)
     */
    private function _getCurrentFile() {
        $file = explode('/', $this->_file_name);
        return array_pop($file);
    }

}
