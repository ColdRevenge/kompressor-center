<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-22 13:10:00
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/page/templates/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11910104255d4694b54d939-63437787%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf4d9bec2f635965fdc00aa331fe6316c8b4afc8' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/page/templates/page.tpl',
      1 => 1440238199,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11910104255d4694b54d939-63437787',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d4694b72ded6_14049248',
  'variables' => 
  array (
    'is_mobile' => 0,
    'page' => 0,
    'param_tpl' => 0,
    'is_main' => 0,
    'bread_page_arr' => 0,
    'adress' => 0,
    'bread' => 0,
    'url' => 0,
    'full_adress' => 0,
    'host_url' => 0,
    'text' => 0,
    'open_category_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4694b72ded6_14049248')) {function content_55d4694b72ded6_14049248($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><?php if ($_smarty_tpl->tpl_vars['is_mobile']->value==1) {?>
    <?php if ($_smarty_tpl->tpl_vars['page']->value->category_id!=0&&$_smarty_tpl->tpl_vars['param_tpl']->value['not_header']!=1&&$_smarty_tpl->tpl_vars['param_tpl']->value['only_text']!=1) {?>
        <?php if ($_smarty_tpl->tpl_vars['is_main']->value!=1) {?>  

            <?php $_smarty_tpl->tpl_vars["full_adress"] = new Smarty_variable('', null, 0);?>
            <?php $_smarty_tpl->tpl_vars["adress"] = new Smarty_variable('', null, 0);?>
            <?php  $_smarty_tpl->tpl_vars["bread"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["bread"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bread_page_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["bread"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bread"]['total'] = $_smarty_tpl->tpl_vars["bread"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bread"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["bread"]->key => $_smarty_tpl->tpl_vars["bread"]->value) {
$_smarty_tpl->tpl_vars["bread"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bread"]['iteration']++;
?>
                <?php $_smarty_tpl->tpl_vars["adress"] = new Smarty_variable((($_smarty_tpl->tpl_vars['adress']->value).($_smarty_tpl->tpl_vars['bread']->value->pseudo_dir)).('/'), null, 0);?>
                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['bread']['total']==$_smarty_tpl->getVariable('smarty')->value['foreach']['bread']['iteration']-1) {?>
                    <?php $_smarty_tpl->tpl_vars["full_adress"] = new Smarty_variable(($_smarty_tpl->tpl_vars['url']->value).($_smarty_tpl->tpl_vars['adress']->value), null, 0);?>
                <?php }?>
            <?php } ?>

            <div id="breadcrumbs-block">
                <div id="bread-back"><a href="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['full_adress']->value)===null||$tmp==='' ? "/" : $tmp);?>
">Назад</a></div>
                <h1><?php echo stripslashes(strtolower($_smarty_tpl->tpl_vars['page']->value->header));?>
</h1>
                <div class="clear">&nbsp;</div>
            </div>
        <?php }?>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['only_text']==1) {?>
        <?php if (trim(smarty_modifier_truncate($_smarty_tpl->tpl_vars['page']->value->text_mobile))) {?>
            <?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['page']->value->text_mobile),$_smarty_tpl->tpl_vars['url']->value,$_smarty_tpl->tpl_vars['host_url']->value);?>

        <?php } else { ?>
            <?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['page']->value->text),$_smarty_tpl->tpl_vars['url']->value,$_smarty_tpl->tpl_vars['host_url']->value);?>

            <?php echo $_smarty_tpl->tpl_vars['text']->value;?>

        <?php }?>
    <?php } else { ?>
        <div class="text">
            <?php if (trim(smarty_modifier_truncate($_smarty_tpl->tpl_vars['page']->value->text_mobile))) {?>
                <?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['page']->value->text_mobile),$_smarty_tpl->tpl_vars['url']->value,$_smarty_tpl->tpl_vars['host_url']->value);?>

            <?php } else { ?>
                <?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['page']->value->text),$_smarty_tpl->tpl_vars['url']->value,$_smarty_tpl->tpl_vars['host_url']->value);?>

                <?php echo $_smarty_tpl->tpl_vars['text']->value;?>

            <?php }?>
        </div>
    <?php }?>
<?php } else { ?>

    <?php if ($_smarty_tpl->tpl_vars['page']->value->category_id!=0&&$_smarty_tpl->tpl_vars['param_tpl']->value['not_header']!=1&&$_smarty_tpl->tpl_vars['param_tpl']->value['only_text']!=1) {?>
        <?php if ($_smarty_tpl->tpl_vars['is_main']->value!=1) {?>  
            <?php if ($_GET['is_modal']!=1) {?>
                <div class="breadcrumbs-block">
                    <ul>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">Главная</a><span>/</span></li>
                            <?php $_smarty_tpl->tpl_vars["adress"] = new Smarty_variable('', null, 0);?>
                            <?php  $_smarty_tpl->tpl_vars["bread"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["bread"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bread_page_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["bread"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bread"]['total'] = $_smarty_tpl->tpl_vars["bread"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bread"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["bread"]->key => $_smarty_tpl->tpl_vars["bread"]->value) {
$_smarty_tpl->tpl_vars["bread"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bread"]['iteration']++;
?>
                                <?php $_smarty_tpl->tpl_vars["adress"] = new Smarty_variable((($_smarty_tpl->tpl_vars['adress']->value).($_smarty_tpl->tpl_vars['bread']->value->pseudo_dir)).('/'), null, 0);?>
                                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['bread']['total']==$_smarty_tpl->getVariable('smarty')->value['foreach']['bread']['iteration']) {?>
                                <li><?php echo (($tmp = @$_smarty_tpl->tpl_vars['bread']->value->bread_name)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['bread']->value->header : $tmp);?>
 </li>
                                <?php } else { ?>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['adress']->value;?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['bread']->value->bread_name)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['bread']->value->header : $tmp);?>
</a><span>/</span></li>
                                    <?php }?>
                                <?php } ?>
                    </ul>
                </div>
            <?php }?>
        <?php }?>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['only_text']==1) {?>

        <h1><?php echo stripslashes(strtolower($_smarty_tpl->tpl_vars['page']->value->header));?>
</h1>
        <?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['page']->value->text),$_smarty_tpl->tpl_vars['url']->value,$_smarty_tpl->tpl_vars['host_url']->value);?>

        <?php echo $_smarty_tpl->tpl_vars['text']->value;?>

    <?php } else { ?>
        <?php if ($_smarty_tpl->tpl_vars['is_main']->value!=1) {?>
            <h1><?php echo stripslashes(strtolower($_smarty_tpl->tpl_vars['page']->value->header));?>
</h1>
        <?php }?>

        <div class="text"<?php if ($_smarty_tpl->tpl_vars['is_main']->value==1) {?> style="min-height: 0;"<?php } elseif ($_smarty_tpl->tpl_vars['open_category_id']->value==1040||$_smarty_tpl->tpl_vars['open_category_id']->value==1038||$_smarty_tpl->tpl_vars['open_category_id']->value==972||$_smarty_tpl->tpl_vars['open_category_id']->value==971||$_smarty_tpl->tpl_vars['open_category_id']->value==762||$_smarty_tpl->tpl_vars['open_category_id']->value==939||$_smarty_tpl->tpl_vars['open_category_id']->value==880||$_smarty_tpl->tpl_vars['open_category_id']->value==907||$_smarty_tpl->tpl_vars['open_category_id']->value==909) {?>  style="padding-right:0;" <?php } elseif ($_GET['is_modal']==1) {?> style="min-height: 0;background-color: transparent"<?php }?>>

            <?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['page']->value->text),$_smarty_tpl->tpl_vars['url']->value,$_smarty_tpl->tpl_vars['host_url']->value);?>

            <?php echo $_smarty_tpl->tpl_vars['text']->value;?>

        <?php }?>
    </div>
<?php }?>
<?php }} ?>
