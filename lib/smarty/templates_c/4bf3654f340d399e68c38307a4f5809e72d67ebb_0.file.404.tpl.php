<?php /* Smarty version 3.1.24, created on 2015-09-13 16:53:46
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/templates/404.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:64559980255f57feaa96e18_31608391%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4bf3654f340d399e68c38307a4f5809e72d67ebb' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/templates/404.tpl',
      1 => 1434206233,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64559980255f57feaa96e18_31608391',
  'variables' => 
  array (
    'is_mobile' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f57feaad5d50_35193822',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f57feaad5d50_35193822')) {
function content_55f57feaad5d50_35193822 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '64559980255f57feaa96e18_31608391';
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