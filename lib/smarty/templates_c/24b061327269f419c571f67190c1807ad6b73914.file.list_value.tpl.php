<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-22 18:59:43
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/characteristics/templates/list_value.tpl" */ ?>
<?php /*%%SmartyHeaderCode:57932534955d5e907f12599-13134396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24b061327269f419c571f67190c1807ad6b73914' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/characteristics/templates/list_value.tpl',
      1 => 1440259182,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57932534955d5e907f12599-13134396',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d5e9081ea5b6_61842203',
  'variables' => 
  array (
    'characteristic' => 0,
    'param_tpl' => 0,
    'url' => 0,
    'category_tree_list_0' => 0,
    'admin_url' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'characteristics' => 0,
    'shop' => 0,
    'MyURL' => 0,
    'c_id' => 0,
    'all_characteristic' => 0,
    'all_char' => 0,
    'all_char_id' => 0,
    'all_char_values' => 0,
    'all_value' => 0,
    'char_id' => 0,
    'sys_images_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d5e9081ea5b6_61842203')) {function content_55d5e9081ea5b6_61842203($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><div class="block">

    <?php $_smarty_tpl->tpl_vars["char_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['characteristic']->value->id, null, 0);?>
    <div class="menu">
        <h1>Видимость:</h1>
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
            <tbody class="<?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['category_id']==0) {?>tbody_hover <?php }?>tbody">
                <tr>
                    <td align="left" valign="middle" style="cursor: pointer;" title="Открыть" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
xadmin/characteristics/list/0/0/'">
                        <div style="margin-left:0px;"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
xadmin/characteristics/list/0/0/" <?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['category_id']==0) {?>style="font-weight:bold;"<?php }?>>Везде</a></div>
                    </td>
                </tr>
            </tbody>
            <?php echo $_smarty_tpl->tpl_vars['category_tree_list_0']->value;?>

        </table>
    </div>
    <div class="page">

        <div id="breadcrumbs">
            <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
characteristics/list/0/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['category_id'];?>
/">Характеристики товара</a>  &raquo; <span>Значение для характеристики &laquo;<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->name;?>
&raquo;</span>
        </div>

        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

        <h1>Значение для характеристики &laquo;<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->name;?>
&raquo;</h1>
        <?php if (count($_smarty_tpl->tpl_vars['characteristics']->value)>0) {?>
            <?php $_smarty_tpl->tpl_vars["c_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['characteristic']->value->id, null, 0);?>
            <?php if (($_smarty_tpl->tpl_vars['param_tpl']->value['id']!=63&&$_smarty_tpl->tpl_vars['shop']->value=='platok')||($_smarty_tpl->tpl_vars['param_tpl']->value['id']!=73&&$_smarty_tpl->tpl_vars['shop']->value=='sumka')||($_smarty_tpl->tpl_vars['param_tpl']->value['id']!=117&&$_smarty_tpl->tpl_vars['shop']->value=='woman')||($_smarty_tpl->tpl_vars['param_tpl']->value['id']!=55&&$_smarty_tpl->tpl_vars['shop']->value=='lady')||$_smarty_tpl->tpl_vars['param_tpl']->value['id']!=2) {?><form method="post" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
value/list/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['category_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
/1/"><?php }?>
                <input type="hidden" name="characteristic_id" value="<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
" />
                <table cellpadding="5" cellspacing="1" border="0" class="table" >
                    <thead>
                        <tr>
                            <td valign="middle" align="center">Название значения:</td>
                            <td valign="middle" align="center">ЧПУ: </td>
                            <td valign="middle" align="center">Сортировка:</td>
                            <td valign="middle" align="center">Ед. изм.:</td>
                            <td valign="middle" align="center">№:</td>
                            <td valign="middle" align="center">В название</td>
                            <td valign="middle" align="center">Эквивалент: </td>
                            <?php if (($_smarty_tpl->tpl_vars['param_tpl']->value['id']==5&&$_smarty_tpl->tpl_vars['shop']->value=='lady')||$_smarty_tpl->tpl_vars['param_tpl']->value['id']==2) {?>    <td valign="middle" align="center">Логотип: </td><?php }?>
                            
                            <td valign="middle" align="center">&nbsp;</td>
                        </tr>
                    </thead>

                    <?php  $_smarty_tpl->tpl_vars['characteristic'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['characteristic']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['characteristics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['characteristic']->key => $_smarty_tpl->tpl_vars['characteristic']->value) {
$_smarty_tpl->tpl_vars['characteristic']->_loop = true;
?>
                        <tbody class="tbody">
                            <tr>
                                <td valign="middle" align="center">

                                    <?php if (($_smarty_tpl->tpl_vars['param_tpl']->value['id']==63&&$_smarty_tpl->tpl_vars['shop']->value=='platok')||($_smarty_tpl->tpl_vars['param_tpl']->value['id']==73&&$_smarty_tpl->tpl_vars['shop']->value=='sumka')||($_smarty_tpl->tpl_vars['param_tpl']->value['id']==117&&$_smarty_tpl->tpl_vars['shop']->value=='woman')||($_smarty_tpl->tpl_vars['param_tpl']->value['id']==55&&$_smarty_tpl->tpl_vars['shop']->value=='lady')||$_smarty_tpl->tpl_vars['param_tpl']->value['id']==2) {?>
                                        <form method="post" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
value/list/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['category_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['c_id']->value;?>
/1/"><?php }?>
                                            <input type="text" name="name[<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
]" value="<?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['characteristic']->value->name),'"',"&quot;");?>
"  style="width: 300px;" maxlength="255"  id="name_<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
"/></td>
                                    <td valign="middle" align="left"><input type="text" name="pseudo_dir[<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
]" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['characteristic']->value->pseudo_dir);?>
"  style="width: 150px;" maxlength="255"  id="pseudo_dir_<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
" /><button onclick="AjaxRequestAsync('pseudo_dir_<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
characteristics/pseudo_dir/?name=' + $('#name_<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
').val());
                                            return false;">UP</button></td>
                                    <td valign="middle" align="center">
                                        <input type="text" name="order[<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->order;?>
"  style="width: 50px; text-align: center" maxlength="11" />
                                        <?php if (($_smarty_tpl->tpl_vars['param_tpl']->value['id']==73&&$_smarty_tpl->tpl_vars['shop']->value=='sumka')||($_smarty_tpl->tpl_vars['param_tpl']->value['id']==5&&$_smarty_tpl->tpl_vars['shop']->value=='lady')||$_smarty_tpl->tpl_vars['param_tpl']->value['id']==2) {?>

                                            <input type="hidden" name="save" value="1" />
                                            <button name="submit">Сохранить</button>
                                        <?php }?>
                                    </td>
                                    <td valign="middle" align="center"><input type="text" name="unit[<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->unit;?>
"  style="width: 50px; text-align: center" maxlength="11" /></td>
                                        
                                    <td valign="middle" align="center"><div class="notice"><?php echo stripslashes($_smarty_tpl->tpl_vars['characteristic']->value->id);?>
</div></td>
                                    <td valign="middle" align="center"><label class="p-check"><input type="checkbox" value="1" name="is_param_1[<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
]" <?php if ($_smarty_tpl->tpl_vars['characteristic']->value->is_param_1) {?> checked="checked"<?php }?> /><em>&nbsp;</em></label></td>

                                    <td valign="middle" align="center">
                                        <?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['id']!=59) {?>
                                        <select name="is_param_2[<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
]">
                                            <option value="0">Не выбрано</option>
                                            <?php  $_smarty_tpl->tpl_vars["all_char"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["all_char"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['all_characteristic']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["all_char"]->key => $_smarty_tpl->tpl_vars["all_char"]->value) {
$_smarty_tpl->tpl_vars["all_char"]->_loop = true;
?>
                                                <?php $_smarty_tpl->tpl_vars["all_char_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['all_char']->value->id, null, 0);?>
                                                <optgroup label="<?php echo stripslashes($_smarty_tpl->tpl_vars['all_char']->value->name);?>
">
                                                    <?php  $_smarty_tpl->tpl_vars["all_value"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["all_value"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['all_char_values']->value[$_smarty_tpl->tpl_vars['all_char_id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["all_value"]->key => $_smarty_tpl->tpl_vars["all_value"]->value) {
$_smarty_tpl->tpl_vars["all_value"]->_loop = true;
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['all_value']->value->id;?>
"<?php if ($_smarty_tpl->tpl_vars['all_value']->value->id==$_smarty_tpl->tpl_vars['characteristic']->value->is_param_2) {?> selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['all_value']->value->name);?>
</option>
                                                    <?php } ?>
                                                </optgroup>
                                            <?php } ?>
                                        </select>
                                        <?php }?>
                                        <?php if (($_smarty_tpl->tpl_vars['param_tpl']->value['id']==63&&$_smarty_tpl->tpl_vars['shop']->value=='platok')||($_smarty_tpl->tpl_vars['param_tpl']->value['id']==73&&$_smarty_tpl->tpl_vars['shop']->value=='sumka')||($_smarty_tpl->tpl_vars['param_tpl']->value['id']==117&&$_smarty_tpl->tpl_vars['shop']->value=='woman')||($_smarty_tpl->tpl_vars['param_tpl']->value['id']==55&&$_smarty_tpl->tpl_vars['shop']->value=='lady')||$_smarty_tpl->tpl_vars['param_tpl']->value['id']==2) {?>

                                            </form>
                                        <?php }?>
                                    </td>
                                    <?php if (($_smarty_tpl->tpl_vars['param_tpl']->value['id']==63&&$_smarty_tpl->tpl_vars['shop']->value=='platok')||($_smarty_tpl->tpl_vars['param_tpl']->value['id']==73&&$_smarty_tpl->tpl_vars['shop']->value=='sumka')||($_smarty_tpl->tpl_vars['param_tpl']->value['id']==117&&$_smarty_tpl->tpl_vars['shop']->value=='woman')||($_smarty_tpl->tpl_vars['param_tpl']->value['id']==55&&$_smarty_tpl->tpl_vars['shop']->value=='lady')||$_smarty_tpl->tpl_vars['param_tpl']->value['id']==2) {?>
                                        <td valign="middle" align="center">
                                            <form method="post" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
value/list/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['category_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['char_id']->value;?>
/1/">
                                                <?php if ($_smarty_tpl->tpl_vars['characteristic']->value->icon) {?>
                                                    <img src="/images/icons/<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->icon;?>
" alt="" /><br/>
                                                    <a href="?del_icon=<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
">Удалить логотип</a>
                                                <?php } else { ?>
                                                    <input type="file" value="" name="icon_<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
" />
                                                    <button value="<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
" name="load_img_id[<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
]">Загрузить</button>
                                                <?php }?>
                                            </form>
                                        </td>
                                    <?php }?>
                                    <td valign="middle" align="center">
                                        <input type="hidden" name="is_select[<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->is_select;?>
" />
                                        <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить `<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->name;?>
`??', '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
value/list/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['category_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->characteristic_id;?>
/3/<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
/');"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/del.png" align="middle" hspace="1" title="Удалить характиристику" alt="Удалить характиристику" /></a>
                                    </td>
                                </tr>
                            </tbody>
                            <?php } ?>
                                <?php if (($_smarty_tpl->tpl_vars['param_tpl']->value['id']!=63&&$_smarty_tpl->tpl_vars['shop']->value=='platok')||($_smarty_tpl->tpl_vars['param_tpl']->value['id']!=73&&$_smarty_tpl->tpl_vars['shop']->value=='sumka')||($_smarty_tpl->tpl_vars['param_tpl']->value['id']!=117&&$_smarty_tpl->tpl_vars['shop']->value=='woman')||($_smarty_tpl->tpl_vars['param_tpl']->value['id']!=55&&$_smarty_tpl->tpl_vars['shop']->value=='lady')||$_smarty_tpl->tpl_vars['param_tpl']->value['id']!=2) {?>
                                    <tbody class="tbody">
                                        <tr>
                                            <td valign="middle" align="right" colspan="7">
                                                <input type="hidden" name="save" value="1" />
                                                <button name="submit">Сохранить</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php }?>
                            </table>
                            <?php if (($_smarty_tpl->tpl_vars['param_tpl']->value['id']!=63&&$_smarty_tpl->tpl_vars['shop']->value=='platok')||($_smarty_tpl->tpl_vars['param_tpl']->value['id']!=73&&$_smarty_tpl->tpl_vars['shop']->value=='sumka')||($_smarty_tpl->tpl_vars['param_tpl']->value['id']!=117&&$_smarty_tpl->tpl_vars['shop']->value=='woman')||($_smarty_tpl->tpl_vars['param_tpl']->value['id']!=55&&$_smarty_tpl->tpl_vars['shop']->value=='lady')||$_smarty_tpl->tpl_vars['param_tpl']->value['id']!=2) {?>        </form><?php }?>
                            <?php }?>
                            <br/>
                            <h1>Добавить характиристику</h1>
                            <form method="post" enctype="multipart/form-data" action="">
                                <table cellpadding="4" cellspacing="1" border="0" class="table">
                                    <thead>
                                        <tr>
                                            <td valign="middle" align="center">Название:</td>
                                            <td valign="middle" align="center">Сортировка:</td>
                                            <td valign="middle" align="center">Ед. изм.:</td>
                                            
                                            <td valign="middle" align="center">&nbsp;</td>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr>
                                            <td valign="middle" align="center"><input type="text" value=""  name="add_name" style="width: 300px;" maxlength="255"/></td>
                                            <td valign="middle" align="center"><input type="text" value="<?php echo (($tmp = @$_POST['order'])===null||$tmp==='' ? 0 : $tmp);?>
" name="add_order" style="width: 50px; text-align: center" maxlength="11" /></td>
                                            <td valign="middle" align="center"><input type="text" value="" name="unit" maxlength="255" style="width: 50px; text-align: center"  /></td>
                                                
                                            <td valign="middle" align="center">
                                                <input type="hidden" name="is_select" value="0" />
                                                <input type="hidden" name="add" value="1" />
                                                <button name="submit">Добавить</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div><?php }} ?>
