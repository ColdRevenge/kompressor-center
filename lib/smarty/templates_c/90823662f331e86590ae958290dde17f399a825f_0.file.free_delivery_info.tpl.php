<?php /* Smarty version 3.1.24, created on 2017-01-27 22:13:05
         compiled from "E:/OpenServer/domains/kc-pskov.dev/modules/delivery/templates/free_delivery_info.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:22287588b9bc15a3751_21084141%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90823662f331e86590ae958290dde17f399a825f' => 
    array (
      0 => 'E:/OpenServer/domains/kc-pskov.dev/modules/delivery/templates/free_delivery_info.tpl',
      1 => 1485497732,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22287588b9bc15a3751_21084141',
  'variables' => 
  array (
    'free_sum' => 0,
    'sum_basket' => 0,
    'lacking' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_588b9bc15b0e37_60948417',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588b9bc15b0e37_60948417')) {
function content_588b9bc15b0e37_60948417 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once 'E:/OpenServer/domains/kc-pskov.dev/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '22287588b9bc15a3751_21084141';
?>
<tr>
    
    <td valign="middle" align="left" colspan="2">
        <?php if ($_smarty_tpl->tpl_vars['free_sum']->value > $_smarty_tpl->tpl_vars['sum_basket']->value && $_smarty_tpl->tpl_vars['lacking']->value > 0) {?>
            <div class="free_delivery">* Добавьте товаров на <b><?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['lacking']->value,0),",","&nbsp;");?>
 руб.</b>, доставка заказа станет <b>БЕСПЛАТНОЙ</b>!</div>
        <?php }?>
    </td>
</tr><?php }
}
?>