<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-03 12:36:24
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:150748772255d4694ba78322-81560371%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'daf101aa1ca8d3fb54e7fcf75b85cd907c82c5d7' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/templates/header.tpl',
      1 => 1441272981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150748772255d4694ba78322-81560371',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d4694bb60e60_90746974',
  'variables' => 
  array (
    'host' => 0,
    'shop' => 0,
    'mini_auth' => 0,
    'is_main' => 0,
    'fronted_images_url' => 0,
    'url' => 0,
    'basket' => 0,
    'menu_top' => 0,
    'menu' => 0,
    'open_category_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4694bb60e60_90746974')) {function content_55d4694bb60e60_90746974($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
www.w3.org/1999/xhtml">
    <head>
        <?php echo $_smarty_tpl->getSubTemplate ("head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        
    </head> 
    <body<?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady'||$_smarty_tpl->tpl_vars['shop']->value=="woman") {?> id="lady"<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value=='platok') {?> id="platok"<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value=='sumka') {?> id="sumka"<?php } else { ?> id="lalipop"<?php }?>>
        <div id="stat-box">
            <div id="stat">
                

                <?php echo $_smarty_tpl->tpl_vars['mini_auth']->value;?>

            </div>
        </div>
        <div id="bg">
            
            <div id="header">

                <div id="logo">
                    <?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady') {?>
                        <?php if ($_smarty_tpl->tpl_vars['is_main']->value==1&&$_SERVER['REQUEST_URI']!='/404/') {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-lalipop-lady.gif" alt="Интернет магазин одежды больших размеров" /><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-lalipop-lady.gif" alt="Интернет магазин одежды больших размеров" /></a><?php }?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['shop']->value=='woman') {?>
                        <?php if ($_smarty_tpl->tpl_vars['is_main']->value==1&&$_SERVER['REQUEST_URI']!='/404/') {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-woman.gif" alt="Интернет магазин женской одежды" /><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-woman.gif" alt="Интернет магазин женской одежды" /></a><?php }?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['shop']->value=='platok') {?>
                        <?php if ($_smarty_tpl->tpl_vars['is_main']->value==1&&$_SERVER['REQUEST_URI']!='/404/') {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-platok-lalipop.gif" alt="Интернет магазин платков и шарфов" /><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-platok-lalipop.gif" alt="Интернет магазин платков и шарфов" /></a><?php }?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['shop']->value=='sumka') {?>
                        <?php if ($_smarty_tpl->tpl_vars['is_main']->value==1&&$_SERVER['REQUEST_URI']!='/404/') {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-sumka-lalipop.png" alt="Интернет магазин кожгалантереи" /><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-sumka-lalipop.png" alt="Интернет магазин кожгалантереи" /></a><?php }?>
                    <?php } else { ?>
                        <?php if ($_smarty_tpl->tpl_vars['is_main']->value==1&&$_SERVER['REQUEST_URI']!='/404/') {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-lalipop.gif" alt="Интернет магазин бижутерии" /><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-lalipop.gif" alt="Интернет магазин бижутерии" /></a><?php }?>
                    <?php }?>
                    <div><?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady') {?>Женская одежда больших размеров<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value=='woman') {?>Интернет магазин женской одежды<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value=='platok') {?>Интернет магазин платков и шарфов<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value=='sumka') {?>Интернет магазин кожгалантереи<?php } else { ?>Интернет магазин бижутерии<?php }?></div>
                </div>
                <div id="dilivery-box">
                    <div id="phone">
                        <div><?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady') {?>8 (495) 642-38-53<?php } else { ?>8 (495) 642-27-34<?php }?>
                            
                        </div>
                        <span>пн-пт с 10:00 до 19:00</span>
                        <?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady'||$_smarty_tpl->tpl_vars['shop']->value=='platok'||$_smarty_tpl->tpl_vars['shop']->value=='sumka'||$_smarty_tpl->tpl_vars['shop']->value=='woman') {?>
                            <a href="/call_back/send/?is_modal=1" rel="call_back">Письмо директору</a>
                        <?php } else { ?>
                            <a href="https://lalipop.ru/call_back/send/?is_modal=1" rel="call_back">Письмо директору</a>
                        <?php }?>
                        
                    </div>

                    
                </div>
                <div id="right-box">
                    
                    
                    

                    <div id="basket">
                        
                        <?php echo $_smarty_tpl->tpl_vars['basket']->value;?>

                    </div>
                </div>
                <div class="clear">&nbsp;</div>
            </div>
            <div class="clear">&nbsp;</div>



            <div class="clear">&nbsp;</div>
            <div id="menu-wrap">
                <div id="menu"><button id="find-button" title="Поиск по сайту">Поиск по сайту</button><div><?php  $_smarty_tpl->tpl_vars["menu"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["menu"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_top']->value[0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["menu"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["menu"]['total'] = $_smarty_tpl->tpl_vars["menu"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["menu"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["menu"]->key => $_smarty_tpl->tpl_vars["menu"]->value) {
$_smarty_tpl->tpl_vars["menu"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["menu"]['iteration']++;
if ($_smarty_tpl->tpl_vars['menu']->value->is_visible==1) {?><span<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['menu']['iteration']==$_smarty_tpl->getVariable('smarty')->value['foreach']['menu']['total']) {?> style="background: none;"<?php }
if ($_smarty_tpl->tpl_vars['open_category_id']->value==$_smarty_tpl->tpl_vars['menu']->value->id||$_smarty_tpl->tpl_vars['menu']->value->id==769&&$_smarty_tpl->tpl_vars['open_category_id']->value==0||($_SERVER['REQUEST_URI']==smarty_modifier_replace($_smarty_tpl->tpl_vars['menu']->value->link,$_smarty_tpl->tpl_vars['url']->value,"/"))) {?>  class="selected_menu"<?php }?>><a href="<?php if ($_smarty_tpl->tpl_vars['menu']->value->link) {
echo $_smarty_tpl->tpl_vars['menu']->value->link;
} else {
echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->smarty->registered_objects['page_obj'][0]->getFullAdressPageIdRoutes(array('page_id'=>$_smarty_tpl->tpl_vars['menu']->value->page_id),$_smarty_tpl);
}?>" ><?php echo stripslashes($_smarty_tpl->tpl_vars['menu']->value->name);?>
</a></span><?php }
} ?></div></div>
            </div>
            <?php }} ?>