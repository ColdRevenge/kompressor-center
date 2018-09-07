<?php /* Smarty version 3.1.24, created on 2016-05-04 14:34:52
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/brand/templates/_menu_brand.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3360731385729de5c199c85_82188619%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4eef972b74a946c35ad51d8d3c31a05135f7c4a5' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/brand/templates/_menu_brand.tpl',
      1 => 1450788654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3360731385729de5c199c85_82188619',
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
  'unifunc' => 'content_5729de5c1e98d2_24062831',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5729de5c1e98d2_24062831')) {
function content_5729de5c1e98d2_24062831 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3360731385729de5c199c85_82188619';
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