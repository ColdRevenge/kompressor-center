<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-12 16:00:18
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/like_answer_user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171807415955f418d0b9c355-79299896%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7900a007204676faf37a9b5b1282290c3a0d484a' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/like_answer_user.tpl',
      1 => 1442062807,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171807415955f418d0b9c355-79299896',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55f418d0bcb2e4_47860520',
  'variables' => 
  array (
    'get_users_like' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f418d0bcb2e4_47860520')) {function content_55f418d0bcb2e4_47860520($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
?><h1 style="padding-bottom: 5px;display: block">Сообщение понравилось</h1>

<?php  $_smarty_tpl->tpl_vars["user"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["user"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['get_users_like']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["user"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["user"]->key => $_smarty_tpl->tpl_vars["user"]->value) {
$_smarty_tpl->tpl_vars["user"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["user"]['iteration']++;
?>
    <div class="users_like"<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['user']['iteration']==1) {?> style="border-top: 0;"<?php }?>>
        <div class="users_like_img">
            <a href="/forum/user/<?php echo $_smarty_tpl->tpl_vars['user']->value->user_id;?>
/?is_modal=1"><?php if ($_smarty_tpl->tpl_vars['user']->value->user_icon) {?>
                <img src="/images/forum/avatars/<?php echo $_smarty_tpl->tpl_vars['user']->value->user_icon;?>
" alt="" onerror="this.src='/images/forum/avatars/no-avatars.png'" />
                <?php } else { ?>
                    <img src="/images/forum/avatars/no-avatars.png" alt="" />
                    <?php }?></a>
                </div>
                <div class="user_like_name">
                    <a href="/forum/user/<?php echo $_smarty_tpl->tpl_vars['user']->value->from_user_id;?>
/?is_modal=1"><?php echo stripslashes($_smarty_tpl->tpl_vars['user']->value->user_name);?>
</a>
                    <div class="notice"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value->created,"d.m.Y H:i");?>
</div>
                </div>
            </div>
            <?php } ?><?php }} ?>
