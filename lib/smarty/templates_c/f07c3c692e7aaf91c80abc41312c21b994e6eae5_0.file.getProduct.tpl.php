<?php /* Smarty version 3.1.24, created on 2017-01-28 02:33:09
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/catalog/templates/getProduct.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:915045416588bd8b5dc4ca9_33442834%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f07c3c692e7aaf91c80abc41312c21b994e6eae5' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/catalog/templates/getProduct.tpl',
      1 => 1485559641,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '915045416588bd8b5dc4ca9_33442834',
  'variables' => 
  array (
    'is_mobile' => 0,
    'base_dir' => 0,
    'shop' => 0,
    'param_tpl' => 0,
    'products' => 0,
    'product' => 0,
    'old_price_discaunt' => 0,
    'url' => 0,
    'setting' => 0,
    '_shop_url' => 0,
    'key' => 0,
    'product_images' => 0,
    'gallery_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_588bd8b5ee22a8_94720517',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588bd8b5ee22a8_94720517')) {
function content_588bd8b5ee22a8_94720517 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/user-kc-pskov/data/www/kc-pskov.ru/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '915045416588bd8b5dc4ca9_33442834';
if ($_smarty_tpl->tpl_vars['is_mobile']->value == 1) {?>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).('modules/catalog/templates/getProductParamMain.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php } else { ?>
    <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady' || $_smarty_tpl->tpl_vars['shop']->value == 'woman') {?>
        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).('modules/catalog/templates/getProductLady.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <?php } else { ?>
        <div id="indicator_catalog">
            <?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['param_id'] == 3) {?>
                <?php if ($_smarty_tpl->tpl_vars['products']->value[0]->created) {?>
                    <p>Последнее поступление новинок: <b><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['products']->value[0]->created,"%d.%m.%Y");?>
</b></p>
                <?php }?>
            <?php }?>
            <div class="products">
                <?php
$_from = $_smarty_tpl->tpl_vars['products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["product"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["product"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
$foreach_product_Sav = $_smarty_tpl->tpl_vars["product"];
?>
                    <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>
                        <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_Variable(($_smarty_tpl->tpl_vars['product']->value->price*100)/$_smarty_tpl->tpl_vars['product']->value->old_price, null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_Variable($_smarty_tpl->tpl_vars['old_price_discaunt']->value-100, null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_Variable(0, null, 0);?>
                    <?php }?>
                    <?php $_smarty_tpl->tpl_vars['product_id'] = new Smarty_Variable($_smarty_tpl->tpl_vars['product']->value->id, null, 0);?>

                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable($_smarty_tpl->tpl_vars['url']->value, null, 0);?>

                    <div class="product">

                        <?php if (!$_smarty_tpl->tpl_vars['setting']->value->hide_prices) {?>
                            <?php if ($_smarty_tpl->tpl_vars['old_price_discaunt']->value) {?>
                                <div class="size_block">
                                    <span><?php echo number_format($_smarty_tpl->tpl_vars['old_price_discaunt']->value);?>
%</span>
                                </div>
                            <?php }?>
                        <?php }?>

                        <div class="img-box">
                            <?php if ($_smarty_tpl->tpl_vars['product']->value->is_param_1 == 1) {?>
                                <img src="/images/fronted/sale.png" class="sale" alt="" />
                            <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_3 == 1) {?>
                                <img src="/images/fronted/novinka.png" class="sale" alt="" />
                            <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_2 == 1) {?>
                                <img src="/images/fronted/lucena.png" class="sale" alt="" />
                            <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_4 == 1) {?>
                                <img src="/images/fronted/lider.png" class="sale" alt=""  />
                            <?php }?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" class="product_img">
                                <span id="img_box_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
">
                                    <?php if ($_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1]) {?>
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][3][0]->file;?>
" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" id="catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" />
                                    <?php } else { ?>
                                        <img src="/images/icons/no-image.png" alt="" id="catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"  />
                                    <?php }?>
                                </span>
                            </a>
                        </div>

                        <div class="name">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/">
                                <?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>

                            </a>
                        </div>

                        <div class="article">Артикул: <b><?php echo $_smarty_tpl->tpl_vars['product']->value->article;?>
</b></div>
                        <?php if (!$_smarty_tpl->tpl_vars['setting']->value->hide_prices) {?>
                            <div class="price">
                                <?php echo number_format($_smarty_tpl->tpl_vars['product']->value->price,0,'.',' ');?>

                                <?php if ($_smarty_tpl->tpl_vars['product']->value->max_price != $_smarty_tpl->tpl_vars['product']->value->price && $_smarty_tpl->tpl_vars['product']->value->max_price > 0) {?>
                                     - <?php echo $_smarty_tpl->smarty->registered_objects['price'][0]->getPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value->max_price,'product_id'=>$_smarty_tpl->tpl_vars['product']->value->id,'is_query_price'=>1,'is_max'=>1),$_smarty_tpl);?>

                                <?php }?> руб.  
                                <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>
                                    &nbsp;<span><?php echo number_format($_smarty_tpl->tpl_vars['product']->value->old_price,0,''," ");?>
 р.</span>
                                <?php }?>
                            </div>


                            <button class="buy"  onclick="basketAnimated('#img_box_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
', '#catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
',<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['product']->value->mod_id;?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1][0]->id)===null||$tmp==='' ? 0 : $tmp);?>
, 0, 0, 0, 1);">Купить</button>
                        <?php }?>
                        
                        <button class="detailed" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/'">Подробнее</button>
               
                    </div>
                <?php
$_smarty_tpl->tpl_vars["product"] = $foreach_product_Sav;
}
?>
            </div> 
            <div class="clear"></div>
        </div>
    <?php }?>
<?php }
}
}
?>