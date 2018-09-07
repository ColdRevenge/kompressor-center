<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 14:33:31
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/catalog/templates/podbor_lady.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124124824455d4698b468016-86383242%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd91089fd4aa83f4d8fc63df9ddcdae6542cf1c0f' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/catalog/templates/podbor_lady.tpl',
      1 => 1438164013,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124124824455d4698b468016-86383242',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'get_section' => 0,
    'category_price' => 0,
    'get_chars_podbor' => 0,
    'get_chars' => 0,
    'selection_brands' => 0,
    'ctype' => 0,
    'list_brand_id' => 0,
    'open_category_id' => 0,
    'catalog_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d4698b607b38_79500074',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4698b607b38_79500074')) {function content_55d4698b607b38_79500074($_smarty_tpl) {?>
<div id="podbor">
    <div id="count_podbor_result">&nbsp;</div>
    <form method="post" action="" id="podbor_form_id">
        <div id="mini-indicator">&nbsp;</div>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/jqueryui.js"><?php echo '</script'; ?>
>
        <input type="hidden" name="find-selection" value="1" />
        

            <?php if ($_smarty_tpl->tpl_vars['get_section']->value->is_price==1) {?>
                <div class="podbor-price"> 

                    <strong>Цена:</strong>
                    <div id="slider_ui_block">
                        <div class="ui-slider ui-slider-horizontal ui-widget ui-widget-content" id="slider_ui">
                            <div class="slider-r"></div>
                        </div>
                        <span class="input-center">
                            <div class="label-slide">
                                <label id="maxCostLabel"><?php echo (($tmp = @number_format((($tmp = @$_POST['max_price'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['category_price']->value->max_price : $tmp),0,'',''))===null||$tmp==='' ? 0 : $tmp);?>
 р.</label>
                                <label id="minCostLabel"><?php echo (($tmp = @number_format((($tmp = @$_POST['min_price'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['category_price']->value->min_price : $tmp),0,'',''))===null||$tmp==='' ? 0 : $tmp);?>
 р.</label>
                            </div>

                            <input type="hidden" name="min_price" id="minCost" value="<?php echo (($tmp = @number_format((($tmp = @$_POST['min_price'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['category_price']->value->min_price : $tmp)))===null||$tmp==='' ? 0 : $tmp);?>
"  onfocus="this.className = 'selInput'" onblur = "this.className = ''" style="width: 55px;margin: 0 3px;text-align: center"/>
                            <input type="hidden" name="max_price" id="maxCost" value="<?php echo (($tmp = @number_format((($tmp = @$_POST['max_price'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['category_price']->value->max_price : $tmp),0,'',''))===null||$tmp==='' ? 1000 : $tmp);?>
" onfocus="this.className = 'selInput'" onblur = "this.className = ''" style="width: 55px;margin: 0 3px;text-align: center"/> 

                        </span>
                        
                        <?php echo $_smarty_tpl->getSubTemplate ("_slider_script.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('slider_id'=>"#slider_ui",'min_id'=>"#minCost",'max_id'=>"#maxCost",'min'=>(($tmp = @$_smarty_tpl->tpl_vars['category_price']->value->min_price)===null||$tmp==='' ? 0 : $tmp),'max'=>(($tmp = @$_smarty_tpl->tpl_vars['category_price']->value->max_price)===null||$tmp==='' ? 1000 : $tmp)), 0);?>

                    </div>
                </div>
            <?php }?>

            <?php  $_smarty_tpl->tpl_vars["get_chars"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["get_chars"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['get_chars_podbor']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["get_chars"]->key => $_smarty_tpl->tpl_vars["get_chars"]->value) {
$_smarty_tpl->tpl_vars["get_chars"]->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['get_chars']->value->type=='0') {?>
                    <?php if ($_smarty_tpl->tpl_vars['get_chars']->value->char_id==57) {?> 
                            <?php if ($_smarty_tpl->tpl_vars['get_section']->value->is_brand==1) {?>
                                <div class="podbor-brand-block">
                                    <?php echo $_smarty_tpl->getSubTemplate ("_slider_checkbox_lady.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>$_smarty_tpl->tpl_vars['get_chars']->value->char_id,'name'=>$_smarty_tpl->tpl_vars['get_chars']->value->name,'category_id'=>$_smarty_tpl->tpl_vars['get_chars']->value->category_id,'sort'=>$_smarty_tpl->tpl_vars['get_chars']->value->sort,'is_desc_char'=>1), 0);?>

                                    
                                    <div class="podbor-brand-id">
                                        <span>
                                            <select name="brand_id">
                                                <option value="0">Производитель</option>
                                                <?php  $_smarty_tpl->tpl_vars["ctype"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ctype"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['selection_brands']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ctype"]->key => $_smarty_tpl->tpl_vars["ctype"]->value) {
$_smarty_tpl->tpl_vars["ctype"]->_loop = true;
?>
                                                    <?php $_smarty_tpl->tpl_vars["list_brand_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['ctype']->value->id, null, 0);?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['list_brand_id']->value;?>
" <?php if ($_POST['brand_id']==$_smarty_tpl->tpl_vars['list_brand_id']->value) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['ctype']->value->name;?>
</option>
                                                <?php } ?>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                            <?php }?>
                        <?php } else { ?>
                            <?php echo $_smarty_tpl->getSubTemplate ("_slider_checkbox_lady.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>$_smarty_tpl->tpl_vars['get_chars']->value->char_id,'name'=>$_smarty_tpl->tpl_vars['get_chars']->value->name,'category_id'=>$_smarty_tpl->tpl_vars['get_chars']->value->category_id,'sort'=>$_smarty_tpl->tpl_vars['get_chars']->value->sort,'is_desc_char'=>1), 0);?>

                        <?php }?>

                    <?php } elseif ($_smarty_tpl->tpl_vars['get_chars']->value->type=='1') {?>
                        <?php echo $_smarty_tpl->getSubTemplate ("_slider_select.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>$_smarty_tpl->tpl_vars['get_chars']->value->char_id,'name'=>$_smarty_tpl->tpl_vars['get_chars']->value->name,'category_id'=>$_smarty_tpl->tpl_vars['get_chars']->value->category_id,'sort'=>$_smarty_tpl->tpl_vars['get_chars']->value->sort,'is_desc_char'=>1), 0);?>

                    <?php } elseif ($_smarty_tpl->tpl_vars['get_chars']->value->type=='2') {?>
                        <?php echo $_smarty_tpl->getSubTemplate ("_slider_radio.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>$_smarty_tpl->tpl_vars['get_chars']->value->char_id,'name'=>$_smarty_tpl->tpl_vars['get_chars']->value->name,'category_id'=>$_smarty_tpl->tpl_vars['get_chars']->value->category_id,'sort'=>$_smarty_tpl->tpl_vars['get_chars']->value->sort,'is_desc_char'=>1), 0);?>

                    <?php }?>
                    <?php } ?>
                        





                        <?php if ($_smarty_tpl->tpl_vars['get_section']->value->is_param_1==1) {?>
                            <span>        
                                <input type="checkbox" name="is_param_1" value="1" <?php if ($_POST['is_param_1']==1) {?>checked="checked"<?php }?> id="checkbox_is_param_1"><label for="checkbox_is_param_1">Распродажа</label>
                            </span>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['get_section']->value->is_param_2==1) {?>
                            <span>        
                                <input type="checkbox" name="is_param_2" value="1" <?php if ($_POST['is_param_2']==1) {?>checked="checked"<?php }?> id="checkbox_is_param_2"><label for="checkbox_is_param_2">Новинки</label>
                            </span>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['get_section']->value->is_param_3==1) {?>
                            <span>        
                                <input type="checkbox" name="is_param_3" value="1" <?php if ($_POST['is_param_3']==1) {?>checked="checked"<?php }?> id="checkbox_is_param_3"><label for="checkbox_is_param_3">Распродажа</label>
                            </span>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['get_section']->value->is_param_4==1) {?>
                            <span>        
                                <input type="checkbox" name="is_param_4" value="1" <?php if ($_POST['is_param_4']==1) {?>checked="checked"<?php }?> id="checkbox_is_param_4"><label for="checkbox_is_param_4">Распродажа</label>
                            </span>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['get_section']->value->is_param_5==1) {?>
                            <span>        
                                <input type="checkbox" name="is_param_5" value="1" <?php if ($_POST['is_param_5']==1) {?>checked="checked"<?php }?> id="checkbox_is_param_5"><label for="checkbox_is_param_5">Распродажа</label>
                            </span>
                        <?php }?>

                        <input type="hidden" name="category_id" value="<?php echo $_smarty_tpl->tpl_vars['open_category_id']->value;?>
" />
                        <button onclick="$('#podbor_top_form_id').trigger('reset');
                                AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/', '#indicator_catalog', null, null, 'podbor_form_id');
                                return false;"></button>
                    </form>

                    <div class="clear"></div>
                </div>
                <?php echo '<script'; ?>
 type="text/javascript">
                    $('#count_podbor_result').attr('onclick', $('#podbor button').attr('onclick'));
                    $('#count_podbor_result').css({
                        'top': $('#podbor').offset().top
                    });
                    $('#podbor input, #podbor select').change(function () {
                        /* Ползунок как на яндексе с кнопкой показать: */
                    
                        $('#podbor button').click();
                    });
                    $('#podbor a.ui-slider-handle').mouseup(function () {
                        $('#podbor input[type="text"]').eq(0).change();
                    });
                <?php echo '</script'; ?>
><?php }} ?>
