<?php /* Smarty version 3.1.24, created on 2015-09-13 17:02:27
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/uploader_products/templates/uploader.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:186726235455f581f3215bf4_83200770%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb83644d94926db0cf4f2eac3114e10134a29aca' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/uploader_products/templates/uploader.tpl',
      1 => 1423307977,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186726235455f581f3215bf4_83200770',
  'variables' => 
  array (
    'type' => 0,
    'url' => 0,
    'product_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f581f3266fa3_96726686',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f581f3266fa3_96726686')) {
function content_55f581f3266fa3_96726686 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '186726235455f581f3215bf4_83200770';
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