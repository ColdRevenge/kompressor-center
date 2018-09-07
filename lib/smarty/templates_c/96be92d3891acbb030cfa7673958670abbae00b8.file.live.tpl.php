<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-08 08:32:43
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/search/templates/live.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34211862655d60196267101-78977006%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96be92d3891acbb030cfa7673958670abbae00b8' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/search/templates/live.tpl',
      1 => 1441289022,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34211862655d60196267101-78977006',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d60196328cf5_90341349',
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
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d60196328cf5_90341349')) {function content_55d60196328cf5_90341349($_smarty_tpl) {?><?php if (count($_smarty_tpl->tpl_vars['prodcuts']->value)||count($_smarty_tpl->tpl_vars['news']->value)||count($_smarty_tpl->tpl_vars['obzors']->value)) {?>
    <div class="search" id="live_search_form">
        <div id="you-id-for-search-popup" class="search-popup">
            <ul>
                <?php if (count($_smarty_tpl->tpl_vars['prodcuts']->value)) {?>
                    <li class="section">
                        <span class="section-name">Товар</span>
                        <ul class="elements">
                            <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['prodcuts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["product"]->key;
?>

                                <?php if ($_smarty_tpl->tpl_vars['product']->value->shop_id=='1') {?>
                                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://lalipop.ru/", null, 0);?>
                                <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->shop_id=='2') {?>
                                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://lady.lalipop.ru/", null, 0);?>
                                <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->shop_id=='3') {?>
                                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://platok.lalipop.ru/", null, 0);?>
                                <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->shop_id=='4') {?>
                                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://sumka.lalipop.ru/", null, 0);?>
                                <?php } elseif ($_smarty_tpl->tpl_vars['order']->value->shop_id=='5') {?>
                                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://woman.lalipop.ru/", null, 0);?>
                                <?php }?>
                                <li><b></b><a href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/"><img src="/images/gallery/<?php echo stripslashes($_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1][0]->file);?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
</a></li>

                            <?php } ?>
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
                            <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
?>
                                <li><b></b><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/look/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['item']->value->name);?>
</a></li>
                                    <?php } ?>
                                    
                        </ul>
                    </li>
                <?php }?>
                <?php if (count($_smarty_tpl->tpl_vars['obzors']->value)) {?>
                    <li class="section">
                        <span class="section-name">Обзоры</span>
                        <ul class="elements">
                            <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['obzors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
?>
                                <li><b></b><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/look/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['item']->value->name);?>
</a></li>
                                    <?php } ?>
                                    
                        </ul>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>
<?php }?><?php }} ?>
