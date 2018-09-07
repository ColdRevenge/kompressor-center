<?php /* Smarty version 3.1.24, created on 2015-09-15 18:31:38
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/users/templates/_menu_user.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1919438255f839daa1e7a9_68425573%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4bdc8b7136f82011e37c146cbcaf43ed583ecfd' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/users/templates/_menu_user.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1919438255f839daa1e7a9_68425573',
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
  'unifunc' => 'content_55f839daa54335_50782596',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f839daa54335_50782596')) {
function content_55f839daa54335_50782596 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1919438255f839daa1e7a9_68425573';
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
            <?php if (count($_smarty_tpl->tpl_vars['item']->value['setting']['access'])) {?>
                <ul>
                    <?php
$_from = $_smarty_tpl->tpl_vars['item']->value['setting']['access'];
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