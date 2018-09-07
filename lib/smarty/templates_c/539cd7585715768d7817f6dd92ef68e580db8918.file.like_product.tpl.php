<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 11:50:30
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/products/templates/like_product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:44863557755d46964bad693-45499231%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '539cd7585715768d7817f6dd92ef68e580db8918' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/products/templates/like_product.tpl',
      1 => 1440060623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44863557755d46964bad693-45499231',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d46964c22f84_38642253',
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
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d46964c22f84_38642253')) {function content_55d46964c22f84_38642253($_smarty_tpl) {?>
<?php if (count($_smarty_tpl->tpl_vars['products_in_category']->value)>=1) {?>
    <div class="box">
        <div class="h1"><?php if ($_smarty_tpl->tpl_vars['type']->value==1) {?>Похожие <?php echo stripslashes($_smarty_tpl->tpl_vars['product_in_category_name']->value);
} else { ?>К этому товару подойдет<?php }?> </div>
        <div class="slider-wrap-like">
            <?php if ((count($_smarty_tpl->tpl_vars['products_in_category']->value))>4) {?>
                <button class="prev-like" id="prev-like_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
"></button>
                <button class="next-like" id="next-like_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
"></button>        
            <?php }?>
            <div class="slider-like" id="like-products_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars["product_like"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product_like"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products_in_category']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product_like"]->key => $_smarty_tpl->tpl_vars["product_like"]->value) {
$_smarty_tpl->tpl_vars["product_like"]->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['product_like']->value->id!=$_smarty_tpl->tpl_vars['product']->value->id) {?>
                            <li>
                                <a rel='fancy' href="<?php echo $_smarty_tpl->tpl_vars['shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product_like']->value->pseudo_dir;?>
/?is_modal=1<?php if ($_smarty_tpl->tpl_vars['is_open_buy']->value==1) {?>&is_buy_open=1<?php }?>"><?php if ($_smarty_tpl->tpl_vars['product_like']->value->file) {?><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
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
                    <?php } ?>

                </ul>
            </div>
        </div>
    </div>
    <?php if (count($_smarty_tpl->tpl_vars['products_in_category']->value)>1) {?>
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


<?php }} ?>
