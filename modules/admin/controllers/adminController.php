<?php

class adminController extends Controller {

    /**
     * Функция подгружает модули для администратирования
     */
    public function adminAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass('Logger');
        Lavra_Loader::LoadModels('Access', 'users');

        $registry->all_access = $this->_getAccess(); //Все модули




        if ($registry->is_admin != 1) { //Если пользователь не авторизован, или не админ
            $this->content = Lavra_Loader::getLoadModule("auth", "/auth/admin/auth/");
        } elseif ($registry->is_admin == 1) { //Если пользователь авторизован

            /* Проверка прав доступа  */
            $is_access = true; //Есть доступ
            if ($registry->user_id > 0) { //Если пользователь авторизован
                $my_access = unserialize($registry->get_user->access);
                if (isset($my_access['accesses'])) { //Проверка прав доступа
                    $denied_url_arr = array_diff($registry->all_access['accesses'], $my_access['accesses']); //Запрещенные адреса
                    foreach ($denied_url_arr as $denied_url) {
                        $current_page = trim($_SERVER['REQUEST_URI'], ' /'); //Текущая страница
                        if (mb_strpos($denied_url, ':') !== false) { //Обрезаем не явные маршруты
                            $denied_page = trim(mb_substr($denied_url, 0, mb_strpos($denied_url, ':')), ' /');
                        } else {
                            $denied_page = trim($denied_url, ' /');
                            ;
                        }
                        if (mb_strpos($current_page, $denied_page) !== false && mb_strpos($current_page, $denied_page) == 0) {
                            $is_access = false; //Блокируем доступ
                        }
                    }
                    $registry->menu = $this->menu = $my_access;
                }
            }
            $is_access = true;
            if ($is_access === true) { //Если есть доступ
                if (isset($this->param['module'])) {
                    if ($registry->isAjax == 0) {

                        if (date('d') % 5 == 0 && date('H') == 0) {
                            CacheModule::delCacheModule('left_podbor');
                        }
                        if (count($_POST) > 0) {
                            if ($this->param['module'] == 'category') {
                                CacheModule::delCacheModule('category');
                                CacheModule::delCacheModule('Controller');
                            }
                            if ($this->param['module'] == 'page') {
                                CacheModule::delCacheModule('page');
                                CacheModule::delCacheModule('category');
                                CacheModule::delCacheModule('Controller');
                            }
                            if ($this->param['module'] == 'products') {
                                CacheModule::delCacheModule('products');
                                CacheModule::delCacheModule('Controller');
                            }
                            if ($this->param['module'] == 'characteristics') {
                                CacheModule::delCacheModule('products');
                                CacheModule::delCacheModule('Controller');
                                CacheModule::delCacheModule('category');
                            }

                            if ($this->param['module'] == 'news') {
                                Lavra_Loader::LoadModels("Forum", "forum");
                                $forum = new Forum();
                                $forum->importNews();
                            }
                        }

                        $this->content = Lavra_Loader::getLoadModule($this->param['module']);

                        $registry = Registry::getInstance();
                        Lavra_Loader::LoadModels("Sitemap", "setting");
                        $sitemap = new Sitemap();
                        if ($registry->shop == 'lady') {
                            $sitemap->save($registry->base_dir . "sitemap_lady.xml");
                        } elseif ($registry->shop == 'platok') {
                            $sitemap->save($registry->base_dir . "sitemap_platok.xml");
                        } elseif ($registry->shop == 'sumka') {
                            $sitemap->save($registry->base_dir . "sitemap_sumka.xml");
                        } elseif ($registry->shop == 'woman') {
                            $sitemap->save($registry->base_dir . "sitemap_woman.xml");
                        } else {
                            $sitemap->save($registry->base_dir . "sitemap.xml");
                        }
                    }
                }
            }
        }
    }

    /**
     * Возвращает все права на все установленные модули
     * @return type
     */
    private function _getAccess() {
        $registry = Registry::getInstance();
        $modules = scandir($registry->modules_dir);
        foreach ($modules as $value) {
            if (file_exists($registry->modules_dir . '/' . $value . '/Bootstrap.php')) { //Если это модуль
                include_once $registry->modules_dir . '/' . $value . '/Bootstrap.php'; //Открываем его
                if (class_exists($value . 'Bootstrap')) { //Если бутстап доступен
                    $bootstrap_class = $value . 'Bootstrap';
                    $bootstrap = new $bootstrap_class;
                    $methods = get_class_methods($bootstrap);
                    if (in_array('getAccess', $methods)) { //Если в модуле установленны разграничения прав
                        call_user_func(array($bootstrap, 'getAccess'));
                    }
                }
            }
        }


        $access = Access::getInstance();
        return $access->getAccess();
    }

}
