<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-08 13:21:35
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/last_post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27383463855e82a4093c489-52631967%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '365264b2c159710a57479c570cb8c8538f60f9dc' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/last_post.tpl',
      1 => 1441707694,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27383463855e82a4093c489-52631967',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e82a4099ac72_59529926',
  'variables' => 
  array (
    'content' => 0,
    'get_last_topics' => 0,
    'item' => 0,
    'get_topic' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e82a4099ac72_59529926')) {function content_55e82a4099ac72_59529926($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.truncate.php';
?><?php if ($_smarty_tpl->tpl_vars['content']->value) {?>
    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php } else { ?>
    <table border="3" style="margin-top: 0">
        <tbody>
            <tr>
                <td>&nbsp;</td>
                <td>Тема</td>
                <td>Сообщение</td>
            </tr>
        </tbody>
        <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['get_last_topics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item"]['iteration']++;
?>
            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['item']['iteration']<=100) {?>
                <?php $_smarty_tpl->assign("get_topic",$_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getTopicTemplate(array('topic_id'=>$_smarty_tpl->tpl_vars['item']->value->topic_id),$_smarty_tpl));?>


                <tbody>
                    <tr>
                        <td><a href="/forum/user/<?php echo $_smarty_tpl->tpl_vars['item']->value->user_id;?>
/?is_modal=1" rel="set"><?php if ($_smarty_tpl->tpl_vars['item']->value->user_icon) {?>
                            <img src="/images/forum/avatars/<?php echo $_smarty_tpl->tpl_vars['item']->value->user_icon;?>
" alt=""  onerror="this.src='/images/forum/avatars/no-avatars.png'" />
                        <?php } else { ?>
                            <img src="/images/forum/avatars/no-avatars.png" alt="" />
                        <?php }?></a></td>
                    <td style="width: 250px;"><a href="/<?php echo $_smarty_tpl->tpl_vars['get_topic']->value->pseudo_dir;?>
/read/<?php echo $_smarty_tpl->tpl_vars['item']->value->topic_id;?>
/"><?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['get_topic']->value->name));?>
</a>
                    
                        <div class="notice" style="margin: 10px 0 2px 0"><?php echo $_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getDateTemplate(array('date'=>$_smarty_tpl->tpl_vars['item']->value->created),$_smarty_tpl);?>
</div>
                        
                        <div class="notice"><a  href="/forum/user/<?php echo $_smarty_tpl->tpl_vars['item']->value->user_id;?>
/?is_modal=1" rel="set" style="color: #f94208"><?php echo $_smarty_tpl->tpl_vars['item']->value->user_name;?>
</a></div>
                    </td>
                    <td><div class="notice" style="text-align: justify"><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['item']->value->text)),500);?>
</div></td>
                </tr>
            </tbody>
            <?php }?>
                <?php } ?>
                </table>
                <?php }?><?php }} ?>
