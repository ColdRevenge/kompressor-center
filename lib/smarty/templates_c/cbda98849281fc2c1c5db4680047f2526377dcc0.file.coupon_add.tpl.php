<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-24 12:18:49
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/discount/templates/coupon_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:147370745955dae179535107-40044382%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbda98849281fc2c1c5db4680047f2526377dcc0' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/discount/templates/coupon_add.tpl',
      1 => 1428327664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147370745955dae179535107-40044382',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'param_tpl' => 0,
    'category' => 0,
    'date_form' => 0,
    'coupons_list' => 0,
    'coupon_item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55dae1795ec812_82202912',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55dae1795ec812_82202912')) {function content_55dae1795ec812_82202912($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

<div class="block" style="border: 0">
    <h1><?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['edit_id']>0) {?>Редактировать<?php } else { ?>Добавить<?php }?> купон</h1>

    <form method="post" enctype="multipart/form-data" action="">
        <table cellpadding="2" cellspacing="0" border="0">
            <tr>
                <td valign="middle" align="right">Название: <span class="asterix">*</span></td>
                <td valign="middle" align="left"><input type="text" name="name" value="<?php echo $_POST['name'];?>
" maxlength="255" style="width: 246px;"/></td>
            </tr>
            <tr>
                <td valign="top" align="right">Список кодов: <span class="asterix">*</span>
                    <div class="notice">
                        Каждый код купона должен идти с новой строчки
                    </div>
                </td>
                <td valign="middle" align="left">
                    <textarea name="code_list" style="width: 246px;height: 200px;"><?php echo trim(stripslashes($_POST['code_list']));?>
</textarea>
                </td>
            </tr>
            <tr>
                <td valign="top" align="right">Категория:</td>
                <td valign="top" align="left">
                    <?php echo $_smarty_tpl->getSubTemplate ('coupon_add_category.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>0,'tree'=>$_smarty_tpl->tpl_vars['category']->value,'inc'=>'coupon_add_category.tpl','level'=>0), 0);?>

                    <?php echo '<script'; ?>
 type="text/javascript">
                        $('#parent_0>div>div>div>input:checked').each(function () {
                            id = ($(this).parent().parent().attr('id'));
                            if (id) {
                                $('#' + (id)).show();
                            }
                        });
                    <?php echo '</script'; ?>
>
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right">Скидка:</td>
                <td valign="middle" align="left"><input type="text" name="discount" value="<?php echo $_POST['discount'];?>
" maxlength="255" style="width: 146px;"/>
                    <select style="width: 70px;" name="discount_type">
                        <option value="0" <?php if ($_POST['discount_type']==0) {?> selected="selected"<?php }?>>%</option>
                        <option value="1" <?php if ($_POST['discount_type']==1) {?> selected="selected"<?php }?>>руб.</option>
                    </select>
                </td>
            </tr>
            <tr style="display: none;">
                <td valign="middle" align="right"></td>
                <td valign="middle" align="left">
                    <input type="radio" name="type" value="1" id="type_1" <?php if ($_POST['type']==1) {?> checked="checked"<?php }?> /><label for="type_1">Одноразовый</label>
                    <input type="radio" name="type" value="0" id="type_0" <?php if ($_POST['type']==0) {?> checked="checked"<?php }?> /><label for="type_0">Многоразовый</label>
                    <br/><br/>
                </td>   
            </tr>
            <tr>
                <td valign="middle" align="right">Дата завершения<span class="asterix">*</span>:</td>
                <td valign="top" align="left">
                    <?php echo $_smarty_tpl->tpl_vars['date_form']->value;?>

                </td>
            </tr>
            <tr>
                <td valign="middle" align="right">Минимальная стоимость товара:</td>
                <td valign="middle" align="left"><input type="text" name="min_sum" value="<?php echo $_POST['min_sum'];?>
" maxlength="255" style="width: 246px;"/></td>
            </tr>


            <tr>
                <td valign="middle" align="right">Переход на следующий копон:</td>
                <td valign="middle" align="left">
                    <table style="color: gray">
                        <tr>

                            <td style="text-align: right;padding-right: 7px">
                                При сумме: 
                            </td>
                            <td>
                                <input type="text" name="code_next_sum" value="<?php echo $_POST['code_next_sum'];?>
" maxlength="255" style="width: 110px;"/> р.
                            </td>

                        </tr>
                        <tr>
                            <td style="text-align: right;padding-right: 7px">
                                След. купон: 
                            </td>
                            <td>
                                <select style="width: 126px;" name="code_next_coupon_id">
                                    <option value="0">Не выбрано</option>
                                    <?php  $_smarty_tpl->tpl_vars["coupon_item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["coupon_item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['coupons_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["coupon_item"]->key => $_smarty_tpl->tpl_vars["coupon_item"]->value) {
$_smarty_tpl->tpl_vars["coupon_item"]->_loop = true;
?>
                                        <?php if ($_smarty_tpl->tpl_vars['coupon_item']->value->id!=$_smarty_tpl->tpl_vars['param_tpl']->value['edit_id']) {?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['coupon_item']->value->id;?>
"<?php if ($_POST['code_next_coupon_id']==$_smarty_tpl->tpl_vars['coupon_item']->value->id) {?> selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['coupon_item']->value->name);?>
</option>
                                        <?php }?>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right" colspan="2">
                    <input type="hidden" value="1" name="submit" />
                    <button><?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['edit_id']) {?>Сохранить<?php } else { ?>Добавить<?php }?></button>
                </td>
            </tr>
        </table>
    </form>
</div><?php }} ?>
