<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 17:08:04
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/users/templates/admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53546741655d5df442af9d0-57133765%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15d0061588832a933553b34cea0f39f359b99487' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/users/templates/admin.tpl',
      1 => 1437497210,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53546741655d5df442af9d0-57133765',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'admin_url' => 0,
    'user_type' => 0,
    'managers' => 0,
    'manager' => 0,
    'users' => 0,
    'user' => 0,
    'sys_images_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d5df443d77d7_45269744',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d5df443d77d7_45269744')) {function content_55d5df443d77d7_45269744($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
?><?php if ($_GET['is_modal']!=1) {?>
    <div class="block">
        <?php echo $_smarty_tpl->getSubTemplate ("_menu_user.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="page">

            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>


            <?php echo $_smarty_tpl->getSubTemplate ("admin_add.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


            <div class="quick_actions"><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
users/admin/<?php echo $_smarty_tpl->tpl_vars['user_type']->value;?>
/add/1/" title="Добавить пользователя" style="font-size: 17px;">Добавить пользователя</a></div>

            
            
            
            <?php if ($_smarty_tpl->tpl_vars['user_type']->value==0) {?>
                <form method="post" action="">

                    <table cellpadding="4" cellspacing="1" border="0" class="table" width="870" style="margin: auto; margin-bottom: 10px;">

                        <tbody class="tbody">
                            <tr>
                                <td valign="middle" align="right">
                                    Логин (или ФИО):&nbsp;
                                </td>
                                <td valign="middle" align="left">
                                    <input type="text" value="<?php echo $_POST['find'];?>
" name="find" style="width: 307px;"/> &nbsp;&nbsp;&nbsp;&nbsp;Менеджер: 
                                    <select name="manager_id" style="width: 280px;">
                                        <option value="-1">Все менеджеры</option>
                                        <option value="0"<?php if ($_POST['manager_id']==0) {?>selected="selected"<?php }?>>Не выбран</option>
                                        <?php  $_smarty_tpl->tpl_vars["manager"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["manager"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['managers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["manager"]->key => $_smarty_tpl->tpl_vars["manager"]->value) {
$_smarty_tpl->tpl_vars["manager"]->_loop = true;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['manager']->value->id;?>
" <?php if ($_POST['manager_id']==$_smarty_tpl->tpl_vars['manager']->value->id) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['manager']->value->name);?>
</option>
                                        <?php } ?>
                                    </select>
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
                    </table>
                </form>
            <?php }?>
            <form method="post" action="">
                <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%">
                    <thead>
                        <tr>
                            <td valign="middle" align="center">Логин:</td>
                            <td valign="middle" align="center">ФИО:</td>
                            
                            <td valign="middle" align="center">Телефон:</td>
                            
                            <?php if ($_smarty_tpl->tpl_vars['user_type']->value==0) {?>      <td valign="middle" align="center">Менеджер</td> <?php }?>
                            <td valign="middle" align="center">Добавлен:</td>
                            <td valign="middle" align="center" width="70">&nbsp;</td>
                        </tr>
                    </thead>

                    <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
                        <tbody class="tbody">
                            <tr>
                                <td valign="middle" align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
users/admin/0/edit/<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
/?is_modal=1" rel="admin_fancy"><?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
</a></td>
                                <td valign="middle" align="center" style="cursor: pointer;" title="Редактировать" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
users/admin/<?php echo $_smarty_tpl->tpl_vars['user_type']->value;?>
/edit/<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
/'"><?php echo stripslashes($_smarty_tpl->tpl_vars['user']->value->name);?>
</td>

                                
                                <td valign="middle" align="center" style="cursor: pointer;" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
users/admin/<?php echo $_smarty_tpl->tpl_vars['user_type']->value;?>
/edit/<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
/'">
                                    <?php echo $_smarty_tpl->tpl_vars['user']->value->phone;?>

                                    <div style="height: 5px;font-size: 0">&nbsp;</div>

                                    <?php if ($_smarty_tpl->tpl_vars['user']->value->email) {?><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
</a><?php }?>
                                </td>


                                <?php if ($_smarty_tpl->tpl_vars['user_type']->value==0) {?>
                                    
                                    <td valign="middle" align="center">
                                        <select name="manager_id[<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
]" style="width: 150px;">
                                            <option value="0">Не выбран</option>
                                            <?php  $_smarty_tpl->tpl_vars["manager"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["manager"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['managers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["manager"]->key => $_smarty_tpl->tpl_vars["manager"]->value) {
$_smarty_tpl->tpl_vars["manager"]->_loop = true;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['manager']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['user']->value->manager_id==$_smarty_tpl->tpl_vars['manager']->value->id) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['manager']->value->name);?>
</option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                <?php }?>
                                <td valign="middle" align="center" style="cursor: pointer;" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
users/admin/<?php echo $_smarty_tpl->tpl_vars['user_type']->value;?>
/edit/<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
/'"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value->created,"%d:%m:%Y");?>
 </td>
                                <td valign="middle" align="center">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
users/admin/0/history/<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
/?is_modal=1" class="fancy" title="История заказов пользователя <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
orders.png" alt="" style="vertical-align: middle"/></a>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
users/admin/<?php echo $_smarty_tpl->tpl_vars['user_type']->value;?>
/edit/<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
/"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/edit.png" align="middle" hspace="1" alt="Редактировать" /></a>
                                    <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить страницу??')) {
                                                location.href = '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
users/admin/<?php echo $_smarty_tpl->tpl_vars['user_type']->value;?>
/del/<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
/';}"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/del.png" align="middle" hspace="1" alt="Удалить раздел" /></a>
                                </td>
                            </tr>

                        </tbody>
                    <?php } ?>
                    <?php if ($_smarty_tpl->tpl_vars['user_type']->value==0) {?>
                        <tfoot>
                            <tr>
                                <td valign="middle" align="right" colspan="16">
                                    <input type="hidden" name="is_save" value="1" />
                                    <button>Сохранить</button>
                                </td>
                            </tr>
                        </tfoot>
                    <?php }?>
                </table>
            </form>
        </div>
    </div>
<?php } else { ?>
    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("admin_add.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<?php echo '<script'; ?>
 type="text/javascript">

    $("a[rel^='admin_fancy']").fancybox({
        width: 855,
        height: 655,
        modal: true,
        type: 'iframe',
        cyclic: false,
        fitToView: false,
        autoSize: false,
        closeClick: true,
        openEffect: 'none',
        closeEffect: 'none',
        hideOnOverlayClick: true,
        hideOnContentClick: true,
        enableEscapeButton: true,
        showCloseButton: true
    });
<?php echo '</script'; ?>
><?php }} ?>
