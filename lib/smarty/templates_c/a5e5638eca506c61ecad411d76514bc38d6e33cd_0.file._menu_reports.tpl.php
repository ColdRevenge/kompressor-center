<?php /* Smarty version 3.1.24, created on 2015-09-13 22:05:55
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/reports/templates/_menu_reports.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:198662187655f5c91337f419_83051601%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5e5638eca506c61ecad411d76514bc38d6e33cd' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/reports/templates/_menu_reports.tpl',
      1 => 1440413601,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198662187655f5c91337f419_83051601',
  'variables' => 
  array (
    'is_complected' => 0,
    'admin_url' => 0,
    'is_brand' => 0,
    'is_category' => 0,
    'shop' => 0,
    'is_chars' => 0,
    'is_top' => 0,
    'is_cancel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f5c9133e2956_70732824',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f5c9133e2956_70732824')) {
function content_55f5c9133e2956_70732824 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '198662187655f5c91337f419_83051601';
?>
<div class="menu">
    <ul>
        <li<?php if ($_smarty_tpl->tpl_vars['is_complected']->value == 1) {?> class="active"<?php }?>>
            <?php if ($_smarty_tpl->tpl_vars['is_complected']->value == 1) {?><span class="selected" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
reports/completed/'" style="cursor: pointer">Выполненные заказы</span><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
reports/completed/">Выполненные заказы</a><?php }?>
        </li>
        <li<?php if ($_smarty_tpl->tpl_vars['is_brand']->value == 1) {?> class="active"<?php }?>>
            <?php if ($_smarty_tpl->tpl_vars['is_brand']->value == 1) {?><span class="selected" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
reports/completed/brand/'" style="cursor: pointer">Отчет по брендам</span><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
reports/completed/brand/">Отчет по брендам</a><?php }?>
        </li>
        <li<?php if ($_smarty_tpl->tpl_vars['is_category']->value == 1) {?> class="active"<?php }?>>
            <?php if ($_smarty_tpl->tpl_vars['is_category']->value == 1) {?><span class="selected" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
reports/completed/category/'" style="cursor: pointer">Отчет по категориям</span><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
reports/completed/category/">Отчет по категориям</a><?php }?>
        </li>
        <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady' || $_smarty_tpl->tpl_vars['shop']->value == 'woman') {?>
            <li<?php if ($_smarty_tpl->tpl_vars['is_chars']->value == 1) {?> class="active"<?php }?>>
                <?php if ($_smarty_tpl->tpl_vars['is_chars']->value == 1) {?><span class="selected" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
reports/completed/chars/<?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady') {?>51<?php } else { ?>118<?php }?>/'" style="cursor: pointer">Статистика размеров</span><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
reports/completed/chars/<?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady') {?>51<?php } else { ?>118<?php }?>/">Статистика размеров</a><?php }?>
            </li>
        <?php }?>
        <li<?php if ($_smarty_tpl->tpl_vars['is_top']->value == 1) {?> class="active"<?php }?>>
            <?php if ($_smarty_tpl->tpl_vars['is_top']->value == 1) {?><span class="selected" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
reports/products_top/3/'" style="cursor: pointer">Самые продоваемые</span><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
reports/products_top/3/">Самые продоваемые</a><?php }?>
        </li>
        <li<?php if ($_smarty_tpl->tpl_vars['is_cancel']->value == 1) {?> class="active"<?php }?>>
            <?php if ($_smarty_tpl->tpl_vars['is_cancel']->value == 1) {?><span class="selected" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
reports/history/2/'" style="cursor: pointer">Отмененные заказы</span><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
reports/history/2/">Отмененные заказы</a><?php }?>
        </li>
    </ul>
</div><?php }
}
?>