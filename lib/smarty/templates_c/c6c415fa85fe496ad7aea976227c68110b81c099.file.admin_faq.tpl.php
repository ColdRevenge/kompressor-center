<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-21 12:25:19
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/faq/templates/admin_faq.tpl" */ ?>
<?php /*%%SmartyHeaderCode:71409542155d6ee7f68d016-26870716%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6c415fa85fe496ad7aea976227c68110b81c099' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/faq/templates/admin_faq.tpl',
      1 => 1428757868,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '71409542155d6ee7f68d016-26870716',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sys_images_url' => 0,
    'admin_url' => 0,
    'questions' => 0,
    'question' => 0,
    'MyURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d6ee7f6ef8d4_90517114',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d6ee7f6ef8d4_90517114')) {function content_55d6ee7f6ef8d4_90517114($_smarty_tpl) {?><div class="block">
    <div class="quick_actions">
        <img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
added.png" alt="Добавить" /><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
faq/add/" >Добавить</a>
    </div>
    <h1>Вопросы и ответы </h1>


    <table cellpadding="4" cellspacing="1" border="0" class="table">
        <thead>
            <tr>
                <td valign="middle" align="center" width="150">Фио: </td>
                
                <td valign="middle" align="center">Вопрос: </td>
                <td valign="middle" align="center" width="150">Почта: </td>
                <td valign="middle" align="center" width="140">Добавленно: </td>
                <td valign="middle" align="center" width="80">Позиция: </td>
                <td valign="middle" align="center" width="60">&nbsp;</td>
            </tr>
        </thead>
        <?php  $_smarty_tpl->tpl_vars['question'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['question']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['questions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["question"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['question']->key => $_smarty_tpl->tpl_vars['question']->value) {
$_smarty_tpl->tpl_vars['question']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["question"]['iteration']++;
?>
            <tbody>
                <tr>
                    <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['question']->value->fio;?>
</td>
                    <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['question']->value->subject;?>
</td>
                    
                    <td valign="middle" align="center"><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['question']->value->mail;?>
"><?php echo $_smarty_tpl->tpl_vars['question']->value->mail;?>
</a></td>
                    <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['question']->value->created;?>
</td>
                    <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['question']->value->order;?>
</td>
                    <td valign="middle" align="center">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
edit/<?php echo $_smarty_tpl->tpl_vars['question']->value->id;?>
/"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/edit.png" align="middle" hspace="1" alt="Редактировать" /></a>
                        <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить страницу??', '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
3/<?php echo $_smarty_tpl->tpl_vars['question']->value->id;?>
/');"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/del.png" align="middle" hspace="1" alt="Удалить раздел" /></a>
                    </td>
                </tr>
            </tbody>
        <?php } ?>
        <tfoot>
            <tr>
                <td valign="middle" align="right" colspan="7" style="height: 22px;">Всего записей: <?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['question']['iteration'];?>
&nbsp;</td>

            </tr>
        </tfoot>
    </table>
</div><?php }} ?>
