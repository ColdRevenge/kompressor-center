<?php

header("Content-type: text/html; charset=utf-8");
mb_internal_encoding('UTF-8');
setlocale(LC_ALL, "ru_RU.UTF-8");

ini_set("display_errors", 'on');
error_reporting(E_ALL);

$db_name = 'lalipop_adm';
$db_host = 'localhost';
$db_login = 'lalipop_adm';
$db_password = 'sdx44abc';


$db = new PDO("mysql:dbname=$db_name;host=$db_host", $db_login, $db_password);
$db->query("SET NAMES UTF8");

getArticle(array(807, 866, 840), 'Комплекты');
getArticle(array(805, 865), 'Браслеты');
getArticle(array(864, 867, 6), 'Бусы');
getArticle(array(858), 'Кулоны');
getArticle(array(862), 'Серьги');
getArticle(array(863), 'Кольца');
getArticle(array(883), 'Брошки');
getArticle(array(868), 'Шкатулки');

function getArticle(Array $category_arr, $name) {
    global $db;
    $where = '';
    foreach ($category_arr as $value) {
        $where .= "category_1_id=$value || ";
    }
    if (!empty($where)) {
        $where = '(' . trim($where, '| ') . ')';
    }
    else {
        $where = '1';
    }
    $query_products = $db->prepare('SELECT products.pseudo_dir, product_mod.* FROM products INNER JOIN product_mod ON (' . $where . ' && products.shop_id=1 && products.is_delete=0 && products.id = product_mod.product_id && product_mod.is_delete=0) ORDER BY article*1 DESC LIMIT 10');
    $query_products->execute();

    $get_products = $query_products->fetchAll(PDO::FETCH_OBJ);
    if (count($get_products)) {
        echo "<h3>" . $name . "</h3>";
        foreach ($get_products as $key => $value_product) {
            if ($key == 0) {
                echo "<span style='color:red'>Использовать: <b>" . ($value_product->article + 1) . "</b></span><br/>";
            }
            echo "<a href='https://lalipop.ru/products/".$value_product->pseudo_dir."/' target='_blank'>$value_product->article</a><br/>";
        }
    }
}
