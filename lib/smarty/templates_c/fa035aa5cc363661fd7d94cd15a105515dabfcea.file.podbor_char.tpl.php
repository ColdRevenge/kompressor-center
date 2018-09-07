<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 14:32:59
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/catalog/templates/podbor_char.tpl" */ ?>
<?php /*%%SmartyHeaderCode:193019092255d4696b102275-59242968%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa035aa5cc363661fd7d94cd15a105515dabfcea' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/catalog/templates/podbor_char.tpl',
      1 => 1434989273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193019092255d4696b102275-59242968',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'open_category_id' => 0,
    'chars_menu' => 0,
    'url' => 0,
    'category_adress' => 0,
    'selected_char_value_id' => 0,
    'char_menu' => 0,
    'char_valur_id' => 0,
    'i' => 0,
    'char_pseudo_dir' => 0,
    'desc_checker' => 0,
    'user_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d4696b21e260_39049150',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4696b21e260_39049150')) {function content_55d4696b21e260_39049150($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/function.counter.php';
?><?php $_smarty_tpl->assign("category_adress",$_smarty_tpl->smarty->registered_objects['this'][0]->getCategoryAdress(array('category_id'=>$_smarty_tpl->tpl_vars['open_category_id']->value),$_smarty_tpl));?>


<?php $_smarty_tpl->assign("chars_menu",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>2,'sort'=>'1'),$_smarty_tpl));?>

<?php $_smarty_tpl->assign("char_pseudo_dir",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharacteristicPseudoDir(array('char_id'=>2),$_smarty_tpl));?>

<?php if (count($_smarty_tpl->tpl_vars['chars_menu']->value)) {?>
    <div class="navigation-detailed">
        <div>
            <div>Цвет:</div>
            <div class="char-color">

                <?php echo smarty_function_counter(array('assign'=>"i",'start'=>0),$_smarty_tpl);?>

                <ul>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;?>
"<?php if (!(count($_smarty_tpl->tpl_vars['selected_char_value_id']->value))) {?> class="active"<?php }?>>Все цвета</a></li>

                    <?php  $_smarty_tpl->tpl_vars["char_menu"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["char_menu"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chars_menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["char_menu"]->key => $_smarty_tpl->tpl_vars["char_menu"]->value) {
$_smarty_tpl->tpl_vars["char_menu"]->_loop = true;
?>
                        <?php echo smarty_function_counter(array('assign'=>"i"),$_smarty_tpl);?>

                        <?php $_smarty_tpl->tpl_vars["char_valur_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['char_menu']->value->id, null, 0);?>

                        
                        <?php $_smarty_tpl->assign("desc_checker",$_smarty_tpl->smarty->registered_objects['this'][0]->getCheckerCharDesc(array('category_id'=>$_smarty_tpl->tpl_vars['open_category_id']->value,'char_value_id'=>$_smarty_tpl->tpl_vars['char_valur_id']->value,'char_value_2_id'=>0,'char_value_3_id'=>0,'char_value_4_id'=>0),$_smarty_tpl));?>


                        <?php if ($_smarty_tpl->tpl_vars['i']->value%(ceil(count($_smarty_tpl->tpl_vars['chars_menu']->value)/4))==0) {
if ($_smarty_tpl->tpl_vars['i']->value!=0) {?></ul><?php }?><ul><?php }?><li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;?>
char/<?php echo $_smarty_tpl->tpl_vars['char_pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['char_menu']->value->pseudo_dir;?>
/"<?php if ($_smarty_tpl->tpl_vars['selected_char_value_id']->value[$_smarty_tpl->tpl_vars['char_valur_id']->value]==1) {?> class="active"<?php }
if (!$_smarty_tpl->tpl_vars['char_menu']->value->pseudo_dir||!$_smarty_tpl->tpl_vars['char_pseudo_dir']->value) {?> style="color: red"<?php }
if ($_smarty_tpl->tpl_vars['desc_checker']->value->title==''&&$_smarty_tpl->tpl_vars['user_id']->value==446) {?>style="color:blue;"<?php } elseif ($_smarty_tpl->tpl_vars['desc_checker']->value->desc==''&&$_smarty_tpl->tpl_vars['user_id']->value==446) {?>style="color:#f6a828;"<?php }?>><?php if ($_smarty_tpl->tpl_vars['char_menu']->value->icon) {?><span style="background-image: url(/images/icons/<?php echo $_smarty_tpl->tpl_vars['char_menu']->value->icon;?>
)">&nbsp;</span><?php }
echo stripslashes($_smarty_tpl->tpl_vars['char_menu']->value->name);?>
</a> <?php if ($_smarty_tpl->tpl_vars['selected_char_value_id']->value[$_smarty_tpl->tpl_vars['char_valur_id']->value]==1) {?> <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;?>
" class="clear-selection">Сбросить подбор</a><?php }?></li>
                    <?php } ?></ul>
                <div class="clear">&nbsp;</div>
            </div>
        </div>
        <div>
            <div>Камень:</div>
            <div>
                <?php $_smarty_tpl->assign("chars_menu",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>5,'sort'=>'1'),$_smarty_tpl));?>

                <?php $_smarty_tpl->assign("char_pseudo_dir",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharacteristicPseudoDir(array('char_id'=>5),$_smarty_tpl));?>


                <?php echo smarty_function_counter(array('assign'=>"i",'start'=>0),$_smarty_tpl);?>

                <ul>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;?>
"<?php if (!(count($_smarty_tpl->tpl_vars['selected_char_value_id']->value))) {?> class="active"<?php }?>>Все камни</a></li>

                    <?php  $_smarty_tpl->tpl_vars["char_menu"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["char_menu"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chars_menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["char_menu"]->key => $_smarty_tpl->tpl_vars["char_menu"]->value) {
$_smarty_tpl->tpl_vars["char_menu"]->_loop = true;
?>
                        <?php echo smarty_function_counter(array('assign'=>"i"),$_smarty_tpl);?>

                        <?php $_smarty_tpl->tpl_vars["char_valur_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['char_menu']->value->id, null, 0);?>

                        
                        <?php $_smarty_tpl->assign("desc_checker",$_smarty_tpl->smarty->registered_objects['this'][0]->getCheckerCharDesc(array('category_id'=>$_smarty_tpl->tpl_vars['open_category_id']->value,'char_value_id'=>$_smarty_tpl->tpl_vars['char_valur_id']->value,'char_value_2_id'=>0,'char_value_3_id'=>0,'char_value_4_id'=>0),$_smarty_tpl));?>


                        <?php if ($_smarty_tpl->tpl_vars['i']->value%(ceil(count($_smarty_tpl->tpl_vars['chars_menu']->value)/4))==0) {
if ($_smarty_tpl->tpl_vars['i']->value!=0) {?></ul><?php }?><ul><?php }?><li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;?>
char/<?php echo $_smarty_tpl->tpl_vars['char_pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['char_menu']->value->pseudo_dir;?>
/"<?php if ($_smarty_tpl->tpl_vars['selected_char_value_id']->value[$_smarty_tpl->tpl_vars['char_valur_id']->value]==1) {?> class="active"<?php }
if (!$_smarty_tpl->tpl_vars['char_menu']->value->pseudo_dir||!$_smarty_tpl->tpl_vars['char_pseudo_dir']->value) {?> style="color: red"<?php }
if ($_smarty_tpl->tpl_vars['desc_checker']->value->title==''&&$_smarty_tpl->tpl_vars['user_id']->value==446) {?>style="color:blue;"<?php } elseif ($_smarty_tpl->tpl_vars['desc_checker']->value->desc==''&&$_smarty_tpl->tpl_vars['user_id']->value==446) {?>style="color: #f6a828;"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['char_menu']->value->name);?>
</a> <?php if ($_smarty_tpl->tpl_vars['selected_char_value_id']->value[$_smarty_tpl->tpl_vars['char_valur_id']->value]==1) {?> <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;?>
" class="clear-selection">Сбросить подбор</a><?php }?></li>
                    <?php } ?></ul>
                <div class="clear">&nbsp;</div>
            </div>
            <div class="clear">&nbsp;</div>
        </div>
    </div>
    <a href="javascript:void(0)" id="podbor-hide" onclick="$(this).hide();
            $('.navigation-detailed').slideDown('fast')">Подбор товаров</a>
    <?php if (count($_smarty_tpl->tpl_vars['selected_char_value_id']->value)) {?>
        <div class="clear-selection-block"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;?>
">Сбросить фильтр</a></div>
    <?php }?>
<?php }?>
<?php }} ?>
