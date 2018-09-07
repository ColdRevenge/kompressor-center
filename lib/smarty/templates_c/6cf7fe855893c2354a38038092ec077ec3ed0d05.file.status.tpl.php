<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-21 18:46:53
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/setting/templates/status.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155586530855d747ed05af89-59094245%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cf7fe855893c2354a38038092ec077ec3ed0d05' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/setting/templates/status.tpl',
      1 => 1423307975,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155586530855d747ed05af89-59094245',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'status' => 0,
    'item' => 0,
    'admin_url' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d747ed0c65d7_13990780',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d747ed0c65d7_13990780')) {function content_55d747ed0c65d7_13990780($_smarty_tpl) {?><div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_setting.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="page">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

        <h1>Статусы заказов</h1>

        <form method="post" action="">
            <table cellpadding="4" cellspacing="0" border="0" width="510">
                <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['status']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
?>
                    <?php $_smarty_tpl->tpl_vars["status_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value->id, null, 0);?>
                    <tr>
                        <td valign="middle" align="right" width="300"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
" name="status[<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
]" style="width: 300px;" /></td>
                        <td valign="middle" align="right" width="100"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->order;?>
" name="order[<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
]" style="width: 100px;" /></td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value->id>0&&$_smarty_tpl->tpl_vars['item']->value->action!=1) {?>
                                <a href="javascript:void(0)" title="Удалить товар" onclick="setConfirm('Вы действительно хотите удалить раздел??', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
setting/status/del/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
/');">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/sys/admin/del.png" align="middle" hspace="1" alt="Удалить раздел"></a>
                                <?php }?>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        <button>Сохранить</button>
                    </td>
                    <td>&nbsp;</td>
                </tr>
            </table>
            <input type="hidden" name="is_edit" value="1" />
        </form>
        <br/><br/> 
        <h2>Добавить статус</h2>

        <form method="post" action="">
            <table cellpadding="4" cellspacing="0" border="0" width="510">
                <tr>
                    <td valign="middle" align="right" width="300"><input type="text" value="" name="status" placeholder="Название статуса" style="width: 300px;" /></td>
                    <td valign="middle" align="right" width="100"><input type="text" value="" name="order" placeholder="Сорт." style="width: 100px;" /></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        <button>Добавить</button>
                    </td>
                    <td>&nbsp;</td>
                </tr>
            </table>
            <input type="hidden" name="is_add" value="1" />
        </form>
    </div>
</div><?php }} ?>
