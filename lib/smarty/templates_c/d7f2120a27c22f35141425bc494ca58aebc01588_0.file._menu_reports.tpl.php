<?php /* Smarty version 3.1.24, created on 2015-10-28 15:22:09
         compiled from "/home/c10045/public_html/kompressor-center.com/modules/reports/templates/_menu_reports.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:8888919245630bdf1a39ae8_19824642%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7f2120a27c22f35141425bc494ca58aebc01588' => 
    array (
      0 => '/home/c10045/public_html/kompressor-center.com/modules/reports/templates/_menu_reports.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8888919245630bdf1a39ae8_19824642',
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
  'unifunc' => 'content_5630bdf1a7f547_74311807',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5630bdf1a7f547_74311807')) {
function content_5630bdf1a7f547_74311807 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '8888919245630bdf1a39ae8_19824642';
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