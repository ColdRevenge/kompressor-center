<?php /* Smarty version 3.1.24, created on 2018-07-02 11:44:15
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/characteristics/templates/list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1109998225b39e5df616dc8_90196939%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e151593d1f3131b1d106c62a641d571e204da31e' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/characteristics/templates/list.tpl',
      1 => 1530509452,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1109998225b39e5df616dc8_90196939',
  'variables' => 
  array (
    'param_tpl' => 0,
    'url' => 0,
    'category_tree_list_0' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'characteristics' => 0,
    'MyURL' => 0,
    'characteristic' => 0,
    'admin_url' => 0,
    'get_catalog' => 0,
    'sys_images_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39e5df72ec26_26420026',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39e5df72ec26_26420026')) {
function content_5b39e5df72ec26_26420026 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1109998225b39e5df616dc8_90196939';
?>
<div class="block">
    

    <div class="menu">
        <h1>Видимость:</h1>
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
            <tbody class="<?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['category_id'] == 0) {?>tbody_hover <?php }?>tbody">
                <tr>
                    <td align="left" valign="middle" style="cursor: pointer;" title="Открыть" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
xadmin/characteristics/list/0/0/'">
                        <div style="margin-left:0px;"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
xadmin/characteristics/list/0/0/" <?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['category_id'] == 0) {?>style="font-weight:bold;"<?php }?>>Везде</a></div>
                    </td>
                </tr>
            </tbody>
            <?php echo $_smarty_tpl->tpl_vars['category_tree_list_0']->value;?>

        </table>
    </div>
    <div class="page">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>


        <h1>Характеристики товара</h1>
        <?php if (count($_smarty_tpl->tpl_vars['characteristics']->value)) {?>
            <form method="post" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/0/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['category_id'];?>
/2/">
                <table cellpadding="5" cellspacing="1" border="0" class="table">
                    <thead>
                        <tr>
                            <td valign="middle" align="center">Название характеристики:</td>

                            <td valign="middle" align="center">Сортировка: </td>
                            <td valign="middle" align="center">Видимость: </td>

                            
                            <td valign="middle" align="center">&nbsp;</td>
                        </tr>
                    </thead>

                    <?php
$_from = $_smarty_tpl->tpl_vars['characteristics']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['characteristic'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['characteristic']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['characteristic']->value) {
$_smarty_tpl->tpl_vars['characteristic']->_loop = true;
$foreach_characteristic_Sav = $_smarty_tpl->tpl_vars['characteristic'];
?>
                        <tbody class="tbody">
                            <tr>

                                <td valign="middle" align="left"><input type="text" name="name[<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
]" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['characteristic']->value->name);?>
"  style="width: 250px;" maxlength="255" id="name_<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
"/><a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
value/list/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['param_tpl']->value['category_id'])===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
/" style="margin-left: 10px;">(значений <?php echo $_smarty_tpl->tpl_vars['characteristic']->value->count;?>
)</a></td>
                                <td valign="middle" align="left" style="display: none"><input type="text" name="pseudo_dir[<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
]" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['characteristic']->value->pseudo_dir);?>
"  style="width: 150px;" maxlength="255" id="pseudo_dir_<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
" /><button onclick="AjaxRequestAsync('pseudo_dir_<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
characteristics/pseudo_dir/?name=' + $('#name_<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
').val());
                                        return false;">UP</button></td>
                                <td valign="middle" align="center"><input type="text" name="order[<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->order;?>
"  style="width: 50px; text-align: center" maxlength="11" /></td>
                                <td valign="middle" align="center">
                                    <select name="category_id[<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
]" style="width: 200px;">
                                        <option value="0">Везде</option>
                                        <?php echo $_smarty_tpl->getSubTemplate ("tree_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('tree'=>$_smarty_tpl->tpl_vars['get_catalog']->value,'id'=>0,'level'=>1,'offset'=>3,'char_category_id'=>$_smarty_tpl->tpl_vars['characteristic']->value->category_id,'limit'=>3), 0);
?>

                                    </select>
                                </td>
                                <td valign="middle" align="center" style="display: none">
                                    <?php if ($_smarty_tpl->tpl_vars['characteristic']->value->icon) {?>
                                        <img src="/images/icons/<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->icon;?>
" alt="" /><br/>
                                        <a href="?del_icon=<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
">Удалить логотип</a>
                                    <?php } else { ?>
                                        <input type="file" value="" name="icon_<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
" id="icon_<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
" class="icon-char" />
                                        <button value="<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
" name="load_img_id[<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
]" onclick="$('.icon-char').attr('disabled', 'disabled'); $('#icon_<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
').removeAttr('disabled');">Загрузить</button>
                                    <?php }?>
                                </td>
                                
                                
                                <td valign="middle" align="center">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
value/list/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['param_tpl']->value['category_id'])===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
/"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/add.png" align="middle" hspace="1" alt="Добавить значение" title="Добавить значение" /></a>
                                    <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить `<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->name;?>
`??', '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/0/<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->category_id;?>
/3/<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
/');"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/del.png" align="middle" hspace="1" title="Удалить характиристику" alt="Удалить характиристику" /></a>
                                </td>
                            </tr>
                        </tbody>
                    <?php
$_smarty_tpl->tpl_vars['characteristic'] = $foreach_characteristic_Sav;
}
?>
                    <tfoot>
                        <tr>
                            <td valign="middle" align="right" colspan="5">
                                <input type="hidden" name="save" value="1" />
                                <button name="submit">Сохранить</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>
        <?php } else { ?>
            <h2>Нет ни одной характеристики</h2>
        <?php }?>
        <br/>
        <h1>Добавить характиристику</h1>
        <form method="post" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
add/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['category_id'];?>
/">

            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['category_id'];?>
" name="category_id" />
            <table cellpadding="4" cellspacing="1" border="0" class="table" style="width: 510px;">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Название:</td>
                        <td valign="middle" align="center">Сортировка: </td>
                        
                        <td valign="middle" align="center">&nbsp;</td>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="center"><input type="text" value=""  name="name" style="width: 300px;" maxlength="255"/></td>
                        <td valign="middle" align="center"><input type="text" value="<?php echo (($tmp = @$_POST['order'])===null||$tmp==='' ? 0 : $tmp);?>
" name="order" style="width: 50px; text-align: center" maxlength="11" /></td>
                            

                        <td valign="middle" align="center">

                            <?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['edit_id']) {?><button name="submit">Сохранить</button><?php } else { ?><button name="submit">Добавить</button><?php }?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div> <?php }
}
?>