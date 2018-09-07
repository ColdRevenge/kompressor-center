<?php /* Smarty version 3.1.24, created on 2017-01-27 16:11:45
         compiled from "E:/OpenServer/domains/kc-pskov.dev/templates/messages.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:29864588b4711602f00_87527552%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae339176a149017f0f072d728cd240ffa9469d14' => 
    array (
      0 => 'E:/OpenServer/domains/kc-pskov.dev/templates/messages.tpl',
      1 => 1485495633,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29864588b4711602f00_87527552',
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
  'unifunc' => 'content_588b47116931e7_13235425',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588b47116931e7_13235425')) {
function content_588b47116931e7_13235425 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '29864588b4711602f00_87527552';
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