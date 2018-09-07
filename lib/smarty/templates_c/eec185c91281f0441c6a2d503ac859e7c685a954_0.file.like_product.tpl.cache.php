<?php /* Smarty version 3.1.24, created on 2015-09-13 16:07:03
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/like_product.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:104025411455f574f7add3c9_47383433%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eec185c91281f0441c6a2d503ac859e7c685a954' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/like_product.tpl',
      1 => 1440060623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104025411455f574f7add3c9_47383433',
  'variables' => 
  array (
    'products_in_category' => 0,
    'type' => 0,
    'product_in_category_name' => 0,
    'product_like' => 0,
    'product' => 0,
    'shop_url' => 0,
    'is_open_buy' => 0,
    'gallery_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f574f7b294c6_59341355',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f574f7b294c6_59341355')) {
function content_55f574f7b294c6_59341355 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '104025411455f574f7add3c9_47383433';
?>

<?php if (count($_smarty_tpl->tpl_vars['products_in_category']->value) >= 1) {?>
    <div class="box">
        <div class="h1"><?php if ($_smarty_tpl->tpl_vars['type']->value == 1) {?>Похожие <?php echo stripslashes($_smarty_tpl->tpl_vars['product_in_category_name']->value);
} else { ?>К этому товару подойдет<?php }?> </div>
        <div class="slider-wrap-like">
            <?php if ((count($_smarty_tpl->tpl_vars['products_in_category']->value)) > 4) {?>
                <button class="prev-like" id="prev-like_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
"></button>
                <button class="next-like" id="next-like_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
"></button>        
            <?php }?>
            <div class="slider-like" id="like-products_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
                <ul>
                    <?php
$_from = $_smarty_tpl->tpl_vars['products_in_category']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["product_like"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["product_like"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["product_like"]->value) {
$_smarty_tpl->tpl_vars["product_like"]->_loop = true;
$foreach_product_like_Sav = $_smarty_tpl->tpl_vars["product_like"];
?>
                        <?php if ($_smarty_tpl->tpl_vars['product_like']->value->id != $_smarty_tpl->tpl_vars['product']->value->id) {?>
                            <li>
                                <a rel='fancy' href="<?php echo $_smarty_tpl->tpl_vars['shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product_like']->value->pseudo_dir;?>
/?is_modal=1<?php if ($_smarty_tpl->tpl_vars['is_open_buy']->value == 1) {?>&is_buy_open=1<?php }?>"><?php if ($_smarty_tpl->tpl_vars['product_like']->value->file) {?><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_like']->value->file;?>
" alt="" id="catalog_img_<?php echo $_smarty_tpl->tpl_vars['product_like']->value->id;?>
"  /><?php } else { ?><img src="/images/icons/no-image.png" alt="" id="catalog_img_<?php echo $_smarty_tpl->tpl_vars['product_like']->value->id;?>
"  /><?php }?></a>
                                <div class="name"><a href="<?php echo $_smarty_tpl->tpl_vars['shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product_like']->value->pseudo_dir;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['product_like']->value->name);?>
</a></div>
                                <span class="cost"><?php echo number_format($_smarty_tpl->tpl_vars['product_like']->value->price,2,'.','');?>
 р.</span>	
                            </li>
                        <?php }?>
                    <?php
$_smarty_tpl->tpl_vars["product_like"] = $foreach_product_like_Sav;
}
?>

                </ul>
            </div>
        </div>
    </div>
    <?php if (count($_smarty_tpl->tpl_vars['products_in_category']->value) > 1) {?>
        <?php echo '<script'; ?>
 type="text/javascript">
            $(function () {
                $("#like-products_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
").jCarouselLite({
                    btnNext: "#next-like_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
",
                    btnPrev: "#prev-like_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
",
                    visible: 4,
                    mouseWheel: true
                });
            });

        <?php echo '</script'; ?>
>
    <?php }?>
<?php }?>
<!-- end medium-slider-line -->


<?php }
}
?>