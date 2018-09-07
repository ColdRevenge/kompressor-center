<?php

/**
 * @version 0.03
 */
class Lavra_Loader {

    static function Loader($module_name, $folder = null) {
        if (!is_null($folder))
            $folder = trim($folder, "\\/") . "/";
        $registry = Registry::getInstance();

        if (file_exists($registry->base_dir . "models/$folder$module_name.php"))
            include_once($registry->base_dir . "models/$folder$module_name.php");
        else
            throw new Exception("Модуль не найден [" . $registry->base_dir . "models/$folder$module_name.php]");
    }

    static function LoadLib($lib_name) {
        $registry = Registry::getInstance();

        if (file_exists($registry->base_dir . "lib/class.$lib_name.php"))
            include_once($registry->base_dir . "lib/class.$lib_name.php");
        else
            throw new Exception("Модуль не найден [" . $registry->base_dir . "lib/class.$lib_name.php]");
    }

    static $_is_load_class = array();

    /**
     * Подгружает классы и интерфейсы к ним
     * @param <type> $class_name - имя класса, класс должен лежать в папке class_dir
     * @param <type> $interface_name
     */
    static function LoadClass($class_name, $interface_name = null, $folder = null) {
        if (!isset(Lavra_Loader::$_is_load_class[$class_name])) {
            $registry = Registry::getInstance();
            if (!empty($folder)) {
                $folder = trim($folder, ' /') . '/';
            }
            if (!is_null($interface_name)) { //Подгружаем интерфейсы
                if (file_exists($registry->interface_dir . $folder . "$interface_name.php")) { //Подгружаем классы
                    include_once($registry->interface_dir . $folder . "$interface_name.php");
                    if (!interface_exists($interface_name)) {
                        throw new Exception("Интерфейс не найден $interface_name");
                    }
                } else
                    throw new Exception("Интерфейс не найден [" . $registry->class_dir . $folder . "$class_name.php");
            }

            if (file_exists($registry->class_dir . $folder . "$class_name.php")) { //Подгружаем классы
                include_once($registry->class_dir . $folder . "$class_name.php");
                Lavra_Loader::$_is_load_class[$class_name] = 1;
                if (!class_exists($class_name)) {
                    throw new Exception("Класс не найден $class_name");
                }
            } else {
                throw new Exception("Класс не найден [" . $registry->class_dir . $folder . "$class_name.php");
            }
        }
    }

    static function LoadController($controller_name) {
        $registry = Registry::getInstance();

        if (file_exists($registry->base_dir . "controllers/$controller_name" . "Controller.php"))
            include_once($registry->base_dir . "controllers/$controller_name" . "Controller.php");
        else
            throw new Exception("Контроллер не найден [" . $registry->base_dir . "controllers/$controller_name" . "Controller.php");
    }

    /**
     * Загружает модуль, и возвращает информацию выданую модулем
     * @param <type> $module_name - название модуля
     * @param <type> $regexp - если в модуле несколько regexp-ов, отрабатывается только тот, который вписан (можно в массиве прописать несколько regexp)
     * @return <type>
     */
    static function getLoadModule($module_name, $default_url = null, $module_dir = null) {
        $registry = Registry::getInstance();
        if ($module = Lavra_Loader::getCheckModule($module_name, $module_dir)) {
//            $registry = Registry::getInstance();
//            if (!empty ($default_url)) {
//                $registry->default_url = $default_url;
//            }
//            ob_start();
            $registry->is_load_module = 1;
            $module->config();
            $module->route();
            return $module->run($default_url);
//            return ob_get_clean();
        }
        return false;
    }

    /**
     * Подключает модуль
     * Если модуль не содержит Regexp, возвращается значение модуля
     * @param string $module_name
     */
    static function LoadModule($module_name) {
        if ($module = Lavra_Loader::getCheckModule($module_name)) {
            $module->config();
            $module->route();
            return $module->run();
        }
    }

    static $_is_load_models = array();

    /**
     *
     * @param <type> $model_name  - Класс модуля
     * @param <type> $module - папка с моделями, для подгрузки моделей из др. модулей
     * @param <type> $models_dir - папка с модулями
     * @param <type> $folder - папка лежащая в $models_dir, с семействами классов
     */
    static function LoadModels($model_name, $module = null, $models_dir = "models", $folder = null) {
        if (!isset(Lavra_Loader::$_is_load_models[$model_name][$module][$models_dir])) {
            $registry = Registry::getInstance();
            if (!empty($folder))
                $folder = trim($folder, "/") . '/';
//        echo "$module<br/>";
            if (isset($registry->Path["$module"])) {
                if (!empty($models_dir)) { //Если указана папка, в которой храняться модели
                    $models_path = rtrim($registry->Path["$module"], "/") . "/" . trim($models_dir, "/") . "/" . $folder . $model_name . ".php";
                } else { //Берем папку там же где и модели
                    $models_path = rtrim($registry->Path["$module"], "/") . trim($module, "/") . "/models/" . $folder . $model_name . ".php";
                }
            }
            if (empty($module)) { //Если модель берется из текущего модуля
                if (file_exists($models_path)) {
                    include_once($models_path);
                    Lavra_Loader::$_is_load_models[$model_name][$module][$models_dir] = 1;
//                if (!class_exists($model_name)) {
//                    throw new Exception("Класс $model_name не найден");
//                }
                } else
                    throw new Exception("Молуль не найден! [" . $models_path . "]. Код ошибки: 3");
            }///var/www/portal.tartila.net/web/dc/modules/dc_xml_parse/models/parser/IXMLParser.php/##
            else { //Если модель подгружается из сторонегно модуля
                if (file_exists($registry->modules_dir . $module . "/")) {
//            echo $registry->modules_dir.$module."/".$registry->PathModels.$folder.$model_name.".php"."/##<br/>";
                    if (file_exists($registry->modules_dir . $module . "/" . $registry->PathModels . $folder . $model_name . ".php")) {
                        include_once($registry->modules_dir . $module . "/" . $registry->PathModels . $folder . $model_name . ".php");
                        Lavra_Loader::$_is_load_models[$model_name][$module][$models_dir] = 1;
//                    if (!class_exists($model_name)) {
//                        throw new Exception("Класс $model_name не найден");
//                    }
                    } else
                        throw new Exception("Модуль <B>$module</B> не найден [" . $registry->modules_dir . $module . "/" . $registry->PathModels . $folder . $model_name . ".php" . "]. Код ошибки: 2");
                } else
                    throw new Exception("Модуль <B>$module</B> не найден [" . $registry->modules_dir . $module . "]. Код ошибки: 1");
            }
        }
    }

    static public $isLoadModule = array();

    /**
     * Проверяет на существование и правильность модуль, и возвращает объект проверенного модуля
     *
     */
    static public function getCheckModule($module_name, $module_dir = null) {
        $registry = Registry::getInstance();
        if (!empty($module_name)) {
            if (empty($module_dir))
                $dir = $registry->modules_dir;
            else
                $dir = $module_dir;

//        if (!isset(Lavra_Loader::$isLoadModule[$module_name])) {
            if (file_exists($dir . $module_name) && filetype($dir . $module_name) == "dir") {
                if (file_exists($dir . "$module_name/Bootstrap.php")) {
                    include_once($dir . "$module_name/Bootstrap.php");
                    Lavra_Loader::$isLoadModule[$module_name] = 1;
                    $module_name = $module_name . "Bootstrap";
                    if (class_exists($module_name)) {
                        $module = new $module_name;
                        if ($module instanceof IBootstrap) {
                            return $module;
                        } else
                            throw new Exception($module_name . "Bootstrap не поддерживает интерфейс IBootstap");
                    } else
                        throw new Exception($module_name . "Bootstrap не может быть вызван. Класса не существет.");
                } else
                    throw new Exception("Модуль не может быть открыт. Не найден bootstrap-файл модуля");
            } else
                throw new Exception("Модуль не найден");
        }
//        }
//        else throw new Exception("Невозможно загрузить модуль $module_name, т.к. этот модуль уже загружен");
    }

}
