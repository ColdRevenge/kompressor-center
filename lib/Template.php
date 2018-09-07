<?php

class Template {

    public $views = null;

    public function __construct() {
        $registry = Registry::getInstance();
        if ($registry->isAjax == 1) {
            header('Content-Type: text/html; charset=windows-1251');
        }
        $this->init();
    }

    final public function init() {
        $registry = Registry::getInstance();
        if (isset($registry->template_dir) && file_exists($registry->template_dir . "Smarty.class.php")) {
            include_once($registry->template_dir . "Smarty.class.php");
            $registry->as2 = 'sty';
        } else
            throw new Exception("Папка " . $registry->template_dir . ' не найдена, либо не указана переменная $registry["smarty_dir"]');
        $this->views = new Smarty;
        $this->views->force_compile = false;
        if ($registry->is_debug == false) {
            $this->views->compile_check = false;
        } else {
            $this->views->compile_check = true;
        }

        $this->views->compile_dir = $registry->template_dir . 'templates_c/';

        $registry->smarty4 = array('.');
        return $this->views;
    }

    private $_view_property = array();

    final public function __set($name, $value) {
        $this->_view_property[$name] = $value;
        $this->views->assign($name, $value);
    }

    final public function __get($name) {
        if (isset($this->_view_property[$name])) {
            return $this->_view_property[$name];
        } else
            return false;
    }

    public function render($path, $module_name) {
        echo $this->getRender($path, $module_name);
    }

    /**
     * Возвращает вывод шаблона на экран
     * @return type
     */
    public function fetchTemplate($path) {
        if (file_exists($path)) {
            $registry = Registry::getInstance();
            $this->views->compile_dir = $registry->template_dir . 'templates_c/';
            $return = $this->views->fetch($path);
            if ($registry->is_https_all == true) {
                if (strpos($_SERVER['REQUEST_URI'], 'xadmin/') === false) {
//                    $return = trim(str_replace('http://', $registry->host, $return));
                }
            }
            return $return;
        }
    }

    /**
     * Проверка прав доступа, на уровне шаблонизатора
     */
    private function _isAccess() {
        $registry = Registry::getInstance();
        if (isset($registry->ControllerIsAdmin["$this->MyName"]) && $this->is_auth == 0 && $registry->ControllerIsAdmin["$this->MyName"] == true) { //Проверка на то что модуль должен быть только для админа доступен
            $this->error = "<b>Нет прав доступа</b>";
            return $this->fetchTemplate($registry->template_message);
        } else
            return true;
    }

    public function getRender($path, $module_name) {
        $registry = Registry::getInstance();

        $this->url = $registry->base_url;

        $this->views->template_dir = $registry->Path["$module_name"] . $registry->PathView["$module_name"];
        $this->views->compile_dir = $registry->template_dir . 'templates_c/';

        if ($this->_isAccess() === true) { //Проверяем если права доступа
            if (file_exists($path)) {
                if ($registry->isAjax == 1) { //Если вывод идет в Ajax`e, то кодируем
                    return ($this->fetchTemplate($path));
                } else
                    return $this->fetchTemplate($path);
            }
        } else
            return $this->_isAccess();
//        else throw new Exception("Шаблон не найден: [<b>$path</b>]");
    }

    public function register_object($object_name, $object) {
        $this->views->registerObject($object_name, $object);
    }

}

?>