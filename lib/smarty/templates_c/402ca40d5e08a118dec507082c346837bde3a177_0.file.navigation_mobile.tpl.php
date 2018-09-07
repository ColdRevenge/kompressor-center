<?php /* Smarty version 3.1.24, created on 2015-09-13 16:03:05
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/catalog/templates/navigation_mobile.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:453505855f57409266190_67695849%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '402ca40d5e08a118dec507082c346837bde3a177' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/catalog/templates/navigation_mobile.tpl',
      1 => 1435691551,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '453505855f57409266190_67695849',
  'variables' => 
  array (
    'not_sort' => 0,
    'count_products' => 0,
    'url' => 0,
    'catalog_dir' => 0,
    'pseudo_dir' => 0,
    'select_page' => 0,
    'is_selection_find' => 0,
    'is_brand' => 0,
    'param_tpl' => 0,
    'catalog' => 0,
    'char_adress' => 0,
    'sort_method' => 0,
    'navigation_param' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f574093056a8_52321024',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f574093056a8_52321024')) {
function content_55f574093056a8_52321024 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '453505855f57409266190_67695849';
if ($_smarty_tpl->tpl_vars['not_sort']->value == '' && $_smarty_tpl->tpl_vars['not_sort']->value != 1 && $_smarty_tpl->tpl_vars['count_products']->value > 0 && $_GET['not_detailed_catalog'] != 1) {?>
    <div class="navigation">
        <div class="sorting">
            <select onchange="AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
if ($_GET['is_category_brand_id']) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/category/<?php echo $_smarty_tpl->tpl_vars['pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php } elseif ($_smarty_tpl->tpl_vars['is_selection_find']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/?params=<?php echo urldecode(smarty_modifier_replace(serialize($_POST),'"','@@@@'));?>
&sort=' + $(this).find('option:selected').val() + '&page=<?php echo $_smarty_tpl->tpl_vars['select_page']->value;
} elseif ($_smarty_tpl->tpl_vars['is_brand']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['brand'];?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php } else {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/id/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php }?>?sort=' + $(this).find('option:selected').val() + '&<?php if ($_smarty_tpl->tpl_vars['char_adress']->value) {?>char_adress=<?php echo urldecode($_smarty_tpl->tpl_vars['char_adress']->value);?>
&<?php }?>page=<?php echo $_smarty_tpl->tpl_vars['select_page']->value;?>
'<?php if ($_smarty_tpl->tpl_vars['sort_method']->value == 'price') {?> + '&order=' + $('#sorting_sort').val()<?php }?>, '#indicator_catalog');">
                <option value="price" <?php if ($_smarty_tpl->tpl_vars['sort_method']->value == 'price') {?>selected="selected"<?php }?>>По цене</option>
                <option value="name" <?php if ($_smarty_tpl->tpl_vars['sort_method']->value == 'name') {?>selected="selected"<?php }?>>По названию</option>
                <option value="order" <?php if ($_smarty_tpl->tpl_vars['sort_method']->value == 'order') {?>selected="selected"<?php }?>>По популярности</option>
            </select>
            <input type="hidden" value="<?php if ($_smarty_tpl->tpl_vars['sort_method']->value == 'price') {?>price<?php } elseif ($_smarty_tpl->tpl_vars['sort_method']->value == 'name') {?>name<?php } elseif ($_smarty_tpl->tpl_vars['sort_method']->value == 'order') {?>order<?php }?>" id="sorting_name" />
            <input type="hidden" value="asc" id="sorting_sort" />
        </div>
        <div class="pages">
            <?php if ($_smarty_tpl->tpl_vars['count_products']->value > 1) {?>
                <select onchange="AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
if ($_GET['is_category_brand_id']) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/category/<?php echo $_smarty_tpl->tpl_vars['pseudo_dir']->value;?>
/' + $(this).find('option:selected').val() + '/?<?php } elseif ($_smarty_tpl->tpl_vars['is_selection_find']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/?params=<?php echo urldecode(smarty_modifier_replace(serialize($_POST),'"','@@@@'));?>
&<?php } elseif ($_smarty_tpl->tpl_vars['is_brand']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['brand'];?>
/' + $(this).find('option:selected').val() + '/<?php echo $_smarty_tpl->tpl_vars['catalog']->value->id;?>
/?<?php } elseif ($_smarty_tpl->tpl_vars['navigation_param']->value) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/get-product/<?php echo $_smarty_tpl->tpl_vars['navigation_param']->value;?>
/<?php } else {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/id/<?php echo $_smarty_tpl->tpl_vars['catalog']->value->id;?>
/?<?php }
if ($_smarty_tpl->tpl_vars['char_adress']->value) {?>char_adress=<?php echo urldecode($_smarty_tpl->tpl_vars['char_adress']->value);?>
&<?php }?>page=' + $(this).find('option:selected').val() + '<?php if ($_GET['brand_id']) {?>&brand_id=<?php echo $_GET['brand_id'];
}?>', '#indicator_catalog');">
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
                        <option value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['page']['index'];?>
"<?php if ($_smarty_tpl->tpl_vars['select_page']->value == $_smarty_tpl->getVariable('smarty')->value['section']['page']['index']) {?> selected="selected"<?php }?>>Страница <?php echo $_smarty_tpl->getVariable('smarty')->value['section']['page']['iteration'];?>
</option>
                    <?php endfor; endif; ?>
                </select>
            <?php }?>
        </div>


        <div class="clear">&nbsp;</div>
    </div>
<?php }
}
}
?>