<?php /* Smarty version 3.1.24, created on 2018-07-02 10:52:19
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/delivery/templates/service_adress.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3268157075b39d9b3b24f19_07873760%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c6d082c55643feca3a741b6f5a068111a27ce4d' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/delivery/templates/service_adress.tpl',
      1 => 1530509462,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3268157075b39d9b3b24f19_07873760',
  'variables' => 
  array (
    'metro' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39d9b3bb48c2_17003214',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39d9b3bb48c2_17003214')) {
function content_5b39d9b3bb48c2_17003214 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3268157075b39d9b3b24f19_07873760';
?>
<table class="table_fields">
    <tbody>
        <tr>
            <td valign="top" align="right" style="text-align: right; padding-top: 8px;"><label class="form-label">Адрес доставки: <span class="asterix">*</span></label></td>

            <td valign="middle" align="left">
                <input type="text" name="street" class="form-control" value="<?php echo $_POST['street'];?>
" id="street" placeholder="Улица" style="width: 330px;" />
            </td>

        </tr>
        <tr>
            <td valign="top" align="right" style="text-align: right"></td>
            <td valign="middle" align="left" style="padding-bottom: 10px;">
                <input type="text" class="form-control -small" name="house" value="<?php echo $_POST['house'];?>
" id="house" placeholder="Дом" style="width: 77px" />
                <input type="text" class="form-control -small" name="housing" value="<?php echo $_POST['housing'];?>
"  placeholder="Корпус" style="width: 77px" />
                <input type="text" class="form-control -small" name="building" value="<?php echo $_POST['building'];?>
"  placeholder="Строение" style="width: 82px" />
                <input type="text" class="form-control -small" name="appartment" value="<?php echo $_POST['appartment'];?>
"  placeholder="Квартира" style="width: 82px" />
            </td>
        </tr>

        <tr>
            <td valign="middle" align="right" style="text-align: right;"><label class="form-label">Ближайшее метро: </label></td>
            <td valign="middle" align="left" style="text-align: left">
                <select class="form-control" name="metro_id" style="width: 330px;">
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
</table><?php }
}
?>