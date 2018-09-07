<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-24 15:56:38
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/news/templates/news_product_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76338334955db1486cded19-89499246%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c941a6d5c536c06ce3218deb9c6b68834cbbe6b6' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/news/templates/news_product_menu.tpl',
      1 => 1428310628,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76338334955db1486cded19-89499246',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'news_product' => 0,
    'url' => 0,
    'news_item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55db1486cfa031_12942670',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55db1486cfa031_12942670')) {function content_55db1486cfa031_12942670($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars["news_item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["news_item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news_product']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["news_item"]->key => $_smarty_tpl->tpl_vars["news_item"]->value) {
$_smarty_tpl->tpl_vars["news_item"]->_loop = true;
?>
    <div style="margin-bottom: 2px;"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['news_item']->value->pseudo_dir;?>
/" target="_blank"><?php echo stripslashes($_smarty_tpl->tpl_vars['news_item']->value->name);?>
</a> 
    </div>
<?php } ?><?php }} ?>
