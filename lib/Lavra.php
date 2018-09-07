<?php



/**
 * Lavra FrameWork 0.0.1.0
 */
$registry = Registry::getInstance();
//Подключаем роутер
include_once($registry->lib_dir . "IBootstrap.php"); //Интерфейс для подключения модулей
include_once($registry->lib_dir . "Lavra_Loader.php");
include_once($registry->lib_dir . "Template.php");

setURL();
include_once($registry->lib_dir . "Controller.php");
include_once($registry->lib_dir . "Router.php");