<?php /* Smarty version 3.1.24, created on 2017-02-01 09:50:43
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/delivery/templates/free_delivery_info.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:144257179958918543961594_19841126%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e5806db88b9245d5011a3fcfd476a46178787e4' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/delivery/templates/free_delivery_info.tpl',
      1 => 1485559651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144257179958918543961594_19841126',
  'variables' => 
  array (
    'free_sum' => 0,
    'sum_basket' => 0,
    'lacking' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5891854397d155_85407220',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5891854397d155_85407220')) {
function content_5891854397d155_85407220 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/user-kc-pskov/data/www/kc-pskov.ru/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '144257179958918543961594_19841126';
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