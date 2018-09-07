<?php /* Smarty version 3.1.24, created on 2015-09-13 16:50:23
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/delivery/templates/free_delivery_info.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:122679650155f57f1f088179_26953246%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a309c49613a6b34358c2874d3538ffb67df444fa' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/delivery/templates/free_delivery_info.tpl',
      1 => 1427634114,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122679650155f57f1f088179_26953246',
  'variables' => 
  array (
    'free_sum' => 0,
    'sum_basket' => 0,
    'lacking' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f57f1f1146d6_57022214',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f57f1f1146d6_57022214')) {
function content_55f57f1f1146d6_57022214 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '122679650155f57f1f088179_26953246';
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