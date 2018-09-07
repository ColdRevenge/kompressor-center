<?php /* Smarty version 3.1.24, created on 2017-01-28 01:29:03
         compiled from "E:/OpenServer/domains/kc-pskov.dev/modules/vs_product/templates/vs_product.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:28559588bc9afb2c192_39963654%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c12592d824339356130db8705de6e60a795df638' => 
    array (
      0 => 'E:/OpenServer/domains/kc-pskov.dev/modules/vs_product/templates/vs_product.tpl',
      1 => 1485556132,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28559588bc9afb2c192_39963654',
  'variables' => 
  array (
    'get_products' => 0,
    'url' => 0,
    'product' => 0,
    'gallery_url' => 0,
    'param_tpl' => 0,
    'char_all' => 0,
    'char_all_item' => 0,
    'product_id' => 0,
    'characteristics_product' => 0,
    'value' => 0,
    'characteristic_id' => 0,
    'diff' => 0,
    'diff_characteristic' => 0,
    'is_out_char' => 0,
    'value_1' => 0,
    'is_out_char_value_1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_588bc9afbe5456_17395594',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588bc9afbe5456_17395594')) {
function content_588bc9afbe5456_17395594 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once 'E:/OpenServer/domains/kc-pskov.dev/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '28559588bc9afb2c192_39963654';
?>

<table class="table" style="margin: 0; width: 100%">
    <tr>
        <td style="width: 300px;">&nbsp;</td>
        <?php
$_from = $_smarty_tpl->tpl_vars['get_products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["product"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["product"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
$foreach_product_Sav = $_smarty_tpl->tpl_vars["product"];
?>
            <td style="text-align: center; vertical-align: bottom; padding-top: 10px;">
                <div><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/" target="_top" style=" font-size: 17px;"><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</a></div>
                <div><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/" target="_top"><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product']->value->file;?>
" onerror="this.src='/images/icons/no-image.png'" alt="" style="margin-top: 10px;margin-bottom: 5px;max-height: 95px; border: 1px solid #E5E5E5"  /></a></div>

                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
vs_product/del/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
/?is_modal=1&category_id=<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['category_id'];?>
" style=" color: #222;">Удалить</a>

            </td>
        <?php
$_smarty_tpl->tpl_vars["product"] = $foreach_product_Sav;
}
?>
    </tr>

    <?php
$_from = $_smarty_tpl->tpl_vars['char_all']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["char_all_item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["char_all_item"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["char_all_item"]->value) {
$_smarty_tpl->tpl_vars["char_all_item"]->_loop = true;
$foreach_char_all_item_Sav = $_smarty_tpl->tpl_vars["char_all_item"];
?> 
            <?php if ($_smarty_tpl->tpl_vars['char_all_item']->value->id != 640) {?>
                <tr>
                    <td style="text-align: left; font-size: 17px;padding-bottom: 10px">
                        <?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['char_all_item']->value->name),"?",'');?>

                    </td>
                    <?php
$_from = $_smarty_tpl->tpl_vars['get_products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["product"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["product"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
$foreach_product_Sav = $_smarty_tpl->tpl_vars["product"];
?>
                        <td style="text-align: center; font-size: 17px;">
                            <?php $_smarty_tpl->tpl_vars["product_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['product']->value->id, null, 0);?>
                            <?php if (count($_smarty_tpl->tpl_vars['characteristics_product']->value[$_smarty_tpl->tpl_vars['product_id']->value])) {?>
                                <?php
$_from = $_smarty_tpl->tpl_vars['characteristics_product']->value[$_smarty_tpl->tpl_vars['product_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["value"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["value"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["value"]->value) {
$_smarty_tpl->tpl_vars["value"]->_loop = true;
$foreach_value_Sav = $_smarty_tpl->tpl_vars["value"];
?>
                                    <?php $_smarty_tpl->tpl_vars["characteristic_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['value']->value->characteristic_id, null, 0);?>
                                    <?php if ($_smarty_tpl->tpl_vars['diff']->value[$_smarty_tpl->tpl_vars['characteristic_id']->value] || count($_smarty_tpl->tpl_vars['diff_characteristic']->value[$_smarty_tpl->tpl_vars['characteristic_id']->value]) != count($_smarty_tpl->tpl_vars['get_products']->value)) {?><span style="color: red;font-size: 17px;"><?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['char_all_item']->value->id == $_smarty_tpl->tpl_vars['value']->value->characteristic_id) {?> 
                                                <?php $_smarty_tpl->tpl_vars["is_out_char"] = new Smarty_Variable("0", null, 0);?>
                                                <?php if ($_smarty_tpl->tpl_vars['is_out_char']->value != $_smarty_tpl->tpl_vars['value']->value->characteristic_id) {?> 
                                                    
                                                    <?php
$_from = $_smarty_tpl->tpl_vars['characteristics_product']->value[$_smarty_tpl->tpl_vars['product_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["value_1"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["value_1"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["value_1"]->value) {
$_smarty_tpl->tpl_vars["value_1"]->_loop = true;
$foreach_value_1_Sav = $_smarty_tpl->tpl_vars["value_1"];
if ($_smarty_tpl->tpl_vars['value']->value->characteristic_id == $_smarty_tpl->tpl_vars['value_1']->value->characteristic_id) {
if ($_smarty_tpl->tpl_vars['is_out_char_value_1']->value == $_smarty_tpl->tpl_vars['value_1']->value->characteristic_id) {?> <?php }?>
                                                    <?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['value_1']->value->value_name),"?",'');
$_smarty_tpl->tpl_vars["is_out_char_value_1"] = new Smarty_Variable($_smarty_tpl->tpl_vars['value_1']->value->characteristic_id, null, 0);
}
$_smarty_tpl->tpl_vars["value_1"] = $foreach_value_1_Sav;
}
?>

                                                    <?php $_smarty_tpl->tpl_vars['is_out_char'] = new Smarty_Variable($_smarty_tpl->tpl_vars['value']->value->characteristic_id, null, 0);?>
                                                <?php }?>
                                            <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['diff']->value[$_smarty_tpl->tpl_vars['characteristic_id']->value] || count($_smarty_tpl->tpl_vars['diff_characteristic']->value[$_smarty_tpl->tpl_vars['characteristic_id']->value]) != count($_smarty_tpl->tpl_vars['get_products']->value)) {?></span><?php }?>
                                            <?php
$_smarty_tpl->tpl_vars["value"] = $foreach_value_Sav;
}
?>
                                                <?php }?>
                                            </td>
                                            <?php
$_smarty_tpl->tpl_vars["product"] = $foreach_product_Sav;
}
?>
                                            </tr>
                                            <?php }?>
                                                <?php
$_smarty_tpl->tpl_vars["char_all_item"] = $foreach_char_all_item_Sav;
}
?>

                                                    <tr>
                                                        <td style="width: 300px;">&nbsp;</td>
                                                        <?php
$_from = $_smarty_tpl->tpl_vars['get_products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["product"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["product"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
$foreach_product_Sav = $_smarty_tpl->tpl_vars["product"];
?>
                                                            <td style="text-align: center; vertical-align: bottom; padding-top: 10px;">
                                                                <div style=" font-size: 19px;color: #e41b1f"><?php echo $_smarty_tpl->tpl_vars['product']->value->price;?>
 руб.</div>
                                                            </td>
                                                        <?php
$_smarty_tpl->tpl_vars["product"] = $foreach_product_Sav;
}
?>

                                                    </tr>
                                                </table>
<?php }
}
?>