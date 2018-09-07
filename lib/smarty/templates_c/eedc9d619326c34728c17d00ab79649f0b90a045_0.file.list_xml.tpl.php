<?php /* Smarty version 3.1.24, created on 2015-09-14 12:54:13
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/import/templates/list_xml.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:39363107055f69945809554_91915532%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eedc9d619326c34728c17d00ab79649f0b90a045' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/import/templates/list_xml.tpl',
      1 => 1441726312,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '39363107055f69945809554_91915532',
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'files' => 0,
    'file' => 0,
    'tree' => 0,
    'select_tree_file' => 0,
    'admin_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f69945898594_87304302',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f69945898594_87304302')) {
function content_55f69945898594_87304302 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '39363107055f69945809554_91915532';
?>
<div class="block">

    <div class="page">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>

        <h1>Импорт товаров</h1>

        <h2>Загрузка xml-файла</h2>

        <form action="" method="post">
            <table cellpadding="4" cellspacing="1" border="0" class="table">
                <thead>
                    <tr>
                        <td valign="middle" align="center" colspan="5">XML файл</td>
                    </tr>
                </thead>
                <?php
$_from = $_smarty_tpl->tpl_vars['files']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["file"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["file"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["file"]->value) {
$_smarty_tpl->tpl_vars["file"]->_loop = true;
$foreach_file_Sav = $_smarty_tpl->tpl_vars["file"];
?>
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="left">
                                <input type="text" name="xml_name[]" value="<?php echo $_smarty_tpl->tpl_vars['file']->value->name;?>
" style="width: 150px;" placeholder="Имя" />
                                <input type="text" name="xml_link[]" value="<?php echo $_smarty_tpl->tpl_vars['file']->value->link;?>
" style="width: 400px;" placeholder="Ссылка на файл"/>
                                <input type="text" name="xml_category[]" value="<?php echo $_smarty_tpl->tpl_vars['file']->value->category;?>
" style="width: 200px;" placeholder="id категорий через запятую"/>
                                <input type="hidden" name="xml_type[]" value="<?php echo $_smarty_tpl->tpl_vars['file']->value->xml_type;?>
" placeholder="Тип выгрузки"/>
                            </td>
                            <td valign="middle" align="right">
                                <select name="category_id[]" style="width: 200px;">
                                    <option value="0">Товары без категории</option>
                                    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['select_tree_file']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>0,'tree'=>$_smarty_tpl->tpl_vars['tree']->value,'inc'=>$_smarty_tpl->tpl_vars['select_tree_file']->value,'level'=>0,'selected_id'=>$_smarty_tpl->tpl_vars['file']->value->category_id), 0);
?>

                                </select>
                            </td>
                            <td valign="middle" align="center" title="Дата обновления">
                                <div class="notice"><b><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['file']->value->uptime,"d.m.Y H:i");?>
</b></div>
                            </td>
                            <td valign="middle" align="center" style="width: 55px">

                                <button onclick="AjaxRequestInd('result_up_<?php echo $_smarty_tpl->tpl_vars['file']->value->id;?>
', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
import/xml/up/<?php echo $_smarty_tpl->tpl_vars['file']->value->id;?>
/', '#result_up_<?php echo $_smarty_tpl->tpl_vars['file']->value->id;?>
', 0, null, 2);
                                        $(this).hide();
                                        return  false;">UP</button>
                                <div id="result_up_<?php echo $_smarty_tpl->tpl_vars['file']->value->id;?>
" style="font-size: 0">&nbsp;</div>
                            </td>
                            <td valign="middle" align="right">
                                <a href="javascript:void(0)" title="Удалить товар" onclick="setConfirm('Вы действительно хотите удалить xml файл - <?php echo $_smarty_tpl->tpl_vars['file']->value->name;?>
?', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
import/xml/del/<?php echo $_smarty_tpl->tpl_vars['file']->value->id;?>
/');">
                                    <img src="/images/sys/admin/del.png" align="middle" hspace="1" alt="Удалить xml файл"></a>
                            </td>
                        </tr>
                    </tbody>
                <?php
$_smarty_tpl->tpl_vars["file"] = $foreach_file_Sav;
}
?>
                <thead>
                    <tr>
                        <td valign="middle" align="center" colspan="5">Добавить XML файл</td>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="left" colspan="5">
                            <input type="text" name="xml_name[]" style="width: 150px;" placeholder="Имя" />
                            <input type="text" name="xml_link[]" style="width: 400px;" placeholder="Ссылка на файл"/>
                            <input type="text" name="xml_category[]" value="" style="width: 200px;" placeholder="id категорий через запятую"/>

                            <input type="hidden" name="xml_type[]" value="0" placeholder="Тип выгрузки"/>
                            <select name="category_id[]" style="width: 217px;">
                                <option value="0">Товары без категории</option>
                                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['select_tree_file']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>0,'tree'=>$_smarty_tpl->tpl_vars['tree']->value,'inc'=>$_smarty_tpl->tpl_vars['select_tree_file']->value,'level'=>0,'selected_id'=>0), 0);
?>

                            </select>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td valign="middle" align="right" colspan="5">
                            <button>Сохранить</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
</div><?php }
}
?>