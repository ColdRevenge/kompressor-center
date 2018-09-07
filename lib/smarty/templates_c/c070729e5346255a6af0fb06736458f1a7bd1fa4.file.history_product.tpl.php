<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-03 17:02:59
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/history_product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136774577055d46964c28f65-19411448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c070729e5346255a6af0fb06736458f1a7bd1fa4' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/history_product.tpl',
      1 => 1441288970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136774577055d46964c28f65-19411448',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d46964c8e093_24627190',
  'variables' => 
  array (
    'session_products' => 0,
    's_product' => 0,
    'product' => 0,
    'gallery_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d46964c8e093_24627190')) {function content_55d46964c8e093_24627190($_smarty_tpl) {?><?php if ($_GET['is_modal']!=1) {?> <?php if (count($_smarty_tpl->tpl_vars['session_products']->value)>1) {?>
            <div class="h1">Вы недавно смотрели:</div>
            <div class="you_look">
                <?php  $_smarty_tpl->tpl_vars["s_product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["s_product"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['session_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["product"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["s_product"]->key => $_smarty_tpl->tpl_vars["s_product"]->value) {
$_smarty_tpl->tpl_vars["s_product"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["product"]['iteration']++;
?>
                    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['product']['iteration']<=5&&$_smarty_tpl->getVariable('smarty')->value['foreach']['product']['iteration']!=0&&$_smarty_tpl->tpl_vars['s_product']->value['id']!=$_smarty_tpl->tpl_vars['product']->value->id) {?>
                        <div class="product-history-block">

                            <span class="img-box"><a href="<?php if ($_smarty_tpl->tpl_vars['s_product']->value['shop_id']==1) {?>https://lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id']==5) {?>https://woman.lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id']==4) {?>https://sumka.lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id']==3) {?>https://platok.lalipop.ru/<?php } else { ?>https://lady.lalipop.ru/<?php }?>products/<?php echo $_smarty_tpl->tpl_vars['s_product']->value['pseudo_dir'];?>
/?is_modal=1" rel="fancy"><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['s_product']->value['file'];?>
" onerror="this.src='/images/icons/no-image.png'" alt="" class="img-offers"  /></a></span>


                            <div class="name"><a href="<?php if ($_smarty_tpl->tpl_vars['s_product']->value['shop_id']==1) {?>https://lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id']==5) {?>https://woman.lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id']==4) {?>https://sumka.lalipop.ru/<?php } elseif ($_smarty_tpl->tpl_vars['s_product']->value['shop_id']==3) {?>https://platok.lalipop.ru/<?php } else { ?>https://lady.lalipop.ru/<?php }?>products/<?php echo $_smarty_tpl->tpl_vars['s_product']->value['pseudo_dir'];?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['s_product']->value['name']);?>
</a></div>
                            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['product']['iteration']%4==0) {?><div class="clear"></div><?php }?>
                        </div>
                    <?php }?>
                <?php } ?>
            </div>
            <div class="clear">&nbsp;</div>
        <?php }?>

    <?php }?><?php }} ?>
