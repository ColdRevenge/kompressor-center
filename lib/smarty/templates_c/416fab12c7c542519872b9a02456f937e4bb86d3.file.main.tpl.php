<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-26 19:11:35
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/forum/templates/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:165015361255dc4ca201c153-21034097%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '416fab12c7c542519872b9a02456f937e4bb86d3' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/forum/templates/main.tpl',
      1 => 1440605494,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165015361255dc4ca201c153-21034097',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55dc4ca2040492_78419872',
  'variables' => 
  array (
    'is_main' => 0,
    'open_category_id' => 0,
    'menu_forum' => 0,
    'icategory' => 0,
    'url' => 0,
    'catalog_dir' => 0,
    'icategory_id' => 0,
    'breadcrumbs' => 0,
    'item' => 0,
    'get_category' => 0,
    'get_parent_category' => 0,
    'shop_url' => 0,
    'topics' => 0,
    'host_url' => 0,
    'topic' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55dc4ca2040492_78419872')) {function content_55dc4ca2040492_78419872($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['is_main']->value==1) {?>
    <div id="forum_main">
        <div id="main_category">
            <?php  $_smarty_tpl->tpl_vars["icategory"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["icategory"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_forum']->value[$_smarty_tpl->tpl_vars['open_category_id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["icategory"]->key => $_smarty_tpl->tpl_vars["icategory"]->value) {
$_smarty_tpl->tpl_vars["icategory"]->_loop = true;
?>
                <?php $_smarty_tpl->tpl_vars["icategory_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['icategory']->value->id, null, 0);?>
                <?php if ($_smarty_tpl->tpl_vars['icategory']->value->is_visible==1) {?>
                    <div<?php if ($_smarty_tpl->tpl_vars['icategory']->value->id==1104) {?> class="shop_topic"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['icategory']->value->category_pseudo_dir;?>
/" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
</a>
                        <?php echo $_smarty_tpl->getSubTemplate ("forum_main_category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('menu_forum'=>$_smarty_tpl->tpl_vars['menu_forum']->value,'id'=>$_smarty_tpl->tpl_vars['icategory_id']->value), 0);?>

                    </div>
                <?php }?>
            <?php } ?>
        </div>
        <div id="forum_main_right">
            <ul>
                <li class="right-header"><a href="">Панель пользователя</a></li>
                <li>
                    <div id="prifile-mini">
                        <a href=""><img src="/images/fronted/profile-img.jpg" alt="" /></a>
                        <div class="notice">Всего постов: 0</div>

                    </div>

                </li>
            </ul>
            <ul>
                <li class="right-header"><a href="">Последние темы</a></li>
                <li>
                    <ul id="mini-last-topic">
                        <li>
                            <span><img src="/images/fronted/forum_test_photo.jpg" alt="" /></span>
                            <div>
                                <a href="">Измена жены! Как быть?</a>
                                <div><a href="">Картмен</a><span>12.07.2015 12:30</span></div>
                            </div>
                        </li>
                        <li>
                            <span><img src="/images/fronted/forum_test_photo.jpg" alt="" /></span>
                            <div>
                                <a href="">Стал уделять меньше внимания...</a>
                                <div><a href="">Картмен</a><span>12.07.2015 12:30</span></div>
                            </div>
                        </li>
                        <li>
                            <span><img src="/images/fronted/forum_test_photo.jpg" alt="" /></span>
                            <div>
                                <a href="">Узнала об измене отца...</a>
                                <div><a href="">Картмен</a><span>12.07.2015 12:30</span></div>
                            </div>
                        </li>
                        <li>
                            <span><img src="/images/fronted/forum_test_photo.jpg" alt="" /></span>
                            <div>
                                <a href="">Помогите растолковать сон</a>
                                <div><a href="">Картмен</a><span>12.07.2015 12:30</span></div>
                            </div>
                        </li>
                        <li>
                            <span><img src="/images/fronted/forum_test_photo.jpg" alt="" /></span>
                            <div>
                                <a href="">Как понять сущность мужчин?</a>
                                <div><a href="">Картмен</a><span>12.07.2015 12:30</span></div>
                            </div>
                        </li>
                        <li>
                            <span><img src="/images/fronted/forum_test_photo.jpg" alt="" /></span>
                            <div>
                                <a href=""> Приданое! Пережитки прошлого?</a>
                                <div><a href="">Картмен</a><span>12.07.2015 12:30</span></div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
<?php } else { ?>
    <?php if ($_smarty_tpl->tpl_vars['breadcrumbs']->value) {?>
        <div class="breadcrumbs-block">
            <ul>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">Главная</a><span>/</span></li>
                    <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['breadcrumbs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["item"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['breadcrumbs']['total'] = $_smarty_tpl->tpl_vars["item"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['breadcrumbs']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['breadcrumbs']['iteration']++;
?>
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['parent_id']!=0) {?><li><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['breadcrumbs']['iteration']==$_smarty_tpl->getVariable('smarty')->value['foreach']['breadcrumbs']['total']) {
echo stripslashes($_smarty_tpl->tpl_vars['get_category']->value->name);
} else { ?><a href="<?php if ($_smarty_tpl->tpl_vars['get_parent_category']->value->parent_id==1107) {?>/<?php } else {
echo $_smarty_tpl->tpl_vars['shop_url']->value;
echo $_smarty_tpl->tpl_vars['item']->value['pseudo_dir'];?>
/<?php }?>"><?php echo stripslashes($_smarty_tpl->tpl_vars['item']->value['name']);?>
</a><span>/</span><?php }?></li><?php }?>
                        <?php } ?>
            </ul>
        </div>
    <?php }?>
    <h1><?php echo stripslashes($_smarty_tpl->tpl_vars['get_category']->value->name);?>
</h1>
    <a href="" onclick="jQuery.scrollTo('#add_form', 600);
            return false;" class="forum-button forum_add" style="float: right">Новая тема</a>
    <?php if (count($_smarty_tpl->tpl_vars['menu_forum']->value[$_smarty_tpl->tpl_vars['open_category_id']->value])) {?>
        <div id="main_category">
            <?php if ($_smarty_tpl->tpl_vars['get_parent_category']->value->id) {?>
                <div<?php if ($_smarty_tpl->tpl_vars['get_parent_category']->value->id==1104) {?> class="shop_topic"<?php }?>>
                    <a href="<?php if ($_smarty_tpl->tpl_vars['get_parent_category']->value->parent_id==0||$_smarty_tpl->tpl_vars['get_parent_category']->value->parent_id==1107) {?>/<?php } else { ?>/<?php echo $_smarty_tpl->tpl_vars['get_parent_category']->value->pseudo_dir;?>
/<?php }?>"><?php echo stripslashes($_smarty_tpl->tpl_vars['get_parent_category']->value->name);?>
</a>

                    <?php echo $_smarty_tpl->getSubTemplate ("forum_main_category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('menu_forum'=>$_smarty_tpl->tpl_vars['menu_forum']->value,'id'=>$_smarty_tpl->tpl_vars['open_category_id']->value), 0);?>

                </div>
            <?php }?>
        </div>
        <?php if (count($_smarty_tpl->tpl_vars['topics']->value)>0) {?>
            <?php if ($_smarty_tpl->tpl_vars['get_category']->value->id) {?>
                <div id="topics">
                    <ul>
                        <?php  $_smarty_tpl->tpl_vars["topic"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["topic"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['topics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["topic"]->key => $_smarty_tpl->tpl_vars["topic"]->value) {
$_smarty_tpl->tpl_vars["topic"]->_loop = true;
?>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;
echo $_smarty_tpl->tpl_vars['get_category']->value->pseudo_dir;?>
/read/"><?php echo stripslashes($_smarty_tpl->tpl_vars['topic']->value->name);?>
</a></li>
                            <?php } ?>
                    </ul>
                </div>
            <?php }?>
        <?php }?>
    <?php }?>
    <br/>
    <h2>Создать новую тему</h2>
    <?php echo $_smarty_tpl->getSubTemplate ("add_topic.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?><?php }} ?>
