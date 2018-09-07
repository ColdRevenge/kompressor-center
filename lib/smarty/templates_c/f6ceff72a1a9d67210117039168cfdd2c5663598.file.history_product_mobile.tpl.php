<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-03 17:03:54
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/history_product_mobile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:110767808655d469b40864f1-51025844%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6ceff72a1a9d67210117039168cfdd2c5663598' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/history_product_mobile.tpl',
      1 => 1441288980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110767808655d469b40864f1-51025844',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d469b40e8748_44063915',
  'variables' => 
  array (
    'session_products' => 0,
    's_product' => 0,
    'product' => 0,
    'gallery_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d469b40e8748_44063915')) {function content_55d469b40e8748_44063915($_smarty_tpl) {?><?php if ($_GET['is_modal']!=1) {?> 
    <?php if (count($_smarty_tpl->tpl_vars['session_products']->value)>1) {?>
        <li><a  href="javascript:void(0)" class="slideParamProduct history-icon">Вы недавно смотрели:</a>
            <div style="display: none;">
                <?php  $_smarty_tpl->tpl_vars["s_product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["s_product"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['session_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["product"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["s_product"]->key => $_smarty_tpl->tpl_vars["s_product"]->value) {
$_smarty_tpl->tpl_vars["s_product"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["product"]['iteration']++;
?>
                    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['product']['iteration']<=5&&$_smarty_tpl->getVariable('smarty')->value['foreach']['product']['iteration']!=0&&$_smarty_tpl->tpl_vars['s_product']->value['id']!=$_smarty_tpl->tpl_vars['product']->value->id) {?>
                        <div class="product">
                            <span class="img-box"><a href="<?php if ($_smarty_tpl->tpl_vars['s_product']->value['shop_id']==1) {?>https://lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id']==5) {?>https://woman.lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id']==4) {?>https://sumka.lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id']==3) {?>https://platok.lalipop.ru/<?php } else { ?>https://lady.lalipop.ru/<?php }?>products/<?php echo $_smarty_tpl->tpl_vars['s_product']->value['pseudo_dir'];?>
/?is_modal=1" rel="fancy"><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['s_product']->value['file'];?>
" onerror="this.src='/images/icons/no-image.png'" alt="" class="img-offers"  /></a></span>
                            <div class="name"><a href="<?php if ($_smarty_tpl->tpl_vars['s_product']->value['shop_id']==1) {?>https://lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id']==5) {?>https://woman.lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id']==4) {?>https://sumka.lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id']==3) {?>https://platok.lalipop.ru/<?php } else { ?>https://lady.lalipop.ru/<?php }?>products/<?php echo $_smarty_tpl->tpl_vars['s_product']->value['pseudo_dir'];?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['s_product']->value['name']);?>
</a></div>
                            <div class="price"><b><?php echo $_smarty_tpl->tpl_vars['s_product']->value['price'];?>
  руб.</b></div>
                            <div class="clear">&nbsp;</div>
                        </div>
                    <?php }?>
                <?php } ?>
            </div>
        </li>
    <?php }?>

<?php }?><?php }} ?>
