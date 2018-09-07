<?php /* Smarty version 3.1.24, created on 2015-09-13 16:51:51
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/order/templates/buy_market_info.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:95206803855f57f776307a7_27496677%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef7abc2c8367fde564ba368c1a913fd0cc6452c4' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/order/templates/buy_market_info.tpl',
      1 => 1431261587,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95206803855f57f776307a7_27496677',
  'variables' => 
  array (
    'order' => 0,
    'buy_market_status' => 0,
    'item_buy_market' => 0,
    'current_sub_name' => 0,
    'buy_market_status_name' => 0,
    'status_buy_market' => 0,
    'buy_market_status_arr' => 0,
    'status_arr' => 0,
    'sub_status_arr' => 0,
    'current_status_code' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f57f776d2eb4_42593504',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f57f776d2eb4_42593504')) {
function content_55f57f776d2eb4_42593504 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '95206803855f57f776307a7_27496677';
if ($_smarty_tpl->tpl_vars['order']->value->order_id_buy_market) {?>
    <div class="buy_market" style="line-height: 1.5em;max-width: 361px">
        <h3 style="margin: 7px 0 2px 0; color: black;">Покупка на  маркете</h3>


        <div>№ заказа в маркете: <b><?php echo $_smarty_tpl->tpl_vars['order']->value->order_id_buy_market;?>
</b></div>
        <div id="status_buy_market_<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
">Статус: <b><?php if ($_smarty_tpl->tpl_vars['order']->value->status_buy_market) {
$_from = $_smarty_tpl->tpl_vars['buy_market_status']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item_buy_market"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item_buy_market"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["item_buy_market"]->value) {
$_smarty_tpl->tpl_vars["item_buy_market"]->_loop = true;
$foreach_item_buy_market_Sav = $_smarty_tpl->tpl_vars["item_buy_market"];
if ($_smarty_tpl->tpl_vars['item_buy_market']->value->code == $_smarty_tpl->tpl_vars['order']->value->status_buy_market) {
echo $_smarty_tpl->tpl_vars['item_buy_market']->value->name;?>
 <?php if ($_smarty_tpl->tpl_vars['order']->value->sub_status_buy_market) {
$_smarty_tpl->tpl_vars["current_sub_name"] = new Smarty_Variable($_smarty_tpl->tpl_vars['order']->value->sub_status_buy_market, null, 0);?> (<?php echo $_smarty_tpl->tpl_vars['buy_market_status_name']->value[$_smarty_tpl->tpl_vars['current_sub_name']->value];?>
)<?php }
}
$_smarty_tpl->tpl_vars["item_buy_market"] = $foreach_item_buy_market_Sav;
}
} else { ?><b style="color: red">Получение данных заказа</b><?php }?></b></div>

        <?php $_smarty_tpl->tpl_vars['status_buy_market'] = new Smarty_Variable($_smarty_tpl->tpl_vars['order']->value->status_buy_market, null, 0);?>
        <?php if (count($_smarty_tpl->tpl_vars['buy_market_status_arr']->value[$_smarty_tpl->tpl_vars['status_buy_market']->value])) {?>
            <div id="request_status_id_<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
">
                <form method="post" action="" style="padding-top: 8px" id="request_form_status_id_<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
">
                    <b>Изменить статус:</b><br/>
                    <select style="width: 197px;" name="status_buy_market" onchange="if (this.options[this.selectedIndex].value == 'CANCELLED') {
                                $('#select_substatuses_<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
 :first').attr('selected', 'selected');
                                $('#substatuses_<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
').fadeIn();
                            } else {
                                $('#select_substatuses_<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
 :first').attr('selected', 'selected');
                                $('#substatuses_<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
').fadeOut();
                            }">
                        <option value="0">Выбрать статус</option>
                        <?php
$_from = $_smarty_tpl->tpl_vars['buy_market_status_arr']->value[$_smarty_tpl->tpl_vars['status_buy_market']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['status_arr'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['status_arr']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['status_arr']->value) {
$_smarty_tpl->tpl_vars['status_arr']->_loop = true;
$foreach_status_arr_Sav = $_smarty_tpl->tpl_vars['status_arr'];
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['status_arr']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['buy_market_status_name']->value[$_smarty_tpl->tpl_vars['status_arr']->value];?>
</option>
                        <?php
$_smarty_tpl->tpl_vars['status_arr'] = $foreach_status_arr_Sav;
}
?>
                    </select>
                    <div id="substatuses_<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
" style="display: none;">
                        <select style="width: 197px;margin-top: 3px;" name="sub_status_buy_market" id="select_substatuses_<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
">
                            <option value="0">Выбрать статус</option>
                            <?php
$_from = $_smarty_tpl->tpl_vars['buy_market_status']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['sub_status_arr'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['sub_status_arr']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['sub_status_arr']->value) {
$_smarty_tpl->tpl_vars['sub_status_arr']->_loop = true;
$foreach_sub_status_arr_Sav = $_smarty_tpl->tpl_vars['sub_status_arr'];
?>
                                <?php if ($_smarty_tpl->tpl_vars['sub_status_arr']->value->parent_id == 6) {?>
                                    <?php $_smarty_tpl->tpl_vars["current_status_code"] = new Smarty_Variable($_smarty_tpl->tpl_vars['sub_status_arr']->value->code, null, 0);?>
                                    <?php if ($_smarty_tpl->tpl_vars['sub_status_arr']->value->is_visible_admin == 1) {?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['sub_status_arr']->value->code;?>
"><?php echo $_smarty_tpl->tpl_vars['buy_market_status_name']->value[$_smarty_tpl->tpl_vars['current_status_code']->value];?>
</option>
                                    <?php }?>
                                <?php }?>
                            <?php
$_smarty_tpl->tpl_vars['sub_status_arr'] = $foreach_sub_status_arr_Sav;
}
?>
                        </select>
                    </div>
                    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['order']->value->order_id_buy_market;?>
" name="order_id_buy_market" />
                    <button onclick="setBuyMarketStatus('request_status_id_<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
', 'request_form_status_id_<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
', 'status_buy_market_<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
', '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
sync/buy/market/set/status');
                            return false">ОК</button>
                </form>
            </div>
        <?php }?>
    </div>
<?php }
}
}
?>