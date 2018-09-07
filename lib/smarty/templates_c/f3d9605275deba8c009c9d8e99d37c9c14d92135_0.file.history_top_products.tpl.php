<?php /* Smarty version 3.1.24, created on 2017-09-26 09:52:12
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/reports/templates/history_top_products.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:69798875459c9f91c10fe39_83950050%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3d9605275deba8c009c9d8e99d37c9c14d92135' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/reports/templates/history_top_products.tpl',
      1 => 1503268788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69798875459c9f91c10fe39_83950050',
  'variables' => 
  array (
    'type' => 0,
    'start_date_form' => 0,
    'end_date_form' => 0,
    'sys_images_url' => 0,
    'products' => 0,
    'url' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_59c9f91c220ee8_71867070',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59c9f91c220ee8_71867070')) {
function content_59c9f91c220ee8_71867070 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/user-kc/data/www/www.kompressor-center.com/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '69798875459c9f91c10fe39_83950050';
?>
<div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_reports.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <div class="page">
        <h1><?php if ($_smarty_tpl->tpl_vars['type']->value == 4) {?>Отсутствуют на складе<?php } elseif ($_smarty_tpl->tpl_vars['type']->value == 3) {?>Самые продоваемые<?php }?></h1>
        <form method="post" action="">

            <table cellpadding="4" cellspacing="1" border="0" class="table" width="710" style="margin: auto">
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right">
                            Дата заказа:
                        </td>
                        <td valign="middle" align="left">
                            с <?php echo $_smarty_tpl->tpl_vars['start_date_form']->value;?>
 до <?php echo $_smarty_tpl->tpl_vars['end_date_form']->value;?>

                        </td>
                    </tr>
                </tbody>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right" colspan="2">
                            <input type="hidden" src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
sform.png" name="send" value="Сформировать"/>
                            <button>Сформировать</button>
                        </td>
                    </tr>
                </tbody>
            </table>


        </form>
        <br/>
        <?php if (count($_smarty_tpl->tpl_vars['products']->value)) {?>
            <table cellpadding="4" cellspacing="1" border="0" class="table" width="100%">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Товар</td>
                        <td valign="middle" align="center">Артикул</td>
                        <td valign="middle" align="center">Проданых</td>
                        <td valign="middle" align="center">Общая стоимость</td>
                    </tr>
                </thead>
                <?php
$_from = $_smarty_tpl->tpl_vars['products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["product"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["product"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_product'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_product']->value['iteration']++;
$foreach_product_Sav = $_smarty_tpl->tpl_vars["product"];
?>
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="left"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/" target="__blank"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
 <?php if ($_smarty_tpl->tpl_vars['product']->value->mod_name) {?>(<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->mod_name);?>
)<?php }?></a></td>
                            <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['product']->value->article;?>
</td>
                            <td valign="middle" align="center"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['product']->value->product_count)===null||$tmp==='' ? 0 : $tmp);?>
</td>

                            <td valign="middle" align="center"><?php echo (($tmp = @smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['product']->value->product_sum),",","&nbsp;"))===null||$tmp==='' ? 0 : $tmp);?>
 руб.</td>
                        </tr>
                    </tbody>
                <?php
$_smarty_tpl->tpl_vars["product"] = $foreach_product_Sav;
}
?>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right" colspan="8">
                            Всего: <b><?php echo (isset($_smarty_tpl->tpl_vars['__foreach_product']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_product']->value['iteration'] : null);?>
</b>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php } else { ?>
            <h2>Нет &laquo;Самых продоваемых&raquo; товаров</h2>
        <?php }?>
    </div>
</div><?php }
}
?>