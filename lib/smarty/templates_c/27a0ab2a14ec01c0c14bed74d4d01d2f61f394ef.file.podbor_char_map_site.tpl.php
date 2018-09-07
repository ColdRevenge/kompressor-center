<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 19:07:34
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/catalog/templates/podbor_char_map_site.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25838742455d4a9c67956b1-15454433%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27a0ab2a14ec01c0c14bed74d4d01d2f61f394ef' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/catalog/templates/podbor_char_map_site.tpl',
      1 => 1433347972,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25838742455d4a9c67956b1-15454433',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'open_category_id' => 0,
    'shop' => 0,
    'chars_menu' => 0,
    'url' => 0,
    'category_adress' => 0,
    'selected_char_value_id' => 0,
    'char_menu' => 0,
    'char_valur_id' => 0,
    'desc_checker' => 0,
    'char_pseudo_dir' => 0,
    'user_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d4a9c6966484_52306338',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4a9c6966484_52306338')) {function content_55d4a9c6966484_52306338($_smarty_tpl) {?><?php $_smarty_tpl->assign("category_adress",$_smarty_tpl->smarty->registered_objects['this'][0]->getCategoryAdress(array('category_id'=>$_smarty_tpl->tpl_vars['open_category_id']->value),$_smarty_tpl));?>

<?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady') {?>
    <?php $_smarty_tpl->assign("chars_menu",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>55,'sort'=>'1'),$_smarty_tpl));?>

    <?php $_smarty_tpl->assign("char_pseudo_dir",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharacteristicPseudoDir(array('char_id'=>55),$_smarty_tpl));?>

    <?php if (count($_smarty_tpl->tpl_vars['chars_menu']->value)) {?>
        <div class="map-site">
            <div>
                <div><strong>Цвет:</strong></div>
                <div class="char-color">
                    <ul>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;?>
"<?php if (!(count($_smarty_tpl->tpl_vars['selected_char_value_id']->value))) {?> class="active"<?php }?>>Все цвета</a></li>
                            <?php  $_smarty_tpl->tpl_vars["char_menu"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["char_menu"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chars_menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["char_menu"]->key => $_smarty_tpl->tpl_vars["char_menu"]->value) {
$_smarty_tpl->tpl_vars["char_menu"]->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars["char_valur_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['char_menu']->value->id, null, 0);?>
                                
                                <?php $_smarty_tpl->assign("desc_checker",$_smarty_tpl->smarty->registered_objects['this'][0]->getCheckerCharDesc(array('category_id'=>$_smarty_tpl->tpl_vars['open_category_id']->value,'char_value_id'=>$_smarty_tpl->tpl_vars['char_valur_id']->value,'char_value_2_id'=>0,'char_value_3_id'=>0,'char_value_4_id'=>0),$_smarty_tpl));?>

                                <?php if ($_smarty_tpl->tpl_vars['desc_checker']->value->desc!='') {?>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;?>
char/<?php echo $_smarty_tpl->tpl_vars['char_pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['char_menu']->value->pseudo_dir;?>
/"<?php if ($_smarty_tpl->tpl_vars['selected_char_value_id']->value[$_smarty_tpl->tpl_vars['char_valur_id']->value]==1) {?> class="active"<?php }
if (!$_smarty_tpl->tpl_vars['char_menu']->value->pseudo_dir||!$_smarty_tpl->tpl_vars['char_pseudo_dir']->value) {?> style="color: red"<?php }
if ($_smarty_tpl->tpl_vars['desc_checker']->value->title==''&&$_smarty_tpl->tpl_vars['user_id']->value==446) {?>style="color:blue;"<?php } elseif ($_smarty_tpl->tpl_vars['desc_checker']->value->desc==''&&$_smarty_tpl->tpl_vars['user_id']->value==446) {?>style="color:#f6a828;"<?php }?>><?php if ($_smarty_tpl->tpl_vars['char_menu']->value->icon) {?><span style="background-image: url(/images/icons/<?php echo $_smarty_tpl->tpl_vars['char_menu']->value->icon;?>
)">&nbsp;</span><?php }
echo stripslashes($_smarty_tpl->tpl_vars['char_menu']->value->name);?>
</a></li>
                                <?php }?>
                            <?php } ?></ul>
                    <div class="clear">&nbsp;</div>
                </div>
            </div>
            <div>
                <div><strong>Размер:</strong></div>
                <div class="char-color">
                    <?php $_smarty_tpl->assign("chars_menu",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>51,'sort'=>'1'),$_smarty_tpl));?>

                    <?php $_smarty_tpl->assign("char_pseudo_dir",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharacteristicPseudoDir(array('char_id'=>51),$_smarty_tpl));?>


                    <ul>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;?>
"<?php if (!(count($_smarty_tpl->tpl_vars['selected_char_value_id']->value))) {?> class="active"<?php }?>>Все размеры</a></li>

                        <?php  $_smarty_tpl->tpl_vars["char_menu"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["char_menu"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chars_menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["char_menu"]->key => $_smarty_tpl->tpl_vars["char_menu"]->value) {
$_smarty_tpl->tpl_vars["char_menu"]->_loop = true;
?>
                            <?php $_smarty_tpl->tpl_vars["char_valur_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['char_menu']->value->id, null, 0);?>

                            <?php $_smarty_tpl->assign("desc_checker",$_smarty_tpl->smarty->registered_objects['this'][0]->getCheckerCharDesc(array('category_id'=>$_smarty_tpl->tpl_vars['open_category_id']->value,'char_value_id'=>$_smarty_tpl->tpl_vars['char_valur_id']->value,'char_value_2_id'=>0,'char_value_3_id'=>0,'char_value_4_id'=>0),$_smarty_tpl));?>

                            <?php if ($_smarty_tpl->tpl_vars['desc_checker']->value->desc!='') {?>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;?>
char/<?php echo $_smarty_tpl->tpl_vars['char_pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['char_menu']->value->pseudo_dir;?>
/"<?php if ($_smarty_tpl->tpl_vars['selected_char_value_id']->value[$_smarty_tpl->tpl_vars['char_valur_id']->value]==1) {?> class="active"<?php }
if (!$_smarty_tpl->tpl_vars['char_menu']->value->pseudo_dir||!$_smarty_tpl->tpl_vars['char_pseudo_dir']->value) {?> style="color: red"<?php }
if ($_smarty_tpl->tpl_vars['desc_checker']->value->title==''&&$_smarty_tpl->tpl_vars['user_id']->value==446) {?>style="color:blue;"<?php } elseif ($_smarty_tpl->tpl_vars['desc_checker']->value->desc==''&&$_smarty_tpl->tpl_vars['user_id']->value==446) {?>style="color: #f6a828;"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['char_menu']->value->name);?>
</a></li>
                                <?php }?>
                            <?php } ?></ul>
                    <div class="clear">&nbsp;</div>
                </div>
            </div>
        </div>
    <?php }?>





<?php } else { ?>



    <?php $_smarty_tpl->assign("chars_menu",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>2,'sort'=>'1'),$_smarty_tpl));?>

    <?php $_smarty_tpl->assign("char_pseudo_dir",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharacteristicPseudoDir(array('char_id'=>2),$_smarty_tpl));?>

    <?php if (count($_smarty_tpl->tpl_vars['chars_menu']->value)) {?>
        <div class="map-site">
            <div>
                <div><strong>Цвет:</strong></div>
                <div class="char-color">
                    <ul>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;?>
"<?php if (!(count($_smarty_tpl->tpl_vars['selected_char_value_id']->value))) {?> class="active"<?php }?>>Все цвета</a></li>
                            <?php  $_smarty_tpl->tpl_vars["char_menu"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["char_menu"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chars_menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["char_menu"]->key => $_smarty_tpl->tpl_vars["char_menu"]->value) {
$_smarty_tpl->tpl_vars["char_menu"]->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars["char_valur_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['char_menu']->value->id, null, 0);?>
                                
                                <?php $_smarty_tpl->assign("desc_checker",$_smarty_tpl->smarty->registered_objects['this'][0]->getCheckerCharDesc(array('category_id'=>$_smarty_tpl->tpl_vars['open_category_id']->value,'char_value_id'=>$_smarty_tpl->tpl_vars['char_valur_id']->value,'char_value_2_id'=>0,'char_value_3_id'=>0,'char_value_4_id'=>0),$_smarty_tpl));?>

                                <?php if ($_smarty_tpl->tpl_vars['desc_checker']->value->desc!='') {?>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;?>
char/<?php echo $_smarty_tpl->tpl_vars['char_pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['char_menu']->value->pseudo_dir;?>
/"<?php if ($_smarty_tpl->tpl_vars['selected_char_value_id']->value[$_smarty_tpl->tpl_vars['char_valur_id']->value]==1) {?> class="active"<?php }
if (!$_smarty_tpl->tpl_vars['char_menu']->value->pseudo_dir||!$_smarty_tpl->tpl_vars['char_pseudo_dir']->value) {?> style="color: red"<?php }
if ($_smarty_tpl->tpl_vars['desc_checker']->value->title==''&&$_smarty_tpl->tpl_vars['user_id']->value==446) {?>style="color:blue;"<?php } elseif ($_smarty_tpl->tpl_vars['desc_checker']->value->desc==''&&$_smarty_tpl->tpl_vars['user_id']->value==446) {?>style="color:#f6a828;"<?php }?>><?php if ($_smarty_tpl->tpl_vars['char_menu']->value->icon) {?><span style="background-image: url(/images/icons/<?php echo $_smarty_tpl->tpl_vars['char_menu']->value->icon;?>
)">&nbsp;</span><?php }
echo stripslashes($_smarty_tpl->tpl_vars['char_menu']->value->name);?>
</a></li>
                                <?php }?>
                            <?php } ?></ul>
                    <div class="clear">&nbsp;</div>
                </div>
            </div>
            <div>
                <div><strong>Камень:</strong></div>
                <div class="char-color">
                    <?php $_smarty_tpl->assign("chars_menu",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>5,'sort'=>'1'),$_smarty_tpl));?>

                    <?php $_smarty_tpl->assign("char_pseudo_dir",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharacteristicPseudoDir(array('char_id'=>5),$_smarty_tpl));?>


                    <ul>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;?>
"<?php if (!(count($_smarty_tpl->tpl_vars['selected_char_value_id']->value))) {?> class="active"<?php }?>>Все камни</a></li>

                        <?php  $_smarty_tpl->tpl_vars["char_menu"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["char_menu"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chars_menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["char_menu"]->key => $_smarty_tpl->tpl_vars["char_menu"]->value) {
$_smarty_tpl->tpl_vars["char_menu"]->_loop = true;
?>
                            <?php $_smarty_tpl->tpl_vars["char_valur_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['char_menu']->value->id, null, 0);?>

                            <?php $_smarty_tpl->assign("desc_checker",$_smarty_tpl->smarty->registered_objects['this'][0]->getCheckerCharDesc(array('category_id'=>$_smarty_tpl->tpl_vars['open_category_id']->value,'char_value_id'=>$_smarty_tpl->tpl_vars['char_valur_id']->value,'char_value_2_id'=>0,'char_value_3_id'=>0,'char_value_4_id'=>0),$_smarty_tpl));?>

                            <?php if ($_smarty_tpl->tpl_vars['desc_checker']->value->desc!='') {?>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['category_adress']->value;?>
char/<?php echo $_smarty_tpl->tpl_vars['char_pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['char_menu']->value->pseudo_dir;?>
/"<?php if ($_smarty_tpl->tpl_vars['selected_char_value_id']->value[$_smarty_tpl->tpl_vars['char_valur_id']->value]==1) {?> class="active"<?php }
if (!$_smarty_tpl->tpl_vars['char_menu']->value->pseudo_dir||!$_smarty_tpl->tpl_vars['char_pseudo_dir']->value) {?> style="color: red"<?php }
if ($_smarty_tpl->tpl_vars['desc_checker']->value->title==''&&$_smarty_tpl->tpl_vars['user_id']->value==446) {?>style="color:blue;"<?php } elseif ($_smarty_tpl->tpl_vars['desc_checker']->value->desc==''&&$_smarty_tpl->tpl_vars['user_id']->value==446) {?>style="color: #f6a828;"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['char_menu']->value->name);?>
</a></li>
                                <?php }?>
                            <?php } ?></ul>
                    <div class="clear">&nbsp;</div>
                </div>
            </div>
        </div>
    <?php }?>
<?php }?><?php }} ?>
