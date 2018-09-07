<?php /* Smarty version 3.1.24, created on 2015-09-13 16:02:36
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/product.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:17604362055f573ec60f841_86190373%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38e01bb8507bfa1335a279d5f99a875659251c55' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/product.tpl',
      1 => 1441993144,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17604362055f573ec60f841_86190373',
  'variables' => 
  array (
    'is_mobile' => 0,
    'shop' => 0,
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
    'fronted_images_url' => 0,
    'img_num' => 0,
    'gallery_url' => 0,
    'product_mods' => 0,
    'is_b2b' => 0,
    'mod' => 0,
    'nav_product_key' => 0,
    'nav_products' => 0,
    'prev_id' => 0,
    'next_id' => 0,
    'characteristics_product' => 0,
    'is_out_char' => 0,
    'value' => 0,
    'value_1' => 0,
    'is_out_char_value_1' => 0,
    'char_product' => 0,
    'category_adress' => 0,
    'category_obj' => 0,
    'news_product' => 0,
    'news' => 0,
    'related_products' => 0,
    'base_dir' => 0,
    'related_product_images' => 0,
    'collection' => 0,
    'products_in_category' => 0,
    'complect_products' => 0,
    'comment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f573ec89c699_75373775',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f573ec89c699_75373775')) {
function content_55f573ec89c699_75373775 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '17604362055f573ec60f841_86190373';
if ($_smarty_tpl->tpl_vars['is_mobile']->value == 1) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("productMobile.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php } else { ?>
    <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady' || $_smarty_tpl->tpl_vars['shop']->value == 'woman') {?>
        <?php echo $_smarty_tpl->getSubTemplate ("productLady.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <?php } else { ?>
        <?php echo '<script'; ?>
 type="text/javascript">
            var char_1_id = 0;
            var char_2_id = 0;
        <?php echo '</script'; ?>
>
        <div id="left_box" itemscope itemtype="http://schema.org/Product">
            <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>
                <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_Variable(($_smarty_tpl->tpl_vars['product']->value->price*100)/$_smarty_tpl->tpl_vars['product']->value->old_price, null, 0);?>
                <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_Variable($_smarty_tpl->tpl_vars['old_price_discaunt']->value-100, null, 0);?>
            <?php } else { ?>
                <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_Variable(0, null, 0);?>
            <?php }?>

            <div id="indicator_catalog">
                <?php echo '<script'; ?>
 type="text/javascript">selected_image_id = <?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_images']->value[1][$_smarty_tpl->tpl_vars['key']->value]->id)===null||$tmp==='' ? 0 : $tmp);?>
<?php echo '</script'; ?>
>

                <div<?php if ($_GET['is_modal'] != 1) {?> id="cont" style="padding-top: 0;"<?php }?>>

                    <?php if ($_GET['is_modal'] != 1) {?>
                        <div class="breadcrumbs-block">

                            <ul class="clearfix">
                                <?php $_smarty_tpl->tpl_vars["adress"] = new Smarty_Variable('', null, 0);?>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">Главная</a><span>/</span></li>
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
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['adress']->value;?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['bread']->value->bread_name)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['bread']->value->name : $tmp);?>
</a><span>/</span></li>
                                        <?php
$_smarty_tpl->tpl_vars["bread"] = $foreach_bread_Sav;
}
?>
                                        <?php if ($_smarty_tpl->tpl_vars['page_id']->value > 1) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['back_url']->value;?>
">Страница <?php echo $_smarty_tpl->tpl_vars['page_id']->value;?>
</a><span>/</span></li><?php }?>
                                <li><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
 </li>
                            </ul>
                        </div>
                    <?php }?>
                    <?php $_smarty_tpl->tpl_vars["product_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['product']->value->id, null, 0);?>


                    <h1 itemprop="name"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
</h1>
                    <div>
                        <div class="about-product-info">
                            <div class="img-box">
                                <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?><div id="dicount_circl"><?php echo number_format($_smarty_tpl->tpl_vars['old_price_discaunt']->value,"0");?>
%</div><?php }
if ($_smarty_tpl->tpl_vars['product']->value->is_param_1 == 1 || $_smarty_tpl->tpl_vars['product']->value->is_param_2 || $_smarty_tpl->tpl_vars['product']->value->is_param_3 || $_smarty_tpl->tpl_vars['product']->value->is_param_4) {?><div class="product-icon"><?php if ($_smarty_tpl->tpl_vars['product']->value->is_param_1 == 1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
sale.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_3 == 1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
novinka.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_2 == 1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
lucena.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_4 == 1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
lider.png" class="sale" alt=""  /><?php }?></div><?php }?>
                                <div class="tovar-photos">
                                    <?php $_smarty_tpl->tpl_vars["img_num"] = new Smarty_Variable("0", null, 0);?>
                                <?php if ($_GET['img'] > 0) {
$_smarty_tpl->tpl_vars["img_num"] = new Smarty_Variable($_GET['img'], null, 0);
}?>
                                <div class="big-img"><div  id="big_image_box"><?php if ($_smarty_tpl->tpl_vars['product']->value->id) {
if ($_smarty_tpl->tpl_vars['product_images']->value[5][$_smarty_tpl->tpl_vars['img_num']->value]->file) {?><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[5][$_smarty_tpl->tpl_vars['img_num']->value]->file;?>
" itemprop="image" id="big_image" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" data-zoom-image="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[6][$_smarty_tpl->tpl_vars['img_num']->value]->file;?>
" /><?php } else { ?><img src="/images/icons/no-image.png" alt="" id="big_image" /><?php }?></div></div>
                                        

                            </div>
                            <div style=" text-align: center; clear: both">
                                
                               
                                    
                                        <?php echo '<script'; ?>
 type="text/javascript" src="/js/jquery.elevateZoom-3.0.8.min.js"><?php echo '</script'; ?>
>
                                        <?php echo '<script'; ?>
 type="text/javascript">
                    $(document).ready(function () {
                        $("#big_image").elevateZoom({scrollZoom: true, borderSize: 1, zoomWindowHeight: '525', zoomWindowWidth: '380', gallery: 'gallery_01', cursor: 'pointer', borderColour: '#cccccc', lensBorderColour: '#78a723', galleryActiveClass: 'active', imageCrossfade: true, loadingIcon: ''});

                        //pass the images to Fancybox
                        $("#big_image").bind("click", function (e) {
                            var ez = $('#big_image').data('elevateZoom');
                            ez.closeAll();
                            $.fancybox(ez.getGalleryList());
                            return false;
                        });
                        $.getScript('//yandex.st/share/share.js');
                    });
                                        <?php echo '</script'; ?>
>
                                    
                                    <div class="yashare-auto-init" data-yashareL10n="ru" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yashareTheme="counter"></div>
                           
                                <br/>

                            </div>
                        </div>
                        <div class="about-product-info-box">
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
                                <div class="product-price-box">
                                    <div class="top-line">
                                        <div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">

                                            <span class="number"><span><?php if ($_smarty_tpl->tpl_vars['is_b2b']->value != 1) {?>Цена: <b itemprop="price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value->price,0,'.',' ');?>
</b><?php } else { ?>Цена: <b itemprop="price"><?php echo $_smarty_tpl->smarty->registered_objects['price'][0]->getPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value->price,'product_id'=>$_smarty_tpl->tpl_vars['product']->value->id,'is_query_price'=>1),$_smarty_tpl);?>
</b><?php }?> р.</span>
                                                <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?><div id="discount_product"><strike>Старая цена: <?php echo $_smarty_tpl->tpl_vars['product']->value->old_price;?>
 р.</strike></div><?php }?>
                                                <div id="count-price-field" style="display: none">
                                                    <div><input type="text" value="1" id="price_count" onchange="($(this).val() < 1) ? $(this).val('1') : null;" maxlength="2" /></div><div><button class="less" onclick="$('input#price_count').val(parseInt($('input#price_count').val()) + 1);
                                                            $('input#price_count').change();"></button><button  onclick="$(this).parent().parent().find('input').val(parseInt($('input#price_count').val()) - 1);
                                                                    $('input#price_count').change();" class="more"></button></div>
                                                </div>
                                            </span>
                                            <span itemprop="priceCurrency" style="display: none">RUB</span>
                                        </div>
                                        <?php if ($_smarty_tpl->tpl_vars['mod']->value->warehouse > 0 && $_smarty_tpl->tpl_vars['product']->value->is_active == 1) {?>
                                            <button class="buy_button" onclick="<?php if ($_GET['is_buy_open'] == '1') {?>window.parent.location.href = '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/';<?php } elseif ($_GET['is_modal'] == 1) {?>basketModal('#big_image_box', '#big_image',<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['mod']->value->id;?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_images']->value[1][0]->id)===null||$tmp==='' ? 0 : $tmp);?>
, char_1_id, char_2_id, 0, 0, 0, parseInt($('input#price_count').val()));<?php } else { ?>basketAnimated('#big_image_box', '#big_image',<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['mod']->value->id;?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_images']->value[1][0]->id)===null||$tmp==='' ? 0 : $tmp);?>
, char_1_id, char_2_id, 0, 0, 0, parseInt($('input#price_count').val()));<?php }?>"></button>
                                        <?php } else { ?>
                                            <div><b>Товара нет в наличии</b></div>
                                        <?php }?>
                                        <div id="basket_added">
                                            Товар успешно добавлен в корзину!
                                        </div>


                                        <div class="clear">&nbsp;</div>
                                    </div>
                                    

                                    <div class="clear">&nbsp;</div>

                                    <div class="top-line" id="navigate-products">
                                        <?php if ($_smarty_tpl->tpl_vars['nav_products']->value['result'][$_smarty_tpl->tpl_vars['nav_product_key']->value]) {?>
                                            <?php $_smarty_tpl->tpl_vars["prev_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['nav_product_key']->value-1, null, 0);?>
                                            <?php $_smarty_tpl->tpl_vars["next_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['nav_product_key']->value+1, null, 0);?>
                                            <?php if (!isset($_smarty_tpl->tpl_vars['nav_products']->value['result'][$_smarty_tpl->tpl_vars['prev_id']->value])) {?>
                                                <?php $_smarty_tpl->tpl_vars["prev_id"] = new Smarty_Variable(count($_smarty_tpl->tpl_vars['nav_products']->value['result'])-1, null, 0);?>
                                            <?php }?>
                                            <a href="/products/<?php echo $_smarty_tpl->tpl_vars['nav_products']->value['result'][$_smarty_tpl->tpl_vars['prev_id']->value]->pseudo_dir;?>
/<?php if ($_GET['is_modal']) {?>?is_modal=<?php echo $_GET['is_modal'];
}?>">Предыдущий товар</a>
                                            / 
                                            <?php if (!isset($_smarty_tpl->tpl_vars['nav_products']->value['result'][$_smarty_tpl->tpl_vars['next_id']->value])) {?>
                                                <?php $_smarty_tpl->tpl_vars["next_id"] = new Smarty_Variable(0, null, 0);?>
                                            <?php }?>
                                            <a href="/products/<?php echo $_smarty_tpl->tpl_vars['nav_products']->value['result'][$_smarty_tpl->tpl_vars['next_id']->value]->pseudo_dir;?>
/<?php if ($_GET['is_modal']) {?>?is_modal=<?php echo $_GET['is_modal'];
}?>">Следующий товар</a>
                                        <?php }?>
                                        <?php if ($_GET['is_modal'] != 1) {?>
                                            <div class="notice"><a href='<?php echo $_smarty_tpl->tpl_vars['back_url']->value;?>
'>Вернуться</a></div> 
                                        <?php }?>
                                    </div>
                                    <?php if (count($_smarty_tpl->tpl_vars['characteristics_product']->value)) {?>
                                        <div>
                                            <div class="article"><?php if ($_smarty_tpl->tpl_vars['mod']->value->article) {?>Артикул: <b><?php echo $_smarty_tpl->tpl_vars['mod']->value->article;?>
</b><?php }?></div>
                                            <div class="h7">Параметры</div>
                                            <div class="chars-product">
                                                <?php $_smarty_tpl->tpl_vars["is_out_char"] = new Smarty_Variable("0", null, 0);?>
                                                <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'sumka' && $_smarty_tpl->tpl_vars['product']->value->desc_1 != '') {?>
                                                    <div><b<?php if ($_GET['is_modal'] == 1) {?> style="background-color: white"<?php }?>>Размер:</b>
                                                        <div<?php if ($_GET['is_modal'] == 1) {?> style="background-color: white"<?php }?>>
                                                            <?php echo $_smarty_tpl->tpl_vars['product']->value->desc_1;?>
 см.
                                                        </div>
                                                    </div>
                                                <?php }?>

                                                <?php if (($_smarty_tpl->tpl_vars['shop']->value == 'platok' || $_smarty_tpl->tpl_vars['shop']->value == 'sumka') && $_smarty_tpl->tpl_vars['mod']->value->name != '') {?>
                                                    <div><b<?php if ($_GET['is_modal'] == 1) {?> style="background-color: white"<?php }?>>Состав: </b><div<?php if ($_GET['is_modal'] == 1) {?> style="background-color: white"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['mod']->value->name);?>
</div>
                                                    </div>
                                                <?php }?>
                                                <?php
$_from = $_smarty_tpl->tpl_vars['characteristics_product']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["value"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["value"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_char'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["value"]->value) {
$_smarty_tpl->tpl_vars["value"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_char']->value['iteration']++;
$foreach_value_Sav = $_smarty_tpl->tpl_vars["value"];
?>
                                                    <?php if (((isset($_smarty_tpl->tpl_vars['__foreach_char']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_char']->value['iteration'] : null) <= 6 && $_GET['is_modal'] == 1) || $_GET['is_modal'] != 1) {?>
                                                        <?php if ($_smarty_tpl->tpl_vars['is_out_char']->value != $_smarty_tpl->tpl_vars['value']->value->characteristic_id && $_smarty_tpl->tpl_vars['value']->value->characteristic_id != 63 && $_smarty_tpl->tpl_vars['value']->value->characteristic_id != 73 && $_smarty_tpl->tpl_vars['value']->value->characteristic_id != 64 && $_smarty_tpl->tpl_vars['value']->value->characteristic_id != 5 && $_smarty_tpl->tpl_vars['value']->value->characteristic_id != 2 && $_smarty_tpl->tpl_vars['value']->value->characteristic_id != 12) {?> 
                                                                <div><b<?php if ($_GET['is_modal'] == 1) {?> style="background-color: white"<?php }?>><?php if ($_smarty_tpl->tpl_vars['value']->value->icon) {?><img src="/images/icons/<?php echo $_smarty_tpl->tpl_vars['value']->value->icon;?>
" alt="" /><?php }
echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['value']->value->characteristic_name,"?",''));?>
:</b>
                                                                    <div<?php if ($_GET['is_modal'] == 1) {?> style="background-color: white"<?php }?>>
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
if ($_smarty_tpl->tpl_vars['value']->value->characteristic_id == $_smarty_tpl->tpl_vars['value_1']->value->characteristic_id) {
if ($_smarty_tpl->tpl_vars['is_out_char_value_1']->value == $_smarty_tpl->tpl_vars['value_1']->value->characteristic_id) {?>,<?php }?>
                                                                            <?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['value_1']->value->value_name,"?",''));?>
 <?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['value_1']->value->unit,"?",''));
$_smarty_tpl->tpl_vars["is_out_char_value_1"] = new Smarty_Variable($_smarty_tpl->tpl_vars['value_1']->value->characteristic_id, null, 0);
}
$_smarty_tpl->tpl_vars["value_1"] = $foreach_value_1_Sav;
}
?>
                                                                        </div>
                                                                    </div>

                                                                    <?php $_smarty_tpl->tpl_vars['is_out_char'] = new Smarty_Variable($_smarty_tpl->tpl_vars['value']->value->characteristic_id, null, 0);?>
                                                                <?php }?>
                                                            <?php }?>
                                                            <?php
$_smarty_tpl->tpl_vars["value"] = $foreach_value_Sav;
}
?>
                                                            </div>
                                                            <?php }?>


                                                                <?php if ($_smarty_tpl->tpl_vars['product']->value->desc_4 && $_GET['is_modal'] == 1) {?>
                                                                    <?php if (count($_smarty_tpl->tpl_vars['product_images']->value[1]) > 1) {?> <div class="top-line"><?php }?>
                                                                        <div class="h7">Описание</div>

                                                                        <?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['product']->value->desc_4),"&nbsp;"," ");?>


                                                                        <?php if (count($_smarty_tpl->tpl_vars['product_images']->value[1]) > 1) {?> </div><?php }?>
                                                                    <?php }?>

                                                                



                                                                <?php echo $_smarty_tpl->getSubTemplate ("small-images.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


                                                                <?php if ($_GET['is_modal'] == 1) {?>
                                                                    <button class="in_product" onclick="parent.location.href = '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/'"></button>
                                                                <?php }?>
                                                                
                                                                
                                                            </div>
                                                            <?php
$_smarty_tpl->tpl_vars["mod"] = $foreach_mod_Sav;
}
?>

                                                                <div class="clear">&nbsp;</div>
                                                            </div>


                                                        </div>
                                                        <div class="clear"></div>



                                                        <div class="desc_product">


                                                            <?php if ($_GET['is_modal'] != 1 && $_smarty_tpl->tpl_vars['product']->value->desc) {?>
                                                                <div class="h2">Описание:</div>
                                                                <div itemprop="description">
                                                                    <?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->desc);?>

                                                                </div>

                                                                <?php if ($_GET['is_modal'] != 1) {?>
                                                                    <?php $_smarty_tpl->assign("category_adress",$_smarty_tpl->smarty->registered_objects['this'][0]->getCategoryAdress(array('category_id'=>$_smarty_tpl->tpl_vars['product']->value->category_1_id),$_smarty_tpl));?>

                                                                    <div id="product-selection">
                                                                        <?php
$_from = $_smarty_tpl->tpl_vars['characteristics_product']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["char_product"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["char_product"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["char_product"]->value) {
$_smarty_tpl->tpl_vars["char_product"]->_loop = true;
$foreach_char_product_Sav = $_smarty_tpl->tpl_vars["char_product"];
?>
                                                                            <?php if ($_smarty_tpl->tpl_vars['char_product']->value->characteristic_id == 5 && $_smarty_tpl->tpl_vars['char_product']->value->char_pseudo_dir != '' && $_smarty_tpl->tpl_vars['char_product']->value->char_value_pseudo_dir != '') {?>
                                                                                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;?>
char/<?php echo $_smarty_tpl->tpl_vars['char_product']->value->char_pseudo_dir;?>
/<?php echo $_smarty_tpl->tpl_vars['char_product']->value->char_value_pseudo_dir;?>
/" target="_blank">Похожие <?php echo stripslashes($_smarty_tpl->tpl_vars['category_obj']->value->name);?>
, содержащие "<?php echo stripslashes($_smarty_tpl->tpl_vars['char_product']->value->value_name);?>
"</a><br/>
                                                                            <?php }?>
                                                                        <?php
$_smarty_tpl->tpl_vars["char_product"] = $foreach_char_product_Sav;
}
?>
                                                                        <?php
$_from = $_smarty_tpl->tpl_vars['characteristics_product']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["char_product"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["char_product"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["char_product"]->value) {
$_smarty_tpl->tpl_vars["char_product"]->_loop = true;
$foreach_char_product_Sav = $_smarty_tpl->tpl_vars["char_product"];
?>
                                                                            <?php if ($_smarty_tpl->tpl_vars['char_product']->value->characteristic_id == 2 && $_smarty_tpl->tpl_vars['char_product']->value->char_pseudo_dir != '' && $_smarty_tpl->tpl_vars['char_product']->value->char_value_pseudo_dir != '') {?>
                                                                                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;?>
char/<?php echo $_smarty_tpl->tpl_vars['char_product']->value->char_pseudo_dir;?>
/<?php echo $_smarty_tpl->tpl_vars['char_product']->value->char_value_pseudo_dir;?>
/" target="_blank">Похожие <?php echo stripslashes($_smarty_tpl->tpl_vars['category_obj']->value->name);?>
, содержащие цвет "<?php echo stripslashes($_smarty_tpl->tpl_vars['char_product']->value->value_name);?>
"</a><br/>
                                                                            <?php }?>
                                                                        <?php
$_smarty_tpl->tpl_vars["char_product"] = $foreach_char_product_Sav;
}
?>
                                                                    </div>
                                                                <?php }?>

                                                            <?php }?>
                                                            <?php if ($_GET['is_modal'] != 1) {?>

                                                                <?php if (count($_smarty_tpl->tpl_vars['news_product']->value)) {?>
                                                                    <div class="clear">&nbsp;</div><br/>
                                                                    <div class="h1">Статьи о товаре</div>
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


                                                                <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lalipop') {?>
                                                                    <div id="quick_pictogramm">
                                                                        <img src="/images/fronted/dostavka.jpg" alt="" id="quick_pictogramm_1" />
                                                                        <div>
                                                                            Наша компания предлагает вам несколько вариантов получения заказа. Всю продукцию вы можете забрать самостоятельно у нас в магазине, получить курьером или почтой России. 
                                                                        </div>
                                                                        <img src="/images/fronted/garantiya.jpg" alt="" id="quick_pictogramm_2" />
                                                                        <div>
                                                                            Компания «Lalipop» серьезно относится к своей работе. Мы стараемся, чтобы каждый клиент остался доволен покупкой у нас. Все спорные вопросы мы надеемся решить в вашу пользу, а, кроме того, предоставляем гарантии, которые позволят вам не беспокоиться о качестве приобретенных у нас украшений из натурального камня.
                                                                        </div>
                                                                        <img src="/images/fronted/primerka.jpg" alt="" id="quick_pictogramm_3" />
                                                                        <div>
                                                                            Вы можете воспользоваться услугой "Примерка". На территории Москвы и Московской области наша компания предоставляет возможность примерить до семи товаров: эти украшения вы можете забрать самостоятельно или договориться о курьерской доставке в любое место.
                                                                        </div>
                                                                        <img src="/images/fronted/obmen.jpg" alt="" id="quick_pictogramm_4" />
                                                                        <div>

                                                                            <p><strong>Возврат с обменом.</strong> В течение <strong>2 месяцев</strong> мы предлагаем вам возможность обменять приобретенный товар на другой (при сохранении бирки и товарного вида возвращаемой вещи). Стоимость доставки обоих изделий оплачивает покупатель.</p>
                                                                            <p><strong>Возврат небракованного изделия.</strong> В течение <strong>14 дней</strong> вы можете вернуть любой товар без объяснения причин. Изделие должно иметь товарный вид и сохранить бирку. Стоимость доставки не возвращается.</p>
                                                                            <p><strong>Возврат бракованного изделия.</strong> Если вы получите товар, который не соответствует описанию или имеет брак, мы вернем вам деньги или сделаем обмен на другое подобное изделие.&nbsp;</p>

                                                                        </div>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div id="quick_pictogramm">
                                                                        <img src="/images/fronted/dostavka.jpg" alt="" id="quick_pictogramm_1" />
                                                                        <div>
                                                                            Наша компания предлагает вам несколько вариантов получения заказа. Всю продукцию вы можете забрать самостоятельно у нас в магазине, получить курьером или почтой России. 
                                                                        </div>
                                                                        <img src="/images/fronted/garantiya.jpg" alt="" id="quick_pictogramm_2" />
                                                                        <div>
                                                                            Компания «Lalipop» серьезно относится к своей работе. Мы стараемся, чтобы каждый клиент остался доволен покупкой у нас. Все спорные вопросы мы надеемся решить в вашу пользу.
                                                                        </div>
                                                                        <img src="/images/fronted/primerka.jpg" alt="" id="quick_pictogramm_3" />
                                                                        <div>
                                                                            Вы можете воспользоваться услугой "Примерка". На территории Москвы и Московской области наша компания предоставляет возможность примерить до трех товаров.
                                                                        </div>
                                                                        <img src="/images/fronted/obmen.jpg" alt="" id="quick_pictogramm_4" />
                                                                        <div>
                                                                            <p><strong>Возврат небракованного изделия.</strong> В течение <strong>14 дней</strong> вы можете вернуть любой товар без объяснения причин. Изделие должно иметь товарный вид и сохранить бирку. Стоимость доставки не возвращается.</p>
                                                                            <p><strong>Возврат бракованного изделия.</strong> Если вы получите товар, который не соответствует описанию или имеет брак, мы вернем вам деньги или сделаем обмен на другое подобное изделие.&nbsp;</p>
                                                                        </div>
                                                                    </div>
                                                                <?php }?>
                                                                <div class="clear"></div>








                                                                
                                                                <?php if (count($_smarty_tpl->tpl_vars['related_products']->value[0]) > 0) {?>
                                                                    <br/>
                                                                    <h1>Товары из комплекта</h1>
                                                                    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).('modules/catalog/templates/getProduct.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('products'=>$_smarty_tpl->tpl_vars['related_products']->value,'product_images'=>$_smarty_tpl->tpl_vars['related_product_images']->value), 0);
?>

                                                                <?php }?>
                                                                <?php echo $_smarty_tpl->getSubTemplate ('collection_product.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('products'=>$_smarty_tpl->tpl_vars['collection']->value), 0);
?>

                                                                <?php echo $_smarty_tpl->getSubTemplate ('like_product.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('products_in_category'=>$_smarty_tpl->tpl_vars['products_in_category']->value,'type'=>"1"), 0);
?>

                                                                <?php echo $_smarty_tpl->getSubTemplate ('like_product.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('products_in_category'=>$_smarty_tpl->tpl_vars['complect_products']->value,'type'=>"2"), 0);
?>

                                                                <?php echo $_smarty_tpl->getSubTemplate ('history_product.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

                                                                <?php echo $_smarty_tpl->tpl_vars['comment']->value;?>

                                                            <?php }?>


                                                            



                                                            
                                                            





                                                        </div>
                                                        <div class="clear">&nbsp;</div>
                                                    </div>
                                                </div>
                                                <?php } else { ?>
                                                    <p>Продукт не найден</p>
                                                    <?php }?>    
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }?>

                                                <?php }
}
}
?>