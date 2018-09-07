<?php /* Smarty version 3.1.24, created on 2018-07-02 08:34:20
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/catalog/templates/podbor_detailed.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:19240195575b39b95c5b7f67_18464847%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe59e2ad0034084db1cd88c17bdfe16301bf7c66' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/catalog/templates/podbor_detailed.tpl',
      1 => 1530509446,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19240195575b39b95c5b7f67_18464847',
  'variables' => 
  array (
    'category_id' => 0,
    'url' => 0,
    'catalog_dir' => 0,
    'get_section' => 0,
    'selection_brands' => 0,
    'ctype' => 0,
    'list_brand_id' => 0,
    'podborI' => 0,
    'get_chars_podbor' => 0,
    'get_chars' => 0,
    'open_category_id' => 0,
    'chars_id' => 0,
    'base_dir' => 0,
    'setting' => 0,
    'category_price' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39b95c6ce231_44326861',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39b95c6ce231_44326861')) {
function content_5b39b95c6ce231_44326861 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '19240195575b39b95c5b7f67_18464847';
?>
<div id="podbor_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
">
    <form action="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/" id="podbor_form_id_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
" method="get" class="podbor">

        <?php $_smarty_tpl->tpl_vars["podborI"] = new Smarty_Variable(0, null, 0);?>

        <div class="podbor-list">
            <div class="podbor-list__row">
                <?php if ($_smarty_tpl->tpl_vars['get_section']->value[$_smarty_tpl->tpl_vars['category_id']->value]->is_brand == 1) {?>
                    <div class="podbor-list__cell podbor-item">
                        <div class="podbor-item__data">
                            <div class="podbor-item__title">Производитель:</div>
                            <div class="podbor-item__value">
                                <select class="podbor-item__select" name="brand_id[<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
]">
                                    <option value="0">Выбрать</option>
                                    <?php
$_from = $_smarty_tpl->tpl_vars['selection_brands']->value[$_smarty_tpl->tpl_vars['category_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["ctype"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["ctype"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["ctype"]->value) {
$_smarty_tpl->tpl_vars["ctype"]->_loop = true;
$foreach_ctype_Sav = $_smarty_tpl->tpl_vars["ctype"];
?>
                                        <?php $_smarty_tpl->tpl_vars["list_brand_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['ctype']->value->id, null, 0);?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['list_brand_id']->value;?>
" <?php if ($_POST['brand_id'] == $_smarty_tpl->tpl_vars['list_brand_id']->value) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['ctype']->value->name;?>
</option>
                                    <?php
$_smarty_tpl->tpl_vars["ctype"] = $foreach_ctype_Sav;
}
?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <?php $_smarty_tpl->tpl_vars['podborI'] = new Smarty_Variable($_smarty_tpl->tpl_vars['podborI']->value+1, null, 0);?>
                <?php }?>

                <?php
$_from = $_smarty_tpl->tpl_vars['get_chars_podbor']->value[$_smarty_tpl->tpl_vars['category_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["get_chars"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["get_chars"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["get_chars"]->value) {
$_smarty_tpl->tpl_vars["get_chars"]->_loop = true;
$foreach_get_chars_Sav = $_smarty_tpl->tpl_vars["get_chars"];
?>
                    <?php if ($_smarty_tpl->tpl_vars['get_chars']->value->type == '0') {?>

                        <?php $_smarty_tpl->assign("chars_id",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>$_smarty_tpl->tpl_vars['get_chars']->value->char_id,'open_category_id'=>(($tmp = @$_smarty_tpl->tpl_vars['open_category_id']->value)===null||$tmp==='' ? null : $tmp),'sort'=>$_smarty_tpl->tpl_vars['get_chars']->value->sort,'is_desc_char'=>1,'showParam'=>1),$_smarty_tpl));?>

                        <?php if (count($_smarty_tpl->tpl_vars['chars_id']->value)) {?>
                            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/_slider_checkbox.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>$_smarty_tpl->tpl_vars['get_chars']->value->char_id,'name'=>$_smarty_tpl->tpl_vars['get_chars']->value->name,'chars_id'=>$_smarty_tpl->tpl_vars['chars_id']->value), 0);
?>

                            <?php $_smarty_tpl->tpl_vars['podborI'] = new Smarty_Variable($_smarty_tpl->tpl_vars['podborI']->value+1, null, 0);?>
                        <?php }?>

                    <?php } elseif ($_smarty_tpl->tpl_vars['get_chars']->value->type == '1') {?>

                        <?php $_smarty_tpl->assign("chars_id",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>$_smarty_tpl->tpl_vars['get_chars']->value->char_id,'sort'=>$_smarty_tpl->tpl_vars['get_chars']->value->sort,'open_category_id'=>(($tmp = @$_smarty_tpl->tpl_vars['open_category_id']->value)===null||$tmp==='' ? null : $tmp),'is_desc_char'=>1),$_smarty_tpl));?>

                        <?php if (count($_smarty_tpl->tpl_vars['chars_id']->value)) {?>
                            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/_slider_select.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>$_smarty_tpl->tpl_vars['get_chars']->value->char_id,'name'=>$_smarty_tpl->tpl_vars['get_chars']->value->name,'chars_id'=>$_smarty_tpl->tpl_vars['chars_id']->value), 0);
?>

                            <?php $_smarty_tpl->tpl_vars['podborI'] = new Smarty_Variable($_smarty_tpl->tpl_vars['podborI']->value+1, null, 0);?>
                        <?php }?>

                    <?php } elseif ($_smarty_tpl->tpl_vars['get_chars']->value->type == '3') {?>

                        <?php $_smarty_tpl->assign("chars_id",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>$_smarty_tpl->tpl_vars['get_chars']->value->char_id,'open_category_id'=>(($tmp = @$_smarty_tpl->tpl_vars['open_category_id']->value)===null||$tmp==='' ? null : $tmp),'category_id'=>$_smarty_tpl->tpl_vars['get_chars']->value->category_id,'sort'=>$_smarty_tpl->tpl_vars['get_chars']->value->sort,'is_range'=>1),$_smarty_tpl));?>

                        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/_slider_slide.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>$_smarty_tpl->tpl_vars['get_chars']->value->char_id,'name'=>$_smarty_tpl->tpl_vars['get_chars']->value->name,'chars_id'=>$_smarty_tpl->tpl_vars['chars_id']->value), 0);
?>

                        <?php $_smarty_tpl->tpl_vars['podborI'] = new Smarty_Variable($_smarty_tpl->tpl_vars['podborI']->value+1, null, 0);?>

                    <?php }?>
                    <?php if (($_smarty_tpl->tpl_vars['podborI']->value)%3 == 0) {?>
                        </div><div class="podbor-list__row">
                    <?php }?>
                <?php
$_smarty_tpl->tpl_vars["get_chars"] = $foreach_get_chars_Sav;
}
?>

                <?php if ($_smarty_tpl->tpl_vars['get_section']->value[$_smarty_tpl->tpl_vars['category_id']->value]->is_price == 1 && !$_smarty_tpl->tpl_vars['setting']->value->hide_prices) {?>
                    <div class="podbor-list__cell podbor-item">
                        <div class="podbor-item__data">
                            <div class="podbor-item__title">Цена:</div>
                            <div class="podbor-item__value _range">
                                <span class="podbor-item__from">от</span>
                                
                                <input type="text" 
                                       class="podbor-item__range" 
                                       name="min_price[<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
]" 
                                       value="<?php echo (($tmp = @number_format((($tmp = @$_POST['min_price'][$_smarty_tpl->tpl_vars['category_id']->value])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['category_price']->value[$_smarty_tpl->tpl_vars['category_id']->value]->min_price : $tmp)))===null||$tmp==='' ? 0 : $tmp);?>
" />

                                <span class="podbor-item__from">до</span>

                                <input type="text" 
                                       class="podbor-item__range" 
                                       name="max_price[<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
]" 
                                       value="<?php echo (($tmp = @number_format((($tmp = @$_POST['max_price'][$_smarty_tpl->tpl_vars['category_id']->value])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['category_price']->value[$_smarty_tpl->tpl_vars['category_id']->value]->max_price : $tmp),0,'',''))===null||$tmp==='' ? 1000 : $tmp);?>
"/> 
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>


        

        <?php if ($_smarty_tpl->tpl_vars['get_section']->value->is_param_1 == 1) {?>
            <span>        
                <input type="checkbox" name="is_param_1[<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
]" value="1" <?php if ($_POST['is_param_1'] == 1) {?>checked="checked"<?php }?> id="checkbox_is_param_1"><label for="checkbox_is_param_1">Распродажа</label>
            </span>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['get_section']->value->is_param_2 == 1) {?>
            <span>        
                <input type="checkbox" name="is_param_2[<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
]" value="1" <?php if ($_POST['is_param_2'] == 1) {?>checked="checked"<?php }?> id="checkbox_is_param_2"><label for="checkbox_is_param_2">Новинки</label>
            </span>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['get_section']->value->is_param_3 == 1) {?>
            <span>        
                <input type="checkbox" name="is_param_3[<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
]" value="1" <?php if ($_POST['is_param_3'] == 1) {?>checked="checked"<?php }?> id="checkbox_is_param_3"><label for="checkbox_is_param_3">Распродажа</label>
            </span>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['get_section']->value->is_param_4 == 1) {?>
            <span>        
                <input type="checkbox" name="is_param_4[<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
]" value="1" <?php if ($_POST['is_param_4'] == 1) {?>checked="checked"<?php }?> id="checkbox_is_param_4"><label for="checkbox_is_param_4">Распродажа</label>
            </span>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['get_section']->value->is_param_5 == 1) {?>
            <span>        
                <input type="checkbox" name="is_param_5[<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
]" value="1" <?php if ($_POST['is_param_5'] == 1) {?>checked="checked"<?php }?> id="checkbox_is_param_5"><label for="checkbox_is_param_5">Распродажа</label>
            </span>
        <?php }?>

        <input type="hidden" name="category_id" value="<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
" />
        <input type="hidden" name="find-selection" value="1" />
        <div style="clear: both; display: block;"></div>
        <div></div>
        <div class="podbor__button">
            <button class="btn -orange -size18" onclick="AjaxRequestInd('podbor-result', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/', '#indicator_catalog', null, null, 'podbor_form_id_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
');
                return false;">Подобрать</button>
        </div>
    </form>

    <div class="clear"></div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
    $('#count_podbor_result_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
').attr('onclick', $('#podbor button').attr('onclick'));
    $('#count_podbor_result_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
').css({
        'top': $('#podbor_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
').offset().top
    });
    $('#podbor_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
 input, #podbor_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
 select').change(function () {
        /* Ползунок как на яндексе с кнопкой показать: */
        
        $('#podbor_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
 button').click();
    });
    $('#podbor_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
 a.ui-slider-handle').mouseup(function () {
        $('#podbor_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
 input[type="text"]').eq(0).change();
    });
<?php echo '</script'; ?>
>
<?php }
}
?>