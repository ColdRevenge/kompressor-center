<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 17:08:26
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/discount/templates/discount.tpl" */ ?>
<?php /*%%SmartyHeaderCode:96840716255d5df5a9704b3-08792560%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1462ecf7f285827f199f368014d8686c121099b2' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/discount/templates/discount.tpl',
      1 => 1439726728,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96840716255d5df5a9704b3-08792560',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'MyURL' => 0,
    'discounts' => 0,
    'discount' => 0,
    'admin_url' => 0,
    'sys_images_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d5df5aa07123_64652783',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d5df5aa07123_64652783')) {function content_55d5df5aa07123_64652783($_smarty_tpl) {?>
<div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_discount.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="page">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

        <h1>Скидки</h1>
        <form method="post" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
">
            <table cellpadding="5" cellspacing="1" border="0" class="table">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Сумма заказа: </td>
                        <td valign="middle" align="center">Скидка (%): </td>
                        <td valign="middle" align="center">Накопительная: 
                            <div class="notice">(только зарегистрированым)</div></td>
                        <td valign="middle" align="center">Для раздела: </td>
                        <td valign="middle" align="center">Для производителя: </td>
                        <td valign="middle" align="center">&nbsp;</td>
                    </tr>
                </thead>

                <?php  $_smarty_tpl->tpl_vars['discount'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['discount']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['discounts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['discount']->key => $_smarty_tpl->tpl_vars['discount']->value) {
$_smarty_tpl->tpl_vars['discount']->_loop = true;
?>
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="center">от <input type="text" name="sum_start[<?php echo $_smarty_tpl->tpl_vars['discount']->value->id;?>
]" <?php if ($_smarty_tpl->tpl_vars['discount']->value->is_discount_object==1) {?> disabled="disabled" value="0"<?php } else { ?> value="<?php echo $_smarty_tpl->tpl_vars['discount']->value->sum_start;?>
"<?php }?> style="width: 70px; text-align: center; margin: 0px 5px; " maxlength="11" /> до
                                <input type="text" name="sum_end[<?php echo $_smarty_tpl->tpl_vars['discount']->value->id;?>
]" <?php if ($_smarty_tpl->tpl_vars['discount']->value->is_discount_object==1) {?> disabled="disabled" value="0"<?php } else { ?> value="<?php echo $_smarty_tpl->tpl_vars['discount']->value->sum_end;?>
"<?php }?> style="width: 70px; text-align: center;margin: 0px 5px;" maxlength="11" /></td>
                            <td valign="middle" align="center"><input type="text" name="discount[<?php echo $_smarty_tpl->tpl_vars['discount']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['discount']->value->discount;?>
"  style="width: 100px; text-align: center;" maxlength="11" /></td>
                            <td valign="middle" align="center">
                                <label class="p-check"><input type="checkbox" name="is_auth[<?php echo $_smarty_tpl->tpl_vars['discount']->value->id;?>
]" <?php if ($_smarty_tpl->tpl_vars['discount']->value->is_discount_object==1) {?> disabled="disabled"<?php } else {
if ($_smarty_tpl->tpl_vars['discount']->value->is_auth==1) {?>checked="checked"<?php }
}?> value="1" /><em>&nbsp;</em><span></span></label>
                            </td>
                            <td valign="middle" align="center">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
discount/category/list/<?php echo $_smarty_tpl->tpl_vars['discount']->value->id;?>
/?is_modal=1" rel="windows_400">Добавить</a>
                            </td> 
                            <td valign="middle" align="center">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
discount/brand/list/<?php echo $_smarty_tpl->tpl_vars['discount']->value->id;?>
/?is_modal=1" rel="windows_400">Добавить</a>
                            </td>
                            <td valign="middle" align="center">
                                <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить скидку в `<?php echo $_smarty_tpl->tpl_vars['discount']->value->discount;?>
%`?', '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
3/<?php echo $_smarty_tpl->tpl_vars['discount']->value->id;?>
/');"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/del.png" align="middle" hspace="1" title="Удалить" alt="Удалить" /></a>
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
                    </tbody>
            </table>
            <br/>
            <h1>Добавить скидку</h1>
            <table cellpadding="4" cellspacing="1" border="0" class="table">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Сумма заказа: </td>
                        <td valign="middle" align="center">Скидка (%): </td>
                        <td valign="middle" align="center">Накопительная: 
                            <div class="notice">(только зарегистрированым)</div></td>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="center">от <input type="text" name="add_sum_start"   style="width: 70px; text-align: center; margin: 0px 5px; " maxlength="11" /> до
                            <input type="text" name="add_sum_end"  style="width: 70px; text-align: center;margin: 0px 5px;" maxlength="11" /></td>

                        <td valign="middle" align="center"><input type="text" value="" name="add_discount" style="width: 50px; text-align: center" maxlength="11" /></td>
                        <td valign="middle" align="center"><input type="checkbox" name="add_is_auth" value="1" /></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td valign="middle" align="right" colspan="3">
                            <button>Добавить</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
</div><?php }} ?>
