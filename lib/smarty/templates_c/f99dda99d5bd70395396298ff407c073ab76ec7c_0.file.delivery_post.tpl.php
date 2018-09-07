<?php /* Smarty version 3.1.24, created on 2015-09-13 23:37:45
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/stat/templates/delivery_post.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:210894239655f5de996b15b1_89956607%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f99dda99d5bd70395396298ff407c073ab76ec7c' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/stat/templates/delivery_post.tpl',
      1 => 1441983983,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210894239655f5de996b15b1_89956607',
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
  'version' => '3.1.24',
  'unifunc' => 'content_55f5de9973dc94_23736262',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f5de9973dc94_23736262')) {
function content_55f5de9973dc94_23736262 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '210894239655f5de996b15b1_89956607';
echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>

<?php if ($_smarty_tpl->tpl_vars['is_mobile']->value == 1) {?>
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
        <?php echo $_smarty_tpl->getSubTemplate ("stat_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

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
    <?php
$_from = $_smarty_tpl->tpl_vars['get_order']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["order"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["order"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["order"]->value) {
$_smarty_tpl->tpl_vars["order"]->_loop = true;
$foreach_order_Sav = $_smarty_tpl->tpl_vars["order"];
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
                <?php
$_from = $_smarty_tpl->tpl_vars['order']->value['delivery']['result']['checkpoints'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["deliv"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["deliv"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["deliv"]->value) {
$_smarty_tpl->tpl_vars["deliv"]->_loop = true;
$foreach_deliv_Sav = $_smarty_tpl->tpl_vars["deliv"];
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
                <?php
$_smarty_tpl->tpl_vars["deliv"] = $foreach_deliv_Sav;
}
?>
            </tbody>
        </table>
    <?php
$_smarty_tpl->tpl_vars["order"] = $foreach_order_Sav;
}
if (!$_smarty_tpl->tpl_vars["order"]->_loop) {
?>
        <h2>Нет отправленных заказов</h2>
        <p>Возможно статус Вашего заказа еще не обновился в отделении почты России. Если Вы совершили заказ, то в ближайшее время Вы сможете его отследить через этот раздел</p>
    <?php
}
?>
    <?php if ($_smarty_tpl->tpl_vars['is_mobile']->value != 1) {?>
    </div>
<?php }?>
<br/><br/><?php }
}
?>