<?php /* Smarty version 3.1.24, created on 2017-01-28 02:36:38
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/templates/messages.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:555775972588bd986646528_09010881%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35b3ae5edf3d37cb199d0206b080ceb8bef7f63e' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/templates/messages.tpl',
      1 => 1485559688,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '555775972588bd986646528_09010881',
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
  'unifunc' => 'content_588bd98666cae5_30662622',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588bd98666cae5_30662622')) {
function content_588bd98666cae5_30662622 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '555775972588bd986646528_09010881';
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