<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-04 20:13:07
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/product_param_sort.tpl" */ ?>
<?php /*%%SmartyHeaderCode:63386026055daecc24acec2-28875960%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23076ee6de8a0dcadb1facad5327c9cc166a2340' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/product_param_sort.tpl',
      1 => 1441288995,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63386026055daecc24acec2-28875960',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55daecc2555726_18668444',
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'param_tpl' => 0,
    'admin_url' => 0,
    'get_products' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55daecc2555726_18668444')) {function content_55daecc2555726_18668444($_smarty_tpl) {?><div class="block">
    <div class="page">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

        <h1>Сортировка <?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['type']==1) {?>спец. предложений<?php } elseif ($_smarty_tpl->tpl_vars['param_tpl']->value['type']==1) {?>распродажи<?php } elseif ($_smarty_tpl->tpl_vars['param_tpl']->value['type']==1) {?>новинок<?php }?></h1>
        <form method="post" action="">

            <div style="margin: 5px 0 5px 0;float: left">
                <button>Сохранить</button>
            </div>
            <div class="nav_buttons">
                <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
products/param/sort/1/"<?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['type']==1) {?> class="active"<?php }?>>Спец. предложения</a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
products/param/sort/5/"<?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['type']==5) {?> class="active"<?php }?>>Распродажи</a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
products/param/sort/3/"<?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['type']==3) {?> class="active"<?php }?>>Новинки</a>
            </div>

            <div id="products_sort">
                <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['get_products']->value['result']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["product"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["sort"]['total'] = $_smarty_tpl->tpl_vars["product"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["sort"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["sort"]['iteration']++;
?>
                    <div class="product_block" rel="<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['sort']['total']-$_smarty_tpl->getVariable('smarty')->value['foreach']['sort']['iteration'];?>
">
                        <div>
                            <div class="product_img"><img src="/images/gallery/<?php echo $_smarty_tpl->tpl_vars['product']->value->file;?>
" alt="" title="" /></div>
                            <div class="product_name"><a href="https://lalipop.ru/xadmin/products/edit/0/<?php echo $_smarty_tpl->tpl_vars['product']->value->category_1_id;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
/?is_modal=1" rel="related" title="Быстрое редактирование товара"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
</a></div>
                            <div class="product_article"><?php echo $_smarty_tpl->tpl_vars['product']->value->article;?>
</div>
                            <input type="hidden" name="sort[<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
]" value="1" />
                        </div>
                    </div>
                <?php } ?>
                <div class="clear">&nbsp;</div>
            </div>
        </form>
    </div>
</div>

<?php echo '<script'; ?>
 src="/lib/jqueryui.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    $(function () {
        current_drag_obj = new Array();
        current_drag_index = 0;
        $('#products_sort .product_block').draggable({
            containment: "#products_sort",
            snap: "#products_sort .product_block",
            snapMode: "both",
            snapTolerance: 20,
            start: function () {
                $(this).css({
                    opacity: "0.5",
                    zIndex: '10'
                });
                current_drag_index = $(this).attr('rel'); //Индекс перемещаемого объекта
                current_drag_obj[$(this).attr('rel')] = $(this); //Перемещаемый объект
            },
            stop: function () {
                $(this).css({
                    opacity: "1",
                    zIndex: '0'
                });
                current_drag_index = 0;
                $(this).css({
                    left: '0px',
                    top: '0px'
                })

            },
        });
        $('#products_sort .product_block').droppable({
            over: function () {
                $(this).css({
                    backgroundColor: '#eaf2f9',
                    borderLeftColor: "#cccccc"
                })
            },
            out: function () {
                $(this).css({
                    backgroundColor: 'white',
                    borderLeftColor: "#f5f5f5"
                })
            },
            drop: function () {
                $(this).css({
                    backgroundColor: 'white',
                    borderLeftColor: "#f5f5f5"
                })
                $($(current_drag_obj[current_drag_index])).insertBefore(this)
    
                current_drag_index = 0;

            }
        });
    });
<?php echo '</script'; ?>
> <?php }} ?>
