<?php /* Smarty version 3.1.24, created on 2015-10-16 12:36:48
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/selection/templates/list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:20060792985620c530dbda82_53962323%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85e3401c2c2233839192b38e5933f53471809557' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/selection/templates/list.tpl',
      1 => 1444988157,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20060792985620c530dbda82_53962323',
  'variables' => 
  array (
    'param_tpl' => 0,
    'url' => 0,
    'category_tree_list_0' => 0,
    'category_id' => 0,
    'category_name' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'get_setting' => 0,
    'get_chars' => 0,
    'get_char' => 0,
    'char_id' => 0,
    'chars' => 0,
    'char' => 0,
    'sys_images_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5620c530eb72c7_96712260',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5620c530eb72c7_96712260')) {
function content_5620c530eb72c7_96712260 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '20060792985620c530dbda82_53962323';
?>
<div class="block">
    <div class="menu">
        <h1>Подбор для:</h1>
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
            <tbody class="<?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['category_id'] == 0) {?>tbody_hover <?php }?>tbody">
                <tr>
                    <td align="left" valign="middle" style="cursor: pointer;" title="Открыть" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
xadmin/selection/list/0/'">
                        <div style="margin-left:0px;"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
xadmin/selection/list/0/" <?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['category_id'] == 0) {?>style="font-weight:bold;"<?php }?>>Для всех разделов</a></div>
                    </td>
                </tr>
            </tbody>
            <?php echo $_smarty_tpl->tpl_vars['category_tree_list_0']->value;?>

        </table>
    </div>
    <div class="page">
        <form method="post" enctype="multipart/form-data" action="">
            <h1>Настройка подбора <?php if ($_smarty_tpl->tpl_vars['category_id']->value == 0) {?> для всех разделов (по-умолчанию)<?php } elseif ($_smarty_tpl->tpl_vars['category_name']->value) {?> для раздела - &laquo;<?php echo stripslashes($_smarty_tpl->tpl_vars['category_name']->value);?>
&raquo;<?php }?></h1>


            <?php if ($_smarty_tpl->tpl_vars['category_id']->value != 0) {?>
                <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>

            <?php }?>
            <label for="is_active" class="p-check"><input type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['get_setting']->value->is_active == 1) {?>checked="checked"<?php }?> name="is_active" id="is_active" /><em>&nbsp;</em><span>Активный</span></label><br/>
            <label for="is_price" class="p-check"><input type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['get_setting']->value->is_price == 1) {?>checked="checked"<?php }?> name="is_price" id="is_price" /><em>&nbsp;</em><span>Подбор по цене</span></label><br/>
            <label for="is_brand" class="p-check"><input type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['get_setting']->value->is_brand == 1) {?>checked="checked"<?php }?> name="is_brand" id="is_brand" /><em>&nbsp;</em><span>Подбор производителю</span></label><br/>

            
            <label for="is_param_2" class="p-check"><input type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['get_setting']->value->is_param_2 == 1) {?>checked="checked"<?php }?> name="is_param_2" id="is_param_2" /><em>&nbsp;</em><span>Новинки</span></label><br/>
            <label for="is_param_3" class="p-check"><input type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['get_setting']->value->is_param_3 == 1) {?>checked="checked"<?php }?> name="is_param_3" id="is_param_3" /><em>&nbsp;</em><span>Распродажи</span></label><br/>
                

            <button style="margin-top: 10px;" name="save_setting">Сохранить</button>
            <br/><br/>
        </form>

        <form method="post" enctype="multipart/form-data" action="">
            <?php if (count($_smarty_tpl->tpl_vars['get_chars']->value)) {?>
                <h1>Параметры в подборе</h1>

                <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%">
                    <thead>
                        <tr>
                            <td valign="middle" align="center">Название:</td>
                            <td valign="middle" align="center">Характеристика:</td>
                            <td valign="middle" align="center">Тип:</td>
                            <td valign="middle" align="center">Сорт.:</td>
                            <td valign="middle" align="center">Сорт. значений:</td>
                            <td valign="middle" align="center">&nbsp;</td>
                        </tr>
                    </thead>
                    <?php
$_from = $_smarty_tpl->tpl_vars['get_chars']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["get_char"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["get_char"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["get_char"]->value) {
$_smarty_tpl->tpl_vars["get_char"]->_loop = true;
$foreach_get_char_Sav = $_smarty_tpl->tpl_vars["get_char"];
?>
                        <?php $_smarty_tpl->tpl_vars["char_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['get_char']->value->id, null, 0);?>
                        <tbody class="tbody">
                            <tr>
                                <td valign="middle" align="center"><input type="text" value="<?php echo stripslashes((($tmp = @stripslashes($_POST[$_smarty_tpl->tpl_vars['char_id']->value]['name']))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_char']->value->name : $tmp));?>
"  name="name[<?php echo $_smarty_tpl->tpl_vars['get_char']->value->id;?>
]" style="width: 200px;" maxlength="255"/></td>
                                <td valign="middle" align="center">
                                    <select name="char_id[<?php echo $_smarty_tpl->tpl_vars['char_id']->value;?>
]" style="width: 200px;">
                                        <?php
$_from = $_smarty_tpl->tpl_vars['chars']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["char"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["char"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["char"]->value) {
$_smarty_tpl->tpl_vars["char"]->_loop = true;
$foreach_char_Sav = $_smarty_tpl->tpl_vars["char"];
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" <?php if ($_POST[$_smarty_tpl->tpl_vars['char_id']->value]['char_id'] == $_smarty_tpl->tpl_vars['get_char']->value->char_id || $_smarty_tpl->tpl_vars['char']->value->id == $_smarty_tpl->tpl_vars['get_char']->value->char_id) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['char']->value->name);?>
</option>
                                        <?php
$_smarty_tpl->tpl_vars["char"] = $foreach_char_Sav;
}
?>
                                    </select>
                                </td>     
                                <td valign="middle" align="center">
                                    <select name="type[<?php echo $_smarty_tpl->tpl_vars['char_id']->value;?>
]" style="width: 150px;">
                                        <option value="0" <?php if ($_POST[$_smarty_tpl->tpl_vars['char_id']->value]['type'] == '0' || $_smarty_tpl->tpl_vars['get_char']->value->type == '0') {?>selected="selected"<?php }?>>Флажки</option>
                                        <option value="1" <?php if ($_POST[$_smarty_tpl->tpl_vars['char_id']->value]['type'] == 1 || $_smarty_tpl->tpl_vars['get_char']->value->type == 1) {?>selected="selected"<?php }?>>Список</option>
                                        
                                        <option value="3" <?php if ($_POST[$_smarty_tpl->tpl_vars['char_id']->value]['type'] == 3 || $_smarty_tpl->tpl_vars['get_char']->value->type == 3) {?>selected="selected"<?php }?>>Ползунки</option>
                                    </select>
                                </td>     
                                <td valign="middle" align="center"><input type="text" value="<?php echo stripslashes((($tmp = @stripslashes($_POST[$_smarty_tpl->tpl_vars['char_id']->value]['order']))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_char']->value->order : $tmp));?>
" name="order[<?php echo $_smarty_tpl->tpl_vars['char_id']->value;?>
]" style="width: 50px; text-align: center" maxlength="11" /></td>
                                <td valign="middle" align="center">
                                    <select name="sort[<?php echo $_smarty_tpl->tpl_vars['char_id']->value;?>
]" style="width: 150px;">
                                        <option value="0" <?php if ($_POST[$_smarty_tpl->tpl_vars['char_id']->value]['sort'] == '0' || $_smarty_tpl->tpl_vars['get_char']->value->sort == '0') {?>selected="selected"<?php }?>>По сортировке</option>
                                        <option value="1" <?php if ($_POST[$_smarty_tpl->tpl_vars['char_id']->value]['sort'] == 1 || $_smarty_tpl->tpl_vars['get_char']->value->sort == 1) {?>selected="selected"<?php }?>>По алфавиту</option>
                                    </select>
                                </td>     
                                <td valign="middle" align="center">
                                    <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить?')) {
                                                location.href = '?del_id=<?php echo $_smarty_tpl->tpl_vars['get_char']->value->char_id;?>
';}"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/del.png" align="middle" hspace="1" alt="Удалить" /></a>
                                </td>
                            </tr>
                        </tbody>
                    <?php
$_smarty_tpl->tpl_vars["get_char"] = $foreach_get_char_Sav;
}
?>
                    <tfoot>
                        <tr>
                            <td colspan="6" style="text-align: right;">
                                <button name="save_char">Сохранить</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <br/>
            <?php }?>
        </form>

        <form method="post" enctype="multipart/form-data" action="">
            <h1>Добавить параметр в подбор</h1>

            <table cellpadding="4" cellspacing="1" border="0" class="table">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Название:</td>
                        <td valign="middle" align="center">Характеристика:</td>
                        <td valign="middle" align="center">Тип:</td>
                        <td valign="middle" align="center">Сорт.:</td>
                        <td valign="middle" align="center">Сорт. значений:</td>
                        
                        <td valign="middle" align="center">&nbsp;</td>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="center"><input type="text" value=""  name="name" style="width: 200px;" maxlength="255"/></td>
                        <td valign="middle" align="center">
                            <select name="char_id">
                                <?php
$_from = $_smarty_tpl->tpl_vars['chars']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["char"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["char"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["char"]->value) {
$_smarty_tpl->tpl_vars["char"]->_loop = true;
$foreach_char_Sav = $_smarty_tpl->tpl_vars["char"];
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['char']->value->name);?>
</option>
                                <?php
$_smarty_tpl->tpl_vars["char"] = $foreach_char_Sav;
}
?>
                            </select>
                        </td>     
                        <td valign="middle" align="center">
                            <select name="type">
                                <option value="0">Флажки</option>
                                <option value="1">Список</option>
                                
                                <option value="3">Ползунки</option>
                            </select>
                        </td>     
                        <td valign="middle" align="center"><input type="text" value="" name="order" style="width: 50px; text-align: center" maxlength="11" /></td>
                        <td valign="middle" align="center">
                            <input type="hidden" name="is_select" value="0" />
                            <input type="hidden" name="add" value="1" />
                            <button name="add_char">Добавить</button>
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </div>
</div><?php }
}
?>