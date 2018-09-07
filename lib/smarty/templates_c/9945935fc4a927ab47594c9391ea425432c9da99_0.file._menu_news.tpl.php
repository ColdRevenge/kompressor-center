<?php /* Smarty version 3.1.24, created on 2015-09-14 08:46:45
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/news/templates/_menu_news.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:145355296255f65f450cb125_12274784%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9945935fc4a927ab47594c9391ea425432c9da99' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/news/templates/_menu_news.tpl',
      1 => 1423500865,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145355296255f65f450cb125_12274784',
  'variables' => 
  array (
    'is_menu_add' => 0,
    'admin_url' => 0,
    'type' => 0,
    'tmp_news_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f65f4510a4a8_60966104',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f65f4510a4a8_60966104')) {
function content_55f65f4510a4a8_60966104 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '145355296255f65f450cb125_12274784';
?>
<ul>
    <li<?php if ($_smarty_tpl->tpl_vars['is_menu_add']->value != 1) {?> class="active"<?php }?>><?php if ($_smarty_tpl->tpl_vars['is_menu_add']->value != 1) {?><span class="selected">Список новостей</span><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
news/list/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/">Список новостей</a><?php }?></li>
    <li<?php if ($_smarty_tpl->tpl_vars['is_menu_add']->value == 1) {?> class="active"<?php }?>><?php if ($_smarty_tpl->tpl_vars['is_menu_add']->value == 1) {?><span class="selected">Добавить новость</span><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
news/add/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo time();?>
/">Добавить новость</a><?php }?></li>
</ul>

<?php if ($_smarty_tpl->tpl_vars['tmp_news_id']->value) {?>
    <br/>
    <h2>Товар в <?php if ($_smarty_tpl->tpl_vars['type']->value == 2) {?>обзор<?php } else { ?>новость<?php }?> </h2>
    <div id="news_for_products">
        <?php echo $_smarty_tpl->getSubTemplate ("news_product_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    </div>
    <br/>
    <p><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
news/product/<?php echo $_smarty_tpl->tpl_vars['tmp_news_id']->value;?>
/?is_modal=1" rel="fancy">Добавить <?php if ($_smarty_tpl->tpl_vars['type']->value == 2) {?>обзор<?php } else { ?>новость<?php }?> в товар</a></p>
<?php }
}
}
?>