<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 14:32:59
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/catalog/templates/navigation_pages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197779214655d4696b83f4c9-07318695%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c040577d7a507f1692f7a66cd4f860027493584e' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/catalog/templates/navigation_pages.tpl',
      1 => 1435831508,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197779214655d4696b83f4c9-07318695',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'count_products' => 0,
    'visible_count_page' => 0,
    'select_page' => 0,
    'url' => 0,
    'catalog_dir' => 0,
    'pseudo_dir' => 0,
    'is_selection_find' => 0,
    'is_brand' => 0,
    'param_tpl' => 0,
    'catalog' => 0,
    'navigation_param' => 0,
    'char_adress' => 0,
    'is_scrool' => 0,
    'iteration' => 0,
    'tmp_left_page' => 0,
    'visible_page' => 0,
    'start' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d4696ba5b682_15151805',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4696ba5b682_15151805')) {function content_55d4696ba5b682_15151805($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><?php if ($_smarty_tpl->tpl_vars['count_products']->value>1) {?>
    <ul> 
        
        
        <?php $_smarty_tpl->tpl_vars["visible_count_page"] = new Smarty_variable("12", null, 0);?> 

        <?php if ($_smarty_tpl->tpl_vars['visible_count_page']->value>=$_smarty_tpl->tpl_vars['count_products']->value) {?> 
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["page"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['count_products']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['name'] = "page";
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total']);
?>
                    <?php if ($_smarty_tpl->tpl_vars['select_page']->value==$_smarty_tpl->getVariable('smarty')->value['section']['page']['index']) {?>
                        <li class="active"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['page']['iteration'];?>
</li>
                        <?php } else { ?>
                        <li><a href="javascript:void(0)" onclick="AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
if ($_GET['is_category_brand_id']) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/category/<?php echo $_smarty_tpl->tpl_vars['pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/?<?php } elseif ($_smarty_tpl->tpl_vars['is_selection_find']->value==1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/?params=<?php echo urldecode(smarty_modifier_replace(serialize($_POST),'"','@@@@'));?>
&<?php } elseif ($_smarty_tpl->tpl_vars['is_brand']->value==1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['brand'];?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php echo $_smarty_tpl->tpl_vars['catalog']->value->id;?>
/?<?php } elseif ($_smarty_tpl->tpl_vars['navigation_param']->value) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/get-product/<?php echo $_smarty_tpl->tpl_vars['navigation_param']->value;?>
/<?php } else {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/id/<?php echo $_smarty_tpl->tpl_vars['catalog']->value->id;?>
/?<?php }
if ($_smarty_tpl->tpl_vars['char_adress']->value) {?>char_adress=<?php echo urldecode($_smarty_tpl->tpl_vars['char_adress']->value);?>
&<?php }?>page=<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['page']['index'];
if ($_GET['brand_id']) {?>&brand_id=<?php echo $_GET['brand_id'];
}?>', '#indicator_catalog');<?php if ($_smarty_tpl->tpl_vars['is_scrool']->value==1) {?>jQuery.scrollTo('#left_box', 1200);<?php }?>"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['page']['iteration'];?>
</a></li>
                        <?php }?>
                    <?php endfor; endif; ?>
                <?php } else { ?>


                <?php if ($_smarty_tpl->tpl_vars['select_page']->value>=7&&!($_smarty_tpl->tpl_vars['select_page']->value<$_smarty_tpl->tpl_vars['count_products']->value-6)) {?> 
                        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["page"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop'] = is_array($_loop=2) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['name'] = "page";
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'] = (int) 0;
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total']);
?>
                            <?php $_smarty_tpl->tpl_vars["iteration"] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['page']['index']+1, null, 0);?> 
                            <li><a href="javascript:void(0)" onclick="AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
if ($_GET['is_category_brand_id']) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/category/<?php echo $_smarty_tpl->tpl_vars['pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/?<?php } elseif ($_smarty_tpl->tpl_vars['is_selection_find']->value==1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/?params=<?php echo urldecode(smarty_modifier_replace(serialize($_POST),'"','@@@@'));?>
&<?php } elseif ($_smarty_tpl->tpl_vars['is_brand']->value==1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['brand'];?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php echo $_smarty_tpl->tpl_vars['catalog']->value->id;?>
/?<?php } elseif ($_smarty_tpl->tpl_vars['navigation_param']->value) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/get-product/<?php echo $_smarty_tpl->tpl_vars['navigation_param']->value;?>
/?<?php } else {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/id/<?php echo $_smarty_tpl->tpl_vars['catalog']->value->id;?>
/?<?php }
if ($_smarty_tpl->tpl_vars['char_adress']->value) {?>char_adress=<?php echo urldecode($_smarty_tpl->tpl_vars['char_adress']->value);?>
&<?php }?>page=<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['page']['index'];
if ($_GET['brand_id']) {?>&brand_id=<?php echo $_GET['brand_id'];
}?>', '#indicator_catalog');"><?php echo $_smarty_tpl->tpl_vars['iteration']->value;?>
</a></li>
                            <?php endfor; endif; ?>
                        ...
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['select_page']->value<$_smarty_tpl->tpl_vars['count_products']->value-6) {?>
                        <?php $_smarty_tpl->tpl_vars["visible_page"] = new Smarty_variable(7, null, 0);?> 
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars["visible_page"] = new Smarty_variable(9, null, 0);?> 
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['select_page']->value>2) {?>
                        <?php $_smarty_tpl->tpl_vars["tmp_left_page"] = new Smarty_variable(3, null, 0);?> 
                        <?php $_smarty_tpl->tpl_vars["start"] = new Smarty_variable($_smarty_tpl->tpl_vars['select_page']->value-$_smarty_tpl->tpl_vars['tmp_left_page']->value, null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars["start"] = new Smarty_variable(0, null, 0);?>  
                        <?php $_smarty_tpl->tpl_vars["tmp_left_page"] = new Smarty_variable($_smarty_tpl->tpl_vars['select_page']->value, null, 0);?>
                    <?php }?>
                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["page"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['select_page']->value+$_smarty_tpl->tpl_vars['visible_page']->value-$_smarty_tpl->tpl_vars['tmp_left_page']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['name'] = "page";
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'] = (int) $_smarty_tpl->tpl_vars['start']->value;
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total']);
?>
                        <?php $_smarty_tpl->tpl_vars["iteration"] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['page']['index']+1, null, 0);?> 
                        <?php if ($_smarty_tpl->tpl_vars['iteration']->value<=$_smarty_tpl->tpl_vars['count_products']->value) {?>
                            <?php if ($_smarty_tpl->tpl_vars['select_page']->value==$_smarty_tpl->tpl_vars['iteration']->value-1) {?>
                                <li class="active"><?php echo $_smarty_tpl->tpl_vars['iteration']->value;?>
</li>
                                <?php } else { ?>
                                <li><a href="javascript:void(0)" onclick="AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
if ($_GET['is_category_brand_id']) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/category/<?php echo $_smarty_tpl->tpl_vars['pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/?<?php } elseif ($_smarty_tpl->tpl_vars['is_selection_find']->value==1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/?params=<?php echo urldecode(smarty_modifier_replace(serialize($_POST),'"','@@@@'));?>
&<?php } elseif ($_smarty_tpl->tpl_vars['is_brand']->value==1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['brand'];?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php echo $_smarty_tpl->tpl_vars['catalog']->value->id;?>
/?<?php } elseif ($_smarty_tpl->tpl_vars['navigation_param']->value) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/get-product/<?php echo $_smarty_tpl->tpl_vars['navigation_param']->value;?>
/?<?php } else {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/id/<?php echo $_smarty_tpl->tpl_vars['catalog']->value->id;?>
/?<?php }
if ($_smarty_tpl->tpl_vars['char_adress']->value) {?>char_adress=<?php echo urldecode($_smarty_tpl->tpl_vars['char_adress']->value);?>
&<?php }?>page=<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['page']['index'];?>
', '#indicator_catalog');"><?php echo $_smarty_tpl->tpl_vars['iteration']->value;?>
</a></li>
                                <?php }?>
                            <?php }?>
                        <?php endfor; endif; ?>
                        <?php if ($_smarty_tpl->tpl_vars['select_page']->value<$_smarty_tpl->tpl_vars['count_products']->value-6) {?>
                        ...
                        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["page"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['count_products']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['name'] = "page";
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'] = (int) $_smarty_tpl->tpl_vars['count_products']->value-2;
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total']);
?>
                            <?php $_smarty_tpl->tpl_vars["iteration"] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['page']['index']+1, null, 0);?> 
                            <li><a href="javascript:void(0)" onclick="AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
if ($_GET['is_category_brand_id']) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/category/<?php echo $_smarty_tpl->tpl_vars['pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/?<?php } elseif ($_smarty_tpl->tpl_vars['is_selection_find']->value==1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/?params=<?php echo urldecode(smarty_modifier_replace(serialize($_POST),'"','@@@@'));?>
&<?php } elseif ($_smarty_tpl->tpl_vars['is_brand']->value==1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['brand'];?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php echo $_smarty_tpl->tpl_vars['catalog']->value->id;?>
/?<?php } elseif ($_smarty_tpl->tpl_vars['navigation_param']->value) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/get-product/<?php echo $_smarty_tpl->tpl_vars['navigation_param']->value;?>
/?<?php } else {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/id/<?php echo $_smarty_tpl->tpl_vars['catalog']->value->id;?>
/?<?php }
if ($_smarty_tpl->tpl_vars['char_adress']->value) {?>char_adress=<?php echo urldecode($_smarty_tpl->tpl_vars['char_adress']->value);?>
&<?php }?>page=<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['page']['index'];
if ($_GET['brand_id']) {?>&brand_id=<?php echo $_GET['brand_id'];
}?>', '#indicator_catalog');"><?php echo $_smarty_tpl->tpl_vars['iteration']->value;?>
</a></li>
                            <?php endfor; endif; ?>
                        <?php }?>
                    <?php }?>
                    
            </ul> 
        <?php }?><?php }} ?>
