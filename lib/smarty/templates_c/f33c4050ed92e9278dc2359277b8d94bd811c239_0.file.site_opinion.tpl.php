<?php /* Smarty version 3.1.24, created on 2015-09-16 19:12:16
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/opinion/templates/site_opinion.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:141173899955f994e054ae74_70013074%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f33c4050ed92e9278dc2359277b8d94bd811c239' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/opinion/templates/site_opinion.tpl',
      1 => 1442305254,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141173899955f994e054ae74_70013074',
  'variables' => 
  array (
    'opinions' => 0,
    'opinion' => 0,
    'message' => 0,
    'error' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f994e05c65d8_64317421',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f994e05c65d8_64317421')) {
function content_55f994e05c65d8_64317421 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/admin/domains/coralmedia.ru/public_html/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '141173899955f994e054ae74_70013074';
if (!$_POST['send']) {?>

    <div id="opinion">
        <?php
$_from = $_smarty_tpl->tpl_vars['opinions']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['opinion'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['opinion']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['opinion']->value) {
$_smarty_tpl->tpl_vars['opinion']->_loop = true;
$foreach_opinion_Sav = $_smarty_tpl->tpl_vars['opinion'];
?>
            <div class="op_name"><span><?php echo stripslashes($_smarty_tpl->tpl_vars['opinion']->value->name);?>
</span><?php if (stripslashes($_smarty_tpl->tpl_vars['opinion']->value->profession)) {?>, <?php echo stripslashes($_smarty_tpl->tpl_vars['opinion']->value->profession);
}?></div>
            <div class="op_date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['opinion']->value->date,"%d.%m.%Y");?>
</div>
            <div class="clear">&nbsp;</div>
            <div class="op_text"><div class="op_text_block"><?php echo nl2br(stripslashes($_smarty_tpl->tpl_vars['opinion']->value->text));?>
</div></div>
		
        <?php
$_smarty_tpl->tpl_vars['opinion'] = $foreach_opinion_Sav;
}
?>
    </div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['message']->value) {?>

    <p style="text-align: center; font-size: 21px;color: #0AA8DC;">Спасибо<?php if ($_POST['name']) {?>, <?php echo $_POST['name'];
}?>!</p>
    <p style="text-align: center; font-size: 17px;color: #0AA8DC;" class="h2">Ваш отзыв успешно добавлен</p>
    <p style="text-align: center; font-size: 15px;line-height: 1.6;">Важно: Публикации отзывов осуществляются в режиме пост-модерации, т.е. отзыв публикуется только после соответствующей поверки. Напоминаем вам, что отзывы, не относящиеся к предмету обсуждения, содержащие не нормативную лексику, а также любое, запрещенное российским законодательством содержание - не публикуются.</p>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
    <h2 style="color: #F958B0"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</h2>
<?php }?>
<?php if (!$_smarty_tpl->tpl_vars['message']->value) {?>
    <div style="margin: auto; margin-top: 40px; width: 580px;" id="result" >
        <form method="post" id="form_question" action="">
            <h3 style="margin-bottom: 7px;">Отзывы клиентов: </h3>
            <table cellpadding="0" cellspacing="0" border="0" class="table_fields">
                <tbody>
                    <tr>
                        <td valign="middle" align="right" style="padding: 2px;text-align: right">Ваше имя: <span class="asterix">*</span></td>
                        <td valign="middle" align="left" style="padding: 2px;"><input type="text" name="name"  onfocus="this.className='selInput'" onblur = "this.className = 'text'"  style="width: 440px;" maxlength="255" value="<?php echo $_POST['name'];?>
" /></td>
                    </tr>
            
                    <tr>
                        <td valign="top" align="right" style="vertical-align: top;padding: 2px;;text-align: right">Ваш отзыв: <span class="asterix">*</span></td>
                        <td valign="middle" align="left" style="padding: 2px;">
                            <textarea rows="8" cols="12" name="text"  onfocus="this.className='selInput'" onblur = "this.className = 'text'"   style="width: 440px;height: 150px;"><?php echo $_POST['text'];?>
</textarea>
                        </td>
                    </tr>
                    <tr style="background-color: white">
                        <td valign="middle" align="right" colspan="2" style="background-color: white; text-align: right">
                            <input type="hidden" name="send" value="1" />
                            <button class="send"  onclick="AjaxFormQuery('result', 'form_question', '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
opinion/add/'); return false;"></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
<?php }?>

<?php }
}
?>