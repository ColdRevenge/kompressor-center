<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-13 12:23:22
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/_clear_category/templates/available.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125317601255d57c593b2766-98519252%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d847a6aa050bbcf0f52ab56d8552368ee8da485' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/_clear_category/templates/available.tpl',
      1 => 1441288820,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125317601255d57c593b2766-98519252',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d57c593f0215_69942490',
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'admin_url' => 0,
    'param_tpl' => 0,
    'get_products' => 0,
    'product' => 0,
    'not_warehouse' => 0,
    'aviable' => 0,
    'new_product' => 0,
    'new' => 0,
    'no_active_product' => 0,
    'active' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d57c593f0215_69942490')) {function content_55d57c593f0215_69942490($_smarty_tpl) {?><div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_clear.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="page">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

        <form method="post" action="">
            <div style="margin: 5px 0 5px 0;float: left">
                <button>Обновить остатки</button>
                <input type="hidden" name="up" value="1" />
            </div>
            <div class="nav_buttons">
                <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
products/param/sort/1/"<?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['type']==1) {?> class="active"<?php }?>>Vita</a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
products/param/sort/5/"<?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['type']==5) {?> class="active"<?php }?>>Tosoco</a>
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
                        </div>
                    </div>
                <?php } ?>
                <div class="clear">&nbsp;</div>
            </div>
        </form>


        <h1>Наличие товаров Vita</h1>
        <?php if (count($_smarty_tpl->tpl_vars['not_warehouse']->value)) {?>
            <div style="float: left">
                <h2>Нет на складе</h2>
                <form method="post" action="">
                    <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
                        <thead>
                            <tr>
                                <td style="text-align: center; width: 40px;">
                                    <label class="p-check">
                                        <input type="checkbox" onchange="if ($(this).attr('checked') != undefined) {
                                                    $(this).parent().parent().parent().parent().parent().find('input').attr('checked', $(this).attr('checked', 'checked'))
                                                }
                                                else {
                                                    $(this).parent().parent().parent().parent().parent().find('input').removeAttr('checked')
                                                }" /><em>&nbsp;</em>
                                    </label>
                                </td>
                                <td>

                                </td>
                            </tr>
                        </thead>
                        <?php  $_smarty_tpl->tpl_vars["aviable"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["aviable"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['not_warehouse']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["aviable"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["aviable"]['total'] = $_smarty_tpl->tpl_vars["aviable"]->total;
foreach ($_from as $_smarty_tpl->tpl_vars["aviable"]->key => $_smarty_tpl->tpl_vars["aviable"]->value) {
$_smarty_tpl->tpl_vars["aviable"]->_loop = true;
?>
                            <tbody class="tbody">
                                <tr>
                                    <td style="text-align: center; width: 40px;">
                                        <label class="p-check">
                                            <input type="checkbox" name="aviable[<?php echo stripslashes($_smarty_tpl->tpl_vars['aviable']->value['id']);?>
]" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['aviable']->value['id']);?>
" /><em>&nbsp;</em>
                                        </label>
                                    </td>
                                    <td><a href="http://sumka.lalipop.ru/xadmin/products/edit/0/0/<?php echo stripslashes($_smarty_tpl->tpl_vars['aviable']->value['id']);?>
/<?php echo stripslashes($_smarty_tpl->tpl_vars['aviable']->value['id']);?>
/" target="_blank"><?php echo stripslashes($_smarty_tpl->tpl_vars['aviable']->value['article']);?>
</a></td>
                                </tr>
                            </tbody>
                        <?php } ?>
                        <tfoot>
                            <tr>
                                <td colspan="2" style="text-align: right;"> Всего <b><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['aviable']['total'];?>
</b></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: right;"><button>Сделать не активными</button></td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        <?php }?>
        <?php if (count($_smarty_tpl->tpl_vars['new_product']->value)) {?>
            <div style="float: left; margin-left: 10px;">
                <form method="post">
                    <h2>Новые товары</h2>
                    <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
                        <thead>
                            <tr>
                                <td style="text-align: center; width: 40px;">
                                    <label class="p-check">
                                        <input type="checkbox" onchange="if ($(this).attr('checked') != undefined) {
                                                    $(this).parent().parent().parent().parent().parent().find('input').attr('checked', $(this).attr('checked', 'checked'))
                                                }
                                                else {
                                                    $(this).parent().parent().parent().parent().parent().find('input').removeAttr('checked')
                                                }" /><em>&nbsp;</em>
                                    </label>
                                </td>
                                <td>

                                </td>
                            </tr>
                        </thead>
                        <?php  $_smarty_tpl->tpl_vars["new"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["new"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['new_product']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["new"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["new"]['total'] = $_smarty_tpl->tpl_vars["new"]->total;
foreach ($_from as $_smarty_tpl->tpl_vars["new"]->key => $_smarty_tpl->tpl_vars["new"]->value) {
$_smarty_tpl->tpl_vars["new"]->_loop = true;
?>
                            <tbody class="tbody">
                                <tr>
                                    <td style="text-align: center; width: 40px;">
                                        <label class="p-check">
                                            <input type="checkbox" name="new[<?php echo $_smarty_tpl->tpl_vars['new']->value['article'];?>
]" value="1" /><em>&nbsp;</em>
                                        </label>
                                    </td>
                                    <td><a href="http://vita-bags.ru<?php echo stripslashes($_smarty_tpl->tpl_vars['new']->value['link']);?>
" target="_blank"><?php echo stripslashes($_smarty_tpl->tpl_vars['new']->value['article']);?>
</a></td>
                                </tr>
                            </tbody>
                        <?php } ?>
                        <tfoot>
                            <tr>
                                <td colspan="2" style="text-align: right;"> Всего <b><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['new']['total'];?>
</b></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: right;"><button>Добавить товары</button></td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        <?php }?>
        <?php if (count($_smarty_tpl->tpl_vars['no_active_product']->value)) {?>
            <div style="float: left; margin-left: 10px;">
                <form method="post">
                    <h2>Не активные товары, которые есть в наличии</h2>
                    <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 450px;">
                        <thead>
                            <tr>
                                <td style="text-align: center; width: 40px;">
                                    <label class="p-check">
                                        <input type="checkbox" onchange="if ($(this).attr('checked') != undefined) {
                                                    $(this).parent().parent().parent().parent().parent().find('input').attr('checked', $(this).attr('checked', 'checked'))
                                                }
                                                else {
                                                    $(this).parent().parent().parent().parent().parent().find('input').removeAttr('checked')
                                                }" /><em>&nbsp;</em>
                                    </label>
                                </td>
                                <td>

                                </td>
                            </tr>
                        </thead>
                        <?php  $_smarty_tpl->tpl_vars["active"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["active"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['no_active_product']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["active"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["active"]['total'] = $_smarty_tpl->tpl_vars["active"]->total;
foreach ($_from as $_smarty_tpl->tpl_vars["active"]->key => $_smarty_tpl->tpl_vars["active"]->value) {
$_smarty_tpl->tpl_vars["active"]->_loop = true;
?>
                            <tbody class="tbody">
                                <tr>
                                    <td style="text-align: center; width: 40px;">
                                        <label class="p-check">
                                            <input type="checkbox" name="active[]" value="<?php echo $_smarty_tpl->tpl_vars['active']->value['article'];?>
" /><em>&nbsp;</em>
                                        </label>
                                    </td>
                                    <td><a href="http://vita-bags.ru<?php echo stripslashes($_smarty_tpl->tpl_vars['active']->value['link']);?>
" target="_blank"><?php echo stripslashes($_smarty_tpl->tpl_vars['active']->value['article']);?>
</a></td>
                                </tr>
                            </tbody>
                        <?php } ?>
                        <tfoot>
                            <tr>
                                <td colspan="2" style="text-align: right;"> Всего <b><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['active']['total'];?>
</b></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: right;"><button>Сделать активными</button></td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        <?php }?>
    </div>
</div><?php }} ?>
