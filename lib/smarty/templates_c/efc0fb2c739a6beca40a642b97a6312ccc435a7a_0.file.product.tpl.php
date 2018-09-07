<?php /* Smarty version 3.1.24, created on 2017-01-28 02:35:47
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/products/templates/product.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:468436801588bd953edaa76_88984494%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'efc0fb2c739a6beca40a642b97a6312ccc435a7a' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/products/templates/product.tpl',
      1 => 1485559670,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '468436801588bd953edaa76_88984494',
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
    'setting' => 0,
    'fronted_images_url' => 0,
    'gallery_url' => 0,
    'img_num' => 0,
    'product_mods' => 0,
    'is_b2b' => 0,
    'mod' => 0,
    'product_id' => 0,
    'product_root_category' => 0,
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
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_588bd9542f4f05_64953408',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588bd9542f4f05_64953408')) {
function content_588bd9542f4f05_64953408 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/user-kc-pskov/data/www/kc-pskov.ru/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '468436801588bd953edaa76_88984494';
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
                    <div class="clear"></div>
                    <div>
                        <div class="about-product-info">
                            <div class="img-box">
                                <?php if (!$_smarty_tpl->tpl_vars['setting']->value->hide_prices) {?>
                                    <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?><div id="dicount_circl"><?php echo number_format($_smarty_tpl->tpl_vars['old_price_discaunt']->value,"0");?>
%</div><?php }?>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['product']->value->is_param_1 == 1 || $_smarty_tpl->tpl_vars['product']->value->is_param_2 || $_smarty_tpl->tpl_vars['product']->value->is_param_3 || $_smarty_tpl->tpl_vars['product']->value->is_param_4) {?>
                                    <div class="product-icon">
                                        <?php if ($_smarty_tpl->tpl_vars['product']->value->is_param_1 == 1) {?>
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
sale.png" class="sale" alt="" />
                                        <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_3 == 1) {?>
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
novinka.png" class="sale" alt="" />
                                        <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_2 == 1) {?>
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
lucena.png" class="sale" alt="" />
                                        <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_4 == 1) {?>
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
lider.png" class="sale" alt=""  />
                                        <?php }?>
                                    </div>
                                <?php }?>
                                <div class="tovar-photos">
                                    <?php $_smarty_tpl->tpl_vars["img_num"] = new Smarty_Variable("0", null, 0);?>
                                    <?php if ($_GET['img'] > 0) {
$_smarty_tpl->tpl_vars["img_num"] = new Smarty_Variable($_GET['img'], null, 0);
}?>
                                    <div class="big-img">
                                        <div  id="big_image_box">
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[6][$_smarty_tpl->tpl_vars['img_num']->value]->file;?>
" rel="prettyPhoto">
                                                <?php if ($_smarty_tpl->tpl_vars['product']->value->id) {
if ($_smarty_tpl->tpl_vars['product_images']->value[5][$_smarty_tpl->tpl_vars['img_num']->value]->file) {?><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[5][$_smarty_tpl->tpl_vars['img_num']->value]->file;?>
" itemprop="image" id="big_image" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" /><?php } else { ?><img src="/images/icons/no-image.png" alt="" id="big_image" /><?php }?></a></div></div>
                                        

                            </div>
                            <div style=" text-align: center; clear: both">
                                
                               
                             

                           
                                <br/>

                                                                <?php echo $_smarty_tpl->getSubTemplate ("small-images.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

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
                                    <?php if (!$_smarty_tpl->tpl_vars['setting']->value->hide_prices) {?>
                                        <div class="top-line">
                                            <div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                <span class="number"><span><?php if ($_smarty_tpl->tpl_vars['is_b2b']->value != 1) {?>Цена: <b itemprop="price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value->price,0,'.',' ');?>
</b><?php } else { ?>Цена: <b itemprop="price"><?php echo $_smarty_tpl->smarty->registered_objects['price'][0]->getPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value->price,'product_id'=>$_smarty_tpl->tpl_vars['product']->value->id,'is_query_price'=>1),$_smarty_tpl);?>
</b><?php }?> р.</span>
                                                    <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?><div id="discount_product"><strike>Старая цена: <?php echo $_smarty_tpl->tpl_vars['product']->value->old_price;?>
 р.</strike></div><?php }?>
                                                    <div id="count-price-field" style="display: none">
                                                        <div>
                                                            <input type="text" value="1" id="price_count" onchange="($(this).val() < 1) ? $(this).val('1') : null;" maxlength="2" />
                                                        </div>
                                                        <div>
                                                            <button class="less" onclick="$('input#price_count').val(parseInt($('input#price_count').val()) + 1);
                                                                $('input#price_count').change();"></button><button  onclick="$(this).parent().parent().find('input').val(parseInt($('input#price_count').val()) - 1);
                                                                $('input#price_count').change();" class="more">
                                                            </button>
                                                        </div>
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
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['mod']->value->warehouse > 0 && $_smarty_tpl->tpl_vars['product']->value->is_active == 1) {?>
                                        <span style="padding-bottom: 10px; display: block; border-bottom: 1px solid #ddd; margin-bottom: 10px;">В наличии</span>
                                    <?php }?>
                                    <div style="padding-bottom: 10px; display: block; border-bottom: 1px solid #ddd; margin-bottom: 10px;">
                                        <div class="pull-left">
                                            <?php if ($_SESSION['fav'][$_smarty_tpl->tpl_vars['product']->value->id]) {?>
                                                <a href="#" class="ajax-send-data" data-id="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" data-url="/catalog/add_to_fav/" data-success="Добавить в избранное">Удалить из избранного</a>
                                            <?php } else { ?>
                                                <a href="#" class="ajax-send-data" data-id="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" data-url="/catalog/add_to_fav/" data-success="Удалить из избранного">Добавить в избранное</a>
                                            <?php }?>
                                        </div>
                                        <div class="pull-right">
                                            <div class="vs-catalog">
                                                <input type="checkbox" value="1" name="vs[]" <?php if ($_SESSION['vs_product'][$_smarty_tpl->tpl_vars['product_id']->value]) {?>checked="checked"<?php }?> id="vs_porduct_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
"  onchange="vs('vs_link_id_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
', 'vs_porduct_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
', 1, <?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
);" />
                                                <a href="javascript:void(0)" onclick="vs('vs_link_id_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
', 'vs_porduct_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
', 0, <?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['product_root_category']->value;?>
)" id="vs_link_id_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
" <?php if ($_SESSION['vs_product'][$_smarty_tpl->tpl_vars['product_id']->value]) {?>class="vs_selected"<?php }?> target="_top">
                                                    <?php if ($_SESSION['vs_product'][$_smarty_tpl->tpl_vars['product_id']->value]) {?>Сравнить<?php } else { ?>К сравнению<?php }?>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    

                                    <div class="clear">&nbsp;</div>

                        
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
                                                        <?php if ($_smarty_tpl->tpl_vars['is_out_char']->value != $_smarty_tpl->tpl_vars['value']->value->characteristic_id && $_smarty_tpl->tpl_vars['value']->value->characteristic_id != 63 && $_smarty_tpl->tpl_vars['value']->value->characteristic_id != 73 && $_smarty_tpl->tpl_vars['value']->value->characteristic_id != 64 && $_smarty_tpl->tpl_vars['value']->value->characteristic_id != 2) {?> 
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

                                                                <div class="clear"></div>








                                                                
                                                           
                                                            <?php }?>


                                                            



                                                            
                                                            


<br/><br/><br/>


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