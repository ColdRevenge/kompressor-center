<?php /* Smarty version 3.1.24, created on 2016-01-19 12:22:23
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/category/templates/admin_related_tree.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:341792844569e004f1ac644_34392558%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '945a4f19eb07354c71c47bd3a5a3e84a614478b6' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/category/templates/admin_related_tree.tpl',
      1 => 1450788658,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '341792844569e004f1ac644_34392558',
  'variables' => 
  array (
    'id' => 0,
    'tree' => 0,
    'subtree' => 0,
    'category_id' => 0,
    'admin_url' => 0,
    'type' => 0,
    'product_id' => 0,
    'level' => 0,
    'offset' => 0,
    'parents_category_arr' => 0,
    'key' => 0,
    'inc' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_569e004f70de02_88137291',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_569e004f70de02_88137291')) {
function content_569e004f70de02_88137291 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '341792844569e004f1ac644_34392558';
?>

<?php if ($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][0] != '') {?>
    <?php
$_from = $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["subtree"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["subtree"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["subtree"]->value) {
$_smarty_tpl->tpl_vars["subtree"]->_loop = true;
$foreach_subtree_Sav = $_smarty_tpl->tpl_vars["subtree"];
?>
        <?php if ($_smarty_tpl->tpl_vars['subtree']->value->id) {?>
            <tbody class="<?php if ($_smarty_tpl->tpl_vars['category_id']->value == $_smarty_tpl->tpl_vars['subtree']->value->id) {?>tbody_hover <?php }?>tbody" >
                <tr>
                    <td align="left" valign="middle" style="cursor: pointer;" title="Открыть"  onclick="AjaxRequest('product_list', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
related/add/product/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
/');$('.menu-list .tbody').find('a').css('font-weight', 'normal');$(this).find('a').css('font-weight', 'bold');
                                return false;">
                        <div style="margin-left:<?php echo $_smarty_tpl->tpl_vars['level']->value*$_smarty_tpl->tpl_vars['offset']->value;?>
px;"><a href="javascript:void(0)" onclick="AjaxRequest('product_list', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
related/add/product/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
/');
                                $(this).css('font-weight', 'bold');return false;" style="<?php if ($_smarty_tpl->tpl_vars['category_id']->value == $_smarty_tpl->tpl_vars['subtree']->value->id) {?>font-weight:bold;<?php }
if ($_smarty_tpl->tpl_vars['subtree']->value->is_visible == 0) {?>color:gray;<?php }?>"><?php echo stripslashes($_smarty_tpl->tpl_vars['subtree']->value->name);?>
</a> (<?php echo $_smarty_tpl->tpl_vars['subtree']->value->count;?>
)</div>
                    </td>

            </tbody>
        <?php }?>        
        <?php echo $_smarty_tpl->getSubTemplate ("admin_related_tree.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('parents_category_arr'=>$_smarty_tpl->tpl_vars['parents_category_arr']->value,'id'=>$_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id,'tree'=>$_smarty_tpl->tpl_vars['tree']->value,'inc'=>$_smarty_tpl->tpl_vars['inc']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1,'offset'=>$_smarty_tpl->tpl_vars['offset']->value), 0);
?>


    <?php
$_smarty_tpl->tpl_vars["subtree"] = $foreach_subtree_Sav;
}
?>
<?php }
}
}
?>