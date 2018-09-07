<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 19:22:40
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/delivery/templates/free_delivery_info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14007361555d4ad507c4cc0-00292229%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4068f3dacb59077e7b28ee99f50ac402a74b2a20' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/delivery/templates/free_delivery_info.tpl',
      1 => 1427634114,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14007361555d4ad507c4cc0-00292229',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'free_sum' => 0,
    'sum_basket' => 0,
    'lacking' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d4ad507da6e5_34321230',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4ad507da6e5_34321230')) {function content_55d4ad507da6e5_34321230($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><tr>
    
    <td valign="middle" align="left" colspan="2">
        <?php if ($_smarty_tpl->tpl_vars['free_sum']->value>$_smarty_tpl->tpl_vars['sum_basket']->value&&$_smarty_tpl->tpl_vars['lacking']->value>0) {?>
            <div class="free_delivery">* Добавьте товаров на <b><?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['lacking']->value,0),",","&nbsp;");?>
 руб.</b>, доставка заказа станет <b>БЕСПЛАТНОЙ</b>!</div>
        <?php }?>
    </td>
</tr><?php }} ?>
