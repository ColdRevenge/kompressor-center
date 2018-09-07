<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 14:32:22
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/admin/templates/admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:173174792155d4694640c584-66058379%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1ebdd6191ae81f2df42bb01351b01a6ebbe6e4b' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/admin/templates/admin.tpl',
      1 => 1428852399,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173174792155d4694640c584-66058379',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_ajax' => 0,
    'url' => 0,
    'lib_url' => 0,
    'shop_url' => 0,
    'content' => 0,
    'is_auth' => 0,
    'shop_name' => 0,
    'get_user' => 0,
    'menu' => 0,
    'order' => 0,
    'item' => 0,
    'item_2' => 0,
    'key_2' => 0,
    'access_item' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d46946511c77_91225610',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d46946511c77_91225610')) {function content_55d46946511c77_91225610($_smarty_tpl) {?><?php if ($_GET['not_html']!=1&&$_smarty_tpl->tpl_vars['is_ajax']->value!=1) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <title>Система управления сайтом lfw Shop 0.0.4.5</title>
            <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
favicon.ico" />
            <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
admin_style.css" />
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="robots" content="noindex,nofollow" />
            <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/jquery-1.7.2.min.js"><?php echo '</script'; ?>
>


            
            <?php echo '<script'; ?>
 type="text/javascript" src="/lib/rinit.js"><?php echo '</script'; ?>
>
            <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/prettyPopinAdmin.css" type="text/css" media="screen" charset="utf-8" />

            

            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/jquery.validate.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/srcollTo.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
lib/jquery.autocomplete.js"><?php echo '</script'; ?>
>
            <!--Замена PrettyPopin-->
            <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/fancybox/jquery.fancybox.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/fancybox/jquery.mousewheel-3.0.6.pack.js"><?php echo '</script'; ?>
>
            <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
            <link href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/uploader/fileuploader.css" rel="stylesheet" type="text/css" />	
            <?php echo '<script'; ?>
 type='text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['lib_url']->value;?>
top_admin.js'><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 type="text/javascript">
                var base_url = '<?php echo $_smarty_tpl->tpl_vars['shop_url']->value;?>
';
            <?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 type="text/javascript">
                $(document).ready(function () {
                    $("a[rel^='related']").fancybox({
                        width: 1180,
                        height: 680,
                        modal: true,
                        type: 'iframe',
                        cyclic: false,
                        fitToView: false,
                        autoSize: false,
                        closeClick: true,
                        openEffect: 'none',
                        closeEffect: 'none',
                        hideOnOverlayClick: true,
                        hideOnContentClick: true,
                        enableEscapeButton: true,
                        showCloseButton: true
                    });
                });
                $(document).ready(function () {
                    $("a[rel^='add_banners_menu']").fancybox({
                        width: 850,
                        height: 580,
                        modal: true,
                        type: 'iframe',
                        cyclic: false,
                        fitToView: false,
                        autoSize: false,
                        closeClick: true,
                        openEffect: 'none',
                        closeEffect: 'none',
                        hideOnOverlayClick: true,
                        hideOnContentClick: true,
                        enableEscapeButton: true,
                        showCloseButton: true
                    });
                });
            <?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 type="text/javascript">
                $(document).ready(function () {
                    $("a[rel^='fancy']").fancybox({
                        width: 817,
                        height: 600,
                        modal: true,
                        type: 'iframe',
                        cyclic: false,
                        fitToView: false,
                        autoSize: false,
                        closeClick: true,
                        openEffect: 'none',
                        closeEffect: 'none',
                        hideOnOverlayClick: true,
                        hideOnContentClick: true,
                        enableEscapeButton: true,
                        showCloseButton: true
                    });
                });
            <?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 type="text/javascript">
                $(document).ready(function () {
                    $(".fancy").fancybox({
                        maxWidth: 800,
                        maxHeight: 1600,
                        modal: false,
                        type: 'iframe',
                        cyclic: false,
                        fitToView: false,
                        autoSize: true,
                        closeClick: true,
                        openEffect: 'none',
                        closeEffect: 'none',
                        hideOnOverlayClick: true,
                        hideOnContentClick: true,
                        enableEscapeButton: true,
                        showCloseButton: true
                    });
                });
            <?php echo '</script'; ?>
>
            
            <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['lib_url']->value;?>
admin.js"><?php echo '</script'; ?>
>
            
            <?php if ($_GET['not_menu']==1) {?>
                <style  type="text/css">
                    body {
                        background: none;
                    }
                </style>
            <?php }?>
        </head>


        <?php if ($_GET['is_modal']==1) {?>
            <body style="width: auto; min-width: 0; background: none;">
                <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

            </body>
        <?php } else { ?>
            <body<?php if ($_GET['not_menu']==1) {?> style='min-width:0px;'<?php } else {
if ($_smarty_tpl->tpl_vars['is_auth']->value<1) {?>style="background-color: #111111;"<?php }?> <?php if ($_smarty_tpl->tpl_vars['is_auth']->value==0) {?>id="auth_bg"<?php }
}?>>
                <?php if ($_smarty_tpl->tpl_vars['is_ajax']->value!=1&&$_smarty_tpl->tpl_vars['is_auth']->value>=1&&$_GET['not_menu']!=1) {?>

                    <div id="header">
                        <div id="logo">
                            <div class="logo"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" target="_blank" title="Перейти на сайт"><?php echo $_smarty_tpl->tpl_vars['shop_name']->value;?>
</a></div>
                            <div class="rigth-block">
                                Здравствуйте, <b><?php echo (($tmp = @$_smarty_tpl->tpl_vars['get_user']->value->name)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->login : $tmp);?>
</b>
                                <br/><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
auth/exit/">Выход</a>&nbsp;
                            </div>
                        </div>
                        <div class="clear">&nbsp;</div>

                        <div id="menu">
                            <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_smarty_tpl->tpl_vars["order"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
 $_smarty_tpl->tpl_vars["order"]->value = $_smarty_tpl->tpl_vars["item"]->key;
if ($_smarty_tpl->tpl_vars['order']->value!='accesses') {
$_smarty_tpl->tpl_vars["item_2"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item_2"]->_loop = false;
 $_smarty_tpl->tpl_vars["key_2"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item_2"]->key => $_smarty_tpl->tpl_vars["item_2"]->value) {
$_smarty_tpl->tpl_vars["item_2"]->_loop = true;
 $_smarty_tpl->tpl_vars["key_2"]->value = $_smarty_tpl->tpl_vars["item_2"]->key;
?><div>

                                            <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['item_2']->value['menu_link'];?>
">
                                                <span class="<?php if ($_smarty_tpl->tpl_vars['key_2']->value=='category') {?>category-icon<?php } elseif ($_smarty_tpl->tpl_vars['key_2']->value=='catalog') {?>products-icon<?php } elseif ($_smarty_tpl->tpl_vars['key_2']->value=='page') {?>page-icon<?php } elseif ($_smarty_tpl->tpl_vars['key_2']->value=='news') {?>news-icon<?php } elseif ($_smarty_tpl->tpl_vars['key_2']->value=='order') {?>order-icon<?php } elseif ($_smarty_tpl->tpl_vars['key_2']->value=='discount') {?>marketing-icon<?php } elseif ($_smarty_tpl->tpl_vars['key_2']->value=='setting') {?>setting-icon<?php }?>"><?php echo $_smarty_tpl->tpl_vars['item_2']->value['title'];?>
</span>

                                            </a>
                                            <?php if (count($_smarty_tpl->tpl_vars['item_2']->value['access'])) {?>
                                                <ul>
                                                    <?php  $_smarty_tpl->tpl_vars["access_item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["access_item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item_2']->value['access']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["access_item"]->key => $_smarty_tpl->tpl_vars["access_item"]->value) {
$_smarty_tpl->tpl_vars["access_item"]->_loop = true;
?>
                                                        <?php if ($_smarty_tpl->tpl_vars['access_item']->value['is_menu']==1) {?>
                                                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['access_item']->value['menu_link'];?>
"><?php echo $_smarty_tpl->tpl_vars['access_item']->value['title'];?>
</a></li>
                                                            <?php }?>
                                                        <?php } ?>
                                                </ul>
                                            <?php }?>
                                        </div><?php }
}
} ?>

                                    </div>
                                    <div class="clear">&nbsp;</div>
                                </div>
                                <div id="content">
                                    <?php }?>
                                        <?php if ($_SERVER['REQUEST_URI']) {?>
                                            <?php echo $_smarty_tpl->getSubTemplate ("admiin_main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                        <?php }?>
                                        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

                                        <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

                                        <?php if ($_smarty_tpl->tpl_vars['is_ajax']->value!=1&&$_smarty_tpl->tpl_vars['is_auth']->value>=1&&$_GET['not_menu']!=1) {?></div><div id="footer"><?php if ($_smarty_tpl->tpl_vars['is_auth']->value!=0) {?><div class="line"></div><?php }?></div><?php }?>
                                </body>
                                <?php }?>
                                </html>
                                <?php } elseif ($_GET['not_html']==1) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

                                    <?php }?>
<?php }} ?>
