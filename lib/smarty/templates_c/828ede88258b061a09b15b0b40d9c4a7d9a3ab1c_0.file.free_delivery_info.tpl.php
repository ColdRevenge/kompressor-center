<?php /* Smarty version 3.1.24, created on 2018-07-02 10:52:19
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/delivery/templates/free_delivery_info.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:20631824265b39d9b3be3192_09986803%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '828ede88258b061a09b15b0b40d9c4a7d9a3ab1c' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/delivery/templates/free_delivery_info.tpl',
      1 => 1530509461,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20631824265b39d9b3be3192_09986803',
  'variables' => 
  array (
    'free_sum' => 0,
    'sum_basket' => 0,
    'lacking' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39d9b3c1ac24_69450540',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39d9b3c1ac24_69450540')) {
function content_5b39d9b3c1ac24_69450540 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/user-kc/data/www/www.kompressor-center.com/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '20631824265b39d9b3be3192_09986803';
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