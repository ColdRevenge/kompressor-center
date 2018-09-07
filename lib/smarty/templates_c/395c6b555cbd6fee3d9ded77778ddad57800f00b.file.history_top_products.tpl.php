<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 09:22:49
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/reports/templates/history_top_products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:110970654055d57239476244-47402376%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '395c6b555cbd6fee3d9ded77778ddad57800f00b' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/reports/templates/history_top_products.tpl',
      1 => 1437935975,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110970654055d57239476244-47402376',
  'function' => 
  array (
  ),
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
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d57239508865_17588047',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d57239508865_17588047')) {function content_55d57239508865_17588047($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_reports.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="page">
        <h1><?php if ($_smarty_tpl->tpl_vars['type']->value==4) {?>Отсутствуют на складе<?php } elseif ($_smarty_tpl->tpl_vars['type']->value==3) {?>Самые продоваемые<?php }?></h1>
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
                <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["product"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["product"]['iteration']++;
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
                <?php } ?>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right" colspan="8">
                            Всего: <b><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['product']['iteration'];?>
</b>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php } else { ?>
            <h2>Нет &laquo;Самых продоваемых&raquo; товаров</h2>
        <?php }?>
    </div>
</div><?php }} ?>
