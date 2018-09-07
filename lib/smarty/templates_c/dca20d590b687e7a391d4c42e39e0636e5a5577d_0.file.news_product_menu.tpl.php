<?php /* Smarty version 3.1.24, created on 2018-07-02 09:02:48
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/news/templates/news_product_menu.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:20153330405b39c00817f725_98967615%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dca20d590b687e7a391d4c42e39e0636e5a5577d' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/news/templates/news_product_menu.tpl',
      1 => 1530509478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20153330405b39c00817f725_98967615',
  'variables' => 
  array (
    'news_product' => 0,
    'url' => 0,
    'news_item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39c0081913f4_50350448',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39c0081913f4_50350448')) {
function content_5b39c0081913f4_50350448 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '20153330405b39c00817f725_98967615';
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