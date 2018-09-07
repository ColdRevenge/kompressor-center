<?php /* Smarty version 3.1.24, created on 2015-09-16 11:57:19
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/products/templates/_menu_products_add.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:111298570855f92eefca9791_44649227%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1d4bace017f39ac18bc31332c1b26849f165fc4' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/products/templates/_menu_products_add.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111298570855f92eefca9791_44649227',
  'variables' => 
  array (
    'admin_url' => 0,
    'category_id' => 0,
    'temp_image_id' => 0,
    'related_products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f92eefcda7e6_79385432',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f92eefcda7e6_79385432')) {
function content_55f92eefcda7e6_79385432 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '111298570855f92eefca9791_44649227';
?>
<ul>
    <li class="active"><span class="selected" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
products/list/0/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/'" style="cursor: pointer">Список товаров</span></li>
</ul>

<br/><br/>
<div>
    <h1>Товары комплекта <br/><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
related/add/0/0/<?php echo $_smarty_tpl->tpl_vars['temp_image_id']->value;?>
/?is_modal=1" rel="related" style="font-size: 15px;">Добавить</a></h1>
</div>
<div id="related_list_menu_0"> <!-- Тип указывать обязательно для обновления ajax //-->
    <?php echo $_smarty_tpl->tpl_vars['related_products']->value;?>

</div>


 
<?php }
}
?>