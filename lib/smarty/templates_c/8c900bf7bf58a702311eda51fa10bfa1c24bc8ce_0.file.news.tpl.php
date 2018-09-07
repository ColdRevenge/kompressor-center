<?php /* Smarty version 3.1.24, created on 2017-01-27 16:14:09
         compiled from "E:/OpenServer/domains/kc-pskov.dev/modules/news/templates/news.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:29177588b47a1b536e2_03301434%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c900bf7bf58a702311eda51fa10bfa1c24bc8ce' => 
    array (
      0 => 'E:/OpenServer/domains/kc-pskov.dev/modules/news/templates/news.tpl',
      1 => 1485497711,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29177588b47a1b536e2_03301434',
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
  'unifunc' => 'content_588b47a1bb82d7_39350568',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588b47a1bb82d7_39350568')) {
function content_588b47a1bb82d7_39350568 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'E:/OpenServer/domains/kc-pskov.dev/lib/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) require_once 'E:/OpenServer/domains/kc-pskov.dev/lib/smarty/plugins/modifier.truncate.php';

$_smarty_tpl->properties['nocache_hash'] = '29177588b47a1b536e2_03301434';
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