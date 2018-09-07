<?php /* Smarty version 3.1.24, created on 2015-10-20 17:04:34
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/delivery/templates/free_delivery_info.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:626658918562649f2da7369_20107115%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd10c60f7c480c31d8c0f32e70e8de3559ecc487d' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/delivery/templates/free_delivery_info.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '626658918562649f2da7369_20107115',
  'variables' => 
  array (
    'free_sum' => 0,
    'sum_basket' => 0,
    'lacking' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_562649f2dcd965_89438131',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_562649f2dcd965_89438131')) {
function content_562649f2dcd965_89438131 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/home/admin/domains/coralmedia.ru/public_html/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '626658918562649f2da7369_20107115';
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