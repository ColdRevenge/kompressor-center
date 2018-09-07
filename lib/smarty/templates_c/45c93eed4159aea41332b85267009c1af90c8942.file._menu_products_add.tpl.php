<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 11:53:22
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/products/templates/_menu_products_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12584837955d46a664199c6-61821577%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45c93eed4159aea41332b85267009c1af90c8942' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/products/templates/_menu_products_add.tpl',
      1 => 1440060624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12584837955d46a664199c6-61821577',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d46a6642a7e7_36879893',
  'variables' => 
  array (
    'admin_url' => 0,
    'category_id' => 0,
    'temp_image_id' => 0,
    'related_products' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d46a6642a7e7_36879893')) {function content_55d46a6642a7e7_36879893($_smarty_tpl) {?><ul>
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


 
<?php }} ?>
