<?php /* Smarty version 3.1.24, created on 2015-09-13 16:02:32
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/forum_category.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:142295951455f573e8d34765_39107621%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9458d183f5f8cb281694532c0a8052903d4463eb' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/forum_category.tpl',
      1 => 1441905783,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142295951455f573e8d34765_39107621',
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
  'version' => '3.1.24',
  'unifunc' => 'content_55f573e8d8e9f9_66183109',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f573e8d8e9f9_66183109')) {
function content_55f573e8d8e9f9_66183109 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '142295951455f573e8d34765_39107621';
if (count($_smarty_tpl->tpl_vars['menu_forum']->value[$_smarty_tpl->tpl_vars['id']->value])) {?>
    <ul>
        <?php
$_from = $_smarty_tpl->tpl_vars['menu_forum']->value[$_smarty_tpl->tpl_vars['id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["icategory_child"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["icategory_child"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["icategory_child"]->value) {
$_smarty_tpl->tpl_vars["icategory_child"]->_loop = true;
$foreach_icategory_child_Sav = $_smarty_tpl->tpl_vars["icategory_child"];
?>

            <?php if ($_smarty_tpl->tpl_vars['icategory_child']->value->is_visible == 1) {?>
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
                            <?php
$_from = $_smarty_tpl->tpl_vars['category_child']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_item'] = new Smarty_Variable(array('total' => $_smarty_tpl->_count($_from), 'iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_item']->value['iteration']++;
$foreach_item_Sav = $_smarty_tpl->tpl_vars["item"];
?>
                              <a href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;
echo $_smarty_tpl->tpl_vars['item']->value->pseudo_dir;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['item']->value->name);?>
</a><?php if ((isset($_smarty_tpl->tpl_vars['__foreach_item']->value['total']) ? $_smarty_tpl->tpl_vars['__foreach_item']->value['total'] : null) != (isset($_smarty_tpl->tpl_vars['__foreach_item']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_item']->value['iteration'] : null)) {?>, <?php }?>
                            <?php
$_smarty_tpl->tpl_vars["item"] = $foreach_item_Sav;
}
?>
                        </div>
                    <?php }?>
                    <?php echo $_smarty_tpl->getSubTemplate ("forum_category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>$_smarty_tpl->tpl_vars['icategory_child']->value->id), 0);
?>

                </li>
            <?php }?>
        <?php
$_smarty_tpl->tpl_vars["icategory_child"] = $foreach_icategory_child_Sav;
}
?>
    </ul>
<?php }
}
}
?>