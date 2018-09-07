<?php /* Smarty version 3.1.24, created on 2018-07-02 10:51:10
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/catalog/templates/getProductItem.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:7414545295b39d96ecbcda0_62120023%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ccdd8b362499e94f633c36173f0077bfd1b6def' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/catalog/templates/getProductItem.tpl',
      1 => 1530517868,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7414545295b39d96ecbcda0_62120023',
  'variables' => 
  array (
    'product' => 0,
    'old_price_discaunt' => 0,
    'url' => 0,
    'setting' => 0,
    '_shop_url' => 0,
    'ichar' => 0,
    'key' => 0,
    'product_images' => 0,
    'gallery_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39d96edcaa37_14398686',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39d96edcaa37_14398686')) {
function content_5b39d96edcaa37_14398686 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/user-kc/data/www/www.kompressor-center.com/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '7414545295b39d96ecbcda0_62120023';
if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>
    <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_Variable(($_smarty_tpl->tpl_vars['product']->value->price*100)/$_smarty_tpl->tpl_vars['product']->value->old_price, null, 0);?>
    <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_Variable($_smarty_tpl->tpl_vars['old_price_discaunt']->value-100, null, 0);?>
<?php } else { ?>
    <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_Variable(0, null, 0);?>
<?php }?>
<?php $_smarty_tpl->tpl_vars['product_id'] = new Smarty_Variable($_smarty_tpl->tpl_vars['product']->value->id, null, 0);?>

<?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable($_smarty_tpl->tpl_vars['url']->value, null, 0);?>
<div class="product <?php if ($_smarty_tpl->tpl_vars['setting']->value->hide_prices) {?>-no-price<?php }?>">
    <div class="product__head">
        <div class="product__article">Артикул <?php echo $_smarty_tpl->tpl_vars['product']->value->article;?>
</div>
        <a class="product__chars-link js-product-show-chars" href="#">Характеристики</a>
    </div>
    <a href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/" class="product__title">
        <?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>

    </a>
    <div class="product__imchar">
        <div class="product__chars-list chars js-product-chars scrollbar-inner">
            <?php if ($_smarty_tpl->tpl_vars['product']->value->chars) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['product']->value->chars;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["ichar"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["ichar"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["ichar"]->value) {
$_smarty_tpl->tpl_vars["ichar"]->_loop = true;
$foreach_ichar_Sav = $_smarty_tpl->tpl_vars["ichar"];
?>
                    <div class="chars__row">
                        <div class="chars__name"><?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['ichar']->value->characteristic_name,"?",''));?>
:</div>
                        <div class="chars__value"><?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['ichar']->value->value_name,"?",''));?>
</div>
                    </div>
                <?php
$_smarty_tpl->tpl_vars["ichar"] = $foreach_ichar_Sav;
}
?>
            <?php }?>
        </div>
        <a href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/" class="product__image">
            <?php if ($_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1]) {?>
                <img class="product__img" src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][4][0]->file;?>
" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" id="catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" />
            <?php } else { ?>
                <img class="product__img" src="/images/icons/no-image.png" alt="" id="catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"  />
            <?php }?>
        </a>

        <?php if ($_smarty_tpl->tpl_vars['product']->value->is_param_1 == 1) {?>
            <div class="product__label _discount">Скидка</div>
        <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_3 == 1) {?>
            <div class="product__label _new">Новинка</div>
        <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_2 == 1) {?>
            <div class="product__label _promo">Акция</div>
        <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_5 == 1) {?>
            <div class="product__label _sale">Распродажа</div>
        <?php }?>
    </div>


    <div class="product__bottom">

        <?php if (!$_smarty_tpl->tpl_vars['setting']->value->hide_prices) {?>
            <div class="product__prices product-prices <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>-with-old<?php }?>">
                <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>
                    <div class="product-prices__old price -old">
                        <span class="price__val"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value->old_price,0,''," ");?>
</span>
                        <span class="price__currency">руб</span>
                    </div>
                <?php }?>
                <div class="product-prices__current price">
                    <span class="price__val"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value->price,0,'.',' ');?>
</span>
                    <span class="price__currency">руб</span>
                </div>
            </div>
        <?php }?>

        <div class="product__controls">
            <a href="/vs_product/<?php echo $_smarty_tpl->tpl_vars['product']->value->category_1_id;?>
/?is_modal=1'" 
               class="product__compare compare-icon <?php if ($_SESSION['vs_product'][$_smarty_tpl->tpl_vars['product']->value->id]) {?>-active<?php }?>" 
               data-id="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" 
               title="<?php if ($_SESSION['vs_product'][$_smarty_tpl->tpl_vars['product']->value->id]) {?>Сравнить<?php } else { ?>Добавить к сравнению<?php }?>">
                <span class="sprite -compare"></span>
            </a>
            <?php if (!$_smarty_tpl->tpl_vars['setting']->value->hide_prices) {?>
                <a href="#" class="product__cart btn js-add-to-cart" data-id="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" data-mod-id="<?php echo $_smarty_tpl->tpl_vars['product']->value->mod_id;?>
" data-image-id="<?php echo $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1][0]->id;?>
">В корзину</a>
            <?php }?>
            <a href="#" 
               class="product__fav add-to-fav-icon <?php if ($_SESSION['fav'][$_smarty_tpl->tpl_vars['product']->value->id]) {?>-active<?php }?>" 
               data-id="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"
               data-url="/catalog/add_to_fav/"
               title="<?php if ($_SESSION['fav'][$_smarty_tpl->tpl_vars['product']->value->id]) {?>Удалить из избранного<?php } else { ?>Добавить в избранное<?php }?>">
                <span class="sprite -add-to-fav"></span>
            </a>
        </div>
    </div>
</div>
<?php }
}
?>