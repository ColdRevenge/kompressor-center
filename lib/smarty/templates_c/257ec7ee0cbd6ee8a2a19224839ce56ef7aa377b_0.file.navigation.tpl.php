<?php /* Smarty version 3.1.24, created on 2015-09-16 13:03:21
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/catalog/templates/navigation.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:153155148455f93e69d80488_23005273%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '257ec7ee0cbd6ee8a2a19224839ce56ef7aa377b' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/catalog/templates/navigation.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153155148455f93e69d80488_23005273',
  'variables' => 
  array (
    'not_sort' => 0,
    'count_products' => 0,
    'sort_method' => 0,
    'url' => 0,
    'catalog_dir' => 0,
    'pseudo_dir' => 0,
    'select_page' => 0,
    'is_selection_find' => 0,
    'is_brand' => 0,
    'param_tpl' => 0,
    'catalog' => 0,
    'char_adress' => 0,
    'sort_order' => 0,
    'sys_images_url' => 0,
    'count_all_products' => 0,
    'template_products_catalog' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f93e6a15bc34_47122619',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f93e6a15bc34_47122619')) {
function content_55f93e6a15bc34_47122619 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/home/admin/domains/coralmedia.ru/public_html/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '153155148455f93e69d80488_23005273';
if ($_smarty_tpl->tpl_vars['not_sort']->value == '' && $_smarty_tpl->tpl_vars['not_sort']->value != 1 && $_smarty_tpl->tpl_vars['count_products']->value > 0 && $_GET['not_detailed_catalog'] != 1) {?>
    <div class="navigation">
        <div class="sorting">
            <span>Сортировать по: &nbsp;</span><div class="sorting_border">
                <a href="javascript:void(0)" <?php if ($_smarty_tpl->tpl_vars['sort_method']->value == 'price') {?>class="active"<?php }?> onclick="AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
if ($_GET['is_category_brand_id']) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/category/<?php echo $_smarty_tpl->tpl_vars['pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php } elseif ($_smarty_tpl->tpl_vars['is_selection_find']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/?params=<?php echo urldecode(smarty_modifier_replace(serialize($_POST),'"','@@@@'));?>
&sort=price&page=<?php echo $_smarty_tpl->tpl_vars['select_page']->value;
} elseif ($_smarty_tpl->tpl_vars['is_brand']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['brand'];?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php } else {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/id/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php }?>?sort=price&<?php if ($_smarty_tpl->tpl_vars['char_adress']->value) {?>char_adress=<?php echo urldecode($_smarty_tpl->tpl_vars['char_adress']->value);?>
&<?php }?>page=<?php echo $_smarty_tpl->tpl_vars['select_page']->value;?>
'<?php if ($_smarty_tpl->tpl_vars['sort_method']->value == 'price') {?> + '&order=' + $('#sorting_sort').val()<?php }?>, '#indicator_catalog');">цене</a> 
                <?php if ($_smarty_tpl->tpl_vars['sort_method']->value == 'price') {?>
                    <img src="<?php if ($_smarty_tpl->tpl_vars['sort_order']->value == 'desc') {
echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
arrow-desc.png<?php } else {
echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
arrow-asc.png<?php }?>" alt="" onclick="AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
if ($_GET['is_category_brand_id']) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/category/<?php echo $_smarty_tpl->tpl_vars['pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php } elseif ($_smarty_tpl->tpl_vars['is_selection_find']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/?params=<?php echo urldecode(smarty_modifier_replace(serialize($_POST),'"','@@@@'));?>
&sort=' + $('#sorting_name').val() + '&order=' + $('#sorting_sort').val() + '&page=<?php echo $_smarty_tpl->tpl_vars['select_page']->value;
} elseif ($_smarty_tpl->tpl_vars['is_brand']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['brand'];?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php } else {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/id/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php }?>?sort=' + $('#sorting_name').val() + '&order=' + $('#sorting_sort').val() + '&<?php if ($_smarty_tpl->tpl_vars['char_adress']->value) {?>char_adress=<?php echo urldecode($_smarty_tpl->tpl_vars['char_adress']->value);?>
&<?php }?>page=<?php echo $_smarty_tpl->tpl_vars['select_page']->value;?>
', '#indicator_catalog');" />
                <?php }?>
            </div><div class="sorting_border">
                <a href="javascript:void(0)" <?php if ($_smarty_tpl->tpl_vars['sort_method']->value == 'name') {?>class="active"<?php }?> onclick="AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
if ($_GET['is_category_brand_id']) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/category/<?php echo $_smarty_tpl->tpl_vars['pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php } elseif ($_smarty_tpl->tpl_vars['is_selection_find']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/?params=<?php echo urldecode(smarty_modifier_replace(serialize($_POST),'"','@@@@'));?>
&sort=name&page=<?php echo $_smarty_tpl->tpl_vars['select_page']->value;
} elseif ($_smarty_tpl->tpl_vars['is_brand']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['brand'];?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php } else {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/id/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php }?>?sort=name&<?php if ($_smarty_tpl->tpl_vars['char_adress']->value) {?>char_adress=<?php echo urldecode($_smarty_tpl->tpl_vars['char_adress']->value);?>
&<?php }?>page=<?php echo $_smarty_tpl->tpl_vars['select_page']->value;?>
'<?php if ($_smarty_tpl->tpl_vars['sort_method']->value == 'name') {?> + '&order=' + $('#sorting_sort').val()<?php }?>, '#indicator_catalog');">названию</a> 
                <?php if ($_smarty_tpl->tpl_vars['sort_method']->value == 'name') {?>
                    <img src="<?php if ($_smarty_tpl->tpl_vars['sort_order']->value == 'desc') {
echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
arrow-desc.png<?php } else {
echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
arrow-asc.png<?php }?>" alt="" onclick="AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
if ($_GET['is_category_brand_id']) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/category/<?php echo $_smarty_tpl->tpl_vars['pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php } elseif ($_smarty_tpl->tpl_vars['is_selection_find']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/?params=<?php echo urldecode(smarty_modifier_replace(serialize($_POST),'"','@@@@'));?>
&sort=' + $('#sorting_name').val() + '&order=' + $('#sorting_sort').val() + '&page=<?php echo $_smarty_tpl->tpl_vars['select_page']->value;
} elseif ($_smarty_tpl->tpl_vars['is_brand']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['brand'];?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php } else {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/id/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php }?>?sort=' + $('#sorting_name').val() + '&order=' + $('#sorting_sort').val() + '&<?php if ($_smarty_tpl->tpl_vars['char_adress']->value) {?>char_adress=<?php echo urldecode($_smarty_tpl->tpl_vars['char_adress']->value);?>
&<?php }?>page=<?php echo $_smarty_tpl->tpl_vars['select_page']->value;?>
', '#indicator_catalog');" />
                <?php }?>
            </div><div class="sorting_border" style="border: 0"><a href="javascript:void(0)" <?php if ($_smarty_tpl->tpl_vars['sort_method']->value == 'order') {?>class="active"<?php }?> onclick="AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
if ($_GET['is_category_brand_id']) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/category/<?php echo $_smarty_tpl->tpl_vars['pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php } elseif ($_smarty_tpl->tpl_vars['is_selection_find']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/?params=<?php echo urldecode(smarty_modifier_replace(serialize($_POST),'"','@@@@'));?>
&sort=order&page=<?php echo $_smarty_tpl->tpl_vars['select_page']->value;
} elseif ($_smarty_tpl->tpl_vars['is_brand']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['brand'];?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php } else {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/id/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php }?>?sort=order&<?php if ($_smarty_tpl->tpl_vars['char_adress']->value) {?>char_adress=<?php echo urldecode($_smarty_tpl->tpl_vars['char_adress']->value);?>
&<?php }?>page=<?php echo $_smarty_tpl->tpl_vars['select_page']->value;?>
'<?php if ($_smarty_tpl->tpl_vars['sort_method']->value == 'order') {?> + '&order=' + $('#sorting_sort').val()<?php }?>, '#indicator_catalog');">популярности</a> 
                <?php if ($_smarty_tpl->tpl_vars['sort_method']->value == 'order') {?>
                    <img src="<?php if ($_smarty_tpl->tpl_vars['sort_order']->value == 'desc') {
echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
arrow-desc.png<?php } else {
echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
arrow-asc.png<?php }?>" alt="" onclick="AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
if ($_GET['is_category_brand_id']) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/category/<?php echo $_smarty_tpl->tpl_vars['pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php } elseif ($_smarty_tpl->tpl_vars['is_selection_find']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/?params=<?php echo urldecode(smarty_modifier_replace(serialize($_POST),'"','@@@@'));?>
&sort=' + $('#sorting_name').val() + '&order=' + $('#sorting_sort').val() + '&page=<?php echo $_smarty_tpl->tpl_vars['select_page']->value;
} elseif ($_smarty_tpl->tpl_vars['is_brand']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['brand'];?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php } else {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/id/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php }?>?sort=' + $('#sorting_name').val() + '&order=' + $('#sorting_sort').val() + '&<?php if ($_smarty_tpl->tpl_vars['char_adress']->value) {?>char_adress=<?php echo urldecode($_smarty_tpl->tpl_vars['char_adress']->value);?>
&<?php }?>page=<?php echo $_smarty_tpl->tpl_vars['select_page']->value;?>
', '#indicator_catalog');" />
                <?php }?></div>
            <input type="hidden" value="<?php if ($_smarty_tpl->tpl_vars['sort_method']->value == 'price') {?>price<?php } elseif ($_smarty_tpl->tpl_vars['sort_method']->value == 'name') {?>name<?php } elseif ($_smarty_tpl->tpl_vars['sort_method']->value == 'order') {?>order<?php }?>" id="sorting_name" />
            <input type="hidden" value="<?php if ($_smarty_tpl->tpl_vars['sort_order']->value == 'asc') {?>desc<?php } else { ?>asc<?php }?>" id="sorting_sort" />
        </div>

        <div class="pages">
            <?php if ($_smarty_tpl->tpl_vars['count_products']->value > 1) {?>
                <div id="sorting_pages">
                    <span>Страница </span>&nbsp;&nbsp;
                    <?php echo $_smarty_tpl->getSubTemplate ("navigation_pages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


                </div>
            <?php }?>

            <div class="sorting_border">
                <span>Всего товаров: <strong><?php echo $_smarty_tpl->tpl_vars['count_all_products']->value;?>
</strong></span>
            </div><div class="sorting_border"><span>Показать по:</span>&nbsp;
                <a href="javascript:void(0)" <?php if ($_SESSION['count_product'] == 48) {?>class="active"<?php }?> onclick="AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
if ($_GET['is_category_brand_id']) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/category/<?php echo $_smarty_tpl->tpl_vars['pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/?<?php } elseif ($_smarty_tpl->tpl_vars['is_selection_find']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/?params=<?php echo urldecode(smarty_modifier_replace(serialize($_POST),'"','@@@@'));?>
&set_count=48&<?php } elseif ($_smarty_tpl->tpl_vars['is_brand']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['brand'];?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/?<?php } else {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/id/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/?<?php }
if ($_smarty_tpl->tpl_vars['char_adress']->value) {?>char_adress=<?php echo urldecode($_smarty_tpl->tpl_vars['char_adress']->value);?>
&<?php }?>set_count=48', '#indicator_catalog');">48</a>&nbsp;&nbsp;
                <a href="javascript:void(0)" <?php if ($_SESSION['count_product'] == 72) {?>class="active"<?php }?> onclick="AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
if ($_GET['is_category_brand_id']) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/category/<?php echo $_smarty_tpl->tpl_vars['pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/?<?php } elseif ($_smarty_tpl->tpl_vars['is_selection_find']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/?params=<?php echo urldecode(smarty_modifier_replace(serialize($_POST),'"','@@@@'));?>
&set_count=72&<?php } elseif ($_smarty_tpl->tpl_vars['is_brand']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['brand'];?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/?<?php } else {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/id/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/?<?php }
if ($_smarty_tpl->tpl_vars['char_adress']->value) {?>char_adress=<?php echo urldecode($_smarty_tpl->tpl_vars['char_adress']->value);?>
&<?php }?>set_count=72', '#indicator_catalog');">72</a>&nbsp;&nbsp;
                <a href="javascript:void(0)" <?php if ($_SESSION['count_product'] == 124) {?>class="active"<?php }?> onclick="AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
if ($_GET['is_category_brand_id']) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/category/<?php echo $_smarty_tpl->tpl_vars['pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/?<?php } elseif ($_smarty_tpl->tpl_vars['is_selection_find']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/?params=<?php echo urldecode(smarty_modifier_replace(serialize($_POST),'"','@@@@'));?>
&set_count=124&<?php } elseif ($_smarty_tpl->tpl_vars['is_brand']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['brand'];?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/?<?php } else {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/id/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/?<?php }
if ($_smarty_tpl->tpl_vars['char_adress']->value) {?>char_adress=<?php echo urldecode($_smarty_tpl->tpl_vars['char_adress']->value);?>
&<?php }?>set_count=124', '#indicator_catalog');">124</a>&nbsp;&nbsp;
                <a href="javascript:void(0)" <?php if ($_SESSION['count_product'] == 1000000) {?>class="active"<?php }?> onclick="AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
if ($_GET['is_category_brand_id']) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/category/<?php echo $_smarty_tpl->tpl_vars['pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/?<?php } elseif ($_smarty_tpl->tpl_vars['is_selection_find']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/?params=<?php echo urldecode(smarty_modifier_replace(serialize($_POST),'"','@@@@'));?>
&set_count=1000000&<?php } elseif ($_smarty_tpl->tpl_vars['is_brand']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['brand'];?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/?<?php } else {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/id/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/?<?php }
if ($_smarty_tpl->tpl_vars['char_adress']->value) {?>char_adress=<?php echo urldecode($_smarty_tpl->tpl_vars['char_adress']->value);?>
&<?php }?>set_count=1000000', '#indicator_catalog');">все</a>&nbsp;&nbsp;
            </div><div class="sorting_border" id="catalog_out_product" style="border: 0; vertical-align: middle">&nbsp;
                <div id="catalog_row"<?php if ($_smarty_tpl->tpl_vars['template_products_catalog']->value == 'getProduct.tpl' || $_smarty_tpl->tpl_vars['template_products_catalog']->value == 'getProductLady.tpl') {?> class="active"<?php }?> onclick="AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
if ($_GET['is_category_brand_id']) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/category/<?php echo $_smarty_tpl->tpl_vars['pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php } elseif ($_smarty_tpl->tpl_vars['is_selection_find']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/?params=<?php echo urldecode(smarty_modifier_replace(serialize($_POST),'"','@@@@'));?>
&template_products_catalog=1&page=<?php echo $_smarty_tpl->tpl_vars['select_page']->value;
} elseif ($_smarty_tpl->tpl_vars['is_brand']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['brand'];?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php } else {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/id/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php }?>?template_products_catalog=1&<?php if ($_smarty_tpl->tpl_vars['char_adress']->value) {?>char_adress=<?php echo urldecode($_smarty_tpl->tpl_vars['char_adress']->value);?>
&<?php }?>page=<?php echo $_smarty_tpl->tpl_vars['select_page']->value;?>
', '#indicator_catalog');">&nbsp;</div><div id="catalog_list"<?php if ($_smarty_tpl->tpl_vars['template_products_catalog']->value == 'getProductList.tpl' || $_smarty_tpl->tpl_vars['template_products_catalog']->value == 'getProductListLady.tpl') {?> class="active"<?php }?> onclick="AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
if ($_GET['is_category_brand_id']) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/category/<?php echo $_smarty_tpl->tpl_vars['pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php } elseif ($_smarty_tpl->tpl_vars['is_selection_find']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/?params=<?php echo urldecode(smarty_modifier_replace(serialize($_POST),'"','@@@@'));?>
&template_products_catalog=2&page=<?php echo $_smarty_tpl->tpl_vars['select_page']->value;
} elseif ($_smarty_tpl->tpl_vars['is_brand']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['brand'];?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php } else {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/id/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['catalog']->value->id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php }?>?template_products_catalog=2&<?php if ($_smarty_tpl->tpl_vars['char_adress']->value) {?>char_adress=<?php echo urldecode($_smarty_tpl->tpl_vars['char_adress']->value);?>
&<?php }?>page=<?php echo $_smarty_tpl->tpl_vars['select_page']->value;?>
', '#indicator_catalog');">&nbsp;</div>
            </div>
        </div>


        <div class="clear">&nbsp;</div>
    </div>
<?php }
}
}
?>