<?php /* Smarty version 3.1.24, created on 2018-07-02 09:12:18
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/catalog/templates/getCategoriesList.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:21333038215b39c242169769_86489426%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3fa06ba1b526d8f7fcea686cd23e6d77705d34a' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/catalog/templates/getCategoriesList.tpl',
      1 => 1530509445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21333038215b39c242169769_86489426',
  'variables' => 
  array (
    'categoriesList' => 0,
    'icategory' => 0,
    'modificator' => 0,
    'subtree' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39c24219cbb8_82613963',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39c24219cbb8_82613963')) {
function content_5b39c24219cbb8_82613963 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '21333038215b39c242169769_86489426';
?>
<div>
    <div class="categories">
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
                <div class="categories__item categories__item--<?php echo $_smarty_tpl->tpl_vars['modificator']->value;?>
">
                    <a class="categories__link" href="<?php if ($_smarty_tpl->tpl_vars['subtree']->value->link) {
echo $_smarty_tpl->tpl_vars['subtree']->value->link;
} else {
echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->smarty->registered_objects['category_obj'][0]->getFullAdressCategoryIdRoutes(array('category_id'=>$_smarty_tpl->tpl_vars['icategory']->value->id),$_smarty_tpl);
}?>" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
">
                        <span class="categories__item-image">
                            <img src="/images/icons/<?php if ($_smarty_tpl->tpl_vars['icategory']->value->icon) {
echo $_smarty_tpl->tpl_vars['icategory']->value->icon;
} else { ?>no-image.png<?php }?>" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
" />
                        </span>
                        <span class="categories__item-text"><?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
</span>
                    </a>
                </div>
            <?php }?>
        <?php
$_smarty_tpl->tpl_vars["icategory"] = $foreach_icategory_Sav;
}
?>
    </div>
</div><?php }
}
?>