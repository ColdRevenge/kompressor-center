<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-21 21:12:13
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/banners/templates/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:186015494155d769fdb2e415-15522321%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e0ed8d362a299a41402f889145224e2f8393d43' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/banners/templates/list.tpl',
      1 => 1423307962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186015494155d769fdb2e415-15522321',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'category_name' => 0,
    'upload' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d769fdb815f6_89109336',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d769fdb815f6_89109336')) {function content_55d769fdb815f6_89109336($_smarty_tpl) {?><div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_banners.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="page">
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

    
        <h1>Баннер в разделе<?php if ($_smarty_tpl->tpl_vars['category_name']->value->name) {?> - &laquo;<?php echo stripslashes($_smarty_tpl->tpl_vars['category_name']->value->name);?>
&raquo;<?php }?></h1>

        <?php echo $_smarty_tpl->tpl_vars['upload']->value;?>

    
        <br/><br/>
        <br/><br/>
        <br/><br/>
        <br/><br/>
        <?php if ($_smarty_tpl->tpl_vars['type']->value==0) {?>
        <div class="notice">
            <em>Вы можете <a href="http://ox2.ru/banner/" target="_blank">заказать разработку баннера</a>..</em>
        </div>
        <?php }?>
    </div>
</div><?php }} ?>
