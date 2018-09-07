<?php /* Smarty version 3.1.24, created on 2017-01-28 02:28:14
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/basket/templates/basket.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:887408918588bd78e2acba8_51144201%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '102be1a9566e914300e63c698d02476147803229' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/basket/templates/basket.tpl',
      1 => 1485559637,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '887408918588bd78e2acba8_51144201',
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
  'unifunc' => 'content_588bd78e2f1692_77298138',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588bd78e2f1692_77298138')) {
function content_588bd78e2f1692_77298138 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '887408918588bd78e2acba8_51144201';
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