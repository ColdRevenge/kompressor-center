<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-22 20:16:29
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/category/templates/menu_catalog_podbor_lady.tpl" */ ?>
<?php /*%%SmartyHeaderCode:118974349255d4698bef4d36-82461111%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76e892fd570155f7dbcc24e708f3c31b14a9107f' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/category/templates/menu_catalog_podbor_lady.tpl',
      1 => 1440263783,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118974349255d4698bef4d36-82461111',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d4698c02a6b6_57758510',
  'variables' => 
  array (
    'open_category_id' => 0,
    'shop' => 0,
    'size_char_id' => 0,
    'selected_char_value_id' => 0,
    'url' => 0,
    'category_adress' => 0,
    'chars_menu' => 0,
    'char_menu' => 0,
    'char_valur_id' => 0,
    'char_pseudo_dir' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4698c02a6b6_57758510')) {function content_55d4698c02a6b6_57758510($_smarty_tpl) {?><?php $_smarty_tpl->assign("category_adress",$_smarty_tpl->smarty->registered_objects['this'][0]->getCategoryAdress(array('category_id'=>$_smarty_tpl->tpl_vars['open_category_id']->value),$_smarty_tpl));?>


<?php if ($_smarty_tpl->tpl_vars['shop']->value=='woman') {?>
    <?php $_smarty_tpl->tpl_vars["size_char_id"] = new Smarty_variable("118", null, 0);?>
<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value=='lady') {?>
    <?php $_smarty_tpl->tpl_vars["size_char_id"] = new Smarty_variable("51", null, 0);?>
<?php }?>

<?php $_smarty_tpl->assign("chars_menu",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>$_smarty_tpl->tpl_vars['size_char_id']->value,'sort'=>'1'),$_smarty_tpl));?>

<?php $_smarty_tpl->assign("char_pseudo_dir",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharacteristicPseudoDir(array('char_id'=>$_smarty_tpl->tpl_vars['size_char_id']->value),$_smarty_tpl));?>


<ul>
    <li<?php if (!(count($_smarty_tpl->tpl_vars['selected_char_value_id']->value))) {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;?>
">Все размеры</a></li>

    <?php  $_smarty_tpl->tpl_vars["char_menu"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["char_menu"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chars_menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["char_menu"]->key => $_smarty_tpl->tpl_vars["char_menu"]->value) {
$_smarty_tpl->tpl_vars["char_menu"]->_loop = true;
?>
        <?php $_smarty_tpl->tpl_vars["char_valur_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['char_menu']->value->id, null, 0);?>

        <?php $_smarty_tpl->assign("desc_checker",$_smarty_tpl->smarty->registered_objects['this'][0]->getCheckerCharDesc(array('category_id'=>$_smarty_tpl->tpl_vars['open_category_id']->value,'char_value_id'=>$_smarty_tpl->tpl_vars['char_valur_id']->value,'char_value_2_id'=>0,'char_value_3_id'=>0,'char_value_4_id'=>0),$_smarty_tpl));?>


        <li<?php if ($_smarty_tpl->tpl_vars['selected_char_value_id']->value[$_smarty_tpl->tpl_vars['char_valur_id']->value]=='1') {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;?>
char/<?php echo $_smarty_tpl->tpl_vars['char_pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['char_menu']->value->pseudo_dir;?>
/">Размер <?php echo stripslashes($_smarty_tpl->tpl_vars['char_menu']->value->name);?>
</a></li>
    <?php } ?></ul>
<?php }} ?>
