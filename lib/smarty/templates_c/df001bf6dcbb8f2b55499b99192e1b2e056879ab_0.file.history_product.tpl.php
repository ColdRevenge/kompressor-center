<?php /* Smarty version 3.1.24, created on 2015-09-16 13:24:34
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/products/templates/history_product.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:115427755655f9436283b622_49133420%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df001bf6dcbb8f2b55499b99192e1b2e056879ab' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/products/templates/history_product.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115427755655f9436283b622_49133420',
  'variables' => 
  array (
    'session_products' => 0,
    's_product' => 0,
    'product' => 0,
    'gallery_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f94362897a41_45233818',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f94362897a41_45233818')) {
function content_55f94362897a41_45233818 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '115427755655f9436283b622_49133420';
if ($_GET['is_modal'] != 1) {?> <?php if (count($_smarty_tpl->tpl_vars['session_products']->value) > 1) {?>
            <div class="h1">Вы недавно смотрели:</div>
            <div class="you_look">
                <?php
$_from = $_smarty_tpl->tpl_vars['session_products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["s_product"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["s_product"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_product'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["s_product"]->value) {
$_smarty_tpl->tpl_vars["s_product"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_product']->value['iteration']++;
$foreach_s_product_Sav = $_smarty_tpl->tpl_vars["s_product"];
?>
                    <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_product']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_product']->value['iteration'] : null) <= 5 && (isset($_smarty_tpl->tpl_vars['__foreach_product']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_product']->value['iteration'] : null) != 0 && $_smarty_tpl->tpl_vars['s_product']->value['id'] != $_smarty_tpl->tpl_vars['product']->value->id) {?>
                        <div class="product-history-block">

                            <span class="img-box"><a href="<?php if ($_smarty_tpl->tpl_vars['s_product']->value['shop_id'] == 1) {?>https://lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id'] == 5) {?>https://woman.lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id'] == 4) {?>https://sumka.lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id'] == 3) {?>https://platok.lalipop.ru/<?php } else { ?>https://lady.lalipop.ru/<?php }?>products/<?php echo $_smarty_tpl->tpl_vars['s_product']->value['pseudo_dir'];?>
/?is_modal=1" rel="fancy"><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['s_product']->value['file'];?>
" onerror="this.src='/images/icons/no-image.png'" alt="" class="img-offers"  /></a></span>


                            <div class="name"><a href="<?php if ($_smarty_tpl->tpl_vars['s_product']->value['shop_id'] == 1) {?>https://lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id'] == 5) {?>https://woman.lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id'] == 4) {?>https://sumka.lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id'] == 3) {?>https://platok.lalipop.ru/<?php } else { ?>https://lady.lalipop.ru/<?php }?>products/<?php echo $_smarty_tpl->tpl_vars['s_product']->value['pseudo_dir'];?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['s_product']->value['name']);?>
</a></div>
                            <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_product']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_product']->value['iteration'] : null)%4 == 0) {?><div class="clear"></div><?php }?>
                        </div>
                    <?php }?>
                <?php
$_smarty_tpl->tpl_vars["s_product"] = $foreach_s_product_Sav;
}
?>
            </div>
            <div class="clear">&nbsp;</div>
        <?php }?>

    <?php }
}
}
?>