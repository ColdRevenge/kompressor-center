<?php /* Smarty version 3.1.24, created on 2015-09-15 16:54:53
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/banners/templates/list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:205733339455f8232d1d4d18_66885900%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d20a11a747def3b6e20c8349d72e1545b08374c' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/banners/templates/list.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '205733339455f8232d1d4d18_66885900',
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
  'unifunc' => 'content_55f8232d1e94a1_24841626',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f8232d1e94a1_24841626')) {
function content_55f8232d1e94a1_24841626 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '205733339455f8232d1d4d18_66885900';
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