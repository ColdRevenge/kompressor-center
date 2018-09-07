<?php /* Smarty version 3.1.24, created on 2015-09-13 23:34:14
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/characteristics/templates/product_quick.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:33190256955f5ddc68e0a86_50076854%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '445ee1412f976cd6d76da7b92e378df6bea5bc4f' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/characteristics/templates/product_quick.tpl',
      1 => 1434468598,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33190256955f5ddc68e0a86_50076854',
  'variables' => 
  array (
    'is_del' => 0,
    'add_value_id' => 0,
    'is_edit' => 0,
    'get_value' => 0,
    'param_tpl' => 0,
    'admin_url' => 0,
    'is_change' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f5ddc6983510_71440206',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f5ddc6983510_71440206')) {
function content_55f5ddc6983510_71440206 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '33190256955f5ddc68e0a86_50076854';
?>

<?php $_smarty_tpl->tpl_vars["time"] = new Smarty_Variable(time(), null, 0);?>
<div style="float: right; margin-top: -5px;"><a href="" onclick="$('.set_char_product_value').remove();
        $('#char_set_form').remove();
        return false;"><img src="/images/sys/close_1.png" alt="" /></a></div>
        <?php if ($_smarty_tpl->tpl_vars['is_del']->value == 1) {?>
    <h2 style="margin-top: 5px">Значение успешно удалено!</h2>
<?php } elseif ($_smarty_tpl->tpl_vars['add_value_id']->value) {?> 
    <h2 style="margin-top: 5px">Значение успешно добавлено!</h2>

<?php } elseif ($_smarty_tpl->tpl_vars['is_edit']->value == 1) {?> 

    <h2 style="margin-top: 5px">Значение успешно сохранено!</h2>
<?php } else { ?>

    <?php if (!$_smarty_tpl->tpl_vars['get_value']->value->id) {?>
        <h2 style="margin-top: 0">Добавить значение</h2>
        <input type="hidden" name="value_id" value="0" />
    <?php } else { ?>
        <h2 style="margin-top: 0">Редактировать значение</h2>
        <input type="hidden" name="value_id" value="<?php echo $_smarty_tpl->tpl_vars['get_value']->value->id;?>
" />
    <?php }?>
    <input type="hidden" name="characteristic_id" value="<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['characteristic_id'];?>
" />
    <div class="clear">&nbsp;</div>
    <input type="text" value="<?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['get_value']->value->name),'"','&quot;');?>
" name="value_name" placeholder="Значение характеристики" />
    <input type="text" value="<?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['get_value']->value->unit),'"','&quot;');?>
" name="value_unit" style="width: 50px;"  placeholder="ед. изм." />
    <button onclick="$(this).hide();
            AjaxFormRequest('char_set_block_result', 'char_set_form', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
characteristics/product_quick/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['characteristic_id'];?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['add_value_id']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['param_tpl']->value['value_id'] : $tmp);?>
/');
            return false;"> <?php if (!$_smarty_tpl->tpl_vars['get_value']->value->id) {?>Добавить<?php } else { ?>Сохранить<?php }?></button>
    <?php if ($_smarty_tpl->tpl_vars['get_value']->value->id) {?><button onclick="if (confirm('Вы действительно хотите удалить значение <?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['get_value']->value->name),'"','&quot;');?>
')) {
                $(this).hide();
                AjaxRequestAsync('char_set_block_result', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
characteristics/product_quick/del/1/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['characteristic_id'];?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['add_value_id']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['param_tpl']->value['value_id'] : $tmp);?>
/');
                return false;
            }">Удалить</button><?php }?>
    <?php }?>



    <?php if ($_smarty_tpl->tpl_vars['is_change']->value == 1) {?>  
            <?php echo '<script'; ?>
 type="text/javascript">
                AjaxRequestAsync('characteristic_select_<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['characteristic_id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
characteristics/product_quick/select/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['characteristic_id'];?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['add_value_id']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['param_tpl']->value['value_id'] : $tmp);?>
/');
                $('#characteristic_select_<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['characteristic_id'];?>
').next('a').find('img').attr('src', ($('#characteristic_select_<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['characteristic_id'];?>
 option:selected').val() == 0) ? '/images/sys/admin/add.png' : '/images/sys/admin/edit.png');
            <?php echo '</script'; ?>
>
        <?php }?>


<?php }
}
?>