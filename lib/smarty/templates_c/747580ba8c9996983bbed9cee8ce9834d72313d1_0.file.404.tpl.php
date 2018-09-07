<?php /* Smarty version 3.1.24, created on 2015-11-02 11:51:38
         compiled from "/home/c10045/public_html/kompressor-center.com/templates/404.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3170542515637241a336347_73641211%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '747580ba8c9996983bbed9cee8ce9834d72313d1' => 
    array (
      0 => '/home/c10045/public_html/kompressor-center.com/templates/404.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3170542515637241a336347_73641211',
  'variables' => 
  array (
    'is_mobile' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5637241a614304_46437154',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5637241a614304_46437154')) {
function content_5637241a614304_46437154 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3170542515637241a336347_73641211';
if ($_smarty_tpl->tpl_vars['is_mobile']->value == 1) {?>
    <?php $_smarty_tpl->tpl_vars["is_main"] = new Smarty_Variable("0", null, 0);?>
    <?php $_smarty_tpl->tpl_vars["content"] = new Smarty_Variable('    <div class="wrapper text-page" style="width: 100%;margin-bottom: 20px;margin: auto;">
        <br/><br/><br/><br/><br/><br/><br/>
        <h3 style="text-align: center;">Запрашеваемая страница не найдена :(((&nbsp;</h3>
        <h3 style="text-align: center;">Вы можете ознакомиться с другими товарами на <a href="/" style="color: #f94208; text-decoration: underline">нашем сайте</a>.</h3>
        <br/><br/><br/><br/><br/><br/><br/>
    </div>', null, 0);?>
    <?php echo $_smarty_tpl->getSubTemplate ("mobile.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php } else { ?>
    <?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


    <div class="wrapper text-page" style="width: 900px;margin-bottom: 20px;margin: auto;">
        <br/><br/><br/><br/><br/><br/><br/>
        <h3 style="text-align: center;">Запрашеваемая страница не найдена :(((&nbsp;</h3>
        <h3 style="text-align: center;">Вы можете ознакомиться с другими товарами на <a href="/" style="color: #f94208; text-decoration: underline">нашем сайте</a>.</h3>
        <br/><br/><br/><br/><br/><br/><br/>
    </div>

    <?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php }
}
}
?>