<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-22 13:13:38
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/page/templates/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:62690487055d84b52f1e651-59340935%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d9cffcf3d7779e8c6ee5b2cdf73fba18e110c26' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/page/templates/add.tpl',
      1 => 1439749136,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62690487055d84b52f1e651-59340935',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'visual_editor' => 0,
    'user_id' => 0,
    'admin_url' => 0,
    'category_id' => 0,
    'auto_header' => 0,
    'page_id' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'catalog_header' => 0,
    'MyURL' => 0,
    'url' => 0,
    'param_tpl' => 0,
    'catalog_pseudo_dir' => 0,
    'upload_photo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d84b530b39b2_97392377',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d84b530b39b2_97392377')) {function content_55d84b530b39b2_97392377($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['visual_editor']->value;?>
"><?php echo '</script'; ?>
>
 type="text/javascript">
>

page/list/1/">Страницы</a>  &raquo; <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
page/list/0/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/">Список страниц раздела &laquo;<?php echo $_smarty_tpl->tpl_vars['auto_header']->value;?>
&raquo;</a>  &raquo; <span><?php if ($_smarty_tpl->tpl_vars['page_id']->value) {?>Редактировать<?php } else { ?>Добавить<?php }?> страницу <?php if ($_POST['header']) {?>&laquo;<?php echo stripslashes($_POST['header']);?>
&raquo;<?php } else { ?>&laquo;<?php echo $_smarty_tpl->tpl_vars['auto_header']->value;?>
&raquo;<?php }?></span>

" <?php } else { ?>value="<?php if ($_POST['header']) {
echo stripslashes($_POST['header']);
} else {
echo $_smarty_tpl->tpl_vars['auto_header']->value;
}?>"<?php }?> style="width: 475px;" <?php if (!$_smarty_tpl->tpl_vars['page_id']->value&&$_POST['pseudo_dir']!='main'&&2==1) {?>onchange="AjaxRequest('pseudo_dir', '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
ajax/auto_pseudo_dir/?not_html=1&name=' + this.value.replace('&', '').replace('&', ''), true);
page/is_pseudo_dir/' + document.getElementById('pseudo_dir').value + '/')" onkeyup="AjaxRequest('pseudo_dir', '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
ajax/auto_pseudo_dir/?not_html=1&name=' + this.value.replace('&', '').replace('&', ''), true);
page/is_pseudo_dir/' + document.getElementById('pseudo_dir').value + '/')"<?php }?> /><?php if ($_POST['pseudo_dir']!='main') {?><button onclick="AjaxRequest('pseudo_dir', '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
ajax/auto_pseudo_dir/?not_html=1&name=' + document.getElementById('page_header').value.replace('&', '').replace('&', ''), true);
echo stripslashes($_POST['title']);
}?>" style="width: 525px;"/>
" style="width: 525px;"/>
" style="width: 525px;"/>
" style="width: 525px;"/>
echo $_smarty_tpl->smarty->registered_objects['page_obj'][0]->getFullAdressPageTemplate(array('category_id'=>$_smarty_tpl->tpl_vars['param_tpl']->value['category_id'],'type'=>-1),$_smarty_tpl);?>
<input type="text" name="pseudo_dir" id="pseudo_dir" <?php if ($_POST['pseudo_dir']=='main') {?>readonly="readonly" value="main"<?php } else {
if ($_smarty_tpl->tpl_vars['catalog_pseudo_dir']->value) {?> title="Поле заполняется в разделе продукты (левое меню)" readonly="readonly" value="<?php echo $_smarty_tpl->tpl_vars['catalog_pseudo_dir']->value;?>
" <?php } else { ?>value="<?php echo $_POST['pseudo_dir'];?>
"<?php }?>  onkeyup="AjaxRequest('is_dir', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
page/is_pseudo_dir/' + this.value + '/')"<?php }?>  style="width: 200px;vertical-align: middle"/>/<span id='is_dir' style="display: inline-block"></span>
" /><?php }?>
</textarea>
" /><?php }?>
</textarea>

 type="text/javascript">
>