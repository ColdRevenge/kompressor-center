<?php /* Smarty version 3.1.24, created on 2015-10-27 13:15:48
         compiled from "/home/c10045/public_html/kompressor-center.com/modules/brand/templates/brand_site.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:962539750562f4ed48de235_69726823%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4be5b06fce2a4c9620ba8c364ace5bf807224cd0' => 
    array (
      0 => '/home/c10045/public_html/kompressor-center.com/modules/brand/templates/brand_site.tpl',
      1 => 1442305254,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '962539750562f4ed48de235_69726823',
  'variables' => 
  array (
    'brands' => 0,
    'url' => 0,
    'brand' => 0,
    'icons_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_562f4ed48fe823_56320004',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_562f4ed48fe823_56320004')) {
function content_562f4ed48fe823_56320004 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '962539750562f4ed48de235_69726823';
?>

<table id="brands_list_table" class="catalogfirst" border="0" cellspacing="0" cellpadding="5" width="800">
    <tbody>
    <?php
$_from = $_smarty_tpl->tpl_vars['brands']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["brand"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["brand"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_brand'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["brand"]->value) {
$_smarty_tpl->tpl_vars["brand"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_brand']->value['iteration']++;
$foreach_brand_Sav = $_smarty_tpl->tpl_vars["brand"];
?>
        <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_brand']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_brand']->value['iteration'] : null)%3 == 1) {?><tr><?php }?>
            <td width="33%">
                <table border="0" cellspacing="0" cellpadding="5" width="100%">
                    <tbody>
                        <tr>
                            <td width="90"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
catalog/brand/<?php echo $_smarty_tpl->tpl_vars['brand']->value->pseudo_dir;?>
/"><img title="Аккумуляторы American" src="<?php echo $_smarty_tpl->tpl_vars['icons_url']->value;
echo $_smarty_tpl->tpl_vars['brand']->value->icon;?>
" border="0" alt="Аккумуляторы American" /></a></td>
                            <td>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
catalog/brand/<?php echo $_smarty_tpl->tpl_vars['brand']->value->pseudo_dir;?>
/"><strong><?php echo $_smarty_tpl->tpl_vars['brand']->value->name;?>
</strong></a></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_brand']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_brand']->value['iteration'] : null)%3 == 0) {?></tr><?php }?>
    <?php
$_smarty_tpl->tpl_vars["brand"] = $foreach_brand_Sav;
}
?>
    </tbody>
</table><?php }
}
?>