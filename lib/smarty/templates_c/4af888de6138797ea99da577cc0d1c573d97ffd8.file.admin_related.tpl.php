<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 11:49:53
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/related/templates/admin_related.tpl" */ ?>
<?php /*%%SmartyHeaderCode:144076016555d594b1036f41-48955539%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4af888de6138797ea99da577cc0d1c573d97ffd8' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/related/templates/admin_related.tpl',
      1 => 1423307973,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144076016555d594b1036f41-48955539',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'catalog' => 0,
    'admin_url' => 0,
    'type' => 0,
    'category_id' => 0,
    'product_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d594b104d685_84395525',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d594b104d685_84395525')) {function content_55d594b104d685_84395525($_smarty_tpl) {?><div class="block-page">
    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

    <div  class="menu-list" style="float: left;">
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 300px;font-size: 12px;">
            <?php echo $_smarty_tpl->tpl_vars['catalog']->value;?>

        </table>
    </div>

    <div class="page" id="product_list" style="width: 830px;margin-left: 10px;float: left">

    </div>
    <?php echo '<script'; ?>
 type="text/javascript">
            AjaxRequest('product_list', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
related/add/product/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
/');
    <?php echo '</script'; ?>
>
</div><?php }} ?>
