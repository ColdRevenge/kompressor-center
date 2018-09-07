<?php /* Smarty version 3.1.24, created on 2018-07-02 09:48:07
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/catalog/templates/podbor.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:7062861735b39caa7df66b3_37015848%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ddcebfaa8375a7543c92c7ce20bdef0d124e13ad' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/catalog/templates/podbor.tpl',
      1 => 1530514085,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7062861735b39caa7df66b3_37015848',
  'variables' => 
  array (
    'open_category_id' => 0,
    'base_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39caa7e93f07_57781691',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39caa7e93f07_57781691')) {
function content_5b39caa7e93f07_57781691 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '7062861735b39caa7df66b3_37015848';
?>
<div class="filters">
    <div class="filters__tabs">
        <ul class="filters-tabs">
            <li class="filters-tabs__item <?php if ($_smarty_tpl->tpl_vars['open_category_id']->value == 8 || !in_array($_smarty_tpl->tpl_vars['open_category_id']->value,array(9,43,10,21,16))) {?>_active<?php }?>">
                <a href="#filter-8" class="filters-tabs__link js-filters-tabs-link">
                    <img class="filters-tabs__img" src="/assets/img/tmp/filters/1.png" alt="" />
                    Компрессоры
                </a>
            </li>
            <li class="filters-tabs__item <?php if ($_smarty_tpl->tpl_vars['open_category_id']->value == 9) {?>_active<?php }?>">
                <a href="#filter-9" class="filters-tabs__link js-filters-tabs-link">
                    <img class="filters-tabs__img" src="/assets/img/tmp/filters/2.png" alt="" />
                    Пневмоинструмент
                </a>
            </li>
            <li class="filters-tabs__item <?php if ($_smarty_tpl->tpl_vars['open_category_id']->value == 43) {?>_active<?php }?>">
                <a href="#filter-43" class="filters-tabs__link js-filters-tabs-link">
                    <img class="filters-tabs__img" src="/assets/img/tmp/filters/3.png" alt="" />
                    Осушители
                </a>
            </li>
            <li class="filters-tabs__item <?php if ($_smarty_tpl->tpl_vars['open_category_id']->value == 10) {?>_active<?php }?>">
                <a href="#filter-10" class="filters-tabs__link js-filters-tabs-link">
                    <img class="filters-tabs__img" src="/assets/img/tmp/filters/4.png" alt="" />
                    Ресивер
                </a>
            </li>
            <li class="filters-tabs__item <?php if ($_smarty_tpl->tpl_vars['open_category_id']->value == 21) {?>_active<?php }?>">
                <a href="#filter-21" class="filters-tabs__link js-filters-tabs-link">
                    <img class="filters-tabs__img" src="/assets/img/tmp/filters/5.png" alt="" />
                    Фильтры
                </a>
            </li>
            <li class="filters-tabs__item <?php if ($_smarty_tpl->tpl_vars['open_category_id']->value == 16) {?>_active<?php }?>">
                <a href="#filter-16" class="filters-tabs__link js-filters-tabs-link">
                    <img class="filters-tabs__img" src="/assets/img/tmp/filters/6.png" alt="" />
                    Шланги
                </a>
            </li>
        </ul><!-- /.filters-tabs -->
        <div class="filters-tabs__mobile">
            <a class="filters-tabs__mobile-menu" href="#"><span class="sprite -arrow-down"></span></a>
            <ul class="filters-tabs__mobile-content"></ul>
        </div>
    </div><!-- /.filters__tabs -->
    <div class="filters__content filters-content">
        <div id="filter-8" class="filters-content__block <?php if ($_smarty_tpl->tpl_vars['open_category_id']->value == 8 || !in_array($_smarty_tpl->tpl_vars['open_category_id']->value,array(9,43,10,21,16))) {?>_active<?php }?>">
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/podbor_detailed.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('category_id'=>8), 0);
?>

        </div>
        <div id="filter-9" class="filters-content__block <?php if ($_smarty_tpl->tpl_vars['open_category_id']->value == 9) {?>_active<?php }?>">
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/podbor_detailed.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('category_id'=>9), 0);
?>

        </div>
        <div id="filter-43" class="filters-content__block <?php if ($_smarty_tpl->tpl_vars['open_category_id']->value == 43) {?>_active<?php }?>">
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/podbor_detailed.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('category_id'=>43), 0);
?>

        </div>
        <div id="filter-10" class="filters-content__block <?php if ($_smarty_tpl->tpl_vars['open_category_id']->value == 10) {?>_active<?php }?>">
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/podbor_detailed.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('category_id'=>10), 0);
?>

        </div>
        <div id="filter-21" class="filters-content__block <?php if ($_smarty_tpl->tpl_vars['open_category_id']->value == 21) {?>_active<?php }?>">
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/podbor_detailed.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('category_id'=>21), 0);
?>

        </div>
        <div id="filter-16" class="filters-content__block <?php if ($_smarty_tpl->tpl_vars['open_category_id']->value == 16) {?>_active<?php }?>">
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/podbor_detailed.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('category_id'=>16), 0);
?>

        </div>
    </div><!-- /.filters__content -->
</div><!-- /.filters --><?php }
}
?>