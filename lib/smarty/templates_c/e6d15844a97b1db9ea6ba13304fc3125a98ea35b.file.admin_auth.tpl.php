<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 16:25:47
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/auth/templates/admin_auth.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134299847155d483dbafe6f2-74423669%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6d15844a97b1db9ea6ba13304fc3125a98ea35b' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/auth/templates/admin_auth.tpl',
      1 => 1423307962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134299847155d483dbafe6f2-74423669',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_auth' => 0,
    'admin_url' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d483dbb521c3_91985604',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d483dbb521c3_91985604')) {function content_55d483dbb521c3_91985604($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['is_auth']->value==0) {?>
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
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

</div>
<?php }?><?php }} ?>
