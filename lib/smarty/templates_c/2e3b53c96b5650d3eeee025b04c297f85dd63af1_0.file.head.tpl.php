<?php /* Smarty version 3.1.24, created on 2015-09-16 18:46:28
         compiled from "/home/admin/domains/coralmedia.ru/public_html/templates/head.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:115895342855f98ed45a5535_02338691%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e3b53c96b5650d3eeee025b04c297f85dd63af1' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/templates/head.tpl',
      1 => 1442418387,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115895342855f98ed45a5535_02338691',
  'variables' => 
  array (
    'head_title' => 0,
    'set' => 0,
    'host_url' => 0,
    'head_desc' => 0,
    'head_key' => 0,
    'host' => 0,
    'lib_url' => 0,
    'catalog_dir' => 0,
    'shop_type' => 0,
    'session_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f98ed4602b79_08741811',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f98ed4602b79_08741811')) {
function content_55f98ed4602b79_08741811 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once '/home/admin/domains/coralmedia.ru/public_html/lib/smarty/plugins/modifier.truncate.php';

$_smarty_tpl->properties['nocache_hash'] = '115895342855f98ed45a5535_02338691';
?>
<!-- 
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
js.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/js/jquery.validate.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 src="/js/jcarousellite.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['lib_url']->value;?>
lib.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>

<link rel="stylesheet" type="text/css" href="/css/base/catalog.css"  charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="/css/base/products.css" />
<link rel="stylesheet" type="text/css" href="/css/base/all.css" />
<link rel="stylesheet" type="text/css" href="/css/main.css" />


<link href="/css/style.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="/css/base/basket.css" />
<?php if ($_GET['is_modal'] == 1) {?><link rel="stylesheet" type="text/css" href="/css/base/modal.css" /><?php }?>



<?php echo '<script'; ?>
 type="text/javascript">
    $(document).ready(function () {
        $('#wrapper').css({
            minHeight: $(window).height() - 66
        })
    })
    var url = '<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
';
    var catalog_dir = '<?php echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
';
    var base_url = url;
    shop_type = <?php echo $_smarty_tpl->tpl_vars['shop_type']->value;?>

    session_id = '<?php echo $_smarty_tpl->tpl_vars['session_id']->value;?>
'
<?php echo '</script'; ?>
><?php }
}
?>