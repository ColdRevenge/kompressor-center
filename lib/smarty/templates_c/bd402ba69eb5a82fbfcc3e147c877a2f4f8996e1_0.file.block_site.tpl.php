<?php /* Smarty version 3.1.24, created on 2016-02-16 19:00:05
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/vs_product/templates/block_site.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:47979853156c3478518d0c9_11013417%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd402ba69eb5a82fbfcc3e147c877a2f4f8996e1' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/vs_product/templates/block_site.tpl',
      1 => 1450788691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47979853156c3478518d0c9_11013417',
  'variables' => 
  array (
    'get_products' => 0,
    'url' => 0,
    'catalog_dir' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56c347855b6be9_82182162',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56c347855b6be9_82182162')) {
function content_56c347855b6be9_82182162 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '47979853156c3478518d0c9_11013417';
if (count($_smarty_tpl->tpl_vars['get_products']->value)) {?>
    <div class="h1"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/">Сравнение товаров</a></div>
    <div class="block-wrapper">
        <div class="content-block" id="vs_porduct_links">       
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
                <div><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/"><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</a></div>
            <?php
$_smarty_tpl->tpl_vars["product"] = $foreach_product_Sav;
}
?>
        </div>
    </div>
<?php }
}
}
?>