<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 23:53:52
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/delivery/templates/service_metro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:98915277855d4ece05bae48-09512101%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ff828dc463a9eafa46d017f2ddb13b0f6f7cbe5' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/delivery/templates/service_metro.tpl',
      1 => 1434202102,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '98915277855d4ece05bae48-09512101',
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
  'unifunc' => 'content_55d4ece061d6f3_82947609',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4ece061d6f3_82947609')) {function content_55d4ece061d6f3_82947609($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['is_mobile']->value==1) {?>
    <div style="padding-left: 20px;">
        <table style="width: 100%;">
            <tbody>
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
                <?php echo $_smarty_tpl->getSubTemplate ("free_delivery_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </tbody>
        </table>
    </div>
<?php } else { ?>
    <table class="table_fields">
        <tbody>
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
            <?php echo $_smarty_tpl->getSubTemplate ("free_delivery_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </tbody>
    </table>
<?php }?><?php }} ?>
