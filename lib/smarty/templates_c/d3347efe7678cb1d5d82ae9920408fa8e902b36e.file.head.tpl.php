<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-11 17:29:42
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/templates/head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:78585580055d4694bb64588-56294945%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3347efe7678cb1d5d82ae9920408fa8e902b36e' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/templates/head.tpl',
      1 => 1441981782,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78585580055d4694bb64588-56294945',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d4694bbab937_67327507',
  'variables' => 
  array (
    'head_title' => 0,
    'set' => 0,
    'host_url' => 0,
    'head_desc' => 0,
    'head_key' => 0,
    'host' => 0,
    'lib_url' => 0,
    'shop' => 0,
    'catalog_dir' => 0,
    'shop_type' => 0,
    'session_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4694bbab937_67327507')) {function content_55d4694bbab937_67327507($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.truncate.php';
?><!-- 
*****************************************************************
*   Сайт разработан компанией OX2 (http://ox2.ru/) (2015 год)   *
*****************************************************************
-->
<title><?php echo stripslashes((($tmp = @stripslashes($_smarty_tpl->tpl_vars['head_title']->value))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['set']->value->title : $tmp));?>
</title>
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content='<?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', stripslashes((($tmp = @smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['head_desc']->value)),249))===null||$tmp==='' ? '' : $tmp))),249);?>
' />
<meta name="keywords" content='<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes((($tmp = @stripslashes($_smarty_tpl->tpl_vars['head_key']->value))===null||$tmp==='' ? '' : $tmp)));?>
' />
<meta name="viewport" content="width=1024" /> 



<?php echo '<script'; ?>
 src="/js/jquery.min.js"><?php echo '</script'; ?>
>
<link href='<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
fonts.googleapis.com/css?family=Open+Sans:400,600,300&subset=latin,cyrillic-ext,cyrillic' rel='stylesheet' type='text/css'>
<style type="text/css">
    @import url(<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
fonts.googleapis.com/css?family=Open+Sans:400,600,300&subset=latin,cyrillic-ext,cyrillic);
</style>




<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['lib_url']->value;?>
js.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/js/jquery.validate.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 src="/js/jcarousellite.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['lib_url']->value;?>
lib.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>

<link rel="stylesheet" type="text/css" href="/css/base/catalog.min.css"  charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="/css/base/products.min.css" />
<link rel="stylesheet" type="text/css" href="/css/base/all.min.css" />
<link rel="stylesheet" type="text/css" href="/css/base/auth.min.css" />

<link href="/css/style.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="/css/base/basket.min.css" />
<?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady'||$_smarty_tpl->tpl_vars['shop']->value=='woman') {?>
    <link rel="stylesheet" type="text/css" href="/css/base/catalog_lady.min.css" />
<?php }?>
<?php if ($_GET['is_modal']==1) {?><link rel="stylesheet" type="text/css" href="/css/base/modal.min.css" /><?php }?>




<?php echo '<script'; ?>
 type="text/javascript">
    var url = '<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
';
    var catalog_dir = '<?php echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
';
    var base_url = url;
    shop_type = <?php echo $_smarty_tpl->tpl_vars['shop_type']->value;?>

    session_id = '<?php echo $_smarty_tpl->tpl_vars['session_id']->value;?>
'
<?php echo '</script'; ?>
><?php }} ?>
