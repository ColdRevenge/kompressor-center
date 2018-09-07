<?php /* Smarty version 3.1.24, created on 2017-01-27 16:11:52
         compiled from "E:/OpenServer/domains/kc-pskov.dev/templates/main.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:8957588b4718a1c107_92962421%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0daca5e9339a2f0d7591bd2c113d36bcb58892d8' => 
    array (
      0 => 'E:/OpenServer/domains/kc-pskov.dev/templates/main.tpl',
      1 => 1485522711,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8957588b4718a1c107_92962421',
  'variables' => 
  array (
    'shop' => 0,
    'is_mobile' => 0,
    'is_only_content' => 0,
    'content' => 0,
    'live_search' => 0,
    'param_tpl' => 0,
    'is_main' => 0,
    'brands' => 0,
    'url' => 0,
    'catalog_dir' => 0,
    'brand' => 0,
    'icons_url' => 0,
    'host_url' => 0,
    'is_open_product' => 0,
    'lib_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_588b4718a89233_89658645',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588b4718a89233_89658645')) {
function content_588b4718a89233_89658645 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '8957588b4718a1c107_92962421';
if ($_smarty_tpl->tpl_vars['shop']->value == 'forum') {?>
    <?php echo $_smarty_tpl->getSubTemplate ("forum_main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php } elseif ($_smarty_tpl->tpl_vars['is_mobile']->value == '1') {?>
    <?php echo $_smarty_tpl->getSubTemplate ("mobile.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php } elseif ($_smarty_tpl->tpl_vars['is_only_content']->value == 1) {
echo $_smarty_tpl->tpl_vars['content']->value;
} else {
if ($_GET['is_modal'] != 1) {
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        <div id="content">
            <div id="find"<?php if ($_GET['find']) {?> style="display: block;"<?php }?>>
                <?php echo $_smarty_tpl->tpl_vars['live_search']->value;?>

            </div>
            <?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['module'] != 'stat') {?>
                <div id="content-left">



                    

                </div>
            <?php }?>


            <?php if ($_smarty_tpl->tpl_vars['is_main']->value == 1) {?>
                <div class="clear">&nbsp;</div>

                
                


        



            <?php }?>



            <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady' || $_smarty_tpl->tpl_vars['shop']->value == 'sumka' || $_smarty_tpl->tpl_vars['shop']->value == 'woman') {?>
                <div  id="brands_list">
                    <div class="h1">Бренды</div>
                    					
                    <ul>
                        <?php
$_from = $_smarty_tpl->tpl_vars['brands']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["brand"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["brand"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["brand"]->value) {
$_smarty_tpl->tpl_vars["brand"]->_loop = true;
$foreach_brand_Sav = $_smarty_tpl->tpl_vars["brand"];
?>
                            <li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['brand']->value->pseudo_dir;?>
/" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['brand']->value->name);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['icons_url']->value;
echo $_smarty_tpl->tpl_vars['brand']->value->icon;?>
" onerror="this.src='<?php echo $_smarty_tpl->tpl_vars['icons_url']->value;?>
no-brand.png'" style="width: 184px;height: 92px;" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['brand']->value->name);?>
" /></a>
                            </li>
                        <?php
$_smarty_tpl->tpl_vars["brand"] = $foreach_brand_Sav;
}
?>
                    </ul>
                </div>
                
            <?php }?>



            


             

            


            

            

            


            





            
            

            

            





            <?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        <?php } else { ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
            <html xmlns="https://www.w3.org/1999/xhtml">
                <head>
                    <?php echo $_smarty_tpl->getSubTemplate ("head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

                </head>
                <body style="background: none white;" id="modal">
                    <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady' || $_smarty_tpl->tpl_vars['shop']->value == 'woman') {?><div id="lady"><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</div>
                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

                    <?php }?>
                    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
                    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
                    <?php if ($_smarty_tpl->tpl_vars['is_open_product']->value == 1) {?>
                        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/zoom/cloud-zoom.css" />
                        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/zoom/cloud-zoom.1.0.2.min.js"><?php echo '</script'; ?>
>
                    <?php }?>
                    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/srcollTo.js"><?php echo '</script'; ?>
>
                    <?php echo '<script'; ?>
 type="text/javascript" src="/lib/rinit.min.js"><?php echo '</script'; ?>
>
                    <?php echo '<script'; ?>
 type='text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['lib_url']->value;?>
top.js'><?php echo '</script'; ?>
>
                    <!--Замена PrettyPopin-->
                    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/fancybox/jquery.fancybox.min.js"><?php echo '</script'; ?>
>
                    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/fancybox/jquery.mousewheel-3.0.6.pack.js"><?php echo '</script'; ?>
>
                    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
                </body>
            </html>
        <?php }?>
    <?php }
}
}
?>