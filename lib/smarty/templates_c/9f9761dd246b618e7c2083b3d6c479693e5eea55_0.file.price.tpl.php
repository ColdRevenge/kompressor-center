<?php /* Smarty version 3.1.24, created on 2017-05-11 15:24:08
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/import/templates/price.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1510941480591457e8d53902_94712736%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f9761dd246b618e7c2083b3d6c479693e5eea55' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/import/templates/price.tpl',
      1 => 1485559656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1510941480591457e8d53902_94712736',
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_591457e8db5b48_09742159',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_591457e8db5b48_09742159')) {
function content_591457e8db5b48_09742159 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1510941480591457e8d53902_94712736';
?>
<div class="block">
    <div class="page">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>

        <h1>Импортировать цены</h1>

        <h2>Загрузка excel-файла</h2>

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
                                <button onclick="this.style.display = 'none';">Импортировать на сайт</button>
                            </div>
                            <br/>

                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div><?php }
}
?>