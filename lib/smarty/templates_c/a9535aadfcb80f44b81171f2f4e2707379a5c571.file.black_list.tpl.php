<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 15:41:33
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/order/templates/black_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:437147555d4797d6edfc5-96678237%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9535aadfcb80f44b81171f2f4e2707379a5c571' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/order/templates/black_list.tpl',
      1 => 1437843666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '437147555d4797d6edfc5-96678237',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'sys_images_url' => 0,
    'admin_url' => 0,
    'get_black_list' => 0,
    'black_list' => 0,
    'black' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d4797d78aa81_09736736',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4797d78aa81_09736736')) {function content_55d4797d78aa81_09736736($_smarty_tpl) {?>
<div class="block">

    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

    <h1>Черный список</h1>

    <div class="small-navigation">
        <div>
            <img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/add.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
order/black-list/list/?is_add=1" title="Добавить в черный список" >Добавить  в черный список</a>
        </div>
    </div>

    <?php if ($_GET['edit_id']||$_GET['is_add']=='1') {?>
        <form method="post" action="">
            <table cellpadding="4" cellspacing="1" border="0" class="table">
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right">ФИО: </td>
                        <td valign="middle" align="left">
                            <input type="text" value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['get_black_list']->value->fio));?>
"  name="fio" style="width: 340px;" />
                        </td>
                    </tr>
                </tbody>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right">Телефон: </td>
                        <td valign="middle" align="left"><input type="text"  value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['get_black_list']->value->phone));?>
" name="phone" style="width: 340px;" /></td>
                    </tr>
                </tbody>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right">E-Mail: </td>
                        <td valign="middle" align="left"><input type="text"  value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['get_black_list']->value->email));?>
" name="email" style="width: 340px;" /></td>
                    </tr>
                </tbody>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right">Комментарий: </td>
                        <td valign="middle" align="left"><textarea name="comment" style="width: 600px;height: 150px;"><?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['get_black_list']->value->comment));?>
</textarea></td>
                    </tr>
                </tbody>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right" colspan="2">
                            <button><?php if ($_GET['is_add']=='1') {?>Добавить<?php } else { ?>Сохранить<?php }?></button>
                        </td>
                    </tr>
                </tbody>
            </table><br/>
            <div class="notice">
                <span class="asterix">*</span> Покупатели блокируются по телефону/e-mail. Если поступит заказ от заблокированного клиента, менеджер увидит это, и сможет 
                принять решение о продаже товара
            </div>
        </form><br/><br/>
    <?php }?>
    <table cellpadding="4" cellspacing="1" border="0" class="table" width="100%">
        <thead>
            <tr>
                <td valign="middle" align="center">ФИО</td>
                <td valign="middle" align="center">Телефон</td>
                <td valign="middle" align="center">E-mail</td>
                <td valign="middle" align="center">Комментарий</td>
                <td valign="middle" align="center" width="47">&nbsp;</td>
            </tr>
        </thead>
        <?php  $_smarty_tpl->tpl_vars["black"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["black"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['black_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["black"]->key => $_smarty_tpl->tpl_vars["black"]->value) {
$_smarty_tpl->tpl_vars["black"]->_loop = true;
?>
            <tbody>
                <tr> 
                    <td valign="middle" align="center"><?php echo stripslashes($_smarty_tpl->tpl_vars['black']->value->fio);?>
</td>
                    <td valign="middle" align="center"><?php echo stripslashes($_smarty_tpl->tpl_vars['black']->value->phone);?>
</td>
                    <td valign="middle" align="center"><?php echo stripslashes($_smarty_tpl->tpl_vars['black']->value->email);?>
</td>
                    <td valign="middle" align="center"><?php echo nl2br(stripslashes($_smarty_tpl->tpl_vars['black']->value->comment));?>
</td>
                    <td valign="middle" align="center" width="47">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
order/black-list/list/?edit_id=<?php echo $_smarty_tpl->tpl_vars['black']->value->id;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/edit.png" align="middle" hspace="1" alt="Редактировать" /></a>
                        <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить покупателя из черного списка??', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
order/black-list/list/?del_id=<?php echo $_smarty_tpl->tpl_vars['black']->value->id;?>
');"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/del.png" align="middle" hspace="1" alt="Удалить" /></a>
                    </td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</div>
<?php }} ?>
