<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 12:44:09
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/import/templates/import.tpl" */ ?>
<?php /*%%SmartyHeaderCode:96117573255d5a169c19644-70135993%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40e959ab747246327af76b7a918bb23b16bfc5d9' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/import/templates/import.tpl',
      1 => 1423568583,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96117573255d5a169c19644-70135993',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'admin_url' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'array_line' => 0,
    'param_tpl' => 0,
    'num' => 0,
    'fields' => 0,
    'name' => 0,
    'setting' => 0,
    'field' => 0,
    'characteristics' => 0,
    'characteristic' => 0,
    'lines' => 0,
    'line' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d5a169cd1709_69602974',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d5a169cd1709_69602974')) {function content_55d5a169cd1709_69602974($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.truncate.php';
?><div class="block">

    <?php echo $_smarty_tpl->getSubTemplate ("_menu_import.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="page">
        <div id="breadcrumbs">
            <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
import/">Импорт</a>  &raquo; Импорт товаров</span>
        </div>
        <h1>Импорт товаров</h1>
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>



        <?php if (count($_smarty_tpl->tpl_vars['array_line']->value)!=0) {?>
            
            <form action="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
import/import/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['category_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['file_id'];?>
/" method="post" >
                
                <button type="submit" value="Сохранить" name="save_config" >Сохранить расположение столбцов</button>
                

                <div class="clear" style="border-bottom: 1px solid #CCCCCC">&nbsp;</div>
                <div  style="border-bottom: 1px solid #CCCCCC">&nbsp;</div>    <br/>


                <div style="float: left; margin-top: 10px;"><button value="<<" alt="" onclick="document.getElementById('scrool_block').scrollLeft -= 895;
                        return false" ><<</button></div>
                <div id="scrool_block" style="overflow: hidden;width: 900px;  border: 1px solid #CCCCC;float: left;">
                    <table cellpadding="0" cellspacing="0" border="0" class="table" style="width: 100%;border: 1px solid #CCCCC;">

                        <tbody class="tbody" style="background-color: white;">
                            <tr> 
                                <?php  $_smarty_tpl->tpl_vars["line"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["line"]->_loop = false;
 $_smarty_tpl->tpl_vars["num"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['array_line']->value[0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["line"]->key => $_smarty_tpl->tpl_vars["line"]->value) {
$_smarty_tpl->tpl_vars["line"]->_loop = true;
 $_smarty_tpl->tpl_vars["num"]->value = $_smarty_tpl->tpl_vars["line"]->key;
?>
                                    <td valign="top" width="155" style="text-align: justify; font-size: 12px;border-bottom: 1px solid #CCCCCC;">
                                        <div style="width: 155px;padding: 2px 5px">
                                            <select name="field[<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
]" style="width: 145px;font-size: 12px;">
                                                <option value="">Пропустить столбец</option>
                                                <?php  $_smarty_tpl->tpl_vars["field"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["field"]->_loop = false;
 $_smarty_tpl->tpl_vars["name"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["field"]->key => $_smarty_tpl->tpl_vars["field"]->value) {
$_smarty_tpl->tpl_vars["field"]->_loop = true;
 $_smarty_tpl->tpl_vars["name"]->value = $_smarty_tpl->tpl_vars["field"]->key;
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['setting']->value[$_smarty_tpl->tpl_vars['num']->value]==$_smarty_tpl->tpl_vars['name']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['field']->value;?>
</option>
                                                <?php } ?>
                                                

                                                <?php if (count($_smarty_tpl->tpl_vars['characteristics']->value)) {?>
                                                    <optgroup value='' label='&nbsp;&nbsp; &nbsp; Характеристики'>

                                                        <?php  $_smarty_tpl->tpl_vars["characteristic"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["characteristic"]->_loop = false;
 $_smarty_tpl->tpl_vars["name"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['characteristics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["characteristic"]->key => $_smarty_tpl->tpl_vars["characteristic"]->value) {
$_smarty_tpl->tpl_vars["characteristic"]->_loop = true;
 $_smarty_tpl->tpl_vars["name"]->value = $_smarty_tpl->tpl_vars["characteristic"]->key;
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['setting']->value[$_smarty_tpl->tpl_vars['num']->value]==$_smarty_tpl->tpl_vars['characteristic']->value->id) {?>selected="selected"<?php }?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo stripslashes($_smarty_tpl->tpl_vars['characteristic']->value->name);?>
</option>
                                                        <?php } ?>

                                                    </optgroup>
                                                <?php }?>

                                            </select>
                                        </div>
                                    </td>
                                <?php } ?>
                            </tr>
                        </tbody>

                        <?php  $_smarty_tpl->tpl_vars["lines"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["lines"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['array_line']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["lines"]->key => $_smarty_tpl->tpl_vars["lines"]->value) {
$_smarty_tpl->tpl_vars["lines"]->_loop = true;
?>
                            <tbody class="tbody">
                                <tr>
                                    <?php  $_smarty_tpl->tpl_vars["line"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["line"]->_loop = false;
 $_smarty_tpl->tpl_vars["t"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lines']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["line"]->key => $_smarty_tpl->tpl_vars["line"]->value) {
$_smarty_tpl->tpl_vars["line"]->_loop = true;
 $_smarty_tpl->tpl_vars["t"]->value = $_smarty_tpl->tpl_vars["line"]->key;
?>
                                        <td valign="top" width="155" style="text-align: justify; font-size: 12px;border-bottom: 1px solid #CCCCCC;">
                                            <div style="width: 155px;padding: 2px 5px"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['line']->value,110,"...");?>
</div>
                                        </td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                </div>
                <div style="float: left; margin-top: 10px;"><button value="" alt="" onclick="document.getElementById('scrool_block').scrollLeft += 895;
                        return false" >>></button></div>
                <div class="clear">&nbsp;</div><br/>
                <input type="hidden" name="file_csv" value="<?php echo $_POST['file_csv'];?>
" />
                <input type="hidden" name="delimiter" value="<?php echo $_POST['delimiter'];?>
" />
                <input type="hidden" name="currency_id" value="<?php echo $_POST['currency_id'];?>
" />
                <button type="submit" value="Импортировать!" name="import_go" >Импортировать!</button>
            </form>
        <?php }?>
    </div>
</div><?php }} ?>
