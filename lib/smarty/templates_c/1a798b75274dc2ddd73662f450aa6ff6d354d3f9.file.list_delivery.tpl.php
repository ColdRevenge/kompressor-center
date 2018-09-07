<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-21 18:46:34
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/delivery/templates/list_delivery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197355284555d747da8d1b71-77343474%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a798b75274dc2ddd73662f450aa6ff6d354d3f9' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/delivery/templates/list_delivery.tpl',
      1 => 1427628576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197355284555d747da8d1b71-77343474',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'admin_url' => 0,
    'delivery' => 0,
    'deliv' => 0,
    'sys_images_url' => 0,
    'deliv_id' => 0,
    'child' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d747da9c9377_92303861',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d747da9c9377_92303861')) {function content_55d747da9c9377_92303861($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_setting.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="page">
        <h1>Управление доставкой</h1>
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>


        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
delivery/list/" enctype="multipart/form-data">
            <table cellpadding="6" cellspacing="1" border="0" class="table_blue" style="width: 980px">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Название</td>
                        <td valign="middle" align="center">Описание</td>
                        <td valign="middle" align="center">Цена</td>
                        <td valign="middle" align="center" width="110">Сроки <span>(дней)</span></td>
                        <td valign="middle" align="center">Бесплатно<br/>
                            <span>при сумме</span></td>
                        <td valign="middle" align="center">Иконка</td> 
                        <td valign="middle" align="center">Сорт.</td>
                        <td valign="middle" align="center" width="33">&nbsp;</td>
                    </tr>
                </thead>
                <?php  $_smarty_tpl->tpl_vars["deliv"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["deliv"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['delivery']->value[0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["deliv"]->key => $_smarty_tpl->tpl_vars["deliv"]->value) {
$_smarty_tpl->tpl_vars["deliv"]->_loop = true;
?>
                    <?php $_smarty_tpl->tpl_vars["deliv_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['deliv']->value->id, null, 0);?>
                    <tbody>
                        <tr>
                            <td valign="middle" align="center">
                                <input type="text" name="name[<?php echo $_smarty_tpl->tpl_vars['deliv']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['deliv']->value->name;?>
" style="width: 170px; font-size: 13px;" />
                                <input type="hidden" name="parent_id[<?php echo $_smarty_tpl->tpl_vars['deliv']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['deliv']->value->parent_id;?>
" />
                            </td>
                            <td valign="middle" align="center">
                                <textarea name="info[<?php echo $_smarty_tpl->tpl_vars['deliv']->value->id;?>
]" style="width: 180px;height: 80px; font-size: 13px;"><?php echo $_smarty_tpl->tpl_vars['deliv']->value->info;?>
</textarea>
                            </td>
                            <td valign="middle" align="center">
                                <input type="text" name="price[<?php echo $_smarty_tpl->tpl_vars['deliv']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['deliv']->value->price;?>
" style="width: 40px;text-align: center" />
                            </td>
                            <td valign="middle" align="center" class="notice"> от 
                                <input type="text" name="from_day[<?php echo $_smarty_tpl->tpl_vars['deliv']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['deliv']->value->from_day;?>
" style="width: 22px;text-align: center; font-size: 13px;" maxlength="3" />
                                до
                                <input type="text" name="to_day[<?php echo $_smarty_tpl->tpl_vars['deliv']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['deliv']->value->to_day;?>
" style="width: 22px;text-align: center; font-size: 13px;" maxlength="3" />
                            </td>
                            <td valign="middle" align="center">
                                <input type="text" name="free_sum[<?php echo $_smarty_tpl->tpl_vars['deliv']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['deliv']->value->free_sum;?>
" style="width: 40px;text-align: center" />
                            </td>
                            <td valign="middle" align="center">
                                <?php if ($_smarty_tpl->tpl_vars['deliv']->value->icon) {?>
                                    <img src="/images/icons/<?php echo $_smarty_tpl->tpl_vars['deliv']->value->icon;?>
" alt="" style="border: 1px solid #cccccc; max-width: 100px" /><br/>
                                    <a href="?del_icon=<?php echo $_smarty_tpl->tpl_vars['deliv']->value->id;?>
" style="font-size: 13px">Удалить логотип</a>
                                <?php } else { ?>
                                    <input type="file" value="" name="icon_<?php echo $_smarty_tpl->tpl_vars['deliv']->value->id;?>
" />
                                    
                                <?php }?>
                            </td>
                            <td valign="middle" align="center">
                                <input type="text" name="order[<?php echo $_smarty_tpl->tpl_vars['deliv']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['deliv']->value->order;?>
" style="width: 25px;text-align: center;" maxlength="11" />
                            </td>
                            <td valign="middle" align="center">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
delivery/list/add/child/<?php echo $_smarty_tpl->tpl_vars['deliv']->value->id;?>
/?is_modal=1" title="Добавить условие доставки" rel="windows_400"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/add.png" align="middle"  hspace="1" alt="Добавить условие доставки" style="vertical-align: middle" /></a>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
delivery/list/del/<?php echo $_smarty_tpl->tpl_vars['deliv']->value->id;?>
/" onclick="if (!confirm('Вы действительно хотите удалить метод доставки &laquo;<?php echo $_smarty_tpl->tpl_vars['deliv']->value->name;?>
&raquo; ? '))
                                            return false" title="Удалить"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/del.png" alt="" title="Удалить"  style="vertical-align: middle"/></a>
                            </td>
                        </tr>

                        <?php if (isset($_smarty_tpl->tpl_vars['delivery']->value[$_smarty_tpl->tpl_vars['deliv_id']->value])&&count($_smarty_tpl->tpl_vars['delivery']->value[$_smarty_tpl->tpl_vars['deliv_id']->value])) {?>
                            <tr>
                                <td valign="middle" align="right" colspan="7" style="background-color: white;">
                                    <div  style="width: 800px; text-align: left">
                                        <h3>Варианты доставки "<?php echo $_smarty_tpl->tpl_vars['deliv']->value->name;?>
":</h3>
                                        <table cellpadding="6" cellspacing="1" border="0" class="table_blue">

                                            <thead>
                                                <tr>
                                                    <td valign="middle" align="center">Название</td>
                                                    <td valign="middle" align="center">Описание</td>
                                                    <td valign="middle" align="center">Цена</td>
                                                    <td valign="middle" align="center" width="130">Сроки <span>(дней)</span></td>
                                                    <td valign="middle" align="center">Сорт.</td>
                                                    <td valign="middle" align="center">&nbsp;</td>
                                                </tr>
                                            </thead>
                                            <?php  $_smarty_tpl->tpl_vars["child"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["child"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['delivery']->value[$_smarty_tpl->tpl_vars['deliv_id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["child"]->key => $_smarty_tpl->tpl_vars["child"]->value) {
$_smarty_tpl->tpl_vars["child"]->_loop = true;
?>
                                                <tbody>
                                                    <tr>
                                                    <tr>
                                                        <td valign="middle" align="center">
                                                            <input type="text" name="name[<?php echo $_smarty_tpl->tpl_vars['child']->value->id;?>
]" value="<?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['child']->value->name),'"',"&quot;");?>
" style="width: 200px;" />
                                                            <input type="hidden" name="parent_id[<?php echo $_smarty_tpl->tpl_vars['child']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['child']->value->parent_id;?>
" />
                                                        </td>
                                                        <td valign="middle" align="center">
                                                            <textarea name="info[<?php echo $_smarty_tpl->tpl_vars['child']->value->id;?>
]" style="width: 210px;height: 50px"><?php echo stripslashes($_smarty_tpl->tpl_vars['child']->value->info);?>
</textarea>
                                                        </td>
                                                        <td valign="middle" align="center">
                                                            <input type="text" name="price[<?php echo $_smarty_tpl->tpl_vars['child']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['child']->value->price;?>
" style="width: 40px;text-align: center" />
                                                        </td>
                                                        <td valign="middle" align="center"> от 
                                                            <input type="text" name="from_day[<?php echo $_smarty_tpl->tpl_vars['child']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['child']->value->from_day;?>
" style="width: 25px;text-align: center;" maxlength="3" />
                                                            до
                                                            <input type="text" name="to_day[<?php echo $_smarty_tpl->tpl_vars['child']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['child']->value->to_day;?>
" style="width: 25px;text-align: center;" maxlength="3" />
                                                        </td>

                                                        <td valign="middle" align="center">
                                                            <input type="text" name="order[<?php echo $_smarty_tpl->tpl_vars['child']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['child']->value->order;?>
" style="width: 30px;text-align: center;" maxlength="11" />
                                                        </td>
                                                        <td valign="middle" align="center">
                                                            <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
delivery/list/del/<?php echo $_smarty_tpl->tpl_vars['child']->value->id;?>
/" onclick="if (!confirm('Вы действительно хотите удалить метод доставки &laquo;<?php echo $_smarty_tpl->tpl_vars['child']->value->name;?>
&raquo; ? '))
                                                                        return false" title="Удалить"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/del.png" alt="" title="Удалить"  style="vertical-align: middle"/></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            <?php } ?>

                                            <tfoot>
                                                <tr>
                                                    <td valign="middle" align="right" colspan="6">
                                                        <button>Сохранить</button>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                <?php } ?>
                <tbody>
                    <tr>
                        <td valign="middle" align="right" colspan="7">
                            <input type="hidden" name="is_save" value="1" />
                            <button>Сохранить</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <br/>
        <h1>Добавить метод доставки</h1>
        <form method="post"  action="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
delivery/list/" enctype="multipart/form-data">
            <table cellpadding="6" cellspacing="1" border="0" class="table_blue">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Название</td>
                        <td valign="middle" align="center">Стоимость</td>
                        <td valign="middle" align="center">От (дней)</td>
                        <td valign="middle" align="center">До (дней)</td>
                        <td valign="middle" align="center">Иконка</td>
                        <td valign="middle" align="center">Сортировка</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td valign="middle" align="center"><input type="text" name="name" value="" style="width: 250px;" /></td>
                        <td valign="middle" align="center">
                            <input type="text" name="price" value="" style="width: 80px;" />
                            <input type="hidden" name="parent_id" value="0"/>
                        </td>
                        <td valign="middle" align="center">
                            <input type="text" name="from_day" value="" style="width: 40px;text-align: center;" maxlength="3" />
                        </td>
                        <td valign="middle" align="center">
                            <input type="text" name="to_day" value="" style="width: 40px;text-align: center;" maxlength="3" />
                        </td>
                        <td valign="middle" align="center">
                            <input type="file" value="" name="icon" />
                        </td>
                        <td valign="middle" align="center">
                            <input type="text" name="order" value="" style="width: 40px;" maxlength="11" />
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td valign="middle" align="right" colspan="6">
                            <input type="hidden" name="is_add" value="1" />
                            <button>Добавить</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
</div><?php }} ?>
