<?php /* Smarty version 3.1.24, created on 2015-10-28 14:26:00
         compiled from "/home/c10045/public_html/kompressor-center.com/modules/auth/templates/admin_auth.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2879794745630b0c8d36d16_25229359%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1598c740dd3c687317bf0121b28b7f3a968cb118' => 
    array (
      0 => '/home/c10045/public_html/kompressor-center.com/modules/auth/templates/admin_auth.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2879794745630b0c8d36d16_25229359',
  'variables' => 
  array (
    'is_auth' => 0,
    'admin_url' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5630b0c90c9379_74805858',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5630b0c90c9379_74805858')) {
function content_5630b0c90c9379_74805858 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2879794745630b0c8d36d16_25229359';
if ($_smarty_tpl->tpl_vars['is_auth']->value == 0) {?>
<div id="auth">

    <div class="clear">&nbsp;</div>
    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
">
        <table cellpadding="0" cellspacing="2" border="0" style="height: 80px;margin-top: 10px;">
            <tr>
                <td valign="middle" align="left"><h1>Вход в систему управления</h1></td>
            </tr>
            <tr>
                <td valign="middle" align="left"><input type="text" name="login" placeholder="Логин" value="" maxlength="255" style="width: 285px;"/></td>
            </tr>
            <tr>
                <td valign="middle" align="left"><input type="password" class="text" placeholder="Пароль" value="" name="password" maxlength="255" style="width: 285px;"/></td>
            </tr>
            <tr>
                <td valign="middle" align="left">
                    <input type="hidden" name="auth" value="1" />
                    <input type="hidden" name="redirect" value="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
order/list/" />
                    <button style="width: 301px;">Войти</button></td>
                    
            </tr>
        </table>
    </form>
</div>
<div id="auth_error">
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>

</div>
<?php }
}
}
?>