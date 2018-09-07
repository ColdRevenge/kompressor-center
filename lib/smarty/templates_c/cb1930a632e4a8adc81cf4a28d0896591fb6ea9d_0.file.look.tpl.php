<?php /* Smarty version 3.1.24, created on 2017-08-23 08:57:07
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/journal/templates/look.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:778316785599d1933bae600_00570561%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb1930a632e4a8adc81cf4a28d0896591fb6ea9d' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/journal/templates/look.tpl',
      1 => 1503467815,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '778316785599d1933bae600_00570561',
  'variables' => 
  array (
    'url' => 0,
    'journal' => 0,
    'month' => 0,
    'month_int' => 0,
    'months' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_599d1933c09831_35395923',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599d1933c09831_35395923')) {
function content_599d1933c09831_35395923 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/user-kc/data/www/www.kompressor-center.com/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '778316785599d1933bae600_00570561';
?>
<div class="breadcrumbs-block">
    <ul>
        <li><a href="/">Главная</a><span>/</span></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
journal/">Интернет-журнал</a><span>/</span></li>
        <li><?php echo $_smarty_tpl->tpl_vars['journal']->value->title;?>
</li>
    </ul>
</div>
<h1><?php echo $_smarty_tpl->tpl_vars['journal']->value->title;?>
</h1>
<?php $_smarty_tpl->tpl_vars["month"] = new Smarty_Variable(smarty_modifier_date_format($_smarty_tpl->tpl_vars['journal']->value->published_at,"%m"), null, 0);?>
<?php $_smarty_tpl->tpl_vars["month_int"] = new Smarty_Variable($_smarty_tpl->tpl_vars['month']->value*1-1, null, 0);?>
<div class="journal-date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['journal']->value->published_at,"%d");?>
 <?php echo $_smarty_tpl->tpl_vars['months']->value[$_smarty_tpl->tpl_vars['month_int']->value];?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['journal']->value->published_at,"%Y");?>
</div>
<div class="text">
    <div class="text-page">
        <p><?php echo $_smarty_tpl->tpl_vars['journal']->value->text;?>
</p>
        
    </div>
</div>
<br/>
<div style="margin: 10px auto;text-align: center;">
    <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
journal/" class="font-data">Вернуться</a>
</div><?php }
}
?>