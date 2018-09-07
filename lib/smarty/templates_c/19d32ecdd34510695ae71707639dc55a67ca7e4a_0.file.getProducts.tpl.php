<?php /* Smarty version 3.1.24, created on 2015-09-13 17:02:26
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/related/templates/getProducts.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:35085894055f581f2f0f0a4_81496800%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19d32ecdd34510695ae71707639dc55a67ca7e4a' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/related/templates/getProducts.tpl',
      1 => 1431424410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35085894055f581f2f0f0a4_81496800',
  'variables' => 
  array (
    'products' => 0,
    'product' => 0,
    'admin_url' => 0,
    'category_id' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f581f3025477_74904578',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f581f3025477_74904578')) {
function content_55f581f3025477_74904578 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '35085894055f581f2f0f0a4_81496800';
$_from = $_smarty_tpl->tpl_vars['products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['product']->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
$foreach_product_Sav = $_smarty_tpl->tpl_vars['product'];
?>
    <?php $_smarty_tpl->tpl_vars["product_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['product']->value->id, null, 0);?>
    <div style="text-align: left; margin: 3px 0px 0px 0px;padding-bottom: 3px;; border-bottom: 1px solid #CCCCCC;font-size: 12px;vertical-align: top;">
        <div style="width: 190px; float: left; color: gray"><a href="javascript:void(0)" onclick="window.open('<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
products/edit/0/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
/'); return false;"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
</a>  &nbsp; [<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->article);?>
] </div>
        <div style="width: 20px; float: left"><a href="javascript:void(0)" onclick="AjaxRequest('related_list_menu_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
related/del/product/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value->related_id;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value->product_id;?>
/'); return false;"><img src="/images/sys/admin/del.png" align="middle" hspace="1" alt="Удалить раздел"></a></div>
        <div class="clear">&nbsp;</div>
    </div>
<?php
$_smarty_tpl->tpl_vars['product'] = $foreach_product_Sav;
}
}
}
?>