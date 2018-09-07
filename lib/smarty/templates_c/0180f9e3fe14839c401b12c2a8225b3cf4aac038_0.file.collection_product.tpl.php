<?php /* Smarty version 3.1.24, created on 2015-09-13 16:02:36
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/collection_product.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:110396035455f573ec8e7c15_87313279%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0180f9e3fe14839c401b12c2a8225b3cf4aac038' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/collection_product.tpl',
      1 => 1440060623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110396035455f573ec8e7c15_87313279',
  'variables' => 
  array (
    'collection' => 0,
    'product_collection' => 0,
    'product' => 0,
    'shop_url' => 0,
    'gallery_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f573ec918853_84069561',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f573ec918853_84069561')) {
function content_55f573ec918853_84069561 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '110396035455f573ec8e7c15_87313279';
?>

<?php if (count($_smarty_tpl->tpl_vars['collection']->value) >= 5) {?><br/>
    <div class="box">
        <div class="h1">Товары из этой же коллекции</div>
        <div class="slider-wrap-like">
            <button class="prev-like" id="prev-collection"></button>
            <button class="next-like" id="next-collection"></button>        
            <div class="slider-like" id="slider-collection">
                <ul>
                    <?php
$_from = $_smarty_tpl->tpl_vars['collection']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["product_collection"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["product_collection"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["product_collection"]->value) {
$_smarty_tpl->tpl_vars["product_collection"]->_loop = true;
$foreach_product_collection_Sav = $_smarty_tpl->tpl_vars["product_collection"];
?>
                        <?php if ($_smarty_tpl->tpl_vars['product_collection']->value->id != $_smarty_tpl->tpl_vars['product']->value->id) {?>
                            <li>
                                <a rel='fancy' href="<?php echo $_smarty_tpl->tpl_vars['shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product_collection']->value->pseudo_dir;?>
/?is_modal=1"><?php if ($_smarty_tpl->tpl_vars['product_collection']->value->file) {?><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_collection']->value->file;?>
" alt="" id="catalog_img_<?php echo $_smarty_tpl->tpl_vars['product_collection']->value->id;?>
"  /><?php } else { ?><img src="/images/icons/no-image.png" alt="" id="catalog_img_<?php echo $_smarty_tpl->tpl_vars['product_collection']->value->id;?>
"  /><?php }?></a>
                                <div class="name"><a href="<?php echo $_smarty_tpl->tpl_vars['shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product_collection']->value->pseudo_dir;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['product_collection']->value->name);?>
</a></div>
                                <span class="cost"><?php echo number_format($_smarty_tpl->tpl_vars['product_collection']->value->price,2,'.','');?>
 р.</span>	
                            </li>
                        <?php }?>
                    <?php
$_smarty_tpl->tpl_vars["product_collection"] = $foreach_product_collection_Sav;
}
?>

                </ul>
            </div>
        </div>
    </div>

    <?php echo '<script'; ?>
 type="text/javascript">
        $(function () {
            $("#slider-collection").jCarouselLite({
                btnNext: "#prev-collection",
                btnPrev: "#next-collection",
                visible:4,
                mouseWheel: true
            });
        });

    <?php echo '</script'; ?>
>
<?php }?>
<!-- end medium-slider-line -->


<?php }
}
?>