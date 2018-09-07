<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 17:07:53
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/page/templates/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11008451455d48db9668c36-17460345%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a31fffaab647a50cb41f899f21dc190a7b555e5b' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/page/templates/list.tpl',
      1 => 1423307971,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11008451455d48db9668c36-17460345',
  'function' => 
  array (
  ),
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
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d48db970c6e6_46675685',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d48db970c6e6_46675685')) {function content_55d48db970c6e6_46675685($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
?><div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_page.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="page">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

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

                    <?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['page']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->_loop = true;
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
                    <?php } ?>
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
</div><?php }} ?>
