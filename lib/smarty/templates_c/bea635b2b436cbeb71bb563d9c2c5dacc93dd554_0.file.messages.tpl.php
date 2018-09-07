<?php /* Smarty version 3.1.24, created on 2015-09-14 04:00:05
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/templates/messages.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:19909834655f61c15d66696_43000570%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bea635b2b436cbeb71bb563d9c2c5dacc93dd554' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/templates/messages.tpl',
      1 => 1442152631,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19909834655f61c15d66696_43000570',
  'variables' => 
  array (
    'message' => 0,
    'mclass' => 0,
    'error' => 0,
    'is_stick' => 0,
    'eclass' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f61c15db6fb1_35106757',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f61c15db6fb1_35106757')) {
function content_55f61c15db6fb1_35106757 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '19909834655f61c15d66696_43000570';
?>

<?php if ($_smarty_tpl->tpl_vars['message']->value != '') {?>
    <div class="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['mclass']->value)===null||$tmp==='' ? 'message' : $tmp);?>
"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>
<?php } elseif ($_smarty_tpl->tpl_vars['error']->value != '' && $_smarty_tpl->tpl_vars['is_stick']->value == 1) {?>
    <?php echo '<script'; ?>
 type='text/javascript'>$.stickr({note: '$error', className: 'classic error', sticked: true});<?php echo '</script'; ?>
>
<?php } elseif ($_smarty_tpl->tpl_vars['error']->value != '') {?>
    <div class="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['eclass']->value)===null||$tmp==='' ? 'error' : $tmp);?>
"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
<?php }?>  <?php }
}
?>