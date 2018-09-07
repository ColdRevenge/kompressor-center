<?php /* Smarty version 3.1.24, created on 2017-01-27 20:10:21
         compiled from "E:/OpenServer/domains/kc-pskov.dev/modules/catalog/templates/podbor.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:14859588b7efd48c430_72826366%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a226d95e42eb9ac2f19ca08024cb06920c14d4c5' => 
    array (
      0 => 'E:/OpenServer/domains/kc-pskov.dev/modules/catalog/templates/podbor.tpl',
      1 => 1485537020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14859588b7efd48c430_72826366',
  'variables' => 
  array (
    'url' => 0,
    'hide_title' => 0,
    'base_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_588b7efd4d6e65_03864042',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588b7efd4d6e65_03864042')) {
function content_588b7efd4d6e65_03864042 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '14859588b7efd48c430_72826366';
?>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/jqueryui.js"><?php echo '</script'; ?>
>
<?php if (!$_smarty_tpl->tpl_vars['hide_title']->value) {?>
    <h1>Подбор оборудования</h1>
<?php }?>
<div id="tabs-product">

    <div class="tabs-main-arrow" style="left: 69.5px;">&nbsp;</div>

    <div class="tabs-header">
        <div class="active">Компрессоры</div>
        <div class="">Пневмо</div>
        <div class="">Ресивер</div>
        <div class="">Фильтры</div>
        <div class="">Шланги</div>
        <span class="clear"></span>
    </div>

    <div class="tabs-content">
        <div class="active">
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/podbor_detailed.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('category_id'=>8), 0);
?>

        </div>
        <div class="" style="display: none;">
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/podbor_detailed.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('category_id'=>9), 0);
?>

        </div>
        <div class="" style="display: none;">
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/podbor_detailed.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('category_id'=>10), 0);
?>

        </div>
        <div class="" style="display: none;">
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/podbor_detailed.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('category_id'=>21), 0);
?>

        </div>
        <div class="" style="display: none;">
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/podbor_detailed.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('category_id'=>16), 0);
?>

        </div>
    </div>

    <div id="podbor-result">

    </div>

    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function () {
            $('.tabs-header').hover(function () {

            }, function () {
                obj = $('.tabs-header>div.active');
                $('.tabs-main-arrow').animate({
                    left: (12 + obj.position()['left'] + parseInt(obj.css('width')) / 2)
                });
            })
            $('.tabs-header>div').hover(function () {
                obj = $(this);
                $('.tabs-main-arrow').animate({
                    left: (12 + obj.position()['left'] + parseInt(obj.css('width')) / 2)
                });
            }, function () {

            })
            $('.tabs-header>div').click(function () {
                obj = $(this);

                $('.tabs-main-arrow').animate({
                    left: (12 + obj.position()['left'] + parseInt(obj.css('width')) / 2)
                });

                tab_num = $(this).index();
                $('.tabs-header>div.active').removeClass('active');
                $(this).addClass('active');
                $('.tabs-content>div').hide();
                $('.tabs-content>div').eq(tab_num).fadeIn('fast');
            });
        });
    <?php echo '</script'; ?>
>

</div><?php }
}
?>