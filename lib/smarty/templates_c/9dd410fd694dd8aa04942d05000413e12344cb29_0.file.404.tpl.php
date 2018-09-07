<?php /* Smarty version 3.1.24, created on 2017-01-28 16:38:49
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/templates/404.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1285720188588c9ee9e3a1b7_71707770%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9dd410fd694dd8aa04942d05000413e12344cb29' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/templates/404.tpl',
      1 => 1485559687,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1285720188588c9ee9e3a1b7_71707770',
  'variables' => 
  array (
    'is_mobile' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_588c9eea3649b9_89280203',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588c9eea3649b9_89280203')) {
function content_588c9eea3649b9_89280203 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1285720188588c9ee9e3a1b7_71707770';
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