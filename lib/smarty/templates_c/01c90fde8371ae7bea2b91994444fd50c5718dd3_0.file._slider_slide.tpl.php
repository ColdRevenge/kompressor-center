<?php /* Smarty version 3.1.24, created on 2018-07-02 08:34:20
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/catalog/templates/_slider_slide.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:10873193355b39b95c726974_53342250%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01c90fde8371ae7bea2b91994444fd50c5718dd3' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/catalog/templates/_slider_slide.tpl',
      1 => 1530509447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10873193355b39b95c726974_53342250',
  'variables' => 
  array (
    'name' => 0,
    'id' => 0,
    'chars_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39b95c746056_68118605',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39b95c746056_68118605')) {
function content_5b39b95c746056_68118605 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '10873193355b39b95c726974_53342250';
?>
<div class="podbor-list__cell podbor-item">
    <div class="podbor-item__data">
        <div class="podbor-item__title"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
:</div>
        <div class="podbor-item__value _range">
            <span class="podbor-item__from">от</span>
            <input type="text" class="podbor-item__range" name="char_min_range[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
]" value="<?php echo (($tmp = @number_format((($tmp = @$_POST['char_min_range'][$_smarty_tpl->tpl_vars['id']->value])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['chars_id']->value->min_name : $tmp),0,'',''))===null||$tmp==='' ? 0 : $tmp);?>
" />
            <span class="podbor-item__to">до</span>
            <input type="text" class="podbor-item__range" name="char_max_range[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
]" value="<?php echo (($tmp = @number_format((($tmp = @$_POST['char_max_range'][$_smarty_tpl->tpl_vars['id']->value])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['chars_id']->value->max_name : $tmp),0,'',''))===null||$tmp==='' ? 0 : $tmp);?>
"/> 
        </div>
    </div>
</div><?php }
}
?>