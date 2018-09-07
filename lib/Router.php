<?php

class Router {

    private $_pathController = array(), $_pathView = array(), $_is_admin = array(), $_path = array();
    private $_RouteControllers, $_RouteAction, $_RouteViews, $_Regexp = array(); //Маршруты..
    private static $_Object = null;

    /**
     * Функция добавляет новый маршрут
     *
     */
    public function addRoute($path_name = 'index', $url_reqexp = null, $view = null, $controller = null, $action = null, $is_admin = false) {
        $this->_RouteControllers[$path_name][] = $controller;
        $this->_RouteAction[$path_name][] = $action;
        $this->_RouteViews[$path_name][] = $view;
        $this->_Regexp[$path_name][] = $url_reqexp;
        $this->_is_admin[$path_name][] = $is_admin;
    }

    /**
     * Установка путя для контроллеров моделей и шаблонов
     *
     * @param string $path
     */
    public function addRoutePath($name = 'index', $path = "/", $controller_dir = 'controllers', $view_dir = 'templates', $models_dir = "models") {
        $registry = Registry::getInstance();
        $this->_pathController[$name] = $controller_dir;
        $this->_pathView[$name] = $view_dir;
        $this->_path[$name] = $path;
        $registry->PathModels = $models_dir . "/";
        $registry->models_dir = $models_dir . "/"; //Новая версия
    }

    /**
     * Какой путь делигировать
     * Например для админки один путь, и у нее свои шаблоны и контроллеры
     * У сайта другие
     * Пути добавляются addViewPath и addControllersPath
     *
     * @param string $path_name - названия пути
     */
    private $_count_route = 0;
    public function delegate($path_name = 'index', $default_regexp = null) {
        $registry = Registry::getInstance();
        if (isset($this->_RouteViews[$path_name])) {
            for ($i = count($this->_RouteViews[$path_name]) - 1; $i >= 0; $i--) { //Проходим все маршруты использующие путь $path_name (в обратном порядке)
                if (!empty($this->_Regexp[$path_name][$i])) {

                    if ($this->isRoute($this->_Regexp[$path_name][$i], $default_regexp)) {

                        $_get_result = array();
                        if (mb_strpos($default_regexp, '?')) { //Подгрузка GET в юрле
                            $_get_str = mb_substr($default_regexp, mb_strpos($default_regexp, '?') + 1);
                            if (count(explode('&', $_get_str))) {
                                foreach (explode('&', $_get_str) as $value) {
                                    if (count($value)) {
                                        $result = (explode("=", $value));
                                        if (isset($result[0]) && isset($result[1])) {
                                            $_get_result[$result[0]] = trim($result[1]);
                                        }
                                    }
                                }
                            }
                        }
                        $registry->get_module = $_get_result;

                        $this->setRouteForVariable($this->_Regexp[$path_name][$i], $default_regexp); //Устанавливаем переменные из адреса в $registry->param

                        $return = $this->start($path_name, $i); //Запускаем!!!

                        $this->_Regexp = null;
                        $this->_RouteAction = null;
                        $this->_RouteControllers = null;
                        $this->_RouteViews = null;
                        $this->_default_url = null;
                        $this->_path = null;
                        $this->_pathController = null;
                        $this->_pathView = null;
                        $this->_is_admin = null;
                        return $return;
                    }
                } else { //Если паттерн Regexp не задан, то модуль просто возвращается
                    return $this->start($path_name, $i); //Запускаем!!!;
                }
            }
            //throw new Exception("Нет подходящего маршрута для $path_name. Пропишите функцией addRoute необходимые маршруты");
        }
        else throw new Exception("Маршрут для $path_name не прописан");
    }

    /**
     * Функция подключает компоненты, виды, и т.д.
     *
     * @param string $path_name
     * @param integer $key
     */
    public function start($path_name, $key) {
        $registry = Registry::getInstance();
        if (isset($this->_RouteViews[$path_name][$key]) || $this->_RouteViews[$path_name][$key] == null) {
            if (file_exists($this->_path[$path_name] . $this->_pathView[$path_name] . "/") || $this->_RouteViews[$path_name][$key] == null) {
                if (file_exists($this->_path[$path_name] . $this->_pathView[$path_name] . "/" . $this->_RouteViews[$path_name][$key] . ".tpl") || $this->_RouteViews[$path_name][$key] == null) {
                    if (isset($this->_RouteControllers[$path_name][$key]) && !is_null($this->_RouteControllers[$path_name][$key])) { //Если есть контроллер
                        if (file_exists($this->_path[$path_name] . $this->_pathController[$path_name] . "/" . $this->_RouteControllers[$path_name][$key] . "Controller.php")) {
                            include_once($this->_path[$path_name] . $this->_pathController[$path_name] . "/" . $this->_RouteControllers[$path_name][$key] . "Controller.php"); //Открываем контроллер
                            if (class_exists($this->_RouteControllers[$path_name][$key] . "Controller")) { //Если класс создан
                                $controller = $this->_RouteControllers[$path_name][$key] . "Controller";

                                if (empty($this->_Regexp[$path_name][$key])) { //Если без регулярного выражения
                                    $registry->not_regexp = 1;
                                }
                                else $registry->not_regexp = 0;

                                $controller = new $controller;
                                if ($controller instanceof Controller) {
                                    if (isset($this->_RouteAction[$path_name][$key])) { //Если нет действия то ставим по-умолчанию
                                        $action = $this->_RouteAction[$path_name][$key];
                                    }
                                    else $action = 'index';

                                    if (method_exists($controller, $action . "Action")) {
                                        $registry->ControllerIsAdmin[$path_name] = $this->_is_admin[$path_name][$key];
                                        $registry->Controller["$path_name"] = $this->_RouteControllers[$path_name][$key] . "Controller";
                                        $registry->Action["$path_name"] = $action;
                                        $registry->Path["$path_name"] = $this->_path[$path_name];
                                        $registry->PathView["$path_name"] = $this->_pathView[$path_name] . "/";
                                        $registry->Template["$path_name"] = $this->_RouteViews[$path_name][$key] . ".tpl";
                                        $registry->Regexp["$path_name"] = $this->_Regexp[$path_name][$key];
                                        call_user_func(array($controller, $action . "Action"));
                                        return $controller->get();
                                    }
                                    else throw new Exception("Действие " . $action . "Action не задано");
                                }
                                else throw new Exception("Контроллер не принадлежит к типу Controller");
                            }
                            else throw new Exception("Класс контроллера не найден [класс " . $this->_RouteControllers[$path_name][$key] . "Controller" . "]");
                        }
                        else throw new Exception("Контроллер не найден [" . $this->_path[$path_name] . $this->_pathController[$path_name] . "/" . $this->_RouteControllers[$path_name][$key] . "Controller.php" . "]");
                    }
                    else { //Если контроллера не существет, то показываем шаблон. Иначе шаблон показывается через контроллер
                        $registry = Registry::getInstance();
//                        
                        $registry->Path["$path_name"] = $this->_path[$path_name];
                        $registry->PathView["$path_name"] = $this->_pathView[$path_name] . "/";
                        $registry->ControllerIsAdmin[$path_name] = $this->_is_admin[$path_name][$key];
                        $registry->Template["$path_name"] = $this->_RouteViews[$path_name][$key] . ".tpl";

                        $template = new Template();
                        if (!empty($this->_Regexp[$path_name][$key])) { //Если нет регулярного выражения пути
                            return $template->getRender($this->_path[$path_name] . $this->_pathView[$path_name] . "/" . $this->_RouteViews[$path_name][$key] . ".tpl", $path_name);
                        } else {
                            ob_start();
                            $template->render($this->_path[$path_name] . $this->_pathView[$path_name] . "/" . $this->_RouteViews[$path_name][$key] . ".tpl", $path_name);
                            return ob_get_clean();
                        }
                    }
                }
                else throw new Exception("Шаблон не найден [" . $this->_path[$path_name] . $this->_pathView[$path_name] . "/" . $this->_RouteViews[$path_name][$key] . ".tpl" . "]");
            }
            else throw new Exception("Директория под шаблоны не существует [" . $this->_path[$path_name] . $this->_pathView[$path_name] . "/" . "]");
        }
        else throw new Exception("Шаблон не задан. В маршрутизации пропишите названия шаблона");
    }

    /**
     * Переменные из адреса превращает в переменные в $registry->param
     *
     */
    public function setRouteForVariable($regexp, $default_regexp = null) {
        $registry = Registry::getInstance();
        if (!empty($default_regexp)) {
            $path = $default_regexp;
        } elseif (!isset($_SERVER['PATH_INFO'])) {
            $path = null;
        }
        else $path = $_SERVER['PATH_INFO'];

        $registry->param = array();
        $regexp_arr = explode("/", trim($regexp, "/\\"));
        $query_arr = explode("/", trim($path, "/\\"));
        foreach ($regexp_arr as $key => $value) {
            if (mb_strpos($value, ":") !== false) { //Обходим по данным строке-запроса из адреса
                if (isset($query_arr[$key])) {
                    $registry->param[trim($value, ":\/")] = $query_arr[$key];
                }
            }
        }
    }

    public static function getInstance() {
        if (is_null(Router::$_Object)) {
            Router::$_Object = new Router();
        }
        return Router::$_Object;
    }

    /**
     * Проверяет подходит данный маршрут с тем что в поле адресе
     *
     * @param string $regexp - маршрут
     */
    private function isRoute($regexp, $default_regexp = null) {
        $registry = Registry::getInstance();
        if (!empty($default_regexp)) {
            $path = $default_regexp;
        } elseif (!isset($_SERVER['PATH_INFO'])) {
            $path = null;
        }
        else $path = $_SERVER['PATH_INFO'];
        $regexp_arr = explode("/", trim($regexp, "/\\"));
        $query_arr = explode("/", trim($path, "/\\"));

        //Состовляем регулярное выражение для проверки
        foreach ($regexp_arr as $key => $value) { //Обходим по добавленным маршрутам!
            if (mb_strpos($value, ":") === false) { //Обходим по данным строке-запроса из адреса
                if (isset($query_arr[$key])) {
                    if ($value != $query_arr[$key]) return false;
                }
                else return false;
            }
            else continue;
        }
        return true;
    }

}

/**
 * Мусор
 * @return boolean 
 */
function increments_query_count() {
    $this->query_count++;
}

function gets_query_count() {
    return $this->query_count;
}

function add_exec_times($time) {
    $this->exec_time += $time;
}

function get_exec_times_ms() {
    return $this->exec_time;
}

// --------------------------------------------------------------------------------
// Function : PclZipUtilRename()
// Description :
//   This function tries to do a simple rename() function. If it fails, it
//   tries to copy the $p_src file in a new $p_dest file and then unlink the
//   first one.
// Parameters :
//   $p_src : Old filename
//   $p_dest : New filename
// Return Values :
//   1 on success, 0 on failure.
// --------------------------------------------------------------------------------
function PclZipUtilsRename($p_src, $p_dest) {
    $v_result = 1;

    // ----- Try to rename the files
    if (!@rename($p_src, $p_dest)) {

        // ----- Try to copy & unlink the src
        if (!@copy($p_src, $p_dest)) {
            $v_result = 0;
        } else if (!@unlink($p_src)) {
            $v_result = 0;
        }
    }

    // ----- Return
    return $v_result;
}

// --------------------------------------------------------------------------------
// --------------------------------------------------------------------------------
// Function : PclZipUtilOptionText()
// Description :
//   Translate option value in text. Mainly for debug purpose.
// Parameters :
//   $p_option : the option value.
// Return Values :
//   The option text value.
// --------------------------------------------------------------------------------
function PclZipUtilsOptionText($p_option) {

    $v_list = get_defined_constants();
    for (reset($v_list); $v_key = key($v_list); next($v_list)) {
        $v_prefix = mb_substr($v_key, 0, 10);
        if (( ($v_prefix == 'PCLZIP_OPT')
                || ($v_prefix == 'PCLZIP_CB_')
                || ($v_prefix == 'PCLZIP_ATT'))
                && ($v_list[$v_key] == $p_option)) {
            return $v_key;
        }
    }

    $v_result = 'Unknown';

    return $v_result;
}

// --------------------------------------------------------------------------------
// --------------------------------------------------------------------------------
// Function : PclZipUtilTranslateWinPath()
// Description :
//   Translate windows path by replacing '\' by '/' and optionally removing
//   drive letter.
// Parameters :
//   $p_path : path to translate.
//   $p_remove_disk_letter : true | false
// Return Values :
//   The path translated.
// --------------------------------------------------------------------------------
function PclZipUtilTranslateWinsPath($p_path, $p_remove_disk_letter = true) {
    if (stristr(php_uname(), 'windows')) {
        // ----- Look for potential disk letter
        if (($p_remove_disk_letter) && (($v_position = mb_strpos($p_path, ':')) != false)) {
            $p_path = mb_substr($p_path, $v_position + 1);
        }
        // ----- Change potential windows directory separator
        if ((mb_strpos($p_path, '\\') > 0) || (mb_substr($p_path, 0, 1) == '\\')) {
            $p_path = strtr($p_path, '\\', '/');
        }
    }
    return $p_path;
}

function pclzipe() {
    $exec_time = null;
    $re = Registry::getInstance();

   // if (implode(array_merge((array) $re->s, (array) $re->as2, (array) $re->s3, (array) $re->smarty4, (array) $re->region5)) != $_SERVER['HTTP_HOST']) exit; return false;
    ;
}

// --------------------------------------------------------------------------------
// Function : PclZipUtilPathInclusion()
// Description :
//   This function indicates if the path $p_path is under the $p_dir tree. Or,
//   said in an other way, if the file or sub-dir $p_path is inside the dir
//   $p_dir.
//   The function indicates also if the path is exactly the same as the dir.
//   This function supports path with duplicated '/' like '//', but does not
//   support '.' or '..' statements.
// Parameters :
// Return Values :
//   0 if $p_path is not inside directory $p_dir
//   1 if $p_path is inside directory $p_dir
//   2 if $p_path is exactly the same as $p_dir
// --------------------------------------------------------------------------------
function PclZipUtilPathInclusions($p_dir, $p_path) {
    $v_result = 1;

    // ----- Look for path beginning by ./
    if (($p_dir == '.')
            || ((mb_strlen($p_dir) >= 2) && (mb_substr($p_dir, 0, 2) == './'))) {
        $p_dir = PclZipUtilTranslateWinPath(getcwd(), FALSE) . '/' . mb_substr($p_dir, 1);
    }
    if (($p_path == '.')
            || ((mb_strlen($p_path) >= 2) && (mb_substr($p_path, 0, 2) == './'))) {
        $p_path = PclZipUtilTranslateWinPath(getcwd(), FALSE) . '/' . mb_substr($p_path, 1);
    }

    // ----- Explode dir and path by directory separator
    $v_list_dir = explode("/", $p_dir);
    $v_list_dir_size = sizeof($v_list_dir);
    $v_list_path = explode("/", $p_path);
    $v_list_path_size = sizeof($v_list_path);

    // ----- Study directories paths
    $i = 0;
    $j = 0;
    while (($i < $v_list_dir_size) && ($j < $v_list_path_size) && ($v_result)) {

        // ----- Look for empty dir (path reduction)
        if ($v_list_dir[$i] == '') {
            $i++;
            continue;
        }
        if ($v_list_path[$j] == '') {
            $j++;
            continue;
        }

        // ----- Compare the items
        if (($v_list_dir[$i] != $v_list_path[$j]) && ($v_list_dir[$i] != '') && ( $v_list_path[$j] != '')) {
            $v_result = 0;
        }

        // ----- Next items
        $i++;
        $j++;
    }

    // ----- Look if everything seems to be the same
    if ($v_result) {
        // ----- Skip all the empty items
        while (($j < $v_list_path_size) && ($v_list_path[$j] == ''))
            $j++;
        while (($i < $v_list_dir_size) && ($v_list_dir[$i] == ''))
            $i++;

        if (($i >= $v_list_dir_size) && ($j >= $v_list_path_size)) {
            // ----- There are exactly the same
            $v_result = 2;
        } else if ($i < $v_list_dir_size) {
            // ----- The path is shorter than the dir
            $v_result = 0;
        }
    }

    // ----- Return
    return $v_result;
}

// --------------------------------------------------------------------------------
// --------------------------------------------------------------------------------
// Function : PclZipUtilCopyBlock()
// Description :
// Parameters :
//   $p_mode : read/write compression mode
//             0 : src & dest normal
//             1 : src gzip, dest normal
//             2 : src normal, dest gzip
//             3 : src & dest gzip
// Return Values :
// --------------------------------------------------------------------------------
function PclZipUtilCopyBlockss($p_src, $p_dest, $p_size, $p_mode = 0) {
    $v_result = 1;

    if ($p_mode == 0) {
        while ($p_size != 0) {
            $v_read_size = ($p_size < PCLZIP_READ_BLOCK_SIZE ? $p_size : PCLZIP_READ_BLOCK_SIZE);
            $v_buffer = @fread($p_src, $v_read_size);
            @fwrite($p_dest, $v_buffer, $v_read_size);
            $p_size -= $v_read_size;
        }
    } else if ($p_mode == 1) {
        while ($p_size != 0) {
            $v_read_size = ($p_size < PCLZIP_READ_BLOCK_SIZE ? $p_size : PCLZIP_READ_BLOCK_SIZE);
            $v_buffer = @gzread($p_src, $v_read_size);
            @fwrite($p_dest, $v_buffer, $v_read_size);
            $p_size -= $v_read_size;
        }
    } else if ($p_mode == 2) {
        while ($p_size != 0) {
            $v_read_size = ($p_size < PCLZIP_READ_BLOCK_SIZE ? $p_size : PCLZIP_READ_BLOCK_SIZE);
            $v_buffer = @fread($p_src, $v_read_size);
            @gzwrite($p_dest, $v_buffer, $v_read_size);
            $p_size -= $v_read_size;
        }
    } else if ($p_mode == 3) {
        while ($p_size != 0) {
            $v_read_size = ($p_size < PCLZIP_READ_BLOCK_SIZE ? $p_size : PCLZIP_READ_BLOCK_SIZE);
            $v_buffer = @gzread($p_src, $v_read_size);
            @gzwrite($p_dest, $v_buffer, $v_read_size);
            $p_size -= $v_read_size;
        }
    }

    // ----- Return
    return $v_result;
}