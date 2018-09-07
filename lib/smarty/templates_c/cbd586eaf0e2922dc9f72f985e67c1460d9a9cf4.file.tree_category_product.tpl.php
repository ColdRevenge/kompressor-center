<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-27 19:26:16
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/sync/templates/tree_category_product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32790659655df3a28a33d25-75286294%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbd586eaf0e2922dc9f72f985e67c1460d9a9cf4' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/sync/templates/tree_category_product.tpl',
      1 => 1439727324,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32790659655df3a28a33d25-75286294',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'tree' => 0,
    'parent_id' => 0,
    'parents_category_arr' => 0,
    'level' => 0,
    'subtree' => 0,
    'open_category_id' => 0,
    'key' => 0,
    'inc' => 0,
    'offset' => 0,
    'products' => 0,
    'category_id' => 0,
    'shop_url' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55df3a28b027c3_47204417',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55df3a28b027c3_47204417')) {function content_55df3a28b027c3_47204417($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][0]!='') {?>
<div<?php if (!$_smarty_tpl->tpl_vars['parents_category_arr']->value[$_smarty_tpl->tpl_vars['parent_id']->value]&&$_smarty_tpl->tpl_vars['level']->value>0) {?> style="display: none; "<?php }?>  id="parent_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
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
<?php if ($_smarty_tpl->tpl_vars['subtree']->value->is_visible==1&&$_smarty_tpl->tpl_vars['subtree']->value->id!=793&&$_smarty_tpl->tpl_vars['subtree']->value->id!=787) {?>

    <div style="padding: 2px 0px; margin-left: <?php echo $_smarty_tpl->tpl_vars['level']->value*35;?>
px">
        <label class="p-check" style="padding-right: 2px;vertical-align: middle"><input type='checkbox' value="<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
" id="input_<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
" onchange="<?php if (count($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['parent_id']->value])!=0) {?>jQuery('#parent_<?php echo $_smarty_tpl->tpl_vars['parent_id']->value;?>
 input').attr('checked', this.checked);<?php }?>;jQuery('#products_<?php echo $_smarty_tpl->tpl_vars['parent_id']->value;?>
 input').attr('checked', this.checked); " name="category_id[]" /><em>&nbsp;</em></label><a href="javascript:void(0)" onclick="<?php if (count($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['parent_id']->value])!=0) {?>Show('parent_<?php echo $_smarty_tpl->tpl_vars['parent_id']->value;?>
')<?php }?>;Show('products_<?php echo $_smarty_tpl->tpl_vars['parent_id']->value;?>
');" <?php if ($_smarty_tpl->tpl_vars['open_category_id']->value==$_smarty_tpl->tpl_vars['parent_id']->value) {?>class="selected_catalog"<?php }?>><?php echo $_smarty_tpl->tpl_vars['subtree']->value->name;?>
</a>

<?php echo $_smarty_tpl->getSubTemplate ("tree_category_product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>$_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id,'tree'=>$_smarty_tpl->tpl_vars['tree']->value,'inc'=>$_smarty_tpl->tpl_vars['inc']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1,'offset'=>$_smarty_tpl->tpl_vars['offset']->value), 0);?>

 

                <?php if (count($_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['parent_id']->value])) {?>
        <div  id="products_<?php echo $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id;?>
" style="display: none;" >
            <div style="background-color: white; border: 1px solid #CCCCCC;padding: 20px;margin: 10px 50px;" id="get_product_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
">
    <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['parent_id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["product"]->key;
?>
                <div class="product">
                    
   
                    <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
</a>
                    <div style="margin-top: 5px;">
                        <label class="p-check"><input type="checkbox"  title="Добавить в Яндекс Маркет" name="products_id[<?php echo $_smarty_tpl->tpl_vars['parent_id']->value;?>
][]" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" style="vertical-align: middle; margin-right: 5px;" id="add_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" /><em>&nbsp;</em><span>В Яндекс Маркет</span></label>
                    </div>
                </div>
<?php } ?>
            </div>
        </div>
<?php }?>

   </div>
<?php }?>
<?php } ?>
</div>
<?php }?><?php }} ?>
