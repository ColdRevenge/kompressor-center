<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of 1cexport
 *
 * @author Kisa
 */
class Exchange1C {

    public function CheckAuth() {
        setcookie("1c", 'hello', time() + 3600);
        exit("success\n1c\nhello");
    }

    public function initAuth() {
        setcookie("1c", 'hello', time() + 3600);
        exit("zip=yes\file_limit=7777777\nhello");
    }

    public function importFile($file_name) {
        $request = (file_get_contents("php://input"));
        if (mb_strlen($request) > 15) {
            $fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/files/1c/' . $file_name, 'w');
            fwrite($fp, $request);
            fclose($fp);
        }
        exit('success');
    }

}

$exchange = new Exchange1C();
if (isset($_GET['mode']) && $_GET['mode'] == 'checkauth') {
    $exchange->CheckAuth();
} elseif (isset($_GET['mode']) && $_GET['mode'] == 'init') {
    $exchange->initAuth();
} elseif (isset($_GET['mode']) && $_GET['mode'] == 'init') {
    $exchange->initAuth();
} elseif (isset($_GET['mode']) && $_GET['mode'] == 'file') {
    $exchange->importFile($_GET['filename']);
} elseif (isset($_GET['mode']) && $_GET['mode'] == 'import') { //Заказы
    $exchange->importFile($_GET['filename']);
} else {
    
    error_reporting(E_ALL);
    ob_start();
    $request = (file_get_contents("php://input"));
    print_r($request);
    echo '---';
    print_r($_GET);
    $fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/files/1c/' . 'cart_' . time() . '.txt', 'w');
    fwrite($fp, ob_get_contents());
    fclose($fp);
    exit("success");
}
