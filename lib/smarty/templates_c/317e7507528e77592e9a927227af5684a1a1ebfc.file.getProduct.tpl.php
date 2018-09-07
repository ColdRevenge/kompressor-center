<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-08 16:36:16
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/catalog/templates/getProduct.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204129444655d4696b6af6b4-41461153%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '317e7507528e77592e9a927227af5684a1a1ebfc' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/catalog/templates/getProduct.tpl',
      1 => 1441719320,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204129444655d4696b6af6b4-41461153',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d4696b839a78_65728057',
  'variables' => 
  array (
    'is_mobile' => 0,
    'base_dir' => 0,
    'shop' => 0,
    'param_tpl' => 0,
    'products' => 0,
    'product' => 0,
    'old_price_discaunt' => 0,
    'key' => 0,
    'product_images' => 0,
    'small_img' => 0,
    'key_img' => 0,
    'gallery_url' => 0,
    '_shop_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4696b839a78_65728057')) {function content_55d4696b839a78_65728057($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
?><?php if ($_smarty_tpl->tpl_vars['is_mobile']->value==1) {?>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).('modules/catalog/templates/getProductParamMain.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php } else { ?>
    <?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady'||$_smarty_tpl->tpl_vars['shop']->value=='woman') {?>
        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).('modules/catalog/templates/getProductLady.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } else { ?>
        <div id="indicator_catalog">
            <?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['param_id']==3) {?>
                <?php if ($_smarty_tpl->tpl_vars['products']->value[0]->created) {?>
                    <p>Последнее поступление новинок: <b><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['products']->value[0]->created,"%d.%m.%Y");?>
</b></p>
                <?php }?>
            <?php }?>
            <div class="products">
                <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["product"]->key;
?>
                    <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>
                        <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_variable(($_smarty_tpl->tpl_vars['product']->value->price*100)/$_smarty_tpl->tpl_vars['product']->value->old_price, null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_variable($_smarty_tpl->tpl_vars['old_price_discaunt']->value-100, null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_variable(0, null, 0);?>
                    <?php }?>
                    <?php $_smarty_tpl->tpl_vars['product_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->id, null, 0);?>
                    <?php if ($_smarty_tpl->tpl_vars['product']->value->shop_id=='1') {?>
                        <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://lalipop.ru/", null, 0);?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->shop_id=='2') {?>
                        <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://lady.lalipop.ru/", null, 0);?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->shop_id=='3') {?>
                        <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://platok.lalipop.ru/", null, 0);?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->shop_id=='4') {?>
                        <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://sumka.lalipop.ru/", null, 0);?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->shop_id=='5') {?>
                        <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://woman.lalipop.ru/", null, 0);?>
                    <?php }?>
                    <div class="product">
                        <div class="product-wrapp">
                            <div class="product-images">
                                <?php  $_smarty_tpl->tpl_vars["small_img"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["small_img"]->_loop = false;
 $_smarty_tpl->tpl_vars["key_img"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["key_item"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["small_img"]->key => $_smarty_tpl->tpl_vars["small_img"]->value) {
$_smarty_tpl->tpl_vars["small_img"]->_loop = true;
 $_smarty_tpl->tpl_vars["key_img"]->value = $_smarty_tpl->tpl_vars["small_img"]->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["key_item"]['iteration']++;
?>
                                    <img src="/images/gallery/<?php echo $_smarty_tpl->tpl_vars['small_img']->value->file;?>
" alt="" onmouseover="CatalogImg.setCatalogImg(this, '<?php echo $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][3][$_smarty_tpl->tpl_vars['key_img']->value]->file;?>
');" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['key_item']['iteration']==1) {?> class="active"<?php }?> />
                                    <?php if ($_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][6][0]->id!=$_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][6][$_smarty_tpl->tpl_vars['key_img']->value]->id) {?>
                                        <a  href="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][6][$_smarty_tpl->tpl_vars['key_img']->value]->file;?>
" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" rel="prettyPhoto[<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
]">&nbsp;</a>
                                    <?php }?>
                                <?php } ?>
                            </div>
                            <div class="product-block">

                                <a  href="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][6][0]->file;?>
" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" class="quick-lupa" rel="prettyPhoto[<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
]">Увеличить</a>

                                <?php if ($_smarty_tpl->tpl_vars['old_price_discaunt']->value) {?><div class="size_block">
                                        <span><?php echo number_format($_smarty_tpl->tpl_vars['old_price_discaunt']->value);?>
%</span>
                                    </div><?php }?>

                                    <div class="img-box"><?php if ($_smarty_tpl->tpl_vars['product']->value->is_param_1==1) {?><img src="/images/fronted/sale.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_3==1) {?><img src="/images/fronted/novinka.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_2==1) {?><img src="/images/fronted/lucena.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_4==1) {?><img src="/images/fronted/lider.png" class="sale" alt=""  /><?php }?><a  href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/?is_modal=1" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" class="product_img" rel="fancy" ><span id="img_box_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"><?php if ($_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1]) {?><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][3][0]->file;?>
" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" id="catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" /><?php } else { ?><img src="/images/icons/no-image.png" alt="" id="catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"  /><?php }?></span></a><a  href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/?is_modal=1" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" class="quick-look" rel="fancy">Быстрый просмотр</a></div>

                                    <div class="name"><a href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
</a></div>

                                    <div class="article">Артикул: <b><?php echo $_smarty_tpl->tpl_vars['product']->value->article;?>
</b></div>
                                    
                                    <div class="price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value->price,0,'.',' ');
if ($_smarty_tpl->tpl_vars['product']->value->max_price!=$_smarty_tpl->tpl_vars['product']->value->price&&$_smarty_tpl->tpl_vars['product']->value->max_price>0) {?> - <?php echo $_smarty_tpl->smarty->registered_objects['price'][0]->getPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value->max_price,'product_id'=>$_smarty_tpl->tpl_vars['product']->value->id,'is_query_price'=>1,'is_max'=>1),$_smarty_tpl);
}?> руб.  <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>&nbsp;<span><?php echo number_format($_smarty_tpl->tpl_vars['product']->value->old_price,0,''," ");?>
 р.</span><?php }?></div>


                                    <button class="buy"  onclick="basketAnimated('#img_box_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
', '#catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
',<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['product']->value->mod_id;?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1][0]->id)===null||$tmp==='' ? 0 : $tmp);?>
, 0, 0, 0, 1);">Купить</button>
                                    <button class="detailed" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/'">Подробнее</button>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        </div> 
                        <div class="clear"></div>
                    </div>
                    <?php }?>
                        <?php }?><?php }} ?>
