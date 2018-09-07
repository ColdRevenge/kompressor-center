<?php /* Smarty version 3.1.24, created on 2015-10-27 13:15:48
         compiled from "/home/c10045/public_html/kompressor-center.com/templates/footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1681300868562f4ed4b26599_42629323%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86ed7c561747e814ee3ca961d969d0d8fcaca74e' => 
    array (
      0 => '/home/c10045/public_html/kompressor-center.com/templates/footer.tpl',
      1 => 1445777638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1681300868562f4ed4b26599_42629323',
  'variables' => 
  array (
    'basket' => 0,
    'is_main' => 0,
    'fronted_images_url' => 0,
    'url' => 0,
    'is_open_product' => 0,
    'host_url' => 0,
    'banners_list' => 0,
    'bann_item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_562f4ed4b4f8c7_71715301',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_562f4ed4b4f8c7_71715301')) {
function content_562f4ed4b4f8c7_71715301 ($_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once '/home/c10045/public_html/kompressor-center.com/lib/smarty/plugins/function.counter.php';

$_smarty_tpl->properties['nocache_hash'] = '1681300868562f4ed4b26599_42629323';
?>

<div class="clear">&nbsp;</div>
</div>

<div class="clear">&nbsp;</div>

<?php echo '<script'; ?>
 type="text/javascript">
    
    $(window).scroll(function () {
        var x = $(document).height();
        var y = $(window).height();
        if ($(window).scrollTop() >= (x - y) - Number(65)) {
            $('#basket').animate({bottom: '70px'}, 1);
        } else {
            $('#basket').animate({bottom: '0'}, 1);
        }
    });
    
<?php echo '</script'; ?>
>

<div style="width: 1000px;margin: auto;" class="scrolled">
    <div id="basket" style="position: fixed;">
        <?php echo $_smarty_tpl->tpl_vars['basket']->value;?>

    </div>
</div>

<div id="footer">

    <div class="center">
        <div id="footer-left">
            <div id="footer-logo">
                <?php if ($_smarty_tpl->tpl_vars['is_main']->value == 1) {?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-footer.png" alt="" />
                <?php } else { ?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-footer.png" alt="" /></a>
                    <?php }?>
            </div>
        </div>

        <div class="phone-info">
            <span>8 (495)</span> 553-23-44
        </div>

        <div class="office">

            2015 © Энергия воздуха<br/>
            Все права защищены

        </div>

        

    </div>
    <div class="clear"></div>

</div>
<?php if ($_smarty_tpl->tpl_vars['is_open_product']->value == 1) {?>
    

    

<?php }?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/srcollTo.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/lib/rinit.min.js"><?php echo '</script'; ?>
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
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<?php echo '<script'; ?>
 type="text/javascript">
    $(".slider").jCarouselLite({
        btnNext: ".navSliderButton, .next",
        btnPrev: ".navSliderButton, .prev",
        visible: 1,
        start: 0,
        auto: 6000,
        btnGo: [<?php
$_from = $_smarty_tpl->tpl_vars['banners_list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["bann_item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["bann_item"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["bann_item"]->value) {
$_smarty_tpl->tpl_vars["bann_item"]->_loop = true;
$foreach_bann_item_Sav = $_smarty_tpl->tpl_vars["bann_item"];
if ($_smarty_tpl->tpl_vars['bann_item']->value->file_id == 0) {?>".<?php echo smarty_function_counter(array('name'=>"slide-count-page"),$_smarty_tpl);?>
",<?php }
$_smarty_tpl->tpl_vars["bann_item"] = $foreach_bann_item_Sav;
}
?>],
                afterEnd: function (a, to, btnGo) {
                    if (btnGo.length <= to) {
                        to = 0;
                    }
                    $(".j-active").removeClass("j-active");
                    $(btnGo[to]).addClass("j-active");
                }
    });
<?php echo '</script'; ?>
>



</body>
</html><?php }
}
?>