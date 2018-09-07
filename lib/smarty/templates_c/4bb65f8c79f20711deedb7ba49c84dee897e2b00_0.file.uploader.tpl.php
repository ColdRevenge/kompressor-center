<?php /* Smarty version 3.1.24, created on 2018-07-13 10:07:19
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/uploader_products/templates/uploader.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:12964356295b484fa7d76bd9_38843369%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4bb65f8c79f20711deedb7ba49c84dee897e2b00' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/uploader_products/templates/uploader.tpl',
      1 => 1530509519,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12964356295b484fa7d76bd9_38843369',
  'variables' => 
  array (
    'type' => 0,
    'url' => 0,
    'product_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b484fa7e176a7_53739541',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b484fa7e176a7_53739541')) {
function content_5b484fa7e176a7_53739541 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '12964356295b484fa7d76bd9_38843369';
?>

<div id="file-uploader_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">	
</div>
<form method="post" action="">
    <div class="qq-upload-extra-drop-area"></div>
    <input type="hidden" value="test_post" name="trrrr" />
</form>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/uploader/fileuploader.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">        
    function createUploader_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
(){   
    var uploader = new qq.FileUploader({
    element: document.getElementById('file-uploader_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
'),
    action: '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
uploader_products/upload/?type=<?php echo (($tmp = @$_smarty_tpl->tpl_vars['type']->value)===null||$tmp==='' ? 0 : $tmp);
if ($_smarty_tpl->tpl_vars['product_id']->value) {?>&product_id=<?php echo $_smarty_tpl->tpl_vars['product_id']->value;
}?>',
    debug: true,
    name: 'uploader_images_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
', 
    onComplete: function(id, fileName, responseJSON){

    AjaxRequest('uploader_images_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
uploader_products/get/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['type']->value)===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_id']->value)===null||$tmp==='' ? 0 : $tmp);?>
/');
},
extraDropzones: [qq.getByClass(document, 'qq-upload-extra-drop-area')[0]]
});           
}

// in your app create uploader as soon as the DOM is ready
// don't wait for the window to load  
jQuery(document).ready(function()
{
createUploader_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
();
});

    <?php echo '</script'; ?>
>
<div id="uploader_images_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
    <?php echo $_smarty_tpl->getSubTemplate ('getFiles.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>$_smarty_tpl->tpl_vars['type']->value), 0);
?>

</div><?php }
}
?>