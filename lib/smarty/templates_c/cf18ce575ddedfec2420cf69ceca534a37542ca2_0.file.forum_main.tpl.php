<?php /* Smarty version 3.1.24, created on 2015-09-13 16:02:32
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/templates/forum_main.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:70961926655f573e8e80107_49498572%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf18ce575ddedfec2420cf69ceca534a37542ca2' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/templates/forum_main.tpl',
      1 => 1441711396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70961926655f573e8e80107_49498572',
  'variables' => 
  array (
    'content' => 0,
    'host_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f573e8eae4b9_86541179',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f573e8eae4b9_86541179')) {
function content_55f573e8eae4b9_86541179 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '70961926655f573e8e80107_49498572';
if ($_GET['is_modal'] != 1) {
echo $_smarty_tpl->getSubTemplate ("forum_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <div id="content">
        <div id="find"<?php if ($_GET['find']) {?> style="display: block;"<?php }?>>
            <div class="search">
                <form action="/forum/search/" name="" method="get" >
                    <input type="text" name="find" id="live_find" value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_GET['find']));?>
" placeholder="Поиск по форуму" autocomplete="off"><select name="forum_type">
                            <option value="1" <?php if ($_GET['forum_type'] == 1 || !$_GET['forum_type']) {?>selected="selected"<?php }?>>Только в темах</option>
                            <option value="2" <?php if ($_GET['forum_type'] == 2) {?>selected="selected"<?php }?>>В темах и текстах сообщений</option>
                        </select><button class="search-icon"></button>	

                </form>
            </div>
        </div>
        <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

        
        <div id="forum-shop-icon">
            <a href="https://lalipop.ru/" target="_blank" title="Перейти в интернет магазин бижутерии"><img src="/images/forum/forum_lalipop.jpg" alt="Перейти в интернет магазин бижутерии" /></a>
            <a href="https://lady.lalipop.ru/" target="_blank" title="Перейти в интернет магазин женской одежды больших размеров"><img src="/images/forum/forum_lady.jpg" alt="Перейти в интернет магазин  женской одежды больших размеров" /></a>
            <a href="https://woman.lalipop.ru/" target="_blank" title="Перейти в интернет магазин женской одежды"><img src="/images/forum/forum_woman.jpg" alt="Перейти в интернет магазин женской одежды" /></a>
            <a href="https://platok.lalipop.ru/" target="_blank" title="Перейти в интернет магазин платков"><img src="/images/forum/forum_platok.jpg" alt="Перейти в интернет магазин платков" /></a>
            <a href="https://sumka.lalipop.ru/" target="_blank" title="Перейти в интернет магазин кожгалантереи"><img src="/images/forum/forum_sumka.jpg" alt="Перейти в интернет магазин кожгалантереи" /></a>
        </div>
    </div>


    <?php echo $_smarty_tpl->getSubTemplate ("forum_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php } else { ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <?php echo $_smarty_tpl->getSubTemplate ("forum_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        </head>
        <body style="background: none white;" id="modal">
            <?php echo $_smarty_tpl->tpl_vars['content']->value;?>


            <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/fancybox/jquery.fancybox.min.js"><?php echo '</script'; ?>
>
        </body>
    </html>
<?php }
}
}
?>