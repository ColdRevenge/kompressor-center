<?php /* Smarty version 3.1.24, created on 2017-02-06 11:08:46
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/catalog/templates/podbor_detailed.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:164136845858982f0eb35c57_04373027%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c1a9f827da8b85ef9fc9a3fa3354aad987f3658' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/catalog/templates/podbor_detailed.tpl',
      1 => 1486368520,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164136845858982f0eb35c57_04373027',
  'variables' => 
  array (
    'category_id' => 0,
    'get_section' => 0,
    'setting' => 0,
    'category_price' => 0,
    'base_dir' => 0,
    'get_chars_podbor' => 0,
    'get_chars' => 0,
    'selection_brands' => 0,
    'ctype' => 0,
    'list_brand_id' => 0,
    'url' => 0,
    'catalog_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_58982f0ecd0518_06420691',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58982f0ecd0518_06420691')) {
function content_58982f0ecd0518_06420691 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '164136845858982f0eb35c57_04373027';
?>

<div id="podbor_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
">
    <div id="count_podbor_result_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
">&nbsp;</div>
    <form method="post" action="" id="podbor_form_id_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
" class="podbor-wrapper">
        <?php if ($_smarty_tpl->tpl_vars['get_section']->value[$_smarty_tpl->tpl_vars['category_id']->value]->is_price == 1 && !$_smarty_tpl->tpl_vars['setting']->value->hide_prices) {?>
            <div>
                <strong>Цена:</strong>
                <div class="slider_ui_block">
                    <div class="ui-slider ui-slider-horizontal ui-widget ui-widget-content slider_ui" id="slider_ui_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
">
                        <div class="slider-r"></div>
                    </div>
                    <span class="input-center">
                        <div class="label-slide">      
                            <label id="minCostLabel_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
"><?php echo (($tmp = @number_format((($tmp = @$_POST['min_price'][$_smarty_tpl->tpl_vars['category_id']->value])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['category_price']->value[$_smarty_tpl->tpl_vars['category_id']->value]->min_price : $tmp),0,'',''))===null||$tmp==='' ? 0 : $tmp);?>
 р.</label>
                            <label id="maxCostLabel_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
"><?php echo (($tmp = @number_format((($tmp = @$_POST['max_price'][$_smarty_tpl->tpl_vars['category_id']->value])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['category_price']->value[$_smarty_tpl->tpl_vars['category_id']->value]->max_price : $tmp),0,'',''))===null||$tmp==='' ? 0 : $tmp);?>
 р.</label>
                        </div>

                        <input type="hidden" name="min_price[<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
]" id="minCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
" value="<?php echo (($tmp = @number_format((($tmp = @$_POST['min_price'][$_smarty_tpl->tpl_vars['category_id']->value])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['category_price']->value[$_smarty_tpl->tpl_vars['category_id']->value]->min_price : $tmp)))===null||$tmp==='' ? 0 : $tmp);?>
"  onfocus="this.className = 'selInput'" onblur = "this.className = ''" style="width: 55px;margin: 0 3px;text-align: center"/>
                        <input type="hidden" name="max_price[<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
]" id="maxCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
" value="<?php echo (($tmp = @number_format((($tmp = @$_POST['max_price'][$_smarty_tpl->tpl_vars['category_id']->value])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['category_price']->value[$_smarty_tpl->tpl_vars['category_id']->value]->max_price : $tmp),0,'',''))===null||$tmp==='' ? 1000 : $tmp);?>
" onfocus="this.className = 'selInput'" onblur = "this.className = ''" style="width: 55px;margin: 0 3px;text-align: center"/> 

                    </span>
                    
                    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/_slider_script.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('slider_id'=>("#slider_ui_").($_smarty_tpl->tpl_vars['category_id']->value),'min_id'=>("#minCost_").($_smarty_tpl->tpl_vars['category_id']->value),'max_id'=>("#maxCost_").($_smarty_tpl->tpl_vars['category_id']->value),'min'=>(($tmp = @$_smarty_tpl->tpl_vars['category_price']->value[$_smarty_tpl->tpl_vars['category_id']->value]->min_price)===null||$tmp==='' ? 0 : $tmp),'max'=>(($tmp = @$_smarty_tpl->tpl_vars['category_price']->value[$_smarty_tpl->tpl_vars['category_id']->value]->max_price)===null||$tmp==='' ? 1000 : $tmp)), 0);
?>

                </div>
            </div>
        <?php }?>

        <?php
$_from = $_smarty_tpl->tpl_vars['get_chars_podbor']->value[$_smarty_tpl->tpl_vars['category_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["get_chars"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["get_chars"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["get_chars"]->value) {
$_smarty_tpl->tpl_vars["get_chars"]->_loop = true;
$foreach_get_chars_Sav = $_smarty_tpl->tpl_vars["get_chars"];
?>
            <?php if ($_smarty_tpl->tpl_vars['get_chars']->value->type == '0') {?>
                <div>
                    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/_slider_checkbox.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>$_smarty_tpl->tpl_vars['get_chars']->value->char_id,'name'=>$_smarty_tpl->tpl_vars['get_chars']->value->name,'category_id'=>$_smarty_tpl->tpl_vars['get_chars']->value->category_id,'sort'=>$_smarty_tpl->tpl_vars['get_chars']->value->sort,'is_desc_char'=>1), 0);
?>

                </div>
            <?php } elseif ($_smarty_tpl->tpl_vars['get_chars']->value->type == '1') {?>
                <div>
                    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/_slider_select.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>$_smarty_tpl->tpl_vars['get_chars']->value->char_id,'name'=>$_smarty_tpl->tpl_vars['get_chars']->value->name,'category_id'=>$_smarty_tpl->tpl_vars['get_chars']->value->category_id,'sort'=>$_smarty_tpl->tpl_vars['get_chars']->value->sort,'is_desc_char'=>1), 0);
?>

                </div>
            <?php } elseif ($_smarty_tpl->tpl_vars['get_chars']->value->type == '2') {?>
            <?php } elseif ($_smarty_tpl->tpl_vars['get_chars']->value->type == '3') {?>
                <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/_slider_slide.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>$_smarty_tpl->tpl_vars['get_chars']->value->char_id,'name'=>$_smarty_tpl->tpl_vars['get_chars']->value->name,'category_id'=>$_smarty_tpl->tpl_vars['get_chars']->value->category_id,'sort'=>$_smarty_tpl->tpl_vars['get_chars']->value->sort,'is_desc_char'=>1), 0);
?>

            <?php }?>
        <?php
$_smarty_tpl->tpl_vars["get_chars"] = $foreach_get_chars_Sav;
}
?>
        



        <?php if ($_smarty_tpl->tpl_vars['get_section']->value[$_smarty_tpl->tpl_vars['category_id']->value]->is_brand == 1) {?>
            <div>
                <strong>Производитель:</strong>
                <div>
                    <select name="brand_id[<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
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
        <?php }?>

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
        <button class="sel-button" onclick="AjaxRequestInd('podbor-result', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/', '#indicator_catalog', null, null, 'podbor_form_id_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
');
                return false;">Подобрать</button>
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