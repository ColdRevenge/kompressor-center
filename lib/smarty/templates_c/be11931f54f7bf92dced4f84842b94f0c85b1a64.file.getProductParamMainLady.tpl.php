<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-30 21:12:54
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/catalog/templates/getProductParamMainLady.tpl" */ ?>
<?php /*%%SmartyHeaderCode:56548147755d46998584427-15622015%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be11931f54f7bf92dced4f84842b94f0c85b1a64' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/catalog/templates/getProductParamMainLady.tpl',
      1 => 1440958118,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56548147755d46998584427-15622015',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d46998729672_42566058',
  'variables' => 
  array (
    'shop' => 0,
    'products' => 0,
    'product' => 0,
    'old_price_discaunt' => 0,
    'shop_url' => 0,
    'key' => 0,
    'product_images' => 0,
    'product_id' => 0,
    'size_char_id' => 0,
    'product_characteristic' => 0,
    'product_characteristic_size' => 0,
    'char_size' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d46998729672_42566058')) {function content_55d46998729672_42566058($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['shop']->value=='woman') {?>
    <?php $_smarty_tpl->tpl_vars["size_char_id"] = new Smarty_variable("118", null, 0);?>
<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value=='lady') {?>
    <?php $_smarty_tpl->tpl_vars["size_char_id"] = new Smarty_variable("51", null, 0);?>
<?php }?>
<div class="products-main">
    <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["product_item"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["product"]->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["product_item"]['iteration']++;
?>
        <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>
            <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_variable(($_smarty_tpl->tpl_vars['product']->value->price*100)/$_smarty_tpl->tpl_vars['product']->value->old_price, null, 0);?>
            <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_variable($_smarty_tpl->tpl_vars['old_price_discaunt']->value-100, null, 0);?>
        <?php } else { ?>
            <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_variable(0, null, 0);?>
        <?php }?>
        <?php $_smarty_tpl->tpl_vars['product_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->id, null, 0);?>
        <div class="product">

            <div class="product-wrapp-main">
                <?php if ($_smarty_tpl->tpl_vars['old_price_discaunt']->value) {?><div class="size_block">
                        <span><?php echo number_format(floor($_smarty_tpl->tpl_vars['old_price_discaunt']->value),0,'','');?>
%</span>
                    </div><?php }?>

                    <div class="img-box"><?php if ($_smarty_tpl->tpl_vars['product']->value->is_param_1==1) {?><img src="/images/fronted/sale.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_3==1) {?><img src="/images/fronted/novinka.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_2==1) {?><img src="/images/fronted/lucena.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_4==1) {?><img src="/images/fronted/lider.png" class="sale" alt=""  /><?php }?><a  href="<?php echo $_smarty_tpl->tpl_vars['shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/?is_modal=1" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" class="product_img" rel="fancy"   ><span id="img_box_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"><?php if ($_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1]) {?><img src="/images/gallery/<?php echo $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][3][0]->file;?>
" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" id="catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" /><?php } else { ?><img src="/images/icons/no-image.png" alt="" id="catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"  /><?php }?></span></a></div>

                    <div class="name"><a href="<?php echo $_smarty_tpl->tpl_vars['shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
</a><div class="notice"><?php echo $_smarty_tpl->tpl_vars['product']->value->brand_name;?>
</div></div>


                    
                    <div class="price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value->price,0,'.',' ');
if ($_smarty_tpl->tpl_vars['product']->value->max_price!=$_smarty_tpl->tpl_vars['product']->value->price&&$_smarty_tpl->tpl_vars['product']->value->max_price>0) {?> - <?php echo $_smarty_tpl->smarty->registered_objects['price'][0]->getPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value->max_price,'product_id'=>$_smarty_tpl->tpl_vars['product']->value->id,'is_query_price'=>1,'is_max'=>1),$_smarty_tpl);
}?> руб. <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>&nbsp;<span><?php echo number_format($_smarty_tpl->tpl_vars['product']->value->old_price,0,''," ");?>
 р.</span><?php }?></div>


                    <?php if (count($_smarty_tpl->tpl_vars['product_characteristic']->value[$_smarty_tpl->tpl_vars['product_id']->value][$_smarty_tpl->tpl_vars['size_char_id']->value])||count($_smarty_tpl->tpl_vars['product_characteristic_size']->value[$_smarty_tpl->tpl_vars['product_id']->value])) {?>
                        <div class="size-block">
                            Выберите размер:
                            <ul>
                                <?php  $_smarty_tpl->tpl_vars["char_size"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["char_size"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_characteristic_size']->value[$_smarty_tpl->tpl_vars['product_id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["char_size"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["char_size"]->key => $_smarty_tpl->tpl_vars["char_size"]->value) {
$_smarty_tpl->tpl_vars["char_size"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["char_size"]['iteration']++;
?>
                                    <li><label><input type="radio"  id="size_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['char_size']->value->id;?>
" name="size_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['char_size']->value->id;?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['char_size']['iteration']==1) {?> checked="checked"<?php }?>  onchange="setSizeAdress(this, '<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
', $(this).parent().find('span').html())" /><span><?php echo $_smarty_tpl->tpl_vars['char_size']->value->name;?>
</span></label>
                                        <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['char_size']['iteration']==1) {?><?php echo '<script'; ?>
  type="text/javascript">$(document).ready(function () {
                                                $('#size_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['char_size']->value->id;?>
').change()
                                            })<?php echo '</script'; ?>
><?php }?>
                                        </li>
                                        <?php }
if (!$_smarty_tpl->tpl_vars["char_size"]->_loop) {
?>
                                            <?php  $_smarty_tpl->tpl_vars["char_size"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["char_size"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_characteristic']->value[$_smarty_tpl->tpl_vars['product_id']->value][$_smarty_tpl->tpl_vars['size_char_id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["char_size"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["char_size"]->key => $_smarty_tpl->tpl_vars["char_size"]->value) {
$_smarty_tpl->tpl_vars["char_size"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["char_size"]['iteration']++;
?>
                                                <li><label><input type="radio" name="size_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['char_size']->value->id;?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['char_size']['iteration']==1) {?> checked="checked" <?php }?>  /><span><?php echo $_smarty_tpl->tpl_vars['char_size']->value->name;?>
</span></label></li>
                                                        <?php } ?>
                                                        <?php } ?>
                                            </ul>
                                        </div>
                                        <?php }?>

                                            <button class="buy" onclick="basketAnimated('#img_box_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
', '#catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
',<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['product']->value->mod_id;?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1][0]->id)===null||$tmp==='' ? 0 : $tmp);?>
, $(this).parent().find('.size-block input:checked').val(), 0, 0, 1);"></button>
                                            <button class="detailed" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/'">Подробнее</button>
                                        </div>
                                    </div> 
                                    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['product_item']['iteration']%5==0) {?><div class="clear">&nbsp;</div><?php }?>
                                    <?php } ?>
                                        <div class="clear"></div>
                                    </div><?php }} ?>
