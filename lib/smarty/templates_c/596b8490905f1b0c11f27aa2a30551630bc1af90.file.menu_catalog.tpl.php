<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-08 19:02:50
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/category/templates/menu_catalog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143689503455d4698be31745-21233828%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '596b8490905f1b0c11f27aa2a30551630bc1af90' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/category/templates/menu_catalog.tpl',
      1 => 1441728161,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143689503455d4698be31745-21233828',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d4698bef0880_53507803',
  'variables' => 
  array (
    'id' => 0,
    'tree' => 0,
    'parents_category_arr' => 0,
    'shop' => 0,
    'subtree' => 0,
    'key' => 0,
    'category_icon' => 0,
    'tmp_var_id' => 0,
    'open_category_id' => 0,
    'parent_id' => 0,
    'url' => 0,
    'inc' => 0,
    'level' => 0,
    'offset' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4698bef0880_53507803')) {function content_55d4698bef0880_53507803($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][0]!='') {?>
    <?php $_smarty_tpl->tpl_vars["child_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][0]->id, null, 0);?>
    <ul id="parent_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['parents_category_arr']->value[$_smarty_tpl->tpl_vars['id']->value]) {?> class="active"<?php }?>>
        <?php  $_smarty_tpl->tpl_vars["subtree"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["subtree"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["subtree"]->key => $_smarty_tpl->tpl_vars["subtree"]->value) {
$_smarty_tpl->tpl_vars["subtree"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["subtree"]->key;
?>
            <?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady'||$_smarty_tpl->tpl_vars['shop']->value=='woman') {?>
                <?php if ($_smarty_tpl->tpl_vars['subtree']->value->id==897||$_smarty_tpl->tpl_vars['subtree']->value->id==1030) {
$_smarty_tpl->tpl_vars["category_icon"] = new Smarty_variable("icon-menu-bluza", null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['subtree']->value->id==894||$_smarty_tpl->tpl_vars['subtree']->value->id==1027) {
$_smarty_tpl->tpl_vars["category_icon"] = new Smarty_variable("icon-menu-bruki", null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['subtree']->value->id==887) {
$_smarty_tpl->tpl_vars["category_icon"] = new Smarty_variable("icon-menu-vodolozki", null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['subtree']->value->id==893) {
$_smarty_tpl->tpl_vars["category_icon"] = new Smarty_variable("icon-menu-jaketu", null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['subtree']->value->id==892) {
$_smarty_tpl->tpl_vars["category_icon"] = new Smarty_variable("icon-menu-jiletu", null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['subtree']->value->id==890||$_smarty_tpl->tpl_vars['subtree']->value->id==1023) {
$_smarty_tpl->tpl_vars["category_icon"] = new Smarty_variable("icon-menu-kardiganu", null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['subtree']->value->id==915||$_smarty_tpl->tpl_vars['subtree']->value->id==1044) {
$_smarty_tpl->tpl_vars["category_icon"] = new Smarty_variable("icon-menu-kostumi", null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['subtree']->value->id==886||$_smarty_tpl->tpl_vars['subtree']->value->id==1019) {
$_smarty_tpl->tpl_vars["category_icon"] = new Smarty_variable("icon-menu-plate", null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['subtree']->value->id==889) {
$_smarty_tpl->tpl_vars["category_icon"] = new Smarty_variable("icon-menu-poncho", null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['subtree']->value->id==885) {
$_smarty_tpl->tpl_vars["category_icon"] = new Smarty_variable("icon-menu-sarafan", null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['subtree']->value->id==1119) {
$_smarty_tpl->tpl_vars["category_icon"] = new Smarty_variable("icon-menu-sport", null, 0);?> 
                <?php } elseif ($_smarty_tpl->tpl_vars['subtree']->value->id==888) {
$_smarty_tpl->tpl_vars["category_icon"] = new Smarty_variable("icon-menu-top", null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['subtree']->value->id==891||$_smarty_tpl->tpl_vars['subtree']->value->id==1024) {
$_smarty_tpl->tpl_vars["category_icon"] = new Smarty_variable("icon-menu-tuniki", null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['subtree']->value->id==896) {
$_smarty_tpl->tpl_vars["category_icon"] = new Smarty_variable("icon-menu-vverx", null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['subtree']->value->id==916||$_smarty_tpl->tpl_vars['subtree']->value->id==1045) {
$_smarty_tpl->tpl_vars["category_icon"] = new Smarty_variable("icon-menu-sviter", null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['subtree']->value->id==895||$_smarty_tpl->tpl_vars['subtree']->value->id==1028) {
$_smarty_tpl->tpl_vars["category_icon"] = new Smarty_variable("icon-menu-ubka", null, 0);?>
                <?php }?>
            <?php }?>
            <?php $_smarty_tpl->tpl_vars["parent_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['subtree']->value->id, null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['subtree']->value->is_visible==1) {?>
                <?php $_smarty_tpl->tpl_vars["tmp_var_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id, null, 0);?>
                <li<?php if ($_smarty_tpl->tpl_vars['category_icon']->value) {?> class="<?php echo $_smarty_tpl->tpl_vars['category_icon']->value;
if ($_smarty_tpl->tpl_vars['parents_category_arr']->value[$_smarty_tpl->tpl_vars['tmp_var_id']->value]) {?> active<?php }?>"<?php } elseif ($_smarty_tpl->tpl_vars['parents_category_arr']->value[$_smarty_tpl->tpl_vars['tmp_var_id']->value]) {?> class="active"<?php }?>>
                    

            <?php if ($_smarty_tpl->tpl_vars['open_category_id']->value==$_smarty_tpl->tpl_vars['parent_id']->value) {?><span onclick="location.href = '<?php if ($_smarty_tpl->tpl_vars['subtree']->value->link) {
echo $_smarty_tpl->tpl_vars['subtree']->value->link;
} else {
echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->smarty->registered_objects['category_obj'][0]->getFullAdressCategoryIdRoutes(array('category_id'=>$_smarty_tpl->tpl_vars['subtree']->value->id),$_smarty_tpl);
}?>'"><?php echo stripslashes($_smarty_tpl->tpl_vars['subtree']->value->name);?>
</span><?php } else { ?><a  href="<?php if ($_smarty_tpl->tpl_vars['subtree']->value->link) {
echo $_smarty_tpl->tpl_vars['subtree']->value->link;
} else {
echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->smarty->registered_objects['category_obj'][0]->getFullAdressCategoryIdRoutes(array('category_id'=>$_smarty_tpl->tpl_vars['subtree']->value->id),$_smarty_tpl);
}?>"><?php echo stripslashes($_smarty_tpl->tpl_vars['subtree']->value->name);?>
</a><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady'||$_smarty_tpl->tpl_vars['shop']->value=='woman') {?>
                    <?php echo $_smarty_tpl->getSubTemplate ("menu_catalog_podbor_lady.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['tmp_var_id']->value][0]) {?>
                    <?php echo $_smarty_tpl->getSubTemplate ("menu_catalog.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>$_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id,'tree'=>$_smarty_tpl->tpl_vars['tree']->value,'inc'=>$_smarty_tpl->tpl_vars['inc']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1,'offset'=>$_smarty_tpl->tpl_vars['offset']->value), 0);?>

                <?php }?>
        </li>
    <?php } else { ?>
        <?php echo $_smarty_tpl->smarty->registered_objects['category_obj'][0]->getFullAdressCategoryIdRoutes(array('hide'=>1,'category_id'=>$_smarty_tpl->tpl_vars['subtree']->value->id),$_smarty_tpl);?>

    <?php }?>
<?php } ?>
</ul>
<?php }?> <?php }} ?>
