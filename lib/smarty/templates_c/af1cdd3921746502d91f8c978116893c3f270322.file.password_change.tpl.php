<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-11 18:06:06
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/stat/templates/password_change.tpl" */ ?>
<?php /*%%SmartyHeaderCode:122833747455e093eb1b7cd8-99907044%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af1cdd3921746502d91f8c978116893c3f270322' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/stat/templates/password_change.tpl',
      1 => 1441983965,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122833747455e093eb1b7cd8-99907044',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e093eb285624_58872185',
  'variables' => 
  array (
    'is_mobile' => 0,
    'url' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e093eb285624_58872185')) {function content_55e093eb285624_58872185($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['is_mobile']->value==1) {?>
    <div id="breadcrumbs-block">
        <div id="bread-back"><a href="/">Назад</a></div>
        <h1>Сменить пароль</h1>
        <div class="clear">&nbsp;</div>
    </div>

    <ul id="profile-link">
        <li><a href="/stat/delivery/post/">Отследить заказ (Почта России)</a></li>
        <li><a href="/stat/orders/">Мои заказы</a></li>
        <li><a href="/stat/profile/">Мой профиль</a></li>
        <li><a href="/auth/exit/?back_url=<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo ltrim($_SERVER['REQUEST_URI'],"/");?>
">Выход</a></li>
    </ul>

    <div class="text">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value,'mclass'=>"message"), 0);?>


        
        <form method="post" action="">
            <table cellpadding="0" cellspacing="2" border="0" id="register" class="table_fields">
                <tr>
                    <td valign="middle" align="left"><input type="password" size="30" class="text" name="password" placeholder="Новый пароль"   maxlength="255" /></td>
                </tr>
                <tr>
                    <td valign="middle" align="left"><input type="password" class="text" size="30" name="is_password" placeholder="Подтвержение пароля"   maxlength="255" /></td>
                </tr>
                <tr>
                    <td valign="middle" align="left"><input type="password" size="30" class="text" name="old_password" placeholder="Старый пароль"   maxlength="255"  /></td>
                </tr>
                <tr>
                    <td valign="middle" align="right" colspan="2" style="text-align: right">
                        <input type="hidden" value="1" name="change_pass" />
                        <button class="change">&nbsp;</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

<?php } else { ?>
    <div id="stat-left-menu">
        <?php echo $_smarty_tpl->getSubTemplate ("stat_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
    <div id="stat_content">        
        <div class="breadcrumbs-block">

            <ul class="clearfix">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">Главная</a><span>/</span></li>
                <li>Сменить пароль</li>
            </ul>
        </div>
        <h1>Сменить пароль</h1>

        <div class="text">
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value,'mclass'=>"message"), 0);?>

            <form method="post" action="">
                <table cellpadding="0" cellspacing="2" border="0" id="register" style="margin-left: 80px;  width: 440px;" class="table_fields">
                    <tr>
                        <td valign="middle" align="right" style="text-align: right">Новый пароль:<span class="asterix">*</span></td>
                        <td valign="middle" align="left"><input type="password" size="30" class="text" name="password"  style="width: 200px"  maxlength="255"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/></td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" style="text-align: right">Подтвержение пароля:<span class="asterix">*</span></td>
                        <td valign="middle" align="left"><input type="password" class="text" size="30" name="is_password"  style="width: 200px" maxlength="255"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/></td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" style="text-align: right; width: 220px;">Старый пароль:<span class="asterix">*</span></td>
                        <td valign="middle" align="left"><input type="password" size="30" class="text" name="old_password"  style="width: 200px"  maxlength="255"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/></td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" colspan="2" style="text-align: right">
                            <input type="hidden" value="1" name="change_pass" />
                            <button class="change">&nbsp;</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
<?php }?>

<br/><br/><?php }} ?>
