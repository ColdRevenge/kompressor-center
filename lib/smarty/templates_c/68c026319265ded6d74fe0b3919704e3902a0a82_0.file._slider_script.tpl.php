<?php /* Smarty version 3.1.24, created on 2017-01-27 18:01:27
         compiled from "E:/OpenServer/domains/kc-pskov.dev/templates/_slider_script.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:13189588b60c76bfe38_16446178%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68c026319265ded6d74fe0b3919704e3902a0a82' => 
    array (
      0 => 'E:/OpenServer/domains/kc-pskov.dev/templates/_slider_script.tpl',
      1 => 1485495635,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13189588b60c76bfe38_16446178',
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
  'unifunc' => 'content_588b60c76e85c3_08172205',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588b60c76e85c3_08172205')) {
function content_588b60c76e85c3_08172205 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '13189588b60c76bfe38_16446178';
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