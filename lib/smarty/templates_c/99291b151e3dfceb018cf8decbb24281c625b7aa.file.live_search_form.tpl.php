<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-21 19:10:45
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/search/templates/live_search_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:45168950955d469882d7e73-16159816%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99291b151e3dfceb018cf8decbb24281c625b7aa' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/search/templates/live_search_form.tpl',
      1 => 1440169993,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45168950955d469882d7e73-16159816',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d46988350ad1_27217981',
  'variables' => 
  array (
    'catalog_dir' => 0,
    'is_main' => 0,
    'shop' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d46988350ad1_27217981')) {function content_55d46988350ad1_27217981($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><div class="search">
    <form action="/<?php echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find/category/" name="" method="get" id="form-search">
        <div class="input-container">
            <div id="live_find_block">&nbsp;</div>
            <input type="text"  name="find" id="live_find" value="<?php echo smarty_modifier_replace(stripslashes($_GET['find']),'"','');?>
"   placeholder="Поиск товаров в каталоге" autocomplete="off" /><select name="shop_type">
                <option value="0">На всем сайте</option>
                <option value="1"<?php if ($_smarty_tpl->tpl_vars['is_main']->value!=1&&$_smarty_tpl->tpl_vars['shop']->value=='lalipop'&&!$_GET['shop_type']||$_GET['shop_type']=='1') {?> selected="selected"<?php }?>>В бижутерии</option>
                <option value="5"<?php if ($_smarty_tpl->tpl_vars['is_main']->value!=1&&$_smarty_tpl->tpl_vars['shop']->value=='woman'&&!$_GET['shop_type']||$_GET['shop_type']=='5') {?> selected="selected"<?php }?>>В одежде</option>
                <option value="2"<?php if ($_smarty_tpl->tpl_vars['is_main']->value!=1&&$_smarty_tpl->tpl_vars['shop']->value=='lady'&&!$_GET['shop_type']||$_GET['shop_type']=='2') {?> selected="selected"<?php }?>>В одежде больших размеров</option>
                <option value="3"<?php if ($_smarty_tpl->tpl_vars['is_main']->value!=1&&$_smarty_tpl->tpl_vars['shop']->value=='platok'&&!$_GET['shop_type']||$_GET['shop_type']=='3') {?> selected="selected"<?php }?>>В платках и шарфах</option>
                <option value="4"<?php if ($_smarty_tpl->tpl_vars['is_main']->value!=1&&$_smarty_tpl->tpl_vars['shop']->value=='sumka'&&!$_GET['shop_type']||$_GET['shop_type']=='4') {?> selected="selected"<?php }?>>В кожгалантереи</option>
            </select><button  class="search-icon"></button>	
            
        </div>
    </form>
</div><?php }} ?>
