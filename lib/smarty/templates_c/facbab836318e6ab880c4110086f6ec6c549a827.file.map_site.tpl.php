<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 19:07:34
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/category/templates/map_site.tpl" */ ?>
<?php /*%%SmartyHeaderCode:45994483855d4a9c66a59e9-90654995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'facbab836318e6ab880c4110086f6ec6c549a827' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/category/templates/map_site.tpl',
      1 => 1431336084,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45994483855d4a9c66a59e9-90654995',
  'function' => 
  array (
  ),
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
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d4a9c678d016_11409493',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4a9c678d016_11409493')) {function content_55d4a9c678d016_11409493($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['id']->value===null) {?>
    <h1>Карта сайта</h1>
    

    <div style="margin:5px 0px 10px 20px;" class="blue_link_block">
        <?php echo $_smarty_tpl->getSubTemplate ("map_site.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>0,'tree'=>$_smarty_tpl->tpl_vars['category']->value,'inc'=>"map_site.tpl",'level'=>0), 0);?>

    </div>
    
    <div style="margin:5px 0px 10px 20px;" class="blue_link_block">
        <?php echo $_smarty_tpl->getSubTemplate ("map_site.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>0,'tree'=>$_smarty_tpl->tpl_vars['category_1']->value,'inc'=>"map_site.tpl",'level'=>0), 0);?>

    </div>
    
    <div style="margin:5px 0px 10px 20px;" class="blue_link_block">
        <?php echo $_smarty_tpl->getSubTemplate ("map_site.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>0,'tree'=>$_smarty_tpl->tpl_vars['category_5']->value,'inc'=>"map_site.tpl",'level'=>0), 0);?>

    </div>
    <br/>
<?php } else { ?>
    <?php if ($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][0]!='') {?>
        <?php  $_smarty_tpl->tpl_vars["subtree"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["subtree"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["subtree"]->key => $_smarty_tpl->tpl_vars["subtree"]->value) {
$_smarty_tpl->tpl_vars["subtree"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["subtree"]->key;
?>
            <?php if ($_smarty_tpl->tpl_vars['subtree']->value->is_visible==1) {?>
                <?php $_smarty_tpl->assign("category_adress",$_smarty_tpl->smarty->registered_objects['this'][0]->getCategoryAdress(array('category_id'=>$_smarty_tpl->tpl_vars['subtree']->value->id),$_smarty_tpl));?>

                <?php $_smarty_tpl->tpl_vars["current_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id, null, 0);?>
                <div style="margin-left:<?php echo $_smarty_tpl->tpl_vars['level']->value*20;?>
px;">




                    <?php if ($_smarty_tpl->tpl_vars['subtree']->value->id!=790&&$_smarty_tpl->tpl_vars['subtree']->value->id!=823&&$_smarty_tpl->tpl_vars['subtree']->value->parent_id!=790&&$_smarty_tpl->tpl_vars['subtree']->value->parent_id!=823&&$_smarty_tpl->tpl_vars['subtree']->value->type==0) {?>
                        <a href="<?php if ($_smarty_tpl->tpl_vars['subtree']->value->type==0) {
echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;
} else {
echo $_smarty_tpl->tpl_vars['url']->value;?>
page/<?php echo $_smarty_tpl->tpl_vars['subtree']->value->pseudo_dir;?>
/<?php }?>" class="h1">
                            <?php echo $_smarty_tpl->tpl_vars['subtree']->value->name;?>
</a> 
                            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/podbor_char_map_site.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('open_category_id'=>$_smarty_tpl->tpl_vars['subtree']->value->id), 0);?>

                        <?php } else { ?>
                        <a href="<?php if ($_smarty_tpl->tpl_vars['subtree']->value->type==0) {
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
            <?php echo $_smarty_tpl->getSubTemplate ("map_site.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>$_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id,'tree'=>$_smarty_tpl->tpl_vars['tree']->value,'inc'=>$_smarty_tpl->tpl_vars['inc']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1), 0);?>

        <?php } ?>
    <?php }?>
<?php }?><?php }} ?>
