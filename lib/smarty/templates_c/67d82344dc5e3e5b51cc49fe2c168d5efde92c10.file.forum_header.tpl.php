<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-04 13:20:11
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/templates/forum_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:119160877455db35d329fb29-00336486%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67d82344dc5e3e5b51cc49fe2c168d5efde92c10' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/templates/forum_header.tpl',
      1 => 1441362010,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119160877455db35d329fb29-00336486',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55db35d32a00f0_96909185',
  'variables' => 
  array (
    'host_url' => 0,
    'mini_auth' => 0,
    'is_main' => 0,
    'fronted_images_url' => 0,
    'menu_top' => 0,
    'menu' => 0,
    'open_category_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55db35d32a00f0_96909185')) {function content_55db35d32a00f0_96909185($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
www.w3.org/1999/xhtml">
    <head>
        <?php echo $_smarty_tpl->getSubTemplate ("forum_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </head> 
    <body id="forum">
        <div id="stat-box">
            <div id="stat">
                <?php echo $_smarty_tpl->tpl_vars['mini_auth']->value;?>

            </div>
        </div>
        <div id="bg">
            <div id="header">
                <div id="logo">
                    <?php if ($_smarty_tpl->tpl_vars['is_main']->value==1&&$_SERVER['REQUEST_URI']!='/404/') {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
forum-big.gif" alt="Женский форум" /><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
forum-big.gif" alt="Женский форум" /></a><?php }?>
                    <div>Форум для женщин</div>
                </div>
                <div id="dilivery-box">

                </div>
                <div id="right-box">
                    <a href="https://lalipop.ru/" target="_blank"><img src="/images/forum/go_lalipop.png" alt="" /></a>
                   
                </div>
                <div class="clear">&nbsp;</div>
            </div>
            <div class="clear">&nbsp;</div>

            <div class="clear">&nbsp;</div>
            <div id="menu-wrap">
                <div id="menu"><button id="find-button" title="Поиск по сайту">Поиск по сайту</button><div><?php  $_smarty_tpl->tpl_vars["menu"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["menu"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_top']->value[0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["menu"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["menu"]['total'] = $_smarty_tpl->tpl_vars["menu"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["menu"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["menu"]->key => $_smarty_tpl->tpl_vars["menu"]->value) {
$_smarty_tpl->tpl_vars["menu"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["menu"]['iteration']++;
if ($_smarty_tpl->tpl_vars['menu']->value->is_visible==1) {?><span<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['menu']['iteration']==$_smarty_tpl->getVariable('smarty')->value['foreach']['menu']['total']) {?> style="background: none;"<?php }
if ($_smarty_tpl->tpl_vars['open_category_id']->value==$_smarty_tpl->tpl_vars['menu']->value->id||$_smarty_tpl->tpl_vars['menu']->value->id==769&&$_smarty_tpl->tpl_vars['open_category_id']->value==0||($_SERVER['REQUEST_URI']==smarty_modifier_replace($_smarty_tpl->tpl_vars['menu']->value->link,$_smarty_tpl->tpl_vars['host_url']->value,"/"))) {?>  class="selected_menu"<?php }?>><a href="<?php if ($_smarty_tpl->tpl_vars['menu']->value->link) {
echo $_smarty_tpl->tpl_vars['menu']->value->link;
} else {
echo $_smarty_tpl->tpl_vars['host_url']->value;
echo $_smarty_tpl->smarty->registered_objects['page_obj'][0]->getFullAdressPageIdRoutes(array('page_id'=>$_smarty_tpl->tpl_vars['menu']->value->page_id),$_smarty_tpl);
}?>" ><?php echo stripslashes($_smarty_tpl->tpl_vars['menu']->value->name);?>
</a></span><?php }
} ?></div></div>
            </div><?php }} ?>
