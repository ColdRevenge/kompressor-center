<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-12 20:32:12
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/templates/forum_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104141972555db35d32a27d5-09371884%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f852d19b13318389abb4b9f1bd8df26748b5ce9c' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/templates/forum_footer.tpl',
      1 => 1442079119,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104141972555db35d32a27d5-09371884',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55db35d32a2d33_31472005',
  'variables' => 
  array (
    'is_main' => 0,
    'fronted_images_url' => 0,
    'url' => 0,
    'shop' => 0,
    'menu_top' => 0,
    'menu_footer_5' => 0,
    'menu' => 0,
    'open_category_id' => 0,
    'host_url' => 0,
    'lib_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55db35d32a2d33_31472005')) {function content_55db35d32a2d33_31472005($_smarty_tpl) {?>
<div class="clear">&nbsp;</div>
</div>

<div class="clear">&nbsp;</div>
<div id="footer">
    <div class="center">
        <div id="footer-left">
            <div id="footer-logo">
                <?php if ($_smarty_tpl->tpl_vars['is_main']->value==1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
forum-footer.gif" alt="Форум для женщин" /><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
forum-footer.gif" alt="Форум для женщин" /></a><?php }?>
                <div>Женский форум</div>
            </div>
        </div>

        <div class="office">
            <div itemscope itemtype="http://schema.org/Organization">
                <span itemprop="name" class="hide">Forum.Lalipop</span>
                <?php if ($_smarty_tpl->tpl_vars['shop']->value!='sumka') {?><b>Офис в г. Москве:</b>
                    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">

                        <span itemprop="postalCode"> 111020</span>
                        <span itemprop="addressLocality"> г. Москва</span>, 
                        <span itemprop="streetAddress">Боровая д.7 стр.7</span>
                    </div>
                <?php }?>
                <div class="telephone"><span itemprop="telephone">8 <span>(495)</span> 642-27-34</span></div>
            </div>
        </div>

        <?php if (count($_smarty_tpl->tpl_vars['menu_top']->value[0])) {?>
            <div id="footer-menu">
                <div>
                    <ul>
                <?php  $_smarty_tpl->tpl_vars["menu"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["menu"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_footer_5']->value[0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["menu"]->key => $_smarty_tpl->tpl_vars["menu"]->value) {
$_smarty_tpl->tpl_vars["menu"]->_loop = true;
if ($_smarty_tpl->tpl_vars['menu']->value->is_visible==1) {?><li><span<?php if ($_smarty_tpl->tpl_vars['open_category_id']->value==$_smarty_tpl->tpl_vars['menu']->value->id||$_smarty_tpl->tpl_vars['menu']->value->id==769&&$_smarty_tpl->tpl_vars['open_category_id']->value==0) {?>  class="selected_menu"<?php }?>><a href="<?php if ($_smarty_tpl->tpl_vars['menu']->value->link) {
echo $_smarty_tpl->tpl_vars['menu']->value->link;
} else {
echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->smarty->registered_objects['page_obj'][0]->getFullAdressPageIdRoutes(array('page_id'=>$_smarty_tpl->tpl_vars['menu']->value->page_id),$_smarty_tpl);
}?>" ><?php echo stripslashes($_smarty_tpl->tpl_vars['menu']->value->name);?>
</a></span></li><?php }
} ?>
            </ul>

            <div id="footer-soc">
                <div><b>Мы в социальных сетях</b></div>
                <a href="http://vk.com/lalipop_ru" title="Вконтакте" target="_blank"><img src="/images/fronted/v.png" alt="" /></a>
                    

            </div>
        </div>
    <?php }?>

</div>
</div>
</div>


<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/srcollTo.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['lib_url']->value;?>
top.js'><?php echo '</script'; ?>
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

    <!-- Yandex.Metrika counter --><?php echo '<script'; ?>
 type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter32317849 = new Ya.Metrika({ id:32317849, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch (e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");<?php echo '</script'; ?>
><noscript><div><img src="https://mc.yandex.ru/watch/32317849" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
    
</body>
</html><?php }} ?>
