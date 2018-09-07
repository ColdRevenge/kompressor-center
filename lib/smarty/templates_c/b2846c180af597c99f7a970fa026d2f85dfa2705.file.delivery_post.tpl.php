<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-11 18:06:24
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/stat/templates/delivery_post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120984543855dbbe97e27fd5-03532170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2846c180af597c99f7a970fa026d2f85dfa2705' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/stat/templates/delivery_post.tpl',
      1 => 1441983983,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120984543855dbbe97e27fd5-03532170',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55dbbe97eb10f5_58269278',
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'is_mobile' => 0,
    'url' => 0,
    'get_order' => 0,
    'order' => 0,
    'deliv' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55dbbe97eb10f5_58269278')) {function content_55dbbe97eb10f5_58269278($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

<?php if ($_smarty_tpl->tpl_vars['is_mobile']->value==1) {?>
    <div id="breadcrumbs-block">
        <div id="bread-back"><a href="/">Назад</a></div>
        <h1>Отследить заказ (Почта России)</h1>
        <div class="clear">&nbsp;</div>
    </div>

    <ul id="profile-link">
        <li><a href="/stat/orders/">Мои заказы</a></li>
        <li><a href="/stat/profile/">Мой профиль</a></li>
        <li><a href="/stat/password/">Сменить пароль</a></li>
        <li><a href="/auth/exit/?back_url=<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo ltrim($_SERVER['REQUEST_URI'],"/");?>
">Выход</a></li>
    </ul>
<?php } else { ?>
    <div id="stat-left-menu">
        <?php echo $_smarty_tpl->getSubTemplate ("stat_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
    <div id="stat_content">

        <div class="breadcrumbs-block">

            <ul class="clearfix">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">Главная</a><span>/</span></li>
                <li>Отследить заказ (Почта России)</li>
            </ul>
        </div>
        <h1>Отследить заказ (Почта России)</h1>
    <?php }?>
    <?php  $_smarty_tpl->tpl_vars["order"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["order"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['get_order']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["order"]->key => $_smarty_tpl->tpl_vars["order"]->value) {
$_smarty_tpl->tpl_vars["order"]->_loop = true;
?>
        <h2>Заказ №<?php echo $_smarty_tpl->tpl_vars['order']->value['order']->id;?>
</h2>
        <p>Обновлено: <b><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value['delivery']['result']['checkpoints'],"%d.%m.%Y %H:%I");?>
</b> <span class="notice">(трек: <b><?php echo $_smarty_tpl->tpl_vars['order']->value['delivery']['result']['tracking_number'];?>
)</b></span></p>
        
        <table  border="3" style="margin: auto;">
            <tbody>
                <tr>
                    <td valign="middle" align="center">Время</td>
                    <td valign="middle" align="center">Адрес</td>
                    <td valign="middle" align="center">Статус</td>
                </tr>
            </tbody>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["deliv"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["deliv"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['delivery']['result']['checkpoints']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["deliv"]->key => $_smarty_tpl->tpl_vars["deliv"]->value) {
$_smarty_tpl->tpl_vars["deliv"]->_loop = true;
?>
                    <tr>
                        <td valign="middle" align="center" style="font-size: 14px;width: 120px;">
                            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['deliv']->value['time'],"%d.%m.%Y %H:%I");?>

                        </td>
                        <td valign="middle" align="center" style="font-size: 14px;">
                            <?php echo $_smarty_tpl->tpl_vars['deliv']->value['location'];?>

                        </td>
                        <td valign="middle" align="center" style="font-size: 14px;">
                            <?php echo $_smarty_tpl->tpl_vars['deliv']->value['message'];?>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php }
if (!$_smarty_tpl->tpl_vars["order"]->_loop) {
?>
        <h2>Нет отправленных заказов</h2>
        <p>Возможно статус Вашего заказа еще не обновился в отделении почты России. Если Вы совершили заказ, то в ближайшее время Вы сможете его отследить через этот раздел</p>
    <?php } ?>
    <?php if ($_smarty_tpl->tpl_vars['is_mobile']->value!=1) {?>
    </div>
<?php }?>
<br/><br/><?php }} ?>
