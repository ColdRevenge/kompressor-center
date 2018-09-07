<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 14:37:09
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/related/templates/getProducts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:71319290455d46a65e603b3-75784012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '968f0ed9dbfe5b6bce6c2afc70f36db86aa8d02d' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/related/templates/getProducts.tpl',
      1 => 1431424410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '71319290455d46a65e603b3-75784012',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
    'product' => 0,
    'admin_url' => 0,
    'category_id' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d46a65ebde44_17829321',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d46a65ebde44_17829321')) {function content_55d46a65ebde44_17829321($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars['product']->key;
?>
    <?php $_smarty_tpl->tpl_vars["product_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->id, null, 0);?>
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
<?php } ?><?php }} ?>
