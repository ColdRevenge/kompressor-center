<?php /* Smarty version 3.1.24, created on 2015-09-13 17:05:54
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/brand/templates/brand_site.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:40422363055f582c2950019_58265154%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa8a318b3d02b398f71ca1d88926fda8db0dae32' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/brand/templates/brand_site.tpl',
      1 => 1423307963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40422363055f582c2950019_58265154',
  'variables' => 
  array (
    'brands' => 0,
    'url' => 0,
    'brand' => 0,
    'icons_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f582c29a8fb1_62335222',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f582c29a8fb1_62335222')) {
function content_55f582c29a8fb1_62335222 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '40422363055f582c2950019_58265154';
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