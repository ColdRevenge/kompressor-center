<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-10 20:23:04
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/forum_category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:78886633255dde647af7089-93637491%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '584ed7520ede2aeeca9585ad188ed7f041b511d8' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/forum_category.tpl',
      1 => 1441905783,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78886633255dde647af7089-93637491',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55dde647b2e159_36452941',
  'variables' => 
  array (
    'id' => 0,
    'menu_forum' => 0,
    'icategory_child' => 0,
    'host_url' => 0,
    'count_topics' => 0,
    'url' => 0,
    'category_child' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55dde647b2e159_36452941')) {function content_55dde647b2e159_36452941($_smarty_tpl) {?><?php if (count($_smarty_tpl->tpl_vars['menu_forum']->value[$_smarty_tpl->tpl_vars['id']->value])) {?>
    <ul>
        <?php  $_smarty_tpl->tpl_vars["icategory_child"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["icategory_child"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_forum']->value[$_smarty_tpl->tpl_vars['id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["icategory_child"]->key => $_smarty_tpl->tpl_vars["icategory_child"]->value) {
$_smarty_tpl->tpl_vars["icategory_child"]->_loop = true;
?>

            <?php if ($_smarty_tpl->tpl_vars['icategory_child']->value->is_visible==1) {?>
                <li onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['host_url']->value;
echo $_smarty_tpl->tpl_vars['icategory_child']->value->pseudo_dir;?>
/'">
                    <div class="topic-info">
                        <?php $_smarty_tpl->assign("count_topics",$_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getCountAnswers(array('category_id'=>$_smarty_tpl->tpl_vars['icategory_child']->value->id),$_smarty_tpl));?>


                        <div><b><?php echo number_format($_smarty_tpl->tpl_vars['count_topics']->value->topic_count,0,''," ");?>
</b> <?php echo $_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getCountPostTemplate(array('count'=>$_smarty_tpl->tpl_vars['count_topics']->value->topic_count*1),$_smarty_tpl);?>
</div>
                        <div><b><?php echo number_format($_smarty_tpl->tpl_vars['count_topics']->value->answer_count,0,''," ");?>
</b> <?php echo $_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getCountAnswerTemplate(array('count'=>$_smarty_tpl->tpl_vars['count_topics']->value->answer_count*1),$_smarty_tpl);?>
</div>
                    </div>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['icategory_child']->value->category_pseudo_dir;?>
/" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['icategory_child']->value->name);?>
">
                        <?php echo stripslashes($_smarty_tpl->tpl_vars['icategory_child']->value->name);?>
           
                    </a>
        
           
                    <?php $_smarty_tpl->assign("category_child",$_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getChildCategory(array('category_id'=>$_smarty_tpl->tpl_vars['icategory_child']->value->id),$_smarty_tpl));?>


                    <?php if (count($_smarty_tpl->tpl_vars['category_child']->value)) {?><div class="category-child">
                            <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category_child']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["item"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item"]['total'] = $_smarty_tpl->tpl_vars["item"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item"]['iteration']++;
?>
                              <a href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;
echo $_smarty_tpl->tpl_vars['item']->value->pseudo_dir;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['item']->value->name);?>
</a><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['item']['total']!=$_smarty_tpl->getVariable('smarty')->value['foreach']['item']['iteration']) {?>, <?php }?>
                            <?php } ?>
                        </div>
                    <?php }?>
                    <?php echo $_smarty_tpl->getSubTemplate ("forum_category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>$_smarty_tpl->tpl_vars['icategory_child']->value->id), 0);?>

                </li>
            <?php }?>
        <?php } ?>
    </ul>
<?php }?><?php }} ?>
