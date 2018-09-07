<?php /* Smarty version 3.1.24, created on 2018-07-02 09:26:29
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/journal/templates/_list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2813866185b39c595691443_52764502%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b77503c641b35b84d2922df4e5f6d627543a7e6' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/journal/templates/_list.tpl',
      1 => 1530509475,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2813866185b39c595691443_52764502',
  'variables' => 
  array (
    'list' => 0,
    'journal' => 0,
    'month' => 0,
    'url' => 0,
    'month_int' => 0,
    'months' => 0,
    'ind' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39c5956da0b0_00476057',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39c5956da0b0_00476057')) {
function content_5b39c5956da0b0_00476057 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/user-kc/data/www/www.kompressor-center.com/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '2813866185b39c595691443_52764502';
?>
<div class="journal-list">
    <?php
$_from = $_smarty_tpl->tpl_vars['list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["journal"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["journal"]->_loop = false;
$_smarty_tpl->tpl_vars["ind"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["ind"]->value => $_smarty_tpl->tpl_vars["journal"]->value) {
$_smarty_tpl->tpl_vars["journal"]->_loop = true;
$foreach_journal_Sav = $_smarty_tpl->tpl_vars["journal"];
?>
        <?php $_smarty_tpl->tpl_vars["month"] = new Smarty_Variable(smarty_modifier_date_format($_smarty_tpl->tpl_vars['journal']->value->published_at,"%m"), null, 0);?>
        <?php $_smarty_tpl->tpl_vars["month_int"] = new Smarty_Variable($_smarty_tpl->tpl_vars['month']->value*1-1, null, 0);?>
        <div class="journal-list__item">
            <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
journal/look/<?php echo $_smarty_tpl->tpl_vars['journal']->value->id;?>
/" class="journal-list__image">
                <img class="journal-list__img" src="/images/news/small_<?php echo $_smarty_tpl->tpl_vars['journal']->value->image;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['journal']->value->title;?>
" />
            </a>
            <div class="journal-date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['journal']->value->published_at,"%d");?>
 <?php echo $_smarty_tpl->tpl_vars['months']->value[$_smarty_tpl->tpl_vars['month_int']->value];?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['journal']->value->published_at,"%Y");?>
</div>
            <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
journal/look/<?php echo $_smarty_tpl->tpl_vars['journal']->value->id;?>
/" class="journal-list__title"><?php echo $_smarty_tpl->tpl_vars['journal']->value->title;?>
</a>
        </div>
        <?php if (($_smarty_tpl->tpl_vars['ind']->value+1)%3 == 0) {?>
			<div class="clear"></div>
        <?php }?>
    <?php
$_smarty_tpl->tpl_vars["journal"] = $foreach_journal_Sav;
}
?>
</div><?php }
}
?>