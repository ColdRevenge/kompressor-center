<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-26 12:46:02
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/forum/templates/forum_main_category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24088917855dc59a7085400-84179284%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14dca3304c29ca796a3f70bb8ad8b9d14a540731' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/forum/templates/forum_main_category.tpl',
      1 => 1440582349,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24088917855dc59a7085400-84179284',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55dc59a70b4c57_70474229',
  'variables' => 
  array (
    'id' => 0,
    'menu_forum' => 0,
    'icategory_child' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55dc59a70b4c57_70474229')) {function content_55dc59a70b4c57_70474229($_smarty_tpl) {?><?php if (count($_smarty_tpl->tpl_vars['menu_forum']->value[$_smarty_tpl->tpl_vars['id']->value])) {?>
    <ul>
        <?php  $_smarty_tpl->tpl_vars["icategory_child"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["icategory_child"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_forum']->value[$_smarty_tpl->tpl_vars['id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["icategory_child"]->key => $_smarty_tpl->tpl_vars["icategory_child"]->value) {
$_smarty_tpl->tpl_vars["icategory_child"]->_loop = true;
?>

            <?php if ($_smarty_tpl->tpl_vars['icategory_child']->value->is_visible==1) {?>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['icategory_child']->value->category_pseudo_dir;?>
/" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['icategory_child']->value->name);?>
">
                        <?php echo stripslashes($_smarty_tpl->tpl_vars['icategory_child']->value->name);?>

                    </a>
                        <?php if ($_smarty_tpl->tpl_vars['icategory_child']->value->param_str_1) {?><div class="notice"><?php echo $_smarty_tpl->tpl_vars['icategory_child']->value->param_str_1;?>
</div><?php }?>
                    <?php echo $_smarty_tpl->getSubTemplate ("forum_main_category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>$_smarty_tpl->tpl_vars['icategory_child']->value->id), 0);?>

                </li>
            <?php }?>
        <?php } ?>
    </ul>
<?php }?><?php }} ?>
