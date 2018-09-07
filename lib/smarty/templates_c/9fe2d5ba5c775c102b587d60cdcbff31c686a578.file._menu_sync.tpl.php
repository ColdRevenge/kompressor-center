<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-27 19:26:16
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/sync/templates/_menu_sync.tpl" */ ?>
<?php /*%%SmartyHeaderCode:179550705055df3a28957891-39225568%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9fe2d5ba5c775c102b587d60cdcbff31c686a578' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/sync/templates/_menu_sync.tpl',
      1 => 1423307976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179550705055df3a28957891-39225568',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu' => 0,
    'order' => 0,
    'item' => 0,
    'access_item' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55df3a289a4ef7_20100829',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55df3a289a4ef7_20100829')) {function content_55df3a289a4ef7_20100829($_smarty_tpl) {?><div class="menu">
    <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_smarty_tpl->tpl_vars["order"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
 $_smarty_tpl->tpl_vars["order"]->value = $_smarty_tpl->tpl_vars["item"]->key;
if ($_smarty_tpl->tpl_vars['order']->value!='accesses') {?>
            <?php if (count($_smarty_tpl->tpl_vars['item']->value['discount']['access'])) {?>
                
                <ul>
                    <?php  $_smarty_tpl->tpl_vars["access_item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["access_item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['discount']['access']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["access_item"]->key => $_smarty_tpl->tpl_vars["access_item"]->value) {
$_smarty_tpl->tpl_vars["access_item"]->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['access_item']->value['is_menu']==1) {?>
                            <li<?php if (strpos($_SERVER['REQUEST_URI'],$_smarty_tpl->tpl_vars['access_item']->value['menu_link'])!==false) {?> class="active"<?php }?>>
                                <?php if (strpos($_SERVER['REQUEST_URI'],$_smarty_tpl->tpl_vars['access_item']->value['menu_link'])!==false) {?><span class="selected" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['access_item']->value['menu_link'];?>
'" style="cursor: pointer"><?php echo $_smarty_tpl->tpl_vars['access_item']->value['title'];?>
</span><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['access_item']->value['menu_link'];?>
"><?php echo $_smarty_tpl->tpl_vars['access_item']->value['title'];?>
</a><?php }?>
                            </li>
                        <?php }?>
                    <?php } ?>
                </ul>
    <?php }
}
} ?>
</div> <?php }} ?>
