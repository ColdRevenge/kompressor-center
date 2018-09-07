<?php /* Smarty version 3.1.24, created on 2016-01-15 14:36:14
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/counter/templates/statistic_full.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:13891053695698d9ae9f2078_23385762%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b752c20e53da36c0947ad056b5dcb8aee5d345e' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/counter/templates/statistic_full.tpl',
      1 => 1450788665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13891053695698d9ae9f2078_23385762',
  'variables' => 
  array (
    'date' => 0,
    'stats' => 0,
    'stat' => 0,
    'url' => 0,
    'MyURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5698d9aea680f5_50141564',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5698d9aea680f5_50141564')) {
function content_5698d9aea680f5_50141564 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/user-kc/data/www/www.kompressor-center.com/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '13891053695698d9ae9f2078_23385762';
?>
<div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_sync.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <div class="page">
        <h1>Статистика посещаемости за <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['date']->value,"%d.%m.%Y");?>
</h1>
        <div id="counte_stat" style="display:none;position: absolute;width: 700px;"></div>
        <table cellpadding="4" cellspacing="1" border="0" class="table" width="100%">
            <thead>
                <tr>
                    <td valign="middle" align="center">&nbsp;&nbsp;&nbsp;Время:&nbsp;&nbsp;&nbsp;</td>
                    <td valign="middle" align="center">Браузер:</td>
                    <td valign="middle" align="center">От куда:</b></td>
                    <td valign="middle" align="center">Куда:</td>
                    <td valign="middle" align="center">IP:</td>
                    <td valign="middle" align="center">Кликов:</td>
                </tr>
            </thead>
            <?php
$_from = $_smarty_tpl->tpl_vars['stats']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["stat"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["stat"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["stat"]->value) {
$_smarty_tpl->tpl_vars["stat"]->_loop = true;
$foreach_stat_Sav = $_smarty_tpl->tpl_vars["stat"];
?>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['stat']->value->last_time,"%H:%M:%S");?>
</td>
                        <td valign="middle" align="center"><?php echo $_smarty_tpl->smarty->registered_objects['covert'][0]->user_browser(array('param'=>$_smarty_tpl->tpl_vars['stat']->value->browser),$_smarty_tpl);?>
</td>
                        <td valign="middle" align="center"><?php if ($_smarty_tpl->tpl_vars['stat']->value->referer) {?><a href="<?php echo $_smarty_tpl->tpl_vars['stat']->value->referer;?>
"  onclick="return !window.open(this.href)"><?php echo rawurldecode($_smarty_tpl->tpl_vars['stat']->value->referer);?>
</a><?php } else { ?>&nbsp;<?php }?></td>
                        <td valign="middle" align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['stat']->value->self;?>
" target="__blank"><?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['stat']->value->self;?>
</a></td>
                        <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['stat']->value->ip;?>
</td>
                        <td valign="middle" align="center"><?php if ($_smarty_tpl->tpl_vars['stat']->value->hit > 0) {?><a href="" onclick="AjaxRequest('counte_stat', '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
stat/hits/<?php echo $_smarty_tpl->tpl_vars['stat']->value->id;?>
/');
                                Popup('counte_stat', event);
                                return false;"><?php echo $_smarty_tpl->tpl_vars['stat']->value->hit;?>
</a><?php } else {
echo $_smarty_tpl->tpl_vars['stat']->value->hit;
}?></td>
                    </tr>
                </tbody>
            <?php
$_smarty_tpl->tpl_vars["stat"] = $foreach_stat_Sav;
}
?>
        </table>
    </div>
</div><?php }
}
?>