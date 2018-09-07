<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 13:11:06
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/news/templates/_menu_news.tpl" */ ?>
<?php /*%%SmartyHeaderCode:95698914755d5a7ba3658f7-44143090%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65d2ec28a090ba79f77c763c2a07cfb6c9e090d7' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/news/templates/_menu_news.tpl',
      1 => 1423500865,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95698914755d5a7ba3658f7-44143090',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_menu_add' => 0,
    'admin_url' => 0,
    'type' => 0,
    'tmp_news_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d5a7ba3a4b27_20153558',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d5a7ba3a4b27_20153558')) {function content_55d5a7ba3a4b27_20153558($_smarty_tpl) {?><ul>
    <li<?php if ($_smarty_tpl->tpl_vars['is_menu_add']->value!=1) {?> class="active"<?php }?>><?php if ($_smarty_tpl->tpl_vars['is_menu_add']->value!=1) {?><span class="selected">Список новостей</span><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
news/list/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/">Список новостей</a><?php }?></li>
    <li<?php if ($_smarty_tpl->tpl_vars['is_menu_add']->value==1) {?> class="active"<?php }?>><?php if ($_smarty_tpl->tpl_vars['is_menu_add']->value==1) {?><span class="selected">Добавить новость</span><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
news/add/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo time();?>
/">Добавить новость</a><?php }?></li>
</ul>

<?php if ($_smarty_tpl->tpl_vars['tmp_news_id']->value) {?>
    <br/>
    <h2>Товар в <?php if ($_smarty_tpl->tpl_vars['type']->value==2) {?>обзор<?php } else { ?>новость<?php }?> </h2>
    <div id="news_for_products">
        <?php echo $_smarty_tpl->getSubTemplate ("news_product_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
    <br/>
    <p><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
news/product/<?php echo $_smarty_tpl->tpl_vars['tmp_news_id']->value;?>
/?is_modal=1" rel="fancy">Добавить <?php if ($_smarty_tpl->tpl_vars['type']->value==2) {?>обзор<?php } else { ?>новость<?php }?> в товар</a></p>
<?php }?><?php }} ?>
