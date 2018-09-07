<?php /* Smarty version 3.1.24, created on 2015-09-14 14:32:28
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/search/templates/live.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:27499832855f6b04caa8637_72104919%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61af0f539ea8c7ac8649e78f334f9a624a8c8a63' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/search/templates/live.tpl',
      1 => 1441289022,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27499832855f6b04caa8637_72104919',
  'variables' => 
  array (
    'prodcuts' => 0,
    'news' => 0,
    'obzors' => 0,
    'product' => 0,
    'order' => 0,
    '_shop_url' => 0,
    'key' => 0,
    'product_images' => 0,
    'url' => 0,
    'catalog_dir' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f6b04cb58f73_04728514',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f6b04cb58f73_04728514')) {
function content_55f6b04cb58f73_04728514 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '27499832855f6b04caa8637_72104919';
if (count($_smarty_tpl->tpl_vars['prodcuts']->value) || count($_smarty_tpl->tpl_vars['news']->value) || count($_smarty_tpl->tpl_vars['obzors']->value)) {?>
    <div class="search" id="live_search_form">
        <div id="you-id-for-search-popup" class="search-popup">
            <ul>
                <?php if (count($_smarty_tpl->tpl_vars['prodcuts']->value)) {?>
                    <li class="section">
                        <span class="section-name">Товар</span>
                        <ul class="elements">
                            <?php
$_from = $_smarty_tpl->tpl_vars['prodcuts']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["product"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["product"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
$foreach_product_Sav = $_smarty_tpl->tpl_vars["product"];
?>

                                <?php if ($_smarty_tpl->tpl_vars['product']->value->shop_id == '1') {?>
                                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable("https://lalipop.ru/", null, 0);?>
                                <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->shop_id == '2') {?>
                                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable("https://lady.lalipop.ru/", null, 0);?>
                                <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->shop_id == '3') {?>
                                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable("https://platok.lalipop.ru/", null, 0);?>
                                <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->shop_id == '4') {?>
                                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable("https://sumka.lalipop.ru/", null, 0);?>
                                <?php } elseif ($_smarty_tpl->tpl_vars['order']->value->shop_id == '5') {?>
                                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable("https://woman.lalipop.ru/", null, 0);?>
                                <?php }?>
                                <li><b></b><a href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/"><img src="/images/gallery/<?php echo stripslashes($_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1][0]->file);?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
</a></li>

                            <?php
$_smarty_tpl->tpl_vars["product"] = $foreach_product_Sav;
}
?>
                            <li class="other"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find/category/?find=<?php echo $_GET['search'];?>
&shop_type=<?php echo $_GET['shop_type'];?>
">Остальные</a></li>
                        </ul>
                    </li>
                <?php }?>
                <?php if (count($_smarty_tpl->tpl_vars['news']->value)) {?>
                    <li class="section">
                        <span class="section-name">Статьи</span>
                        <ul class="elements">
                            <?php
$_from = $_smarty_tpl->tpl_vars['news']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars["item"];
?>
                                <li><b></b><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/look/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['item']->value->name);?>
</a></li>
                                    <?php
$_smarty_tpl->tpl_vars["item"] = $foreach_item_Sav;
}
?>
                                    
                        </ul>
                    </li>
                <?php }?>
                <?php if (count($_smarty_tpl->tpl_vars['obzors']->value)) {?>
                    <li class="section">
                        <span class="section-name">Обзоры</span>
                        <ul class="elements">
                            <?php
$_from = $_smarty_tpl->tpl_vars['obzors']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars["item"];
?>
                                <li><b></b><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/look/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['item']->value->name);?>
</a></li>
                                    <?php
$_smarty_tpl->tpl_vars["item"] = $foreach_item_Sav;
}
?>
                                    
                        </ul>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>
<?php }
}
}
?>