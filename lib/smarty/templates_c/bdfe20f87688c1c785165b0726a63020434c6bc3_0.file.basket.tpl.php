<?php /* Smarty version 3.1.24, created on 2015-10-20 16:55:00
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/basket/templates/basket.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1967969646562647b44ed752_63773778%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bdfe20f87688c1c785165b0726a63020434c6bc3' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/basket/templates/basket.tpl',
      1 => 1445349284,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1967969646562647b44ed752_63773778',
  'variables' => 
  array (
    'is_mobile' => 0,
    'basket_count' => 0,
    'https_url' => 0,
    'discount_sum' => 0,
    'basket_price' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_562647b454a8c4_28268095',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_562647b454a8c4_28268095')) {
function content_562647b454a8c4_28268095 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1967969646562647b44ed752_63773778';
if ($_smarty_tpl->tpl_vars['is_mobile']->value == 1) {?>Корзина<?php if ($_smarty_tpl->tpl_vars['basket_count']->value > 0) {?><span><?php echo $_smarty_tpl->tpl_vars['basket_count']->value;?>
</span><?php }
} else { ?>
    
     
    <img src="/images/fronted/basket-img.png" alt="" id="basket-img" />

    <div class="basket-h">
		<a href="<?php echo $_smarty_tpl->tpl_vars['https_url']->value;?>
basket/">Ваша корзина</a>
		<span>
        <?php if ($_smarty_tpl->tpl_vars['basket_count']->value == 0) {?>
            0 товаров
        <?php } else { ?>    
            <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_count']->value)===null||$tmp==='' ? 0 : $tmp);?>
 

            <?php if ($_smarty_tpl->tpl_vars['basket_count']->value == 0 || $_smarty_tpl->tpl_vars['basket_count']->value >= 5 && $_smarty_tpl->tpl_vars['basket_count']->value <= 20 || $_smarty_tpl->tpl_vars['basket_count']->value >= 105 && $_smarty_tpl->tpl_vars['basket_count']->value <= 120) {?>
                товаров
            <?php } elseif ($_smarty_tpl->tpl_vars['basket_count']->value%10 == 1) {?>
                товар
            <?php } elseif ($_smarty_tpl->tpl_vars['basket_count']->value%10 > 1 && $_smarty_tpl->tpl_vars['basket_count']->value%10 < 5) {?>
                товара
            <?php } else { ?>
                товаров
            <?php }?>
			/ <?php echo (($tmp = @(($tmp = @$_smarty_tpl->tpl_vars['discount_sum']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['basket_price']->value : $tmp))===null||$tmp==='' ? '0' : $tmp);?>
 руб.
        <?php }?>
		</span>
    </div>
<?php }
}
}
?>