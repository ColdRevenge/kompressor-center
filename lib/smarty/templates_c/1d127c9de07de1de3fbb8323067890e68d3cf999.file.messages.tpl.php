<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 14:32:20
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/templates/messages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200635367955d46944c6b0d6-80220221%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d127c9de07de1de3fbb8323067890e68d3cf999' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/templates/messages.tpl',
      1 => 1423307961,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200635367955d46944c6b0d6-80220221',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
    'mclass' => 0,
    'error' => 0,
    'is_stick' => 0,
    'eclass' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d46944cbcea6_89009797',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d46944cbcea6_89009797')) {function content_55d46944cbcea6_89009797($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['message']->value!='') {?>
    <div class="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['mclass']->value)===null||$tmp==='' ? 'message' : $tmp);?>
"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>
<?php } elseif ($_smarty_tpl->tpl_vars['error']->value!=''&&$_smarty_tpl->tpl_vars['is_stick']->value==1) {?>
    <?php echo '<script'; ?>
 type='text/javascript'>$.stickr({note: '$error', className: 'classic error', sticked: true});<?php echo '</script'; ?>
>
<?php } elseif ($_smarty_tpl->tpl_vars['error']->value!='') {?>
    <div class="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['eclass']->value)===null||$tmp==='' ? 'error' : $tmp);?>
"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
<?php }?>  <?php }} ?>
