<?php /* Smarty version 3.1.24, created on 2015-09-15 10:39:40
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/_clear_category/templates/_menu_clear.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:157288668555f7cb3c00f2a2_70909621%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed5060c47c83119bccb0f819ad80b5c8ba64fd56' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/_clear_category/templates/_menu_clear.tpl',
      1 => 1423307978,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157288668555f7cb3c00f2a2_70909621',
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
  'unifunc' => 'content_55f7cb3c049c96_03596521',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f7cb3c049c96_03596521')) {
function content_55f7cb3c049c96_03596521 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '157288668555f7cb3c00f2a2_70909621';
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
</div> <?php }
}
?>