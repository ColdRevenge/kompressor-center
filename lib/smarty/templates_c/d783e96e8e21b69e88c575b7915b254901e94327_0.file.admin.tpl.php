<?php /* Smarty version 3.1.24, created on 2015-10-28 15:21:43
         compiled from "/home/c10045/public_html/kompressor-center.com/modules/users/templates/admin.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:320139895630bdd70363c8_83844309%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd783e96e8e21b69e88c575b7915b254901e94327' => 
    array (
      0 => '/home/c10045/public_html/kompressor-center.com/modules/users/templates/admin.tpl',
      1 => 1442407287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '320139895630bdd70363c8_83844309',
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
  'version' => '3.1.24',
  'unifunc' => 'content_5630bdd7105132_87251044',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5630bdd7105132_87251044')) {
function content_5630bdd7105132_87251044 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/c10045/public_html/kompressor-center.com/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '320139895630bdd70363c8_83844309';
if ($_GET['is_modal'] != 1) {?>
    <div class="block">
        <?php echo $_smarty_tpl->getSubTemplate ("_menu_user.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        <div class="page">

            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>


            <?php echo $_smarty_tpl->getSubTemplate ("admin_add.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


            <div class="quick_actions"><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
users/admin/<?php echo $_smarty_tpl->tpl_vars['user_type']->value;?>
/add/1/" title="Добавить пользователя" style="font-size: 17px;">Добавить пользователя</a></div>

            
            
            
            <?php if ($_smarty_tpl->tpl_vars['user_type']->value == 0) {?>
                <form method="post" action="">

                    <table cellpadding="4" cellspacing="1" border="0" class="table" width="870" style="margin: auto; margin-bottom: 10px;">

                        <tbody class="tbody">
                            <tr>
                                <td valign="middle" align="right">
                                    Логин (или ФИО):&nbsp;
                                </td>
                                <td valign="middle" align="left" style="display: none">
                                    <input type="text" value="<?php echo $_POST['find'];?>
" name="find" style="width: 307px;"/> &nbsp;&nbsp;&nbsp;&nbsp;Менеджер: 
                                    <select name="manager_id" style="width: 280px;">
                                        <option value="-1">Все менеджеры</option>
                                        <option value="0"<?php if ($_POST['manager_id'] == 0) {?>selected="selected"<?php }?>>Не выбран</option>
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
                            
                            <?php if ($_smarty_tpl->tpl_vars['user_type']->value == 0) {?>      <td valign="middle" align="center">Менеджер</td> <?php }?>
                            <td valign="middle" align="center">Добавлен:</td>
                            <td valign="middle" align="center" width="70">&nbsp;</td>
                        </tr>
                    </thead>

                    <?php
$_from = $_smarty_tpl->tpl_vars['users']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['user'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['user']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
$foreach_user_Sav = $_smarty_tpl->tpl_vars['user'];
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


                                <?php if ($_smarty_tpl->tpl_vars['user_type']->value == 0) {?>
                                    
                                    <td valign="middle" align="center" style="display: none">
                                        <select name="manager_id[<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
]" style="width: 150px;">
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
" <?php if ($_smarty_tpl->tpl_vars['user']->value->manager_id == $_smarty_tpl->tpl_vars['manager']->value->id) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['manager']->value->name);?>
</option>
                                            <?php
$_smarty_tpl->tpl_vars["manager"] = $foreach_manager_Sav;
}
?>
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
                    <?php
$_smarty_tpl->tpl_vars['user'] = $foreach_user_Sav;
}
?>
                    <?php if ($_smarty_tpl->tpl_vars['user_type']->value == 0) {?>
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
    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>

    <?php echo $_smarty_tpl->getSubTemplate ("admin_add.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

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
><?php }
}
?>