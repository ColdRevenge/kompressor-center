<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 14:33:32
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/brand/templates/brand_site.tpl" */ ?>
<?php /*%%SmartyHeaderCode:103474094655d4698c1f8c42-29036239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c6d514b8a605c2bdf341379c9f94312526a051d' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/brand/templates/brand_site.tpl',
      1 => 1423307963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103474094655d4698c1f8c42-29036239',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'brands' => 0,
    'url' => 0,
    'brand' => 0,
    'icons_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d4698c231140_34309759',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4698c231140_34309759')) {function content_55d4698c231140_34309759($_smarty_tpl) {?>
<table id="brands_list_table" class="catalogfirst" border="0" cellspacing="0" cellpadding="5" width="800">
    <tbody>
    <?php  $_smarty_tpl->tpl_vars["brand"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["brand"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brands']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["brand"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["brand"]->key => $_smarty_tpl->tpl_vars["brand"]->value) {
$_smarty_tpl->tpl_vars["brand"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["brand"]['iteration']++;
?>
        <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['brand']['iteration']%3==1) {?><tr><?php }?>
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
        <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['brand']['iteration']%3==0) {?></tr><?php }?>
    <?php } ?>
    </tbody>
</table><?php }} ?>
