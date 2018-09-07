<?php /* Smarty version 3.1.24, created on 2015-10-27 15:52:37
         compiled from "/home/c10045/public_html/kompressor-center.com/templates/messages.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:459390865562f73957f0532_55925332%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4babba8bbe1705bc0a4115f46f93393b8083cd24' => 
    array (
      0 => '/home/c10045/public_html/kompressor-center.com/templates/messages.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '459390865562f73957f0532_55925332',
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
  'unifunc' => 'content_562f7395807a67_91364861',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_562f7395807a67_91364861')) {
function content_562f7395807a67_91364861 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '459390865562f73957f0532_55925332';
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