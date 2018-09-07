<?php /* Smarty version 3.1.24, created on 2017-01-23 14:05:11
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/news/templates/news_product_menu.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:18847423055885e367cc8464_85265099%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6245d5428883e011a33eac79e83b17ab5aea26a' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/news/templates/news_product_menu.tpl',
      1 => 1450788673,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18847423055885e367cc8464_85265099',
  'variables' => 
  array (
    'news_product' => 0,
    'url' => 0,
    'news_item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5885e367d979a5_46305055',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5885e367d979a5_46305055')) {
function content_5885e367d979a5_46305055 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '18847423055885e367cc8464_85265099';
$_from = $_smarty_tpl->tpl_vars['news_product']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["news_item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["news_item"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["news_item"]->value) {
$_smarty_tpl->tpl_vars["news_item"]->_loop = true;
$foreach_news_item_Sav = $_smarty_tpl->tpl_vars["news_item"];
?>
    <div style="margin-bottom: 2px;"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['news_item']->value->pseudo_dir;?>
/" target="_blank"><?php echo stripslashes($_smarty_tpl->tpl_vars['news_item']->value->name);?>
</a> 
    </div>
<?php
$_smarty_tpl->tpl_vars["news_item"] = $foreach_news_item_Sav;
}
}
}
?>