<?php /* Smarty version 3.1.24, created on 2017-02-03 00:19:17
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/products/templates/_menu_products_add.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2946311065893a25592b297_46312466%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a77bcd34ee0114952565bf80edf9a8f9ed30efc' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/products/templates/_menu_products_add.tpl',
      1 => 1485559671,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2946311065893a25592b297_46312466',
  'variables' => 
  array (
    'admin_url' => 0,
    'category_id' => 0,
    'temp_image_id' => 0,
    'related_products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5893a255979f97_43746627',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5893a255979f97_43746627')) {
function content_5893a255979f97_43746627 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2946311065893a25592b297_46312466';
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