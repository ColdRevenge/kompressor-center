<?php /* Smarty version 3.1.24, created on 2015-09-16 17:10:24
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/news/templates/news.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:159173000655f97850e76e71_10886882%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70dd91afa00797774a5d86bf56a3aeaa305b502f' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/news/templates/news.tpl',
      1 => 1442412621,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159173000655f97850e76e71_10886882',
  'variables' => 
  array (
    'news' => 0,
    'item_news' => 0,
    'month' => 0,
    'url' => 0,
    'news_image_url' => 0,
    'month_int' => 0,
    'months' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f97850ef4cf9_12413496',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f97850ef4cf9_12413496')) {
function content_55f97850ef4cf9_12413496 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/admin/domains/coralmedia.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) require_once '/home/admin/domains/coralmedia.ru/public_html/lib/smarty/plugins/modifier.truncate.php';

$_smarty_tpl->properties['nocache_hash'] = '159173000655f97850e76e71_10886882';
?>

        <div id="news" style="background: #fff;">
            <table style="padding:5px;width: 100%;">
                <?php
$_from = $_smarty_tpl->tpl_vars['news']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item_news"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item_news"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["item_news"]->value) {
$_smarty_tpl->tpl_vars["item_news"]->_loop = true;
$foreach_item_news_Sav = $_smarty_tpl->tpl_vars["item_news"];
?>
                    <?php $_smarty_tpl->tpl_vars["month"] = new Smarty_Variable(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item_news']->value->date,"%m"), null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["month_int"] = new Smarty_Variable($_smarty_tpl->tpl_vars['month']->value*1-1, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["month_int_0"] = new Smarty_Variable($_smarty_tpl->tpl_vars['month']->value*1, null, 0);?>
                    <tr>
                        <td valign="top" style="border-bottom: 1px solid #eee;padding: 10px 10px 10px 10px;text-align: center;">
							<?php if ($_smarty_tpl->tpl_vars['item_news']->value->icon) {?>
								<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/look/<?php echo $_smarty_tpl->tpl_vars['item_news']->value->id;?>
/" title="">
									<img src="<?php echo $_smarty_tpl->tpl_vars['news_image_url']->value;
echo $_smarty_tpl->smarty->registered_objects['setFile'][0]->setFile(array('file'=>$_smarty_tpl->tpl_vars['item_news']->value->icon),$_smarty_tpl);?>
" alt="" style="margin-top: 4px;" width="100px"  />
								</a>
							<?php }?>
							<span style="display: block;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item_news']->value->date,"%d");?>
 <?php echo $_smarty_tpl->tpl_vars['months']->value[$_smarty_tpl->tpl_vars['month_int']->value];?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item_news']->value->date,"%Y");?>
</span>
						</td>
                        <td valign="top" style="padding: 10px 10px 10px 10px;border-bottom: 1px solid #eee;">
							<a style="display: block;font-size: 17px;" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/look/<?php echo $_smarty_tpl->tpl_vars['item_news']->value->id;?>
/" title=""><?php echo stripslashes(smarty_modifier_truncate(trim(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['item_news']->value->name)),55,"..",true,false));?>
</a>
                            <p><?php echo stripslashes(smarty_modifier_truncate(trim(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['item_news']->value->text)),75," ...",true,false));?>
</p>
                        </td>
                    </tr>
                <?php
$_smarty_tpl->tpl_vars["item_news"] = $foreach_item_news_Sav;
}
?> 
            </table>
        </div>
    <?php }
}
?>