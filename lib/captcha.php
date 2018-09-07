<?php
include_once rtrim($_SERVER['DOCUMENT_ROOT'],"/")."/config.php";
include_once rtrim($_SERVER['DOCUMENT_ROOT'],"/")."/class/Registry.php";
$registry = Registry::getInstance();
$registry->lib_dir = rtrim($_SERVER['DOCUMENT_ROOT'],"/").'/lib/';
include_once rtrim($_SERVER['DOCUMENT_ROOT'],"/")."/class/Captcha.php";

$captcha = new Captcha();

$captcha->setWidth(80);
$captcha->setDefects(2331420);
$captcha->setHeight(30);
$captcha->setBackGround(255, 255, 255);
$captcha->setCoorText(-20);
$captcha->setFontSize(12);
$captcha->setCountSymbol(3);
$captcha->outCaptcha();