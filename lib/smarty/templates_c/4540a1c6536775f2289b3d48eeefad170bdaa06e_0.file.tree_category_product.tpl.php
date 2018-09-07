<?php /* Smarty version 3.1.24, created on 2015-09-14 12:53:30
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/sync/templates/tree_category_product.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:11552668755f6991a26cbf3_11044895%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4540a1c6536775f2289b3d48eeefad170bdaa06e' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/sync/templates/tree_category_product.tpl',
      1 => 1439727324,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11552668755f6991a26cbf3_11044895',
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
  'version' => '3.1.24',
  'unifunc' => 'content_55f6991a2e9b76_96096565',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f6991a2e9b76_96096565')) {
function content_55f6991a2e9b76_96096565 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '11552668755f6991a26cbf3_11044895';
?>

<?php if ($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][0] != '') {?>
<div<?php if (!$_smarty_tpl->tpl_vars['parents_category_arr']->value[$_smarty_tpl->tpl_vars['parent_id']->value] && $_smarty_tpl->tpl_vars['level']->value > 0) {?> style="display: none; "<?php }?>  id="parent_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="parent_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
<?php
$_from = $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["subtree"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["subtree"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["subtree"]->value) {
$_smarty_tpl->tpl_vars["subtree"]->_loop = true;
$foreach_subtree_Sav = $_smarty_tpl->tpl_vars["subtree"];
?>
<?php $_smarty_tpl->tpl_vars["parent_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['subtree']->value->id, null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['subtree']->value->is_visible == 1 && $_smarty_tpl->tpl_vars['subtree']->value->id != 793 && $_smarty_tpl->tpl_vars['subtree']->value->id != 787) {?>

    <div style="padding: 2px 0px; margin-left: <?php echo $_smarty_tpl->tpl_vars['level']->value*35;?>
px">
        <label class="p-check" style="padding-right: 2px;vertical-align: middle"><input type='checkbox' value="<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
" id="input_<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
" onchange="<?php if (count($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['parent_id']->value]) != 0) {?>jQuery('#parent_<?php echo $_smarty_tpl->tpl_vars['parent_id']->value;?>
 input').attr('checked', this.checked);<?php }?>;jQuery('#products_<?php echo $_smarty_tpl->tpl_vars['parent_id']->value;?>
 input').attr('checked', this.checked); " name="category_id[]" /><em>&nbsp;</em></label><a href="javascript:void(0)" onclick="<?php if (count($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['parent_id']->value]) != 0) {?>Show('parent_<?php echo $_smarty_tpl->tpl_vars['parent_id']->value;?>
')<?php }?>;Show('products_<?php echo $_smarty_tpl->tpl_vars['parent_id']->value;?>
');" <?php if ($_smarty_tpl->tpl_vars['open_category_id']->value == $_smarty_tpl->tpl_vars['parent_id']->value) {?>class="selected_catalog"<?php }?>><?php echo $_smarty_tpl->tpl_vars['subtree']->value->name;?>
</a>

<?php echo $_smarty_tpl->getSubTemplate ("tree_category_product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>$_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id,'tree'=>$_smarty_tpl->tpl_vars['tree']->value,'inc'=>$_smarty_tpl->tpl_vars['inc']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1,'offset'=>$_smarty_tpl->tpl_vars['offset']->value), 0);
?>

 

                <?php if (count($_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['parent_id']->value])) {?>
        <div  id="products_<?php echo $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id;?>
" style="display: none;" >
            <div style="background-color: white; border: 1px solid #CCCCCC;padding: 20px;margin: 10px 50px;" id="get_product_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
">
    <?php
$_from = $_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['parent_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["product"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["product"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
$foreach_product_Sav = $_smarty_tpl->tpl_vars["product"];
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
<?php
$_smarty_tpl->tpl_vars["product"] = $foreach_product_Sav;
}
?>
            </div>
        </div>
<?php }?>

   </div>
<?php }?>
<?php
$_smarty_tpl->tpl_vars["subtree"] = $foreach_subtree_Sav;
}
?>
</div>
<?php }
}
}
?>