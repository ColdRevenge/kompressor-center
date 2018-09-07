<?php /* Smarty version 3.1.24, created on 2018-07-05 11:33:35
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/products/templates/product.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:907081015b3dd7df0cd479_42258019%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb663a83a4a5d3fdbe6e283ef5a0adf8bf1b3311' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/products/templates/product.tpl',
      1 => 1530779441,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '907081015b3dd7df0cd479_42258019',
  'variables' => 
  array (
    'product' => 0,
    'old_price_discaunt' => 0,
    'key' => 0,
    'product_images' => 0,
    'url' => 0,
    'bread_page_arr' => 0,
    'adress' => 0,
    'bread' => 0,
    'page_id' => 0,
    'back_url' => 0,
    'is_ajax' => 0,
    'img_num' => 0,
    'gallery_url' => 0,
    'product_mods' => 0,
    'setting' => 0,
    'mod' => 0,
    'is_b2b' => 0,
    'characteristics_product' => 0,
    'is_out_char' => 0,
    'value' => 0,
    'value_1' => 0,
    'is_out_char_value_1' => 0,
    'news_product' => 0,
    'news' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b3dd7df2dd715_83142014',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b3dd7df2dd715_83142014')) {
function content_5b3dd7df2dd715_83142014 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/user-kc/data/www/www.kompressor-center.com/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '907081015b3dd7df0cd479_42258019';
if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>
    <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_Variable(($_smarty_tpl->tpl_vars['product']->value->price*100)/$_smarty_tpl->tpl_vars['product']->value->old_price, null, 0);?>
    <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_Variable($_smarty_tpl->tpl_vars['old_price_discaunt']->value-100, null, 0);?>
<?php } else { ?>
    <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_Variable(0, null, 0);?>
<?php }?>
<?php $_smarty_tpl->tpl_vars["product_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['product']->value->id, null, 0);?>

<?php echo '<script'; ?>
 type="text/javascript">
    var char_1_id = 0;
    var char_2_id = 0;
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">selected_image_id = <?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_images']->value[1][$_smarty_tpl->tpl_vars['key']->value]->id)===null||$tmp==='' ? 0 : $tmp);?>
<?php echo '</script'; ?>
>

<?php if ($_GET['is_modal'] != 1) {?>
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumbs__cont">
                <?php $_smarty_tpl->tpl_vars["adress"] = new Smarty_Variable('', null, 0);?>
                <li class="breadcrumbs__item"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" class="breadcrumbs__link">Главная</a></li>
                <li class="breadcrumbs__item"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
catalog" class="breadcrumbs__link">Каталог товаров</a></li>
                <?php
$_from = $_smarty_tpl->tpl_vars['bread_page_arr']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["bread"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["bread"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["bread"]->value) {
$_smarty_tpl->tpl_vars["bread"]->_loop = true;
$foreach_bread_Sav = $_smarty_tpl->tpl_vars["bread"];
?>
                    <?php $_smarty_tpl->tpl_vars["adress"] = new Smarty_Variable((($_smarty_tpl->tpl_vars['adress']->value).($_smarty_tpl->tpl_vars['bread']->value->pseudo_dir)).('/'), null, 0);?>
                    <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['adress']->value;?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['bread']->value->bread_name)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['bread']->value->name : $tmp);?>
</a></li>
                <?php
$_smarty_tpl->tpl_vars["bread"] = $foreach_bread_Sav;
}
?>
                <?php if ($_smarty_tpl->tpl_vars['page_id']->value > 1) {?><li class="breadcrumbs__item"><a class="breadcrumbs__link" href="<?php echo $_smarty_tpl->tpl_vars['back_url']->value;?>
">Страница <?php echo $_smarty_tpl->tpl_vars['page_id']->value;?>
</a></li><?php }?>
                <li class="breadcrumbs__item"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
 </li>
            </ul>
        </div>
    </div>
<?php }?>
<div class="<?php if ($_smarty_tpl->tpl_vars['is_ajax']->value != 1) {?>container<?php }?>">
    <div itemscope itemtype="http://schema.org/Product">
        <h1 class="headline" itemprop="name"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
</h1>

        <div class="p-product">
            <div class="p-product__cont">
                <div class="p-product__left">
                    <div class="p-product__image">
                        <?php $_smarty_tpl->tpl_vars["img_num"] = new Smarty_Variable("0", null, 0);?>
                        <?php if ($_GET['img'] > 0) {
$_smarty_tpl->tpl_vars["img_num"] = new Smarty_Variable($_GET['img'], null, 0);
}?>
                        <?php if ($_smarty_tpl->tpl_vars['product_images']->value[6][$_smarty_tpl->tpl_vars['img_num']->value]->file) {?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[6][$_smarty_tpl->tpl_vars['img_num']->value]->file;?>
" class="p-product__img" itemprop="image" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" />
                        <?php } else { ?>
                            <img src="/images/icons/no-image.png" class="p-product__img" alt="" />
                        <?php }?>
                    </div>
                    <div class="p-product__description text">
                        <h3>Описание</h3>
                        <div itemprop="description">
                            <?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->desc);?>

                        </div>
                    </div>
                </div>
                <div class="p-product__info p-product-info">
                    <?php
$_from = $_smarty_tpl->tpl_vars['product_mods']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["mod"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["mod"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["mod"]->value) {
$_smarty_tpl->tpl_vars["mod"]->_loop = true;
$foreach_mod_Sav = $_smarty_tpl->tpl_vars["mod"];
?>
                        <div class="p-product-info__data <?php if ($_smarty_tpl->tpl_vars['setting']->value->hide_prices) {?>_no-margin<?php }?>">
                            <div class="p-product-info__left">
                                <div class="p-main">
                                    <div class="p-main__article">Артикул: <?php echo $_smarty_tpl->tpl_vars['mod']->value->article;?>
</div>
                                    <?php if (!$_smarty_tpl->tpl_vars['setting']->value->hide_prices) {?>
                                        <div class="p-main__prices product-prices <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>-with-old<?php }?>">
                                            <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>
                                                <div class="product-prices__old price -old">
                                                    <span class="price__val"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value->old_price,0,'.',' ');?>
</span>
                                                    <span class="price__currency">руб</span>
                                                </div>
                                            <?php }?>
                                            <div class="product-prices__current price">
                                                <span class="price__val" itemprop="price">
                                                    <?php if ($_smarty_tpl->tpl_vars['is_b2b']->value != 1) {?>
                                                        <?php echo number_format($_smarty_tpl->tpl_vars['product']->value->price,0,'.',' ');?>

                                                    <?php } else { ?>
                                                        <?php echo $_smarty_tpl->smarty->registered_objects['price'][0]->getPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value->price,'product_id'=>$_smarty_tpl->tpl_vars['product']->value->id,'is_query_price'=>1),$_smarty_tpl);?>

                                                    <?php }?>
                                                </span>
                                                <span itemprop="priceCurrency" class="price__currency">руб</span>
                                                <span itemprop="priceCurrency" style="display: none">RUB</span>
                                            </div>
                                        </div>
                                        <?php if ($_smarty_tpl->tpl_vars['mod']->value->warehouse > 0 && $_smarty_tpl->tpl_vars['product']->value->is_active == 1) {?>
                                            <div class="p-main__button">
                                                <a href="#" 
                                                   class="btn js-add-to-cart" 
                                                   data-id="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"
                                                   data-mod-id="<?php echo $_smarty_tpl->tpl_vars['mod']->value->id;?>
"
                                                   data-image-id="<?php echo $_smarty_tpl->tpl_vars['product_images']->value[1][$_smarty_tpl->tpl_vars['img_num']->value]->id;?>
"
                                                   >В корзину</a>
                                            </div>
                                        <?php }?>
                                    <?php } else { ?>
                                        <div class="p-main__prices">
                                            <a href="#" 
                                               class="add-to-fav-icon <?php if ($_SESSION['fav'][$_smarty_tpl->tpl_vars['product']->value->id]) {?>-active<?php }?>" 
                                               data-id="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"
                                               data-url="/catalog/add_to_fav/"
                                               title="<?php if ($_SESSION['fav'][$_smarty_tpl->tpl_vars['product']->value->id]) {?>Удалить из избранного<?php } else { ?>Добавить в избранное<?php }?>">
                                                <span class="sprite -add-to-fav"></span>
                                            </a>
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="p-product-info__right">
                                <div class="p-main">
                                    <?php if ($_smarty_tpl->tpl_vars['mod']->value->warehouse > 0 && $_smarty_tpl->tpl_vars['product']->value->is_active == 1) {?>
                                        <div class="p-main__availability p-availability -available">
                                            <link itemprop="availability" href="http://schema.org/InStock" />
                                            В наличии
                                        </div>
                                    <?php } else { ?>
                                        <div class="p-main__availability p-availability">
                                            <link itemprop="availability" href="http://schema.org/OutOfStock" />
                                            Товара нет в наличии
                                        </div>
                                    <?php }?>
                                    <div class="p-main__prices">
                                        <a href="/vs_product/<?php echo $_smarty_tpl->tpl_vars['product']->value->category_1_id;?>
/?is_modal=1'" 
                                           class="compare-icon <?php if ($_SESSION['vs_product'][$_smarty_tpl->tpl_vars['product']->value->id]) {?>-active<?php }?>" 
                                           data-id="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" 
                                           title="<?php if ($_SESSION['vs_product'][$_smarty_tpl->tpl_vars['product']->value->id]) {?>Сравнить<?php } else { ?>Добавить к сравнению<?php }?>">
                                            <span class="sprite -compare"></span>
                                        </a>
                                    </div>
                                    <?php if (!$_smarty_tpl->tpl_vars['setting']->value->hide_prices) {?>
                                        <div class="p-main__button">
                                            <a href="#" 
                                               class="add-to-fav-icon <?php if ($_SESSION['fav'][$_smarty_tpl->tpl_vars['product']->value->id]) {?>-active<?php }?>" 
                                               data-id="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"
                                               data-url="/catalog/add_to_fav/"
                                               title="<?php if ($_SESSION['fav'][$_smarty_tpl->tpl_vars['product']->value->id]) {?>Удалить из избранного<?php } else { ?>Добавить в избранное<?php }?>">
                                                <span class="sprite -add-to-fav"></span>
                                            </a>
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="p-product-info__chars chars -striped -bigger">
                            <?php
$_from = $_smarty_tpl->tpl_vars['characteristics_product']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["value"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["value"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["value"]->value) {
$_smarty_tpl->tpl_vars["value"]->_loop = true;
$foreach_value_Sav = $_smarty_tpl->tpl_vars["value"];
?>
                                <?php if ($_smarty_tpl->tpl_vars['is_out_char']->value != $_smarty_tpl->tpl_vars['value']->value->characteristic_id && $_smarty_tpl->tpl_vars['value']->value->characteristic_id != 63 && $_smarty_tpl->tpl_vars['value']->value->characteristic_id != 73 && $_smarty_tpl->tpl_vars['value']->value->characteristic_id != 64 && $_smarty_tpl->tpl_vars['value']->value->characteristic_id != 2) {?> 
                                    <div class="chars__row">
                                        <div class="chars__name">
                                            <?php if ($_smarty_tpl->tpl_vars['value']->value->icon) {?><img src="/images/icons/<?php echo $_smarty_tpl->tpl_vars['value']->value->icon;?>
" alt="" /><?php }?>
                                            <?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['value']->value->characteristic_name,"?",''));?>
:
                                        </div>
                                        <div class="chars__value">
                                            <?php
$_from = $_smarty_tpl->tpl_vars['characteristics_product']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["value_1"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["value_1"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["value_1"]->value) {
$_smarty_tpl->tpl_vars["value_1"]->_loop = true;
$foreach_value_1_Sav = $_smarty_tpl->tpl_vars["value_1"];
?>
                                                <?php if ($_smarty_tpl->tpl_vars['value']->value->characteristic_id == $_smarty_tpl->tpl_vars['value_1']->value->characteristic_id) {?>
                                                    <?php if ($_smarty_tpl->tpl_vars['is_out_char_value_1']->value == $_smarty_tpl->tpl_vars['value_1']->value->characteristic_id) {?>,<?php }?>
                                                    <?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['value_1']->value->value_name,"?",''));?>
 
                                                    <?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['value_1']->value->unit,"?",''));?>

                                                    <?php $_smarty_tpl->tpl_vars["is_out_char_value_1"] = new Smarty_Variable($_smarty_tpl->tpl_vars['value_1']->value->characteristic_id, null, 0);?>
                                                <?php }?>
                                            <?php
$_smarty_tpl->tpl_vars["value_1"] = $foreach_value_1_Sav;
}
?>
                                        </div>
                                    </div>
                                    <?php $_smarty_tpl->tpl_vars['is_out_char'] = new Smarty_Variable($_smarty_tpl->tpl_vars['value']->value->characteristic_id, null, 0);?>
                                <?php }?>
                            <?php
$_smarty_tpl->tpl_vars["value"] = $foreach_value_Sav;
}
?>
                        </div><!-- /.chars.p-product-info__chars -->
                    <?php
$_smarty_tpl->tpl_vars["mod"] = $foreach_mod_Sav;
}
?>
                </div><!-- /.p-product-info -->
            </div><!-- /.p-product__cont -->
        </div><!-- /.p-product -->
    </div><!-- /[itemscope] -->

    <?php if (count($_smarty_tpl->tpl_vars['news_product']->value)) {?>
        <div class="headline">Статьи о товаре</div>
        <ul>
            <?php
$_from = $_smarty_tpl->tpl_vars['news_product']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["news"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["news"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["news"]->value) {
$_smarty_tpl->tpl_vars["news"]->_loop = true;
$foreach_news_Sav = $_smarty_tpl->tpl_vars["news"];
?>
                <li><a href="/news/look/<?php echo $_smarty_tpl->tpl_vars['news']->value->id;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['news']->value->name);?>
</a></li>
            <?php
$_smarty_tpl->tpl_vars["news"] = $foreach_news_Sav;
}
?>
        </ul>
    <?php }?>
</div><!-- /.container --><?php }
}
?>