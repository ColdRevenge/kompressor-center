<?php /* Smarty version 3.1.24, created on 2015-09-15 13:07:02
         compiled from "/home/admin/domains/coralmedia.ru/public_html/templates/messages.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:210607678455f7edc62b0111_35322775%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67a7fec010fff18efc10caf6f035284509fc6483' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/templates/messages.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210607678455f7edc62b0111_35322775',
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
  'unifunc' => 'content_55f7edc62ea6b1_63847994',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f7edc62ea6b1_63847994')) {
function content_55f7edc62ea6b1_63847994 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '210607678455f7edc62b0111_35322775';
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