<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-28 14:31:40
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/basket/templates/basket.tpl" */ ?>
<?php /*%%SmartyHeaderCode:151020621555d4694b741ce6-46406385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00a072ee2db3549e5e4d65180d624a030ad499c2' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/basket/templates/basket.tpl',
      1 => 1440761498,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151020621555d4694b741ce6-46406385',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d4694b792803_90542603',
  'variables' => 
  array (
    'is_mobile' => 0,
    'basket_count' => 0,
    'https_url' => 0,
    'discount_sum' => 0,
    'basket_price' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4694b792803_90542603')) {function content_55d4694b792803_90542603($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['is_mobile']->value==1) {?>Корзина<?php if ($_smarty_tpl->tpl_vars['basket_count']->value>0) {?><span><?php echo $_smarty_tpl->tpl_vars['basket_count']->value;?>
</span><?php }
} else { ?>
    
     
    <img src="/images/fronted/basket-img.png" alt="" id="basket-img" />

    <div class="basket-h"><a href="<?php echo $_smarty_tpl->tpl_vars['https_url']->value;?>
basket/">Ваши покупки</a></div>
    <div class="basket-desc">
        <?php if ($_smarty_tpl->tpl_vars['basket_count']->value==0) {?>
            0 товаров
        <?php } else { ?>    
            <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_count']->value)===null||$tmp==='' ? 0 : $tmp);?>
 

            <?php if ($_smarty_tpl->tpl_vars['basket_count']->value==0||$_smarty_tpl->tpl_vars['basket_count']->value>=5&&$_smarty_tpl->tpl_vars['basket_count']->value<=20||$_smarty_tpl->tpl_vars['basket_count']->value>=105&&$_smarty_tpl->tpl_vars['basket_count']->value<=120) {?>
                товаров
            <?php } elseif ($_smarty_tpl->tpl_vars['basket_count']->value%10==1) {?>
                товар
            <?php } elseif ($_smarty_tpl->tpl_vars['basket_count']->value%10>1&&$_smarty_tpl->tpl_vars['basket_count']->value%10<5) {?>
                товара
            <?php } else { ?>
                товаров
            <?php }?>
        <?php }?>
    </div>

    <div class="basket-desc"><?php echo (($tmp = @(($tmp = @$_smarty_tpl->tpl_vars['discount_sum']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['basket_price']->value : $tmp))===null||$tmp==='' ? '0' : $tmp);?>
 р.</div>
<?php }?><?php }} ?>
