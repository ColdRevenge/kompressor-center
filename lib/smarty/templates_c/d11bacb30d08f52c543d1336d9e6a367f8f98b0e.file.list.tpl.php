<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 13:11:06
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/news/templates/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5183395255d5a7ba290229-30986517%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd11bacb30d08f52c543d1336d9e6a367f8f98b0e' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/news/templates/list.tpl',
      1 => 1423307970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5183395255d5a7ba290229-30986517',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'sys_images_url' => 0,
    'admin_url' => 0,
    'news' => 0,
    'MyURL' => 0,
    'item_news' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d5a7ba361d13_16421241',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d5a7ba361d13_16421241')) {function content_55d5a7ba361d13_16421241($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.truncate.php';
?><div class="block">
    <?php if ($_smarty_tpl->tpl_vars['type']->value<3) {?><div class="menu">
            <?php echo $_smarty_tpl->getSubTemplate ("_menu_news.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
        <div class="page"><?php }?>
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

            <div class="quick_actions">
                <img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
added.png" alt="Добавить" /><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
news/add/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo time();?>
/" >Добавить </a>
            </div>
            <h1><?php if ($_smarty_tpl->tpl_vars['type']->value==2) {?>Объявления<?php } elseif ($_smarty_tpl->tpl_vars['type']->value==3) {?>Статьи<?php } elseif ($_smarty_tpl->tpl_vars['type']->value==4) {?>Мнения профессионалов<?php } else { ?>Новости<?php }?></h1>
            <?php if (count($_smarty_tpl->tpl_vars['news']->value)>0) {?>
                <form method="POST" action="">
                    <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%">
                        <thead>
                            <tr>
                                <td valign="top" align="center" width="90">Дата:</td>
                                <td valign="top" align="center">Название:</td>
                                <td valign="top" align="center">Описание:</td>
                                <td valign="top" align="center" width="140">Создано:</td>
                                <td valign="top" align="center">Сорт.:</td>
                                <td valign="top" align="left" width="50">&nbsp;</td>
                            </tr>
                        </thead>
                        <?php  $_smarty_tpl->tpl_vars["item_news"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item_news"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['news']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item_news"]->key => $_smarty_tpl->tpl_vars["item_news"]->value) {
$_smarty_tpl->tpl_vars["item_news"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["item_news"]->key;
?>
                            <tbody class="tbody">
                                <tr>
                                    <td valign="middle" align="center" style="cursor: pointer;" title="Редактировать" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
edit/<?php echo $_smarty_tpl->tpl_vars['item_news']->value->id;?>
/'"><?php echo $_smarty_tpl->tpl_vars['item_news']->value->format_date;?>
</td>
                                    <td valign="middle" align="center" style="cursor: pointer;" title="Редактировать" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
edit/<?php echo $_smarty_tpl->tpl_vars['item_news']->value->id;?>
/'"><?php echo stripslashes($_smarty_tpl->tpl_vars['item_news']->value->name);?>
</td>
                                    <td valign="middle" align="left" style="cursor: pointer;" title="Редактировать" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
edit/<?php echo $_smarty_tpl->tpl_vars['item_news']->value->id;?>
/'"><?php echo stripslashes(smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['item_news']->value->text),100,"..",true));?>
</td>
                                    <td valign="middle" align="center" style="cursor: pointer;" title="Редактировать" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
edit/<?php echo $_smarty_tpl->tpl_vars['item_news']->value->id;?>
/'"><?php echo $_smarty_tpl->tpl_vars['item_news']->value->format_created;?>
</td>
                                    <td valign="middle" align="center"><input type="text" name="order[<?php echo $_smarty_tpl->tpl_vars['item_news']->value->id;?>
]" style="width: 50px;text-align: center;" value="<?php echo $_smarty_tpl->tpl_vars['item_news']->value->order;?>
" /></td>
                                    <td valign="middle" align="center">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
edit/<?php echo $_smarty_tpl->tpl_vars['item_news']->value->id;?>
/" title="Редактировать новость"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/edit.png" alt="" /></a>
                                        <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить новость??')) {
        location.href = '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/3/<?php echo $_smarty_tpl->tpl_vars['item_news']->value->id;?>
/';}"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/del.png" alt="Удалить новость" /></a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                    <br/>
                    <div style="text-align: right;"><button>Сохранить</button></div>
                </form>
            <?php } else { ?>
                <h2>Нет <?php if ($_smarty_tpl->tpl_vars['type']->value==2) {?>объявлений<?php } elseif ($_smarty_tpl->tpl_vars['type']->value==3) {?>статей<?php } elseif ($_smarty_tpl->tpl_vars['type']->value==4) {?>мнений профессионалов<?php } else { ?>новостей<?php }?>. <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
news/add/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo time();?>
/"><b>Добавить?</b></a></h2>
            <?php }?>
        </div>
    </div><?php }} ?>
