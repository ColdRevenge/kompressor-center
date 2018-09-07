<?php

$registry = Registry::getInstance();
if ($registry->isAjax != 1) {
    $registry->MyName = 'portal';
    /**
     * Здесь хранятся все маршруты, и прочие настройки связаные с маршрутами
     */
//Загрузка контента
    $route = Router::getInstance();
    if (mb_strpos($_SERVER['PHP_SELF'], $registry->admin_pseudo_dir) === false) {
////Добавляем путь где будут искаться контроллеры и шаблоны..
        $route->addRoutePath($registry->MyName, $registry->base_dir, "controllers", "templates");
        $route->addRoute($registry->MyName, "/:module/:pseudo_dir/", "main", "main", "index", null); //По категориям
//        $route->addRoute($registry->MyName,"/page/:pseudo_dir/","main","main", "index",null); //По категориям
////$route->addRoute($registry->MyName,"/register/","register", "main"); //регистрация
//
//
//
        $route->addRoute($registry->MyName, "/404/", "404", "main", "index", null);
//print_r($_SESSION);user_id

//        if ($registry->shop == 'forum') {
            $delegate = $route->delegate($registry->MyName);
            echo $delegate;
            /**
             !!!!!!!!!!!!!!!!!!!!!!!!!! * Не сохраняет данные в профиль!!!!
             */
//        } else {
//            $ses['user_id'] = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '');
//            $ses['count_product'] = (isset($_SESSION['count_product']) ? $_SESSION['count_product'] : '');
//            $ses['sort_product_field'] = (isset($_SESSION['sort_product_field']) ? $_SESSION['sort_product_field'] : '');
//            $ses['sort_product_order'] = (isset($_SESSION['sort_product_order']) ? $_SESSION['sort_product_order'] : '');
//            $ses['product_is_active'] = (isset($_SESSION['product_is_active']) ? $_SESSION['product_is_active'] : '');
//            $ses['product_is_warehouse'] = (isset($_SESSION['product_is_warehouse']) ? $_SESSION['product_is_warehouse'] : '');
//            $ses['sort_method'] = (isset($_SESSION['sort_method']) ? $_SESSION['sort_method'] : '');
//            $ses['sort_ord'] = (isset($_SESSION['sort_ord']) ? $_SESSION['sort_ord'] : '');
//            $ses['PATH_TRANSLATED'] = (isset($_SERVER['PATH_TRANSLATED']) ? $_SERVER['PATH_TRANSLATED'] : ''); //$_SERVER['PATH_TRANSLATED'];
//            $param = md5(serialize($_POST) . '-' . serialize($_GET) . '-' . serialize($ses) . '-' . $registry->config->getCurrentUrl());
////     print_r($_SERVER);
//            $cacheModule = (CacheModule::getCacheModule('Controller-getContent-' . $registry->shop_type . '-' . $param . '-' . $registry->isMobile, false));
//
//            if ($cacheModule !== false) {
//                $return = ($cacheModule);
//                echo $return;
//            } else {
//                $delegate = $route->delegate($registry->MyName);
//                CacheModule::setCacheModule('Controller-getContent-' . $registry->shop_type . '-' . $param . '-' . $registry->isMobile, $delegate, false);
//                echo $delegate;
//            }
//        }
    }
//print_r($_SESSION);
//    if (isset ($_SESSION['is_auth'])) {
//        switch ($_SESSION['is_auth']) {
//            case 2: //Модератор
//                Lavra_Loader::LoadModule("admin");
//            case 3: //Админ
//                break;
//        }
//    }
} else { //Аяксовые модули
    if (mb_strpos($_SERVER['PHP_SELF'], $registry->admin_pseudo_dir) !== false) {
        echo Lavra_Loader::getLoadModule("related");
        echo Lavra_Loader::getLoadModule("products");
        echo Lavra_Loader::getLoadModule("uploader");
        echo Lavra_Loader::getLoadModule("category");
        echo Lavra_Loader::getLoadModule("import");
        echo Lavra_Loader::getLoadModule("page");
        echo Lavra_Loader::getLoadModule("news");
        echo Lavra_Loader::getLoadModule("reports");
        echo Lavra_Loader::getLoadModule("characteristics");
        echo Lavra_Loader::getLoadModule("users");

        echo Lavra_Loader::getLoadModule("xuploader"); //Удалить во всех проектах, используется только в Тинько
    }
    echo Lavra_Loader::getLoadModule("sync"); //Покупка на маркете
    echo Lavra_Loader::getLoadModule("uploader_article");
    echo Lavra_Loader::getLoadModule("uploader_products");

    if ($registry->shop == 'forum') {
        echo Lavra_Loader::getLoadModule("forum");
    }

    $registry->MyName = 'ajax';

    $route = Router::getInstance();
//    $route->addRoutePath('ajax', $registry->base_dir,"controllers","templates");
//    $route->addRoute('ajax',"/child_category/:pseudo_dir/","ajax_menu","main", "getChildMenu",null);
//    $route->addRoute('ajax',"/show_menu/:category_id/","show_menu","main", "show_menu",null);
//    echo $route->delegate('ajax');
    echo Lavra_Loader::getLoadModule("call_back");
    echo Lavra_Loader::getLoadModule("basket");
    echo Lavra_Loader::getLoadModule("faq");
    echo Lavra_Loader::getLoadModule("opinion");
    echo Lavra_Loader::getLoadModule("search");
    echo Lavra_Loader::getLoadModule("comments");
    echo Lavra_Loader::getLoadModule("catalog");
    echo Lavra_Loader::getLoadModule("send");
    echo Lavra_Loader::getLoadModule("order");
    echo Lavra_Loader::getLoadModule("auth");
    echo Lavra_Loader::getLoadModule("vs_product");
    echo Lavra_Loader::getLoadModule("discount");
    echo Lavra_Loader::getLoadModule("delivery");
    echo Lavra_Loader::getLoadModule("brand");


//    echo Lavra_Loader::getLoadModule("payment");
//    if (isset ($_SESSION['is_auth']) && $_SESSION['is_auth'] > 0) {
//        echo Lavra_Loader::getLoadModule("ajax_publ", null, "modules/publ/ajax/");
//    }
//    if (isset ($_SESSION['is_auth']) && $_SESSION['is_auth'] > 1) {
//        echo Lavra_Loader::getLoadModule("admin");
//        echo Lavra_Loader::getLoadModule("application", "/application/count_day/");
//    }
////    echo Lavra_Loader::getLoadModule("find");
//    echo Lavra_Loader::getLoadModule("comments");
//    echo Lavra_Loader::getLoadModule("ajax_find", null, "modules/find/ajax/");
//    echo Lavra_Loader::getLoadModule("calendar");
}