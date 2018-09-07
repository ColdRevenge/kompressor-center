<?php /* Smarty version 3.1.24, created on 2015-10-13 15:11:58
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/news/templates/page_news.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:260169062561cf50e9270c8_19239485%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c830ba0571595f24fbfadd29409adb7a3ef6d244' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/news/templates/page_news.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '260169062561cf50e9270c8_19239485',
  'variables' => 
  array (
    'param_tpl' => 0,
    'is_mobile' => 0,
    'full_adress' => 0,
    'news' => 0,
    'item_news' => 0,
    'month' => 0,
    'url' => 0,
    'news_image_url' => 0,
    'month_int' => 0,
    'months' => 0,
    'start' => 0,
    'count_all_pages' => 0,
    '_steep' => 0,
    'end' => 0,
    'current_page' => 0,
    '_last_page' => 0,
    '_end_page' => 0,
    '_count_hide_page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_561cf50ed13a82_98107508',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_561cf50ed13a82_98107508')) {
function content_561cf50ed13a82_98107508 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/admin/domains/coralmedia.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) require_once '/home/admin/domains/coralmedia.ru/public_html/lib/smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_replace')) require_once '/home/admin/domains/coralmedia.ru/public_html/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '260169062561cf50e9270c8_19239485';
?>



<?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['is_strip'] != 1) {?>
    <?php if ($_smarty_tpl->tpl_vars['is_mobile']->value == 1) {?>
        <div id="breadcrumbs-block">
            <div id="bread-back"><a href="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['full_adress']->value)===null||$tmp==='' ? "/" : $tmp);?>
">Назад</a></div>
            <h1>Новости и статьи</h1>
            <div class="clear">&nbsp;</div>
        </div>
    <?php } else { ?>
        <div class="breadcrumbs-block">
            <ul>
                <li><a href="/">Главная</a><span>/</span></li>
                <li><span>Новости</span></li>
            </ul>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['type'] == 3) {?>
            <h1>Модный журнал</h1>
        <?php } else { ?>
            <h1>Новости</h1>
        <?php }?>
    <?php }?>
    <div class="text">
        <p></p>
    <?php }?>
    <div class="page-news" style="padding-left: 10px;">
        <?php
$_from = $_smarty_tpl->tpl_vars['news']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item_news"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item_news"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['__foreach_news'] = new Smarty_Variable(array('total' => $_smarty_tpl->_count($_from), 'iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["item_news"]->value) {
$_smarty_tpl->tpl_vars["item_news"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_news']->value['iteration']++;
$foreach_item_news_Sav = $_smarty_tpl->tpl_vars["item_news"];
?>
            <?php $_smarty_tpl->tpl_vars["month"] = new Smarty_Variable(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item_news']->value->date,"%m"), null, 0);?>
            <?php $_smarty_tpl->tpl_vars["month_int"] = new Smarty_Variable($_smarty_tpl->tpl_vars['month']->value*1-1, null, 0);?>
            <?php $_smarty_tpl->tpl_vars["month_int_0"] = new Smarty_Variable($_smarty_tpl->tpl_vars['month']->value*1, null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['item_news']->value->icon && $_smarty_tpl->tpl_vars['is_mobile']->value != 1) {?><div style="float: left;margin-right: 10px; min-width: 125px;text-align: center"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/look/<?php echo $_smarty_tpl->tpl_vars['item_news']->value->id;?>
/" title=""><img src="<?php echo $_smarty_tpl->tpl_vars['news_image_url']->value;
echo $_smarty_tpl->smarty->registered_objects['setFile'][0]->setFile(array('file'=>$_smarty_tpl->tpl_vars['item_news']->value->icon),$_smarty_tpl);?>
" alt="" style="margin-top: 7px;"  /></a></div><?php }?>

            <div class="news-text">

                <div class="font-data"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item_news']->value->date,"%d");?>
 <?php echo $_smarty_tpl->tpl_vars['months']->value[$_smarty_tpl->tpl_vars['month_int']->value];?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item_news']->value->date,"%Y");?>
</div>
                <div><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/look/<?php echo $_smarty_tpl->tpl_vars['item_news']->value->id;?>
/" class="h3"><?php echo stripslashes($_smarty_tpl->tpl_vars['item_news']->value->name);?>
</a></div>

                <?php echo smarty_modifier_replace(stripslashes(smarty_modifier_truncate(trim(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['item_news']->value->text)),103,"..",true,false)),"&nbsp;"," ");?>
 
                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/look/<?php echo $_smarty_tpl->tpl_vars['item_news']->value->id;?>
/">Читать полностью</a></div>
            <div class="clear">&nbsp;</div>
        <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_news']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_news']->value['iteration'] : null) != (isset($_smarty_tpl->tpl_vars['__foreach_news']->value['total']) ? $_smarty_tpl->tpl_vars['__foreach_news']->value['total'] : null)) {?><div class="border-desc"></div><?php } else {
}?>
    <?php
$_smarty_tpl->tpl_vars["item_news"] = $foreach_item_news_Sav;
}
?>
</div><br/>
<?php if ($_smarty_tpl->tpl_vars['news']->value[0]->type != 5) {?>
    <div style="text-align: right;margin-top: 8px;vertical-align: middle; margin-right: 20px;font-size: 21px; ">
        Вывод страниц current_page
        <?php if ($_smarty_tpl->tpl_vars['start']->value > 1) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/all/<?php echo $_smarty_tpl->tpl_vars['start']->value-1;?>
/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['type'];?>
/"><span style="font-size: 17px;vertical-align: middle;">«</span></a> <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
1/">1</a> ...

            
            <?php $_smarty_tpl->tpl_vars["_last_page"] = new Smarty_Variable($_smarty_tpl->tpl_vars['start']->value, null, 0);?> 
            <?php $_smarty_tpl->tpl_vars["_steep"] = new Smarty_Variable($_smarty_tpl->tpl_vars['start']->value*30/floor(100), null, 0);?> 
            
            <?php if ($_smarty_tpl->tpl_vars['count_all_pages']->value >= 20) {?>
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['test'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['test']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['test']['start'] = (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['test']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['start']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['test']['step'] = ((int) $_smarty_tpl->tpl_vars['_steep']->value) == 0 ? 1 : (int) $_smarty_tpl->tpl_vars['_steep']->value;
$_smarty_tpl->tpl_vars['smarty']->value['section']['test']['name'] = 'test';
$_smarty_tpl->tpl_vars['smarty']->value['section']['test']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['test']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['test']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['test']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['test']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['test']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['test']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['test']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['test']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['test']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['test']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['test']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['test']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['test']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['test']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['test']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['test']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['test']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['total']);
?>
                    <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['test']['index'] <= $_smarty_tpl->tpl_vars['start']->value-5 && $_smarty_tpl->getVariable('smarty')->value['section']['test']['index'] >= 5) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/all/<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['test']['index'];?>
/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['type'];?>
/"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['test']['index'];?>
</a> ...
                    <?php }?>
                <?php endfor; endif; ?>
            <?php }?>
            

        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['start'] = (int) $_smarty_tpl->tpl_vars['start']->value;
$_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['end']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['name'] = "num_page";
$_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["num_page"]['total']);
?>
            <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['num_page']['index'] == $_smarty_tpl->tpl_vars['current_page']->value) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/all/<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['num_page']['index'];?>
/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['type'];?>
/" style="color:gray;font-size: 21px;"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['num_page']['index'];?>
</a>
            <?php } else { ?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/all/<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['num_page']['index'];?>
/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['type'];?>
/" style="font-size: 21px;"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['num_page']['index'];?>
</a>
            <?php }?>
        <?php endfor; endif; ?>

        <?php if ($_smarty_tpl->tpl_vars['end']->value && $_smarty_tpl->tpl_vars['end']->value <= $_smarty_tpl->tpl_vars['count_all_pages']->value-1) {?>
            
            <?php $_smarty_tpl->tpl_vars["_end_page"] = new Smarty_Variable($_smarty_tpl->tpl_vars['end']->value-1, null, 0);?> 
            <?php $_smarty_tpl->tpl_vars["_last_page"] = new Smarty_Variable($_smarty_tpl->tpl_vars['count_all_pages']->value-1, null, 0);?> 
            <?php $_smarty_tpl->tpl_vars["_count_hide_page"] = new Smarty_Variable($_smarty_tpl->tpl_vars['_last_page']->value-$_smarty_tpl->tpl_vars['_end_page']->value, null, 0);?> 
            <?php $_smarty_tpl->tpl_vars["_steep"] = new Smarty_Variable($_smarty_tpl->tpl_vars['_count_hide_page']->value*30/floor(100), null, 0);?> 
            
            <?php if ($_smarty_tpl->tpl_vars['count_all_pages']->value >= 20) {?>
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['test'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['test']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['test']['start'] = (int) $_smarty_tpl->tpl_vars['_end_page']->value+$_smarty_tpl->tpl_vars['_steep']->value;
$_smarty_tpl->tpl_vars['smarty']->value['section']['test']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['_last_page']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['test']['step'] = ((int) $_smarty_tpl->tpl_vars['_steep']->value) == 0 ? 1 : (int) $_smarty_tpl->tpl_vars['_steep']->value;
$_smarty_tpl->tpl_vars['smarty']->value['section']['test']['name'] = 'test';
$_smarty_tpl->tpl_vars['smarty']->value['section']['test']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['test']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['test']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['test']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['test']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['test']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['test']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['test']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['test']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['test']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['test']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['test']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['test']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['test']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['test']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['test']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['test']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['test']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['test']['total']);
?>
                    <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['test']['index'] <= $_smarty_tpl->tpl_vars['_last_page']->value-5 && $_smarty_tpl->getVariable('smarty')->value['section']['test']['index'] >= $_smarty_tpl->tpl_vars['_end_page']->value+5) {?>
                        ... <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/all/<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['test']['index'];?>
/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['type'];?>
/"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['test']['index'];?>
</a>
                    <?php }?>
                <?php endfor; endif; ?>
            <?php }?>
            
            ... <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/all/<?php echo $_smarty_tpl->tpl_vars['count_all_pages']->value-1;?>
/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['type'];?>
/"><?php echo $_smarty_tpl->tpl_vars['count_all_pages']->value-1;?>
</a> <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['end']->value;?>
/">
                <span style="font-weight: bold; font-size: 14px;vertical-align: middle;">»</span></a>
            <?php }?>
    </div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['is_strip'] != 1) {?>
</div>
<?php }
}
}
?>