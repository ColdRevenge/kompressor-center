<?php /* Smarty version 3.1.24, created on 2015-10-25 15:49:32
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/delivery/templates/service_adress.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:586579019562ccfdc331e54_81830849%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d5f3e92e5d2d347157a3ea38da723cc4b8f6db3' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/delivery/templates/service_adress.tpl',
      1 => 1445776561,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '586579019562ccfdc331e54_81830849',
  'variables' => 
  array (
    'is_mobile' => 0,
    'metro' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_562ccfdc3a9624_79114383',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_562ccfdc3a9624_79114383')) {
function content_562ccfdc3a9624_79114383 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '586579019562ccfdc331e54_81830849';
if ($_smarty_tpl->tpl_vars['is_mobile']->value == 1) {?>
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
                            <?php
$_from = $_smarty_tpl->tpl_vars['metro']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars["item"];
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
"<?php if ($_POST['metro_id'] == $_smarty_tpl->tpl_vars['item']->value->id) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</option>
                            <?php
$_smarty_tpl->tpl_vars["item"] = $foreach_item_Sav;
}
?>
                        </select>
                    </td>
                </tr>

                <?php echo $_smarty_tpl->getSubTemplate ("free_delivery_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

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
                        <?php
$_from = $_smarty_tpl->tpl_vars['metro']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars["item"];
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
"<?php if ($_POST['metro_id'] == $_smarty_tpl->tpl_vars['item']->value->id) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</option>
                        <?php
$_smarty_tpl->tpl_vars["item"] = $foreach_item_Sav;
}
?>
                    </select>
                </td>
            </tr>

            <?php echo $_smarty_tpl->getSubTemplate ("free_delivery_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        </tbody>
    </table>
<?php }
}
}
?>