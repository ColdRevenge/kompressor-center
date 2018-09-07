<?php /* Smarty version 3.1.24, created on 2017-02-01 09:49:40
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/order/templates/orders_list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1233879661589185045eda54_96881996%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9bcb89f64cb014a1f201ad59aeb3a1addc86585' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/order/templates/orders_list.tpl',
      1 => 1485559664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1233879661589185045eda54_96881996',
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'start_date_form' => 0,
    'end_date_form' => 0,
    'status' => 0,
    'status_item' => 0,
    'is_multi_manager' => 0,
    'managers' => 0,
    'manager' => 0,
    'orders' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_589185046b09b5_41863243',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_589185046b09b5_41863243')) {
function content_589185046b09b5_41863243 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1233879661589185045eda54_96881996';
?>
<div class="block">
    <h1>Поиск заказа</h1>
    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>


    <form method="post" action="">

        <table cellpadding="4" cellspacing="1" border="0" class="table" width="930" style="margin: auto">
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">
                        Дата заказа:
                    </td>
                    <td valign="middle" align="left">
                        с <?php echo $_smarty_tpl->tpl_vars['start_date_form']->value;?>
 до <?php echo $_smarty_tpl->tpl_vars['end_date_form']->value;?>

                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">
                        Номер заказа:&nbsp;
                    </td>
                    <td valign="middle" align="left">
                        <input type="text" value="<?php echo $_POST['number'];?>
" name="number" style="width: 92px;"/>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        Статус: 
                        <select name="search_status_id" style="width: 210px;">
                            <option value="-1">Не выбран</option>
                            <?php
$_from = $_smarty_tpl->tpl_vars['status']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["status_item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["status_item"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["status_item"]->value) {
$_smarty_tpl->tpl_vars["status_item"]->_loop = true;
$foreach_status_item_Sav = $_smarty_tpl->tpl_vars["status_item"];
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['status_item']->value->id;?>
" <?php if ($_POST['search_status_id'] == $_smarty_tpl->tpl_vars['status_item']->value->id) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['status_item']->value->name;?>
</option>
                            <?php
$_smarty_tpl->tpl_vars["status_item"] = $foreach_status_item_Sav;
}
?>
                        </select>
                        <?php if ($_smarty_tpl->tpl_vars['is_multi_manager']->value != 0) {?>
                            &nbsp;&nbsp;&nbsp;&nbsp;Менеджер: 
                            <select name="manager_id" style="width: 195px;">
                                <option value="-1">Все менеджеры</option>
                                <option value="0">Не выбран</option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['managers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["manager"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["manager"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["manager"]->value) {
$_smarty_tpl->tpl_vars["manager"]->_loop = true;
$foreach_manager_Sav = $_smarty_tpl->tpl_vars["manager"];
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['manager']->value->id;?>
" <?php if ($_POST['manager_id'] == $_smarty_tpl->tpl_vars['manager']->value->id) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['manager']->value->name);?>
</option>
                                <?php
$_smarty_tpl->tpl_vars["manager"] = $foreach_manager_Sav;
}
?>
                            </select>
                        <?php }?>
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">
                        Название (или ФИО):&nbsp;
                    </td>
                    <td valign="middle" align="left">
                        <input type="text" value="<?php echo $_POST['find'];?>
" name="find" style="width: 525px;"/>
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        <button name="send">Сформировать</button>
                    </td>
                </tr>
            </tbody>
        </table><br/>


    </form>
    <?php if (count($_smarty_tpl->tpl_vars['orders']->value)) {?>
        <div  id="order_list_block">
            <?php echo $_smarty_tpl->getSubTemplate ("order_list_ajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('orders'=>$_smarty_tpl->tpl_vars['orders']->value), 0);
?>

        </div>


    <?php } else { ?>
        <h2>Заказы отсутствуют</h2>
    <?php }?>
</div>
<?php }
}
?>