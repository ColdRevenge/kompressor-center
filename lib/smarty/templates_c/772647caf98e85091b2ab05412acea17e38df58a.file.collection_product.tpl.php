<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 11:50:30
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/products/templates/collection_product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85408595455d46964b34c95-38086002%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '772647caf98e85091b2ab05412acea17e38df58a' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/products/templates/collection_product.tpl',
      1 => 1440060623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85408595455d46964b34c95-38086002',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d46964ba93b6_02726206',
  'variables' => 
  array (
    'collection' => 0,
    'product_collection' => 0,
    'product' => 0,
    'shop_url' => 0,
    'gallery_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d46964ba93b6_02726206')) {function content_55d46964ba93b6_02726206($_smarty_tpl) {?>
<?php if (count($_smarty_tpl->tpl_vars['collection']->value)>=5) {?><br/>
    <div class="box">
        <div class="h1">Товары из этой же коллекции</div>
        <div class="slider-wrap-like">
            <button class="prev-like" id="prev-collection"></button>
            <button class="next-like" id="next-collection"></button>        
            <div class="slider-like" id="slider-collection">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars["product_collection"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product_collection"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['collection']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product_collection"]->key => $_smarty_tpl->tpl_vars["product_collection"]->value) {
$_smarty_tpl->tpl_vars["product_collection"]->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['product_collection']->value->id!=$_smarty_tpl->tpl_vars['product']->value->id) {?>
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
                    <?php } ?>

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


<?php }} ?>
