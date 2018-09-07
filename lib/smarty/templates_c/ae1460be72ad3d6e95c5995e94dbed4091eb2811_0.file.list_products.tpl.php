<?php /* Smarty version 3.1.24, created on 2015-09-15 16:54:38
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/products/templates/list_products.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:163321638855f8231e94b838_64447096%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae1460be72ad3d6e95c5995e94dbed4091eb2811' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/products/templates/list_products.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163321638855f8231e94b838_64447096',
  'variables' => 
  array (
    'count_products' => 0,
    'admin_url' => 0,
    'category_id' => 0,
    'select_page' => 0,
    'sys_images_url' => 0,
    'MyURL' => 0,
    'select_tree_file' => 0,
    'tree' => 0,
    'shop' => 0,
    'products' => 0,
    'sort_order' => 0,
    'sort_field' => 0,
    'product' => 0,
    'discaunt' => 0,
    'gallery_url' => 0,
    'url' => 0,
    'category_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f8231eb24e40_88212767',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f8231eb24e40_88212767')) {
function content_55f8231eb24e40_88212767 ($_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once '/home/admin/domains/coralmedia.ru/public_html/lib/smarty/plugins/function.counter.php';
if (!is_callable('smarty_modifier_replace')) require_once '/home/admin/domains/coralmedia.ru/public_html/lib/smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_date_format')) require_once '/home/admin/domains/coralmedia.ru/public_html/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '163321638855f8231e94b838_64447096';
?>

<?php echo '<script'; ?>
 type="text/javascript">
    function getUpUrl() {

        adress = document.location.href.replace('products/list/', 'products/list/up-product/');
        adress = adress.replace('/sort/', '/');
        adress = adress.replace('/set-page/', '/');
        if (adress.indexOf('?') !== -1) {
            ret = adress + '&';
        }
        else {
            ret = adress + '?';
        }
        return ret;

    }
<?php echo '</script'; ?>
>



<div class="navigation">
    <div class="right-line" style="padding-top: 12px;">
        <form method="get" action="">
            <input type="text"  value="<?php echo $_GET['search'];?>
" name="search" placeholder="Поиск товара.." style="width: 150px;"> 
            <button value="Искать" class="search">Поиск</button> 
            <label class="p-check" style="padding-top: 5px;"><input type="checkbox" value="1" name="is_all" <?php if ($_SESSION['search_is_all'] == 1) {?>checked="checked" <?php }?>/><em>&nbsp;</em><span>Все категории</span></label>
        </form>
    </div>

    <div class="right-line">
        
        <select onchange="AjaxRequestInd('product_list', getUpUrl() + 'product_is_active=' + $(this).val(), '#product_list');" style="width: 100px;" title="Состояние">
            <option value="-1"<?php if ($_SESSION['product_is_active'] == -1) {?> selected="selected"<?php }?>>Все</option>
            <option value="1"<?php if ($_SESSION['product_is_active'] == 1) {?> selected="selected"<?php }?>>Активные</option>
            <option value="0"<?php if ($_SESSION['product_is_active'] == 0) {?> selected="selected"<?php }?>>Не активные</option>
        </select>
    </div>
    <div class="right-line">
        
        <select onchange="AjaxRequestInd('product_list', getUpUrl() + 'product_is_warehouse=' + $(this).val(), '#product_list');" style="width: 100px;" title="На складе">
            <option value="-1"<?php if ($_SESSION['product_is_warehouse'] == -1) {?> selected="selected"<?php }?>>Все</option>
            <option value="1"<?php if ($_SESSION['product_is_warehouse'] == 1) {?> selected="selected"<?php }?>>В наличии</option>
            <option value="0"<?php if ($_SESSION['product_is_warehouse'] == 0) {?> selected="selected"<?php }?>>Отсутствуют</option>
        </select>
    </div>
    <div class="right-line">
        <select style="width: 70px" onchange="AjaxRequestInd('product_list', getUpUrl() + 'count_page=' + $(this).find('option:selected').val(), '#product_list');" title="Показать по">
            <option value="50" <?php if ($_SESSION['admin_count_product'] == 50) {?>selected="selected"<?php }?>>50</option>
            <option value="100" <?php if ($_SESSION['admin_count_product'] == 100) {?>selected="selected"<?php }?>>100</option>
            <option value="250" <?php if ($_SESSION['admin_count_product'] == 250) {?>selected="selected"<?php }?>>250</option>
            <option value="500" <?php if ($_SESSION['admin_count_product'] == 500) {?>selected="selected"<?php }?>>500</option>
            <option value="1000" <?php if ($_SESSION['admin_count_product'] == 1000) {?>selected="selected"<?php }?>>1000</option>
            <option value="1000000" <?php if ($_SESSION['admin_count_product'] == 1000000) {?>selected="selected"<?php }?>>Все</option>
        </select>
    </div>

    <div class="right-line" style="float: right; border: 0; margin-top: 7px;height: auto">
        <?php if ($_smarty_tpl->tpl_vars['count_products']->value > 1 || $_SESSION['count_product'] == 0) {?>
            Страница:
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
                <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
products/list/set-page/0/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['page']['index'];?>
/<?php if ($_GET['search']) {?>?search=<?php echo $_GET['search'];
}?>&is_all=<?php echo (($tmp = @$_GET['is_all'])===null||$tmp==='' ? 0 : $tmp);?>
" <?php if ($_smarty_tpl->tpl_vars['select_page']->value == $_smarty_tpl->getVariable('smarty')->value['section']['page']['index']) {?>class="selected_list_page"<?php }?>><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['page']['iteration'];?>
</a>
            <?php endfor; endif; ?>
        <?php }?>
    </div>
    <div class="clear">&nbsp;</div>        
</div>
<div class="clear">&nbsp;</div>

<form method="post" action="">
    <div class="small-navigation">
        <?php if ($_smarty_tpl->tpl_vars['category_id']->value > 0) {?>
            <div>
                <img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/add.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
add/0/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/<?php echo time();?>
/" <?php if (!$_smarty_tpl->tpl_vars['category_id']->value) {?>onclick='alert("В левом меню выберите раздел")'<?php }?>>Добавить товар</a>
            </div>
        <?php }?>
        <div>
            <img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/vydel.png" />
            <span>
                С выделенными товарами: <select style="width: 250px;" name="action_product">
                    <option value="-1">Не выбрано</option>
                    <option value="-2">Удалить</option>
                    <option value="-3">Сделать активными</option>
                    <option value="-4">Сделать не активными</option>

                    <optgroup label="Перенести в раздел:">
                        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['select_tree_file']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('inc'=>$_smarty_tpl->tpl_vars['select_tree_file']->value,'tree'=>$_smarty_tpl->tpl_vars['tree']->value,'id'=>0,'current_id'=>0,'selected_id'=>0), 0);
?>

                    </optgroup>

                    <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady') {?>
                        <option value="-5">Перенести товары в Woman Lalipop</option>
                    <?php }?>
                </select>
            </span>

            <button>Сохранить</button>
        </div>
    </div>

    <?php if (count($_smarty_tpl->tpl_vars['products']->value)) {?>
        <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%">
            <thead>
                <tr>
                    <td valign="middle" align="center"><label class="p-check"><input type="checkbox" onclick="$('input[name^=selected_products]').attr('checked', this.checked);" /><em>&nbsp;</em></label></td>
                    <td valign="middle" align="center">№</td>
                    <td valign="middle" align="center">&nbsp;</td>
                    <td valign="middle" align="center"><a href='<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/sort/0/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/name/<?php if ($_smarty_tpl->tpl_vars['sort_order']->value == 'asc') {?>desc<?php } else { ?>asc<?php }?>/'>Название</a><?php if ($_smarty_tpl->tpl_vars['sort_field']->value == 'name') {?><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/arrow-<?php echo $_smarty_tpl->tpl_vars['sort_order']->value;?>
.png" alt="" title="" /><?php }?></td>
                        
                        
                        
                    <td valign="middle" align="center"><a href='<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/sort/0/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/price/<?php if ($_smarty_tpl->tpl_vars['sort_order']->value == 'asc') {?>desc<?php } else { ?>asc<?php }?>/'>Стоимость</a><?php if ($_smarty_tpl->tpl_vars['sort_field']->value == 'price') {?><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/arrow-<?php echo $_smarty_tpl->tpl_vars['sort_order']->value;?>
.png" alt="" title="" /><?php }?> </td>
                    <td valign="middle" align="center"><a href='<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/sort/0/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/is_active/<?php if ($_smarty_tpl->tpl_vars['sort_order']->value == 'asc') {?>desc<?php } else { ?>asc<?php }?>/'>Состояние</a><?php if ($_smarty_tpl->tpl_vars['sort_field']->value == 'is_active') {?><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/arrow-<?php echo $_smarty_tpl->tpl_vars['sort_order']->value;?>
.png" alt="" title="" /><?php }?> </td>
                    <td valign="middle" align="center"><a href='<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/sort/0/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/order/<?php if ($_smarty_tpl->tpl_vars['sort_order']->value == 'asc') {?>desc<?php } else { ?>asc<?php }?>/'>Сорт</a><?php if ($_smarty_tpl->tpl_vars['sort_field']->value == 'order') {?><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/arrow-<?php echo $_smarty_tpl->tpl_vars['sort_order']->value;?>
.png" alt="" title="" /><?php }?> </td>
                    <td valign="middle" align="center" style="width: 70px;">&nbsp;</td>

                </tr>
            </thead>
            <?php
$_from = $_smarty_tpl->tpl_vars['products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['product']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
$foreach_product_Sav = $_smarty_tpl->tpl_vars['product'];
?>
                <?php $_smarty_tpl->tpl_vars["product_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['product']->value->id, null, 0);?>
                <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>
                    <?php $_smarty_tpl->tpl_vars["discaunt"] = new Smarty_Variable($_smarty_tpl->tpl_vars['product']->value->price*100/$_smarty_tpl->tpl_vars['product']->value->old_price, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["discaunt"] = new Smarty_Variable($_smarty_tpl->tpl_vars['discaunt']->value-100, null, 0);?>
                <?php } else { ?>
                    <?php $_smarty_tpl->tpl_vars["discaunt"] = new Smarty_Variable(0, null, 0);?>
                <?php }?>
                <tbody class="tbody">
                    <tr> 
                        <td valign="middle" align="center">
                            <label class="p-check"><input type="checkbox" value="1" name="selected_products[<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
]" /><em>&nbsp;</em></label>
                        </td>
                        <td valign="middle" align="center">
                            
                            <?php echo smarty_function_counter(array(),$_smarty_tpl);?>

                        </td>
                        <td valign="middle" align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
edit/0/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
/?is_modal=1<?php if (!$_smarty_tpl->tpl_vars['product']->value->file) {?>#photo<?php }?>" rel="related" title="Быстрое редактирование товара"><?php if ($_smarty_tpl->tpl_vars['product']->value->file) {?><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product']->value->file;?>
" alt="" style="border: 1px solid #CCCCCC;background-color: white;"><?php } else { ?>Нет изображения<?php }?></a>
                            <?php if ($_smarty_tpl->tpl_vars['product']->value->count_file) {?><div class="notice">(<?php echo (($tmp = @$_smarty_tpl->tpl_vars['product']->value->count_file)===null||$tmp==='' ? 0 : $tmp);?>
 фото)</div><?php }?>
                        </td>
                        <td valign="middle" align="center">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/" target="_blank" title="Показать товар на сайте"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
</a>
                            <div class="notice">Артикул <?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->article);?>
</div>
                            
                            
                        </td>
                        
                        
                        
                        
                        <td valign="middle" align="center">
                            <input type="text" name="price[<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->price;?>
" maxlength="11" style="width: 55px;text-align: center;" />
                            <?php if ($_smarty_tpl->tpl_vars['product']->value->max_price != $_smarty_tpl->tpl_vars['product']->value->price && $_smarty_tpl->tpl_vars['product']->value->max_price > 0) {?> - <?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['product']->value->max_price),",","&nbsp;");
}?>  р. 
                            <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?><div style="color: red;margin-top: 4px;"><?php echo $_smarty_tpl->tpl_vars['product']->value->old_price;?>
 руб.</div><?php }?>
                            <div class="notice"><?php if ($_smarty_tpl->tpl_vars['product']->value->warehouse <= 5) {?><span style="color:red;">осталось <?php echo $_smarty_tpl->tpl_vars['product']->value->warehouse;?>
 шт.</span><?php } else { ?>осталось <?php echo $_smarty_tpl->tpl_vars['product']->value->warehouse;?>
 шт.<?php }?></div> 
                        </td>
                        <td valign="middle" align="center"><?php if ($_smarty_tpl->tpl_vars['product']->value->is_active == 1) {?><a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/set-status/0/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
/0/" title="Сделать неактивным">Активен</a><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/set-status/0/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
/1/" title="Сделать активным">Не активен</a><?php }?>
                            <div class="notice" style="cursor: default" title="Дата изменения: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['product']->value->change,"%d.%m.%Y");?>
">Добавлен: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['product']->value->created,"%d.%m.%Y");?>
</div>
                            <div class="notice" style="margin-top: 10px;">
                                <label class="p-check"><input type="checkbox" name="is_param_1[<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
]" value="1" <?php if ($_smarty_tpl->tpl_vars['product']->value->is_param_1 == 1) {?>checked="checked"<?php }?> id="product_param_1_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" /><em>&nbsp;</em><span>Скидка</span></label>
                                <label class="p-check"><input type="checkbox" name="is_param_2[<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
]" value="1" <?php if ($_smarty_tpl->tpl_vars['product']->value->is_param_2 == 1) {?>checked="checked"<?php }?> id="product_param_2_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" /><em>&nbsp;</em><span>Акция</span></label>
                                <label class="p-check"><input type="checkbox" name="is_param_3[<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
]" value="1" <?php if ($_smarty_tpl->tpl_vars['product']->value->is_param_3 == 1) {?>checked="checked"<?php }?> id="product_param_3_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" /><em>&nbsp;</em><span>Новинка</span></label>
                                    
                                    

                                <label class="p-check"><input type="checkbox" name="is_param_5[<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
]" value="1" <?php if ($_smarty_tpl->tpl_vars['product']->value->is_param_5 == 1) {?>checked="checked"<?php }?> id="product_param_5_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" /><em>&nbsp;</em><span>Распродажа</span></label>

                                <input type="hidden" value="1" name="is_param_send[<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
]" />
                            </div>
                        </td>
                        <td valign="middle" align="center"><input type="text" name="order[<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->order;?>
" maxlength="4" style="width: 30px;text-align: center;" /></td>

                        <td valign="middle" align="center">        
                            <a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
edit/0/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
/" title="Редактировать товар"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/edit.png" align="middle" hspace="1" alt="Редактировать" /></a>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
products/list/0/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/7/?copy=<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" title="Копировать товар" onclick="return (confirm('Копировать товар <?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->article);?>
?') ? true : false)"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/copy.png" align="middle" hspace="1" alt="Редактировать" /></a>
                            <a href="javascript:void(0)" title="Удалить товар" onclick="setConfirm('Вы действительно хотите удалить товар??', '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/0/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/4/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
/');">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/del.png" align="middle" hspace="1" alt="Удалить товар" /></a>

                        </td>
                    </tr>
                </tbody>
            <?php
$_smarty_tpl->tpl_vars['product'] = $foreach_product_Sav;
}
?>
            <tfoot>
                <tr>
                    <td colspan="4">

                    </td>
                    <td colspan="4" align="right" valign="middle">
                        <button>Сохранить</button>
                    </td>
                </tr>
            </tfoot>
        </table>
        

    <?php } else { ?>
        <h2>В разделе <?php if ($_smarty_tpl->tpl_vars['category_name']->value) {?> - &laquo;<?php echo stripslashes($_smarty_tpl->tpl_vars['category_name']->value);?>
&raquo;<?php }?> нет ни одного продукта. <a  href="<?php if ($_smarty_tpl->tpl_vars['category_id']->value > 0) {
echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
add/0/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/<?php echo time();?>
/<?php } else { ?>javascript:void(0)<?php }?>" <?php if (!$_smarty_tpl->tpl_vars['category_id']->value) {?>onclick='alert("В левом меню выберите раздел")'<?php }?>><b>Добавить?</b></a></h2>
    <?php }?>
</form><?php }
}
?>