<?php /* Smarty version 3.1.24, created on 2018-07-02 09:02:27
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/catalog/templates/getProduct.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:9450400145b39bff3e6bf32_64572955%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75cd9e826799bf3a0862d0d79f3be183f9f804e5' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/catalog/templates/getProduct.tpl',
      1 => 1530509445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9450400145b39bff3e6bf32_64572955',
  'variables' => 
  array (
    'is_ajax' => 0,
    'param_tpl' => 0,
    'products' => 0,
    'base_dir' => 0,
    'product' => 0,
    'product_images' => 0,
    'key' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39bff3e92de3_08855106',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39bff3e92de3_08855106')) {
function content_5b39bff3e92de3_08855106 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/user-kc/data/www/www.kompressor-center.com/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '9450400145b39bff3e6bf32_64572955';
?>
<div class="<?php if ($_smarty_tpl->tpl_vars['is_ajax']->value != 1) {?>container<?php }?>">
    <div>
        <?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['param_id'] == 3) {?>
            <?php if ($_smarty_tpl->tpl_vars['products']->value[0]->created) {?>
                <p>Последнее поступление новинок: <b><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['products']->value[0]->created,"%d.%m.%Y");?>
</b></p>
            <?php }?>
        <?php }?>
        <div class="c-products">
            <?php
$_from = $_smarty_tpl->tpl_vars['products']->value;
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
                <div class="c-products__item">
                    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/getProductItem.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'product_images'=>$_smarty_tpl->tpl_vars['product_images']->value,'key'=>$_smarty_tpl->tpl_vars['key']->value), 0);
?>

                </div>
            <?php
$_smarty_tpl->tpl_vars["product"] = $foreach_product_Sav;
}
?>
        </div> 
    </div>
</div><?php }
}
?>