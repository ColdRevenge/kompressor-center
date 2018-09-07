<?php /* Smarty version 3.1.24, created on 2017-01-27 16:11:45
         compiled from "E:/OpenServer/domains/kc-pskov.dev/modules/basket/templates/basket.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:679588b47118da056_53659469%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd92ab62aabdceabb3d5987186ae5ab10e11b0d1' => 
    array (
      0 => 'E:/OpenServer/domains/kc-pskov.dev/modules/basket/templates/basket.tpl',
      1 => 1485513317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '679588b47118da056_53659469',
  'variables' => 
  array (
    'is_mobile' => 0,
    'basket_count' => 0,
    'setting' => 0,
    'discount_sum' => 0,
    'basket_price' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_588b4711906a11_80643192',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588b4711906a11_80643192')) {
function content_588b4711906a11_80643192 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '679588b47118da056_53659469';
if ($_smarty_tpl->tpl_vars['is_mobile']->value == 1) {?>
    Корзина
    <?php if ($_smarty_tpl->tpl_vars['basket_count']->value > 0) {?>
    <span>
        <?php echo $_smarty_tpl->tpl_vars['basket_count']->value;?>

    </span>
    <?php }?>
<?php } else { ?>
     
    <img src="/images/fronted/basket-img.png" alt="" id="basket-img" />

    <div class="basket-h">
		<b>Ваша корзина</b>
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
            <?php if (!$_smarty_tpl->tpl_vars['setting']->value->hide_prices) {?>
			 / <?php echo (($tmp = @(($tmp = @$_smarty_tpl->tpl_vars['discount_sum']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['basket_price']->value : $tmp))===null||$tmp==='' ? '0' : $tmp);?>
 руб.
            <?php }?>
        <?php }?>
		</span>
    </div>
<?php }
}
}
?>