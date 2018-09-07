<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CacheModule
 *
 * @author Komp
 */
class CacheModule {

    static public function getWrapperModuleLavraLoader($module_name, $module, $default_url = null) {
        $cacheModule = (CacheModule::getCacheModule($module_name, false)); //Из-за ограничения мемкеша в 1мб
        if ($cacheModule !== false) {
            return $cacheModule;
        } else {
            $string = Lavra_Loader::getLoadModule($module, $default_url);
            CacheModule::setCacheModule($module_name, $string, false);
            return $string;
        }
    }

    /**
     * Быстрая запись модуля
     * @param type $module_name - уникальное имя 
     * @param type $string - содержимое кэша
     */
    static public function getWrapperModule($module_name, $string) {
        $cacheModule = (CacheModule::getCacheModule($module_name, false)); //Из-за ограничения мемкеша в 1мб
        if ($cacheModule !== false) {
            return $cacheModule;
        } else {
            CacheModule::setCacheModule($module_name, $string, false);
            return $string;
        }
    }

    static $_is_get_chache_modude = array();

    static public function getCacheModule($module_name, $is_name_request = true, $default_url = '') {
        if (!isset(CacheModule::$_is_get_chache_modude[$module_name][$is_name_request][$default_url])) {
            $registry = Registry::getInstance();

            if ($registry->is_chache_file == false) {
                CacheModule::$_is_get_chache_modude[$module_name][$is_name_request][$default_url] = false;
                return false;
            }
            if (strpos($_SERVER['PHP_SELF'], $registry->admin_pseudo_dir) !== false) {
                CacheModule::$_is_get_chache_modude[$module_name][$is_name_request][$default_url] = false;
                return false;
            } else {
                if (CacheModule::isCacheModule($module_name, $is_name_request, $default_url)) {

                    $registry = Registry::getInstance();
                    if ($is_name_request == true) {
                        $request = md5($_SERVER['REQUEST_URI'] . serialize($_POST) . serialize($_GET));
                    } else {
                        $request = md5($default_url);
                    }

                    $fp = fopen($registry->base_dir . 'cache/' . $module_name . '_' . $request . '.php', 'r');
                    $return = fread($fp, filesize($registry->base_dir . 'cache/' . $module_name . '_' . $request . '.php'));
                    fclose($fp);
                    CacheModule::$_is_get_chache_modude[$module_name][$is_name_request][$default_url] = $return;
                    return $return;
                } else {
                    CacheModule::$_is_get_chache_modude[$module_name][$is_name_request][$default_url] = false;
                    return false;
                }
            }
        } else {
            return CacheModule::$_is_get_chache_modude[$module_name][$is_name_request][$default_url];
        }
    }

    static public function setCacheModule($module_name, $string, $is_name_request = true, $default_url = '') {
        $registry = Registry::getInstance();

        if ($registry->is_chache_file == false) {
            return false;
        }
        if (!empty($string)) {
            if ($is_name_request == true) {
                $request = md5($_SERVER['REQUEST_URI'] . serialize($_POST) . serialize($_GET));
            } else {
//            echo $_SERVER['REQUEST_URI'] . "\n";
//            print_r($_SERVER);
                $request = md5($default_url);
            }
            $fp = fopen($registry->base_dir . 'cache/' . $module_name . '_' . $request . '.php', 'w');
            fwrite($fp, $string);
            fclose($fp);
        }
    }

    static $_is_chache_modude = array();

    static public function isCacheModule($module_name, $is_name_request = true, $default_url = '') {
        if (!isset(CacheModule::$_is_chache_modude[$module_name][$is_name_request][$default_url])) {
//            print_r(CacheModule::$_is_chache_modude);
            $registry = Registry::getInstance();
            if ($is_name_request == true) {
                $request = md5($_SERVER['REQUEST_URI'] . serialize($_POST) . serialize($_GET));
            } else {
                $request = md5($default_url);
            }
            if (file_exists($registry->base_dir . 'cache/' . $module_name . '_' . $request . '.php')) {
                CacheModule::$_is_chache_modude[$module_name][$is_name_request][$default_url] = 1;
                return true;
            } else {
                return false;
            }
        }
    }

    static public function delCacheModule($module_name) {
        $registry = Registry::getInstance();
        if ($handle = opendir($registry->base_dir . 'cache/')) {
            while (false !== ($file = readdir($handle))) {
                if (strpos("m" . $file, $module_name) === 1) {
                    unlink($registry->base_dir . 'cache/' . $file);
                }
            }

            closedir($handle);
        }
    }

}
