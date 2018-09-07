<?php /* Smarty version 3.1.24, created on 2018-07-19 20:17:12
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/category/templates/map_site.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:16763919205b50c798e070f6_69879733%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e3869b7a6785b5244d6afd799d19f6b0246eeb8' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/category/templates/map_site.tpl',
      1 => 1530509449,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16763919205b50c798e070f6_69879733',
  'variables' => 
  array (
    'id' => 0,
    'category' => 0,
    'category_1' => 0,
    'category_5' => 0,
    'tree' => 0,
    'subtree' => 0,
    'key' => 0,
    'level' => 0,
    'url' => 0,
    'category_adress' => 0,
    'base_dir' => 0,
    'inc' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b50c79915c724_45718911',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b50c79915c724_45718911')) {
function content_5b50c79915c724_45718911 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '16763919205b50c798e070f6_69879733';
if ($_smarty_tpl->tpl_vars['id']->value === NULL) {?>
    <h1>Карта сайта</h1>
    

    <div style="margin:5px 0px 10px 20px;" class="blue_link_block">
        <?php echo $_smarty_tpl->getSubTemplate ("map_site.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>0,'tree'=>$_smarty_tpl->tpl_vars['category']->value,'inc'=>"map_site.tpl",'level'=>0), 0);
?>

    </div>
    
    <div style="margin:5px 0px 10px 20px;" class="blue_link_block">
        <?php echo $_smarty_tpl->getSubTemplate ("map_site.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>0,'tree'=>$_smarty_tpl->tpl_vars['category_1']->value,'inc'=>"map_site.tpl",'level'=>0), 0);
?>

    </div>
    
    <div style="margin:5px 0px 10px 20px;" class="blue_link_block">
        <?php echo $_smarty_tpl->getSubTemplate ("map_site.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>0,'tree'=>$_smarty_tpl->tpl_vars['category_5']->value,'inc'=>"map_site.tpl",'level'=>0), 0);
?>

    </div>
    <br/>
<?php } else { ?>
    <?php if ($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][0] != '') {?>
        <?php
$_from = $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["subtree"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["subtree"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["subtree"]->value) {
$_smarty_tpl->tpl_vars["subtree"]->_loop = true;
$foreach_subtree_Sav = $_smarty_tpl->tpl_vars["subtree"];
?>
            <?php if ($_smarty_tpl->tpl_vars['subtree']->value->is_visible == 1) {?>
                <?php $_smarty_tpl->assign("category_adress",$_smarty_tpl->smarty->registered_objects['this'][0]->getCategoryAdress(array('category_id'=>$_smarty_tpl->tpl_vars['subtree']->value->id),$_smarty_tpl));?>

                <?php $_smarty_tpl->tpl_vars["current_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id, null, 0);?>
                <div style="margin-left:<?php echo $_smarty_tpl->tpl_vars['level']->value*20;?>
px;">




                    <?php if ($_smarty_tpl->tpl_vars['subtree']->value->id != 790 && $_smarty_tpl->tpl_vars['subtree']->value->id != 823 && $_smarty_tpl->tpl_vars['subtree']->value->parent_id != 790 && $_smarty_tpl->tpl_vars['subtree']->value->parent_id != 823 && $_smarty_tpl->tpl_vars['subtree']->value->type == 0) {?>
                        <a href="<?php if ($_smarty_tpl->tpl_vars['subtree']->value->type == 0) {
echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;
} else {
echo $_smarty_tpl->tpl_vars['url']->value;?>
page/<?php echo $_smarty_tpl->tpl_vars['subtree']->value->pseudo_dir;?>
/<?php }?>" class="h1">
                            <?php echo $_smarty_tpl->tpl_vars['subtree']->value->name;?>
</a> 
                            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/test.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('open_category_id'=>$_smarty_tpl->tpl_vars['subtree']->value->id), 0);
?>

                        <?php } else { ?>
                        <a href="<?php if ($_smarty_tpl->tpl_vars['subtree']->value->type == 0) {
echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;
} else {
echo $_smarty_tpl->tpl_vars['url']->value;?>
page/<?php echo $_smarty_tpl->tpl_vars['subtree']->value->pseudo_dir;?>
/<?php }?>" >
                            <?php echo $_smarty_tpl->tpl_vars['subtree']->value->name;?>
</a> 
                        <?php }?>
                </div>
            <?php }?>
            <?php echo $_smarty_tpl->getSubTemplate ("map_site.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>$_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id,'tree'=>$_smarty_tpl->tpl_vars['tree']->value,'inc'=>$_smarty_tpl->tpl_vars['inc']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1), 0);
?>

        <?php
$_smarty_tpl->tpl_vars["subtree"] = $foreach_subtree_Sav;
}
?>
    <?php }?>
<?php }
}
}
?>