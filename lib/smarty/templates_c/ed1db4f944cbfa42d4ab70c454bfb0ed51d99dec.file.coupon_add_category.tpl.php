<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-24 12:18:49
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/discount/templates/coupon_add_category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:145784598955dae1795f2a63-11465690%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed1db4f944cbfa42d4ab70c454bfb0ed51d99dec' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/discount/templates/coupon_add_category.tpl',
      1 => 1439726980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145784598955dae1795f2a63-11465690',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'tree' => 0,
    'level' => 0,
    'subtree' => 0,
    'parent_id' => 0,
    'open_category_id' => 0,
    'key' => 0,
    'inc' => 0,
    'offset' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55dae179682cf6_70887278',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55dae179682cf6_70887278')) {function content_55dae179682cf6_70887278($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][0]!='') {?>
    <div<?php if (!$_POST['category_id'][$_smarty_tpl->tpl_vars['id']->value]&&$_smarty_tpl->tpl_vars['level']->value>0) {?> style="display: none; "<?php }?>  id="parent_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="parent_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
        <?php  $_smarty_tpl->tpl_vars["subtree"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["subtree"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["subtree"]->key => $_smarty_tpl->tpl_vars["subtree"]->value) {
$_smarty_tpl->tpl_vars["subtree"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["subtree"]->key;
?>
            <?php $_smarty_tpl->tpl_vars["parent_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['subtree']->value->id, null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['subtree']->value->is_visible==1) {?>

                <div style="padding: 2px 0px; margin-left: <?php echo $_smarty_tpl->tpl_vars['level']->value*25;?>
px">
                    <label class="p-check" style="padding-right: 3px;"><input type='checkbox' value="<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
" id="input_<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
" onchange="<?php if (count($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['parent_id']->value])!=0) {?>jQuery('#parent_<?php echo $_smarty_tpl->tpl_vars['parent_id']->value;?>
 input').attr('checked', this.checked);<?php }?>;
                        jQuery('#products_<?php echo $_smarty_tpl->tpl_vars['parent_id']->value;?>
 input').attr('checked', this.checked);" name="category_id[<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
]" <?php if ($_POST['category_id'][$_smarty_tpl->tpl_vars['parent_id']->value]) {?> checked="checked"<?php }?> /><em>&nbsp;</em></label><a href="javascript:void(0)" onclick="<?php if (count($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['parent_id']->value])!=0) {?>Show('parent_<?php echo $_smarty_tpl->tpl_vars['parent_id']->value;?>
')<?php }?>;
                                    Show('products_<?php echo $_smarty_tpl->tpl_vars['parent_id']->value;?>
');" <?php if ($_smarty_tpl->tpl_vars['open_category_id']->value==$_smarty_tpl->tpl_vars['parent_id']->value) {?>class="selected_catalog"<?php }?>><?php echo $_smarty_tpl->tpl_vars['subtree']->value->name;?>
</a>

                    <?php echo $_smarty_tpl->getSubTemplate ("coupon_add_category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>$_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id,'tree'=>$_smarty_tpl->tpl_vars['tree']->value,'inc'=>$_smarty_tpl->tpl_vars['inc']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1,'offset'=>$_smarty_tpl->tpl_vars['offset']->value), 0);?>


                </div>
            <?php }?>
        <?php } ?>
    </div>
<?php }?><?php }} ?>
