<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-21 18:12:17
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/productMobile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:65190264155d469b3c3f0d8-86020691%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30c9592bbe3405d36ed470636acf61700f4744fd' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/productMobile.tpl',
      1 => 1440169926,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65190264155d469b3c3f0d8-86020691',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d469b400abf3_25355679',
  'variables' => 
  array (
    'shop' => 0,
    'product' => 0,
    'product_id' => 0,
    'fronted_images_url' => 0,
    'product_images' => 0,
    'image_count' => 0,
    'indicator_width' => 0,
    'old_price_discaunt' => 0,
    'key' => 0,
    'bread_page_arr' => 0,
    'adress' => 0,
    'bread' => 0,
    'url' => 0,
    'full_adress' => 0,
    'gallery_url' => 0,
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
    'products_in_category' => 0,
    'complect_products' => 0,
    'related_products' => 0,
    'base_dir' => 0,
    'related_product_images' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d469b400abf3_25355679')) {function content_55d469b400abf3_25355679($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady'||$_smarty_tpl->tpl_vars['shop']->value=='woman') {?>
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
<?php } else { ?>
    <?php echo '<script'; ?>
 type="text/javascript">
        var char_1_id = 0;
        var char_2_id = 0;
    <?php echo '</script'; ?>
>
<?php }?>
<?php echo '<script'; ?>
 type="text/javascript" src="/lib/iscroll.js"><?php echo '</script'; ?>
>


<?php $_smarty_tpl->tpl_vars["image_count"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['product_images']->value[2]), null, 0);?>
<style type="text/css">
    #viewport {
        position: relative;
        width: 255px;
        height: 290px;
        background: #fcdfb6;
        overflow: hidden;
        border: 1px solid #fcdfb6;
        margin: 20px auto;
    }

    #wrapper {
        width: 255px;
        height: 290px;
        margin: 0 auto;
    }

    #scroller {
        position: absolute;
        z-index: 1;
        -webkit-tap-highlight-color: rgba(0,0,0,0);
        width: <?php echo $_smarty_tpl->tpl_vars['image_count']->value*255;?>
px;
        height: 250px;
        -webkit-transform: translateZ(0);
        -moz-transform: translateZ(0);
        -ms-transform: translateZ(0);
        -o-transform: translateZ(0);
        transform: translateZ(0);
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-text-size-adjust: none;
        -moz-text-size-adjust: none;
        -ms-text-size-adjust: none;
        -o-text-size-adjust: none;
        text-size-adjust: none;
        background-color: #444;
    }

    .slide {
        width: 255px;
        height: 290px;
        float: left;
    }

    .painting {
        width: 255px;
        height: 290px;
        background-size: 260px 300px;
        margin: auto;
    }
    <?php $_smarty_tpl->tpl_vars["indicator_width"] = new Smarty_variable(number_format(($_smarty_tpl->tpl_vars['image_count']->value*27.5),0,'',''), null, 0);?>
    <?php if ($_smarty_tpl->tpl_vars['image_count']->value==2) {?>
        <?php $_smarty_tpl->tpl_vars["indicator_width"] = new Smarty_variable(number_format(($_smarty_tpl->tpl_vars['image_count']->value*25),0,'',''), null, 0);?>
    <?php } elseif ($_smarty_tpl->tpl_vars['image_count']->value==3) {?>
        <?php $_smarty_tpl->tpl_vars["indicator_width"] = new Smarty_variable(number_format(($_smarty_tpl->tpl_vars['image_count']->value*26.5),0,'',''), null, 0);?>

    <?php }?>
    #indicator {
        position: relative;
        width: <?php echo $_smarty_tpl->tpl_vars['indicator_width']->value;?>
px;;
        height: 20px;
        margin: 10px auto;
        background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAUBAMAAABohZD3AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QUGCDYztyDUJgAAAB1pVFh0Q29tbWVudAAAAAAAQ3JlYXRlZCB3aXRoIEdJTVBkLmUHAAAAGFBMVEUAAADNzc3Nzc3Nzc3Nzc3Nzc3Nzc3///8aWwwLAAAABnRSTlMAX5Ks3/nRD0HIAAAAAWJLR0QHFmGI6wAAAFtJREFUGFdjYGBgEHYNMWRAAJE0IHCEc5nSwEABxleD8JOgXMY0KBCA8FlgfAcIXwzGT4TwzWD8ZAjfDcZPgfDDYPxU7Hx09ejmoduH7h5096L7B8O/6OGBGl4APYg8TQ0XAScAAAAASUVORK5CYII=);
    }

    #dotty {
        position: absolute;
        width: 20px;
        height: 20px;
        border-radius: 10px;
        background: #ffa000;
    }
</style>

<div id="left_box" itemscope itemtype="http://schema.org/Product">
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

        <?php if ($_GET['is_modal']!=1) {?>


            <?php $_smarty_tpl->tpl_vars["adress"] = new Smarty_variable('', null, 0);?>
            <?php $_smarty_tpl->tpl_vars["full_adress"] = new Smarty_variable('', null, 0);?>
            <?php  $_smarty_tpl->tpl_vars["bread"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["bread"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bread_page_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["bread"]->key => $_smarty_tpl->tpl_vars["bread"]->value) {
$_smarty_tpl->tpl_vars["bread"]->_loop = true;
?>
                <?php $_smarty_tpl->tpl_vars["adress"] = new Smarty_variable((($_smarty_tpl->tpl_vars['adress']->value).($_smarty_tpl->tpl_vars['bread']->value->pseudo_dir)).('/'), null, 0);?>
                <?php $_smarty_tpl->tpl_vars["full_adress"] = new Smarty_variable(($_smarty_tpl->tpl_vars['url']->value).($_smarty_tpl->tpl_vars['adress']->value), null, 0);?>
            <?php } ?>

            <div id="breadcrumbs-block">
                <div id="bread-back"><a href="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['full_adress']->value)===null||$tmp==='' ? "/" : $tmp);?>
">Назад</a></div>
                <h1 itemprop="name"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
</h1>
                <div class="clear">&nbsp;</div>
            </div>




        <?php }?>
        <?php $_smarty_tpl->tpl_vars["product_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->id, null, 0);?>

        <?php if ($_smarty_tpl->tpl_vars['product']->value->id) {?>

            <div>
                <!-- about-product-info -->
                <div class="about-product-info">
                    <div class="img-box">
                        
                        <div class="tovar-photos">
                            <div id="viewport">
                                <div id="wrapper">
                                    <div id="scroller">
                                        
                                        <?php  $_smarty_tpl->tpl_vars["item_img"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item_img"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product_images']->value[2]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item_img"]->key => $_smarty_tpl->tpl_vars["item_img"]->value) {
$_smarty_tpl->tpl_vars["item_img"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["item_img"]->key;
?>
                                            <div class="slide">
                                                <div class="painting" style="background: url(<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[4][$_smarty_tpl->tpl_vars['key']->value]->file;?>
)"></div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div id="indicator">
                                <div id="dotty"></div>
                            </div>
                        </div>

                        <?php echo '<script'; ?>
 type="text/javascript">
            var myScroll;

            function loaded() {
                myScroll = new IScroll('#wrapper', {
                    scrollX: true,
                    scrollY: false,
                    momentum: false,
                    snap: true,
                    snapSpeed: 400,
                    keyBindings: true,
                    indicators: {
                        el: document.getElementById('indicator'),
                        resize: false
                    }
                });
            }

                            
            loaded();
                        <?php echo '</script'; ?>
>
                    </div>


                    <div class="about-product-info-box">
                        <?php  $_smarty_tpl->tpl_vars["mod"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["mod"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_mods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["mod"]->key => $_smarty_tpl->tpl_vars["mod"]->value) {
$_smarty_tpl->tpl_vars["mod"]->_loop = true;
?>
                            <div class="product-price-box">
                                <div class="top-line">
                                    <div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                        <div class="basket_added"  id="basket_added_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
">
                                            Товар успешно добавлен в корзину!
                                        </div>
                                        <div id="price_lady">
                                            <span class="number"><span><?php if ($_smarty_tpl->tpl_vars['is_b2b']->value!=1) {?><b itemprop="price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value->price,0,'.',' ');?>
</b><?php } else { ?><b itemprop="price"><?php echo $_smarty_tpl->smarty->registered_objects['price'][0]->getPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value->price,'product_id'=>$_smarty_tpl->tpl_vars['product']->value->id,'is_query_price'=>1),$_smarty_tpl);?>
</b><?php }?> руб.</span>
                                        </div>
                                        <div id="count-price-field" style="display: none">
                                            <div><input type="text" value="1" id="price_count" onchange="($(this).val() < 1) ? $(this).val('1') : null;" maxlength="2" /></div><div><button class="less" onclick="$('input#price_count').val(parseInt($('input#price_count').val()) + 1);
                                                    $('input#price_count').change();"></button><button  onclick="$(this).parent().parent().find('input').val(parseInt($('input#price_count').val()) - 1);
                                                            $('input#price_count').change();" class="more"></button></div>
                                        </div>
                                        </span>
                                        <span itemprop="priceCurrency" style="display: none">RUB</span>
                                        <?php if ($_smarty_tpl->tpl_vars['mod']->value->warehouse>0&&$_smarty_tpl->tpl_vars['product']->value->is_active==1) {?>    
                                            <?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady'||$_smarty_tpl->tpl_vars['shop']->value=='woman') {?>
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
                                            <?php }?>

                                            <button class="buy_button" onclick="basketModal('', '',<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['product']->value->mod_id;?>
, $('.size-block input:checked').val(), <?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady'||$_smarty_tpl->tpl_vars['shop']->value=='woman') {?>$('.size-block input:checked').val()<?php } else { ?>0<?php }?>, 0, 0, 1);"></button>
                                        <?php } else { ?>
                                            <div><b>Товара нет в наличии</b></div>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?><div id="discount_product"><strike>Старая цена: <?php echo $_smarty_tpl->tpl_vars['product']->value->old_price;?>
 руб.</strike></div><?php }?>
                                    </div>




                                    <div class="clear">&nbsp;</div>
                                </div>

                                <div class="clear">&nbsp;</div>

                                <div id="navigate-products">
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
                                </div>
                                <?php if (count($_smarty_tpl->tpl_vars['characteristics_product']->value)) {?>
                                    <ul class="products-param">
                                        <li>
                                            <a href="javascript:void(0)" class="slideParamProduct char-icon">Характеристики</a>
                                            <div style="padding-left: 10px">
                                                <table class="chars-product">
                                                    <tbody>
                                                        <tr>
                                                            <td>Артикул</td>
                                                            <td>
                                                                <?php echo $_smarty_tpl->tpl_vars['mod']->value->article;?>

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <?php $_smarty_tpl->tpl_vars["is_out_char"] = new Smarty_variable("0", null, 0);?>
                                                    <?php  $_smarty_tpl->tpl_vars["value"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["value"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['characteristics_product']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["char"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["value"]->key => $_smarty_tpl->tpl_vars["value"]->value) {
$_smarty_tpl->tpl_vars["value"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["char"]['iteration']++;
?>
                                                        <?php if (($_smarty_tpl->getVariable('smarty')->value['foreach']['char']['iteration']<=6&&$_GET['is_modal']==1)||$_GET['is_modal']!=1) {?>
                                                            <?php if ($_smarty_tpl->tpl_vars['is_out_char']->value!=$_smarty_tpl->tpl_vars['value']->value->characteristic_id&&$_smarty_tpl->tpl_vars['value']->value->characteristic_id!=5&&$_smarty_tpl->tpl_vars['value']->value->characteristic_id!=2&&$_smarty_tpl->tpl_vars['value']->value->characteristic_id!=12) {?> 
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['value']->value->characteristic_name,"?",''));?>
:</td>
                                                                            <td>
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
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                        <?php $_smarty_tpl->tpl_vars['is_out_char'] = new Smarty_variable($_smarty_tpl->tpl_vars['value']->value->characteristic_id, null, 0);?>
                                                                    <?php }?>
                                                                <?php }?>
                                                                <?php } ?>

                                                                </table>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <a  href="javascript:void(0)" class="slideParamProduct desc-icon">Описание</a>
                                                            <div itemprop="description" class="product-desc" style="display: none;">
                                                            <?php if ($_smarty_tpl->tpl_vars['product']->value->desc=='') {?><p><b>Описание для товара уже пишется, скоро появится! : ))</b></p><?php } else {
echo stripslashes($_smarty_tpl->tpl_vars['product']->value->desc);
}?>
                                                            <div id="product-selection">
                                                                <?php $_smarty_tpl->assign("category_adress",$_smarty_tpl->smarty->registered_objects['this'][0]->getCategoryAdress(array('category_id'=>$_smarty_tpl->tpl_vars['product']->value->category_1_id),$_smarty_tpl));?>

                                                                <?php  $_smarty_tpl->tpl_vars["char_product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["char_product"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['characteristics_product']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["char_product"]->key => $_smarty_tpl->tpl_vars["char_product"]->value) {
$_smarty_tpl->tpl_vars["char_product"]->_loop = true;
?>
                                                                    <?php if ($_smarty_tpl->tpl_vars['char_product']->value->characteristic_id==5&&$_smarty_tpl->tpl_vars['char_product']->value->char_pseudo_dir!=''&&$_smarty_tpl->tpl_vars['char_product']->value->char_value_pseudo_dir!='') {?>
                                                                        <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;?>
char/<?php echo $_smarty_tpl->tpl_vars['char_product']->value->char_pseudo_dir;?>
/<?php echo $_smarty_tpl->tpl_vars['char_product']->value->char_value_pseudo_dir;?>
/" target="_blank">Похожие <?php echo stripslashes($_smarty_tpl->tpl_vars['category_obj']->value->name);?>
, содержащие "<?php echo stripslashes($_smarty_tpl->tpl_vars['char_product']->value->value_name);?>
"</a><br/>
                                                                    <?php }?>
                                                                <?php } ?>
                                                                <?php  $_smarty_tpl->tpl_vars["char_product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["char_product"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['characteristics_product']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["char_product"]->key => $_smarty_tpl->tpl_vars["char_product"]->value) {
$_smarty_tpl->tpl_vars["char_product"]->_loop = true;
?>
                                                                    <?php if ($_smarty_tpl->tpl_vars['char_product']->value->characteristic_id==2&&$_smarty_tpl->tpl_vars['char_product']->value->char_pseudo_dir!=''&&$_smarty_tpl->tpl_vars['char_product']->value->char_value_pseudo_dir!='') {?>
                                                                        <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;?>
char/<?php echo $_smarty_tpl->tpl_vars['char_product']->value->char_pseudo_dir;?>
/<?php echo $_smarty_tpl->tpl_vars['char_product']->value->char_value_pseudo_dir;?>
/" target="_blank">Похожие <?php echo stripslashes($_smarty_tpl->tpl_vars['category_obj']->value->name);?>
, содержащие цвет "<?php echo stripslashes($_smarty_tpl->tpl_vars['char_product']->value->value_name);?>
"</a><br/>
                                                                    <?php }?>
                                                                <?php } ?>
                                                                <?php if (count($_smarty_tpl->tpl_vars['news_product']->value)) {?>
                                                                    <?php  $_smarty_tpl->tpl_vars["news"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["news"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news_product']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["news"]->key => $_smarty_tpl->tpl_vars["news"]->value) {
$_smarty_tpl->tpl_vars["news"]->_loop = true;
?>
                                                                        <a href="/news/look/<?php echo $_smarty_tpl->tpl_vars['news']->value->id;?>
/">Статьи о товаре: <?php echo stripslashes($_smarty_tpl->tpl_vars['news']->value->name);?>
</a><br/>
                                                                    <?php } ?>
                                                                <?php }?>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <?php echo $_smarty_tpl->getSubTemplate ('like_product_mobile.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products_in_category'=>$_smarty_tpl->tpl_vars['products_in_category']->value,'type'=>"1"), 0);?>

                                                    <?php echo $_smarty_tpl->getSubTemplate ('like_product_mobile.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products_in_category'=>$_smarty_tpl->tpl_vars['complect_products']->value,'type'=>"2"), 0);?>


                                                    <?php if (count($_smarty_tpl->tpl_vars['related_products']->value[0])>0) {?>
                                                        <li><a  href="javascript:void(0)" class="slideParamProduct complect-icon">Товары из комплекта</a>
                                                            <div style="display: none;">
                                                                <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).('modules/catalog/templates/getProductMobile.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['related_products']->value,'product_images'=>$_smarty_tpl->tpl_vars['related_product_images']->value), 0);?>

                                                            </div>
                                                        </li>
                                                    <?php }?>
                                                    <?php echo $_smarty_tpl->getSubTemplate ('history_product_mobile.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                                </ul>

                                                <?php }?>
                                                    <?php } ?>

                                                        <div class="clear">&nbsp;</div>
                                                    </div>


                                                </div>
                                                <div class="clear"></div>



                                                <div class="desc_product">

                                                    <?php if ($_GET['is_modal']!=1) {?>
                                                        

                                                        
                                                    <?php }?>

                                                </div>
                                                <div class="clear">&nbsp;</div>
                                            </div>
                                        </div>
                                        <?php } else { ?>
                                            <p>Продукт не найден</p>
                                            <?php }?>    
                                            </div>
                                        </div><?php }} ?>
