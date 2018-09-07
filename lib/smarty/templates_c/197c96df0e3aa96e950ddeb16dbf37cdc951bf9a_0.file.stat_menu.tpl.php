<?php /* Smarty version 3.1.24, created on 2015-09-13 16:44:12
         compiled from "/home/lalipop/domains/lalipop.ru/private_html//modules/stat/templates/stat_menu.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:190856209855f57dac01e788_39852802%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '197c96df0e3aa96e950ddeb16dbf37cdc951bf9a' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html//modules/stat/templates/stat_menu.tpl',
      1 => 1441980603,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190856209855f57dac01e788_39852802',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f57dac059a84_40506927',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f57dac059a84_40506927')) {
function content_55f57dac059a84_40506927 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '190856209855f57dac01e788_39852802';
?>
<div id="stat_menu">
    
    <div>Интернет магазин</div>
    <ul>
        <li><a href="/stat/profile/"<?php if ($_SERVER['REQUEST_URI'] == "/stat/profile/") {?> class="active"<?php }?>>Мой профиль</a></li>
        <li><a href="/stat/orders/"<?php if (strpos($_SERVER['REQUEST_URI'],"/stat/orders/") !== false) {?> class="active"<?php }?>>Мои заказы</a></li>
        <li><a href="/stat/delivery/post/"<?php if (strpos($_SERVER['REQUEST_URI'],"/stat/delivery/post/") !== false) {?> class="active"<?php }?>>Отследить заказ</a></li>
        <li><a href="/stat/password/"<?php if (strpos($_SERVER['REQUEST_URI'],"/stat/password/") !== false) {?> class="active"<?php }?>>Сменить пароль</a></li>
    </ul>
    <div>Форум Lalipop</div>
    <ul>
        <li><a href="https://forum.lalipop.ru/stat/profile/forum/"<?php if (strpos($_SERVER['REQUEST_URI'],"/stat/profile/forum/") !== false) {?> class="active"<?php }?>>Профиль на форуме</a></li>
        <li><a href="https://forum.lalipop.ru/my-post/"<?php if (strpos($_SERVER['REQUEST_URI'],"/my-post/") !== false) {?> class="active"<?php }?>>Мои публикации</a></li>
        <li><a href="https://forum.lalipop.ru/forum/post/list/"<?php if (strpos($_SERVER['REQUEST_URI'],"/forum/post/list/") !== false) {?> class="active"<?php }?>>Личные сообщения</a></li>
        <li><a href="/stat/password/">Выход</a></li>
    </ul>
</div><?php }
}
?>