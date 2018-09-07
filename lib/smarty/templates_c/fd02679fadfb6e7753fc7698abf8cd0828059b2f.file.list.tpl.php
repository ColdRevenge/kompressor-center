<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 12:44:04
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/import/templates/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14640143055d5a164719206-56148262%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd02679fadfb6e7753fc7698abf8cd0828059b2f' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/import/templates/list.tpl',
      1 => 1423307969,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14640143055d5a164719206-56148262',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'files' => 0,
    'admin_url' => 0,
    'param_tpl' => 0,
    'file' => 0,
    'currency' => 0,
    'curr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d5a16475c0b9_34593985',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d5a16475c0b9_34593985')) {function content_55d5a16475c0b9_34593985($_smarty_tpl) {?><div class="block">
    
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_import.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="page">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

        <h1>Импорт товаров</h1>

        <h2>Загрузка csv-файла</h2>

        <form action="" method="post" enctype="multipart/form-data">
            <table cellpadding="4" cellspacing="1" border="0" class="table" style="margin: 10px 0px 20px 30px;">
                <tbody class="table_header">
                    <tr>
                        <td valign="middle" align="center">Выберите файл</td>
                    </tr>
                </tbody>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right">
                            <input type="file" name="file_price" />
                            <div style="margin-top: 7px;">
                                <button>Загрузить</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <?php if (count($_smarty_tpl->tpl_vars['files']->value)!=0) {?>
            <h2>Импорт</h2>
            <form action="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
import/import/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['category_id'];?>
/" method="post" >
                <table cellpadding="6" cellspacing="1" border="0" class="table" style="margin: 10px 0px 20px 30px;">

                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="right">
                                Выберите .csv-файл: 
                            </td>
                            <td valign="middle" align="left">
                                <select name="file_csv" style="width: 300px;" id="file_csv">
                                    <?php  $_smarty_tpl->tpl_vars['file'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['file']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['file']->key => $_smarty_tpl->tpl_vars['file']->value) {
$_smarty_tpl->tpl_vars['file']->_loop = true;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['file']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['file']->value->file;?>
</option>
                                    <?php } ?>
                                </select>

                                    <button  value="Удалить файл" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
import/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['category_id'];?>
/?del_file='+document.getElementById('file_csv').options[document.getElementById('file_csv').selectedIndex].value; return false;" >Удалить файл</button>
                            </td>
                        </tr>


                       
                   
                        <tr>
                            <td valign="middle" align="right" colspan="2">
                                
                                
                                <select name="currency_id" style="width: 50px;display: none;">
                                    <?php  $_smarty_tpl->tpl_vars["curr"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["curr"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['currency']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["curr"]->key => $_smarty_tpl->tpl_vars["curr"]->value) {
$_smarty_tpl->tpl_vars["curr"]->_loop = true;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['curr']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['curr']->value->name;?>
</option>
                                    <?php } ?>    
                                </select>
                                <input type="hidden" value=";" name="delimiter" style="width: 10px;text-align: center;" maxlength="1" />
                                
                                <button value="Следующий шаг" name="import" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
import/import/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['category_id'];?>
/' + $('#file_csv option:selected').val(); return false;" >Следующий шаг</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        <?php }?>
    </div>
</div><?php }} ?>
