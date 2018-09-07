<?php /* Smarty version 3.1.24, created on 2015-09-15 10:39:39
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/_clear_category/templates/desc.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:63554870455f7cb3bed5249_31139289%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd44126d3dee4137e13173c4cd58aad7d2e7184f1' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/_clear_category/templates/desc.tpl',
      1 => 1433249269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63554870455f7cb3bed5249_31139289',
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'category_arr' => 0,
    'menu_id' => 0,
    'cat' => 0,
    'products_not_char' => 0,
    'url' => 0,
    'item' => 0,
    'i' => 0,
    'shop' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f7cb3c008ed5_80210144',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f7cb3c008ed5_80210144')) {
function content_55f7cb3c008ed5_80210144 ($_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/function.counter.php';

$_smarty_tpl->properties['nocache_hash'] = '63554870455f7cb3bed5249_31139289';
?>
<div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_clear.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <div class="page">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>

        <h1>Незаполненные товары</h1>
        <a href="/xadmin/_clear_category/empty/desc/" style="font-size: 15px">Товары без описаний</a> / 
        <a href="/xadmin/_clear_category/empty/photo/" style="font-size: 15px">Товары без изображений</a> / 
        <a href="/xadmin/_clear_category/empty/char/" style="font-size: 15px">Товары без характеристик</a> / 
        <a href="/xadmin/_clear_category/empty/category_2_3/" style="font-size: 15px">Товары без камней</a> / 
        <a href="/xadmin/_clear_category/empty/category_4_5/" style="font-size: 15px">Товары без знака зодиака</a>
        <br/><br/>  

        <h1>Товары без описания</h1>
        <style type="text/css">
            .table {
                text-align: center;
            }
        </style>
        <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%">
            <thead>
                <tr>
                    <td>Название товара: </td>
                    
                    <td>Ссылка на админку</td>
                </tr>
            </thead>
            <?php
$_from = $_smarty_tpl->tpl_vars['category_arr']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["cat"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["cat"]->_loop = false;
$_smarty_tpl->tpl_vars["menu_id"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["menu_id"]->value => $_smarty_tpl->tpl_vars["cat"]->value) {
$_smarty_tpl->tpl_vars["cat"]->_loop = true;
$foreach_cat_Sav = $_smarty_tpl->tpl_vars["cat"];
?>
                <tbody class="table_header">
                    <tr>
                        <td colspan="2" style="background-color: #1E79C4; color: white; font-size: 21px;"><?php if ($_smarty_tpl->tpl_vars['menu_id']->value == 0) {?>Без категории<?php } else {
echo stripslashes($_smarty_tpl->tpl_vars['cat']->value->name);
}?></td>
                    </tr>
                </tbody>    

                <?php
$_from = $_smarty_tpl->tpl_vars['products_not_char']->value[$_smarty_tpl->tpl_vars['menu_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars["item"];
?><tbody class="tbody">
                        <?php echo smarty_function_counter(array('assign'=>"i"),$_smarty_tpl);?>

                        <tr><td><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['item']->value->pseudo_dir;?>
/" target="_blank"><?php echo stripslashes($_smarty_tpl->tpl_vars['item']->value->article);?>
</a></td>
                            <td><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
xadmin/products/edit/0/9023/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
/" target="_blank">Редактировать</a></td>
                        </tr></tbody>
                    <?php
$_smarty_tpl->tpl_vars["item"] = $foreach_item_Sav;
}
?>
                <?php
$_smarty_tpl->tpl_vars["cat"] = $foreach_cat_Sav;
}
?>

            <tfoot>
                <tr>
                    <td colspan="3" style="text-align: right;"> Всего <b><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</b></td>
                </tr>
            </tfoot>

        </table>
        <br/>
        <br/>
        <br/>
        <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lalipop') {?>
        <br/><br/>
        <br/>
            <form method="post" action="">
                <input type="hidden" value="1" name="is_send" />
                <button>Добавить характеристики к названиям</button>
            </form>
            <br/><Br/>
            <form method="post" action="">
                <input type="hidden" value="1" name="is_send_kamen" />
                <button>Раскидать товар по камням</button>
            </form>
            <br/><Br/>
            <form method="post" action="">
                <input type="hidden" value="1" name="is_send_zodiak" />
                <button>Раскидать товар по знакам зодиака</button>
            </form>
        <?php }?>

        <br/><Br/>
        <form method="post" action="">
            <input type="hidden" value="1" name="is_send_news" />
            <button>Раскидать товар по новинкам</button>
            <br/><br/>
            <div class="notice">Новинками становяться последние 106 добавлений с фотками, старые новинки снимаются</div>
        </form>
    </div>
</div><?php }
}
?>