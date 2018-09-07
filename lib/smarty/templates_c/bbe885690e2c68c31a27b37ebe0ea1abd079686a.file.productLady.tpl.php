<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-08 19:08:09
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/productLady.tpl" */ ?>
<?php /*%%SmartyHeaderCode:147998546355d46947277cb4-73407523%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bbe885690e2c68c31a27b37ebe0ea1abd079686a' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/productLady.tpl',
      1 => 1441728488,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147998546355d46947277cb4-73407523',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d46947591124_36924469',
  'variables' => 
  array (
    'product' => 0,
    'product_id' => 0,
    'fronted_images_url' => 0,
    'old_price_discaunt' => 0,
    'key' => 0,
    'product_images' => 0,
    'url' => 0,
    'bread_page_arr' => 0,
    'adress' => 0,
    'bread' => 0,
    'page_id' => 0,
    'back_url' => 0,
    'img_num' => 0,
    'gallery_url' => 0,
    'brand' => 0,
    'product_mods' => 0,
    'is_b2b' => 0,
    'mod' => 0,
    'characteristics_size_value' => 0,
    'char_size' => 0,
    'char_size_id' => 0,
    'size_price' => 0,
    'size_old_price' => 0,
    'nav_product_key' => 0,
    'nav_products' => 0,
    'prev_id' => 0,
    'next_id' => 0,
    'catalog_dir' => 0,
    'characteristics_product' => 0,
    'is_out_char' => 0,
    'value' => 0,
    'value_1' => 0,
    'is_out_char_value_1' => 0,
    'news_product' => 0,
    'news' => 0,
    'related_products' => 0,
    'base_dir' => 0,
    'related_product_images' => 0,
    'products_in_category' => 0,
    'complect_products' => 0,
    'comment' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d46947591124_36924469')) {function content_55d46947591124_36924469($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?>
<?php $_smarty_tpl->tpl_vars["product_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->id, null, 0);?>
<?php echo '<script'; ?>
 type="text/javascript">
    var char_1_id = 0;
    var char_2_id = 0;

    var source_price = '';
    $(document).ready(function () {
        source_price = $('#price_lady').html();

    <?php if ($_GET['size']>0) {?>
        $(".size-block #size_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
_<?php echo $_GET['size'];?>
").attr('checked', 'checked').change();
    <?php }?>
    })
    function setPriceSize(price, old_price, is_change_price) {
        if (is_change_price > 0) {
            $('#discount-lady').html('');
            if (price > 0 && old_price > 0) {
                $('#discount-lady').html('<div id="dicount_circl">' + (Math.floor((price * 100) / old_price - 100)) + '%</div><div class="product-icon"><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
sale.png" class="sale" alt="" /></div>')
                $('#price_lady').html('<span class="number"><span>Цена: <b itemprop="price"></b> ' + price + ' р.</span><div id="discount_product"><strike>Старая цена: ' + old_price + ' р.</strike></div>');
            }
            else {
                $('#price_lady').html(source_price);
            }
        }
    }
<?php echo '</script'; ?>
>
<div id="left_box" itemscope itemtype="https://schema.org/Product">
    <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>
        <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_variable(($_smarty_tpl->tpl_vars['product']->value->price*100)/$_smarty_tpl->tpl_vars['product']->value->old_price, null, 0);?>
        <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_variable($_smarty_tpl->tpl_vars['old_price_discaunt']->value-100, null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_variable(0, null, 0);?>
    <?php }?>

    <div id="indicator_catalog">
        <?php echo '<script'; ?>
 type="text/javascript">selected_image_id = <?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_images']->value[1][$_smarty_tpl->tpl_vars['key']->value]->id)===null||$tmp==='' ? 0 : $tmp);?>
<?php echo '</script'; ?>
>

        <div<?php if ($_GET['is_modal']!=1) {?> id="cont" style="padding-top: 0;"<?php }?>>

            <?php if ($_GET['is_modal']!=1) {?>
                <div class="breadcrumbs-block">

                    <ul class="clearfix">
                        <?php $_smarty_tpl->tpl_vars["adress"] = new Smarty_variable('', null, 0);?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">Главная</a><span>/</span></li>
                            <?php  $_smarty_tpl->tpl_vars["bread"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["bread"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bread_page_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["bread"]->key => $_smarty_tpl->tpl_vars["bread"]->value) {
$_smarty_tpl->tpl_vars["bread"]->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars["adress"] = new Smarty_variable((($_smarty_tpl->tpl_vars['adress']->value).($_smarty_tpl->tpl_vars['bread']->value->pseudo_dir)).('/'), null, 0);?>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['adress']->value;?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['bread']->value->bread_name)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['bread']->value->name : $tmp);?>
</a><span>/</span></li>
                                <?php } ?>
                                <?php if ($_smarty_tpl->tpl_vars['page_id']->value>1) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['back_url']->value;?>
">Страница <?php echo $_smarty_tpl->tpl_vars['page_id']->value;?>
</a><span>/</span></li><?php }?>
                        <li><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
 </li>
                    </ul>
                </div>
            <?php }?>


            <h1 itemprop="name"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
</h1>
            <div>
                <!-- about-product-info -->
                <div class="about-product-info">
                    <div class="img-box">
                        <div id="discount-lady">
                            <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?><div id="dicount_circl"><?php echo number_format($_smarty_tpl->tpl_vars['old_price_discaunt']->value,"0");?>
%</div><?php }
if ($_smarty_tpl->tpl_vars['product']->value->is_param_1==1||$_smarty_tpl->tpl_vars['product']->value->is_param_2||$_smarty_tpl->tpl_vars['product']->value->is_param_3||$_smarty_tpl->tpl_vars['product']->value->is_param_4) {?><div class="product-icon"><?php if ($_smarty_tpl->tpl_vars['product']->value->is_param_1==1&&$_smarty_tpl->tpl_vars['product']->value->old_price>0) {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
sale.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_3==1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
novinka.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_2==1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
lucena.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_4==1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
lider.png" class="sale" alt=""  /><?php }?></div><?php }?>
                        </div>
                        <div class="tovar-photos">
                            <?php $_smarty_tpl->tpl_vars["img_num"] = new Smarty_variable("0", null, 0);?>
                        <?php if ($_GET['img']>0) {
$_smarty_tpl->tpl_vars["img_num"] = new Smarty_variable($_GET['img'], null, 0);
}?>
                        <div class="big-img"><div  id="big_image_box"><?php if ($_smarty_tpl->tpl_vars['product']->value->id) {
if ($_smarty_tpl->tpl_vars['product_images']->value[5][$_smarty_tpl->tpl_vars['img_num']->value]->file) {?><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[5][$_smarty_tpl->tpl_vars['img_num']->value]->file;?>
"  itemprop="image" data-zoom-image="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[6][$_smarty_tpl->tpl_vars['img_num']->value]->file;?>
" id="big_image" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" /><?php } else { ?><img src="/images/icons/no-image.png" alt="" id="big_image" /><?php }?></div></div>
                                

                    </div>
                    <div style=" text-align: center; clear: both">
                        <?php if ($_smarty_tpl->tpl_vars['product']->value->desc_5||$_smarty_tpl->tpl_vars['brand']->value->param_str_2||$_smarty_tpl->tpl_vars['product']->value->desc_6||$_smarty_tpl->tpl_vars['brand']->value->param_str_1) {?>
                            <div id="model_info">
                                <?php if ($_smarty_tpl->tpl_vars['product']->value->desc_5) {?>
                                    <div>Размер модели на фото: <b><?php echo $_smarty_tpl->tpl_vars['product']->value->desc_5;?>
</b></div>
                                <?php } elseif ($_smarty_tpl->tpl_vars['brand']->value->param_str_2) {?>
                                    <div>Размер модели на фото: <b><?php echo $_smarty_tpl->tpl_vars['brand']->value->param_str_2;?>
</b></div>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['product']->value->desc_6) {?>
                                    <div>Рост модели: <b><?php echo $_smarty_tpl->tpl_vars['product']->value->desc_6;?>
</b> см.</div>
                                <?php } elseif ($_smarty_tpl->tpl_vars['brand']->value->param_str_1) {?>
                                    <div>Рост модели: <b><?php echo $_smarty_tpl->tpl_vars['brand']->value->param_str_1;?>
</b> см.</div>
                                <?php }?>
                            </div>
                        <?php }?>

                        
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
                    </div>
                </div>
                <div class="about-product-info-box">
                    <?php  $_smarty_tpl->tpl_vars["mod"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["mod"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_mods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["mod"]->key => $_smarty_tpl->tpl_vars["mod"]->value) {
$_smarty_tpl->tpl_vars["mod"]->_loop = true;
?>
                        <div class="product-price-box">
                            <div class="top-line">
                                <div class="product-price" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                                    <div id="price_lady">
                                        <span class="number"><span><?php if ($_smarty_tpl->tpl_vars['is_b2b']->value!=1) {?>Цена: <b itemprop="price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value->price,0,'.',' ');?>
</b><?php } else { ?>Цена: <b itemprop="price"><?php echo $_smarty_tpl->smarty->registered_objects['price'][0]->getPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value->price,'product_id'=>$_smarty_tpl->tpl_vars['product']->value->id,'is_query_price'=>1),$_smarty_tpl);?>
</b><?php }?> р.</span>
                                            <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?><div id="discount_product"><strike>Старая цена: <?php echo $_smarty_tpl->tpl_vars['product']->value->old_price;?>
 р.</strike></div><?php }?>
                                    </div>


                                    <div id="count-price-field" style="display: none">
                                        <div><input type="text" value="1" id="price_count" onchange="($(this).val() < 1) ? $(this).val('1') : null;" maxlength="2" /></div><div><button class="less" onclick="$('input#price_count').val(parseInt($('input#price_count').val()) + 1);
                                                $('input#price_count').change();"></button><button  onclick="$(this).parent().parent().find('input').val(parseInt($('input#price_count').val()) - 1);
                                                        $('input#price_count').change();" class="more"></button></div>
                                    </div>
                                    </span>
                                    <span itemprop="priceCurrency" style="display: none">RUB</span>
                                </div>
                                <?php if ($_smarty_tpl->tpl_vars['mod']->value->warehouse>0&&$_smarty_tpl->tpl_vars['product']->value->is_active==1) {?>
                                    <div class="product-price-wrap">

                                        <div class="size-block">
                                            Выберите размер:
                                            <ul>
                                                <?php  $_smarty_tpl->tpl_vars["char_size"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["char_size"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['characteristics_size_value']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["char_size"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["char_size"]->key => $_smarty_tpl->tpl_vars["char_size"]->value) {
$_smarty_tpl->tpl_vars["char_size"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["char_size"]['iteration']++;
?>
                                                    <?php $_smarty_tpl->tpl_vars["char_size_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['char_size']->value->name*1, null, 0);?>
                                                    <li><label><input type="radio" name="size_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
" id="size_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['char_size']->value->name;?>
" value="<?php echo $_smarty_tpl->tpl_vars['char_size']->value->id;?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['char_size']['iteration']==1) {?> checked="checked"<?php }?>  onchange="setPriceSize('<?php echo $_smarty_tpl->tpl_vars['size_price']->value[$_smarty_tpl->tpl_vars['char_size_id']->value];?>
', '<?php echo $_smarty_tpl->tpl_vars['size_old_price']->value[$_smarty_tpl->tpl_vars['char_size_id']->value];?>
', '<?php echo count($_smarty_tpl->tpl_vars['size_price']->value);?>
')" /><span><?php echo $_smarty_tpl->tpl_vars['char_size']->value->name;?>
</span></label></li>
                                                            <?php } ?>
                                            </ul>
                                            <a href="/table_size/?is_modal=1" rel="fancy-size">Определить свой размер</a>
                                        </div>



                                        <button class="buy_button" onclick="<?php if ($_GET['is_modal']==1) {?>basketModal('#big_image_box', '#big_image',<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['mod']->value->id;?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_images']->value[1][0]->id)===null||$tmp==='' ? 0 : $tmp);?>
, $('.size-block input:checked').val(), 0, 0, 0, 0, parseInt($('input#price_count').val()));<?php } else { ?>basketAnimated('#big_image_box', '#big_image',<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['mod']->value->id;?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_images']->value[1][0]->id)===null||$tmp==='' ? 0 : $tmp);?>
, $('.size-block input:checked').val(), 0, 0, 0, 0, parseInt($('input#price_count').val()));<?php }?>"></button>
                                        <div class="clear">&nbsp;</div>
                                    </div>
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
                                    <?php $_smarty_tpl->tpl_vars["prev_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['nav_product_key']->value-1, null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars["next_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['nav_product_key']->value+1, null, 0);?>
                                    <?php if (!isset($_smarty_tpl->tpl_vars['nav_products']->value['result'][$_smarty_tpl->tpl_vars['prev_id']->value])) {?>
                                        <?php $_smarty_tpl->tpl_vars["prev_id"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['nav_products']->value['result'])-1, null, 0);?>
                                    <?php }?>
                                    <a href="/products/<?php echo $_smarty_tpl->tpl_vars['nav_products']->value['result'][$_smarty_tpl->tpl_vars['prev_id']->value]->pseudo_dir;?>
/<?php if ($_GET['is_modal']) {?>?is_modal=<?php echo $_GET['is_modal'];
}?>">Предыдущий товар</a>
                                    / 
                                    <?php if (!isset($_smarty_tpl->tpl_vars['nav_products']->value['result'][$_smarty_tpl->tpl_vars['next_id']->value])) {?>
                                        <?php $_smarty_tpl->tpl_vars["next_id"] = new Smarty_variable(0, null, 0);?>
                                    <?php }?>
                                    <a href="/products/<?php echo $_smarty_tpl->tpl_vars['nav_products']->value['result'][$_smarty_tpl->tpl_vars['next_id']->value]->pseudo_dir;?>
/<?php if ($_GET['is_modal']) {?>?is_modal=<?php echo $_GET['is_modal'];
}?>">Следующий товар</a>
                                <?php }?>
                                <?php if ($_GET['is_modal']!=1) {?>
                                    <div class="notice"><a href='<?php echo $_smarty_tpl->tpl_vars['back_url']->value;?>
'>Вернуться</a></div> 
                                <?php }?>
                            </div>
                            <div class="is-line">
                                <?php if ($_smarty_tpl->tpl_vars['brand']->value->id) {?><div class="is_brand"><a <?php if ($_GET['is_modal']!=1) {?>href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['brand']->value->pseudo_dir;?>
/"<?php } else { ?> onclick="parent.location.href = '<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['brand']->value->pseudo_dir;?>
/'"<?php }?>><img src="/images/icons/<?php echo $_smarty_tpl->tpl_vars['brand']->value->icon;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['brand']->value->name;?>
" /></a><div class="clear"></div></div><?php }?>
                                </div>
                                <?php if (count($_smarty_tpl->tpl_vars['characteristics_product']->value)) {?>
                                    <div>
                                        <div class="article"><?php if ($_smarty_tpl->tpl_vars['mod']->value->article) {?>Артикул: <b><?php echo $_smarty_tpl->tpl_vars['mod']->value->article;?>
</b><?php }?></div>
                                        <div class="h7">Параметры</div>
                                        <div class="chars-product">
                                            <?php $_smarty_tpl->tpl_vars["is_out_char"] = new Smarty_variable("0", null, 0);?>
                                            <?php  $_smarty_tpl->tpl_vars["value"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["value"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['characteristics_product']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["value"]->key => $_smarty_tpl->tpl_vars["value"]->value) {
$_smarty_tpl->tpl_vars["value"]->_loop = true;
?>
                                                <?php if ($_smarty_tpl->tpl_vars['is_out_char']->value!=$_smarty_tpl->tpl_vars['value']->value->characteristic_id&&$_smarty_tpl->tpl_vars['value']->value->characteristic_id!=117&&$_smarty_tpl->tpl_vars['value']->value->characteristic_id!=55&&$_smarty_tpl->tpl_vars['value']->value->characteristic_id!=58&&$_smarty_tpl->tpl_vars['value']->value->characteristic_id!=59) {?> 
                                                        <div<?php if ($_smarty_tpl->tpl_vars['value']->value->characteristic_id==62) {?> style="color: red;"<?php }?>><b<?php if ($_GET['is_modal']==1) {?> style="background-color: white"<?php }?>><?php if ($_smarty_tpl->tpl_vars['value']->value->icon) {?><img src="/images/icons/<?php echo $_smarty_tpl->tpl_vars['value']->value->icon;?>
" alt="" /><?php }
echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['value']->value->characteristic_name,"?",''));?>
:</b>
                                                            <div<?php if ($_GET['is_modal']==1) {?> style="background-color: white"<?php }?>>
                                                                <?php  $_smarty_tpl->tpl_vars["value_1"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["value_1"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['characteristics_product']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["value_1"]->key => $_smarty_tpl->tpl_vars["value_1"]->value) {
$_smarty_tpl->tpl_vars["value_1"]->_loop = true;
if ($_smarty_tpl->tpl_vars['value']->value->characteristic_id==$_smarty_tpl->tpl_vars['value_1']->value->characteristic_id) {
if ($_smarty_tpl->tpl_vars['is_out_char_value_1']->value==$_smarty_tpl->tpl_vars['value_1']->value->characteristic_id) {?>,<?php }?>
                                                                    <?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['value_1']->value->value_name,"?",''));?>
 <?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['value_1']->value->unit,"?",''));
$_smarty_tpl->tpl_vars["is_out_char_value_1"] = new Smarty_variable($_smarty_tpl->tpl_vars['value_1']->value->characteristic_id, null, 0);
}
} ?>
                                                                </div>
                                                            </div>

                                                            <?php $_smarty_tpl->tpl_vars['is_out_char'] = new Smarty_variable($_smarty_tpl->tpl_vars['value']->value->characteristic_id, null, 0);?>
                                                        <?php }?>
                                                        <?php } ?>

                                                            <div><b<?php if ($_GET['is_modal']==1) {?> style="background-color: white"<?php }?>><img src="/images/fronted/icon-material.png" alt="" />Состав: </b><div<?php if ($_GET['is_modal']==1) {?> style="background-color: white"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['mod']->value->name);?>
</div>
                                                            </div>
                                                        </div>
                                                        <br/>
                                                        
                                                        <?php }?>


                                                            

                                                            



                                                            <?php echo $_smarty_tpl->getSubTemplate ("small-images.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


                                                            <?php if ($_GET['is_modal']==1) {?>
                                                                <button class="in_product" onclick="parent.location.href = '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/'"></button>
                                                            <?php }?>
                                                            
                                                            
                                                        </div>
                                                        <?php } ?>

                                                            <div class="clear">&nbsp;</div>
                                                        </div>


                                                    </div>
                                                    <div class="clear"></div>



                                                    <div class="desc_product">


                                                        <?php if ($_GET['is_modal']!=1&&$_smarty_tpl->tpl_vars['product']->value->desc) {?>
                                                            <div class="h2">Описание:</div>
                                                            <div itemprop="description">
                                                                <?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->desc);?>

                                                            </div>


                                                        <?php }?>
                                                        <?php if ($_GET['is_modal']!=1) {?>

                                                            <?php if (count($_smarty_tpl->tpl_vars['news_product']->value)) {?>
                                                                <div class="clear">&nbsp;</div><br/>
                                                                <div class="h1">Статьи о товаре</div>
                                                                <ul>
                                                                    <?php  $_smarty_tpl->tpl_vars["news"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["news"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news_product']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["news"]->key => $_smarty_tpl->tpl_vars["news"]->value) {
$_smarty_tpl->tpl_vars["news"]->_loop = true;
?>
                                                                        <li><a href="/news/look/<?php echo $_smarty_tpl->tpl_vars['news']->value->id;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['news']->value->name);?>
</a></li>
                                                                        <?php } ?>
                                                                </ul>
                                                            <?php }?>



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
                                                            <div class="clear"></div>








                                                            
                                                            <?php if (count($_smarty_tpl->tpl_vars['related_products']->value[0])!=0) {?>
                                                                <br/>
                                                                <h1>Сопутствующие товары</h1>
                                                                <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).('modules/catalog/templates/getProduct.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['related_products']->value,'product_images'=>$_smarty_tpl->tpl_vars['related_product_images']->value), 0);?>


                                                            <?php }?>
                                                            
                                                            <?php echo $_smarty_tpl->getSubTemplate ('like_product.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products_in_category'=>$_smarty_tpl->tpl_vars['products_in_category']->value,'type'=>"1"), 0);?>

                                                            <?php echo $_smarty_tpl->getSubTemplate ('like_product.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products_in_category'=>$_smarty_tpl->tpl_vars['complect_products']->value,'type'=>"2",'is_open_buy'=>'1','shop_url'=>"https://lalipop.ru/"), 0);?>

                                                            <div class="other-products"><a href="https://lalipop.ru/bizhuteriya/" target="__blank">Посмотреть другие украшения</a></div>
                                                            <?php echo $_smarty_tpl->getSubTemplate ('history_product.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
                                        </div><?php }} ?>
