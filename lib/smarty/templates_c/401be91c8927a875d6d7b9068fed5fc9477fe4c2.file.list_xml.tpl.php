<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-08 18:33:11
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/import/templates/list_xml.tpl" */ ?>
<?php /*%%SmartyHeaderCode:156075915655d5a89971d0e1-63143579%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '401be91c8927a875d6d7b9068fed5fc9477fe4c2' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/import/templates/list_xml.tpl',
      1 => 1441726312,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156075915655d5a89971d0e1-63143579',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d5a89974f806_85459780',
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
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d5a89974f806_85459780')) {function content_55d5a89974f806_85459780($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
?><div class="block">

    <div class="page">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

        <h1>Импорт товаров</h1>

        <h2>Загрузка xml-файла</h2>

        <form action="" method="post">
            <table cellpadding="4" cellspacing="1" border="0" class="table">
                <thead>
                    <tr>
                        <td valign="middle" align="center" colspan="5">XML файл</td>
                    </tr>
                </thead>
                <?php  $_smarty_tpl->tpl_vars["file"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["file"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["file"]->key => $_smarty_tpl->tpl_vars["file"]->value) {
$_smarty_tpl->tpl_vars["file"]->_loop = true;
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
                                    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['select_tree_file']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>0,'tree'=>$_smarty_tpl->tpl_vars['tree']->value,'inc'=>$_smarty_tpl->tpl_vars['select_tree_file']->value,'level'=>0,'selected_id'=>$_smarty_tpl->tpl_vars['file']->value->category_id), 0);?>

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
                <?php } ?>
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
                                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['select_tree_file']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>0,'tree'=>$_smarty_tpl->tpl_vars['tree']->value,'inc'=>$_smarty_tpl->tpl_vars['select_tree_file']->value,'level'=>0,'selected_id'=>0), 0);?>

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
</div><?php }} ?>
