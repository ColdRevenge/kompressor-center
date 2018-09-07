<?php /* Smarty version 3.1.24, created on 2015-09-16 12:44:31
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/news/templates/news_product_menu.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:150732099455f939ff34a829_03642194%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ffd47870fb7c2b41284e4f0d0b52d5366412b59' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/news/templates/news_product_menu.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150732099455f939ff34a829_03642194',
  'variables' => 
  array (
    'news_product' => 0,
    'url' => 0,
    'news_item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f939ff3890f0_07117624',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f939ff3890f0_07117624')) {
function content_55f939ff3890f0_07117624 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '150732099455f939ff34a829_03642194';
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