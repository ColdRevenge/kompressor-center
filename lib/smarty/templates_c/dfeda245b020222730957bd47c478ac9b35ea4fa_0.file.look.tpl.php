<?php /* Smarty version 3.1.24, created on 2017-01-29 12:29:54
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/news/templates/look.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:740401587588db6123bf249_63061842%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfeda245b020222730957bd47c478ac9b35ea4fa' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/news/templates/look.tpl',
      1 => 1485559659,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '740401587588db6123bf249_63061842',
  'variables' => 
  array (
    'news' => 0,
    'is_mobile' => 0,
    'item_news' => 0,
    'month' => 0,
    'month_int' => 0,
    'months' => 0,
    'base_dir' => 0,
    'products' => 0,
    'product_images' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_588db6124f33b1_07127772',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588db6124f33b1_07127772')) {
function content_588db6124f33b1_07127772 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/user-kc-pskov/data/www/kc-pskov.ru/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '740401587588db6123bf249_63061842';
?>

<?php
$_from = $_smarty_tpl->tpl_vars['news']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item_news"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item_news"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["item_news"]->value) {
$_smarty_tpl->tpl_vars["item_news"]->_loop = true;
$foreach_item_news_Sav = $_smarty_tpl->tpl_vars["item_news"];
?>
    <?php if ($_smarty_tpl->tpl_vars['is_mobile']->value == 1) {?>
        <div class="breadcrumbs-block">
            <div id="bread-back"><a href="/novosti/">Назад</a></div>
            <h1><?php echo stripslashes($_smarty_tpl->tpl_vars['item_news']->value->name);?>
</h1>
            <div class="clear">&nbsp;</div>
        </div>
    <?php } else { ?>
        <div class="breadcrumbs-block">
            <ul>
                <li><a href="/">Главная</a><span>/</span></li>
                <li><a href="/<?php if ($_smarty_tpl->tpl_vars['news']->value[0]->type == 1) {?>novosti<?php } elseif ($_smarty_tpl->tpl_vars['news']->value[0]->type == 3) {?>stati<?php } elseif ($_smarty_tpl->tpl_vars['news']->value[0]->type == 4) {?>Мнения профессионалов<?php }?>/"><?php if ($_smarty_tpl->tpl_vars['news']->value[0]->type == 1) {?>Новости<?php } elseif ($_smarty_tpl->tpl_vars['news']->value[0]->type == 3) {?>Статьи<?php } elseif ($_smarty_tpl->tpl_vars['news']->value[0]->type == 4) {?>Мнения профессионалов<?php }?></a><span>/</span></li>
                <li><?php echo stripslashes($_smarty_tpl->tpl_vars['item_news']->value->name);?>
</li>
            </ul>
        </div>
        <h1><?php echo stripslashes($_smarty_tpl->tpl_vars['item_news']->value->name);?>
</h1>
    <?php }?>

    
    <div class="text">
   
        <?php $_smarty_tpl->tpl_vars["month"] = new Smarty_Variable(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item_news']->value->date,"%m"), null, 0);?>
        <?php $_smarty_tpl->tpl_vars["month_int"] = new Smarty_Variable($_smarty_tpl->tpl_vars['month']->value*1-1, null, 0);?>
        <?php $_smarty_tpl->tpl_vars["month_int_0"] = new Smarty_Variable($_smarty_tpl->tpl_vars['month']->value*1, null, 0);?>
        <div class="news_look">
            <div class="text-page">
                <?php if ($_smarty_tpl->tpl_vars['is_mobile']->value != 1) {?>
                    <div class="date" style="color: gray; font-size: 13px;  font-weight: normal;margin-bottom: 7px;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item_news']->value->date,"%d");?>
 <?php echo $_smarty_tpl->tpl_vars['months']->value[$_smarty_tpl->tpl_vars['month_int']->value];?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item_news']->value->date,"%Y");?>
</div>
                <?php }?>
                <?php echo $_smarty_tpl->tpl_vars['item_news']->value->text;?>



            </div>
        </div>

    </div>

<?php
$_smarty_tpl->tpl_vars["item_news"] = $foreach_item_news_Sav;
}
?>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).('modules/catalog/templates/getProduct.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('products'=>$_smarty_tpl->tpl_vars['products']->value,'product_images'=>$_smarty_tpl->tpl_vars['product_images']->value), 0);
?>



<br/>
<div style="margin: 10px auto;text-align: center;">
  
    
    <?php if ($_smarty_tpl->tpl_vars['news']->value[0]->type == 1) {?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
novosti/" class="font-data">Вернуться</a>
    <?php } elseif ($_smarty_tpl->tpl_vars['news']->value[0]->type == 3) {?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
stati/" class="font-data">Вернуться</a>
    <?php } elseif ($_smarty_tpl->tpl_vars['news']->value[0]->type == 4) {?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
page/mneniya-professionalov/" class="font-data">Вернуться</a>
    <?php }?>

</div><?php }
}
?>