<?php /* Smarty version 3.1.24, created on 2018-07-02 08:44:16
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/templates/messages.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1883421545b39bbb0314831_57047907%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c6a02fb1ef9b431bd5ebc88636989b0b0d84561' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/templates/messages.tpl',
      1 => 1530509531,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1883421545b39bbb0314831_57047907',
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
  'unifunc' => 'content_5b39bbb037b1c3_61813978',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39bbb037b1c3_61813978')) {
function content_5b39bbb037b1c3_61813978 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1883421545b39bbb0314831_57047907';
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