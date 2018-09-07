<?php /* Smarty version 3.1.24, created on 2015-09-13 17:48:24
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/search/templates/live_search_form.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2361545355f58cb8a070a5_07976938%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc45cdb71c082833fe2dd9e58c0718a6e1ed823a' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/search/templates/live_search_form.tpl',
      1 => 1440169993,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2361545355f58cb8a070a5_07976938',
  'variables' => 
  array (
    'catalog_dir' => 0,
    'is_main' => 0,
    'shop' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f58cb8a7fca4_81707601',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f58cb8a7fca4_81707601')) {
function content_55f58cb8a7fca4_81707601 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '2361545355f58cb8a070a5_07976938';
?>
<div class="search">
    <form action="/<?php echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find/category/" name="" method="get" id="form-search">
        <div class="input-container">
            <div id="live_find_block">&nbsp;</div>
            <input type="text"  name="find" id="live_find" value="<?php echo smarty_modifier_replace(stripslashes($_GET['find']),'"','');?>
"   placeholder="Поиск товаров в каталоге" autocomplete="off" /><select name="shop_type">
                <option value="0">На всем сайте</option>
                <option value="1"<?php if ($_smarty_tpl->tpl_vars['is_main']->value != 1 && $_smarty_tpl->tpl_vars['shop']->value == 'lalipop' && !$_GET['shop_type'] || $_GET['shop_type'] == '1') {?> selected="selected"<?php }?>>В бижутерии</option>
                <option value="5"<?php if ($_smarty_tpl->tpl_vars['is_main']->value != 1 && $_smarty_tpl->tpl_vars['shop']->value == 'woman' && !$_GET['shop_type'] || $_GET['shop_type'] == '5') {?> selected="selected"<?php }?>>В одежде</option>
                <option value="2"<?php if ($_smarty_tpl->tpl_vars['is_main']->value != 1 && $_smarty_tpl->tpl_vars['shop']->value == 'lady' && !$_GET['shop_type'] || $_GET['shop_type'] == '2') {?> selected="selected"<?php }?>>В одежде больших размеров</option>
                <option value="3"<?php if ($_smarty_tpl->tpl_vars['is_main']->value != 1 && $_smarty_tpl->tpl_vars['shop']->value == 'platok' && !$_GET['shop_type'] || $_GET['shop_type'] == '3') {?> selected="selected"<?php }?>>В платках и шарфах</option>
                <option value="4"<?php if ($_smarty_tpl->tpl_vars['is_main']->value != 1 && $_smarty_tpl->tpl_vars['shop']->value == 'sumka' && !$_GET['shop_type'] || $_GET['shop_type'] == '4') {?> selected="selected"<?php }?>>В кожгалантереи</option>
            </select><button  class="search-icon"></button>	
            
        </div>
    </form>
</div><?php }
}
?>