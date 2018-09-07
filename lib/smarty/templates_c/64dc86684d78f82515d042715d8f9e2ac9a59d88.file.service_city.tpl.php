<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-24 17:49:26
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/delivery/templates/service_city.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120038605155db2ef6814659-65692641%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64dc86684d78f82515d042715d8f9e2ac9a59d88' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/delivery/templates/service_city.tpl',
      1 => 1434201902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120038605155db2ef6814659-65692641',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_mobile' => 0,
    'get_user' => 0,
    'metro' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55db2ef68b6015_26863958',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55db2ef68b6015_26863958')) {function content_55db2ef68b6015_26863958($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['is_mobile']->value==1) {?>
    <div style="padding-left: 20px;">
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="city"  id="city" value="<?php echo stripslashes((($tmp = @$_POST['city'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->city : $tmp));?>
" class="text"   maxlength="255" style="width: 100%" placeholder="Город"/> 
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="left">
                        <textarea name="adress" placeholder="Адрес, по которому будет производиться доставка" style="width: 100%; height: 100px"><?php echo $_POST['adress'];?>
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
                <td valign="middle" align="left" style="text-align: left">
                    
                    <input type="text" size="30" name="city"  id="city" value="<?php echo stripslashes((($tmp = @$_POST['city'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->city : $tmp));?>
" class="text"   maxlength="255" style="width: 150px" placeholder="Город"/> 
                    <input type="text" name="street" value="<?php echo $_POST['street'];?>
" id="street" placeholder="Улица" style="width: 160px;" />
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
                    <select class="text" name="metro_id" style="width: 347px;"  onblur = "this.className = 'text'">
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
