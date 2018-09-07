<?php

class TosocoParser {
    private $_base_dir = null;
    private $_cache_dir = null;

    public function __construct() {
        $this->_base_dir = rtrim($_SERVER['DOCUMENT_ROOT'], "/") . "/";
        $this->_cache_dir = $this->_base_dir . 'cache/';
    }

    /**
     * Функция возвращает контент страницы, при этом кеширует ее
     * @param type $link
     * @param type $cache_name
     */
    private function _getContent($link) {
        if (file_exists($this->_cache_dir . 'tosoco_' . date('dmY'))) {
            $fp = fopen($this->_cache_dir . 'tosoco_' . date('dmY'), 'r');
            $get = fread($fp, filesize($this->_cache_dir . 'tosoco_' . date('dmY')));
            fclose($fp);
//            echo 'cache@@@@';
        } else {
            $get = file_get_contents("$link");
            if (strlen($get) > 10) { //Если страница доступна
                $fp = fopen($this->_cache_dir . 'tosoco_' . date('dmY'), 'w');
                fwrite($fp, $get);
                fclose($fp);
            } else {
                echo 'Битая ссылка: ' . $link . "\n<Br/>";
            }
        }
        return $get;
    }

    public function getAllProducts($link) {
        Lavra_Loader::LoadClass('Application');
        $get = Application::cp1251_to_uft8($this->_getContent($link));
        preg_match_all('/\<a\s+href\=\"(\/shop\/UID_\d+\.html)"\stitle\=\"Модель ([^\"]+)\"/', $get, $matches);
        
        return ($matches);
//        $result = array();
//        if (isset($matches[1])) {
//            $result = array_unique($matches[1]);
//        }
//        return $result;
    }

}
