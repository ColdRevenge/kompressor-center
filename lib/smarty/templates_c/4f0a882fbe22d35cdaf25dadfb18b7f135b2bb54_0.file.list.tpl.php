<?php /* Smarty version 3.1.24, created on 2017-08-23 08:34:48
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/journal/templates/list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1756604131599d13f87601d1_85288845%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f0a882fbe22d35cdaf25dadfb18b7f135b2bb54' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/journal/templates/list.tpl',
      1 => 1503466253,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1756604131599d13f87601d1_85288845',
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'sys_images_url' => 0,
    'admin_url' => 0,
    'list' => 0,
    'MyURL' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_599d13f87dada8_36243798',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599d13f87dada8_36243798')) {
function content_599d13f87dada8_36243798 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1756604131599d13f87601d1_85288845';
?>
<div class="block">
    <div class="menu">
        <?php echo $_smarty_tpl->getSubTemplate ("_menu_journal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    </div>
    <div class="page">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>

        <div class="quick_actions">
            <img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
added.png" alt="Добавить" /><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
journal/add/" >Добавить </a>
        </div>
        <h1>Интернет журнал</h1>
        <?php if (count($_smarty_tpl->tpl_vars['list']->value) > 0) {?>
            <form method="POST" action="">
                <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%">
                    <thead>
                        <tr>
                            <td valign="top" align="center" width="150">Дата публикации:</td>
                            <td valign="top" align="center" width="150">Изображение:</td>
                            <td valign="top" align="center">Название:</td>
                            <td valign="top" align="left" width="50">&nbsp;</td>
                        </tr>
                    </thead>
                    <?php
$_from = $_smarty_tpl->tpl_vars['list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars["item"];
?>
                        <tbody class="tbody">
                            <tr>
                                <td valign="middle" align="center" style="cursor: pointer;" title="Редактировать" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
edit/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
/'"><?php echo $_smarty_tpl->tpl_vars['item']->value->published_at;?>
</td>
                                <td valign="middle" align="center" style="cursor: pointer;" title="Редактировать" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
edit/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
/'"><img style="width: 100px;" src="/images/news/small_<?php echo $_smarty_tpl->tpl_vars['item']->value->image;?>
" alt="" /></td>
                                <td valign="middle" align="center" style="cursor: pointer;" title="Редактировать" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
edit/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
/'"><?php echo stripslashes($_smarty_tpl->tpl_vars['item']->value->title);?>
</td>
                                <td valign="middle" align="center">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
edit/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
/" title="Редактировать"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/edit.png" alt="" /></a>
                                    <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить журнал??')) {
    location.href = '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
delete/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
/';}"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/del.png" alt="Удалить новость" /></a>
                                </td>
                            </tr>
                        </tbody>
                    <?php
$_smarty_tpl->tpl_vars["item"] = $foreach_item_Sav;
}
?>
                </table>
                <br/>
            </form>
        <?php } else { ?>
            <h2>Журналов нет.</h2>
        <?php }?>
    </div>
</div><?php }
}
?>