<?php /* Smarty version 3.1.24, created on 2017-02-03 00:19:17
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/related/templates/getProducts.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:10473801885893a2551e3b78_16949738%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0bd021bc67672bce5282423c1ba7d31cb22b83d5' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/related/templates/getProducts.tpl',
      1 => 1485559672,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10473801885893a2551e3b78_16949738',
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
  'unifunc' => 'content_5893a255286f92_33463727',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5893a255286f92_33463727')) {
function content_5893a255286f92_33463727 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '10473801885893a2551e3b78_16949738';
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