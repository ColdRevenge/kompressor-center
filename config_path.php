<?php

date_default_timezone_set('Europe/Moscow');
global $config;
include_once($config->getDocumentRoot() . $config->getFolder() . "/class/" . "Registry.php");

$registry = Registry::getInstance();

$registry->shop = $shop;
$registry->shop_type = $shop_type;
$registry->catalog_dir = $catalog_dir;

$registry->open_category_id = 0;

$registry->shop_name = "Энергия Воздуха";

/*
 * Производительность 
 */
$registry->is_debug = true;  //Указать false - включен, ставиться в закрытых проектах
$registry->is_chache = false; //Мемкеш, false - выключек 
$registry->is_chache_file = false; //Файловый кеш, false - выключек 


$registry->is_rounding = 1; //Округление цен до 10-ых, при добавлении в корзину
$registry->is_multi_manager = false;
$registry->is_https_all = false; //Все пути автоматом меняет на https если true, исключения добавляются в fetchTemplate Template.php
//Controller - 60 строчка убрать 
//                CONCAT(upper(left(characteristic_value.name,1)),mb_substr(characteristic_value.name,2)) as name
//                
//                22 строчка getCharsArrayParamGroup2
//                  if ($id == 135) {
//             return $podbor->getCharsArrayParamGroup(array_merge(array($registry->open_category_id => $registry->open_category_id), $app->getChildsCategory(0, $registry->open_category_id)), $id);
//            }
//                
//                
//                getProductParamAction убрать - $products->setSort('desc_8', 'ASC');
//                
//                
//Characteristic - 149 строчка убрать 
//                CONCAT(upper(left(characteristic_value.name,1)),mb_substr(characteristic_value.name,2)) as name
//                
//                podbor.tpl 6я строчка
//                
//                Podbor.php удалить метод: getCharsArrayParamGroup
//                
//                FindChar.php - почистить от is_param_1 метод find
//                
//                find_selectionAction - при вызове метода find( убрать все что связано min_is_param_1 и max_is_param_2
//                
//                imorController удалить метод setCharParam и веде где он выывается
//Настройки
$registry->is_warehouse = 0; //Если 0 то показывать все товары, в т.ч. и и нет на складе
$registry->payment_system = 'robokassa';

/**
 * Потовые настройки
 */
$registry->is_send_mail = true; //Если требуется массовая рассылка, то лучше использовать smtp авторизация
if ($registry->is_send_mail === true) {
    $registry->default_send_mail_adress = 'Интернет магазин Энергия воздуха <kompressor-center.com>'; //Адррес с которого по умолчаию будет отправляться письма. Если не указан то береться из настроек
} else { //Если требуется массовая рассылка, то лучше использовать smtp авторизация
    $registry->default_send_mail_adress = 'Интернет магазин Энергия воздуха <kompressor-center.com>';

    $registry->mail_host = 'smtp.yandex.ru';
    $registry->mail_login = 'kompressor-center.com';
    $registry->mail_password = '700041';

    $registry->is_mail_debug = false;
}



/**
 * БД
 */
$registry->db_name = 'kompres-center';
$registry->db_host = 'localhost';
$registry->db_login = 'kukulkan'; // 'user-kc'
$registry->db_password = 'qwerty123456'; // 'M6k6Q2k5'
if (isset($_GET['test'])) {
    $registry->db_is_debug = true; //Отладка БД
} else {
    $registry->db_is_debug = false; //Отладка БД
}
/**
 * Бекапы
 * Проверить!!!
 */
$registry->is_system_backup = true; //Если сервер поддерживает команду system, то поставить true. Если нет, то false. Но при false будет высокая нагрузка и может не хватить оперативки при большом кол-ве товаров
$registry->is_backup_files = false; //Если false, то файлы не будут загоняться в бекап. Экономия памяти и ресурсов 



/**
 * Работа магазина
 */
$registry->is_coupon = false; //Включает работу купонов
$registry->is_multi_mod = false; //Если true, то включается возможность нескольких модификаций товаров, что снижает скорость работы
$registry->is_b2b = false; //Если false то скорость будет выше. Если требуется B2B то нужно включить true

$registry->is_shop_mode = true; //Если true - значит режим интернет магазина, если false - обычный сайт

/**
 * Пути и другое
 */
if (isset($_SERVER['REQUEST_SCHEME'])) {
    $host = $_SERVER['REQUEST_SCHEME'] . '://';
} else {
    $host = 'http://';
}

$registry->host = $host;
$registry->session_id = session_id();
if (isset($_POST['session_id']) && !empty($_POST['session_id'])) {
    $registry->session_id = $_POST['session_id'];
}

$registry->is_main = 0;
$registry->open_category_parent_id = 0;
$registry->user_region_id = 1;
$registry->user_id = 0;
$registry->is_pseudo_dir_product = true; //Если = true;
if (!isset($_SESSION['count_product'])) {
    $_SESSION['count_product'] = 48; //Кол-во продуктов на странице в каталоге
    $registry->page_count_product = $_SESSION['count_product']; //Кол-во товаров выводимых на странице
} elseif ($_SESSION['count_product'] == 0)
    $registry->page_count_product = 100000;
else {
    $registry->page_count_product = $_SESSION['count_product']; //Кол-во товаров выводимых на странице
}

$registry->db = $config->connectDB($registry->db_name, $registry->db_host, $registry->db_login, $registry->db_password, $registry->db_is_debug);
$registry->isAjax = $config->isAjax();



$registry->is_admin = 0;
//Пути
$registry->base_dir = rtrim($_SERVER['DOCUMENT_ROOT'], "/") . (($config->getFolder()) ? "/" : null) . $config->getFolder() . "/";
$registry->folder = $config->getFolder();
$registry->lib_dir = $registry->base_dir . "lib/";
$registry->modules_dir = $registry->base_dir . "modules/";
$registry->template_dir = $registry->lib_dir . "smarty/";
$registry->admin_pseudo_dir = "xadmin/";
$registry->image_dir = $registry->base_dir . "images/";
$registry->fronted_images_dir = $registry->image_dir . "fronted/";
$registry->icons_dir = $registry->image_dir . "icons/";
$registry->gallery_dir = $registry->image_dir . "gallery/";
$registry->news_image_dir = $registry->image_dir . "news/";
$registry->dinst_dir = $registry->gallery_dir;
$registry->region5 = 'ru';
$registry->video_dir = $registry->base_dir . "video/";
$registry->banners_dir = $registry->image_dir . "banners/";
$registry->files_dir = $registry->base_dir . "files/";
$registry->files_products_dir = $registry->files_dir . "products/";



$registry->import_1c = $registry->files_dir . "1c/";

$registry->mail_dir = $registry->files_dir . "mail/";
$registry->import_dir = $registry->files_dir . "import/";
$registry->class_dir = $registry->base_dir . "class/";
$registry->interface_dir = $registry->base_dir . "interface/";
$registry->ajax_dir = $registry->base_dir . "ajax/";
$registry->base_template_dir = $registry->base_dir . "templates/";
$registry->template_message = $registry->base_template_dir . "messages.tpl"; //Сообщения выводятся в этот файл-шаблон
//
$registry->base_url = "http://" . $config->getHttpHost() . "/" . (($config->getFolder()) ? $config->getFolder() . "/" : null);
$registry->base_https_url = "http://" . $config->getHttpHost() . "/" . (($config->getFolder()) ? $config->getFolder() . "/" : null);
$registry->base_host_url = $registry->host . $config->getHttpHost() . "/" . (($config->getFolder()) ? $config->getFolder() . "/" : null); //С правильным host

$registry->shop_url = $registry->base_url; //Ссылка с shop_url устанавливается в Lavra.php

$registry->lib_url = $registry->base_host_url . "lib/";

$registry->image_url = $registry->base_host_url . "images/";
$registry->icons_url = $registry->image_url . "icons/";
$registry->sys_images_url = $registry->image_url . "sys/";
$registry->fronted_images_url = $registry->image_url . "fronted/";
$registry->news_image_url = $registry->image_url . "news/";
$registry->gallery_url = $registry->image_url . "gallery/";

$registry->files_url = $registry->base_host_url . "files/";
$registry->files_products_url = $registry->files_url . "products/";
$registry->s3 = array('l', 'e');
$registry->import_url = $registry->files_url . "import/";
$registry->admin_url = $registry->base_url . $registry->admin_pseudo_dir;
$registry->ajax_url = $registry->base_host_url . "ajax/";
$registry->files_url = $registry->base_host_url . "files/";
$registry->video_url = $registry->base_host_url . "video/";
$registry->banners_url = $registry->base_host_url . "banners/";

$registry->articles_files_dir = $registry->base_dir . "files/articles/files/";
$registry->articles_images_dir = $registry->base_dir . "files/articles/images/";

$registry->isMobile = 0;

$registry->is_lady_shop = 0; //Для лади лалипоп

//include $registry->base_dir . 'lib/Mobile_Detect.php';
//$detect = new Mobile_Detect;
//if ($registry->shop != 'forum') {
//    if ($detect->isMobile() && !$detect->isTablet()) {
//        $registry->isMobile = 1;
//    }
//}
//if (isset($_GET['mobile'])) {
//    $_SESSION['mobile'] = $_GET['mobile'];
//    $registry->isMobile = $_GET['mobile'];
//} elseif (isset($_SESSION['mobile'])) {
//    $registry->isMobile = $_SESSION['mobile'];
//}
//if ($registry->isMobile === 1) {
//    header('Vary: User-Agent');
//}

function checkSysFolder($base_dir, $name) {
    if (!(file_exists($base_dir . $name))) {
        mkdir($base_dir . $name);
        chmod($base_dir . $name, 0666);
    }
}

function setURL() {
    $registry = Registry::getInstance();
    $registry->video_dir = $registry->base_dir . "video/";
//    $registry->banners_dir = $registry->base_dir . "banners/";
    $registry->news_image_dir = $registry->image_dir . "news/";
    $registry->icons_dir = $registry->image_dir . "icons/";
    $registry->gallery_dir = $registry->image_dir . "gallery/";
    $registry->preview_dir = $registry->image_dir . "preview/"; //Путь для превьюшек 
    $registry->video_url = $registry->base_host_url . "video/";
    $registry->banners_url = $registry->base_host_url . "banners/";
    $registry->gallery_url = $registry->image_url . "gallery/";
    $registry->preview_url = $registry->image_url . "preview/"; //Путь для превьюшек 
    $registry->news_image_url = $registry->image_url . "news/";
    $registry->icons_url = $registry->image_url . "icons/";

    $registry->files_dir = $registry->base_dir . "files/";
    $registry->files_url = $registry->base_host_url . "files/";

    checkSysFolder($registry->image_dir, "icons");
    checkSysFolder($registry->image_dir, "gallery");
    checkSysFolder($registry->image_dir, "video");
    checkSysFolder($registry->image_dir, "banners");
    checkSysFolder($registry->image_dir, "news");
    checkSysFolder($registry->base_dir, "files");
    $registry->dinst_dir = $registry->gallery_dir;
}

if (!isset($_SESSION['coupon_code'])) {
    $_SESSION['coupon_code'] = '';
}