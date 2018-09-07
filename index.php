<?php

function info($param = null)
{
    echo '<pre>';
    print_r($param ?? phpinfo());
    echo '</pre>';
    die();
}

$char_adress = null; //Строка адреса которая хранит адрес уточняющих характеристик каталога
// 

//$_SERVER['PHP_SELF'] = $_SERVER['REQUEST_URI'] = $_SERVER['PATH_INFO'] = $_SERVER['ORIG_PATH_INFO'];
//if (isset($_GET['test2'])) {
//    $start = xdebug_time_index();
//}
$shop = 'domains'; // kompressor
$catalog_dir = 'catalog';
$shop_type = 0;

if (isset($_SERVER['REQUEST_URI'])) {
    //Для брендов укорачиваем url
    $_SERVER['REQUEST_URI'] = str_replace('/brands/', '/catalog/brand/category/', $_SERVER['REQUEST_URI']);
    $_SERVER['REQUEST_URI'] = str_replace("/$catalog_dir/", '/catalog/', $_SERVER['REQUEST_URI']);

}
if (isset($_SERVER['PATH_INFO'])) {
    $_SERVER['PATH_INFO'] = str_replace('/brands/', '/catalog/brand/category/', $_SERVER['PATH_INFO']);
    $_SERVER['PATH_INFO'] = str_replace("/$catalog_dir/", '/catalog/', $_SERVER['PATH_INFO']);


}
$php_self = ''; //Сохраняем старое значение переменной до обработки
if (isset($_SERVER['PHP_SELF'])) {
    $php_self = $_SERVER['PHP_SELF'];
    $_SERVER['PHP_SELF'] = str_replace('/index.php/brands/', '/index.php/catalog/brand/category/', $_SERVER['PHP_SELF']);
    $_SERVER['PHP_SELF'] = str_replace("/$catalog_dir/", '/catalog/', $_SERVER['PHP_SELF']);


}
//print_r($_SERVER);
//phpinfo();
/**
 * @author Дизайн студия OX2 
 * @site http://ox2.ru/
 * @version 0.0.4.7
 */
include_once("config.php");
if ($_SERVER['REMOTE_ADDR'] != '83.149.8.209') {
    //  exit('сайт закрыт');
}
try {
    $config = new Config();
    include_once $config->getDocumentRoot() . $config->getFolder() . '/config_path.php';
    $registry = Registry::getInstance();
    if (mb_strpos($_SERVER['REQUEST_URI'], 'sync/buy/market') === false) { //Если покупка на маркете то редирект не нужен
        if (mb_strpos($_SERVER['REQUEST_URI'], "index.php") !== false) {
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . $registry->base_url . mb_substr($_SERVER['REQUEST_URI'], 11));
        }
        if (isset($_SERVER['PATH_INFO'])) {
            if (mb_substr($_SERVER['PATH_INFO'], mb_strlen($_SERVER['PATH_INFO']) - 1) != '/') {
                header('HTTP/1.1 301 Moved Permanently');
                header('Location: ' . rtrim($registry->base_url, "/") . $_SERVER['PATH_INFO'] . '/');
            }
        }
    }
} catch (Exception $e) {
    echo "Ошибка" . $e->getMessage();
}


$registry->char_adress = $char_adress;

$registry->config = $config;

include_once($registry->lib_dir . "Lavra.php");

Lavra_Loader::LoadClass('CacheModule');
Lavra_Loader::LoadClass('Cache');
$cac = Cache::getInstance();
//$cac->deleteTag('Category');
//$cac->flush();

include_once $registry->class_dir . 'Currency.php';
$currency = new Currency();
$registry->currency = $currency->getDefaultCurrency();
$registry->shop_default_currency = $registry->currency; //Валюта, которая по-умолчанию в магазине (в ней будут хранится цены в корзине и заказах)

if (isset($_SESSION['user_id'])) { //Устанавливаем валюту по-умолчанию, если пользователь автоизован
    include_once $registry->class_dir . 'Users.php';
    $users = new Users();
    $get_user = $users->getUserId($_SESSION['user_id']);
    if (isset($get_user->id)) {
        if ($get_user->default_currency_id > 0) {
            $curr = $currency->getCurrencyId($get_user->default_currency_id);
            if (isset($curr->id)) {
                $registry->currency = $curr;
            }
        }
    }

    if (isset($_GET['currency']) && (int) $_GET['currency'] > 0) { //Устанавливаем валюту по-умолчанию
        $curr = $currency->getCurrencyId((int) $_GET['currency']);
        if (isset($curr->id)) {
            $currency->setDefaultCurrencyUser((int) $_GET['currency'], $_SESSION['user_id']);
            $registry->currency = $curr;
        }
    }
}

include_once $registry->modules_dir . 'setting/models/Setting.php';
$registry->setting_obj = new Setting();
$registry->setting = $registry->setting_obj->getGeneral();
include_once($registry->lib_dir . "Routes.php"); //Подключаем маршруты

echo Lavra_Loader::getLoadModule("admin");
//echo $registry->db->get_exec_time_ms() . '###<br/>';
//echo $registry->db->get_query_count() . '<br/>';
if ($registry->isAjax != 1) {
//    $end = xdebug_time_index();
//    echo "$start<br/>$end";
}
