<?php /* Smarty version 3.1.24, created on 2015-09-13 16:04:04
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/history_product_mobile.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:80222269555f5744477c8e6_79953196%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1887d0ce5e968d2b12e1272214b1af0dbd7eadf7' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/history_product_mobile.tpl',
      1 => 1441288980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80222269555f5744477c8e6_79953196',
  'variables' => 
  array (
    'session_products' => 0,
    's_product' => 0,
    'product' => 0,
    'gallery_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f574447d1f44_22265687',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f574447d1f44_22265687')) {
function content_55f574447d1f44_22265687 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '80222269555f5744477c8e6_79953196';
if ($_GET['is_modal'] != 1) {?> 
    <?php if (count($_smarty_tpl->tpl_vars['session_products']->value) > 1) {?>
        <li><a  href="javascript:void(0)" class="slideParamProduct history-icon">Вы недавно смотрели:</a>
            <div style="display: none;">
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
                        <div class="product">
                            <span class="img-box"><a href="<?php if ($_smarty_tpl->tpl_vars['s_product']->value['shop_id'] == 1) {?>https://lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id'] == 5) {?>https://woman.lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id'] == 4) {?>https://sumka.lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id'] == 3) {?>https://platok.lalipop.ru/<?php } else { ?>https://lady.lalipop.ru/<?php }?>products/<?php echo $_smarty_tpl->tpl_vars['s_product']->value['pseudo_dir'];?>
/?is_modal=1" rel="fancy"><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['s_product']->value['file'];?>
" onerror="this.src='/images/icons/no-image.png'" alt="" class="img-offers"  /></a></span>
                            <div class="name"><a href="<?php if ($_smarty_tpl->tpl_vars['s_product']->value['shop_id'] == 1) {?>https://lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id'] == 5) {?>https://woman.lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id'] == 4) {?>https://sumka.lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id'] == 3) {?>https://platok.lalipop.ru/<?php } else { ?>https://lady.lalipop.ru/<?php }?>products/<?php echo $_smarty_tpl->tpl_vars['s_product']->value['pseudo_dir'];?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['s_product']->value['name']);?>
</a></div>
                            <div class="price"><b><?php echo $_smarty_tpl->tpl_vars['s_product']->value['price'];?>
  руб.</b></div>
                            <div class="clear">&nbsp;</div>
                        </div>
                    <?php }?>
                <?php
$_smarty_tpl->tpl_vars["s_product"] = $foreach_s_product_Sav;
}
?>
            </div>
        </li>
    <?php }?>

<?php }
}
}
?>