<?php /* Smarty version 3.1.24, created on 2015-10-27 13:56:48
         compiled from "/home/c10045/public_html/kompressor-center.com/modules/catalog/templates/_slider_slide.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:838389615562f5870523b23_49013292%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdf4820179b031dd46242b76cd0978bc9247eb3e' => 
    array (
      0 => '/home/c10045/public_html/kompressor-center.com/modules/catalog/templates/_slider_slide.tpl',
      1 => 1445253604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '838389615562f5870523b23_49013292',
  'variables' => 
  array (
    'id' => 0,
    'category_id' => 0,
    'sort' => 0,
    'name' => 0,
    'chars_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_562f58705ddb51_37519873',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_562f58705ddb51_37519873')) {
function content_562f58705ddb51_37519873 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '838389615562f5870523b23_49013292';
$_smarty_tpl->assign("chars_id",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>$_smarty_tpl->tpl_vars['id']->value,'category_id'=>$_smarty_tpl->tpl_vars['category_id']->value,'sort'=>$_smarty_tpl->tpl_vars['sort']->value,'is_range'=>1),$_smarty_tpl));?>

<div>
    <strong><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</strong>
    <div class="slider_ui_block">
        <div class="ui-slider ui-slider-horizontal ui-widget ui-widget-content slider_ui" id="slider_ui_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
            <div class="slider-r"></div>
        </div>
        <span class="input-center">
            <div class="label-slide">
                <label id="minCostLabel_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><?php echo (($tmp = @number_format((($tmp = @$_POST['char_max_range'][$_smarty_tpl->tpl_vars['id']->value])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['chars_id']->value->min_name : $tmp),0,'',''))===null||$tmp==='' ? 0 : $tmp);?>
 <?php echo $_smarty_tpl->tpl_vars['chars_id']->value->unit;?>
</label>
                <label id="maxCostLabel_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><?php echo (($tmp = @number_format((($tmp = @$_POST['char_min_range'][$_smarty_tpl->tpl_vars['id']->value])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['chars_id']->value->max_name : $tmp),0,'',''))===null||$tmp==='' ? 0 : $tmp);?>
 <?php echo $_smarty_tpl->tpl_vars['chars_id']->value->unit;?>
</label>
            </div>

            <input type="hidden" name="char_min_range[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
]" id="minCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" value="<?php echo (($tmp = @number_format((($tmp = @$_POST['char_min_range'][$_smarty_tpl->tpl_vars['id']->value])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['chars_id']->value->min_name : $tmp),0,'',''))===null||$tmp==='' ? 0 : $tmp);?>
"  style="width: 55px;margin: 0 3px;text-align: center"/>
            <input type="hidden" name="char_max_range[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
]" id="maxCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" value="<?php echo (($tmp = @number_format((($tmp = @$_POST['char_max_range'][$_smarty_tpl->tpl_vars['id']->value])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['chars_id']->value->max_name : $tmp),0,'',''))===null||$tmp==='' ? 0 : $tmp);?>
" style="width: 55px;margin: 0 3px;text-align: center"/> 

        </span>
        
        <?php echo $_smarty_tpl->getSubTemplate ("_slider_script.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('min_id'=>((("#minCost_").($_smarty_tpl->tpl_vars['category_id']->value)).("_")).($_smarty_tpl->tpl_vars['id']->value),'max_id'=>((("#maxCost_").($_smarty_tpl->tpl_vars['category_id']->value)).("_")).($_smarty_tpl->tpl_vars['id']->value),'min'=>$_smarty_tpl->tpl_vars['chars_id']->value->min_name,'max'=>$_smarty_tpl->tpl_vars['chars_id']->value->max_name), 0);
?>

    </div>

    <?php echo '<script'; ?>
 type="text/javascript">
    var min_price = <?php echo (($tmp = @number_format((($tmp = @$_POST['char_min_range'][$_smarty_tpl->tpl_vars['id']->value])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['chars_id']->value->min_name : $tmp),0,'',''))===null||$tmp==='' ? 0 : $tmp);?>
;
    var max_price = <?php echo (($tmp = @number_format((($tmp = @$_POST['char_max_range'][$_smarty_tpl->tpl_vars['id']->value])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['chars_id']->value->max_name : $tmp),0,'',''))===null||$tmp==='' ? 0 : $tmp);?>
;
    var unit = ' <?php echo $_smarty_tpl->tpl_vars['chars_id']->value->unit;?>
'

    jQuery("#slider_ui_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").slider({
        min: min_price,
        max: max_price,
        values: [min_price, max_price],
        step: 1,
        range: true,
        stop: function (event, ui) {
            jQuery("input#minCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val(jQuery("#slider_ui_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").slider("values", 0));
            jQuery("input#maxCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val(jQuery("#slider_ui_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").slider("values", 1));
            jQuery("#minCostLabel_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").html(jQuery("#slider_ui_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").slider("values", 0) + unit);
            jQuery("#maxCostLabel_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").html(jQuery("#slider_ui_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").slider("values", 1) + unit);
            $('#podbor button').click();
        },
        slide: function (event, ui) {
            jQuery("input#minCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val(jQuery("#slider_ui_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").slider("values", 0));
            jQuery("input#maxCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val(jQuery("#slider_ui_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").slider("values", 1));
            jQuery("#minCostLabel_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").html(jQuery("#slider_ui_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").slider("values", 0) + unit);
            jQuery("#maxCostLabel_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").html(jQuery("#slider_ui_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").slider("values", 1) + unit);
        }
    });

    function validateField() {
        var value1 = parseInt(jQuery("input#minCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val());
        var value2 = parseInt(jQuery("input#maxCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val());

        if (isNaN(value1)) {
            value1 = min_price;
            jQuery("input#minCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val(value1);
            jQuery("#minCostLabel_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").html(value1);
        }
        else {
            jQuery("input#minCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val(value1)
            jQuery("#minCostLabel_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").html(value1);
        }

        if (isNaN(value2)) {
            value2 = max_price;
            jQuery("input#maxCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val(value2);
            jQuery("#maxCostLabel_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").html(value2);
        }
        else {
            jQuery("input#maxCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val(value2)
            jQuery("#maxCostLabel_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").html(value2);
        }
    }


    jQuery("input#minCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").change(function () {
        validateField()
        var value1 = parseInt(jQuery("input#minCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val());
        var value2 = parseInt(jQuery("input#maxCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val());

        if (value1 < min_price) {
            value1 = min_price;
            jQuery("input#minCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val(value1)
        }
        if (parseInt(value1) > parseInt(value2)) {
            value1 = value2;
            jQuery("input#minCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val(value1);
        }
        jQuery("#slider_ui_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").slider("values", 0, value1);
    });


    jQuery("input#maxCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").change(function () {
        validateField();
        var value1 = parseInt(jQuery("input#minCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val());
        var value2 = parseInt(jQuery("input#maxCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val());

        if (value2 > max_price) {
            value2 = max_price;
            jQuery("input#maxCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val(value2)
        }

        if (parseInt(value1) > parseInt(value2)) {
            value2 = value1;
            jQuery("input#maxCost_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").val(value2);
        }
        jQuery("#slider_ui_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").slider("values", 1, value2);
    });
    <?php echo '</script'; ?>
>
</div><?php }
}
?>