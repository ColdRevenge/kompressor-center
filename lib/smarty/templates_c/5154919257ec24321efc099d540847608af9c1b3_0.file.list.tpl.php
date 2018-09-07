<?php /* Smarty version 3.1.24, created on 2015-10-28 15:24:16
         compiled from "/home/c10045/public_html/kompressor-center.com/modules/page/templates/list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:20433330825630be701ee938_32264691%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5154919257ec24321efc099d540847608af9c1b3' => 
    array (
      0 => '/home/c10045/public_html/kompressor-center.com/modules/page/templates/list.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20433330825630be701ee938_32264691',
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'sys_images_url' => 0,
    'admin_url' => 0,
    'type' => 0,
    'category_id' => 0,
    'category_name' => 0,
    'pages' => 0,
    'MyURL' => 0,
    'page' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5630be7024d9d5_98041300',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5630be7024d9d5_98041300')) {
function content_5630be7024d9d5_98041300 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/c10045/public_html/kompressor-center.com/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '20433330825630be701ee938_32264691';
?>
<div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_page.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <div class="page">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>

        <div class="quick_actions">
            <img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
added.png" alt="Добавить" /><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
page/add/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/<?php echo time();?>
/"  style="font-size: 17px;" <?php if (!$_smarty_tpl->tpl_vars['category_id']->value) {?>onclick="alert('Выберите категорию меню, к которой будет принадлежать статья');
                    return false;"<?php }?>>Добавить страницу</a>
        </div>
        <h1>Список страниц<?php if ($_smarty_tpl->tpl_vars['category_name']->value->name) {?> - &laquo;<?php echo stripslashes($_smarty_tpl->tpl_vars['category_name']->value->name);?>
&raquo;<?php }?></h1>

        <?php if (count($_smarty_tpl->tpl_vars['pages']->value)) {?>

            <form method="post" action="">

                <div class="clear">&nbsp;</div>
                <table class="table" width="100%">
                    <thead>
                        <tr>
                            <td valign="middle" align="center">Название страницы: </td>
                            <td valign="middle" align="center">Путь: </td>
                            <td valign="middle" align="center">Сорт.</td>

                            <td valign="middle" align="center">Добавленно: </td>
                            <td valign="middle" align="center" width="70">&nbsp;</td>
                        </tr>
                    </thead>

                    <?php
$_from = $_smarty_tpl->tpl_vars['pages']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['page'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['page']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->_loop = true;
$foreach_page_Sav = $_smarty_tpl->tpl_vars['page'];
?>
                        <tbody>
                            <tr>
                                <td valign="middle" align="center" style="cursor: pointer;" title="Редактировать" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
edit/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['page']->value->id;?>
/'"><?php echo stripslashes($_smarty_tpl->tpl_vars['page']->value->header);?>
</td>

                                <td valign="middle" align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->smarty->registered_objects['page_obj'][0]->getFullAdressPageTemplate(array('page_id'=>$_smarty_tpl->tpl_vars['page']->value->id,'type'=>-1),$_smarty_tpl);?>
" target="__blank" title="Посмотреть страницу"><?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->smarty->registered_objects['page_obj'][0]->getFullAdressPageTemplate(array('page_id'=>$_smarty_tpl->tpl_vars['page']->value->id,'type'=>-1),$_smarty_tpl);?>
</a></td>
                                <td valign="middle" align="center"><input type="text" name="order[<?php echo $_smarty_tpl->tpl_vars['page']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['page']->value->order;?>
" style="text-align: center;width: 40px;" maxlength="20"/></td>
                                <td valign="middle" align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['page']->value->created,"%d:%m:%Y %H:%M");?>
</td>
                                <td valign="middle" align="center">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
edit/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['page']->value->id;?>
/"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/edit.png" align="middle" hspace="1" alt="Редактировать" /></a>
                                    <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить страницу??')) {
                                                location.href = '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/3/<?php echo $_smarty_tpl->tpl_vars['page']->value->id;?>
/';}"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/del.png" align="middle" hspace="1" alt="Удалить раздел" /></a>
                                </td>
                            </tr>

                        </tbody>
                    <?php
$_smarty_tpl->tpl_vars['page'] = $foreach_page_Sav;
}
?>
                    <tfoot>
                        <tr>
                            <td valign="middle" align="right" colspan="7">
                                <button>Сохранить</button>    

                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>

        <?php } else { ?>
            <h2>В разделе <?php if ($_smarty_tpl->tpl_vars['category_name']->value->name) {?> - &laquo;<?php echo stripslashes($_smarty_tpl->tpl_vars['category_name']->value->name);?>
&raquo;<?php }?> нет ни одной страницы. <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
page/add/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/<?php echo time();?>
/" <?php if (!$_smarty_tpl->tpl_vars['category_id']->value) {?>onclick="alert('Выберите категорию меню, к которой будет принадлежать статья');
                    return false;"<?php }?>><b>Добавить?</b></a></h2>
            <?php }?>
    </div>
</div><?php }
}
?>