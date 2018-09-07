<?php /* Smarty version 3.1.24, created on 2015-09-13 17:02:27
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/_menu_products_add.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:131024587055f581f35733b0_86449494%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c636d2d053c8bf3578020939622dd33a2f5871f7' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/_menu_products_add.tpl',
      1 => 1440060624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131024587055f581f35733b0_86449494',
  'variables' => 
  array (
    'admin_url' => 0,
    'category_id' => 0,
    'temp_image_id' => 0,
    'related_products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f581f357c482_94011952',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f581f357c482_94011952')) {
function content_55f581f357c482_94011952 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '131024587055f581f35733b0_86449494';
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