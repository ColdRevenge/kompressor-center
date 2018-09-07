<?php /* Smarty version 3.1.24, created on 2015-09-13 16:44:10
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/stat/templates/stat_menu.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:15678068555f57daa840108_41604856%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20aea45aeb7c8f97af877fcc7ec897328193f1c3' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/stat/templates/stat_menu.tpl',
      1 => 1441980603,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15678068555f57daa840108_41604856',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f57daa875130_15639366',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f57daa875130_15639366')) {
function content_55f57daa875130_15639366 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '15678068555f57daa840108_41604856';
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