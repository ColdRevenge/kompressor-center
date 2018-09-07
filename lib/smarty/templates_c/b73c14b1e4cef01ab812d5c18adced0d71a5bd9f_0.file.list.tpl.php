<?php /* Smarty version 3.1.24, created on 2017-02-03 16:19:16
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/banners/templates/list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:47732399758948354462951_81954617%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b73c14b1e4cef01ab812d5c18adced0d71a5bd9f' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/banners/templates/list.tpl',
      1 => 1485559636,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47732399758948354462951_81954617',
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
  'version' => '3.1.24',
  'unifunc' => 'content_589483544b4f47_10226381',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_589483544b4f47_10226381')) {
function content_589483544b4f47_10226381 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '47732399758948354462951_81954617';
?>
<div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_banners.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <div class="page">
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>

    
        <h1>Баннер в разделе<?php if ($_smarty_tpl->tpl_vars['category_name']->value->name) {?> - &laquo;<?php echo stripslashes($_smarty_tpl->tpl_vars['category_name']->value->name);?>
&raquo;<?php }?></h1>

        <?php echo $_smarty_tpl->tpl_vars['upload']->value;?>

    
        <br/><br/>
        <br/><br/>
        <br/><br/>
        <br/><br/>
        <?php if ($_smarty_tpl->tpl_vars['type']->value == 0) {?>
        <div class="notice">
            <em>Вы можете <a href="http://ox2.ru/banner/" target="_blank">заказать разработку баннера</a>..</em>
        </div>
        <?php }?>
    </div>
</div><?php }
}
?>