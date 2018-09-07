<?php /* Smarty version 3.1.24, created on 2016-01-19 12:22:23
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/related/templates/admin_related.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:942239462569e004f76efb9_96959117%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c08bf56993ad3ac3a81dbe71a7ee0578649752b8' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/related/templates/admin_related.tpl',
      1 => 1450788679,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '942239462569e004f76efb9_96959117',
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'catalog' => 0,
    'admin_url' => 0,
    'type' => 0,
    'category_id' => 0,
    'product_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_569e004f7a2121_21485708',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_569e004f7a2121_21485708')) {
function content_569e004f7a2121_21485708 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '942239462569e004f76efb9_96959117';
?>
<div class="block-page">
    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>

    <div  class="menu-list" style="float: left;">
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 300px;font-size: 12px;">
            <?php echo $_smarty_tpl->tpl_vars['catalog']->value;?>

        </table>
    </div>

    <div class="page" id="product_list" style="width: 830px;margin-left: 10px;float: left">

    </div>
    <?php echo '<script'; ?>
 type="text/javascript">
            AjaxRequest('product_list', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
related/add/product/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
/');
    <?php echo '</script'; ?>
>
</div><?php }
}
?>