<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-21 18:46:38
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/metro/templates/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136537279355d747dea4bec4-93711638%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16a8afeb12444524a199f922cb6133056ecaaa8b' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/metro/templates/list.tpl',
      1 => 1428774205,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136537279355d747dea4bec4-93711638',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'metro' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'list_edit' => 0,
    'param_tpl' => 0,
    'sys_images_url' => 0,
    'MyURL' => 0,
    'item_metro' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d747deaeda68_45658311',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d747deaeda68_45658311')) {function content_55d747deaeda68_45658311($_smarty_tpl) {?><div class="block">
    <?php if ($_smarty_tpl->tpl_vars['metro']->value) {?>
        <h1>Станции метро</h1>
        <?php echo '<script'; ?>
>
            setTimeout(function () {
                $("#message").hide("slow");
            }, 3000);
        <?php echo '</script'; ?>
>
        <div id="er01"><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>
</div>


        <?php if ($_smarty_tpl->tpl_vars['list_edit']->value==1) {?>
            <h1>Добавление станции </h1>
            <form method="post">
                <div class="quick_add">
                    <table cellpadding="2" cellspacing="0" border="0" >
                        <tr>
                            <td valign="middle" align="right">Название <span class="asterix">*</span>:</td>
                            <td valign="middle" align="left"><input type="text" name="name" value="<?php echo $_POST['name'];?>
" style="width: 246px"/></td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" colspan="2">
                                <?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['edit_stantion_id']) {?><button>Сохранить</button><?php } else { ?><button>Добавить</button><?php }?>
                        </tr>
                    </table>
                </div>
            </form>
        <?php } else { ?>
            <div class="quick_actions">
                <img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
added.png" alt="Добавить"><a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
add/add/" style="font-size: 17px;">Добавить станцию</a>
            </div>
        <?php }?>


        <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%">
            <thead>
                <tr>
                    <td valign="top" align="center" width="90">#</td>
                    <td valign="top" align="center">Название:</td>
                    <td valign="top" align="left" width="50">&nbsp;</td>
                </tr>
            </thead>
            <?php  $_smarty_tpl->tpl_vars["item_metro"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item_metro"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['metro']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item_metro"]->key => $_smarty_tpl->tpl_vars["item_metro"]->value) {
$_smarty_tpl->tpl_vars["item_metro"]->_loop = true;
?>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="center" style="cursor: pointer;" title="Редактировать" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
add/add/<?php echo $_smarty_tpl->tpl_vars['item_metro']->value->id;?>
/'"><?php echo $_smarty_tpl->tpl_vars['item_metro']->value->id;?>
</td>
                        <td valign="middle" align="center" style="cursor: pointer;" title="Редактировать" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
add/add/<?php echo $_smarty_tpl->tpl_vars['item_metro']->value->id;?>
/'"><?php echo stripslashes($_smarty_tpl->tpl_vars['item_metro']->value->name);?>
</td>
                        <td valign="middle" align="center">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
add/add/<?php echo $_smarty_tpl->tpl_vars['item_metro']->value->id;?>
/" title="Редактировать станцию"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/edit.png" alt="" /></a>
                            <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить станцию ?')) {
                                            location.href = '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
del/<?php echo $_smarty_tpl->tpl_vars['item_metro']->value->id;?>
/';}"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/del.png" alt="Удалить станцию" /></a>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    <?php } else { ?>
        <h1>Нет станций метро</h1>
        <div class="quick_actions">
            <img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
added.png" alt="Добавить"><a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
add/add/" style="font-size: 17px;">Добавить станцию</a>
        </div>

    <?php }?>
</div><?php }} ?>
