<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 23:16:31
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/delivery/templates/service_adress.tpl" */ ?>
<?php /*%%SmartyHeaderCode:107982984755d4e41f3d8d24-02588319%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9082c11dee97acebe88e53c191e35aff9178581a' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/delivery/templates/service_adress.tpl',
      1 => 1434201799,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107982984755d4e41f3d8d24-02588319',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_mobile' => 0,
    'metro' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d4e41f464682_83151522',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4e41f464682_83151522')) {function content_55d4e41f464682_83151522($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['is_mobile']->value==1) {?>
    <div style="padding-left: 20px;">
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td valign="middle" align="left">
                        <textarea name="adress" placeholder="Адрес доставки" style="width: 100%; height: 100px"><?php echo $_POST['adress'];?>
</textarea>
                    </td>

                    
                </tr>

                <tr>
                    <td valign="middle" align="left" style="text-align: left">
                        <select class="text" name="metro_id" style="width: 100%;">
                            <option value="">Ближайшее метро</option>
                            <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['metro']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
"<?php if ($_POST['metro_id']==$_smarty_tpl->tpl_vars['item']->value->id) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="left">
                        <label><input type="checkbox" value="1" name="is_look" /> Примерка товара</label>
                    </td>
                </tr>

                <?php echo $_smarty_tpl->getSubTemplate ("free_delivery_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </tbody>
        </table>
    </div>
<?php } else { ?>
    <table class="table_fields">
        <tbody>
            <tr>
                <td valign="top" align="right" style="text-align: right">Адрес доставки: <span class="asterix">*</span></td>

                <td valign="middle" align="left">
                    <input type="text" name="street" value="<?php echo $_POST['street'];?>
" id="street" placeholder="Улица" style="width: 330px;" />
                </td>

                
            </tr>
            <tr>
                <td valign="top" align="right" style="text-align: right"></td>
                <td valign="middle" align="left">
                    <input type="text" name="house" value="<?php echo $_POST['house'];?>
" id="house" placeholder="Дом" style="width: 65px" />
                    <input type="text" name="housing" value="<?php echo $_POST['housing'];?>
"  placeholder="Корпус" style="width: 65px" />
                    <input type="text" name="building" value="<?php echo $_POST['building'];?>
"  placeholder="Строение" style="width: 70px" />
                    <input type="text" name="appartment" value="<?php echo $_POST['appartment'];?>
"  placeholder="Квартира" style="width: 70px" />
                </td>

                
            </tr>

            <tr>
                <td valign="middle" align="right" style="text-align: right">Ближайшее метро: </td>
                <td valign="middle" align="left" style="text-align: left">
                    <select class="text" name="metro_id" style="width: 347px;" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'">
                        <option value="">Выбрать</option>
                        <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['metro']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
"<?php if ($_POST['metro_id']==$_smarty_tpl->tpl_vars['item']->value->id) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td valign="top" align="right" style="text-align: right"></td>
                <td valign="middle" align="left">
                    <div class="check-style">
                        <label><input type="checkbox" value="1" name="is_look" /> <span>&nbsp;</span> <span>Примерка товара</span></label>
                    </div>
                </td>
            </tr>

            <?php echo $_smarty_tpl->getSubTemplate ("free_delivery_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </tbody>
    </table>
<?php }?><?php }} ?>
