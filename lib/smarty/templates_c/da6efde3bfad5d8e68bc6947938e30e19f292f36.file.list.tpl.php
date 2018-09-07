<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 16:54:51
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/category/templates/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48533026155d5dc2bd2a1b3-76205667%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da6efde3bfad5d8e68bc6947938e30e19f292f36' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/category/templates/list.tpl',
      1 => 1434651709,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48533026155d5dc2bd2a1b3-76205667',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'list_edit' => 0,
    'admin_url' => 0,
    'type' => 0,
    'edit_id' => 0,
    'category' => 0,
    'select_tree_file' => 0,
    'sys_images_url' => 0,
    'MyURL' => 0,
    'file_tree' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d5dc2bdf4703_53143515',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d5dc2bdf4703_53143515')) {function content_55d5dc2bdf4703_53143515($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><div class="block">
    <div class="menu">
        <?php echo $_smarty_tpl->getSubTemplate ("_menu_category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
    <div class="page">
        <?php echo '<script'; ?>
 type="text/javascript">
            checkMenu = {
                checkAll: function (obj) {
                    if ($(obj).attr('checked') === 'checked') {
                        $(obj).parent().parent().parent().parent().parent().find('tbody input[type=checkbox]').attr('checked', 'checked');
                    }
                    else {
                        $(obj).parent().parent().parent().parent().parent().find('tbody input[type=checkbox]').removeAttr('checked')
                    }
                },
                checkClass: function (obj, className) {
                    if ($(obj).attr('checked') === 'checked') {
                        $('.' + className + ' input[type="checkbox"]').attr('checked', 'checked').change();
                    }
                    else {
                        $('.' + className + ' input[type="checkbox"]').removeAttr('checked').change();
                    }
                }
            }
        <?php echo '</script'; ?>
>
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

        <?php if ($_smarty_tpl->tpl_vars['list_edit']->value==1) {?><h1>Добавить раздел</h1>
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
category/list/edit/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['edit_id']->value;?>
">
                <div class="quick_add">
                    <table cellpadding="2" cellspacing="0" border="0" >
                        <?php if ($_smarty_tpl->tpl_vars['type']->value!=1) {?> <tr>
                                <td valign="middle" align="right">Родительская категория <span class="asterix">*</span>:</td>
                                <td valign="middle" align="left">
                                    <select name="category_id" id="category_id" style="width: 250px;">
                                        <option value="0">...</option>
                                        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['select_tree_file']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>0,'tree'=>$_smarty_tpl->tpl_vars['category']->value,'inc'=>$_smarty_tpl->tpl_vars['select_tree_file']->value,'level'=>0,'current_id'=>$_smarty_tpl->tpl_vars['edit_id']->value,'selected_id'=>$_POST['category_id']), 0);?>

                                    </select>
                                </td>
                            </tr><?php }?>
                            <tr>
                                <td valign="middle" align="right">Название <span class="asterix">*</span>:</td>
                                <td valign="middle" align="left"><input type="text" name="name" value='<?php echo smarty_modifier_replace(stripslashes($_POST['name']),"'",'"');?>
' maxlength="255" style="width: 246px;"/></td>
                            </tr>
                            <tr>
                                <td valign="middle" align="right">Ссылка:</td>
                                <td valign="middle" align="left"><input type="text"  name="link" value="<?php echo $_POST['link'];?>
" maxlength="255" style="width: 246px;"/></td>
                            </tr>
                            <tr>
                                <td valign="middle" align="right">Сортировка</td>
                                <td valign="middle" align="left"><input type="text" name="order" value="<?php echo $_POST['order'];?>
" maxlength="7" style="width: 50px;"/> <input type="checkbox" name="is_visible" value="0" <?php if ($_POST['is_visible']==0) {?>checked<?php }?> class="checkbox" id="is_visible"/><label for="is_visible">Скрытый раздел</label></td>
                            </tr>
                            <tr>
                                <td valign="middle" align="right">&nbsp;</td>
                                <td valign="middle" align="left"><input type="checkbox" name="param_str_1" value="0" <?php if ($_POST['param_str_1']==1) {?>checked<?php }?> class="checkbox" id="param_str_1"/><label for="param_str_1">Мобильная версия</label></td>
                            </tr>
                            <tr>
                                <td valign="middle" align="right" colspan="2">
                                    <?php if ($_smarty_tpl->tpl_vars['edit_id']->value>0) {?><button>Сохранить</button><?php } else { ?><button>Добавить</button><?php }?>
                            </tr>
                        </table>
                    </div>
                </form><?php }?>

                <h1>Разделы <?php if ($_smarty_tpl->tpl_vars['type']->value==0) {?>каталога<?php } else { ?>меню<?php }?></h1>

                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
category/list/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/">

                    <div class="small-navigation">
                        <div>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/add.png" /><a href="<?php if ($_smarty_tpl->tpl_vars['type']->value==0) {
echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
add/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php } else {
echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/edit/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php }?>" title="Добавить раздел <?php if ($_smarty_tpl->tpl_vars['type']->value==0) {?>каталога<?php } else { ?>меню<?php }?>" >Добавить раздел <?php if ($_smarty_tpl->tpl_vars['type']->value==0) {?>каталога<?php } else { ?>меню<?php }?></a>
                        </div>
                        <div>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/vydel.png" />
                            <span>
                                Выбранные категории: &nbsp; <select style="width: 350px;" name="action_product">
                                    <option value="-1">Не выбрано</option>
                                    <option value="-2">Удалить</option>
                                    <option value="-3">Сделать видимым</option>
                                    <option value="-4">Сделать невидимым</option>

                                    <optgroup label="Перенести в раздел:">
                                        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['select_tree_file']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('inc'=>$_smarty_tpl->tpl_vars['select_tree_file']->value,'tree'=>$_smarty_tpl->tpl_vars['category']->value,'id'=>0,'current_id'=>0,'selected_id'=>0), 0);?>

                                    </optgroup>
                                </select>
                            </span>

                            <button>Сохранить</button>
                        </div>
                    </div>


                    <table class="table" border="0" cellpadding="4" cellspacing="1" width="100%">
                        <thead>
                            <tr>
                                <td align="center" valign="middle" style="width: 33px;">
                                    <label class="p-check"><input type="checkbox" value="1" name="category_id[]" onchange="checkMenu.checkAll(this);" /><em>&nbsp;</em></label>
                                </td>
                                <td align="center" valign="middle">Название раздела меню</td>
                                <td align="center" valign="middle" width="75">Сортировка</td>
                                <td align="center" valign="middle" width="75">&nbsp;</td>
                            </tr>
                        </thead>
                        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['file_tree']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>0,'tree'=>$_smarty_tpl->tpl_vars['category']->value,'inc'=>$_smarty_tpl->tpl_vars['file_tree']->value,'level'=>0), 0);?>

                        <tfoot>
                            <tr>
                                <td align="left" valign="middle" colspan="2">

                                </td>
                                <td align="right" valign="middle" colspan="2">
                                    <button name="save_order">Сохранить</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div><?php }} ?>
