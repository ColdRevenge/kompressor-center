<?php /* Smarty version 3.1.24, created on 2015-09-13 16:02:12
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/catalog/templates/_slider_script.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:61114718355f573d4be5c97_94461684%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2415fbecb1d14430950d2864910b1fbe05da049' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/catalog/templates/_slider_script.tpl',
      1 => 1434030749,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61114718355f573d4be5c97_94461684',
  'variables' => 
  array (
    'min' => 0,
    'max' => 0,
    'slider_id' => 0,
    'min_name' => 0,
    'max_name' => 0,
    'min_id' => 0,
    'max_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f573d4c29f63_84350369',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f573d4c29f63_84350369')) {
function content_55f573d4c29f63_84350369 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '61114718355f573d4be5c97_94461684';
?>

<?php echo '<script'; ?>
 type="text/javascript">
    var min_price = <?php echo (($tmp = @$_smarty_tpl->tpl_vars['min']->value)===null||$tmp==='' ? 0 : $tmp);?>
;
    var max_price = <?php echo (($tmp = @$_smarty_tpl->tpl_vars['max']->value)===null||$tmp==='' ? 1000 : $tmp);?>
;
    var unit = ' р.'

    jQuery("<?php echo $_smarty_tpl->tpl_vars['slider_id']->value;?>
").slider({
        min: min_price,
        max: max_price,
        values: [<?php echo (($tmp = @$_smarty_tpl->tpl_vars['min_name']->value)===null||$tmp==='' ? "min_price" : $tmp);?>
,<?php echo (($tmp = @$_smarty_tpl->tpl_vars['max_name']->value)===null||$tmp==='' ? "max_price" : $tmp);?>
],
        step: 10,
        range: true,
        stop: function(event, ui) {
            jQuery("input<?php echo $_smarty_tpl->tpl_vars['min_id']->value;?>
").val(jQuery("<?php echo $_smarty_tpl->tpl_vars['slider_id']->value;?>
").slider("values", 0));
            jQuery("input<?php echo $_smarty_tpl->tpl_vars['max_id']->value;?>
").val(jQuery("<?php echo $_smarty_tpl->tpl_vars['slider_id']->value;?>
").slider("values", 1));
            jQuery("<?php echo $_smarty_tpl->tpl_vars['min_id']->value;?>
Label").html(jQuery("<?php echo $_smarty_tpl->tpl_vars['slider_id']->value;?>
").slider("values", 0) + unit);
            jQuery("<?php echo $_smarty_tpl->tpl_vars['max_id']->value;?>
Label").html(jQuery("<?php echo $_smarty_tpl->tpl_vars['slider_id']->value;?>
").slider("values", 1) + unit);
            $('#podbor button').click();
        },
        slide: function(event, ui) {
            jQuery("input<?php echo $_smarty_tpl->tpl_vars['min_id']->value;?>
").val(jQuery("<?php echo $_smarty_tpl->tpl_vars['slider_id']->value;?>
").slider("values", 0));
            jQuery("input<?php echo $_smarty_tpl->tpl_vars['max_id']->value;?>
").val(jQuery("<?php echo $_smarty_tpl->tpl_vars['slider_id']->value;?>
").slider("values", 1));
            jQuery("<?php echo $_smarty_tpl->tpl_vars['min_id']->value;?>
Label").html(jQuery("<?php echo $_smarty_tpl->tpl_vars['slider_id']->value;?>
").slider("values", 0) + unit);
            jQuery("<?php echo $_smarty_tpl->tpl_vars['max_id']->value;?>
Label").html(jQuery("<?php echo $_smarty_tpl->tpl_vars['slider_id']->value;?>
").slider("values", 1) + unit);
        }
    });

    function validateField() {
        var value1 = parseInt(jQuery("input<?php echo $_smarty_tpl->tpl_vars['min_id']->value;?>
").val());
        var value2 = parseInt(jQuery("input<?php echo $_smarty_tpl->tpl_vars['max_id']->value;?>
").val());

        if (isNaN(value1)) {
            value1 = min_price;
            jQuery("input<?php echo $_smarty_tpl->tpl_vars['min_id']->value;?>
").val(value1);
            jQuery("<?php echo $_smarty_tpl->tpl_vars['min_id']->value;?>
Label").html(value1);
        }
        else {
            jQuery("input<?php echo $_smarty_tpl->tpl_vars['min_id']->value;?>
").val(value1)
            jQuery("<?php echo $_smarty_tpl->tpl_vars['min_id']->value;?>
Label").html(value1);
        }

        if (isNaN(value2)) {
            value2 = max_price;
            jQuery("input<?php echo $_smarty_tpl->tpl_vars['max_id']->value;?>
").val(value2);
            jQuery("<?php echo $_smarty_tpl->tpl_vars['max_id']->value;?>
Label").html(value2);
        }
        else {
            jQuery("input<?php echo $_smarty_tpl->tpl_vars['max_id']->value;?>
").val(value2)
            jQuery("<?php echo $_smarty_tpl->tpl_vars['max_id']->value;?>
Label").html(value2);
        }
    }


    jQuery("input<?php echo $_smarty_tpl->tpl_vars['min_id']->value;?>
").change(function() {
        validateField()
        var value1 = parseInt(jQuery("input<?php echo $_smarty_tpl->tpl_vars['min_id']->value;?>
").val());
        var value2 = parseInt(jQuery("input<?php echo $_smarty_tpl->tpl_vars['max_id']->value;?>
").val());

        if (value1 < min_price) {
            value1 = min_price;
            jQuery("input<?php echo $_smarty_tpl->tpl_vars['min_id']->value;?>
").val(value1)
        }
        if (parseInt(value1) > parseInt(value2)) {
            value1 = value2;
            jQuery("input<?php echo $_smarty_tpl->tpl_vars['min_id']->value;?>
").val(value1);
        }
        jQuery("<?php echo $_smarty_tpl->tpl_vars['slider_id']->value;?>
").slider("values", 0, value1);
    });


    jQuery("input<?php echo $_smarty_tpl->tpl_vars['max_id']->value;?>
").change(function() {
        validateField();
        var value1 = parseInt(jQuery("input<?php echo $_smarty_tpl->tpl_vars['min_id']->value;?>
").val());
        var value2 = parseInt(jQuery("input<?php echo $_smarty_tpl->tpl_vars['max_id']->value;?>
").val());

        if (value2 > max_price) {
            value2 = max_price;
            jQuery("input<?php echo $_smarty_tpl->tpl_vars['max_id']->value;?>
").val(value2)
        }

        if (parseInt(value1) > parseInt(value2)) {
            value2 = value1;
            jQuery("input<?php echo $_smarty_tpl->tpl_vars['max_id']->value;?>
").val(value2);
        }
        jQuery("<?php echo $_smarty_tpl->tpl_vars['slider_id']->value;?>
").slider("values", 1, value2);
    });
<?php echo '</script'; ?>
><?php }
}
?>