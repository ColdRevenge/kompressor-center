<?php /* Smarty version 3.1.24, created on 2015-09-13 16:44:04
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/last_post.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:55008679955f57da4697509_54707617%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '186d13b5a2f4eb36642ee1fcb6e1800e2ec26759' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/last_post.tpl',
      1 => 1441707694,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55008679955f57da4697509_54707617',
  'variables' => 
  array (
    'content' => 0,
    'get_last_topics' => 0,
    'item' => 0,
    'get_topic' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f57da470dc48_63077228',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f57da470dc48_63077228')) {
function content_55f57da470dc48_63077228 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.truncate.php';

$_smarty_tpl->properties['nocache_hash'] = '55008679955f57da4697509_54707617';
if ($_smarty_tpl->tpl_vars['content']->value) {?>
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
        <?php
$_from = $_smarty_tpl->tpl_vars['get_last_topics']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_item'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_item']->value['iteration']++;
$foreach_item_Sav = $_smarty_tpl->tpl_vars["item"];
?>
            <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_item']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_item']->value['iteration'] : null) <= 100) {?>
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
                <?php
$_smarty_tpl->tpl_vars["item"] = $foreach_item_Sav;
}
?>
                </table>
                <?php }
}
}
?>