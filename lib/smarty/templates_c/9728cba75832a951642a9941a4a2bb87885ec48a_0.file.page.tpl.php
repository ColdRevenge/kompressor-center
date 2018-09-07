<?php /* Smarty version 3.1.24, created on 2018-07-02 08:34:19
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/page/templates/page.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:14178910715b39b95b574d48_07808960%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9728cba75832a951642a9941a4a2bb87885ec48a' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/page/templates/page.tpl',
      1 => 1530509487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14178910715b39b95b574d48_07808960',
  'variables' => 
  array (
    'page' => 0,
    'param_tpl' => 0,
    'is_main' => 0,
    'url' => 0,
    'bread_page_arr' => 0,
    'adress' => 0,
    'bread' => 0,
    'host_url' => 0,
    'text' => 0,
    'open_category_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39b95b654854_82975145',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39b95b654854_82975145')) {
function content_5b39b95b654854_82975145 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/user-kc/data/www/www.kompressor-center.com/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '14178910715b39b95b574d48_07808960';
if ($_smarty_tpl->tpl_vars['page']->value->category_id != 0 && $_smarty_tpl->tpl_vars['param_tpl']->value['not_header'] != 1 && $_smarty_tpl->tpl_vars['param_tpl']->value['only_text'] != 1) {?>
    <?php if ($_smarty_tpl->tpl_vars['is_main']->value != 1) {?>  
        <?php if ($_GET['is_modal'] != 1) {?>
            <div class="breadcrumbs">
                <div class="container">
                    <ul class="breadcrumbs__cont">
                        <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">Главная</a></li>
                        <?php $_smarty_tpl->tpl_vars["adress"] = new Smarty_Variable('', null, 0);?>
                        <?php
$_from = $_smarty_tpl->tpl_vars['bread_page_arr']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["bread"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["bread"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_bread'] = new Smarty_Variable(array('total' => $_smarty_tpl->_count($_from), 'iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["bread"]->value) {
$_smarty_tpl->tpl_vars["bread"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_bread']->value['iteration']++;
$foreach_bread_Sav = $_smarty_tpl->tpl_vars["bread"];
?>
                            <?php $_smarty_tpl->tpl_vars["adress"] = new Smarty_Variable((($_smarty_tpl->tpl_vars['adress']->value).($_smarty_tpl->tpl_vars['bread']->value->pseudo_dir)).('/'), null, 0);?>
                            <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_bread']->value['total']) ? $_smarty_tpl->tpl_vars['__foreach_bread']->value['total'] : null) == (isset($_smarty_tpl->tpl_vars['__foreach_bread']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_bread']->value['iteration'] : null)) {?>
                                <li class="breadcrumbs__item"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['bread']->value->bread_name)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['bread']->value->header : $tmp);?>
 </li>
                            <?php } else { ?>
                                <li><a class="breadcrumbs__link" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['adress']->value;?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['bread']->value->bread_name)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['bread']->value->header : $tmp);?>
</a><span>/</span></li>
                            <?php }?>
                        <?php
$_smarty_tpl->tpl_vars["bread"] = $foreach_bread_Sav;
}
?>
                    </ul>
                </div>
            </div>
        <?php }?>
    <?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['only_text'] == 1) {?>
    <div class="<?php if ($_smarty_tpl->tpl_vars['is_main']->value != 1) {?>container<?php }?>">
        <h1 class="headline"><?php echo stripslashes(strtolower($_smarty_tpl->tpl_vars['page']->value->header));?>
</h1>
        <?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['page']->value->text),$_smarty_tpl->tpl_vars['url']->value,$_smarty_tpl->tpl_vars['host_url']->value);?>

        <?php echo $_smarty_tpl->tpl_vars['text']->value;?>

    </div>
<?php } else { ?>
    <div class="<?php if ($_smarty_tpl->tpl_vars['is_main']->value != 1) {?>container<?php }?>">
        <?php if ($_smarty_tpl->tpl_vars['is_main']->value != 1) {?>
            <h1 class="headline"><?php echo stripslashes(strtolower($_smarty_tpl->tpl_vars['page']->value->header));?>
</h1>
        <?php }?>

        <div class="text"<?php if ($_smarty_tpl->tpl_vars['is_main']->value == 1) {?> style="min-height: 0;"<?php } elseif ($_smarty_tpl->tpl_vars['open_category_id']->value == 1040 || $_smarty_tpl->tpl_vars['open_category_id']->value == 1038 || $_smarty_tpl->tpl_vars['open_category_id']->value == 972 || $_smarty_tpl->tpl_vars['open_category_id']->value == 971 || $_smarty_tpl->tpl_vars['open_category_id']->value == 762 || $_smarty_tpl->tpl_vars['open_category_id']->value == 939 || $_smarty_tpl->tpl_vars['open_category_id']->value == 880 || $_smarty_tpl->tpl_vars['open_category_id']->value == 907 || $_smarty_tpl->tpl_vars['open_category_id']->value == 909) {?>  style="padding-right:0;" <?php } elseif ($_GET['is_modal'] == 1) {?> style="min-height: 0;background-color: transparent"<?php }?>>

            <?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['page']->value->text),$_smarty_tpl->tpl_vars['url']->value,$_smarty_tpl->tpl_vars['host_url']->value);?>

            <?php echo $_smarty_tpl->tpl_vars['text']->value;?>

        <?php }?>
    </div>
</div>
<?php }
}
?>