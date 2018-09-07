<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-24 12:26:33
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/discount/templates/coupon_list_code.tpl" */ ?>
<?php /*%%SmartyHeaderCode:83106490255dae349cb5d00-83638246%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a90572b00f327032edac3c3fd868dc24c88705e' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/discount/templates/coupon_list_code.tpl',
      1 => 1439726817,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83106490255dae349cb5d00-83638246',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'admin_url' => 0,
    'get_coupone' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'sys_images_url' => 0,
    'MyURL' => 0,
    'code_list' => 0,
    'coupon' => 0,
    'coupon_code_id' => 0,
    'user_code' => 0,
    'url' => 0,
    'user_code_item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55dae349dac591_74395946',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55dae349dac591_74395946')) {function content_55dae349dac591_74395946($_smarty_tpl) {?><div class="block">

    <?php echo $_smarty_tpl->getSubTemplate ("_menu_discount.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="page">

        <div id="breadcrumbs">
            <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
discount/coupons/">Купоны</a> &raquo; Купон - &laquo;<?php echo stripslashes($_smarty_tpl->tpl_vars['get_coupone']->value->name);?>
&raquo;
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

        <div class="quick_actions">
            <img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
added.png" alt="Редактировать" /><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
discount/coupons/add/6/?is_modal=1" rel="fancy" >Редактировать купон </a>
        </div>
        <h1>Купон - &laquo;<?php echo stripslashes($_smarty_tpl->tpl_vars['get_coupone']->value->name);?>
&raquo;</h1>

        <form method="post" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
">
            <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%" >
                <thead>
                    <tr>
                        <td valign="middle" align="center">Код: </td>
                        <td valign="middle" align="center">Привязан к пользователям: </td>
                        <td valign="middle" align="center">Сумма: </td>
                    </tr>
                </thead>



                <?php  $_smarty_tpl->tpl_vars['coupon'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['coupon']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['code_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['coupon']->key => $_smarty_tpl->tpl_vars['coupon']->value) {
$_smarty_tpl->tpl_vars['coupon']->_loop = true;
?>
                    <?php $_smarty_tpl->tpl_vars["coupon_code_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['coupon']->value->id, null, 0);?>
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="center"><?php echo number_format(stripslashes($_smarty_tpl->tpl_vars['coupon']->value->code),0,''," ");?>
</td>
                            <td valign="middle" align="center"><?php  $_smarty_tpl->tpl_vars["user_code_item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["user_code_item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_code']->value[$_smarty_tpl->tpl_vars['coupon_code_id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["user_code_item"]->key => $_smarty_tpl->tpl_vars["user_code_item"]->value) {
$_smarty_tpl->tpl_vars["user_code_item"]->_loop = true;
?>

                                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
xadmin/users/admin/0/edit/<?php echo $_smarty_tpl->tpl_vars['user_code_item']->value->id;?>
/?is_modal=1" rel="admin_fancy"><?php echo stripslashes($_smarty_tpl->tpl_vars['user_code_item']->value->login);?>
</a>&nbsp;
                            <?php } ?>
                        </td>
                        <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['coupon']->value->sum;?>
 руб.</td>

                    </tr>
                </tbody>
                <?php } ?>
                </table>

            </form>
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
>

            <br/>
            <p style="text-align: center">
                <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
discount/coupons/">Вернуться</a>
            </p>
        </div>
    </div><?php }} ?>
