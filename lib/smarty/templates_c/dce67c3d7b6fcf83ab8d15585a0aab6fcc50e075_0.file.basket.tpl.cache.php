<?php /* Smarty version 3.1.24, created on 2015-09-13 16:07:03
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/basket/templates/basket.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:108187627655f574f759df99_14238098%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dce67c3d7b6fcf83ab8d15585a0aab6fcc50e075' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/basket/templates/basket.tpl',
      1 => 1440761498,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108187627655f574f759df99_14238098',
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
  'unifunc' => 'content_55f574f75ccc39_58902215',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f574f75ccc39_58902215')) {
function content_55f574f75ccc39_58902215 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '108187627655f574f759df99_14238098';
if ($_smarty_tpl->tpl_vars['is_mobile']->value == 1) {?>Корзина<?php if ($_smarty_tpl->tpl_vars['basket_count']->value > 0) {?><span><?php echo $_smarty_tpl->tpl_vars['basket_count']->value;?>
</span><?php }
} else { ?>
    
     
    <img src="/images/fronted/basket-img.png" alt="" id="basket-img" />

    <div class="basket-h"><a href="<?php echo $_smarty_tpl->tpl_vars['https_url']->value;?>
basket/">Ваши покупки</a></div>
    <div class="basket-desc">
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
        <?php }?>
    </div>

    <div class="basket-desc"><?php echo (($tmp = @(($tmp = @$_smarty_tpl->tpl_vars['discount_sum']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['basket_price']->value : $tmp))===null||$tmp==='' ? '0' : $tmp);?>
 р.</div>
<?php }
}
}
?>