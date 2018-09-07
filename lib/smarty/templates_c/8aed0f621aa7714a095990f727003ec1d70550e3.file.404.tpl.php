<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 14:33:53
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/templates/404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:209217174955d469a17886e1-33558596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8aed0f621aa7714a095990f727003ec1d70550e3' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/templates/404.tpl',
      1 => 1434206233,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209217174955d469a17886e1-33558596',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_mobile' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d469a17cc8f9_13874127',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d469a17cc8f9_13874127')) {function content_55d469a17cc8f9_13874127($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['is_mobile']->value==1) {?>
    <?php $_smarty_tpl->tpl_vars["is_main"] = new Smarty_variable("0", null, 0);?>
    <?php $_smarty_tpl->tpl_vars["content"] = new Smarty_variable('    <div class="wrapper text-page" style="width: 100%;margin-bottom: 20px;margin: auto;">
        <br/><br/><br/><br/><br/><br/><br/>
        <h3 style="text-align: center;">Запрашеваемая страница не найдена :(((&nbsp;</h3>
        <h3 style="text-align: center;">Вы можете ознакомиться с другими товарами на <a href="/" style="color: #f94208; text-decoration: underline">нашем сайте</a>.</h3>
        <br/><br/><br/><br/><br/><br/><br/>
    </div>', null, 0);?>
    <?php echo $_smarty_tpl->getSubTemplate ("mobile.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php } else { ?>
    <?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <div class="wrapper text-page" style="width: 900px;margin-bottom: 20px;margin: auto;">
        <br/><br/><br/><br/><br/><br/><br/>
        <h3 style="text-align: center;">Запрашеваемая страница не найдена :(((&nbsp;</h3>
        <h3 style="text-align: center;">Вы можете ознакомиться с другими товарами на <a href="/" style="color: #f94208; text-decoration: underline">нашем сайте</a>.</h3>
        <br/><br/><br/><br/><br/><br/><br/>
    </div>

    <?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?><?php }} ?>
