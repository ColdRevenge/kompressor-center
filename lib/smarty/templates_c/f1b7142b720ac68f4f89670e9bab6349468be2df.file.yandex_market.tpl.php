<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-27 19:26:16
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/sync/templates/yandex_market.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131775014155df3a288d7e13-90091280%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1b7142b720ac68f4f89670e9bab6349468be2df' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/sync/templates/yandex_market.tpl',
      1 => 1439727143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131775014155df3a288d7e13-90091280',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'is_change' => 0,
    'url' => 0,
    'shop' => 0,
    'products_in_xml' => 0,
    'item' => 0,
    'key' => 0,
    'category' => 0,
    'set' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55df3a28952f04_10192385',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55df3a28952f04_10192385')) {function content_55df3a28952f04_10192385($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
?><div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_sync.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="page">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

        <h1>Яндекс-Маркет - YML</h1>
        <div style="margin: 20px; padding: 20px; background-color: white;border: 1px solid #CCCCCC;">
            Файл для Яндекс.Маркета обновлен <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['is_change']->value,"%d.%m.%Y %H:%M");?>
<br/><br/>
            Скачать YML файл  - <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
market/yandex<?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady') {?>_lady<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value=='sumka') {?>_sumka<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value=='platok') {?>_platok<?php }?>.xml" target="_blank"><?php echo $_smarty_tpl->tpl_vars['url']->value;?>
market/yandex<?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady') {?>_lady<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value=='sumka') {?>_sumka<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value=='platok') {?>_platok<?php }?>.xml</a> - <b><?php echo count($_smarty_tpl->tpl_vars['products_in_xml']->value['url']);?>
 продуктов</b> (<a href="javascript:void(0)" onclick="Show('xml_in_products')">посмотреть</a>)

            <div id="xml_in_products" style="display: none;">
                <ol>
                    <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['products_in_xml']->value['url']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["item"]->key;
?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" target="_blank"><?php echo stripslashes($_smarty_tpl->tpl_vars['products_in_xml']->value['name'][$_smarty_tpl->tpl_vars['key']->value]);?>
</a></li>
                        <?php } ?>
                </ol>
            </div>

        </div>
        <form method="post" action="">
            <h1>1. Выберите категории и товары</h1>
            <div style="margin-left: 30px;">
                <div style="padding: 2px 0px; margin-left: 0px">
                    <label class="p-check"><input type="checkbox" onchange="jQuery(this).parent().parent().parent().find('input[type=checkbox]').attr('checked', this.checked);" ><em>&nbsp;</em><span>Выделить все</span></label>
                </div>
                <?php echo $_smarty_tpl->getSubTemplate ('tree_category_product.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>0,'tree'=>$_smarty_tpl->tpl_vars['category']->value,'inc'=>'tree_category_product.tpl','level'=>0), 0);?>

            </div>
            <h2>Настройки</h2>
            <div style="margin-left: 30px;">
                Стоимость доставки<span class="asterix">*</span>: <input type="text" name="delivery_yandex_market" maxlength="11" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['set']->value->delivery_yandex_market)===null||$tmp==='' ? 0 : $tmp);?>
" style="width: 70px;" /> руб. <br/>
                <label class="p-check"><input type="checkbox" value="1" name="is_warehouse"  checked="checked" id="is_warehouse_label" style="vertical-align: middle;" /><em>&nbsp;</em><span>Не экспортировать товары с нулевым остатком на складе</span></label>
            </div>

            <br/>
            <button>Экспортировать товары</button>
        </form>
    </div>
</div><?php }} ?>
