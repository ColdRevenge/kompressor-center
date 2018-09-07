<?php /* Smarty version 3.1.24, created on 2017-01-27 16:14:15
         compiled from "E:/OpenServer/domains/kc-pskov.dev/modules/catalog/templates/getCategoriesList.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:13417588b47a71a69e6_73686100%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64cd58895955dca65ac79aab7487702d2622aa42' => 
    array (
      0 => 'E:/OpenServer/domains/kc-pskov.dev/modules/catalog/templates/getCategoriesList.tpl',
      1 => 1485497723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13417588b47a71a69e6_73686100',
  'variables' => 
  array (
    'categoriesList' => 0,
    'icategory' => 0,
    'subtree' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_588b47a71c3197_60405354',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588b47a71c3197_60405354')) {
function content_588b47a71c3197_60405354 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '13417588b47a71a69e6_73686100';
?>
<div  id="catalog-group">
    <div id="category-group">
        <?php
$_from = $_smarty_tpl->tpl_vars['categoriesList']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["icategory"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["icategory"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["icategory"]->value) {
$_smarty_tpl->tpl_vars["icategory"]->_loop = true;
$foreach_icategory_Sav = $_smarty_tpl->tpl_vars["icategory"];
?>
            <?php $_smarty_tpl->tpl_vars["icategory_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['icategory']->value->id, null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['icategory']->value->is_visible == 1) {?>
                <a href="<?php if ($_smarty_tpl->tpl_vars['subtree']->value->link) {
echo $_smarty_tpl->tpl_vars['subtree']->value->link;
} else {
echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->smarty->registered_objects['category_obj'][0]->getFullAdressCategoryIdRoutes(array('category_id'=>$_smarty_tpl->tpl_vars['icategory']->value->id),$_smarty_tpl);
}?>" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
">
                    <img src="/images/icons/<?php if ($_smarty_tpl->tpl_vars['icategory']->value->icon) {
echo $_smarty_tpl->tpl_vars['icategory']->value->icon;
} else { ?>no-image.png<?php }?>" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
" />
                    <span><?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
</span>
                </a>
            <?php }?>
        <?php
$_smarty_tpl->tpl_vars["icategory"] = $foreach_icategory_Sav;
}
?>
    </div>
</div><?php }
}
?>