<?php /* Smarty version 3.1.24, created on 2015-10-28 15:22:49
         compiled from "/home/c10045/public_html/kompressor-center.com/modules/brand/templates/_menu_brand.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:222674225630be19bb6ec4_28544636%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59594c4bc8f2b970efa1eaec043cc506c22dff7f' => 
    array (
      0 => '/home/c10045/public_html/kompressor-center.com/modules/brand/templates/_menu_brand.tpl',
      1 => 1442305254,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '222674225630be19bb6ec4_28544636',
  'variables' => 
  array (
    'menu' => 0,
    'order' => 0,
    'item' => 0,
    'access_item' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5630be19be5a43_88519123',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5630be19be5a43_88519123')) {
function content_5630be19be5a43_88519123 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '222674225630be19bb6ec4_28544636';
?>
<div class="menu">
    <?php
$_from = $_smarty_tpl->tpl_vars['menu']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item"]->_loop = false;
$_smarty_tpl->tpl_vars["order"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["order"]->value => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars["item"];
if ($_smarty_tpl->tpl_vars['order']->value != 'accesses') {?>
            <?php if (count($_smarty_tpl->tpl_vars['item']->value['catalog']['access'])) {?>
                <ul>
                    <?php
$_from = $_smarty_tpl->tpl_vars['item']->value['catalog']['access'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["access_item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["access_item"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["access_item"]->value) {
$_smarty_tpl->tpl_vars["access_item"]->_loop = true;
$foreach_access_item_Sav = $_smarty_tpl->tpl_vars["access_item"];
?>
                        <?php if ($_smarty_tpl->tpl_vars['access_item']->value['is_menu'] == 1) {?>
                            <li<?php if (strpos($_SERVER['REQUEST_URI'],$_smarty_tpl->tpl_vars['access_item']->value['menu_link']) !== false) {?> class="active"<?php }?>>
                                <?php if (strpos($_SERVER['REQUEST_URI'],$_smarty_tpl->tpl_vars['access_item']->value['menu_link']) !== false) {?><span class="selected" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['access_item']->value['menu_link'];?>
'" style="cursor: pointer"><?php echo $_smarty_tpl->tpl_vars['access_item']->value['title'];?>
</span><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['access_item']->value['menu_link'];?>
"><?php echo $_smarty_tpl->tpl_vars['access_item']->value['title'];?>
</a><?php }?>
                            </li>
                        <?php }?>
                    <?php
$_smarty_tpl->tpl_vars["access_item"] = $foreach_access_item_Sav;
}
?>
                </ul>
    <?php }
}
$_smarty_tpl->tpl_vars["item"] = $foreach_item_Sav;
}
?>
</div><?php }
}
?>